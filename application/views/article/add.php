<?php include('includes/admin-articles-nav.php'); ?>
<h2><?= $addArticleTitle?></h2>

<form id="addArticle" method="post" action="<?= \ItForFree\SimpleMVC\Url::link("admin/article/add")?>"> 
    <div class="form-group">
        <label for="title">Название статьи</label>
        <input type="text" class="form-control" name="title" required id="title" placeholder="">
    </div>  
    <div class="form-group">
        <label for="summary">Краткое содержание статьи</label>
        <p><textarea class="form-control" name="summary" id="summary" placeholder="" rows="3" cols="45"></textarea></p>
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
        <label for="author_login">Автор статьи</label><br />
        <select name="author_login">
        <?php foreach ($authors as $author) { ?>
        <option value="<?php echo $author->login?>">
            <?php echo $author->login ?>
        </option>
            <?php } ?>
        </select>
    </div>
       
    <div class="form-group">
        <label for="content">Основной текст статьи</label>
        <p><textarea class="form-control" name="content" id="content" placeholder="" rows="10" cols="45"></textarea></p>
    </div>  
    <div class="form-group">   
        <input type="checkbox" name="activity" value="1" checked>Активная статья<Br>
    </div>
    <input type="submit" class="btn btn-primary" name="saveNewArticle" value="Сохранить">
    <input type="submit" class="btn" name="cancel" value="Назад">
</form>
