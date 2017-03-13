<?php
use Cake\ORM\TableRegistry;
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $prodCat->id],
            ['confirm' => __('Are you sure you want to delete # {0}?', $prodCat->id)]
            )
            ?></li>
            <li><?= $this->Html->link(__('List Prod Cats'), ['action' => 'index']) ?></li>
        </ul>
    </nav>
    <div class="prodCats form large-9 medium-8 columns content">
        <?= $this->Form->create($prodCat) ?>
        <fieldset>
            <legend><?= __('Edit Prod Cat') ?></legend>
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
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script>