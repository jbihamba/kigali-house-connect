<?php
	session_start();

	//load and initialize database class
	require_once '../core/db.php';
	$db = new DB();

	//set default redirect url
	$redirectURL = '../../'.$db->url;

	if(isset($_POST['register']))
	{
		
			$tblName='membre';
				$Data = array
				(	
          'membre_fname' => $_POST['fname'],
					'membre_lname' => $_POST['lname'],
					'membre_email' => $_POST['email'],
					'membre_phone' => $_POST['phone'],
					'membre_status' => $_POST['status'],
					'c_date' => $db->showDate('datetime')
				 )
				;
				$insert = $db ->insert($tblName, $Data);
				if($insert)
				{
					$sessData['status']['type'] = 'success';
          $sessData['status']['msg'] = 'Le Membre a été enregistré!';
				}
				else{
					$getMessage['status']['type']='error';
					$getMessage['status']['type']='Il y a eu une erreur. Veillez-réessayer svp!';
				}
		
}
// update 
if(isset($_POST['update']))
{
    //check if the form is not empty
     $tblName = 'membre';
            //insert data
            $Data = array
            (
               'membre_fname' => $_POST['names'],
              'membre_lname' => $_POST['lastname'],
              'membre_email' => $_POST['email'],
              'membre_phone' => $_POST['phone'],
              'membre_status' => $_POST['status']
            );

            $condition=array('membreID' => $_POST['membreID'], );
            $update = $db->update($tblName, $Data,$condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Les Modifications ont été enregistrées!';
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Il y a eu une erreur. Veillez-réessayer svp!';
            }

}
// delete
if(isset($_POST["delete"]) )

{
            $tblName='membre';
            $Condition = array( 'membreID'=> $_POST['membreID'] ) ;

            $delete = $db->delete($tblName,$Condition);
            if($delete){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Le membre a été supprimé!';
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Il y a eu une erreur. Veillez-réessayer svp!';
            }
}
//set redirect url
$redirectURL .= 'admin/utilisateur.php';

//store status into the session
$_SESSION['sessData'] = $sessData;
    
//redirect to the list page
header("Location:".$redirectURL);

?>
