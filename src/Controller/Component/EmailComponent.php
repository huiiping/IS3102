<?php
/**
 * Copyright 2009 - 2014, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2009 - 2014, Cake Development Corporation (http://cakedc.com)
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller\Component;

use App\Model\Entity\User;
use Cake\Controller\Component;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Hash;
use Cake\Mailer\Email;

/**
 * Post-Redirect-Get: Transfers POST Requests to GET Requests
 *
 */
class EmailComponent extends Component {
	
	
	public function promotionEmail($title, $body, $recipients){

		$session = $this->request->session();
        $retailer = $session->read('retailer');
        $conn = ConnectionManager::get('default');
        $query = $conn
            -> execute('SELECT * FROM retailer_details WHERE retailer_name = :name', ['name' => $retailer])
            ->fetchAll('assoc');

		$email = new Email('default');
        $email->template('promotion');
        $email->emailFormat('html');                
        $email->subject($title);
        $email->from('tanyongming90@gmail.com');
        
        foreach($query as $row):
            $email->replyTo($row['retailer_email']);
        endforeach;
        
        foreach ($recipients as $recipient):
            $email->to($recipient['email']);
            $email->send($body);
        endforeach;

	}
}
