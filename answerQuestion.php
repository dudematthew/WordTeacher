<?php if (session_id() == "") session_start();


    $title_question_number = $_SESSION["title_question_number"];

    // Page title
    $title = "Pytanie " . $title_question_number;

    include_once("./includes/header.php");
    
    include_once("./includes/checkIfWordSetLoaded.php");
    

    $left_question = "";

    // Get left side of question based on 
    // current direction
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
    <h2>Pytanie nr. <?php print $title_question_number ?></h2> 
    
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
<?php include_once("./includes/footer.php"); ?>