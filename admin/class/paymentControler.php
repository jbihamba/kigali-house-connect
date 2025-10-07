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

	if(isset($_POST['save_book_payment']))
	{
			$tblName='payment';
			$slip_picture=$extra->uploadPicture('../img/payment/',$_FILES['slip_picture']);
			if($slip_picture):
				$Data = array
				(
					'bank_name' => $_POST['bank_name'],
					'payment_date' => $_POST['payment_date'],
					'amount_paid' => $_POST['amount'],
					'slip_number' => $_POST['slip_number'],
					'slip_picture' => $slip_picture,
					'house_id' => $_SESSION['houseID'],
					'client_id' => $_SESSION['clientID'],
					'c_date' => $db->showDate('datetime')
				 );
				$insert = $db->insert($tblName, $Data);
				if($insert)
				{
					$paymentID = $db->getLastID('payment','id');
					$datas =  array(
													'house_id'=>$_SESSION['houseID'],
													'client_id'=> $_SESSION['clientID'],
													'payment_id'=> $paymentID,
													'status' => 1,
													'c_date'=>$db->showDate('datetime')
												);
					$register  = $db->insert('booking', $datas);
					if($register):
						//Update the status of the booked houses
						$update = $db->update('houses', array('status'=>1), array('id'=>$_SESSION['houseID']));
						$sessData['status']['type'] = 'success';
	          $sessData['status']['msg'] = 'Your request has been done successfully!';
						//set redirect url
						$redirectURL .= 'paymentSuccess.php';
					else:
						$sessData['status']['type']='error';
						$sessData['status']['type']='Some Errors occured! Please try again later.';
						//set redirect url
						$redirectURL .= 'payment.php';
					endif;
				}
				else{
					$sessData['status']['type']='error';
					$sessData['status']['type']='Some Errors occured! Please try again later.';
					//set redirect url
					$redirectURL .= 'payment.php';
				}
			else:
				$sessData['status']['type']='error';
				$sessData['status']['type']='Unable to complete! Verify your profile and try again later.';
				//set redirect url
				$redirectURL .= 'payment.php?kjh=kj';
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
