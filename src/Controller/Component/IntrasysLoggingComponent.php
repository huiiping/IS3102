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


/**
 * Post-Redirect-Get: Transfers POST Requests to GET Requests
 *
 */
class IntrasysLoggingComponent extends Component {
	
	
	public function log($id){

		$session = $this->request->session();
        $conn = ConnectionManager::get('intrasysdb');
        $logTable = TableRegistry::get('IntrasysLoggings');

        if (!empty($session->read('retailer'))) {
            
            $retailerid = $conn
                ->newQuery()
                ->select('id')
                ->from('retailers')
                ->where(['retailer_name' => $session->read('retailer')])
                ->execute()
                ->fetchAll('assoc');


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

		
        

	}
}
