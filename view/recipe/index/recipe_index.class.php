<?php
/**
 * Author: Sydney Weddell
 * Date: 4/15/2021
 * File: recipe_index.class.php
 * Description:
 */

class RecipeIndex extends RecipeIndexView
{
    /*
     * the display method accepts an array of movie objects and displays
     * them in a grid.
     */

    public function display($recipes) {
        //display page header
        parent::displayHeader("List All Recipes");
        ?>
        <div id="main-header"> Recipes in the Library</div>

        <div class="grid-container">
            <?php
            if ($recipes === 0) {
                echo "No recipe was found.<br><br><br><br><br>";
            } else {
                //display movies in a grid; six movies per row
                foreach ($recipes as $i => $recipe) {
                    $id = $recipe->getId();
                    $title = $recipe->getTitle();
                    $category = $recipe->getCategory();
                    $description = $recipe->getDescription();
                    $image = $recipe->getImage();
                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . FOOD_IMG . $image;
                    }
                    if ($i % 6 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='col'><p><a href='", BASE_URL, "/recipe/detail/$id'><img src='" . $image .
                        "'></a><span>$title<br>Rated $category<br>" . $description() . "</span></p></div>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($recipes) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>
        </div>

        <?php
        //display page footer
        parent::displayFooter();
    } //end of display method
}