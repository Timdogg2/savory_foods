<?php
/**
 * Author: Tim Ware Jr.
 * Date: 4/15/2021
 * File: recipe_controller.class.php
 * Description:
 */

class RecipeController{

    private $recipe_model;

    //default constructor
    public function __construct() {
        //create an instance of the MovieModel class
        $this->recipe_model = RecipeModel::getRecipeModel();
    }

    //index action that displays all movies
    public function index() {
        //retrieve all recipes and store them in an array
        $recipes = $this->recipe_model->list_recipes();

        if (!$recipes) {
            //display an error
            $message = "There was a problem displaying recipes.";
            $this->error($message);
            return;
        }

        // display all recipes
        $view = new RecipeIndex();
        $view->display($recipes);
    }

    //show details of a recipe
    public function detail($id) {
        //retrieve the specific recipe
        $recipe = $this->recipe_model->view_recipe($id);

        if (!$recipe) {
            //display an error
            $message = "There was a problem displaying the recipe id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //display recipe details
        $view = new RecipeDetail();
        $view->display($recipe);
    }

    //display a recipe in a form for editing
    public function edit($id) {
        //retrieve the specific recipe
        $recipe = $this->recipe_model->view_recipe($id);

        if (!$recipe) {
            //display an error
            $message = "There was a problem displaying the recipe id='" . $id . "'.";
            $this->error($message);
            return;
        }

        $view = new RecipeEdit();
        $view->display($recipe);
    }

    //update a movie in the database
    public function update($id) {
        //update the recipe
        $update = $this->recipe_model->update_recipies($id);
        if (!$update) {
            //handle errors
            $message = "There was a problem updating the recipe id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //display the updateed recipe details
        $confirm = "The recipe was successfully updated.";
        $recipe = $this->recipe_model->view_recipe($id);

        $view = new RecipeDetail();
        $view->display($recipe, $confirm);
    }

    //search movies
    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all recipes
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching recipes
        $recipes = $this->recipe_model->search_recipe($query_terms);

        if ($recipes === false) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }
        //display matched recipes
        $search = new RecipeSearch();
        $search->display($query_terms, $recipes);
    }

    //autosuggestion
    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $recipes = $this->recipe_model->search_recipe($query_terms);

        //retrieve all recipe titles and store them in an array
        $Titles = array();
        if ($recipes) {
            foreach ($recipes as $recipe) {
                $Titles[] = $recipe->getTitle();
            }
        }

        echo json_encode($Titles);
    }

    //handle an error
    public function error($message) {
        //create an object of the Error class
        $error = new RecipeError();

        //display the error page
        $error->display($message);
    }

    //handle calling inaccessible methods
    public function __call($name, $arguments) {
        //$message = "Route does not exist.";
        // Note: value of $name is case sensitive.
        $message = "Calling method '$name' caused errors. Route does not exist.";

        $this->error($message);
        return;
    }

}