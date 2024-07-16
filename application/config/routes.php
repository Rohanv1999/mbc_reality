<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|   example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|   https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|   $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|   $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|   $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/indexs
|       my-controller/my-method -> my_controller/my_method
*/
$route['user/add-property-detail'] = 'admin/add_property_detail';
$route['user/add-property-amenities'] = 'admin/add_property_amenities';
$route['user/add-property-landmarks'] = 'admin/add_property_landmarks';
$route['user/add-property-media'] = 'admin/add_property_media';


$route['default_controller'] = 'homepage';
$route['translate_uri_dashes'] = TRUE;
$route['admin/submit-listing'] = 'admin/add_property';
$route['agent/submit-listing'] = 'agent/add_property';
// User Route  //
$route['user'] = 'homepage/user';
$route['user/submit-listing'] = 'admin/add_property';
$route['user/properties'] = 'admin/properties';
$route['user/add-property'] = 'admin/add_property';
$route['user/select_state'] = 'admin/select_state';
$route['user/slect_state'] = 'admin/select_state2';
$route['admin/slect_state'] = 'admin/select_state2';
$route['agent/slect_state'] = 'admin/select_state2';
$route['user/select_city'] = 'admin/select_city';
$route['agent/select_city'] = 'admin/select_city';
$route['admin/getUrl/(:any)'] = 'admin/getUrl/$1';
//$route['user/add-property'] = 'admin/add_property';




// end //
$route['submit-query'] = 'homepage/submit_query';
$route['listings'] = 'homepage/total_listing';
$route['plans'] = 'homepage/plans';
$route['team'] = 'homepage/total_agents';
$route['listings/for-sale'] = 'homepage/sale_listing/';
$route['listings/for-rent'] = 'homepage/rent_listing';
$route['result/for-sale'] = 'homepage/sale_filter';
$route['for-sale/(:any)/(:any)'] = 'homepage/sale_filter/$1/$2';

$route['result/for-rent'] = 'homepage/rent_filter';
$route['listing/(:any)'] = 'homepage/property_detail/$1';
$route['member/(:any)'] = 'homepage/agent_detail/$1';
$route['contact-us'] = 'homepage/contact';
$route['search-results'] = 'homepage/searchResults';
$route['about-us'] = 'homepage/about';
$route['admin/company-detail'] = 'admin/owner_company';
$route['admin/basic-detail'] = 'admin/owner_system';
$route['add-query'] = 'homepage/questions';
$route['shortlisted-listings'] = 'homepage/shortlist_properties';
$route['404_override'] = 'errors/error404';

$route['country-listing'] = 'homepage/searchResults';
$route['terms-and-conditions'] = 'homepage/terms_and_conditions';
$route['prvacy-policy'] = 'homepage/privacy_policy';


$route['stripe-check'] = 'StripePayment/index';



/*
 * --------------------------------------------------------------------
 * Login Route Definitions
 * --------------------------------------------------------------------
*/
$route['login'] = 'login/index';
$route['login_mobile'] = 'login/login_mobile';


/*


 * --------------------------------------------------------------------
 * Api Route Definitions
 * --------------------------------------------------------------------
*/


$route['api/login'] = 'ApiController/login';
$route['api/signup'] = 'ApiController/signup';
$route['api/forgot-password'] = 'ApiController/forgotPassword';
$route['api/forgot-password-otp-verification'] = 'ApiController/forgotPasswordVerification';
$route['login-token'] = 'ApiController/loginToken';





/*
 * --------------------------------------------------------------------
 * Testing Route Definitions
 * --------------------------------------------------------------------
*/

$route['test_1'] = 'Login/test_email_01';
$route['test_2'] = 'Login/test_email_02';









