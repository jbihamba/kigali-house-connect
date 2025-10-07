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

	if(isset($_POST['add']))
	{
			$tblName='houses';
			$main_picture=$extra->uploadPicture('../../img/pictures/',$_FILES['main_picture']);
			$picture_1=$extra->uploadPicture('../../img/pictures/',$_FILES['picture_1']);
			$picture_2=$extra->uploadPicture('../../img/pictures/',$_FILES['picture_2']);
			$picture_3=$extra->uploadPicture('../../img/pictures/',$_FILES['picture_3']);
			if($main_picture AND $picture_1 AND $picture_2 AND $picture_3):
				$Data = array
				(
					'category' => $_POST['category'],
					'price' => $_POST['price'],
					'district_id' => $_POST['district'],
					'sector_id' => $_POST['sector'],
					'adress' => $_POST['adress'],
					'location' => $_POST['location'],
					'main_picture' => $main_picture,
					'picture_1' => $picture_1,
					'picture_2' => $picture_2,
					'picture_3' => $picture_3,
					'garage' => $_POST['garage'],
					'bathroom' => $_POST['bathroom'],
					'bedroom' => $_POST['bedroom'],
					'description' =>$_POST['description'],
					'house_owner_id' => $_SESSION['id'],
					'status' => 0,
					'c_date' => $db->showDate('datetime')
				 );
				$insert = $db ->insert($tblName, $Data);
				if($insert)
				{
					$sessData['status']['type'] = 'success';
          $sessData['status']['msg'] = 'Your registration has been done successfully!';
					//set redirect url
					$redirectURL .= 'principal.php?request=available-houses';

				}
				else{
					$sessData['status']['type']='error';
					$sessData['status']['type']='Some Errors occured! Please try again later.';
					//set redirect url
					$redirectURL .= 'principal.php?request=register-house';

				}
			else:
				$sessData['status']['type']='error';
				$sessData['status']['type']='Unable to complete! Verify your profile and try again later.';
				//set redirect url
				$redirectURL .= 'principal.php?request=register-house';
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
