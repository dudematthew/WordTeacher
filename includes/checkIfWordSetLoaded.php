<?php if (session_id() == "") session_start();
    $words = $_SESSION["words"] ?? null;

    if (
            $words == null
        ||
            $words == ""
        ||
            $words == []
    ) {
        header("location: error.php?code=0");
        die("Nie znaleziono odpowiedniego zestawu danych.");
    }

?>