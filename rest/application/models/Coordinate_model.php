<?php

class Coordinate_model extends CI_Model {

    public function getAllCoordinates($id) {
        
        if($id === null) {
            //Bad request send message
            return null;
        } else {
            $query = $this->db->get_where('coordinate_point', ['id_floor' => $id]);

            $geoJsonCoor = array();

            foreach ($query->result() as $row)
            {
                array_push($geoJsonCoor, array(
                    'type' => "Feature", 
                    'properties' => null,
                    'geometry' => array(
                        'type' => "Point",
                        'coordinates' => array(
                            (float)$row->longitude_coordinate,
                            (float)$row->latitude_coordinate
                        )
                    )
                ));
            }

            return $geoJsonCoor;
        }
        
    }

    public function getCoordinateAt($id, $date_begin, $date_end) {
        
        if($id === null || $date_begin === null || $date_end === null) {
            //Bad request send message
            return null;
        } else {
            $query = $this->db->get_where('coordinate_point', ['id_floor' => $id, 'created_date >=' => $date_begin, 'created_date <=' => $date_end]);

            $geoJsonCoor = array();

            foreach ($query->result_array() as $row)
            {
                array_push($geoJsonCoor, array(
                    'type' => "Feature", 
                    'properties' => null,
                    'geometry' => array(
                        'type' => "Point",
                        'coordinates' => array(
                            (float)$row['latitude_coordinate'],
                            (float)$row['longitude_coordinate']
                        )
                    )
                ));
            }

            return $geoJsonCoor;
        }
        
    }

    public function insertCoordinate($data) {

        $this->db->insert('coordinate_point', $data);
        return $this-> db->affected_rows();
        
    }

}