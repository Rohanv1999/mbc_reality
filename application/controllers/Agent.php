<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agent extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'agent') {
			redirect(base_url());
		}
	}

	public function index()
	{
		$agent_id = $this->session->userdata('id');
		$where5 = " WHERE agent = $agent_id";
		$user = $this->custom->count($where5, 'px_properties');
		$where6 = " WHERE activation = true and agent = $agent_id";
		$active_propertys = $this->custom->count($where6, 'px_properties');
		$where7 = " WHERE activation = false and agent = $agent_id";
		$inactive_propertys = $this->custom->count($where7, 'px_properties');
		$where8 = " WHERE agent_id = '$agent_id'";
		$inquiries = $this->custom->count($where8, 'px_inquires');
		$order = array('id', 'desc');
		$where = array(
			'agent' => $agent_id
		);
		$property = $this->Db_model->select_data('*', 'px_properties', $where, 10, $order);
		$views = array(
			'visiter' => $user,
			'active_property' => $active_propertys,
			'inactive_property' => $inactive_propertys,
			'inquiry' => $inquiries,
			'listing' => $property
		);
		$this->load->view('common/agent_header', $views);
		$this->load->view('common/agent_sidebar');
		$this->load->view('agent_dashboard');
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
			'dashboard' => 'agent'
		);
		$this->load->view('common/agent_header', $data);
		$this->load->view('common/agent_sidebar');
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
		$status = $this->input->post('status');
		$sms_notification = $this->input->post('sms_notification');
		$email_alert = $this->input->post('email_alert');
		$profile_whatsup = $this->input->post('profile_whatsup');
		$whatsup = $this->input->post('whatsup');
		
		$full_whatsup = $profile_whatsup . $whatsup;
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		// $config['max_size'] = 10000;
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
						'msg' => 'Oops! unable to update'
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
	public function real_estate()
	{
		$agent_id = $this->session->userdata('id');
		$order = array('id', 'desc');
		$where = array(
			'agent' => $agent_id
		);
		$where_agentId = array(
			'id' => $agent_id
		);
		$properties = $this->Db_model->select_data('*', 'px_properties', $where, '', $order);
		$agent_email = $this->session->userdata('email');
		$agent_where = array(
			'email' => $agent_email
		);
		$join_array = array('px_userdata', 'px_packages.id = px_userdata.package_nm');
		$data = $this->Db_model->select_data('*', 'px_packages', $agent_where, '', '', '', $join_array);
		$total_listing = (isset($data[0]['listing_limit']) && !empty($data[0]['listing_limit'])) ? $data[0]['listing_limit'] : 0;
		$package_expiry = (isset($data[0]['package_expiry']) && !empty($data[0]['package_expiry'])) ? $data[0]['package_expiry'] : 0;
		$where_core = " WHERE agent = $agent_id";
		$already_listed = $this->custom->count($where_core, 'px_properties');
		$total_listing = loop_select('id',$this->session->userdata('id'),'total_packge_limit','px_userdata');

		$remaining_listing = $total_listing - $already_listed;

		// echo $package_expiry;
		$current = time();
		$days_left = dateDiffInDays($current, $package_expiry);
		
		if ($days_left < 1) {
			$datas = array('activation' => 0);
			$this->Db_model->update_data('px_properties', $datas, $where);
		} 
		$gets = array(
			'property' => $properties,
			'list_remain' => $remaining_listing,
			'days_remain' => $days_left,
			'dashboard' => 'agent'
		);
		$this->load->view('common/agent_header', $gets);
		$this->load->view('common/agent_sidebar');
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
			$where = array(
				'user_type' => 'agent'
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
				'dashboard' => 'agent'
			);
			$this->load->view('common/agent_header', $data);
			$this->load->view('common/agent_sidebar');
			$this->load->view('addproperty');
			$this->load->view('common/footer');
		} else {
			$where = array(
				'user_type' => 'agent'
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
				'dashboard' => 'agent'
			);

			$this->load->view('common/agent_header', $data);
			$this->load->view('common/agent_sidebar');
			$this->load->view('addproperty');
			$this->load->view('common/footer');
		}
	}

	// ajax for state select from country
	public function select_state()
	{
		$country_id = $this->input->post('country_id');
		$where_state = array(
			'country_id' => $country_id
		);
		$states = $this->Db_model->select_data('*', 'px_states', $where_state);
		echo json_encode($states);
	}

	//function for add and update property basic detail tab
	public function add_property_detail()
	{
		$this->form_validation->set_rules('property_name', '', 'required');
		$this->form_validation->set_rules('agent', '', 'required');
		if ($this->form_validation->run()) {
			$pid = $this->input->post('pid');
			$getid = $this->input->post('getid');
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
			$agent = $this->input->post('agent');
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
				'floors' => $floor
			);

			$whereSelect = array(
				'id' => $pid
			);
			$select = $this->Db_model->select_data('*', 'px_properties', $whereSelect);
			$WinsertSelect = array(
				'id' => $getid
			);
			$Uinsert = $this->Db_model->select_data('*', 'px_properties', $WinsertSelect);
			if ($select) {
				$whereg = array(
					'id' => $pid
				);
				$details = $this->Db_model->update_data('px_properties', $data, $whereg);
				//	echo $this->db->last_query(); die;
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
			} else if (empty($pid) && !empty($getid)) {
				$wherei = array(
					'id' => $getid
				);
				$details = $this->Db_model->update_data('px_properties', $data, $wherei);
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
			} else {
				$details = $this->Db_model->insert_data('px_properties', $data);
				if ($details) {
					$message = array(
						'status' => 3,
						'msg' => 'Data saved successfully',
						'pids' => $details
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
				'msg' => 'Please insert property name and its agent'
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
							'msg' => 'Data saved successfully'
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
							'pids' => $pids
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
						'msg' => 'Data saved successfully'
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
						'pids' => $pids
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
						'msg' => 'Data saved successfully'
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
						'pids' => $pids
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
	public function add_property_media()
	{
		$pid = '';
		$pid = $this->input->post('pid');
		$property_id = $this->input->post('getid');
		$pids = $this->input->post('pids');

		// print_r($_POST);
		if ($property_id != '' || $pids != '' || $pid != '') {
			$vidss = $imgss = [];
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
						$newFile = "./uploads/" . time() . $imagename;
						if (move_uploaded_file($tmpFile, $newFile)) {
							$imgss[] = time() . $imagename;
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
			if ($pids != '') {
				$wheres = array(
					'property_id' => $pids
				);
			} else if ($pid != '') {
				$wheres = array(
					'property_id' => $pid
				);
			} else if ($property_id != '') {
				$wheres = array(
					'property_id' => $property_id
				);
			}
			$select1 = $this->Db_model->select_data('*', 'px_property_media', $wheres);
			if ($select1) {
				$update_data = array(
					'videos' => $videos,
					'images' => $images
				);
				if ($property_id != '') {
					$where3 = array(
						'property_id' => $property_id
					);
				} else if ($pid != '') {
					$where3 = array(
						'property_id' => $pid
					);
				} else if ($pids != '') {
					$where3 = array(
						'property_id' => $pids
					);
				}

				if ($vidss == []) {
					unset($update_data['videos']);
				}
				if ($imgss == []) {
					unset($update_data['images']);
				}
				if ($vidss != [] || $imgss != []) {
					if ($vidss != []) {
						for ($s = 0; $s < count(json_decode($select1[0]['videos'], true)); $s++) {
							if (file_exists('./uploads/video_upload/' . json_decode($select1[0]['videos'], true)[$s])) {
								unlink('./uploads/video_upload/' . json_decode($select1[0]['videos'], true)[$s]);
							}
						}
					}
					if ($imgss != []) {
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
						'msg' => 'Oops! database error1'
					);
				}
			} elseif ($pid) {
				// echo 'herjk';
				$data = array(
					'property_id' => $pid,
					'videos' => $videos,
					'images' => $images
				);
				$details = $this->Db_model->insert_data('px_property_media', $data);
				if ($details) {
					$message = array(
						'status' => 3,
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
						'msg' => 'Data saved successfully',
						'pids' => $pids
					);
				} else {
					$message = array(
						'status' => 2,
						'msg' => 'Oops! database error3'
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

	// Inquiries page data
	public function inquiries()
	{
		$agent_id = $this->session->userdata('id');
		$where = array(
			'agent_id' => $agent_id
		);
		// $data['inquiry'] = $this->Db_model->select_data('*', 'px_inquires', $where, '', array('id', 'desc'));
		$data['inquiry'] = $this->db->query('select pi.*, pp.url_sluge from px_inquires pi, px_properties pp where pi.property_id = pp.id and agent_id =' .$agent_id )->result_array();
		$this->load->view('common/agent_header', $data);
		$this->load->view('common/agent_sidebar');
		$this->load->view('inquiries');
		$this->load->view('common/footer');
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

	public function agent_package()
	{
		$agent_email = $this->session->userdata('email');
		$agent_where = array(
			'email' => $agent_email
		);
		$join_array = array('px_userdata', 'px_packages.id = px_userdata.package_nm');
		$data = $this->Db_model->select_data('*', 'px_packages', $agent_where, '', '', '', $join_array);
		$show = array(
			'user_package' => $data,
			'dashboard' => 'agent'
		);
		$this->load->view('common/agent_header', $show);
		$this->load->view('common/agent_sidebar');
		$this->load->view('user_package');
		$this->load->view('common/footer');
	}
}