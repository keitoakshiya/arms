<?php  
class official_receipt_list_model extends CI_Model {

    public function get_receipt($a){
        $this->db->select(' `receipt`.`id` AS `receipt_id`,
           `receipt`.`company`,
           DATE_FORMAT(`receipt`.`or_date`, "%b %d %Y") as or_date,
           `receipt`.`or_number`,
           `receipt`.`or_amount`,
           `receipt`.`distributed`,
           `guarantor`.`id` AS `guarantor_id`,
           `guarantor`.`name`,
           `guarantor`.`type`,
           `guarantor`.`deleted`,
           IFNULL((SELECT (SUM(hospital_bill_payment)+SUM(professional_bill_payment)) FROM transaction WHERE receipt_id = receipt.id),0) AS amount_applied,

           IF (`receipt`.`or_amount`-IFNULL((SELECT (SUM(hospital_bill_payment)+SUM(professional_bill_payment)) FROM transaction WHERE receipt_id = receipt.id), 0)!=0,"Incomplete","Fully Paid") as applied_stat
           ');


        $this->db->join('guarantor', 'receipt.company = guarantor.id');
        $this->db->where('receipt.distributed','0');
        $not_void = array(0,2);
        $this->db->where_in('receipt.is_void',$not_void);
        $this->db->where('guarantor.id',$a);
        //$this->db->where('(`receipt`.`or_amount`-IFNULL((SELECT (SUM(hospital_bill_payment)+SUM(professional_bill_payment)) FROM transaction WHERE receipt_id = receipt.id), 0))!=','0');
        $query = $this->db->get('receipt');
            //print_r($this->db->last_query());  
        $res   = $query->result();
        return $res;
    }



}
?>  
