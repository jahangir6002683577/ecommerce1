<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Helper\JWTToken;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class UserController extends Controller
{
    // BackendUserController

    public function product_list_page()
    {
        return view('backend.pages.products.product_list');
    }
    public function LoginPage()
    {
        return view('frontend.auth.login_form');
    }
    public function user_dashboard()
    {
        return view('layout.sidenav-layout');
    }
    public function userRegistration_form()
    {
        return view('frontend.auth.registration_form');
    }

    public function user_registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required|in:admin,vendor,customer',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        try {
            User::create([
                'name' => $request->input('name'),
                'mobile' => $request->input('mobile'),
                'password' => $request->input('password'),
                'role' => $request->input('role'),
            ]);

            return response()->json(['message' => 'Registared', 'status' => 'success'], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Registration failed' . $e->getMessage()], 500);
        }
    }


    public function UserLogin(Request $request)
    {
        $mobile = $request->input('mobile');
        $password = $request->input('password');

        $count = User::where('mobile', $mobile)
            ->where('password', $password)
            ->select('id')->first();
        // dd($count);
        if ($count !== null) {
            $token = JWTToken::CreateToken($mobile, $count->id);
            // return $token;

            return response()->json([
                'status' => 'success',
                'massege' => 'Login success',
                'token' => $token
            ])->cookie('token', $token, 60 * 24 * 30);
        } else {
            return response()->json(['status' => 'fail', 'messege' => 'login failled']);
        }
    }
    public function Logout()
    {
        return redirect('/login')->cookie('token', '', -1);
    }

}
