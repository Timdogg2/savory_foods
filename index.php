<?php
/**
 * Author: Tim Ware Jr.
 * Date: 4/19/2021
 * File: index.php
 * Description:
 */

require_once ("application/config.php");

//load autoloader
require_once ("vendor/autoload.php");

//load the dispatcher that dissects a request URL
new Dispatcher();