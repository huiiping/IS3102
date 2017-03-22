<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('Retailer') . '/' . __('RetailerDetails'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Retailer Details'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('View'));
?>
<?= $this->Element('retailerLeftSideBar'); ?>

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
            <h3 class="profile-username"><?= 'About '.ucfirst(h($retailerDetail->retailer_name)) ?>&nbsp
              <a href="/IS3102_Final/retailer-details/edit/<?= $retailerDetail->retailerid ?>" title="Edit Details">
                  <i class="fa fa-edit"></i>
                </a>
              <div class="pull-right">
                <a href="mailto:<?= h($retailerDetail->retailer_email) ?>" title="email">
                  <i class="fa fa-envelope-o"></i>
                </a>&nbsp
                <a href="tel:+<?= h($retailerDetail->contact) ?>" title="contact">
                  <i class="fa fa-phone"></i>
                </a>
              </div>
            </h3>
            </div>
            <br>
            <div class="box-body box-profile">
              <?= $this->Text->autoParagraph(h($retailerDetail->retailer_desc)); ?>
            </div>
            <br>
          </div>
        </div>
        <div class="col-xs-7">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('ID '.$this->Number->format($retailerDetail->retailerid).' Contract Information') ?></h3>
            </div>
            <div class="box-body"><br>
              <!--<li class="list-group-item" style="border: 0px;">
                <b><?= __('Retailer ID') ?></b> 
                <div class="pull-right">
                  <?= $this->Number->format($retailerDetail->retailerid) ?>
                </div>
              </li>-->
              <li class="list-group-item" style="border: 0px;">
                <!--<b><?= __('Account Type') ?></b>-->
                <div title="Account Type" style="font-size: 20px; text-align: center;">
                  <i class="fa fa-trophy"></i>&nbsp&nbsp<?= h($getRetailer->retailer_acc_type->name) ?>
                </div>
              </li><br><br>
              <!--<li class="list-group-item" style="border: 0px;">
                <b><?= __('No. Of Users') ?></b> 
                <div title="No. Of Users" class="pull-right">
                  <i class="fa fa-user" title="No. Of Users"></i>&nbsp&nbsp<?= $user ?>
                </div>
              </li>
              <li class="list-group-item" style="border: 0px;">
                <b><?= __('No. Of Warehouses') ?></b> 
                <div title="No. Of Warehouses" class="pull-right">
                  <i class="fa fa-building" title="No. Of Warehouses"></i>&nbsp&nbsp<?= h($getRetailer->retailer_acc_type->num_of_warehouses) ?>
                </div>
              </li>
              <li class="list-group-item" style="border: 0px;">
                <b><?= __('No. Of Stores') ?></b> 
                <div title="No. of Stores" class="pull-right">
                  <i class="fa fa-shopping-cart" title="No. of Stores"></i>&nbsp&nbsp<?= h($getRetailer->retailer_acc_type->num_of_stores) ?>
                </div>
              </li>
              <li class="list-group-item" style="border: 0px;">
                <b><?= __('No. Of Product Types') ?></b> 
                <div title="No. of Product Types" class="pull-right">
                  <i class="fa fa-product-hunt" title="No. of Product Types"></i>&nbsp&nbsp<?= h($getRetailer->retailer_acc_type->num_of_product_types) ?>
                </div>
              </li>-->
              <table width="100%" align="center" style="text-align: center; border: 0px;">
                <tr>
                  <td style="font-size: 18px;" title="No. Of Users">
                    <i class="fa fa-user"></i>
                    <br><p style="font-size: 14px;">Users</p>
                  </td>
                  <td style="font-size: 18px;" title="No. Of Warehouses">
                    <i class="fa fa-building"></i>
                    <br><p style="font-size: 14px;">Warehouses</p>
                  </td>
                  <td style="font-size: 18px;" title="No. of Stores">
                    <i class="fa fa-shopping-cart"></i>
                    <br><p style="font-size: 14px;">Stores</p>
                  </td>
                  <td style="font-size: 18px;" title="No. of Products">
                    <i class="fa fa-product-hunt"></i>
                    <br><p style="font-size: 14px;">Products</p>
                  </td>
                  <td style="font-size: 18px;" title="No. of Loyalty Pts">
                    <?php echo '<a href="/IS3102_Final/retailer-loyalty-points/retailer-view/'.$retailerDetail->retailerid.'"><i class="fa fa-money"></i></a>' ?>
                    <br><p style="font-size: 14px;">
                    <?= $this->Html->link('Loyalty Pts', ['controller' => 'retailerLoyaltyPoints' , 'action' => 'retailerView', $retailerDetail->retailerid]);
                    ?>
                    </p>
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 18px;" title="No. Of Users">
                    <?= ($getRetailer->retailer_acc_type->num_of_users) +  ($getRetailer->num_of_users)?>
                  </td>
                  <td style="font-size: 18px;" title="No. Of Warehouses">
                    <?= ($getRetailer->retailer_acc_type->num_of_warehouses) + ($getRetailer->num_of_warehouses) ?>
                  </td>
                  <td style="font-size: 18px;" title="No. of Stores">
                    <?= ($getRetailer->retailer_acc_type->num_of_stores) + ($getRetailer->num_of_stores)?>
                  </td>
                  <td style="font-size: 18px;" title="No. of Product Types">
                    <?= ($getRetailer->retailer_acc_type->num_of_products) + ($getRetailer->num_of_products) ?>
                  </td>
                  <td style="font-size: 18px;" title="No. of Loyalty Points">

                  <?php
                    $total = 0;
                    foreach ($retailerLoyaltyPoints as $row) {

                      if($row['loyalty_pts'] == null){
                        $total -= $row['redemption_pts'];
                      } else {
                        $total += $row['loyalty_pts'];
                      }

                    }

                    echo $this->Html->link($total, ['controller' => 'retailerLoyaltyPoints' , 'action' => 'retailerView', $retailerDetail->retailerid]);

                  ?>

                  </td>
                </tr>
              </table><br>
            </div>
          </div>
        </div>
        <div class="col-xs-5">
          <div class="box box-primary" style="height: 270px;">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Retailer Profile') ?></h3>
            </div>
            <div class="box-body"><br>
              <li class="list-group-item" style="border: 0px;">
                <a href="mailto:<?= h($retailerDetail->retailer_email) ?>" title="email">
                  <i class="fa fa-envelope-o"></i>&nbsp&nbsp<?= h($retailerDetail->retailer_email) ?>
                </a>
              </li>
              <li class="list-group-item" style="border: 0px;">
                <a href="tel:+<?= h($retailerDetail->contact) ?>" title="contact">
                  <i class="fa fa-phone"></i>
                </a>&nbsp&nbsp<?= h($retailerDetail->contact) ?>
              </li>
              <li class="list-group-item" style="border: 0px;">
                  <i class="fa fa-map-marker" style="color: #3c8dbc;" title="address"></i>&nbsp&nbsp<?= h($retailerDetail->address) ?>
              </li>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
