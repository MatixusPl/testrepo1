<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "superstrona");
//pobieranie danych z bazy danych
$query_art = mysqli_query($conn, "SELECT nazwa, link, nazwa_pliku, akapit1 FROM artykuly");
$rn = [rand(0, mysqli_num_rows($query_art)-1), rand(0, mysqli_num_rows($query_art)-1), rand(0, mysqli_num_rows($query_art)-1), rand(0, mysqli_num_rows($query_art)-1), rand(0, mysqli_num_rows($query_art)-1)];

for ($i = 1; $i < 5; $i++) {
    $temp = $rn[$i];
    $rn[$i] = -1;
    while (in_array($temp, $rn)) {
        $temp = rand(0, mysqli_num_rows($query_art)-1);
    }
    $rn[$i] = $temp;
}
$obr = [];
$opis = [];
$link = [];

$dane = mysqli_fetch_all($query_art);
for ($i = 0; $i < 3; $i++) {
    $obr[$i] = $dane[$rn[$i]][2];
    $link[$i] = $dane[$rn[$i]][1];

    $tekst = substr($dane[$rn[$i]][3], 0, 200);
    for ($j = strlen($tekst)-1; $j >= 0; $j--) {
        if ($tekst[$j] == " ") {
            $tekst = substr($tekst, 0, $j);
            break;
        }
    }
    $opis[$i] = $tekst;
}

$tekst3 = substr($dane[$rn[3]][3], 0, 300);
for ($j = strlen($tekst3)-1; $j >= 0; $j--) {
    if ($tekst3[$j] == ".") {
        $tekst3 = substr($tekst3, 0, $j+1);
        break;
    }
}
$tekst4 = substr($dane[$rn[4]][3], 0, 300);
for ($j = strlen($tekst4)-1; $j >= 0; $j--) {
    if ($tekst4[$j] == ".") {
        $tekst4 = substr($tekst4, 0, $j+1);
        break;
    }
}


/*
$obr[$i] = $dane[2];
$link[$i] = $dane[1];

$opis[$i] = $tekst;
/*$opis = [
    "<span id='HKS' class='clicka'>Hollow Knight: Silksong</span> to oczekiwana kontynuacja gry Hollow Knight, opracowywana przez Team Cherry. Fabuła koncentruje się na postaci <span id='Hornet' class='clicka'>Hornet</span>, która wyrusza w podróż przez nieznane krainy. Gra ma oferować nowe mechaniki, wrogów oraz eksplorację bardziej rozbudowanego świata.",
    "Genshin Impact: Luna I to duża aktualizacja oznaczona numerem 6.0, wydana 10 września 2025 roku. Wprowadza nowy rozdział fabularny, którego motywem przewodnim są mroźne krainy i magiczny blask księżyca. Gracze mogą odkrywać nowe regiony, wykonywać zadania Archontów oraz poznawać historie związane z tajemniczymi zjawiskami na północy Teyvat.",
    "Pokémon Z-A to nadchodząca główna odsłona serii Pokémon, zapowiedziana jako duchowy następca Pokémon X i Y. Akcja gry rozgrywa się ponownie w regionie Kalos, jednak w zupełnie nowym ujęciu – w mieście Lumiose. "
];*/


$exstr = "";

if(!isset($_SESSION['ostatnie'])) {
    $_SESSION['ostatnie'] = ['', '', ''];
}
if(!isset($_SESSION['link'])) {
    $_SESSION['link'] = ['', '', ''];
}
if(!isset($_SESSION['logowany']) || !$_SESSION['logowany']) {
    $_SESSION['logowany'] = FALSE;
} else {
    $spr = mysqli_fetch_row(mysqli_query($conn, "SELECT id_uzytkownika, data_utw FROM sesje WHERE id=" . $_SESSION['logdata'] . ";"));
    $data1 = strtotime($spr[1]);
    $data2 = strtotime(substr(date(DATE_ATOM), 0, 10));

    $sekundy = $data2 - $data1;
    $dni = $sekundy / 86400;
    if ($dni > 1) {
        mysqli_query($conn, "DELETE FROM sesje WHERE id=" . $_SESSION['logdata'] . ";");
        $_SESSION['logowany'] = FALSE;
        $_SESSION['logdata'] = "";
        echo "<script>alert('Sesja wygasła, zaloguj się ponownie')</script>";
    } else {
        $dane_uz = mysqli_fetch_row(mysqli_query($conn, "SELECT nazwa FROM uzytkownicy WHERE id=" . $spr[0] . ";"));
    }
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAMENEWS - Strona główna</title>
    <link rel="stylesheet" href="styles.css">
    <script src="ogolne.js"></script>
    <script>
        // wkladanie danych z PHP do JS by mozna bylo zmieniac artykuly na stronie glownej
        var artMain = [<?php
            foreach($obr as $x) {
                $exstr = "\"" . $x . "\""; if ($x !== $obr[count($obr)-1]) {$exstr .= ",";}; echo $exstr; $exstr = "";
                };
        ?>];
        var linki = [<?php
            foreach($link as $x) {
                $exstr = "\"" . $x . "\""; if ($x !== $link[count($link)-1]) {$exstr .= ",";}; echo $exstr; $exstr = "";
                };
        ?>]
        var opis = [<?php
            foreach($opis as $x) {
                $exstr = "\"" . $x . "\""; if ($x !== $opis[count($opis)-1]) {$exstr .= ",";}; echo $exstr; $exstr = "";
                };
        ?>]
    </script>
    <script src="str_glowna.js"></script>
</head>
<body>
    <header>
        <img src="placeholder.png" id="logo">
        <h1 id="pn1">GAMENEWS</h1>
        <nav>
            <div id="down" class="menu-part"><p>Historia</p></div>
            <div class="menu-part" id="wyszukiwanie"><p>Wyszukaj</p></div>
            <?php if (!$_SESSION['logowany']) { echo '<div class="menu-part" id="logowanie"><p>Loguj</p></div>'; }
            else { echo '<div class="menu-part" id="konto"><p>Konto</p></div>'; }
            ?>
        </nav>
    </header>
    <main>
        <article id="przesuw">
                <section id="zdj">
                        <section id="graf1">
                            <a href="artykuly/<?php echo $link[0]; ?>" id="link"><img src="./<?php echo $obr[0]; ?>" id="o1"></a>
                        </section>
                        <section class="none"><img src="lewo.png" class="strzalka"></section>
                        <div class="przerywnik"></div>
                        <section class="none"><img src="prawo.png" class="strzalka" id="prawa"></section>
                    <section id="opis">
                        <p><?php echo $opis[0]; ?> <a href="./artykuly/<?php echo $link[0]; ?>" id="c_read">Czytaj dalej...</a></p>
                    </section>
                </section>
        </article>
        <!--<div id="pasek"></div>-->
        <article id="info-2">
            <section class="info-holder">
                <section class="graf-holder">
                    <a href="./artykuly/<?php echo $dane[$rn[3]][1]; ?>"><img src="<?php echo $dane[$rn[3]][2]; ?>" class="grafika"></a>
                </section>
                <section class="opis-holder">
                    <p><?php echo $tekst3; ?></p>
                </section>
            </section>
            <section class="info-holder">
                <section class="graf-holder">
                    <a href="./artykuly/<?php echo $dane[$rn[4]][1]; ?>"><img src="<?php echo $dane[$rn[4]][2]; ?>" class="grafika"></a>
                </section>
                <section class="opis-holder">
                    <p><?php echo $tekst4; ?></p>
                </section>
            </section>
        </article>
    </main>
    <footer id="stopka">
        Super strona GAMENEWS made by Osik
    </footer>
    
    <section class="hide" id="back">
        <?php
        $rand=rand();
        $_SESSION['rand']=$rand;
        if (!$_SESSION['logowany']) { echo '
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
            

            <h2 id="change">Zarejestruj się</h2>
        </section>';} else {
            echo '
            <section id="konto_opis">
                <h1>Twoje konto: ' . $dane_uz[0] . '</h1>
                <img src="exit.png" id="wyjdz">
                <form method="post">
                    <input type="submit" id="wyloguj" name="wyloguj" value="Wyloguj">
                </form>
            </section>
            ';
        }
        if (isset($_POST['wyloguj'])) {
            if ($_POST['wyloguj'] == "Wyloguj" && $_SESSION['logowany']) {
                mysqli_query($conn, "DELETE FROM sesje WHERE id=" . $_SESSION['logdata'] . ";");
                $_SESSION['logowany'] = FALSE;
                $_SESSION['logdata'] = "";
                echo "<script>alert('Wylogowałeś się')</script>";
                $_POST['wyloguj'] = "";
            }
        }
    ?>
    </section>
    <?php
    // PRZYKŁADOWE DANE DO LOGINU: admin haslo123
    if (isset($_POST['zaloguj']) && !$_SESSION['logowany']) {
        if ($_POST['zaloguj'] == "Zaloguj") {
            
            if ($_POST['nazwa_uz'] !== "" && $_POST['haslo'] !== "") {
                $q1 = mysqli_query($conn, "SELECT haslo, id FROM uzytkownicy WHERE nazwa='" . $_POST['nazwa_uz'] . "';");
                $ile = mysqli_num_rows($q1);
                $q1 = mysqli_fetch_row($q1);
                if ($ile > 0 && sha1($_POST['haslo']) == $q1[0]) {
                    echo "<script>alert('zalogowales sie')</script>";
                    
                    mysqli_query($conn, "INSERT INTO sesje (id_uzytkownika) VALUES (" . $q1[1] . ");");
                    $ostid = mysqli_fetch_row(mysqli_query($conn, "SELECT id from sesje WHERE id_uzytkownika=" . $q1[1] . " ORDER BY id DESC LIMIT 1 ;"));
                    $_SESSION["logdata"] = $ostid[0];
                    $_SESSION['logowany'] = TRUE;
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
            <img src="exit.png" id="wyjdz3">
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
<?php mysqli_close($conn) ?>