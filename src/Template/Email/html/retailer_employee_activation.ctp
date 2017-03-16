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


echo 'Welcome onboard CLRMS '.$content[0].',' .'<br><br>';
echo 'You are receiving this email as you are the assigned master acccount for '.$content[0].'\' account with Intrasys.';


echo 'Please click the following link to activate your account: ' . '<br>';
echo 'http://' . $content[3] . '/IS3102_Final/' . $content[6] . '/activate/' . $content[4] . '/' . $content[5] . '/' . $content[7] . '<br><br>';
echo 'After activating your account, please log in using the following credentials: ' . '<br>';
echo 'Username: ' . $content[1] . '<br>';
echo 'Password: ' . $content[2] . '<br>';
echo 'If this was a mistake, just ignore this email and nothing will happen. This is a computer generated email, please do not reply.' . '<br><br>';
echo 'Regards,' . '<br>' . 'The Intrasys Team'

?>