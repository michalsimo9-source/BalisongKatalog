<?php 
include_once 'parts/header.php'; 
require_once 'classes/Database.php';
require_once 'classes/Balisong.php';

$database = new Database();
$db = $database->getConnection();
$balisong = new Balisong($db);
?>

<section>
    <header class="major">
        <h2>Pridať nový balisong do evidencie</h2>
    </header>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $balisong->nazov = $_POST['nazov'];
        $balisong->znacka = $_POST['znacka'];
        $balisong->typ = $_POST['typ'];
        $balisong->poznamka = $_POST['sprava'];

        if($balisong->create()) {
            echo "<div style='background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;'>";
            echo "<h3>Úspech!</h3>";
            echo "<p>Balisong <strong>" . htmlspecialchars($balisong->nazov) . "</strong> bol uložený do databázy.</p>";
            echo "</div>";
        } else {
            echo "<div style='background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;'>";
            echo "<h3>Chyba!</h3>";
            echo "<p>Nepodarilo sa uložiť dáta do databázy.</p>";
            echo "</div>";
        }
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
                <select name="typ" id="typ" required>
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

</div> </div> <?php include_once 'parts/sidebar.php'; ?>

</div> <?php include_once 'parts/footer.php'; ?>