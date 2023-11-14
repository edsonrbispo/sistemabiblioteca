<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Livro.php";

class LivroController
{

    private $livroModel;

    public function __construct()
    {
        $this->livroModel = new Livro();
    }

    public function listarLivros()
    {
        return $this->livroModel->listar();
    }

    public function cadastrarLivro()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'numero_pagina' => $_POST['numero_pagina'],
                'preco' => $_POST['preco'],
                'ano_publicacao' => $_POST['ano_publicacao'],
                'isbn' => $_POST['isbn']
            ];

            $this->livroModel->cadastrar($dados);

            header('Location: index.php');
            exit;
        }
    }

    public function editarLivro()
    {
        $id_livro = $_GET['id_livro'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $dados = [
                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'numero_pagina' => $_POST['numero_pagina'],
                'preco' => $_POST['preco'],
                'ano_publicacao' => $_POST['ano_publicacao'],
                'isbn' => $_POST['isbn']
            ];

            $this->livroModel->editar($id_livro, $dados);
            header('Location: index.php');
            exit;
        }

        return $this->livroModel->buscar($id_livro);
    }

    public function excluirLivro()
    {
        $this->livroModel->excluir($_GET['id_livro']);
        header('Location: index.php');
        exit;
    }
}
