<?php
class MainController {
    public function loadModel($modelName,$instance = true){
        return MCAppHelpper::loadModel($modelName,$instance);
    }
    public function setView($viewName,$data = []){
        MCAppHelpper::setView($viewName,$data);
    }
}