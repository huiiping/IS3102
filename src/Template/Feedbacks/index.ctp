<?php
$this->assign('title', __('Feedbacks') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Feedback'));
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Feedback') ?></h3>
        </div>
        <div class="box-body">
          <!-- <div class="pull-right">
            <a class="btn btn-success btn-block" title="Create New Feedback" href="/IS3102_Final/feedbacks/add" >Create New Feedback</a>
          </div> -->
          <br>
          <!--<legend><h4><?= __('Search') ?></h4></legend>-->
          <form method="post" accept-charset="utf-8" action="/IS3102_Final/feedbacks">
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
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th scope="col"><?= $this->Paginator->sort(('customer_first_name'), ['title' => 'Customer Name']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_contact') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_email') ?></th>
                <th scope="col">Customer ID</th>
                <th scope="col"><?= $this->Paginator->sort('message') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($feedbacks as $feedback): ?>
                <tr>
                  <td style="max-width: 150px;"><?= $this->Html->link(__(h($feedback->customer_first_name.' '.$feedback->customer_last_name)), ['action' => 'view', $feedback->id], ['title' => 'View Feedback Details'])?></td>
                  <td style="max-width: 150px;"><a href="tel:+<?= h($feedback->customer_contact) ?>" title="Call Contact">
                    <?= h($feedback->customer_contact) ?></a></td>
                    <td style="max-width: 150px;"><a href="mailto:<?= h($feedback->customer_email) ?>" title="email"><?= h($feedback->customer_email) ?></a></td>
                    <td style="max-width: 150px;">
                      <?php if ($feedback->customer_id != '') { ?>
                      <?= $this->Html->link(__(h($feedback->customer_id)), ['controller' => 'Customers', 'action' => 'view', $feedback->customer_id], ['title' => 'View Customer Details']); ?>
                      <?php } ?>
                    </td>
                    <td style="max-width: 150px;">
                      <?= h($feedback->message) ?>
                    </td>
                    <td>
                      <?php 
                      if($feedback->status == 'Pending'){
                        ?>
                        <div class="btn-group">
                          <button type="button" style="width: 100px;" class="btn btn-danger btn-flat"><?= h($feedback->status) ?></button>
                          <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>

                          <ul class="dropdown-menu" role="menu">
                            <li><a title="Replied Feedback" href="/IS3102_Final/feedbacks/repliedStatus/<?= $feedback->id ?>">Replied</a></li>
                            <li><a title="Closed Feedback" href="/IS3102_Final/feedbacks/closedStatus/<?= $feedback->id ?>">Closed</a></li>
                          </ul>
                        </div>
                        <?php

                      } else if($feedback->status == 'Closed') {

                        ?>

                        <div class="btn-group">
                          <button type="button" style="width: 100px;" class="btn btn-success btn-flat"><?= h($feedback->status) ?></button>
                        </div>
                        <?php

                      } else {

                        ?>

                        <div class="btn-group">
                          <button type="button" style="width: 100px;" class="btn btn-warning btn-flat"><?= h($feedback->status) ?></button>
                          <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu"></li>
                            <li><a title="Closed Feedback" href="/IS3102_Final/feedbacks/closedStatus/<?= $feedback->id ?>">Closed</a></li>
                          </ul>
                        </div>
                        <?php 
                      }
                      ?>
                    </td>

                    <!-- php elseif ($feedback->status == 'Replied'): ?><a class="btn btn-default btn-block" title="Change to Closed" href="/IS3102_Final/feedbacks/repliedStatus/= $feedback->id ?>" >Replied</a>php else: ?><a class="btn btn-default btn-block" title="Change to Pending" href="/IS3102_Final/feedbacks/closedStatus/= $feedback->id ?>" >Closed</a>php endif; ?></td>-->
                    <td>
                      <!-- <a href="/IS3102_Final/feedbacks/edit/<?=$feedback->id?>"><i class="fa fa-edit" title="Edit Feedback Details"></i></a>&nbsp -->
                      <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Feedback')), array('action' => 'delete', $feedback->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $feedback->id))) ?></td>
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
