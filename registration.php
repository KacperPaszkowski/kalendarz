<?php
    if($_POST){
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new mysqli($servername, $username, $password, "kalendarz");

        $NazwaUzytkownika = $_POST['nazwa'];
        $login1 = $_POST['login'];
        $haslo1 = $_POST['pass'];

       $result = $conn->query("INSERT INTO `uzytkownik`
        VALUES ('','$NazwaUzytkownika','$login1','$haslo1');");

        session_start();
        $_SESSION['auth'] = true;
        $_SESSION['id'] = mysqli_insert_id($conn);

        mysqli_close($conn);

        header("Location: /kalendarz/index.php");
        die();

    }

?>