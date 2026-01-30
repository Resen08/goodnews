<?php
include ('classes/HTMLPage.class.php');

$html = new HTMLPage();
print $html->head('Good News');
print '
        <div class="container">
            <section id="loginform"><br>
                <h2>Good News</h2>
                <form action="login.php" method="POST">
                    <p><input type="text" id="user" name="user" placeholder="Benutzername"></p>
                    <p><input type="password" id="password" name="password" placeholder="Passwort"></p>
                    <p><input type="submit" id="senden" name="senden" value="login"></p>
                </form>
                <a href="index.php?haha">Registrieren</a>
            </section>
            <div id="info">
                <img src="img/vibebelike.webp" alt="Vibe Be Like">
            </div>
        </div>
';
print $html->foot();