<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getCustomers(){
        $customers = $this->customerService->allCustomers();
        return view('dashboard.customers',compact('customers'));
    }

    public function showCustomer(Customer $customer){
        return view('dashboard.customer',compact('customer'));
    }

    public function storeCustomer(StoreCustomer $request){

        return $this->customerService->storeCustomer(
            $request->name,
            $request->date_of_birth,
            $request->email,
            $request->village,
            $request->district,
            $request->street,
            $request->nationality,
            $request->nin,
        );
    }

    public function updateCustomer(StoreCustomer $request, Customer $customer){
        return $this->customerService->updateCustomer(
            $customer,
            $request->name,
            $request->date_of_birth,
            $request->email,
            $request->village,
            $request->district,
            $request->street,
            $request->nationality,
            $request->nin,
        );
    }

    public function deleteCustomer(Customer $customer){
        $customer->delete();
        return view('dashboard.customers')->with('success','Customer Deleted Successfully.');
    }
}
