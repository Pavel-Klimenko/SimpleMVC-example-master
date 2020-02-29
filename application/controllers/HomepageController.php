<?php
namespace application\controllers;
use application\models\Article;

class HomepageController extends \ItForFree\SimpleMVC\mvc\Controller
{
    /**
     * @var string Название страницы
     */
    public $homepageTitle = "Домашняя страница";
    
    public $layoutPath = 'main.php';
    
        
    /**
     * Выводит на экран страницу "Домашняя страница"
     */
    public function indexAction()
    { 
        $Article = new Article();
        $articles = $Article->getList()['results'];
        $this->view->addVar('articles', $articles);
        
        $this->view->addVar('homepageTitle', $this->homepageTitle); // передаём переменную по view
        $this->view->render('homepage/index.php');
    }
    
    function viewArticleAction()
    {   
        $Article = new Article();
        $articleId = $_GET['id'] ?? null;
        
        if ($articleId) { // если указана конкретная статья
            $viewArticle = $Article->getById($_GET['id']);
            $this->view->addVar('viewArticle', $viewArticle);
            $this->view->render('homepage/viewArticle.php');

        }
    }
  
}

