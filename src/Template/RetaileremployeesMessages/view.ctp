<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('Retailer') );
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Messages'), ['controller' => 'RetailerEmployeesMessages', 'action' => 'index']);

?>



<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Retailer Employees Message'), ['action' => 'edit', $retailerEmployeesMessage->retailer_employee_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Retailer Employees Message'), ['action' => 'delete', $retailerEmployeesMessage->retailer_employee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerEmployeesMessage->retailer_employee_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Employees Messages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Employees Message'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Retailer Employees'), ['controller' => 'RetailerEmployees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Retailer Employee'), ['controller' => 'RetailerEmployees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="retailerEmployeesMessages view large-9 medium-8 columns content">
    <h3><?= h($retailerEmployeesMessage->retailer_employee_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Retailer Employee') ?></th>
            <td><?= $retailerEmployeesMessage->has('retailer_employee') ? $this->Html->link($retailerEmployeesMessage->retailer_employee->id, ['controller' => 'RetailerEmployees', 'action' => 'view', $retailerEmployeesMessage->retailer_employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Message') ?></th>
            <td><?= $retailerEmployeesMessage->has('message') ? $this->Html->link($retailerEmployeesMessage->message->title, ['controller' => 'Messages', 'action' => 'view', $retailerEmployeesMessage->message->id]) : '' ?></td>
        </tr>
    </table>
</div>
