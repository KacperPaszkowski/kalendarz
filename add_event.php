<?php
    if($_POST){
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new mysqli($servername, $username, $password, "kalendarz");

        $data = $_POST['data'];
        $godzina1 = $_POST['godzina1'];
        $godzina2 = $_POST['godzina2'];
        $tytul = $_POST['tytul'];
        $opis = $_POST['opis'];

        if($_POST['user']){
            $user_id = $_POST['user'];
        }
        else{
            $user_id = 1;
        }

        $sql = "INSERT INTO event 
        VALUES ('','$data','$godzina1','$godzina2','$tytul','$opis',$user_id)";
        
        if (mysqli_query($conn, $sql)) {
            $response = [ 'status' => 1];
        } else {
            $response = [ 'status' => 0];
        }
        mysqli_close($conn);
        header('Content-type: application/json');
        echo json_encode($response);

    }

?>