<?php

/*
Другой способ добавлять обработчики маршрутов в App это использовать методы, названные по именам глаголов http. Например $app->get($path, $func).
src/App/Application.php

Реализуйте интерфейс ApplicationInterface в классе Application.

Пример:

<?php

$app = new \App\Application();

$app->get('/', function () {
    return 'hello, world!';
});

$app->post('/sign_in', function () {
    return 'sign in';
});

$app->run();

Подсказки

    $_SERVER['REQUEST_METHOD'] - содержит текущий http метод.
*/

    public function run()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        foreach ($this->handlers as $item) {
            list($route, $handlerMethod, $handler) = $item;
            $preparedRoute = preg_quote($route, '/');
            if ($method == $handlerMethod && preg_match("/^$preparedRoute$/i", $uri)) {
                echo $handler();
                return;
            }
        }
    }

    private function append($method, $route, $handler)
    {
        $this->handlers[] = [$route, $method, $handler];
    }
    
    // END
}
