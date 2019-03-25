<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php print $title ?></title>

    <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
    <link rel="stylesheet" href="./main.css">
    <link rel="shortcut icon" href="./img/icon.ico" />
</head>
<body>
    <header class="header">
        <a href="./menu.php">
            <div class="header__title --noselect">WordLearner</div>
        </a>
        <nav class="header__navigation">
            <a href="./teachMe.php">
                <div class="header__navigation__option">Ucz mnie</div>
            </a>
            <a href="./pollMe.php">
                <div class="header__navigation__option">Przepytaj mnie</div>
            </a>
            <a href="./addFileToLoad.php">
                <div class="header__navigation__option">Załaduj nowy plik</div>
            </a>
            <a href="./#">
                <div class="header__navigation__option">Instrukcja</div>
            </a>
        </nav>
    </header>
