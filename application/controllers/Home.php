<?php

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Heatmap_model');
    }

    public function index() {

        $data['judul'] = 'HADDS - Informasi Heatmap Dalam Ruangan';

        $data['floors'] = $this->Heatmap_model->getFloorsByBuilding(0);
        $data['heatmap'] = $this->getCoordinates(1);
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer', $data);

    }

    public function getCoordinates($id, $date_begin = null, $date_end = null){

        if ($date_begin === null && $date_end=== null) {
            return $this->Heatmap_model->getCoordinates($id);
        } else {
            return $this->Heatmap_model->getCoordinates($id, $date_begin, $date_end);
        }

    }

}