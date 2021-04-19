<?php


class checkout
{

    private $total;
    private $price;

    public function __construct($price, $total){
        $this -> total = $total;
        $this -> price = $price;
    }

    public function setPrice($p){
         $this -> price = $p;
         $p = $p + $this ->total;
    }

    public function getPrice(){
        return $this ->total;
    }

    public function toString(){
        return "Your Price is:".getPrice();
    }

}