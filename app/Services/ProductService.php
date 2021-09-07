<?php


namespace App\Services;


use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductService
{
    public function allProducts()
    {
//        return DB::table('customers')->get();
        return Product::all();
    }

    public function storeProduct(
        string $name,
        string $description,
        string $status
    )
    {
        try {
            Product::create([
                'name' => $name,
                'description' => $description,
                'status' => $status,
                'user_id' => Auth::user()->id,
            ]);

            return redirect()->route('products')->with('success', 'Product Created Successfully.');

        } catch (\Exception $exception) {
            return redirect()->route('products')->with('error', 'Error '.$exception->getMessage());
        }
    }

    public function updateProduct(
        $product,
        string $name,
        string $description,
        string $status
    )
    {
        try {
            $product->update([
                $product->name => $name,
                $product->description => $description,
                $product->status => $status,
            ]);

            return view('dashboard.products')->with('success', 'Product updated Successfully.');

        }catch (\Exception $exception){
            return redirect()->route('products')->with('error', 'Error ' . $exception->getMessage());
        }
    }


}
