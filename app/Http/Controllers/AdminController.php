<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempImage;
use App\Models\Blog;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{

     public function dashboard()
     {

        $lastBeforeDate = Carbon::now()->subDay(1)->format('Y-m-d H:i:s');
        $tempImages = TempImage::where('created_at', '<=', $lastBeforeDate)->get();

        foreach ($tempImages as $tempImage) {

            $path = public_path('/temp/' . $tempImage->image);
            $Thumbpath = public_path('/temp/thumb/' . $tempImage->image);
            if (File::exists($path)) {
                File::delete($path);
            }

            // Thmb Images Delete Here

            if (File::exists($Thumbpath)) {
                File::delete($Thumbpath);
            }
            TempImage::where('id', $tempImage->id)->delete();
        }
        $blogs = Blog::where('status',1)->latest()->limit(5)->get();

        $customers = User::where('role','user')->count();
        $orders = Order::latest()->limit(5)->get();
    
        $currentdate = Carbon::now()->format('Y-m-d');
        $thismonthstartDate = Carbon::now()->startOfMonth()->format('Y-m-d');
    
      
        $Reveneuthismonth = Order::where('delivery_status', '!=', "cancelled")
        ->whereDate('created_at', '>=', $thismonthstartDate)
        ->whereDate('created_at', '<=', $currentdate)
        ->sum('grand_total');
    
        $ThisDaySale = Order::where('delivery_status', '!=', "cancelled")
        ->whereDate('created_at', $currentdate)
        ->count();
    
    
        return view('Admin.dashboard',compact('blogs','customers','orders','Reveneuthismonth','ThisDaySale'));
        }

    public function profile(Request $request){

        $user =  $request->user();
        
        return view('Admin.Profile.profile',compact('user'));
        TempImage::where('id', $tempImage->id)->delete();
       
    }

   public function order(Request $request){
        $orders = Order::latest()->get();

        
        return view('Admin.Order.order',compact('orders'));
    }

    public function OrderDetail(Request $request , $id){

        $order = Order::find($id);

        if(empty($order)){

            return $request->session()->flash('error','Order Not Found');
        }

        $items = OrderItem::where('order_id',$id)->get();

        return view('Admin.Order.report',compact('order','items'));
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }

}