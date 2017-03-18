<li class="treeview"><!-- start -->
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
    <li><p class="indent"><?= $this->Html->link(__($type3), ['controller' => $typePlural3, 'action' => 'index']) ?></p></li>

<?php if ($num === '4'): ?>
    <li><p class="indent"><?= $this->Html->link(__($type4), ['controller' => $typePlural4, 'action' => 'index']) ?></p></li>
<?php elseif ($num === '5'): ?>
    <li><p class="indent"><?= $this->Html->link(__($type4), ['controller' => $typePlural4, 'action' => 'index']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type5), ['controller' => $typePlural5, 'action' => 'index']) ?></p></li>
<?php elseif ($num === '6'): ?>
    <li><p class="indent"><?= $this->Html->link(__($type4), ['controller' => $typePlural4, 'action' => 'index']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type5), ['controller' => $typePlural5, 'action' => 'index']) ?></p></li>
    <li><p class="indent"><?= $this->Html->link(__($type6), ['controller' => $typePlural6, 'action' => 'index']) ?></p></li>
<?php endif; ?>
    <li><p class="indent"></p></li>
  </ul>
</li><!-- end -->