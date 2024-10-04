<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Style;
use App\Models\SubCategory;
use App\Models\TempImage;
use App\Rules\Alpha;
use App\Rules\GreaterZero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::latest('products.created_at')
            ->select('products.*', 'brands.name as brand_name', 'styles.name as style_name')
            ->leftJoin('brands', 'products.brand', '=', 'brands.id')
            ->leftJoin('styles', 'products.style', '=', 'styles.id')
            ->get();

        return view('Admin.Product.product', compact('products'));
    }
    public function productsall(Request $request)
    {

        $query = $request->input('search');

        $products = Product::where('name', 'LIKE', '%' . $query . '%')->get();

        // If it's an AJAX request, return JSON
        if ($request->ajax()) {
            return response()->json([
                'products' => $products,
            ]);
        }
        return view('allproducts', compact('products'));
    }

    public function getSubcategories(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        $subcategories = SubCategory::where('category_id', $request->category_id)->get(['id', 'name']);

        return response()->json([
            'status' => true,
            'subcategories' => $subcategories,
        ]);
    }

    public function create()
    {

        $products = Product::latest()->get();
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $brands = Brand::all();
        $styles = Style::all();

        return view("Admin.Product.create", compact('products', 'categories', 'sub_categories', 'brands', 'styles'));

    }

    public function store(Request $request)
    {

        if (!empty($request->img_array)) {
            $length = count($request->img_array);
            if ($length > 4) {
                return response()->json([
                    'ImageLimit' => false,
                    'error' => 'You can only upload a maximum of 4 images.',
                ]);
            }
        }
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:3', new Alpha],
            'description' => 'required|min:3',
            'slug' => 'required|unique:products',
            'category_id' => 'required|numeric',
            'subcategory_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
            'style_id' => 'required|numeric',
            'heigth' => ['required', 'numeric', new GreaterZero],
            'qty' => ['required', 'numeric', new GreaterZero],
            'width' => ['required', 'numeric', new GreaterZero],
            'depth' => ['required', 'numeric', new GreaterZero],
            'material' => 'required|min:3',
            'price' => ['required', 'numeric', new GreaterZero],
            'status' => 'required',

        ]);

        if ($validator->passes()) {

            $product = new Product();
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->category = $request->category_id;
            $product->sub_category = $request->subcategory_id;
            $product->description = $request->description;
            $product->qty = $request->qty;
            $product->brand = $request->brand_id;
            $product->style = $request->style_id;
            $product->hieght = $request->heigth;
            $product->width = $request->width;
            $product->depth = $request->depth;
            $product->material = $request->material;
            $product->price = $request->price;
            $product->status = $request->status;
            $product->save();

            // Images Here
            if (!empty($request->img_array)) {
                $length = count($request->img_array);
                if ($length > 4) {
                    return response()->json([
                        'ImageLimit' => false,
                        'error' => 'You can only upload a maximum of 4 images.',
                    ]);
                }

                foreach ($request->img_array as $tempimgid) {

                    $tempimginfo = TempImage::find($tempimgid);
                    $extArray = explode('.', $tempimginfo->image);
                    $ext = last($extArray);
                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->image = 'null';
                    $productImage->save();

                    $ImageName = $product->id . '-' . $productImage->id . '-' . time() . '.' . $ext;
                    $productImage->image = $ImageName;
                    $productImage->save();

                    // Generate thumbnail

                    //large
                    $Spath = public_path() . '/temp/' . $tempimginfo->image;
                    $dpath = public_path() . '/uploads/product/large/' . $ImageName;
                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($Spath);
                    $image->scaleDown(1400);
                    $image->save($dpath);

                    //small
                    $dpath = public_path() . '/uploads/product/small/' . $ImageName;
                    $image->cover(300, 300);
                    $image->save($dpath);
                }
            }

            $request->session()->flash('success', 'Product Added Successfully');

            return response()->json([
                'status' => true,
                'msg' => 'Product Added Successfully',
            ]);

        } else {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function edit(Request $request, $id)
    {

        $product = Product::find($id);
        $categories = Category::latest()->get();
        $sub_category = SubCategory::find($product->sub_category);
        $brands = Brand::latest()->get();
        $styles = Style::latest()->get();

        $productImage = ProductImage::where('product_id', $product->id)->get();

        if (empty($product)) {
            $request->session()->flash('error', 'Product Not Found');

            return redirect()->route("Admin.product");
        }

        return view('Admin.Product.edit', compact('product', 'categories', 'sub_category', 'brands', 'styles', 'productImage'));

    }
    public function DeleteImage(Request $request)
    {

        $productImage = ProductImage::find($request->id);
        if (empty($productImage)) {
            return response()->json([
                'status' => false,
                'msg' => 'Image not found',
            ]);
        }

        File::delete(public_path('uploads/product/large/' . $productImage->image));
        File::delete(public_path('uploads/product/small/' . $productImage->image));

        $productImage->delete();

        return response()->json([
            'status' => true,
            'msg' => 'Image Deleted Successfully',
        ]);
    }

    public function ImageUpdate(Request $request)
    {

        $ImageLength = ProductImage::where('product_id', $request->product_id)->count();

        if ($ImageLength == 4) {
            return response()->json([
                'ImageLimit' => false,
                'error' => 'You can only upload a maximum of 4 images.',
            ]);
        }

        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $Spath = $image->getPathName();

        $productImage = new ProductImage();
        $productImage->product_id = $request->product_id;
        $productImage->image = 'null';
        $productImage->save();

        $ImageName = $request->product_id . '-' . $productImage->id . '-' . time() . '.' . $ext;
        $productImage->image = $ImageName;
        $productImage->save();

        // Generate thumbnail

        //large
        $dpath = public_path() . '/uploads/product/large/' . $ImageName;
        $manager = new ImageManager(new Driver());
        $image = $manager->read($Spath);
        $image->scaleDown(1400);
        $image->save($dpath);

        //small
        $dpath = public_path() . '/uploads/product/small/' . $ImageName;
        $image->cover(300, 300);
        $image->save($dpath);
        return response()->json([
            'status' => true,
            'Image_id' => $productImage->id,
            'Image_path' => asset('uploads/product/small/' . $productImage->image),
            'msg' => 'Image Added Successfully',
        ]);

    }

    public function update(Request $request, $id)
    {

        $product = Product::find($id);

        if (empty($product)) {
            $request->session()->flash('error', 'Product Not Found');

            return redirect()->route("Admin.product");
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:3', new Alpha],
            'description' => 'required|min:3',
            'slug' => 'required|unique:products,slug,' . $product->id . ',id',
            'category_id' => 'required|numeric',
            'subcategory_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
            'style_id' => 'required|numeric',
            'heigth' => ['required', 'numeric', new GreaterZero],
            'qty' => ['required', 'numeric', new GreaterZero],
            'width' => ['required', 'numeric', new GreaterZero],
            'depth' => ['required', 'numeric', new GreaterZero],
            'material' => 'required|min:3',
            'price' => ['required', 'numeric', new GreaterZero],
            'status' => 'required',

        ]);
        if ($validator->passes()) {

            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->category = $request->category_id;
            $product->sub_category = $request->subcategory_id;
            $product->description = $request->description;
            $product->qty = $request->qty;
            $product->brand = $request->brand_id;
            $product->style = $request->style_id;
            $product->hieght = $request->heigth;
            $product->width = $request->width;
            $product->depth = $request->depth;
            $product->material = $request->material;
            $product->price = $request->price;
            $product->status = $request->status;
            $product->update();

            $request->session()->flash('success', 'Product Updated Successfully');

            return response()->json([
                'status' => true,
                'msg' => 'Product Updated Successfully',
            ]);

        } else {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }

    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);

        if (empty($product)) {
            $request->session()->flash('error', 'Product Not Found');

            return redirect()->route("Admin.product");
        }

        $productImages = ProductImage::where('product_id', $id)->get();

        if (!empty($productImages)) {
            foreach ($productImages as $productImage) {
                File::delete(public_path('uploads/product/large/' . $productImage->image));
                File::delete(public_path('uploads/product/small/' . $productImage->image));
            }
            ProductImage::where('product_id', $id)->delete();
        }

        $product->delete();

        $request->session()->flash('success', 'product Deleted Successfully');

        return response()->json([
            'status' => true,
            'msg' => 'product Deleted Successfully',
        ]);

    }

}
