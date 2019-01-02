<?php
/*
Зарегистрируйте автозагрузчик классов так, чтобы тесты прошли.
*/


namespace App;

// BEGIN (write your solution here)
// Variant 1 (равноценно)
//require 'Framework/Router.php';
//require 'Framework/Controller/Base.php';


// Variant 2 
spl_autoload_register(function ($class){
    $path=dirname(__FILE__)."/". str_replace("\\","/", $class ).'.php';
    require_once $path;
    //spl_autoload($path);
});




// END

class Test extends \PHPUnit_Framework_TestCase
{
    public function testClasses()
    {
        $router = new \Framework\Router();
        $this->assertInstanceOf('Framework\Router', $router);

        $controller = new \Framework\Controller\Base();
        $this->assertInstanceOf('Framework\Controller\Base', $controller);
    }
}

