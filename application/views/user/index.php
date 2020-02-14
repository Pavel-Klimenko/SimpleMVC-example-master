<?php 
use ItForFree\SimpleMVC\Config;

$User = Config::getObject('core.user.class');
?>
<?php include('includes/admin-users-nav.php'); ?>

<h2>Список пользователей</h2> 
    
<?php if (!empty($users)): ?>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Зарегистрирован</th>
      <th scope="col">Логин</th>
      <th scope="col">Роль</th>
      <th scope="col">Активность</th>
      <th scope="col"></th>
    </tr>
     </thead>
    <tbody>
    <?php foreach($users as $user): ?>
    <tr>
        <td>  <?= $user->timestamp ?> </td>
        <td> <?= $user->login ?> </td>
        <td> <?= $user->role ?> </td>
        <td> 
     <?php  
        if ($user->activity == 1) {
            echo "Активен";    
        } else {
            echo "Неактивен"; 
        }
      ?>
        </td>  
        <td>  <?= $User->returnIfAllowed("admin/adminusers/edit", 
                    "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/adminusers/edit&id=". $user->id) 
                    . ">[Редактировать]</a>");?></td>
    </tr>
    <?php endforeach; ?>
    
    </tbody>
</table>

<?php else:?>
    <p> Список пользователей пуст. </p>
<?php endif; ?>