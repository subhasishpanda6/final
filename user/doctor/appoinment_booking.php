 <?php
  session_start();
 
  if (isset($_POST['submit'])) {

    require_once("../db.php");
    $sql = $conn->prepare("INSERT INTO appoinment_booking (patient_name,patient_gender,patient_age,patient_blood_group,booking_date,booking_time,medical_condition,patient_phno,doc_name,doc_id,patient_id,doc_phno,patient_mail,doc_mail,doc_img,patient_img,doc_department,doc_fees) VALUES (?, ?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");  
    $name=$_POST['patient_name'];
    $gender=$_POST['patient_gender'];
    $age=$_POST['patient_age'];
    $blood_group=$_POST['patient_blood_group'];
    $booking_date=$_POST['booking_date'];
    $booking_time=$_POST['booking_time'];
    $medical_condition=$_POST['medical_condition'];
    $patient_phoneno=$_POST['patient_phoneno'];
    $doc_name=$_POST['doc_name'];
    $doc_id=$_POST['doc_id'];
    $patient_id=$_POST['patient_id'];
    $doc_phno=$_POST['doc_phno'];
    $patient_mail=$_POST['patient_mail'];
    $doc_mail=$_POST['doc_mail'];
    $doc_img=$_POST['doc_img'];
    $patient_img=$_POST['patient_img'];
    $doc_department=$_POST['doc_department'];
    $doc_fees=$_POST['doc_fees'];



    
   
    
    $sql->bind_param("sssssssssssssssssi",  $name, $gender,$age,$blood_group,$booking_date,$booking_time,$medical_condition,$patient_phoneno,$doc_name,$doc_id,$patient_id,$doc_phno,$patient_mail,$doc_mail,$doc_img,$patient_img,$doc_department,$doc_fees); 
    if($sql->execute()) {
      
      header("Location:payment_checkout.php");
    } else {
      echo '<script>alert("Problem in Adding New Record")</script>';
    }
    $sql->close();   
    $conn->close();
  } 
?>
