<?php
/**
 * Author: James Hicks
 * Date: 4/20/2021
 * File: welcome_controller.class.php
 * Description: The welcome controller gets the WelcomeIndex and displays the information.
 */

class WelcomeController
{
public function index(){
    $view = new WelcomeIndex();
    $view->display();
}
}
