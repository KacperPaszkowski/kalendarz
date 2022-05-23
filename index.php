<?php
    session_start();
    if(!key_exists('auth', $_SESSION)){
        header("Location: /kalendarz/login.php");
        die();
    }
    $conn = new mysqli("localhost", "root", "", "kalendarz");

    $pobierz = "SELECT nazwa, id FROM uzytkownik ";
    $result = $conn->query($pobierz);

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
            <form method="POST" action="add_event.php" name="event-add" id="event-add">
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
                <select name="user">
                    <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=" . $row["id"] . ">" . $row["nazwa"] . "</option>";
                    }
                } 
                ?>
                </select>

                <input type="hidden" name="user2" value="<?php echo $_SESSION['id'] ?>">

                </br></br>
                </br></br>
                <div onclick="GuzikWydarzenie()" class="close-event"><h4>Zamknij</h4></div>
                <div class="add-event" onclick="document.forms['event-add'].submit();"><h4>Zapisz</h4></div>
                </form>
            </div>
        </div>
        

        <div class="c-event" id="event-prefab" onclick="console.log('dssa')">
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
