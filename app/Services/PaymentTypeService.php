<?php


namespace App\Services;


use App\Models\PaymentType;

class PaymentTypeService
{
    public function allPaymentTypes()
    {
//        return DB::table('customers')->get();
        return PaymentType::all();
    }

    public function storePaymentType(
        string $name,
        string $status
    )
    {
        try {
            PaymentType::create([
                'name' => $name,
                'status' => $status,
                'user_id' => Auth::user()->id,
            ]);

            return redirect()->route('payment-types')->with('success', 'Product Created Successfully.');

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
