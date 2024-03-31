<?php   

require_once 'config.php' ;   

  $response = array();  
  if(isset($_GET['apicall'])){  
  switch($_GET['apicall']){ 

case 'add_ligne':  
  if(isTheseParametersAvailable(array('email', 'password','montant','type_transaction'))){  
    $email = $_POST['email'];  
    $password = $_POST['password']; 
    $montant = $_POST['montant'];  
    $type_transaction = $_POST['type_transaction'];

    $stmt = $conn->prepare("SELECT id,password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $storedPassword); 
        $stmt->fetch();
    
        if (password_verify($password, $storedPassword)) {

            $stmt = $conn->prepare("INSERT INTO portefeuille (montant,type_transaction,user_id) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $montant, $type_transaction, $user_id);
            $stmt->execute();
            $stmt->close();
            $response['error'] = false;
            $response['message'] = 'Sucess';
          
        } else {
            $response['error'] = true;
            $response['message'] = 'Email ou mot de passe invalide !';
          
        }
    }
  }
break; 

case 'get_user_portefeuille':  
    if(isTheseParametersAvailable(array('email', 'password'))){  
      $email = $_POST['email'];  
      $password = $_POST['password']; 
        
      $stmt = $conn->prepare("SELECT id,password FROM users WHERE email = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt->store_result();
      if ($stmt->num_rows > 0) {
          $stmt->bind_result($user_id, $storedPassword); 
          $stmt->fetch();
      
          if (password_verify($password, $storedPassword)) {
            $stmt = $conn->prepare("SELECT * FROM portefeuille WHERE user_id = ?");
            $stmt->bind_param("s", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            $response = $rows;

            $stmt->close();
              
          } else {
              $response['error'] = true;
              $response['message'] = 'Email ou mot de passe invalide !';
            
          }
      }
    }
  break;


  case 'get_user_list_recharge':  
    if(isTheseParametersAvailable(array('email', 'password'))){  
      $email = $_POST['email'];  
      $password = $_POST['password']; 
      
      $is_deleted = 0;
  
      $stmt = $conn->prepare("SELECT id,password FROM users WHERE email = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt->store_result();
      if ($stmt->num_rows > 0) {
          $stmt->bind_result($user_id, $storedPassword); 
          $stmt->fetch();
      
          if (password_verify($password, $storedPassword)) {
            $stmt = $conn->prepare("SELECT * FROM portefeuille WHERE user_id = ? AND is_deleted = ?  ORDER BY created_at DESC");
            $stmt->bind_param("ss", $user_id,$is_deleted);
            $stmt->execute();
            $result = $stmt->get_result();
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            $response = $rows;

            $stmt->close();
              
          } else {
              $response['error'] = true;
              $response['message'] = 'Email ou mot de passe invalide !';
            
          }
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