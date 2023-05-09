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
            $dataAtual = new DateTime();

            $dataMinima = $dataAtual->add(new DateInterval('P4D'));
            return $dataMinima->format('d-m-Y');
        }

        public static function getDataMaxima() {
            $dataAtual = new DateTime();

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
        
            // Fecha a conexão com o banco
            $connect->close(); 

            return $listaDeDatas;
        }

        public static function getDataMinimaAlterar(int $id) : DateTime {
            // Conexão com o banco
            include '../connection/connect.php';

            $lista = $connect->query("SELECT * FROM ClientePedidoReservas WHERE ID_PEDIDO = $id;");
            $dados = $lista->fetch_assoc();
            $dataEntradaStr = $dados['PEDIDO_DATA_ENTRADA'];

            // Converte a string em um objeto DateTime
            $dataEntrada = DateTime::createFromFormat('Y-m-d H:i:s', $dataEntradaStr); 

            $intervalo = (new DateInterval('P3D'));
            // Subtrai o intervalo de 3 dias da cópia
            $dataMinima  = $dataEntrada->sub($intervalo); 

            // Fecha a conexão com o banco
            $connect->close(); 

            return $dataMinima;
        }

        public static function getDataIntervaloEstadia(DateTime $dataInicio, DateTime $dataFim) {
            // Calcula a diferença entre as duas datas como um objeto DateInterval
            $diferenca = $dataInicio->diff($dataFim); 
            // Obtém o número de dias de diferença entre as duas datas
            $quantidadeDias = $diferenca->days; 
            
            if ($quantidadeDias > 14) {
                return false;
            } else {
                return true;
            }
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
    echo '<br>';

    $bbb = $aaa->getDataMinimaAlterar(1);
    print_r($bbb);
    echo '<br>';

    $dataInicio = DateTime::createFromFormat('Y-m-d', '2023-05-10');
    $dataFim = DateTime::createFromFormat('Y-m-d', '2023-05-15'); 
    
    $bbb = $aaa->getDataIntervaloEstadia($dataInicio, $dataFim);
    print_r($bbb);
    echo '<br>';
?>