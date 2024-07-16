<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{

    public function index()
    {
        $active = array(
            'status' => 1
        );
        $main_logo = $this->Db_model->select_data('main_logo1', 'px_main_logo');
        $company_data = $this->Db_model->select_data('*', 'px_owner_company');
        $speciality = $this->Db_model->select_data('*', 'px_speciality');
        $services = $this->Db_model->select_data('*', 'px_services', $active);
        $sponsor = $this->Db_model->select_data('*', 'px_sponsor', $active);
        $testimonial = $this->Db_model->select_data('*', 'px_testimonial', $active);
        $popularAreas = $this->db->query('select pc.* FROM px_country pc, px_properties pp WHERE pp.country = pc.id AND pp.approve = 1 AND pp.activation = 1 GROUP BY pc.id')->result_array();

        $where1 = array(
            'px_properties.activation' => 1,
            'px_properties.approve' => 1
        );
        $order = array('id', 'desc');
        $join_array = array('px_userdata', 'px_userdata.id=px_properties.agent');
      
         $properties = $this->db->query('SELECT pp.id,profile_photo,propty_category,city,states,country,pp.address,property_name,purpose,plot_area,bathrooms,bedrooms,rent_price,sale_price,full_name,pp.add_date,url_sluge,gps_cords 
            FROM px_properties pp 
            JOIN px_userdata pu ON pu.id = pp.agent 
            JOIN px_addcategory pc ON pc.id = pp.propty_category 
            WHERE pp.activation = 1 and pp.approve = 1 order by id desc')->result_array();
    

        $category = $this->Db_model->select_data('*', 'px_addcategory', $active);
        $selectedCat = $category[count($category) -1]['id'];
        // $city = $this->Db_model->select_data('*', 'px_properties');
        $city = $this->db->query('select c.id, c.name from px_properties pp, cities c where pp.propty_category = "'.$selectedCat.'" and c.id = pp.city group by c.id order by c.name')->result_array();

        $where_agents = array(
            'user_type' => 'agent',
            'status' => 1
        );

        $agent = $this->Db_model->select_data('*', 'px_userdata', $where_agents);
        $packages = $this->Db_model->select_data('*', 'px_packages', array('packg_price>' => 0));
        // Here we change packg_price >0 //
        $payment_method = $this->Db_model->select_data('gateway_name', 'px_gateway', array('status' => 1));
        $agent_email = $agent ? $agent[0]['email'] : '';
        $agent_where = array(
            'email' => $agent_email
        );
        $agent_id = $agent ? $agent[0]['id'] : '';
        $where2 = array(
            'agent' => $agent_id
        );
        $where_agentId = array(
            'id' => $agent_id
        );
        $join_array = array('px_userdata', 'px_packages.id = px_userdata.package_nm');
        $data_condition = $this->Db_model->select_data('*', 'px_packages', $agent_where, '', '', '', $join_array);
        $total_listing = $data_condition ? $data_condition[0]['listing_limit'] : 0;
        $package_expiry = $data_condition ? $data_condition[0]['package_expiry'] : '';
        $where_core = " WHERE agent = $agent_id";
        $already_listed = $agent_id ? $this->custom->count($where_core, 'px_properties') : 0;
        $remaining_listing = $total_listing - $already_listed;
        $current = time();
        $days_left = dateDiffInDays($current, $package_expiry);
        if ($days_left < 1) {
            $datas = array('activation' => 0);
            $this->Db_model->update_data('px_properties', $datas, $where2);
        } else {
            $datas = array('activation' => 1);
            $this->Db_model->update_data('px_properties', $datas, $where2);
        }
        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'user') {
            $where_user = array(
                'id' => $_SESSION['id']
            );
            $user = $this->Db_model->select_data('*', 'px_userdata', $where_user);
        } else {
            $user = '';
        }
        $data = array(
            'main_logo' => $main_logo,
            'company_data' => $company_data,
            'speciality' => $speciality,
            'services' => $services,
            'sponsor' => $sponsor,
            'testimonial' => $testimonial,
            'properties' => $properties,
            'categorys' => $category,
            'agent' => $agent,
            'package' => $packages,
            'pay_button' => $payment_method,
            'user_detail' => $user,
            'city' => $city,
            'page_slug' => 'index',
            'popularAreas' => $popularAreas
        );

        $this->load->view('common/front_common/front_header', $data);
        $this->load->view('front_end/homepage');
        $this->load->view('common/front_common/front_footer');
    }

    public function create_listing()
    {
        if (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'agent' || $_SESSION['user_type'] == 'admin')) {
            redirect('dashboard/add_property');
        } else {
            redirect('homepage');
        }
    }

   public function fetchavlblcity(){
    $cat = $this->input->post('cat');
 
    $cities = $this->db->query('select c.id, c.name from px_properties pp, cities c where propty_category = "'.$cat.'" and c.id = pp.city group by c.id order by c.name')->result_array();
   echo json_encode($cities);
   }

    function submit_query(){
        $data = $this->input->post();
        $data['date']= date('Y-m-d');
        $data['time'] = date('H:i:s');

        $insert = $this->Db_model->insert_data('px_visa_queries', $data);

        if ($insert) {
            $message = array(
                'status' => 1,
                'msg' => 'Query Sent Successfully.'
            );
        } else {
            $message = array(
                'status' => 2,
                'msg' => 'Could not send query. Please try again later.'
            );
        }
        echo json_encode($message);
    }
    public function terms_and_conditions(){
        $this->load->view('common/front_common/front_header');
        $this->load->view('front_end/terms_and_condtions');
        $this->load->view('common/front_common/front_footer');
    }

    public function privacy_policy(){
        $this->load->view('common/front_common/front_header');
        $this->load->view('front_end/privacy_policy');
        $this->load->view('common/front_common/front_footer');
    }

    public function searchResults()
    {

        // print_r($_POST);
        $where1 = array(
            'px_properties.activation' => 1,
            'px_properties.approve' => 1,
        );
        $where2 = array(
            'px_properties.activation' => 1,
            'px_properties.approve' => 1,
            'px_properties.uploaded_by' => 'admin',
        );
        if (!isset($_POST['countryId'])) {
            if (isset($_POST['prop_category']) && $_POST['prop_category'] != '') {
                $where1['px_properties.propty_category'] =  $_POST['prop_category'];
                $where2['px_properties.propty_category'] =  $_POST['prop_category'];
            }
            if (isset($_POST['city']) && $_POST['city'] != '') {
                $where1['px_properties.city'] =  $_POST['city'];
                $where2['px_properties.city'] =  $_POST['city'];
            }
            $order = array('id', 'desc');
            $join_array = array('px_userdata', 'px_userdata.id=px_properties.agent');
            $properties = $this->Db_model->select_data('px_properties.id,profile_photo,city,states,property_name,purpose,propty_category,badge,plot_area,bathrooms,bedrooms,rent_price,sale_price,full_name,px_properties.add_date,url_sluge,gps_cords', 'px_properties', $where1, '', $order, '', $join_array);

        } else {
            $where1['px_properties.country'] =  $_POST['countryId'];
            $order = array('id', 'desc');
            $join_array = array('px_userdata', 'px_userdata.id=px_properties.agent');
            $properties = $this->Db_model->select_data('px_properties.id,profile_photo,city,states,property_name,purpose,propty_category,badge,plot_area,bathrooms,bedrooms,rent_price,sale_price,full_name,px_properties.add_date,url_sluge,gps_cords', 'px_properties', $where1, '', $order, '', $join_array);
   
        }
        $data = array(
                'properties' => $properties,
                'page_slug' => 'total_listing'
            );
        $this->load->view('common/front_common/front_header', $data);
        $this->load->view('front_end/total_listing');
        $this->load->view('common/front_common/front_footer');
    }

    public function get_favorities()
    {
        $fav_id = $this->input->post('fav_id');
        $where_favcheck = array(
            'property' => $fav_id,
            'user' => $_SESSION['id']
        );
        $checkfav = $this->Db_model->select_data('*', 'px_favorities', $where_favcheck);
        if ($checkfav) {
            $update_fav = $this->Db_model->delete_data('px_favorities', $where_favcheck);
            if ($update_fav) {
                $message = array(
                    'status' => 0,
                    'id' => $fav_id
                );
            }
        } else {
            $data = array(
                'property' => $fav_id,
                'user' => $_SESSION['id']
            );
            $insert = $this->Db_model->insert_data('px_favorities', $data);
            if ($insert) {
                $message = array(
                    'status' => 1,
                    'id' => $fav_id
                );
            }
        }
        echo json_encode($message);
    }

    public function plans()
    {
        $_SESSION['referred_from'] = current_url();

        $data['package'] = $this->Db_model->select_data('*', 'px_packages', array('packg_price>' => 0));
        $data['page_slug'] = 'plans';
        $this->load->view('common/front_common/front_header', $data);
        $this->load->view('front_end/plans');
        $this->load->view('common/front_common/front_footer');
    }

    public function total_listing()
    {
        $where1 = array(
            'px_properties.activation' => 1,
            'px_properties.approve' => 1
        );
        $order = array('id', 'desc');
        $join_array = array('px_userdata', 'px_userdata.id=px_properties.agent');
        // $properties = $this->Db_model->select_data('px_properties.id,profile_photo,city,states,property_name,purpose,propty_category,badge,plot_area,bathrooms,bedrooms,rent_price,sale_price,full_name,px_properties.add_date,url_sluge,gps_cords', 'px_properties', $where1, '', $order, '', $join_array);
        $properties = $this->db->query('select p.id,u.profile_photo,p.city,p.states,p.property_name,p.purpose,p.propty_category,p.badge,p.plot_area,p.bathrooms,p.bedrooms,p.rent_price,p.sale_price,u.full_name,p.add_date,p.url_sluge,p.gps_cords from px_properties p, px_userdata u, px_addcategory c where c.id =p.propty_category')->result_array();

        $data = array(
            'properties' => $properties,
            'page_slug' => 'total_listing'
        );
        $this->load->view('common/front_common/front_header', $data);
        $this->load->view('front_end/total_listing');
        $this->load->view('common/front_common/front_footer');
    }

    public function total_agents()
    {
        $agents = $this->Db_model->select_data('*', 'px_userdata', array('user_type' => 'agent', 'status' => 1));
        $data = array(
            'agents' => $agents,
            'page_slug' => 'agents'
        );
        $this->load->view('common/front_common/front_header', $data);
        $this->load->view('front_end/total_agents');
        $this->load->view('common/front_common/front_footer');
    }

    public function shortlist_properties()
    {
        $shortlisted = $this->Db_model->select_data('property', 'px_favorities', array('user' => $_SESSION['id']));
        $id_string = '';
        foreach ($shortlisted as $ids) {
            $id_string .= $ids['property'] . ',';
        }
        $property_ids = substr($id_string, 0, -1);
        $where_in_ids = array('px_properties.id', $property_ids);
        $where1 = array(
            'px_properties.activation' => 1
        );
        $order = array('id', 'desc');
        $join_array = array('px_userdata', 'px_userdata.id=px_properties.agent');
        $properties = $this->Db_model->select_data('px_properties.id,profile_photo,city,states,property_name,purpose,propty_category,badge,plot_area,bathrooms,bedrooms,rent_price,sale_price,full_name,px_properties.add_date,url_sluge,gps_cords', 'px_properties', $where1, '', $order, '', $join_array, '', '', $where_in_ids);
        $properties = $this->db->query('select p.id,u.profile_photo,p.city,p.states,p.property_name,p.purpose,p.propty_category,p.badge,p.plot_area,p.bathrooms,p.bedrooms,p.rent_price,p.sale_price,u.full_name,p.add_date,p.url_sluge,p.gps_cords from px_properties p, px_userdata u, px_addcategory c where p.propty_category = c.id and u.id = p.agent and p.id in ('.$property_ids.') and p.activation = 1 order by p.id desc')->result_array();

        $data = array(
            'properties' => $properties,
            'page_slug' => 'shortlisted_listings'
        );
        $this->load->view('common/front_common/front_header', $data);
        $this->load->view('front_end/total_listing');
        $this->load->view('common/front_common/front_footer');
    }

    public function user_profile()
    {
        $user_id = $this->input->post('user_id');
        $full_name = $this->input->post('full_name');
        $email = $this->input->post('email');
        $up_phone = $this->input->post('up_phone');
        $phone = $this->input->post('phone');
        $user_phone = $up_phone . $phone;
        $user_name = $this->input->post('user_name');
        $address = $this->input->post('address');
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('profile_photo')) {
            $datas = $this->upload->data();
            $filename = $datas['file_name'];
            $profile_photo = $filename;
        }
        if (!isset($profile_photo) && empty($profile_photo)) {
            $profile_photo = '';
        }
        $pdata = array(
            'full_name' => $full_name,
            'user_name' => $email,
            'phone' => $user_phone,
            'user_name' => $user_name,
            'address' => $address,
            'profile_photo' => $profile_photo
        );
        $where = array(
            'id' => $user_id
        );
        if ($profile_photo == '') {
            unset($pdata['profile_photo']);
        } else {
            $getdata = $this->Db_model->select_data('profile_photo', 'px_userdata', $where);
            if (isset($getdata[0]['profile_photo']) && !empty($getdata[0]['profile_photo'])) {
                unlink('.uploads/' . $getdata[0]['profile_data']);
            }
        }
        $updates = $this->Db_model->update_data('px_userdata', $pdata, $where);
        if ($updates) {
            if ($profile_photo != '') {
                $sess_arr = array(
                    'profile_photo' => $profile_photo
                );
                $this->session->set_userdata($sess_arr);
            }
            $message = array(
                'status' => 1,
                'msg' => 'Data updated successfully'
            );
        } else {
            $message = array(
                'status' => 2,
                'msg' => 'Oops! database error'
            );
        }
        echo json_encode($message);
    }

    // Update password 
    public function change_password()
    {
        $session_id = $this->session->userdata('id');
        $this->form_validation->set_rules('new_password', '', 'required');
        $this->form_validation->set_rules('conform_password', '', 'required');
        if ($this->form_validation->run()) {
            $new_password = $this->input->post('new_password');
            $conform_password = $this->input->post('conform_password');
            if ($new_password == $conform_password) {
                $n_password = md5($new_password);
                $data = array(
                    'password' => $n_password
                );
                $where = array(
                    'id' => $session_id
                );
                $changep = $this->Db_model->update_data('px_userdata', $data, $where);
                if ($changep) {
                    $message = array(
                        'status' => 1,
                        'msg' => 'Data updated successfully'
                    );
                } else {
                    $message = array(
                        'status' => 2,
                        'msg' => 'Oops! database error'
                    );
                }
            } else {
                $message = array(
                    'status' => 2,
                    'msg' => 'Both entries must be same'
                );
            }
        } else {
            $message = array(
                'status' => 2,
                'msg' => 'Fields must be required'
            );
        }
        echo json_encode($message);
    }

    public function property_detail($listing)
    {

        $detail_id = strtok($listing,  '-');


        $pwhere = array(
            'px_properties.id' => $detail_id
        );
        $pdwhere = array(
            'property_id' => $detail_id
        );

        $join_array = array('px_userdata', 'px_userdata.id=px_properties.agent');

        $properties = $this->Db_model->select_data('px_properties.id, px_properties.add_date,px_userdata.id,px_properties.address,px_properties.activation,px_userdata.status,px_properties.add_date,px_userdata.up_date,px_properties.up_date,px_userdata.add_date,email,full_name,user_name,phone,user_type,fb_link,insta_link,twitter_link,profile_photo,gps_cords,property_name,propty_category,neighbourhood,keywords,badge,url_sluge,purpose,short_description,long_description,zip_code,city,states,country,plot_area,build_size,bathrooms,bedrooms,rooms,rooms,rent_price,sale_price,owner,floors,uploaded_by', 'px_properties', $pwhere, '', '', '', $join_array);


        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {

            

            $this->db->select('*');
            $this->db->from('px_properties');
            $this->db->where('id', $detail_id);
            $query = $this->db->get();
            $propertyDetails = $query->row_array();
            
            $this->db->select('full_name, user_type');
            $this->db->from('px_userdata');
            $this->db->where('id', $propertyDetails['agent']);
            $query = $this->db->get();

            $userdata = $query->row_array();


            $properties[0] = array_merge($propertyDetails, $userdata);
            // $properties[0] = $propertyDetails;

            // $properties[0] = $this->db->query('select pu.full_name, pu.user_type, pp.* from  px_userdata pu, px_properties pp WHERE pp.agent  = pu.id and pp.id = '.$detail_id)->row_array();
            // print_r($properties);

            // print_r($properties);
            // die();

        }


        $company = $this->Db_model->select_data('*', 'px_propty_company', $pdwhere);
        $amenities = $this->Db_model->select_data('*', 'px_amenities', $pdwhere);
        $landmark = $this->Db_model->select_data('*', 'px_distent_thing', $pdwhere);
        $property_media = $this->Db_model->select_data('*', 'px_property_media', $pdwhere);
        $activedata = $this->Db_model->select_data('*', 'px_properties', $pwhere);


        $category = $this->Db_model->select_data('*', 'px_addcategory');
        $order = array('id', 'desc');
        $join_ar = array('px_userdata', 'px_userdata.id=px_properties.agent');
        $propert = $this->Db_model->select_data('px_properties.id,profile_photo,city,states,property_name,purpose,plot_area,bathrooms,bedrooms,rent_price,sale_price,full_name,px_properties.add_date,url_sluge,', 'px_properties', '', 3, $order, '', $join_ar);
        $data = array(
            'edit_property_id' => $detail_id,
            'properties' => $properties,
            'propert' => $propert,
            'company' => $company,
            'amenities' => $amenities,
            'landmark' => $landmark,
            'property_media' => $property_media,
            'categorys' => $category,
            'active' => $activedata,
            'page_slug' => 'total_listing',
            'prop_id' => $detail_id,
        );
        $this->load->view('common/front_common/front_header', $data);
        $this->load->view('front_end/property_detail');
        $this->load->view('common/front_common/front_footer');
    }

    public function agent_detail($agent)
    {
        $detail_id = strtok($agent,  '-');
        $awhere = array(
            'id' => $detail_id
        );
        $pwhere = array(
            'agent' => $detail_id,
            'activation' => 1
        );
        $agent_details = $this->Db_model->select_data('*', 'px_userdata', $awhere);
        $agents = $this->Db_model->select_data('*', 'px_userdata');
        $properties = $this->Db_model->select_data('*', 'px_properties', $pwhere, 4);
        $category = $this->Db_model->select_data('*', 'px_addcategory');
        $city = $this->Db_model->select_data('*', 'px_properties');
        $data = array(
            'agent_detail' => $agent_details,
            'agents' => $agents,
            'categorys' => $category,
            'properties' => $properties,
            'city'      => $city,
            'page_slug' => 'agents'
        );
        $this->load->view('common/front_common/front_header', $data);
        $this->load->view('front_end/agent_detail');
        $this->load->view('common/front_common/front_footer');
    }

    public function rent_listing()
    {
       
        $properties = $this->db->query('SELECT pp.id,profile_photo,propty_category,city,states,pp.address,property_name,purpose,plot_area,bathrooms,bedrooms,rent_price,sale_price,full_name,pp.add_date,url_sluge,gps_cords 
            FROM px_properties pp 
            JOIN px_userdata pu ON pu.id = pp.agent 
            JOIN px_addcategory pc ON pc.id = pp.propty_category 
            WHERE pp.purpose = 2 OR pp.purpose = 3 and pp.activation = 1 order by id desc')->result_array();
        
        
        
        $data = array(
            'properties' => $properties,
            'page_slug' => 'total_listing'
        );
        $this->load->view('common/front_common/front_header', $data);
        $this->load->view('front_end/total_listing');
        $this->load->view('common/front_common/front_footer');
    }

    public function sale_listing()
    {
       $properties = $this->db->query('SELECT pp.id,profile_photo,propty_category,city,states,pp.address,property_name,purpose,plot_area,bathrooms,bedrooms,rent_price,sale_price,full_name,pp.add_date,url_sluge,gps_cords 
            FROM px_properties pp 
            JOIN px_userdata pu ON pu.id = pp.agent 
            JOIN px_addcategory pc ON pc.id = pp.propty_category 
            WHERE pp.purpose = 1 and pp.activation = 1 order by id desc')->result_array();
            
        $data = array(
            'properties' => $properties,
            'page_slug' => 'total_listing'
        );
        $this->load->view('common/front_common/front_header', $data);
        $this->load->view('front_end/total_listing');
        $this->load->view('common/front_common/front_footer');
    }

    public function sale_filter($catid = '')
    {

        $category = $this->input->post('category');
        $location = $this->input->post('location');
        $city  = $this->input->post('city');

        $bathroom = $this->input->get('bathroom');
        $init_area = $this->input->get('init_area');
        $final_area = $this->input->get('final_area');
        $init_price = $this->input->get('init_price');
        $final_price = $this->input->get('final_price');



        //  $query = $this->db->query("SELECT * FROM px_userdata JOIN px_properties ON px_userdata.id=px_properties.agent WHERE px_properties.activation = 1 AND (purpose = 1 OR purpose = 3) $qur")->result_array();

        $qur = '';
        if ($catid) {
            $qur .= " AND px_properties. ";
            $qur .= "propty_category = '$catid'";
        }
        if ($city) {
            $qur .= " AND px_properties. ";
            $qur .= "city = '$city'";
        }
        if ($location) {
            $qur .= " AND px_properties. ";
            $qur .= "property_name = '$location'";
        }

        if ($location) {
            $qur .= " OR px_properties. ";
            $qur .= "address = '$location'";
        }

        // if($bathroom) {
        //     $qur .= " AND px_properties. ";
        //     $qur .= "bathrooms = '$bathroom'";
        // }
        // if($init_area && $final_area) {
        //     $qur .= " AND ";
        //     $qur .= "plot_area > '$init_area' AND plot_area <= '$final_area'";
        // }
        // if($init_price && $final_price) {
        //     $qur .= " AND ";
        //     $qur .= "sale_price > '$init_price' AND sale_price <= '$final_price'";
        // }



        // $this->db->where('px_properties.property_name', $location);
        // $query =$this->db->or_where('px_properties.city', $location);
        //  $query =$this->db->or_where('px_properties.address', $location)
        //         ->get()->result_array();


        //   $query = $this->db->query("SELECT * FROM px_userdata JOIN px_properties ON px_userdata.id=px_properties.agent WHERE px_properties.activation = 1 AND (purpose = 1 OR purpose = 3) $qur")->result_array();

        $query = $this->db->query("SELECT * FROM px_userdata JOIN px_properties ON px_userdata.id=px_properties.agent WHERE px_properties.activation = 1 AND px_properties.approve = 1  AND (purpose = 1 OR purpose = 3) $qur")->result_array();
        //echo $this->db->last_query(); //die;

        $data = array(
            'properties' => $query,
            'page_slug' => 'total_listing'
        );
        $this->load->view('common/front_common/front_header', $data);
        $this->load->view('front_end/total_listing');
        $this->load->view('common/front_common/front_footer');
    }

    public function rent_filter()
    {

        $location = $this->input->get('location');
        $category = $this->input->get('category');
        $bedroom = $this->input->get('bedroom');
        $bathroom = $this->input->get('bathroom');
        $init_area = $this->input->get('init_area');
        $final_area = $this->input->get('final_area');
        $init_price = $this->input->get('init_price');
        $final_price = $this->input->get('final_price');
        $qur = '';
        if ($location) {
            $qur .= " AND px_properties. ";
            $qur .= "city = '$location'";
        }
        if ($category) {
            $qur .= " AND px_properties. ";
            $qur .= "propty_category = '$category'";
        }
        if ($bedroom) {
            $qur .= " AND px_properties.";
            $qur .= "bedrooms = '$bedroom'";
        }
        if ($bathroom) {
            $qur .= " AND px_properties. ";
            $qur .= "bathrooms = '$bathroom'";
        }
        if ($init_area && $final_area) {
            $qur .= " AND px_properties. ";
            $qur .= "plot_area > '$init_area' AND plot_area <= '$final_area'";
        }
        if ($init_price && $final_price) {
            $qur .= " AND px_properties. ";
            $qur .= "rent_price > '$init_price' AND rent_price <= '$final_price'";
        }
        $query = $this->db->query("SELECT * FROM px_userdata JOIN px_properties ON px_userdata.id=px_properties.agent WHERE px_properties.activation = 1 AND (purpose = 2 OR purpose = 3)$qur")->result_array();
        // echo $this->db->last_query(); /die;
        $data = array(
            'properties' => $query,
            'page_slug' => 'total_listing'
        );
        $this->load->view('common/front_common/front_header', $data);
        $this->load->view('front_end/total_listing');
        $this->load->view('common/front_common/front_footer');
    }

    public function contact()
    {
        $company = $this->Db_model->select_data('company_coord', 'px_owner_company');

        $data = array(
            'ccords' => $company,
            'page_slug' => 'contact_us'
        );
        $this->load->view('common/front_common/front_header', $data);
        $this->load->view('front_end/contact');
        $this->load->view('common/front_common/front_footer');
    }

    public function questions()
    {

        $this->load->library('email');
        $this->form_validation->set_rules('email', '', 'required');
        $this->form_validation->set_rules('username', '', 'required');
        $this->form_validation->set_rules('phone', '', 'required');
        $this->form_validation->set_rules('comment', '', 'required');
        if (isset($_SESSION['user_type'])) {
            if ($this->form_validation->run()) {
                $property = $this->input->post('property');
                $agent = $this->input->post('agent');
                $uemail = $this->input->post('email');
                $uname = $this->input->post('username');
                $uphone = $this->input->post('phone');
                $ucomment = $this->input->post('comment');
                $data = array(
                    'property_id' => $property,
                    'agent_id' => $agent,
                    'user_nm' => $uname,
                    'uphone' => $uphone,
                    'uemail' => $uemail,
                    'message' => $ucomment
                );
                $db_query = $this->Db_model->insert_data('px_inquires', $data);
                if ($db_query) {
                    $frommail = loop_select('id', 1, 'mail_user', 'px_mail_credential');
                    $frompwd = loop_select('id', 1, 'mail_password', 'px_mail_credential');
                    $title = loop_select('id', 1, 'website_title', 'px_owner_company');
                    $reciver_email = loop_select('id', 1, 'mail_user', 'px_mail_credential');
                    $subject = 'Visitor contacted you';
                    $message = '';
                    $message .= "<h2>Details</h2>"
                        . "<p><strong>User Name :</strong> " . $uname . "</p>"
                        . "<p><strong>User Email :</strong> " . $uemail . "</p>"
                        . "<p><strong>User Phone No. :</strong> " . $uphone . "</p>"
                        . "<p><strong>Message</strong></p>"
                        . "<p>" . $ucomment . "</p>"
                        . "";
                    // Configure email library
                    $config = array();
                    $config['protocol'] = loop_select('id', 1, 'server_type', 'px_mail_credential');
                    $config['smtp_host'] = loop_select('id', 1, 'server_host', 'px_mail_credential');
                    $config['smtp_port'] = loop_select('id', 1, 'server_port', 'px_mail_credential');
                    $config['smtp_user'] = $frommail;
                    $config['smtp_pass'] = $frompwd;
                    $config['charset'] = "utf-8";
                    $config['mailtype'] = "html";
                    $config['smtp_crypto'] = loop_select('id', 1, 'mail_encryption', 'px_mail_credential');
                    $config['newline'] = "\r\n";

                    //	Set to, from, message, etc.
                    $this->email->initialize($config);
                    $this->email->from($frommail, $title);
                    $this->email->to($reciver_email);
                    $this->email->subject($subject);
                    $this->email->message($message);

                    if ($this->email->send()) {
                        $message = array(
                            'status' => 1,
                            'msg' => 'Thank you for your message'
                        );
                    } else {
                        $message = array(
                            'status' => 2,
                            'msg' => 'Mail error found'
                        );
                    }
                } else {
                    $message = array(
                        'status' => 2,
                        'msg' => 'Oop! Database error'
                    );
                }
            } else {
                $message = array(
                    'status' => 2,
                    'msg' => 'Fields are required'
                );
            }
        } else {
            $message = array(
                'status' => 7,
                'msg' => 'You are not login ? Login first !'
            );
        }
        echo json_encode($message);
    }

    public function about()
    {
        $active = array(
            'status' => 1
        );
        $testimonial = $this->Db_model->select_data('*', 'px_testimonial', $active);
        $sponsor = $this->Db_model->select_data('*', 'px_sponsor', $active);
        $data = array('testimonial' => $testimonial, 'sponsor' => $sponsor, 'page_slug' => 'about_us');
        $this->load->view('common/front_common/front_header', $data);
        $this->load->view('front_end/about');
        $this->load->view('common/front_common/front_footer');
    }

    public function loadonclick()
    {
        $agent_id = $this->input->post('id');
        $pages = $this->input->post('page');
        $pwhere = array(
            'agent' => $agent_id
        );
        $offset = ($pages - 1) * 4;
        $limit = array(4, $offset);
        $properties = $this->Db_model->select_data('*', 'px_properties', $pwhere, $limit);
        if ($properties > 0) {
            $output = '';
            foreach ($properties as $properties) {
                $output .= '<div class="col-lg-6 col-md-6 col-12"><div class="property-card"><div class="property-image"><img width="300" height="201" src="' . base_url() . 'uploads/' . (json_decode(loop_select('property_id', $properties['id'], 'images', 'px_property_media'), true) ? json_decode(loop_select('property_id', $properties['id'], 'images', 'px_property_media'), true)[0] : '') . '"><div class="property-icon"><a href="javascript:void(0)"><i id="property_' . $properties['id'] . '" ' . favorite_info($properties['id'], $_SESSION['id']) . ' onclick="favourate(' . $properties['id'] . ')" class="fa fa-heart" aria-hidden="true"></i></a></div></div><div class="property-detail"><div class="property-price"><h4>' . (($properties['purpose'] == '1') ? '$' . $properties['sale_price'] : '$' . $properties['rent_price'] . "/ <span>Monthly</span>") . '</h4></div><div class="property-name"><a href="' . base_url() . 'listing/' . $properties['id'] . '-' . str_replace(",", "-", $properties['url_sluge']) . '"><h4>' . $properties['property_name'] . '</h4></a></div><div class="property-location"><img src="' . base_url() . 'assets/front_assets/images/listing-location.png"><span>' . $properties['city'] . '' . loop_select('id', $properties['states'], 'name', 'px_states') . '</span></div><div class="property-amenities"><div class="amenities-info"><img src="' . base_url() . 'assets/front_assets/images/listing-amenities-bed.png"><span>Bed : ' . $properties['bedrooms'] . '</span></div><div class="amenities-info"><img src="' . base_url() . 'assets/front_assets/images/listing-amenities-bath.png"><span>Bath : ' . $properties['bathrooms'] . '</span></div><div class="amenities-info"><img src="' . base_url() . 'assets/front_assets/images/listing-amenities-area.png"><span>' . $properties['plot_area'] . ' Sqft</span></div></div><hr><div class="listing-details"><div class="listing-agent"><img src="' . base_url() . 'uploads/' . loop_select('id', $properties['agent'], 'profile_photo', 'px_userdata') . '" class="rounded-circle"><span>' . loop_select('id', $properties['agent'], 'full_name', 'px_userdata') . '</span></div><div class="listing-post"><span class="title">Post :</span><img src="' . base_url() . 'assets/front_assets/images/listing-calendar.png"><span>' . date('Y-m-d', strtotime($properties['add_date'])) . '</span></div></div></div></div></div></div>';
            }
        } else {
            $output = '';
        }
        echo $output;
    }

    public function loadcards()
    {
        $pages = $this->input->post('page');
        $offset = ($pages - 1) * 6;
        $limit = array(6, $offset);
        $order = array('id', 'desc');
        $properties = $this->Db_model->select_data('*', 'px_properties', '', $limit, $order);
        if ($properties > 0) {
            $output = '';
            foreach ($properties as $properties) {
                $output .= '<div class="col-lg-4 col-md-6 col-12">
                                <div class="my-4 property-card">
                                    <div class="property-image">
                                        <img width="300" height="201" src="' . base_url() . 'uploads/' . (json_decode(loop_select('property_id', $properties["id"], 'images', 'px_property_media'), true) ? json_decode(loop_select('property_id', $properties["id"], 'images', 'px_property_media'), true)[0] : '') . '">
                                        <div class="property-icon">
                                            <a href="javascript:void(0)"><i id="property_' . $properties["id"] . '" ' . favorite_info($properties["id"], $_SESSION["id"]) . ' onclick="favourate(' . $properties["id"] . ')" class="fa fa-heart" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="property-detail">
                                        <div class="property-price">
                                            <h4>' . (($properties['purpose'] == '1') ? '$' . $properties['sale_price'] : '$' . $properties['rent_price'] . "/ <span>Monthly</span>") . '</h4>
                                        </div>
                                        <div class="property-name">
                                            <a href="' . base_url() . 'listing/' . $properties["id"] . '-' . str_replace(",", "-", $properties["url_sluge"]) . '"><h4>' . $properties["property_name"] . '</h4></a>
                                        </div>
                                        <div class="property-location">
                                            <img src="' . base_url() . 'assets/front_assets/images/listing-location.png"><span>' . $properties["city"] . '' . loop_select("id", $properties["states"], 'name', 'px_states') . '</span>
                                        </div>
                                        <div class="property-amenities">
                                            <div class="amenities-info">
                                                <img src="' . base_url() . 'assets/front_assets/images/listing-amenities-bed.png"><span>Bed : ' . $properties["bedrooms"] . '</span>
                                            </div>
                                            <div class="amenities-info">
                                                <img src="' . base_url() . 'assets/front_assets/images/listing-amenities-bath.png"><span>Bath : ' . $properties["bathrooms"] . '</span>
                                            </div>
                                            <div class="amenities-info">
                                                <img src="' . base_url() . 'assets/front_assets/images/listing-amenities-area.png"><span>' . $properties["plot_area"] . ' Sqft</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="listing-details">
                                            <div class="listing-agent">
                                                <img src="' . base_url() . 'uploads/' . loop_select("id", $properties["agent"], 'profile_photo', 'px_userdata') . '" class="rounded-circle"><span>' . loop_select("id", $properties["agent"], 'full_name', 'px_userdata') . '</span>
                                            </div>
                                            <div class="listing-post">
                                                <span class="title">Post :</span><img src="' . base_url() . 'assets/front_assets/images/listing-calendar.png"><span>' . date('Y-m-d', strtotime($properties["add_date"])) . '</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
            }
        } else {
            $output = '';
        }
        echo $output;
    }

    // delete function for all data
    public function delete()
    {
        $id = $this->input->post('gets');
        $table = $this->input->post('dbtable');
        $condition = ['id' => $id];
        if ($table == 'px_properties') {
            $condit = ['property_id' => $id];
            if ($table == 'px_propty_company' || $table == 'px_amenities' || $table == 'px_distent_thing' || $table == 'px_property_media') {
            }
            $query = $this->Db_model->delete_data('px_propty_company', $condit);
            $query1 = $this->Db_model->delete_data('px_amenities', $condit);
            $query2 = $this->Db_model->delete_data('px_distent_thing', $condit);
            $select = $this->Db_model->select_data('*', 'px_property_media', $condit);
            if (count($select) != 0) {
                for ($s = 0; $s <= count(json_decode($select[0]['videos'], true)); $s++) {
                    unlink('./uploads/video_upload/' . json_decode($select[0]['videos'][$s], true));
                }
                for ($t = 0; $t <= count(json_decode($select[0]['Images'], true)); $t++) {
                    unlink('./uploads/' . json_decode($select[0]['Images'][$s], true));
                }
                $query3 = $this->Db_model->delete_data('px_property_media', $condit);
            }
            $query4 = $this->Db_model->delete_data('px_favorities', array('property' => $id));
        } else if ($table == 'px_userdata') {
            $getdata = $this->Db_model->select_data('profile_photo', 'px_userdata', $condition);
            if (isset($getdata[0]['profile_photo']) && !empty($getdata[0]['profile_photo'])) {
                unlink(FCPATH . 'uploads/' . $getdata[0]['profile_photo']);
            }
            $query = $this->Db_model->delete_data($table, $condition);
        } else if ($table == 'px_main_logo') {
            $getdata = $this->Db_model->select_data('main_logo', 'px_main_logo', $condition);
            if (isset($getdata[0]['main_logo']) && !empty($getdata[0]['main_logo'])) {
                unlink(FCPATH . 'uploads/' . $getdata[0]['main_logo']);
            }
            $query = $this->Db_model->delete_data($table, $condition);
        } else if ($table == 'px_homepage') {
            $getdata = $this->Db_model->select_data('images', 'px_homepage', $condition);
            if (isset($getdata[0]['images']) && !empty($getdata[0]['images'])) {
                unlink(FCPATH . 'uploads/' . $getdata[0]['images']);
            }
            $query = $this->Db_model->delete_data($table, $condition);
        } else if ($table == 'px_speciality') {
            $getdata = $this->Db_model->select_data('logo', 'px_speciality', $condition);
            if (isset($getdata[0]['logo']) && !empty($getdata[0]['logo'])) {
                unlink(FCPATH . 'uploads/' . $getdata[0]['logo']);
            }
            $query = $this->Db_model->delete_data($table, $condition);
        } else if ($table == 'px_services') {
            $getdata = $this->Db_model->select_data('logo', 'px_services', $condition);
            if (isset($getdata[0]['logo']) && !empty($getdata[0]['logo'])) {
                unlink(FCPATH . 'uploads/' . $getdata[0]['logo']);
            }
            $query = $this->Db_model->delete_data($table, $condition);
        } else if ($table == 'px_testimonial') {
            $getdata = $this->Db_model->select_data('client_image', 'px_testimonial', $condition);
            if (isset($getdata[0]['client_image']) && !empty($getdata[0]['client_image'])) {
                unlink(FCPATH . 'uploads/' . $getdata[0]['client_image']);
            }
            $query = $this->Db_model->delete_data($table, $condition);
        } else if ($table == 'px_sponsor') {
            $getdata = $this->Db_model->select_data('sponsor_logo', 'px_sponsor', $condition);
            if (isset($getdata[0]['sponsor_logo']) && !empty($getdata[0]['sponsor_logo'])) {
                unlink(FCPATH . 'uploads/' . $getdata[0]['sponsor_logo']);
            }
            $query = $this->Db_model->delete_data($table, $condition);
        }
        $query = $this->Db_model->delete_data($table, $condition);
        if ($query || $query1 || $query2 || $query3 || $query4) {
            $message = array(
                'status' => 1,
                'msg' => 'One data deleted'
            );
        } else {
            $message = array(
                'status' => 2,
                'msg' => 'Oops! database error'
            );
        }
        echo json_encode($message);
    }

    public function user()
    {
        $this->index();
    }
    public function searchresult()
    {

        if ($this->input->post('city') || $this->input->post('location')) {


            $city = $this->input->post('city');
            $search = $this->input->post('location');
            if ($city) {
                $query  = $this->db->select('*')->from('px_properties')
                    ->where('px_properties.city', $city)
                    ->like('px_properties.property_name', $search)
                    ->or_like('px_properties.address', $search);
                // $data =$this->db->get()->result_array();
            } else {
                $query  = $this->db->select('*')->from('px_properties')
                    ->like('px_properties.property_name', $search)
                    ->or_like('px_properties.address', $search);
            }

            $data = $this->db->get()->result_array();
            // echo $this->db->last_query(); die;
            $namearray = [];
            foreach ($data as $list) {
                $property_name = $list['property_name'];
                $address = $list['address'];
                array_push($namearray, $property_name, $address);
            }
            echo json_encode($namearray);
        }
    }
}
