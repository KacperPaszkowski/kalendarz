<header>
    <link rel="stylesheet" href="static/login.css">
</header>
<div class="login-c">
    <div class="login">
        <form action="registration.php" method="POST">
        <div class="login-i">
            Nazwa: <input type="text" name="nazwa" id="login" required><br>
        </div>
        <div class="login-i">
            Login: <input type="text" name="login" id="login" required><br>
        </div>
        <div class="login-i">
            Hasło: <input type="password" name="pass" id="pass" required><br>
        </div>
        <div class="login-i">
            Powtórz hasło: <input onchange="checkpassword()" type="password" id="_pass" required><br>
        </div>
        <p id="invpass" style="color: red;"></p>
        <div class="login-i">
            <button type="submit" id="submit">Zarejestruj</button>
        </div>
        </form>
    </div>
</div>

<script>
    const checkpassword = () => {
        var pass1 = document.getElementById('pass').value;
        var pass2 = document.getElementById('_pass').value;
        if(pass1 !== pass2){
            document.getElementById('invpass').innerHTML = "Hasła muszą być takie same."
            document.getElementById('submit').disabled = true
        }
        else{
            document.getElementById('invpass').innerHTML = ""
            document.getElementById('submit').disabled = false
        }
    }
</script>