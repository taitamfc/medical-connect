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

        if( count($_POST) ){
            $data = MCAppHelpper::getPostData();
            $model->update($id,$data);
            $this->redirect( MCAppHelpper::getCurrentUrl(['id'=> $id,'success'=>1]) );
        }

        $this->setView('backend.categories.edit',['item'=>$item]);
    }
    public function create(){
        $model = $this->loadModel('Category');
        if( count($_POST) ){
            $data = MCAppHelpper::getPostData();
            $model->save($data);
            $this->redirect( MCAppHelpper::getCurrentUrl(['action'=> 'index','success'=>1]) );
        }
        $this->setView('backend.categories.edit',['item'=>null]);
    }
    public function destroy(){
        $id = MCAppHelpper::getInput('id');
        $model = $this->loadModel('Category');
        $model->delete($id);
        $this->redirect( MCAppHelpper::getCurrentUrl(['action'=> 'index','success'=>1]) );
    }
}