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
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Chat History') ?></h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('sender_id') ?></th>
                        <th scope="col"><?= __('Content') ?></th>
                        <th scope="col"><?= __('Attachments') ?></th>
                        <th scope="col" class="actions"><?= __('Date') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($msgs as $message): ?>
                    <tr>
                        <td><?= h($message->sender_id) ?></td>
                        <td><?= h($message->message) ?></td>
                        <td><?= 'file '.$message->id ?>
                        <td><?= $this->Time->format(h($message->date_created), 'd MMM YYYY, hh:mm') ?></td>
                        <td class="actions">
                          <?= $this->Html->link(__('Edit |'), ['controller' => 'Messages', 'action' => 'edit', $message->id]) ?>
                          <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>

              <!-- Paginator 
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
              <!-- End of paginator -->
                
                <!-- Reply Function -->
                <div class="box-body">
                  <form action="http://localhost/IS3102_Final/messages/add" method="post">
                    <fieldset>
                        <?php
                            echo $this->Form->hidden('title');
                            echo $this->Form->input('start_date', [
                                  'type' => 'datetime-local',
                                  'label' => 'Start Date (GMT)',
                                  'selected' => '0000:00:00 00:00:00']);
                            echo $this->Form->input('message', ['type' => 'text']);
                            echo $this->Form->hidden('status', ['dafult' => false]);
                            echo $this->Form->hidden('reference');
                            $session = $this->request->session();
                            echo $this->Form->hidden('sender_id', ['value'=>$session->read('retailer_employee_id')]);
                            echo $this->Form->input('retailer_employees._ids', ['options' => $reciever]);
                        ?>
                    </fieldset>
                      <br>
                    <!-- Attachment from desktop -->
                    <span class="btn green fileinput-button">
                      <i class="fa fa-plus fa fa-white"></i>
                      <span>Attachment</span>
                      <input type="file" name="files[]" multiple="">
                    </span>
                    <!-- Attachment from system -->
                    <span class="btn green fileinput-button">
                      <i class="fa fa-plus fa fa-white"></i>
                      <span>File</span>
                      <input type="file" name="files[]" multiple="">
                    </span>
                    <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
                  </form>
                </div>
                <!-- End of reply function -->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>


