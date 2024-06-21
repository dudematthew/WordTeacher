<?php $title = "Ucz mnie";
include_once("./includes/header.php"); ?>

<div class="--vertical_center">

    <h1>Ucz mnie</h1>

    <!-- Toggle Button -->
    <button onclick="switchForm('limited')">Ograniczone wkuwanie</button>
    <button onclick="switchForm('progressive')">Progresywne wkuwanie</button>

    <!-- Container for both forms -->
    <div id="formsContainer">
        <!-- Form 1 -->
        <form id="formLimited" action="./createRandomQuestionSet.php" method="get" style="display:block;">
            <div class="popover__wrapper">
                <a href="#">
                    <h2>Tryb ograniczonego wkuwania</label>
                </a>
                <div class="popover__content">
                    Ograniczona przez użytkownika ilość pytań.
                </div>
            </div>
            <br />
            <input type="text" name="questions_amount" placeholder="Podaj liczbę pytań">
            <br />
            <div class="popover__wrapper">
                <input type="checkbox" name="rewrite_option" />
                <a href="#">
                    <label>Tryb przepisywania</label>
                </a>
                <div class="popover__content">
                    W przypadku nieprawidłowej
                    odpowiedzi użytkownik musi
                    przepisać prawidłową odpowiedź,
                    aby przejść do następnego pytania.
                </div>
            </div>
            <br />
            <!-- New Select Input for Question Direction -->
            <div class="popover__wrapper">
                <select name="questions_direction">
                    <option value="left">Lewa strona</option>
                    <option value="right">Prawa strona</option>
                    <option value="random">Losowo</option>
                </select>
                <a href="#">
                    <label>Kierunek pytania</label>
                </a>
                <div class="popover__content">
                    Wybierz stronę, z której będzie pochodziło pytanie lub wybierz opcję losową.
                </div>
            </div>
            <br />
            <input type="hidden" name="operation_type" value="teach" />
            <button type="submit" name="learning_type" value="limited">Rozpocznij</button>
        </form>

        <!-- Form 2 -->
        <form id="formProgressive" action="./createRandomQuestionSet.php" method="get" style="display:none;">
            <div class="popover__wrapper">
                <a href="#">
                    <h2>Tryb progresywnego wkuwania</label>
                </a>
                <div class="popover__content">
                    Pytania, na które odpowiedziano
                    poprawnie zostają odjęte od puli.
                    Pytania są zadawane tak długo, aż
                    pula nie zostanie opróżniona.
                </div>
            </div>
            <br>
            <div class="popover__wrapper">
                <input type="checkbox" name="rewrite_option" />
                <a href="#">
                    <label>Tryb przepisywania</label>
                </a>
                <div class="popover__content">
                    W przypadku nieprawidłowej
                    odpowiedzi użytkownik musi
                    przepisać prawidłową odpowiedź,
                    aby przejść do następnego pytania.
                </div>
            </div>
            <br />
            <!-- New Select Input for Question Direction -->
            <div class="popover__wrapper">
                <select name="questions_direction">
                    <option value="left">Lewa strona</option>
                    <option value="right">Prawa strona</option>
                    <option value="random">Losowo</option>
                </select>
                <a href="#">
                    <label>Kierunek pytania</label>
                </a>
                <div class="popover__content">
                    Wybierz stronę, z której będzie pochodziło pytanie lub wybierz opcję losową.
                </div>
            </div>
            <br />
            <input type="hidden" name="operation_type" value="teach" />
            <button type="submit" name="learning_type" value="progressive">Rozpocznij</button>
        </form>
    </div>

</div>

<script>
    function switchForm(type) {
        var formLimited = document.getElementById('formLimited');
        var formProgressive = document.getElementById('formProgressive');

        if (type === 'limited') {
            formLimited.style.display = 'block';
            formProgressive.style.display = 'none';
        } else {
            formLimited.style.display = 'none';
            formProgressive.style.display = 'block';
        }
    }
</script>

<?php include_once("./includes/footer.php"); ?>