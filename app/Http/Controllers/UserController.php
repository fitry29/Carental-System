<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('pages.admin.user', ['users' => $users]);
    }

    public function showRegisterForm(){
        return view('auth.register');
    }

    public function create(){
        return view('pages.admin.register_user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|integer|in:0,1,2', // 0=Customer,1=Staff,2=Admin
            'phone' => 'required',
            'password' => 'required|string|min:6|',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
        ]);

        return redirect(route('users.index'))->with('success','Registration successful!');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required|string|min:6|',
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
        ]);
        // Auto login selepas daftar (optional)
        Auth::login($user);

        return redirect(route('login'))->with('success','Registration successful! Welcome');
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // penting untuk security

            //dd(Auth::user()->role, Auth::user()->role_label);

            // return redirect(route('customer.dashboard'))->with('success','Login successful! Welcome Back'); // redirect ke dashboard
            
            //Redirect based on role
            $role = Auth::user()->role_label; // guna accessor getRoleLabelAttribute()
            
            if (in_array($role, ['admin', 'staff'])) {
                return redirect()->route('dashboard')->with('success', 'Login successful! Welcome Back, Admin/Staff');
            } elseif ($role === 'customer') {
                return redirect()->route('customer.dashboard')->with('success', 'Login successful! Welcome Back, Customer');
            }

            // fallback (kalau ada role lain)
            return redirect()->route('login')->withErrors(['email' => 'Role not recognized']);
        }

        return back()->withErrors([
            'email' => 'Invalid credentials. Please try again.',
        ])->withInput(); // keep email input
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect(route('login'));
    }

    public function editUserPage($id){
        $users = User::find($id);
        return view('pages.admin.edit_user',['users' => $users]);
    }

    public function modifiedUser($id, Request $request){
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        $data->save();

        return redirect(route('users.index'))->with('success','Infomation updated successfully!');
    }

    public function deleteUser($id){
        $data = User::find($id);

        if ($data->role == 2) {
            return redirect()->back()->with('error', 'Admin cannot be deleted.');
        }

        $data->delete();
        return redirect(route('users.index'))->with('success','User removed successfully!');
    }

}
