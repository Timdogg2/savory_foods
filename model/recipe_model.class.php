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
    private $tblCategory;
    private $tblRecipes;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getRecipeModel method must be called.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblCategory = $this->db->getCategoryTable();
        $this->tblRecipes = $this->db->getRecipeTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

        //initialize Recipes
        if (!isset($_SESSION['recipes'])) {
            $categories = $this->get_category();
            $_SESSION['recipes'] = $categories;
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

        $sql = "SELECT * FROM " . $this->tblCategory . "," . $this->tblRecipes .
            " WHERE " . $this->tblCategory . ".Category_id=" . $this->tblRecipes . ".Category_id";

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
            $recipe = new Recipe(stripslashes($obj->title), stripslashes($obj->description), stripslashes($obj->ingrediants), stripslashes($obj->price), stripslashes($obj->Category_id), stripslashes($obj->image));

            //set the id for the recipe
            $recipe>setId($obj->id);

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
        //the select ssql statement
        $sql = "SELECT * FROM " . $this->tblCategory . "," . $this->tblRecipes .
            " WHERE " . $this->tblRecipes . ".recipes=" . $this->tblRecipes . ".Category_id" .
            " AND " . $this->tblCategory . ".id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a recipe object
            $recipe = new Recipe(stripslashes($obj->title), stripslashes($obj->description), stripslashes($obj->ingredients), stripslashes($obj->price), stripslashes($obj->Category_id), stripslashes($obj->image));

            //set the id for the recipe
            $recipe->setId($obj->id);

            return $recipe;
        }

        return false;
    }


    //search the database for recipes that match words in titles. Return an array of recipes if succeed; false otherwise.
    public function search_recipe($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND serach
        $sql = "SELECT * FROM " . $this->tblRecipes . "," . $this->tblCategory .
            " WHERE " . $this->tblRecipes . ".recipe=" . $this->tblCategory . ".category_id AND (1";

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
            $recipe = new Recipe($obj->title, $obj->description, $obj->ingredients, $obj->price, $obj->image);

            //set the id for the recipe
            $recipes->setId($obj->id);

            //add the recipe into the array
            $recipes[] = $recipe;
        }
        return $recipes;
    }

    //get all recipe categories
    private function get_recipe_category() {
        $sql = "SELECT * FROM " . $this->tblCategory;

        //execute the query
        $query = $this->dbConnection->query($sql);

        if (!$query) {
            return false;
        }

        //loop through all rows
        $categories = array();
        while ($obj = $query->fetch_object()) {
            $category[$obj->category] = $obj->category_id;
        }
        return $categories;
    }

}
