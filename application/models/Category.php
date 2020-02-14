<?php

namespace application\models;

class Category extends BaseExampleModel
{
    /** 
     * Имя таблицы статей
     */
    public $tableName = 'categories';
    
    /**
     * @var string Критерий сортировки строк таблицы
     */
    public $orderBy = 'id DESC';
      
    /**
     * Название категории
     * @var type 
     */
    public $title = null;
    
    /**
     * Описание категории
     * @var type 
     */
    public $description = null;
       
    /**
     * id категории
     * @var type 
     */
    public $id =  null;
     

    public function insert()
    {
        $sql = "INSERT INTO $this->tableName (title, description) VALUES (:title,"
                . ":description)"; 
        $st = $this->pdo->prepare ( $sql );
        $st->bindValue( ":title", $this->title, \PDO::PARAM_STR);
        $st->bindValue( ":description", $this->description, \PDO::PARAM_STR);
        $st->execute();
        $this->id = $this->pdo->lastInsertId();
    }

    /**
    * Обновляем текущий объект статьи в базе данных
    */
    
    public function update()
    {
        $sql = "UPDATE $this->tableName SET title=:title, description=:description, id=:id"
                . "WHERE id=:id";  
        $st = $this->pdo->prepare ( $sql );
        $st->bindValue( ":title", $this->title, \PDO::PARAM_STR);
        $st->bindValue( ":description", $this->description, \PDO::PARAM_STR);
        $st->bindValue( ":id", $this->id, \PDO::PARAM_INT );
        $st->execute();
    }
    
}