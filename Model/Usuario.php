<?php 
    class Usuario {
        // Atributos da classe
        private $id;
        private $nome_completo;
        private $email;
        private $senha;
        private $foto;
        private $data_nascimento;
        private $cpf;
        private $endereco_e_numero;
        private $isadmin;
        private $bairro;
        private $cidade;

        // Métodos Getters e Setters
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        } 

        public function getNomeCompleto() {
            return $this->nome_completo;
        }

        public function setNomeCompleto($nome_completo) {
            $this->nome_completo = $nome_completo;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getSenha() {
            return $this->senha;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }

        public function getFoto() {
            return $this->foto;
        }

        public function setFoto($foto) {
            $this->foto = $foto;
        }

        public function getDataNascimento() {
            return $this->data_nascimento;
        }

        public function setDataNascimento($data_nascimento) {
            $this->data_nascimento = $data_nascimento;
        }

        public function getCpf() {
            return $this->cpf;
        }

        public function setCpf($cpf) {
            $this->cpf = $cpf;
        }

        public function getEnderecoENumero() {
            return $this->endereco_e_numero;
        }

        public function setEnderecoENumero($endereco_e_numero) {
            $this->endereco_e_numero = $endereco_e_numero;
        }

        public function getIsAdmin() {
            return $this->isadmin;
        }

        public function setIsAdmin($isadmin) {
            $this->isadmin = $isadmin;
        }

        public function getBairro() {
            return $this->bairro;
        }

        public function setBairro($bairro) {
            $this->bairro = $bairro;
        }

        public function getCidade() {
            return $this->cidade;
        }

        public function setCidade($cidade) {
            $this->cidade = $cidade;
        }
    }
?>