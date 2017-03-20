<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('Promotions') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Promotions'));

?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Promotions') ?></h3>
      </div>
      <div class="box-body">
        <div class="pull-right">
            <a class="btn btn-default btn-block" title="Create New Promotion" href="/IS3102_Final/promotions/add" >Create New Promotion</a>
        </div>
        <br>
        <!--<h3><?= __('Search') ?></h3>-->
        <form method="post" accept-charset="utf-8" action="/IS3102_Final/promotions">
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
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort(('promo_name'), ['label' => 'Title']) ?></th>
            <th scope="col"><?= $this->Paginator->sort(('promo_desc'), ['label' => 'Description']) ?></th>
            <th scope="col"><?= $this->Paginator->sort(('retailer_employee_id'), ['label' => 'Created By']) ?></th>
            <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
            <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                        <!--<th scope="col"><?= $this->Paginator->sort('discount_rate') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('credit_card_type') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>-->
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($promotions as $promotion): ?>
                        <tr>
                            <td style="max-width: 150px;"><?= $this->Number->format($promotion->id) ?></td>
                            <td style="max-width: 150px;"><?= $this->Html->link(__(h($promotion->promo_name)), ['title' => 'View Product Details']) ?></td>
                            <td style="max-width: 150px;"><?= h($promotion->promo_desc) ?></td>
                            <td style="max-width: 150px;"><?= $promotion->has('retailer_employee') ? $this->Html->link($promotion->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $promotion->retailer_employee->id]) : '' ?></td>
                            <td style="max-width: 150px;"><?= $this->Time->format(h($promotion->start_date), 'd MMM YYYY, hh:mm') ?></td>
                            <td style="max-width: 150px;"><?= $this->Time->format(h($promotion->end_date), 'd MMM YYYY, hh:mm') ?></td>
                        <!--<td><?= $this->Number->format($promotion->discount_rate) ?></td>
                        <td><?= h($promotion->credit_card_type) ?></td>
                        <td><?= $promotion->has('retailer_employee') ? $this->Html->link($promotion->retailer_employee->id, ['controller' => 'RetailerEmployees', 'action' => 'view', $promotion->retailer_employee->id]) : '' ?></td>-->
                        <td><a href="/IS3102_Final/promotions/edit/<?=$promotion->id?>"><i class="fa fa-edit" title="Edit Promotions Details"></i></a>&nbsp<?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Promotion')), array('action' => 'delete', $promotion->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $promotion->id))) ?></td>
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

