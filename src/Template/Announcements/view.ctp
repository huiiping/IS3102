<?php
$this->assign('title', __('Announcement' .'/'. 'View') );
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Announcements'), ['controller' => 'Announcements', 'action' => 'index']);
$this->Html->addCrumb(__('View Announcement'));
?>

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= h($announcement->title) ?></h3>
          </div>
          <div class="box-body">
            <div class="pull-right">
              <a class="btn btn-default btn-block" title="Edit Announcement" href="/IS3102_Final/announcements/edit/<?=$announcement->id?>" >Edit Announcement</a>
            </div><br><br><br>

              <table class="table table-bordered table-striped">
                  <tr>
                      <th scope="row"><?= __('ID') ?></th>
                      <td><?= $this->Number->format($announcement->id) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Title') ?></th>
                      <td><?= h($announcement->title) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Message') ?></th>
                      <td><?php echo $announcement->message ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Remarks') ?></th>
                      <td><?= h($announcement->remarks) ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Created') ?></th>
                      <td><?= $this->Time->format(h($announcement->created), 'd MMM YYYY, HH:mm') ?></td>
                  </tr>
                  <tr>
                      <th scope="row"><?= __('Modified') ?></th>
                      <td><?= $this->Time->format(h($announcement->modified), 'd MMM YYYY, HH:mm') ?></td>
                  </tr>
              </table><br><br>
          </div>
        </div>
      </div>
    </div>
</section>
