<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->assign('title', __('Feedbacks') . '/' . __('Index'));
$this->Html->addCrumb(__('Retailer'), ['controller' => 'Pages', 'action' => 'retailer']);
$this->Html->addCrumb(__('Feedbacks'), ['controller' => 'Feedbacks', 'action' => 'index']);

?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Feedbacks') ?></h3>
        </div>
        <div class="box-body">
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
              <th scope="col"><?= $this->Paginator->sort('customer_name') ?></th>
              <th scope="col"><?= $this->Paginator->sort('customer_contact') ?></th>
              <th scope="col"><?= $this->Paginator->sort('customer_email') ?></th>
              <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
              <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
              <th scope="col"><?= $this->Paginator->sort('status') ?></th>
              <th scope="col"><?= $this->Paginator->sort('created') ?></th>
              <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($feedbacks as $feedback): ?>
              <tr>
                <td style="max-width: 150px;"><?= $this->Number->format($feedback->id) ?></td>
                <td style="max-width: 150px;"><?= $this->Html->link(__(h($feedback->customer_first_name.' '.$feedback->customer_last_name)), ['action' => 'view', $feedback->id], ['title' => 'View Feedback Details'])?></td>
                <td style="max-width: 150px;"><a href="tel:+<?= h($feedback->contact) ?>" title="Call Contact">
                <?= h($feedback->customer_contact) ?></a></td>
                <td style="max-width: 150px;"><a href="mailto:<?= h($feedback->email) ?>" title="email"><?= h($feedback->customer_email) ?></a></td>
                <td style="max-width: 150px;"><?= $feedback->has('product') ? $this->Html->link($feedback->product->id, ['controller' => 'Products', 'action' => 'view', $feedback->product->id]) : '' ?></td>
                <td style="max-width: 150px;"><?= $feedback->has('item') ? $this->Html->link($feedback->item->name, ['controller' => 'Items', 'action' => 'view', $feedback->item->id]) : '' ?></td>
                <td style="max-width: 150px;"><?php if ($feedback->status == 'Pending'): ?><a class="btn btn-default btn-block" title="Change to Replied" href="/IS3102_Final/feedbacks/pendingStatus/<?= $feedback->id ?>" >Pending</a><?php elseif ($feedback->status == 'Replied'): ?><a class="btn btn-default btn-block" title="Change to Closed" href="/IS3102_Final/feedbacks/repliedStatus/<?= $feedback->id ?>" >Replied</a><?php else: ?><a class="btn btn-default btn-block" title="Change to Pending" href="/IS3102_Final/feedbacks/closedStatus/<?= $feedback->id ?>" >Closed</a><?php endif; ?></td>
                <td style="max-width: 150px;"><?= h($feedback->created) ?></td>
                <td><a href="/IS3102_Final/feedbacks/edit/<?=$feedback->id?>"><i class="fa fa-edit" title="Edit Feedback Details"></i></a>&nbsp<?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Delete Feedback')), array('action' => 'delete', $feedback->id), array('escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $feedback->id))) ?></td>
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

<form id="contactForm" class="form-horizontal">
    <div class="form-group">
        <label class="col-xs-3 control-label">Phone number</label>
        <div class="col-xs-5">
            <input type="tel" class="form-control" name="phoneNumber" />
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    $('#contactForm')
        .find('[name="phoneNumber"]')
            .intlTelInput({
                // utilsScript: '/vendor/intl-tel-input-11.0.0/build/js/utils.js',
                autoPlaceholder: true,
                preferredCountries: ['fr', 'us', 'gb']
            });

    // $('#contactForm')
    //     .formValidation({
    //         framework: 'bootstrap',
    //         icon: {
    //             valid: 'glyphicon glyphicon-ok',
    //             invalid: 'glyphicon glyphicon-remove',
    //             validating: 'glyphicon glyphicon-refresh'
    //         },
    //         fields: {
    //             phoneNumber: {
    //                 validators: {
    //                     callback: {
    //                         message: 'The phone number is not valid',
    //                         callback: function(value, validator, $field) {
    //                             return value === '' || $field.intlTelInput('isValidNumber');
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     })
    //     // Revalidate the number when changing the country
    //     .on('click', '.country-list', function() {
    //         $('#contactForm').formValidation('revalidateField', 'phoneNumber');
    //     });
});
</script>
                   
