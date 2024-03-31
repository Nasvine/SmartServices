<?php   

require_once 'config.php' ;   

  $response = array();  
  if(isset($_GET['apicall'])){  
  switch($_GET['apicall']){  

case 'add_heart_post_boutique':  
  if(isTheseParametersAvailable(array('email','password','nom_boutique'))){  
  $email = $_POST['email'];
  $password = $_POST['password'];      
  $nom_boutique = $_POST['nom_boutique'];      

  $id=0;

  $user_id=0;

  $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_id, $stored_password);
    $stmt->fetch();
    $stmt->close();

  $boutique_id=0;

  $is_heart=1;


  $heart=0;
  if (password_verify($password, $stored_password)) {

    $stmt = $conn->prepare("SELECT id,heart FROM boutiques WHERE nom_boutique = ? ");   
    $stmt->bind_param("s",$nom_boutique);  
    $stmt->execute();  
    $stmt->store_result();  
    $stmt->bind_result($boutique_id,$heart);  
    $stmt->fetch();  
  
    $stmt->close();
  
    $stmt = $conn->prepare("INSERT INTO post_heart_boutique (user_id,boutique_id) VALUES (?, ?)");  
    $stmt->bind_param("ss", $user_id, $boutique_id); 
    $stmt->execute();  
    $stmt->store_result();  
  
    $stmt->close();
  
    $new_heart = $heart + 1;
  
    $stmt = $conn->prepare("UPDATE boutiques SET heart = ? WHERE boutiques.id = ?");  
    $stmt->bind_param("ss", $new_heart, $boutique_id); 
    $stmt->execute();  
  
    $stmt->close();
  
  
    $stmt = $conn->prepare("SELECT id, is_heart, boutique_id,user_id FROM post_heart_boutique WHERE user_id = ? AND boutique_id = ? ");   
    $stmt->bind_param("ss",$user_id,$boutique_id);  
    $stmt->execute();  
    $stmt->store_result();  
    $stmt->bind_result($id,$is_heart, $boutique_id,$user_id);  
    $stmt->fetch();  
  
    $stmt->close();
  
  
      $response['id'] = $id;   
      $response['is_heart'] = $is_heart;   
      $response['boutique_id'] = $boutique_id; 
      $response['user_id'] = $user_id;    
  
   
} 

}

break;  


  
case 'post_heart_boutique':  
    if(isTheseParametersAvailable(array('email','password'))){  
      $email = $_POST['email'];
      $password = $_POST['password']; 

      $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($user_id, $stored_password);
        $stmt->fetch();
        $stmt->close();
      

        if (password_verify($password, $stored_password)) {

            $stmt = $conn->prepare("SELECT post_heart_boutique.id, post_heart_boutique.is_heart, post_heart_boutique.user_id, post_heart_boutique.boutique_id from post_heart_boutique INNER JOIN users on users.id=post_heart_boutique.user_id WHERE users.email = ? AND users.password = ?"); 
            $stmt->bind_param("ss",$email,$stored_password);  
            $stmt->execute();
            $result = $stmt->get_result();
            $rows = $result->fetch_all(MYSQLI_ASSOC);
        
            $response = $rows;  
            
            $stmt->close();

        } 

  }
  
  break; 


case 'delete_heart_boutique':  
  if(isTheseParametersAvailable(array('id','email','password','nom_boutique'))){  
    (int) $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];      
    $nom_boutique = $_POST['nom_boutique'];      
    
    $user_id=0;
  
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_id, $stored_password);
    $stmt->fetch();
    $stmt->close();
  
  
    $boutique_id=0;
  
    $is_heart=1;
  
    $heart=0;
  
    if (password_verify($password, $stored_password)) {

        $stmt = $conn->prepare("SELECT id,heart FROM boutiques WHERE nom_boutique = ? ");   
        $stmt->bind_param("s",$nom_boutique);  
        $stmt->execute();  
        $stmt->store_result();  
        $stmt->bind_result($boutique_id,$heart);  
        $stmt->fetch();  
      
        $stmt->close();
      
    
        $stmt = $conn->prepare("DELETE FROM post_heart_boutique WHERE id = ?");   
        $stmt->bind_param("s",$id);  
        $result=$stmt->execute();  
      
      
        $new_heart = $heart - 1;
      
        $stmt = $conn->prepare("UPDATE boutiques SET heart = ? WHERE boutiques.id = ?");  
        $stmt->bind_param("ss", $new_heart, $boutique_id); 
        $stmt->execute();  
      
    
        $response['id'] = $id;   
        $response['success'] = $result;  
    
        $stmt->close();    

    } 
  }
 
  
break; 

default:   
$response['error'] = true;   
$response['message'] = 'Invalid Operation Called';
  }
}

else{  
$response['error'] = true;   
$response['message'] = 'Invalid API Call';  
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