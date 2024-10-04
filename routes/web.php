<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\DesignerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TempImageController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;




Route::get('/',[FrontController::class,'index'])->name('Front.index');
Route::get('/Gallery',[FrontController::class,'gallery'])->name('Front.gallery');
Route::get('/About-Us',[FrontController::class,'about'])->name('Front.about');
Route::get('/Contact-Us',[FrontController::class,'contact'])->name('Front.contact');
Route::post('/ContactUs/store',[FrontController::class,'contactstore'])->name('Front.contact.store');
Route::get('/Blogs',[FrontController::class,'blog'])->name('Front.blog');
Route::get('/Blog-Detail/{id}',[FrontController::class,'blogDetail'])->name('Front.blog.detail');
Route::get('/Design',[FrontController::class,'design'])->name('Front.design');
Route::get('/404',[FrontController::class,'error'])->name('Front.error');
Route::get('/Cart',[FrontController::class,'cart'])->name('Front.cart');
Route::get('/Category/{slug}', [FrontController::class, 'category'])->name('Front.category');
Route::get('/Product-Detail/{id}', [FrontController::class, 'ProductDetail'])->name('Front.product.detail');
Route::post('/Proceed',[OrderController::class,"proceed"])->name("Proceed");
Route::get('/AllProducts/{slug}', [FrontController::class, 'showProducts'])->name('subcategory.products');
Route::get('/Shop-Products', [ProductController::class, 'productsall'])->name('productsall');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Order Routes

// Cart Routes
Route::post('/Add-To-Cart',[CartController::class,"AddtoCart"])->name("AddtoCart");
Route::post('/Update-Cart',[CartController::class,"UpdateCart"])->name("Update.Cart");
Route::post('/Input-Update-Cart',[CartController::class,"CheckCart"])->name("Check.Cart");
Route::post('/Delete-Cart',[CartController::class,"DeleteCart"])->name("Delete.Cart");

// Wishlist Route
Route::post('/Store-Wishlist', [WishlistController::class, 'store'])->name('Store.Wishlist');
Route::delete('/Remove-Wishlist/{id}', [WishlistController::class, 'destroy'])->name('Remove.Wishlist');


Route::get('/Checkout',[FrontController::class,'checkout'])->name('Front.chekout');

// Profile Route

Route::get('/My-Designer-Portfolio/{id}',[BookingController::class,'index'])->name('Front.designer.detail');
Route::get('/ProjectDetail/{id}',[BookingController::class,'ProjectDetail'])->name('ProjectDetail');
Route::get('/ProjectDetailsAjax/{id}',[BookingController::class,'ProjectDetailsAjax'])->name('ProjectDetailsAjax');


Route::middleware('auth')->group(function () {
Route::get('/My-Wishlist',[FrontController::class,'wishlist'])->name('Front.wishlist');
Route::get('/My-Orders',[FrontController::class,'order'])->name('Front.order');
Route::get('/My-Order-Report/{id}',[FrontController::class,'orderDetail'])->name('Front.order.detail');
Route::get('/My-Booking/{id}',[BookingController::class,'create'])->name('Front.designer.booking');
Route::post('/Booking-Time',[BookingController::class,'show'])->name('Front.designer.booking.time');
Route::post('/Booking-Store',[BookingController::class,'store'])->name('Front.designer.booking.store');


});










Route::post('/Store-comments', [CommentController::class, 'store'])->name('comments.store');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});








Route::get('/my-design', function () {
    return view('my-design');
});

Route::get('/designer-detail-1', function () {
    return view('designers.designer-detail-1');
});

Route::get('/designer-detail-2', function () {
    return view('designers.designer-detail-2');
});

Route::get('/designer-detail-3', function () {
    return view('designers.designer-detail-3');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/order-detail', function () {
    return view('order-detail');
});

Route::get('/booking', function () {
    return view('booking');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Admin Profils


Route::group(['middleware' => ['auth','role-access']], function () {

Route::get('/Admin/My-Profile',[AdminController::class,'profile'])->name('Admin.profile');

Route::get('/Admin/Dashboard',[AdminController::class,'dashboard'])->name('Admin.dashboard');
Route::get('/Admin/Order',[AdminController::class,'order'])->name('Admin.order');
Route::get('/Admin/Order-Report/{id}',[AdminController::class,'orderDetail'])->name('Admin.order.report');

// Category Routes

Route::get('/Admin/Category',[CategoryController::class,'index'])->name('Admin.category');
Route::get('/Admin/Create-Category',[CategoryController::class,'create'])->name('Admin.category.create');
Route::post('/Admin/Store-Category',[CategoryController::class,'store'])->name('Admin.category.store');
Route::get('/Admin/Edit-Category,/{id}',[CategoryController::class,'edit'])->name('Admin.category.edit');
Route::post('/Admin/Update-Category,/{id}',[CategoryController::class,'update'])->name('Admin.category.update');
Route::delete('/Admin/Delete-Category,/{id}',[CategoryController::class,'destroy'])->name('Admin-category-delete');
// Brand Routes

Route::get('/Admin/Brand',[BrandController::class,'index'])->name('Admin.brand');
Route::get('/Admin/Create-Brand',[BrandController::class,'create'])->name('Admin.brand.create');
Route::post('/Admin/Store-Brand',[BrandController::class,'store'])->name('Admin.brand.store');
Route::get('/Admin/Edit-Brand,/{id}',[BrandController::class,'edit'])->name('Admin.brand.edit');
Route::post('/Admin/Update-Brand,/{id}',[BrandController::class,'update'])->name('Admin.brand.update');
Route::delete('/Admin/Delete-Brand,/{id}',[BrandController::class,'destroy'])->name('Admin-brand-delete');


//Style Routes
Route::get('/Admin/Style',[StyleController::class,'index'])->name('Admin.style');
Route::get('/Admin/Create-Style',[StyleController::class,'create'])->name('Admin.style.create');
Route::post('/Admin/Store-Style',[StyleController::class,'store'])->name('Admin.style.store');
Route::get('/Admin/Edit-Style,/{id}',[StyleController::class,'edit'])->name('Admin.style.edit');
Route::post('/Admin/Update-Style,/{id}',[StyleController::class,'update'])->name('Admin.style.update');
Route::delete('/Admin/Style-Category,/{id}',[StyleController::class,'destroy'])->name('Admin-style-delete');


// blog routes
Route::get('/Admin/Blog',[BlogController::class,'index'])->name('Admin.Blog');
Route::get('/Admin/Create-Blog',[BlogController::class,'create'])->name('Admin.Blog.create');
Route::post('/Admin/Store-Blog',[BlogController::class,'store'])->name('Admin.Blog.store');
Route::get('/Admin/Edit-Blog/{id}',[BlogController::class,'edit'])->name('Admin.Blog.edit');
Route::post('/Admin/Update-Blog/{id}',[BlogController::class,'update'])->name('Admin.Blog.update');
Route::delete('/Admin/Delete-Blog/{id}',[BlogController::class,'destroy'])->name('Admin-Blog-delete');


// Sub Category Routes
Route::get('/Admin/Sub-Category',[SubCategoryController::class,'index'])->name('Admin.sub-category');
Route::get('/Admin/Create-Sub-Category',[SubCategoryController::class,'create'])->name('Admin.sub-category.create');
Route::post('/Admin/Store-Sub-Category',[SubCategoryController::class,'store'])->name('Admin.sub-category.store');
Route::get('/Admin/Edit-Sub-Category/{id}',[SubCategoryController::class,'edit'])->name('Admin.sub-category.edit');
Route::post('/Admin/Update-Sub-Category/{id}',[SubCategoryController::class,'update'])->name('Admin.sub-category.update');
Route::delete('/Admin/Delete-Sub-Category,/{id}',[SubCategoryController::class,'destroy'])->name('Admin.sub-category.delete');
 
// Users Routes
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/create', [UserController::class, 'create'])->name('Admin.users.create');
Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('Admin.users.edit');
Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

// Gallery Routes
Route::get('/Admin/Gallery',[GalleryController::class,'index'])->name('Admin.gallery');
Route::get('/Admin/Create-Gallery',[GalleryController::class,'create'])->name('Admin.gallery.create');
Route::post('/Admin/Store-Gallery',[GalleryController::class,'store'])->name('Admin.gallery.store');
Route::get('/Admin/Edit-Gallery/{id}',[GalleryController::class,'edit'])->name('Admin.gallery.edit');
Route::delete('/Admin/Delete-Gallery-Image/',[GalleryController::class,'DeleteImage'])->name('Admin.gallery.delete.image');
Route::post('/Admin/Update-Gallery-Image/',[GalleryController::class,'ImageUpdate'])->name('Admin.gallery.update.image');
Route::post('/Admin/Update-Gallery/{id}',[GalleryController::class,'update'])->name('Admin.gallery.update');
Route::delete('/Admin/Delete-Gallery,/{id}',[GalleryController::class,'destroy'])->name('Admin.gallery.delete');
Route::get('/Admin/View-Gallery,/{id}',[GalleryController::class,'show'])->name('Admin.gallery.view');

//product route

Route::get('/Admin/Product',[ProductController::class,'index'])->name('Admin.product');
Route::get('/Admin/Create-Product',[ProductController::class,'create'])->name('Admin.product.create');
Route::post('/Admin/Store-Product',[ProductController::class,'store'])->name('Admin.product.store');
Route::get('/Admin/Edit-Product/{id}',[ProductController::class,'edit'])->name('Admin.product.edit');
Route::delete('/Admin/Delete-Product-Image/',[ProductController::class,'DeleteImage'])->name('Admin.product.delete.image');
Route::post('/Admin/Update-Product-Image/',[ProductController::class,'ImageUpdate'])->name('Admin.product.update.image');
Route::post('/Admin/Update-Product/{id}',[ProductController::class,'update'])->name('Admin.product.update');
Route::delete('/Admin/Delete-Product,/{id}',[ProductController::class,'destroy'])->name('Admin-product-delete');
Route::get('/get-subcategories', [ProductController::class, 'getSubcategories'])->name('getSubcategories');
});


Route::post('/Admin/Temp-Images', [TempImageController::class, 'create'])->name('Temp-image');
//Designer Controller
Route::get('/Designer/My-Profile',[DesignerController::class,'profile'])->name('designer.profile');
Route::get('/Designer/Dashboard',[DesignerController::class,'dashboard'])->name('designer.dashboard');
// Route to display the form for creating a new portfolio
Route::get('/Designer/Create-Designer', [DesignerController::class, 'create'])->name('Designer.Portfolio.create');
Route::get('/Designer/Edit-Designer/{id}', [DesignerController::class, 'edit'])->name('Designer.Portfolio.edit');
Route::post('/portfolio/store', [DesignerController::class, 'store'])->name('portfolio.store');
Route::put('/portfolio/update/{id}', [DesignerController::class, 'update'])->name('portfolio.update');

Route::get('/Designer/portfolios', [DesignerController::class, 'portfolio'])->name('portfolio.index');
Route::delete('/portfolios/{id}', [DesignerController::class, 'destroy'])->name('portfolio.delete');
// Designer Routes
Route::get('/Designer/Project',[ProjectController::class,'index'])->name('Designer.project');
Route::get('/Designer/Create-Project',[ProjectController::class,'create'])->name('Designer.project.create');
Route::post('/Designer/Store-Project',[ProjectController::class,'store'])->name('Designer.project.store');
Route::get('/Designer/Edit-Project/{id}',[ProjectController::class,'edit'])->name('Designer.project.edit');
Route::delete('/Designer/Delete-Project-Image/',[ProjectController::class,'DeleteImage'])->name('Designer.project.delete.image');
Route::post('/Designer/Update-Project-Image/',[ProjectController::class,'ImageUpdate'])->name('Designer.project.update.image');
Route::post('/Designer/Update-Project/{id}',[ProjectController::class,'update'])->name('Designer.project.update');
Route::delete('/Designer/Delete-Project/{id}',[ProjectController::class,'destroy'])->name('Designer.project.delete');

//Consultation Routes

Route::get('/consultations/create', [ConsultationController::class, 'create'])->name('consultations.create');
Route::post('/consultations/store', [ConsultationController::class, 'store'])->name('consultations.store');
Route::get('/consultations', [ConsultationController::class, 'index'])->name('consultations.index');
Route::get('/consultations/Edit/{id}', [ConsultationController::class, 'edit'])->name('consultations.edit');
Route::put('/consultations/Update/{id}', [ConsultationController::class, 'update'])->name('consultations.update');
Route::delete('/consultations/Delete/{id}',[ConsultationController::class,'destroy'])->name('consultations.destroy');



// Projects Routes


// Order
Route::post('/Admin/Change-Status/{id}', [OrderController::class, 'ChangrStatus'])->name('Change.Order.Status');




Route::post('/Admin/Temp-Images', [TempImageController::class, 'create'])->name('Temp-image');

Route::get('Admin/getSlug', function(Request $request){

    $slug ='';
 if(!empty($request->input('title'))){
    $slug = Str::slug($request->input('title'));
 }
 return response()->json([
    'status' => true,
    'slug' => $slug,
 ]);

 
})->name('GetSlug');

require __DIR__.'/auth.php';