<?php
/**
 * Author: Sydney Weddell
 * Date: 4/15/2021
 * File: recipe_model.class.php
 * Description:
 */

class RecipeModel
{
//private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblRecipes;
    private $tblCategories;


    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getRecipeModel method must be called.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblCategories = $this->db->getCategoryTable();
        $this->tblRecipes = $this->db->getRecipeTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

//        initialize Recipes
        if (!isset($_SESSION['categories'])) {
            $categories = $this->get_recipe_category();
            $_SESSION['categories'] = $categories;
        }
    }

    //static method to ensure there is just one RecipeModel instance
    public static function getRecipeModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new RecipeModel();
        }
        return self::$_instance;
    }

    /*
     * the list_Recipe method retrieves all recipe from the database and
     * returns an array of Recipe objects if successful or false if failed.
     * Recipes should also be filtered by ratings and/or sorted by titles or rating if they are available.
     */

    public function list_recipes() {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

        $sql = "SELECT * FROM " . $this->tblCategories . "," . $this->tblRecipes .
            " WHERE " . $this->tblCategories . ".Category_id=" . $this->tblRecipes . ".Category_id";


        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false.
        if (!$query)
            return false;

        //if the query succeeded, but no Recipe was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned recipes
        $recipes = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {

            $recipe = new Recipe(stripslashes($obj->Title), stripslashes($obj->description), stripslashes($obj->ingrediants), stripslashes($obj->price), stripslashes($obj->Category_id), stripslashes($obj->image));

            //set the id for the recipe
            $recipe->setId($obj->id);

            //add the recipe into the array
            $recipes[] = $recipe;
        }
        return $recipes;
    }

    /*
     * the viewRecipe method retrieves the details of the recipe specified by its id
     * and returns a recipe object. Return false if failed.
     */

    public function view_recipe($id) {
        //the select sql statement
//        $sql = "SELECT * FROM " . $this->tblRecipes . "," . $this->tblCategories .
//            " WHERE " . $this->tblRecipes . ".recipes=" . $this->tblCategories . ".Category_id" .
//            " AND " . $this->tblRecipes . ".id='$id'";
        $sql = "SELECT * FROM " . $this->tblRecipes . " INNER JOIN " . $this->tblCategories . " ON recipes.Category_id=categories.Category_id" . " WHERE " . "id='$id'";
        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a recipe object
            $recipe = new Recipe(stripslashes($obj->Title), stripslashes($obj->description), stripslashes($obj->ingrediants), stripslashes($obj->price),stripslashes($obj->Category_id), stripslashes($obj->image));

            //set the id for the recipe
            $recipe->setId($obj->id);

            return $recipe;
        }

        return false;
    }

    //the update_recipes method updates an existing recipe in the database. Details of the recipe are posted in a form. Return true if succeeed; false otherwise.
     public function update_recipe($id){
        if(!filter_has_var(INPUT_POST, 'Title')||
        !filter_has_var(INPUT_POST,'description')||
        !filter_has_var(INPUT_POST, 'ingrediants')||
        !filter_has_var(INPUT_POST,'price')||
        !filter_has_var(INPUT_POST,'Category_id')||
        !filter_has_var(INPUT_POST,'image')) {
            return false;
        }
        //retrieve data for the new recipe; data are sanitized and escaped for security.
         $title = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST,'Title',FILTER_SANITIZE_STRING)));
         $description = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST,'description',FILTER_SANITIZE_STRING)));
         $ingrediants = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST,'ingrediants',FILTER_SANITIZE_STRING)));
         $price = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST,'price',FILTER_SANITIZE_STRING)));
         $Category = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST,'Category_id',FILTER_SANITIZE_STRING)));
         $image = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST,'image',FILTER_SANITIZE_STRING)));

         //query string for update
         $sql = "UPDATE" . $this->tblRecipes .
             "SET Title='$title', description='$description', ingrediants='$ingrediants', price='$price', Category_id='$Category', image='$image'"
            . "WHERE id='$id'";
         //execute the query
         return $this->dbConnection->query($sql);
     }


    //search the database for recipes that match words in titles. Return an array of recipes if succeed; false otherwise.
    public function search_recipe($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND serach
        $sql = "SELECT * FROM " . $this->tblRecipes . "," . $this->tblCategories .
            " WHERE " . $this->tblRecipes . ".recipe=" . $this->tblCategories . ".Category_id AND (1";

        foreach ($terms as $term) {
            $sql .= " AND title LIKE '%" . $term . "%'";
        }

        $sql .= ")";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false.
        if (!$query)
            return false;

        //search succeeded, but no recipe was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 recipe found.
        //create an array to store all the returned recipes
        $recipes = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $recipe = new Recipe($obj->Title, $obj->description, $obj->ingrediants, $obj->price, $obj->Category_id, $obj->image);

            //set the id for the recipe
            $recipes->setId($obj->id);

            //add the recipe into the array
            $recipes[] = $recipe;
        }
        return $recipes;
    }

    //get all recipe categories
    private function get_recipe_category() {
        $sql = "SELECT * FROM " . $this->tblCategories;
        //execute the query
        $query = $this->dbConnection->query($sql);

        if (!$query) {
            return false;
        }

        //loop through all rows
        $categories = array();
        while ($obj = $query->fetch_object()) {
            $categories[$obj->Category_id] = $obj->name;
        }
        return $categories;
    }

}