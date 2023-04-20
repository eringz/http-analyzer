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

		$url = "https://" . $this->input->get('url');
		
		
		$html = file_get_html($url);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		$data = curl_exec($ch);
		$info = curl_getinfo($ch);
		
		curl_close($ch);

		$meta_count = 0;
		$div_count = 0;
		$p_count = 0;
		$a_count = 0;
		$img_count = 0;
		$ul_count = 0;
		$li_count = 0;
		$h1_count = 0;
		$h2_count = 0;
		$h3_count = 0;
		
		foreach($html->find('meta') as $element){
			$meta_count++;
		}

		foreach($html->find('div') as $element){
			$div_count++;
		}

		foreach($html->find('p') as $element){
			$p_count++;
		}

		foreach($html->find('a') as $element){
			$a_count++;
		}

		foreach($html->find('img') as $element){
			$img_count++;
		}

		foreach($html->find('ul') as $element){
			$ul_count++;
		}

		foreach($html->find('li') as $element){
			$li_count++;
		}

		foreach($html->find('h1') as $element){
			$h1_count++;
		}

		foreach($html->find('h2') as $element){
			$h2_count++;
		}

		foreach($html->find('h3') as $element){
			$h3_count++;
		}
		
		$html->clear();

		$result['meta'] = $meta_count;
		$result['div'] = $div_count;
		$result['p'] = $p_count;
		$result['a'] = $a_count;
		$result['img'] = $img_count;
		$result['ul'] = $ul_count;
		$result['li'] = $li_count;
		$result['h1'] = $h1_count;
		$result['h2'] = $h2_count;
		$result['h3'] = $h3_count;
		$result['data'] = '<pre>' . htmlentities($data) . '</pre>';
		
		$result_json = json_encode($result);
		print_r($result_json);

	}
}