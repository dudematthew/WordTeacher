<?php session_start();

    include_once("./includes/header.php");

    $answer = (isset($_GET["answer"])) ? trim($_GET["answer"]) : null;

    $is_pending = isset($_SESSION["is_pending_question"]) ? $_SESSION["is_pending_question"] : false;
    if ($is_pending == false) {
        header("location: ./generateQuestion.php");
        die("Nie ma oczekującego zapytania");
    }


    if (is_null($answer)
        ||
            !isset($_SESSION["correct_answers"])
        ||
            !isset($_SESSION["uncorrect_answers"])
        ||
            !isset($_SESSION["is_current_question_type_set"])
        ) {
        header("location: index.php");
        die("wystąpił błąd danych");
    }

    if ($_SESSION["current_question_type"] == "left_to_right") {
        $current_answer = $_SESSION["current_right_word_syntax"];
    }
    else if ($_SESSION["current_question_type"] == "right_to_left") {
        $current_answer = $_SESSION["current_left_word_syntax"];
    }
    else {
        header("location: index.php");
        die("wystąpił błąd danych");
    }

    $current_answer_madman = explode("/", $current_answer);

    $is_proper_answer = false;
    foreach ($current_answer_madman as $key => $proper_answer) {
        if (trim($answer) == trim($proper_answer))
            $is_proper_answer = true;
    }
    $monit = "";
    if ($is_proper_answer) {
        $monit = "odpowiedź poprawna!";
        $_SESSION["correct_answers"] += 1;
        $block_class = "answer_block--good";
    }
    else {
        $monit = "<h1>Odpowiedź niepoprawna!</h1> <br /> <h2>poprawna odpowiedź:</h2> <div class='proper_answer'>"
            .$proper_answer
            ."</div>twoja odpowiedź: "
            .(($answer == "") ? "brak" : $answer);
            
        $_SESSION["uncorrect_answers"] += 1;
        $block_class = "answer_block--wrong";
    }

    $_SESSION["current_question_number"]  -= 1;
    $_SESSION["is_current_question_type_set"] = false;
    $_SESSION["is_pending_question"] = false;
?>
<div class="--vertical_center">
    <div class="answer_block <?php print $block_class ?>">
        <?php print $monit ?>
    </div>

    <a href="./generateQuestion.php"><button>Dalej</button></a>

</div>


<?php include_once("./includes/footer.php"); ?>

