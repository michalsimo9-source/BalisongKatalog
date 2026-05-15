<?php 
include_once 'parts/header.php'; 
require_once 'classes/Database.php';
require_once 'classes/Balisong.php';

$database = new Database();
$db = $database->getConnection();
$balisong = new Balisong($db);

if (isset($_GET['id'])) {
    $balisong->id = $_GET['id'];
    
    if (!$balisong->readOne()) {
        echo "<div style='padding: 20px;'><h3>Chyba: Balisong s týmto ID nebol nájdený.</h3></div>";
        include_once 'parts/sidebar.php';
        include_once 'parts/footer.php';
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $balisong->nazov = $_POST['nazov'];
    $balisong->znacka = $_POST['znacka'];
    $balisong->typ = $_POST['typ'];
    $balisong->poznamka = $_POST['sprava'];

    if ($balisong->update()) {
        echo "<div style='background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;'>";
        echo "<h3>Úspešne upravené!</h3>";
        echo "<p>Zmeny boli uložené. Môžeš sa vrátiť na <a href='index.php'>hlavnú stránku</a>.</p>";
        echo "</div>";
    } else {
        echo "<div style='background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;'>";
        echo "<h3>Chyba!</h3>";
        echo "<p>Nepodarilo sa aktualizovať dáta.</p>";
        echo "</div>";
    }
}
?>

<section>
    <header class="major">
        <h2>Upraviť balisong: <?php echo htmlspecialchars($balisong->nazov); ?></h2>
    </header>

    <form method="post" action="upravit.php?id=<?php echo $balisong->id; ?>">
        <div class="row gtr-uniform">
            <div class="col-6 col-12-xsmall">
                <label for="nazov">Názov noža</label>
                <input type="text" name="nazov" id="nazov" value="<?php echo htmlspecialchars($balisong->nazov); ?>" required />
            </div>
            <div class="col-6 col-12-xsmall">
                <label for="znacka">Značka</label>
                <input type="text" name="znacka" id="znacka" value="<?php echo htmlspecialchars($balisong->znacka); ?>" required />
            </div>
            <div class="col-12">
                <label for="typ">Typ čepele</label>
                <select name="typ" id="typ" required>
                    <option value="Trainer" <?php echo ($balisong->typ == 'Trainer') ? 'selected' : ''; ?>>Trainer (Tupá)</option>
                    <option value="Live Blade" <?php echo ($balisong->typ == 'Live Blade') ? 'selected' : ''; ?>>Live Blade (Ostrá)</option>
                </select>
            </div>
            <div class="col-12">
                <label for="sprava">Poznámky k stavu noža</label>
                <textarea name="sprava" id="sprava" rows="6"><?php echo htmlspecialchars($balisong->poznamka); ?></textarea>
            </div>
            <div class="col-12">
                <ul class="actions">
                    <li><input type="submit" value="Uložiť zmeny" class="primary" /></li>
                    <li><a href="index.php" class="button">Zrušiť</a></li>
                </ul>
            </div>
        </div>
    </form>
</section>

</div> </div> <?php include_once 'parts/sidebar.php'; ?>

</div> <?php include_once 'parts/footer.php'; ?>