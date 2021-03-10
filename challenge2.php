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
    <meta http-equiv="X-UA-Compatible" encrypt="script/window.js" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge 2</title>
    <style>   
        body{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-top: 100px;
            color: rgb(75, 75, 107);
            font-family: 'Courier New', Courier, monospace;
        }
        h3{
            color: white;
        }
    </style>
</head>
<body>
    <h1>Strong Visual Required</h1>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <h3>Try a little harder</h3>
</body>
</html>