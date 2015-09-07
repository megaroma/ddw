<?php
namespace DDStudio\Widget\widgets;

use DDStudio\Widget\ddw\event;
class layout {
	public $id = "";
	public function __construct($config) {
		$this->id = $config['id'];

		event::listen(event::ASK_LAYOUTS, this, function($data) {

		});


	}

	public function __toString() {
		$data = array();
		$data['key'] = md5(microtime().rand());
		$data['id'] =  $this->id;
		\Session::put('layout_key_'.$this->id ,$data['hidden_key']);
		return view('DDW::layout',$data);
	}

}