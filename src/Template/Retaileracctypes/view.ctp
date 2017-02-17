<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
       <?= $this->Element('sideBar', array('type' => 'Account Type', 'typePlural' => 'Account types')); ?>
</nav>
<div class="retaileracctypes view large-9 medium-8 columns content">
    <h3><?= h($retaileracctype->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($retaileracctype->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($retaileracctype->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NumOfUsers') ?></th>
            <td><?= $this->Number->format($retaileracctype->numOfUsers) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NumOfWarehouses') ?></th>
            <td><?= $this->Number->format($retaileracctype->numOfWarehouses) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NumOfStores') ?></th>
            <td><?= $this->Number->format($retaileracctype->numOfStores) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NumOfProdTypes') ?></th>
            <td><?= $this->Number->format($retaileracctype->numOfProdTypes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($retaileracctype->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($retaileracctype->modified) ?></td>
        </tr>
    </table>
</div>
