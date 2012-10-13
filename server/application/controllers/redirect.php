<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Redirect extends CI_Controller {
	function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $queryString =  $_SERVER['QUERY_STRING'];
        header("Location: local:///index.html?" . $queryString);
    }
}
