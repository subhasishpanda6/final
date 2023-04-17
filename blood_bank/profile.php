<?php
define("page_access_permission",true);
require_once("../app/init.php");


// user id
$user_id = $_SESSION['user_id'];

// for update profile pic
// only accept jpg,jpeg,png
if(isset($_POST['profile'])){
    // require_once("db.php");
    //get profile name 
    $name = $_FILES['profile_pic']['name'];

    //get temp name
    $tmp_name = $_FILES['profile_pic']['tmp_name'];

    //extract pic extension
    $extension = strtolower(pathinfo($name,PATHINFO_EXTENSION));

    // get only file name without extensin
    $get_file_name = strtolower(pathinfo($name,PATHINFO_FILENAME));

    // SANITIZE THE FILE NAME
    $file_name_str = str_replace(' ', '-', $get_file_name);
    // Removes special chars. 
    $file_name_str = preg_replace('/[^A-Za-z0-9\-\_]/', '', $file_name_str); 
    // Replaces multiple hyphens with single one. 
    $file_name_str = preg_replace('/-+/', '-', $file_name_str);
    // SANITIZE END HERE

    // ACTUAL FILE (FILENAME WITH EXTENSION) eg:no-profile.jpg
    $clean_file_name = $file_name_str.'.'.$extension; 
    
    // allow extension
    $accepted_extens = ['jpg','jpeg','png'];

    //create the complete image path
    $target = "upload/".$clean_file_name;

    // now check profile pic is empty or not
    if(!empty($name)){
         // not empty
        // now check the extesion
        if(in_array($extension,$accepted_extens)){
            // if successfully upload image
           if(move_uploaded_file($tmp_name,$target)){
                $sql = "UPDATE blood_bank_registration SET img = '$clean_file_name' WHERE blood_bank_id = '$user_id'";
                if($conn->query($sql)){
                    $_SESSION['msg'] = "Successfully Uploaded";
                    header("location:blood_bank_profile.php");
                    $conn->close();
                    die;
                }else{
                    $_SESSION['msg'] = "failed db";
                    header("location:blood_bank_profile.php");
                    die;
                }
           }else{
                // if not uploaded image successfull
                $_SESSION['msg'] = "Problem to upload";
               header("location:blood_bank_profile.php");
               die;
           }
        }else{
            // if extension does not accepted
            $_SESSION['msg'] = "jpg,jpeg,png are allowed";
            header("location:blood_bank_profile.php");
            die;
        }
    }else{
       
        header("location:blood_bank_profile.php");
        die;
    }
}



// for update phone number
if(isset($_POST['change_ph'])){
    // require_once("db.php");
    $phone = $_POST['phone'];
    if(!empty($phone)){
        $sql = $conn->prepare("UPDATE blood_bank_registration SET phone = ? WHERE blood_bank_id = '$user_id'");
        $sql->bind_param("s",$phone);
        if($sql->execute()){
            $_SESSION['msg'] = "Successfully update";
            header("location:blood_bank_profile.php");
            $sql->close();
            $conn->close();
            die;
        }else{
            $_SESSION['msg'] = "failed to update";
            header("location:blood_bank_profile.php");
            die;
        }

    }else{
        header("location:blood_bank_profile.php");
        die;
    }
    
}
// for change password
if(isset($_POST['change_pass'])){
    // require_once("db.php");
    $password = $_POST['password'];
    if(!empty($password)){
        // get current password from db
        $result = $conn->query("SELECT password FROM blood_bank_registration WHERE blood_bank_id = '$user_id'");
        $data = $result->fetch_assoc();
        // to check change password and current password are same or not
        if($data['password'] === $password){
            $_SESSION['msg'] = "Password should not be same";
            header("location:blood_bank_profile.php");
            $conn->close();
            die;
        }
        else{
            // if password are not same
            $sql = $conn->prepare("UPDATE blood_bank_registration SET password = ? WHERE blood_bank_id = '$user_id'");
            $sql->bind_param("s",$password);
            if($sql->execute()){
                $_SESSION['msg'] = "Successfully update! Please login again";
                session_destroy();
                session_unset();
                session_destroy();
                header("location:./");
                $sql->close();
                $conn->close();
                die;
            }else{
                $_SESSION['msg'] = "failed to update";
                header("location:blood_bank_profile.php");
                die;
            }
        }

    }else{
        header("location:blood_bank_profile.php");
        die;
    }
    
}

//user can not access directly
if(isset($_POST) || isset($_GET)){
    header("location:403forbidden.php");
    die;
}
?>