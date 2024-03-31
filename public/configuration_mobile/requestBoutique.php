<?php

require_once 'config.php';

$response = array();
if (isset($_GET['apicall'])) {
    switch ($_GET['apicall']) {

        case 'uploads':
            $uploadDir = 'http://anycourse.bj/boutiques/images/';

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
                $image = $_FILES['image'];

                if ($image['error'] === UPLOAD_ERR_OK) {
                    $handle = opendir($uploadDir);
                    $tempPath = $image['tmp_name'];
                    $fileName = basename($image['name']);
                    $uploadPath = $uploadDir . $fileName;

                    if (move_uploaded_file($tempPath, $uploadPath)) {

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

            case 'uploads/produits':
                $uploadDir = 'http://anycourse.bj/boutiques/category_produits/';
    
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
    

        case 'add_boutique':
            if (isTheseParametersAvailable(array('nom_boutique', 'adresse', 'telephone', 'ville', 'email_boutique', 'description', 'photo', 'email', 'password'))) {
                $nom_boutique = $_POST['nom_boutique'];
                $adresse = $_POST['adresse'];
                $telephone = $_POST['telephone'];
                $ville = $_POST['ville'];
                $email_boutique = $_POST['email_boutique'];
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
                    $stmt = $conn->prepare("INSERT INTO boutiques (nom_boutique, adresse, telephone, ville, email, description, photo, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssssss", $nom_boutique, $adresse, $telephone, $ville, $email, $description, $photo, $user_id);
                    $stmt->execute();
                    $stmt->close();

                    $response['error'] = false;
                    $response['message'] = 'Boutique enregistrée avec succès';
                    $response['nom_boutique'] = $nom_boutique;
                    $response['adresse'] = $adresse;
                    $response['telephone'] = $telephone;
                    $response['email'] = $email;
                    $response['description'] = $description;
                    $response['photo'] = $photo;
                    $response['user_id'] = $user_id;
                } else {
                    $response['error'] = true;
                    $response['message'] = 'Identifiants incorrects.';
                }
            }

            break;


            case 'add_produit':
                if (isTheseParametersAvailable(array('nom_produit', 'description', 'prix', 'lienPhoto', 'category'))) {
                    $nom_produit = $_POST['nom_produit'];
                    $description = $_POST['description'];
                    $prix = $_POST['prix'];
                    $lienPhoto = $_POST['lienPhoto'];
                    $category = $_POST['category'];
        
                    $stmt = $conn->prepare("SELECT id FROM category_produits WHERE name = ?");
                    $stmt->bind_param("s", $category);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($category_id);
                    $stmt->fetch();
                    $stmt->close();

                    $stmt = $conn->prepare("INSERT INTO produits (nom_produit, description, prix, lienPhoto, category_produit_id) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssss", $nom_produit, $description, $prix, $lienPhoto, $category_id);
                    if($stmt->execute()){
                        $response['error'] = false;
                        $response['message'] = 'Produit enregistré avec succès';
                        $response['nom_produit'] = $nom_produit ;
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

                case 'update_produit':
                    if (isTheseParametersAvailable(array('nom_produit', 'description', 'prix', 'lienPhoto', 'category','id_produit'))) {
                        $nom = $_POST['nom_produit'];
                        $description = $_POST['description'];
                        $prix = $_POST['prix'];
                        $lienPhoto = $_POST['lienPhoto'];
                        $category = $_POST['category'];
                        $id_produit = $_POST['id_produit'];

                        $stmt = $conn->prepare("SELECT id FROM category_produits WHERE name = ?");
                        $stmt->bind_param("s", $category);
                        $stmt->execute();
                        $stmt->store_result();
                        $stmt->bind_result($category_id);
                        $stmt->fetch();
                        $stmt->close();
            
                        
                        $stmt = $conn->prepare("UPDATE produits SET nom_produit = ?, description = ?, prix = ?, lienPhoto = ?, category_produit_id = ? WHERE id = ?");
                        $stmt->bind_param("sssssi", $nom, $description, $prix, $lienPhoto, $category_id,$id_produit);
                        if($stmt->execute()){
                            $response['error'] = false;
                            $response['message'] = 'Produit mis à jour avec succès';
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


        case 'update_boutique':

            if (isTheseParametersAvailable(array('boutique_id', 'nom_boutique', 'adresse', 'telephone', 'ville', 'email_boutique', 'description', 'photo', 'email', 'password'))) {
                    $boutique_id = $_POST['boutique_id'];
                    $nom_boutique = $_POST['nom_boutique'];
                    $adresse = $_POST['adresse'];
                    $telephone = $_POST['telephone'];
                    $ville = $_POST['ville'];
                    $email_boutique = $_POST['email_boutique'];
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

                            $stmt = $conn->prepare("UPDATE boutiques SET nom_boutique = ?, adresse_boutique = ?, telephone = ?, ville = ?, email = ?, description = ?, photo = ? WHERE id = ?");
                            $stmt->bind_param("sssssssi", $nom_boutique, $adresse, $telephone, $ville, $email_boutique, $description, $photo, $boutique_id);
                            $stmt->execute();
                            $stmt->close();
            
                            $response['error'] = false;
                            $response['message'] = 'Boutique mise à jour avec succès';
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


	case 'boutiques':  

  $stmt = $conn->prepare("SELECT * from boutiques order by boutiques.nom_boutique asc"); 
  $stmt->execute();
  $result = $stmt->get_result();
  $rows = $result->fetch_all(MYSQLI_ASSOC);

  $response = $rows;  

  $stmt->close();

break; 



case 'boutiques_by_user':

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
                $stmt = $conn->prepare("SELECT * from boutiques where boutiques.user_id = ? order by boutiques.nom_boutique asc");
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

case 'category_produits_boutique': 

  $stmt = $conn->prepare("SELECT nom_boutique, category_produits.name, category_produits.lienPhoto from boutiques INNER JOIN boutique_category_produit on boutiques.id=boutique_category_produit.boutique_id INNER JOIN category_produits on category_produits.id=boutique_category_produit.category_produit_id order by boutiques.nom_boutique asc "); 
  $stmt->execute();
  $result = $stmt->get_result();
  $rows = $result->fetch_all(MYSQLI_ASSOC);

  $response = $rows;  

  $stmt->close();
  

break; 


case 'produits_boutique':  
  if(isTheseParametersAvailable(array('nom_boutique'))){  
    $nom_boutique = $_POST['nom_boutique'];    

    $stmt = $conn->prepare("SELECT * from category_produits INNER JOIN boutique_category_produit on category_produits.id=boutique_category_produit.category_produit_id INNER JOIN boutiques on boutiques.id=boutique_category_produit.boutique_id WHERE boutiques.nom_boutique = ? order by name asc "); 
    $stmt->bind_param("s",$nom_boutique);  
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);
 
    $response = $rows;  
  
    $stmt->close();

}

break; 

case 'boutiques_produits':  
  if(isTheseParametersAvailable(array('nom_boutique'))){  
    $nom_boutique = $_POST['nom_boutique'];    

    $stmt = $conn->prepare("SELECT produits.id, produits.nom_produit, produits.description, produits.prix,produits.boutique_id,produits.category_produit_id,produits.promotion_id,produits.ligne_commande_id,produits.created_at,produits.updated_at,produits.lienPhoto,category_produits.name from produits INNER JOIN boutiques on boutiques.id=produits.boutique_id INNER JOIN category_produits on category_produits.id=produits.category_produit_id WHERE boutiques.nom_boutique = ? order by nom_produit asc "); 
    $stmt->bind_param("s",$nom_boutique);  
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);
 
    $response = $rows;  
  
    $stmt->close();

}

break; 

case 'produits_by_boutique_and_category':  
  if(isTheseParametersAvailable(array('nom_boutique','category'))){  
    $nom_boutique = $_POST['nom_boutique'];  
    $category = $_POST['category'];  

    $stmt = $conn->prepare("SELECT produits.id, produits.nom_produit,produits.description,produits.lienPhoto,produits.prix,produits.boutique_id,produits.category_produit_id,produits.promotion_id,produits.ligne_commande_id,produits.created_at,produits.updated_at from produits INNER JOIN boutiques on boutiques.id=produits.boutique_id INNER JOIN category_produits on category_produits.id=produits.category_produit_id WHERE boutiques.nom_boutique = ? and category_produits.name = ? order by nom_produit asc"); 
    $stmt->bind_param("ss",$nom_boutique,$category);  
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);
 
    $response = $rows;  
  
    $stmt->close();

}

break; 


case 'boutique_delete':
if (isTheseParametersAvailable(array('id'))) {

    $id = $_POST['id'];
    
    $stmt = $conn->prepare("DELETE FROM boutiques WHERE id = ? ");
    $stmt->bind_param("s", $id);
    $result = $stmt->execute();
    $response['message']="Suppression réussie";
}

break;


case 'delete_produit':
    if (isTheseParametersAvailable(array('id'))) {

        $id = $_POST['id'];
        
        $stmt = $conn->prepare("DELETE FROM produits WHERE id = ? ");
        $stmt->bind_param("s", $id);
        $result = $stmt->execute();
        $response['message']="Suppression réussie";
    }

break;


case 'add_commande':
    if (isTheseParametersAvailable(array('nom_boutique','category','type_de_commande','status_commande','montant_commande','adresse_depart', 'adresse_arrivee', 'type_de_colis', 'messageLivreur', 'email', 'password'))) {
        
        $nom_boutique = $_POST['nom_boutique'];
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


            $stmt = $conn->prepare("SELECT id FROM boutiques WHERE nom_boutique = ?");
            $stmt->bind_param("s", $nom_boutique);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($stored_id_boutique);
            $stmt->fetch();
            $stmt->close();




            $stmt = $conn->prepare("INSERT INTO commandes (type_de_commande,status_commande, montant_commande, user_id) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $type_de_commande,$status_commande, $montant_commande, $user_id);

            if ($stmt->execute()) {
                $id_element_insere = $stmt->insert_id;
        
                $stmt = $conn->prepare("INSERT INTO livraisons (adresse_depart, adresse_arrivee,category,type_de_colis, messageLivreur, user_id,commande_id,boutique_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssssss", $adresse_depart, $adresse_arrivee, $category,$type_de_colis, $messageLivreur, $user_id, $id_element_insere,$stored_id_boutique);
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
    $response['message'] = 'Opération invalide.';
    }
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