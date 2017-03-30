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
    

echo 'Welcome to CLRMS '.$content[0].',' .'<br><br>';


echo 'Please click the following link to activate your account: ' . '<br>';
echo 'http://' . $content[1] . '/IS3102_Final/' . $content[4] . '/activate/' . $content[2] . '/' . $content[3] . '/' . $content[5] . '<br><br>';
echo 'After activating your account, Please log in using your registered email and your new password: ' . '<br>';
echo 'If this was a mistake, just ignore this email and nothing will happen. This is a computer generated email, please do not reply.' . '<br><br>';
echo 'Regards,' . '<br>' . 'The ' . $content[6] . 'Team'

?>