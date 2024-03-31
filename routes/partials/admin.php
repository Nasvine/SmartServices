<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;


Route::middleware(['auth','administrateurs'])->prefix('administrateurs')->group(function () {
    Route::get('/admin', [GeneralController::class, 'admin'])->name('admin');
    Route::get('/logactivity', [GeneralController::class, 'logactivity'])->name('logactivity');
    Route::post('/logactivity/delete/{id}', [GeneralController::class, 'logactivitydelete'])->name('logactivitie.admin.destroy');
    Route::resource('roles', App\Http\Controllers\admin\roles\RoleController::class)->names([
        'index'   =>  "role.admin.index",
        'create'  =>  "role.admin.create",
        'store'   =>  "role.admin.store",
        'show'    =>  "role.admin.show",
        'edit'    =>  "role.admin.edit",
        'update'  =>  "role.admin.update",
        'destroy' =>  "role.admin.destroy",
    ]);
    Route::resource('permissions', App\Http\Controllers\admin\permissions\PermissionController::class)->names([
        'index'   =>  "permission.admin.index",
        'create'  =>  "permission.admin.create",
        'store'   =>  "permission.admin.store",
        'show'    =>  "permission.admin.show",
        'edit'    =>  "permission.admin.edit",
        'update'  =>  "permission.admin.update",
        'destroy' =>  "permission.admin.destroy",
    ]);
    
    Route::get('/dash', [GeneralController::class, 'dash'])->name('dash');
  
    
    Route::resource('users', App\Http\Controllers\admin\users\UserController::class)->names([
        'index'   =>  "user.admin.index",
        'create'  =>  "user.admin.create",
        'store'   =>  "user.admin.store",
        'show'    =>  "user.admin.show",
        'edit'    =>  "user.admin.edit",
        'update'  =>  "user.admin.update",
        'destroy' =>  "user.admin.destroy",
    ]);

    Route::resource('profiles', App\Http\Controllers\admin\profile\AdminProfileController::class)->names([
        'index'   =>  "profile.admin.index",
        'create'  =>  "profile.admin.create",
        'store'   =>  "profile.admin.store",
        'show'    =>  "profile.admin.show",
        'edit'    =>  "profile.admin.edit",
        'update'  =>  "profile.admin.update",
        'destroy' =>  "profile.admin.destroy",
    ]);

    Route::resource('boutiques', App\Http\Controllers\admin\boutiques\BoutiqueController::class)->names([
        'index'   =>  "boutique.admin.index",
        'create'  =>  "boutique.admin.create",
        'store'   =>  "boutique.admin.store",
        'show'    =>  "boutique.admin.show",
        'edit'    =>  "boutique.admin.edit",
        'update'  =>  "boutique.admin.update",
        'destroy' =>  "boutique.admin.destroy",
    ]);

    Route::get('produits/category/{id}/{id_boutique}', [App\Http\Controllers\admin\boutiques\ProduitController::class, 'index_category_produit'])->name('produit.category.admin.index');
    Route::get('plats/category/{id}/{id_restaurant}', [App\Http\Controllers\admin\restaurants\PlatController::class, 'index_category_plat'])->name('plat.category.admin.index');


    Route::resource('restaurants', App\Http\Controllers\admin\restaurants\RestaurantController::class)->names([
        'index'   =>  "restaurant.admin.index",
        'create'  =>  "restaurant.admin.create",
        'store'   =>  "restaurant.admin.store",
        'show'    =>  "restaurant.admin.show",
        'edit'    =>  "restaurant.admin.edit",
        'update'  =>  "restaurant.admin.update",
        'destroy' =>  "restaurant.admin.destroy",
    ]);

    Route::resource('category_produits', App\Http\Controllers\admin\boutiques\CategoryProduitController::class)->names([
        'index'   =>  "category_produit.admin.index",
        'create'  =>  "category_produit.admin.create",
        'store'   =>  "category_produit.admin.store",
        'show'    =>  "category_produit.admin.show",
        'edit'    =>  "category_produit.admin.edit",
        'update'  =>  "category_produit.admin.update",
        'destroy' =>  "category_produit.admin.destroy",
    ]);

    Route::resource('category_plats', App\Http\Controllers\admin\restaurants\CategoryPlatController::class)->names([
        'index'   =>  "category_plat.admin.index",
        'create'  =>  "category_plat.admin.create",
        'store'   =>  "category_plat.admin.store",
        'show'    =>  "category_plat.admin.show",
        'edit'    =>  "category_plat.admin.edit",
        'update'  =>  "category_plat.admin.update",
        'destroy' =>  "category_plat.admin.destroy",
    ]);

    Route::resource('plats', App\Http\Controllers\admin\restaurants\PlatController::class)->names([
        'index'   =>  "plat.admin.index",
        'create'  =>  "plat.admin.create",
        'store'   =>  "plat.admin.store",
        'show'    =>  "plat.admin.show",
        'edit'    =>  "plat.admin.edit",
        'update'  =>  "plat.admin.update",
        'destroy' =>  "plat.admin.destroy",
    ]);
    
    Route::resource('produits', App\Http\Controllers\admin\boutiques\ProduitController::class)->names([
        'index'   =>  "produit.admin.index",
        'create'  =>  "produit.admin.create",
        'store'   =>  "produit.admin.store",
        'show'    =>  "produit.admin.show",
        'edit'    =>  "produit.admin.edit",
        'update'  =>  "produit.admin.update",
        'destroy' =>  "produit.admin.destroy",
    ]);
    

     #Gestionnaire Routes
     
     #Dashboad
     Route::get('/gestionnaire', [GeneralController::class, 'gestionnaire'])->name('gestionnaire');
    

     #Profile Routes
     Route::resource('profiles', App\Http\Controllers\gestionnaire\profile\GestionnaireProfileController::class)->names([
         'index'   =>  "profile.gestionnaire.index",
         'create'  =>  "profile.gestionnaire.create",
         'store'   =>  "profile.gestionnaire.store",
         'show'    =>  "profile.gestionnaire.show",
         'edit'    =>  "profile.gestionnaire.edit",
         'update'  =>  "profile.gestionnaire.update",
         'destroy' =>  "profile.gestionnaire.destroy",
     ]);
 
     #Course Routes
     Route::resource('courses', App\Http\Controllers\gestionnaire\courses\CourseGestionnaireController::class)->names([
         'index'   =>  "course.gestionnaire.index",
         'create'  =>  "course.gestionnaire.create",
         'store'   =>  "course.gestionnaire.store",
         'show'    =>  "course.gestionnaire.show",
         'edit'    =>  "course.gestionnaire.edit",
         'update'  =>  "course.gestionnaire.update",
         'destroy' =>  "course.gestionnaire.destroy",
     ]);
 
     #Livraison Routes
 
     Route::get('/livraisons', [App\Http\Controllers\gestionnaire\livraisons\GestionnaireLivraisonController::class, 'index'])->name('livraison.gestionnaire.index');
     Route::get('/livraisons/index_confirme_livraison/{id}', [App\Http\Controllers\gestionnaire\livraisons\GestionnaireLivraisonController::class, 'index_confirme_livraison'])->name('livraison.gestionnaire.index_confirme_livraison');
     Route::post('/livraisons/confirme_livraison/{id}', [App\Http\Controllers\gestionnaire\livraisons\GestionnaireLivraisonController::class, 'confirme_livraison'])->name('livraison.gestionnaire.confirme_livraison');
     Route::get('/livraisons/index_modifier_livraison/{id}', [App\Http\Controllers\gestionnaire\livraisons\GestionnaireLivraisonController::class, 'index_modifier_livraison'])->name('livraison.gestionnaire.index_modifier_livraison');
     Route::post('/livraisons/modifier_livraison/{id}', [App\Http\Controllers\gestionnaire\livraisons\GestionnaireLivraisonController::class, 'modifier_livraison'])->name('livraison.gestionnaire.modifier_livraison');
     Route::get('/livraisons/destroy/{id}', [App\Http\Controllers\gestionnaire\livraisons\GestionnaireLivraisonController::class, 'destroy'])->name('livraison.gestionnaire.destroy');
     Route::get('/livraisons/rejeter/{id}', [App\Http\Controllers\gestionnaire\livraisons\GestionnaireLivraisonController::class, 'rejeter_livraison'])->name('livraison.gestionnaire.rejeter_livraison');
     
     #Confirmer une course
     Route::post('/courses/confirmer/{id}', [App\Http\Controllers\gestionnaire\courses\CourseGestionnaireController::class, 'confirm_course'])->name('course.gestionnaire.confirm_course');
     Route::any('/courses/rejeter/{id}', [App\Http\Controllers\gestionnaire\courses\CourseGestionnaireController::class, 'rejeter_course'])->name('course.gestionnaire.rejeter_course');
 
     Route::get('/courses/confirmation_vue/{id}', [App\Http\Controllers\gestionnaire\courses\CourseGestionnaireController::class, 'confirmation_vue'])->name('course.gestionnaire.confirmation_vue');
     
     #Message or Notification routes
     Route::get('/messages/', [App\Http\Controllers\gestionnaire\messages\GestionnaireMessageController::class, 'index'])->name('messages.gestionnaire.index');
     Route::get('/messages/write/{id}', [App\Http\Controllers\gestionnaire\messages\GestionnaireMessageController::class, 'message_write'])->name('messages.gestionnaire.message_write');
     Route::get('/messages/write_livraison/{id}', [App\Http\Controllers\gestionnaire\messages\GestionnaireMessageController::class, 'write_livraison'])->name('messages.gestionnaire.write_livraison');
     Route::get('/messages/delete_message/{id}', [App\Http\Controllers\gestionnaire\messages\GestionnaireMessageController::class, 'delete_message'])->name('messages.gestionnaire.delete_message');

     #Statistiques
     Route::post('/statistiques', [App\Http\Controllers\statistiques\StatistiqueController::class, 'index'])->name('statistique.index');
     
     #Inventaire Livreur
     Route::any('/inventaire_livreurs', [App\Http\Controllers\inventaires\InventaireLivreurController::class, 'index'])->name('inventaire_livreur.index');

                    
});   