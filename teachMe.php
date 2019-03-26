<?php $title = "Ucz mnie"; include_once("./includes/header.php"); ?>

<div class="--vertical_center">

    <h1>Ucz mnie</h1>

    <form action="./createRandomQuestionSet.php" method="get">
        <div class="--no_break_children">
            <h2>Tryb ograniczonego wkuwania</h2>
            <div class="popover__wrapper">
                <a href="#">
                    <h2 class="popover__title"></h2>
                </a>
                <div class="popover__content">
                    Ograniczona przez użytkownika ilość pytań
                </div>
            </div>
        </div>
        <br />
        <input type="text" name="questions_amount" placeholder="Podaj liczbę pytań">
        <br />
        <input type="checkbox" name="rewrite_option" /><label>Tryb przepisywania</label>
        <div class="popover__wrapper">
            <a href="#">
                <h2 class="popover__title"></h2>
            </a>
            <div class="popover__content">
                Pytania, na które odpowiedziano poprawnie zostają odjęte od puli.
                Pytania są zadawane tak długo, aż pula nie zostanie opróżniona.
            </div>
        </div>
        <br />
        <input type="hidden" name="operation_type" value="teach" />
        <button type="submit" name="learning_type" value="limited">Rozpocznij</button>
    </form>
    <br />

    <h2>Tryb progresywnego wkuwania:</h2>
    <div class="popover__wrapper">
            <a href="#">
                <h2 class="popover__title"></h2>
            </a>
            <div class="popover__content">
                Pytania, na które odpowiedziano poprawnie zostają odjęte od puli.
                Pytania są zadawane tak długo, aż pula nie zostanie opróżniona.
            </div>
        </div>
    <form action="" method="get">
        <input type="checkbox" name="rewrite_option" /><label>Tryb przepisywania</label> 
        <div class="popover__wrapper">
            <a href="#">
                <h2 class="popover__title"></h2>
            </a>
            <div class="popover__content">
                Pytania, na które odpowiedziano poprawnie zostają odjęte od puli.
                Pytania są zadawane tak długo, aż pula nie zostanie opróżniona.
            </div>
        </div>
        <input type="hidden" name="operation_type" value="teach" />
        <br>
        <button type="submit" name="learning_type" value="progressive">Rozpocznij</button>
    </form>

</div>


<?php include_once("./includes/footer.php"); ?>