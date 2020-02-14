<?php include('includes/admin-subcategories-nav.php'); ?>
<h2><?= $addSubcategory ?></h2>
    
<form id="addSubcategory" method="post" action="<?= \ItForFree\SimpleMVC\Url::link("admin/subcategory/add")?>"> 
    <div class="form-group">
        <label for="title">Название подкатегории</label>
        <input type="text" class="form-control" name="title" required id="title" placeholder="">
    </div>
    <div class="form-group">
        <label for="description">Краткое описание подкатегории</label>
        <input type="text" class="form-control" name="description" required id="description" placeholder="">
    </div> 
    <div class="form-group">
        <label for="category_id">Категория</label><br />
        <select name="category_id">
        <?php foreach ($categories as $category) { ?>
        <option value="<?php echo $category->id?>">
            <?php echo $category->title ?>
        </option>
            <?php } ?>
        </select>
    </div>
    <input type="submit" class="btn btn-primary" name="saveNewSubcategory" value="Сохранить">
    <input type="submit" class="btn" name="cancel" value="Назад">
</form>
