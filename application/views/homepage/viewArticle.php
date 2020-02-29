<div class="row">
    <div class="col">
        
<style>
   li {
    list-style-type: none; /* Убираем маркеры */
    padding: 5px;
   }
</style>
      
    <ul>
        <li>
            <span><h1><?= $viewArticle->title ?></h1></span>
            <span><b>Дата публикации:  </b><?= $viewArticle->timestamp ?></span>
        </li>
        <li><b>Категория:  </b><?= $viewArticle->category ?></li>
        <li><b>Подкатегория:  </b><?= $viewArticle->subcategory ?></li>
        <li><b>Автор:  </b><?= $viewArticle->author_login ?></li>
        <li><?= $viewArticle->content ?></li>
    </ul> 
         
    </div>
</div>