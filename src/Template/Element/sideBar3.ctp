<li class="treeview"><!-- start -->
  <a <?php if($this->request->session()->read('page') === $title) : ?> class="changeactive" <?php endif; ?> href="">
    <i class="fa fa-table"></i>
    <span><?= $title ?></span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><p class="indent"><?= $this->Html->link(__($type1), ['controller' => $typePlural, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type2), ['controller' => $typePlural2, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type3), ['controller' => $typePlural3, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type4), ['controller' => $typePlural4, 'action' => 'add']) ?></p></li>

<?php if ($num === '26'): ?>
    <li><p class="indent"><?= $this->Html->link(__($type5), ['controller' => $typePlural5, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type6), ['controller' => $typePlural6, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type7), ['controller' => $typePlural7, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type8), ['controller' => $typePlural8, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type9), ['controller' => $typePlural9, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type10), ['controller' => $typePlural10, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type11), ['controller' => $typePlural11, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type12), ['controller' => $typePlural12, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type13), ['controller' => $typePlural13, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type14), ['controller' => $typePlural14, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type15), ['controller' => $typePlural15, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type16), ['controller' => $typePlural16, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type17), ['controller' => $typePlural17, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type18), ['controller' => $typePlural18, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type19), ['controller' => $typePlural19, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type20), ['controller' => $typePlural20, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type21), ['controller' => $typePlural21, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type22), ['controller' => $typePlural22, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type23), ['controller' => $typePlural23, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type24), ['controller' => $typePlural24, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type25), ['controller' => $typePlural25, 'action' => 'add']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type26), ['controller' => $typePlural26, 'action' => 'add']) ?></p></li>
<?php endif; ?>
    <li><p class="indent"></p></li>
  </ul>
</li><!-- end -->