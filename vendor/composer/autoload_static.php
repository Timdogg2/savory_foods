<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2aa62ca7900cf9d7c7258cee3d36ecdf
{
    public static $classMap = array (
        'ComposerAutoloaderInit2aa62ca7900cf9d7c7258cee3d36ecdf' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit2aa62ca7900cf9d7c7258cee3d36ecdf' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Database' => __DIR__ . '/../..' . '/application/database.class.php',
        'Dispatcher' => __DIR__ . '/../..' . '/application/dispatcher.class.php',
        'IndexView' => __DIR__ . '/../..' . '/view/index_view.class.php',
        'Recipe' => __DIR__ . '/../..' . '/model/recipe.class.php',
        'RecipeController' => __DIR__ . '/../..' . '/controller/recipe_controller.class.php',
        'RecipeDetail' => __DIR__ . '/../..' . '/view/recipe/detail/recipe_detail.class.php',
        'RecipeEdit' => __DIR__ . '/../..' . '/view/recipe/edit/recipe_edit.class.php',
        'RecipeError' => __DIR__ . '/../..' . '/view/recipe/error/recipe_error.class.php',
        'RecipeIndex' => __DIR__ . '/../..' . '/view/recipe/index/recipe_index.class.php',
        'RecipeIndexView' => __DIR__ . '/../..' . '/view/recipe/recipe_index_view.class.php',
        'RecipeModel' => __DIR__ . '/../..' . '/model/recipe_model.class.php',
        'RecipeSearch' => __DIR__ . '/../..' . '/view/recipe/search/recipe_search.class.php',
        'WelcomeController' => __DIR__ . '/../..' . '/controller/welcome_controller.class.php',
        'WelcomeIndex' => __DIR__ . '/../..' . '/view/welcome/welcome_index.class.php',
        'about' => __DIR__ . '/../..' . '/view/about/about.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit2aa62ca7900cf9d7c7258cee3d36ecdf::$classMap;

        }, null, ClassLoader::class);
    }
}
