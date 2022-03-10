<?php

namespace App\Http\Controllers;

use App\Manager\SubscriberFizikManager;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;



class SubscriberFizikController extends Controller
{

    public function login()
    {
        // dd(session()->get('user'));
        if (!session()->has('user')) {
            return view('sfizik.loginPage', ['title' => 'Kirish']);
        } else {
            return redirect()->route('profile');
        }
    }

    public function customLogin(Request $request)
    {
        $username = $request->email;
        $password = $request->password;

        $userManager = new SubscriberFizikManager();
        $user = $userManager->customLogin($username, $password);
        // dd($user);

        if ($user) {
            $request->session()->put('user', $user);

            return response()->json([
                'status' => 1
            ]);
        } else {
            return response()->json([
                'status' => 0
            ]);
        }
    }

    public function register()
    {
        if (!session()->has('user')) {
            return view('sfizik.register', [
                'title' => 'Register'
            ]);
        } else {
            return redirect()->route('profile');
        }
    }

    public function customRegister(Request $request)
    {
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;
        $password = $request->password;
        $userRole = 2;
        $isActive = 1;

        $sfizikManager = new SubscriberFizikManager();
        // $userEmail = $sfizikManager->userProfile($email);
        $register = $sfizikManager->insertSubscriberFizik($firstname, $lastname, $email, $password, $userRole, $isActive);
        

        if ($register) {
            return response()->json([
                'status' => 1
            ]);
        } else {
            return response()->json([
                'status' => 0
            ]);
        }
    }

    public function profile()
    {

        // dd(session()->get('user'));
        if (session()->has('user')) {
            $userId = session()->get('user')[0]->id;
            // dd($userId);
            $profileManager = new SubscriberFizikManager();
            $profileList = $profileManager->profileManager($userId);

            return view('sfizik.profile', ['title' => 'Profile', 'profileList' => $profileList]);
        } else {
            return redirect()->route('login');
        }
    }

    public function editProfile($user_id)
    {
        $editManager = new SubscriberFizikManager();
        $editProfile = $editManager->editProfileManager($user_id);

        // dd($editProfile);
        return view('sfizik.updateProfile', [
            'title' => "Profileni o'zgartirish",
            'editProfile' => $editProfile
        ]);
    }

    public function updateProfile(Request $request)
    {
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;
        $password = $request->password;
        $userID = $request->session()->get('user')[0]->id;
        // dd($userID);
        $updateManager = new SubscriberFizikManager();
        $update = $updateManager->updateProfileManager($firstname, $lastname, $email, $password, $userID);

        if ($update) {
            return response()->json([
                'status' => 1
            ]);
        } else {
            return response()->json([
                'status' => 0
            ]);
        }
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }

}
