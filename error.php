<?php if (session_id() == "") session_start();

    include_once("./includes/header.php");

    $error_number = $_GET["code"] ?? null;

    $error_message = "Wystąpił błąd";
    switch ($error_number) {
        case 0:
            $error_message = "Nie znaleziono odpowiedniego zestawu danych. Proszę załadować plik lub wpisać dane w sekcji <a href='./addFileToLoad.php' class='--text_link'>Załaduj nowy plik</a>";
    }

?>

<div class="--vertical_center">
    <h2><?php print $error_message; ?></h2>
</div>


<?php include_once("./includes/footer.php"); ?>