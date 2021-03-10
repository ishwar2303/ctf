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
    <script src="script/login.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge 4</title>
    <style>
        
        body{
            background-image: url('css/c-4.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            height: 100vh;
            font-family: monospace;
        }
        .wrapper{
            position: relative;
            position: absolute;
            top: 10%;
            left: 10%;
        }
        .key-wrapper{
            position: absolute;
            top: 25%;
            left: 10%;
            display: flex;
        }
        input{
            height: 80px;
            font-size: 28px;
            padding: 0px 15px;
            width: 350px;
            border-radius: 5px;
            border: 2px solid rgb(74, 87, 46);
            transition: 600ms;
        }
        input:focus{
            width: 800px;
            transition: 600ms;
            outline: none;
            border-color: rgb(39, 43, 30);
            color: rgb(137, 189, 16);
        }
        button{
            padding: 0px 25px;
            margin-left: 10px;
            background: rgb(26, 27, 23);
            color: white;
            border-radius: 5px;
            border: none;
            font-size: 17px;
        }
        button:focus{
            outline: none;
        }
        button:hover{
            background: rgb(39, 43, 30);
        }
        .jump{
            color : white;
            font-size: 20px;
            transition: 600ms;
            cursor: pointer;
        }
        .encrypt:hover{
            font-size: 30px;
            transition: 600ms;
        }
        .wrapper-2{
            position: absolute;
            top: 15%;
            left: 10%;
            display: flex;
        }
    </style>
</head>
<body>
    <h1 class="wrapper">Dare, dare, dare, dare, dare, dare, dare.</h1>
    <h3 class="wrapper-2 jump encrypt">zljyla oats mpsl</h3>
    <div class="key-wrapper">
        <input type="" id="password" placeholder="Type key here...">
        <button id="check-password">Submit Key</button>
    </div>
    <script>
        document.getElementById('check-password').addEventListener('click', () => {
            alert('Did you get it?')
            checkKey(document.getElementById('password').value)
        })
    </script>

    <script>
        function ascci_converter(str){
            str = str.toLowerCase()
            res = str.split(' ')
            let key = ''
            let flag = 0
            for(i=0; i<res.length; i++){
                str = res[i];
                for(j=0; j<str.length; j++){
                    key += str[j].charCodeAt()
                }
                if(flag<3){
                    key += '/'
                    flag++
                }
            }
            if(key == '/'){
                alert('3')
                alert('words')
            }
            else window.location = key + 'flag.html'
        }
        
    </script>

</body>
</html>