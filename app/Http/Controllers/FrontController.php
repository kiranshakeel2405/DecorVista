<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Portfolio;
use App\Models\CustomerDetail;
use App\Models\Gallery;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {

        $blogs = Blog::where('status',1)->latest()->limit(4)->get();
        $products = Product::where('status',1)->latest()->limit(4)->get();
        $designer = User::where('role','designer')->latest()->limit(4)->get();
        $designers = User::where('role','designer')->get();
        $designs = Project::with('images')->get();
        $portfolios = Portfolio::all();
        // dd($designs);die;
        return view('index',compact('blogs','products','designer','designers','designs','portfolios'));
    }

    public function gallery()
    {

        $galleries = Gallery::where('status', 1)->with(['images', 'subcategory'])->get();

        return view('gallery', compact('galleries'));
    }

    public function contact()
    {

        return view('contact');
    }
    public function contactstore(Request $request)
    {
         // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function wishlist()
    {

        $user = Auth::user();

        $wishlists = Wishlist::where("user_id", $user->id)->with('product')->get();

        return view('wishlist', compact('wishlists'));
    }

    public function order()
    {

        $user = Auth::user();

        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();

        return view('orders', compact('orders'));
    }

    public function orderDetail($orderId)
    {

        $order = Order::find($orderId);

        $orderItems = OrderItem::where('order_id', $orderId)->get();
        $orderCounts = OrderItem::where('order_id', $orderId)->count();

        return view('order-detail', compact('order', 'orderItems', 'orderCounts'));
    }

    public function cart()
    {
        $cartItems = Cart::content();

        return view('cart', compact('cartItems'));
    }

    public function checkout()
    {
        if (Cart::count() == 0) {
            return redirect()->route('Front.cart');
        }

        if (Auth::check() == false) {

            if(!session()->has('url.intended')){
                session(['url.intended' => url()->current()]);
            }


            return redirect()->route('login');
        }

        $Customers = CustomerDetail::where('user_id', Auth::user()->id)->first();
   session()->forget('url.intended');
        return view('checkout', compact('Customers'));
    }

    public function about()
    {

        $galleries = collect(); // Initialize as a collection

        $subcategories = SubCategory::where('status', 1)->limit(4)->get();

        foreach ($subcategories as $subcategory) {
            $galleries = $galleries->merge(
                Gallery::where(['status' => 1, 'subCategory_id' => $subcategory->id])
                    ->with(['images', 'subcategory'])
                    ->get()
            );
        }

        return view('about', compact('galleries'));
    }

    public function blog()
    {
        $blogs = Blog::where('status', 1)->latest()->get();

        return view('blog', compact('blogs'));
    }

    public function blogDetail(Request $request, $id)
    {

        $blog = Blog::find($id);

        return view('blog-details', compact('blog'));
    }

    public function ProductDetail(Request $request, $id)
    {

        $product = Product::find($id);
        $comments = Comment::where('product_id', $id)->with('user')->get();

        return view('detail', compact('product', 'comments'));
    }

    public function design()
    {

        return view('design');
    }

    public function error()
    {

        return view('error');
    }

    public function category($slug)
    {
        $category = Category::where('id', $slug)->first();
        $galleries = collect(); // Initialize as a collection

        if (empty($category)) {
            return redirect()->route('Front.error');
        }

        $subcategories = SubCategory::where('status', 1)->where('category_id', $category->id)->get();

        foreach ($subcategories as $subcategory) {
            $galleries = $galleries->merge(
                Gallery::where(['status' => 1, 'subCategory_id' => $subcategory->id])
                    ->with(['images', 'subcategory'])
                    ->get()
            );
        }

        return view('category.detail', compact('category', 'galleries'));

    }

    public function showProducts($slug)
    {
        $subcategories = Subcategory::with(['products','images'])->where('slug',$slug)->get();
        return view('products', compact('subcategories'));
    }

}
