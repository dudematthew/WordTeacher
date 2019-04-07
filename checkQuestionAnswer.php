<?php if (session_id() == "") session_start();

    include_once("./includes/checkIfWordSetLoaded.php");


    $title = "Odpowiedź na pytanie";
    include_once("./includes/header.php");

    // Check question based on language direction 
    $current_question = (($_SESSION["current_question_type"] ?? null) == "right_to_left")
        ? $_SESSION["current_right_word_syntax"] ?? null
        : $_SESSION["current_left_word_syntax"] ?? null;

    // Check answer based on language direction (use it in checkRewrite.php)
    $current_answer = (($_SESSION["current_question_type"] ?? null) == "left_to_right")
        ? $_SESSION["current_right_word_syntax"] ?? null
        : $_SESSION["current_left_word_syntax"] ?? null;

    $_SESSION["current_answer"] = $current_answer;
    $_SESSION["current_question"] = $current_question;

    $current_question_number = $_SESSION["current_question_number"] ?? null;

    // Get the answer from answerQuestion.php
    $answer = (isset($_GET["answer"])) ? trim($_GET["answer"]) : null;

    // Check if question is pending
    $is_pending = isset($_SESSION["is_pending_question"]) ? $_SESSION["is_pending_question"] : false;
    if ($is_pending == false) {
        header("location: ./generateQuestion.php");
        die("Nie ma oczekującego zapytania");
    }

    if ($_SESSION["waiting_for_rewrite"]) {
        // header("location: ./checkRewrite.php");
        print "2";
        die("Wystąpił błąd przekierowania.");
    }

    // Check if main var setted
    if (
            is_null($answer)
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

        if ($_SESSION["current_learning_type"] == "progressive") {
            unset($_SESSION["shuffled_words"][$current_question_number]);
            $temp_arr = [];
            foreach($_SESSION["shuffled_words"] as $value) {
                $temp_arr[] = $value;
            }
            $_SESSION["shuffled_words"] = $temp_arr;
        }
    }
    else {
        $monit = "<h2>Odpowiedź niepoprawna!</h2> <br /> <h3>Pytanie: " . $current_question . "</h3> <h3>poprawna odpowiedź:</h3> <div class='proper_answer'>"
            .$proper_answer
            ."</div><h3>twoja odpowiedź: "
            .(($answer == "") ? "brak" : $answer)
            ." </h3>";

        $block_class = "answer_block--wrong";

        if ($_SESSION["current_option_rewrite_mode"] ?? null)
            $_SESSION["waiting_for_rewrite"] = true;
        
        $_SESSION["uncorrect_answers"] += 1;
        $block_class = "answer_block--wrong";
    }

    // Reset question pending
    // and go to next one
    if ($_SESSION["current_learning_type"] != "progressive") {
        $_SESSION["current_question_number"] -= 1;
    }
    else if ($_SESSION["current_learning_type"] == "progressive") {
        $_SESSION["current_question_number"] += 1;
    }
    
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
                window.location.href = "./checkRewrite.php";
            }
        });
    </script>
    <a href="./checkRewrite.php"><button>Dalej</button></a>

</div>


<?php include_once("./includes/footer.php"); ?>

