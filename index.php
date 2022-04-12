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
            <div onclick="GuzikWydarzenie()" class="dim">Wydarzenie</div>
        </div>
        <div class="tlo"></div>

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