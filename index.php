<?php session_start();

    // Declaration of basic sessions
    $_SESSION["current_question_number"] = 0;
    $_SESSION["words"] = [];
    $_SESSION["correct_answers"] = 0;
    $_SESSION["uncorrect_answers"] = 0;
    $_SESSION["is_current_question_type_set"] = false;

    header("location: ./loadFile.php");