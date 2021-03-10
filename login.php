<?php 
    session_start();
    require_once('connection.php');
    require_once('middleware.php');  

    date_default_timezone_set("Asia/Kolkata");
    $epoch_time = time();
    $timestamp = date("d-m-Y h:i:sa", $epoch_time);

    $user_email = '';
    $user_password = '';
    $user_email_error = '';
    $user_password_error = '';
    $login_error = '';

    if(isset($_GET['response'])){
        $_SESSION['success_msg'] = $_GET['response'];
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        header('Location: login.php');
        exit;
    }
    if(isset($_POST['userEmail']) && isset($_POST['userPassword'])){
        // initialize variables with user data
        $user_email = $_POST['userEmail'];
        $user_password = $_POST['userPassword'];
        $control = 1;
        $registered = 1;
        
        $user_email = cleanInput($user_email);
        if(!empty($user_email)){ // not empty
            if(!emailValidation($user_email)){ // call for email validation
                $user_email_error = 'Invalid E-mail';
                $control = 0;
            }
            else{ 
                $sql = "SELECT user_id FROM user WHERE email = '$user_email'";
                $result = $conn->query($sql);
                if($result->num_rows == 0){
                    $user_email_error = "Not registered!";
                    $control = 0;
                    $registered = 0;
                }
            }
        }
        else{
            $user_email_error = 'E-mail required';
            $control = 0;
        }
        if($registered){
            
            $sql = "SELECT * FROM ctf_1_score WHERE email = '$user_email'";
            $result = $conn->query($sql);
            if($result->num_rows == 1){
                $control = 0;
                $_SESSION['error_msg'] = 'You already made an attempt with this E-mail';
            }
            else{
                $user_password = cleanInput($user_password);
                if (empty($user_password)) { // not empty
                    $user_password_error = 'Password required';
                    $control = 0;
                }
            }

            if($control){ 

                $sql = "SELECT user_id, email FROM user WHERE email = '$user_email' AND password ='$user_password'";
                $result = $conn->query($sql);

                if($result->num_rows == 1){ // authenticated
                    $row = $result->fetch_assoc();
                    $_SESSION['login_time'] = time();
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_email'] = $row['email'];
                    $sql = "INSERT INTO `ctf_1_score` (`user_id`, `email`, `score`, `c_1`, `c_2`, `c_3`, `c_4`, `c_5`, `in_time`, `out_time`) VALUES (NULL, '$_SESSION[user_email]', '0', '', '', '', '', '', '$timestamp', '')";
                    $conn->query($sql);
                    header('Location: index.php');
                    exit;
                }
                else{
                    $_SESSION['error_msg'] = 'Wrong Password';
                }
                
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f9bbf9ac4e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Login | CTF</title>
    <style>
        body{
            font-family : monospace;
            background-image : url('css/login-bg.jpg');
            background-size : cover;
            background-repeat : no-repeat;

        }
        .wrapper{
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        form{
            background : white;
            width: 350px;
            padding: 20px;
            box-shadow: 0px 0px 5px 0px rgb(147, 133, 161);
            border-radius: 5px;
        }
        .input-container{
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }
        .input-container label{
            font-weight: 500;
            font-size: 18px;
            padding-bottom: 10px;    
        }
        .input-container > input{
            height: 50px;
            border-radius: 5px;
            padding: 0px 10px;
            font-size: 17px;
            border : 0.5px solid rgb(0,0,0,0.3);
            font-family: monospace;
        }
        .input-container > input:focus{
            outline: none;
            transition: 400ms;
            border-color: rgb(82, 150, 15);
            box-shadow: 0px 0px 0px 5px rgb(82, 150, 15, 0.3);
        }
        .btn-container{
            display: flex;
            justify-content: flex-end;
        }
        .btn-container button{
            padding: 15px 30px;
            border-radius: 5px;
            background: rgb(90, 165, 16);
            color: white;
            border: none;
        }
        
        .btn-container button:hover{
            background: rgb(79, 150, 8);
        }
        .btn-container button:focus{
            outline: none;
        }
        .note{
            color: rgb(101, 101, 243);
            margin-top: 10px;
        }
        .form-input-response{
            color : red;
            margin-top : 5px;
        }
        .error-msg{
        display: flex;
        color: red;
        align-items: center;
        background: rgba(255,0,0,0.03);
        padding: 13px 10px;
        margin-bottom: 15px;
        border: 0.5px solid rgba(255,0,0,0.4);
        font-size: 13px;
        border-radius: 5px;
        }
        .error-msg > span{
        display: flex;
        flex : 1;
        justify-content: flex-start;
        align-items: flex-start;
        }
        .error-msg > i:nth-child(1){
        padding-top: 3px;
        margin-right: 5px;
        align-self: flex-start;
        margin-bottom: 2px;
        }
        .error-msg > i:nth-child(2){
        padding-left: 5px;
        cursor: pointer;
        align-self: flex-start;
        }
        .success-msg{
        display: flex;
        color: green;
        align-items: center;
        background: rgba(0,255,0,0.07);
        padding: 13px 10px;
        margin-bottom: 15px;
        font-size: 13px;
        border : 0.5px solid rgba(0,255,0,0.8); 
        border-radius: 5px;
        }
        .success-msg > span{
        display: flex;
        flex : 1;
        justify-content: flex-start;
        align-items: flex-start;
        }
        .success-msg > i:nth-child(1){
        padding-top: 3px;
        margin-right: 5px;
        align-self: flex-start;
        }
        .success-msg > i:nth-child(3){
        padding-left: 5px;
        cursor: pointer;
        align-self: flex-start;
        }
        .note-msg{
        display: flex;
        padding: 10px 0px;
        color: rgb(5, 83, 226);
        align-items: center;
        background: rgba(0,0,255,0.06);
        padding: 13px 10px;
        font-size: 13px;
        margin-bottom: 15px;
        border : 0.5px solid rgba(0,0,255,0.4);
        border-radius: 5px;
        }
        .note-msg > span{
        display: flex;
        flex : 1;
        justify-content: flex-start;
        align-items: flex-start;
        }
        .note-msg > i:nth-child(1){
        margin-right: 5px;
        padding-top: 3px;
        align-self: flex-start;
        }
        .note-msg > i:nth-child(3){
        padding-left: 5px;
        cursor: pointer;
        align-self: flex-start;
        }
        form h3{
            color : rgb(90, 165, 16);
        }
        #leaderboard-btn, .leaderborad{
            position : absolute;
            left : 10px;
            top : 10px;
            z-index : 5;
            background : white;
            color : black;
            border-radius : 3px;
            padding : 10px 20px;
            font-weight : bold;
            text-decoration : none;
        }
        #leaderboard-btn:hover{
            color : rgb(90, 165, 16);

        }
    </style>
</head>
<body>
    <a href="view-result.php" target="_blank" class="leaderboard">
    <button id="leaderboard-btn" >Check Leader Board</button>
    </a>
    <div class="wrapper">
        <form action="" method="POST">
            <h1>Capture The Flag</h1>
            <h3>Log In to continue</h3>
            <?php require 'flash-message.php'; ?>
            <div class="input-container">
                <label for="">E-mail</label>
                <input type="email" name="userEmail" value="<?php echo $user_email; ?>">
                <div id="email-validate-response" class="form-input-response">
                    <?php echo $user_email_error; ?>
                </div>
            </div>
            <div class="input-container">
                <label for="">Password</label>
                <input type="password" name="userPassword" value="<?php echo $user_password; ?>">
                <div id="email-validate-response" class="form-input-response">
                    <?php echo $user_password_error; ?>
                </div>
            </div>
            <div class="btn-container">
                <button>Log In</button>
            </div>
            <div class="note">
                Note : Only one attempt is available.
            </div>
        </form>
    </div>
</body>
</html>