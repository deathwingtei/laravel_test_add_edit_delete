<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        // List to custoemr DB

        //Eloquent
        $customers = Customer::all();

        //Query Builder
        // $custoemr = DB::table('custoemr')->get();
   

        return view('customer',compact('customers'));
    }

    public function store_update(Request $request)
    {
        // validate value
        if($request->id!=""&&$request->id!=null&&$request->id!="0")
        {
            // validate value
            $request->validate(
                ['name' =>'required','email' =>'required','gender' =>'required','position' =>'required']
                ,['name.required' => 'Please Insert customer Name','email.required' => 'Please Insert Email'
                ,'gender.required' => 'Please Choose Gender','position.required' => 'Please Choose Position']
            );

            $decode_id = str_replace("dgtei","",base64_decode($request->id));
            // Eloquent
            $update = Customer::find($decode_id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'gender'=>$request->gender,
                'position'=>$request->position
            ]);

            return redirect()->route('customer')->with('success','Form Edited');
        }
        else
        {
            $request->validate(
                ['name' =>'required','email' => "required|unique:customers,email,$request->id",'gender' =>'required','position' =>'required']
                ,['name.required' => 'Please Insert customer Name','email.required' => 'Please Insert Email'
                ,'gender.required' => 'Please Choose Gender','position.required' => 'Please Choose Position']
            );
            
    
            // store to customer DB
    
            // Eloquent
            $customer = new Customer;
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->gender = $request->gender;
            $customer->position = $request->position;
            $customer->save();
        }
        return redirect()->back()->with('success','Form Added');
    }

    public function store(Request $request)
    {
        // validate value
        $request->validate(
             ['name' =>'required','email' =>'required','gender' =>'required','position' =>'required']
            ,['name.required' => 'Please Insert customer Name','email.required' => 'Please Insert Email'
            ,'gender.required' => 'Please Choose Gender','position.required' => 'Please Choose Position']
        );

        // store to customer DB

        // Eloquent
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->gender = $request->gender;
        $customer->position = $request->position;
        $customer->save();

        return redirect()->back()->with('success','Form Added');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        $customer->enc_id = base64_encode($customer->id."dgtei");
        return response()->json($customer);
    }

    
    public function update(Request $request,$id)
    {
        // validate value
        $request->validate(
            ['name' =>'required','email' =>'required','gender' =>'required','position' =>'required']
           ,['name.required' => 'Please Insert customer Name','email.required' => 'Please Insert Email'
           ,'gender.required' => 'Please Choose Gender','position.required' => 'Please Choose Position']
       );
        // Eloquent
        $update = Customer::find($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'gender'=>$request->gender,
            'position'=>$request->position
        ]);

        return redirect()->route('customer')->with('success','Form Edited');
    }

    public function softdelete($id)
    {
        // Eloquent
        $delete = Customer::find($id)->delete();

        return redirect()->route('customer')->with('success','Form Delete');
    }
    
    public function delete($id)
    {
        $delete = Customer::onlyTrashed()->find($id)->forceDelete();

        return redirect()->route('customer')->with('success','Force Delete');
    }
}