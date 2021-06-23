<?php 
    class Alugam {
        //Atributos da classe
        private $data_do_aluguel;
        private $qtnd_tempo;
        private $data_devolucao;
        private $id_usuario;
        private $id_bicicleta;

        // Métodos Getters e Setters da classe
        public function getDataDoAluguel() {
            return $this->$data_do_aluguel;
        }

        public function setDataDoAluguel($data_do_aluguel) {
            $this->data_do_aluguel = $data_do_aluguel;

        }

        public function getQtndTempo() {
            return $this->qtnd_tempo;
        }

        public function setQtndTempo($qtnd_tempo) {
            $this->qtnd_tempo = $qtnd_tempo;
        } 

        public function getDataDevolucao() {
            return $this->data_devolucao;
        }

        public function setDataDevolucao($data_devolucao) {
            $this->data_devolucao = $data_devolucao;
        }

        public function getIdUsuario() {
            return $this->id_usuario;
        }

        public function setIdUsuario($id_usuario) {
            $this->id_usuario = $id_usuario;
        }

        public function getIdBicicleta() {
            return $this->id_bicicleta;
        }

        public function setIdBicicleta($id_bicicleta) {
            $this->id_bicicleta = $id_bicicleta;
        }

    }
?>