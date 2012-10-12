<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {
	public function register()
	{
        $res = $this->user->insert_entry();
        json_encode($res);
	}
	public function getall()
	{
		$res = $this->user->get_last_ten_entries();
        json_encode($res);

	}
	public function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			json_encode($error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			var_dump($data);
			#$this->load->view('upload_success', $data);
		}
	}
	/*
	$this->upload->data();
	Array
	(
	    [file_name]    => mypic.jpg
	    [file_type]    => image/jpeg
	    [file_path]    => /path/to/your/upload/
	    [full_path]    => /path/to/your/upload/jpg.jpg
	    [raw_name]     => mypic
	    [orig_name]    => mypic.jpg
	    [client_name]  => mypic.jpg
	    [file_ext]     => .jpg
	    [file_size]    => 22.2
	    [is_image]     => 1
	    [image_width]  => 800
	    [image_height] => 600
	    [image_type]   => jpeg
	    [image_size_str] => width="800" height="200"
	)
	*/
}
