<?php
/**
 * Author: Tim Ware Jr.
 * Date: 4/20/2021
 * File: recipe.class.php
 * Description:
 */

class Recipe
{

    //private properties of a Recipe object
    private $id, $Title, $description, $ingrediants, $price, $categories, $image;

    //the constructor that initializes all properties
    public function __construct($title, $description,  $ingrediants, $price, $categories, $image) {
        $this->Title = $title;
        $this->description = $description;
        $this->ingrediants = $ingrediants;
        $this->price = $price;
        $this->Category_id = $categories;
        $this->image = $image;
    }

    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->Title;
    }

    public function getIngrediants(){
        return $this->ingrediants;
    }

    public function getCategory() {
        return $this->Category_id;
    }


    public function getImage() {
        return $this->image;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice(){
        return $this->price;
    }



    public function setId($id){
        $this->id = $id;
    }
//    public function setCategory($categories){
//        $this->categories = $categories;
//    }
//
//    public function setDescription($description){
//        $this->description = $description;
//    }
//
//    public function setImage($image){
//        $this->image = $image;
//    }
//    public function setIngredients($ingredients){
//        $this->ingredients = $ingredients;
//    }
//
//    public function setPrice($price){
//        $this->price = $price;
//    }
//
//    public function setTitle($title){
//        $this->title = $title;
//    }

}