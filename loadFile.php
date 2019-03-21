 <?php session_start();

    setlocale(LC_COLLATE, "pl_PL");

    // SEPARATE file upload handling

    // if ($_FILES['file']['type'] == 'text/plain') // this file is TXT

    // SEPARATE

    $file_contents = trim(file_get_contents("./angielski.txt", FILE_USE_INCLUDE_PATH));
    $wordsFileContent = explode("\n", $file_contents);

    print "<b>Załadowano plik. Pytania:</b> <br />";

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
            print "<b style='color: red'>Nieprawidłowa składnia w pliku w linijce "
                .($key + 1)
                .": '"
                .$value
                ."': Linijka została pominięta.</b><br />";

            unset($wordsFileContent[$key]);
            array_keys($wordsFileContent);
        }
        else {
            print "Pytanie nr."
                .($key + 1)
                .": '"
                .$value
                ."'<br />";
        }
            
    }

    $_SESSION["words"] = $wordsFileContent;

    ?>

    <a href="./generateRandom.php">Kontynuuj</a>