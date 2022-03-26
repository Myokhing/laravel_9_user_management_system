<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all()->pluck('name', 'id');
        $roles = Role::all();
        return view('admin.roles.index', compact('roles', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all()->pluck('name', 'id');
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        // ]);
        // $role = new Role();
        // $role->name = $request->name;
        // $role->save();
        // return redirect()->route('admin.roles.index')->with('success', 'Role created successfully');
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));
        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $show_role = Role::find($role->id);
        return view('admin.roles.show', compact('show_role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $permissions = Permission::all()->pluck('name', 'id');
        // $role_edit = Role::find($role->id);
        // return view('admin.roles.edit', compact('role_edit', 'permissions'));
        $role_edit = Role::find($id);
        $permissions = Permission::all()->pluck('name', 'id');
        $role_edit->load('permissions');
        return view('admin.roles.edit', compact('permissions', 'role_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name,'.$role->id, 
        ]);
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));
        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role_delete = Role::find($id);
        $role_delete->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully');
    }
}
