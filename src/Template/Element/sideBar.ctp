<li class="treeview">
  <a <?php if($this->request->session()->read('page') === $title) : ?> class="changeactive" <?php endif; ?> href="">
    <i class="fa fa-table"></i>
    <span><?= $title ?></span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><p class="indent"><?= $this->Html->link(__($type1), ['controller' => $typePlural, 'action' => 'index']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type2), ['controller' => $typePlural2, 'action' => 'index']) ?></p></li>
    <li><p class="indent"></p></li>
  </ul>
</li>