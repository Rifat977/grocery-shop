<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
class frontController extends Controller
{
    public function index(){
        $dataCat = DB::table('categorys')->orderBy('category')->get();
        $data = DB::table('products')
    			->join('categorys','products.catId','categorys.id')
                 ->select('products.*', 'categorys.category')
                 ->orderBy('id', 'DESC')
                ->get();
    	return view('home',compact('data','dataCat'));
    }
    public function product($id){
        $data =  DB::table('products')->where('id',$id)->first();
        $dataCat = DB::table('categorys')->orderBy('category')->get();
       
        $dataD = DB::table('products')
                ->join('categorys','products.catId','categorys.id')
                ->select('products.*', 'categorys.category')
                ->orderBy('proName')
                ->limit(20)
                ->get();
                
        return view('single',compact('data','dataCat'),compact('dataD'));
    }
    public function productAsCategory($id){
        $data = DB::table('products')
        ->join('categorys','products.catId','categorys.id')
        ->select('products.*', 'categorys.category')
        ->orderBy('id', 'DESC')
        ->where('catId',$id)->get();
        $dataCat = DB::table('categorys')->orderBy('category')->get();
        $dataC = DB::table('categorys')->where('id',$id)->first();
        return view('productAsCategory',compact('data','dataCat'),compact('dataC'),);
    }
    public function checkout(Request $request){
        $category = DB::table('categorys')->orderBy('category')->get();
        $data = Cart::content();
        if(!count($data)==null){
            return view('checkout', compact('data','category'));
        }else{
            return redirect()->back();
        }
    }
    public function addCart( $proid){
         $product = DB::table('products')->where('id',$proid)->first();
         $data = array();
         $data['id'] = $product->id;
         $data['name'] = $product->proName;
         $data['qty'] = 1;
         $data['price'] = $product->price;
         $data['weight'] = 1;
         $data['options']['image'] = $product->proImage;
         Cart::add($data,['size' => 'large']);

         
     }
     public function cartPlus( $rowId){
         $data = Cart::get($rowId);
         $q = $data->qty;  
        $qty = 1+$q;
        Cart::update($rowId, $qty);

    }
    public function cartMin( $rowId){
        $data = Cart::get($rowId);
        $q = $data->qty;
        if($q>1){
            $qty = $q-1;
            Cart::update($rowId, $qty);
        }else{
            alert("Sorry");
        }

   }
    public function cartRemove( $rowId){
        Cart::remove($rowId);
    }
    public function cart(){
          $data = Cart::content();
          $total = Cart::total();
          $tax = Cart::tax();   
          return view('cart',compact('data','total'),compact('tax'));
    }
    
}
