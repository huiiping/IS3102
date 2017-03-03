<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Element('retailerLeftSideBar'); ?>
<?= $this->Html->css('messages.css') ?>
<?php $session = $this->request->session(); ?>
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
                        <th scope="col"><?= $this->Paginator->sort('date_created') ?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($messages as $message): ?>
                    <tr>
                        <td><?= h($message->sender_id) ?></td>
                        <td><?= h($message->message) ?></td>
                        <td><?= $this->Time->format(h($message->date_created), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
                  
                  <form action="http://localhost/IS3102_Final/messages/add" method="post">
                      <label class="control-label">Enter message:</label>
                      <input class="control-label" type="text" default="" name="message">
                        <span class="btn green fileinput-button">
                          <i class="fa fa-plus fa fa-white"></i>
                          <span>Attachment</span>
                          <input type="file" name="files[]" multiple="">
                        </span>
                      <input type="hidden" name="sender_id" value="<?= $session->read('retailer_employee_id') ?>">
                      <!-- <input type="hidden" name="retailer_employee_id" value="<?= $session->read('reciever') ?>">-->
                      <button class="btn btn-send" type="submit">Send</button>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>


