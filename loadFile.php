 <?php session_start();

    setlocale(LC_COLLATE, "pl_PL");
    include_once("./includes/header.php");

    $file_name = $_FILES["upload_file"]["name"] ?? null;
    $file_type = $_FILES['upload_file']['type'] ?? null;

    if (($file_name == "") && !isset($_POST["upload_text"])) {
        header("location: ./addFileToLoad.php?error=1");
        die("Brak odebranych danych!");
    }
    else {
        $file_path = $_FILES['upload_file']['tmp_name'] ?? null;

        if (!is_null($file_path)) {
            if ($file_type != 'text/plain') { // this file is not TXT
                header("location: ./addFileToLoad.php?error=2");
                die("Odebrany plik nie jest plikiem tekstowym");
            }

            $file_contents = trim(file_get_contents($file_path, FILE_USE_INCLUDE_PATH));
        }
        else {
            $file_contents = trim($_POST["upload_text"] ?? null);
        }
    }

    $wordsFileContent = explode("\n", $file_contents);

    print "<h1>Załadowano!</h1> <h2>Pytania:</h2> <br />";

    foreach ($wordsFileContent as $key => $value) {
        $value = trim($value);

        $dash_count = 0;
        for ($i = 0; $i < strlen($value); $i++) {

            $letter = $value[$i];

            if($letter == "-")
                $dash_count++;
        }

        if ($dash_count > 1 || $dash_count == 0)
        {
            print "<h3 style='color: red'>Nieprawidłowa składnia w pliku w linijce "
                .($key + 1)
                .': "'
                .$value
                .'": Linijka została pominięta.</h3><br />';

            unset($wordsFileContent[$key]);
            array_keys($wordsFileContent);
        }
        else {
            print "<h3>Pytanie nr."
                .($key + 1)
                .': "'
                .$value
                .'"</h3><br />';
        }
            
    }

    $_SESSION["words_amount"] = count($wordsFileContent);
    $_SESSION["words"] = $wordsFileContent;

    ?>

    <a href="./menu.php"><button>Kontynuuj</button></a>

    <?php include_once("./includes/footer.php");