<!-- Main content -->
<section class="content" style="min-height: 550px">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= __('Stock Levels') ?></h3>
          </div>
          <div class="box-body">
          <div class="pull-right">
            <a class="btn btn-success btn-block" title="Create New Location" href="/IS3102_Final/StockLevels/add" >Create New Stock Level</a>
          </div>
            <!--<legend><h4><?= __('Search') ?></h4></legend>-->
            <form method="post" accept-charset="utf-8" action="/IS3102_Final/StockLevels">
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
                          <input class = "form-control" type="submit" class="btn btn-default bth-flat" value="Search">
                        </div>
                      </th>
                    </tr>
                  </table>
                </form>
                <br>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('threshold') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('retailer_employee_id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stockLevels as $stockLevel): ?>
                        <tr>
                            <td><?= $this->Number->format($stockLevel->id) ?></td>
                            <td><?= $stockLevel->has('location') ? $this->Html->link($stockLevel->location->name, ['controller' => 'Locations', 'action' => 'view', $stockLevel->location->id]) : '' ?></td>
                            <td><?= $stockLevel->has('product') ? $this->Html->link($stockLevel->product->id, ['controller' => 'Products', 'action' => 'view', $stockLevel->product->id]) : '' ?></td>
                            <td><?= $this->Number->format($stockLevel->threshold) ?></td>
                            <td><?= h($stockLevel->status) ?></td>
                            <td><?= $stockLevel->has('retailer_employee') ? $this->Html->link($stockLevel->retailer_employee->last_name, ['controller' => 'RetailerEmployees', 'action' => 'view', $stockLevel->retailer_employee->id]) : '' ?></td>
                            <td><?= h($stockLevel->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $stockLevel->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stockLevel->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stockLevel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stockLevel->id)]) ?>
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
