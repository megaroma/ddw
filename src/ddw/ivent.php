<?php
namespace DDStudio\Widget\ddw;

class ivent {
	public const ASK_LAYOUTS = 1;

	private static $clients = array(); 
	
	public static function fire($event_name , $data) {
		if(isset($clients[$event_name])) {
			$answer = array();
			foreach($clients[$event_name] as $client) {
				$callback = $client['handler'];
				$response = $callback($data);
				$answer[] = array(
					'object' = $client['widget'],
					'response' = $response
					);
			}
			return $answer;
		} else {
			return array();
		}
	}

	public static function listen($event_name , $object , $handler ) {
		self::$clients[$event_name][] = array(
				'widget' => $object,
				'handler' => $handler
			);
	}

}
