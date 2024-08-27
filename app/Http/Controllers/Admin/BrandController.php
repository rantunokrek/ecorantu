<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{



 // ==== admin ========
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.index',compact('brands'));
    }

//  Brand store ===========
 public function storeBrand(Request $request)
    {
        $request->validate([
            'brand_name' =>  'required|unique:brands,brand_name'
        ]);
        Brand::insert([
            'brand_name' => $request->brand_name,
            'created_at' =>  Carbon::now()

        ]);
        
        return Redirect()->back()->with('success','Brand added');
    }
    // Brand find id for edit
    public function edit($brand_id)
    {
      $brand =  Brand::find($brand_id);
        return view('admin.brand.edit',compact('brand'));
    }
     // Brand update

     public function update(Request $request)
     {
            $brand_id = $request->id;
         Brand::find($brand_id)->update([
             'brand_name' => $request->brand_name,
             'status' => $request->status,
             'created_at' =>  Carbon::now()
 
         ]);
         
         return Redirect()->route('admin.brand')->with('success','Brand updated');
     }
      // Brand delete
      public function destroy($brand_id)
      {
         Brand::find($brand_id)->delete();
          return Redirect()->back()->with('delete','Brand item deleted Successfully');
      }
       // Brand inActive
       public function inactive($brand_id)
       {
          Brand::find($brand_id)->update(['status' => 0]);
           return Redirect()->back()->with('delete',' Status InActived');
          
       }

        // Brand active
        public function active($brand_id)
       {
          Brand::find($brand_id)->update(['status' => 1]);
           return Redirect()->back()->with('delete','Status Actived');
          
       }




}
