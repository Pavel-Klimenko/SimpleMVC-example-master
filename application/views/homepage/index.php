<?php 
use ItForFree\SimpleMVC\Config;
$Url = Config::getObject('core.url.class');
?>

<div class="row">
    <div class="col "><h1><?php echo $homepageTitle ?></h1>
        </div>
</div>
<div class="row">
    <div class="col ">
      <p class="lead"> Добро пожаловать в SimpleMVC! </p>
    </div>
</div>

<div class="row">
    <div class="col">
        
<style>
   li {
    list-style-type: none; /* Убираем маркеры */
    padding: 5px;
   }
</style>
      
  <?php foreach($articles as $article): ?>
    <ul>
        <li>
            <span><h1> <?= $article->title ?></h1></span>
            <span><b>Дата публикации:  </b><?= $article->timestamp ?></span>
        </li>
        <li><b>Категория:  </b><?= $article->category ?></li>
        <li><b>Подкатегория:  </b><?= $article->subcategory ?></li>
        <li><b>Автор:  </b><?= $article->author_login ?></li>
        <li><b>Краткое содержание:  </b><?= $article->summary ?></li>
        <li><b>ID статьи:  </b><?= $article->id ?></li>
        <?php $_GET['id'] = $article->id ?>
    </ul>
   
        <a href="<?= $Url::link("homepage/viewArticle&id=" . $_GET['id'])?>">Основное содержание статьи</a>
   <?php endforeach; ?>
    </div>
</div>