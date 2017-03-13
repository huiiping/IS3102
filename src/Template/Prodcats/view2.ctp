<?php
use Cake\ORM\TableRegistry;
use Cake\Error\Debugger;
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Prod Cat'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prodCats view large-9 medium-8 columns content">
    <?php 
    $prodCats = TableRegistry::get('prodCats');
    $query = $prodCats->find('all');
    $results = $query->all()
    ->extract('id');
    $data= $results->toArray();

    $query2 = $prodCats->find('all');
    $results2 = $query2->all()
    ->extract('parentid');
    $data2= $results2->toArray();

    $array = array_combine($data, $data2);

    Debugger::dump($array);

    $flat = array();
    $tree = array();

    foreach ($array as $child => $parent) {
        if (!isset($flat[$child])) {
            $flat[$child] = array();
        }
        if (!empty($parent)) {
            $flat[$parent][$child] =& $flat[$child];
        } else {
            $tree[$child] =& $flat[$child];
        }
    }

    Debugger::dump($tree);
    $deep = '0';
    doOutputList($tree,$deep);
   //Debugger::dump($output);
?>
    <?php
    function doOutputList($TreeArray, $deep)
    {
        $padding = str_repeat('  ', $deep*3);

        echo $padding . "<ul>\n";
        foreach($TreeArray as $arr)
        {
            echo $padding . "  <li>\n";
            if(is_array($arr)) 
            {
                doOutputList($arr, $deep+1);
            }
            else
            {
                echo $padding .'    '. $arr;
            }
            echo $padding . "  </li>\n";
        }
        echo $padding . "</ul>\n";
    }

?>
</div>
