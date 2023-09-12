<?php
class AppointmentModel extends MainModel {
    public function __construct(){
        parent::__construct();
        $this->table = 'wp_bookly_appointments';
    }
}