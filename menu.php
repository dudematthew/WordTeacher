<?php
    $title = "WordLearner v1.3a";
    include_once("./includes/header.php");
?>

    <h1>WordLearner v1.3a</h1>
    <h2>Nauka słówek łatwiejsza o połowę</h2>

    <div class="steps">
        <div class="steps__step">
                <p>1. Przepisz słówka do pliku .txt</p>
                <p class="--info_text">Jak to poprawnie zrobić dowiesz się <a href="./textSyntax.php">tutaj</a>.</p>
                <img src="./img/sample_text.png" alt="Przykładowe słówka" class="steps__step__img">
        </div>
        <div class="steps__step">
                <p>2. Załaduj plik</p>
                <p class="--info_text">Przejdź do zakładki <a href="./addFileToLoad.php">Załaduj nowy plik</a>.</p>
                <img src="./img/load_file.png" alt="Załadowywanie pliku" class="steps__step__img">
        </div>
        <div class="steps__step">
                <p>1. Pozwól się przepytać</p>
                <p class="--info_text">Przejdź do zakładki <a href="./teachMe.php">Ucz mnie</a>, lub <a href="./pollMe.php">Przepytaj mnie</a>.</p>
                <img src="./img/sample_question.png" alt="Przykładowe pytanie" class="steps__step__img">
        </div>
    </div>
    <a href="./addFileToLoad.php">
        <button>Spróbuj</button>
    </a>

<?php include_once("./includes/footer.php"); ?>