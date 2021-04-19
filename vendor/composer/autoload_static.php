<?php

namespace Composer\Autoload;

class ComposerStaticInit2aa62ca7900cf9d7c7258cee3d36ecdf
{
    public static $classMap = array (
        'recipe' => __DIR__ . '/../..' . '/model/recipe.class.php',
        'recipeController' => __DIR__ . '/../..' . '/controller/recipe_controller.class.php',
        'welcomeController' => __DIR__ . '/../..' . '/controller/welcome_controller.class.php',
        'recipeDetail' => __DIR__ . '/../..' . '/view/recipe/detail/recipe_detail.class.php',
        'ComposerAutoloaderInit2aa62ca7900cf9d7c7258cee3d36ecdf' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit2aa62ca7900cf9d7c7258cee3d36ecdf' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Database' => __DIR__ . '/../..' . '/application/database.class.php',
        'Dispatcher' => __DIR__ . '/../..' . '/application/dispatcher.class.php',
        'IndexView' => __DIR__ . '/../..' . '/views/index_view.class.php',
        'recipeEdit' => __DIR__ . '/../..' . '/view/recipe/edit/recipe_edit.class.php',
        'recipeError' => __DIR__ . '/../..' . '/view/recipe/error/recipe_error.class.php',
        'recipeIndex' => __DIR__ . '/../..' . '/view/recipe/index/recipe_index.class.php',
        'recipeIndexView' => __DIR__ . '/../..' . '/view/recipe/recipe_index_view.class.php',
        'recipeModel' => __DIR__ . '/../..' . '/model/recipe_model.class.php',
        'recipeSearch' => __DIR__ . '/../..' . '/view/recipe/search/recipe_search.class.php',
        'welcomeIndex' => __DIR__ . '/../..' . '/view/welcome/welcome_index.class.php',
        'aboutIndex' => __DIR__ . '/../..' . '/view/welcome/about.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit2aa62ca7900cf9d7c7258cee3d36ecdf::$classMap;

        }, null, ClassLoader::class);
    }
}
