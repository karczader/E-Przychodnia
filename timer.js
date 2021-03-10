
    function countinggTime(){
        
        var time = new Date();
        var day=time.getDate();
        if(day<10) day="0"+day;
        var monthNr = time.getMonth(); //bo numeracja miesiecy jest od 0
        
        switch(monthNr){
            case 0: month="styczeń"; break;
            case 1: month="luty"; break;
            case 2: month="marzec"; break;
            case 3: month="kwiecień"; break;
            case 4: month="maj"; break;
            case 5: month="czerwiec"; break;
            case 6: month="lipiec"; break;
            case 7: month="sierpień"; break;
            case 8: month="wrzesień"; break;
            case 9: month="październik"; break;
            case 10: month="listopad"; break;
            case 11: month="grudzień"; break;

        }
        var year = time.getFullYear();
        var hour =  time.getHours();
        if(hour<10) godzina="0"+godzina;
        var minute =  time.getMinutes();
        if(minute<10) minute="0"+minute;
        var second = time.getSeconds();
        if(second<10) second="0"+second;


        document.getElementById("timer").innerHTML= day+"-"+month+"-"+year+" | "+hour+":"+minute+":"+second;
        //document.getElementById("timer").innerHTML="hej";

        setTimeout("countingTime()", 1000);
    }
