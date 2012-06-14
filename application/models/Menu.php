<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Menu extends ActiveRecord\Model {
	public function get_frontend_menu()
	{
		// Menu access conditions.
        if ($this->session->userdata('email'))
        {
            $menu_conditions = "access IN ('all', 'member')";
        }
        else
        {
            $menu_conditions = "access IN ('all', 'anonymous')";
        }
        
        return $this->load->view('frontend/menu', 
            array('items' => Menu::find(
                    'all', 
                    array(
                        'conditions' => $menu_conditions,
                        'order' => 'weight'
                    )
                )
            )
        , TRUE);
	}

	public function get_sidebar_menu()
	{
        return $this->load->view('frontend/sidebar_menu', 
            array('items' => Category::find(
                    'all', 
                    array('order' => 'weight')
                )
            )
        , TRUE);
	}
}
