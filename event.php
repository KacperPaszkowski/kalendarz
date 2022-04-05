<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="add_event.php">
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
        
        <input type="submit" value="Dodaj"></input>

        </br></br>
        </br></br>

    </form> 

    <form method="POST" action="registration.php">
        
    <label for="Nazwa">Nazwa Użytkownika</label>
        <input type="text" name="nazwa" id=""> </br></br>

        <label for="login1">Login</label>
        <input type="text" name="login1" id=""> </br></br>

        <label for="haslo1">Hasło</label>
        <input type="password" name="haslo1" id=""> </br></br>
        
        <input type="submit" value="Zarejestruj się"></input>

    </form>
</body>
</html> 