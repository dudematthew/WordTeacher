<?php session_start();

    $title = "Odpowiedz na pytanie";
    include_once("./includes/header.php");
    $current_question = (($_SESSION["current_question_type"] ?? null) == "right_to_left")
        ? $_SESSION["current_right_word_syntax"] ?? null
        : $_SESSION["current_left_word_syntax"] ?? null;

    // Get the answer from answerQuestion.php
    $answer = (isset($_GET["answer"])) ? trim($_GET["answer"]) : null;

    // Check if question is pending
    $is_pending = isset($_SESSION["is_pending_question"]) ? $_SESSION["is_pending_question"] : false;
    if ($is_pending == false) {
        header("location: ./generateQuestion.php");
        die("Nie ma oczekującego zapytania");
    }

    // Check for main var setted
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

    // Check question based on language direction
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

    // Split answer madman to array
    $current_answer_madman = explode("/", $current_answer);

    // Check if user answer matches one of
    // the proper answers
    $is_proper_answer = false;
    foreach ($current_answer_madman as $key => $proper_answer) {
        if (trim($answer) == trim($proper_answer))
            $is_proper_answer = true;
    }

    // Tell user if answer is
    // proper or not
    $monit = "";
    if ($is_proper_answer) {
        $monit = "odpowiedź poprawna!";
        $_SESSION["correct_answers"] += 1;
        $block_class = "answer_block--good";
    }
    else {
        $monit = "<h2>Odpowiedź niepoprawna!</h2> <br /> <h3>Pytanie: " . $current_question . "</h3> <h3>poprawna odpowiedź:</h3> <div class='proper_answer'>"
            .$proper_answer
            ."</div><h3>twoja odpowiedź: "
            .(($answer == "") ? "brak" : $answer)
            ." </h3>";
            
        $_SESSION["uncorrect_answers"] += 1;
        $block_class = "answer_block--wrong";
    }

    // Reset question pending
    // and go to next one
    $_SESSION["current_question_number"] -= 1;
    $_SESSION["is_current_question_type_set"] = false;
    $_SESSION["is_pending_question"] = false;
?>

<div class="--vertical_center">
    <div class="answer_block <?php print $block_class ?>">
        <?php print $monit ?>
    </div>

    <script>
        document.addEventListener("keydown", function (e) {
            if (e.keyCode === 13) {  //checks whether the pressed key is "Enter"
                window.location.href = "./generateQuestion.php";
            }
        });
    </script>
    <a href="./generateQuestion.php"><button>Dalej</button></a>

</div>


<?php include_once("./includes/footer.php"); ?>

