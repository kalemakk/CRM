<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getProducts(){
        $products = $this->productService->allProducts();
        return view('dashboard.products',compact('products'));
    }

    public function showProduct(Product $product){
        return view('dashboard.product',compact('product'));
    }

    public function storeProduct(Request $request){

        return $this->productService->storeProduct(
            $request->name,
            $request->description,
            $request->status,
        );
    }

    public function updateProduct(Request $request, Product $product){
        return $this->productService->updateProduct(
            $product,
            $request->name,
            $request->description,
            $request->status,
        );
    }

    public function deleteProduct(Product $product){
        $product->delete();
        return view('dashboard.products')->with('success','Product Deleted Successfully.');
    }
}
