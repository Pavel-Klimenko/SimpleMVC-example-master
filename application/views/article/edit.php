<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
$User = Config::getObject('core.user.class');
?>

<?php include('includes/admin-articles-nav.php'); ?>
<h2><?=$editArticleTitle ?>
    <span>
        <?= $User->returnIfAllowed("admin/article/delete", 
            "<a href=" . $Url::link("admin/article/delete&id=" . $_GET['id']) 
            . ">[Удалить]</a>");?>
    </span>
</h2>
            
<form id="editArticle" method="post" action="<?= $Url::link("admin/article/edit&id=" . $_GET['id']) ?>">   
    <div class="form-group">
        <label for="title">Название статьи</label>
        <input type="text" class="form-control" name="title" required id="title" placeholder="Название статьи" value="<?= $viewArticle->title ?>">
    </div>
    <div class="form-group">
        <label for="summary">Краткое содержание статьи</label>
        <input type="text" class="form-control"  name="summary" id="summary" placeholder="Краткое содержание статьи" value="<?= $viewArticle->summary ?>">
    </div>
    <div class="form-group">
        <label for="author_login">Автор статьи</label><br />
        <select name="author_login">
        <?php foreach ($authors as $author) { ?>
        <option value="<?php echo $author->login?>"
          <?php echo ($author->login == $viewArticle->author_login) ? " selected" : ""?>>
            <?php echo $author->login ?>
        </option>
            <?php } ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="content">Основной текст статьи</label>
        <p><textarea class="form-control" name="content" id="content" placeholder="Cодержание статьи" rows="10" cols="45" name="text"><?= $viewArticle->content ?></textarea></p>
    </div>  
    <div class="form-group">        
        <input type="checkbox" name="activity" value="1" checked>Активная статья<Br>
    </div>
    <input type="submit" class="btn btn-primary" name="saveNewArticle" value="Сохранить">
    <input type="submit" class="btn" name="cancel" value="Назад">
</form>
