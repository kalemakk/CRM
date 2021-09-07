<?php


namespace App\Services;


use App\Models\Product;

class ProductService
{
    public function allProducts()
    {
//        return DB::table('customers')->get();
        return Product::all();
    }

    public function storeProduct(
        string $name,
        string $date_of_birth,
        string $email,
        string $nationality,
        string $village,
        string $district,
        string $street,
        string $nin
    )
    {
        try {
            Product::create([
                'name' => $name,
                'date_of_birth' => $date_of_birth,
                'email' => $email,
                'village' => $village,
                'district' => $district,
                'street' => $street,
                'nationality' => $nationality,
                'nin' => $nin,
                'user_id' => Auth::user()->id,
            ]);

            return redirect()->route('customers')->with('success', 'Customer Created Successfully.');

        } catch (\Exception $exception) {
            return redirect()->route('customers')->with('error', 'Error '.$exception->getMessage());
        }
    }

    public function updateProduct(
        $product,
        string $name,
        string $date_of_birth,
        string $email,
        string $nationality,
        string $village,
        string $district,
        string $street,
        string $nin
    )
    {
        try {
            $product->update([
                $product->name => $name,
                $product->date_of_birth => $date_of_birth,
                $product->email => $email,
                $product->village => $village,
                $product->district => $district,
                $product->street => $street,
                $product->nationality => $nationality,
                $product->nin => $nin,
            ]);

            return view('dashboard.customers')->with('success', 'Customer updated Successfully.');

        }catch (\Exception $exception){
            return redirect()->route('customers')->with('error', 'Error ' . $exception->getMessage());
        }
    }


}
