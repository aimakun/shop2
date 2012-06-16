<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mock extends MY_Controller {
	public function index()
	{
		//$output = $this->init_frontend();
        // Frontend template: IMPORTANT - our page contents are here.
        $output['content'] = 'Welcome to our homepage!';
        
        // Frontend template: Finally, display overall page with frontend_page.php in views.
        //$this->load->view('frontend/page', $output);
        $this->load->view('front/page', $output);
	}
}