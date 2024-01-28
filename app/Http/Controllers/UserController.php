<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::with('roles')->get();
        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('user.add', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameuser' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|array',
        ]);

        $user = new User;
        $user->name = $request->nameuser;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $roleNames = Role::whereIn('id', $request->role)->pluck('name')->all();
        $user->syncRoles($roleNames);

        return redirect('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $userRoles = DB::table('model_has_roles')
            ->where('model_has_roles.model_id', $id)
            ->pluck('model_has_roles.role_id')
            ->all();
        return view('user.edit', compact('user', 'roles', 'userRoles'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nameuser' => 'required|string|max:255'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->nameuser;
        $user->save();

        $roleNames = Role::whereIn('id', [$request->role])->pluck('name')->all();

        $user->syncRoles($roleNames);

        return redirect('user');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('user');
    }
}
