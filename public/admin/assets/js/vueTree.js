app = new Vue({
    el: '#app',
    components: { SlVueTree, axios },
    data: {
        newNodeText: '',
        tree: [],
        updateSuccess: false,
        updateFailed: false,
        spinner: false,
        showEditModal: false,
        showDeleteModal: false,
        editTitle: '',
        editPath: '',
        deleteTitle: '',
        deleteId: '',
        deletePath: ''
    },
    methods: {
          newNode() {
              if ( this.newNodeText!="" ) {
                let newNode = {
                    title: this.newNodeText,
                    isLeaf: false,
                    isExpanded: true
                };
                this.tree.unshift(newNode);

                this.newNodeText = "";
            }
          },
          deleteItem(path) {
              let node = Object.getNodeElement(this.tree, path);
              this.deleteId = node.id;
              this.deleteTitle = node.title;
              this.deletePath = path;
              this.showDeleteModal = true;
          },
          confirmDeleteItem() {
              let tree = this.tree;
              let path = this.deletePath;
              let deleteId = this.deleteId;

              if ( deleteId!="" ) {
                  //send to API
                  axios.delete('/api/admin/category/delete/'+deleteId);
              }

              //törlés a tömbből
              //let node = Object.getNodeElement(tree,path);
              if ( path.length>1 ) {
                  //ha több mélységben van, kikeresem a gyerek elemeket
                  let tmpPath = [];
                  for (let i = 0; i < path.length; i++) {
                      let element = path[i];
                      if ( i != path.length-1 )
                        tmpPath[i] = element;
                  }
                  let childNodes = Object.getNodeElement(tree,tmpPath).children;

                  childNodes.splice(path[path.length-1], 1);
              } else {
                  //ha csak a legfelső szintet töröljük, akkor törlöm
                  tree.splice(path[0],1);
              }
              
              this.showDeleteModal = false;
              this.deletePath = "";
              this.deleteId = "";
              this.deleteTitle = "";
          },
          editItem(path) {
              let node           = Object.getNodeElement(this.tree, path);
              this.editTitle     = node.title;
              this.showEditModal = true;
              this.editPath      = path;
          },
          updateItem() {
              let path  = this.editPath;
              let title = this.editTitle;
              let tree  = this.tree;
              
              let node = Object.getNodeElement(tree, path);
              node.title = title;

              this.showEditModal = false;
              this.editTitle = "";
              this.editPath  = "";
          },
          update() {
                this.spinner = true;

                axios.post('/api/admin/category/update', {
                    tree: JSON.stringify(this.tree)
                })
                .then(response => {
                    //this.tree = setJsonArray(response.data);
                    this.updateSuccess = true;
                    this.updateFailed  = false;
                    this.spinner = false;
                })
                .catch(function (error) {
                    // handle error
                    this.updateSuccess = false;
                    this.updateFailed  = true;
                    this.spinner = false;
                });
          },
    },
    mounted() {
        this.tree = setJsonArray(this.$refs.dbTree.value);
    }
});

function setJsonArray(tree) {
    tree = JSON.parse(tree);
    
    tree.forEach(element => {
        if ( typeof element.children != "undefined" ) {
            element.children = setJsonArray(element.children);
        }
    });

    return tree;
}

Object.getNodeElement = function(tree, path) {
    let node = {};
    let obj = tree;
    for ( let i=0; i<path.length; i++ ) {
        node = obj[path[i]];
        obj = obj[path[i]].children;
    }

    return node;
}