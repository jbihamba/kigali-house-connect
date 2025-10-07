<?php
	session_start();

	//load and initialize database class
	require_once '../core/db.php';
	$db = new DB();

	//set default redirect url
	$redirectURL = '../../'.$db->url;

	if(isset($_POST['register']))
	{
		
			$tblName='pret';
				$Data = array
				(	
          			'membreID' => $_POST['membre'],
					'pID' => 1,
					'montant' => $_POST['montant'],
					'interet' => 0,
					'commentaire' => $_POST['description'],
					'date_emprunt' => $db->showDate('date'),
					'date_echeance' =>$db->showDate('date'),
					'c_date' => $db->showDate('datetime')
				 )
				;
				$insert = $db ->insert($tblName, $Data);
				if($insert)
				{
					$sessData['status']['type'] = 'success';
          $sessData['status']['msg'] = 'L\'Emprunt a été enregistré!';
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
     $tblName = 'pret';
            //insert data
            $Data = array
            (
                    'membreID' => $_POST['membre'],
					'pID' => 1,
					'montant' => $_POST['montant'],
					'interet' => 0,
					'commentaire' => $_POST['description'],
					'date_emprunt' => NOW(),
					'date_echeance' => NOW()
            );

            $condition=array('pretID' => $_POST['pretID'], );
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
            $tblName='pret';
            $Condition = array( 'pretID'=> $_POST['pretID'] ) ;

            $delete = $db->delete($tblName,$Condition);
            if($delete){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'L\'Emprunt a été supprimé!';
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Il y a eu une erreur. Veillez-réessayer svp!';
            }
}
//set redirect url
$redirectURL .= 'admin/pret.php';

//store status into the session
$_SESSION['sessData'] = $sessData;
    
//redirect to the list page
header("Location:".$redirectURL);

?>
