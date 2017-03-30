<li class="treeview"><!-- start -->
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
    <li><a href="/IS3102_Final/<?=$typePlural3?>/index"><?=$type3?></a></li>

<?php if ($num === '4'): ?>
    <li><a href="/IS3102_Final/<?=$typePlural4?>/index"><?=$type4?></a></li>
<?php elseif ($num === '5'): ?>
    <li><a href="/IS3102_Final/<?=$typePlural4?>/index"><?=$type4?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural5?>/index"><?=$type5?></a></li>
<?php elseif ($num === '6'): ?>
    <li><a href="/IS3102_Final/<?=$typePlural4?>/index"><?=$type4?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural5?>/index"><?=$type5?></a></li>
<?php endif; ?>
    <li><p class="indent"></p></li>
  </ul>
</li><!-- end -->