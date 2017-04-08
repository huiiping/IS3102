<?= $this->Html->css('messages.css') ?>
<?= $this->Element('retailerLeftSideBar'); ?>
<?php $session = $this->request->session(); ?>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

<section class="content">
  <div class="mail-box">
    <aside class="sm-side">
      <div class="user-head">
        <div class="user-name">
          <!-- New Chat Button -->
          <a href="http://localhost/IS3102_Final/messages/index/0">
           <span class="btn green fileinput-button">
            <i class="fa fa-plus fa fa-white"></i>
            <span>New Chat</span>
          </span>
        </a>
      </div>
    </div>
    <div class="inbox-body">
      <h4>Current Chats</h4>
    </div>
    <!-- Active Chats -->
    <table class="table table-inbox table-hover">
      <?php if(isset($employees)) : ?>
        <tbody>
          <?php foreach ($employees as $employee): ?>
            <tr>
              <td class="actions">
                <?= $this->Html->link(__(h($employee->first_name).' '.h($employee->last_name)), ['action' => 'index', $employee->id]) ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </table>

</aside>
<aside class="lg-side">

  <!-- Chat Name -->
  <div class="inbox-head">
    <?php if($receiver->count() == 1) : ?>
      <?php foreach ($chatName as $employee): ?>
        <h4><?= (h($employee->first_name).' '.h($employee->last_name)) ?></h4>
      <?php endforeach; ?>
    <?php else : ?>
      <h4>New Chat</h4>
    <?php endif; ?>
  </div>
  <div class="inbox-body">
    <div class="mail-option">

      <?php if(!empty($msg)) : ?>
        <!-- Search Function -->
        <table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <?php echo $this->Form->create($msgs);?>
            <th width="10"></th>
            <th scope="col"><?= $this->Form->input(('mess'), ['label' => 'Content']); ?></th>
            <th width="30"></th>
            <th scope="col" class="actions"><?= $this->Form->submit(__('Search'), ['class'=>'btn btn-default btn-flat']); ?></th>
            <th width="10"></th>
            <?php echo $this->Form->end();?>
          </tr>
        </table>

        <!-- Chat History -->
        <table class="table table-inbox table-hover">
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
            <?php foreach ($msg as $message): ?>
              <tr>
                <td><?= h($message->sender_id) ?></td>
                <td><?= h($message->message) ?></td>
                <td><?= $this->Html->link(__(h($message->attachment)), ['controller' => h($message->attachment), 'action' => 'view', h($message->attachmentID)]) ?></td>
                <td><?= $this->Time->format(h($message->modified), 'd MMM YYYY, hh:mm') ?></td>
                <td class="actions">
                  <?= $this->Html->link(__('Edit |'), ['controller' => 'Messages', 'action' => 'edit', $message->id]) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]) ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        <?php endif; ?>
      </table>
    </div>

    <!-- Reply Function -->
    <div class="box-body">
      <form action="/IS3102_Final/messages/add" method="post">
        <fieldset>
          <?php
          echo $this->Form->input('message', ['type' => 'text']);
          echo $this->Form->hidden('status', ['default' => false]);
          if (isset($attachment) && isset($attachmentID)) {
            echo $this->Form->input('attachment', ['value' => $attachment]);
            echo $this->Form->input('attachmentID', ['value' => $attachmentID]);
          }
          echo $this->Form->hidden('sender_id', ['value'=>$session->read('retailer_employee_id')]);
          
          if(sizeof($receiver->toArray()) > 1)   {
            echo $this->Form->input('retailer_employees._ids', ['options' => $receiver]);
          }
          else{
          $receiverId = $receiver->first();
          echo $this->Form->hidden('retailer_employees._ids[]', ['value'=>$receiverId]);
          }
          ?>
          
        </fieldset>
        <br>
        <!-- Attachment from desktop -->
        <span class="btn green fileinput-button">
          <i class="fa fa-plus fa fa-white"></i>
          <span>Attachment</span>
          <input type="file" name="file">
        </span>
        <?= $this->Form->button(__('Send'), ['class'=>'btn btn-default btn-flat']); ?>
      </form>
    </div>
    <!-- End of reply function -->

  </div>
</aside>
</div>
</section>

