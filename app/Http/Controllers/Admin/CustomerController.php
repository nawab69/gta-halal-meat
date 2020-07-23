<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;

class CustomerController extends BaseController
{
    public function index()
    {
        $customers = DB::table('orders')->select('email','first_name','last_name','phone_number')->groupBy('email','first_name','last_name','phone_number')->get();

        $this->setPageTitle('Customers', 'List of all Customers');
        return view('admin.customers.index', compact('customers'));
    }
}
