<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application’s default view class
 *
 * @link http://book.cakephp.org/3.0/en/views.html#the-app-view
 */
class AppView extends View
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
        // $this->loadHelper('WyriHaximus/MinifyHtml.MinifyHtml');

        if ($this->request->action == 'index') {
            $this->loadHelper('Paginator', ['templates' => 'template_paginator']);
        } else if ($this->request->action == 'add') {
            $this->loadHelper('Paginator', ['templates' => 'template_form_1_column']);
        } else if ($this->request->action == 'edit') {
            $this->loadHelper('Paginator', ['templates' => 'template_form_1_column']);
        } else if ($this->request->action == 'delete') {
            $this->loadHelper('Paginator', ['templates' => 'template_form_1_column']);
        }
    }
}
