<?php include_once 'parts/header.php'; ?>	

<section>
    <header class="major">
        <h2>Pridať nový balisong do evidencie</h2>
    </header>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nazov = htmlspecialchars($_POST['nazov']);
        $znacka = htmlspecialchars($_POST['znacka']);
        $typ = $_POST['typ'];

        echo "<div class='vysledok-balisong'>";
        echo "<h3>Nôž bol úspešne zaevidovaný!</h3>";
        echo "<p><strong>Názov:</strong> $nazov <br>";
        echo "<strong>Značka:</strong> $znacka <br>";
        echo "<strong>Typ:</strong> $typ</p>";
        echo "</div>";
    }
    ?>

    <form method="post" action="pridat.php">
        <div class="row gtr-uniform">
            <div class="col-6 col-12-xsmall">
                <input type="text" name="nazov" id="nazov" value="" placeholder="Názov noža (napr. Kraken V3)" required />
            </div>
            <div class="col-6 col-12-xsmall">
                <input type="text" name="znacka" id="znacka" value="" placeholder="Značka (napr. Squid Industries)" required />
            </div>
            <div class="col-12">
                <select name="typ" id="typ">
                    <option value="">- Vyber typ čepele -</option>
                    <option value="Trainer">Trainer (Tupá)</option>
                    <option value="Live Blade">Live Blade (Ostrá)</option>
                </select>
            </div>
            <div class="col-12">
                <textarea name="sprava" id="sprava" placeholder="Poznámky k stavu noža..." rows="6"></textarea>
            </div>
            <div class="col-12">
                <ul class="actions">
                    <li><input type="submit" value="Odoslať dáta" class="primary" /></li>
                    <li><input type="reset" value="Vymazať" /></li>
                </ul>
            </div>
        </div>
    </form>
</section>

                        </div>
                    </div>

                <?php include_once 'parts/sidebar.php'; ?>

            </div> 
            <?php include_once 'parts/footer.php'; ?>