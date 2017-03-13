<?php
use Cake\ORM\TableRegistry;
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
              <h3 class="box-title"><?= __('Edit Product Category') ?></h3>
            </div>
            <div class="box-body">
                <?= $this->Form->create($prodCat) ?>
                <fieldset>
                    <?php
                    echo $this->Form->input('cat_name');
                    echo $this->Form->input('cat_desc');
                    $prodCats = TableRegistry::get('prodCats');
                    $query = $prodCats->find('all');
                    $results = $query->all()
                    ->extract('id');
                    $data= $results->toArray();

                    echo $this->Form->input('parentid', array('type' => 'select', 'options' => array_combine($data, $data), 'empty' => true));
                    ?>
                    <div class="container">
                      <h3>Tooltip Example</h3>
                      <p>The data-placement attribute specifies the tooltip position.</p>
                      <ul class="list-inline">
                          <li><a href="#" data-toggle="tooltip" data-placement="right" title="Hooray!">Right</a></li>
                      </ul>
                  </div>

                  

                 <!--Hovering works. Can use for employee roles & parentID. Just need to make it nicer
                    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
                    <li>Milk</li>
                    <script>
                        $( "li" ).hover(
                          function() {
                            $( this ).append( $( "<span> ***</span>" ) );
                        }, function() {
                            $( this ).find( "span:last" ).remove();
                        }
                        );
                    </script>-->
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

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script>