<?php   

require_once 'config.php' ;   

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "vendor/autoload.php";

  $response = array();  
  if(isset($_GET['apicall'])){  
  switch($_GET['apicall']){ 

  case 'signup':  
    if(isTheseParametersAvailable(array('nom','prenoms','nomUtilisateur','email','telephone','password'))){  
    $nom = $_POST['nom'];   
    $prenom = $_POST['prenoms'];   
    $nomUtilisateur = $_POST['nomUtilisateur'];  
    $email = $_POST['email'];   
    $telephone = $_POST['telephone'];   
    $password = $_POST['password'];  

    $role = "Client";

    $id=0;

    $stmt = $conn->prepare("SELECT id FROM profiles WHERE nomUtilisateur = ? OR email = ?");  
    $stmt->bind_param("ss", $nomUtilisateur, $email);  
    $stmt->execute();  
    $stmt->store_result();  
   
    if($stmt->num_rows > 0){  
        $response['message'] =  'Nom d\'utilisateur ou e-mail déjà enregistré';  
        $stmt->close();  
    }  
    else{  

        $stmt = $conn->prepare("SELECT id FROM roles WHERE name = ?");
        $stmt->bind_param("s", $role);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($role_id); 
            $stmt->fetch();
        }

      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $stmt = $conn->prepare("INSERT INTO users (email, role_id, password) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $email, $role_id, $hashedPassword); 
      
        if($stmt->execute()){  
            $stmt = $conn->prepare("SELECT id,email,password FROM users WHERE email = ?");   
            $stmt->bind_param("s",$email);  
            $stmt->execute();  
            $stmt->store_result();  
            $stmt->bind_result($id, $email, $password);  
            $stmt->fetch();  

   
            $user = array(  
            'id'=>$id,   
            'email'=>$email,   
            'password'=>$password,  

            );  

        $stmt = $conn->prepare("INSERT INTO profiles (first_name, last_name, phone, email, nomUtilisateur,user_id) VALUES (?, ?, ?, ?, ?,?)");  
        $stmt->bind_param("ssssss", $prenom, $nom, $telephone, $email, $nomUtilisateur,$user['id']);  
   
        if($stmt->execute()){  
            $stmt = $conn->prepare("SELECT id, first_name, last_name, phone, email, nomUtilisateur FROM profiles WHERE email = ?");   
            $stmt->bind_param("s",$email);  
            $stmt->execute();  
            $stmt->store_result();  
            $stmt->bind_result($id,$prenom, $nom, $telephone, $email, $nomUtilisateur);  
            $stmt->fetch();  

   
            $profile = array(
            'nom'=>$nom,  
            'prenoms'=>$prenom,   
            'telephone'=>$telephone,  
            'email'=>$email,  
            'id_user'=>$user['id'],  
            'nomUtilisateur'=>$nomUtilisateur

            );  
   
            $stmt->close();  
   
            $response['message'] = 'Utilisateur enregistré avec succès';   
            
            
            try {
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->header='MIME-Version: 1.0\r\n ' . "Content-type: text/html; charset=UTF-8\r\n" . 'From: vinenassara@gmail.com' . "\r\n" ;
                $mail->Username = 'vinenassara@gmail.com'; 
                $mail->Password = 'tfnlaqleddzmpeju'; 
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->CharSet = 'UTF-8';
                $mail->Encoding = 'base64';
                $mail->isHTML(true);
                $mail->setFrom('vinenassara@gmail.com', 'Any Course');
                $mail->addAddress($email);
                $mail->Subject = 'Bienvenu à Any course';
                $mail->Body = "<!DOCTYPE html>
                <html>
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f5f5f5;
                            margin: 0;
                            padding: 0;
                        }
                        .container {
                            background-color: #ffffff;
                            max-width: 600px;
                            margin: 0 auto;
                            padding: 20px;
                            border: 1px solid #e1e1e1;
                            border-radius: 5px;
                        }
                        h1 {
                            color: #333;
                        }
                        p {
                            color: #777;
                        }
                    
                    </style>
                </head>
                <body>
                <div class=\"container\">
                        <h1>Validation de l'adresse mail</h1>
                        <p>Bienvenu à Any course</p>
                        <p>Veuillez cliquer sur ce bouton pour confirmer votre adresse e-mail</p>
                        <button>Vérifier e-mail</button>
                        <p>Merci d'avoir choisi, Any Course !</p>
                    </div>
                </body>
                </html>
                ";

            } catch (Exception $e) {
                $response['message'] = "Erreur lors de l'envoi de l'e-mail : " . $e->getMessage();
            }
   
        }  
    }  
   
}
}  
else{  
    $response = 'Les informations requises ne sont pas disponibles';   
}  
break; 

case 'login':  
  if(isTheseParametersAvailable(array('email', 'password'))){  
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
            $response['error'] = false;
            $response['message'] = 'Connexion réussie';
            $response['email'] = $email;
            $response['password'] = $password;
        } else {
            $response['error'] = true;
            $response['message'] = 'Email ou mot de passe invalide !';
            $response['email'] = 'Email';
            $response['password'] = 'Pass';
        }
    } else {
        $response['error'] = true;
        $response['message'] = 'Email ou mot de passe invalide !';
        $response['email'] = 'Email';
        $response['password'] = 'Pass';
    }
  }
break; 

case 'get_user':  
    if(isTheseParametersAvailable(array('email', 'password'))){  
      $email = $_POST['email'];
      $password = $_POST['password'];

      $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt->store_result();

      if ($stmt->num_rows > 0) {
          $stmt->bind_result($userId, $storedPassword);
          $stmt->fetch();

          if (password_verify($password, $storedPassword)) {
              $stmt = $conn->prepare("SELECT first_name, last_name, nomUtilisateur, sexe, phone, adress, photo, email FROM profiles WHERE user_id = ?");
              $stmt->bind_param("s", $userId);
              $stmt->execute();
              $result = $stmt->get_result();
              $userData = $result->fetch_assoc();

              $response = $userData;
          } else {
              $response['error'] = true;
              $response['message'] = 'Email ou mot de passe invalide !';
          }
      } else {
          $response['error'] = true;
          $response['message'] = 'Email ou mot de passe invalide !';
      }
  } 

  
  break;


  case 'upload':

    $uploadDir = 'http://anycourse.bj/utilisateurs/images/image_profile';

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


  case 'update_user':  
    if(isTheseParametersAvailable(array('email', 'password','first_name','last_name','nomUtilisateur','sexe','phone','adress','photo','email_modify'))){  
      $email = $_POST['email'];
      $password = $_POST['password'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $nomUtilisateur = $_POST['nomUtilisateur'];
      $sexe = $_POST['sexe'];
      $phone = $_POST['phone'];
      $adress = $_POST['adress'];
      $photo = $_POST['photo'];
      $emailModify = $_POST['email_modify'];


      $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt->store_result();

      if ($stmt->num_rows > 0) {
          $stmt->bind_result($userId, $storedPassword);
          $stmt->fetch();

          if (password_verify($password, $storedPassword)) {
              $stmt = $conn->prepare("UPDATE profiles SET first_name = ?, last_name = ?, nomUtilisateur = ?, sexe = ?, phone = ?, adress = ?, photo = ?, email = ?  INNER JOIN users on users.id=profiles.user_id FROM profiles WHERE email = ? AND password = ?");
              $stmt->bind_param("ssssssssii", $first_name, $last_name,$nomUtilisateur,$sexe,$phone,$adress,$photo,$emailModify,$email,$password);
              $stmt->execute();
              $result = $stmt->get_result();
              $userData = $result->fetch_assoc();

              if($email != $emailModify){

                $stmt = $conn->prepare("UPDATE users SET email = ? FROM users WHERE email = ?");
                $stmt->bind_param("si", $emailModify, $email);
                $stmt->execute();

              }

              $response = $userData;
          } else {
              $response['error'] = true;
              $response['message'] = 'Email ou mot de passe invalide !';
          }
      } else {
          $response['error'] = true;
          $response['message'] = 'Email ou mot de passe invalide !';
      }
  } 

  
  break;

  case 'change_password':
    if (isTheseParametersAvailable(array('email', 'password'))) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Utilisez la requête SQL correcte pour mettre à jour le mot de passe d'un utilisateur
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashedPassword, $email);
        
        if ($stmt->execute()) {
            // Le mot de passe a été mis à jour avec succès
            $response['error'] = false;
            $response['message'] = 'Mot de passe modifié avec succès.';
        } else {
            // Une erreur s'est produite lors de la mise à jour du mot de passe
            $response['error'] = true;
            $response['message'] = 'Échec de la modification du mot de passe.';
        }
    } else {
        $response['error'] = true;
        $response['message'] = 'Paramètres manquants. Assurez-vous de spécifier l\'email et le nouveau mot de passe.';
    }

    break;


  case 'reset_password':
    if (isTheseParametersAvailable(array('email'))) {
        $email = $_POST['email'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        $result->close();

        if ($user) {


            $stmt = $conn->prepare("SELECT * FROM password_reset_tokens WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $resetToken = $result->fetch_assoc();
            $result->close();

            if ($resetToken) {
                $reset_code = mt_rand(100000, 999999);
                $expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));
                $stmt = $conn->prepare("UPDATE password_reset_tokens SET token = ?, expiration = ? WHERE email = ?");
                $stmt->bind_param("sss", $reset_code, $expiration, $email);
                $stmt->execute();
            } else {
                $reset_code = mt_rand(100000, 999999);
                $expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));
                $stmt = $conn->prepare("INSERT INTO password_reset_tokens (email, token, expiration) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $email, $reset_code, $expiration);
                $stmt->execute();
            }

            try {
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->header='MIME-Version: 1.0\r\n ' . "Content-type: text/html; charset=UTF-8\r\n" . 'From: vinenassara@gmail.com' . "\r\n" ;
                $mail->Username = 'vinenassara@gmail.com'; 
                $mail->Password = 'tfnlaqleddzmpeju'; 
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->CharSet = 'UTF-8';
                $mail->Encoding = 'base64';
                $mail->isHTML(true);
                $mail->setFrom('vinenassara@gmail.com', 'Any Course');
                $mail->addAddress($email);
                $mail->Subject = 'Réinitialisation du mot de passe';
                $mail->Body = "<!DOCTYPE html>
                <html>
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f5f5f5;
                            margin: 0;
                            padding: 0;
                        }
                        .container {
                            background-color: #ffffff;
                            max-width: 600px;
                            margin: 0 auto;
                            padding: 20px;
                            border: 1px solid #e1e1e1;
                            border-radius: 5px;
                        }
                        h1 {
                            color: #333;
                        }
                        p {
                            color: #777;
                        }
                    
                    </style>
                </head>
                <body>
                <div class=\"container\">
                        <h1>Réinitialisation du mot de passe</h1>
                        <p>Votre code de réinitialisation de mot de passe est : <a href=''><strong>" . $reset_code . "</strong></a></p>
                        <p>Ce code de réinitialisation de mot de passe expirera dans 60 minutes.</p>
                        <p>Merci d'avoir choisi, Any Course !</p>
                    </div>
                </body>
                </html>
                ";

                if ($mail->send()) {
                    $response['message'] = "Un code de réinitialisation a été envoyé à votre adresse e-mail.";
                    $response['code'] = "$reset_code";
                    $response['expiration'] = "$expiration";

                } else {
                    $response['message'] = "Erreur lors de l'envoi de l'e-mail : " . $mail->ErrorInfo;
                }
            } catch (Exception $e) {
                $response['message'] = "Erreur lors de l'envoi de l'e-mail : " . $e->getMessage();
            }
        } else {
            $response['message'] = "Adresse e-mail non trouvée dans notre base de données.";
        }
    }
    break;

  
default:   
$response['error'] = true;   
$response['message'] = 'Invalid Operation Called';  
$response['email'] = 'Email';   
$response['password'] = 'Pass';   
    }  
}  
else{  
$response['error'] = true;   
$response['message'] = 'Invalid API Call';
$response['email'] = 'Email';   
$response['password'] = 'Pass';     
} 


header('Content-Type: application/json');
echo json_encode($response); 

function isTheseParametersAvailable($params){  
foreach($params as $param){  
 if(!isset($_POST[$param])){  
     return false;   
  }  
}  
return true;   
}  
?>  