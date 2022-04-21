<?php
    session_start();
    if(!key_exists('auth', $_SESSION)){
        header("Location: /kalendarz/login.php");
        die();
    }
?>


<html>
    <header>
        <link rel="stylesheet" href="static/index.css">
        <title><?php 
            echo $_SESSION['id']?></title>
    </header>
    <body>
        <div class="header">
            <div onclick="GuzikWydarzenie()" class="dim">Dodaj wydarzenie</div>
        </div>
        <div class="tlo" id="tlo"></div>
        <div class="tlo2" id="tlo">
            <div class="okno" id="okno">
            <form method="POST" action="add_event.php">
                <label for="data">Data</label>
                <input type="date" name="data" id="" required> </br></br>

                <label for="godzina1">Od godziny</label>
                <input type="time" name="godzina1" id="" required>
                <label for="godzina2">do godziny</label>
                <input type="time" name="godzina2" id="" required>

                </br></br>

                <label for="tytul">Tytuł</label>
                <input type="text" name="tytul" id="" required> </br></br>

                <label for="opis">Notka</label>
                <input type="text" name="opis" id=""> </br></br>

                <label for="user">Użytkownik</label>
                <input type="text" name="user" id="" required> </br></br>
                
                <input type="submit" value="Dodaj"></input>

                </br></br>
                </br></br>

            </form>
                <div onclick="GuzikWydarzenie()" class="close-event"><h4>Zamknij</h4></div>
                <div class="add-event"><h4>Zapisz</h4></div>
            </div>
        </div>
        

        <div class="c-event" id="event-prefab">
            <h4 class="e-title"></h4>
            <p class="e-info"></p>
        </div>

        <div class="main-container" id="calendar-container">
            <div class="timeline-p" id="timeline-p"></div>
            <div class="c-timeline" id="timeline">

            </div>
        <div class="calendar-entry" id="calendar-prefab">
            <div class="c-title"></div>
        </div>
        </div>
    </body>
    <script src="static/calendar.js"></script>
</html>