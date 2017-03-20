<li class="treeview">
  <a <?php if($this->request->session()->read('page') === $title) : ?> class="changeactive" <?php endif; ?> href="">
    <i class="fa fa-<?=$icon?>"></i>
    <span><?= $title ?></span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="/IS3102_Final/<?=$typePlural?>/index"><?=$type1?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural2?>/index"><?=$type2?></a></li>
    <li><p class="indent"></p></li>
  </ul>
</li>
