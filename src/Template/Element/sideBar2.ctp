<li class="treeview"><!-- start -->
  <a <?php if($this->request->session()->read('page') === $title) : ?> class="changeactive" <?php endif; ?> href="">
    <i class="fa fa-<?=$icon?>"></i>
    <span><?= $title ?></span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="/IS3102_Final/<?=$typePlural?>/add"><?=$type1?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural2?>/add"><?=$type2?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural3?>/add"><?=$type3?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural4?>/add"><?=$type4?></a></li>

<?php if ($num === '22'): ?>
    <li><a href="/IS3102_Final/<?=$typePlural5?>/add"><?=$type5?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural6?>/add"><?=$type6?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural7?>/add"><?=$type7?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural8?>/add"><?=$type8?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural9?>/add"><?=$type9?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural10?>/add"><?=$type10?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural11?>/add"><?=$type11?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural12?>/add"><?=$type12?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural13?>/add"><?=$type13?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural14?>/add"><?=$type14?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural15?>/add"><?=$type15?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural16?>/add"><?=$type16?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural17?>/add"><?=$type17?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural18?>/add"><?=$type18?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural19?>/add"><?=$type19?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural20?>/add"><?=$type20?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural21?>/add"><?=$type21?></a></li>
    <li><a href="/IS3102_Final/<?=$typePlural22?>/add"><?=$type22?></a></li>
<?php endif; ?>
    <li><p class="indent"></p></li>
  </ul>
</li><!-- end -->