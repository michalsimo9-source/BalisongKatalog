<?php include_once 'parts/header.php'; ?>	

<?php 
  require_once 'classes/Database.php';
  $db = new Database();
  if($db->getConnection()) {
      echo "";
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
            <ul class="actions">
                <li><a href="pridat.php" class="button big">Pridať do zbierky</a></li>
            </ul>
        </div>
        <span class="image object">
            <img src="images/pic10.jpg" alt="Balisong flippovanie" />
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
            <h2>Najobľúbenejšie kúsky</h2>
        </header>
        <div class="posts">
            <article>
                <a href="#" class="image"><img src="images/pic01.jpg" alt="Böker Plus" /></a>
                <h3>Böker Plus Balisong</h3>
                <p>Nemecký dizajn v kombinácii s praktickosťou. Skvelý kúsok pre každodenné nosenie aj ľahké flippovanie.</p>
                <ul class="actions">
                    <li><a href="#" class="button">Viac info</a></li>
                </ul>
            </article>
            <article>
                <a href="#" class="image"><img src="images/pic02.jpg" alt="Squid Industries" /></a>
                <h3>Squid Industries Kraken</h3>
                <p>Jeden z najikonickejších trainerov a ostrých nožov na svete, známy svojím nezameniteľným zvukom.</p>
                <ul class="actions">
                    <li><a href="#" class="button">Viac info</a></li>
                </ul>
            </article>
            <article>
                <a href="#" class="image"><img src="images/pic03.jpg" alt="FOX Knives" /></a>
                <h3>FOX Knives Skeleton</h3>
                <p>Talianska precíznosť. Odľahčený skelet rukoväte umožňuje extrémne rýchlu manipuláciu.</p>
                <ul class="actions">
                    <li><a href="#" class="button">Viac info</a></li>
                </ul>
            </article>
        </div>
    </section>

    </div> </div> <?php include_once 'parts/sidebar.php'; ?>

</div> <?php include_once 'parts/footer.php'; ?>