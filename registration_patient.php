<?php


    echo $_SESSION['error_email'];
    
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
        <title>E-Przychodnia: Zarejestruj się</title>
        <meta name="description" content="`"/>
        <meta nane="keywords" content=""/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>

        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <link rel="stylesheet" href="css/loginRegistration.css" type="text/css"/>
        <link rel="stylesheet" href="css/fontello.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet"> 
        

        
    </head>

    <body>

        <a href="index.php"><div class="back" style="margin-left: 10px;" >Powrót do strony głównej</div></a>

        <header id="logo_header">
            <p class="main_header">Zarejestruj SIĘ</p>
        </header>

       <main class>

            <form style="height: 900px; padding-top: 50px;" action="registration_check_patient.php" method="post" class="login_form">

                Imię<br/> 
                <input type="text" name="firstName" placeholder="Jan"/>
                <br/> 

                Nazwisko<br/> 
                <input type="text" name="secondName" placeholder="Kowalski"/>
                <br/> 

                Data urodzenia<br/> 
                <input type="data" name="data" placeholder="1978-02-14"/>
                <br/> 

                Miejscowość<br/> 
                <input type="text" name="locality" placeholder="Warszawa"/>
                <br/> 

                E-mail<br/> 
                <input type="text" name="email" placeholder="jan.kowalski@gmail.com"/>
                <br/> 

                Pesel<br/> 
                <input type="text" name="pesel" placeholder="20874698725"/>
                <br/> 

                Numer telefonu<br/> 
                <input type="text" name="phone" placeholder="514789657"/>
                <br/> 

                Hasło<br/> 
                <input type="password" name="password1" placeholder="********"/>
                <br/><br/>

                Powtórz hasło<br/> 
                <input type="password" name="password2" placeholder="********"/>
                <br/><br/>
            
                <?php
                if(isset($_SESSION['error_password'])){
                    echo $_SESSION['error_password'];
                    unset($_SESSION['error_password']);
                }
                ?>
                
                <input type="submit" value="Zarejestruj się!"/>

            </form>
           
           
       </main>
    

       <footer>
            Wszystkie prawa zastrzeżone &copy; 2021
       </footer>
    
       
    </body>
</html> 
