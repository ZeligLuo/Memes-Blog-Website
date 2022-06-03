<?php 

$login_user = [
    "username" => "",
    "username_err" => false,
    "password" => "",
    "password_err" => false
 ];

 function validateLogin($user, &$login_user) {
    $login_user['username'] = htmlspecialchars($user['username']); 
    $login_user['password'] = $user['password'];

    $user = getUser($login_user['username']);
    if(empty($user)) {
       setMsg("Username not found!", "danger");
       $login_user['username_err'] = true;
    } else {
       if(password_verify($login_user['password'], $user['password_hash'])) {
          loginUser($user);
       } else {
          $login_user['password_err'] = true;
          setMsg("Incorrect password!", "danger");
       }
    }
}

function setMsg($msg, $class) {
    global $message;
    $message['msg'] = $msg;
    $message['class'] = $class;
}

function loginUser($user) {
    $_SESSION['username'] = $user['username'];
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['logged_in'] = true;
    $_SESSION['msg'] = "Logged in successfully!";
    $_SESSION['msg_class'] = "success";
    header("Location: index.php");
 }


 function getUser($user) {
    global $conn;
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
       return $result->fetch_assoc();
    } else {
       return 0;
    }
 }
 // helper function to output error class in input 
 function checkValid($field, $arr) {
    $key = $field . "_err"; // username + _err => $new_user['username_err']
    if($arr[$key]) {
       echo "is-invalid";
    }
 }

?>