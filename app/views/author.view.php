<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class AuthorView{
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); //inicializo smarty
    }

    function showAuthors($authors) {
        
        //asigno variables al tpl smarty
        $this->smarty->assign('authors', $authors);
        //mostrar el tpl
        $this->smarty->display('authorList.tpl');
    }

    function showEditAuthor($authors){
        $this->smarty->assign('authors', $authors); 
        $this->smarty->display('showEditAuthor.tpl');
    }
}