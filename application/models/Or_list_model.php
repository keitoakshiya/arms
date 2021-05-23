<?php  
    class or_list_model extends CI_Model {

        public function get_or(){

            $this->db->select('

                `receipt`.`id` AS `receipt_id`,
                `receipt`.`company`,
                `receipt`.`or_number`,
                `receipt`.`or_date`,
                `receipt`.`or_amount`,
                `receipt`.`or_number`,
                `receipt`.`is_void`,

                `guarantor`.`name`,

                `transaction`.`id` AS `transaction_id`,
                `transaction`.`receipt_id` transaction_receipt_id,

                IFNULL((SELECT (SUM(hospital_bill_payment)+SUM(professional_bill_payment)) FROM transaction WHERE receipt_id = receipt.id),0) AS amount_applied,
            
            ');
            $this->db->join('receipt', 'transaction.id = receipt.id', 'right');
            $this->db->join('guarantor', 'receipt.company = guarantor.id');
            
            $this->db->order_by('receipt.or_date', 'DESC');
            $query = $this->db->get('transaction');

            $res   = $query->result();
            //print_r($this->db->last_query());
            return $res;
        }

        public function edit_official_receipt($a){

            $this->db->select('
                `receipt`.`id` as receipt_id,
                `receipt`.`or_date`,
                `receipt`.`or_number`,
                `receipt`.`or_amount`,
                `receipt`.`company`,


                `guarantor`.`name`,

                ');
            $this->db->join('guarantor', 'receipt.company = guarantor.id');
            $this->db->where('receipt.id',$a);
            
            $query = $this->db->get('receipt');
            $res   = $query->result();
            //print_r($this->db->last_query());  
            return $res;
        }

        public function update_or($id,$or_date,$or_number,$or_amount,$company){
            $this->db->set('or_date', $or_date);
            $this->db->set('or_number', $or_number);
            $this->db->set('or_amount', $or_amount);
            $this->db->set('company', $company);
            
            $this->db->where('id', $id);
            $this->db->update('receipt');
            //print_r($this->db->last_query()); 

            header("Location: or_list");
        }

        public function void_or($or_number){
            $this->db->set('is_void', '1');
            
            $this->db->where('or_number', $or_number);
            $this->db->update('receipt');
            print_r($this->db->last_query());

            header("Location: ../or_list");
        }

        public function unvoid_or($or_number){
            $this->db->set('is_void', '2');
            
            $this->db->where('or_number', $or_number);
            $this->db->update('receipt');
            //print_r($this->db->last_query());

            header("Location: ../or_list");
        }

        public function permavoid_or($or_number){
            $this->db->set('is_void', '3');
            
            $this->db->where('or_number', $or_number);
            $this->db->update('receipt');
            print_r($this->db->last_query());

            header("Location: ../or_list");
        }

        public function delete_or($id){
            
            $this->db->where('id', $id);
            $this->db->delete('receipt');

            $this->db->where('receipt_id', $id);
            $this->db->delete('transaction');


            print_r($this->db->last_query());

            header("Location: ../or_list");
        }



    }
?>  