<?php 
use ItForFree\SimpleMVC\Config;
use ItForFree\SimpleMVC\Url;

$User = Config::getObject('core.user.class');

//vpre($User->explainAccess("admin/adminusers/index"));
?>

<ul class="nav">
    <?php  if ($User->isAllowed("admin/article/index")): ?>
    <li class="nav-item ">
        <a class="nav-link" href="<?= Url::link("admin/article/index") ?>">Список статей</a>
    </li>
    <?php endif; ?>
    
    <?php  if ($User->isAllowed("admin/article/add")): ?>
    <li class="nav-item ">
        <a class="nav-link" href="<?= Url::link("admin/article/add") ?>"> + Добавить статью</a>
    </li>
    <?php endif; ?>  
</ul>
