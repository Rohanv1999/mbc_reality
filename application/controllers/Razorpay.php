<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'third_party/razorpay-php/Razorpay.php';
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Razorpay extends CI_Controller {

    function  __construct() {
        parent::__construct();
    }

	public function buy()
	{
        $package_id = $this->input->post('package_id');
        $packdata = $this->Db_model->select_data('*','px_packages',array('id' => $package_id));
        $keyId = loop_select('id',1,'key_id','px_gateway');
        $keySecret = loop_select('id',1,'secret_key','px_gateway');
        $displayCurrency = $this->config->item('displayCurrency');
        $api = new Api($keyId, $keySecret);
        $orderData = [
            'receipt'         => rand(1,6),
            'amount'          => $packdata[0]['packg_price']*100, // 2000 rupees in paise
            'currency'        => loop_select('id',loop_select('id',1,'currency_code','px_gateway'),'currency_code','px_currencies'),//loop_select('id',1,'currency_code','px_gateway'),
            'payment_capture' => 1 // auto capture
        ];
        
        $razorpayOrder = $api->order->create($orderData);

        $razorpayOrderId = $razorpayOrder['id'];

        $_SESSION['razorpay_order_id'] = $razorpayOrderId;

        $displayAmount = $amount = $orderData['amount'];

        if ($displayCurrency !== 'INR'){
            $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
            $exchange = json_decode(file_get_contents($url), true);

            $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
        }

        $data = [
            "key"               => $keyId,
            "amount"            => $amount,
            "name"              => $packdata[0]['packg_nm'],
            "description"       => "Listing: ".$packdata[0]['listing_limit']." Period: ".$packdata[0]['packg_period']." ".$packdata[0]['duration_unit'],
            "image"             => base_url().'uploads/'.front_common1()['main_logo1'][0]['main_logo1'],
            "prefill"           => [
            "name"              => loop_select('id',$_SESSION['id'],'full_name','px_userdata'),
            "email"             => $_SESSION['email'],
            "contact"           => loop_select('id',$_SESSION['id'],'phone','px_userdata'),
            ],
            "notes"             => [
            "merchant_order_id" => $packdata[0]['id'],
            ],
            "theme"             => [
            "color"             => "#008dff"
            ],
            "order_id"          => $razorpayOrderId,
        ];

        if ($displayCurrency !== 'INR')
        {
            $data['display_currency']  = $displayCurrency;
            $data['display_amount']    = $displayAmount;
        }
        $view = $data;
        echo json_encode($view);

    }

    public function verify()
    {
        $keyId = loop_select('id',1,'key_id','px_gateway');
        $keySecret = loop_select('id',1,'secret_key','px_gateway');
        $success = true;

        $error = "Payment Failed";

        if (empty($_POST['razorpay_payment_id']) === false){
            $api = new Api($keyId, $keySecret);
            try{
                // Please note that the razorpay order ID must
                // come from a trusted source (session here, but
                // could be database or something else)
                $attributes = array(
                    'razorpay_order_id' => $_SESSION['razorpay_order_id'],
                    'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                    'razorpay_signature' => $_POST['razorpay_signature']
                );
                $api->utility->verifyPaymentSignature($attributes);
            }
            catch(SignatureVerificationError $e){
                $success = false;
                $error = 'Razorpay Error : ' . $e->getMessage();
            }
        }

        if ($success === true){
            $package_id = $this->input->post('merchant_order_id');
            $packdata = $this->Db_model->select_data('*','px_packages',array('id' => $package_id));
            $data['txn_id'] = $this->input->post('razorpay_payment_id');
            $data['user_id'] = $this->session->userdata('id');
            $data['payment_gross'] = $packdata[0]['packg_price'];
            $data['payer_email'] = $this->session->userdata('email');
            $data['currency_code'] = 'USD';
            $data['payment_status'] = 'Completed';
            $data['gateway'] = 'Razorpay';
            $data['product_id'] = $package_id;
            $insert_id = $this->Db_model->insert_data('px_subscription',$data);
            $subscription = $this->Db_model->select_data('*','px_subscription',array('id' => $insert_id));
            $update['package_nm'] = $subscription[0]['product_id'];
            $strperiod = '+'.loop_select('id',$subscription[0]['product_id'],'packg_period','px_packages').loop_select('id',$subscription[0]['product_id'],'duration_unit','px_packages');
            $update['package_expiry'] = date('Y-m-d H:i:s',strtotime($strperiod,strtotime($subscription[0]['add_date'])));
            $renew = $this->Db_model->update_data('px_userdata',$update,array('id' =>$this->session->userdata('id')));
            $datas = array('activation' => 1);
            $this->Db_model->update_data('px_properties',$datas,array('agent' => $this->session->userdata('id')));
            $message = array(
                'status' => 1,
                'msg' => 'Subscription successfully'
            );
        }else{
            $message = array(
                'status' => 0,
                'msg' => 'Signature not verified'
            );
        }
        echo json_encode($message);
    }
}