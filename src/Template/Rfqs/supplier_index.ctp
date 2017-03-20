<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('RFQ') . '/' . __('Index'));
$this->Html->addCrumb(__('Supplier'), ['controller' => 'Pages', 'action' => 'supplier']);
$this->Html->addCrumb(__('RFQ'), ['controller' => 'Rfqs', 'action' => 'supplierIndex']);

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
              <th scope="col"><?= $this->Paginator->sort('created', ['Label' => 'Created On']) ?></th>
              <th scope="col"><?= $this->Paginator->sort('end_date', ['Label' => 'Status']) ?></th>
            </tr>
            </thead>
            <tbody>
              <?php foreach ($rfqs as $rfq): ?>
                <tr>
                  <td style="max-width: 150px;"><?= $this->Number->format($rfq->id) ?></td>
                  <td style="max-width: 150px;"><?= $this->Html->link(__(h($rfq->title)), ['action' => 'view', $rfq->id], ['title' => $rfq->message])?></td>               
                  <td style="max-width: 150px;"><?= h($rfq->created) ?></td>
                  <?php

                    if($now>=$rfq->end_date) {

                  ?>

                    <td style="max-width: 150px;" bgcolor="#b20707" align="center">
                      <font color="white">CLOSED</font>
                    </td>

                  <?php } else {

                  ?>
                    <td style="max-width: 150px;">
                      <a class="btn btn-default btn-block" title="Submit Quotation Now" href="/IS3102_Final/quotations/supplier-add/<?= $rfq->id ?>" >Submit Quotation Now</a>
                    </td>

                  <?php } ?>

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
                   
