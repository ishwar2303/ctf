<?php 
    session_start();
    require_once('connection.php');

    date_default_timezone_set("Asia/Kolkata");
    $epoch_time = time();
    $timestamp = date("d-m-Y h:i:sa", $epoch_time);

    function clean_input($str){
        return trim(strip_tags(addslashes($str)));
    }
    $error_message = '';
    $success_message = '';
    if(isset($_SESSION['user_id']) && isset($_POST['answer1']) && isset($_POST['answer2']) && isset($_POST['answer3']) && isset($_POST['answer4']) && isset($_POST['answer5'])){
        $answer1 = clean_input($_POST['answer1']);
        $answer2 = clean_input($_POST['answer2']);
        $answer3 = clean_input($_POST['answer3']);
        $answer4 = clean_input($_POST['answer4']);
        $answer5 = clean_input($_POST['answer5']);

        $answers = [$answer1, $answer2, $answer3, $answer4, $answer5];

        $sql = "SELECT * FROM ctf_1";
        $result = $conn->query($sql);
        $i = 0;
        $count = 0;
        $number_of_challenge = $result->num_rows;
        while ($row = $result->fetch_assoc()) {
            if (strtolower($answers[$i]) == strtolower($row['flag'])) {
                $count++;
            }
            $i++;
        }
        $score = ($count/$number_of_challenge)*100;
        $sql = "UPDATE ctf_1_score SET score = '$score', c_1 = '$answer1', c_2 = '$answer2', c_3 = '$answer3', c_4 = '$answer4', c_5 = '$answer5', out_time = '$timestamp'  WHERE email = '$_SESSION[user_email]'";
        if($conn->query($sql) === true) {
            $success_message = 'Your response has been recorded.'; 
            ?>
            <script>location.href = 'login.php?response=<?php echo $success_message; ?>'</script>
            <?php
        } else {
            $error_message = $conn->error; ?>
            <script>location.href = 'login.php?response=<?php echo $error_message; ?>'</script>
        <?php
        }
        
        

    }

?>
<script>
    $('.close-message').click(() => {
        $('.error-msg').remove()
        $('.success-msg').remove()
    })
</script>