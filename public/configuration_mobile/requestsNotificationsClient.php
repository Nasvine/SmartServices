<?php

require_once 'config.php';

$response = array();

if (isset($_GET['apicall'])) {
    switch ($_GET['apicall']) {

        case 'notifications':
            if (isTheseParametersAvailable(array('email', 'password'))) {
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

                // Utilisez password_verify pour vérifier le mot de passe
                if (password_verify($password, $stored_password)) {
                    $stmt = $conn->prepare("SELECT notifications.id, notifications.type_de_notification, notifications.status, notifications.message, notifications.user_id, notifications.created_at, notifications.updated_at FROM notifications INNER JOIN users ON users.id=notifications.user_id WHERE users.email = ? AND users.password = ? ORDER BY notifications.created_at DESC");
                    $stmt->bind_param("ss", $email, $stored_password);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $rows = $result->fetch_all(MYSQLI_ASSOC);

                    $response = $rows;

                    $stmt->close();
                } else {
                    $response['error'] = true;
                    $response['message'] = 'Identifiants incorrects';
                }
            }

            break;

        case 'read_notifications':
            if (isTheseParametersAvailable(array('id'))) {
                $id = (int)$_POST['id'];
                $status = "lu";

                $stmt = $conn->prepare("UPDATE notifications SET status = ? WHERE notifications.id = ?");
                $stmt->bind_param("ss", $status, $id);
                $stmt->execute();

                $stmt->close();
            }

            break;

        case 'delete_notifications':
            if (isTheseParametersAvailable(array('id'))) {
                $id = (int) $_POST['id'];

                $stmt = $conn->prepare("DELETE FROM notifications WHERE id = ?");
                $stmt->bind_param("s", $id);
                $result = $stmt->execute();

                $response['id'] = $id;
                $response['success'] = $result;
            }

            break;


            case 'send_message':
                if (isTheseParametersAvailable(array('message'))) {
                    $message = $_POST['message'];
            
                    $app_id = 'ebba0bdc-a948-49a6-a7d0-d83216315013';
                    $rest_api_key = 'ODI5NDIyM2YtMWZjNy00ZDM3LWFiMTAtYTM3ZmU4MmYwZjc2';
            
                    $content = array(
                        'fr' => $message 
                    );
                    
                    $fields = array(
                        'app_id' => $app_id,
                        'contents' => $content,
                        'include_player_ids' => array("c59d5129-608b-42bc-966b-898ccee7915f"),
                    );
            
                    $fields = json_encode($fields);
            
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, 'https://onesignal.com/api/v1/notifications');
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json; charset=utf-8',
                        'Authorization: Basic ' . $rest_api_key));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HEADER, false);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            
                    $response = curl_exec($ch);
                    
                    if ($response === false) {
                        $response = array(
                            'error' => true,
                            'message' => 'Erreur lors de l\'envoi du message via OneSignal: ' . curl_error($ch)
                        );
                    }
            
                    curl_close($ch);
            
                    echo json_encode($response);
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