<?php

require_once 'config.php';

$response = array();

if (isset($_GET['apicall'])) {
    switch ($_GET['apicall']) {

        case 'addcourse':
            if (isTheseParametersAvailable(array('adresse_depart', 'adresse_livraison', 'titre', 'description', 'status_livraison', 'email', 'password'))) {
                $adresse_depart = $_POST['adresse_depart'];
                $adresse_livraison = $_POST['adresse_livraison'];
                $titre = $_POST['titre'];
                $description = $_POST['description'];
                $status_livraison = $_POST['status_livraison'];
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
                    $stmt = $conn->prepare("INSERT INTO courses (adresse_depart, adresse_livraison, titre, description, status_livraison, user_id) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssss", $adresse_depart, $adresse_livraison, $titre, $description, $status_livraison, $user_id);
                    $stmt->execute();
                    $stmt->close();

                    $response['error'] = false;
                    $response['message'] = 'Course enregistrée avec succès';
                    $response['adresse_depart'] = $adresse_depart;
                    $response['adresse_livraison'] = $adresse_livraison;
                    $response['titre'] = $titre;
                    $response['description'] = $description;
                    $response['status_livraison'] = $status_livraison;
                    $response['user_id'] = $user_id;
                } else {
                    $response['error'] = true;
                    $response['message'] = 'Identifiants incorrects';
                }
            }

            break;


            case 'update_course':
                if (isTheseParametersAvailable(array('id_course','adresse_depart', 'adresse_livraison', 'titre', 'description', 'status_livraison'))) {
                    (int) $id_course = $_POST['id_course'];
                    $adresse_depart = $_POST['adresse_depart'];
                    $adresse_livraison = $_POST['adresse_livraison'];
                    $titre = $_POST['titre'];
                    $description = $_POST['description'];
                    $status_livraison = $_POST['status_livraison'];
                    
    
                    $stmt = $conn->prepare("UPDATE courses SET adresse_depart = ?, adresse_livraison = ?, titre = ?, description = ?, status_livraison = ? WHERE id = ?");
                    $stmt->bind_param("sssssi", $adresse_depart, $adresse_livraison, $titre, $description, $status_livraison, $id_course);
                    if ($stmt->execute()){

                        $response['error'] = false;
                        $response['message'] = 'Course modifiée avec succès';
                        $response['adresse_depart'] = $adresse_depart;
                        $response['adresse_livraison'] = $adresse_livraison;
                        $response['titre'] = $titre;
                        $response['description'] = $description;
                        $response['status_livraison'] = $status_livraison;

                    }
    
                    else {
                        $response['error'] = true;
                        $response['message'] = 'Une erreur s\'est produite';
                    }
                }
    
            break;

            case 'update_statut_course':
                if (isTheseParametersAvailable(array('id_course','status_livraison'))) {

                    (int) $id_course = $_POST['id_course'];
                    
                    $status_livraison = $_POST['status_livraison'];
                    
    
                    $stmt = $conn->prepare("UPDATE courses SET status_livraison = ? WHERE id = ?");
                    $stmt->bind_param("si",$status_livraison, $id_course);
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
    

        case 'courses':
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

                        $stmt = $conn->prepare("SELECT courses.id, description, titre, status_livraison, adresse_depart, adresse_livraison, montant_total, prix, mode_de_paiement, courses.user_id, courses.created_at, courses.updated_at FROM courses INNER JOIN users ON users.id = courses.user_id WHERE users.email = ? AND users.password = ? ORDER BY courses.created_at DESC");
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

        case 'deletecourse':
            if (isTheseParametersAvailable(array('id'))) {
                $id = (int)$_POST['id'];
                $status_livraison="en cours de validation";

                $stmt = $conn->prepare("SELECT status_livraison FROM courses WHERE id = ?");
                $stmt->bind_param("s", $id);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($status_livraisonStored); 
                    $stmt->fetch();

                    if($status_livraison==$status_livraisonStored){
                        $stmt = $conn->prepare("DELETE FROM courses WHERE id = ? AND courses.status_livraison = ?");
                        $stmt->bind_param("ss", $id,$status_livraison);
                        $result = $stmt->execute();
                        $response['message']="Suppression réussie";

                    }

                    else{
                    $response['message']="Echec de suppression!La course n'est pas encore payée";

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