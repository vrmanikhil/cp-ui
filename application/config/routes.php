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
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'home/error404';

$route['home'] = 'home/home';
$route['education-details'] = 'home/educationDetails';
$route['employer-details'] = 'home/employerDetails';
$route['verify-email/(:num)'] = 'home/verifyEMail/$1';
$route['verify-mobile-number'] = 'home/verifyMobileNumber';
$route['upload-identity-document'] = 'home/uploadUdentityDoc';
$route['chat'] = 'home/chatNew';
$route['user-profile/(:num)'] = 'home/userProfile/$1';

$route['change-password'] = 'home/changePassword';
$route['reset-password'] = 'home/resetPassword';
$route['notifications'] = 'home/notifications';
$route['connections'] = 'home/connections';

$route['search'] = 'home/search';


$route['applicants/(:num)/(:num)'] = 'home/applicants/$1/$2';

//Footer Links

$route['about-us'] = 'home/aboutUs';
$route['terms-and-conditions'] = 'home/termsAndConditions';
$route['privacy-policy'] = 'home/privacyPolicy';
$route['coat'] = 'home/coat';
$route['contact-us'] = 'home/contactUs';

$rote['skills/browse-skills'] = 'home/browseSkills';

//Job Offers- Normal Users

$route['jobs/relevant-jobs'] = 'home/relevantJobs';
$route['jobs/job-offers'] = 'home/jobOffers';
$route['jobs/applied-job-offers'] = 'home/appliedJobOffers';

//Internship Offers- Normal Users

$route['internships/relevant-internships'] = 'home/relevantInternships';
$route['internships/internship-offers'] = 'home/internshipOffers';
$route['internships/applied-internship-offers'] = 'home/appliedInternshipOffers';

//Job Offers- Employers

$route['jobs/add-job-offer'] = 'home/addJobOffer';
$route['jobs/added-job-offer'] = 'home/addedJobOffers';

//Internship Offers- Employers

$route['internships/add-internship-offer'] = 'home/addInternshipOffer';
$route['internships/added-internship-offer'] = 'home/addedInternshipOffers';

//Skills

$route['skills'] = 'home/skills';
$route['skills/skill-test'] = 'home/skillTest';
$route['skills/skill-test-guidelines/(:num)'] = 'home/getskillTestGuidelines/$1';
$route['skills/skill-test-guidelines'] = 'home/skillTestGuidelines';
$route['skills/submit-answers'] = 'web/submitAnswers';

$route['translate_uri_dashes'] = FALSE;

// Messages

$route['messages/compose'] = 'home/composeMessage';
$route['messages'] = 'home/messages';
$route['messages/composeMessage'] = 'home/sendComposedMessage';
$route['messages/chats/(:num)'] = 'home/chat/$1';
$route['messages/load-more-chats/(:num)'] = 'home/loadMoreChats/$1';
$route['messages/load-more-messages/(:num)/(:num)'] = 'home/loadMoreMessages/$1/$2';
$route['messages/send-message'] = 'home/sendMessage';
$route['messages/checkForNewMessages'] = 'home/checkForNewMessages';
