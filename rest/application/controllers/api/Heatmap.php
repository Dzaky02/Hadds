<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Heatmap extends REST_Controller {

    public function __construct() {
        
        parent::__construct();
        $this->load->model('Building_model', 'building');
        $this->load->model('Floor_model', 'floor');
        $this->load->model('Coordinate_model', 'coor');

    }

    public function buildings_get() {

        $buildings = $this->building->getMainBuilding();

        if ($buildings)
        {
            // Set the response and exit
            $this->response([
                'status' => TRUE,
                'data' => $buildings
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No buildings were found, please check your request params'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }

    }

    public function floors_get() {

        $id_building = $this->get('id');

        if ($id_building === null) {
            // Invalid id, set the response and exit.
            $this->response([
                'status' => FALSE,
                'message' => 'Provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        } else {

            $floors = $this->floor->getBuildingFloors($id_building);
                
            if ($floors)
            {
                // Set the response and exit
                $this->response([
                    'status' => TRUE,
                    'data' => $floors
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No floors were found, please check your request params'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }

        }

    }

    public function coordinates_get(){

        $id_floor = $this->get('id');
        $date_begin = $this->get('date_begin');
        $date_end = $this->get('date_end');


        if ($id_floor === null) {
            // Invalid id, set the response and exit.
            $this->response([
                'status' => FALSE,
                'message' => 'Provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        } else if ($date_begin === null && $date_end === null){

            $coordinates = $this->coor->getAllCoordinates($id_floor);
                
            if ($coordinates)
            {
                // Set the response and exit
                $this->response([
                    'type' => "FeatureCollection",
                    'features' => $coordinates
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                // Set the response and exit
                $this->response([
                    'type' => 'FeatureCollection', 
                    'features' => array(
                            array(
                                'type' => 'Feature',
                                'properties' => null,
                                'geometry' => array(
                                    'type' => "Point",
                                    'coordinates' => [0,0]
                                )
                            )
                        )
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            }

        } else {
            
            if ($date_begin === null || $date_end === null) {
                // Invalid id, set the response and exit.
                $this->response([
                    'status' => FALSE,
                    'message' => 'Provide date range!'
                ], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            } else {
                    
                $coordinateAt = $this->coor->getCoordinateAt($id_floor, $date_begin, $date_end);
                    
                if ($coordinateAt)
                {
                    // Set the response and exit
                    $this->response([
                        'type' => "FeatureCollection",
                        'features' => $coordinateAt
                    ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
                } else {
                    // Set the response and exit
                    $this->response([
                        'type' => 'FeatureCollection', 
                        'features' => array(
                                array(
                                    'type' => 'Feature',
                                    'properties' => null,
                                    'geometry' => array(
                                        'type' => "Point",
                                        'coordinates' => [0,0]
                                    )
                                )
                            )
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
                }

            }

        }

    }

    public function index_post() {

        $data = [
            'id_floor' => $this->post('floor_index'),
            'latitude_coordinate' => $this->post('latitude'),
            'longitude_coordinate' => $this->post('longitude'),
            'created_date' => $this->post('date')
        ];

        if ( $this->coor->insertCoordinate($data) > 0) {
            $this->response([
                'status' => TRUE,
                'message' => 'Data koordinate baru telah masuk'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Gagal menambahkan koordinate baru!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

    }

}