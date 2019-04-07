<?php if (session_id() == "") session_start();

    $title = "Przepytaj mnie";
    include_once("./includes/header.php");

    $global_words_amount = $_SESSION["words_amount"] ?? null;

    // Check the error from createRandomQuestionSet
    $error_message = "";
    if(($_GET["error"] ?? 0) == 1)
        $error_message = "<p class='--error_text'>Proszę podać liczbę większą od zera!</p>";
    if(($_GET["error"] ?? 0) == 2)
        $error_message = "<p class='--error_text'>Nie można przepytać z większej ilości pytań, niż jest dostępna! (Dostępna ilość pytań: " . $global_words_amount . ")</p>";
?>
<div class="--vertical_center">
    <div class="popover__wrapper">
        <a href="#">
            <h1>Przepytaj mnie</h1>
        </a>
        <div class="popover__content">
            Przepytuje z losowych pytań o podanej ilości.
        </div>
    </div>
    <?php print $error_message; ?>

    <form action="createRandomQuestionSet.php" method="get">
        <input type="text" name="questions_amount" placeholder="Podaj liczbę pytań...">
        <br />
        <input type="hidden" name="operation_type" value="poll" />
        <button type="submit">Przepytaj mnie</button>
    </form>
</div>


<?php include_once("./includes/footer.php");
