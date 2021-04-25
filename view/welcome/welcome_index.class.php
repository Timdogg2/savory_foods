<?php
/**
 * Author: Tim Ware Jr.
 * Date: 4/19/2021
 * File: welcome_index.class.php
 * Description:
 */

class WelcomeIndex extends IndexView
{

    public function display() {
        //display page header
        parent::displayHeader();
        ?>
        <div id="main-header">Welcome to Savory Food Recipes!</div>
        <br>
        <table style="border: none; width: 700px; margin: 5px auto">
            <tr>
                <td colspan="2" style="text-align: center"><strong>Major features include:</strong></td>
            </tr>
            <tr>
                <td style="text-align: left">
                    <ul>
                        <li>List all Recipes</li>
                        <li>Display details of specific Recipes</li>
                        <li>Update or delete existing Recipes</li>
                        <li>Add new Recipe</li>
                    </ul>
                </td>
                <td style="text-align: left">
                    <ul>
                        <li>Search for Recipes</li>
                        <li>Autosuggestion</li>
                        <li>Filter Recipes</li>
                        <li>Sort Recipes</li>
                        <li>Pagination</li>
                    </ul></td>
            </tr>
        </table>

        <br>

        <div id="thumbnails" style="text-align: center; border: none">
            <p>Click an image below to explore a Recipe. Click the logo in the banner to come back to this page.</p>

            <a href="<?= BASE_URL ?>/recipe/index"> <img src="<?= BASE_URL ?>/www/img/recipes.jpg" title="Recipe Library"/> </a>
            <a href="<?= BASE_URL ?>/recipe/index"> <img src="<?= BASE_URL ?>/www/img/entrees.jpg" title="entree Library"/>  </a>
            <a href="#"> <img src="<?= BASE_URL ?>/www/img/dessert.jpg" title="Recipe Library" /> </a>
            <a href="#"> <img src="<?= BASE_URL ?>/www/img/appetizers.jpg" title="appetizers Library" /> </a>
        </div>
        <br>

        <?php
        //display page footer
        parent::displayFooter();
    }

}