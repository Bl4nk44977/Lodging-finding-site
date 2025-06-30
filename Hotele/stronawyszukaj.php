<?php 
$polaczenie = new mysqli('localhost','root','','hotele');

if ($polaczenie->connect_errno) {
    echo "Error: nie udało się połączyć z bazą danych, odśwież stronę lub jeśli to nie działa to skontaktuj się z administratorem strony " . $polaczenie->connect_error;
    exit();
}

$polaczenie->set_charset("utf8mb4");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Wyszukaj Ośrodek</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/2417407fb2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylewyszukaj.css" />
</head>
<body>
    <div class="gora">
        <p>Filtry:</p> 
        <a href="index.php"><i class="fa-solid fa-house"></i> Strona Główna</a>
        <form method="GET" action="">
            <label for="miasto">Miasto:</label>
            <input type="text" id="miasto" name="miasto" value="<?php echo htmlspecialchars($_GET['miasto'] ?? '') ?>" />

            <label for="typ">Typ noclegu:</label>
            <select id="typ" name="typ">
                <option value="">-- Wszystkie --</option>
                <option value="Hotel" <?php if(($_GET['typ'] ?? '') == 'Hotel') echo 'selected'; ?>>Hotel</option>
                <option value="Apartament" <?php if(($_GET['typ'] ?? '') == 'Apartament') echo 'selected'; ?>>Apartament</option>
                <option value="Pensjonat" <?php if(($_GET['typ'] ?? '') == 'Pensjonat') echo 'selected'; ?>>Pensjonat</option>
                <option value="Miejsce Noclegowe" <?php if(($_GET['typ'] ?? '') == 'Miejsce Noclegowe') echo 'selected'; ?>>Miejsce Noclegowe</option>
            </select>

            <label for="ladowarka">Ładowarka samochodowa:</label>
            <select id="ladowarka" name="ladowarka">
                <option value="">-- Brak wyboru --</option>
                <option value="Tak" <?php if(($_GET['ladowarka'] ?? '') === 'Tak') echo 'selected'; ?>>Tak</option>
                <option value="Nie" <?php if(($_GET['ladowarka'] ?? '') === 'Nie') echo 'selected'; ?>>Nie</option>
            </select>

            <label for="odl_auschwitz">Maks. odległość od Auschwitz (km):</label>
            <input type="number" step="0.1" name="odl_auschwitz" value="<?php echo htmlspecialchars($_GET['odl_auschwitz'] ?? '') ?>" />

            <label for="odl_energylandia">Maks. odległość od Energylandii (km):</label>
            <input type="number" step="0.1" name="odl_energylandia" value="<?php echo htmlspecialchars($_GET['odl_energylandia'] ?? '') ?>" />

            <label for="odl_krakow">Maks. odległość od Krakowa (km):</label>
            <input type="number" step="0.1" name="odl_krakow" value="<?php echo htmlspecialchars($_GET['odl_krakow'] ?? '') ?>" />

            <label for="odl_jp">Maks. odległość od Muzeum JP II (km):</label>
            <input type="number" step="0.1" name="odl_jp" value="<?php echo htmlspecialchars($_GET['odl_jp'] ?? '') ?>" />

            <button type="submit">Szukaj</button>
        </form>
    </div>

    <div class="glowny">
        <table>
            <tr>
                <td>Nazwa</td>
                <td>Adres</td>
                <td>Rodzaje Noclegu</td>
                <td>Telefon</td>
                <td>E-Mail</td>
                <td>Dodatkowe informacje</td>
            </tr>
            <?php
                $warunki = [];

                if (!empty($_GET['miasto'])) {
                    $miasto = $polaczenie->real_escape_string($_GET['miasto']);
                    $warunki[] = "Miasto LIKE '%$miasto%'";
                }

                if (!empty($_GET['typ'])) {
                    $typ = $polaczenie->real_escape_string($_GET['typ']);
                    $warunki[] = "(Typ_Noclegu = '$typ' OR Typ_Noclegu_d LIKE '%$typ%')";
                }

                if (isset($_GET['ladowarka'])) {
                    if ($_GET['ladowarka'] === 'Tak' || $_GET['ladowarka'] === 'Nie') {
                        $ladowarka = $polaczenie->real_escape_string($_GET['ladowarka']);
                        $warunki[] = "Ladowarka_S = '$ladowarka'";
                    }
                }

                if (!empty($_GET['odl_auschwitz'])) {
                    $odl = floatval($_GET['odl_auschwitz']);
                    $warunki[] = "O_M_Auschwitz <= $odl";
                }

                if (!empty($_GET['odl_energylandia'])) {
                    $odl = floatval($_GET['odl_energylandia']);
                    $warunki[] = "O_Energylandia <= $odl";
                }

                if (!empty($_GET['odl_krakow'])) {
                    $odl = floatval($_GET['odl_krakow']);
                    $warunki[] = "O_Krakow <= $odl";
                }

                if (!empty($_GET['odl_jp'])) {
                    $odl = floatval($_GET['odl_jp']);
                    $warunki[] = "O_M_JP <= $odl";
                }

                $whereSQL = "";
                if (!empty($warunki)) {
                    $whereSQL = "WHERE " . implode(" AND ", $warunki);
                }

                $zapytanie = $polaczenie->query("
                    SELECT `Miasto`, `Nazwa`, `Kod_pocztowy`, `Ulica`, `Typ_Noclegu`,
                           `Typ_Noclegu_d`, `Telefon`, `Mail`, `Ladowarka_S`, `Info`,
                           `O_M_Auschwitz`, `O_Energylandia`, `O_Krakow`, `O_M_JP`, `Link`
                    FROM `noclegi`
                    $whereSQL
                ");

                if ($zapytanie) {
                    while ($rekord = $zapytanie->fetch_assoc()) {
                        echo "<tr>
                            <td><i class='fa-solid fa-arrow-right'></i> <a href='{$rekord['Link']}' target='_blank'>{$rekord['Miasto']}</a></td>
                            <td>{$rekord['Nazwa']} {$rekord['Kod_pocztowy']} {$rekord['Ulica']}</td>
                            <td>{$rekord['Typ_Noclegu']} {$rekord['Typ_Noclegu_d']}</td>
                            <td>{$rekord['Telefon']}</td>
                            <td>{$rekord['Mail']}</td>
                            <td>{$rekord['Info']}. {$rekord['O_M_Auschwitz']}km od Auschwitz, {$rekord['O_Energylandia']}km od Energylandii, {$rekord['O_Krakow']}km od Krakowa, {$rekord['O_M_JP']}km od Muzeum Jana Pawła II</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Brak wyników do wyświetlenia.</td></tr>";
                }

                $polaczenie->close();
            ?>
        </table>
    </div>
</body>
</html>
