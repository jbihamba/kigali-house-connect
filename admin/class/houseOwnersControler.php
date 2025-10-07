<?php
	session_start();
	//load and initialize database class
	require_once '../core/db.php';
	$db = new DB();
	//load and initialize Extra class
	require_once '../core/extra.php';
	$extra = new Extra();

	//set default redirect url
	$redirectURL = '../../'.$db->url;

	if(isset($_POST['register']))
	{
			$tblName='house_owners';
			$profile=$extra->uploadPicture('../img/profile/',$_FILES['picture']);
			if($profile):
				$Data = array
				(
          'fname' => $_POST['fname'],
					'lname' => $_POST['lname'],
					'email' => $_POST['email'],
					'phone' => $_POST['phone'],
					'adress' => $_POST['adress'],
					'status' => 0,
					'pin' => 0,
					'password' => sha1($_POST['password']),
					'profile' => 'img/profile/'.$profile,
					'c_date' => $db->showDate('datetime')
				 )
				;
				$insert = $db ->insert($tblName, $Data);
				if($insert)
				{
					$sessData['status']['type'] = 'success';
          $sessData['status']['msg'] = 'Your registration has been done successfully!';
					//set redirect url
					$redirectURL .= 'index.php';

				}
				else{
					$sessData['status']['type']='error';
					$sessData['status']['type']='Some Errors occured! Please try again later.';
					//set redirect url
					$redirectURL .= 'register.php';

				}
			else:
				$sessData['status']['type']='error';
				$sessData['status']['type']='Unable to complete! Verify your profile and try again later.';
				//set redirect url
				$redirectURL .= 'register.php?s='.$_FILES['picture']['name'];
			endif;

}
// update
if(isset($_POST['update']))
{
    //check if the form is not empty
     $tblName = 'house_owners';
            //insert data
            $Data = array
            (
							'fname' => $_POST['fname'],
							'lname' => $_POST['lname'],
							'email' => $_POST['email'],
							'phone' => $_POST['phone'],
							'adress' => $_POST['adress'],
							'status'=> $_POST['status']
            );

            $condition=array('id' => $_POST['ID'], );
            $update = $db->update($tblName, $Data,$condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Modification saved successfully!';

            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Some Errors occured! Please try again later.';

            }
						//set redirect url
						$redirectURL .= 'principal.php?request=house-owners';

}
// delete
if(isset($_POST["delete"]) )

{
            $tblName='house_owners';
            $Condition = array( 'id'=> $_POST['ID'] ) ;

            $delete = $db->delete($tblName,$Condition);
            if($delete){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'House deleted successfully!';
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Some Errors occured! Please try again later.';
            }
						//set redirect url
						$redirectURL .= 'principal.php?request=house-owners';
}

//store status into the session
$_SESSION['sessData'] = $sessData;

//redirect to the list page
header("Location:".$redirectURL);

?>
