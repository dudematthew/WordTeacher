<?php session_start();

    $title = "Przepytaj mnie";
    include_once("./includes/header.php");

    // Make new session of question sets and
    // shuffle it
    $_SESSION["shuffled_words"] = $_SESSION["words"];
    shuffle($_SESSION["shuffled_words"]);

    // User is updating the file - reset
    // pending question
    // (can't check the question without
    // pending variable)
    $_SESSION["is_pending_question"] = false;
    $_SESSION["correct_answers"] = 0;
    $_SESSION["uncorrect_answers"] = 0;

    // Check the error from generateQuestion
    $error_message = "";
    if(($_GET["error"] ?? 0) == 1)
        $error_message = "<p class='--error_text'>Proszę podać liczbę większą od zera!</p>";
?>
<div class="--vertical_center">
    <?php print $error_message; ?>
    <form action="generateQuestion.php" method="get">
        <input type="text" name="question_number" placeholder="Ilość pytań...">
        <br />
        <button type="submit">Odpytaj mnie</button>
    </form>
</div>


<?php include_once("./includes/footer.php");
