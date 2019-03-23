<?php
    $title = "Załaduj nowy plik ze słówkami";
    include_once("./includes/header.php");

    $error_input = $_GET["error"] ?? null;

    $error_message = "";
    if ($error_input == 1)
        $error_message = "<p class='--error_text'>Proszę wpisać tekst, lub załadować plik.</p>";

    if($error_input == 2)
    $error_message = "<p class='--error_text'>Odebrany plik nie jest plikiem tekstowym.</p>";
?>

<?php print $error_message; ?>

<form action="./loadFile.php" method="post" enctype="multipart/form-data">
    <h3>Wybierz plik do załadowania:</h2>
    <br />
    <label class="--custom_file_upload">
        <input type="file" name="upload_file" onchange="checkFileUpload(this);" accept="text/txt" />
        <p id="file_upload_inner_text">Wybierz plik</p>
    </label>
    <br />
    <button type="submit">Prześlij plik</button>
</form>


<form action="./loadFile.php" id="load_text" method="post">
    <h3>Lub po prostu wpisz tekst tutaj:</h3>
    <textarea name="upload_text" form="load_text"></textarea>
    <br>
    <button type="submit">Prześlij tekst</button>
</form>


<?php include_once("./includes/footer.php");