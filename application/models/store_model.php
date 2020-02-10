<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store_model extends CI_Model {

	/**
     * @vars
     */
    private $_db;
    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
			
		$this->load->library('user_agent');
        // define primary table
        $this->_db = 'payments';
    }
    /**
     * insert the payment details in the table
     */

    function insert_pay($data=array()){
        if ($data) {
            $sql = "
                INSERT INTO {$this->_db} (
                    product_id, 
                    product_price, 
                    card_number, 
                    payment_status
                ) VALUES (
                    " . $this->db->escape($data['productId']) . ",
                    " . $this->db->escape($data['amount']) . ",
                    " . $this->db->escape($data['cardnumber']) . ",
                    ".'1'."
                )
            ";
            $this->db->query($sql);
            if ($id = $this->db->insert_id()) {
                return $id;
            }else{
                return FALSE;
            }
            
        }else{
            return false;
        }

    }

	

}

/* End of file store_model.php */
/* Location: ./application/models/store_model.php */