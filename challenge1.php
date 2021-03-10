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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, Something-to-do-with-image">
    <title>Challenge 1</title>
    <style>
        body{
            background-image: url('css/globe.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            height: 100vh;
        }
        .abs{
            position: absolute;
            left: 0px;
            top: 0px;
            font-size: 25px;
            color: rgb(red, green, blue);
            background: transparent;
            color: white;
        }
    </style>
</head>
<body>
    <img src="css/blank.jpg" alt="" style="display: none;">
    <div class="abs">It is here somewhere...</div>
</body>
</html>