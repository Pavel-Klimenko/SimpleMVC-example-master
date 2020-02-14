<?php 
use ItForFree\SimpleMVC\Config;
$User = Config::getObject('core.user.class');
?>
<?php include('includes/admin-categories-nav.php'); ?>

<h2>Список категорий</h2> 
    
<?php if (!empty($categories)): ?>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Название категории</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($categories as $category): ?>
    <tr>
        <td>  <?= $category->title ?> </td>
        <td>  <?= $User->returnIfAllowed("admin/category/edit", 
                    "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/category/edit&id=". $category->id) 
                    . ">[Редактировать]</a>");?></td>
    </tr>
    <?php endforeach; ?>
    
    </tbody>
</table>

<?php else:?>
    <p>Список категорий пуст.</p>
<?php endif; ?>
