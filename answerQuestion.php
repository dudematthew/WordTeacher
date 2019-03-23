<?php session_start();

    $title = "Pytanie " . (($_SESSION["total_question_number"] ?? 0) - ($_SESSION["current_question_number"] ?? 0) + 1);
    include_once("./includes/header.php");

    $left_question = "";

    // 
    if ($_SESSION["current_question_type"] == "left_to_right")
        $left_question = $_SESSION["current_left_word_syntax"];

    else if ($_SESSION["current_question_type"] == "right_to_left")
        $left_question = $_SESSION["current_right_word_syntax"];

    else {
        header("location: index.php");
        die("wystąpił błąd danych");
    }
    
?>
<div class="--vertical_center">
    <h2>Pytanie nr. <?php print ($_SESSION["total_question_number"] - $_SESSION["current_question_number"] + 1) ?></h2> 
    
    <form action="./checkQuestionAnswer.php" method="get">

        <input type="text" value="<?php print $left_question ?>" disabled />
         &rarr; 
        <input type="text" id="answer" placeholder="Tłumaczenie" name="answer" autocomplete="off" />
        <br />
        <button type="submit">Odpowiedz</button>
    </form>
</div>
    
<!-- focus on answer input -->
<script> document.getElementById("answer").focus(); </script>

</body>
<?php include_once("./includes/footer.php");