<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Motorbike_model extends CI_Model {
	
	function __construct() {
		parent::__construct();	
	}
	
	function getModels($offset=0,$limit=10,$noLimit=FALSE,$order='ASC') {
		
		if (! $noLimit) {
			$this->db->limit($limit,$offset);
		}
		
		$this->db->order_by('model_id', $order);
		$query = $this->db->get(MODEL_TABLE);
		
		return $query->result_array();
		
	}
    
    
    function newMotorBikes($limit=5) {
        
        $this->db->limit($limit);
        $this->db->order_by('model_id', 'DESC');
        $query = $this->db->get(MODEL_TABLE);
        
        return $query->result_array();
        
    }

	function checkAvailability($startDate,$endDate) {
		
        $startDate = @date('Y-m-d', @strtotime($startDate));
        $endDate = @date('Y-m-d', @strtotime($endDate));
        
		$sql = "
			SELECT
				rs.motorbike_id
			FROM
				".RESERVATION_TABLE." AS rs
			WHERE
				( rs.start_date <= DATE_FORMAT('$startDate','%Y-%m-%d') AND rs.end_date >= DATE_FORMAT('$startDate','%Y-%m-%d') ) OR
                ( rs.start_date <= DATE_FORMAT('$endDate','%Y-%m-%d') AND rs.end_date <= DATE_FORMAT('$endDate','%Y-%m-%d') )
		";
       
        $query = $this->db->query($sql);
        
        $motorbikes = "";
        
        foreach ( $query->result() as $row ) {
            if ($motorbikes == "") {
                $motorbikes .= MOTORBIKE_TABLE.".motorbike_id <> " . $row->motorbike_id;
            } else {
                $motorbikes .= " OR ".MOTORBIKE_TABLE.".motorbike_id <> " . $row->motorbike_id;
            }
        }
        
        $sql = "
			SELECT
				rs.motorbike_id
			FROM
				".RENTAL_TABLE." AS rs
			WHERE
				( rs.start_date <= DATE_FORMAT('$startDate','%Y-%m-%d') AND rs.end_date >= DATE_FORMAT('$startDate','%Y-%m-%d') ) OR
                ( rs.start_date <= DATE_FORMAT('$endDate','%Y-%m-%d') AND rs.end_date <= DATE_FORMAT('$endDate','%Y-%m-%d') ) AND
                rs.status = 'current'
		";
        
        $query = $this->db->query($sql);
        
        foreach ( $query->result() as $row ) {
            if ($motorbikes == "") {
                $motorbikes .= MOTORBIKE_TABLE.".motorbike_id <> " . $row->motorbike_id;
            } else {
                $motorbikes .= " OR ".MOTORBIKE_TABLE.".motorbike_id <> " . $row->motorbike_id;
            }
        }
        
        
        
        $sql = "
            SELECT
                ".MOTORBIKE_TABLE.".motorbike_id,
                ".MODEL_TABLE.".*
            FROM
                ".MOTORBIKE_TABLE.",
                ".MODEL_TABLE."
            WHERE
                ".MODEL_TABLE.".model_id = ".MOTORBIKE_TABLE.".model_id
        ";
        
        if ( $motorbikes != '' ) {
            $sql .= " AND ( $motorbikes )";
        }
        
        //$sql .= " GROUP BY ".MODEL_TABLE.".model_id";
        
     
        
        $query = $this->db->query($sql);
        
        return $query;

	}
    
    function createCustomer($array) {
        
        $this->db->insert(CUSTOMER_TABLE, $array);
        
        return $this->db->insert_id();
        
    }
    
    function reserve($array) {
        
        $this->db->insert(RESERVATION_TABLE, $array);
        
    }
		
}

/* End of file motorbike_model.php */
/* Location: ./application/models/motorbike_model.php */
