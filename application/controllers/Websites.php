<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Websites extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('websites');
	}

	public function analyze(){
		require('application/libraries/simple_form_dom.php');

		$url = "http://" . $this->input->get('url');
		// $htmlcount = 0;
		// $divcount = 0;
		// $pcount = 0;
		// $acount = 0;
		// $imgcount = 0;
		// $ulcount = 0;
		// $licount = 0;
		// $h1count = 0;
		// $h2count = 0;
		// $h3count = 0;
		$html = file_get_html($url);
		
	
		foreach($html->find('<div>') as $element){
			echo $element;
		}
	}
}
