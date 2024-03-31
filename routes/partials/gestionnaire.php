<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;

Route::middleware(['auth','gestionnaires'])->prefix('gestionnaires')->group(function () {
    #Dashboad
    // Route::get('/gestionnaire', [GeneralController::class, 'gestionnaire'])->name('gestionnaire');
    

    #Profile Routes
    // Route::resource('profiles', App\Http\Controllers\gestionnaire\profile\GestionnaireProfileController::class)->names([
    //     'index'   =>  "profile.gestionnaire.index",
    //     'create'  =>  "profile.gestionnaire.create",
    //     'store'   =>  "profile.gestionnaire.store",
    //     'show'    =>  "profile.gestionnaire.show",
    //     'edit'    =>  "profile.gestionnaire.edit",
    //     'update'  =>  "profile.gestionnaire.update",
    //     'destroy' =>  "profile.gestionnaire.destroy",
    // ]);

    // #Course Routes
    // Route::resource('courses', App\Http\Controllers\gestionnaire\courses\CourseGestionnaireController::class)->names([
    //     'index'   =>  "course.gestionnaire.index",
    //     'create'  =>  "course.gestionnaire.create",
    //     'store'   =>  "course.gestionnaire.store",
    //     'show'    =>  "course.gestionnaire.show",
    //     'edit'    =>  "course.gestionnaire.edit",
    //     'update'  =>  "course.gestionnaire.update",
    //     'destroy' =>  "course.gestionnaire.destroy",
    // ]);

    // #Livraison Routes

    // Route::get('/livraisons', [App\Http\Controllers\gestionnaire\livraisons\GestionnaireLivraisonController::class, 'index'])->name('livraison.gestionnaire.index');
    // Route::get('/livraisons/index_confirme_livraison/{id}', [App\Http\Controllers\gestionnaire\livraisons\GestionnaireLivraisonController::class, 'index_confirme_livraison'])->name('livraison.gestionnaire.index_confirme_livraison');
    // Route::post('/livraisons/confirme_livraison/{id}', [App\Http\Controllers\gestionnaire\livraisons\GestionnaireLivraisonController::class, 'confirme_livraison'])->name('livraison.gestionnaire.confirme_livraison');
    // Route::get('/livraisons/index_modifier_livraison/{id}', [App\Http\Controllers\gestionnaire\livraisons\GestionnaireLivraisonController::class, 'index_modifier_livraison'])->name('livraison.gestionnaire.index_modifier_livraison');
    // Route::post('/livraisons/modifier_livraison/{id}', [App\Http\Controllers\gestionnaire\livraisons\GestionnaireLivraisonController::class, 'modifier_livraison'])->name('livraison.gestionnaire.modifier_livraison');
    // Route::delete('/livraisons/destroy/{id}', [App\Http\Controllers\gestionnaire\livraisons\GestionnaireLivraisonController::class, 'destroy'])->name('livraison.gestionnaire.destroy');
    // Route::post('/livraisons/rejeter/{id}', [App\Http\Controllers\gestionnaire\courses\CourseGestionnaireController::class, 'rejeter_livraison'])->name('livraison.gestionnaire.rejeter_livraison');
    
    // #Confirmer une course
    // Route::post('/courses/confirmer/{id}', [App\Http\Controllers\gestionnaire\courses\CourseGestionnaireController::class, 'confirm_course'])->name('course.gestionnaire.confirm_course');
    // Route::any('/courses/rejeter/{id}', [App\Http\Controllers\gestionnaire\courses\CourseGestionnaireController::class, 'rejeter_course'])->name('course.gestionnaire.rejeter_course');

    // Route::get('/courses/confirmation_vue/{id}', [App\Http\Controllers\gestionnaire\courses\CourseGestionnaireController::class, 'confirmation_vue'])->name('course.gestionnaire.confirmation_vue');
    
    #Message or Notification routes
    // Route::get('/messages/', [App\Http\Controllers\gestionnaire\messages\GestionnaireMessageController::class, 'index'])->name('messages.gestionnaire.index');
    // Route::get('/messages/write/{id}', [App\Http\Controllers\gestionnaire\messages\GestionnaireMessageController::class, 'message_write'])->name('messages.gestionnaire.message_write');
    // Route::get('/messages/delete_message/{id}', [App\Http\Controllers\gestionnaire\messages\GestionnaireMessageController::class, 'delete_message'])->name('messages.gestionnaire.delete_message');

                    
});  