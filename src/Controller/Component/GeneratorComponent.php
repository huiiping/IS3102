<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class GeneratorComponent extends Component{
	
	public function generateString(){


		$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
		$string = '';
		$desired_length = rand(20,30);

		$max = strlen($characters) - 1;
		for ($i = 0; $i < $desired_length; $i++) {
		    $string .= $characters[mt_rand(0, $max)];
		}

		return $string;

		/*$password='';
		$desired_length = rand(20,30);
		for($length = 0; $length < $desired_length; $length++){
			$password .= chr(rand(32, 126));
		}

		return str_replace(['/','?', '%'], '', $password);
		*/
	}
}
