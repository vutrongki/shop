<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    private $customer;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function register()
    {
        return view('frontend.register');
    }

    public function registerPost(Request $request)
    {
        $this->customer->firstOrCreate([
            'username' => $request->username,
            'password' => $request->password,
        ]);
        return back();
    }

    public function login()
    {
        return view('frontend.login');
    }

    public function loginPost(Request $request)
    {
        $customer = $this->customer->where('username', '=', $request->username)->first();
        if ($customer->password === $request->password) {
            session()->put('customer', $customer);
            if (session()->has('cart')) {
                return redirect()->route('checkout');
            } else {
                return redirect()->route('home.index');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
