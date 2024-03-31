<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\boutique\FedayPayBoutiqueController;
use App\Http\Controllers\client\boutique\FedayPayRestaurantController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\client\boutique\ClientProduitController;


Route::get('/livraisons/callback/{transactionId}', [App\Http\Controllers\client\livraisons\restaurant\KkiaPayPaiementController::class, 'callback'])->name('livraison.client.restaurant.kkiapay.callback');
Route::post('/courses/callback/{transactionId}/{id}', [App\Http\Controllers\client\courses\ClientCourseController::class, 'callback_course_payment'])->name('course.client.callback_course_payment');
Route::get('/livraisons/callback/{transactionId}/{id}', [App\Http\Controllers\client\livraisons\ClientLivraisonController::class, 'callback_livraison_payment'])->name('livraison.client.callback_livraison_payment');

Route::middleware(['auth', 'clients'])->prefix('clients')->group(function () {

    # Index client routes

    Route::get('/client', [GeneralController::class, 'client'])->name('client');

    # Profiles routes

    Route::resource('profiles', App\Http\Controllers\client\profile\ClientProfileController::class)->names([
        'index'   =>  "profile.client.index",
        'create'  =>  "profile.client.create",
        'store'   =>  "profile.client.store",
        'show'    =>  "profile.client.show",
        'edit'    =>  "profile.client.edit",
        'update'  =>  "profile.client.update",
        'destroy' =>  "profile.client.destroy",
    ]);

    # Course routes

    Route::resource('courses', App\Http\Controllers\client\courses\ClientCourseController::class)->names([
        'index'   =>  "course.client.index",
        'create'  =>  "course.client.create",
        'store'   =>  "course.client.store",
        'show'    =>  "course.client.show",
        'edit'    =>  "course.client.edit",
        'update'  =>  "course.client.update",
        'destroy' =>  "course.client.destroy",
    ]);

    Route::get('/courses/payement/{id}', [App\Http\Controllers\client\courses\ClientCourseController::class, 'payement_page'])->name('course.client.payement_page');
    Route::get('/courses/payement_start/{id}', [App\Http\Controllers\client\courses\ClientCourseController::class, 'payement_start'])->name('course.client.payement_start');

    # Livraison routes

    Route::get('/livraisons', [App\Http\Controllers\client\livraisons\ClientLivraisonController::class, 'index'])->name('livraison.client.index');
    Route::get('/livraisons/create', [App\Http\Controllers\client\livraisons\ClientLivraisonController::class, 'create'])->name('livraison.client.create');
    Route::get('/livraisons/index_adress', [App\Http\Controllers\client\livraisons\ClientLivraisonController::class, 'index_adress'])->name('livraison.client.index_adress');
    Route::get('/livraisons/choiseview', [App\Http\Controllers\client\livraisons\ClientLivraisonController::class, 'choiseview'])->name('livraison.client.choiseview');
    Route::post('/livraisons/store', [App\Http\Controllers\client\livraisons\ClientLivraisonController::class, 'store'])->name('livraison.client.store');
    Route::post('/livraisons/store_simple_livraison', [App\Http\Controllers\client\livraisons\ClientLivraisonController::class, 'store_simple_livraison'])->name('livraison.client.store_simple_livraison');

    Route::get('/livraisons/edit/{id}', [App\Http\Controllers\client\livraisons\ClientLivraisonController::class, 'edit'])->name('livraison.client.edit');
    Route::get('/livraisons/accepter/{id}', [App\Http\Controllers\client\livraisons\ClientLivraisonController::class, 'accepter'])->name('livraison.client.accepter');
    Route::get('/livraisons/refuser/{id}', [App\Http\Controllers\client\livraisons\ClientLivraisonController::class, 'refuser'])->name('livraison.client.refuser');

    Route::get('/livraisons/payement/{id}', [App\Http\Controllers\client\livraisons\ClientLivraisonController::class, 'payement_page'])->name('livraison.client.payement_page');
    Route::get('/livraisons/payement_start/{id}', [App\Http\Controllers\client\livraisons\ClientLivraisonController::class, 'payement_start'])->name('livraison.client.payement_start');


    Route::put('/livraisons/update_livraison_simple/{id}', [App\Http\Controllers\client\livraisons\ClientLivraisonController::class, 'update_livraison_simple'])->name('livraison.client.update_livraison_simple');
    Route::put('/livraisons/update/{id}', [App\Http\Controllers\client\livraisons\ClientLivraisonController::class, 'update'])->name('livraison.client.update');
    Route::delete('/livraisons/destroy/{id}', [App\Http\Controllers\client\livraisons\ClientLivraisonController::class, 'destroy'])->name('livraison.client.destroy');
    Route::delete('/livraisons/destroy_livraison_bouResto/{id}', [App\Http\Controllers\client\livraisons\ClientLivraisonController::class, 'destroy_livraison_bouResto'])->name('livraison.client.destroy_livraison_bouResto');

    #Statistique Boutique Restaurant Route
    Route::get('/statistiques/boutique/{id}', [App\Http\Controllers\client\statistiques\BoutiqueClientStatistiqueController::class, 'index_boutique'])->name('statistique.boutique.client.index_boutique');
    Route::get('/statistiques/restaurant/{id}', [App\Http\Controllers\client\statistiques\BoutiqueClientStatistiqueController::class, 'index_restaurant'])->name('statistique.restaurant.client.index_restaurant');


    #Payement Fedapay course

    Route::get('process_course', [App\Http\Controllers\client\courses\FedayPayCourseController::class, 'process_course'])->name('process_course');
    Route::get('callback_course', [App\Http\Controllers\client\courses\FedayPayCourseController::class, 'callback_course'])->name('callback_course');


    #Boutique routes

    Route::any('/boutiques', [App\Http\Controllers\client\boutique\ClientBoutiqueController::class, 'index'])->name('boutique.list.client.index');
    Route::resource('boutique_clients', App\Http\Controllers\client\boutique_liste\BoutiqueClientController::class)->names([
        'index'   =>  "boutique_client.client.index",
        'create'  =>  "boutique_client.client.create",
        'store'   =>  "boutique_client.client.store",
        'show'    =>  "boutique_client.client.show",
        'edit'    =>  "boutique_client.client.edit",
        'update'  =>  "boutique_client.client.update",
        'destroy' =>  "boutique_client.client.destroy",
    ]);

    #Produits Routes

    Route::get('/products/{id}', [ClientProduitController::class, 'index_product'])->name('product.client.index');
    Route::any('/products/produit_list/', [ClientProduitController::class, 'index_product'])->name('product.list.client.index');
    Route::post('/search', [ClientProduitController::class, 'search']);
    Route::get('cart', [ClientProduitController::class, 'cart'])->name('cart.client.index');
    Route::get('add-to-cart/{id}', [ClientProduitController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [ClientProduitController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [ClientProduitController::class, 'remove'])->name('remove.from.cart');

    Route::get('process_boutique', [FedayPayBoutiqueController::class, 'process_boutique'])->name('process_boutique');
    Route::get('callback_boutique', [FedayPayBoutiqueController::class, 'callback_boutique'])->name('callback_boutique');



    #Restaurant routes

    Route::any('/restaurants', [App\Http\Controllers\client\restaurant\ClientRestaurantController::class, 'index'])->name('restaurant.list.client.index');

    Route::resource('restaurant_clients', App\Http\Controllers\client\restaurant_liste\RestaurantClientController::class)->names([
        'index'   =>  "restaurant_client.client.index",
        'create'  =>  "restaurant_client.client.create",
        'store'   =>  "restaurant_client.client.store",
        'show'    =>  "restaurant_client.client.show",
        'edit'    =>  "restaurant_client.client.edit",
        'update'  =>  "restaurant_client.client.update",
        'destroy' =>  "restaurant_client.client.destroy",
    ]);


    #Message or Notification routes
    Route::get('/messages/', [App\Http\Controllers\client\messages\ClientMessageController::class, 'index'])->name('messages.client.index');
    Route::get('/messages/write/{id}', [App\Http\Controllers\client\messages\ClientMessageController::class, 'message_write'])->name('messages.client.message_write');
    Route::get('/messages/write_livraison/{id}', [App\Http\Controllers\client\messages\ClientMessageController::class, 'write_livraison'])->name('messages.client.write_livraison');
    Route::get('/messages/delete_message/{id}', [App\Http\Controllers\client\messages\ClientMessageController::class, 'delete_message'])->name('messages.client.delete_message');


    #Plats Routes

    Route::get('/plats/{id}', [App\Http\Controllers\client\restaurant\ClientPlatController::class, 'index_plat'])->name('plat.client.index');
    Route::post('/search', [App\Http\Controllers\client\restaurant\ClientPlatController::class, 'search']);
    Route::get('cart', [App\Http\Controllers\client\restaurant\ClientPlatController::class, 'cart'])->name('cart.client.index');
    Route::get('add-dish-to-cart/{id}', [App\Http\Controllers\client\restaurant\ClientPlatController::class, 'addToCart'])->name('add.dish.to.cart');
    Route::patch('update-cart', [App\Http\Controllers\client\restaurant\ClientPlatController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [App\Http\Controllers\client\restaurant\ClientPlatController::class, 'remove'])->name('remove.from.cart');

    Route::get('process_restaurant', [FedayPayRestaurantController::class, 'process_restaurant'])->name('process_restaurant');
    Route::get('callback_restaurant', [FedayPayRestaurantController::class, 'callback_restaurant'])->name('callback_restaurant');
});
