<?php
	session_start();
	//load and initialize database class
	require_once '../core/db.php';
	$db = new DB();

	//set default redirect url
	$redirectURL = '../../'.$db->url;

	if(isset($_POST['add']))
	{
			$tblName='admin';
				$Data = array
				(
          'fname' => $_POST['fname'],
					'lname' => $_POST['lname'],
					'email' => $_POST['email'],
					'phone' => $_POST['phone'],
					'adress' => $_POST['adress'],
					'status' => $_POST['status'],
					'pin' => 1,
					'password' => sha1('khc@2019'),
					'profile' => 'img/profile/u.png',
					'c_date' => $db->showDate('datetime')
				 )
				;
				$insert = $db ->insert($tblName, $Data);
				if($insert)
				{
					$sessData['status']['type'] = 'success';
          $sessData['status']['msg'] = 'New Admin has been registered successfully!';
				}
				else{
					$getMessage['status']['type']='error';
					$getMessage['status']['type']='Some Errors occured! Please try again later.';
				}

}
// update
if(isset($_POST['update']))
{
    //check if the form is not empty
     $tblName = 'admin';
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

}
// delete
if(isset($_POST["delete"]) )

{
            $tblName='admin';
            $Condition = array( 'id'=> $_POST['ID'] ) ;

            $delete = $db->delete($tblName,$Condition);
            if($delete){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Admin deleted successfully!';
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Some Errors occured! Please try again later.';
            }
}
//set redirect url
$redirectURL .= 'principal.php?request=admin&status='.$sessData['status']['type'];

//store status into the session
$_SESSION['sessData'] = $sessData;

//redirect to the list page
header("Location:".$redirectURL);

?>
