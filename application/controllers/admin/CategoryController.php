<?php
namespace application\controllers\admin;
use application\models\Category;
use ItForFree\SimpleMVC\Config;

/** 
 *
 */
class CategoryController extends \ItForFree\SimpleMVC\mvc\Controller
{
    public $layoutPath = 'admin-main.php';
      
    public function indexAction()
    {
        $Category = new Category();
        $id = $_GET['id'] ?? null;
        
        $categories = $Category->getList()['results'];
        $this->view->addVar('categories', $categories);
        $this->view->render('category/index.php');  
    }

    /**
     * Выводит на экран форму для создания новой категории (только для Администратора)
     */
    public function addAction()
    {
        $Url = Config::get('core.url.class');
        if (!empty($_POST)) {   
            if (!empty($_POST['saveNewCategory'])) {
                $category = new Category();
                $newCategory = $category->loadFromArray($_POST);
                $newCategory->insert(); 
                $this->redirect($Url::link("admin/category/index")); 
            }
            
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/category/index")); 
            }
        }
            else {
                $addCategory = "Добавление категории";
                $this->view->addVar('addCategory', $addCategory);
                $this->view->render('category/add.php');
            }
    }
    
    /**
     * Выводит на экран форму для редактирования категории (только для Администратора)
     */
    public function editAction()
    {
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        if (!empty($_POST)) { // это выполняется нормально.
            if (!empty($_POST['saveChanges'] )) {
                $category = new Category ();
                $newCategory = $category->loadFromArray($_POST);
                $newCategory->update();
                $this->redirect($Url::link("admin/category/index&id=$id"));
            }
            
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/category/index&id=$id"));
            }
        }
         else {          
            $category = new Category();
            $viewCategory = $category->getById($id);
            
            $editCategory = "Редактирование данных категории";
            $this->view->addVar('viewCategory', $viewCategory);
            $this->view->addVar('editCategory', $editCategory);
            $this->view->render('category/edit.php'); 
        }   
    }
    
    /**
     * Выводит на экран предупреждение об удалении данных (только для Администратора)
     */
    public function deleteAction()
    {
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        if (!empty($_POST)) {
            if (!empty($_POST['deleteCategory'])) {
                $category = new Category();
                $newCategory = $category->loadFromArray($_POST);
                $newCategory->delete();
                
                $this->redirect($Url::link("admin/category/index"));
    
            }
            
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/category/edit&id=$id"));
            }
        }
        
        else {
            
            $сategory = new Category();
            $deletedCategory = $сategory->getById($id);
            $deleteCategory = "Удаление категории";
          
            $this->view->addVar('deleteCategory', $deleteCategory);
            $this->view->addVar('deletedCategory', $deletedCategory);     
            $this->view->render('category/delete.php');
        }
    }
}