<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class BookView{
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); //inicializo smarty
    }

    function showBooks($books, $authors) {
        //asigno variables al tpl smarty
        $this->smarty->assign('authors', $authors);
        $this->smarty->assign('books', $books);
        //mostrar el tpl
        $this->smarty->display('bookList.tpl');
    }
    function showEditBooks($books, $authors){
        $this->smarty->assign('authors', $authors);
        $this->smarty->assign('books', $books);
        $this->smarty->display('showEditBooks.tpl');
    }
    function showFilter($filters, $name, $authors){
        $this->smarty->assign('name', $name); 
        $this->smarty->assign('filters', $filters);
        $this->smarty->assign('authors', $authors);
        $this->smarty->display('filterView.tpl');
    }
    function showDetail($detail, $authors){
        $this->smarty->assign('authors', $authors);
        $this->smarty->assign('detail', $detail);
        $this->smarty->display('showDetail.tpl');
    }
}