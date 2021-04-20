<?php
/**
 * Author: Tim Ware Jr.
 * Date: 4/20/2021
 * File: recipe_index_view.class.php
 * Description:
 */

class RecipeIndexView extends IndexView
{
    public static function displayHeader($title) {
        parent::displayHeader($title)
        ?>
        <script>
            //the media type
            var food = "recipe";
        </script>
        <!--create the search bar -->
        <div id="searchbar">
            <form method="get" action="<?= BASE_URL ?>/recipe/search">
                <input type="text" name="query-terms" id="searchtextbox" placeholder="Search recipes by title" autocomplete="off" onkeyup="handleKeyUp(event)">
                <input type="submit" value="Go" />
            </form>
            <div id="suggestionDiv"></div>
        </div>
        <?php
    }

    public static function displayFooter() {
        parent::displayFooter();
    }

}