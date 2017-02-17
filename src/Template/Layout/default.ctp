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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area">
            <li class="name">
            <h1><a href="#">Intrasys</a></h1>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      <?php if($loggedIn): ?>
      <li><?= $this->Html->link(__('Logout'), ['controller' => 'intrasysemployees', 'action' => 'logout']); ?></li>
    </ul>

    <!-- Left Nav Section -->
    <ul class="left">
      <li><?= $this->Html->link(__('Retailers'), ['controller' => 'retailers', 'action' => 'index']); ?></li>
      <li><?= $this->Html->link(__('Employees'), ['controller' => 'intrasysemployees', 'action' => 'index']); ?></li>
      <li><?= $this->Html->link(__('Announcements'), ['controller' => 'announcements', 'action' => 'index']); ?></li>
      <li><?= $this->Html->link(__('Roles'), ['controller' => 'intrasysemployeeroles', 'action' => 'index']); ?></li>
      <li><?= $this->Html->link(__('Account Types'), ['controller' => 'retaileracctypes', 'action' => 'index']); ?></li>
    </ul>
      <?php else :?>
        <li><?= $this->Html->link(__('Login For Intrasys'), ['controller' => 'intrasysemployees', 'action' => 'login']); ?></li>
        <li><?= $this->Html->link(__('Login For Retailer'), ['controller' => 'retaileremployees', 'action' => 'login']); ?></li>
      <?php endif; ?> 
  </section>
</nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
