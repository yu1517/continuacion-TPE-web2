<?php
require_once './app/models/book.model.php';
require_once './api/apiView.php';


class ApiBookController {
    private $model;
    private $view;
    private $data;

    function __construct(){
        $this->model = new BookModel();
        $this->view = new ApiView();
        $this->data = file_get_contents('php://input');
    }

    public function getBooks($params = null){
        $books = $this->model->getAllBooks();
        $this->view->response($books);
    }

    public function getBook($params = null){
        // obtengo el id del arreglo de params
        $id = $params[':ID'];
        $book = $this->model->getBook($id);
        
        if ($book)
        $this->view->response($book);
        else
        $this->view->response("Book id=$id not found", 404);
        
    }

    public function removeBook($params = null) {
        $id = $params[':ID'];

        $book = $this->model->getBook($id);
        if ($book) {
            $this->model->deleteBookById($id);
            $this->view->response($book);
        } else 
            $this->view->response("El libro con el id=$id no existe", 404);
    }

    private function getData(){
        return json_decode($this->data);
    }

    public function addBook($params = null){
        $data = $this->getData();

        $title = $data->$title;
        $genre = $data->$genre;
        $author = $data->$id_author;

        $id = $this->model->insertBook($data->$title, $data->$genre, $data->$id_author);
        $book = $this->model->getBook($id);
        if($book)
            $this->view->response($book, 200);
        else
            $this->view->response("El libro no se pudo crear", 500);
    }
}