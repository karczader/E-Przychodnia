<?php
    session_start();
    if ((isset($_SESSION['ifLoginP'])) && ($_SESSION['ifLoginP']==true))
	{
		header('Location: main_patient.php');
		exit();
	}
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8"/>
        <title>E-Przychodnia</title>
        <meta name="description" content=""/>
        <meta nane="keywords" content=""/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>

        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <link rel="stylesheet" href="css/index.css" type="text/css"/>
        <link rel="stylesheet" href="css/fontello.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet"> 
        

        
    </head>

    <body>

        <header>
            <p class="main_header">Witaj W E-PRZYCHODNI</p>
        </header>

       <main class="container">
           <div id="hello_page">

                    <a href="login_patient.php">
                        <div class="hello_img">
                            <i class="icon-child"></i><br/>
                            <p class="hello_choice">Jestem pacjentem</p>
                        </div>
                    </a>

                    <a href="login_doctor.php">
                        <div class="hello_img">
                            <i class="icon-user-md"></i><br/>
                            <p class="hello_choice">Jestem lekarzem</p>
                        </div>
                    </a>
                       

                <div style="clear:both";></div>

           </div>
       </main>

       <footer>
            Wszystkie prawa zastrzeżone &copy; 2021
       </footer>
    
       
    </body>
</html>