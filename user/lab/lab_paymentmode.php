 <?php
  session_start();
 
  if (isset($_POST['submit'])) {

    require_once("../db.php");
    $sql = $conn->prepare("INSERT INTO lab_booking (patient_id,lab_id,patient_name,patient_email,patient_phno,patient_address,booking,total,payment_mode) VALUES (?,?,?,?,?,?,?,?,?)");
    $patient_id=$_POST['patient_id']; 
    $lab_id=$_POST['lab_id']; 
    $patient_name=$_POST['patient_name'];
    $patient_email=$_POST['patient_email'];
    $patient_phno=$_POST['patient_phno'];
    $patient_address=$_POST['patient_address'];
    $book=$_POST['book'];
    $total=$_POST['total'];

    $payment_mode=$_POST['payment_mode'];



    



    
   
    
    $sql->bind_param("iisssssss",$patient_id,$lab_id,$patient_name,$patient_email,$patient_phno,$patient_address,$book,$total,$payment_mode); 
    if($sql->execute()) {
      
      header("Location:lab_booking_success.php");
    } else {
      echo '<script>alert("Problem in Adding New Record")</script>';
    }
    $sql->close();   
    $conn->close();
  } 
?>
