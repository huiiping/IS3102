<?php
use Cake\ORM\TableRegistry;
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Prod Cats'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="prodCats form large-9 medium-8 columns content">
    <?= $this->Form->create($prodCat) ?>
    <fieldset>
        <legend><?= __('Add Prod Cat') ?></legend>
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
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
