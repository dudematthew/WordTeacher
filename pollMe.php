<?php if (session_id() == "") session_start();

    $title = "Przepytaj mnie";
    include_once("./includes/header.php");

    // Check the error from createRandomQuestionSet
    $error_message = "";
    if(($_GET["error"] ?? 0) == 1)
        $error_message = "<p class='--error_text'>Proszę podać liczbę większą od zera!</p>";
?>
<div class="--vertical_center">
    <h1>Przepytaj mnie</h1>
    <p class="--info_text">Przepytuje z losowych pytań o podanej ilości.</p>
    <?php print $error_message; ?>
    <form action="generateQuestion.php" method="get">
        <input type="text" name="question_number" placeholder="Ilość pytań...">
        <br />
        <button type="submit">Przepytaj mnie</button>
    </form>
</div>


<?php include_once("./includes/footer.php");
