<?php
class MCAppHelpper {
    public static function loadController($controllerName,$action = 'index'){
        include_once MC_PATH.'app/controllers/MainController.php';
        include_once MC_PATH.'app/controllers/backend/'.$controllerName.'Controller.php';
        $className = $controllerName.'Controller';
        $obj = new $className;
        $obj->$action();
    }
    public static function loadModel($modelName,$instance = false){
        include_once MC_PATH.'app/models/MainModel.php';
        include_once MC_PATH.'app/models/'.$modelName.'Model.php';
        if($instance){
            $className = $modelName.'Model';
            $obj = new $className;
            return $obj;
        }
    }
    public static function setView($viewName,$data = []){
        $viewName = str_replace('.','/',$viewName);
        if( count($data) ){
            extract($data);
        }
        include_once MC_PATH.'app/views/'.$viewName.'.php';
    }
    public static function buidUrl($controller = 'Dashboard',$action = 'index',$params = []){
        $urls = [
            'controller'    => $controller,
            'action'        => $action,
        ];
        return admin_url('admin.php?page='.MC_PLUGIN_BACKEND_URL).'&'.http_build_query($urls);
    }

    public static function getCurrentUrl($params = []){
        $controller = isset($_GET['controller']) && $_GET['controller'] ? $_GET['controller'] : '';
        $action = isset($_GET['action']) && $_GET['action'] ? $_GET['action'] : 'index';

        $f_action = isset($params['action']) ? $params['action'] : '';
        $f_controller = isset($params['controller']) ? $params['controller'] : '';
        
        if($f_action){
            $action = $f_action;
        }

        if($f_controller){
            $controller = $f_controller;
        }
        return self::buidUrl($controller,$action);
    }

    public static function getInput($name,$default = ''){
        return isset( $_REQUEST[$name] ) && $_REQUEST[$name] !== '' ? $_REQUEST[$name] : $default;
    }

}