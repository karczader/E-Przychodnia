<?php

    session_start();
    if (!isset($_SESSION['ifLoginP'])) header('Location: index.php');


?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8"/>
        <title>E-Przychodnia: Pacjent</title>
        <meta name="description" content=""/>
        <meta nane="keywords" content=""/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>

        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <link rel="stylesheet" href="css/main.css" type="text/css"/>
        <link rel="stylesheet" href="css/fontello.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300&display=swap" rel="stylesheet">

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
				var file = "<img src=\"img/slajd" + number + ".png\" width='400px' height='400px' />";
				document.getElementById("slider").innerHTML = file;
				$("#slider").fadeIn(500);

                timer1=setTimeout("changeSlide()", 4000);
				timer2=setTimeout("hide()", 3500);

			}

            function start(){
                countingTime();
                changeSlide();
            }

            window.onload=start;

            function start(){
                changeSlide();
                countingTime();
            }
			
		</script>
        

        
    </head>

    <body>
        
        <div class="navtop">
            <a href="logout.php" class="logout_text">
                <div class="logout">Wyloguj się </div>
            </a>

            <div id="timer"></div>   


            <div style="clear:both;"></div>
        </div>

        <header id="logo_header">
            <p class="main_header">WITAJ <?php echo $_SESSION['FirstName'].' '.$_SESSION['SecondName']?></p>
        </header>

        <nav>

            <ol>
                <a href="main_patient.php"><li>Strona główna</li></a>
                <a href="registration.php"><li>Rejestracja na wizytę</li> </a>
                <a href="history_medical.php"><li>Historia chorób</li> </a>
                <a href="current_medications.php"><li>Aktualne leki</li></a>
                <a href="message.php"><li>Powiadomienia</li></a>
                <a href="calendar_patient.php"><li>Kalendarz</li></a>
                <a href="edit_data_patient.php"><li>Edytuj dane</li></a>
            </ol>   
        </nav>

        <main class="container">

            <div class="navigation">
                    <div id="slider"></div>
            </div>

            <article style="float: left;">

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris laoreet erat libero, ac commodo nulla sodales in. Nam nisl tellus, mattis eu tellus sed, mattis tincidunt justo. Phasellus turpis lacus, tristique vitae ultricies sit amet, sagittis vitae felis. In eget neque arcu. Aliquam fringilla purus at bibendum consectetur. Nam bibendum ligula at metus pulvinar pellentesque. Vivamus accumsan finibus posuere. In a mauris laoreet, tristique erat sed, consequat tellus. Mauris ultricies odio sit amet ipsum lacinia tincidunt.</p>

                <p>Vivamus id gravida ex. Etiam euismod turpis id tellus dignissim faucibus. Nunc at sem purus. Ut molestie efficitur augue, sed pellentesque libero dignissim sed. Etiam mauris augue, lacinia id metus eget, scelerisque venenatis libero. Vestibulum convallis maximus posuere. Curabitur sollicitudin sit amet felis ut blandit. Aenean eget elit risus. Vestibulum euismod scelerisque est, id pretium sem dapibus eu. Vestibulum sed blandit nisl, eget iaculis tellus. In et ultricies mi. Etiam feugiat magna non leo feugiat mattis. Aliquam id aliquet mauris. Aenean maximus ultricies efficitur. Suspendisse ut ullamcorper diam. Vestibulum volutpat sagittis ultricies.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel lorem at tellus lobortis fringilla. Morbi at neque id tellus mattis sollicitudin et a dolor. Interdum et malesuada fames ac ante ipsum primis in faucibus. In non auctor arcu. Nullam mollis ipsum sed rhoncus bibendum. Etiam vel urna imperdiet, luctus quam euismod, viverra quam. Nulla tempus mauris non dui placerat laoreet sit amet sit amet risus. Donec fermentum magna nec lectus malesuada, at egestas purus mattis. Nullam rutrum fermentum justo, id fermentum est fringilla in. Nulla sodales scelerisque urna non blandit. Quisque nec sapien vel nisi porttitor tincidunt sodales eget lacus.</p>


            </article>


            <div style="clear:both;"></div>

        </main>
        

       <footer>
            Wszystkie prawa zastrzeżone &copy; 2021
       </footer>
    
       
    </body>
</html> 
