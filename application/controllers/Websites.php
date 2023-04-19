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
		
		$ch = curl_init();
		// $html = file_get_html('https://slashdot.org/');

		// $articles = $html->find('article[data-fhtype="story"]');
		// foreach($articles as $article) {
		// 	$item['title'] = $article->find('.story-title', 0)->plaintext;
		// 	$item['intro'] = $article->find('.p', 0)->plaintext;
		// 	$item['details'] = $article->find('.details', 0)->plaintext;
		// 	$items[] = $item;
		// }

		// echo '<pre>';
		// print_r($items);
		// echo '</pre>';

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		$data = curl_exec($ch);
		$info = curl_getinfo($ch);
		
		curl_close($ch);

		$print_r($data);

		

		// echo '<pre>' . htmlentities($data) . '</pre>';
		// echo '<pre>';
		// var_dump($info);
		// echo '</pre>';

	}
}