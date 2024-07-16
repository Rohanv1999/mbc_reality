<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Paypal extends CI_Controller{ 
     
     function  __construct(){ 
        parent::__construct(); 
         
        // Load paypal library 
        $this->load->library('paypal_lib'); 
     } 
    function success(){ 
        // Retrieve transaction data from PayPal IPN POST 
        $paypalInfo = $this->input->post(); 
        if(!empty($paypalInfo)){
            // Check whether the transaction data is exists 
            $prevPayment = $this->Db_model->select_data('*','px_subscription',array('txn_id' => $paypalInfo["txn_id"])); 
            if(!$prevPayment){ 
                // Insert the transaction data in the database 
                $data['payer_id']    = $paypalInfo["payer_id"]; 
                $data['user_id']    = $paypalInfo["user_id"]; 
                $data['product_id']    = $paypalInfo["product_id"]; 
                $data['txn_id']    = $paypalInfo["txn_id"]; 
                $data['payment_gross']    = $paypalInfo["payment_gross"]; 
                $data['currency_code']    = $paypalInfo["currency_code"]; 
                $data['payer_name']    = $paypalInfo["payer_name"]; 
                $data['payer_email']    = $paypalInfo["payer_email"]; 
                $data['payment_status'] = $paypalInfo["payment_status"];
                $data['gateway'] = 'Paypal'; 

                $insert_id = $this->Db_model->insert_data('px_subscription',$data);
                $subscription = $this->Db_model->select_data('*','px_subscription',array('id' => $insert_id));
                $package_nm = $subscription[0]['product_id'];
                $strperiod = '+'.loop_select('id',$subscription[0]['product_id'],'packg_period','px_packages').loop_select('id',$subscription[0]['product_id'],'duration_unit','px_packages');
                $package_expiry = date('Y-m-d H:i:s',strtotime($strperiod,strtotime($subscription[0]['add_date'])));
                $update = array(
                    'package_nm' => $package_nm,
                    'package_expiry' => $package_expiry,
                );
                $renew = $this->Db_model->update_data('px_userdata',$update,array('id' => $subscription[0]['user_id']));
                $datas = array('activation' => 1);
                $this->Db_model->update_data('px_properties',$datas,array('agent' => $subscription[0]['user_id'])); 
                $message = array(
                    'status' => 3,
                    'msg' => 'Subscription successfully'
                );
            }else{
                $message = array(
                    'status' => 2,
                    'msg' => 'Already subscribed'
                );
            }
        } 
        echo json_encode($message);
    }
}