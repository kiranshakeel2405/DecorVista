<?php

use App\Models\Category;
use App\Models\ProductImage;



 function Category(){

    $categories = Category::where('status',1)->get();
    
   

    return $categories;

}

function productImages($id){

    $productImages = ProductImage::where('product_id',$id)->first();

    return $productImages;

}


?>