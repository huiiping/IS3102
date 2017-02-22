<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Element('intrasysLeftSideBar'); ?>

<!-- Main Content -->
<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
  </section>
  <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= h($retailer->company_name) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit Retailer'), ['action' => 'edit', $retailer->id]) ?>
              </div>
            </div>
            <div class="box-body">
    
                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Company Name') ?></th>
                        <td><?= h($retailer->company_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('First Name') ?></th>
                        <td><?= h($retailer->first_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Last Name') ?></th>
                        <td><?= h($retailer->last_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Company Description') ?></th>
                        <td>
                            <?= $this->Text->autoParagraph(h($retailer->company_desc)); ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Account Status') ?></th>
                        <td><?= h($retailer->account_status) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Payment Term') ?></th>
                        <td><?= h($retailer->payment_term) ?></td>
                    </tr>
                    <!--<tr>
                        <th scope="row"><?= __('Username') ?></th>
                        <td><?= h($retailer->username) ?></td>
                    </tr>-->
                    <tr>
                        <th scope="row"><?= __('Email') ?></th>
                        <td><?= h($retailer->email) ?></td>
                    </tr>
                    <!--<tr>
                        <th scope="row"><?= __('Password') ?></th>
                        <td><?= h($retailer->password) ?></td>
                    </tr>-->
                    <tr>
                        <th scope="row"><?= __('Address') ?></th>
                        <td><?= h($retailer->address) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Contact') ?></th>
                        <td><?= h($retailer->contact) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Retailer Acc Type') ?></th>
                        <td>
                            <?= $retailer->has('retailer_acc_type') ? $this->Html->link($retailer->retailer_acc_type->name, ['controller' => 'RetailerAccTypes', 'action' => 'view', $retailer->retailer_acc_type->id]) : '' ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Loyalty Points') ?></th>
                        <td><?= $this->Number->format($retailer->loyalty_points) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Contract Start Date') ?></th>
                        <td><?= $this->Time->format(h($retailer->contract_start_date), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Contract End Date') ?></th>
                        <td><?= $this->Time->format(h($retailer->contract_end_date), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($retailer->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= $this->Time->format(h($retailer->created), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= $this->Time->format(h($retailer->modified), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                </table>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
