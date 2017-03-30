<!-- Main content -->
<section class="content" style="min-height: 550px">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= __('Sections') ?></h3>
          </div>
          <div class="box-body">
          <div class="pull-right">
            <a class="btn btn-success btn-block" title="Create New Section" href="/IS3102_Final/sections/add" >Create New Section</a>
          </div>
            <!--<legend><h4><?= __('Search') ?></h4></legend>-->
            <form method="post" accept-charset="utf-8" action="/IS3102_Final/sections">
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
                        <th scope="col"><?= $this->Paginator->sort(('sec_name'), ['title' => 'Section Name']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort(('space_limit'), ['title' => 'Max. Space Limit (Units)']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort(('available_space'), ['title' => 'Available Space (Units)']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort(('reserve_space'), ['title' => 'Reserved Space (Units)']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sections as $section): ?>
                    <tr>
                        <td><?= $this->Number->format($section->id) ?></td>
                        <td><?= $this->Html->link(__($section->sec_name), ['action' => 'view', $section->id], ['title' => 'View Section Details']) ?></td>
                        <td><?= $this->Number->format($section->space_limit) ?></td>
                        <td><?= $this->Number->format($section->available_space) ?></td>
                        <td><?= $this->Number->format($section->reserve_space) ?></td>
                        <td><?= $section->has('location') ? $this->Html->link($section->location->name, ['controller' => 'Locations', 'action' => 'view', $section->location->id], ['title' => 'View Location Details']) : '' ?></td>
                        <td class="actions">
                            <a href="/IS3102_Final/sections/edit/<?=$section->id?>">
                            <i class="fa fa-edit" title="Edit Section Details"></i></a>&nbsp
                            <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Section')), array('action' => 'delete', $section->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $section->id))) ?>
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
