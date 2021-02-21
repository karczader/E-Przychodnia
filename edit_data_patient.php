<?php

    session_start();
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
        <link rel="stylesheet" href="css/edit_data.css" type="text/css"/>
        <link rel="stylesheet" href="css/fontello.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet"> 
        

        
    </head>

    <body class="main_container">
            <a href="logout.php" class="logout_text">
                <div class="logout">Wyloguj się </div>
            </a>
       
        <nav>

            <ol>
                <a href="main_patient.php"><li>Strona główna</li></a>
                <a href="#"><li>Rejestracja na wizytę</li> </a>
                <a href="#"><li>Historia chorób</li> </a>
                <a href="#"><li>Aktualne leki</li></a>
                <a href="#"><li>Powiadomienia</li></a>
                <a href="#"><li>Kalendarz</li></a>
                <a href="edit_data_patient.php"><li>Edytuj dane</li></a>
            </ol>   
        </nav>

        <main class="container">

            <article >
                <h3>Edytuj swoje dane</h3>

                <form action="edit_check_patient.php" method="post">


                    <?php

                        if (isset($_SESSION['update_okay'])){
                            echo $_SESSION['update_okay'];
                            unset($_SESSION['update_okay']);
                        }

                    ?>
                    <div class="form_element">Imię<br>
                        <input type="text" name="newFirstName" value="<?php
                        if(isset($_SESSION['FirstName'])){
                            echo $_SESSION['FirstName'];
                        }
                        ?>"/>
                    </div>

                    <div class="form_element">Nazwisko<br>
                        <input type="text" name="newSecondName" value="<?php
                        if(isset($_SESSION['SecondName'])){
                            echo $_SESSION['SecondName'];
                        }?>"/>
                    </div>

                    <div class="form_element">Data urodzenia<br>
                        <input type="data" name="newDateOfBirth" value="<?php
                        if(isset($_SESSION['DateOfBirth'])){
                            echo $_SESSION['DateOfBirth'];
                        }?>"/>
                    </div>

                    <div class="form_element">Lokalizacja<br>
                        <input type="text" name="newLocality" value="<?php
                        if(isset($_SESSION['Locality'])){
                            echo $_SESSION['Locality'];
                        }?>"/>
                    </div>

                    <div class="form_element">E-mail<br>
                        <input type="text" name="newEmail" value="<?php
                         if(isset($_SESSION['emailF'])){
                            echo $_SESSION['emailF'];
                            unset($_SESSION['emailF']);
                        }
                        else if(isset($_SESSION['Email'])){
                            echo $_SESSION['Email'];
                        }
                       ?>"/>
                    </div>

                    <?php
                    if(isset($_SESSION['error_email'])){
                        echo $_SESSION['error_email'];
                        unset($_SESSION['error_email']);
                    }
                    ?>

                    <div class="form_element">Pesel<br>
                        <input type="text" name="newPesel" value="<?php
                         if(isset($_SESSION['peselF'])){
                            echo $_SESSION['peselF'];
                            unset($_SESSION['peselF']);
                        }
                        else if(isset($_SESSION['Pesel'])){
                            echo $_SESSION['Pesel'];
                        }?>"/>
                    </div>

                    <?php
                    if(isset($_SESSION['error_pesel'])){
                        echo $_SESSION['error_pesel'];
                        unset($_SESSION['error_pesel']);
                    }
                    ?>

                    <div class="form_element">Numer telefonu<br>
                        <input type="text" name="newPhoneNumber" value="<?php
                        if(isset($_SESSION['PhoneNumber'])){
                            echo $_SESSION['PhoneNumber'];
                        }?>"/>
                    </div>

                    <div class="form_element">Hasło<br>
                        <input type="password" name="newPassword" value="********"/>
                    </div>

                    <?php
                    if(isset($_SESSION['error_password'])){
                        echo $_SESSION['error_password'];
                        unset($_SESSION['error_password']);
                    }
                    ?>

                    <div>
                        <div><input style="float:left;" type="submit" value="Zapisz zmiany"/></div>
                        <a style="float:left;" href="main_patient.php"><div id="back">Anuluj</div></a>
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
 
