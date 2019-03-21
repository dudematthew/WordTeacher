<?php
    $title = "Załaduj nowy plik ze słówkami";
    include_once("./includes/header.php");
?>

<form action="./loadFile.php" method="post" enctype="multipart/form-data">
    <h3>Wybierz plik do załadowania:</h2>
    <br />
    <label class="--custom_file_upload">
        <input type="file" name="upload_file" accept="text/txt" />
        Wybierz plik
    </label>
    <br />
    <button type="submit">Prześlij plik</button>
</form>


<form action="./loadFile.php">
    <h3>Lub po prostu wpisz tekst tutaj:</h3>
    <textarea name="upload_text"></textarea>
</form>


<?php include_once("./includes/footer.php");