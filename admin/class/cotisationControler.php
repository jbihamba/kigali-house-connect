<?php
	session_start();

	//load and initialize database class
	require_once '../core/db.php';
	$db = new DB();

	//set default redirect url
	$redirectURL = '../../'.$db->url;

	if(isset($_POST['register']))
	{
		
			$tblName='cotisation';
				$Data = array
				(	
          			'membreID' => $_POST['membre'],
					'pID' => 1,
					'montant' => $_POST['montant'],
					'total_cumul' => 0,
					'commentaire' => $_POST['description'],
					'cotisation_date' => $db->showDate('date'),
					'c_date' => $db->showDate('datetime')
				 )
				;
				$insert = $db ->insert($tblName, $Data);
				if($insert)
				{
					$sessData['status']['type'] = 'success';
          $sessData['status']['msg'] = 'La Cotisation a été enregistrée!';
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
     $tblName = 'cotisation';
            //insert data
            $Data = array
            (
                    'membreID' => $_POST['membre'],
					'pID' => 1,
					'montant' => $_POST['montant'],
					'total_cumul' => 0,
					'commentaire' => $_POST['description'],
					'cotisation_date' => NOW(),
            );

            $condition=array('cotisationID' => $_POST['cotisationID'], );
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
            $Condition = array( 'cotisationID'=> $_POST['cotisationID'] ) ;

            $delete = $db->delete($tblName,$Condition);
            if($delete){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'La Cotisation a été supprimée!';
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Il y a eu une erreur. Veillez-réessayer svp!';
            }
}
//set redirect url
$redirectURL .= 'admin/cotisation.php';

//store status into the session
$_SESSION['sessData'] = $sessData;
    
//redirect to the list page
header("Location:".$redirectURL);

?>
