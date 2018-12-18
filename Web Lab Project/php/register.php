<?php
session_start();
ob_start();

    require('../includes/connect.php');

    if (isset($_POST['pass'])) {
        $pass = $mysqli->real_escape_string($_POST['pass']);
        $pass = md5($pass);
    } else {
        die("Dont try to miss around bro ;)-1");
    }

    if (isset($_POST['confPass'])) {
        $confPass = $mysqli->real_escape_string($_POST['confPass']);
        $confPass = md5($confPass);

    } else {
        die("Dont try to miss around bro ;)-2");
    }

    if( $pass != $confPass)
    {
        die("shit got real");
    }else{

                if (isset($_POST['name'])) {
                    $name = $mysqli->real_escape_string($_POST['name']);
                } else {
                    die("Dont try to miss around bro ;)-3");
                }

                if (isset($_POST['lastName'])) {
                    $lastName = $mysqli->real_escape_string($_POST['lastName']);
                } else {
                    die("Dont try to miss around bro ;)-4");
                }

                if (isset($_POST['gender'])) {
                    $gender = $mysqli->real_escape_string($_POST['gender']);
               
                } else {
                    die("Dont try to miss around bro ;)-5");
                }

                if (isset($_POST['phone'])) {
                    $phone = $mysqli->real_escape_string($_POST['phone']);
                } else {
                    die("Dont try to miss around bro ;)-6");
                }

                if (isset($_POST['email'])) {
                    $email = $mysqli->real_escape_string($_POST['email']);
                } else {
                    die("Dont try to miss around bro ;)-7");
                }

                if (strpos($email, '@') == false || strlen($email) < 6) {
                    die("Dont try to miss around bro ;)-8");
                }

                $stmt = $mysqli->prepare("SELECT * FROM users WHERE user_email = ?");
                $stmt->bind_param('s', $email);
                $stmt->execute();
                $stmt->store_result();
                $numRows1 = $stmt->num_rows;

                if ($numRows1 == 0) {

                    $stmt = $mysqli->prepare("INSERT INTO users (user_name, user_last_name, user_gender, user_email, user_phone_number, user_password) VALUES(?, ?, ?, ?, ?, ?) ");
                    $stmt->bind_param('ssssss', $name, $lastName, $gender, $email, $phone, $pass);
                    $stmt->execute();
                    $user_id = $stmt->insert_id;

                    $_SESSION['registered'] = true;
                    $_SESSION['permission_user'] = true;
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['gender'] = $gender;
                    ob_clean();
                    $stmt->close();
                    $mysqli->close();
                    
                    header('Location: ../index.php');
                    ob_flush();
                } else {
                    $_SESSION['registered'] = false;
                    $_SESSION['reg_expire'] = time() + 10;
                    ob_clean();
                    $stmt->close();
                    $mysqli->close();
                    header('Location: ../loginRegister.php');
                    ob_flush();
                }
    }





