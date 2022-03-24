<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, "kalendarz");

$sql = "INSERT INTO kalendarz (, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
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
    <form>
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

        
    </form>  
</body>
</html> 