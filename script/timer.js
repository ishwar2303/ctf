function timer(){
    //console.log('Seconds left : ' + seconds)
    let hour = parseInt(seconds/(3600))
    let timeLeft = seconds - hour*3600

    let minute = parseInt(timeLeft/60)
    timeLeft = timeLeft - minute*60

    let second = timeLeft
    
    hour = hour.toString()
    minute = minute.toString()
    second = second.toString()
    if(hour.length == 1)
        hour = '0' + hour
    if(minute.length == 1)
        minute = '0' + minute
    if(second.length == 1)
        second = '0' + second
    
    let watch = hour + ' : ' + minute + ' : ' + second

    let timerElement = document.getElementById('timer')
    timerElement.style.display = 'block'
    timerElement.innerHTML = watch
    seconds--
    //console.log(watch)
    if(seconds < 60){
        timerElement.style.background = 'rgba(255,0,0,0.2)'
        setTimeout(() => {timerElement.style.display = 'none'},600)
    }
    if(seconds < 0){
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
        $('.message').load(url, req)
    }
}
setInterval(timer, 1000)
