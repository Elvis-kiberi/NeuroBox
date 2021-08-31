<?php 
    session_start();
    require "connection.php";
    require 'includes/PHPMailer.php';
    require 'includes/SMTP.php';
    require 'includes/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = "true";
    $mail->SMTPSecure = "tls";
    $mail->Port = "587";
    $mail->Username = "ngiog06@gmail.com";
    $mail->Password = "0703333636";

    $email = "";
    $name = "";
    $errors = array();

//if user signup button
    if(isset($_POST['signup'])){
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }
        $email_check = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $email_check);
        if(mysqli_num_rows($res) > 0){
            $errors['email'] = "Email that you have entered is already exist!";
        }
        if(count($errors) === 0){
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $code = rand(999999, 111111);
            $status = "notverified";
            $insert_data = "INSERT INTO usertable (name, email, password, code, status)
                            values('$name', '$email', '$encpass', '$code', '$status')";
            $data_check = mysqli_query($con, $insert_data);
            if($data_check){                
                $mail->Subject = "Sign Up Code";
                $mail->setFrom("ngiog06@gmail.com");
                $mail->Body = "Your Sign-up code is : ".$code;
                $mail->addAddress($email);
                if ($mail->Send()) {
                    $info = "We've sent a verification code to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['name'] = $name;
                    header('location: user-otp.php');
                    exit();                    
                }


            }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Failed while inserting data into database!";
            }
        }
        //if user click verification code submit button
        if(isset($_POST['check'])){
            $_SESSION['info'] = "";
            $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
            $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
            $code_res = mysqli_query($con, $check_code);
            if(mysqli_num_rows($code_res) > 0){
                $fetch_data = mysqli_fetch_assoc($code_res);
                $fetch_code = $fetch_data['code'];
                $email = $fetch_data['email'];
                $code = 0;
                $status = 'verified';
                $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
                $update_res = mysqli_query($con, $update_otp);
                if($update_res){
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    header('location: home.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while updating code!";
                }
            }else{
                $errors['otp-error'] = "You've entered incorrect code!";
            }
        }

        //if user click login button
        if(isset($_POST['login'])){
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $check_email = "SELECT * FROM usertable WHERE email = '$email'";
            $res = mysqli_query($con, $check_email);
            if(mysqli_num_rows($res) > 0){
                $fetch = mysqli_fetch_assoc($res);
                $fetch_pass = $fetch['password'];
                if(password_verify($password, $fetch_pass)){
                    $_SESSION['email'] = $email;
                    $status = $fetch['status'];
                    if($status == 'verified'){
                      $_SESSION['email'] = $email;
                      $_SESSION['password'] = $password;
                        header('location: home.php');
                    }else{
                        $info = "It's look like you haven't still verify your email - $email";
                        $_SESSION['info'] = $info;
                        header('location: user-otp.php');
                    }
                }else{
                    $errors['email'] = "Incorrect email or password!";
                }
            }else{
                $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
            }
        }

        //if user click continue button in forgot password form
        if(isset($_POST['check-email'])){
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $check_email = "SELECT * FROM usertable WHERE email='$email'";
            $run_sql = mysqli_query($con, $check_email);
            if(mysqli_num_rows($run_sql) > 0){
                $code = rand(999999, 111111);
                $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
                $run_query =  mysqli_query($con, $insert_code);
                if($run_query){
                    $mail->Subject = "Forgot Password Code";
                $mail->setFrom("ngiog06@gmail.com");
                $mail->Body = "To reset your password, Key in the code = ".$code;
                $mail->addAddress($email);
                    if($mail->Send() ){
                        $info = "We've sent a passwrod reset otp to your email - $email";
                        $_SESSION['info'] = $info;
                        $_SESSION['email'] = $email;
                        header('location: reset-code.php');
                        exit();
                    }else{
                        $errors['otp-error'] = "Failed while sending code!";
                    }
                }else{
                    $errors['db-error'] = "Something went wrong!";
                }
            }else{
                $errors['email'] = "This email address does not exist!";
            }
        }

        //if user click check reset otp button
        if(isset($_POST['check-reset-otp'])){
            $_SESSION['info'] = "";
            $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
            $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
            $code_res = mysqli_query($con, $check_code);
            if(mysqli_num_rows($code_res) > 0){
                $fetch_data = mysqli_fetch_assoc($code_res);
                $email = $fetch_data['email'];
                $_SESSION['email'] = $email;
                $info = "Please create a new password that you don't use on any other site.";
                $_SESSION['info'] = $info;
                header('location: new-password.php');
                exit();
            }else{
                $errors['otp-error'] = "You've entered incorrect code!";
            }
        }

        //if user click change password button
        if(isset($_POST['change-password'])){
            $_SESSION['info'] = "";
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
            if($password !== $cpassword){
                $errors['password'] = "Confirm password not matched!";
            }else{
                $code = 0;
                $email = $_SESSION['email']; //getting this email using session
                $encpass = password_hash($password, PASSWORD_BCRYPT);
                $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
                $run_query = mysqli_query($con, $update_pass);
                if($run_query){
                    $info = "Your password changed. Now you can login with your new password.";
                    $_SESSION['info'] = $info;
                    header('Location: password-changed.php');
                }else{
                    $errors['db-error'] = "Failed to change your password!";
                }
            }
        }
        
       //if login now button click
        if(isset($_POST['login-now'])){
            header('Location: login-user.php');
        }

        //if save is clicked
        if (isset($_POST['save'])) {
            $_SESSION['info'] = "";
            $fname = mysqli_real_escape_string($con, $_POST['fname']); 
            $mail = mysqli_real_escape_string($con, $_POST['mail']); 
            $password = mysqli_real_escape_string($con, $_POST['password']); 
            $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']); 
            $Contact = mysqli_real_escape_string($con, $_POST['Contact']); 
            $DOB = mysqli_real_escape_string($con, $_POST['DOB']); 
            if ($password !== $cpassword) {
                $errors['password'] = "Confirm password not matched!";
            }else{
                $enc = password_hash($password, PASSWORD_BCRYPT);
                $update_save = "UPDATE `usertable` SET `name`= $fname,`email`=$mail,`password`=$enc,`Contact`=$Contact,`DOB`= $DOB";
                $run_query = mysqli_query($con, $update_save);
                if ($run_query) {
                    $info = "Your info has been updated";
                    $_SESSION['info'] = $info;
                    header('Location : home.php');
                }
                else
                {
                    $errors['save-error'] = "Failed to update Info";
                }
            }

        }

        $mail->smtpClose();
?>