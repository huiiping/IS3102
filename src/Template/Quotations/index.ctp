<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
  $this->assign('title', __('Quotation') . '/' . __('Index'));
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Quotations') ?></h3>
        </div>
        <div class="box-body">
        <!--<legend><h4><?= __('Search') ?></h4></legend>-->
          <form method="post" accept-charset="utf-8" action="/IS3102_Final/quotations">
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
              <th scope="col"><?= $this->Paginator->sort('fileName') ?></th>
              <th scope="col"><?= $this->Paginator->sort('status') ?></th>
              <th scope="col"><?= $this->Paginator->sort('created') ?></th>
              <th scope="col" class="actions"><?= __('Actions') ?></th>
          </tr>
            </thead>
            <tbody>
            <?php foreach ($quotations as $quotation): ?>
              <tr>
                <td style="max-width: 150px;"><?= $this->Number->format($quotation->id) ?></td>
                <td style="max-width: 150px;"><?= $this->Html->link(__(h($quotation->fileName)), ['action' => 'view', $quotation->id], ['title' => $quotation->comments])?></td>
                <td><embed src="<?= $quotation->filePath.$quotation->fileName ?>" width="220px" height="150px"></td>
                <td style="max-width: 150px;"><?= h($rfq->created) ?></td>
                <td><a href="/IS3102_Final/quotations/edit/<?=$quotation->id?>"><i class="fa fa-edit" title="Edit Quotation"></i></a>&nbsp<?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Quotation')), array('action' => 'delete', $quotation->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $quotation->id))) ?></td>
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
                   
