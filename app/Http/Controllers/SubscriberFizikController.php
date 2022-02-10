<?php

namespace App\Http\Controllers;

use App\Manager\SubscriberFizikManager;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;

class SubscriberFizikController extends Controller
{

    public function login() {

        return view('sfizik.loginPage', ['title' => 'Login Page']);
    }

    // public function customLogin(Request $request) {
    //     $email = $request->email;
    //     $password = $request->password;

    //     $userManager = new SubscriberFizikManager();
    //     $userList = $userManager->customLogin($email, $password);
    //     if (empty($email)||empty($password)) {
    //         return response()->json(['error'=>'Email or Password must not be empty!']);
    //     }

    //     if (!$userList) {
    //         return response()->json(['error'=>'User is not registered!']);
    //     }
        
    //     if (Auth::attempt(['username' => $email, 'password' => $password])) {
    //         return response()->json(['success'=>'Login Successful!']);
    //     }

    //     return response()->json(['error'=>'Ooops! something went wrong!']);
    // }

    // public function logout(Request $request) {
    //     Auth::logout();
    //     return redirect('/login');
    //   }

    public function customLogin(Request $request)
    {
        $username = $request->email;
        $password = $request->password;

        if (empty($username) || empty($password)) {
            return response()->json([
                'error' => 'Maydonlarni tuldiring...'
            ]);
        }

        $userManager = new SubscriberFizikManager();
        $userList = $userManager->customLogin($username, $password);
        
        
        if (!empty($userList)) {
            $request->session()->put('subscriber', $userList);
            // dd($request->session()->get('subscriber'));
            return response()->json([
                'success' => 'Siz tizimga kirdingiz',
                'status' => true
            ]);
        }

    }

    public function register() {
        return view('sfizik.register', [
            'title' => 'Royhatdan otish'
        ]);

    }

    public function customRegister(Request $request) {
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;
        $password = $request->password;
        $userRole = 2;
        $isActive = 1;
     
        if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
            return response()->json([
                'error' => 'Maydonlarni tuldiring...'
            ]);
        }
        
            $sfizikManager = new SubscriberFizikManager();
            
            $register = $sfizikManager->insertSubscriberFizik($firstname, $lastname, $email, $password, $userRole, $isActive);
            
            if ($register) {
                return response()->json([
                    'success' => 'Siz royhatdan otdingiz',
                    'status' => true,
                ]);
            }
            else {
                return response()->json([
                    'error' => 'Siz royhatdan ota olmadingiz'
                ]);
            }
        

    }

    public function profile() {
        
        // dd($profileList);
        if (session()->has('subscriber')) {
            $userId = session()->get('subscriber')[0]->id; 
        // dd($subscriberUser);
            $profileManager = new SubscriberFizikManager();
            $profileList = $profileManager->profileManager($userId);
            
            return view('sfizik.profile', ['title' => 'Profile', 'profileList' => $profileList]); 
        }
        else {
            return redirect()->route('login');
        }
        
    }

    public function logout() {
        session()->forget('subscriber');
        return redirect()->route('login');
    }

}
