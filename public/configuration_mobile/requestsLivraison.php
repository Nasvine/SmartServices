<?php

require_once 'config.php';

$response = array();

if (isset($_GET['apicall'])) {
    switch ($_GET['apicall']) {

        case 'add_livraison':
            if (isTheseParametersAvailable(array('adresse_depart', 'adresse_arrivee', 'type_de_colis', 'messageLivreur', 'email', 'password'))) {
                $adresse_depart = $_POST['adresse_depart'];
                $adresse_arrivee = $_POST['adresse_arrivee'];
                $type_de_colis = $_POST['type_de_colis'];
                $messageLivreur = $_POST['messageLivreur'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                $user_id = 0;

                $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($user_id, $stored_password);
                $stmt->fetch();
                $stmt->close();

                if (password_verify($password, $stored_password)) {
                    $stmt = $conn->prepare("INSERT INTO livraisons (adresse_depart, adresse_arrivee, type_de_colis, messageLivreur, user_id) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssss", $adresse_depart, $adresse_arrivee, $type_de_colis, $messageLivreur, $user_id);
                    $stmt->execute();
                    $stmt->close();

                    $response['error'] = false;
                    $response['message'] = 'La demande de livraison a été enregistrée avec succès';
                    $response['adresse_depart'] = $adresse_depart;
                    $response['adresse_arrivee'] = $adresse_arrivee;
                    $response['type_de_colis'] = $type_de_colis;
                    $response['messageLivreur'] = $messageLivreur;
                    $response['user_id'] = $user_id;
                } else {
                    $response['error'] = true;
                    $response['message'] = 'Identifiants incorrects';
                }
            }

            break;

            case 'update_livraison':
                if (isTheseParametersAvailable(array('id_livraison','adresse_depart', 'adresse_livraison', 'typeColis', 'messageLivreur', 'status_livraison'))) {
                    (int) $id_livraison = $_POST['id_livraison'];
                    $adresse_depart = $_POST['adresse_depart'];
                    $adresse_livraison = $_POST['adresse_livraison'];
                    $typeColis = $_POST['typeColis'];
                    $messageLivreur = $_POST['messageLivreur'];
                    $status_livraison = $_POST['status_livraison'];
                    
    
                    $stmt = $conn->prepare("UPDATE livraisons SET adresse_depart = ?, adresse_arrivee = ?, type_de_colis = ?, messageLivreur = ?, status_livraison = ? WHERE id = ?");
                    $stmt->bind_param("sssssi", $adresse_depart, $adresse_livraison, $typeColis, $messageLivreur, $status_livraison, $id_livraison);
                    if ($stmt->execute()){

                        $response['error'] = false;
                        $response['message'] = 'Livraison modifiée avec succès';
                        $response['adresse_depart'] = $adresse_depart;
                        $response['adresse_livraison'] = $adresse_livraison;
                        $response['typeColis'] = $typeColis;
                        $response['messageLivreur'] = $messageLivreur;
                        $response['status_livraison'] = $status_livraison;

                    }
    
                    else {
                        $response['error'] = true;
                        $response['message'] = 'Une erreur s\'est produite';
                    }
                }
    
            break;
    
            case 'update_statut_livraison':
                if (isTheseParametersAvailable(array('id_livraison','status_livraison'))) {

                    (int) $id_livraison = $_POST['id_livraison'];
                    
                    $status_livraison = $_POST['status_livraison'];
                    
    
                    $stmt = $conn->prepare("UPDATE livraisons SET status_livraison = ? WHERE id = ?");
                    $stmt->bind_param("si",$status_livraison, $id_livraison);
                    if ($stmt->execute()){

                        $response['error'] = false;
                        $response['message'] = 'Statut modifié';

                    }
    
                    else {
                        $response['error'] = true;
                        $response['message'] = 'Une erreur s\'est produite';
                    }
                }
    
            break;


        case 'livraisons':
            if (isTheseParametersAvailable(array('email', 'password'))) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $stmt = $conn->prepare("SELECT email,password FROM users WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($email, $storedPassword); 
                    $stmt->fetch();
    
                    if (password_verify($password, $storedPassword)) {

                       $stmt = $conn->prepare("SELECT livraisons.id,livraisons.category,livraisons.adresse_depart, livraisons.adresse_arrivee, livraisons.type_de_colis, livraisons.status_livraison, livraisons.prix,livraisons.montant_total, livraisons.mode_de_paiement, livraisons.messageLivreur, livraisons.created_at, livraisons.updated_at from livraisons INNER JOIN users on users.id=livraisons.user_id WHERE users.email = ? AND users.password = ? order by livraisons.created_at desc ");
                        $stmt->bind_param("ss", $email, $storedPassword);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $rows = $result->fetch_all(MYSQLI_ASSOC);

                        $response = $rows;

                        $stmt->close();
                    } else {
                        $response['error'] = true;
                        $response['message'] = 'Email ou mot de passe invalide !';
                        $response['email'] = $email;
                        $response['password'] = $password;
                    }
                }

            
            }

            break;

            case 'delete_livraison':
                if (isTheseParametersAvailable(array('id'))) {
                    $id = (int)$_POST['id'];
                    $status_livraison="en cours de validation";
    
                    $stmt = $conn->prepare("SELECT status_livraison FROM livraisons WHERE id = ?");
                    $stmt->bind_param("s", $id);
                    $stmt->execute();
                    $stmt->store_result();
                    if ($stmt->num_rows > 0) {
                        $stmt->bind_result($status_livraisonStored); 
                        $stmt->fetch();
    
                        if($status_livraison==$status_livraisonStored){
                            $stmt = $conn->prepare("DELETE FROM livraisons WHERE id = ? AND livraisons.status_livraison = ?");
                            $stmt->bind_param("ss", $id,$status_livraison);
                            $result = $stmt->execute();
                            $response['message']="Suppression réussie";
    
                        }
    
                        else{
                        $response['message']="Echec de suppression!La livraison n'est pas encore payée";
    
                    }
                }
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