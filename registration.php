<?php
    if($_POST){
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new mysqli($servername, $username, $password, "kalendarz");

        $NazwaUzytkownika = $_POST['nazwa'];
        $login1 = $_POST['login1'];
        $haslo1 = $_POST['haslo1'];
      

       $result = $conn->query("INSERT INTO `uzytkownik`
        VALUES ('','$NazwaUzytkownika','$login1','$haslo1');");
        
        
       
     
        mysqli_close($conn);
       
        

    }

?>