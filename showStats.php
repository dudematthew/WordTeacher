<?php session_start();

    include_once("./includes/header.php");

    $percent_score = floor(($_SESSION["correct_answers"] * 100) / ($_SESSION["correct_answers"] + $_SESSION["uncorrect_answers"])); 

    if ($_SESSION["uncorrect_answers"] == 0 && $_SESSION["correct_answers"] == 0) {
        header("index.php");
        die("wystąpił błąd danych");
    }

    print "niepoprawnych odpowiedzi: "
    .$_SESSION["uncorrect_answers"];

    print "<br />poprawnych odpowiedzi: "
    .$_SESSION["correct_answers"];

    print "<br />wynik: "
        .$percent_score
        ."%";

?>
<br />
<a href="./menu.php">Powrót do menu</a>

<?php include_once("./includes/footer.php");