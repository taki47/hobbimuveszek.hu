function saveNewTag(apiToken) {
    var tagName = $("#tagName").val();

    $.post("/api/admin/tag/new", {'apiToken': apiToken, 'name': tagName, 'type': 1})
    .done(function(data) {
        data = JSON.parse(data);
        

        if ( data.ERROR!=null ) {
            console.log(data.ERROR);
            modalBody = $(".modal-body").html();
            modalBody = "<div class=\"alert alert-danger\" role=\"alert\">"+data.ERROR+"</div>"+modalBody;
            $(".modal-body").html(modalBody);

            $("#tagName").val(tagName);
        } else {
            $("#newTagModal").modal("hide");
            $("#tagName").val("");

            tagsList = $(".tags-list").html();
            tagsList = "<input name='tags[]' type='checkbox' CHECKED value='"+data.id+"'> "+data.name+"<br>" + tagsList;
            $(".tags-list").html(tagsList);

            $('.tags-list').scrollTop(0);
        }
    })
}