<?php

session_start();
//we restricted visite the page without login
// if user is not logged in then, we will redirect to the login page
if(empty($_SESSION['user_type']) && $_SESSION['user_type'] !== 'blood_bank' && empty($_SESSION['user_id'])){
    header("location:./");
    die;
}

// echo "<pre>";
// print_r($_POST);
// print_r($_GET);



// user id
$user_id = $_SESSION['user_id'];
//for add stock

if(isset($_POST['add_stock_sub'])){
    require_once("db.php");
    print_r($_POST);
    if(empty($_POST['blood_unit']) || empty($_POST['blood_group'])){
        header("location:stock.php");
        echo "<script>error('Form should not be empty')</script>";
        die;
    }else{
        $blood_group_id = $_POST['blood_group'];
        $blood_unit = $_POST['blood_unit'];
        $sql = $conn->prepare("INSERT INTO blood_bank_stock (blood_group_id,stock,user_id) VALUES(?,?,?)");
        $sql->bind_param("isi",$blood_group_id,$blood_unit,$user_id);
        if($sql->execute()){
            header("location:stock.php");
            echo "<script>success('Successfully Added')</script>";
            die;
        }else{
            header("location:stock.php");
            echo "<script>error('Faild to add')</script>";
            die;
        }
    }
}

?>