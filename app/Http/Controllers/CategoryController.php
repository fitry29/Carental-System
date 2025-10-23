<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::all();

        // if ($categories->isEmpty()) {
        //     return redirect()->back()->with('warning', 'No category found.');
        // }
        return view('pages.admin.category',['categories' => $categories]);
    }

    public function createCategory(){
        return view('pages.admin.register_category');
    }

    public function editCategoryPage($id){
        $categories = Category::find($id);

        return view('pages.admin.edit_category', ['categories' => $categories]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        
        $newCategory = Category::create($data);
        
        return redirect(route('categories.index'))->with('success','Registration successful!');
    }

    public function modifiedCategory($id, Request $request){
        $data = Category::find($id);

        $data->name = $request->name;
        $data->description = $request->description;

        $data->save();

        return redirect(route('categories.index'))->with('success','Infomation updated successful!');
    }

    public function deleteCategory($id){
        $data = Category::find($id);

        $data->delete();
        return redirect(route('categories.index'))->with('success','Category removed successful!');
    }
}
