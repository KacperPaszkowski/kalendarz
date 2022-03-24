<?php
    if($_POST){
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "";

        $_SESSION['auth'] = false;

        if($_POST['login'] && $_POST['pass']){
            $conn = new mysqli($servername, $username, $password, "kalendarz");
            $sql = 'SELECT haslo FROM uzytkownik WHERE login="'.$_POST['login'].'"';
            $result = $conn->query($sql);
            if ($result != false && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    
                    if($row['haslo'] == $_POST['pass']){
                        $_SESSION['auth'] = true;
                    }
                }
            }
        }
    }
?>


<header>
    <link rel="stylesheet" href="static/login.css">
</header>
<div class="login-c">
    <div class="login">
        <form action="" method="POST">
        <div class="login-i">
            Login: <input type="text" name="login" id="login" required><br>
        </div>
        <div class="login-i">
            Hasło: <input type="password" name="pass" id="pass" required><br>
        </div>
        <div class="login-i">
            <button type="submit">Zaloguj</button>
        </div>
        <div class="login-i">
            <?php if($_POST && !$_SESSION['auth']){echo("<p>Błędny login lub hasło</p>");} ?>
        </div>
        </form>
    </div>
</div>