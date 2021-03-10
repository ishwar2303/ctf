<?php 
    session_start();
    if(!isset($_SESSION['user_id'])){
        $_SESSION['note_msg'] = 'Please login to view resource';
        header('Location: login.php');
        exit;
    }
    else{
        $login_time = $_SESSION['login_time'];
        $current_time = time();
        $left_seconds = 3600 - ($current_time - $login_time); 
        if($current_time - $login_time > 3600){
            header('Location: logout.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF</title>
    <script src="https://kit.fontawesome.com/f9bbf9ac4e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body{
            font-family: -webkit-pictograph;
            background-image: url('css/index-bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
        .wrapper{
            display: flex;
            flex-direction: column;
            padding-top: 50px;
            align-items: center;
        }
        a{
            text-decoration: none;
        }
        .wrapper a{
            padding: 15px;
            border-radius: 5px;
            background: rgb(42, 54, 30);
            color: white;
            margin: 15px 0px;
            display: flex;
        }
        
        .wrapper a label{
            margin-right: 5px;
        }
        .wrapper a:hover{
            background: rgb(82, 150, 15);
            color: white;
            box-shadow: 0px 0px 15px 0px rgb(0,0,0);
            padding: 20px;
            transition: 200ms;
        }
        h1{
            color: rgb(9, 9, 37);
        }
        .btn-abs{
            position: absolute;
            right: 10px;
            top: 10px;
            padding: 12px;
            border-radius: 5px;
            border: none;
            font-size: 15px;
            text-transform: capitalize;
        }
        .btn-abs:hover{
            box-shadow : 0px 0px 12px 0px rgba(0,0,0,0.5);
            cursor:pointer;
        }
        .submit-answers-form-popup{
            position: relative;
            position: absolute;
            top : 50%;
            left : 50%;
            transform: translate(-50%, -50%);
            background: white;
            z-index: 10;
            width: 800px;
            height: 85vh;
            border-radius: 10px;
            padding: 20px;
            position: fixed;
            overflow-y: scroll;
            display: none;
            box-shadow: 0px 0px 8px 0px rgb(0, 0, 0, 0.6);
        }
        .form-container{
            display: flex;
            flex-direction: column;
        }
        .form-heading{
            color: rgb(50, 88, 12);
            font-size: 27px;
            text-align: center;
            margin-top: 0;
            font-family: monospace;
        }
        .overlay{
            position: absolute;
            left: 0;
            top : 0;
            background: rgb(0,0,0,0.3);
            z-index: 5;
            width: 100%;
            height: 100vh;
            display: none;
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
            font-family: cursive;    
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
            margin-top: 0;
        }
        ::-webkit-scrollbar {
            width: 0px;
        }
        
        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
        }
        #close-form-icon{
            font-size: 30px;
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
            color: rgb(0, 0, 0, 0.6);
        }
        #close-form-icon:hover{
            color: red;
        }
        .success-msg{
            font-size: 17px;
            color: green;
            border: 0.5px solid rgb(0, 255, 0, 0.6);
            background: rgb(0, 255, 0, 0.2);
            display: flex;
            justify-content: space-between;
            padding: 15px 10px;
            border-radius: 5px;
            margin: 10px 0px;
            align-items: center;
        }
        .error-msg{
            font-size: 17px;
            color: red;
            border: 0.5px solid rgb(255,0,0,0.3);
            background: rgb(255,0,0,0.05);
            display: flex;
            padding: 15px 10px;
            border-radius: 5px;
            margin: 10px 0px;
            justify-content: space-between;
            align-items: center;
        }
        .close-message{
            font-size: 15px;
            cursor: pointer;
            color : rgba(0,0,0,0.4);
        }
        @media screen and (max-width : 800px){
            .submit-answers-form-popup{
                width: 100%;
                position: absolute;
                height: auto;
                left: 0;
                top: 0;
                padding: 10px 0px;
                transform: translate(0,0);
                border-radius: 0;
            }
            .input-container{
                margin: 0px 10px;
            }
            .form-heading{
                text-align: left;
                margin-left: 10px;
            }
            .note{
                margin-left: 10px;
                margin-top: 10px;
            }
            .btn-container{
                margin-top: 10px;
                margin-right: 10px;
            }
            .message{
                margin : 10px;
                margin-top: 0;
            }
        }
        #timer{
            color: white;
            font-weight: 600;
            font-size: 30px;
            background: rgba(0,255,0,0.2);
            padding: 10px 20px;
            border-radius: 10px;
            margin: 10px;
            position: absolute;
            left: 0px;
            top: 0;
            display : none;
        }
    </style>
</head>
<body>
    <button class="btn-abs show-submit-form-btn">Submit your answers</button>
    <div class="wrapper">
        <h1>Do you have it in you?</h1>
        <a href="challenge1.php" target="_blank"><label>Challenge 1 :</label> <span>Images can be troublesome</span></a>
        <a href="challenge2.php" target="_blank"><label>Challenge 2 :</label> <span>It is all about Routes and JavaScript</span></a>
        <a href="challenge3.php" target="_blank"><label>Challenge 3 :</label> <span>How much do you know about data?</span></a>
        <a href="challenge4.php" target="_blank"><label>Challenge 4 :</label> <span>ASCII Route, Little Jumping</span></a>
        <a href="challenge5.php" target="_blank"><label>Challenge 5 :</label> <span>Attentive Reading</span></a>

    </div>
    
    <div class="submit-answers-form-popup">
        <i id="close-form-icon" class="fas fa-times"></i>
        <div class="form-container">
            <h3 class="form-heading"><i class="fas fa-flag"></i> Submit Your Flags</h3>
            <div class="message"></div>
            <div class="input-container" style="color : rgb(90, 165, 16);">
                <label for="">Logged In as <?php echo $_SESSION['user_email']; ?> 
                <!-- <a href="logout.php" onclick="return confirm(`Are you sure! You won't be able to attempt again with the current email`)" style="text-decoration : underline;">Switch Account</a> -->
                </label>
            </div>
            <h4 class="note">Note : Don't include {} in answer</h4>
            <div class="input-container">
                <label for="">Challenge 1</label>
                <input oninput="checkInput()" type="text" class="answers" id="challenge-1">
            </div>
            <div class="input-container">
                <label for="">Challenge 2</label>
                <input oninput="checkInput()" type="text" class="answers" id="challenge-2">
            </div>
            <div class="input-container">
                <label for="">Challenge 3</label>
                <input  oninput="checkInput()" type="text" class="answers" id="challenge-3">
            </div>
            <div class="input-container">
                <label for="">Challenge 4</label>
                <input  oninput="checkInput()" type="text" class="answers" id="challenge-4">
            </div>
            <div class="input-container">
                <label for="">Challenge 5</label>
                <input  oninput="checkInput()" type="text" class="answers" id="challenge-5">
            </div>
            <div class="btn-container">
                <button id="submit-flag-btn">Submit</button>
            </div>
        </div>
    </div>
    <div class="overlay"></div>


    <script>
        $('.show-submit-form-btn').click(() => {
            $('.submit-answers-form-popup').show()
            $('.overlay').show()
        })
        $('#close-form-icon').click(() => {
            $('.submit-answers-form-popup').hide()
            $('.overlay').hide()
        })

        $('#submit-flag-btn').click(() => {
            let answer1 = $('#challenge-1').val()
            let answer2 = $('#challenge-2').val()
            let answer3 = $('#challenge-3').val()
            let answer4 = $('#challenge-4').val()
            let answer5 = $('#challenge-5').val()
            let url = 'submit-ctf-1-answers.php'
            let req = {
                answer1,
                answer2,
                answer3,
                answer4,
                answer5
            }
            let confirmation = confirm('Are you sure!')
            if(confirmation)
                $('.message').load(url, req)
        })
        
    </script>
    
    <script>
        function checkInput(){
            let answerInputs = document.getElementsByClassName('answers')
            for(i=0; i<answerInputs.length; i++){
                
                if(answerInputs[i].value == ''){
                    answerInputs[i].style.borderColor = 'rgb(0,0,0,0.3)'
                }
                else {
                    answerInputs[i].style.borderColor = 'rgba(0,255,0,1)'
                }
            }
        }
        let seconds = <?php echo $left_seconds; ?>;
    </script>
    <div id="timer"><?php echo $left_seconds; ?></div>
    <script src="script/timer.js"></script>
</body>
</html>