<?php

namespace App\Http\Controllers\admin\permissions;

use App\Services\Log;
use App\Models\Logactivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\admin\permissions\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);
        $permission = Permission::create($validate);
        $log = array(
            'subject' => "Créaction de la permission"."  ".$validate['name'],
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
        );

        $activity_user = new Log();
        $activity_user->logactivity($log);

        Alert::success('Insection', 'Permission ajoutée avec succès.');
        return redirect()->back()->with('success', 'Permission ajoutée avec succès.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permission = Permission::Find($id);

        $validate = $request->validate([
            'name' => 'required'
        ]);

        Permission::whereId($id)->update($validate);

        $log = array(
            'subject' => "Modification de la permission"."  ".$permission->name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
        );

        $activity_user = new Log();
        $activity_user->logactivity($log);
       // Alert::success('Modification', 'Role modifé avec succès.');
        return redirect()->back()->with('success', 'Permission modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $permission = Permission::Find($id);
        Permission::whereId($id)->delete();
        $log = array(
            'subject' => "Suppression de la permission"."  ".$permission->name,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
        );

        $activity_user = new Log();
        $activity_user->logactivity($log);
        Alert::success('Suppression', 'Permission supprimée avec succès.');
        return redirect()->back();
    }
}
