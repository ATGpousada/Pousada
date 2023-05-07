<?php 
    // Classe para verificar data
    class DataVerifica {
        // Atributos
        private $dataAtual;
        private $dataEntrada;
        private $dataSaida;


        // Getters e setters (Propriedades)
        public function getDataAtual(): string {
            return $this->dataAtual;
        }

        public function setDataAtual(string $dataAtual) {
            $this->dataAtual = $dataAtual;
        }

        public function getDataEntrada(): string {
            return $this->dataEntrada;
        }

        public function setDataEntrada(string $dataEntrada) {
            $this->dataEntrada = $dataEntrada;
        }

        public function getDataSaida(): string {
            return $this->dataSaida;
        }

        public function setDataSaida(string $dataSaida) {
            $this->dataSaida = $dataSaida;
        }


        // Métodos construtores
        public function __construct() {

        }

        public function __constructTodos($dataAtual, $dataEntrada, $dataSaida) {
            $this->dataAtual = $dataAtual;
            $this->dataEntrada = $dataEntrada;
            $this->dataSaida = $dataSaida;
        }


        // Métodos
        
    }
?>