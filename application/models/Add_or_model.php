<?php  
class add_or_model extends CI_Model {

            #Insert official receipt to database
    public function insert_receipt($company,$or_date,$or_number,$or_amount){
        if ($this->checkDuplicateORNumber($or_number)) {
            $this->db->set('company', $company);
            $this->db->set('or_date', date("Y-m-d", strtotime($or_date)));
            $this->db->set('or_number', $or_number);
            $this->db->set('or_amount', $or_amount);
            $this->db->insert('receipt');
            //print_r($this->db->last_query());
            header("Location: /arms/main/official_receipt");
        }else{
            header("Location: /arms/main/duplicate_error/$or_number"); //add error message
        }
    }
    public function checkDuplicateORNumber($or_number) {

            $this->db->where('or_number', $or_number);

            $query = $this->db->get('receipt');

            $count_row = $query->num_rows();

            if ($count_row > 0) {
              //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
                return FALSE; // here I change TRUE to false.
             } else {
              // doesn't return any row means database doesn't have this email
                return TRUE; // And here false to TRUE
             }
        }

}
?>

