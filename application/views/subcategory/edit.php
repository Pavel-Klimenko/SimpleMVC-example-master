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
    
<form id="editSubcategory" method="post" action="<?= $Url::link("admin/subcategory/edit&id=" . $_GET['id'])?>">
    <div class="form-group">
        <label for="title">Название</label>
        <input type="text" class="form-control" name="title" required id="title" placeholder="title" value="<?= $viewSubcategory->title ?>">
    </div>
    <div class="form-group">
        <label for="description">Краткое описание</label>
        <input type="text" class="form-control"  name="description" id="summary" placeholder="description" value="<?= $viewSubcategory->description ?>">
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
    <input type="hidden" name="id" placeholder="id" value="<?= $_GET['id']; ?>">
    <input type="submit" class="btn btn-primary" name="saveChanges" value="Сохранить">
    <input type="submit" class="btn" name="cancel" value="Назад">
</form>
