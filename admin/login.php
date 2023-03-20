<?php
session_start();

// ****************************************  Login *********************************************
    $error = "";
    if(isset($_POST['login'])){
        require_once("db.php");
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = $conn->prepare("SELECT * FROM admin WHERE user=?");
            $sql->bind_param("s",$username);      
            $sql->execute();
            $result = $sql->get_result();
            // to check is email exist or not
            if ($result->num_rows > 0){
                // yes,email exits
                $row = $result->fetch_assoc();
                // to check password correct or not
                if($password === $row['pass']){
                     // if yes
                    $_SESSION['user_type'] = 'admin';
                    $_SESSION["user_id"] = $row['id'];
                    header("location:admin_dashboard.php");
                    die;
                }else{
                    // if no
                    $_SESSION['msg'] = "Invalid Information";
                    header('Location: ./');
                    die;
                    }

            }else{
                // not exits
                $_SESSION['msg'] = "invalid information";
                header('Location: ./');
                die;
            }     
            $sql->close();
            $conn->close();
    }

    // ****************************** end login *************************************
?>