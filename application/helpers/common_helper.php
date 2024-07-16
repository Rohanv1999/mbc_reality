<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('row_count')) {
    function row_count($where_key, $where_value, $table)
    {
        $CI = &get_instance();
        $where = " WHERE $where_key = $where_value";
        $data = $CI->custom->count($where, $table);
        return $data;
    }
}

if (!function_exists('max_value')) {
    function max_value($field, $table)
    {
        $CI = &get_instance();
        $data = $CI->custom->max_id($field, $table);
        return $data;
    }
}

if (!function_exists('loop_select')) {
    function loop_select($where_key, $where_value, $field, $table)
    {
        $CI = &get_instance();
        $where = array($where_key => $where_value);
        $data = $CI->Db_model->select_data($field, $table, $where);
        if ($data != []) {
            return $data[0][$field];
        } else {
            return '';
        }
    }
}

if (!function_exists('time_period')) {
    function dateDiffInDays($date1, $date2)
    {
        // Calculating the difference in timestamps
        $diff = strtotime($date2) - $date1;
        return round($diff / 86400);
    }
}

    function formatDate2($inputDate) {
        $date = DateTime::createFromFormat("Y-m-d H:i:s", $inputDate);
        $formattedDate = $date->format("jS M, Y");
        return $formattedDate;
    }




if (!function_exists('favorite_info')) {
    function favorite_info($property_id, $session_id)
    {
        $CI = &get_instance();
        $where = array(
            'property' => $property_id,
            'user' => $session_id
        );
        $fav_data = $CI->Db_model->select_data('*', 'px_favorities', $where);
        if ($fav_data) {
            return "hovered";
        } else {
            return '';
        }
    }
}

if (!function_exists('front_common1')) {
    function front_common1()
    {
        $CI = &get_instance();
         $main_logo = $CI->db->query('select main_logo1 from px_main_logo where id = 1')->result_array();
         
         $company_data = $CI->db->query('select * from px_owner_company where id = 1')->result_array();
         
        $data = array(
            'main_logo1' => $main_logo,
            'company_data' => $company_data
        );
        return $data;
    }
}

if (!function_exists('front_common2')) {
    function front_common2()
    {
        $CI = &get_instance();
        $main_logo = $CI->Db_model->select_data('main_logo2', 'px_main_logo');
        $company_data = $CI->Db_model->select_data('*', 'px_owner_company');
        $data = array(
            'main_logo2' => $main_logo,
            'company_data' => $company_data
        );
        return $data;
    }
}



function encrypt_decrypt($string, $action = 'encrypt')
{
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'Rsale_1_8392_KG'; // user define private key
    $secret_iv = 'vAidEerrgf5HJ5g27'; // user define secret key
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
    if ($action == 'encrypt') {
        $output = openssl_encrypt(json_encode($string), $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = json_decode(openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv));
    }
    return $output;
}

function sendEmail_v2($to, $subject, $message)
{

    $config = array(
        'protocol' => loop_select('id', 1, 'server_type', 'px_mail_credential'),
        'smtp_host' => loop_select('id', 1, 'server_host', 'px_mail_credential'),
        'smtp_port' => loop_select('id', 1, 'server_port', 'px_mail_credential'),
        'smtp_user' => loop_select('id', 1, 'mail_user', 'px_mail_credential'),
        'smtp_pass' => loop_select('id', 1, 'mail_password', 'px_mail_credential'),
        'smtp_crypto' => loop_select('id', 1, 'mail_encryption', 'px_mail_credential'),
        'mailtype' => 'html',
        'charset' => 'utf-8'
    );

    $CI = &get_instance();
    $CI->load->library('email', $config);
    $CI->email->set_newline("\r\n");

    $CI->email->from(loop_select('id', 1, 'mail_user', 'px_mail_credential'), loop_select('id', 1, 'website_title', 'px_owner_company'));
    $CI->email->to($to);

    $CI->email->subject($subject);
    $CI->email->message($message);

    if ($CI->email->send()) {
        return true;
    } else {
        return false;
    }

}


function DIGIT_OTP_4()
{

    $alphabet1 = str_shuffle("111122233");
    $alphabet2 = str_shuffle("444555660");
    $alphabet3 = str_shuffle("045678900");
    $alphabet4 = str_shuffle("000111222");

    $masterpass = '';
    $masterpass .= substr($alphabet1, 0, 1);
    $masterpass .= substr($alphabet2, 0, 1);
    $masterpass .= substr($alphabet3, 0, 1);
    $masterpass .= substr($alphabet4, 0, 1);

    return str_shuffle($masterpass);
}


if (!function_exists("_getWhere")) {
    function _getWhere($table, $whereCondition, $multipleRow = 'no')
    {
        $CI =& get_instance();
        $CI->db->from($table);
        $CI->db->where($whereCondition);
        $CI->db->order_by('id', 'DESC');
        if ($multipleRow == 'no') {
            return $CI->db->get()->row();
        } else {
            return $CI->db->get()->result();
        }
    }
}


if (!function_exists("currency")) {

    function currency()
    {
        $CI =& get_instance();
        $CI->db->from('px_owner_company');
        $CI->db->where('id', 1);
        $currencyId = $CI->db->get()->row();

        $CI =& get_instance();
        $CI->db->from('px_currencies');
        $CI->db->where('id', $currencyId->currency);
        $symbol = $CI->db->get()->row();

        return $symbol->currency_symbol;



    }
}



if (!function_exists("_updateWhere")) {
    function _updateWhere($table, $whereCondition, $data)
    {
        $CI =& get_instance();
        $CI->db->where($whereCondition);
        if ($CI->db->update($table, $data)) {
            return true;
        } else {
            return false;
        }
    }
}
/*
        _updateWhere( 'user_profile', ['id' => $userid], [
            'status' => 'active',
        ] );
 */