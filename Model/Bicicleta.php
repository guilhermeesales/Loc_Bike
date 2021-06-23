<?php 
    class Bicicleta {
        // Atributos da classe
        private $id;
        private $nome_modelo;
        private $preco;
        private $foto;
        private $descricao;

        // Métodos Getters e Setters da classe
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNomeModelo() {
            return $this->nome_modelo;
        }

        public function setNomeModelo($nome_modelo) {
            $this->nome_modelo = $nome_modelo;
        }

        public function getPreco() {
            return $this->preco;
        }

        public function setPreco($preco) {
            $this->preco = $preco;
        }

        public function getFoto() {
            return $this->foto;
        }

        public function setFoto($foto) {
            $this->foto = $foto;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

    }
?>