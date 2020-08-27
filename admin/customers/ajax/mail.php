 <?php
 error_reporting(0);
 include '../../conn.php';
  $customer_mail = $_POST['mail'];

  $sql = "SELECT * FROM customers WHERE email = '$customer_mail'";
  $result=mysqli_query($conn, $sql);
  $row=mysqli_fetch_array($result);
  if($row['email']){
    echo "Email allready exits";
  }
  ?>