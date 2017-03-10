<?php
/**
  * @var \App\View\AppView $this
  */
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
              <h3 class="box-title"><?= __('Edit Promotion Email') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($promotionEmail) ?>
                <fieldset>
                    <?php
                        echo $this->Form->input('promotion_id', ['options' => $promotions, 'empty' => true]);
                        echo $this->Form->input('title');
                        echo $this->Form->input('body');
                        echo "<br /><b>Send email now?</b> ";
                        echo "&nbsp;&nbsp;&nbsp;";
                        echo $this->Form->radio('email', 
                            [
                                ['value' => 'y', 'text' => ' Yes '],
                                ['value' => 'n', 'text' => ' No '],
                            ]
                        );
                        //echo $this->Form->input('last_sent', ['empty' => true]);
                        //echo $this->Form->input('number_of_sends');
                    ?>
                </fieldset>
                <br>
                <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-default btn-flat']); ?>
                <?= $this->Form->end() ?>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
