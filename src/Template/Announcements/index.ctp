<?php
$this->assign('title', __('Announcements') .'/'. __('Index') );
$this->Html->addCrumb(__('Intrasys'), ['controller' => 'Pages', 'action' => 'intrasys']);
$this->Html->addCrumb(__('Announcements'));
?>
<?= $this->Element('intrasysLeftSideBar'); ?>

<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= __('System Announcements') ?></h3>
          </div>
          <div class="box-body">
            <div class="pull-right">
              <a class="btn btn-success btn-block" title="Create New Announcement" href="/IS3102_Final/announcements/add" >Create New Announcement</a>
            </div>
            <form method="post" accept-charset="utf-8" action="/IS3102_Final/announcements">
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
                      <input class = "form-control" type="submit" class="btn btn-success bth-flat" value="Search">
                    </div>
                  </th>
                </tr>
              </table>
            </form>
            <br>
            <table class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <!--<th scope="col"><?= $this->Paginator->sort(('id'), ['label' => 'ID']) ?></th>-->
                      <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('message') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('remarks') ?></th>
                      <!--<th scope="col"><?= $this->Paginator->sort('created') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('modified') ?></th>-->
                      <th scope="col" class="actions"><?= __('Actions') ?></th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($announcements as $announcement): ?>
                  <tr>
                      <!--<td><?= $this->Number->format($announcement->id) ?></td>-->
                      <td style="max-width: 150px; overflow: hidden;"><?= $this->Html->link(__($announcement->title), ['action' => 'view', $announcement->id], ['title' => 'View Announcement Details']) ?></td>
                      <td style="max-width: 150px; overflow: hidden;"><?php echo $announcement->message ?></td>
                      <td style="max-width: 150px; overflow: hidden;"><?= h($announcement->remarks) ?></td>
                      <!--<td><?= $this->Time->format(h($announcement->created), 'd MMM YYYY, hh:mm') ?></td>
                      <td><?= $this->Time->format(h($announcement->modified), 'd MMM YYYY, hh:mm') ?></td>
                      <td class="actions">
                          <?= $this->Html->link(__('View | '), ['action' => 'view', $announcement->id]) ?>
                          <?= $this->Html->link(__('Edit | '), ['action' => 'edit', $announcement->id]) ?>
                          <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $announcement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcement->id)]) ?>
                      </td>-->
                      <td>
                        <a href="/IS3102_Final/announcements/edit/<?=$announcement->id?>">
                          <i class="fa fa-edit" title="Edit Announcement Details"></i></a>&nbsp
                        <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Announcement')), array('action' => 'delete', $announcement->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $announcement->id))) ?>
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
