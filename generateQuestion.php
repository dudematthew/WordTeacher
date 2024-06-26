<?php if (session_id() == "") session_start();

include_once("./includes/checkIfWordSetLoaded.php");

// Set basic variables
$left_question = $right_question = "";
$_SESSION["is_pending_question"] = $_SESSION["is_pending_question"] ?? false;
$question_number = $_SESSION["current_question_number"] ?? null;

// SEPARATE Validate data
// Panic and go back to index
if (!isset($_SESSION["shuffled_words"]))
    header("location: index.php");

// Take to the stats if runs out of
// question numbers
// or if runs out of questions
if (
    (
        $question_number <= 0
        &&
        $_SESSION["current_learning_type"] != "progressive"
    )
    ||
    (
        $_SESSION["shuffled_words"] == []
        &&
        $_SESSION["current_learning_type"] == "progressive"
    )
) {
    header("location: ./showStats.php");
    die("zakończono test");
}
// SEPARATE

// Works if question is not pending
if ($_SESSION["is_pending_question"] == false) {

    if ($question_number >= count($_SESSION["shuffled_words"]))
        $_SESSION["current_question_number"] = $question_number;

    // Get current question from question set
    if (($_SESSION["current_learning_type"] ?? null) != "progressive")
        $current_question = $_SESSION["shuffled_words"][$question_number - 1];
    else
        $current_question = $_SESSION["shuffled_words"][$question_number];

    // Split question by "-"
    $exploded_question = explode("-", $current_question);

    $question_direction = $_SESSION["current_questions_direction"] ?? 'random';

    var_dump($question_direction);

    // Rand the order of language in question
    // Do it only once untill user answers
    // the question
    if (
        (bool) (($question_direction == 'random') ? rand(0, 1) : ($question_direction == 'left' ? 1 : 0))
    ) {
        var_dump('Setting question type: left_to_right');
        $_SESSION["current_question_type"] = "left_to_right";
    } else {
        var_dump('Setting question type: right_to_left');
        $_SESSION["current_question_type"] = "right_to_left";
    }

    $_SESSION["is_current_question_type_set"] = true;



    // Save the right and left side
    // of question
    $_SESSION["current_left_word_syntax"] = trim($exploded_question[0]);
    $_SESSION["current_right_word_syntax"] = trim($exploded_question[1]);

    $_SESSION["title_question_number"] += 1;
} else {
    header("location: ./answerQuestion.php");
    die("Pytanie zostało już zadane.");
}

// Set the question to pending = block
// modifications of the question
$_SESSION["is_pending_question"] = true;
$_SESSION["waiting_for_rewrite"] = false;

($_SESSION["current_question_number"]);

header("location: answerQuestion.php");
die("Wystąpił błąd przekierowania.");
