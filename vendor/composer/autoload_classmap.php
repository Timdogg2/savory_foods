<?php

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'ComposerAutoloaderInit2aa62ca7900cf9d7c7258cee3d36ecdf' => $vendorDir . '/composer/autoload_real.php',
    'Composer\\Autoload\\ClassLoader' => $vendorDir . '/composer/ClassLoader.php',
    'Composer\\Autoload\\ComposerStaticInit2aa62ca7900cf9d7c7258cee3d36ecdf' => $vendorDir . '/composer/autoload_static.php',
    'Database' => $baseDir . '/application/database.class.php',
    'Dispatcher' => $baseDir . '/application/dispatcher.class.php',
    'IndexView' => $baseDir . '/view/index_view.class.php',
    'recipe' => $baseDir . '/model/recipe.class.php',
    'recipeController' => $baseDir . '/controller/recipe_controller.class.php',
    'recipeDetail' => $baseDir . '/view/recipe/detail/recipe_detail.class.php',
    'recipeEdit' => $baseDir . '/view/recipe/edit/recipe_edit.class.php',
    'recipeError' => $baseDir . '/view/recipe/error/recipe_error.class.php',
    'recipeIndex' => $baseDir . '/view/recipe/index/recipe_index.class.php',
    'recipeIndexView' => $baseDir . '/view/recipe/recipe_index_view.class.php',
    'recipeModel' => $baseDir . '/model/recipe_model.class.php',
    'recipeSearch' => $baseDir . '/view/recipe/search/recipe_search.class.php',
    'welcomeController' => $baseDir . '/controller/welcome_controller.class.php',
    'welcomeIndex' => $baseDir . '/view/welcome/welcome_index.class.php',
    'aboutIndex' => $baseDir . '/view/welcome/about.class.php',
);

