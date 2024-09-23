<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ManagementController extends Controller
{
    public function index()
    {
        $managers = User::where('role', 'manager')->get();
        return view('dashboard.management.auth.register', compact('managers'));
    }

    public function store_register(Request $request)
    {
        $role = ucfirst($request->role);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => 'required|in:manager,blogger,user',
        ]);


        if (!$request->role == "") {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => $request->role,
            ]);
            return back()->with("register_complete", "$role Register Complete");
        } else {
            return back()->withErrors(['role' => 'please, select role first '])->withInput();
        }
    }
    public function manager_down($id)
    {

        $manager = User::where('id', $id)->first();


        if ($manager->role == 'manager') {
            User::find($manager->id)->update([
                'role' => 'user',
                'updated_at' => now(),
            ]);
            return back()->with('register_complete', "Manager Demotion Successful");
        }
    }



    // role manage

    public function role_index()
    {

        $users = User::where('role', 'user')->where('block', false)->get();
        $block_items = User::where('role', 'user')->where('block', true)->get();
        $bloggers = User::where('role', 'blogger')->get();

        return view('dashboard.management.role.index', compact('users', 'bloggers', 'block_items'));
    }


    public function role_assign(Request $request)
    {

        $request->validate([
            'role' => 'required|in:manager,blogger,user',
        ]);

        $user = User::where('id', $request->user_id)->first();

        User::find($user->id)->update([
            'role' => $request->role,
            'updated_at' => now(),
        ]);

        Session::flash("role_assign", "Role Assign Successful");
        return back();
    }

    public function blogger_down($id)
    {


        $user = User::where('id', $id)->first();

        if ($user->role == 'blogger') {
            User::find($user->id)->update([
                'role' => 'user',
                'updated_at' => now(),
            ]);
            Session::flash('role_assign', 'Role Down Successful');

            return back();
        }
    }

    public function user_down($id)
    {

        $user = User::where('id', $id)->first();


        if ($user->role == 'user') {
            User::find($user->id)->update([
                'block' => true,
                'updated_at' => now(),
            ]);
            Session::flash('role_assign', 'Block This User Successful');
            return back();
        }
    }


    // public function block_list()
    // {
    //     $items = User::where('role', 'user')->where('block', true)->get();

    //     return view('dashboard.management.role.index', compact('items'));

    // }



}
