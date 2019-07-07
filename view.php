<?php
class View {


	



	public static function is_ajax(){
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
			return true;
		else return false;
	}


	// функция, которая отдает ответ (информационное сообщение) для ajax-запроса в виде JSON-строки
	// сообщение отображается в модальном окне sweetAlert2
	public static function messageModal($status, $message) {
		exit(json_encode([
			 'status' => $status,
			 'message' => $message,
			]));
	}

	public static function location($url) {
		exit(json_encode(['url' => $url]));
	}


	public static function redirect($url = '/') {
		header('location: /'.$url);
		exit;
	}

}	