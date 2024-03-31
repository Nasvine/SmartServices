<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;

Route::middleware(['auth','livreurs'])->prefix('livreurs')->group(function () {
    Route::get('/livreur', [GeneralController::class, 'livreur'])->name('livreur');
    Route::get('/test', function () {
        return view('livreurs.courses.test');
    })->name('livreur.test');
    

    Route::resource('profiles', App\Http\Controllers\livreur\profile\LivreurProfileController::class)->names([
        'index'   =>  "profile.livreur.index",
        'create'  =>  "profile.livreur.create",
        'store'   =>  "profile.livreur.store",
        'show'    =>  "profile.livreur.show",
        'edit'    =>  "profile.livreur.edit",
        'update'  =>  "profile.livreur.update",
        'destroy' =>  "profile.livreur.destroy",
    ]);


    Route::resource('courses', App\Http\Controllers\livreur\course\LivreurCourseController::class)->names([
        'index'   =>  "course.livreur.index",
        'create'  =>  "course.livreur.create",
        'store'   =>  "course.livreur.store",
        'show'    =>  "course.livreur.show",
        'edit'    =>  "course.livreur.edit",
        'update'  =>  "course.livreur.update",
        'destroy' =>  "course.livreur.destroy",
    ]);

    #Accepter une course
    Route::get('/courses/accepter/{id}', [App\Http\Controllers\livreur\course\LivreurCourseController::class, 'accept_course'])->name('course.livreur.accept_course');
    
    #Démarrer une course
    Route::get('/courses/start/{id}', [App\Http\Controllers\livreur\course\LivreurCourseController::class, 'start_course'])->name('course.livreur.start_course');
    
    #Terminer une course
    Route::get('/courses/end/{id}', [App\Http\Controllers\livreur\course\LivreurCourseController::class, 'end_course'])->name('course.livreur.end_course');

    #Confirmer le payement d'une course
    Route::get('/courses/payement_confirme/{id}', [App\Http\Controllers\livreur\course\LivreurCourseController::class, 'payement_confirme'])->name('course.livreur.payement_confirme');



    #Listes des Livraisons
    Route::get('/livraisons', [App\Http\Controllers\livreur\livraison\LivreurLivraisonController::class, 'index'])->name('livraison.livreur.index');
    
    #Accepter une livraison
    Route::get('/livraisons/accepter/{id}', [App\Http\Controllers\livreur\livraison\LivreurLivraisonController::class, 'accept_livraison'])->name('livraison.livreur.accept_livraison');
    
    #Démarrer une livraison
    Route::get('/livraisons/start/{id}', [App\Http\Controllers\livreur\livraison\LivreurLivraisonController::class, 'start_livraison'])->name('livraison.livreur.start_livraison');
    
    #Terminer une livraison
    Route::get('/livraisons/end/{id}', [App\Http\Controllers\livreur\livraison\LivreurLivraisonController::class, 'end_livraison'])->name('livraison.livreur.end_livraison');

    #Confirmer le payement d'une livraison
    Route::get('/livraisons/payement_confirme/{id}', [App\Http\Controllers\livreur\livraison\LivreurLivraisonController::class, 'payement_confirme'])->name('livraison.livreur.payement_confirme');


    Route::delete('/livraisons/destroy/{id}', [App\Http\Controllers\livreur\livraison\LivreurLivraisonController::class, 'destroy'])->name('livraison.livreur.destroy');

    #Message or Notification routes
    Route::get('/messages/', [App\Http\Controllers\livreur\messages\LivreurMessageController::class, 'index'])->name('messages.livreur.index');
    Route::get('/messages/write/{id}', [App\Http\Controllers\livreur\messages\LivreurMessageController::class, 'message_write'])->name('messages.livreur.message_write');
    Route::get('/messages/write_livraison/{id}', [App\Http\Controllers\livreur\messages\LivreurMessageController::class, 'write_livraison'])->name('messages.livreur.write_livraison');
    Route::get('/messages/delete_message/{id}', [App\Http\Controllers\livreur\messages\LivreurMessageController::class, 'delete_message'])->name('messages.livreur.delete_message');


    
                    
});   