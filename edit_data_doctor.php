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
        <link rel="stylesheet" href="css/edit_data.css" type="text/css"/>
        <link rel="stylesheet" href="css/fontello.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet"> 
        

        
    </head>

    <body>
            <a href="index.php" class="logout_text">
                <div class="logout">Wyloguj się </div>
            </a>
       

        <header id="logo_header">
            
        </header>

        <nav>

            <ol>
                <a href="main_doctor.php"><li>Strona główna</li></a>
                <a href="#"><li>Spis pacjentów</li> </a>
                <a href="#"><li>Podanie o urlop</li> </a>
                <a href="calendar_doctor.php"><li>Kalendarz</li></a>
                <a href="edit_data_doctor.php"><li>Edytuj dane</li></a>
                
            </ol>   
        </nav>

        <main class="container">

            <article >
                <h3>Edytuj swoje dane</h3>

                <form action="edit_check_doctor.php" method="post">


                    <?php

                        if (isset($_SESSION['update_okayD'])){
                            echo $_SESSION['update_okayD'];
                            unset($_SESSION['update_okayD']);
                        }

                    ?>

                    <div class="form_element">Imię<br>
                        <input type="text" name="newFirstNameD" value="<?php
                        if(isset($_SESSION['FirstName'])){
                            echo $_SESSION['FirstName'];
                        }
                        ?>"/>
                    </div>

                    <div class="form_element">Nazwisko<br>
                        <input type="text" name="newSecondNameD" value="<?php
                        if(isset($_SESSION['SecondName'])){
                            echo $_SESSION['SecondName'];
                        }?>"/>
                    </div>


                    <div class="form_element">Hasło<br>
                        <input type="password" name="newPasswordD" value="********"/>
                    </div>

                    <?php
                    if(isset($_SESSION['error_password'])){
                        echo $_SESSION['error_password'];
                        unset($_SESSION['error_password']);
                    }
                    ?>

                    <div>
                        <div><input style="float:left;" type="submit" value="Zapisz zmiany"/></div>
                        <a style="float:left;" href="main_doctor.php"><div id="back">Anuluj</div></a>
                        <div style="clear:both";></div>
                    </div>

                   

                </form>


            </article>

        </main>
        
        

       <footer>
            Wszystkie prawa zastrzeżone &copy; 2021
       </footer>
    
       
    </body>
</html> 

