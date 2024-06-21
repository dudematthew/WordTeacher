<?php
$title = "WordTeacher v1.4a";
include_once("./includes/header.php");
?>

<div class="--vertical_center">

    <h1>WordTeacher v1.5</h1>
    <h2>Nauka słówek łatwiejsza o połowę</h2>

    <div class="steps">
        <div class="steps__step">
            <h2>1. Przepisz słówka do pliku .txt</h2>
            <p class="--info_text">Jak to poprawnie zrobić dowiesz się <a href="./textSyntaxTutorial.php">tutaj</a>.</p>
        </div>
        <div class="steps__step">
            <h2>2. Załaduj plik</h2>
            <p class="--info_text">Przejdź do zakładki <a href="./addFileToLoad.php">Załaduj nowy plik</a>.</p>
        </div>
        <div class="steps__step">
            <h2>3. Pozwól się przepytać</h2>
            <p class="--info_text">Przejdź do zakładki <a href="./teachMe.php">Ucz mnie</a>, lub <a href="./pollMe.php">Przepytaj mnie</a>.</p>
        </div>
    </div>
    <a href="./addFileToLoad.php">
        <button>Spróbuj</button>
    </a>
</div>

<?php include_once("./includes/footer.php"); ?>