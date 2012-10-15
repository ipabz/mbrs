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
		
		$sql = "
			SELECT
				rs.model_id
			FROM
				".RESERVATION_TABLE." AS rs
			WHERE
				rs.
		";

	}
		
}

/* End of file motorbike_model.php */
/* Location: ./application/models/motorbike_model.php */
