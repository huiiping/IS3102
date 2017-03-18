<?php
$this->assign('title', __('Retailers') . '/' . __('Index'));
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Retailers'));
?>

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= __('Retailers') ?></h3>
          </div>
          <div class="box-body">
          <div class="pull-right">
            <a class="btn btn-default btn-block" title="Create New Retailer" href="/IS3102_Final/retailers/add" >Create New Retailer</a>
          </div>
          <form method="post" accept-charset="utf-8" action="/IS3102_Final/retailers">
              <table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                <tr>
                  <th width="10"></th>
                  <th scope="col">
                    <div class ="form-group">
                      <div class="input-group">
                        <label for="search"></label>&nbsp&nbsp&nbsp
                        <input class = "form-control" type="text" name="search" id="search" placeholder="Search">
                      </div>
                    </div>
                  </th>
                  <th width="30"></th>
                  <th scope="col" class ="form-group">
                    <div class ="submit">
                      <input class = "form-control" type="submit" class="btn btn-default bth-flat" value="Search">
                    </div>
                  </th>
                </tr>
              </table>
            </form>
            <br>
            <table class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <!--<th scope="col"><?= $this->Paginator->sort('id') ?></th>-->
                      <th scope="col"><?= $this->Paginator->sort('retailer_name') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('retailer_email') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('retailer_acc_type_id', ['label'=>'Retailer Account Type']) ?></th>
                      <th scope="col"><?= 'Loyalty Pts' ?></th>
                      <th scope="col"><?= $this->Paginator->sort('account_status') ?></th>
                      <!--<th scope="col" class="actions"><?= __('Actions') ?></th>-->
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($retailers as $retailer): ?>
                  <tr>
                      <!--<td><?= $this->Number->format($retailer->id) ?></td>-->
                      <td><?= $this->Html->link(__(h($retailer->retailer_name)), ['action' => 'view', $retailer->id], ['title' => 'View Retailer Details']) ?></td>
                      <td><?= $this->Text->autoLinkEmails(h($retailer->retailer_email), ['title' => 'Email']) ?></td>
                      <td>
                        <a href="tel:+<?= h($retailer->contact) ?>" title="Call Contact">
                          <?= h($retailer->contact) ?>
                        </a>
                      </td>
                      <td><?= h($retailer->account_status) ?></td>
                      <td><?= $retailer->has('retailer_acc_type') ? $this->Html->link($retailer->retailer_acc_type->name, ['controller' => 'RetailerAccTypes', 'action' => 'view', $retailer->retailer_acc_type->id], ['title' => 'View Account Type Details']) : '' ?></td>
                      <td>

                      <?php
                        $query = $retailerLoyaltyPoints
                                  ->find()
                                  ->select(['loyalty_pts','redemption_pts'])
                                  ->where(['retailer_id' => $retailer->id])
                                  ->toArray();
                        $total = 0;
                        foreach ($query as $row) {

                          if($row['loyalty_pts'] == null){

                            $total -= $row['redemption_pts'];
                          } else {

                            $total += $row['loyalty_pts'];
                          }                            
                        }
                        echo $this->Html->link($total, ['controller' => 'retailerLoyaltyPoints' , 'action' => 'view', $retailer->id], ['title' => 'View Loyalty Points Details']);
                      ?>
                        
                      </td>
                      <!--<td class="actions">
                          <?= $this->Html->link(__('View |'), ['action' => 'view', $retailer->id]) ?>
                          <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $retailer->id]) ?>
                          <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $retailer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailer->id)]) ?>
                      </td>-->
                      <td>
                        <a href="/IS3102_Final/retailers/edit/<?=$retailer->id?>">
                          <i class="fa fa-edit" title="Edit Retailer Details"></i></a>&nbsp
                        <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Retailer')), array('action' => 'delete', $retailer->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $retailer->id))) ?>
                      </td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
              </table>
              <div class="paginator">
                  <ul class="pagination">
                      <?= $this->Paginator->first('<< ' . __('first')) ?>
                      <?= $this->Paginator->prev('< ' . __('previous')) ?>
                      <?= $this->Paginator->numbers() ?>
                      <?= $this->Paginator->next(__('next') . ' >') ?>
                      <?= $this->Paginator->last(__('last') . ' >>') ?>
                  </ul>
                  <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
              </div>
          </div>
        </div>
      </div>
    </div>
</section>
