<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }

    public function StoreCat(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Category added');
    }



    public function Edit($cat_id)
    {
      $category = Category::find($cat_id);
      return view ('admin.category.edit',compact('category'));

    }
   public function update(Request $request)
    {
       $cat_id = $request->id;

        Category::find($cat_id)->update([
            'category_name' => $request->category_name,
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('admin.category')->with('success','Category updated');
    }

   //category delete
    public function destroy($cat_id)
    {
     Category::find($cat_id)->delete();
      return Redirect()->back()->with('delete','Category Delete');

    }
    // Inactive status
      public function Inactive($cat_id)
    {
     Category::find($cat_id)->update(['status' => 0]);
      return Redirect()->back()->with('delete','Status has been Inactived');

    }

    // Active status
    public function Active($cat_id)
    {
     Category::find($cat_id)->update(['status' => 1]);
      return Redirect()->back()->with('success','Status has been actived');

    }
    





}
