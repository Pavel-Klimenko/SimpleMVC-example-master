<?php

namespace application\models;

class Subcategory extends BaseExampleModel
{
    /**
     * Имя таблицы подкатегорий
     */
    
    public $tableName = 'subcategories';
    
    /**
     * @var string Критерий сортировки строк таблицы
     */
    
    public $orderBy = 'id DESC';
      
    /**
     * Название подкатегории
     * @var type 
     */
    
    public $title = null;
    
    /**
     * Описание подкатегории
     * @var type 
     */
    
    public $description = null;
    
     /**
     * Категория к которой относится данная подкатегория
     * @var type 
     */
    
    public $category_id = null;
       
    /**
     * id подкатегории
     * @var type 
     */
    public $id =  null;
    

    public function insert()
    {
        $sql = "INSERT INTO $this->tableName (title, description, category_id) VALUES (:title,"
                . ":description, :category_id)"; 
        $st = $this->pdo->prepare ( $sql );
        $st->bindValue( ":title", $this->title, \PDO::PARAM_STR);
        $st->bindValue( ":description", $this->description, \PDO::PARAM_STR);
        $st->bindValue( ":category_id", $this->category_id, \PDO::PARAM_INT);
        $st->execute();
        $this->id = $this->pdo->lastInsertId();
    }

    /**
    * Обновляем текущий объект подкатегории в базе данных
    */
    
   
    public function update()
    {
        $sql = "UPDATE $this->tableName SET title=:title, description=:description, category_id=:category_id, id=:id WHERE id = :id";  
        $st = $this->pdo->prepare ( $sql );
        $st->bindValue( ":title", $this->title, \PDO::PARAM_STR);
        $st->bindValue( ":description", $this->description, \PDO::PARAM_STR);
        $st->bindValue( ":category_id", $this->category_id, \PDO::PARAM_INT);
        $st->bindValue( ":id", $this->id, \PDO::PARAM_INT );
        $st->execute();
    }
    
}