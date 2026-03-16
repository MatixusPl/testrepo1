<?php
$conn = mysqli_connect("localhost", "root", "", "superstrona");
session_start();
if(!isset($_SESSION['ostatnie'])) {
    $_SESSION['ostatnie'] = ['', '', ''];
}
if(!isset($_SESSION['link'])) {
    $_SESSION['link'] = ['', '', ''];
}

if($_SESSION['ostatnie'][0] !== "Kontynuacja Supralandu" && $_SESSION['ostatnie'][1] !== "Kontynuacja Supralandu" && $_SESSION['ostatnie'][2] !== "Kontynuacja Supralandu") {
    $_SESSION['ostatnie'][2] = $_SESSION['ostatnie'][1];
    $_SESSION['link'][2] = $_SESSION['link'][1];
    
    $_SESSION['ostatnie'][1] = $_SESSION['ostatnie'][0];
    $_SESSION['link'][1] = $_SESSION['link'][0];
    
    $_SESSION['ostatnie'][0] = "Kontynuacja Supralandu";
    $_SESSION['link'][0] = "supraworld.php";
}

$info1 = mysqli_fetch_row(mysqli_query($conn, "SELECT nazwa, link, nazwa_pliku, il_akapitow, akapit1, akapit2, akapit3, akapit4, akapit5 FROM artykuly WHERE id=2;"));

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $info1[0]; ?></title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="styles2.css">
    <script src="../ogolne.js"></script>
</head>
<body>
    <header>
        <a href="../index.php"><img src="../placeholder.png" id="logo"></a>
        <a href="../index.php"><h1 id="pn1">GAMENEWS</h1></a>
        <nav>
            <div id="down" class="menu-part"><p>Historia</p></div>
            <div class="menu-part" id="wyszukiwanie"><p>Wyszukaj</p></div>
            <div class="menu-part" id="logowanie"><p>Loguj</p></div>
        </nav>
    </header>
    <main >
        <section id="backing" style="background-image: url('../<?php echo $info1[2]; ?>');">
        <section id="insides">
            <h1><?php echo $info1[0]; ?></h1>
            <?php
            for ($i = 1; $i <= intval($info1[3]); $i++) {
                echo "<p>" . $info1[3+$i] . "</p>";
            }
            ?>
        </section>
    </main>
    <footer id="stopka">
        Super strona GAMENEWS made by Osik
    </footer>
    <section class="hide" id="back">
        <section id="loguj">
            <h1 id="nagl_log">Zaloguj się</h1>
            <img src="exit.png" id="wyjdz">
            <form method="post">
                <label for="nazwa_uz">Nazwa użytkownika:</label><br>
                <input type="text" id="nazwa_uz" name="nazwa_uz"><br><br>
                
                <label for="haslo">Hasło:</label><br>
                <input type="password" id="haslo" name="haslo"><br><br>
                
                <label for="phaslo" class="hide2" id="phaslolab">Powtórz hasło:</label><br>
                <input type="password" id="phaslo" name="phaslo" class="hide2"><br><br>

                <label for="mail" class="hide2" id="maillab">E-mail:</label><br>
                <input type="email" id="mail" name="mail" class="hide2"><br><br>

                <input type="submit" id="zaloguj" name="zaloguj" value="Zaloguj"><br><br>
            </form>
            <?php
            // PRZYKŁADOWE DANE DO LOGINU: admin haslo123
            if (isset($_POST['zaloguj'])) {
                if ($_POST['zaloguj'] == "Zaloguj") {
                    
                    if ($_POST['nazwa_uz'] !== "" && $_POST['haslo'] !== "") {
                        $q1 = mysqli_query($conn, "SELECT haslo FROM uzytkownicy WHERE nazwa='" . $_POST['nazwa_uz'] . "';");
                        if (mysqli_num_rows($q1) > 0 && sha1($_POST['haslo']) == mysqli_fetch_row($q1)[0]) {
                            echo "<script>alert('zalogowales sie')</script>";
                        } else {
                            echo "<script>alert('nie udalo ci sie zalogowac')</script>";
                        }
                    } else {
                        echo "<script>alert('wypelnij wszystkie pola')</script>";
                    }
                } else {
                    if ($_POST['nazwa_uz'] !== "" && $_POST['haslo'] !== "" && $_POST['phaslo'] !== "" && $_POST['mail'] !== "") {
                        $q2 = mysqli_query($conn, "SELECT nazwa FROM uzytkownicy WHERE nazwa='" . $_POST['nazwa_uz'] . "';");
                        $q3 = mysqli_query($conn, "SELECT mail FROM uzytkownicy WHERE mail='" . $_POST['mail'] . "';");
                        $bledy = [""];
                        if (strlen($_POST['nazwa_uz']) < 4) $bledy[count($bledy)] = "za krótka nazwa (minimum 4 znaki)";
                        if (mysqli_num_rows($q2) != 0) $bledy[count($bledy)] = "nazwa jest zajęta";
                        if (strlen($_POST['haslo']) < 8) $bledy[count($bledy)] = "za krótkie hasło (minimum 8 znaków)";
                        if ($_POST['haslo'] !== $_POST['phaslo']) $bledy[count($bledy)] = "hasła nie są takie same";
                        if (mysqli_num_rows($q3) != 0) $bledy[count($bledy)] = "mail jest używany przez inne konto";
                        
                        if (count($bledy)-1 != 0) {
                            echo "<script>alert('Nie udało się stworzyć konta, bo: ";
                            foreach($bledy as $bl) {
                                if ($bl != "") {
                                    echo $bl;
                                    if($bledy[count($bledy)-1] != $bl) echo ", ";
                                }
                            }
                            echo "')</script>";
                        } else {
                            echo "<script>alert('zarejestrowałeś się')</script>";
                            mysqli_query($conn, "INSERT INTO uzytkownicy (nazwa, haslo, mail) VALUES ('" . $_POST['nazwa_uz'] . "', '" . sha1($_POST['haslo']) . "', '" . $_POST['mail'] . "');");
                        }
                    } else {
                        echo "<script>alert('wypelnij wszystkie pola');</script>";
                    }
                }
            }
            ?>

            <h2 id="change">Zarejestruj się</h2>
        </section>
    </section>
    <section class="hide" id="back2">
        <section id="szukaj">
            <h1>Wyszukaj artykuł</h1>
            <img src="exit.png" id="wyjdz2">
            <input type="text" id="co_chcesz"><br><br>
            <section id="lista" class="hide3">
                <a href="" id="i1"><section class="opcja"></section></a>
                <a href="" id="i2"><section class="opcja"></section></a>
                <a href="" id="i3"><section class="opcja"></section></a>
            </section>
            <button type="button" id="przechodzenie">Przejdź</button>
        </section>
    </section>
    <section class="hide" id="back3">
        <section id="przeglad">
            <h1>Ostatnio przeglądane</h1>
            <img src="../exit.png" id="wyjdz3">
            <?php
            if ($_SESSION['ostatnie'][0] == '') {
                echo "<h2>Brak histori w sesji</h2>";
            } else {
                $i = 0;
                echo "<ul id='histList'>";
                foreach($_SESSION['ostatnie'] as $name) {
                    echo "<li><a href='./artykuly/" . $_SESSION['link'][$i] . "'>" . $name . "</a></li>";
                    $i++;
                }
                echo "</ul>";
            }

            ?>
        </section>
    </section>
</body>
</html>
<?php mysqli_close($conn); ?>