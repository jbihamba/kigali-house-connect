<?php
//start session
session_start();
//load and initialize database class
require_once '../core/db.php';
$db = new DB();
//set default redirect url
$redirectURL = '../../'.$db->url;

if(isset($_POST['login'])){
  if(!empty($_POST['email']) && !empty($_POST['password']))
    {
                $condition =array
                (
                  'email'=>$_POST['email'],
                  'password'=>sha1($_POST['password'])
                );

          $clients = $db->login('clients',$condition);
          if(!empty($clients)): //Admin
            $count = 0;
            foreach($clients as $user): $count++;
                $_SESSION['clientID']=$user['id'];
                        $sessData['status']['type'] = 'success';
                        $sessData['status']['msg']  = 'Welcome';
                        $_SESSION['houseID'] = $_SESSION['house_id'];
                        //set redirect url
                        $redirectURL .= 'payment.php';
            endforeach;
            else:
               $sessData['status']['type'] = 'error';
               $sessData['status']['msg'] = 'Invalid Password or Email!';
               //set redirect url
               $redirectURL .= 'signin.php';
            endif;
    }
    //store status into the session
    $_SESSION['sessData'] = $sessData;

    //redirect to the list page
    header("Location:".$redirectURL);
}
exit();
?>
