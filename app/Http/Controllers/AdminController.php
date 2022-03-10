<?php

namespace App\Http\Controllers;

use App\Manager\AdminManager;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login() {
        return view('admin.login');
    }

    public function adminLogin(Request $request) {
        $login = $request->login;
        $password = $request->password;
        $role = 3;
        $adminManager = new AdminManager();
        $admin = $adminManager->adminLoginManager($login, $password, $role);

        if ($admin) {
            $request->session()->put('admin', $admin);
            return response()->json([
                'status' => 1
            ]);
        } else {
            return response()->json([
                'status' => 0
            ]);
        }
    }

    public function adminLogout() {
        session()->forget('admin');
        return redirect()->route('admin.login');
    }
}
