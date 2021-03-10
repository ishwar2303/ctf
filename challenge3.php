<?php 
    session_start();
    if(!isset($_SESSION['user_id'])){
        $_SESSION['note_msg'] = 'Please login to view resource';
        header('Location: login.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge 3</title>
    <style>
        
        body{
            background-image: url('css/c-3.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            height: 100vh;
        }
    </style>
</head>
<body>
    
</body>
</html>