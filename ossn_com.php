<?php
/**
 * Open Source Social Network
 *
 * @package   Open Source Social Network
 * @author    Ken McGonigal at Zing Space Core Team <ken.mcgonigal@aegisnetworks.ca>
 * @copyright AegisNetworks.ca
 * @license   General Public Licence http://www.opensource-socialnetwork.org/licence
 * @link      http://www.opensource-socialnetwork.org/licence
 */
//setting up path so we can use it in entire file 
//if your component folder have upper and lower case characters please use same here.


define('__OSSN_MY_LIST__', ossn_route()->com . 'Mylist/');


function ossn_my_list() {
  /**
  * Lets add our css to ossn default css file,
  * Lets create css directory in your component directory here our
  * directory name is mylistWorld so lets create new directory name css in mylistWorld
  * directory after that create a file name mylistworld.php in it and add css
  * ossn.default is name of css.
  * use following code to add css in ossn default css file
  */
   ossn_extend_view('css/ossn.default', 'css/mylist');
   
   
  /**
  * For javascript you can do same thing , but instead of css you need to use js see code below:
  */   
   ossn_extend_view('js/opensource.socialnetwork', 'js/mylist');
  
  /**
  * Sometime you can't extned other css or js file as it creates conflicts in css or js,
  * so for that purpose you need to create seprate js or css file.
  * Now lets create a new directory called standalone in css directory 
  * create a file called mylistworld.php in your standalone directory add your css code in that file.
  * To create seprate css link in header you can use following code.
  */
   //this will just tell system that new css file for header is available
   ossn_new_css('my.list', 'css/standalone/mylist');
   
   //now tell system to load file in header, here the first argument in function must be same as you 
   //used in ossn_new_css(<argument>) 
   ossn_load_css('my.list');
   
   //lets create a new page called mylist and print mylist for that we need to use following code.
   ossn_register_page('mylist', 'ossn_my_list');
}
//page function that is create by ossn_register_page('mylist', 'ossn_mylist_page');
//the code below is use to print mylist world in page.
// vist http://mysite.com/mylist to view page
function ossn_mylist_page(){
  ossn_register_page('mylist', 'ossn_mylist_page');
  $icon = ossn_site_url('components/mylist/img/mylist.png');
  ossn_register_sections_menu('newsfeed', array(
	'text' => ossn_print('com:ossn:site:mylist'),
	'url' => ossn_site_url('mylist'),
	'section' => 'links',
	'icon' => $icon
	
	));
  
}
//this line is used to register initliize function to ossn system
ossn_register_callback('ossn', 'init', 'ossn_my_list');
