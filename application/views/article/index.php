<?php 
use ItForFree\SimpleMVC\Config;

$User = Config::getObject('core.user.class'); ?>

<?php include('includes/admin-articles-nav.php'); ?>

<h2>Список статей</h2> 
    
<?php if (!empty($articles)): ?>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Дата публикации</th>  
      <th scope="col">Название</th>
      <th scope="col">Категория</th>
      <th scope="col">Подкатегория</th>
      <th scope="col">Автор</th>
      <th scope="col">Активность статьи</th>
    </tr>
     </thead>
    <tbody>
    <?php foreach($articles as $article): ?>
    <tr>
        <td>  <?= $article->timestamp ?> </td>
        <td> <?= $article->title ?> </td>
        <td> <?= $article->category ?> </td>
        <td> <?= $article->subcategory ?> </td>
        <td> <?= $article->author_login ?> </td>
        <td> 
     <?php  
     
        if ($article->activity == 1) {
            echo "Активна";    
        } else {
            echo "Неактивна"; 
        }
      ?>
        </td>  
        <td>  <?= $User->returnIfAllowed("admin/article/edit", 
                    "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/article/edit&id=". $article->id) 
                    . ">[Редактировать]</a>");?></td>
    </tr>
    <?php endforeach; ?>
    
    </tbody>
</table>

<?php else:?>
    <p>Список статей пуст.</p>
<?php endif; ?>
