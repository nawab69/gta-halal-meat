<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminPassController extends BaseController
{


    public function update(Request $request){


        $admin = Admin::where('id',1)->first();

        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->update();
        return $this->responseRedirectBack('Admin updated successfully' ,'success',false, false);
    }
}
