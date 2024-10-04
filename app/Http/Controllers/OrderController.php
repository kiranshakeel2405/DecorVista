<?php

namespace App\Http\Controllers;


use App\Models\CustomerDetail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Rules\Alpha;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{
    public function proceed(Request $request)
    {

        // 1 step Apply  Validation

        $validator = Validator::make($request->all(), [
            'first_name' => ['required','min:3', new Alpha],
            'last_name' => ['required', new Alpha],
            'email' => 'required|email',
            'address' => 'required|min:15',
            'city' => ['required','min:3', new Alpha],
            'state' => ['required','min:3', new Alpha],
            'zip' => 'required|numeric',
            'mobile' => 'required|numeric|digits:11',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => false,
                'msg' => 'Please Fix The Error',
                'errors' => $validator->errors(),
            ]);
        }

        // 2 step Save Data  Customer Detail Table

        $user = Auth::user();
       

        CustomerDetail::updateOrCreate(
            ['user_id' => $user->id],
            [
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'address' => $request->address,
                'apartment' => $request->apartment,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'mobile' => $request->mobile,

            ]

        );

        // 3 step Save orders Data


      
       

       

        $subtotal = Cart::subtotal(2, '.', '');
        $grandTotal = $subtotal;

        $order = new Order();
        $order->user_id = $user->id;
        $order->grand_total = $grandTotal;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->apartment = $request->apartment;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->zip = $request->zip;
        $order->mobile = $request->mobile;
        $order->notes = $request->order_notes;
        $order->save();

        // 4 step Save order Items Data

        foreach (Cart::content() as $item) {
            $orderitem = new OrderItem();
            $orderitem->order_id = $order->id;
            $orderitem->product_id = $item->id;
            $orderitem->name = $item->name;
            $orderitem->qty = $item->qty;
            $orderitem->price = $item->price;
            $orderitem->total = $item->price * $item->qty;
            $orderitem->save();

            $product = Product::find($item->id);
            $currentqty = $product->qty;
            $updatedqty = $product->qty - $item->qty;
            $product->qty = $updatedqty;
            $product->save();
        }

       

      

        Cart::destroy();

        return response()->json([
            'status' => true,
            'msg' => 'Order placed Successfully',
            'orderId' => $order->id,
        ]);
    }

    public function ChangrStatus(Request $request , $id){


        $order = Order::find($id);

       

        $order->delivery_status = $request->status;
        $order->shipping_date = $request->shipping_date;
        $order->save();

        $message = "Order Status Changed Successfully";

        $request->session()->flash('success',$message);

        return response()->json([
         'status' => true,
         'msg' => $message,
        ]);
    }
}
