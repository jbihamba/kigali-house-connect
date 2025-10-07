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

          $admin = $db->login('admin',$condition);
          $house_owner = $db->login('house_owners',$condition);
          if(!empty($admin)): //Admin
            $count = 0;
            foreach($admin as $user): $count++;
                if($user['status']==0)://if Desactivated
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Your Account is Desactivated! Contact the Admin.';
                    //set redirect url
                    $redirectURL = '../index.php';
                else:
                    $_SESSION['id']=$user['id'];
                    if($user['pin']==0): //when pin is 0
                        $_SESSION['category']='admin';
                        //set redirect url
                        $redirectURL .= '../admin/change.php';
                    else:
                        $_SESSION['category']='admin';
                        $sessData['status']['type'] = 'success';
                        $sessData['status']['msg']  = 'Welcome';
                        //set redirect url
                        $redirectURL .= 'principal.php?request=home';
                    endif;
                endif;
            endforeach;
            elseif(!empty($house_owner)): //House Owner
              $count = 0;
              foreach($house_owner as $user): $count++;
                  if($user['status']==0)://if Desactivated
                      $sessData['status']['type'] = 'error';
                      $sessData['status']['msg'] = 'Your Account is Desactivated! Contact the Admin.';
                      //set redirect url
                      $redirectURL = '../index.php';
                  else:
                      $_SESSION['id']=$user['id'];

                          $_SESSION['category']='house_owner';
                          $sessData['status']['type'] = 'success';
                          $sessData['status']['msg']  = 'Welcome';
                          //set redirect url
                          $redirectURL .= 'principal.php?request=home';
            
                  endif;
              endforeach;
            else:
               $sessData['status']['type'] = 'error';
               $sessData['status']['msg'] = 'Invalid Password or Email!';
               //set redirect url
               $redirectURL .= 'index.php';
            endif;
    }
    //store status into the session
    $_SESSION['sessData'] = $sessData;

    //redirect to the list page
    header("Location:".$redirectURL);
}
exit();
?>
