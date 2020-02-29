<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
$User = Config::getObject('core.user.class');
?>

<?php include('includes/admin-categories-nav.php'); ?>
<h2><?= $editCategory ?>
    <span>
        <?= $User->returnIfAllowed("admin/category/delete", 
            "<a href=" . $Url::link("admin/category/delete&id=" . $_GET['id']) 
            . ">[Удалить]</a>");?>
    </span>
</h2>
    
<form id="editCategory" method="post" action="<?= \ItForFree\SimpleMVC\Url::link("admin/category/edit") ?>">
    <div class="form-group">
        <label for="title">Название</label>
        <input type="text" class="form-control" name="title" required id="title" placeholder="title" value="<?= $viewCategory->title ?>">
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <input type="text" class="form-control"  name="description" id="summary" placeholder="description" value="<?= $viewCategory->description ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="saveNewCategory" value="Сохранить">
    <input type="submit" class="btn" name="cancel" value="Назад">
</form>
