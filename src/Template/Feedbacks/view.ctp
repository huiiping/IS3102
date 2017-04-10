<?php
$this->assign('title', __('Feedbacks') .'/'. __('View'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Feedback'), ['controller' => 'Feedbacks', 'action' => 'index']);
$this->Html->addCrumb(__('View Feedback'));
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Feedback <?= h($feedback->id) ?></h3>
      </div>
      <div class="box-body">
        <!-- <div class="pull-right">
            <a class="btn btn-success btn-block" title="Edit Retailer Account Type" href="/IS3102_Final/feedbacks/edit/<?=$feedback->id?>" >Edit Feedback</a>
        </div><br><br> -->
        <br>
        <table class="table table-bordered table-striped">
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($feedback->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Customer') ?></th>
                <td><?= $feedback->has('customer') ? $this->Html->link($feedback->customer_id, ['controller' => 'Customers', 'action' => 'view', $feedback->customer->id], ['title' => 'View Customer Details']) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Customer First Name') ?></th>
                <td><?= h($feedback->customer_first_name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Customer Last Name') ?></th>
                <td><?= h($feedback->customer_last_name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Customer Email') ?></th>
                <td><a href="mailto:<?= h($feedback->customer_email) ?>" title="email"><?= h($feedback->customer_email) ?></a></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Customer Contact') ?></th>
                <td><a href="tel:+<?= h($feedback->customer_contact) ?>" title="Call Contact">
                    <?= h($feedback->customer_contact) ?></a></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Message') ?></th>
                <td><?= h($feedback->message) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Status') ?></th>
                <td><?= h($feedback->status) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= $this->Time->format(h($feedback->modified), 'd MMM YYYY, HH:mm') ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= $this->Time->format(h($feedback->created), 'd MMM YYYY, HH:mm') ?></td>
            </tr>
        </table><br><br>
    </div>
</div>
</div>
</section>

