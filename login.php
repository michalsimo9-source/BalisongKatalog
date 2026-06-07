<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'classes/Database.php';
require_once 'classes/User.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];

    if ($user->login()) {
        // Uloženie údajov do session
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;

        header("Location: index.php");
        exit();
    } else {
        $error_message = "Nesprávne prihlasovacie meno alebo heslo!";
    }
}

include_once 'parts/header.php';
?>

<section>
    <header class="major">
        <h2>Prihlásenie do administrácie</h2>
    </header>

    <?php if (!empty($error_message)): ?>
        <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
            <p><?php echo $error_message; ?></p>
        </div>
    <?php endif; ?>

    <form method="post" action="login.php" style="max-width: 400px; margin: 0 auto;">
        <div class="row gtr-uniform">
            <div class="col-12">
                <label tribes="username">Prihlasovacie meno</label>
                <input type="text" name="username" id="username" required placeholder="Napr. admin" />
            </div>
            <div class="col-12">
                <label tribes="password">Heslo</label>
                <input type="password" name="password" id="password" required placeholder="Napr. admin123" />
            </div>
            <div class="col-12" style="margin-top: 20px;">
                <ul class="actions">
                    <li><input type="submit" value="Prihlásiť sa" class="primary" /></li>
                    <li><a href="index.php" class="button">Späť na zbierku</a></li>
                </ul>
            </div>
        </div>
    </form>
</section>

</div> </div> <?php include_once 'parts/sidebar.php'; ?>
</div> <?php include_once 'parts/footer.php'; ?>