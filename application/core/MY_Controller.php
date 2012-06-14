<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @file MY_Controller.php
 *
 * Note for developers:
 * This class create to 'Extending Native Libraries' as:
 * http://codeigniter.com/user_guide/general/creating_libraries.html
 * As we see, this class extends CI Controller.
 *
 * This class create autoload global output variables,
 * which be used for page template (frontend_page view.)
 * 
 * See: frontend_page.php (view) and various controllers in this project.
 */
 class MY_Controller extends CI_Controller {
 	function __construct()
 	{
 		parent::__construct();
 	}

 	function init_frontend($args = array())
 	{
 		// Track user referrer path, this wouldn't be updated until next request.
        $this->session->set_flashdata('referrer', current_url());

        // Set default for some arguments.
 		if (!isset($args['title'])) {
 			$args['title'] = '';
 		}
 		if (!isset($args['show_my_orders'])) {
 			$args['show_my_orders'] = TRUE;
 		}

 		// Frontend template: initialize $output for fail-safe.
 		$output = array(
 			'title' => $args['title'],
 			'page_title' => isset($args['page_title']) ? $args['page_title'] : $args['title'],
 			'menu' => Menu::get_frontend_menu(),
 			'sidebar_menu' => Menu::get_sidebar_menu(),
 			'footer' => $this->_get_frontend_footer(),
 		);

 		// Wait orders has specific condition, this would not show in some page.
 		$wait_orders = Order::get_wait_orders();
 		if ($args['show_my_orders'])
        {
            $wait_orders_list = $this->load->view('orders/waiting_list',
                array(
                    'orders' => $wait_orders,
                )
            , TRUE);
        }
        else
        {
            $wait_orders_list = '';
        }

 		$output['members_block'] = $this->load->view(
 			'members/block.php', 
 			array(
 				'member' => Member::get_current_profile($authenticate = FALSE),
 				'wait_orders_list' => $wait_orders_list,
 			)
 		);

 		return $output;
 	}

 	private function _get_frontend_footer()
 	{
 		return $this->load->view('frontend/footer', '', TRUE);
 	}
 }