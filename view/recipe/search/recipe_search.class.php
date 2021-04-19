<?php
/**
 * Author: Sydney Weddell
 * Date: 4/14/2021
 * File: recipe_search.class.php
 * Description:
 */

class RecipeSearch
{

    public function display($terms, $recipes) {
        //display page header
        parent::displayHeader("Search Results");
        ?>
        <div id="main-header"> Search Results for <i><?= $terms ?></i></div>
        <span class="rcd-numbers">
            <?php
            echo ((!is_array($recipes)) ? "( 0 - 0 )" : "( 1 - " . count($recipes) . " )");
            ?>
        </span>
        <hr>

        <!-- display all records in a grid -->
        <div class="grid-container">
            <?php
            if ($recipes === 0) {
                echo "No recipe was found.<br><br><br><br><br>";
            } else {
                //display recipes in a grid; three recipes per row
                foreach ($recipes as $i => $recipe) {
                    $id = $recipe->getId();
                    $title = $recipe->getTitle();
                    $category = $recipe->getRating();
                    $image = $recipe->getImage();
                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . RECIPE_IMG . $image;
                    }
                    if ($i % 3 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='col'><p><a href='" . BASE_URL . "/recipe/detail/$id'><img src='" . $image .
                        "'></a><span>$title<br>Rated $category<br>" . "</span></p></div>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($recipes) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>
        </div>
        <a href="<?= BASE_URL ?>/movie/index">Go to movie list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

}