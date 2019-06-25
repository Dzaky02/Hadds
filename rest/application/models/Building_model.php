<?php

class Building_model extends CI_Model {

    public function getMainBuilding() {
        return $this->db->get('main_building')->result_array();
    }

}