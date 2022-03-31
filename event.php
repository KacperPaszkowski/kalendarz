<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, "kalendarz");


if($_POST)
{    
     $data = $_POST['data'];
     $godzina1 = $_POST['godzina1'];
     $godzina2 = $_POST['godzina2'];
     $tytul = $_POST['tytul'];
     $opis = $_POST['opis'];
     echo $data;
     $sql = "INSERT INTO event 
     VALUES ('','$data','$godzina1','$godzina2','$tytul','$opis',1)";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}




class Wydarzenie{

    public $data;
    public $godzina1;
    public $godzina2;
    public $tytul;
    public $opis;

    public function UstawDate($data){
        $this->data = $data;
    }
//=========godz_start=========
    public function UstawGodzineStart($godzina1){
        $this->godzina1 = $godzina1;
    }
    public function UstawGodzineKoniec($godzina2){
        $this->godzina2 = $godzina2;
    }
//=========godz_koniec========
    public function UstawTytul($tytul){
        $this->tytul = $tytul;
    }
    public function UstawOpis($opis){
        $this->opis = $opis;
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <label for="data">Data</label>
        <input type="date" name="data" id=""> </br></br>

        <label for="godzina1">Od godziny</label>
        <input type="time" name="godzina1" id="">
        <label for="godzina2">do godziny</label>
        <input type="time" name="godzina2" id="">

</br></br>

        <label for="tytul">Tytuł</label>
        <input type="text" name="tytul" id=""> </br></br>

        <label for="opis">Notka</label>
        <input type="text" name="opis" id=""> </br></br>
        
        <input type="submit">Wyślij</input>

    </form>  
</body>
</html> 