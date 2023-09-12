<?php
class AppointmentController extends MainController {
    public function index(){
        $model = $this->loadModel('Appointment');
        $items = $model->all([
            'pagination' => true
        ]);
        pr($items);
        $this->setView('backend.appointments.index',$items);
    }
}