<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
</head>


<body>
<?php include_once "nav.php";

?>
<br><h1 align="center">REGISTRATION</h1><br><br>

<?php

?>
<form action="" method="post">
    <h2 align="center"><label>Name:</label>
    <input type="text" name="ime"  required="required" placeholder="Name"/></h2><br />
    <h2 align="center"><label>Surname:</label>
        <input type="text" name="prezime"  required="required" placeholder="Surname"/></h2><br />
    <h2 align="center"><label>Mail:</label>
    <input type="text" name="Kor_Ime"  required="required" placeholder="Mail"/></h2><br />
    <h2 align="center"><label>Password:</label>
    <input type="password" name="lozinka"  required="required" placeholder="Password"/></h2><br />
    <h2 align="center"><label>Confirm password:</label>
    <input type="password" name="potvrda_lozinke"  required="required" placeholder="Confirm password"/></h2><br />
   <h2 align="center"> <input type="submit" value="Register" name="Registruj se"/></h2><br />
</form>
<hr></hr>
<form action="LogIn.php" method="POST">
    <label>If you are already register, click to log in!</label>
    <input type = "submit" value="Log in" name="Klikni"/><br>

</form>
</body>
<?php

if(isset($_POST["Registruj_se"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";


    try {
        $conn = new PDO("mysql:host={$servername};dbname=registracija", 'root', '');

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        if (($_POST['lozinka'] === $_POST['potvrda_lozinke']) && $_POST['Kor_Ime'] !== "" && $_POST['lozinka'] !== "") {

            $conn->exec("INSERT INTO logovanje(name, surname, mail, password) VALUES ('{$_POST['ime']}','{$_POST['prezime']}','{$_POST['Kor_Ime']}', '{$_POST['lozinka']}')");
            echo "<meta http-equiv='refresh' content='0'>";
            $poruka= "Your registration was successful!";

        } else {
            echo "REGISTRATION WAS UNSUCCESSFUL! Please try again!";
        }

        $conn = null;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
     die();

}

        ?>


<hr>

</body>

</html>