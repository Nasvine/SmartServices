<?php

require_once 'config.php';

$response = array();

if (isset($_GET['apicall'])) {
    switch ($_GET['apicall']) {

        case 'uploads':

            $uploadDir = 'http://anycourse.bj/restaurants/images/';

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
                $image = $_FILES['image'];

                if ($image['error'] === UPLOAD_ERR_OK) {
                    $handle = opendir($uploadDir);
                    $tempPath = $image['tmp_name'];
                    $fileName = basename($image['name']);
                    $uploadPath = $uploadDir . $fileName;

                    // Déplacez le fichier téléchargé vers le répertoire de destination
                    if (move_uploaded_file($tempPath, $uploadPath)) {
                        // Succès
                        $response = array('status' => 'success', 'message' => 'Image uploaded successfully.', 'filePath' => $uploadPath);
                    } else {
                        $response = array('status' => 'error', 'message' => 'Failed to move uploaded file.');
                    }
                } else {
                    $response = array('status' => 'error', 'message' => 'Upload failed.');
                }
            } else {
                $response = array('status' => 'error', 'message' => 'Invalid request.');
            }

            break;

        case 'uploads/plats':
            $uploadDir = 'http://anycourse.bj/restaurants/category_plats/';

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
                $image = $_FILES['image'];

                // Vérifiez si le téléchargement s'est bien passé
                if ($image['error'] === UPLOAD_ERR_OK) {
                    $handle = opendir($uploadDir);
                    $tempPath = $image['tmp_name'];
                    $fileName = basename($image['name']);
                    $uploadPath = $uploadDir . $fileName;

                    // Déplacez le fichier téléchargé vers le répertoire de destination
                    if (move_uploaded_file($tempPath, $uploadPath)) {
                        // Succès
                        $response = array('status' => 'success', 'message' => 'Image uploaded successfully.', 'filePath' => $uploadPath);
                    } else {
                        $response = array('status' => 'error', 'message' => 'Failed to move uploaded file.');
                    }
                } else {
                    $response = array('status' => 'error', 'message' => 'Upload failed.');
                }
            } else {
                $response = array('status' => 'error', 'message' => 'Invalid request.');
            }

            break;

        case 'add_restaurant':
            if (isTheseParametersAvailable(array('nom_restaurant', 'adresse', 'telephone', 'ville', 'email_restaurant', 'description', 'photo', 'email', 'password'))) {
                $nom_restaurant = $_POST['nom_restaurant'];
                $adresse = $_POST['adresse'];
                $telephone = $_POST['telephone'];
                $ville = $_POST['ville'];
                $email_restaurant = $_POST['email_restaurant'];
                $description = $_POST['description'];
                $photo = $_POST['photo'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                $user_id = 0;

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($user_id, $stored_password);
                $stmt->fetch();
                $stmt->close();

                if (password_verify($password, $stored_password)) {
                    $stmt = $conn->prepare("INSERT INTO restaurants (nom_restaurant, adresse_restaurant, telephone, ville, email, description, photo, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssssss", $nom_restaurant, $adresse, $telephone, $ville, $email, $description, $photo, $user_id);
                    $stmt->execute();
                    $stmt->close();

                    $response['error'] = false;
                    $response['message'] = 'Restaurant enregistré avec succès';
                    $response['nom_restaurant'] = $nom_restaurant;
                    $response['adresse_restaurant'] = $adresse;
                    $response['telephone'] = $telephone;
                    $response['email'] = $email;
                    $response['description'] = $description;
                    $response['photo'] = $photo;
                    $response['user_id'] = $user_id;
                } else {
                    $response['error'] = true;
                    $response['message'] = 'Identifiants incorrects';
                }
            }

            break;


            case 'add_plat':
                if (isTheseParametersAvailable(array('nom_restaurant','nom', 'description', 'prix', 'lienPhoto', 'category'))) {
                    $nom_restaurant = $_POST['nom_restaurant'];
                    $nom = $_POST['nom'];
                    $description = $_POST['description'];
                    $prix = $_POST['prix'];
                    $lienPhoto = $_POST['lienPhoto'];
                    $category = $_POST['category'];

                    $stmt = $conn->prepare("SELECT id FROM restaurants WHERE nom_restaurant = ?");
                    $stmt->bind_param("s", $nom_restaurant);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($restaurant_id);
                    $stmt->fetch();
                    $stmt->close();
        
                    $stmt = $conn->prepare("SELECT id FROM category_plats WHERE name = ?");
                    $stmt->bind_param("s", $category);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($category_id);
                    $stmt->fetch();
                    $stmt->close();

                    $stmt = $conn->prepare("INSERT INTO plats (nom, description, prix, lienPhoto, category_plat_id, restaurant_id) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssss", $nom, $description, $prix, $lienPhoto, $category_id,$restaurant_id);
                    if($stmt->execute()){
                        $response['error'] = false;
                        $response['message'] = 'Plat enregistré avec succès';
                        $response['nom'] = $nom;
                        $response['description'] = $description;
                        $response['prix'] = $prix;
                        $response['lienPhoto'] = $lienPhoto;
                        
                    }

                    else{
                        $response['error'] = true;
                        $response['message'] = 'Une erreur s\'est produite';
                    }
                    $stmt->close();
    
                
                }
    
                break;


                case 'update_plat':
                    if (isTheseParametersAvailable(array('nom', 'description', 'prix', 'lienPhoto', 'category','id_plat'))) {
                        $nom = $_POST['nom'];
                        $description = $_POST['description'];
                        $prix = $_POST['prix'];
                        $lienPhoto = $_POST['lienPhoto'];
                        $category = $_POST['category'];
                        $id_plat = $_POST['id_plat'];

                        $stmt = $conn->prepare("SELECT id FROM category_plats WHERE name = ?");
                        $stmt->bind_param("s", $category);
                        $stmt->execute();
                        $stmt->store_result();
                        $stmt->bind_result($category_id);
                        $stmt->fetch();
                        $stmt->close();
            
                        
                        $stmt = $conn->prepare("UPDATE plats SET nom = ?, description = ?, prix = ?, lienPhoto = ?, category_plat_id = ? WHERE id = ?");
                        $stmt->bind_param("sssssi", $nom, $description, $prix, $lienPhoto, $category_id,$id_plat);
                        if($stmt->execute()){
                            $response['error'] = false;
                            $response['message'] = 'Plat mis à jour avec succès';
                            $response['nom'] = $nom;
                            $response['description'] = $description;
                            $response['prix'] = $prix;
                            $response['lienPhoto'] = $lienPhoto;
                            
                        }
    
                        else{
                            $response['error'] = true;
                            $response['message'] = 'Une erreur s\'est produite';
                        }
                        $stmt->close();
        
                    
                    }
        
                    break;


            case 'update_restaurant':

              if (isTheseParametersAvailable(array('restaurant_id', 'nom_restaurant', 'adresse', 'telephone', 'ville', 'email_restaurant', 'description', 'photo', 'email', 'password'))) {
                    $restaurant_id = $_POST['restaurant_id'];
                    $nom_restaurant = $_POST['nom_restaurant'];
                    $adresse = $_POST['adresse'];
                    $telephone = $_POST['telephone'];
                    $ville = $_POST['ville'];
                    $email_restaurant = $_POST['email_restaurant'];
                    $description = $_POST['description'];
                    $photo = $_POST['photo'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
            
                    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $stmt->store_result();
                    
                    if ($stmt->num_rows > 0) {
                        $stmt->bind_result($user_id, $stored_password);
                        $stmt->fetch();
            
                        if (password_verify($password, $stored_password)) {

                            $stmt = $conn->prepare("UPDATE restaurants SET nom_restaurant = ?, adresse_restaurant = ?, telephone = ?, ville = ?, email = ?, description = ?, photo = ? WHERE id = ?");
                            $stmt->bind_param("sssssssi", $nom_restaurant, $adresse, $telephone, $ville, $email_restaurant, $description, $photo, $restaurant_id);
                            $stmt->execute();
                            $stmt->close();
            
                            $response['error'] = false;
                            $response['message'] = 'Restaurant mis à jour avec succès';
                        } else {
                            $response['error'] = true;
                            $response['message'] = 'Identifiants incorrects';
                        }
                    } else {
                        $response['error'] = true;
                        $response['message'] = 'Utilisateur introuvable';
                 }
            }

        break;
 

        case 'restaurants':

            $stmt = $conn->prepare("SELECT * from restaurants order by restaurants.nom_restaurant asc");
            $stmt->execute();
            $result = $stmt->get_result();
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            $response = $rows;

            $stmt->close();

            break;


        case 'restaurants_by_user':

            if (isTheseParametersAvailable(array('email', 'password'))) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    $storedPassword = $user['password'];

                    if (password_verify($password, $storedPassword)) {
                        $user_id_connected = $user['id'];
                        $stmt = $conn->prepare("SELECT * from restaurants where restaurants.user_id = ? order by restaurants.nom_restaurant asc");
                        $stmt->bind_param("s", $user_id_connected);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $rows = $result->fetch_all(MYSQLI_ASSOC);
            
                        $response = $rows;
            
                        $stmt->close();
                    } 
                    else {
                        $response['error'] = true;
                        $response['message'] = 'Email ou mot de passe invalide !';
                        echo json_encode($response);
                        exit;
                    }
                } else {
                    $response['error'] = true;
                    $response['message'] = 'Identifiants inexistants!';
                    echo json_encode($response);
                    exit;
                }

        }

        break;

        case 'category_plats_restaurant':

            $stmt = $conn->prepare("SELECT nom_restaurant, category_plats.name, category_plats.lienPhoto from restaurants INNER JOIN category_plat_restaurant on restaurants.id=category_plat_restaurant.restaurant_id INNER JOIN category_plats on category_plats.id=category_plat_restaurant.category_plat_id order by restaurants.nom_restaurant asc ");
            $stmt->execute();
            $result = $stmt->get_result();
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            $response = $rows;

            $stmt->close();

            break;


        case 'category_plats':

            $stmt = $conn->prepare("SELECT name, category_plats.lienPhoto from category_plats order by name asc ");
            $stmt->execute();
            $result = $stmt->get_result();
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            $response = $rows;

            $stmt->close();

            break;

        case 'plats_restaurant':
            if (isTheseParametersAvailable(array('nom_restaurant'))) {
                $nom_restaurant = $_POST['nom_restaurant'];

                $stmt = $conn->prepare("SELECT * from category_plats INNER JOIN category_plat_restaurant on category_plats.id=category_plat_restaurant.category_plat_id INNER JOIN restaurants on restaurants.id=category_plat_restaurant.restaurant_id WHERE restaurants.nom_restaurant = ? order by name asc ");
                $stmt->bind_param("s", $nom_restaurant);
                $stmt->execute();
                $result = $stmt->get_result();
                $rows = $result->fetch_all(MYSQLI_ASSOC);

                $response = $rows;

                $stmt->close();
            }

            break;

        case 'restaurants_plats':
            if (isTheseParametersAvailable(array('nom_restaurant'))) {
                $nom_restaurant = $_POST['nom_restaurant'];

                $stmt = $conn->prepare("SELECT plats.id, plats.nom, plats.description, plats.prix, plats.restaurant_id, plats.category_plat_id, plats.promotion_id, plats.ligne_commande_id, plats.created_at, plats.updated_at, plats.lienPhoto, category_plats.name from plats INNER JOIN restaurants on restaurants.id=plats.restaurant_id INNER JOIN category_plats on category_plats.id=plats.category_plat_id WHERE restaurants.nom_restaurant = ? order by nom asc ");
                $stmt->bind_param("s", $nom_restaurant);
                $stmt->execute();
                $result = $stmt->get_result();
                $rows = $result->fetch_all(MYSQLI_ASSOC);

                $response = $rows;

                $stmt->close();
            }

            break;

        case 'plats_by_restaurant_and_category':
            if (isTheseParametersAvailable(array('nom_restaurant', 'category'))) {
                $nom_restaurant = $_POST['nom_restaurant'];
                $category = $_POST['category'];

                $stmt = $conn->prepare("SELECT plats.id, plats.nom, plats.description, plats.prix, plats.lienPhoto, plats.restaurant_id, plats.category_plat_id, plats.promotion_id, plats.ligne_commande_id, plats.created_at, plats.updated_at,category_plats.name from plats INNER JOIN restaurants on restaurants.id=plats.restaurant_id INNER JOIN category_plats on category_plats.id=plats.category_plat_id WHERE restaurants.nom_restaurant = ? and category_plats.name = ? order by nom asc");
                $stmt->bind_param("ss", $nom_restaurant, $category);
                $stmt->execute();
                $result = $stmt->get_result();
                $rows = $result->fetch_all(MYSQLI_ASSOC);

                $response = $rows;

                $stmt->close();
            }

        break;

        case 'delete_restaurant':
        if (isTheseParametersAvailable(array('id'))) {

            $id = $_POST['id'];
            
            $stmt = $conn->prepare("DELETE FROM restaurants WHERE id = ? ");
            $stmt->bind_param("s", $id);
            $result = $stmt->execute();
            $response['message']="Suppression réussie";
        }


        case 'delete_plat':
            if (isTheseParametersAvailable(array('id'))) {

                $id = $_POST['id'];
                
                $stmt = $conn->prepare("DELETE FROM plats WHERE id = ? ");
                $stmt->bind_param("s", $id);
                $result = $stmt->execute();
                $response['message']="Suppression réussie";
            }

        break;


        case 'add_commande':
            if (isTheseParametersAvailable(array('nom_restaurant','category','type_de_commande','status_commande','montant_commande','adresse_depart', 'adresse_arrivee', 'type_de_colis', 'messageLivreur', 'email', 'password'))) {
                
                $nom_restaurant = $_POST['nom_restaurant'];
                $category = $_POST['category'];
                $type_de_commande = $_POST['type_de_commande'];
                $status_commande = $_POST['status_commande'];
                $montant_commande = $_POST['montant_commande'];
                $adresse_depart = $_POST['adresse_depart'];
                $adresse_arrivee = $_POST['adresse_arrivee'];
                $type_de_colis = $_POST['type_de_colis'];
                $messageLivreur = $_POST['messageLivreur'];
                $email = $_POST['email'];
                $password = $_POST['password'];
        
                $user_id = 0;
        
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
                $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($user_id, $stored_password);
                $stmt->fetch();
                $stmt->close();
        
                if (password_verify($password, $stored_password)) {

                    $stmt = $conn->prepare("SELECT id FROM restaurants WHERE nom_restaurant = ?");
                    $stmt->bind_param("s", $nom_restaurant);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($stored_id_restaurant);
                    $stmt->fetch();
                    $stmt->close();


                    $stmt = $conn->prepare("INSERT INTO commandes (type_de_commande,status_commande, montant_commande, user_id) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("ssss", $type_de_commande,$status_commande, $montant_commande, $user_id);
        
                    if ($stmt->execute()) {
                        $id_element_insere = $stmt->insert_id;
                
                        $stmt = $conn->prepare("INSERT INTO livraisons (adresse_depart, adresse_arrivee,category,type_de_colis, messageLivreur, user_id,commande_id,restaurant_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("ssssssss", $adresse_depart, $adresse_arrivee,$category,$type_de_colis, $messageLivreur, $user_id, $id_element_insere,$stored_id_restaurant);
                        $stmt->execute();
                        $stmt->close();
        
                        $response=$id_element_insere; 

                    } else {
                        $response['error'] = true;
                        $response['message'] = 'Erreur lors de l\'insertion de l\'élément : ' . $stmt->error;
                    }
                } else {
                    $response['error'] = true;
                    $response['message'] = 'Identifiants incorrects';
                }
            }
            break;


            case 'add_to_commande':

                if (isTheseParametersAvailable(array('commande_id','nom_produit','prix','quantite'))) {

                    (int)$commande_id = $_POST['commande_id'];
                    $nom_produit = $_POST['nom_produit'];
                    $prix = $_POST['prix'];
                    $quantite = $_POST['quantite'];

                    $stmt = $conn->prepare("INSERT INTO ligne_commandes (commande_id,nom_du_produit,prix, quantite) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("ssss", $commande_id,$nom_produit, $prix, $quantite);
                    $stmt->execute();
                    $stmt->close();
            }

            break;
        
        default:
        $response['error'] = true;
        $response['message'] = 'Invalid Operation Called';
    }
} else {
    $response['error'] = true;
    $response['message'] = 'Invalid API Call';
}

header('Content-Type: application/json');
echo json_encode($response);

function isTheseParametersAvailable($params)
{
    foreach ($params as $param) {
        if (!isset($_POST[$param])) {
            return false;
        }
    }
    return true;
}
?>