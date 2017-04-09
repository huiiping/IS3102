<?php
$this->assign('title', __('Section') . '/' . __('View'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Sections'), ['controller' => 'Sections', 'action' => 'index']);
$this->Html->addCrumb(__('View Section'));
?>

<section class="content" style="min-height: 550px">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= $section->sec_name ?></h3>
          </div>
          <div class="box-body">
          <div class="pull-right">
            <a class="btn btn-success btn-block" title="Edit Section Details" href="/IS3102_Final/sections/edit/<?=$section->id?>">Edit Section</a>
          </div>
          <br><br><br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($section->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Section Name') ?></th>
                    <td><?= h($section->sec_name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Location') ?></th>
                    <td><?= $section->has('location') ? $this->Html->link($section->location->name, ['controller' => 'Locations', 'action' => 'view', $section->location->id], ['title' => 'View Location Details']) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Space Limit') ?></th>
                    <td><?= $this->Number->format($section->space_limit) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Available Space') ?></th>
                    <td><?= $this->Number->format($section->available_space) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Used Space') ?></th>
                    <td><?= $this->Number->format($section->space_limit - $section->available_space) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Reserve Space') ?></th>
                    <td><?= $this->Number->format($section->reserve) ?></td>
                </tr>
            </table><br>
        </div>
      </div>
    </div>
  </div>
</section>
