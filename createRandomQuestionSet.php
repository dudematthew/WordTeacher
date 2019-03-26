<?php session_start();

    $option_learning_type = $_GET["learning_type"] ?? null;
    $option_rewrite_mode = $_GET["rewrite_option"] ?? null;
    $option_questions_amount = $_GET["questions_amount"] ?? null;
    $operation_type = $_GET["operation_type"] ?? null;

    if ($operation_type != "teach" && $operation_type != "poll")
    {
        header("./menu.php");
        die("wystąpił błąd odebranych danych");
    }

    if ($option_learning_type != "progressive" && $option_learning_type != "limited")
    {
        $operation_type == "teach"
            ? header("location: ./teachMe.php")
            : header("location: ./pollMe.php");
        die("wystąpił błąd odebranych danych");
    }

    $_SESSION["current_operation_type"] = $operation_type;
    if ($operation_type != "teach")
    {
        $_SESSION["current_learning_type"] = $option_learning_type;
        $_SESSION["current_option_rewrite_mode"] =
            $option_rewrite_mode == "on"
            ? true
            : false;
    }

    
    // Make new session of question sets and
    // shuffle it
    $_SESSION["shuffled_words"] = $_SESSION["words"];
    shuffle($_SESSION["shuffled_words"]);

    // User is updating the file - reset
    // pending question
    // (can't check the question without
    // pending variable)
    $_SESSION["is_pending_question"] = false;
    $_SESSION["correct_answers"] = 0;
    $_SESSION["uncorrect_answers"] = 0;


    var_dump($option_rewrite_mode);
    var_dump($option_learning_type);
    var_dump($_SESSION["shuffled_words"]);
?>