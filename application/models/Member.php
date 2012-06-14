<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Member extends ActiveRecord\Model {
	private $_current_profile; // load member profile once at a time.

	public function get_current_profile($authenticate = TRUE)
    {
        if (!$this->session->userdata('email'))
        {
            if ($authenticate)
            {
                redirect('members/login');
            }
            else {
                return FALSE;
            }
        }
        
        // Load current member.
        if (!isset($this->_current_profile))
        {
            $this->_current_profile = Member::find(
            	'all', 
            	array(
            		'conditions' => array(
            			"email='" . $this->session->userdata('email') . "'"
            		)
            	)
            );
             
            if (count($this->_current_profile) != 1)
            {
                // Reset failed account, this member may be deleted from admin.
                redirect('members/logout');
            }
            
            $this->_current_profile = $this->_current_profile[0];
        }
        
        return $this->_current_profile;
    }

	public function get_provinces()
    {
        return array(
        	"-- Please select --", "กระบี่", "กรุงเทพ", "กาญจนบุรี", "กาฬสินธุ์", 
        	"กำแพงเพชร", "ขอนแก่น", "จันทบุรี", "ฉะเชิงเทรา", "ชลบุรี", "ชัยนาท", 
        	"ชัยภูมิ", "ชุมพร", "เชียงราย", "เชียงใหม่", "ตรัง", "ตราด", "ตาก", 
        	"บึงกาฬ", "นครนายก", "นครปฐม", "นครพนม", "นครราชสีมา", "นครศรีธรรมราช", 
        	"นครสวรรค์", "นนทบุรี", "นราธิวาส", "น่าน", "บุรีรัมย์", "ปทุมธานี", 
        	"ประจวบคีรีขันธ์", "ปราจีนบุรี", "ปัตตานี", "พระนครศรีอยุธยา", "พะเยา", 
        	"พังงา", "พัทลุง", "พิจิตร", "พิษณุโลก", "เพชรบุรี", "เพชรบูรณ์", "แพร่", 
        	"ภูเก็ต", "มหาสารคาม", "มุกดาหาร", "แม่ฮ่องสอน", "ยะลา", "ยโสธร", "ระนอง", 
        	"ระยอง", "ราชบุรี", "ร้อยเอ็ด", "ลพบุรี", "ลำปาง", "ลำพูน", "เลย", 
        	"ศรีสะเกษ", "สกลนคร", "สงขลา", "สตูล", "สมุทรปราการ", "สมุทรสงคราม", 
        	"สมุทรสาคร", "สระบุรี", "สระแก้ว", "สิงห์บุรี", "สุพรรณบุรี", "สุราษฏร์ธานี", 
        	"สุรินทร์", "สุโขทัย", "หนองคาย", "หนองบัวลำภู", "อำนาจเจริญ", "อุดรธานี", 
        	"อุตรดิตถ์", "อุทัยธานี", "อุบลราชธานี", "อ่างทอง"
        );
    }
}