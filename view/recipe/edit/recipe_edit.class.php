<?php


class RecipeEdit extends IndexView
{
    //display a movie in a form for editing
    public function edit($id) {
        //retrieve the specific movie
        $recipe = $this->recipe_model->view_recipe($id);

        if (!recipe) {
            //display an error
            $message = "There was a problem displaying the recipe id='" . $id . "'.";
            $this->error($message);
            return;
        }

        $view = new RecipeEdit();
        $view->display($recipe);
    }

    public function display($recipe) {
        //display page header
        parent::displayHeader("Edit Recipe");

        //get recipe ratings from a session variable
        if (isset($_SESSION['recipes'])) {
            $category = $_SESSION['recipes'];
        }

        //retrieve recipe details by calling get methods
        $id = $recipe->getId();
        $title = $recipe->getTitle();
        $description = $recipe->getDescription();
        $category = $recipe->getCategory();
        $ingrediants = $recipe->getIngrediants();
        $price = $recipe->getPrice();
        $image = $recipe->getImage();
        ?>

        <div id="main-header">Edit Recpie Details</div>

        <!-- display movie details in a form -->
        <form class="new-media"  action='<?= BASE_URL . "/recipe/update/" . $id ?>' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
            <input type="hidden" name="id" value="<?= $id ?>">
            <p><strong>Title</strong><br>
                <input name="title" type="text" size="100" value="<?= $title ?>" required autofocus></p>
            <p><strong>Category</strong>:
                <?php
                //echo gettype($category);
                foreach ($_SESSION['categories'] as $r_category => $id) {
                    $checked = ($category == $r_category ) ? "checked" : "";
                    echo "<input type='radio' name='Category_id' value='$id' $checked> $r_category &nbsp;&nbsp;";
                }
                ?>
            </p>
            <p><strong>Ingrediants</strong>: <input name="Ingrediants" type="text" value="<?= $ingrediants ?>" required=""></p>
            <p><strong>Price</strong>: Separate directors with commas<br>
                <input name="director" type="text" size="40" value="<?= $price ?>" required=""></p>
            <p><strong>Image</strong>: url (http:// or https://) or local file including path and file extension<br>
                <input name="image" type="text" size="100" required value="<?= $image ?>"></p>
            <p><strong>Description</strong>:<br>
                <textarea name="description" rows="8" cols="100"><?= $description ?></textarea></p>
            <input type="submit" name="action" value="Update Recipe">
            <input type="button" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/recipe/detail/" . $id ?>"'>
        </form>
        <?php
        //display page footer
        parent::displayFooter();
    }

    //update a movie in the database
    public function update($id) {
        //update the movie
        $update = $this->recipe_model->update_recipe($id);
        if (!$update) {
            //handle errors
            $message = "There was a problem updating the recipe id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //display the updateed movie details
        $confirm = "The movie was successfully updated.";
        $recipe= $this->recipe_model->view_recipe($id);

        $view = new RecipeDetail();
        $view->display($recipe, $confirm);
    }

    public function update_recipe($id) {
        //if the script did not received post data, display an error message and then terminite the script immediately
        if (!filter_has_var(INPUT_POST, 'title') ||
            !filter_has_var(INPUT_POST, 'category') ||
            !filter_has_var(INPUT_POST, 'ingredients') ||
            !filter_has_var(INPUT_POST, 'price') ||
            !filter_has_var(INPUT_POST, 'image') ||
            !filter_has_var(INPUT_POST, 'description')) {

            return false;
        }

        //retrieve data for the new movie; data are sanitized and escaped for security.
        $title = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)));
        $category= $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_STRING)));
        $ingredients = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'release_date', FILTER_DEFAULT));
        $price = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'director', FILTER_SANITIZE_STRING)));
        $image = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
        $description = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

        //query string for update
        $sql = "UPDATE " . $this->tblRecipe .
            " SET title='$title', rating='$category', release_date='$ingredients', director='$price', "
            . "image='$image', description='$description' WHERE id='$id'";

        //execute the query
        return $this->dbConnection->query($sql);
    }

//end of display method
}