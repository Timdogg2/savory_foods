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
    private $id, $title, $description, $category, $price, $ingredients, $image;

    //the constructor that initializes all properties
    public function __construct($title, $description, $category, $ingredients, $price, $image) {
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
        $this->ingredients = $ingredients;
        $this->price = $price;
        $this->image = $image;
    }

    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }

    public function getIngredients(){
        return $this->ingredients;
    }

    public function getCategory() {
        return $this->category;
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
    public function setCategory($category){
        $this->category = $category;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function setImage($image){
        $this->image = $image;
    }
    public function setIngredients($ingredients){
        $this->ingredients = $ingredients;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function setTitle($title){
        $this->title = $title;
    }

}