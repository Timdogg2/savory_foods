<?php

class about extends IndexView{
        function display() {
            //display page header
            parent::displayHeader("Recipe Details");
    }
}
?>
<section class="about">
    <div class="food-photo">
        <img class="photo" src="<?= BASE_URL ?> /img/about-food.jpg">
    </div>
    <div class="about-title">
        <h1>About</h1>
    </div>
    <div class="info">
        <p>
            Savory Foods is a place for everyone to share their recipes with one another. Plus, it allows them to try
            new recipes of their choice. We have a wide selection of recipes in categories such as appetizers,
            breakfast, entrees, and desserts.
        </p>
    </div>
</section>

<?php
        //display page footer
parent::displayFooter();
?>
    


