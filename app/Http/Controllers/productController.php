<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class productController extends Controller
{
    public function product(){
        $data = DB::table('categorys')->get();
        $dataB = DB::table('products')
                 ->join('categorys','products.catId','categorys.id')
                 ->select('products.*', 'categorys.category')
                 ->orderBy('id', 'DESC')
                 ->get();
        
        return view("admin.product",compact('data','dataB'));
    }
    public function productAdd(Request $request){
        $rules = [
			'proName' => 'required|min:5|max:100|',
            'catId' => 'required',
            'proImage' => 'required',
            'oldprice' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'status' => 'required',
            'details' => 'required|min:5|max:8000|',
        ];
        $this->validate($request,$rules);
        $data = array();
		$data['proName'] = $request->proName;
		$data['catId'] = $request->catId;
        $data['oldprice'] = $request->oldprice;
        $data['price'] = $request->price;
        $data['stock'] = $request->stock;
        $data['status'] = $request->status;
        $data['details'] = $request->details;
        $image = $request->file('proImage');
        
        $data['proImage'] = time().$request->proImage->getClientOriginalName();
			$path = 'assets/backend/productImage';
			$success = $image->move($path,$data['proImage']);
            $result = DB::table('products')->insert($data);
            if($result){
                $notice = array(
                    'message' => 'Product added succssfully',
                    'alert-type' => 'success'
                );
                 return redirect()->back()->with($notice);
            }else{
                $notice = array(
                    'message' => 'Product added failed',
                    'alert-type' => 'error'
                );
                 return redirect()->back()->with($notice);
            }
    }
    public function productEdit($id){
        $data = DB::table('products')->where('id',$id)->first();
        $dataB = DB::table('categorys')->get();
        return view('admin.productedit',compact('data','dataB'));
    }
    public function productUpdate(Request $request){
        $rules = [
			'proName' => 'required|min:5|max:100|',
            'catId' => 'required',
            'oldprice' => 'required',
            'price' => 'required',
            'details' => 'required|min:5|max:8000|',
            'stock' => 'required',
            'status' => 'required',
        ];
        $this->validate($request,$rules);
        $id = $request->id;
        $oldImg = $request->oldimg;
        $data = array();
		$data['proName'] = $request->proName;
		$data['catId'] = $request->catId;
        $data['oldprice'] = $request->oldprice;
        $data['price'] = $request->price;
        $data['details'] = $request->details;
        $data['stock'] = $request->stock;
        $data['status'] = $request->status;
        $image = $request->file('proImage');
        
        if($image){
            $data['proImage'] = time().$request->proImage->getClientOriginalName();
			$path = 'assets/backend/productImage';
            $success = $image->move($path,$data['proImage']);
            unlink('assets/backend/productImage/'.$oldImg);
            DB::table('products')->where('id',$id)->update($data);
            $notice = array(
                'message' => 'Product update succssfully',
                'alert-type' => 'success'
            );
             return redirect()->back()->with($notice);
        }else{
            DB::table('products')->where('id',$id)->update($data);
            $notice = array(
                'message' => 'Product update success',
                'alert-type' => 'success'
            );
             return redirect()->back()->with($notice);
        }
            
    }
    public function prodcutDelete($id){
        DB::table('products')->where('id',$id)->delete();
        $notice = array(
            'message' => 'Product delete successfully',
            'alert-type' => 'success'
        );
         return redirect()->back()->with($notice);
    }
}
