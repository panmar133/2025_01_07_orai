<?php
if (isset($_GET['select']) && !empty($_GET['select'])) {
    $url = $_GET['select'];

    // Ha relatív útvonal van megadva, akkor előtagot adhatsz hozzá
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        $url = "/" . ltrim($url, "/"); // Az URL biztosan relatív legyen
    }

    header("Location: " . $url);
    exit;
} else {
    echo "Hibás átirányítás: nincs kiválasztott oldal!";
}
?>
