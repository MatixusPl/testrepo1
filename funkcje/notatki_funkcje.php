<?php

function czy_admin($conn, $user_id) {
    $stmt = $conn->prepare("SELECT administrator FROM uzytkownicy WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_row();
    $stmt->close();
    return $row && $row[0] == 1;
}

function dodaj_notatke($conn, $tytul, $tresc, $autor_id) {
    $stmt = $conn->prepare("INSERT INTO notatki (tytul, tresc, autor_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $tytul, $tresc, $autor_id);
    $ok = $stmt->execute();
    $stmt->close();
    return $ok;
}

function pobierz_wszystkie_notatki($conn) {
    $stmt = $conn->prepare("SELECT n.id, n.tytul, n.tresc, u.nazwa AS autor, n.data_utworzenia, n.data_modyfikacji FROM notatki n JOIN uzytkownicy u ON n.autor_id = u.id ORDER BY n.data_utworzenia DESC");
    $stmt->execute();
    $result = $stmt->get_result();
    $notatki = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $notatki;
}

function pobierz_notatke($conn, $id) {
    $stmt = $conn->prepare("SELECT n.id, n.tytul, n.tresc, u.nazwa AS autor, n.data_utworzenia, n.data_modyfikacji FROM notatki n JOIN uzytkownicy u ON n.autor_id = u.id WHERE n.id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $notatka = $result->fetch_assoc();
    $stmt->close();
    return $notatka;
}

function usun_notatke($conn, $id, $user_id) {
    if (!czy_admin($conn, $user_id)) {
        return false;
    }
    $stmt = $conn->prepare("DELETE FROM notatki WHERE id = ?");
    $stmt->bind_param("i", $id);
    $ok = $stmt->execute();
    $stmt->close();
    return $ok;
}
