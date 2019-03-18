<?php session_start();

    $left_question = $right_question = "";
    $_SESSION["is_pending_question"] = $_SESSION["is_pending_question"] ?? false;

    if (isset($_GET["question_number"])) {
        if ($_GET["question_number"] <= 0) {
            header("location: ./generateRandom.php?error=1");
            die("wystąpił błąd.");
        }
    }

     // Set from session or overwrite from get
     $question_number = (isset($_GET["question_number"])) ? $_GET["question_number"] : $_SESSION["current_question_number"];

    // Take to the stats if runs out of question numbers
    if ($question_number <= 0)
    {
        header("location: showStats.php");
        die();
    }

    if ($_SESSION["is_pending_question"] == false) { 

        if (isset($_GET["question_number"])) {
            $_SESSION["total_question_number"] = $_GET["question_number"];
        }

        // If not set to get and session go back
        if (is_null($question_number))
            header("location: ./index.php");

        // Update session
        $_SESSION["current_question_number"] = $question_number;

        // Take question based on number
        if ($question_number <= count($_SESSION["shuffled_words"])) {

            $current_question = $_SESSION["shuffled_words"][$question_number - 1];
        }
        else {
            shuffle($_SESSION["shuffled_words"]);
            $current_question = $_SESSION["shuffled_words"][0];
        }

        // Explode question
        $exploded_question = explode("-", $current_question);

        if ((bool) rand(0, 1) && $_SESSION["is_current_question_type_set"] == false) {
            $_SESSION["current_question_type"] = "left_to_right";
            $_SESSION["is_current_question_type_set"] = true;
        }
        else
            $_SESSION["current_question_type"] = "right_to_left";

        $_SESSION["current_left_word_syntax"] = trim($exploded_question[0]); 
        $_SESSION["current_right_word_syntax"] = trim($exploded_question[1]); 
    }

    $_SESSION["is_pending_question"] = true;

    header("location: answerQuestion.php");

?>