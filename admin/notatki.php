<?php
session_start();
$conn = new mysqli("localhost", "root", "", "superstrona");

require_once "../funkcje/notatki_funkcje.php";

// Verify user is logged in and is an administrator
if (!isset($_SESSION['logowany']) || !$_SESSION['logowany']) {
    header("Location: ../index.php");
    exit;
}

// Get user ID from session data
$stmt_ses = $conn->prepare("SELECT id_uzytkownika FROM sesje WHERE id = ? LIMIT 1");
$stmt_ses->bind_param("i", $_SESSION['logdata']);
$stmt_ses->execute();
$spr = $stmt_ses->get_result()->fetch_row();
$stmt_ses->close();
$user_id = $spr ? intval($spr[0]) : 0;

if (!czy_admin($conn, $user_id)) {
    header("Location: ../index.php");
    exit;
}

$blad = "";
$sukces = "";

// Handle add note
if (isset($_POST['dodaj_notatke'])) {
    $tytul = trim($_POST['tytul'] ?? '');
    $tresc = trim($_POST['tresc'] ?? '');
    if ($tytul !== "" && $tresc !== "") {
        if (dodaj_notatke($conn, $tytul, $tresc, $user_id)) {
            $sukces = "Notatka została dodana.";
        } else {
            $blad = "Nie udało się dodać notatki.";
        }
    } else {
        $blad = "Wypełnij wszystkie pola.";
    }
}

// Handle delete note
if (isset($_POST['usun_notatke'])) {
    $id_notatki = intval($_POST['id_notatki'] ?? 0);
    if ($id_notatki > 0) {
        if (usun_notatke($conn, $id_notatki, $user_id)) {
            $sukces = "Notatka została usunięta.";
        } else {
            $blad = "Nie udało się usunąć notatki.";
        }
    }
}

$notatki = pobierz_wszystkie_notatki($conn);

$stmt_uz = $conn->prepare("SELECT nazwa FROM uzytkownicy WHERE id = ? LIMIT 1");
$stmt_uz->bind_param("i", $user_id);
$stmt_uz->execute();
$dane_uz = $stmt_uz->get_result()->fetch_row();
$stmt_uz->close();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admina - Notatki</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        body { font-family: sans-serif; background: #1a1a2e; color: #eee; }
        h1 { color: #e94560; text-align: center; margin-top: 30px; }
        h2 { color: #e94560; }
        .container { max-width: 900px; margin: 30px auto; padding: 20px; background: #16213e; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px 14px; border: 1px solid #0f3460; text-align: left; }
        th { background: #0f3460; color: #e94560; }
        tr:nth-child(even) { background: #1a1a2e; }
        form.dodaj { margin-top: 30px; }
        label { display: block; margin-top: 10px; margin-bottom: 4px; }
        input[type="text"], textarea { width: 100%; padding: 8px; background: #0f3460; color: #eee; border: 1px solid #e94560; border-radius: 4px; box-sizing: border-box; }
        textarea { height: 100px; resize: vertical; }
        input[type="submit"], button { padding: 8px 18px; background: #e94560; color: #fff; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px; }
        input[type="submit"]:hover, button:hover { background: #c73652; }
        .msg-ok { color: #4caf50; margin: 10px 0; }
        .msg-err { color: #e94560; margin: 10px 0; }
        .back-link { display: inline-block; margin-bottom: 20px; color: #e94560; text-decoration: none; }
        .back-link:hover { text-decoration: underline; }
        td form { display: inline; }
    </style>
</head>
<body>
    <div class="container">
        <a href="../index.php" class="back-link">&larr; Wróć na stronę główną</a>
        <h1>Panel Admina &ndash; Notatki</h1>
        <p>Zalogowany jako: <strong><?php echo htmlspecialchars($dane_uz[0]); ?></strong></p>

        <?php if ($sukces): ?>
            <p class="msg-ok"><?php echo htmlspecialchars($sukces); ?></p>
        <?php endif; ?>
        <?php if ($blad): ?>
            <p class="msg-err"><?php echo htmlspecialchars($blad); ?></p>
        <?php endif; ?>

        <h2>Dodaj nową notatkę</h2>
        <form method="post" class="dodaj">
            <label for="tytul">Tytuł:</label>
            <input type="text" id="tytul" name="tytul" maxlength="255" required>

            <label for="tresc">Treść:</label>
            <textarea id="tresc" name="tresc" required></textarea>

            <input type="submit" name="dodaj_notatke" value="Dodaj notatkę">
        </form>

        <h2>Wszystkie notatki</h2>
        <?php if (empty($notatki)): ?>
            <p>Brak notatek.</p>
        <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tytuł</th>
                    <th>Treść</th>
                    <th>Autor</th>
                    <th>Data utworzenia</th>
                    <th>Data modyfikacji</th>
                    <th>Akcja</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notatki as $n): ?>
                <tr>
                    <td><?php echo htmlspecialchars($n['id']); ?></td>
                    <td><?php echo htmlspecialchars($n['tytul']); ?></td>
                    <td><?php echo htmlspecialchars($n['tresc']); ?></td>
                    <td><?php echo htmlspecialchars($n['autor']); ?></td>
                    <td><?php echo htmlspecialchars($n['data_utworzenia']); ?></td>
                    <td><?php echo htmlspecialchars($n['data_modyfikacji']); ?></td>
                    <td>
                        <form method="post" onsubmit="return confirm('Czy na pewno chcesz usunąć tę notatkę?');">
                            <input type="hidden" name="id_notatki" value="<?php echo intval($n['id']); ?>">
                            <input type="submit" name="usun_notatke" value="Usuń">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</body>
</html>
<?php $conn->close(); ?>
