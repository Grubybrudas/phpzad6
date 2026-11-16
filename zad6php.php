<?php
require_once 'funkcjezad6.php';


if (isset($_POST['tekst'])) {
    echo htmlspecialchars(szyfruj($_POST['tekst']));
    exit;
}

$z = $_POST['zad'] ?? '';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>PHP #6 – Funkcje</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            max-width: 750px;
            margin: 30px auto;
            padding: 0 15px;
            line-height: 1.6;
        }
        h1 {
            text-align: center;
            color: #4dabf7;
            letter-spacing: 1px;
            margin-bottom: 30px;
            text-transform: uppercase;
        }
        section {
            background-color: #1e1e1e;
            border: 1px solid #333;
            border-left: 5px solid #4dabf7;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        h2 {
            margin-top: 0;
            font-size: 1.1rem;
            color: #90caf9;
            border-bottom: 1px solid #2c2c2c;
            padding-bottom: 8px;
            margin-bottom: 15px;
        }
        input[type="number"],
        input[type="text"],
        input[type="date"],
        select {
            background-color: #2c2c2c;
            color: #ffffff;
            border: 1px solid #444;
            border-radius: 5px;
            padding: 8px 12px;
            margin: 5px 5px 5px 0;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.2s;
        }
        input:focus, select:focus {
            border-color: #4dabf7;
        }
        input[type="submit"] {
            background-color: #4dabf7;
            color: #121212;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            padding: 8px 18px;
            cursor: pointer;
            font-size: 0.95rem;
            transition: background-color 0.2s, transform 0.1s;
        }
        input[type="submit"]:hover {
            background-color: #74c0fc;
        }
        input[type="submit"]:active {
            transform: scale(0.98);
        }
        #szyfr-wynik {
            display: inline-block;
            margin-left: 10px;
            font-weight: bold;
            color: #69db7c;
            font-family: monospace;
            font-size: 1.1rem;
        }
    </style>
    <script>
        function szyfrowanie() {
            var dane = new FormData();
            dane.append('tekst', document.getElementById('tekst').value);
            fetch(location.pathname, { method: 'POST', body: dane })
                .then(function (r) { return r.text(); })
                .then(function (t) { document.getElementById('szyfr-wynik').innerHTML = t; });
        }
    </script>
</head>
<body>
    <h1>PHP #6 – Funkcje</h1>

    <section id="zad1">
        <h2>1. SUMA</h2>
        <form method="post" action="#zad1">
            <input type="hidden" name="zad" value="1">
            <input type="number" name="a" required> +
            <input type="number" name="b" required>
            <input type="submit" value="Oblicz">
        </form>
        <?php if ($z === '1' && isset($_POST['a'], $_POST['b'])) { suma((int)$_POST['a'], (int)$_POST['b']); } ?>
    </section>

    <section id="zad2">
        <h2>2. PODSTAWY</h2>
        <form method="post" action="#zad2">
            <input type="hidden" name="zad" value="2">
            <input type="number" step="any" name="a" required>
            <input type="number" step="any" name="b" required>
            <input type="submit" value="Oblicz">
        </form>
        <?php if ($z === '2' && isset($_POST['a'], $_POST['b'])) { podstawy((float)$_POST['a'], (float)$_POST['b']); } ?>
    </section>

    <section id="zad3">
        <h2>3. KALKULATOR</h2>
        <form method="post" action="#zad3">
            <input type="hidden" name="zad" value="3">
            <input type="number" step="any" name="a" required>
            <select name="dzialanie">
                <option value="suma">suma</option>
                <option value="roznica">różnica</option>
                <option value="iloczyn">iloczyn</option>
                <option value="iloraz">iloraz</option>
            </select>
            <input type="number" step="any" name="b" required>
            <input type="submit" value="Oblicz">
        </form>
        <?php if ($z === '3' && isset($_POST['a'], $_POST['b'], $_POST['dzialanie'])) { kalkulator((float)$_POST['a'], (float)$_POST['b'], $_POST['dzialanie']); } ?>
    </section>

    <section id="zad4">
        <h2>4. MAKS</h2>
        <form method="post" action="#zad4">
            <input type="hidden" name="zad" value="4">
            <input type="number" step="any" name="a" required>
            <input type="number" step="any" name="b" required>
            <input type="number" step="any" name="c" required>
            <input type="submit" value="Sprawdź">
        </form>
        <?php if ($z === '4' && isset($_POST['a'], $_POST['b'], $_POST['c'])) { maks((float)$_POST['a'], (float)$_POST['b'], (float)$_POST['c']); } ?>
    </section>

    <section id="zad5">
        <h2>5. WZROST</h2>
        <form method="post" action="#zad5">
            <input type="hidden" name="zad" value="5">
            Wzrost (cm): <input type="number" name="wzrost" required>
            <input type="submit" value="Sprawdź">
        </form>
        <?php if ($z === '5' && isset($_POST['wzrost'])) { wzrost((int)$_POST['wzrost']); } ?>
    </section>

    <section id="zad6">
        <h2>6. BMI</h2>
        <form method="post" action="#zad6">
            <input type="hidden" name="zad" value="6">
            Wzrost (cm): <input type="number" step="any" name="wzrost" min="1" required>
            Waga (kg): <input type="number" step="any" name="waga" min="1" required>
            <input type="submit" value="Oblicz">
        </form>
        <?php if ($z === '6' && isset($_POST['wzrost'], $_POST['waga'])) { bmi((float)$_POST['wzrost'], (float)$_POST['waga']); } ?>
    </section>

    <section id="zad7">
        <h2>7. STARSZY</h2>
        <form method="post" action="#zad7">
            <input type="hidden" name="zad" value="7">
            Osoba 1: <input type="date" name="data1" required>
            Osoba 2: <input type="date" name="data2" required>
            <input type="submit" value="Sprawdź">
        </form>
        <?php if ($z === '7' && !empty($_POST['data1']) && !empty($_POST['data2'])) { starszy($_POST['data1'], $_POST['data2']); } ?>
    </section>

    <section id="zad8">
        <h2>8. PRZESTĘPNY</h2>
        <form method="post" action="#zad8">
            <input type="hidden" name="zad" value="8">
            Rok: <input type="number" name="rok" required>
            <input type="submit" value="Sprawdź">
        </form>
        <?php if ($z === '8' && isset($_POST['rok'])) { przestepny((int)$_POST['rok']); } ?>
    </section>

    <section id="zad9">
        <h2>9. SIŁA</h2>
        <form method="post" action="#zad9">
            <input type="hidden" name="zad" value="9">
            Hasło: <input type="text" name="haslo" required>
            <input type="submit" value="Sprawdź">
        </form>
        <?php if ($z === '9' && isset($_POST['haslo'])) { sila($_POST['haslo']); } ?>
    </section>

    <section id="zad10">
        <h2>10. TRÓJKĄT</h2>
        <form method="post" action="#zad10">
            <input type="hidden" name="zad" value="10">
            <input type="number" name="a" required>
            <input type="number" name="b" required>
            <input type="number" name="c" required>
            <input type="submit" value="Sprawdź">
        </form>
        <?php if ($z === '10' && isset($_POST['a'], $_POST['b'], $_POST['c'])) { trojkat((int)$_POST['a'], (int)$_POST['b'], (int)$_POST['c']); } ?>
    </section>

    <section id="zad11">
        <h2>11. SZYFR</h2>
        <input type="text" id="tekst" onkeyup="szyfrowanie()" autocomplete="off">
        <span id="szyfr-wynik"></span>
    </section>
</body>
</html>
