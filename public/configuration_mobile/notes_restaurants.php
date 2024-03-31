<?php

require_once 'config.php';

$response = array();

if (isset($_GET['apicall'])) {
    switch ($_GET['apicall']) {

        case 'list_notes':
            if (isTheseParametersAvailable(array('email', 'password'))) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $actor_noted = "RESTAURANT";

                $note = "";
                $commentaire = "";
                $user_id = 0;
                $restaurant_id = 0;
                $id = 0;

                $user_id_connected = 0;

                $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    $storedPassword = $user['password'];

                    if (password_verify($password, $storedPassword)) {
                        $user_id_connected = $user['id'];
                    } else {
                        $response['error'] = true;
                        $response['message'] = 'Email ou mot de passe invalide !';
                        echo json_encode($response);
                        exit;
                    }
                } else {
                    $response['error'] = true;
                    $response['message'] = 'Email ou mot de passe invalide !';
                    echo json_encode($response);
                    exit;
                }
                $stmt->close();

                $stmt = $conn->prepare("SELECT notes_actors.id, notes.note, notes_actors.commentaire, notes_actors.user_id, notes_actors.restaurant_id, notes_actors.created_at, notes_actors.updated_at FROM notes_actors INNER JOIN notes ON notes.id = notes_actors.note_id WHERE notes_actors.actor_noted = ?");
                $stmt->bind_param("s", $actor_noted);
                $stmt->execute();
                $result = $stmt->get_result();
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                $list = $rows;
                $stmt->close();

                $response['list'] = $list;
                $response['user_id_connected'] = $user_id_connected;
            }

            break;

        case 'post_note_restaurant':
            if (isTheseParametersAvailable(array('email', 'password', 'note', 'nom_restaurant', 'commentaire', 'actor_noted'))) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $note = $_POST['note'];
                $nom_restaurant = $_POST['nom_restaurant'];
                $commentaire = $_POST['commentaire'];
                $actor_noted = $_POST['actor_noted'];

                $user_id = 0;

                $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    $storedPassword = $user['password'];

                    if (password_verify($password, $storedPassword)) {
                        $user_id = $user['id'];
                    } else {
                        $response['error'] = true;
                        $response['message'] = 'Email ou mot de passe invalide !';
                        echo json_encode($response);
                        exit;
                    }
                } else {
                    $response['error'] = true;
                    $response['message'] = 'Email ou mot de passe invalide !';
                    echo json_encode($response);
                    exit;
                }
                $stmt->close();

                $note_id = 0;

                $stmt = $conn->prepare("SELECT id FROM notes WHERE note = ?");
                $stmt->bind_param("s", $note);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($note_id);
                $stmt->fetch();
                $stmt->close();

                $restaurant_id = 0;
                $createdAt = "la date";
                $updatedAt = "la date";

                $stmt = $conn->prepare("SELECT id FROM restaurants WHERE nom_restaurant = ?");
                $stmt->bind_param("s", $nom_restaurant);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($restaurant_id);
                $stmt->fetch();
                $stmt->close();

                $stmt = $conn->prepare("INSERT INTO notes_actors (note_id, commentaire, user_id, actor_noted, restaurant_id) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $note_id, $commentaire, $user_id, $actor_noted, $restaurant_id);

                if ($stmt->execute()) {
                    $stmt = $conn->prepare("SELECT notes_actors.id, notes.note, notes_actors.commentaire, notes_actors.user_id, notes_actors.restaurant_id, notes_actors.created_at, notes_actors.updated_at FROM notes_actors INNER JOIN notes ON notes.id = notes_actors.note_id WHERE user_id = ? AND restaurant_id = ?");
                    $stmt->bind_param("ss", $user_id, $restaurant_id);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($note_id, $note, $commentaire, $user_id, $restaurant_id, $createdAt, $updatedAt);

                    $response['note_id'] = $note_id;
                    $response['note'] = (int)$note;
                    $response['commentaire'] = $commentaire;
                    $response['user_id'] = $user_id;
                    $response['restaurant_id'] = $restaurant_id;
                    $response['createdAt'] = $createdAt;
                    $response['updatedAt'] = $updatedAt;
                }
                $stmt->close();
            }

            break;

        case 'delete_note_restaurant':
            if (isTheseParametersAvailable(array('id'))) {
                $id = $_POST['id'];

                $stmt = $conn->prepare("DELETE FROM notes_actors WHERE id = ?");
                $stmt->bind_param("s", $id);
                $result = $stmt->execute();

                $response['id'] = $id;
                $response['success'] = $result;

                $stmt->close();
            }

            break;

        default:
            $response['error'] = true;
            $response['message'] = 'Opération invalide.';
    }
} else {
    $response['error'] = true;
    $response['message'] = 'Appel API invalide.';
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