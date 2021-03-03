<?php

    session_start();
    if (!isset($_SESSION['ifLoginD'])) header('Location: index.php');

?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8"/>
        <title>E-Przychodnia: Doctor</title>
        <meta name="description" content=""/>
        <meta nane="keywords" content=""/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>

        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <link rel="stylesheet" href="css/main.css" type="text/css"/>
        <link rel="stylesheet" href="css/fontello.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet"> 

        <script type="text/javascript" src="timer.js"> </script>
        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

        <script type="text/javascript">

			var timer1=0;
			var timer2=0;

			function setSlide(numberSlide){
				clearTimeout(timer1);
				clearTimeout(timer2);
				hide();
				number=numberSlide--;
				setTimeout("changeSlide()", 500);
				 
			}

			function hide(){
				$("#slider").fadeOut(500);
			}
		
			var number = Math.floor(Math.random()*3)+1;
			function changeSlide()
			{
				number++; if (number>3) number=1;
				var file = "<img src=\"img/slajd" + number + ".png\" />";
				document.getElementById("slider").innerHTML = file;
				$("#slider").fadeIn(500);

                timer1=setTimeout("changeSlide()", 5000);
				timer2=setTimeout("hide()", 4500);

			}
			
		</script>
        
    </head>

    <body onload="countingTime();" onload="changeSlide()">
        <a href="logout.php" class="logout_text">
            <div class="logout">Wyloguj się </div>
        </a>

        <div id="timer"></div>   


        <div style="clear:both;"></div>
       

        <header id="logo_header">
            <p class="main_header">WITAJ <?php echo $_SESSION['FirstName'].' '.$_SESSION['SecondName'];?> :)</p>

        </header>

        <nav>

            <ol>
                <a href="main_doctor.php"><li>Strona główna</li></a>
                <a href="list_patients.php"><li>Spis pacjentów</li> </a>
                <a href="application_for_free.php"><li>Podanie o urlop</li> </a>
                <a href="calendar_doctor.php"><li>Kalendarz</li></a>
                <a href="edit_data_doctor.php"><li>Edytuj dane</li></a>
                
            </ol>   
        </nav>

        <main class="container">

            <article>

                <span onclick="setSlide(1)" style="cursor: pointer;">[1]</span>
                <span onclick="setSlide(2)" style="cursor: pointer;">[2]</span>
                <span onclick="setSlide(3)" style="cursor: pointer;">[3]</span>
                <div id="slider"></div>

            </article>

        </main>
        

       <footer>
            Wszystkie prawa zastrzeżone &copy; 2021
       </footer>
    
       
    </body>
</html> 

