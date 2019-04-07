<?php if (session_id() == "") session_start();

    include_once("./includes/checkIfWordSetLoaded.php");

    // Set basic variables
    $option_learning_type = $_GET["learning_type"] ?? null;
    $option_rewrite_mode = $_GET["rewrite_option"] ?? null;
    $option_questions_amount = $_GET["questions_amount"] ?? null;
    $operation_type = $_GET["operation_type"] ?? null;
    $global_words_amount = $_SESSION["words_amount"] ?? null;

    // SEPARATE Validate data
    if ($operation_type != "teach" && $operation_type != "poll")
    {
        header("./menu.php");
        die("wystąpił błąd odebranych danych");
    }

    // Check if proper learning type set while
    // in teach mode
    if (
            $operation_type == "teach" 
        &&
            $option_learning_type != "progressive" 
        &&
            $option_learning_type != "limited"
    ) {
        header("location: ./teachMe.php");
        die("wystąpił błąd odebranych danych");
    }

    // Go back to GenerateRandom.php if user inputs
    // number lower than 1
    if (isset($_GET["questions_amount"])) {
        if ($_GET["questions_amount"] <= 0) {
            $operation_type == "teach"
            ? header("location: ./teachMe.php?error=1")
            : header("location: ./pollMe.php?error=1");
            die("wystąpił błąd");
        }
    }

    if (
        $option_questions_amount > $global_words_amount
        &&
            $operation_type == "poll"
    ) {
        header("location: ./pollMe.php?error=2");
        die("Wystąpił błąd przekierowania");
    }

    // SEPARATE

    // Set from session or overwrite from get
    $_SESSION["current_question_number"] = $_GET["questions_amount"] ?? 0;

    if ($option_learning_type == "progressive")
        $_SESSION["total_question_number"] = 1;
    else
        $_SESSION["total_question_number"] = $_GET["questions_amount"];

    $_SESSION["current_operation_type"] = $operation_type;
    $_SESSION["current_learning_type"] = $option_learning_type;
    $_SESSION["current_option_rewrite_mode"] =
        ($option_rewrite_mode == "on")
        ? true
        : false;

    // Make new session of question sets
    $_SESSION["shuffled_words"] = $_SESSION["words"];

    if (
            $option_questions_amount > count($_SESSION["shuffled_words"])
        &&
            $option_learning_type != "progressive"
    ) {
        // If required question amount is greater
        // than avaible question amount
        // extend it in a way that eliminates
        // repeats
        $i_local = 0;
        while (count($_SESSION["shuffled_words"]) < $option_questions_amount)
        {
            if (count($_SESSION["shuffled_words"]) < $i_local)
                $i_local = 0;

            $_SESSION["shuffled_words"][] = $_SESSION["shuffled_words"][$i_local];
            
            $i_local++;
        }
    }

    // Shuffle new question set
    shuffle($_SESSION["shuffled_words"]);

    // User is updating the file - reset
    // pending question
    // NOTE:  Can't check the question without
    //        pending variable
    $_SESSION["is_pending_question"] = false;
    $_SESSION["correct_answers"] = 0;
    $_SESSION["uncorrect_answers"] = 0;
    $_SESSION["title_question_number"] = 0;

    header("location: ./generateQuestion.php");
    die("Wystąpił błąd przekierowania.");
?>