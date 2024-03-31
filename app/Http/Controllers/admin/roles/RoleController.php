<?php

namespace App\Http\Controllers\admin\roles;

use App\Services\Log;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use App\Models\admin\roles\Role;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\admin\permissions\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'permissions' => 'required'
        ]);

        $tab = array(
             'name' => $validate['name']
        );

        $tab_1 = array(
             'permissions' => $validate['permissions']
        );

        $role = Role::create($tab);
        $role->permissions()->attach($tab_1['permissions']);

        $log = array(
             'subject' => "Créaction d'un role du nom de"." ".$validate['name'],
             'url' => $request->fullUrl(),
             'method' => $request->method(),
             'ip' => $request->ip(),
             'agent' => $request->header('user-agent'),
             'user_id' => auth()->check() ? auth()->user()->id : 1,
        );

        $activity_user = new Log();
        $activity_user->logactivity($log);
        
        Alert::success('Insection', 'Role ajouté avec succès.');

        return to_route('role.admin.index');
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
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::Find($id);
        
        $validate = $request->validate([
            'name' => 'required', 
            'permissions' => 'required'
        ]);

        $tab = array(
            'name' => $validate['name']
         );
         
       $tab_1 = array(
            'permissions' => $validate['permissions']
        );
        
        Role::whereId($id)->update($tab);
        $role->permissions()->sync($tab_1['permissions']);
        $log = array(
            'subject' => "Modification du role"." ".$role->name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
        );

        $activity_user = new Log();
        $activity_user->logactivity($log);
        Alert::success('Modification', 'Role modifié avec succès.');
        //dd($request->all(), $role);

        return to_route('role.admin.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $role = Role::Find($id);
        Role::whereId($id)->delete();
        $log = array(
            'subject' => "Suppression du role"." ".$role->name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
        );
        
        $activity_user = new Log();
       $activity_user->logactivity($log);
        Alert::success('Suppression', 'Role supprimé avec succès.');
        return to_route('role.admin.index');
    }
}
