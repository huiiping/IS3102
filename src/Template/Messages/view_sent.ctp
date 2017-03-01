<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Element('retailerLeftSideBar'); ?>
<?= $this->Html->css('messages.css') ?>
<!-- Main Content -->
<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
  </section>
  <!-- Inbox Messages -->
  <section class="content">
    <a href="#myModal" data-toggle="modal" title="Compose" class="btn btn-default btn-flat">Compose</a>
    <?= $this->Html->link(__('Inbox'), ['controller' => 'Messages', 'action' => 'index', 'class'=>'btn btn-default btn-flat']); ?>
    <?= $this->Html->link(__('Sent'), ['controller' => 'Messages', 'action' => 'viewSent', 'class'=>'btn btn-default btn-flat']); ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Sent Messages') ?></h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('date_created') ?></th>
                        <!--<th scope="col"><?= $this->Paginator->sort('status') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('reference_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('sender_id') ?></th>-->
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sentMessages as $message): ?>
                    <tr>
                        <td><?= $this->Number->format($message->id) ?></td>
                        <td><?= h($message->title) ?></td>
                        <td><?= $this->Time->format(h($message->date_created), 'd MMM YYYY, hh:mm') ?></td>
                        <!--<td><?= h($message->status) ?></td>
                        <td><?= h($message->reference_id) ?></td>
                        <td><?= $this->Number->format($message->sender_id) ?></td>-->
                        <td class="actions">
                            <?= $this->Html->link(__('View |'), ['action' => 'view', $message->id]) ?>
                            <?= $this->Html->link(__('Edit |'), ['action' => 'edit', $message->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]) ?>
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

  <!-- Modal -->
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Compose</h4>
            </div>
            <div class="modal-body">
              <form role="form" class="form-horizontal">
                <div class="form-group">
                  <label class="col-lg-2 control-label">To</label>
                    <div class="col-lg-10">
                      <input type="text" placeholder="" id="inputEmail1" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Cc / Bcc</label>
                    <div class="col-lg-10">
                      <input type="text" placeholder="" id="cc" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Subject</label>
                    <div class="col-lg-10">
                      <input type="text" placeholder="" id="inputPassword1" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Message</label>
                    <div class="col-lg-10">
                      <textarea rows="10" cols="30" class="form-control" id="" name=""></textarea>
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <span class="btn green fileinput-button">
                    <i class="fa fa-plus fa fa-white"></i>
                    <span>Attachment</span>
                      <input type="file" name="files[]" multiple="">
                    </span>
                    <button class="btn btn-send" type="submit">Send</button>
                  </div>
                </div>
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
</div>


