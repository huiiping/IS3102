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

class ExportXlsComponent extends Component {
	
	/* 
	function export($fileName, $headerRow, $data) {
		 ini_set('max_execution_time', 1600); //increase max_execution_time to 10 min if data set is very large
		 $fileContent = implode("\t ", $headerRow)."\n";
		 
		 foreach($data as $result) {
		   $fileContent .=  implode("\t ", $result)."\n";
		 }

		 header('Content-type: application/ms-excel'); /// you can set csv format
		 header('Content-Disposition: attachment; filename='.$fileName);
		 
		 echo $fileContent;

		exit;

	}*/

	function export($fileName){
		// output headers so that the file is downloaded rather than displayed
	
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename='.$fileName.'.csv');

		// create a file pointer connected to the output stream
		$output = fopen('php://output', 'w');

		// output the column headings
		fputcsv($output, array('id', 'retailer_id', 'action', 'entity', 'entitiyid','employeeid','created'));

		$conn = ConnectionManager::get('intrasysdb');            
        $query = $conn
            ->execute('SELECT * FROM intrasys_loggings')
            ->fetchAll('assoc');

        foreach ($query as $row):
            while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);
        endforeach;   

        /*
		// fetch the data
		mysql_connect('localhost', 'username', 'password');
		mysql_select_db('database');
		$rows = mysql_query('SELECT field1,field2,field3 FROM table');

		// loop over the rows, outputting them
		while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);
		*/

	}

}
?>