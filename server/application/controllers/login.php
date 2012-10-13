<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$fb_config = array(
         'appId'  => '154538314688105',
         'secret' => '22af85a71cc6a72c827b8016be36746e'
        );
        
        $this->load->library('facebook', $fb_config);

        $user = $this->facebook->getUser();
         if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }

        if ($user) {
            $data['logout_url'] = $this->facebook->getLogoutUrl();
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl();
            $this->load->helper('url');

            redirect($data['login_url']);
        }

        var_dump($user);
	}	
}