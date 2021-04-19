<?php
/**
 * Author: Sydney Weddell
 * Date: 4/15/2021
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

    //get the id of a book
    public function getId() {
        return $this->id;
    }

    //get the title of a book
    public function getTitle() {
        return $this->title;
    }

    //get the ISBN of a book
    public function getIsbn() {
        return $this->isbn;
    }

    //get the category of a book
    public function getCategory() {
        return $this->category;
    }

    //get the publish date of a book
    public function getPublish_date() {
        return $this->publish_date;
    }

    //get the publisher of a book
    public function getPublisher() {
        return $this->publisher;
    }

    //get the image file name of a book
    public function getImage() {
        return $this->image;
    }

    //get the description of a book
    public function getDescription() {
        return $this->description;
    }

    //set book id
    public function setId($id) {
        $this->id = $id;
    }

}