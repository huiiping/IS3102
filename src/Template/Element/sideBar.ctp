<li class="treeview"><!-- start -->
  <a href="">
    <i class="fa fa-table"></i>
    <span><?= $type ?></span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><p class="indent"><?= $this->Html->link(__($type.' Index'), ['controller' => $typePlural, 'action' => 'index']) ?></p></li>
  	<li><p class="indent"><?= $this->Html->link(__('Create New'), ['controller' => $typePlural, 'action' => 'add']) ?></p></li>
  	<li><p class="indent"><?= $this->Html->link(__('Search'), ['controller' => $typePlural, 'action' => 'search']) ?></p></li>
    <li><p class="indent"></p></li>
  </ul>
</li><!-- end -->