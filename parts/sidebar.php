<div id="sidebar">
    <div class="inner">

        <section id="search" class="alt">
            <form method="post" action="#">
                <input type="text" name="query" id="query" placeholder="Search" />
            </form>
        </section>

        <nav id="menu">
            <header class="major">
                <h2>Menu</h2>
            </header>
            <ul>
                <li><a href="index.php">Domov (Prehľad zbierky)</a></li>
                <li><a href="pridat.php">Pridať balisong (Formulár)</a></li>
                <li>
                    <span class="opener">Filtrovať zbierku</span>
                    <ul>
                        <li><a href="index.php?filter_type=Trainer">Trainery (Tupé)</a></li>
                        <li><a href="index.php?filter_type=Live Blade">Ostré čepele</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <section>
            <header class="major">
                <h2>Najnovšie prírastky</h2>
            </header>
            <div class="mini-posts">
                <?php
                $stmt_latest = $balisong->readLatest();
                $num_latest = $stmt_latest->rowCount();

                if($num_latest > 0) {
                    while ($row_latest = $stmt_latest->fetch(PDO::FETCH_ASSOC)) {
                        
                        $sidebar_image_path = "images/noz_" . $row_latest['id'] . ".jpg";
                        if (!file_exists($sidebar_image_path)) {
                            $sidebar_image_path = "images/default.jpg";
                        }
                        ?>
                        <article>
                            <a href="#" class="image"><img src="<?php echo $sidebar_image_path; ?>" alt="<?php echo htmlspecialchars($row_latest['nazov']); ?>" /></a>
                            <p>
                                <strong><?php echo htmlspecialchars($row_latest['znacka'] . ' ' . $row_latest['nazov']); ?></strong>
                                (<?php echo htmlspecialchars($row_latest['typ']); ?>)<br>
                                <?php 
                                    $text = htmlspecialchars($row_latest['poznamka']);
                                    echo (strlen($text) > 100) ? substr($text, 0, 100) . '...' : $text; 
                                ?>
                            </p>
                        </article>
                        <?php
                    }
                } else {
                    echo "<p>Žiadne nože v evidencii.</p>";
                }
                ?>
            </div>
        </section>

        <section>
            <header class="major">
                <h2>Kontakt</h2>
            </header>
            <p>Máš otázky ohľadom flippovania alebo technických špecifikácií balisongov? Neváhaj ma kontaktovať.</p>
            <ul class="contact">
                <li class="icon solid fa-envelope"><a href="mailto:mihal.simo@gmail.com">mihal.simo@gmail.com</a></li>
                <li class="icon solid fa-phone">+421 123 456 789</li>
                <li class="icon solid fa-home">Nejaká cesta 26<br />Nitra, Slovensko</li>
            </ul>
        </section>

    </div>
</div>