<?php

namespace App\Http\Controllers\admin\users;

use App\Models\User;
use App\Services\Log;
use App\Models\Logactivity;
use Illuminate\Http\Request;
use App\Models\admin\roles\Role;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\admin\courses\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\admin\livreurs\Livreur;
use App\Models\admin\profiles\Profile;
use App\Models\admin\commandes\Commande;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\admin\livraisons\Livraison;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        //dd($users);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            "first_name"             => "required",
            "last_name"              => "required",
            "email"                  => "required",
            "sexe"                   => "required",
            "phone"                  => "required",
            "adress"                 => "required",
            "photo"                  => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048",
            "role_id"                => "required",
            "password"               => "required",
        ]);
        
        //dd($request->all(), $validation);

        
        if(($request->file('photo'))){
            
            $tab_user = array(
                'email'                 =>  $validation['email'],
                'password'              =>  Hash::make($validation['password']),
                'role_id'               =>  $validation['role_id'],
            );
           
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

            $tab_livreur = array(
                'first_name'         =>  $validation['first_name'],
                'last_name'          =>  $validation['last_name'],
                'email'              =>  $validation['email'],
                'sexe'               =>  $validation['sexe'],
                'phone'              =>  $validation['phone'],
                'adress'             =>  $validation['adress'],
                'photo'              =>  $image_photo,
            );

        }else{
            
            $tab_user = array(
                'email'                 =>  $validation['email'],
                'password'              =>  Hash::make($validation['password']),
                'role_id'               =>  $validation['role_id'],
            );
            
            #Image Photo
            $image_photo = $request->file('photo')  == null ? ""  : $request->file('photo');
            
            $tab_profile = array(
                'first_name'         =>  $validation['first_name'],
                'last_name'          =>  $validation['last_name'],
                'email'              =>  $validation['email'],
                'sexe'               =>  $validation['sexe'],
                'phone'              =>  $validation['phone'],
                'adress'             =>  $validation['adress'],
                'photo'              =>  $image_photo,
            );

            $tab_livreur = array(
                'first_name'         =>  $validation['first_name'],
                'last_name'          =>  $validation['last_name'],
                'email'              =>  $validation['email'],
                'sexe'               =>  $validation['sexe'],
                'phone'              =>  $validation['phone'],
                'adress'             =>  $validation['adress'],
                'photo'              =>  $image_photo,
            );
            
           # dd($request->all(), $validation, $tab_user, $image_photo, $tab_profile);
        }

        if($validation['role_id'] == 4){
            $user = User::create($tab_user);
            $profile = $user->livreur()->create($tab_livreur);
        }else{
            $user = User::create($tab_user);
            $profile = $user->profile()->create($tab_profile);
        }
        //dd($user->id);

        $log = array(
            'subject' => "Créaction de l'utilisateur"." ".$validation['first_name']." ".$validation['last_name'],
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
        );

       #dd($log);

       $activity_user = new Log();
       $activity_user->logactivity($log);

        Alert::success('Insection', 'Utilisateur créé(e) avec succès.');
        return to_route('user.admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);

        if($user->role_id == 3){
                  /* Clients Statistiques */
            # Nombre total de course demandée
            $course_demandee = Course::where('user_id', $id)->count();

            # Nombre total de course demandée
            $livraison_demandee = Livraison::where('user_id', $id)->count();

            # Montant dépensé dans les courses
            $montant_depense_course = Course::where('user_id', $id)->sum('prix');

            # Montant dépensé dans les livraisons
            $montant_depense_livraison = Livraison::where('user_id', $id)->sum('prix');
            
            # Montant des achats effectués dans les boutiques
            $montant_achat_boutique = Commande::where('user_id', $id)->where('type_de_commande', 'Boutique')->sum('montant_commande');
            
            # Montant des achats effectués dans les restaurants
            $montant_achat_restaurant = Commande::where('user_id', $id)->where('type_de_commande', 'Restaurant')->sum('montant_commande');

            # Nombre de livreurs qui lui ont fait des livraisons
            
            $nombreDeLivreurs = DB::table('livraisons')
                ->select(DB::raw('COUNT(DISTINCT livreur_id) as nombre_de_livreurs'))
                ->where('user_id', $id)
                ->first();

            # Historiques des commandes d'un client

            $historique_commandes = Commande::where('user_id', $id)->get();

            return view('admin.users.show',compact('user', 'course_demandee', 'livraison_demandee','montant_achat_boutique', 'montant_achat_restaurant', 'montant_depense_course', 'montant_depense_livraison', 'nombreDeLivreurs', 'historique_commandes'));


        }


        if($user->role_id == 4){
 
            /* Livreurs Statistiques */

            # Historiques des courses d'un livreur
            //dd($id);
            $course_livreurs = Course::where('livreur_id', User::find($id)->livreur->id)->get();

            # Historiques des Livraisons d'un livreur
            $livraison_livreurs = Livraison::where('livreur_id', User::find($id)->livreur->id)->get();

            return view('admin.users.show',compact('user', 'course_livreurs', 'livraison_livreurs'));
        }

        if($user->role_id == 2){
            /* Gestionnaires Statistiques */

            # Historique des courses validées
            $course_gestionnaires = Course::where('gestionnaire_id', $id)->where('status_livraison', "Valider")->get();

            # Historique des Livraisons validées
            $livraison_gestionnaires = Livraison::where('gestionnaire_id', $id)->where('status_livraison', "Valider")->get();

            return view('admin.users.show',compact('user', 'course_gestionnaires', 'livraison_gestionnaires'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.edit',compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $user_id = User::find($id);
        $user_profile_id = User::find($id);
        $validation = $request->validate([
            "first_name"             => "required",
            "last_name"              => "required",
            "email"                  => "required",
            "sexe"                   => "required",
            "phone"                  => "required",
            "adress"                 => "required",
            "photo"                  => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048",
            "role_id"                => "required",
            "password"               => "required",
        ]);

        
        
        
        if(($request->file('photo'))){
            
            $tab_user = array(
                'email'                 =>  $validation['email'],
                'password'              =>  Hash::make($validation['password']),
                'role_id'               =>  $validation['role_id'],
            );
           
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
            
            $tab_livreur = array(
                'first_name'         =>  $validation['first_name'],
                'last_name'          =>  $validation['last_name'],
                'email'              =>  $validation['email'],
                'sexe'               =>  $validation['sexe'],
                'phone'              =>  $validation['phone'],
                'adress'             =>  $validation['adress'],
                'photo'              =>  $image_photo,
            );
            
        }else{

            $tab_user = array(
                'email'                 =>  $validation['email'],
                'password'              =>  Hash::make($validation['password']),
                'role_id'               =>  $validation['role_id'],
            );
            
            #Image Photo
            //dd($request->all(), $request->file('photo'));
            
            //$image_photo = $request->file('photo')  == null ? $user_profile_id->profile->photo ?? $user_profile_id->livreur->photo  : $request->file('photo');
            $image_photo = $request->file('photo')  == null ? $user_profile_id->profile->photo ?? $user_profile_id->livreur->photo ?? public_path('utilisateurs/images/image_profile/profile.jpg') : $request->file('photo');
  
            $tab_profile = array(
                'first_name'         =>  $validation['first_name'],
                'last_name'          =>  $validation['last_name'],
                'email'              =>  $validation['email'],
                'sexe'               =>  $validation['sexe'],
                'phone'              =>  $validation['phone'],
                'adress'             =>  $validation['adress'],
                'photo'              =>  $image_photo,
            );

            $tab_livreur = array(
                'first_name'         =>  $validation['first_name'],
                'last_name'          =>  $validation['last_name'],
                'email'              =>  $validation['email'],
                'sexe'               =>  $validation['sexe'],
                'phone'              =>  $validation['phone'],
                'adress'             =>  $validation['adress'],
                'photo'              =>  $image_photo,
            );

        }
        
        if($validation['role_id'] == 4){

            $user = User::whereId($id)->update($tab_user);
            $user_livreur = User::Find($id);
            $user_livreur->livreur()->update($tab_livreur);

        }else{

            $user_simple = User::find($id);
            $user_simple->update($tab_user);;
            $user_simple->profile()->update($tab_profile);

            //dd($user_simple);
            //dd($user, $validation, $tab_profile, $tab_livreur);
        }
        

        $log = array(
            'subject' => "Modification des infos de l'utilisateur"." ".$validation['first_name']." ".$validation['last_name'],
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent'),
            'user_id' => auth()->check() ? auth()->user()->id : 1,
       );

       $activity_user = new Log();
       $activity_user->logactivity($log);

       Alert::success('Modification', 'Utilisateur modifié(e) avec succès.');
       return to_route('user.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);

       # dd($user);
       if($user->role_id == 4){

            // $image_user = public_path('utilisateurs/images/image_profile'.$user->livreur->photo);

            // if($image_user){
            //     File::delete($image_user);
            // } 

        //    $log_2 = array(
        //        'subject' => "Suppression de l'utilisateur"." ". $user->livreur->first_name ?? null ." ".$user->livreur->last_name,
        //        'url' => $request->fullUrl(),
        //        'method' => $request->method(),
        //        'ip' => $request->ip(),
        //        'agent' => $request->header('user-agent'),
        //        'user_id' => auth()->check() ? auth()->user()->id : 1,
        //    );
        //    $activity_user = new Log();
        //    $activity_user->logactivity($log_2);
       }else{

            // $image_user = public_path('utilisateurs/images/image_profile'.$user->profile->photo);

            // if($image_user){
            //     File::delete($image_user);
            // } 
        //     $log_1 = array(
        //         'subject' => "Suppression de l'utilisateur"." ". $user->profile->first_name." ".$user->profile->last_name,
        //         'url' => $request->fullUrl(),
        //         'method' => $request->method(),
        //         'ip' => $request->ip(),
        //         'agent' => $request->header('user-agent'),
        //         'user_id' => auth()->check() ? auth()->user()->id : 1,
        //     );

        //    $activity_user = new Log();
        //    $activity_user->logactivity($log_1);  
       }

       User::find($id)->delete();
       Alert::success('Suppression', 'Utilisateur supprimé(e) avec succès.');
       return to_route('user.admin.index');
    }
}
