<?php 
    session_start();
    require_once('connection.php');
    $sql = "SELECT * FROM ctf_1";
    $result = $conn->query($sql);
    $correct_answers = array();
    while($row = $result->fetch_assoc()){
        array_push($correct_answers, $row['flag']);
    }

    $sql = "SELECT * FROM ctf_1_score ORDER BY score DESC";
    $result = $conn->query($sql);
    $count = $result->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f9bbf9ac4e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Results</title>
    <style>
        body{
            font-family : monospace;
            background-image : url('css/leaderboard.jpg');
            background-size : cover;
            background-repeat : no-repeat;
            opacity : 0.8;       
        }
        table{
            border : 0.5px solid rgba(0,0,0,0.4);
            border-collapse : collapse;
            width :  100%;
            color : white;
        }
        td,th{
            border : 0.5px solid rgba(0,0,0,0.4);
            padding : 15px;
            text-align : center;
        }
        tr:nth-child(even){
            background : rgba(0,0,0,0.05);
        }
        .wrapper{
            padding : 20px;
            font-family : monospace;
        }
        .wrapper h1{
            color : rgb(90, 165, 16);
        }
        .correct{
            color : green;
        }
        .wrong{
            color : red;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>CTF Leader Board { <?php echo $count; echo $count > 1 ? ' attempts' : ' attempt' ; ?> } </h1>
        <?php if($count > 0){ ?>
        <table>
            <thead>
                <tr>
                    <th>S No.</th>
                    <th>E-mail</th>
                    <th>Score</th>
                    <th>Challenge 1</th>
                    <th>Challenge 2</th>
                    <th>Challenge 3</th>
                    <th>Challenge 4</th>
                    <th>Challenge 5</th>
                    <th>In Time</th>
                    <th>Out Time</th>
                    <th>Total Time Taken</th>
                </tr>
            </thead>
            <tbody>
                <?php $serial_no = 1; ?>
                <?php $index = 0; ?>
                <?php while($row = $result->fetch_assoc()){ ?>
                <?php 
                    $answer1 = $row['c_1'];   
                    $answer2 = $row['c_2'];   
                    $answer3 = $row['c_3'];   
                    $answer4 = $row['c_4'];   
                    $answer5 = $row['c_5'];   
                    $in_time = $row['in_time'];
                    $out_time = $row['out_time']; 
                ?>
                <tr>
                    <td><?php echo $serial_no; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['score'].'%'; ?></td>
                    <td>
                        <?php 
                            if($answer1 == ''){
                                echo '-';
                                
                            }
                            else if(strtolower($answer1) == strtolower($correct_answers[$index])){
                                ?>
                                <span class="correct">
                                    <i class="fas fa-check"></i>
                                </span>
                                <?php
                            }
                            else{
                                ?>
                                <span class="wrong">
                                    <i class="fas fa-times"></i>
                                </span>
                                <?php 
                            }
                        ?>
                    </td>
                    <td>
                        
                    <?php 
                            if($answer2 == ''){
                                echo '-';
                            }
                            else if(strtolower($answer2) == strtolower($correct_answers[$index+1])){
                                ?>
                                <span class="correct">
                                    <i class="fas fa-check"></i>
                                </span>
                                <?php
                            }
                            else{
                                ?>
                                <span class="wrong">
                                    <i class="fas fa-times"></i>
                                </span>
                                <?php 
                            }
                        ?>
                    </td>
                    <td>
                        
                    <?php 
                            if($answer3 == ''){
                                echo '-';
                            }
                            else if(strtolower($answer3) == strtolower($correct_answers[$index+2])){
                                ?>
                                <span class="correct">
                                    <i class="fas fa-check"></i>
                                </span>
                                <?php
                            }
                            else{
                                ?>
                                <span class="wrong">
                                    <i class="fas fa-times"></i>
                                </span>
                                <?php 
                            }
                        ?>
                    </td>
                    <td>
                        
                    <?php 
                            if($answer4 == ''){
                                echo '-';
                            }
                            else if(strtolower($answer4) == strtolower($correct_answers[$index+3])){
                                ?>
                                <span class="correct">
                                    <i class="fas fa-check"></i>
                                </span>
                                <?php
                            }
                            else{
                                ?>
                                <span class="wrong">
                                    <i class="fas fa-times"></i>
                                </span>
                                <?php 
                            }
                        ?>
                    </td>
                    <td>
                        
                    <?php 
                            if($answer5 == ''){
                                echo '-';
                            }
                            else if(strtolower($answer5) == strtolower($correct_answers[$index+4])){
                                ?>
                                <span class="correct">
                                    <i class="fas fa-check"></i>
                                </span>
                                <?php
                            }
                            else{
                                ?>
                                <span class="wrong">
                                    <i class="fas fa-times"></i>
                                </span>
                                <?php 
                            }
                        ?>
                    </td>
                    <td><?php echo $row['in_time']; ?></td>
                    <td><?php echo $row['out_time']; ?></td>
                    <td>
                        <?php 
                            $in_time_seconds = new DateTime($in_time);
                            $in_time_seconds = $in_time_seconds->format('U');
                            if($out_time != ''){
                                $out_time_seconds = new DateTime($out_time);
                                $out_time_seconds = $out_time_seconds->format('U');
                            }
                            else $out_time_seconds = 0;
                            $seconds = $out_time_seconds - $in_time_seconds;
                            $minutes = (int)($seconds/60);
                            $seconds = $seconds - $minutes*60;
                            if($minutes > 0)
                            {
                                echo $minutes;
                                if($minutes == 1)
                                    echo ' minute ';
                                else echo ' minutes ';
                                
                            }
                            if($seconds > 0){
                                echo $seconds;
                                if($seconds == 1)
                                    echo ' second ';
                                else echo ' seconds ';
                            }
                        ?>
                    </td>
                </tr>
                <?php $serial_no++; } ?>
            </tbody>
        </table>
        <?php } ?>
        <?php if($count == 0){ ?>
            <h3>Nothing to show.</h3>
        <?php } ?>
    </div>
</body>
</html>