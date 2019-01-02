

<?php

/*
Проставьте неймспейсы в классах, опираясь на то, как они вызываются в тестах test.php
*/

namespace Tests;

class Test extends \PHPUnit_Framework_TestCase
{
    public function testClasses()
    {
        $oneClass = new \App\First();
        $this->assertInstanceOf(\App\First::class, $oneClass);

        $anotherClass = new \App\Inner\First();
        $this->assertInstanceOf(\App\Inner\First::class, $anotherClass);
    }
}

