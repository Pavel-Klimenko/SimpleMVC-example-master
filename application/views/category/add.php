<?php include('includes/admin-categories-nav.php'); ?>
<h2><?= $addCategory ?></h2>
    
<form id="addCategory" method="post" action="<?= \ItForFree\SimpleMVC\Url::link("admin/category/add")?>"> 
    <div class="form-group">
        <label for="title">Название</label>
        <input type="text" class="form-control" name="title" required id="title" placeholder="">
    </div>
    <div class="form-group">
        <label for="description">Краткое описание</label>
        <input type="text" class="form-control" name="description" maxlength="150" required id="description" placeholder="description">
    </div>
    <input type="submit" class="btn btn-primary" name="saveNewCategory" value="Сохранить">
    <input type="submit" class="btn" name="cancel" value="Назад">
     
</form>
