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
        // Construtor vazio
        public function __construct() {

        }

        // Construtor com todos
        public function __constructTodos($dataAtual, $dataEntrada, $dataSaida) {
            $this->dataAtual = $dataAtual;
            $this->dataEntrada = $dataEntrada;
            $this->dataSaida = $dataSaida;
        }


        // Métodos
        // Pega a data atual
        public static function getDataRecente() {
            // Objeto da data atual
            $dataAtual = new DateTime();

            // Formatando e retornando a data atual
            return $dataAtual->format('d-m-Y');
        }

        // Pega a data minima para realizar uma reserva
        public static function getDataMinima() {
            // Pegando a data atual
            $dataAtual = new DateTime();

            // Pegando a data minima
            $dataMinima = $dataAtual->add(new DateInterval('P4D'));

            // Formatando e retornando a data minima
            return $dataMinima->format('Y-m-d h:i');
        }

        // Pega a data maxima para realizar uma reserva
        public static function getDataMaxima() {
            // Pegando a data atual
            $dataAtual = new DateTime();

            // Pegando a data maxima
            $dataMaxima = $dataAtual->add(new DateInterval('P1Y'));

            // Formatando e retornando a data maxima
            return $dataMaxima->format('Y-m-d h:i');
        }

        // Pega um array com data de inicio e de fim para mostrar os intervalos de datas indisponiveis
        public static function getIntervaloDataIndisponivel() {
            // Conexão com o banco
            include '../connection/connect.php';
            
            // Inicializando um array
            $listaDeDatas = array();

            // Consulta das datas indisponiveis
            $lista = $connect->query("SELECT * FROM dataQuartoIndisponivel WHERE STATUS = 'PENDENTE';");
            
            // Laço para pegar esse intervalo de datas 
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

            // Retornando a lista de datas
            return $listaDeDatas;
        }

        // Pega a data maxima para poder alterar uma reserva
        public static function getDataMaximoAlterar(int $id) : DateTime {
            // Conexão com o banco
            include '../connection/connect.php';

            // Consulta da data de inicio de reserva
            $lista = $connect->query("SELECT * FROM ClientePedidoReservas WHERE ID_PEDIDO = $id;");
            $dados = $lista->fetch_assoc();
            $dataEntradaStr = $dados['PEDIDO_DATA_ENTRADA'];

            // Converte a string em um objeto DateTime
            $dataEntrada = DateTime::createFromFormat('Y-m-d H:i:s', $dataEntradaStr); 

            $intervalo = (new DateInterval('P3D'));
            // Subtrai o intervalo de 3 dias da cópia
            $dataMaxima  = $dataEntrada->sub($intervalo); 

            // Fecha a conexão com o banco
            $connect->close(); 

            // Retornando um objeto DateTime da data maxima
            return $dataMaxima;
        }

        // Valida o total de estadia na reserva
        public static function getDataIntervaloEstadia(DateTime $dataInicio, DateTime $dataFim) {
            // Calcula a diferença entre as duas datas como um objeto DateInterval
            $diferenca = $dataInicio->diff($dataFim); 
            // Obtém o número de dias de diferença entre as duas datas
            $quantidadeDias = $diferenca->days; 
            
            // Verifica a quantidade de dias
            if ($quantidadeDias > 14) {
                return false;
            } else {
                return true;
            }
        }
    }
?>