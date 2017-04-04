<?php
$this->assign('title', __('Retailer Employee') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Employees'));

?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Search Retailer Employees') ?></h3>
      </div>
      <div class="box-body">
        <div class="pull-right">
            <a class="btn btn-success btn-block" title="Create New Employee" href="/IS3102_Final/retailer-employees/add" >Create New Employee</a>
        </div>
        <br>
        <!--<legend><h4><?= __('Search') ?></h4></legend>-->
        <form method="post" accept-charset="utf-8" action="/IS3102_Final/retailer-employees">
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
              <input class="btn btn-primary btn-block" class = "form-control" type="submit" class="btn btn-default bth-flat" value="Search">
          </div>
      </th>
      <th width="10"></th>
      <th scope="col" class ="form-group">
          <div class ="submit">
              <button class="btn btn-default btn-block"><a class="reset_button" onclick="reset();" placeholder="Reset"><i class="fa fa-fw fa-undo"></i>Reset</a></button>
          </div>
      </th>
  </tr>
</table>
</form>

<br>
<?php 
foreach ($retailerEmployees as $retailerEmployee): 
    ?>
<div class="col-xs-4">
    <div class="box box-primary" style="height: 500px;">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="/IS3102_Final/img/user2-160x160.jpg" alt="User profile picture">

        <h3 class="profile-username text-center"><?= $this->Html->link(__(h($retailerEmployee->first_name.' '.$retailerEmployee->last_name)), ['action' => 'view', $retailerEmployee->id], ['title' => 'View Employee Details']) ?></h3>

        <?php if (!empty($retailerEmployee->retailer_employee_roles)): ?>
          <?php foreach ($retailerEmployee->retailer_employee_roles as $retailerEmployeeRoles): ?>
            <p class="text-muted text-center">
                <?= $this->Html->link(__(h($retailerEmployeeRoles->role_name)), ['controller' => 'RetailerEmployeeRoles', 'action' => 'view', $retailerEmployeeRoles->id], ['title' => 'View Employee Role Details']) ?>
            </p>
        <?php endforeach; ?>
    <?php endif; ?> 

    <ul class="list-group list-group-unbordered"><br>

     <li class="list-group-item">
      <b><?= __('Email') ?></b> 
      <div class="pull-right">                    
        <a href="mailto:<?= h($retailerEmployee->email) ?>" title="Email">
          <?= h($retailerEmployee->email) ?>
      </a>
  </div>
</li>

<li class="list-group-item">
  <b><?= __('Contact') ?></b> 
  <div class="pull-right">                    
    <a href="tel:+<?= h($retailerEmployee->contact) ?>" title="Call Contact">
      <?= h($retailerEmployee->contact) ?>
  </a>
</div>
</li>

<li class="list-group-item">
  <b><?= __('Address') ?></b> 
  <div class="pull-right">                    
    <?= h($retailerEmployee->address) ?>
</div>
</li>

<li class="list-group-item">
  <b><?= __('Location ID') ?></b> 
  <div class="pull-right">                    
    <?= $retailerEmployee->has('location') ? $this->Html->link($retailerEmployee->location->name, ['controller' => 'Locations', 'action' => 'view', $retailerEmployee->location->id],['title' => 'View Location Details']) : '' ?>
</div>
</li>

<li class="list-group-item">
    <b><?= __('Activation Status') ?></b> 
    <div class="pull-right">
        <?php if ($retailerEmployee->activation_status == 'Activated'): ?>
          <a class="btn btn-danger btn-block" title="Deactivate Employee" href="/IS3102_Final/retailer-employees/deactivateStatus/<?= $retailerEmployee->id ?>" >Deactivate</a>
      <?php else: ?>
          <a class="btn btn-success btn-block" title="Activate Employee" href="/IS3102_Final/retailer-employees/activateStatus/<?= $retailerEmployee->id ?>" >Activate</a>
      <?php endif; ?>
  </div><br><br>
</li>
</ul>
</div>

<td>
    <div style="text-align: center">
      <a href="/IS3102_Final/retailer-employees/view/<?=$retailerEmployee->id?>">
        <i class="fa fa-bars" style="font-size:24px;" title="View Retailer Employee Details"></i></a>&nbsp
        <a href="/IS3102_Final/retailer-employees/edit/<?=$retailerEmployee->id?>">
          <i class="fa fa-edit" style="font-size:24px;" title="Edit Retailer Employee Details"></i></a>&nbsp
          <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash ', 'style' => 'font-size: 24px', 'title' => 'Delete Retailer Employee')), array('action' => 'delete', $retailerEmployee->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $retailerEmployee->id))) ?>&nbsp
          <a href="/IS3102_Final/retailer-employees/manager_actions/<?= $retailerEmployee->id ?>">
              <i class="fa fa-users" style="font-size:20px;" title="Manager Actions"></i>
          </a> 
      </div>
  </td>

</div>
</div>
<?php endforeach; ?>
</div>
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

</section>

