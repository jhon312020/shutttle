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
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
//~ $route['default_controller'] = 'node';
$route['default_controller']  = "node";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['default_controller']  = "node";
$route['login']         = "sessions/login";
$route['admin/(:any)']      = 'admin/$1';

$route['es/project_details/(:any)/(:num)'] = 'node/loadprojectdata_es/$1/$2';
$route['en/project_details/(:any)/(:num)'] = 'node/loadprojectdata_en/$1/$2';
$route['ca/project_details/(:any)/(:num)'] = 'node/loadprojectdata_ca/$1/$2';

$route['es/categories/(:num)'] = 'node/loadcategories_es/$1';
$route['en/categories/(:num)'] = 'node/loadcategories_en/$1';
$route['ca/categories/(:num)'] = 'node/loadcategories_ca/$1';

$route['en/news/(:num)'] = 'node/display_news/en/$1';
$route['es/news/(:num)'] = 'node/display_news/es/$1';
$route['ca/news/(:num)'] = 'node/display_news/ca/$1';

$route['en/search'] = 'node/display_projects/en';
$route['es/search'] = 'node/display_projects/es';
$route['ca/search'] = 'node/display_projects/ca';

$route['en/change_password/:any/:any'] = 'node/change_password/$1';
$route['es/change_password/:any/:any'] = 'node/change_password/$1';
$route['de/change_password/:any/:any'] = 'node/change_password/$1';
$route['fr/change_password/:any/:any'] = 'node/change_password/$1';

$route['en/changepassword'] = 'node/changepassword';
$route['es/changepassword'] = 'node/changepassword';
$route['de/changepassword'] = 'node/changepassword';
$route['fr/changepassword'] = 'node/changepassword';

$route['en/recovery_password/:any'] = 'node/recovery_password/$1';
$route['es/recovery_password/:any'] = 'node/recovery_password/$1';
$route['de/recovery_password/:any'] = 'node/recovery_password/$1';
$route['fr/recovery_password/:any'] = 'node/recovery_password/$1';

$route['en/collaborators_logout'] = 'node/collaborators_logout';
$route['es/collaborators_logout'] = 'node/collaborators_logout';
$route['de/collaborators_logout'] = 'node/collaborators_logout';
$route['fr/collaborators_logout'] = 'node/collaborators_logout';

$route['en/carchannel'] = 'node/drivers_login';
$route['es/carchannel'] = 'node/drivers_login';
$route['de/carchannel'] = 'node/drivers_login';
$route['fr/carchannel'] = 'node/drivers_login';

$route['en/drivers_logout'] = 'node/drivers_logout';
$route['es/drivers_logout'] = 'node/drivers_logout';
$route['de/drivers_logout'] = 'node/drivers_logout';
$route['fr/drivers_logout'] = 'node/drivers_logout';

$route['en/route_details'] = 'node/route_details';
$route['es/route_details'] = 'node/route_details';
$route['de/route_details'] = 'node/route_details';
$route['fr/route_details'] = 'node/route_details';

$route['en/calendar_details/:any'] = 'node/calendar_details/$1';
$route['es/calendar_details/:any'] = 'node/calendar_details/$1';
$route['de/calendar_details/:any'] = 'node/calendar_details/$1';
$route['fr/calendar_details/:any'] = 'node/calendar_details/$1';

$route['en/booking_details/:any'] = 'collaborators/booking_details/$1';
$route['es/booking_details/:any'] = 'collaborators/booking_details/$1';
$route['de/booking_details/:any'] = 'collaborators/booking_details/$1';
$route['fr/booking_details/:any'] = 'collaborators/booking_details/$1';


$route['en/contact']  = 'node/contact/en/';
$route['es/contact']  = 'node/contact/es/';
$route['de/contact']  = 'node/contact/de/';
$route['fr/contact']  = 'node/contact/fr/';

$route['en/contacts']   = 'node/contacts';
$route['es/contacts']   = 'node/contacts';
$route['de/contacts']   = 'node/contacts';
$route['fr/contacts']   = 'node/contacts';

$route['en/partners']   = 'node/partners';
$route['es/partners']   = 'node/partners';
$route['de/partners']   = 'node/partners';
$route['fr/partners']   = 'node/partners';

$route['en/faq']  = 'node/faq';
$route['es/faq']  = 'node/faq';
$route['de/faq']  = 'node/faq';
$route['fr/faq']  = 'node/faq';

$route['en/aboutus']  = 'node/aboutus';
$route['es/aboutus']  = 'node/aboutus';
$route['de/aboutus']  = 'node/aboutus';
$route['fr/aboutus']  = 'node/aboutus';

$route['en/franquicias']  = 'node/franquicias';
$route['es/franquicias']  = 'node/franquicias';
$route['de/franquicias']  = 'node/franquicias';
$route['fr/franquicias']  = 'node/franquicias';

$route['en/concierge']  = 'node/concierge';
$route['es/concierge']  = 'node/concierge';

$route['en/mobile_booking']   = 'node/mobile_booking';
$route['es/mobile_booking']   = 'node/mobile_booking';

$route['en'] = 'node/index';
$route['es'] = 'node/index';
$route['de'] = 'node/index';
$route['fr'] = 'node/index';

$route['en/collaborators_login'] = 'node/collaborators_login';
$route['es/collaborators_login'] = 'node/collaborators_login';
$route['de/collaborators_login'] = 'node/collaborators_login';
$route['fr/collaborators_login'] = 'node/collaborators_login';

$route['en/terms'] = 'node/terms';
$route['es/terms'] = 'node/terms';
$route['de/terms'] = 'node/terms';
$route['fr/terms'] = 'node/terms';

$route['en/success'] = 'node/success';
$route['es/success'] = 'node/success';
$route['de/success'] = 'node/success';
$route['fr/success'] = 'node/success';

$route['en/confirmation'] = 'node/confirmation';
$route['es/confirmation'] = 'node/confirmation';
$route['de/confirmation'] = 'node/confirmation';
$route['fr/confirmation'] = 'node/confirmation';

$route['en/error'] = 'node/error';
$route['es/error'] = 'node/error';
$route['de/error'] = 'node/error';
$route['fr/error'] = 'node/error';

$route['en/payment'] = 'node/stripePayment';
$route['es/payment'] = 'node/stripePayment';
$route['de/payment'] = 'node/stripePayment';
$route['fr/payment'] = 'node/stripePayment';

$route['en/paymentprocess'] = 'node/stripePaymentProcess';
$route['es/paymentprocess'] = 'node/stripePaymentProcess';
$route['de/paymentprocess'] = 'node/stripePaymentProcess';
$route['fr/paymentprocess'] = 'node/stripePaymentProcess';

$route['en/process'] = 'node/process';
$route['es/process'] = 'node/process';
$route['de/process'] = 'node/process';
$route['fr/process'] = 'node/process';

//$route['en/reservation'] = 'node/reservation';
//$route['es/reservation'] = 'node/reservation';

$route['en/reservation'] = 'node/reservationBank';
$route['es/reservation'] = 'node/reservationBank';
$route['de/reservation'] = 'node/reservationBank';
$route['fr/reservation'] = 'node/reservationBank';

$route['en/paymentRequestSuccess'] = 'node/payment_request_success';
$route['es/paymentRequestSuccess'] = 'node/payment_request_success';
$route['de/paymentRequestSuccess'] = 'node/payment_request_success';
$route['fr/paymentRequestSuccess'] = 'node/payment_request_success';

$route['en/doPayment/(:num)'] = 'node/doPayment/$1';
$route['es/doPayment/(:num)'] = 'node/doPayment/$1';
$route['de/doPayment/(:num)'] = 'node/doPayment/$1';
$route['fr/doPayment/(:num)'] = 'node/doPayment/$1';

$route['en/payNow'] = 'ajax/pay_now';
$route['es/payNow'] = 'ajax/pay_now';
$route['de/payNow'] = 'ajax/pay_now';
$route['fr/payNow'] = 'ajax/pay_now';

$route['en/getData'] = 'ajax/getData';
$route['es/getData'] = 'ajax/getData';
$route['de/getData'] = 'ajax/getData';
$route['fr/getData'] = 'ajax/getData';

$route['en/collaborators/login'] = 'collaborators/login';
$route['es/collaborators/login'] = 'collaborators/login';
$route['de/collaborators/login'] = 'collaborators/login';
$route['fr/collaborators/login'] = 'collaborators/login';

$route['en/collaborators/logout'] = 'collaborators/logout';
$route['es/collaborators/logout'] = 'collaborators/logout';
$route['de/collaborators/logout'] = 'collaborators/logout';
$route['fr/collaborators/logout'] = 'collaborators/logout';

$route['en/collaborators/changepassword'] = 'collaborators/changepassword';
$route['es/collaborators/changepassword'] = 'collaborators/changepassword';
$route['de/collaborators/changepassword'] = 'collaborators/changepassword';
$route['fr/collaborators/changepassword'] = 'collaborators/changepassword';

$route['en/bookings'] = 'collaborators/bookings';
$route['es/bookings'] = 'collaborators/bookings';
$route['de/bookings'] = 'collaborators/bookings';
$route['fr/bookings'] = 'collaborators/bookings';

$route['en/firstStepReservation'] = 'ajax/firstStepReservation';
$route['es/firstStepReservation'] = 'ajax/firstStepReservation';
$route['de/firstStepReservation'] = 'ajax/firstStepReservation';
$route['fr/firstStepReservation'] = 'ajax/firstStepReservation';

$route['en/(:any)'] = 'node/loaddata_en/$1';
$route['es/(:any)'] = 'node/loaddata_es/$1';
$route['ca/(:any)'] = 'node/loaddata_ca/$1';
