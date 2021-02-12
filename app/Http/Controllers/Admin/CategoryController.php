<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Category;

class CategoryController extends Controller
{
    protected $treeCount = 1;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->getCategoryTree();
        
        return view("Admin.Category.Index")
            ->with("categories", $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $trees = json_decode($request->tree);
        
        foreach ($trees as $tree)
            $this->updateCategoryTree($tree);
        
        //kategória lista előállítása
        $categories = $this->getCategoryTree();

        return json_encode($categories);
    }

    protected function getCategoryTree($parentId="0") {
        $categories = Category::where("parent_id", $parentId)->orderBy("position")->get();
        $arr = [];
        $tmp = [];
        foreach ( $categories as $category ) {
            $tmp = [];
            $tmp["title"]      = $category->name;
            $tmp["id"]         = $category->id;
            $tmp["isLeaf"]     = false;
            $tmp["isExpanded"] = false;

            if ( $this->categoryHasChildren($category->id) )
                $tmp["children"] = $this->getCategoryTree($category->id);

            array_push($arr, $tmp);
        }

        return json_encode($arr);
    }

    protected function categoryHasChildren($categoryId) {
        $count = Category::where("parent_id", $categoryId)->count();
        if ( $count>0 )
            return true;

        return false;
    }

    protected function updateCategoryTree($tree, $parentId="0") {
        if ( gettype($tree) == "object" ) {
            $category = null;
            if ( isset($tree->id) && $tree->id ) {
                //update
                $category = Category::find($tree->id);
            } else {
                //insert
                $category = new Category();
            }

            $category->name = $tree->title;
            $category->slug = Str::slug($tree->title);
            $category->position = $this->treeCount;
            $category->parent_id = $parentId;
            $category->save();

            $this->treeCount += 1;
            
            if ( isset($tree->children) && $tree->children )
                $this->updateCategoryTree($tree->children, $category->id);
        } else {
            $countPos = 1;
            foreach ($tree as $treeValue) {
                if ( isset($treeValue->id) && $treeValue->id ) {
                    //update
                    $category = Category::find($treeValue->id);
                } else {
                    //insert
                    $category = new Category();
                }
    
                $category->name = $treeValue->title;
                $category->slug = Str::slug($treeValue->title);
                $category->parent_id = $parentId;
                $category->position  = $countPos;
                $category->save();

                $countPos += 1;

                if ( isset($treeValue->children) && $treeValue->children )
                    $this->updateCategoryTree($treeValue->children, $category->id);
            }
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if ( $category )
            $category->delete();

        return true;
    }
}
