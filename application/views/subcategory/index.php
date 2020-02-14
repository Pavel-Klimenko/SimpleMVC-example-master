<?php 
use ItForFree\SimpleMVC\Config;

$User = Config::getObject('core.user.class');
?>
<?php include('includes/admin-subcategories-nav.php'); ?>

<h2>Список подкатегорий</h2> 
    
<?php if (!empty($subcategories)): ?>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Название подкатегории</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($subcategories as $subcategory): ?>
    <tr>
        <td>  <?= $subcategory->title ?> </td>
        <td>  <?= $User->returnIfAllowed("admin/subcategory/edit", 
                    "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/subcategory/edit&id=". $subcategory->id) 
                    . ">[Редактировать]</a>");?></td>
    </tr>
    <?php endforeach; ?>
    
    </tbody>
</table>

<?php else:?>
    <p>Список категорий пуст.</p>
<?php endif; ?>
