<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class categoryController extends Controller
{
    public function category(){
        $categoryShow = DB::table('categorys')->orderBy('id', 'DESC')->get();
        return view('admin.category',compact('categoryShow'));
    }

    public function categoryAdd(Request $request){
        $rules =[
            'category' => 'required|min:2|max:25',
            'image'    => 'required'
        ];
        $this->validate($request,$rules);
        $data = array();
        $data['category'] = $request->category;
        $image = $request->file('image');
        if($image){
            $data['image']= time().$image->getClientOriginalName();
            $path = "assets/backend/categoryImage";
            $success = $image->move($path,$data['image']);
             DB::table('categorys')->insert($data);
             $notice = array(
                'message' => 'Category added succssfully',
                'alert-type' => 'success'
            );
    	 	return redirect()->back()->with($notice);
        }else{
            $notice = array(
                'message' => "Category added succssfully",
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notice);
        }

    }
    public function categoryEdit($id){
        $editCat = DB::table('categorys')->where('id',$id)->first();
        return view('admin.categoryedit',compact('editCat'));
    }
    public function categoryUpdate(Request $request){
        $rules = [
            'category' => 'required|min:2|max:25',
            'image' => 'max:3000'
        ];
        $this->validate($request,$rules);
	
        $data = array();
        $data['category'] = $request->category;
        $image = $request->file('image');
        $id= $request->id;
        $oldImg = $request->oldimg;
        if($image){
            $data['image']= time().$image->getClientOriginalName();
            $path = "assets/backend/categoryImage";
            $success = $image->move($path,$data['image']);
            unlink('assets/backend/categoryImage/'.$oldImg);
             DB::table('categorys')->where('id',$id)->update($data);
             $notice = array(
                'message' => 'Category update succssfully',
                'alert-type' => 'success'
            );
    	 	return redirect()->back()->with($notice);
        }else{
            DB::table('categorys')->where('id',$id)->update($data);
            $notice = array(
                'message' => 'Category update succssfully',
                'alert-type' => 'success'
            );
    	 	return redirect()->back()->with($notice);
        }
    }
    public function categoryDelete($id){
        DB::table('categorys')->where('id',$id)->delete();
        $notice = array(
            'message' => 'Category delete succssfully',
            'alert-type' => 'success'
        );
         return redirect()->back()->with($notice);
    }
}
