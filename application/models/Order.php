<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Order extends ActiveRecord\Model {
    static $belongs_to = array(
        array('member'),
        array('product'),
        array('bill'),
        array('invoice')
    );

    private $_current_orders;
    
    public function get_wait_orders()
    {
        if (!isset($this->_current_orders))
        {
            $this->_current_orders = array();
            
            if (!$this->session->userdata('email')) 
            {
                $current_orders = $this->session->userdata('orders');
                if (is_array($current_orders))
                {
                    foreach ($current_orders as $index => $order_product_id)
                    {
                        try
                        {
                            $order['product'] = Product::find($order_product_id);
                            $order['id'] = $index;
                            $order['created_at'] = new ActiveRecord\DateTime(date('Y-m-d H:i:s', $this->session->userdata('last_activity')));
                        }
                        catch (Exception $e)
                        {
                            // Invalid order id, remove it from session.
                            unset($current_orders[$index]);
                            
                            $this->session->set_userdata(
                                array(
                                    'orders' => $current_orders,
                                )
                            );
                            redirect(current_url());
                        }
                        
                        $this->_current_orders[] = (object) $order;
                    }
                }
            }
            else // Members load their orders with Order model.
            {
                // Load current member.
                $member = Member::get_current_profile();
                
                // Get current member's orders,
                // It's different from anonymous because this load full Order objects instead of only IDs.
                $current_orders = Order::find('all', array('conditions' => "member_id={$member->id} AND status='wait'"));
                
                if (is_array($current_orders))
                {
                    foreach ($current_orders as $order)
                    {
                       $this->_current_orders[] = $order;
                    }
                }
            }
        }
        return $this->_current_orders;
    }
}