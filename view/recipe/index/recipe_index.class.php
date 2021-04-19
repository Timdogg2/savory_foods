<?php
/**
 * Author: Sydney Weddell
 * Date: 4/15/2021
 * File: recipe_index.class.php
 * Description:
 */

class RecipeIndex extends RecipeIndexView
{

    public function display($recipe, $confirm = "") {
        //display page header
        parent::displayHeader("Recipe Details");

        //retrieve recipe details by calling get methods
        $id = $recipe->getId();
        $title = $recipe->getTitle();
        $category = $recipe->getCategory();
        $description = $recipe->getDescription();
        $ingredients = $recipe->geIngredients();
        $price = $recipe->getPrice();
        $image = $recipe->getImage();


        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
            $image = BASE_URL . '/' . RECIPE_IMG . $image;
        }
        ?>

        <div id="main-header">Book Details</div>
        <hr>
        <!-- display recipe details in a table -->
        <table id="detail">
            <tr>
                <td style="width: 150px;">
                    <img src="<?= $image ?>" alt="<?= $title ?>" />
                </td>
                <td style="width: 130px;">
                    <p><strong>Title:</strong></p>
                    <p><strong>Category:</strong></p>
                    <p><strong>Description:</strong></p>
                    <p><strong>Ingredients:</strong></p>
                    <p><strong>Price:</strong></p>
                    <div id="button-group">
                        <input type="button" id="edit-button" value="   Edit   "
                               onclick="window.location.href = '<?= BASE_URL ?>/recipe/edit/<?= $id ?>'">&nbsp;
                    </div>
                </td>
                <td>
                    <p><?= $title ?></p>
                    <p><?= $category ?></p>
                    <p><?= $description->format('m-d-Y') ?></p>
                    <p><?= $ingredients ?></p>
                    <p><?= $price ?></p>
                    <p class="media-description"><?= $description ?></p>
                    <div id="confirm-message"><?= $confirm ?></div>
                </td>
            </tr>
        </table>
        <a href="<?= BASE_URL ?>/recipe/index">Go to recipe list</a>

        <?php
        //display page footer
        parent::displayFooter();
    }

}