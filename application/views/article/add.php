<?php include('includes/admin-articles-nav.php'); ?>
<h2><?= $addArticleTitle?></h2>

<form id="addArticle" method="post" action="<?= \ItForFree\SimpleMVC\Url::link("admin/article/add")?>"> 
    <div class="form-group">
        <label for="title">Название</label>
        <input type="text" class="form-control" name="title" required id="title" placeholder="title">
    </div>  
    <div class="form-group">
        <label for="summary">Краткое содержание</label>
        <p><textarea class="form-control" name="summary" id="summary" placeholder="summary" rows="2" maxlength="200"></textarea></p>
    </div>
    
    <div class="form-group">
        <label for="category">Категория</label><br />
        <select name="category">
        <?php foreach ($categories as $category) { ?>
        <option value="<?php echo $category->title?>">
            <?php echo $category->title ?>
        </option>
            <?php } ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="subcategory">Подкатегория</label><br />
        <select name="subcategory">
        <?php foreach ($subcategories as $subcategory) { ?>
        <option value="<?php echo $subcategory->title?>">
            <?php echo $subcategory->title ?>
        </option>
            <?php } ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="author_login">Автор</label><br />
        <select name="author_login">
        <?php foreach ($authors as $author) { ?>
        <option value="<?php echo $author->login?>">
            <?php echo $author->login ?>
        </option>
            <?php } ?>
        </select>
    </div>
       
    <div class="form-group">
        <label for="content">Основной текст</label>
        <p><textarea class="form-control" name="content" id="content" placeholder="content" rows="10"  maxlength="3000"></textarea></p>
    </div>  
    <div class="form-group">   
        <input type="checkbox" name="activity" value="1" checked>Активная<Br>
    </div>
    <input type="submit" class="btn btn-primary" name="saveNewArticle" value="Сохранить">
    <input type="submit" class="btn" name="cancel" value="Назад">
</form>
