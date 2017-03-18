<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('RFQ') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('RFQ'), ['controller' => 'Rfqs', 'action' => 'index']);

?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('RFQs') ?></h3>
        </div>
        <div class="box-body">
        <!--<legend><h4><?= __('Search') ?></h4></legend>-->
          <form method="post" accept-charset="utf-8" action="/IS3102_Final/rfqs">
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
              <th scope="col"><?= $this->Paginator->sort('title') ?></th>
              <th scope="col"><?= $this->Paginator->sort('retailer_employee_id', ['Label' => 'Created By']) ?></th>
              <th scope="col"><?= $this->Paginator->sort('modified', ['Label' => 'Last Modified On']) ?></th>
              <th scope="col"><?= $this->Paginator->sort('created', ['Label' => 'Created On']) ?></th>
              <th scope="col"><?= $this->Paginator->sort('end_date', ['Label' => 'Status']) ?></th>
              <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rfqs as $rfq): ?>
              <tr>
                <td style="max-width: 150px;"><?= $this->Number->format($rfq->id) ?></td>
                <td style="max-width: 150px;"><?= $this->Html->link(__(h($rfq->title)), ['action' => 'view', $rfq->id], ['title' => $rfq->message])?></td>
                <td style="max-width: 150px;"><?= $rfq->has('retailer_employee') ? $this->Html->link($rfq->retailer_employee->first_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $rfq->retailer_employee->id]) : '' ?></td>
                <td style="max-width: 150px;"><?= h($rfq->modified) ?></td>
                <td style="max-width: 150px;"><?= h($rfq->created) ?></td>
                <?php

                  if($now>=$rfq->end_date) {

                ?>

                  <td style="max-width: 150px;" bgcolor="#b20707" align="center">
                    <font color="white">CLOSED</font>
                  </td>

                <?php } else {

                ?>
                  <td style="max-width: 150px;" bgcolor="green" align="center">
                    <font color="white">OPEN</font>
                  </td>

                <?php } ?>


                <td><a href="/IS3102_Final/rfqs/edit/<?=$rfq->id?>"><i class="fa fa-edit" title="Edit RFQ"></i></a>&nbsp<?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete RFQ')), array('action' => 'delete', $rfq->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $rfq->id))) ?></td>
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
                   
