<?php session_start();

    include_once("./includes/header.php");

    $percent_score = floor(($_SESSION["correct_answers"] * 100)
        / ($_SESSION["correct_answers"]
        + $_SESSION["uncorrect_answers"])); 

    if ($_SESSION["uncorrect_answers"] == 0 && $_SESSION["correct_answers"] == 0) {
        header("index.php");
        die("wystąpił błąd danych");
    }

    print "<p>Niepoprawnych odpowiedzi: "
    .$_SESSION["uncorrect_answers"]
    ."</p>";

    print "<br /><p>poprawnych odpowiedzi: "
    .$_SESSION["correct_answers"]
    ."</p>";

    print "<br /><p>wynik: "
        .$percent_score
        ."%</p>";

?>
<br />
<a href="./menu.php">Powrót do menu</a>

<?php include_once("./includes/footer.php");