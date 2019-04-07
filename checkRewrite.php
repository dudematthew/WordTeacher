<?php if (session_id() == "") session_start();

    $title = "Przepisz pytanie";
    include_once("./includes/header.php");
    include_once("./includes/checkIfWordSetLoaded.php");

    $current_option_rewrite_mode = $_SESSION["current_option_rewrite_mode"] ?? null;
    $is_waiting_for_rewrite = $_SESSION["waiting_for_rewrite"] ?? null;
    $current_question = $_SESSION["current_question"] ?? null;
    $current_answer = $_SESSION["current_answer"] ?? null;
    $rewrite_input = $_POST["rewrite_input"] ?? null;
    $current_answer_madman = $current_answer_madman = explode("/", $current_answer);

    if (!$current_option_rewrite_mode || !$is_waiting_for_rewrite)
    {
        header("location: ./generateQuestion.php");
        die("Wystąpił błąd przekierowania");
    }

    $is_proper_rewrite_input = false;
    if ($rewrite_input != null && $rewrite_input != "") {

        // Check if user rewrite matches one of
        // the proper answers
        foreach ($current_answer_madman as $key => $proper_answer) {
            if (trim($rewrite_input) == trim($proper_answer))
                $is_proper_rewrite_input = true;
        }
    }

    if ($is_proper_rewrite_input){
        $_SESSION["waiting_for_rewrite"] = false;
        header("location: ./generateQuestion.php");
        die("Wystąpił błąd przekierowania.");
    }

    $message_proper_input = ($is_proper_rewrite_input || $rewrite_input == null)
        ? "Przepisz prawidłowe pytanie..."
        : "Spróbuj przepisać jeszcze raz...";
?> 

<div class="--vertical_center">
    <h1>Przepisz poprawne pytanie</h1>
    <h2 class="--highlight_text"><?php print $current_question ?> - <?php print $current_answer ?></h2>

    <form action="./checkRewrite.php" method="post">
        <input name="rewrite_input" type="text" id="answer" placeholder="<?php print $message_proper_input ?>">
    </form>
</div>

<!-- focus on answer input -->
<script> document.getElementById("answer").focus(); </script>

<?php include_once("./includes/footer.php");