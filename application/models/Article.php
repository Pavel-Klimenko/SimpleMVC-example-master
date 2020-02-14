<?php

namespace application\models;

class Article extends BaseExampleModel
{
    /**
     * Имя таблицы статей
     */
    public $tableName = 'articles';
    
    /**
     * @var string Критерий сортировки строк таблицы
     */
    public $orderBy = 'timestamp DESC';
      
    /**
     * Дата публикации статьи
     * @var type 
     */
    public $timestamp = null;
    
    /**
     * Заголовок статьи
     * @var type 
     */
    public $title = null;
    
    /**
     * Краткое содержание статьи
     * @var type 
     */
    public $summary = null;
    
     /**
     * Категория к которой относится данная статья
     * @var type 
     */
    public $category = null;
    
     /**
     * Подкатегория к которой относится данная статья
     * @var type 
     */
    public $subcategory = null;
    
    /**
     * Авторы статьи
     * @var type 
     */
    public $author_login = null;
     
    /**
     * Основное содержание статьи
     * @var type 
     */
    public $content = null;
    
    /**
     * ID статьи
     * @var type 
     */
    public $id =  null;
     
    /**
     * Активность статьи
     * @var type 
     */
    public $activity = null;
    
    /**
     * Добавляем новую статью
     */
    public function insert()
    {
        $sql = "INSERT INTO $this->tableName (timestamp, title, summary, author_login, category, subcategory,"
                . "content, activity) VALUES (:timestamp, :title, :summary, :author_login, :category, :subcategory,"
                . ":content, :activity)"; 
        $st = $this->pdo->prepare ( $sql );
        $st->bindValue( ":timestamp", (new \DateTime('NOW'))->format('Y-m-d H:i:s'), \PDO::PARAM_STMT);
        $st->bindValue( ":title", $this->title, \PDO::PARAM_STR );
        $st->bindValue( ":author_login", $this->author_login, \PDO::PARAM_STR );
        $st->bindValue( ":summary", $this->summary, \PDO::PARAM_STR );
        $st->bindValue( ":category", $this->category, \PDO::PARAM_STR );
        $st->bindValue( ":subcategory", $this->subcategory, \PDO::PARAM_STR ); 
        $st->bindValue( ":content", $this->content, \PDO::PARAM_STR );
        $st->bindValue( ":activity", $this->activity, \PDO::PARAM_INT );
        $st->execute();
        $this->id = $this->pdo->lastInsertId();
        
    }
    
    
    /**
    * Обновляем текущий объект статьи в базе данных
    */
    public function update()
    {
        $sql = "UPDATE $this->tableName SET timestamp=:timestamp, title=:title, category:=category, subcategory:=subcategory,"
                . "summary=:summary, content=:content, activity=:activity, author_login=:author_login,"
                . "id=:id  WHERE id = :id";  
        $st = $this->pdo->prepare ( $sql );
        $st->bindValue( ":timestamp", (new \DateTime('NOW'))->format('Y-m-d H:i:s'), \PDO::PARAM_STMT);
        $st->bindValue( ":title", $this->title, \PDO::PARAM_STR );
        $st->bindValue( ":author_login", $this->author_login, \PDO::PARAM_STR);
        $st->bindValue( ":summary", $this->summary, \PDO::PARAM_STR );
        $st->bindValue( ":category", $this->category, \PDO::PARAM_STR );
        $st->bindValue( ":subcategory", $this->subcategory, \PDO::PARAM_STR ); 
        $st->bindValue( ":content", $this->content, \PDO::PARAM_STR );
        $st->bindValue( ":activity", $this->activity, \PDO::PARAM_INT );
        $st->bindValue( ":id", $this->id, \PDO::PARAM_INT );
        $st->execute();
          
    }
      
}

