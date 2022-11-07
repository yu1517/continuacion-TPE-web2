<?php
require_once './app/models/book.model.php';
require_once './app/views/book.view.php';
require_once './app/models/author.model.php';
require_once './app/helper/auth.helper.php';



class BookController{

    private $model;
    private $view;
    private $modelAuthor;//voy a poder vincular el modelos de las dos tablas 

    function __construct(){
        //instancio el modelo y la vista 
        $this->model = new BookModel();
        $this->view = new BookView();
        $this->modelAuthor = new AuthorModel();

        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        } 
    }

    //Imprime la lista de tareas 
    public function showBooks(){
        
        //obtiene las tareas del modelo
        $books = $this->model->getAllBooks();
        $modelAuthor = $this->modelAuthor->getAllAuthors();
        //actualizo la vista
        $this->view->showBooks($books, $modelAuthor);
    }

    public function showDetail($id){        
        $modelAuthor = $this->modelAuthor->getAllAuthors();
        $detail = $this->modelAuthor->getRegisterAuthorById2($id);
        $this->view->showDetail($detail, $modelAuthor);
    }

    function addBook() {
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        
        if((isset($_POST['titulo'])&&isset($_POST['genero']))&&isset($_POST['id_author'])&&!empty($_POST['titulo'])&&!empty($_POST['genero'])&&!empty($_POST['id_author'])){
        // TODO: validar entrada de datos
        $title = $_POST['titulo'];
        $genre = $_POST['genero'];
        $id_author = $_POST['id_author'];
        //agrego imagen
            if ($_FILES['input_name']['type'] =="image/jpg" ||
                $_FILES['input_name']['type'] =="image/jpeg"||
                $_FILES['input_name']['type'] =="image/png" ){
                $this->model->insertBook($title, $genre, $id_author, $_FILES['input_name']['tmp_name']);
                }
                else{
                    $id = $this->model->insertBook($title, $genre, $id_author);
                }
                header("Location: " . BASE_URL. 'book');
        }
    }

    function  showEditBook($id){
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        $books = $this->model->getRegisterBookById($id);
        $author = $this->modelAuthor->getRegisterAuthorById($id);
        $this->view->showEditBooks($books, $author);
    }

    function insertEditBook($id){
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        if((isset($_POST['titulo'])&&isset($_POST['genero']))&&isset($_POST['id_author'])&&!empty($_POST['titulo'])&&!empty($_POST['genero'])&&!empty($_POST['id_author'])){      
            $title = $_POST['titulo'];
            $genre = $_POST['genero'];

            $this->model->insertEditBook($title, $genre, $id);
            header("Location: " . BASE_URL. 'book');
        }
    }

    function deleteBooks($id) {
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        $this->model->deleteBookById($id);
    }
    public function filterCategory($id){
        $name = $this->modelAuthor->getNameById($id);
        $filters = $this->model->getFilter($id);
        $authors = $this->modelAuthor->getAllAuthors();
        $this->view->showFilter($filters, $name, $authors);
    }
}