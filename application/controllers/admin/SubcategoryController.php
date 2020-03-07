<?php
namespace application\controllers\admin;
use application\models\Subcategory;
use application\models\Category;
use ItForFree\SimpleMVC\Config;

/**
 *
 */
class SubcategoryController extends \ItForFree\SimpleMVC\mvc\Controller
{
    public $layoutPath = 'admin-main.php';
      
    public function indexAction()
    {
        $Subcategory = new Subcategory();
        $id = $_GET['id'] ?? null;
       
        $subcategories = $Subcategory->getList()['results'];
        $this->view->addVar('subcategories', $subcategories);
        $this->view->render('subcategory/index.php');  
    }

    /**
     * Выводит на экран форму для создания новой подкатегории (только для Администратора)
     */
    public function addAction()
    {
        $Url = Config::get('core.url.class');
        if (!empty($_POST)) {   
            if (!empty($_POST['saveNewSubcategory'])) {
                              
                $Subcategory = new Subcategory();
                $newSubcategory = $Subcategory->loadFromArray($_POST);
                $newSubcategory->insert(); 
                $this->redirect($Url::link("admin/subcategory/index")); 
            }
            
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/subcategory/index ")); 
            }
        }
            else {
                
                $category = new Category();
                $categories = $category->getList()['results'];
                
                $addSubcategory = "Добавление подкатегории";
                $this->view->addVar('categories', $categories);
                $this->view->addVar('addSubcategory', $addSubcategory);
                $this->view->render('subcategory/add.php');
            }
    }
   
    /**
     * Выводит на экран форму для редактирования подкатегории (только для Администратора)
     */
    public function editAction()
    {
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        if (!empty($_POST)) { // это выполняется нормально.
            if (!empty($_POST['saveChanges'] )) {
                $subcategory = new Subcategory ();
                $newSubcategory = $subcategory->loadFromArray($_POST);
                $newSubcategory->update();
                $this->redirect($Url::link("admin/subcategory/index"));
            }
            
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/subcategory/index"));
            }
        }
        
            else {
                
            $category = new Category();
            $categories = $category->getList()['results'];    
                
            $subcategory = new Subcategory();
            $viewSubcategory = $subcategory->getById($id);
            
            $editSubcategory = "Редактирование данных подкатегории";
            
            $this->view->addVar('categories', $categories);
            $this->view->addVar('viewSubcategory', $viewSubcategory);
            $this->view->addVar('editSubcategory', $editSubcategory);
            $this->view->render('subcategory/edit.php'); 
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
            if (!empty($_POST['deleteSubcategory'])) {
                $Subcategory = new Subcategory();
                $newSubcategory = $Subcategory->loadFromArray($_POST);
                $newSubcategory->delete();
                
                $this->redirect($Url::link("admin/subcategory/index"));
              
            }
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/subcategory/edit&id=$id"));
            }
        }
        
        else {
            
            $Subcategory = new Subcategory();
            $deletedSubcategory = $Subcategory->getById($id);
            $deleteSubcategory = "Удаление подкатегории";
          
            $this->view->addVar('deleteSubcategory', $deleteSubcategory);
            $this->view->addVar('deletedSubcategory', $deletedSubcategory);     
            $this->view->render('subcategory/delete.php');
        }
    }
}