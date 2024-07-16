<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_model extends CI_Model {

	function __Construct(){ 		 # create constructor 
		$this->load->database();		 # load the database
	} 
	
	# function for select data from database , with condition , limit , order , like and join clause
	function select_data($field , $table , $where = '' , $limit = '' , $order = '' , $like = '' , $join_array = '' , $group = '', $or_like = '',$where_in =''){ 
		$this->db->select($field);
		$this->db->from($table);
		if($where != ""){ 
			$this->db->where($where);
		}
	    if($where_in !='' ){
           
           $this->db->where_in($where_in[0],explode(',',$where_in[1]));
        }
		
		if($join_array != ''){
			if(in_array('multiple',$join_array)){
				foreach($join_array['1'] as $joinArray){
					$this->db->join($joinArray[0], $joinArray[1]);
				}
			}else{
				$this->db->join($join_array[0], $join_array[1]);
			}
		}
		
		if($order != ""){
			$this->db->order_by($order['0'] , $order['1']);
		}
		
		if($group != ""){
			$this->db->group_by($group);
		}
		
		if($limit != ""){
			if(is_array($limit) && count($limit)>1){
				$this->db->limit($limit['0'] , $limit['1']);
			}else{
				$this->db->limit($limit);
			}
			
		}
		
		if($like != ""){
			$like_key = explode(',',$like['0']);
			$like_data = explode(',',$like['1']);
			for($i='0'; $i<count($like_key); $i++){
				if($like_data[$i] != ''){
					$this->db->like($like_key[$i] , $like_data[$i]);
				}
			} 
		}

		if($or_like != ""){
			if(is_array($or_like)){
				foreach($or_like as $like){
					$this->db->or_like($like[0] , $like[1]);
				}
			}
		}

		return $this->db->get()->result_array();
		die();
	}
	
	# function for insert data in database  
	function insert_data($table , $data){
	//	$this->db->insert($table , $this->security->xss_clean($data));
	  $this->db->insert($table , $data);
		return $this->db->insert_id();
		die();
	}
	
	# function for delete data from database 
	function delete_data($table , $condition , $limit=''){
	
		if($limit!=''){
		   $this->db->limit($limit);
		}
		
		return $this->db->delete($table,$condition);
		die();
	}
	
	# function for update data in database 
	function update_data($table , $data , $condition=''){
		if($condition!=''){
			$this->db->where($condition);
		//	return $this->db->update($table,$this->security->xss_clean($data));
			return $this->db->update($table,$data);
		}else{
			return $this->db->update($table,$this->security->xss_clean($data));
		}
		die();
	}

	function setCode(){
	    $this->db->query("SET sql_mode='NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION'");
	
	}
	
	
	function accept_user($table ,$id, $data , $condition=''){
		if($condition!=''){
			$this->db->where($condition);
		//	return $this->db->update($table,$this->security->xss_clean($data));
			return $this->db->update($table,$data);
		}else{
			return $this->db->update($table,$this->security->xss_clean($data));
		}
		die();
	}
	
}
