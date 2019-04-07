<?php 
    $title = "Jak układać plik ze słówkami"; include_once("./includes/header.php"); 
?>
<div class="--horizontal_center">
    <h1>Intrukcja budowy składni</h1>
    <br>
    <h2>Jak układać słówka, żeby aplikacja zrozumiała</h2>
    <br>
    <h3>
        W sekcji <a href="./addFileToLoad.php" class="--text_link">Załaduj nowy plik</a> możesz przesłać plik zawierający słówka do nauczenia, lub po prostu wpisać je w okienko. W obu przypadkach tekst musi być odpowiednio sformatowany. Jest to stosunkowo proste do osiągnięcia:
    </h3>
    <br>
    <img src="./img/sample_text_no_slash.png" alt="Przykładowe słówka" />
    <br>
    <h3>
        Jak widać po jednej stronie myślnika wpisujemy znaczenie w jednym języku, a po drugiej jego definicję w drugim. Aplikacja będzie układać kolejność losowo więc nie ma znaczenia, po której stronie znajduje się dany język. 
        <br>
        Czasem jednak może się zdarzyć, że dane słowo ma dwa lub więcej znaczeń, które również musimy poznać. W takim wypadku znaczenia te oddzielamy ukośnikiem: 
    </h3>
    <br>
    <img src="./img/sample_text_slash.png" alt="Przykładowe słówka" />
    <br>
    <h3>
        Ukośniki mogą się znajdować po obu stronach. Podczas odpowiadania można wpisać tylko jedno z dostępnych znaczeń w dowolnym wyborze, a aplikacja zinterpretuje odpowiedź jako poprawną.
        <br>
        Spróbuj teraz <a href="./addFileToLoad.php" class="--text_link">Załadować nowy plik</a>. Miłej nauki.
    </h3>
    <br><br><br><br>
</div>


<?php include_once("./includes/footer.php"); ?>