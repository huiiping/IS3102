<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('Announcements') );
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Announcements'), ['controller' => 'Announcements', 'action' => 'index']);

?>
<?= $this->Element('intrasysLeftSideBar'); ?>

<!-- Main Content -->
<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
  </section>
  <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= h($announcement->title) ?></h3>
              <div class="pull-right">
                <?= $this->Html->link(__('Edit System Announcement'), ['action' => 'edit', $announcement->id]) ?>
              </div>
            </div>
            <div class="box-body">

                <table class="vertical-table">
                    <tr>
                        <th scope="row"><?= __('Title') ?></th>
                        <td><?= h($announcement->title) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Message') ?></th>
                        <td><?= h($announcement->message) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Remarks') ?></th>
                        <td><?= h($announcement->remarks) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('ID') ?></th>
                        <td><?= $this->Number->format($announcement->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= $this->Time->format(h($announcement->created), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= $this->Time->format(h($announcement->modified), 'd MMM YYYY, hh:mm') ?></td>
                    </tr>
                </table>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>

