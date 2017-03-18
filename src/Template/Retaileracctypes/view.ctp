<?php
$this->assign('title', __('Retailer Account Types') .'/'. __('View'));
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Retailer Account Types'), ['controller' => 'RetailerAccTypes', 'action' => 'index']);
$this->Html->addCrumb(__('View Retailer Account Types : '.$retailerAccType->name));
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= h($retailerAccType->name) ?></h3>
        </div>
        <div class="box-body">
          <div class="pull-right">
            <a class="btn btn-default btn-block" title="Edit Retailer Account Type" href="/IS3102_Final/retailer-acc-types/edit<?=$retailerAccType->id?>" >Edit Retailer Account Type</a>
          </div><br><br><br>

            <table class="table table-bordered table-striped">
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($retailerAccType->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Name') ?></th>
                    <td><?= h($retailerAccType->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('No. Of Users') ?></th>
                    <td><?= $this->Number->format($retailerAccType->num_of_users) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('No. Of Warehouses') ?></th>
                    <td><?= $this->Number->format($retailerAccType->num_of_warehouses) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('No. Of Stores') ?></th>
                    <td><?= $this->Number->format($retailerAccType->num_of_stores) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('No. Of Products') ?></th>
                    <td><?= $this->Number->format($retailerAccType->num_of_products) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= $this->Time->format(h($retailerAccType->created), 'd MMM YYYY, HH:mm') ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= $this->Time->format(h($retailerAccType->modified), 'd MMM YYYY, HH:mm') ?></td>
                </tr>
            </table>
        </div>
      </div>
    </div>
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Related Retailers') ?></h3>
        </div>
        <div class="box-body">
            <div class="related">
                <?php if (!empty($retailerAccType->retailers)): ?>
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <!--<th scope="col"><?= __('Id') ?></th>-->
                        <th scope="col"><?= __('Retailer Name') ?></th>
                        <!--<th scope="col"><?= __('Retailer Desc') ?></th>
                        <th scope="col"><?= __('Account Status') ?></th>
                        <th scope="col"><?= __('Payment Term') ?></th>-->
                        <th scope="col"><?= __('Retailer Email') ?></th>
                        <th scope="col"><?= __('Contact') ?></th>
                        <!--<th scope="col"><?= __('Address') ?></th>
                        <th scope="col"><?= __('Contract Start Date') ?></th>
                        <th scope="col"><?= __('Contract End Date') ?></th>
                        <th scope="col"><?= __('Num Of Users') ?></th>
                        <th scope="col"><?= __('Num Of Warehouses') ?></th>
                        <th scope="col"><?= __('Num Of Stores') ?></th>
                        <th scope="col"><?= __('Num Of Product Types') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col"><?= __('Modified') ?></th>
                        <th scope="col"><?= __('Retailer Acc Type Id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>-->
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($retailerAccType->retailers as $retailers): ?>
                    <tr>
                        <!--<td><?= h($retailers->id) ?></td>-->
                        <td>
                            <?= $this->Html->link(__(h($retailers->retailer_name)), ['controller' => 'Retailers', 'action' => 'view', $retailers->id], ['title' => 'View Retailer Details']) ?>
                        </td>
                        <!--<td><?= h($retailers->retailer_desc) ?></td>
                        <td><?= h($retailers->account_status) ?></td>
                        <td><?= h($retailers->payment_term) ?></td>-->
                        <td><?= $this->Text->autoLinkEmails(h($retailers->retailer_email), ['title' => 'Email']) ?></td>
                        <td>
                            <a href="tel:+<?= h($retailers->contact) ?>" title="Call Contact">
                                <?= h($retailers->contact) ?>
                            </a>
                        </td>
                        <!--<td><?= h($retailers->address) ?></td>
                        <td><?= h($retailers->contract_start_date) ?></td>
                        <td><?= h($retailers->contract_end_date) ?></td>
                        <td><?= h($retailers->num_of_users) ?></td>
                        <td><?= h($retailers->num_of_warehouses) ?></td>
                        <td><?= h($retailers->num_of_stores) ?></td>
                        <td><?= h($retailers->num_of_product_types) ?></td>
                        <td><?= h($retailers->created) ?></td>
                        <td><?= h($retailers->modified) ?></td>
                        <td><?= h($retailers->retailer_acc_type_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Retailers', 'action' => 'view', $retailers->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Retailers', 'action' => 'edit', $retailers->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Retailers', 'action' => 'delete', $retailers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailers->id)]) ?>
                        </td>-->
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <?php endif; ?>
            </div>
          </div>
        </div>
    </div>
  </div>
</section>
