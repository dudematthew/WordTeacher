<?php session_start();

    $left_question = $right_question = "";
    $_SESSION["is_pending_question"] = $_SESSION["is_pending_question"] ?? false;

    // Go back to GenerateRandom.php if user inputs
    // number lower than 1
    if (isset($_GET["question_number"])) {
        if ($_GET["question_number"] <= 0) {
            header("location: ./generateRandom.php?error=1");
            die("wystąpił błąd.");
        }
    }

     // Set from session or overwrite from get
     $question_number = (isset($_GET["question_number"]))
        ? $_GET["question_number"]
        : $_SESSION["current_question_number"];

    // Take to the stats if runs out of question numbers
    if ($question_number <= 0)
    {
        header("location: showStats.php");
        die();
    }

    // Works if question is pending
    if ($_SESSION["is_pending_question"] == false) { 

        // If data sended by GET put it to
        // session to save maximum number of questions
        if (isset($_GET["question_number"])) {
            $_SESSION["total_question_number"] = $_GET["question_number"];
        }

        // If not set to get and session go back
        if (is_null($question_number))
            header("location: ./index.php");

        // Update current question number by
        // current session or GET
        $_SESSION["current_question_number"] = $question_number;

        // SEPARATE  Take question based on number - this algorithm is still in prod.
        if ($question_number <= count($_SESSION["shuffled_words"])) {

            $current_question = $_SESSION["shuffled_words"][$question_number - 1];
        }
        else {
            shuffle($_SESSION["shuffled_words"]);
            $current_question = $_SESSION["shuffled_words"][0];
        }
        // SEPARATE

        // Split question by "-"
        $exploded_question = explode("-", $current_question);

        // Rand the order of language in question
        // Do it only once untill user answers
        // the question
        if (
                (bool) rand(0, 1)
            &&
                $_SESSION["is_current_question_type_set"] == false
            ) {

            $_SESSION["current_question_type"] = "left_to_right";
            $_SESSION["is_current_question_type_set"] = true;
        }
        else if ($_SESSION["is_current_question_type_set"] == false)
            $_SESSION["current_question_type"] = "right_to_left";

        // Save the right and left side
        // of question
        $_SESSION["current_left_word_syntax"] = trim($exploded_question[0]); 
        $_SESSION["current_right_word_syntax"] = trim($exploded_question[1]); 
    }

    // Set the question to pending = block
    // modifications of the question
    $_SESSION["is_pending_question"] = true;

    header("location: answerQuestion.php");

?>