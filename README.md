<!-- LARAVEL  -->


<!-- Pour supprimer un fichier dans le path -->

Exemple: L'image d'une boutique
    use Illuminate\Support\Facades\File;

    $image_boutique = public_path('boutiques/images/'.$boutique->photo);

    if($image_boutique){
        File::delete($image_boutique);
    }

<!-- Pour installer sweetAlert -->

https://realrashid.github.io/sweet-alert/install

composer require realrashid/sweet-alert

php artisan vendor:publish 
RealRashid\SweetAlert\SweetAlertServiceProvider

input tel with drapeau

https://websolutionstuff.com/post/how-to-validate-international-phone-number-using-jquery


Column json

https://laraveldaily.com/post/working-with-mysql-json-columns-in-laravel-custom-properties-example


### How to change default format at created_at and updated_at value laravel

https://stackoverflow.com/questions/24441395/how-to-change-default-format-at-created-at-and-updated-at-value-laravel

