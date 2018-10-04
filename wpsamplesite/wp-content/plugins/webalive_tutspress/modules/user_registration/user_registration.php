<?php 
namespace Module\UserRegistration;

use Module\UserRegistration\Helper\Webalive_User_Registration_Helper as Helper;
use Module\UserRegistration\Registration\Webalive_User_Registration as Register;
use Module\UserRegistration\Login\Webalive_User_Login as Login;
use Module\UserRegistration\Success\Webalive_User_Registration_Success as Success;

class Webalive_User_Registration {

    public function __construct() {
        $this->loader();
        $helper = new Helper();
        $register = new Register();
        $login = new Login();
        $success = new Success();
    }

    /**
     * This will load all required files
     */
    public function loader() {
        require_once WATP_PATH . 'modules/user_registration/inc/helper.php';
        require_once WATP_PATH . 'modules/user_registration/inc/login.php';
        require_once WATP_PATH . 'modules/user_registration/inc/register.php';
        require_once WATP_PATH . 'modules/user_registration/inc/success.php';
    }

}