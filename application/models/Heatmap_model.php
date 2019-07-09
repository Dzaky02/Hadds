<?php

use GuzzleHttp\Client;
use function GuzzleHttp\json_decode;

class Heatmap_model extends CI_Model {

    private $_client;

    public function __construct() {
        
        $this->_client = new Client([
            'base_uri' => 'http://hadds.id/rest/index.php/api/heatmap/'
        ]);

    }

    public function getAllBuildings() {
        
        $response = $this->_client->request('GET', 'buildings');

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];

    }

    public function getFloorsByBuilding($id) {

        $response = $this->_client->request('GET', 'floors', [
            'query' => [
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];

    }
    
    public function getCoordinates($id, $date_begin = null, $date_end = null) {
        
        $query = [
            'id' => $id
        ];

        if ( $date_begin != null && $date_end != null ) {
            $query += [
                'date_begin' => $date_begin,
                'date_end' => $date_end
            ];
        }

        $response = $this->_client->request('GET', 'coordinates', [
            'query' => $query
        ]);

        return $response->getBody()->getContents();

    }

}