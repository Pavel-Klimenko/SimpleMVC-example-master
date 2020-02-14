<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
$User = Config::getObject('core.user.class');
?>

<?php include('includes/admin-subcategories-nav.php'); ?>
<h2><?=$editSubcategory ?>
    <span>
        <?= $User->returnIfAllowed("admin/subcategory/delete", 
            "<a href=" . $Url::link("admin/subcategory/delete&id=" . $_GET['id']) 
            . ">[Удалить]</a>");?>
    </span>
</h2>
    
<form id="editSubcategory" method="post" action="<?= \ItForFree\SimpleMVC\Url::link("admin/subcategory/edit") ?>"> 
    <div class="form-group">
        <label for="title">Название подкатегории</label>
        <input type="text" class="form-control" name="title" required id="title" placeholder="Название подкатегории" value="<?= $viewSubcategory->title ?>">
    </div>
    <div class="form-group">
        <label for="description">Описание подкатегории</label>
        <input type="text" class="form-control"  name="description" id="summary" placeholder="Описание подкатегории" value="<?= $viewSubcategory->description ?>">
    </div>

    <div class="form-group">
        <label for="category_id">Категория</label><br />
        <select name="category_id">
        <?php foreach ($categories as $category) { ?>
        <option value="<?php echo $category->id?>"
          <?php echo ($category->id == $viewSubcategory->category_id) ? " selected" : ""?>>
            <?php echo $category->title ?>
        </option>
            <?php } ?>
        </select>
    </div>
    <input type="submit" class="btn btn-primary" name="saveNewSubcategory" value="Сохранить">
    <input type="submit" class="btn" name="cancel" value="Назад">
</form>
