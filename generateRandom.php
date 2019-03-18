<?php session_start();

    include_once("./includes/header.php");

    $_SESSION["shuffled_words"] = $_SESSION["words"];
    shuffle($_SESSION["shuffled_words"]);

    $_SESSION["is_pending_question"] = false;

    if(($_GET["error"] ?? 0) == 1)
        print "Proszę podać liczbę większą od zera!";
?>
<div class="--vertical_center">
    <form action="generateQuestion.php" method="get">
        <input type="text" name="question_number" placeholder="Ilość pytań...">
        <button type="submit">Odpytaj mnie</button>
    </form>
</div>


<?php include_once("./includes/footer.php");
