<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    // allCustomer
    function allCustomer(){
        $customers=Customer::latest()->get();
        return view('backend.customer.all_customer', compact('customers'));
    }

    // addCustomer
    function addCustomer(){
        return view('backend.customer.add_customer');
    }
    // storeCustomer
    function storeCustomer(Request $request){
        $validateData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:employees|max:200',
                'phone' => 'required|max:200',
                'address' => 'required|max:400',
                'shopname' => 'required|max:400',
                'account_holder' => 'required',
                'account_number' => 'required',
                'bank_name' => 'required',
                'bank_branch' => 'required',
                'city' => 'required',
                'customerImg' => 'required',
            ],
            [
                'name.required' => 'Customer name must needed',
                'email.required' => 'Customer email must needed and valid',
                'phone.required' => 'Customer phone must needed',
                'address.required' => 'Customer address must needed',
                'shopname.required' => 'Customer shopname must needed',
                'account_holder.required' => 'Customer account holder must needed',
                'account_number.required' => 'Customer account number must needed',
                'bank_name.required' => 'Customer bank name must needed',
                'bank_branch.required' => 'Customer bank branch must needed',
                'city.required' => 'Customer city must needed',
                'customerImg.required' => 'Customer image must needed and type must be jpg/png/jpeg',
            ]
        );
        $image = $request->file('customerImg');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/customer_image' . $name_gen);
        $save_url = 'upload/customer_image' . $name_gen;
        Customer::insert(
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'shopname' => $request->shopname,
                'image' => $save_url,
                'account_holder' => $request->account_holder,
                'account_number' => $request->account_number,
                'bank_name' => $request->bank_name,
                'bank_branch' => $request->bank_branch,
                'city' => $request->city,
                'created_at' =>Carbon::now()
            ],
        );
        $notification = [
            'message' => 'Customer Added Success',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('all.customer')
            ->with($notification);
    }
}
