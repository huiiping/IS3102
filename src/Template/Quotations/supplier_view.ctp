<?php
$this->assign('title', __('Quotation' .'/'. 'View') );
$this->Html->addCrumb(__('Quotations'), ['controller' => 'Quotations', 'action' => 'supplierIndex']);
$this->Html->addCrumb(__('View Quotation'));
?>

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">View Quotation ID: <?= $this->Number->format($quotation->id) ?></h3>
          </div>
          <div class="box-body">
            <div class="pull-right">
              <a class="btn btn-default btn-block" title="Edit Quotation" href="/IS3102_Final/quotations/supplier-edit/<?=$quotation->id?>" >Edit Quotation</a>
            </div><br><br><br>

              <table class="table table-bordered table-striped">
                  <tr>
                      <th scope="row"><?= __('ID') ?></th>
                      <td><?= $this->Number->format($quotation->id) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('For RFQ') ?></th>
                      <td><?= $this->Html->link(__(h($quotation->rfq->title)), ['controller' => 'rfqs', 'action' => 'View', $quotation->rfq->id])?> (ID: <?= $this->Number->format($quotation->rfq->id) ?>)</td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Submitted By') ?></th>
                      <td><?= h($quotation->supplier->supplier_name) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('File Name') ?></th>
                      <td><?= h($quotation->fileName) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Comments') ?></th>
                      <td><?= h($quotation->comments) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Status') ?></th>
                      <td><?= h($quotation->status) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Last Modified On') ?></th>
                      <td><?= h($quotation->modified) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Created On') ?></th>
                      <td><?= h($quotation->created) ?></td>
                  </tr>
              </table><br><br>
          </div>
        </div>
      </div>
    </div>
</section>
