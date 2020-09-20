<?php  
    class add_or_model extends CI_Model {


        public function insert_receipt($company,$or_date,$or_number,$or_amount){

            $this->db->set('company', $company);


            $this->db->set('or_date', date("Y-m-d", strtotime($or_date)));
            $this->db->set('or_number', $or_number);
            $this->db->set('or_amount', $or_amount);
            $this->db->insert('receipt');
            //print_r($this->db->last_query());
            header("Location: /arms/main/official_receipt");
        }


    }
?>