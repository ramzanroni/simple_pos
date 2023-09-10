<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{
    function allSupplier()
    {
        $suppliers = Supplier::latest()->get();
        return view('backend.supplier.all_supplier', compact('suppliers'));
    }
     // addSupplier
     function addSupplier()
     {
         return view('backend.supplier.add_supplier');
     }
      // storeSupplier
    function storeSupplier(Request $request){
        $validateData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:suppliers|max:200',
                'phone' => 'required|max:200',
                'address' => 'required|max:400',
                'shopname' => 'required|max:400',
                'account_holder' => 'required',
                'account_number' => 'required',
                'bank_name' => 'required',
                'type' => 'required',
                'bank_branch' => 'required',
                'city' => 'required',
                'supplierImg' => 'required',
            ],
            [
                'name.required' => 'Supplier name must needed',
                'email.required' => 'Supplier email must needed and valid',
                'phone.required' => 'Supplier phone must needed',
                'address.required' => 'Supplier address must needed',
                'type.required' => 'Supplier type must needed',
                'shopname.required' => 'Supplier shopname must needed',
                'account_holder.required' => 'Supplier account holder must needed',
                'account_number.required' => 'Supplier account number must needed',
                'bank_name.required' => 'Supplier bank name must needed',
                'bank_branch.required' => 'Supplier bank branch must needed',
                'city.required' => 'Supplier city must needed',
                'supplierImg.required' => 'Supplier image must needed and type must be jpg/png/jpeg',
            ]
        );
        $image = $request->file('supplierImg');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/supplier_image/' . $name_gen);
        $save_url = 'upload/supplier_image/' . $name_gen;
        Supplier::insert(
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'shopname' => $request->shopname,
                'image' => $save_url,
                'type' => $request->type,
                'account_holder' => $request->account_holder,
                'account_number' => $request->account_number,
                'bank_name' => $request->bank_name,
                'bank_branch' => $request->bank_branch,
                'city' => $request->city,
                'created_at' =>Carbon::now()
            ],
        );
        $notification = [
            'message' => 'Supplier Added Success',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('all.supplier')
            ->with($notification);
    }

     // editSupplier
     function editSupplier($id)
     {
         $supplierData = Supplier::findOrFail($id);
         return view('backend.supplier.edit_supplier', compact('supplierData'));
     }

      // updateCustomer

    function updateSupplier(Request $request){
        $validateData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|max:200',
                'phone' => 'required|max:200',
                'address' => 'required|max:400',
                'type' => 'required',
                'shopname' => 'required|max:400',
                'account_holder' => 'required',
                'account_number' => 'required',
                'bank_name' => 'required',
                'bank_branch' => 'required',
                'city' => 'required'
            ],
            [
                'name.required' => 'Supplier name must needed',
                'email.required' => 'Supplier email must needed and valid',
                'phone.required' => 'Supplier phone must needed',
                'address.required' => 'Supplier address must needed',
                'type.required' => 'Supplier type must needed',
                'shopname.required' => 'Supplier shopname must needed',
                'account_holder.required' => 'Supplier account holder must needed',
                'account_number.required' => 'Supplier account number must needed',
                'bank_name.required' => 'Supplier bank name must needed',
                'bank_branch.required' => 'Supplier bank branch must needed',
                'city.required' => 'Supplier city must needed'
            ]
        );
        $findSupplier=Supplier::find($request->id);
        if($request->file('customerImg') !=''){
            @unlink(public_path($findSupplier->image));
            $image = $request->file('customerImg');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/supplier_image/' . $name_gen);
            $save_url = 'upload/supplier_image/' . $name_gen;
            $findSupplier->image=$save_url;
        }
        $findSupplier->name=$request->name;
        $findSupplier->email=$request->email;
        $findSupplier->phone=$request->phone;
        $findSupplier->address=$request->address;
        $findSupplier->type=$request->type;
        $findSupplier->shopname=$request->shopname;
        $findSupplier->account_holder=$request->account_holder;
        $findSupplier->account_number=$request->account_number;
        $findSupplier->bank_name=$request->bank_name;
        $findSupplier->bank_branch=$request->bank_branch;
        $findSupplier->city=$request->city;
        $findSupplier->updated_at=Carbon::now();
        $findSupplier->save();
        $notification = [
            'message' => 'Supplier Update Success',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('all.supplier')
            ->with($notification);
    }

      // deleteCustomer
      function deleteSupplier($id){
        $findImage=Supplier::findOrFail($id);
        $image=$findImage->image;
        if($image!=''){
            unlink($image);
        }
        Supplier::findOrFail($id)->delete();
        $notification = [
            'message' => 'Supplier Delete Success',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('all.supplier')
            ->with($notification);
    }

    // detailsSupplier
    public function detailsSupplier($id){
        $supplierData = Supplier::findOrFail($id);
        return view('backend.supplier.details_supplier', compact('supplierData'));
    }
}
