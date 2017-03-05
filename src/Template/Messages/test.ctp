<?= $this->Html->css('messages.css') ?>
<?= $this->Element('retailerLeftSideBar'); ?>
<?php $session = $this->request->session(); ?>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

<div class="content-wrapper">
    <section class="content">
      <div class="mail-box">
        <aside class="sm-side">
          <div class="user-head">
            <div class="user-name">
            <!-- New Chat Button -->
            <form action="http://localhost/IS3102_Final/messages/add" method="post">
             <span class="btn green fileinput-button">
                <i class="fa fa-plus fa fa-white"></i>
                <span>New Chat</span>
              </span>
            <!-- New Group Button -->
              <span class="btn green fileinput-button">
                <i class="fa fa-plus fa fa-white"></i>
                <span>New Group</span>
                <input action="http://localhost/IS3102_Final/test/">
              </span>
              </form>
            </div>
          </div>
          <div class="inbox-body">
            <h4>Current Chats</h4>
          </div>

            <table class="table table-inbox table-hover">
                <?php if(isset($employees)) : ?>
                <tbody>
                      <?php foreach ($employees as $employee): ?>
                      <tr>
                          <td class="actions">
                            <?= $this->Html->link(__(h($employee->first_name).' '.h($employee->last_name)), ['action' => 'test', $employee->id]) ?>
                          </td>
                      </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
                <?php else : ?>
                    <h3>You do not have any current chats</h3>
                <?php endif; ?>
              </table>

        </aside>
        <aside class="lg-side">
          <div class="inbox-head">
            <h4>Chat Name</h4>
          </div>
          <div class="inbox-body">
            <div class="mail-option">
              <table class="table table-inbox table-hover">
                <?php if(!empty($msgs)) : ?>
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
                        <td><?= $this->Html->link(__(h($message->attachment)), ['controller' => h($message->attachment), 'action' => 'view', h($message->attachmentID)]) ?></td>
                        <td><?= $this->Time->format(h($message->date_created), 'd MMM YYYY, hh:mm') ?></td>
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
                  <form action="http://localhost/IS3102_Final/messages/add" method="post">
                    <fieldset>
                        <?php
                            //echo $this->Form->hidden('title'); 
                            echo $this->Form->input('start_date', [
                                  'type' => 'datetime-local',
                                  'label' => 'Date Created (GMT)',
                                  'selected' => '0000:00:00 00:00:00']);
                            echo $this->Form->input('message', ['type' => 'text']);
                            echo $this->Form->hidden('status', ['dafult' => false]);
                            if (isset($attachment) && isset($attachmentID)) {
                              echo $this->Form->input('attachment', ['value' => $attachment]);
                              echo $this->Form->input('attachmentID', ['value' => $attachmentID]);
                            }
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
                    <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
                  </form>
                </div>
                <!-- End of reply function -->

        </aside>
      </div>
    </section>
  </div>
</div>