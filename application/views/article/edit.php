<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
$User = Config::getObject('core.user.class');
?>

<?php include('includes/admin-articles-nav.php'); ?>
<h2><?=$editArticle ?>
    <span>
        <?= $User->returnIfAllowed("admin/article/delete", 
            "<a href=" . $Url::link("admin/article/delete&id=" . $_GET['id']) 
            . ">[Удалить]</a>");?>
    </span>
</h2>
            
<form id="editArticle" method="post" action="<?= $Url::link("admin/article/edit&id=" . $_GET['id']) ?>">   
    <div class="form-group">
        <label for="title">Название</label>
        <input type="text" class="form-control" name="title" required id="title" placeholder="title" value="<?= $viewArticle->title ?>">
    </div>
    <div class="form-group">
        <label for="summary">Краткое содержание</label>
        <input type="text" class="form-control"  name="summary" id="summary" placeholder="summary" value="<?= $viewArticle->summary ?>">
    </div>
    <div class="form-group">
        <label for="category">Категория</label><br />
        <select name="category">
        <?php foreach ($categories as $category) { ?>
        <option value="<?php echo $category->title?>"
           <?php echo ($category->title == $viewArticle->category) ? "selected" : ""?>>
            <?php echo $category->title ?>
        </option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="subcategory">Подкатегория</label><br />
        <select name="subcategory">
        <?php foreach ($subcategories as $subcategory) { ?>
        <option value="<?php echo $subcategory->title?>"
          <?php echo ($subcategory->title == $viewArticle->subcategory) ? "selected" : ""?>>
            <?php echo $subcategory->title ?>
        </option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="author_login">Автор</label><br />
        <select name="author_login">
        <?php foreach ($authors as $author) { ?>
        <option value="<?php echo $author->login?>"
          <?php echo ($author->login == $viewArticle->author_login) ? "selected" : ""?>>
            <?php echo $author->login ?>
        </option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="content">Основной текст</label>
        <p><textarea class="form-control" name="content" id="content" placeholder="content" rows="10" cols="45" name="text"><?= $viewArticle->content ?></textarea></p>
    </div>  
    <div class="form-group">        
        <input type="checkbox" name="activity" placeholder="activity" value="1" checked>Активная<Br>
    </div>
    <input type="hidden" name="id" placeholder="id" value="<?= $_GET['id']; ?>">
    <input type="submit" class="btn btn-primary" name="saveChanges" value="Сохранить">
    <input type="submit" class="btn" name="cancel" value="Назад">
</form>
