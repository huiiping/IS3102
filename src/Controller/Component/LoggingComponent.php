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



/**
 * Post-Redirect-Get: Transfers POST Requests to GET Requests
 *
 */
class LoggingComponent extends Component {
	
	
	public function rLog($id){

		$session = $this->request->session();

		$logTable = TableRegistry::get('RetailerLoggings');
        $log = $logTable->newEntity([        	
            'action' => $this->request->params['action'],
            'entity' => $this->request->params['controller'],
            'entityid' => $id,
            'retailer_employee_id' => $session->read('retailer_employee_id')
        ]);
        $logTable->save($log);

	}

	public function iLog($retailer, $id){

		
		$session = $this->request->session();

        if($retailer == null){
	        $logTable = TableRegistry::get('IntrasysLoggings');
	        $log = $logTable->newEntity([ 
	            'retailer_id' => $retailer,        
	            'action' => $this->request->params['action'],
	            'entity' => $this->request->params['controller'],
	            'entityid' => $id,
	            'employeeid' => $session->read('employee_id')
	        ]);
	        $logTable->save($log);
        } else {

        	$conn = ConnectionManager::get('intrasysdb');            
            $query = $conn
                ->execute('SELECT * FROM retailers WHERE retailer_name = :name', ['name' => $retailer])
                ->fetchAll('assoc');

            foreach ($query as $row):
                $retailerid = $row['id'];
            endforeach;            
        	
        	$logTable = TableRegistry::get('IntrasysLoggings');
        	$log = $logTable->newEntity([ 
	            'retailer_id' => $retailerid,        
	            'action' => $this->request->params['action'],
	            'entity' => $this->request->params['controller'],
	            'entityid' => $id,
	            'employeeid' => $session->read('retailer_employee_id')
	        ]);
	        $logTable->save($log);
        }


        /*
        if (!empty($session->read('retailer'))) {
            
            $retailer = $session->read('retailer');
            $retailerid = $conn
                ->newQuery()
                ->select('id')
                ->from('retailers')
                ->where(['retailer_name' => $retailer])
                ->execute()
                ->fetchAll('assoc');


            echo $retailerid[0];
            $log = $logTable->newEntity([
                'retailer_id' =>  $retailerid[0],
                'action' => $this->request->params['action'],
                'entity' => $this->request->params['controller'],
                'entityid' => $id,
                'retailer_employee_id' => $session->read('retailer_employee_id')
            ]);
            $logTable->save($log);
        } else {

            $log = $logTable->newEntity([
                'action' => $this->request->params['action'],
                'entity' => $this->request->params['controller'],
                'entityid' => $id,
                'retailer_employee_id' => $session->read('retailer_employee_id')
            ]);
            $logTable->save($log);
        }
        */

    }
}
