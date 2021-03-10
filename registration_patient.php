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
        <title>E-Przychodnia: Zarejestruj się</title>
        <meta name="description" content="`"/>
        <meta nane="keywords" content=""/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>

        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <link rel="stylesheet" href="css/loginRegistration.css" type="text/css"/>
        <link rel="stylesheet" href="css/regulations.css" type="text/css"/>
        <link rel="stylesheet" href="css/fontello.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet"> 
        

        
    </head>

    <body>

        <a href="index.php"><div class="back" style="margin-left: 10px;" >Powrót do strony głównej</div></a>

        <header id="logo_header">
            <p class="main_header">Zarejestruj SIĘ</p>
        </header>

       <main class>

            <form style=" padding-top: 50px;" action="registration_check_patient.php" method="post" class="login_form">

                Imię<br/> 
                <input required type="text" name="firstName" placeholder="Jan" value="<?php
                if(isset($_SESSION['firstNameF'])){
                    echo $_SESSION['firstNameF'];
                    unset($_SESSION['firstNameF']);
                } ?>"/>
                <br/> 
                <?php
                if(isset($_SESSION['error_firstName'])){
                    echo $_SESSION['error_firstName'];
                    unset($_SESSION['error_firstName']);
                }
                ?>

                Nazwisko<br/> 
                <input required type="text" name="secondName" placeholder="Kowalski" value="<?php
                if(isset($_SESSION['secondNameF'])){
                    echo $_SESSION['secondNameF'];
                    unset($_SESSION['secondNameF']);
                } ?>"/>
                <br/> 
                <?php
                if(isset($_SESSION['error_secondName'])){
                    echo $_SESSION['error_secondName'];
                    unset($_SESSION['error_secondName']);
                }
                ?>
                

                Data urodzenia<br/> 
                <input required type="date" name="data" placeholder="1978-02-14" value="<?php
                if(isset($_SESSION['dataF'])){
                    echo $_SESSION['dataF'];
                    unset($_SESSION['dataF']);
                } ?>"/>
                <br/> 
                <?php
                if(isset($_SESSION['error_date'])){
                    echo $_SESSION['error_date'];
                    unset($_SESSION['error_date']);
                }
                ?>

                Miejscowość<br/> 
                <input required type="text" name="locality" placeholder="Warszawa" value="<?php
                if(isset($_SESSION['localityF'])){
                    echo $_SESSION['localityF'];
                    unset($_SESSION['localityF']);
                } ?>"/>
                <br/> 
                <?php
                if(isset($_SESSION['error_locality'])){
                    echo $_SESSION['error_locality'];
                    unset($_SESSION['error_locality']);
                }
                ?>

                E-mail<br/> 
                <input required type="text" name="email" placeholder="jan.kowalski@gmail.com" value="<?php
                if(isset($_SESSION['emailF'])){
                    echo $_SESSION['emailF'];
                    unset($_SESSION['emailF']);
                } ?>"/>
                <br/> 
                <?php
                if(isset($_SESSION['error_email'])){
                    echo $_SESSION['error_email'];
                    unset($_SESSION['error_email']);
                }
                ?>
                

                Pesel<br/> 
                <input required type="text" name="pesel" placeholder="20874698725" value="<?php
                if(isset($_SESSION['peselF'])){
                    echo $_SESSION['peselF'];
                    unset($_SESSION['peselF']);
                } ?>"/>
                <br/> 
                <?php
                if(isset($_SESSION['error_pesel'])){
                    echo $_SESSION['error_pesel'];
                    unset($_SESSION['error_pesel']);
                }
                ?>

                Numer telefonu<br/> 
                <input required type="text" name="phone" placeholder="514789657" value="<?php
                if(isset($_SESSION['phoneF'])){
                    echo $_SESSION['phoneF'];
                    unset($_SESSION['phoneF']);
                } ?>"/>
                <br/> 
                <?php
                if(isset($_SESSION['error_phone'])){
                    echo $_SESSION['error_phone'];
                    unset($_SESSION['error_phone']);
                }
                ?>

                Hasło<br/> 
                <input required type="password" name="password1" placeholder="********" value="<?php
                if(isset($_SESSION['password1F'])){
                    echo $_SESSION['password1F'];
                    unset($_SESSION['password1F']);
                } ?>"/>
                <br/><br/>
                <?php
                if(isset($_SESSION['error_password'])){
                    echo $_SESSION['error_password'];
                    unset($_SESSION['error_password']);
                }
                ?>

                Powtórz hasło<br/> 
                <input required type="password" name="password2" placeholder="********"/>
                <br/><br/>

                <label>
                <input required type="checkbox" name="regulations" <?php
                    if(isset($_SESSION['regulationsF'])){
                        echo "checked";
                        unset($_SESSION['regulationsF']);
                    }
                ?> />Akceptuje <a href="regulations.php" target="_blank">regulamin</a>
                </label>
                <?php
                    if(isset($_SESSION['error_regulations'])){
                        echo $_SESSION['error_regulations'];
                        unset($_SESSION['error_regulations']);
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
