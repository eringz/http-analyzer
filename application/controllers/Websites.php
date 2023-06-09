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
		
		//Concat https:// and get method of users url input
		$url = "https://" . $this->input->get('url');

		//Initialization for http tags analyzer
		$html = file_get_html($url);
		$tags = array(
			array('tag' => 'meta', 'count' => 0),
			array('tag' => 'div', 'count' => 0),
			array('tag' => 'p', 'count' => 0),
			array('tag' => 'a', 'count' => 0),
			array('tag' => 'img', 'count' => 0),
			array('tag' => 'ul', 'count' => 0),
			array('tag' => 'li', 'count' => 0),
			array('tag' => 'h1', 'count' => 0),
			array('tag' => 'h2', 'count' => 0),
			array('tag' => 'h3', 'count' => 0),
		);

		for($i = 0; $i< COUNT($tags); $i++){
			foreach($html->find($tags[$i]['tag']) as $element){
				$tags[$i]['count']++;
			}
		}

		$result['tags'] = $tags;
		$html->clear();

		//Initialization of curl settings for http response
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		
		curl_close($ch);
		$data = curl_exec($ch);
		$info = curl_getinfo($ch);
		
		$result['data'] = '<pre>' . htmlentities($data) . '</pre>';
		
		//Convertion of arrays into json file
		$result_json = json_encode($result);
		print_r($result_json);

	}
}