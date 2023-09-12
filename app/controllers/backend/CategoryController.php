<?php
class CategoryController extends MainController {
    public function index(){
        $model = $this->loadModel('Category');
        $items = $model->all([
            'pagination' => true
        ]);
        $this->setView('backend.categories.index',$items);
    }
    public function edit(){
        $id = MCAppHelpper::getInput('id');
        $model = $this->loadModel('Category');
        $item = $model->find($id);
        $this->setView('backend.categories.edit',['item'=>$item]);
    }
}