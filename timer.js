
    function countingTime(){
        var time = new Date();
        var day=time.getDate();
        if(day<10) day="0"+day;
        var month = time.getMonth()+1; //bo numeracja miesiecy jest od 0, wiec dodajemy 1
        if(month<10) month="0"+month;
        var year = time.getFullYear();
        var hour =  time.getHours();
        if(hour<10) godzina="0"+godzina;
        var minute =  time.getMinutes();
        if(minute<10) minute="0"+minute;
        var second = time.getSeconds();
        if(second<10) second="0"+second;


        document.getElementById("timer").innerHTML= day+"-"+month+"-"+year+" | "+hour+":"+minute+":"+second;

        setTimeout("countingTime()", 1000);
    }
