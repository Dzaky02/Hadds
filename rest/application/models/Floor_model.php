<?php

class Floor_model extends CI_Model {

    public function getBuildingFloors($id) {

        if($id === null) {
            //Bad request send message
        } else {
            return $this->db->get_where('building_floors', ['id_building' => $id])->result_array();
        }

    }

}