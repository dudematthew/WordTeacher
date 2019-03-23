<?php
    $title = "WordLearner v1.0a";
    include_once("./includes/header.php");
?>

<body>
    <h1>WordLearner v1.0a</h1>
    <h2>Nauka słówek łatwiejsza o połowę</h2>

    <div class="steps">
        <div class="steps__step">
                <p>1. Przepisz słówka do pliku .txt</p>
                <img src="./img/sample_text.png" alt="Przykładowe słówka" class="steps__step__img">
        </div>
        <div class="steps__step">
                <p>2. Załaduj plik</p>
                <img src="./img/load_file.png" alt="Załadowywanie pliku" class="steps__step__img">
        </div>
        <div class="steps__step">
                <p>1. Pozwól się przepytać</p>
                <img src="./img/sample_question.png" alt="Przykładowe pytanie" class="steps__step__img">
        </div>
    </div>
    <a href="./addFileToLoad.php">
        <button>Spróbuj</button>
    </a>
    
</body>

<?php include_once("./includes/footer.php"); ?>