<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();

		if (!isset($_SESSION['user_type'])) {
			redirect(base_url());
		}
		$this->load->helper('query_helper');


		//  if($_SESSION['user_type'] !='admin'  ){

		//      redirect(base_url());

		//  }else if($_SESSION['user_type'] !='user'){
		//       redirect(base_url());

		//  }
		//   if($_SESSION['user_type'] =='admin' ){
		//       die('okkk');
		//        redirect(base_url());
		//   }



	}

	public function index()
	{
		$where1 = " WHERE user_type != 'admin' AND user_type != 'agent'";
		$users = $this->custom->count($where1, 'px_userdata');
		$where2 = " WHERE activation = true";
		$active_property = $this->custom->count($where2, 'px_properties');
		$where3 = " WHERE activation = false";
		$inactive_property = $this->custom->count($where3, 'px_properties');
		$inquiries = count($this->db->select('*')->from('px_inquires')->where('property_id !=', '')->get()->result_array());
		$order = array('id', 'desc');
		$where = array(
			'user_type' => 'agent'
		);
		for ($i = 0; $i < 12; $i++) {
			$graphData[$i] = 0;
		}
		$weekdata = $this->db->query('SELECT SUM(payment_gross) AS "TotalRevenue",COUNT(id) AS "TotalSubscription" FROM px_subscription WHERE add_date>now() - INTERVAL 7 day;')->result_array();
		$totalGraphData = $this->db->query('SELECT SUM(payment_gross) AS "TotalRevenue",COUNT(id) AS "TotalSubscription" FROM px_subscription WHERE date_format(add_date,"%Y")=' . date("Y"))->result_array();
		$graph = $this->db->query('SELECT date_format(add_date,"%c") AS "Month",SUM(payment_gross) AS "Revenue",COUNT(txn_id) AS "TotalSubscription" FROM px_subscription WHERE date_format(add_date,"%Y")=' . date("Y") . ' GROUP BY date_format(add_date,"%c")')->result_array();
		$currentRevenue = '';
		$currentsubscription = '';
		foreach ($graph as $graphValue) {
			if (isset($graphValue['Month']) && !empty($graphValue['Month'])) {
				$graphData[$graphValue['Month'] - 1] = $graphValue['Revenue'];
				if ($graphValue['Month'] == date('m')) {
					$currentRevenue = $graphValue['Revenue'];
					$currentsubscription = $graphValue['TotalSubscription'];
				}
			}
		}
		$user = $this->Db_model->select_data('*', 'px_userdata', $where);
		$badge = $this->Db_model->select_data('*', 'px_addbadge');
		$category = $this->Db_model->select_data('*', 'px_addcategory');
		$ownership = $this->Db_model->select_data('*', 'px_addownership');
		$purpose = $this->Db_model->select_data('*', 'px_addpurpose');
		// $property = $this->Db_model->select_data('*', 'px_properties', '', 10, $order);
		$property = $this->db->query('select pp.* from px_properties pp, px_userdata pu where pu.id = pp.agent and pu.status = 1')->result_array();

		$views = array(
			'agent' => $user,
			'badge' => $badge,
			'category' => $category,
			'ownership' => $ownership,
			'purpose' => $purpose,
			'visiter' => $users,
			'active_property' => $active_property,
			'inactive_property' => $inactive_property,
			'inquiry' => $inquiries,
			'listing' => $property,
			'revenue' => $graphData,
			'currentRevenue' => $currentRevenue,
			'currentsubscription' => $currentsubscription,
			'weekdata' => $weekdata,
			'totalrevenue' => $totalGraphData
		);
		$this->load->view('common/admin_header', $views);
		$this->load->view('common/admin_sidebar');
		$this->load->view('admin_dashboard');
		$this->load->view('common/footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	// profile page
	public function profile()
	{
		$uid = $this->session->userdata('id');
		$where = array(
			'id' => $uid
		);
		$edit = $this->Db_model->select_data('*', 'px_userdata', $where);
		$data = array(
			'profile_data' => $edit,
			'dashboard' => 'admin'
		);
		$this->load->view('common/admin_header', $data);
		$this->load->view('common/admin_sidebar');
		$this->load->view('profile');
		$this->load->view('common/footer');
	}

	// update profile data
	public function profile_update()
	{
		$user_id = $this->input->post('user_id');
		$fname = $this->input->post('fname');
		$uname = $this->input->post('uname');
		$profile_phone = $this->input->post('profile_phone');
		$phone = $this->input->post('phone');
		$full_phone = $profile_phone . $phone;
		$language = $this->input->post('language');
		$package_nm = $this->input->post('package_nm');
		$fb_link = $this->input->post('fb_link');
		$skype_link = $this->input->post('skype_link');
		$insta_link = $this->input->post('insta_link');
		$twitter_link = $this->input->post('twitter_link');
		$linkedin_link = $this->input->post('linkedin_link');
		$embed_video = $this->input->post('embed_video');
		$address = $this->input->post('address');
		$payment = $this->input->post('payment');
		$description = $this->input->post('description');
		$sms_notification = $this->input->post('sms_notification');
		$email_alert = $this->input->post('email_alert');
		$profile_whatsup = $this->input->post('profile_whatsup');
		$whatsup = $this->input->post('whatsup');
		$full_whatsup = $profile_whatsup . $whatsup;
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 10000;
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
			'full_name' => $fname,
			'user_name' => $uname,
			'phone' => $full_phone,
			'language' => $language,
			'fb_link' => $fb_link,
			'skype_link' => $skype_link,
			'insta_link' => $insta_link,
			'twitter_link' => $twitter_link,
			'linkedin_link' => $linkedin_link,
			'embed_video' => $embed_video,
			'address' => $address,
			'payment' => $payment,
			'description' => $description,
			'sms_notification' => $sms_notification,
			'email_alert' => $email_alert,
			'profile_photo' => $profile_photo,
			'whatsup' => $full_whatsup
		);
		$where = array(
			'id' => $user_id
		);
		if ($profile_photo == '') {
			unset($pdata['profile_photo']);
		} else {
			$getdata = $this->Db_model->select_data('profile_photo', 'px_userdata', $where);
			if (isset($getdata[0]['profile_photo']) && !empty($getdata[0]['profile_photo'])) {
				unlink(FCPATH . 'uploads/' . $getdata[0]['profile_photo']);
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
		/*
		 * At least one uppercase letter
		 * At least one lowercase letter
		 * At least one special character
		 * At least one number
		 * Minimum 8 characters
		 * Maximum 255 characters
		 */
		$pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@!%*?&])[A-Za-z\d$@!%*?&]{8,255}$/';


		$this->form_validation->set_rules('new_password', '', 'required|regex_match[' . $pattern . ']');
		$this->form_validation->set_rules('conform_password', '', 'required|matches[new_password]');



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
				'msg' => 'Fields are required'
			);
		}
		echo json_encode($message);
	}

	//Manage property data by table
	public function properties()
	{

		$user_id = $this->session->userdata('id');

		$order = array('id', 'desc');
		if ($_SESSION['user_type'] == 'user') {

			$properties = $this->db->query('select pp.* from px_properties pp, px_userdata pu where pu.id = pp.agent and pu.status = 1 and pp.agent = ' . $user_id)->result_array();
		} else {
			$properties = $this->db->query('select pp.* from px_properties pp, px_userdata pu where pu.id = pp.agent and pu.status = 1')->result_array();
		}

		if ($_SESSION['user_type'] == 'user') {
			$user_email = $this->session->userdata('email');
			$agent_id = $this->session->userdata('id');

			$user_where = array(
				'email' => $user_email
			);

			$join_array = array('px_userdata', 'px_packages.id = px_userdata.package_nm');
			$data = $this->Db_model->select_data('*', 'px_packages', $user_where, '', '', '', $join_array);
			$total_listing = (isset($data[0]['listing_limit']) && !empty($data[0]['listing_limit'])) ? $data[0]['listing_limit'] : 0;
			$package_expiry = (isset($data[0]['package_expiry']) && !empty($data[0]['package_expiry'])) ? $data[0]['package_expiry'] : 0;
			$where_core = " WHERE agent = $agent_id";
			$already_listed = $this->custom->count($where_core, 'px_properties');
			$total_listing = loop_select('id', $this->session->userdata('id'), 'total_packge_limit', 'px_userdata');
			$remaining_listing = $total_listing - $already_listed;

			// echo $package_expiry;
			$current = time();
			$days_left = dateDiffInDays($current, $package_expiry);
			$data['days_remain'] = $days_left;
			$data['list_remain'] = $remaining_listing;

			$data['dashboard'] = 'user';

			// print_r($data['days_remain']); die();


		} else {
			$data['dashboard'] = 'admin';
		}


		$data['property'] = $properties;


		$this->load->view('common/admin_header', $data);
		$this->load->view('common/admin_sidebar');
		$this->load->view('property_manage');
		$this->load->view('common/footer');
	}

	//show the data on add property form page
	public function add_property()
	{
		$pid = '';
		$pid = $this->input->get('pid');

		if ($pid) {
			$where1 = array(
				'id' => $pid
			);
			$properties = $this->Db_model->select_data('*', 'px_properties', $where1);
			$where2 = array(
				'property_id' => $pid
			);
			$company = $this->Db_model->select_data('*', 'px_propty_company', $where2);
			$amenities = $this->Db_model->select_data('*', 'px_amenities', $where2);
			$distance = $this->Db_model->select_data('*', 'px_distent_thing', $where2);
			$media = $this->Db_model->select_data('*', 'px_property_media', $where2);
			if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'user') {
				$where = array(
					'user_type' => 'user'
				);
			}
			if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'agent') {
				$where = array(
					'user_type' => 'agent'
				);
			}
			$where = array(
				'user_type' => 'admin'
			);

			$status = array(
				'status' => 1
			);
			$active = array(
				'status' => 1
			);

			$user = $this->Db_model->select_data('*', 'px_userdata', $where);

			$badge = $this->Db_model->select_data('*', 'px_addbadge', $active);
			$neighbourhood = $this->Db_model->select_data('*', 'px_addneighbourhood', $active);
			$category = $this->Db_model->select_data('*', 'px_addcategory', $active);
			$ownership = $this->Db_model->select_data('*', 'px_addownership', $active);
			$purpose = $this->Db_model->select_data('*', 'px_addpurpose', $active);
			$country = $this->Db_model->select_data('*', 'px_country');
			$states = $this->Db_model->select_data('*', 'px_states');
			$indoor = $this->Db_model->select_data('*', 'px_addindooramenities', $status);
			$outdoor = $this->Db_model->select_data('*', 'px_addoutdooramenities', $status);
			$landmark = $this->Db_model->select_data('*', 'px_addlandmarks', $status);
			$lastid = $this->custom->max_id('id', 'px_properties');
			$data = array(
				'pid' => $pid,
				'agent' => $user,
				'badge' => $badge,
				'neighbourhood' => $neighbourhood,
				'category' => $category,
				'ownership' => $ownership,
				'purpose' => $purpose,
				'country' => $country,
				'states' => $states,
				'indoors' => $indoor,
				'outdoors' => $outdoor,
				'landmark' => $landmark,
				'last_id' => $lastid,
				'propertys' => $properties,
				'companys' => $company,
				'amenities' => $amenities,
				'distent' => $distance,
				'medias' => $media,
				'dashboard' => 'admin'
			);
		} else {
			$where = array(
				'user_type' => 'agent',
				'user_type' => 'user',
			);
			$status = array(
				'status' => 1
			);
			$active = array(
				'status' => 1
			);
			$user = $this->Db_model->select_data('*', 'px_userdata', $where);
			//print_r($user);

			$badge = $this->Db_model->select_data('*', 'px_addbadge', $active);
			$neighbourhood = $this->Db_model->select_data('*', 'px_addneighbourhood', $active);
			$category = $this->Db_model->select_data('*', 'px_addcategory', $active);
			$ownership = $this->Db_model->select_data('*', 'px_addownership', $active);
			$purpose = $this->Db_model->select_data('*', 'px_addpurpose', $active);
			$country = $this->Db_model->select_data('*', 'px_country');
			$indoor = $this->Db_model->select_data('*', 'px_addindooramenities', $status);
			$outdoor = $this->Db_model->select_data('*', 'px_addoutdooramenities', $status);
			$landmark = $this->Db_model->select_data('*', 'px_addlandmarks', $status);
			$lastid = $this->custom->max_id('id', 'px_properties');
			$data = array(
				'agent' => $user,
				'badge' => $badge,
				'neighbourhood' => $neighbourhood,
				'category' => $category,
				'ownership' => $ownership,
				'purpose' => $purpose,
				'country' => $country,
				'indoors' => $indoor,
				'outdoors' => $outdoor,
				'landmark' => $landmark,
				'last_id' => $lastid,
				'dashboard' => 'admin'
			);

		}


		if ($_SESSION['user_type'] == 'user') {
			$user_email = $this->session->userdata('email');
			$agent_id = $this->session->userdata('id');

			$user_where = array(
				'email' => $user_email
			);

			$join_array = array('px_userdata', 'px_packages.id = px_userdata.package_nm');
			$data2 = $this->Db_model->select_data('*', 'px_packages', $user_where, '', '', '', $join_array);
			$total_listing = (isset($data2[0]['listing_limit']) && !empty($data2[0]['listing_limit'])) ? $data2[0]['listing_limit'] : 0;
			$package_expiry = (isset($data2[0]['package_expiry']) && !empty($data2[0]['package_expiry'])) ? $data2[0]['package_expiry'] : 0;
			$where_core = " WHERE agent = $agent_id";
			$already_listed = $this->custom->count($where_core, 'px_properties');
			$total_listing = loop_select('id', $this->session->userdata('id'), 'total_packge_limit', 'px_userdata');
			$remaining_listing = $total_listing - $already_listed;

			// echo $package_expiry;
			$current = time();
			$days_left = dateDiffInDays($current, $package_expiry);
			$data['days_remain'] = $days_left;
			$data['list_remain'] = $remaining_listing;

			$data['dashboard'] = 'user';

		} else {
			$data['dashboard'] = 'admin';
		}
		$this->load->view('common/admin_header', $data);
		$this->load->view('common/admin_sidebar');
		$this->load->view('addproperty');
		$this->load->view('common/footer');
	}

	public function select_state2()
	{
		$country_id = $this->input->post('country_id');
		$states = $this->db->query('select * from px_states where country_id = "' . $country_id . '"')->result_array();
		echo json_encode($states);
	}
	// ajax for state select from country


	public function select_state()
	{
		$country_id = $this->input->post('country_id');
		$where_state = array(
			'country_id' => $country_id
		);

		// $states = $this->Db_model->select_data('*', 'px_states', $where_state);
		$states = $this->db->query('select ps.* from px_states ps, cities c where c.state_id = ps.id group by ps.id')->result_array();
		echo json_encode($states);
	}
	// ajax for city select from state
	public function select_city()
	{
		$state_id = $this->input->post('state_id');
		$where_state = array(
			'state_id' => $state_id
		);
		$city = $this->Db_model->select_data('*', 'cities', $where_state);
		//echo $this->db->last_query();
		echo json_encode($city);
	}
	// ajax for state select from country
	public function select_package()
	{
		$package_id = $this->input->post('package_id');
		$where_package = array(
			'id' => $package_id
		);
		$package_expiry = $this->Db_model->select_data('packg_period,duration_unit', 'px_packages', $where_package);
		echo json_encode(date('Y-m-d H:i:s', strtotime('+' . $package_expiry[0]['packg_period'] . ' ' . $package_expiry[0]['duration_unit'])));
	}

	//function for add and update property basic detail tab
	public function add_property_detail()
	{


		$this->form_validation->set_rules('property_name', '', 'required');
		//$this->form_validation->set_rules('agent','','required');
		if ($this->form_validation->run()) {

			$pid = $this->input->post('pid');
			$pids = $this->input->post('pids');
			$getid = $this->input->post('getid');

			if ($pid != '') {
				$propId = $pid;
			} else if ($pids != '') {
				$propId = $pids;
			} else {
				$propId = $getid;
			}
			$nameExist = $this->db->query('select * from px_properties where property_name = "' . $this->input->post('property_name') . '"')->row_array();
			if ($propId == '' && !empty($nameExist)) {
				$message = array(
					'status' => 2,
					'msg' => 'Propert name already exists',
				);
			} else {



				$property_name = $this->input->post('property_name');
				$categories = $this->input->post('categories');
				$neighbourhood = $this->input->post('neighbourhood');
				$keywords = $this->input->post('keywords');
				$badge = $this->input->post('badge');
				$url_slug = $this->input->post('url_slug');
				$description_short = $this->input->post('description_short');
				$description_short1 = base64_encode($description_short);
				$description_long = $this->input->post('description_long');
				$description_long1 = base64_encode($description_long);
				$address = $this->input->post('address');
				$gps = $this->input->post('gps');

				if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {
					$activation = 1;
					$approve = 1;
				} else {
					$activation = NULL;
					$approve = NULL;
				}

				$agent = $_SESSION['id'];
				$purpose = $this->input->post('purpose');
				$country = $this->input->post('country');
				$states = $this->input->post('states');
				$city = $this->input->post('city');
				$zip_code = $this->input->post('zip_code');
				$plot_area = $this->input->post('plot_area');
				$build_size = $this->input->post('build_size');
				$bathrooms = $this->input->post('bathrooms');
				$bedrooms = $this->input->post('bedrooms');
				$rooms = $this->input->post('rooms');
				$sale_price = $this->input->post('sale_price');
				$rent_price = $this->input->post('rent_price');
				$ownership = $this->input->post('ownership');
				$floor = $this->input->post('floor');
				$uploaded_by = $this->input->post('uploaded_by');
				$data = array(
					'property_name' => $property_name,
					'propty_category' => $categories,
					'neighbourhood' => $neighbourhood,
					'keywords' => $keywords,
					'badge' => $badge,
					'url_sluge' => $url_slug,
					'short_description' => $description_short1,
					'long_description' => $description_long1,
					'address' => $address,
					'gps_cords' => $gps,
					'agent' => $agent,
					'purpose' => $purpose,
					'country' => $country,
					'states' => $states,
					'city' => $city,
					'zip_code' => $zip_code,
					'plot_area' => $plot_area,
					'build_size' => $build_size,
					'bathrooms' => $bathrooms,
					'bedrooms' => $bedrooms,
					'rooms' => $rooms,
					'sale_price' => $sale_price,
					'rent_price' => $rent_price,
					'owner' => $ownership,
					'uploaded_by' => $uploaded_by,
					'floors' => $floor,
					'activation' => $activation,
					'approve' => $approve
				);

				$whereSelect = array(
					'id' => $pid
				);
				$whereSelect2 = array(
					'id' => $pids
				);
				$select = $this->Db_model->select_data('*', 'px_properties', $whereSelect);
				$select2 = $this->Db_model->select_data('*', 'px_properties', $whereSelect2);

				$WinsertSelect = array(
					'id' => $getid
				);
				$Uinsert = $this->Db_model->select_data('*', 'px_properties', $WinsertSelect);
				if ($select || $select2) {
					if ($pid != '') {
						$whereg = array(
							'id' => $pid
						);
						$details = $this->Db_model->update_data('px_properties', $data, $whereg);

					} else {
						$whereg = array(
							'id' => $pids
						);
						$details = $this->Db_model->update_data('px_properties', $data, $whereg);
					}


					//echo $this->db->last_query();
					if ($details) {
						$message = array(
							'status' => 3,
							'msg' => 'Data updated successfully',
							'pids' => $propId
						);
					} else {
						$message = array(
							'status' => 2,
							'msg' => 'Oops! database error'
						);
					}
				} else if (empty($pid) && !empty($getid)) {
					$wherei = array(
						'id' => $getid
					);
					$details = $this->Db_model->update_data('px_properties', $data, $wherei);
					if ($details) {
						$message = array(
							'status' => 3,
							'msg' => 'Data updated successfully',
							'pids' => $propId
						);
					} else {
						$message = array(
							'status' => 2,
							'msg' => 'Oops! database error'
						);
					}
				} else {

					$details = $this->Db_model->insert_data('px_properties', $data);

					if ($details) {
						$message = array(
							'status' => 3,
							'msg' => 'Data saved successfully',
							'pids' => $details,
							'action' => 'addedprop',
						);
					} else {
						$message = array(
							'status' => 2,
							'msg' => 'Oops! database error'
						);
					}
				}
			}
		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Basic details  are required'
			);
		}
		$message['action'] = 'addedprop';
		echo json_encode($message);
	}

	//function for add and update property company tab
	public function add_property_company()
	{
		$pid = '';
		$pid = $this->input->post('pid');
		$property_id = $this->input->post('getid');
		$pids = $this->input->post('pids');
		if ($property_id != '' || $pids != '' || $pid != '') {
			$this->form_validation->set_rules('company_name', '', 'required');
			if ($this->form_validation->run()) {
				$company_name = $this->input->post('company_name');
				$company_phone = $this->input->post('company_phone');
				$website = $this->input->post('website');
				$facebook = $this->input->post('facebook');
				$twitter = $this->input->post('twitter');
				$company_detail = $this->input->post('company_detail');
				$company_detail2 = base64_encode($company_detail);
				$office_hours = $this->input->post('office_hours');
				$wheres = array(
					'property_id' => $pids
				);
				$wherea = array(
					'property_id' => $property_id
				);
				$select = $this->Db_model->select_data('property_id', 'px_propty_company', $wheres);
				$select1 = $this->Db_model->select_data('property_id', 'px_propty_company', $wherea);
				if ($select || $select1) {
					$update_data = array(
						'company_name' => $company_name,
						'company_phone' => $company_phone,
						'website' => $website,
						'facebook' => $facebook,
						'twitter' => $twitter,
						'company_detail' => $company_detail2,
						'office_hour' => $office_hours
					);
					if ($select1) {
						$where3 = array(
							'property_id' => $property_id
						);
						$details = $this->Db_model->update_data('px_propty_company', $update_data, $where3);
					} else {
						$where3 = array(
							'property_id' => $pids
						);
						$details = $this->Db_model->update_data('px_propty_company', $update_data, $where3);
					}
					if ($details) {
						$message = array(
							'status' => 3,
							'msg' => 'Data updated successfully'
						);
					} else {
						$message = array(
							'status' => 2,
							'msg' => 'Oops! database error'
						);
					}
				} elseif ($pid) {
					$data = array(
						'property_id' => $pid,
						'company_name' => $company_name,
						'company_phone' => $company_phone,
						'website' => $website,
						'facebook' => $facebook,
						'twitter' => $twitter,
						'company_detail' => $company_detail2,
						'office_hour' => $office_hours
					);
					$details = $this->Db_model->insert_data('px_propty_company', $data);
					if ($details) {
						$message = array(
							'status' => 3,
							'msg' => 'Data saved successfully',
							'action' => 'addedprop',
						);
					} else {
						$message = array(
							'status' => 2,
							'msg' => 'Oops! database error'
						);
					}
				} else {
					$data = array(
						'property_id' => $pids,
						'company_name' => $company_name,
						'company_phone' => $company_phone,
						'website' => $website,
						'facebook' => $facebook,
						'twitter' => $twitter,
						'company_detail' => $company_detail2,
						'office_hour' => $office_hours
					);
					$details = $this->Db_model->insert_data('px_propty_company', $data);
					if ($details) {
						$message = array(
							'status' => 3,
							'msg' => 'Data saved successfully',
							'pids' => $pids,
							'action' => 'addedprop',
						);
					} else {
						$message = array(
							'status' => 2,
							'msg' => 'Oops! database error'
						);
					}
				}
			} else {
				$message = array(
					'status' => 2,
					'msg' => 'Please insert Company name'
				);
			}
		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Basic details  are required'
			);
		}
		$message['action'] = 'addedprop';
		echo json_encode($message);
	}

	//function for add and update property amenities tab
	public function add_property_amenities()
	{
		$pid = '';
		$pid = $this->input->post('pid');
		$property_id = $this->input->post('getid');
		$pids = $this->input->post('pids');
		if ($property_id != '' || $pids != '' || $pid != '') {
			$indoor_query = $this->Db_model->select_data('*', 'px_addindooramenities', array('status' => 1));
			foreach ($indoor_query as $loop) {
				if ($this->input->post('indoor' . $loop["id"]) != 'null' && $this->input->post('indoor' . $loop["id"]) != '') {
					$indoor[] = array($this->input->post('indoor' . $loop["id"]) => $this->input->post('indoor' . $loop["id"]));
				}
			}
			if (isset($indoor) && !empty($indoor)) {
				$indoordata = json_encode($indoor);
			} else {
				$indoordata = '';
			}
			$outdoor_query = $this->Db_model->select_data('*', 'px_addoutdooramenities', array('status' => 1));
			foreach ($outdoor_query as $loop) {
				if ($this->input->post('outdoor' . $loop["id"]) != 'null' && $this->input->post('outdoor' . $loop["id"]) != '') {
					$outdoor[] = array($this->input->post('outdoor' . $loop["id"]) => $this->input->post('outdoor' . $loop["id"]));
				}
			}
			if (isset($outdoor) && !empty($outdoor)) {
				$outdoordata = json_encode($outdoor);
			} else {
				$outdoordata = '';
			}

			$wheres = array(
				'property_id' => $pids
			);
			$wherea = array(
				'property_id' => $property_id
			);
			$select = $this->Db_model->select_data('property_id', 'px_amenities', $wheres);
			$select1 = $this->Db_model->select_data('property_id', 'px_amenities', $wherea);
			if ($select || $select1) {
				$update_data = array(
					'indoor' => $indoordata,
					'outdoor' => $outdoordata
				);
				if ($select1) {
					$where3 = array(
						'property_id' => $property_id
					);
					$details = $this->Db_model->update_data('px_amenities', $update_data, $where3);
				} else {
					$where3 = array(
						'property_id' => $$pids
					);
					$details = $this->Db_model->update_data('px_amenities', $update_data, $where3);
				}
				if ($details) {
					$message = array(
						'status' => 3,
						'msg' => 'Data updated successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			} elseif ($pid) {
				$data = array(
					'property_id' => $pid,
					'indoor' => $indoordata,
					'outdoor' => $outdoordata
				);
				$details = $this->Db_model->insert_data('px_amenities', $data);
				if ($details) {
					$message = array(
						'status' => 3,
						'msg' => 'Data saved successfully',
						'action' => 'addedprop',
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			} else {
				$data = array(
					'property_id' => $pids,
					'indoor' => $indoordata,
					'outdoor' => $outdoordata
				);
				$details = $this->Db_model->insert_data('px_amenities', $data);
				if ($details) {
					$message = array(
						'status' => 3,
						'msg' => 'Data saved successfully',
						'pids' => $pids,
						'action' => 'addedprop',
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			}
		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Basic details  are required'
			);
		}
		$message['action'] = 'addedprop';
		echo json_encode($message);
	}

	//function for add and update property distance tab
	public function add_property_landmarks()
	{
		$pid = '';
		$pid = $this->input->post('pid');
		$property_id = $this->input->post('getid');
		$pids = $this->input->post('pids');
		if ($property_id != '' || $pids != '' || $pid != '') {
			$distance = '';
			$distance_query = $this->Db_model->select_data('*', 'px_addlandmarks', array('status' => 1));
			foreach ($distance_query as $loop) {
				$distance = $this->input->post(str_replace(" ", "_", $loop['land_mark']));
				$land_marks[] = array(str_replace(" ", "_", $loop['land_mark']) => $distance);
			}
			$landmarks = json_encode($land_marks);

			$wheres = array(
				'property_id' => $pids
			);
			$wherea = array(
				'property_id' => $property_id
			);
			//echo $property_id;
			$select = $this->Db_model->select_data('property_id', 'px_distent_thing', $wheres);
			$select1 = $this->Db_model->select_data('property_id', 'px_distent_thing', $wherea);
			if ($select || $select1) {
				$update_data = array(
					'land_marks' => $landmarks
				);
				if ($select1) {
					$where3 = array(
						'property_id' => $property_id
					);
					$details = $this->Db_model->update_data('px_distent_thing', $update_data, $where3);
				} else {
					$where3 = array(
						'property_id' => $$pids
					);
					$details = $this->Db_model->update_data('px_distent_thing', $update_data, $where3);
				}
				if ($details) {
					$message = array(
						'status' => 3,
						'msg' => 'Data updated successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			} elseif ($pid) {
				$data = array(
					'property_id' => $pid,
					'land_marks' => $landmarks
				);
				$details = $this->Db_model->insert_data('px_distent_thing', $data);
				if ($details) {
					$message = array(
						'status' => 3,
						'msg' => 'Data saved successfully',
						'action' => 'addedprop',
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			} else {
				$data = array(
					'property_id' => $pids,
					'land_marks' => $landmarks
				);
				$details = $this->Db_model->insert_data('px_distent_thing', $data);
				if ($details) {
					$message = array(
						'status' => 3,
						'msg' => 'Data saved successfully',
						'pids' => $pids,
						'action' => 'addedprop',
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			}
		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Basic details  are required'
			);
		}
		$message['action'] = 'addedprop';
		echo json_encode($message);
	}

	//function for add and update property multimedia tab
	public function add_property_media_old()
	{
		$pid = '';
		$pid = $this->input->post('pid');
		$property_id = $this->input->post('getid');
		$pids = $this->input->post('pids');
		//if($property_id=='' || $pid=='' || $pid==''){

		$vidss = $imgss = [];
		if (count($_FILES['images']['name']) > 10 || count($_FILES['videos']['name']) > 2) {
			if (count($_FILES['videos']['name']) > 2 && count($_FILES['images']['name']) > 10) {
				$message = array(
					'status' => 2,
					'msg' => 'Max two videos and ten images allowed'
				);
				echo json_encode($message);
				die();
			}
			if (count($_FILES['videos']['name']) > 2) {
				$message = array(
					'status' => 2,
					'msg' => 'Max two videos allowed'
				);
				echo json_encode($message);
				die();
			}
			if (count($_FILES['images']['name']) > 10) {
				$message = array(
					'status' => 2,
					'msg' => 'Max ten images allowed'
				);
				echo json_encode($message);
				die();
			}
		}
		$totalv = count($_FILES['videos']['name']);
		for ($i = 0; $i < $totalv; $i++) {
			$tmpFilePath = $_FILES['videos']['tmp_name'][$i];
			$videoname = $_FILES['videos']['name'][$i];
			$videosize = $_FILES['videos']['size'][$i];
			$ext = pathinfo($videoname, PATHINFO_EXTENSION);
			if ($tmpFilePath != "") {
				if ($ext == 'mp4' && $videosize < 40000000) {
					$newFilePath = "./uploads/video_upload/" . time() . $videoname;
					if (move_uploaded_file($tmpFilePath, $newFilePath)) {
						$vidss[] = time() . $videoname;
					}
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Only 40MB MP4 video supported'
					);
					echo json_encode($message);
					die();
				}
			}
		}
		$videos = json_encode($vidss);
		if (!isset($vidss) && empty($vidss)) {
			$vidss = [];
		}
		$totali = count($_FILES['images']['name']);
		for ($i = 0; $i < $totali; $i++) {
			$tmpFile = $_FILES['images']['tmp_name'][$i];
			$imagename = $_FILES['images']['name'][$i];
			$imagesize = $_FILES['images']['size'][$i];
			$ext = pathinfo($imagename, PATHINFO_EXTENSION);
			if ($tmpFile != "") {
				if (($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') && $imagesize < 10000000) {
					$newFile = "./uploads/" . time() . $i . '.' . $ext;
					if (move_uploaded_file($tmpFile, $newFile)) {
						$imgss[] = $imagename;
					}
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Only PNG and JPG/JPEG max 10MB supported'
					);
					echo json_encode($message);
					die();
				}
			}
		}
		if (!isset($imgss) && empty($imgss)) {
			$imgss = [];
		}
		$images = json_encode($imgss);
		$wheres = array(
			'property_id' => $pids
		);
		$wherea = array(
			'property_id' => $pids,
			//'property_id' => $property_id
		);
		$select = $this->Db_model->select_data('*', 'px_property_media', $wheres);
		$select1 = $this->Db_model->select_data('*', 'px_property_media', $wherea);

		if ($select || $select1) {
			$update_data = array(
				'videos' => $videos,
				'images' => $images
			);
			$where3 = array(
				'property_id' => $property_id
			);
			if ($vidss == []) {
				unset($update_data['videos']);
			}
			if ($imgss == []) {
				unset($update_data['images']);
			}
			if ($vidss != [] || $imgss != []) {
				if ($vidss != [] && count($vidss) != 0) {
					for ($s = 0; $s < count(json_decode($select1[0]['videos'], true)); $s++) {
						if (file_exists('./uploads/video_upload/' . json_decode($select1[0]['videos'], true)[$s])) {
							unlink('./uploads/video_upload/' . json_decode($select1[0]['videos'], true)[$s]);
						}
					}
				}

				if ($imgss != [] && count($imgss) != 0) {

					for ($t = 0; $t < count(json_decode($select1[0]['Images'], true)); $t++) {

						if (file_exists('./uploads/' . json_decode($select1[0]['Images'], true)[$t])) {
							unlink('./uploads/' . json_decode($select1[0]['Images'], true)[$t]);
						}
					}
				}
				$details = $this->Db_model->update_data('px_property_media', $update_data, $where3);
			} else {
				$details = '';
			}
			if ($details) {
				$message = array(
					'status' => 3,
					'msg' => 'Data updated successfully'
				);
			} else {
				$message = array(
					'status' => 2,
					'msg' => 'Oops! database error'
				);
			}
		} elseif ($pids) {
			$data = array(
				'property_id' => $pids,
				'videos' => $videos,
				'images' => $images
			);
			$details = $this->Db_model->insert_data('px_property_media', $data);
			if ($details) {
				$message = array(
					'status' => 3,
					'msg' => 'Data saved successfully',
					'action' => 'addedprop',
				);
			} else {
				$message = array(
					'status' => 2,
					'msg' => 'Oops! database error'
				);
			}
		} else {
			$data = array(
				'property_id' => $pids,
				'videos' => $videos,
				'images' => $images
			);
			$details = $this->Db_model->insert_data('px_property_media', $data);
			if ($details) {
				$message = array(
					'status' => 3,
					'msg' => 'Data saved successfully',
					'pids' => $pids,
					'action' => 'addedprop',
				);
			} else {
				$message = array(
					'status' => 2,
					'msg' => 'Oops! database error'
				);
			}
		}

		$message['action'] = 'addedprop';
		echo json_encode($message);
	}

	public function add_property_media()
	{
		$pid = '';
		$pid = $this->input->post('pid');
		$property_id = $this->input->post('getid');
		$pids = $this->input->post('pids');
		if ($property_id != '' || $pids != '' || $pid != '') {
			$vidss = $imgss = [];
			$totalv = count($_FILES['videos']['name']);
			for ($i = 0; $i < $totalv; $i++) {
				$tmpFilePath = $_FILES['videos']['tmp_name'][$i];
				$videoname = $_FILES['videos']['name'][$i];
				$videosize = $_FILES['videos']['size'][$i];
				$ext = pathinfo($videoname, PATHINFO_EXTENSION);
				$videoNewName = round(microtime(true)) . $i . '.' . $ext;
				if ($tmpFilePath != "") {
					if ($ext == 'mp4' && $videosize < 40000000) {
						$newFilePath = "./uploads/video_upload/" . $videoNewName;
						if (move_uploaded_file($tmpFilePath, $newFilePath)) {
							// array_push($vidss[], $videoNewName);
							$vidss[] = $videoNewName;
						}
					} else {
						$message = array(
							'status' => 2,
							'msg' => 'Only 40MB MP4 video supported'
						);
						echo json_encode($message);
						die();
					}
				}
			}
			$videos = json_encode($vidss);
			if (!isset($vidss) && empty($vidss)) {
				$vidss = [];
			}
			$totali = count($_FILES['images']['name']);
			for ($i = 0; $i < $totali; $i++) {
				$tmpFile = $_FILES['images']['tmp_name'][$i];
				$imagename = $_FILES['images']['name'][$i];
				$imagesize = $_FILES['images']['size'][$i];
				$ext = pathinfo($imagename, PATHINFO_EXTENSION);
				if ($tmpFile != "") {
					if (($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') && $imagesize < 10000000) {
						$newFile = "./uploads/" . round(microtime(true)) . $i . '.' . $ext;
						if (move_uploaded_file($tmpFile, $newFile)) {
							$imgss[] = round(microtime(true)) . $i . '.' . $ext;
						}
					} else {
						$message = array(
							'status' => 2,
							'msg' => 'Only PNG and JPG/JPEG max 10MB supported'
						);
						echo json_encode($message);
						die();
					}
				}
			}
			if (!isset($imgss) && empty($imgss)) {
				$imgss = [];
			}
			$images = json_encode($imgss);
			$wheres = array(
				'property_id' => $pids,
				'property_id !=' => 0
			);
			$wherea = array(
				'property_id' => $property_id,
				'property_id !=' => 0
			);
			$select = $this->Db_model->select_data('*', 'px_property_media', $wheres);

			$select1 = $this->Db_model->select_data('*', 'px_property_media', $wherea);
			if ($select || $select1) {
				$update_data = array(
					'videos' => $videos,
					'images' => $images
				);
				$where3 = array(
					'property_id' => $property_id
				);
				if ($vidss == []) {
					unset($update_data['videos']);
				}
				if ($imgss == []) {
					unset($update_data['images']);
				}
				if ($vidss != [] || $imgss != []) {
					if ($vidss != []) {
						if (!empty($select1)) {
							for ($s = 0; $s < count(json_decode($select1[0]['videos'], true)); $s++) {
								if (file_exists('./uploads/video_upload/' . json_decode($select1[0]['videos'], true)[$s])) {
									unlink('./uploads/video_upload/' . json_decode($select1[0]['videos'], true)[$s]);
								}
							}
						} else {
							for ($s = 0; $s < count(json_decode($select[0]['videos'], true)); $s++) {
								if (file_exists('./uploads/video_upload/' . json_decode($select[0]['videos'], true)[$s])) {
									unlink('./uploads/video_upload/' . json_decode($select[0]['videos'], true)[$s]);
								}
							}
						}
					}
					if ($imgss != []) {
						if (!empty($select1)) {
							for ($t = 0; $t < count(json_decode($select1[0]['Images'], true)); $t++) {
								if (file_exists('./uploads/' . json_decode($select1[0]['Images'], true)[$t])) {
									unlink('./uploads/' . json_decode($select1[0]['Images'], true)[$t]);
								}
							}
						} else {
							for ($t = 0; $t < count(json_decode($select[0]['Images'], true)); $t++) {
								if (file_exists('./uploads/' . json_decode($select[0]['Images'], true)[$t])) {
									unlink('./uploads/' . json_decode($select[0]['Images'], true)[$t]);
								}
							}
						}
					}
					$details = $this->Db_model->update_data('px_property_media', $update_data, $where3);
					if ($details) {
						$message = array(
							'status' => 3,
							'type' => 'media',
							'role' => 'admin',
							'msg' => 'Data updated successfully'
						);
					} else {

						$message = array(
							'status' => 2,
							'msg' => 'Oops! database error3'
						);
					}
					// if ($pid != '') {
					// 	$this->Db_model->update_data('px_properties', ['complete' => 1], ['id' => $pid]);
					// }
					// else{
					//     $this->Db_model->update_data('px_properties', ['complete' => 1], ['id' => $pids]);
					// }
				} else {
					$details = '';
					$message = array(
						'status' => 3,
						'type' => 'media',
						'role' => 'admin',
						'msg' => 'Data updated successfully'
					);
				}
			
			} elseif ($pid) {
				$data = array(
					'property_id' => $pid,
					'videos' => $videos,
					'images' => $images
				);
				$details = $this->Db_model->insert_data('px_property_media', $data);
				if ($details) {
					$message = array(
						'status' => 3,
						'type' => 'media',
						'role' => 'admin',
						'msg' => 'Data saved successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error2'
					);
				}
			} else {
				$data = array(
					'property_id' => $pids,
					'videos' => $videos,
					'images' => $images
				);
				$details = $this->Db_model->insert_data('px_property_media', $data);
				if ($details) {
					$message = array(
						'status' => 3,
						'type' => 'media',
						'role' => 'admin',
						'msg' => 'Data saved successfully',
						'pids' => $pids
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error1'
					);
				}
			}
		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Basic details  are required'
			);
		}

	
		$message['action'] = 'addedprop';
		echo json_encode($message);
	}
	public function update_country()
	{

		$config['upload_path'] = './uploads/countries/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('cImg')) {
			$datas = $this->upload->data();
			$filename1 = $datas['file_name'];
			$cImg = $filename1;
		}
		if (!isset($cImg) && empty($cImg)) {
			$cImg = '';
		}
		$data = array(
			'image' => $cImg,
		);
		$where = array(
			'id' => $_POST['countryId']
		);

		if ($cImg != '') {
			$update_query = $this->Db_model->update_data('px_country', $data, $where);
			if ($update_query) {
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
				'msg' => 'Please select image'
			);
		}
		echo json_encode($message);


	}

	public function countries()
	{

		$edit['countries'] = $this->Db_model->select_data('*', 'px_country');
		$this->load->view('common/admin_header', $edit);
		$this->load->view('common/admin_sidebar');
		$this->load->view('add_country');
		$this->load->view('common/footer');


	}

	// custom add category dropdown option
	public function categories()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}

		$cid = '';
		$cid = $this->input->get('cid');
		if ($cid) {
			$where = array(
				'id' => $cid
			);
			$update = $this->Db_model->select_data('*', 'px_addcategory', $where);
			$edit = $this->Db_model->select_data('*', 'px_addcategory');
			$data = array(
				'update_category' => $update,
				'category_table' => $edit
			);
			$this->load->view('common/admin_header', $data);
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_category');
			$this->load->view('common/footer');
		} else {
			$edit['category_table'] = $this->Db_model->select_data('*', 'px_addcategory');
			$this->load->view('common/admin_header', $edit);
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_category');
			$this->load->view('common/footer');
		}
	}

	// custom add category form data
	public function addcategory()
	{
		$update_id = '';
		$update_id = $this->input->post('update_id');
		$this->form_validation->set_rules('category', '', 'required');
		if ($this->form_validation->run()) {
			$checkNameExist = $this->db->query('select * from px_addcategory where category = "' . $this->input->post('category') . '" ')->result_array();

			if (!empty($checkNameExist)) {
				$message = array(
					'status' => 2,
					'msg' => 'Category already exists'
				);
			} else {
				$category = $this->input->post('category');
				$value = array(
					'category' => $category
				);
				if ($update_id) {
					$where = array(
						'id' => $update_id
					);
					$query = $this->Db_model->update_data('px_addcategory', $value, $where);
					if ($query) {
						$message = array(
							'status' => 4,
							'msg' => 'Data updated successfully'
						);
					} else {
						$message = array(
							'status' => 2,
							'msg' => 'Oops! database error'
						);
					}
				} else {
					$query = $this->Db_model->insert_data('px_addcategory', $value);
					if ($query) {
						$message = array(
							'status' => 1,
							'msg' => 'Data added successfully'
						);
					} else {
						$message = array(
							'status' => 2,
							'msg' => 'Oops! database error'
						);
					}
				}
			}


		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Field is required'
			);
		}
		echo json_encode($message);
	}

	// custom add Purpose dropdown option
	public function purpose()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$ppid = '';
		$ppid = $this->input->get('ppid');
		if ($ppid) {
			$where = array(
				'id' => $ppid
			);
			$update = $this->Db_model->select_data('*', 'px_addpurpose', $where);
			$edit = $this->Db_model->select_data('*', 'px_addpurpose');
			$data = array(
				'update_purpose' => $update,
				'purpose_table' => $edit
			);
			$this->load->view('common/admin_header', $data);
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_purpose');
			$this->load->view('common/footer');
		} else {
			$edit['purpose_table'] = $this->Db_model->select_data('*', 'px_addpurpose');
			$this->load->view('common/admin_header', $edit);
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_purpose');
			$this->load->view('common/footer');
		}
	}

	// custom add Purpose form data
	public function addpurpose()
	{
		$update_id = '';
		$update_id = $this->input->post('update_id');
		$this->form_validation->set_rules('purpose', '', 'required');
		if ($this->form_validation->run()) {
			$purpose = $this->input->post('purpose');
			$value = array(
				'purpose' => $purpose
			);
			if ($update_id) {
				$where = array(
					'id' => $update_id
				);
				$query = $this->Db_model->update_data('px_addpurpose', $value, $where);
				if ($query) {
					$message = array(
						'status' => 4,
						'msg' => 'Data updated successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			} else {
				$query = $this->Db_model->insert_data('px_addpurpose', $value);
				if ($query) {
					$message = array(
						'status' => 1,
						'msg' => 'Data added successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			}
		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Field is required'
			);
		}
		echo json_encode($message);
	}

	// custom add amenities  option
	public function amenities()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$iaid = $oaid = '';
		$iaid = $this->input->get('iaid');
		$oaid = $this->input->get('oaid');
		if ($iaid || $oaid) {
			if ($iaid) {
				$where = array(
					'id' => $iaid
				);
				$indoor_update = $this->Db_model->select_data('*', 'px_addindooramenities', $where);
				$indoor_edit = $this->Db_model->select_data('*', 'px_addindooramenities');
				$outdoor_edit = $this->Db_model->select_data('*', 'px_addoutdooramenities');
				$data = array(
					'update_indoor_amenities' => $indoor_update,
					'indoor_amenities_table' => $indoor_edit,
					'outdoor_amenities_table' => $outdoor_edit
				);
			} elseif ($oaid) {
				$where = array(
					'id' => $oaid
				);
				$outdoor_update = $this->Db_model->select_data('*', 'px_addoutdooramenities', $where);
				$indoor_edit = $this->Db_model->select_data('*', 'px_addindooramenities');
				$outdoor_edit = $this->Db_model->select_data('*', 'px_addoutdooramenities');
				$data = array(
					'update_outdoor_amenities' => $outdoor_update,
					'indoor_amenities_table' => $indoor_edit,
					'outdoor_amenities_table' => $outdoor_edit
				);
			}
			$this->load->view('common/admin_header', $data);
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_amenities');
			$this->load->view('common/footer');
		} else {
			$indoor_edit = $this->Db_model->select_data('*', 'px_addindooramenities');
			$outdoor_edit = $this->Db_model->select_data('*', 'px_addoutdooramenities');
			$data = array(
				'indoor_amenities_table' => $indoor_edit,
				'outdoor_amenities_table' => $outdoor_edit
			);
			$this->load->view('common/admin_header', $data);
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_amenities');
			$this->load->view('common/footer');
		}
	}

	// custom add Indoor amenities form data
	public function indoor_amenities()
	{
		$update_id = '';
		$update_id = $this->input->post('update_id');
		$this->form_validation->set_rules('indoor', '', 'required');
		if ($this->form_validation->run()) {
			$indoor = $this->input->post('indoor');
			$status = $this->input->post('instatus');
			$value = array(
				'indoor' => $indoor,
				'status' => $status
			);
			if ($update_id) {
				$where = array(
					'id' => $update_id
				);
				$query = $this->Db_model->update_data('px_addindooramenities', $value, $where);
				if ($query) {
					$message = array(
						'status' => 4,
						'msg' => 'Data updated successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			} else {
				$badgeExists = $this->db->query('select *  from px_addindooramenities where indoor = "'.$indoor.'"')->row_array();
				if(!empty($badgeExists)){
					$message = array(
						'status' => 2,
						'msg' => 'Amenity name already exists.'
					);
				}else{

				$query = $this->Db_model->insert_data('px_addindooramenities', $value);
				if ($query) {
					$message = array(
						'status' => 1,
						'msg' => 'Data added successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			}
			}
		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Field is required'
			);
		}
		echo json_encode($message);
	}

	// custom add Outdoor amenities form data
	public function outdoor_amenities()
	{
		$update_id = '';
		$update_id = $this->input->post('update_id');
		$this->form_validation->set_rules('outdoor', '', 'required');
		if ($this->form_validation->run()) {
			$outdoor = $this->input->post('outdoor');
			$status = $this->input->post('outstatus');
			$value = array(
				'outdoor' => $outdoor,
				'status' => $status
			);
			if ($update_id) {
				$where = array(
					'id' => $update_id
				);
				$query = $this->Db_model->update_data('px_addoutdooramenities', $value, $where);
				if ($query) {
					$message = array(
						'status' => 4,
						'msg' => 'Data updated successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			} else {
				$badgeExists = $this->db->query('select *  from px_addoutdooramenities where outdoor = "'.$outdoor.'"')->row_array();
				if(!empty($badgeExists)){
					$message = array(
						'status' => 2,
						'msg' => 'Amenity name already exists.'
					);
				}else{
				$query = $this->Db_model->insert_data('px_addoutdooramenities', $value);
				if ($query) {
					$message = array(
						'status' => 1,
						'msg' => 'Data added successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			}
			}
		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Field is required'
			);
		}
		echo json_encode($message);
	}

	// custom add Badge dropdown option
	public function badges()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$bid = '';
		$bid = $this->input->get('bid');
		if ($bid) {
			$where = array(
				'id' => $bid
			);
			$update = $this->Db_model->select_data('*', 'px_addbadge', $where);
			$edit = $this->Db_model->select_data('*', 'px_addbadge');
			$data = array(
				'update_badge' => $update,
				'badge_table' => $edit
			);
			$this->load->view('common/admin_header', $data);
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_badge');
			$this->load->view('common/footer');
		} else {
			$edit['badge_table'] = $this->Db_model->select_data('*', 'px_addbadge');
			$this->load->view('common/admin_header', $edit);
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_badge');
			$this->load->view('common/footer');
		}
	}

	// custom add category form data
	public function addbadge()
	{
		$update_id = '';
		$update_id = $this->input->post('update_id');
		$this->form_validation->set_rules('badge', '', 'required');
		if ($this->form_validation->run()) {
			$badge = $this->input->post('badge');
			$value = array(
				'badge' => $badge
			);
			if ($update_id) {
				$where = array(
					'id' => $update_id
				);
				$query = $this->Db_model->update_data('px_addbadge', $value, $where);
				if ($query) {
					$message = array(
						'status' => 4,
						'msg' => 'Data updated successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			} else {
				$badgeExists = $this->db->query('select *  from px_addbadge where badge = "'.$badge.'"')->row_array();
				if(!empty($badgeExists)){
					$message = array(
						'status' => 2,
						'msg' => 'Badge name already exists.'
					);
				}else{
					$query = $this->Db_model->insert_data('px_addbadge', $value);
					if ($query) {
						$message = array(
							'status' => 1,
							'msg' => 'Data added successfully'
						);
					} else {
						$message = array(
							'status' => 2,
							'msg' => 'Oops! database error'
						);
					}
				}
				
			}
		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Field is required'
			);
		}
		echo json_encode($message);
	}

	// custom add Neighbourhood dropdown option
	public function neighbourhood()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}

		$nid = '';
		$nid = $this->input->get('nid');
		if ($nid) {
			$where = array(
				'id' => $nid
			);
			$update = $this->Db_model->select_data('*', 'px_addneighbourhood', $where);
			$edit = $this->Db_model->select_data('*', 'px_addneighbourhood');
			$data = array(
				'update_neighbourhood' => $update,
				'neighbourhood_table' => $edit
			);
			$this->load->view('common/admin_header', $data);
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_neighbourhood');
			$this->load->view('common/footer');
		} else {
			$edit['neighbourhood_table'] = $this->Db_model->select_data('*', 'px_addneighbourhood');
			$this->load->view('common/admin_header', $edit);
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_neighbourhood');
			$this->load->view('common/footer');
		}
	}

	// custom add category form data
	public function addneighbourhood()
	{
		$update_id = '';
		$update_id = $this->input->post('update_id');
		$this->form_validation->set_rules('neighbourhood', '', 'required');
		if ($this->form_validation->run()) {
			$neighbourhood = $this->input->post('neighbourhood');
			$value = array(
				'neighbourhood' => $neighbourhood
			);
			if ($update_id) {
				$where = array(
					'id' => $update_id
				);
				$query = $this->Db_model->update_data('px_addneighbourhood', $value, $where);
				if ($query) {
					$message = array(
						'status' => 4,
						'msg' => 'Data updated successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			} else {
				$badgeExists = $this->db->query('select *  from px_addneighbourhood where neighbourhood = "'.$neighbourhood.'"')->row_array();
				if(!empty($badgeExists)){
					$message = array(
						'status' => 2,
						'msg' => 'Neighbourhood already exists.'
					);
				}else{

					$query = $this->Db_model->insert_data('px_addneighbourhood', $value);
					if ($query) {
						$message = array(
							'status' => 1,
							'msg' => 'Data added successfully'
						);
					} else {
						$message = array(
							'status' => 2,
							'msg' => 'Oops! database error'
						);
					}
				}
			}
		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Field is required'
			);
		}
		echo json_encode($message);
	}

	// custom add Badge dropdown option
	public function ownership()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$osid = '';
		$osid = $this->input->get('osid');
		if ($osid) {
			$where = array(
				'id' => $osid
			);
			$update = $this->Db_model->select_data('*', 'px_addownership', $where);
			$edit = $this->Db_model->select_data('*', 'px_addownership');
			$data = array(
				'update_ownership' => $update,
				'ownership_table' => $edit
			);
			$this->load->view('common/admin_header', $data);
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_ownership');
			$this->load->view('common/footer');
		} else {
			$edit['ownership_table'] = $this->Db_model->select_data('*', 'px_addownership');
			$this->load->view('common/admin_header', $edit);
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_ownership');
			$this->load->view('common/footer');
		}
	}

	// custom add category form data
	public function addownership()
	{
		$update_id = '';
		$update_id = $this->input->post('update_id');
		$this->form_validation->set_rules('ownership', '', 'required');
		if ($this->form_validation->run()) {
			$ownership = $this->input->post('ownership');
			$value = array(
				'ownership' => $ownership
			);
			if ($update_id) {
				$where = array(
					'id' => $update_id
				);
				$query = $this->Db_model->update_data('px_addownership', $value, $where);
				if ($query) {
					$message = array(
						'status' => 4,
						'msg' => 'Data updated successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			} else {

				$badgeExists = $this->db->query('select *  from px_addownership where ownership = "'.$ownership.'"')->row_array();
				if(!empty($badgeExists)){
					$message = array(
						'status' => 2,
						'msg' => 'Ownership already exists.'
					);
				}else{

				$query = $this->Db_model->insert_data('px_addownership', $value);
				if ($query) {
					$message = array(
						'status' => 1,
						'msg' => 'Data added successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			}
			}
		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Field is required'
			);
		}
		echo json_encode($message);
	}

	// custom add land mark form fields
	public function landmark()
	{
		$did = '';
		$did = $this->input->get('did');
		if ($did) {
			$where = array(
				'id' => $did
			);
			$update = $this->Db_model->select_data('*', 'px_addlandmarks', $where);
			$edit = $this->Db_model->select_data('*', 'px_addlandmarks');
			$data = array(
				'update_landmarks' => $update,
				'landmarks_table' => $edit
			);
			$this->load->view('common/admin_header', $data);
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_landmarks');
			$this->load->view('common/footer');
		} else {
			$edit['landmarks_table'] = $this->Db_model->select_data('*', 'px_addlandmarks');
			$this->load->view('common/admin_header', $edit);
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_landmarks');
			$this->load->view('common/footer');
		}
	}

	// custom add land mark field data
	public function addlandmark()
	{
		$update_id = '';
		$update_id = $this->input->post('update_id');
		$this->form_validation->set_rules('land_mark', '', 'required');
		if ($this->form_validation->run()) {
			$land_mark = $this->input->post('land_mark');
			$status = $this->input->post('status');
			$value = array(
				'land_mark' => $land_mark,
				'status' => $status
			);
			if ($update_id) {
				$where = array(
					'id' => $update_id
				);
				$query = $this->Db_model->update_data('px_addlandmarks', $value, $where);
				if ($query) {
					$message = array(
						'status' => 4,
						'msg' => 'Data updated successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			} else {
				$badgeExists = $this->db->query('select *  from px_addlandmarks where land_mark = "'.$land_mark.'"')->row_array();
				if(!empty($badgeExists)){
					$message = array(
						'status' => 2,
						'msg' => 'Landmark name already exists.'
					);
				}else{
				$query = $this->Db_model->insert_data('px_addlandmarks', $value);
				if ($query) {
					$message = array(
						'status' => 1,
						'msg' => 'Data added successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			}
			}
		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Field is required'
			);
		}
		echo json_encode($message);
	}

	// team listing
	public function team()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		// 		$where = array(
// 			'user_type' => 'user',
// 		);
// 		$data['userdata'] = $this->Db_model->select_data('*','px_userdata',$where);
		$this->db->select('*');
		$this->db->from('px_userdata');
		$this->db->where(['user_type !=' => 'admin']);
		$data['userdata'] = $this->db->get()->result_array();



		$this->load->view('common/admin_header', $data);
		$this->load->view('common/admin_sidebar');
		$this->load->view('userdata');
		$this->load->view('common/footer');
	}

	public function changeUserStatus()
	{
		$action = $this->input->post('action');
		$userIds = $this->input->post('userIds');

		if ($action == 'delete') {
			// trash query 

			$this->db->where_in('id', $userIds);
			$this->db->delete('px_userdata');

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Deleted users accounts successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not delete users accounts.'));
			}

		} else if ($action == 'active') {
			$data = array(
				'status' => 1,
			);

			$this->db->where_in('id', $userIds);
			$this->db->update('px_userdata', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Active successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}
		} else if ($action == 'inactive') {
			$data = array(
				'status' => 0,
			);

			$this->db->where_in('id', $userIds);
			$this->db->update('px_userdata', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Inactive successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}

		}

	}

	public function deleteInquiry()
	{
		$action = $this->input->post('action');
		$inqIds = $this->input->post('inqIds');

		if ($action == 'delete') {
			// trash query 

			$this->db->where_in('id', $inqIds);
			$this->db->delete('px_inquires');

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Deleted Inquiries successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not delete Inquiries.'));
			}

		}

	}
	public function deleteVisaInquiry()
	{
		$action = $this->input->post('action');
		$inqIds = $this->input->post('inqIds');

		if ($action == 'delete') {
			// trash query 

			$this->db->where_in('id', $inqIds);
			$this->db->delete('px_visa_inquires');

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Deleted Inquiries successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not delete Inquiries.'));
			}

		}

	}


	public function changePropertyStatus()
	{
		$action = $this->input->post('action');
		$propIds = $this->input->post('propIds');

		if ($action == 'delete') {
			// trash query 

			$this->db->where_in('id', $propIds);
			$this->db->delete('px_properties');

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Deleted Properties successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not delete Properties.'));
			}

		} else if ($action == 'active') {
			$data = array(
				'activation' => 1,
			);

			$this->db->where_in('id', $propIds);
			$this->db->update('px_properties', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Active successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}
		} else if ($action == 'inactive') {
			$data = array(
				'activation' => 0,
			);

			$this->db->where_in('id', $propIds);
			$this->db->update('px_properties', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Inactive successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}

		} else if ($action == 'approve') {
			$data = array(
				'approve' => 1,
				'activation' => 1,
			);

			$this->db->where_in('id', $propIds);
			$this->db->where('approve !=', '2');
			$this->db->update('px_properties', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Approved Properties successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not approve Properties.'));
			}
		} else if ($action == 'reject') {
			$data = array(
				'approve' => 2,
				'activation' => 0
			);

			$this->db->where_in('id', $propIds);
			$this->db->update('px_properties', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Rejected Properties successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not reject Properties.'));
			}
		}

	}

	public function changePurposeStatus()
	{
		$action = $this->input->post('action');
		$prpsIds = $this->input->post('prpsIds');

		if ($action == 'delete') {
			// trash query 

			$this->db->where_in('id', $prpsIds);
			$this->db->delete('px_addpurpose');

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Deleted Puposes successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not delete Puposes.'));
			}

		} else if ($action == 'active') {
			$data = array(
				'status' => 1,
			);

			$this->db->where_in('id', $prpsIds);
			$this->db->update('px_addpurpose', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Active successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}
		} else if ($action == 'inactive') {
			$data = array(
				'status' => 0,
			);

			$this->db->where_in('id', $prpsIds);
			$this->db->update('px_addpurpose', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Inactive successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}

		}

	}


	public function changeNbrStatus()
	{
		$action = $this->input->post('action');
		$nbrIds = $this->input->post('nbrIds');

		if ($action == 'delete') {
			// trash query 

			$this->db->where_in('id', $nbrIds);
			$this->db->delete('px_addneighbourhood');

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Deleted Neighbourhood successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not delete Neighbouhoods.'));
			}

		} else if ($action == 'active') {
			$data = array(
				'status' => 1,
			);

			$this->db->where_in('id', $nbrIds);
			$this->db->update('px_addneighbourhood', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Active successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}
		} else if ($action == 'inactive') {
			$data = array(
				'status' => 0,
			);

			$this->db->where_in('id', $nbrIds);
			$this->db->update('px_addneighbourhood', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Inactive successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}

		}

	}

	public function changeLandmarkStatus()
	{
		$action = $this->input->post('action');
		$lndmrkIds = $this->input->post('lndmrkIds');

		if ($action == 'delete') {
			// trash query 

			$this->db->where_in('id', $lndmrkIds);
			$this->db->delete('px_addlandmarks');

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Deleted Landmarks successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not delete Landmarks.'));
			}

		} else if ($action == 'active') {
			$data = array(
				'status' => 1,
			);

			$this->db->where_in('id', $lndmrkIds);
			$this->db->update('px_addlandmarks', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Active successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}
		} else if ($action == 'inactive') {
			$data = array(
				'status' => 0,
			);

			$this->db->where_in('id', $lndmrkIds);
			$this->db->update('px_addlandmarks', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Inactive successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}

		}

	}

	public function changeIAStatus()
	{
		$action = $this->input->post('action');
		$idaIds = $this->input->post('idaIds');

		if ($action == 'delete') {
			// trash query 

			$this->db->where_in('id', $idaIds);
			$this->db->delete('px_addindooramenities');

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Deleted Indoor Amenities successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not delete Indoor Amenities.'));
			}

		} else if ($action == 'active') {
			$data = array(
				'status' => 1,
			);

			$this->db->where_in('id', $idaIds);
			$this->db->update('px_addindooramenities', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Active successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}
		} else if ($action == 'inactive') {
			$data = array(
				'status' => 0,
			);

			$this->db->where_in('id', $idaIds);
			$this->db->update('px_addindooramenities', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Inactive successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}

		}

	}

	public function changeOAStatus()
	{
		$action = $this->input->post('action');
		$odaIds = $this->input->post('odaIds');

		if ($action == 'delete') {

			$this->db->where_in('id', $odaIds);
			$this->db->delete('px_addoutdooramenities');

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Deleted Outdoor Amenities successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not delete Outdoor Amenities.'));
			}

		} else if ($action == 'active') {
			$data = array(
				'status' => 1,
			);

			$this->db->where_in('id', $odaIds);
			$this->db->update('px_addoutdooramenities', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Active successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}
		} else if ($action == 'inactive') {
			$data = array(
				'status' => 0,
			);

			$this->db->where_in('id', $odaIds);
			$this->db->update('px_addoutdooramenities', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Inactive successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}

		}

	}

	public function changeOwnershipStatus()
	{
		$action = $this->input->post('action');
		$ownershipIds = $this->input->post('ownershipIds');

		if ($action == 'delete') {
			// trash query 

			$this->db->where_in('id', $ownershipIds);
			$this->db->delete('px_addownership');

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Deleted Ownerships successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not delete Ownerships.'));
			}

		} else if ($action == 'active') {
			$data = array(
				'status' => 1,
			);

			$this->db->where_in('id', $ownershipIds);
			$this->db->update('px_addownership', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Active successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}
		} else if ($action == 'inactive') {
			$data = array(
				'status' => 0,
			);

			$this->db->where_in('id', $ownershipIds);
			$this->db->update('px_addownership', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Inactive successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}

		}

	}

	public function changeBadgeStatus()
	{
		$action = $this->input->post('action');
		$badgeIds = $this->input->post('badgeIds');

		if ($action == 'delete') {
			// trash query 

			$this->db->where_in('id', $badgeIds);
			$this->db->delete('px_addbadge');

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Deleted users accounts successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not delete users accounts.'));
			}

		} else if ($action == 'active') {
			$data = array(
				'status' => 1,
			);

			$this->db->where_in('id', $badgeIds);
			$this->db->update('px_addbadge', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Active successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}
		} else if ($action == 'inactive') {
			$data = array(
				'status' => 0,
			);

			$this->db->where_in('id', $badgeIds);
			$this->db->update('px_addbadge', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Inactive successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}

		}

	}


	public function changeCatStatus()
	{
		$action = $this->input->post('action');
		$catIds = $this->input->post('catIds');

		if ($action == 'delete') {
			// trash query 

			$this->db->where_in('id', $catIds);
			$this->db->delete('px_addcategory');

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Deleted categories successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not delete categories.'));
			}

		} else if ($action == 'active') {
			$data = array(
				'status' => 1,
			);

			$this->db->where_in('id', $catIds);
			$this->db->update('px_addcategory', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Active successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}
		} else if ($action == 'inactive') {
			$data = array(
				'status' => 0,
			);

			$this->db->where_in('id', $catIds);
			$this->db->update('px_addcategory', $data);

			if ($this->db->affected_rows() > 0) {
				echo json_encode(array('status' => true, 'msg' => 'Status changed to Inactive successfully.'));
			} else {
				echo json_encode(array('status' => false, 'msg' => 'Could not change status.'));
			}

		}

	}


	// user add form page load and show data
	public function edit_team()
	{
		$uid = '';
		$uid = $this->input->get('uid');
		if ($uid) {
			$where = array(
				'id' => $uid
			);
			$edit['users'] = $this->Db_model->select_data('*', 'px_userdata', $where);
			$edit['packages'] = $this->Db_model->select_data('*', 'px_packages');
			$this->load->view('common/admin_header', $edit);
			$this->load->view('common/admin_sidebar');
			$this->load->view('user_detail');
			$this->load->view('common/footer');
		} else {
			$edit['packages'] = $this->Db_model->select_data('*', 'px_packages');
			$this->load->view('common/admin_header', $edit);
			$this->load->view('common/admin_sidebar');
			$this->load->view('user_detail');
			$this->load->view('common/footer');
		}
	}


	// user details form data for add and update
	public function add_team()
	{
		$uid = '';
		$uid = $this->input->get('uid');
		$this->form_validation->set_rules('email', '', 'required|valid_email');
		$this->form_validation->set_rules('user_type', '', 'required');
		if ($this->form_validation->run()) {
			$getid = $this->input->post('getid');
			$full_name = $this->input->post('full_name');
			$user_name = $this->input->post('user_name');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$user_type = $this->input->post('user_type');
			$package_nm = $this->input->post('package_nm');
			$package_expiry = $this->input->post('package_expiry');
			$UC_code = $this->input->post('UC_code');
			$phone = $this->input->post('phone');
			$full_phone = $UC_code . $phone;
			$language = $this->input->post('language');
			$address = $this->input->post('address');
			$payment = $this->input->post('payment');
			$description = $this->input->post('description');
			$status = $this->input->post('status');
			$sms_notification = $this->input->post('sms_notification');
			$email_alert = $this->input->post('email_alert');
			$data = array(
				'full_name' => $full_name,
				'user_name' => $user_name,
				'email' => $email,
				'user_type' => $user_type,
				'package_nm' => $package_nm,
				'package_expiry' => $package_expiry,
				'phone' => $full_phone,
				'language' => $language,
				'address' => $address,
				'payment' => $payment,
				'description' => $description,
				'status' => $status,
				'sms_notification' => $sms_notification,
				'email_alert' => $email_alert
			);
			if ($password != '') {
				$data['password'] = md5($password);
			}
			$wheres = array(
				'id' => $getid
			);
			$select = $this->Db_model->select_data('*', 'px_userdata', $wheres);
			if ($select) {
				$where = array(
					'id' => $getid
				);
				$details = $this->Db_model->update_data('px_userdata', $data, $where);
				if ($details) {
					$message = array(
						'status' => 1,
						'msg' => 'Data updated successfully',
						'redirect' => true
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			} else {
				$details = $this->Db_model->insert_data('px_userdata', $data);
				if ($details) {
					$message = array(
						'status' => 3,
						'msg' => 'Data saved successfully',
						'uids' => $details,
						'redirect' => true
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			}
		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Please provide email and user type'
			);
		}
		echo json_encode($message);
	}

	// user extra information form data for add and update
	public function extra_info()
	{
		$property_id = $this->input->post('getid');
		$uids = $this->input->post('uids');
		$fb_link = $this->input->post('fb_link');
		$twitter_link = $this->input->post('twitter_link');
		$linkedin_link = $this->input->post('linkedin_link');
		$insta_link = $this->input->post('insta_link');
		$wheres = array(
			'id' => $uids
		);
		$wherea = array(
			'id' => $property_id
		);
		$select = $this->Db_model->select_data('id', 'px_userdata', $wheres);
		$select1 = $this->Db_model->select_data('id', 'px_userdata', $wherea);
		if ($select || $select1) {
			$update_data = array(
				'fb_link' => $fb_link,
				'twitter_link' => $twitter_link,
				'insta_link' => $insta_link,
				'linkedin_link' => $linkedin_link
			);
			if ($select1) {
				$where3 = array(
					'id' => $property_id
				);
				$details = $this->Db_model->update_data('px_userdata', $update_data, $where3);
			} else {
				$where3 = array(
					'id' => $uids
				);
				$details = $this->Db_model->update_data('px_userdata', $update_data, $where3);
			}
			if ($details) {
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
				'msg' => 'First provide email, password and user_type for this data'
			);
		}
		echo json_encode($message);
	}


	public function contacts()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}


		$this->db->select('*');
		$this->db->from('px_inquires');
		$this->db->where('property_id', null);
		$query = $this->db->get();

		$data['type'] = 'messages';
		$data['inquiry'] = $query->result_array();

		$this->load->view('common/admin_header', $data);
		$this->load->view('common/admin_sidebar');
		$this->load->view('inquiries');
		$this->load->view('common/footer');
	}

	// Inquiries page data
	public function inquiries()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		// 		$data['inquiry'] = $this->Db_model->select_data('*','px_inquires','','',array('id','desc'));

		$this->db->select('px_inquires.*, px_properties.url_sluge');
		$this->db->from('px_inquires');
		$this->db->join('px_properties', 'px_inquires.property_id = px_properties.id');
		$query = $this->db->get();

		$data['inquiry'] = $query->result_array();

		$this->load->view('common/admin_header', $data);
		$this->load->view('common/admin_sidebar');
		$this->load->view('inquiries');
		$this->load->view('common/footer');
	}
	public function visa_inquiries()
	{


		$this->db->select('*');
		$this->db->from('px_visa_queries');
		$query = $this->db->get();

		$data['inquiry'] = $query->result_array();

		$this->load->view('common/admin_header', $data);
		$this->load->view('common/admin_sidebar');
		$this->load->view('visa-inquiries');
		$this->load->view('common/footer');
	}

	// manage package page data
	public function packages()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$data['package'] = $this->Db_model->select_data('*', 'px_packages');
		$this->load->view('common/admin_header', $data);
		$this->load->view('common/admin_sidebar');
		$this->load->view('packages');
		$this->load->view('common/footer');
	}

	// add package page data
	public function edit_package()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$update_id = '';
		$update_id = $this->input->get('pid');
		if ($update_id) {
			$where = array(
				'id' => $update_id
			);
			$data['package'] = $this->Db_model->select_data('*', 'px_packages', $where);
			$this->load->view('common/admin_header', $data);
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_package');
			$this->load->view('common/footer');
		} else {
			$this->load->view('common/admin_header');
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_package');
			$this->load->view('common/footer');
		}
	}

	// add package form data
	public function add_package()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$update_id = '';
		$update_id = $this->input->post('update_id');
		$this->form_validation->set_rules('packg_nm', '', 'required');
		$this->form_validation->set_rules('packg_price', '', 'required');
		$this->form_validation->set_rules('listing_limit', '', 'required');
		$this->form_validation->set_rules('packg_period', '', 'required');
		if ($this->form_validation->run()) {
			$packg_nm = $this->input->post('packg_nm');
			$packg_price = $this->input->post('packg_price');
			$currency = $this->input->post('currency');
			$listing_limit = $this->input->post('listing_limit');
			$packg_period = $this->input->post('packg_period');
			$user_type = $this->input->post('user_type');
			$duration_unit = $this->input->post('duration_unit');
			if ($update_id) {
				$data = array(
					'packg_nm' => $packg_nm,
					'packg_price' => $packg_price,
					'currency' => $currency,
					'listing_limit' => $listing_limit,
					'packg_period' => $packg_period,
					'user_type' => $user_type,
					'duration_unit' => $duration_unit
				);
				$where = array(
					'id' => $update_id
				);
				$packageupdate = $this->Db_model->update_data('px_packages', $data, $where);
				if ($packageupdate) {
					$message = array(
						'status' => 4,
						'msg' => 'Data updated successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			} else {
				$data = array(
					'packg_nm' => $packg_nm,
					'packg_price' => $packg_price,
					'currency' => $currency,
					'listing_limit' => $listing_limit,
					'packg_period' => $packg_period,
					'user_type' => $user_type,
					'duration_unit' => $duration_unit
				);
				$packagenew = $this->Db_model->insert_data('px_packages', $data);
				if ($packagenew) {
					$message = array(
						'status' => 1,
						'msg' => 'Data added successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			}

		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Fields are required'
			);
		}
		echo json_encode($message);
	}

	// Show data on owner company details page
	public function owner_company()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$where = array(
			'id' => 1
		);
		$owner_company = $this->Db_model->select_data('*', 'px_owner_company', $where);
		$currencies = $this->Db_model->select_data('*', 'px_currencies');
		$data = array(
			'owner_company' => $owner_company,
			'currencies' => $currencies

		);
		$this->load->view('common/admin_header', $data);
		$this->load->view('common/admin_sidebar');
		$this->load->view('owner_company_details');
		$this->load->view('common/footer');
	}

	// owner company details form update
	public function owner_company_update()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$this->form_validation->set_rules('website_title', '', 'required');
		$this->form_validation->set_rules('company_phone', 'Company Phone', 'trim|required|min_length[7]');
		if ($this->form_validation->run()) {
			$website_title = $this->input->post('website_title');
			$company_address = $this->input->post('company_address');
			$company_coord = $this->input->post('company_coord');
			$contact_email = $this->input->post('contact_email');
			$c_phone = $this->input->post('c_phone');
			$company_phone = $this->input->post('company_phone');
			$full_phone = $c_phone . $company_phone;
			$paypal_email = $this->input->post('paypal_email');
			$currency = $this->input->post('currency');
			$facebook = $this->input->post('facebook');
			$twitter = $this->input->post('twitter');
			$instagram = $this->input->post('instagram');
			$linkedin = $this->input->post('linkedin');
			$about_company = $this->input->post('about_company');
			$aboutus_details = $this->input->post('aboutus_details');
			$aboutus_detail = base64_encode($aboutus_details);
			$updates = array(
				'website_title' => $website_title,
				'company_address' => $company_address,
				'company_coord' => $company_coord,
				'contact_email' => $contact_email,
				'company_phone' => $full_phone,
				'paypal_email' => $paypal_email,
				'currency' => $currency,
				'facebook' => $facebook,
				'twitter' => $twitter,
				'instagram' => $instagram,
				'linkedin' => $linkedin,
				'about_company' => $about_company,
				'aboutus_details' => $aboutus_detail
			);
			$where = array(
				'id' => 1
			);
			$up_query = $this->Db_model->update_data('px_owner_company', $updates, $where);
			if ($up_query) {
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
			if ($this->input->post('website_title') == '') {
				$message = array(
					'status' => 2,
					'msg' => 'Please provide website title'
				);

			} else {
				$message = array(
					'status' => 2,
					'msg' => 'Please provide valid phone number'
				);
			}
		}
		echo json_encode($message);
	}

	public function design()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		if ($this->input->get('section_id')) {
			$section_id = $this->input->get('section_id');
			$selected = array(
				'id' => $section_id
			);
			$section_data = $this->Db_model->select_data('*', 'px_homepage', $selected);
			$edit_data = $section_data;
		} else if ($this->input->get('aboutus_id')) {
			$aboutus_id = $this->input->get('aboutus_id');
			$whereAbout = array(
				'id' => $aboutus_id
			);
			$about_data = $this->Db_model->select_data('*', 'px_aboutus_data', $whereAbout);
			$edit_data = $about_data;
		} else {
			$edit_data = '';
		}
		$where = array(
			'id' => 1
		);
		$main_logo = $this->Db_model->select_data('*', 'px_main_logo', ['id' => 1]);
		$section_query = $this->Db_model->select_data('*', 'px_homepage');
		$aboutus_query = $this->Db_model->select_data('*', 'px_aboutus_data');
		$select_query = array(
			'main_logo' => $main_logo,
			'section' => $section_query,
			'aboutus' => $aboutus_query,
			'edit_data' => $edit_data
		);
		$this->load->view('common/admin_header', $select_query);
		$this->load->view('common/admin_sidebar');
		$this->load->view('design_template');
		$this->load->view('common/footer');
	}

	public function add_main_logo()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$filename1 = '';
		$filename2 = '';
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 10000;
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('main_logo1')) {
			$datas = $this->upload->data();
			$filename1 = $datas['file_name'];
			$main_logo1 = $filename1;
		}
		if ($this->upload->do_upload('main_logo2')) {
			$datas = $this->upload->data();
			$filename2 = $datas['file_name'];
			$main_logo2 = $filename2;
		}
		if (!isset($main_logo1) && empty($main_logo1)) {
			$main_logo1 = '';
		}
		if (!isset($main_logo2) && empty($main_logo2)) {
			$main_logo2 = '';
		}
		$data = array(
			'main_logo1' => $main_logo1,
			'main_logo2' => $main_logo2
		);
		$where = array(
			'id' => 1
		);
		if ($main_logo1 == '') {
			unset($data['main_logo1']);
		} else {
			$getdata = $this->Db_model->select_data('main_logo1', 'px_main_logo', ['id' => 1]);
			if (isset($getdata[0]['main_logo1']) && !empty($getdata[0]['main_logo1'])) {
				unlink(FCPATH . 'uploads/' . $getdata[0]['main_logo1']);
			}
		}
		if ($main_logo2 == '') {
			unset($data['main_logo2']);
		} else {
			$getdata = $this->Db_model->select_data('main_logo2', 'px_main_logo', ['id' => 1]);
			if (isset($getdata[0]['main_logo2']) && !empty($getdata[0]['main_logo2'])) {
				unlink(FCPATH . 'uploads/' . $getdata[0]['main_logo2']);
			}
		}
		if ($main_logo1 != '' || $main_logo2 != '') {
			$update_query = $this->Db_model->update_data('px_main_logo', $data, ['id' => 1]);
			if ($update_query) {
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
				'msg' => 'Please select logo'
			);
		}
		echo json_encode($message);
	}

	// front page section data
	public function section_data()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$update_id = $this->input->post('sectionid');
		$main_heading = $this->input->post('main_heading');
		$main_content = $this->input->post('main_content');
		$filename = '';
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 10000;
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('images')) {
			$datas = $this->upload->data();
			$filename = $datas['file_name'];
			$images = $filename;
		}
		if (!isset($images) && empty($images)) {
			$images = '';
		}
		$c_where = array(
			'id' => $update_id
		);
		$check = $this->Db_model->select_data('*', 'px_homepage', $c_where);
		if ($check) {
			$data = array(
				'main_heading' => $main_heading,
				'main_content' => $main_content,
				'images' => $images
			);
			$up_where = array(
				'id' => $update_id
			);
			if ($images == '') {
				unset($data['images']);
			} else {
				$getdata = $this->Db_model->select_data('images', 'px_homepage', $up_where);
				if (isset($getdata[0]['images']) && !empty($getdata[0]['images'])) {
					unlink(FCPATH . 'uploads/' . $getdata[0]['images']);
				}
			}
			$update_section = $this->Db_model->update_data('px_homepage', $data, $up_where);
			if ($update_section) {
				$message = array(
					'status' => 4,
					'msg' => 'Data updated successfully'
				);
			} else {
				$message = array(
					'status' => 2,
					'msg' => 'Oops! database error'
				);
			}
		} else {
			$data = array(
				'main_heading' => $main_heading,
				'main_content' => $main_content,
				'images' => $images
			);
			$section = $this->Db_model->insert_data('px_homepage', $data);
			if ($section) {
				$message = array(
					'status' => 1,
					'msg' => 'Data inserted successfully'
				);
			} else {
				$message = array(
					'status' => 2,
					'msg' => 'Oops! database error'
				);
			}
		}
		echo json_encode($message);
	}

	// About us page data
	public function aboutus_data()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$update_id = $this->input->post('aboutusid');
		$aboutus_heading = $this->input->post('aboutus_heading');
		$filename = '';
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 10000;
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('aboutus_image')) {
			$datas = $this->upload->data();
			$filename = $datas['file_name'];
			$images = $filename;
		}
		if (!isset($images) && empty($images)) {
			$images = '';
		}
		$c_where = array(
			'id' => $update_id
		);
		$check = $this->Db_model->select_data('*', 'px_aboutus_data', $c_where);
		if ($check) {
			$data = array(
				'aboutus_heading' => $aboutus_heading,
				'aboutus_image' => $images
			);
			$up_where = array(
				'id' => $update_id
			);
			if ($images == '') {
				unset($data['aboutus_image']);
			} else {
				$getdata = $this->Db_model->select_data('images', 'px_homepage', $up_where);
				if (isset($getdata[0]['images']) && !empty($getdata[0]['images'])) {
					unlink(FCPATH . 'uploads/' . $getdata[0]['images']);
				}
			}
			$update_section = $this->Db_model->update_data('px_aboutus_data', $data, $up_where);
			if ($update_section) {
				$message = array(
					'status' => 4,
					'msg' => 'Data updated successfully'
				);
			} else {
				$message = array(
					'status' => 2,
					'msg' => 'Oops! database error'
				);
			}
		} else {
			$data = array(
				'aboutus_heading' => $aboutus_heading,
				'aboutus_image' => $images
			);
			$section = $this->Db_model->insert_data('px_aboutus_data', $data);
			if ($section) {
				$message = array(
					'status' => 4,
					'msg' => 'Data inserted successfully'
				);
			} else {
				$message = array(
					'status' => 2,
					'msg' => 'Oops! database error'
				);
			}
		}
		echo json_encode($message);
	}

	//Mail credential page view
	public function mail_credential()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$mail_data['update_credential'] = $this->Db_model->select_data('*', 'px_mail_credential', array('id' => 1));
		$this->load->view('common/admin_header', $mail_data);
		$this->load->view('common/admin_sidebar');
		$this->load->view('mail_credential');
		$this->load->view('common/footer');
	}

	// Update Credential for server mail
	public function add_mailcredential()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$this->form_validation->set_rules('mail_user', '', 'required');
		$this->form_validation->set_rules('mail_password', '', 'required');
		$this->form_validation->set_rules('server_type', '', 'required');
		$this->form_validation->set_rules('server_host', '', 'required');
		$this->form_validation->set_rules('server_port', '', 'required');
		$this->form_validation->set_rules('mail_encryption', '', 'required');
		if ($this->form_validation->run()) {
			$mail_user = $this->input->post('mail_user');
			$mail_password = $this->input->post('mail_password');
			$server_type = $this->input->post('server_type');
			$server_host = $this->input->post('server_host');
			$server_port = $this->input->post('server_port');
			$mail_encryption = $this->input->post('mail_encryption');
			$mail = array(
				'mail_user' => $mail_user,
				'mail_password' => $mail_password,
				'server_type' => $server_type,
				'server_host' => $server_host,
				'server_port' => $server_port,
				'mail_encryption' => $mail_encryption
			);
			$update_data = $this->Db_model->update_data('px_mail_credential', $mail, array('id' => 1));
			if ($update_data) {
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
				'msg' => 'Fields are required'
			);
		}
		echo json_encode($message);
	}

	public function agent_packages()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$data = $this->db->query('SELECT px_userdata.id,px_userdata.full_name,px_userdata.email,px_packages.packg_nm,px_userdata.package_expiry,px_packages.packg_period,px_packages.listing_limit,px_packages.packg_price,px_packages.currency,px_packages.duration_unit,px_userdata.status FROM px_userdata LEFT JOIN  px_packages ON px_userdata.package_nm = px_packages.id WHERE px_userdata.user_type = "agent"')->result_array();

		$show = array(
			'user_package' => $data,
			'dashboard' => 'admin'
		);
		$this->load->view('common/admin_header', $show);
		$this->load->view('common/admin_sidebar');
		$this->load->view('user_package');
		$this->load->view('common/footer');
	}
	public function user_packages()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$data = $this->db->query('SELECT px_userdata.id,px_userdata.full_name,px_userdata.email,px_packages.packg_nm,px_userdata.package_expiry,px_packages.packg_period,px_packages.listing_limit,px_packages.packg_price,px_packages.currency,px_packages.duration_unit,px_userdata.status FROM px_userdata LEFT JOIN  px_packages ON px_userdata.package_nm = px_packages.id WHERE px_userdata.user_type = "user"')->result_array();

		$show = array(
			'user_package' => $data,
			'dashboard' => 'admin'
		);
		$this->load->view('common/admin_header', $show);
		$this->load->view('common/admin_sidebar');
		$this->load->view('user_package');
		$this->load->view('common/footer');
	}

	public function agent_package_payments()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$order = array('id', 'desc');
		$subscription['paymentData'] = $this->Db_model->select_data('*', 'px_subscription', '', '', $order);
		$this->load->view('common/admin_header', $subscription);
		$this->load->view('common/admin_sidebar');
		$this->load->view('user_payments');
		$this->load->view('common/footer');
	}

	public function favorites()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$order = array('id', 'desc');
		$favorite['favorite'] = $this->Db_model->select_data('*', 'px_favorities', '', '', $order);
		$this->load->view('common/admin_header', $favorite);
		$this->load->view('common/admin_sidebar');
		$this->load->view('favorites');
		$this->load->view('common/footer');
	}

	public function speciality()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$special_id = $this->input->get('special_id');
		$selected = array(
			'id' => $special_id
		);
		$special_query = $this->Db_model->select_data('*', 'px_speciality');
		$special_data = $this->Db_model->select_data('*', 'px_speciality', $selected);
		$select_query = array(
			'special' => $special_query,
			'special_data' => $special_data
		);
		$this->load->view('common/admin_header', $select_query);
		$this->load->view('common/admin_sidebar');
		$this->load->view('speciality');
		$this->load->view('common/footer');
	}

	public function special_data()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$this->form_validation->set_rules('heading', '', 'required');
		if ($this->form_validation->run()) {
			$update_id = $this->input->post('specialityid');
			$main_heading = $this->input->post('heading');
			$main_content = $this->input->post('content');
			$filename = '';
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 10000;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('logo')) {
				$datas = $this->upload->data();
				$filename = $datas['file_name'];
				$images = $filename;
			}
			if (!isset($images) && empty($images)) {
				$images = '';
			}
			$c_where = array(
				'id' => $update_id
			);
			$check = $this->Db_model->select_data('*', 'px_speciality', $c_where);
			if ($check) {
				$data = array(
					'heading' => $main_heading,
					'content' => $main_content,
					'logo' => $images
				);
				$up_where = array(
					'id' => $update_id
				);
				if ($images == '') {
					unset($data['logo']);
				} else {
					$getdata = $this->Db_model->select_data('logo', 'px_speciality', $up_where);
					if (isset($getdata[0]['logo']) && !empty($getdata[0]['logo'])) {
						unlink(FCPATH . 'uploads/' . $getdata[0]['logo']);
					}
				}
				$update_section = $this->Db_model->update_data('px_speciality', $data, $up_where);
				if ($update_section) {
					$message = array(
						'status' => 4,
						'msg' => 'Data updated successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			} else {
				$data = array(
					'heading' => $main_heading,
					'content' => $main_content,
					'logo' => $images
				);
				$section = $this->Db_model->insert_data('px_speciality', $data);
				if ($section) {
					$message = array(
						'status' => 1,
						'msg' => 'Data inserted successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			}
		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Please provide heading'
			);
		}
		echo json_encode($message);
	}

	public function services()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$special_id = $this->input->get('service_id');
		$selected = array(
			'id' => $special_id
		);
		$service_query = $this->Db_model->select_data('*', 'px_services');
		$service_data = $this->Db_model->select_data('*', 'px_services', $selected);
		$select_query = array(
			'service' => $service_query,
			'service_data' => $service_data
		);
		$this->load->view('common/admin_header', $select_query);
		$this->load->view('common/admin_sidebar');
		$this->load->view('services');
		$this->load->view('common/footer');
	}

	public function service_data()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$this->form_validation->set_rules('heading', '', 'required');
		if ($this->form_validation->run()) {
			$update_id = $this->input->post('servicesid');
			$main_heading = $this->input->post('heading');
			$main_content = $this->input->post('content');
			$filename = '';
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 10000;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('logo')) {
				$datas = $this->upload->data();
				$filename = $datas['file_name'];
				$images = $filename;
			}
			if (!isset($images) && empty($images)) {
				$images = '';
			}
			$c_where = array(
				'id' => $update_id
			);
			$check = $this->Db_model->select_data('*', 'px_services', $c_where);
			if ($check) {
				$data = array(
					'heading' => $main_heading,
					'content' => $main_content,
					'logo' => $images
				);
				$up_where = array(
					'id' => $update_id
				);
				if ($images == '') {
					unset($data['logo']);
				} else {
					$getdata = $this->Db_model->select_data('logo', 'px_services', $up_where);
					if (isset($getdata[0]['logo']) && !empty($getdata[0]['logo'])) {
						unlink(FCPATH . 'uploads/' . $getdata[0]['logo']);
					}
				}
				$update_section = $this->Db_model->update_data('px_services', $data, $up_where);
				if ($update_section) {
					$message = array(
						'status' => 4,
						'msg' => 'Data updated successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			} else {
				$data = array(
					'heading' => $main_heading,
					'content' => $main_content,
					'logo' => $images
				);
				$section = $this->Db_model->insert_data('px_services', $data);
				if ($section) {
					$message = array(
						'status' => 1,
						'msg' => 'Data inserted successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			}
		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Please provide heading'
			);
		}
		echo json_encode($message);
	}

	public function testimonial()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$order = array('id', 'desc');
		$testimonials['testimonial_data'] = $this->Db_model->select_data('*', 'px_testimonial', '', '', $order);
		$this->load->view('common/admin_header', $testimonials);
		$this->load->view('common/admin_sidebar');
		$this->load->view('testimonial');
		$this->load->view('common/footer');
	}

	public function edit_testimonial()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$update_id = '';
		$update_id = $this->input->get('tid');
		if ($update_id) {
			$where = array(
				'id' => $update_id
			);
			$data['testimonial'] = $this->Db_model->select_data('*', 'px_testimonial', $where);
			$this->load->view('common/admin_header', $data);
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_testimonial');
			$this->load->view('common/footer');
		} else {
			$this->load->view('common/admin_header');
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_testimonial');
			$this->load->view('common/footer');
		}
	}

	public function add_testimonial()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$update_id = '';
		$update_id = $this->input->post('update_id');
		$this->form_validation->set_rules('client_name', '', 'required');
		if ($this->form_validation->run()) {
			$client_name = $this->input->post('client_name');
			$post = $this->input->post('post');
			$testimonial = $this->input->post('testimonial');
			$filename = '';
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 10000;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('client_image')) {
				$datas = $this->upload->data();
				$filename = $datas['file_name'];
				$client_image = $filename;
			}
			if (!isset($client_image) && empty($client_image)) {
				$client_image = '';
			}
			if ($update_id) {
				$data = array(
					'client_name' => $client_name,
					'post' => $post,
					'client_image' => $client_image,
					'testimonial' => $testimonial
				);
				$where = array(
					'id' => $update_id
				);
				if ($client_image == '') {
					unset($data['client_image']);
				} else {
					$getdata = $this->Db_model->select_data('client_image', 'px_testimonial', $where);
					if (isset($getdata[0]['client_image']) && !empty($getdata[0]['client_image'])) {
						unlink(FCPATH . 'uploads/' . $getdata[0]['client_image']);
					}
				}
				$testimonial_update = $this->Db_model->update_data('px_testimonial', $data, $where);
				if ($testimonial_update) {
					$message = array(
						'status' => 4,
						'msg' => 'Data updated successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			} else {
				$data = array(
					'client_name' => $client_name,
					'post' => $post,
					'client_image' => $client_image,
					'testimonial' => $testimonial
				);
				$testimonial_insert = $this->Db_model->insert_data('px_testimonial', $data);
				if ($testimonial_insert) {
					$message = array(
						'status' => 4,
						'msg' => 'Data added successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			}

		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Please provide client name'
			);
		}
		echo json_encode($message);
	}

	public function sponsors()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$spid = '';
		$spid = $this->input->get('spid');
		if ($spid) {
			$where = array(
				'id' => $spid
			);
			$update = $this->Db_model->select_data('*', 'px_sponsor', $where);
			$edit = $this->Db_model->select_data('*', 'px_sponsor');
			$data = array(
				'update_sponsor' => $update,
				'sponsor_table' => $edit
			);
			$this->load->view('common/admin_header', $data);
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_sponsor');
			$this->load->view('common/footer');
		} else {
			$edit['sponsor_table'] = $this->Db_model->select_data('*', 'px_sponsor');
			$this->load->view('common/admin_header', $edit);
			$this->load->view('common/admin_sidebar');
			$this->load->view('add_sponsor');
			$this->load->view('common/footer');
		}
	}

	public function addsponsor()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$update_id = '';
		$update_id = $this->input->post('update_id');
		$this->form_validation->set_rules('sponsor', '', 'required');
		if ($this->form_validation->run()) {
			$filename = '';
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 10000;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('sponsor_logo')) {
				$datas = $this->upload->data();
				$filename = $datas['file_name'];
				$sponsor_logo = $filename;
			}
			if (!isset($sponsor_logo) && empty($sponsor_logo)) {
				$sponsor_logo = '';
			}
			$sponsor = $this->input->post('sponsor');
			$value = array(
				'sponsor_logo' => $sponsor_logo,
				'sponsor_name' => $sponsor
			);
			if ($update_id) {
				$where = array(
					'id' => $update_id
				);
				if ($sponsor_logo == '') {
					unset($value['sponsor_logo']);
				} else {
					$getdata = $this->Db_model->select_data('sponsor_logo', 'px_sponsor', $where);
					if (isset($getdata[0]['sponsor_logo']) && !empty($getdata[0]['sponsor_logo'])) {
						unlink(FCPATH . 'uploads/' . $getdata[0]['sponsor_logo']);
					}
				}
				$query = $this->Db_model->update_data('px_sponsor', $value, $where);
				if ($query) {
					$message = array(
						'status' => 4,
						'msg' => 'Data updated successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			} else {
				$query = $this->Db_model->insert_data('px_sponsor', $value);
				if ($query) {
					$message = array(
						'status' => 1,
						'msg' => 'Data added successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			}
		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Fields are required'
			);
		}
		echo json_encode($message);
	}

	public function statuschangeajax()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$id = $this->input->post('id');
		$table = $this->input->post('table');
		$status = $this->input->post('status');
		$condition = array(
			'id' => $id
		);
		if ($table != 'px_properties') {
			$value = array(
				'status' => $status
			);
			$update_status = $this->Db_model->update_data($table, $value, $condition);
		}
		if ($table == 'px_properties') {
			$value = array(
				'activation' => $status
			);
			$update_status = $this->Db_model->update_data($table, $value, $condition);
		}
		if ($update_status) {
			if ($table != 'px_properties') {
				$select_status = $this->Db_model->select_data('status', $table, $condition);
				if ($select_status[0]['status'] == "1") {
					$message = array(
						'status' => 3,
						'msg' => 'Active successfully'
					);
				} else if ($select_status[0]['status'] == "0") {
					$message = array(
						'status' => 3,
						'msg' => 'Inactive successfully'
					);
				}
			}
			if ($table == 'px_properties') {
				$select_activation = $this->Db_model->select_data('activation', $table, $condition);
				if ($select_activation[0]['activation'] == "1") {
					$message = array(
						'status' => 3,
						'msg' => 'Active successfully'
					);
				} else if ($select_activation[0]['activation'] == "0") {
					$message = array(
						'status' => 3,
						'msg' => 'Inactive successfully'
					);
				}
			}
		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Oops! Database error'
			);
		}
		echo json_encode($message);
	}

	public function payment_method()
	{
		if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin') {
			redirect(base_url());
		}
		$pmg = '';
		$pmg = $this->input->get('pmg');
		if ($pmg) {
			$where = array(
				'id' => $pmg
			);
			$update = $this->Db_model->select_data('*', 'px_gateway', $where);
			$edit = $this->Db_model->select_data('*', 'px_gateway');
			$currencies = $this->Db_model->select_data('*', 'px_currencies');
			$pcurrencies = $this->Db_model->select_data('*', 'px_currencies', array('currency_code!=' => 'INR'));
			$data = array(
				'update_method' => $update,
				'paymethod_table' => $edit,
				'currencies' => $currencies,
				'pcurrencies' => $pcurrencies
			);
			$this->load->view('common/admin_header', $data);
			$this->load->view('common/admin_sidebar');
			$this->load->view('edit_gateway');
			$this->load->view('common/footer');
		} else {
			$edit['paymethod_table'] = $this->Db_model->select_data('*', 'px_gateway');
			$edit['currencies'] = $this->Db_model->select_data('*', 'px_currencies');
			$edit['pcurrencies'] = $this->Db_model->select_data('*', 'px_currencies', array('currency_code!=' => 'INR'));
			$this->load->view('common/admin_header', $edit);
			$this->load->view('common/admin_sidebar');
			$this->load->view('payment_method');
			$this->load->view('common/footer');
		}
	}
	public function add_payment_method()
	{
		$update_id = '';
		$update_id = $this->input->post('update_id');
		$this->form_validation->set_rules('key_id', '', 'required');
		$this->form_validation->set_rules('secret_key', '', 'required');
		$this->form_validation->set_rules('currency_code', '', 'required');
		if ($this->form_validation->run()) {
			$key_id = $this->input->post('key_id');
			$secret_key = $this->input->post('secret_key');
			$currency_code = $this->input->post('currency_code');
			$value = array(
				'key_id' => $key_id,
				'secret_key' => $secret_key,
				'currency_code' => $currency_code
			);
			if ($update_id) {
				$where = array(
					'id' => $update_id
				);
				$query = $this->Db_model->update_data('px_gateway', $value, $where);
				if ($query) {
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
				$query = $this->Db_model->insert_data('px_gateway', $value);
				if ($query) {
					$message = array(
						'status' => 1,
						'msg' => 'Data added successfully'
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error'
					);
				}
			}
		} else {
			$message = array(
				'status' => 2,
				'msg' => 'Fields are required'
			);
		}
		echo json_encode($message);
	}

	public function select_gateway()
	{
		$gateway = $this->input->post('status');
		$id = $this->input->post('id');
		$update_gateway = $this->Db_model->update_data('px_gateway', array('status' => $gateway), array('id' => $id));
		$view_status = $this->Db_model->select_data('status', 'px_gateway', array('id' => $id));
		echo $view_status[0]['status'];
	}

	public function approveUserList()
	{
		$accept = $this->input->post('accept');
		$property_id = $this->input->post('property_id');

		$table = 'px_properties';
		if ($table) {
			$value = array(
				'approve' => $accept,
				'activation' => 1
			);
			$this->db->where('id', $property_id);
			$update_status = $this->db->update('px_properties', $value);

			if ($update_status) {
				$message = array(
					'status' => 1,
					'msg' => 'Approved'
				);
			} else {
				$message = array(
					'status' => 2,
					'msg' => 'error'
				);
			}
		}
		echo json_encode($message);
	}
	public function rejectUserList()
	{
		$reject = $this->input->post('reject');
		$property_id = $this->input->post('property_id');
		$table = 'px_properties';
		if ($table) {
			$value = array(
				'approve' => $reject
			);
			$this->db->where('id', $property_id);
			$update_status = $this->db->update('px_properties', $value);
			if ($update_status) {
				$message = array(
					'status' => 1,
					'msg' => 'Rejected'
				);
			} else {
				$message = array(
					'status' => 2,
					'msg' => 'Error'
				);
			}
		}
		echo json_encode($message);
	}

	public function getUrl($id)
	{

	}


}