<?php
class LocationController extends MainController {
    public function index(){
        $model = $this->loadModel('Location');
        $items = $model->all([
            'pagination' => true
        ]);
        $this->setView('backend.locations.index',$items);
    }
}