<?php 
  if (session_status() === PHP_SESSION_NONE) { 
      session_start(); 
  }

  include_once 'parts/header.php';
  require_once 'classes/Database.php';
  require_once 'classes/Balisong.php';

  $database = new Database();
  $db = $database->getConnection();
  $balisong = new Balisong($db);

  if (isset($_GET['delete_id'])) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
    $balisong->id = $_GET['delete_id'];
    
    if ($balisong->delete()) {
        header("Location: index.php");
        exit();
    } else {
        echo "<div style='background: red; color: white; padding: 10px; text-align: center;'>Chyba pri mazaní záznamu.</div>";
    }
}
?>

<section id="banner">
        <div class="content">
            <header>
                <h1>Svet Balisongov<br />
                Umenie flippovania</h1>
                <p>Moja osobná zbierka a sprievodca svetom motýlikov</p>
            </header>
            <p>Balisong, u nás známy skôr ako nožík motýlik, nie je len rezný nástroj. Pre mnohých z nás je to o zručnosti, trpezlivosti a komunite. Na tejto stránke nájdeš moju aktuálnu zbierku, technické parametre obľúbených kúskov a formulár, cez ktorý môžem evidovať nové prírastky do mojej výbavy.</p>
            
            <?php if (isset($_SESSION['user_id'])): ?>
                <ul class="actions">
                    <li><a href="pridat.php" class="button big">Pridať do zbierky</a></li>
                </ul>
            <?php endif; ?>
        </div>
        <span class="image object">
            <img src="images/obrazok1.jpg" alt="Balisong flippovanie" />
        </span>
    </section>

    <section>
        <header class="major">
            <h2>Prečo balisongy?</h2>
        </header>
        <div class="features">
            <article>
                <span class="icon fa-gem"></span>
                <div class="content">
                    <h3>Kvalitné materiály</h3>
                    <p>Od nerezovej ocele 440C až po prémiové materiály ako titán či G10 rukoväte. Kvalita materiálu určuje životnosť noža.</p>
                </div>
            </article>
            <article>
                <span class="icon solid fa-paper-plane"></span>
                <div class="content">
                    <h3>Perfektné vyváženie</h3>
                    <p>Správne ťažisko je kľúčové pre plynulé triky. Každý model v zbierke má špecifické rozloženie váhy.</p>
                </div>
            </article>
            <article>
                <span class="icon solid fa-rocket"></span>
                <div class="content">
                    <h3>Rýchlosť a plynulosť</h3>
                    <p>Moderné balisongy využívajú guľôčkové ložiská alebo bronzové podložky pre čo najmenšie trenie pri flippovaní.</p>
                </div>
            </article>
            <article>
                <span class="icon solid fa-signal"></span>
                <div class="content">
                    <h3>Komunita a progres</h3>
                    <p>Flippovanie spája ľudí po celom svete. Neustále učenie sa nových trikov posúva hranice koordinácie rúk.</p>
                </div>
            </article>
        </div>
    </section>

<section>
        <header class="major">
            <h2>Moja aktuálna zbierka</h2>
        </header>
        <div class="posts">
            <?php

            $filter = isset($_GET['filter_type']) ? $_GET['filter_type'] : null;
            $stmt = $balisong->read($filter);
            $num = $stmt->rowCount();

            if($num > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    
                    $image_path = "images/noz_" . $id . ".jpg";
                    if (!file_exists($image_path)) {
                        $image_path = "images/default.jpg";
                    }
                    ?>
                    <article>
                        <a href="#" class="image"><img src="<?php echo $image_path; ?>" alt="<?php echo htmlspecialchars($nazov); ?>" /></a>
                        <h3><?php echo htmlspecialchars($nazov); ?></h3>
                        <p>
                            <strong>Značka:</strong> <?php echo htmlspecialchars($znacka); ?><br>
                            <strong>Typ:</strong> <?php echo htmlspecialchars($typ); ?><br>
                            <strong>Pridané:</strong> <?php echo date('d.m.Y H:i', strtotime($datum_pridania)); ?>
                        </p>
                        <p><?php echo htmlspecialchars($poznamka); ?></p>
                        
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <ul class="actions">
                                <li><a href="upravit.php?id=<?php echo $id; ?>" class="button">Upraviť</a></li>
                                <li><a href="index.php?delete_id=<?php echo $id; ?>" class="button primary" style="background-color: #f56a6a !important; box-shadow: inset 0 0 0 2px #f56a6a !important; color: white !important;" onclick="return confirm('Naozaj chcete zmazať tento balisong?');">Zmazať</a></li>
                            </ul>
                        <?php endif; ?>
                    </article>
                    <?php
                }
            } else {
                echo "<p>V databáze sa nenachádzajú žiadne balisongy. Pridaj nejaký cez formulár!</p>";
            }
            ?>
        </div>
    </section>

    </div> </div> <?php include_once 'parts/sidebar.php'; ?>

</div> <?php include_once 'parts/footer.php'; ?>