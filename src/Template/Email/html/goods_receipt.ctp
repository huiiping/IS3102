<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<?php
$content = explode(',', $content);
$size = count($content)-3;
$count = 2;
$index = 1;

echo 'Dear '.$content[0].',' .'<br><br>';
echo 'This email serves as a offical receipt of the following goods under Purchase Order [ID: '.$content[1].']: ' . '<br>';

while($count<=$size){
	echo $index.'. ['.$content[$count++].']: '.$content[$count++].'<br />';
	$index++;
}

echo '<br />Thank You, <br />';
echo $content[$count];

?>