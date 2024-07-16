<?php

use \Stripe\Checkout\Session;
use \Stripe\Stripe;

class StripePayment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    public function index()
    {
        // form view here 
        $this->load->view('front_end/payment_check');
    }

    public function create()
    {

        //insert in db temporarily
        $package_id = $this->input->post('planId');
        // $packdata = $this->Db_model->select_data('*','px_packages',array('id' => $package_id));
        $data['txn_id'] = rand(9999, 10000);
        $data['user_id'] = $this->session->userdata('id');
        $data['payment_gross'] = $this->input->post('amount');
        $data['payer_email'] = $this->session->userdata('email');
        $data['currency_code'] =  loop_select('id',loop_select('id',1,'currency_code','px_gateway'),'currency_code','px_currencies');
        $data['payment_status'] = 'Pending';
        // $data['payment_status'] = 'Completed';
        $data['gateway'] = 'Stripe';
        $data['product_id'] = $package_id;

        //insert in temp table

        $insert_id = $this->Db_model->insert_data('px_online_transactions',$data);


        $insert_id = $this->Db_model->insert_data('px_subscription',$data);

       
        // $message = array(
        //     'status' => 1,
        //     'msg' => 'Subscription successfully'
        // );


        $amount = $this->input->post('amount');
        
        Stripe::setApiKey($this->config->item('stripe_secret_key'));
        $checkout_session = Session::create([
            "line_items" => [
                [
                    "price_data" => [
                        "currency" => loop_select('id',loop_select('id',1,'currency_code','px_gateway'),'currency_code','px_currencies'),
                        "product_data" => [
                            "name" => $this->input->post('productName'),
                            "description" => "Test Description",
                        ],
                        "unit_amount" => $amount * 100
                    ],
                    "quantity" => 1
                ]
            ],
            'payment_method_types' => [
                'card'
            ],
            'mode' => 'payment',
            'success_url' => base_url('StripePayment/success'),
            'cancel_url' => base_url('StripePayment/cancel'),
            'client_reference_id' => 8884
        ]);
        header('Location: ' . $checkout_session->url);
    }

    public function success()
    {
        date_default_timezone_set("Asia/Kolkata");
       $subscription = $data = $this->db->query('select * from px_online_transactions order by id desc limit 1')->row_array();
    //    print_r($subscription);


    // inser in px subscription 
       $update['package_nm'] = $subscription['product_id'];
       $strperiod = '+'.loop_select('id',$subscription['product_id'],'packg_period','px_packages').loop_select('id',$subscription['product_id'],'duration_unit','px_packages');
       $update['package_expiry'] = date('Y-m-d H:i:s',strtotime($strperiod,strtotime($subscription['add_date'])));
       $currenct_listing_limit = loop_select('id',$this->session->userdata('id'),'total_packge_limit','px_userdata');
       $bought_listing_limit = loop_select('id',$subscription['product_id'],'listing_limit','px_packages');
       $update['total_packge_limit'] = $currenct_listing_limit + $bought_listing_limit;
       $renew = $this->Db_model->update_data('px_userdata',$update,array('id' =>$this->session->userdata('id')));
       $datas = array('activation' => 1);
       $this->Db_model->update_data('px_properties',$datas,array('agent' => $this->session->userdata('id')));

       $this->load->view('common/front_common/front_header');
        $this->load->view('front_end/succes');
        $this->load->view('common/front_common/front_footer');
    }

    public function cancel()
    { 
        redirect($_SESSION['referred_from']); //redirect back (set in Homepage/plans)
    }



}