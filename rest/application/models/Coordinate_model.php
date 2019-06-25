<?php

class Coordinate_model extends CI_Model {

    public function getAllCoordinates($id) {
        
        if($id === null) {
            //Bad request send message
        } else {
            return $this->db->get_where('coordinate_point', ['id_floor' => $id])->result_array();
        }
        
    }

    public function getCoordinateAt($id, $date_begin, $date_end) {
        
        if($id === null || $date === null) {
            //Bad request send message
        } else {
            return $this->db->get_where('coordinate_point', ['id_floor' => $id, 'created_date >=' => $date_begin, 'created_date <=' => $date_end])->result_array();
        }
        
    }

    public function insertCoordinate($data) {

        $this->db->insert('coordinate_point', $data);
        return $this-> db->affected_rows();
        
    }

}