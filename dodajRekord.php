<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styl3.css">
    <title>Biblioteka</title>
</head>
<body>
    <?php
    $polaczenie = @mysqli_connect("localhost","root","","ogloszenia")
    or die("Błąd ".mysqli_connect_error($polaczenie));
    
    mysqli_set_charset($polaczenie,"utf8");
    
    $kategoria = $_POST['kategoria'];
    $podkategoria = $_POST['podkategoria'];
    $tytul = $_POST['tytul'];
    $tresc = $_POST['tresc'];

    
    $zapytanie = "INSERT INTO ogloszenie (`uzytkownik_id`, `kategoria`, `podkategoria`, `tytul` , `tresc`) VALUES ('1', '$kategoria', '$podkategoria', '$tytul', '$tresc')";


    $rezultat=mysqli_query($polaczenie,$zapytanie) or die("Błąd: ".mysqli_error($polaczenie));

    ?>
    <header class="banner">
            <h1>Biblioteka</h1>
        </header>
        <main>
            <section class="left_panel">
                <h2>Kategorie</h2>
                <ol>
                    <li>Książki</li>
                    <li>Muzyka</li>
                    <li>Filmy</li>
                </ol>
                <h2>Podkategorie</h2>
                <ol>
                    <li>Romans</li>
                    <li>Biografia</li>
                    <li>Kryminał</li>
                    <li>Komiks</li>
                </ol>
            </section>
            <section class="right_panel">
                <h2>Tytuły w bibliotece</h2>
                <p>
                    <?php 
                        
                        $odpowiedz = "SELECT id, tytul, tresc FROM ogloszenie";

                        $rezultaty = mysqli_query($polaczenie, $odpowiedz) 
                        or die ("Błąd " . mysqli_error($polaczenie));

                        while ($wynik = mysqli_fetch_assoc($rezultaty)) 
                        {
                            echo "<table border='1' cellspacing='1'>";
                            echo "<tr><td>ID</td><td>Tytuł</td><td>Zajawka</td></tr>";        
                            echo "<tr><td>" . $wynik['id'] . "</td><td>" . $wynik['tytul'] . "</td><td>" . $wynik['tresc'] . "</td></tr>";
                            echo "</table>";
                        }
                        mysqli_close($polaczenie);    
                    ?>                        
                </p>
                <p>
                    <a href="formularz.html">
                        Dodaj nowy tytuł
                    </a>
                </p>    
            </section>        
        </main>
        <footer>
            Portal opracował: <a href="https://werkris.pl"> werkris.pl </a>
        </footer>
</body>
</html>