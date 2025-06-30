<?php
$polaczenie = new mysqli('localhost', 'root', '', 'hotele');
if ($polaczenie->connect_errno) {
    die("Błąd połączenia z bazą danych: " . $polaczenie->connect_error);
}
$polaczenie->set_charset("utf8mb4");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nazwa = trim($_POST['nazwa'] ?? '');
    $miasto = trim($_POST['miasto'] ?? '');
    $kod_pocztowy = trim($_POST['kod_pocztowy'] ?? '');
    $ulica = trim($_POST['ulica'] ?? '');
    $typ_noclegu = trim($_POST['typ_noclegu'] ?? '');
    $typ_noclegu_d = trim($_POST['typ_noclegu_d'] ?? '');
    $telefon = trim($_POST['telefon'] ?? '');
    $mail = trim($_POST['mail'] ?? '');
    $ladowarka_s = trim($_POST['ladowarka_s'] ?? 'brak informacji');
    $info = trim($_POST['info'] ?? '');
    $odl_auschwitz = floatval($_POST['odl_auschwitz'] ?? 0);
    $odl_energylandia = floatval($_POST['odl_energylandia'] ?? 0);
    $odl_krakow = floatval($_POST['odl_krakow'] ?? 0);
    $odl_jp = floatval($_POST['odl_jp'] ?? 0);
    $link = trim($_POST['link'] ?? '');
    if ($link === '') {
        $link = null;
    }

    if ($link === null) {
        $sql = "INSERT INTO noclegi (Nazwa, Miasto, Kod_pocztowy, Ulica, Typ_Noclegu, Typ_Noclegu_d, Telefon, Mail, Ladowarka_S, Info, O_M_Auschwitz, O_Energylandia, O_Krakow, O_M_JP, Link) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NULL)";
        $stmt = $polaczenie->prepare($sql);
        $stmt->bind_param("ssssssssssdddd", $nazwa, $miasto, $kod_pocztowy, $ulica, $typ_noclegu, $typ_noclegu_d, $telefon, $mail, $ladowarka_s, $info, $odl_auschwitz, $odl_energylandia, $odl_krakow, $odl_jp);
    } else {
        $sql = "INSERT INTO noclegi (Nazwa, Miasto, Kod_pocztowy, Ulica, Typ_Noclegu, Typ_Noclegu_d, Telefon, Mail, Ladowarka_S, Info, O_M_Auschwitz, O_Energylandia, O_Krakow, O_M_JP, Link) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $polaczenie->prepare($sql);
        $stmt->bind_param("ssssssssssdddds", $nazwa, $miasto, $kod_pocztowy, $ulica, $typ_noclegu, $typ_noclegu_d, $telefon, $mail, $ladowarka_s, $info, $odl_auschwitz, $odl_energylandia, $odl_krakow, $odl_jp, $link);
    }

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Dodano miejsce noclegowe pomyślnie!</p>";
    } else {
        echo "<p style='color:red;'>Błąd podczas dodawania: " . $stmt->error . "</p>";
    }
    $stmt->close();
}
$polaczenie->close();
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <title>Dodaj miejsce noclegowe</title>
    <link rel="stylesheet" href="styledodaj.css">
    <script src="https://kit.fontawesome.com/2417407fb2.js" crossorigin="anonymous"></script>

</head>
<body>
    <h1>Dodaj miejsce noclegowe</h1>
    <form method="post" action="">
        <label>Nazwa:<br><input type="text" name="nazwa" required></label><br>
        <label>Miasto:<br><input type="text" name="miasto" required></label><br>
        <label>Kod pocztowy:<br><input type="text" name="kod_pocztowy"></label><br>
        <label>Ulica:<br><input type="text" name="ulica"></label><br>
        <label>Typ noclegu:<br>
            <select name="typ_noclegu" required>
                <option value="">-- Wybierz --</option>
                <option value="Hotel">Hotel</option>
                <option value="Apartament">Apartament</option>
                <option value="Pensjonat">Pensjonat</option>
            </select>
        </label><br>
        <label>Inne typy noclegu (opisz jeśli wyżej nie ma opcji):<br><input type="text" name="typ_noclegu_d"></label><br>
        <label>Telefon:<br><input type="text" name="telefon"></label><br>
        <label>E-mail:<br><input type="email" name="mail"></label><br>

        <label>Ładowarka samochodowa:<br>
            <select name="ladowarka_s">
                <option value="brak informacji">Brak informacji</option>
                <option value="Tak">Tak</option>
                <option value="Nie">Nie</option>
            </select>
        </label><br>

        <label>Maks. odległość od Auschwitz (km):<br><input type="number" step="0.1" name="odl_auschwitz"></label><br>
        <label>Maks. odległość od Energylandii (km):<br><input type="number" step="0.1" name="odl_energylandia"></label><br>
        <label>Maks. odległość od Krakowa (km):<br><input type="number" step="0.1" name="odl_krakow"></label><br>
        <label>Maks. odległość od Muzeum JP II (km):<br><input type="number" step="0.1" name="odl_jp"></label><br>

        <label>Dodatkowe informacje o noclegu (czy ma darmowe wifi, praking, posiłki i inne udogodnienia?):<br><textarea name="info"></textarea></label><br>
        <label>Link:<br><input type="url" name="link"></label><br>

        <button type="submit">Dodaj</button>
        <a href="index.php"><i class="fa-solid fa-house"></i> Strona Główna</a>
    </form>
    
</body>
</html>
