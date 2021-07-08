<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Carbon\Carbon;
class orderController extends Controller
{
    public function orderCreate(Request $request){
        $rules = [
			'cmrId' => 'required',
            'invoice' => 'required',
            'amount' => 'required',
            'address' => 'required',
            'totalItem' => 'required',
        ];
        $this->validate($request,$rules);
        $products = Cart::content();
        foreach($products as $product){
            $data = array();
            $data['proId'] = $product->id;
            $data['cmrId'] = $request->cmrId;
            $data['qty'] = $product->qty;
            $data['invoice'] = $request->invoice;
            $result = DB::table('orderdetails')->insert($data);
        }
            $datab = array();
            $datab['cmrId'] = $request->cmrId;
            $datab['invoice'] = $request->invoice;
            $datab['amount'] = $request->amount;
            $datab['address'] = $request->address;
            $datab['created_at'] = Carbon::now();
            $resultB = DB::table('orders')->insert($datab);
            if($resultB){
                $notice = array(
                    'message' => 'Oder placed',
                    'alert-type' => 'success'
                );
                Cart::destroy();
                return redirect('/')->with($notice);
            }else{
                $notice = array(
                    'message' => 'Order recived failed',
                    'alert-type' => 'error'
                );
                return redirect('/checkout')->with($notice);
            }

    }

    public function showClient(){
        $cmrId = Session()->get('cmrID');
         $orders = DB::table('orders')
                    ->where('cmrId',$cmrId)
                    ->get();
         return view('order',compact('orders'));
    }
    public function showDetails($invoice){
        $cmrId = Session()->get('cmrID');
         $orders = DB::table('orderdetails')
                     ->join('products','orderdetails.proId','products.id')
                     ->select('orderdetails.*', 'products.*')
                     ->where(['invoice'=> $invoice, 'cmrId'=>$cmrId])
                     ->get();
         $info = DB::table('orders')->where(['invoice'=> $invoice, 'cmrId'=>$cmrId])->first();
         return view('orderdetail',compact('orders','info'));
    }


    //backend-order
    public function showAdmin(){
        $orders = DB::table('orders')->orderBy('id','DESC')->get();
        return view('admin.order', compact('orders'));
    }
    public function showOrderDetails($invoice){
        $products = DB::table('orderdetails')
                    ->join('products','orderdetails.proId','products.id')
                    ->select('orderdetails.*', 'products.*')  
                    ->where('invoice', $invoice)
                    ->get();
        $order = DB::table('orders')
                     ->join('users','orders.cmrId','users.id')
                     ->select('orders.*', 'users.name', 'users.number')               
                     ->where('invoice', $invoice)->first();
        return view('admin.orderdetails',compact('products','order'));
    }
    public function updateStatus(Request $request){
        $inv = $request->invoice;
        $check = $request->checked;
        if($check==5){
            $total = $request->total;
            for($a=0; $a<$total; $a++){
                $id=  $request->id;
                $qty=  $request->qty;
                DB::table('products')->where('id',$id)->update(['stock'=> 6]);
                return redirect()->back();
            }
        }else{
            $db = DB::table('orders')->where('invoice',$inv)->update(['status'=>$check]);
            return redirect()->back();
        }
    }

   
}
