<?php
  use Cake\ORM\TableRegistry;
  use Cake\Error\Debugger
?>

<?php
$this->assign('title', __('Location') . '/' . __('View'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Locations'), ['controller' => 'Locations', 'action' => 'index']);
$this->Html->addCrumb(__('View Location'));
?>

<!-- Main content -->
<section class="content" style="min-height: 550px">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= $location->name ?></h3>
          </div>
          <div class="box-body">
          <div class="pull-right">
            <a class="btn btn-success btn-block" title="Edit Location Details" href="/IS3102_Final/locations/edit/<?=$location->id?>">Edit Location</a>
          </div>
          <br><br><br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($location->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Name') ?></th>
                    <td><?= h($location->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Address') ?></th>
                    <td><?= h($location->address) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Contact') ?></th>
                    <td>
                        <a href="tel:+<?= h($location->contact) ?>" title="Call Contact"><?= h($location->contact) ?></a>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Type') ?></th>
                    <td><?= h($location->type) ?></td>
                </tr>
            </table>
            <br>
            <div class="related">
                <?php if (!empty($location->retailer_employees)): ?>
                <h4><?= __('Employees Under '.$location->name) ?></h4>
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Employee Name') ?></th>
                        <th scope="col"><?= __('Email') ?></th>
                        <th scope="col"><?= __('Contact') ?></th>
                        <th scope="col"><?= __('Address') ?></th>
                        <th scope="col"><?= __('Activation Status') ?></th>
                        <!--<th scope="col" class="actions"><?= __('Actions') ?></th>-->
                    </tr>
                  </thead>
                    <?php foreach ($location->retailer_employees as $retailerEmployees): ?>
                    <tr>
                        <td><?= h($retailerEmployees->id) ?></td>
                        <td><?= $this->Html->link(__($retailerEmployees->first_name.' '.$retailerEmployees->last_name), ['controller' => 'RetailerEmployees', 'action' => 'view', $retailerEmployees->id], ['title' => 'View Employee Details']) ?></td>
                        <td>
                            <a href="mailto:<?= h($retailerEmployees->email) ?>" title="Email">
                          <?= h($retailerEmployees->email) ?>
                        </a>
                        </td>
                        <td>
                            <a href="tel:+<?= h($retailerEmployees->contact) ?>" title="Call Contact"><?= h($retailerEmployees->contact) ?>
                            </a>
                        </td>
                        <td><?= h($retailerEmployees->address) ?></td>
                        <td><?= h($retailerEmployees->activation_status) ?></td>
                        <!--<td class="actions">
                            <?= $this->Html->link(__('Edit'), ['controller' => 'RetailerEmployees', 'action' => 'edit', $retailerEmployees->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'RetailerEmployees', 'action' => 'delete', $retailerEmployees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $retailerEmployees->id)]) ?>
                        </td>-->
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
            <br>
            <div class="related">
              <h4><?= __('Sections Found Under '.$location->name) ?></h4>
              <div class="pull-right">
                <a class="btn btn-success btn-block" title="Create New Section" href="/IS3102_Final/sections/add/">Create New Section</a>
              </div>
              <br><br><br>
                <?php if (!empty($location->sections)): ?>
                <?php foreach ($location->sections as $sections): ?>
                    <h5>Item(s) at <?= $this->Html->link(__($sections->sec_name), ['controller' => 'Sections', 'action' => 'view', $sections->id], ['title' => 'View Section Details']) ?></h5>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>
                                Maximum Space Limit : <?= $sections->space_limit ?>
                            </td>
                            <td>
                                Available Space : <?= $sections->available_space?>
                            </td>
                            <td>
                                Used Space : <?= $sections->space_limit - $sections->available_space ?>
                            </td>
                            <td>
                                Reserved Space : <?= $sections->reserve_space ?>
                            </td>
                        </tr>
                    <table >
                    </table>
                    <?php
                        $allItems = TableRegistry::get('Items');
                        $items = $allItems
                        ->find()
                        ->where(['location_id' => $location->id, 'section_id' => $sections->id])
                        ->toArray();
                    ?>
                    <?php if (!empty($items)): ?>
                        <table class="table table-bordered table-striped">
                          <thead>
                            <tr>
                                <th scope="col"><?= __('EPC') ?></th>
                                <th scope="col"><?= __('Item Name') ?></th>
                                <th scope="col"><?= __('Product Name') ?></th>
                                <th scope="col"><?= __('Status') ?></th>
                            </tr>
                          </thead>
                          <?php foreach ($items as $item): ?>
                            <tr>
                                <td><?= h($item->EPC) ?></td>
                                <td>
                                    <?= $this->Html->link(__($item->name), ['action' => 'view', $item->id], ['title' => 'View Item Details']) ?>
                                </td>
                                <td>
                                    <?php
                                        $allProds = TableRegistry::get('Products');
                                        $prods = $allProds
                                        ->find()
                                        ->where(['id' => $item->product_id]);
                                    ?>
                                    <?php foreach ($prods as $prod): ?>
                                        <?= $this->Html->link($prod->prod_name, ['controller' => 'Products', 'action' => 'view', $prod->id], ['title' => 'View Product Details']) ?>
                                    <?php endforeach; ?>
                                </td>
                                <td><?= h($item->status) ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                        No records found!
                    <?php endif; ?>
                    <br><br>
                <?php endforeach; ?>
                <!--<table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Sec Name') ?></th>
                        <th scope="col"><?= __('Available Space') ?></th>
                        <th scope="col"><?= __('Space Limit') ?></th>
                        <th scope="col"><?= __('Reserve') ?></th>-->
                        <!--<th scope="col" class="actions"><?= __('Actions') ?></th>-->
                    <!--</tr>
                  </thead>
                    <?php foreach ($location->sections as $sections): ?>
                    <tr>
                        <td><?= h($sections->id) ?></td>
                        <td><?= $this->Html->link(__($sections->sec_name), ['controller' => 'Sections', 'action' => 'view', $sections->id], ['title' => 'View Section Details']) ?></td>
                        <td><?= h($sections->available_space) ?></td>
                        <td><?= h($sections->space_limit) ?></td>
                        <td><?= h($sections->reserve_space) ?></td>-->
                        <!--<td class="actions">
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Sections', 'action' => 'edit', $sections->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sections', 'action' => 'delete', $sections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sections->id)]) ?>
                        </td>-->
                    <!--</tr>
                    <?php endforeach; ?>
                </table>-->
                <?php else: ?>
                    No section records found!<br><br>
                <?php endif; ?>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
