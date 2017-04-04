<?php
$this->assign('title', __('Customer Membership Tiers') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Customer Membership Tiers'));
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Customer Membership Tiers') ?></h3>
      </div>
      <div class="box-body">
        <div class="pull-right">
            <a class="btn btn-success btn-block" title="Create New Customer Membership Tier" href="/IS3102_Final/cust-membership-tiers/add" >Create New Customer Membership Tier</a>
        </div>
        <br>
        <!--<legend><h4><?= __('Search') ?></h4></legend>-->
        <form method="post" accept-charset="utf-8" action="/IS3102_Final/cust-membership-tiers">
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
<?php foreach ($custMembershipTiers as $custMembershipTier): ?>

    <div class="col-xs-4">
        <div class="box box-primary" style="height: 550px;">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="/IS3102_Final/img/user2-160x160.jpg" alt="User profile picture">

            <h3 class="profile-username text-center"><?= $this->Html->link(__($custMembershipTier->tier_name), ['action' => 'view', $custMembershipTier->id], ['title' => 'View Customer Membership Tier Details']) ?></h3>

            <ul class="list-group list-group-unbordered"><br>

             <li class="list-group-item">
              <b><?= __('Validity Period') ?></b> 
              <div class="pull-right">                    
                  <?= $this->Number->format($custMembershipTier->validity_period) ?>
              </div>
          </li>

          <li class="list-group-item">
              <b><?= __('Minimum Spending') ?></b> 
              <div class="pull-right">                    
               <?= h($custMembershipTier->min_spending) ?>
           </div>
       </li>

       <li class="list-group-item">
          <b><?= __('Membership Fee') ?></b> 
          <div class="pull-right">                    
            <?= h($custMembershipTier->membership_fee) ?>
        </div>
    </li>

    <li class="list-group-item">
      <b><?= __('Membership Points') ?></b> 
      <div class="pull-right">                    
        <?= $this->Number->format($custMembershipTier->membership_pts) ?>
    </div>
</li>


<li class="list-group-item">
  <b><?= __('Redemption Points') ?></b> 
  <div class="pull-right">                    
    <?= $this->Number->format($custMembershipTier->redemption_pts) ?>
</div>
</li>

<li class="list-group-item">
  <b><?= __('Discount Rate') ?></b> 
  <div class="pull-right">                    
    <?= h($custMembershipTier->discount_rate) ?>
</div>
</li>

<li class="list-group-item">
  <b><?= __('Birthday Rate') ?></b> 
  <div class="pull-right">                    
    <?= h($custMembershipTier->birthday_rate) ?>
</div><br><br>
</li>
</ul>
</div>

<td>
    <div style="text-align: center">
      <a href="/IS3102_Final/cust-membership-tiers/view/<?=$custMembershipTier->id?>">
        <i class="fa fa-bars" style="font-size:24px;" title="View Customer Membership Tier Details"></i></a>&nbsp
        <a href="/IS3102_Final/cust-membership-tiers/edit/<?=$custMembershipTier->id?>">
          <i class="fa fa-edit" style="font-size:24px;" title="Edit Customer Membership Tier Details"></i></a>&nbsp
          <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash ', 'style' => 'font-size: 24px', 'title' => 'Delete Customer Membership Tier')), array('action' => 'delete', $custMembershipTier->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $custMembershipTier->id))) ?>
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


