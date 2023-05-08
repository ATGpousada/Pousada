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
        public static function getDataRecente() {
            $dataAtual = new DateTime();
            return $dataAtual->format('d-m-Y');
        }

        public static function getDataMinima() {
            $dataAtual = getDataRecente();

            $dataMinima = $dataAtual->add(new DateInterval('P4D'));
            return $dataMinima->format('d-m-Y');
        }

        public static function getDataMaxima() {
            $dataAtual = getDataRecente();

            $dataMaxima = $dataAtual->add(new DateInterval('P1Y'));
            return $dataMaxima->format('d-m-Y');
        }

        public static function getIntervaloDataIndisponivel() {
            // Conexão com o banco
            include '../connection/connect.php';
            
            $listaDeDatas = array();

            $lista = $connect->query("SELECT * FROM dataQuartoIndisponivel WHERE STATUS = 'EM ANDAMENTO';");
            
            while ($row = $lista->fetch_assoc()) {
                $dataEntrada = $row['DATA_ENTRADA'];
                $dataSaida = $row['DATA_SAIDA'];
            
                // Cria um array secundário com as datas
                $listaDeDatasSecundaria = array(
                    "dataEntrada" => $dataEntrada,
                    "dataSaida" => $dataSaida
                );
            
                // Adiciona o array secundário ao array principal
                $listaDeDatas[] = $listaDeDatasSecundaria;
            }
        

            return $listaDeDatas;
        }

        public static function getDataMinimaAlterar(int $int) {
            
        }

        public static function getDataIntervaloEstadia() {
            
        }
    }

    // Teste
    $aaa = new DataVerifica();

    $bbb = $aaa->getDataRecente();
    echo $bbb;
    echo '<br>';

    $bbb = $aaa->getDataMinima();
    echo $bbb;
    echo '<br>';

    $bbb = $aaa->getDataMaxima();
    echo $bbb;
    echo '<br>';

    $bbb = $aaa->getIntervaloDataIndisponivel();
    print_r($bbb);

?>