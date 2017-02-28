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



echo 'Dear '.$content[0].',' .'<br><br>';


echo 'Someone has requested a password reset for your account. ' . 
'Please click the following link to recover your account: ' . '<br>';
echo 'http://' . $content[3] . '/intrasys-employees/recoverActivate/' . $content[4] . '/' . $content[5] . '<br><br>';
echo 'After recovering your account, please log in using the new credentials: ' . '<br>';
echo 'Username: ' . $content[1] . '<br>';
echo 'Password: ' . $content[2] . '<br>';
echo 'If this was a mistake, just ignore this email and nothing will happen. This is a computer generated email, please do not reply.' . '<br><br>';
echo 'Regards,' . '<br>' . 'The Intrasys Team'

?>