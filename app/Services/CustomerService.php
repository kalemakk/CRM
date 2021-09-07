<?php


namespace App\Services;

use App\Models\Customer;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerService
{
    public function allCustomers()
    {
//        return DB::table('customers')->get();
        return Customer::with('user')->get();
    }

    public function storeCustomer(
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
            Customer::create([
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

    public function updateCustomer(
        $customer,
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
            $customer->update([
                $customer->name => $name,
                $customer->date_of_birth => $date_of_birth,
                $customer->email => $email,
                $customer->village => $village,
                $customer->district => $district,
                $customer->street => $street,
                $customer->nationality => $nationality,
                $customer->nin => $nin,
            ]);

            return view('dashboard.customers')->with('success', 'Customer updated Successfully.');

        }catch (\Exception $exception){
            return redirect()->route('customers')->with('error', 'Error ' . $exception->getMessage());
        }
    }


}
