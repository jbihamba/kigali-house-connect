<?php
  session_start();
  //load and initialize database class
	require_once '../core/db.php';
	$db = new DB();
if(isset($_POST['data'])):
  $data = $_POST['data'];
  $alld=$db->getRows('sector',array('where'=>array('district_id'=>$data)));
  if(!empty($alld)): foreach($alld as $getd):
?>
          <option value="<?php echo $getd['id']; ?>" ><?php echo $getd['sector_name']; ?></option>
  <?php endforeach;
  endif;
endif;?>
