<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Caffeinated\Shinobi\Concerns\assignRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['can:users.index'])->only('index');
        $this->middleware(['can:users.create'])->only(['create', 'store']);
        $this->middleware(['can:users.edit'])->only(['edit', 'update']);
        $this->middleware(['can:users.destroy'])->only('destroy');
        $this->middleware(['can:users.show'])->only('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users = User::orderBy('id', 'DESC')->get();
        return view('pages.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');
        return view('pages.admin.users.create', compact('user', 'roles', 'permissions'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //Validamos
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        //Generamos la Contraseña
        $data['password'] = Str::random(8);
        
        //Guaramos el Usuario
        $user = User::create($data);

        //Asignamos los Roles
        $user->syncRoles($request->roles);

        //Asignamos los Premisos
        $user->syncPermissions($request->permissions);
        
        return redirect()->route('user.index')->with('success', 'Usuario creado correctamente '.$data['password']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        dd($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');
        return view('pages.admin.users.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->back()->with('success', 'Usuario Editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Usuario Eliminado correctamente');
    }
}
