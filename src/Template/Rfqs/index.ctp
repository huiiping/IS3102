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
        <div class="pull-right">
            <a class="btn btn-default btn-block" title="Create New FRQ" href="/IS3102_Final/Rfqs/add" >Create New FRQ</a>
          </div>
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
              <th scope="col"><?= $this->Paginator->sort('created', ['Label' => 'Opening Date']) ?></th>
              <th scope="col"><?= $this->Paginator->sort('end_date', ['Label' => 'Closing Date']) ?></th>
              <th scope="col"><?= $this->Paginator->sort('retailer_employee_id', ['Label' => 'Created By']) ?></th>
              <th scope="col"><?= $this->Paginator->sort('modified', ['Label' => 'Last Modified On']) ?></th>
              
              <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rfqs as $rfq): ?>

              <?php 
                if($now>=$rfq->end_date) {
                  $color = '#ff9889';
                } else {
                  $color = '';
                }

              ?>

              <tr>
                <td bgcolor="<?= $color ?>" style="max-width: 150px;"><?= $this->Number->format($rfq->id) ?></td>
                <td bgcolor="<?= $color ?>" style="max-width: 150px;"><?= $this->Html->link(__(h($rfq->title)), ['action' => 'view', $rfq->id], ['title' => $rfq->message])?></td>                
                <td bgcolor="<?= $color ?>" style="max-width: 150px;"><?= h($rfq->created) ?></td>
                <td bgcolor="<?= $color ?>" style="max-width: 150px;"><?= h($rfq->end_date) ?></td>
                <td bgcolor="<?= $color ?>" style="max-width: 150px;"><?= $rfq->has('retailer_employee') ? $this->Html->link($rfq->retailer_employee->first_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $rfq->retailer_employee->id]) : '' ?></td>
                <td bgcolor="<?= $color ?>" style="max-width: 150px;"><?= h($rfq->modified) ?></td>
                <td bgcolor="<?= $color ?>"><a href="/IS3102_Final/quotations/index/<?=$rfq->id?>"><i class="fa fa-sticky-note-o" title="View Quotations"></i></a><!-- &nbsp<a href="/IS3102_Final/rfqs/edit/<?=$rfq->id?>"><i class="fa fa-edit" title="Edit RFQ"></i></a> -->&nbsp<?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete RFQ')), array('action' => 'delete', $rfq->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $rfq->id))) ?></td>
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
                   
