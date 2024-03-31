<?php

namespace App\Http\Controllers\admin\profile;

use App\Models\User;
use App\Services\Log;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Models\admin\profiles\Profile;
use RealRashid\SweetAlert\Facades\Alert;


class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('id', Auth()->user()->id)->first();
        //dd($user->profile);
        return view('admin.profiles.index', compact('user'));
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
        //dd(Auth::user()->profile);
        if(Auth::user()->profile){
                //dd($request->all());
            $user = Auth::user();
            $validation = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);


        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        $new_password = Crypt::encrypt($request->new_password);
        User::whereId(auth()->user()->id)->update([
            'password' => $new_password
            ]);

            $mailInscripton = [
                'title' => 'Créaction de compte',
                'first_name_of_users' => $user->profile->first_name,
                'last_name_of_users'  => $user->profile->last_name,
                'email_of_users'  => $user->email,
                'password_of_users'  => Crypt::decrypt($new_password),
            ];
            //dd($mailInscripton);
            Mail::to($user->email)->send(new \App\Mail\users\ResetPasswordMail($mailInscripton));

            if(isset($user->profiles)){

                $log = array(
                    'subject' => "Modification des infos de connexion de "." ".$user->profiles->first_name." ".$user->profiles->last_name,
                    'url' => $request->fullUrl(),
                    'method' => $request->method(),
                    'ip' => $request->ip(),
                    'agent' => $request->header('user-agent'),
                    'user_id' => auth()->check() ? auth()->user()->id : 1,
                );

                $activity_user = new Log();
                $activity_user->logactivity($log);   
                }
                else{

                    $log = array(
                        'subject' => "Modification des infos de connexion de l'utilisateur ayant l'id"." ".Auth::user()->id,
                        'url' => $request->fullUrl(),
                        'method' => $request->method(),
                        'ip' => $request->ip(),
                        'agent' => $request->header('user-agent'),
                        'user_id' => auth()->check() ? auth()->user()->id : 1,
                    );
                    $activity_user = new Log();
                    $activity_user->logactivity($log);   
                }

        Alert::success('Modification', 'Mot de passe modifié avec succès.');
        return to_route('logout')->with("status", "Password changée avec succès!");
        }
        
        Alert::error('Opération impossible !','Veuillez mettre à jour votre profile.');
        return to_route('admin');
        
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
        $user = User::find($id);
        $validation = $request->validate([
            "first_name"             => "required",
            "last_name"              => "required",
            "email"                  => "required",
            "sexe"                   => "required",
            "phone"                  => "required",
            "adress"                 => "required",
            "photo"                  => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048",
        ]);

        

        
        if(($request->file('photo'))){
            
            #Image Photo
            
            $extension = $validation['photo']->getClientOriginalExtension();
            $image_photo = $validation['first_name'].'_'.$validation['last_name'].'_'. $validation['phone'].'.'.$extension;
            $request->photo->move(public_path('utilisateurs/images/image_profile'), $image_photo);
            
           
            $tab_profile = array(
                'first_name'         =>  $validation['first_name'],
                'last_name'          =>  $validation['last_name'],
                'email'              =>  $validation['email'],
                'sexe'               =>  $validation['sexe'],
                'phone'              =>  $validation['phone'],
                'adress'             =>  $validation['adress'],
                'photo'              =>  $image_photo,
            );

        }else{


            #Image Photo
            $image_photo = $request->file('photo')  == null ?  "../assets/images/avtar/16.jpg"  : $request->file('photo');

            
            $tab_profile = array(
                'first_name'         =>  $validation['first_name'],
                'last_name'          =>  $validation['last_name'],
                'email'              =>  $validation['email'],
                'sexe'               =>  $validation['sexe'],
                'phone'              =>  $validation['phone'],
                'adress'             =>  $validation['adress'],
                'photo'              =>  $image_photo,
            );

                #dd($request->all(), $validation, $image_photo, $tab_profile);
        }

        if(isset($user->profile)){
            $profile = $user->profile()->update($tab_profile);
        }else{
            $profile = $user->profile()->create($tab_profile);
        }
        
        #$profile = $user->profile()->update($tab_profile);
        
        $log = array(
            'subject' => "Modification du profile de l'utilisateur"." ".$validation['first_name']." ".$validation['last_name'],
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
        );

        $activity_user = new Log();
        $activity_user->logactivity($log);
        Alert::success('Modification', 'Profil mis à jour avec succès.');
        return to_route('profile.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
