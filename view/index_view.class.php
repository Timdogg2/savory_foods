<?php
/**
 * Author: Tim Ware Jr.
 * Date: 4/18/2021
 * File: index_view.class.php
 * Description:
 */

class IndexView
{
    //this method displays the page header
    static public function displayHeader($page_title) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title><?php echo $page_title ?></title>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Savory Foods | Home</title>
        <link rel="stylesheet" href='<? BASE_URL ?>/www/css/styles.css'/>
        <script>
            //create the JavaScript variable for the base url
            var base_url = "<?= BASE_URL ?>";
        </script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Piedra&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    </head>
    <body>
        <nav>
            <div class="logo">
                <span>Savory Foods</span>
            </div>
            <div class="links">
                <a href="/index.php">Home</a>
                <a href="<?BASE_URL?> recipe/index/recipes_index.class.php">Recipes</a>
                <a href="<?BASE_URL?> /index/about_index.php">About</a>
            </div>
            <button class="login"><a href="<?BASE_URL?> login.php">Login</a></button>
        </nav>
    <?php
}//end of displayHeader function

                //this method displays the page footer
public static function displayFooter() {
    ?>
    <br><br><br>
    <footer>
        <p class="copy">Copyright 2021 Savory Foods. All rights reserved</p>
    </footer>
    </body>
    </html>
    <?php
    } //end of displayFooter function
}
