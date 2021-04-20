<?php
/**
 * Author: Timothy Ware Jr.
 * Date: 4/19/2021
 * File: config.php
 * Description:
 */

error_reporting(E_ALL);

//local time zone
date_default_timezone_set('America/New_York');

//base url of the application
define("BASE_URL", "http://localhost/I211/savory-foods");

/*************************************************************************************
 *                       settings for Recipes                                       *
 ************************************************************************************/

//define default path for media images
define("FOOD_IMG", "www/img/");
