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

    public function rfqEmail($title, $body, $recipients){

        $session = $this->request->session();
        $retailer = $session->read('retailer');
        $conn = ConnectionManager::get('default');
        $query = $conn
            -> execute('SELECT * FROM retailer_details WHERE retailer_name = :name', ['name' => $retailer])
            ->fetchAll('assoc');

        $email = new Email('default');
        $email->template('rfq');
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

    public function activationEmail($recipient, $firstName, $username, $pwd, $id, $token, $type, $dbname){

        $email = new Email('default');
        $email->template('activation');
        $email->emailFormat('html');        
        $email->subject('Please confirm your email address');
        $email->from('tanyongming90@gmail.com');
        $email->to($recipient);
        $email->send($firstName.','.
            $username.','.
            $pwd.','.
            env('SERVER_NAME').','. 
            $id.','. 
            $token.','.
            $type.','.
            $dbname);
    }

    public function customerActivation($recipient, $firstName, $id, $token, $type, $dbname, $retailer){


        $email = new Email('default');
        $email->template('customer_activation');
        $email->emailFormat('html');        
        $email->subject('Please confirm your email address');
        $email->from('tanyongming90@gmail.com');
        $email->to($recipient);
        $email->send($firstName.','.
            env('SERVER_NAME').','. 
            $id.','. 
            $token.','.
            $type.','.
            $dbname.','.
            $retailer);
    }

    public function retailerEmployeeActivationEmail($recipient, $firstName, $username, $pwd, $id, $token, $type, $database){

        $email = new Email('default');
        $email->template('retailer_employee_activation');
        $email->emailFormat('html');        
        $email->subject('Please confirm your email address');
        $email->from('tanyongming90@gmail.com');
        $email->to($recipient);
        $email->send($firstName.','.
            $username.','.
            $pwd.','.
            env('SERVER_NAME').','. 
            $id.','. 
            $token.','.
            $type . ',' .
            $database
            );

    }

    
    public function recoveryEmail($recipient, $firstName, $username, $pwd, $id, $token, $type, $database){

        $email = new Email('default');
        $email->template('recovery');
        $email->emailFormat('html');        
        $email->subject('Password Recovery');
        $email->from('tanyongming90@gmail.com');
        $email->to($recipient);
        $email->send($firstName.','.
            $username.','.
            $pwd.','.
            env('SERVER_NAME').','. 
            $id.','. 
            $token.','.
            $type . ',' .
            $database
            );
        
    }


}
