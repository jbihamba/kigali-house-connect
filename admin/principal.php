<?php include('views/header.php');?>
<!-- Links Controler -->
<?php
switch ($_GET['request']) {
  case 'home':
    include('views/dashboard.php');
    break;
  case 'admin':
    include('views/admin.php');
    break;
  case 'house-owners':
    include('views/house_owners.php');
    break;
  case 'register-house':
    include('views/register_house.php');
    break;
  case 'available-houses':
    include('views/available_houses.php');
    break;
  case 'booked-houses':
    include('views/booked_houses.php');
    break;
  case 'payment':
    include('views/payment.php');
    break;
  case 'clients':
    include('views/clients.php');
    break;
  case 'feedback':
    include('views/feedback.php');
    break;
  default:
    include('views/dashboard.php');
    break;
}
?>
<!-- Footer -->
<?php include('views/footer.php');?>
