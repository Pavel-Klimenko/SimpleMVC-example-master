<?php
namespace application\controllers\admin;
use application\models\Article;
use application\models\Category;
use application\models\Subcategory;
use application\models\Adminusers;
use ItForFree\SimpleMVC\Config;

/**
 *
 */
class ArticleController extends \ItForFree\SimpleMVC\mvc\Controller
{
    public $layoutPath = 'admin-main.php';
      
    public function indexAction()
    {
        $Article = new Article();
        $articleId = $_GET['id'] ?? null;
        
        if ($articleId) { // если не указана конкретная статья
            $viewArticle = $Article->getById($_GET['id']);
            $this->view->addVar('viewArticle', $viewArticle);
            $this->view->render('article/view-item.php');
        } else { // выводим полный список
            $articles = $Article->getList()['results'];
            $this->view->addVar('articles', $articles);
            $this->view->render('article/index.php');
        }
    }

    /**
     * Выводит на экран форму для создания новой статьи (только для Администратора)
     */

    public function addAction()
    {
        $Url = Config::get('core.url.class');
        if (!empty($_POST)) {   
            if (!empty($_POST['saveNewArticle'])) {
                $Article = new Article();
                $newArticle = $Article->loadFromArray($_POST);
                $newArticle->insert();
                $this->redirect($Url::link("admin/article/index")); 
            }
            
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/article/index ")); 
            }
        }
            else {
                

                $Category = new Category();
                $categories= $Category->getList()['results'];
                
                $Subcategory = new Subcategory();
                $subcategories= $Subcategory->getList()['results'];
                
                $Adminusers = new Adminusers();
                $authors = $Adminusers->getList()['results'];
                
                $addArticleTitle = "Добавление статьи";
                $this->view->addVar('categories', $categories);
                $this->view->addVar('subcategories', $subcategories);
                $this->view->addVar('authors', $authors);
                $this->view->addVar('addArticleTitle', $addArticleTitle);
                $this->view->render('article/add.php');
            }
    }
    
    /**
     * Выводит на экран форму для редактирования статьи (только для Администратора)
     */
    public function editAction()
    {
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        if (!empty($_POST)) { // это выполняется нормально.
            if (!empty($_POST['saveChanges'] )) {
                $Article = new Article();
                $newArticle = $Article->loadFromArray($_POST);
                $newArticle->update();
                $this->redirect($Url::link("admin/article/index"));
            } 
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/article/index"));
            }
        }
        
            else {
                
            $Article = new Article();
            $viewArticle = $Article->getById($id);
            
            $Adminusers = new Adminusers();
            $authors = $Adminusers->getList()['results'];
            
            $Category = new Category();
            $categories= $Category->getList()['results'];
                
            $Subcategory = new Subcategory();
            $subcategories= $Subcategory->getList()['results'];
            
            $editArticle = "Редактирование данных статьи";
            
            $this->view->addVar('categories', $categories);
            $this->view->addVar('subcategories', $subcategories);
            $this->view->addVar('authors', $authors);
            $this->view->addVar('viewArticle', $viewArticle);
            $this->view->addVar('editArticle', $editArticle);
            $this->view->render('article/edit.php'); 
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
            if (!empty($_POST['deleteArticle'])) {
                $Article = new Article();
                $newArticle = $Article->loadFromArray($_POST);
                $newArticle->delete();
                
                $this->redirect($Url::link("admin/article/index")); 
                //$this->redirect($Url::link("archive/allArticles"));
              
            }
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/article/edit&id=$id"));
            }
        }
        else {
            
            $Article = new Article();
            $deletedArticle = $Article->getById($id);
            $deleteArticleTitle = "Удаление статьи";
          
            $this->view->addVar('deleteArticleTitle', $deleteArticleTitle);
            $this->view->addVar('deletedArticle', $deletedArticle);     
            $this->view->render('article/delete.php');
        }
    }
}

