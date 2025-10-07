<?php
	session_start();
	//load and initialize database class
	require_once '../core/db.php';
	$db = new DB();

	//set default redirect url
	$redirectURL = '../../'.$db->url;

	if(isset($_POST['send_feedback']))
	{
			$tblName='feedback';
				$Data = array
				(
          'name' => $_POST['name'],
					'email' => $_POST['email'],
					'message' => $_POST['message'],
					'house_id' => $_POST['house_id'],
					'c_date' => $db->showDate('datetime')
				 )
				;
				$insert = $db ->insert($tblName, $Data);
				if($insert)
				{
					$sessData['status']['type'] = 'success';
          $sessData['status']['msg'] = 'Your Feedback has been registered successfully!';
				}
				else{
					$getMessage['status']['type']='error';
					$getMessage['status']['type']='Some Errors occured! Please try again later.';
				}

}
//set redirect url
$redirectURL = $_POST['link'];

//store status into the session
$_SESSION['sessData'] = $sessData;

//redirect to the list page
header("Location:".$redirectURL);

?>
