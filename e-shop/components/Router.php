<?php

class Router {
    
    private $routes;
    
    public function __construct() {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include $routesPath;
    }
    
    /**
     * Returns request string
     * @return string
     */
    private function getURI(){
        if ( !empty($_SERVER['REQUEST_URI']) ) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    
    public function run() {
        // Отримання рядка запиту
        $uri = $this->getURI();
        
        // Перевірка наявності такого запиту в Rutes
        foreach ($this->routes as $uriPattern => $path) {
            // Порівняння $uriPattern і $uri
            if (preg_match("~$uriPattern~", $uri) ) {
                //Визначаємо внутрішний шлях
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                
                // Визначаємо Controller, action та параметри
                $segments = explode('/', $internalRoute);
                
                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);
                
                $actionName = 'action'.ucfirst(array_shift($segments));
                
                $parameters = $segments;
                                
                // Підключення файлу класу Controller
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                
                if (file_exists($controllerFile) ) {
                    include_once $controllerFile;
                }
                
                //Створити об'єкт класу Controller, викликати метод action
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                
                if ( $result != null ) {
                    break;
                }
            }
        }
    }
    
}
