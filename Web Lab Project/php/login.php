
<?php
session_start();
ob_start();
// $_SESSION['permission_login'] =true;

// if (isset($_SESSION['permission_login']) && $_SESSION['permission_login'] == true) {

    unset($_SESSION['permission_login']);
            
    require('../includes/connect.php');

    if (isset($_POST['email'])) {
        $email = $mysqli->real_escape_string($_POST['email']);
    } else {
        die("Dont try to miss around bro ;)-a");
    }

    if (isset($_POST['pass'])) {
        $password = $mysqli->real_escape_string($_POST['pass']);
        $password = md5($password);
    } else {
        die("Dont try to miss around bro ;)-b");
    }


    $stmt1 = $mysqli->prepare("SELECT user_id FROM users WHERE user_email = ?  AND user_password = ? ");
    $stmt1->bind_param('ss', $email, $password);
    $stmt1->execute();
    $stmt1->store_result();

    $numRows = $stmt1 -> num_rows;
    $stmt1->bind_result($id);
    $stmt1->fetch();

    ?>

    <html>
    <body>
        <div id="verify" value="<?php echo $numRows; ?>"></div>

    </body>
    
     </html>
  <?php
    if($numRows==0)
    {   
        echo "good luck";
        ob_clean();
        header('Location:../loginRegister.php');
        ob_flush();
    }else{
            $_SESSION['user_id'] = $id;
            $_SESSION['permission_user'] = true;

            ob_clean();
            $stmt1->close();
            $mysqli->close();
       
                header('Location: ../index.php');
                ob_flush();
    }
  
   
