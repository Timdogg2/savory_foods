<?php
/*
 *
 * Author: James Hicks, Timothy Ware, Jamal, Syndey.
 * Date: 4/25/2021
 * File: add_recipe_index_view.class.php
 * Description: This script displays a form to accept a new recipe details.*/

class AddRecipeIndexView extends RecipeIndexView
{
    public static function displayHeader($title)
    {
        parent::displayHeader($title)
            ?>
        <script>
            //the media type
            var food= 'recipe';
        </script>
        <h2>Add New Recipe</h2>
        <form action="../../../index.php" method="post">
            <table cellspacing="0" cellpadding="3">
            <tr>
                <td>Title: </td>
                <td><input name="Title" type="text" size="40" required/></td>
            </tr>
            <tr>
                <td>Description: </td>
                <td><textarea name="description" rows="6" cols="65"></textarea></td>
            </tr>
            <tr>
                <td>Ingrediants: </td>
                <td><textarea name="ingrediants" cols="65" rows="6"></textarea></td>
            </tr>
            <tr>
                <td>Category: </td>
                <td>
                    <select name="Category_id">
                        <option value="1">Breakfast</option>
                        <option value="2">Lunch</option>
                        <option value="3">Dinner</option>
                        <option value="4">Dessert</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Image: </td>
                <td><input name="image" type="text" size="40" required/></td>
            </tr>
            <tr>
                <td>Price: </td>
                <td><input name="price" type="number" step="0.01" size="40" required/></td>
            </tr>
            </table>


            <div>
                <input type="submit" value="Add Recipe">
                <input type="button" value="Cancel" onclick="window.location.href='<?= BASE_URL ?>/recipe/detail'"/>
            </div>
        </form>


<?php
}
}