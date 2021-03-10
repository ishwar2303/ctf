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
    <title>Hahaha...</title>
    <script src="https://kit.fontawesome.com/f9bbf9ac4e.js"></script>
    <script src="script/c5.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .wrapper{
            padding : 20px;
            font-family : monospace;
        }
        .stop{
            pointer-events : none;
        }
        .header{
            padding : 20px 30px;
            display : flex;
            justify-content : center;
            background : white;
            box-shadow : 0px 0px 6px 0px rgba(0,0,0,0.6);
            border-radius : 5px;
        }
        .header a{
            padding : 10px 20px;
            text-decoration : none;
            color : rgb(90, 165, 16);
            font-size : 20px;
            border-radius : 3px;
            transition : 300ms;
        }
        .header a:hover{
            background : rgb(90, 165, 16);
            color : white;
            transition : 300ms;
        }
        .confused{
            padding : 20px 0px;  
        }
        .confused h3{
            text-align : right;
        }
        /* */
        .try{
            margin : 25px 0px;
        }
        .searching{
            margin : 10px 0px;
        }
        .about .html{
            color : brown;
        }
        /* */
        .help{
            color : blue;
        }
        .help i{
            color : rgba(0,0,0,.6);
            font-size : 30px;
        }
        .about{
            width : 100%;
            display : flex;
            justify-content : space-between;
        }
        .about a{
            font-size : 18px;
            color : red;
            text-decoration : none;
            padding: 20px;
        }
        .input-container{
            margin : 20px 0px;
        }
        input {
            height : 50px;
            padding: 0px 15px;
            border : 2px solid rgba(0,0,0,0.2);
        }
        input:focus{
            outline : none;
        }
        .find-file{
            height : 50px;
            padding:  0px 30px;
            background : #2980b9;
            color : white;
            border-radius : 3px;
            border : none;
        }
        .find-file:hover{
            background : #27ae60;
            box-shadow : 0px 0px 10px 0px rgba(0,0,0,0.6);
        }
        .get-it{
            font-size : 30px;
            color : white;
            margin-bottom : 35px;
            padding-left : 20px;
        }
        .get-it i{
            color : rgba(0,0,255,0.6);
        }
        .flag-notice h3{
            
            transition : 2000ms;
        }
        .flag-notice h3:hover{
            font-size : 30px;
            transition : 2000ms;
            color : transparent;
            cursor : pointer;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <a href="index.php" title="c5/favi.html">Home</a>
            <a href="challenge1.php" title="c5/abrasion.html">Challenge 1</a>
            <a href="challenge2.php" title="c5/waterproof.html">Challenge 2</a>
            <a href="challenge3.php" title="c5/loki.html">Challenge 3</a>
            <a href="challenge4.php" title="c5/obligation.html">Challenge 4</a>
            <a href="challenge5.php" title="c5/maggi.html" title="challenge5" class="stop">Challenge 5</a>
        </div>
        <div class="help">
            <h3>Title helps <i class="fas fa-smile-wink"></i> </h3>
        </div>
        <div class="flag-notice">
            <h3>Note : Flag for this challenge is written in curly braces.</h3>
        </div>
        <div class="confused">
            <h3>Confused Right?</h3>
        </div>
        <div class="try">
            <div class="input-container">
                <input type="text" placeholder="HTML File Name" id="html-file">
                <button class="find-file" id="html-file-btn">Search</button>
            </div>
            
            <div class="input-container">
                <input type="text" placeholder="JavaScript File Name" id="js-file">
                <button class="find-file" id="js-file-btn">Search</button>
            </div>
            
            <div class="input-container">
                <input type="text" placeholder="TEXT File Name" id="text-file">
                <button class="find-file"  id="text-file-btn">Search</button>
            </div>
        </div>
        <div class="searching">
            <h2>Searching might help</h2>
        </div>
    </div>
    <div class="get-it">Place all in sequence <i class="fas fa-thumbs-up"></i></div>
    <div class="about">
        <a href="" title="c5/accent.html" class="html">Do you need help?</a>
        <a href="" title="c5/army.html">I have already mentioned.</a>
    </div>

</body>
</html>
<script>
    $('#html-file-btn').click(() => {
        let val = document.getElementById('html-file').value
        val = val.toLowerCase()

        if(val == 'simply ask for help'){
            alert('Hahaha.... Take a deep breath')
            return
        }

        if(val != '')
            window.location = val+'.html'
        else alert('Enter name')
    })
    $('#js-file-btn').click(() => {
        let val = document.getElementById('js-file').value
        val = val.toLowerCase()

        if(val == 'simply ask for help'){
            alert('Hahaha.... Take a deep breath')
            return
        }
        if(val != '')
            window.location = val+'.js'
        else alert('Enter name')
    })
    $('#text-file-btn').click(() => {
        let val = document.getElementById('text-file').value
        val = val.toLowerCase()

        if(val == 'simply ask for help'){
            alert('You can do it.')
            return
        }
        if(val != '')
            window.location = val+'.txt'
        else alert('Enter name')
    })
    
</script>