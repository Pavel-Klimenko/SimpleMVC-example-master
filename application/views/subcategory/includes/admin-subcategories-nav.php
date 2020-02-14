<?php 
use ItForFree\SimpleMVC\Config;
use ItForFree\SimpleMVC\Url;

$User = Config::getObject('core.user.class');

//vpre($User->explainAccess("admin/adminusers/index"));
?>

<ul class="nav">
    <?php  if ($User->isAllowed("admin/subcategory/index")): ?>
    <li class="nav-item ">
        <a class="nav-link" href="<?= Url::link("admin/subcategory/index") ?>">Список подкатегорий</a>
    </li>
    <?php endif; ?>
    
    <?php  if ($User->isAllowed("admin/subcategory/add")): ?>
    <li class="nav-item ">
        <a class="nav-link" href="<?= Url::link("admin/subcategory/add") ?>"> + Добавить подкатегорию</a>
    </li>
    <?php endif; ?>  
</ul>
