<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password, "kalendarz");

    $response = [];
    if(array_key_exists('date', $_GET)){
        $date = $_GET['date'];
        session_start();
        $user =  $_SESSION['id'];
        $sql = "SELECT * FROM event WHERE data = '$date' AND (uzytkownik_id = '$user' OR uzytkownik_id_2 = '$user')";

    }
    else{
        $sql = "SELECT * FROM event";
    }
    $result = mysqli_query($conn, $sql);
    if($result){
        while($row = $result->fetch_assoc()) {
            
            array_push($response, $row);
        }
    }

    mysqli_close($conn);
    header('Content-type: application/json');
    echo json_encode($response);

?>