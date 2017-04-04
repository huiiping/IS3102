<?php
$this->assign('title', __('Retailer') . '/' . __('View'));
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Retailers', 'action' => 'index']);
$this->Html->addCrumb(__('View Retailer : '.ucfirst($retailer->retailer_name)));
?>

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-xs-4">
        <div class="box box-primary">
          <div class="box-body box-profile">
            <h3 class="profile-username text-center"><?= ucfirst(h($retailer->retailer_name)) ?></h3>
            <br>
            <ul class="list-group list-group-unbordered">
              <!--<li class="list-group-item">
                <b><?= __('Account Status') ?></b> 
                <div class="pull-right"><?= h($retailer->account_status) ?></div>
              </li>-->
              <li class="list-group-item">
                <b><?= __('Email') ?></b> 
                <div class="pull-right"><?= $this->Text->autoLinkEmails(h($retailer->retailer_email), ['title' => 'Email']) ?></div>
              </li>
              <li class="list-group-item">
                <b><?= __('Contact') ?></b> 
                <div class="pull-right">
                  <a href="tel:+<?= h($retailer->contact) ?>" title="Call Contact">
                    <?= h($retailer->contact) ?>
                  </a>
                </div>
              </li>
              <li class="list-group-item">
                <b><?= __('Account Type') ?></b> 
                <div class="pull-right">
                  <?= $retailer->has('retailer_acc_type') ? $this->Html->link($retailer->retailer_acc_type->name, ['controller' => 'RetailerAccTypes', 'action' => 'view', $retailer->retailer_acc_type->id], ['tile' => 'View Account Type Details']) : '' ?>
                </div>
              </li>
              <li class="list-group-item">
                <b><?= __('Account Status') ?></b> 
                <div class="pull-right">
                    <?= h($retailer->account_status) ?>
                </div>
              </li>
            </ul>
            <br>
            <a class="btn btn-success btn-block" title="Edit Retailer Details" href="/IS3102_Final/retailers/edit/<?=$retailer->id?>" >Edit Retailer&nbsp&nbsp<i class="fa fa-fw fa-edit"></i></a><br>
            <a class="btn btn-success btn-block" title="Edit Account Status" href="/IS3102_Final/retailers/changeStatus/<?=$retailer->id?>" >Edit Account Status&nbsp&nbsp<i class="fa fa-fw fa-edit"></i></a><br>
            <a class="btn btn-info btn-block" title="Manage Loyatly Points" href="/IS3102_Final/retailer-loyalty-points/view/<?=$retailer->id?>" >Manage Loyalty Points</a><br>
          </div>
        </div>
        <div class="box box-primary">
          <div class="box-body box-profile">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Account Type Details') ?></h3>
            </div>
            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b><?= __('No. Of Users') ?></b> 
                <div class="pull-right"><?= $this->Number->format($retailer->num_of_users + $retailer->retailer_acc_type->num_of_users) ?></div>
              </li>
              <li class="list-group-item">
                <b><?= __('No. Of Warehouses') ?></b> 
                <div class="pull-right"><?= $this->Number->format($retailer->num_of_warehouses + $retailer->retailer_acc_type->num_of_warehouses) ?></div>
              </li>
              <li class="list-group-item">
                <b><?= __('No. Of Stores') ?></b> 
                <div class="pull-right"><?= $this->Number->format($retailer->num_of_stores + $retailer->retailer_acc_type->num_of_stores) ?></div>
              </li>
              <li class="list-group-item">
                <b><?= __('No. Of Product Types') ?></b> 
                <div class="pull-right"><?= $this->Number->format($retailer->num_of_products + $retailer->retailer_acc_type->num_of_products) ?></div>
              </li>
            </ul>
            <br>
          </div>
        </div>
      </div>
      <div class="col-md-8">  
        <div class="box box-primary" style="height: 730px;">
            <div class="box-body box-profile">
              <div class="box-header with-border">
                <h3 class="box-title"><?= __('Retailer Profile') ?></h3>
              </div>
              <div class="box-body"><br>
                <table class="table table-bordered table-striped">
                  <tr>
                      <th scope="row"><?= __('Id') ?></th>
                      <td><?= $this->Number->format($retailer->id) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Retailer Name') ?></th>
                      <td><?= ucfirst(h($retailer->retailer_name)) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Retailer Description') ?></th>
                      <td><?= $this->Text->autoParagraph(h($retailer->retailer_desc)); ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Address') ?></th>
                      <td><?= h($retailer->address) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Payment Term') ?></th>
                      <td><?= h($retailer->payment_term) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Contract Start Date') ?></th>
                      <td><?= $this->Time->format(h($retailer->contract_start_date), 'd MMM YYYY') ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Contract End Date') ?></th>
                      <td><?= $this->Time->format(h($retailer->contract_end_date), 'd MMM YYYY') ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Created') ?></th>
                      <td><?= $this->Time->format(h($retailer->created), 'd MMM YYYY, HH:mm') ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Modified') ?></th>
                      <td><?= $this->Time->format(h($retailer->modified), 'd MMM YYYY, HH:mm') ?></td>
                  </tr>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
