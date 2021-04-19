<?php
/**
 * Author: James Hicks
 * Date: 4/19/2021
 * File: welcome_index.class.php
 * Description: This is the homepage of the savory foods, it displays a header, the home page, and a footer
 */

class WelcomeIndex extends IndexView
{
public function display(){
        //display page header
        parent::displyHeader();
        ?>
        <section class="home">
            <div class="image-title">
                <h1>Savory Foods</h1>
            </div>

            <div class="categories">
                <div class="category">
                    <div class="box appetizers">
                        <div class="image"><img class="image2" src="<?= BASE_URL ?>/img/appetizers.jpg" alt="appetizers"></div>
                        <div class="title">Appetizers</div>
                        <div class="learn-button">Learn More</div>
                    </div>
                    <div class="box breakfast">
                        <div class="image"><img src="<?= BASE_URL ?>/img/breakfast.jpg" alt="breakfast" class="image2"></div>
                        <div class="title">Breakfast</div>
                        <div class="learn-button">Learn More</div>
                    </div>
                    <div class="box entrees">
                        <div class="image"><img src="<?= BASE_URL ?>/img/entrees.jpg" alt="Entree" class="image2"></div>
                        <div class="title">Entrees</div>
                        <div class="learn-button">Learn More</div>
                    </div>
                    <div class="box desserts">
                        <div class="image"><img src="<?= BASE_URL ?>/img/dessert.jpg" alt="Dessert" class="image2"></div>
                        <div class="title">Desserts</div>
                        <div class="learn-button">Learn More</div>
                    </div>
                </div>
            </div>

        </section>

    <?php
        //display footer
        parent::displayFooter();
    }
}
