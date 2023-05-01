-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema pousada
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pousada
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pousada` DEFAULT CHARACTER SET utf8 ;
USE `pousada` ;

-- -----------------------------------------------------
-- Table `pousada`.`cargos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`cargos` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(45) NOT NULL,
  `DESCRICAO` TEXT NOT NULL,
  `ARQUIVAR_EM` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`clientes` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(70) NOT NULL,
  `CPF` VARCHAR(14) NOT NULL,
  `RG` VARCHAR(12) NOT NULL,
  `SENHA` VARCHAR(32) NOT NULL,
  `EMAIL` VARCHAR(70) NOT NULL,
  `RECUPERAR_SENHA` VARCHAR(100) NULL DEFAULT NULL,
  `ARQUIVAR_EM` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `EMAIL_UNIQUE` (`EMAIL` ASC),
  UNIQUE INDEX `CPF_UNIQUE` (`CPF` ASC),
  UNIQUE INDEX `RG_UNIQUE` (`RG` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`cartoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`cartoes` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `NOME_TITULAR` VARCHAR(45) NOT NULL,
  `NUMERO` VARCHAR(16) NOT NULL,
  `VALIDADE` VARCHAR(7) NOT NULL,
  `CVV` VARCHAR(3) NOT NULL,
  `TIPO` VARCHAR(12) NOT NULL,
  `clientes_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_cartoes_clientes1_idx` (`clientes_ID` ASC),
  CONSTRAINT `fk_cartoes_clientes1`
    FOREIGN KEY (`clientes_ID`)
    REFERENCES `pousada`.`clientes` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`enderecos_cli`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`enderecos_cli` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `CEP` VARCHAR(9) NOT NULL,
  `CIDADE` VARCHAR(30) NOT NULL COMMENT 'Pensando que o sistema atendera no máximo o BRASIL, a cidade tem varchar de 30 pois o muncipio brasileiro com o nome mais comprido é: São José do Vale do Rio Preto no estado do Rio de Janeiro.',
  `UF` VARCHAR(2) NOT NULL,
  `cliente_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_endereco_cli_cliente1_idx` (`cliente_ID` ASC),
  CONSTRAINT `fk_endereco_cli_cliente1`
    FOREIGN KEY (`cliente_ID`)
    REFERENCES `pousada`.`clientes` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`funcionarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`funcionarios` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(70) NOT NULL,
  `DATA_NASC` DATE NOT NULL,
  `CPF` VARCHAR(14) NOT NULL,
  `RG` VARCHAR(12) NOT NULL,
  `SALARIO` DOUBLE(7,2) NOT NULL,
  `EMAIL` VARCHAR(70) NOT NULL,
  `SENHA` VARCHAR(32) NOT NULL,
  `PERIODO` VARCHAR(20) NOT NULL,
  `ADMISSAO` DATETIME NOT NULL,
  `DEMISSAO` DATETIME NULL DEFAULT NULL,
  `cargos_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `CPF_UNIQUE` (`CPF` ASC),
  UNIQUE INDEX `RG_UNIQUE` (`RG` ASC),
  UNIQUE INDEX `EMAIL_UNIQUE` (`EMAIL` ASC),
  UNIQUE INDEX `SENHA_UNIQUE` (`SENHA` ASC),
  INDEX `fk_funcionarios_cargos1_idx` (`cargos_ID` ASC),
  CONSTRAINT `fk_funcionarios_cargos1`
    FOREIGN KEY (`cargos_ID`)
    REFERENCES `pousada`.`cargos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE `pousada`.`funcionarios` 
CHANGE COLUMN `ADMISSAO` `ADMISSAO` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ;


-- -----------------------------------------------------
-- Table `pousada`.`enderecos_func`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`enderecos_func` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `LOGRADOURO` VARCHAR(70) NOT NULL,
  `NUMERO` VARCHAR(5) NOT NULL,
  `CEP` VARCHAR(9) NOT NULL,
  `BAIRRO` VARCHAR(30) NOT NULL,
  `CIDADE` VARCHAR(30) NOT NULL,
  `UF` VARCHAR(2) NOT NULL,
  `funcionario_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_endereco_func_funcionario1_idx` (`funcionario_ID` ASC),
  CONSTRAINT `fk_endereco_func_funcionario1`
    FOREIGN KEY (`funcionario_ID`)
    REFERENCES `pousada`.`funcionarios` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`formas_pagamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`formas_pagamentos` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `TIPO` VARCHAR(12) NOT NULL COMMENT 'o tipo do pagamento será: credito, debito, boleto, dinheiro e dois cartões. por isso varchar de 12',
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`historicos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`historicos` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `LOGS` TEXT NOT NULL,
  `DATA_HORA` DATETIME NOT NULL,
  `funcionarios_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_historicos_funcionarios1_idx` (`funcionarios_ID` ASC),
  CONSTRAINT `fk_historicos_funcionarios1`
    FOREIGN KEY (`funcionarios_ID`)
    REFERENCES `pousada`.`funcionarios` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`status` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `STATUS` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`tipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`tipos` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `TIPO` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`quartos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`quartos` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `QUARTO` VARCHAR(45) NOT NULL,
  `DESCRICAO` TEXT NOT NULL,
  `PRECO_DIARIA` DOUBLE(6,2) NOT NULL,
  `QTDE_PESSOAS` INT(11) NOT NULL,
  `DESTAQUE` BIT(1) NOT NULL,
  `ARQUIVAR_EM` DATETIME NULL DEFAULT NULL,
  `status_ID` INT(11) NOT NULL,
  `tipos_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_quartos_status1_idx` (`status_ID` ASC),
  INDEX `fk_quartos_tipos1_idx` (`tipos_ID` ASC),
  CONSTRAINT `fk_quartos_status1`
    FOREIGN KEY (`status_ID`)
    REFERENCES `pousada`.`status` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_quartos_tipos1`
    FOREIGN KEY (`tipos_ID`)
    REFERENCES `pousada`.`tipos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`imagens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`imagens` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `IMAGEM_CAMINHO_1` VARCHAR(100) NOT NULL,
  `IMAGEM_CAMINHO_2` VARCHAR(100) NOT NULL,
  `quartos_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_imagens_quartos_idx` (`quartos_ID` ASC),
  CONSTRAINT `fk_imagens_quartos`
    FOREIGN KEY (`quartos_ID`)
    REFERENCES `pousada`.`quartos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 24
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`pedidos_reservas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`pedidos_reservas` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `DATA_RESERVA` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
  `DATA_ENTRADA` DATETIME NOT NULL,
  `DATA_SAIDA` DATETIME NOT NULL,
  `NOME` VARCHAR(70) NOT NULL,
  `CPF` VARCHAR(14) NOT NULL,
  `EMAIL` VARCHAR(70) NOT NULL,
  `ACOMPANHANTES` INT(11) NOT NULL,
  `quartos_ID` INT(11) NOT NULL,
  `status_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_pedidos_reservas_quartos1_idx` (`quartos_ID` ASC),
  INDEX `fk_pedidos_reservas_status1_idx` (`status_ID` ASC),
  CONSTRAINT `fk_pedidos_reservas_quartos1`
    FOREIGN KEY (`quartos_ID`)
    REFERENCES `pousada`.`quartos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_reservas_status1`
    FOREIGN KEY (`status_ID`)
    REFERENCES `pousada`.`status` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`negativas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`negativas` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `MOTIVO_NEGATIVA` TEXT NOT NULL,
  `pedidos_reservas_ID` INT(11) NOT NULL,
  `funcionarios_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_motivo_negativa_pedidos_reservas1_idx` (`pedidos_reservas_ID` ASC),
  INDEX `fk_motivo_negativa_funcionarios1_idx` (`funcionarios_ID` ASC),
  CONSTRAINT `fk_motivo_negativa_funcionarios1`
    FOREIGN KEY (`funcionarios_ID`)
    REFERENCES `pousada`.`funcionarios` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_motivo_negativa_pedidos_reservas1`
    FOREIGN KEY (`pedidos_reservas_ID`)
    REFERENCES `pousada`.`pedidos_reservas` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`novidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`novidades` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(70) NOT NULL,
  `EMAIL` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `EMAIL_UNIQUE` (`EMAIL` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`reservas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`reservas` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `PRECO_TOTAL` FLOAT(6,2) NOT NULL,
  `PARCELAS_TOTAL` INT(2) NOT NULL,
  `DATA_ENTRADA` DATETIME NULL DEFAULT NULL,
  `DATA_SAIDA` DATETIME NULL DEFAULT NULL,
  `pedidos_reservas_ID` INT(11) NOT NULL,
  `funcionarios_ID` INT(11) NOT NULL,
  `status_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_reservas_pedidos_reservas1_idx` (`pedidos_reservas_ID` ASC),
  INDEX `fk_reservas_funcionarios1_idx` (`funcionarios_ID` ASC),
  INDEX `fk_reservas_status1_idx` (`status_ID` ASC),
  CONSTRAINT `fk_reservas_funcionarios1`
    FOREIGN KEY (`funcionarios_ID`)
    REFERENCES `pousada`.`funcionarios` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservas_pedidos_reservas1`
    FOREIGN KEY (`pedidos_reservas_ID`)
    REFERENCES `pousada`.`pedidos_reservas` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservas_status1`
    FOREIGN KEY (`status_ID`)
    REFERENCES `pousada`.`status` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`pagamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`pagamentos` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `ENTRADA` FLOAT(6,2) NOT NULL,
  `RESTANTE` FLOAT(6,2) NULL DEFAULT NULL,
  `TAXA_JUROS` FLOAT(6,2) NOT NULL,
  `formas_pagamento_ID` INT(11) NOT NULL,
  `reservas_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_pagamentos_formas_pagamento1_idx` (`formas_pagamento_ID` ASC),
  INDEX `fk_pagamentos_reservas1_idx` (`reservas_ID` ASC),
  CONSTRAINT `fk_pagamentos_formas_pagamento1`
    FOREIGN KEY (`formas_pagamento_ID`)
    REFERENCES `pousada`.`formas_pagamentos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagamentos_reservas1`
    FOREIGN KEY (`reservas_ID`)
    REFERENCES `pousada`.`reservas` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`permissoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`permissoes` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `CONSULTA` BIT(1) NOT NULL,
  `DELETE` BIT(1) NOT NULL,
  `CRIAR` BIT(1) NOT NULL,
  `ALTERAR` BIT(1) NOT NULL,
  `cargos_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_permissoes_cargos1_idx` (`cargos_ID` ASC),
  CONSTRAINT `fk_permissoes_cargos1`
    FOREIGN KEY (`cargos_ID`)
    REFERENCES `pousada`.`cargos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`telefones_cli`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`telefones_cli` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `TIPO` VARCHAR(20) NOT NULL,
  `TEL` VARCHAR(18) NOT NULL,
  `cliente_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_telefone_cli_cliente1_idx` (`cliente_ID` ASC),
  CONSTRAINT `fk_telefone_cli_cliente1`
    FOREIGN KEY (`cliente_ID`)
    REFERENCES `pousada`.`clientes` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`telefones_func`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`telefones_func` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `TIPO` VARCHAR(20) NOT NULL,
  `TEL` VARCHAR(18) NOT NULL,
  `funcionario_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_telefone_func_funcionario1_idx` (`funcionario_ID` ASC),
  CONSTRAINT `fk_telefone_func_funcionario1`
    FOREIGN KEY (`funcionario_ID`)
    REFERENCES `pousada`.`funcionarios` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;







-- INSERT STATUS -------------------------------------------------------------------------------------------------------
-- Status 1 ---------------------------------
INSERT INTO `pousada`.`status`
(`ID`, `STATUS`)
VALUES
(1, "DISPONÍVEL");



-- Status 2 ---------------------------------
INSERT INTO `pousada`.`status`
(`ID`, `STATUS`)
VALUES
(2, "INDISPONÍVEL");



-- Status 3 ---------------------------------
INSERT INTO `pousada`.`status`
(`ID`, `STATUS`)
VALUES
(3, "MANUTENÇÃO");



-- Status 4 ---------------------------------
INSERT INTO `pousada`.`status`
(`ID`, `STATUS`)
VALUES
(4, "CONFIRMADO");



-- Status 5 ---------------------------------
INSERT INTO `pousada`.`status`
(`ID`, `STATUS`)
VALUES
(5, "PENDENTE");



-- Status 6 ---------------------------------
INSERT INTO `pousada`.`status`
(`ID`, `STATUS`)
VALUES
(6, "CANCELADO");



-- Status 7 ---------------------------------
INSERT INTO `pousada`.`status`
(`ID`, `STATUS`)
VALUES
(7, "EM ANDAMENTO");






-- INSERT TIPOS -------------------------------------------------------------------------------------------------------
-- Tipo 1 -------------------
INSERT INTO `pousada`.`tipos`
(`ID`,
`TIPO`)
VALUES
(1,
'Quarto');

-- Tipo 2 -------------------
INSERT INTO `pousada`.`tipos`
(`ID`,
`TIPO`)
VALUES
(2,
'Suíte');






-- INSERT QUARTOS -------------------------------------------------------------------------------------------------------
-- Quarto 1 ---------------------------------
INSERT INTO `pousada`.`quartos`
(`ID`,
`QUARTO`,
`DESCRICAO`,
`PRECO_DIARIA`,
`QTDE_PESSOAS`,
`DESTAQUE`,
`status_ID`,
`tipos_ID`)
VALUES
(1,
"Suíte com Varanda",
"Bem-vindo(a) à nossa pousada! Nosso quarto duplo é o lugar perfeito para duas pessoas que procuram uma estadia confortável e acolhedora. O quarto está equipado com duas camas comuns e confortáveis, roupa de cama macia e travesseiros para uma boa noite de sono. Além disso, há um armário para guardar as suas roupas e pertences.

A decoração é simples e elegante, com paredes claras e detalhes em madeira que trazem uma sensação de tranquilidade e relaxamento ao ambiente. A iluminação é suave e aconchegante, criando um ambiente agradável para descansar após um dia cheio de atividades.

O quarto também possui uma mesa de trabalho para aqueles que precisam trabalhar durante a estadia, bem como uma televisão para os momentos de lazer. Além disso, há uma conexão Wi-Fi gratuita para que você possa se manter conectado durante a sua estadia.

O banheiro privativo é equipado com um chuveiro com água quente, toalhas macias e produtos de higiene pessoal gratuitos para sua conveniência.

No geral, nosso quarto duplo é uma excelente escolha para casais ou amigos que desejam desfrutar de uma estadia tranquila e confortável em nossa pousada. Estamos ansiosos para recebê-lo(a)!",
340.10,
2,
1,
1,
2);



-- Quarto 2 ---------------------------------
INSERT INTO `pousada`.`quartos`
(`ID`,
`QUARTO`,
`DESCRICAO`,
`PRECO_DIARIA`,
`QTDE_PESSOAS`,
`DESTAQUE`,
`status_ID`,
`tipos_ID`)
VALUES
(2,
"Quarto com Varanda Privativa",
"Bem-vindo(a) à nossa pousada! Nosso quarto duplo com uma decoração inspirada na natureza. Este quarto é perfeito para duas pessoas que buscam um ambiente relaxante e tranquilo durante a estadia. A paleta de cores verdes traz uma sensação de harmonia e frescor, convidando você a desfrutar de um ambiente natural e pacífico.

O quarto é equipado com duas camas comuns e confortáveis, lençóis macios e travesseiros aconchegantes para uma noite de sono perfeita.

A decoração do quarto é minimalista, com toques de madeira e elementos naturais, como plantas e pedras, que trazem uma sensação de serenidade e conexão com a natureza. A iluminação suave e natural cria um ambiente acolhedor para relaxar após um longo dia.

O banheiro privativo está equipado com um chuveiro com água quente, toalhas macias e produtos de higiene pessoal gratuitos para sua conveniência.

Este quarto também possui uma mesa de trabalho, bem como uma TV e Wi-Fi gratuito para garantir que você tenha tudo o que precisa para se sentir confortável e produtivo durante a sua estadia.

Em resumo, o nosso quarto duplo verde é uma escolha excelente para casais ou amigos que procuram uma estadia agradável e relaxante na nossa pousada. Esperamos recebê-lo(a) em breve!",
290.50,
2,
1,
1,
2);



-- Quarto 3 ---------------------------------
INSERT INTO `pousada`.`quartos`
(`ID`,
`QUARTO`,
`DESCRICAO`,
`PRECO_DIARIA`,
`QTDE_PESSOAS`,
`DESTAQUE`,
`status_ID`,
`tipos_ID`)
VALUES
(3,
"Quarto com Cama de Casal",
"Bem-vindo(a) à nossa pousada! Nosso quarto duplo com decoração em tons pastel de verde, perfeito para casais ou amigos que procuram uma estadia tranquila e relaxante. A paleta de cores suaves cria um ambiente calmo e sereno, perfeito para uma noite de sono reparadora.

O quarto possui uma cama de casal confortável, roupa de cama macia e travesseiros fofos para uma noite de sono agradável. Há também um armário para guardar suas roupas e pertences durante a estadia.

A decoração do quarto é elegante e minimalista, com paredes verdes pastel que trazem uma sensação de frescor e serenidade ao ambiente. A iluminação suave e natural cria um ambiente acolhedor e relaxante, convidando você a desfrutar de um ambiente tranquilo durante sua estadia.

O banheiro privativo é equipado com um chuveiro com água quente, toalhas macias e produtos de higiene pessoal gratuitos para sua comodidade.

Este quarto também possui uma mesa de trabalho, bem como uma TV e Wi-Fi gratuito para garantir que você tenha tudo o que precisa para se sentir confortável e produtivo durante a sua estadia.

Em resumo, o nosso quarto duplo verde pastel é uma excelente escolha para casais ou amigos que procuram uma estadia confortável e relaxante na nossa pousada. Esperamos recebê-lo(a) em breve!",
299.99,
2,
1,
1,
2);



-- Quarto 4 ---------------------------------
INSERT INTO `pousada`.`quartos`
(`ID`,
`QUARTO`,
`DESCRICAO`,
`PRECO_DIARIA`,
`QTDE_PESSOAS`,
`DESTAQUE`,
`status_ID`,
`tipos_ID`)
VALUES
(4,
"Quarto Familiar",
"Bem-vindo(a) à nossa pousada! Nosso elegante quarto que acomoda até quatro pessoas, perfeito para famílias ou amigos que procuram uma estadia confortável e agradável juntos. Este quarto está equipado com uma cama de casal confortável e duas camas comuns, cada uma com roupa de cama macia e travesseiros para garantir uma noite de sono agradável e reparadora.

A decoração é elegante e sofisticada, com paredes claras e detalhes em madeira que trazem um toque de modernidade e elegância ao ambiente. A iluminação é suave e aconchegante, criando um ambiente acolhedor para relaxar e desfrutar da companhia dos seus entes queridos.

O quarto também possui uma mesa de trabalho para aqueles que precisam trabalhar durante a estadia, bem como uma televisão para os momentos de lazer. Além disso, há uma conexão Wi-Fi gratuita para que você possa se manter conectado durante a sua estadia.

O banheiro privativo é equipado com um chuveiro com água quente, toalhas macias e produtos de higiene pessoal gratuitos para sua conveniência.

No geral, nosso quarto elegante que acomoda quatro pessoas é uma excelente escolha para famílias ou amigos que desejam desfrutar de uma estadia confortável e agradável juntos. Estamos ansiosos para recebê-lo(a) em nossa pousada!",
499.50,
4,
1,
1,
2);



-- Quarto 5 ---------------------------------
INSERT INTO `pousada`.`quartos`
(`ID`,
`QUARTO`,
`DESCRICAO`,
`PRECO_DIARIA`,
`QTDE_PESSOAS`,
`DESTAQUE`,
`status_ID`,
`tipos_ID`)
VALUES
(5,
"Quarto com Beliche",
"Bem-vindo(a) à nossa pousada! Nosso quarto com cama de casal e beliche, perfeito para grupos de amigos ou famílias que procuram uma estadia confortável e agradável juntos. Este quarto pode acomodar até três pessoas, com uma cama de casal confortável e um beliche.

A decoração é simples e acolhedora, com paredes claras e detalhes em madeira que trazem um toque de rusticidade ao ambiente. A iluminação é suave e aconchegante, criando um ambiente agradável para relaxar e desfrutar da sua estadia.

O quarto também possui uma mesa de trabalho para aqueles que precisam trabalhar durante a estadia, bem como uma televisão para momentos de lazer. Além disso, há uma conexão Wi-Fi gratuita para que você possa se manter conectado durante a sua estadia.

O banheiro privativo é equipado com um chuveiro com água quente, toalhas macias e produtos de higiene pessoal gratuitos para sua comodidade.

No geral, nosso quarto com cama de casal e beliche é uma excelente escolha para grupos pequenos de amigos ou famílias que desejam desfrutar de uma estadia confortável e agradável juntos. Estamos ansiosos para recebê-lo(a) em nossa pousada!",
350.200,
3,
1,
1,
2);



-- Quarto 6 ---------------------------------
INSERT INTO `pousada`.`quartos`
(`ID`,
`QUARTO`,
`DESCRICAO`,
`PRECO_DIARIA`,
`QTDE_PESSOAS`,
`DESTAQUE`,
`status_ID`,
`tipos_ID`)
VALUES
(6,
"Quarto Standard",
"Bem-vindo(a) à nossa pousada! Nosso quarto com cama de casal, perfeito para casais ou viajantes individuais que procuram uma estadia confortável e agradável. Este quarto pode acomodar até duas pessoas, com uma cama de casal confortável e roupa de cama macia para garantir uma noite de sono tranquila e reparadora.

A decoração é clássica e elegante, com paredes em tons claros e detalhes em madeira que trazem um toque de sofisticação ao ambiente. A iluminação é suave e aconchegante, criando um ambiente tranquilo para relaxar após um longo dia de passeios ou trabalho.

O quarto também possui uma mesa de trabalho para aqueles que precisam trabalhar durante a estadia, bem como uma televisão para momentos de lazer. Além disso, há uma conexão Wi-Fi gratuita para que você possa se manter conectado durante a sua estadia.

O banheiro privativo é equipado com um chuveiro com água quente, toalhas macias e produtos de higiene pessoal gratuitos para sua comodidade.

No geral, nosso quarto com cama de casal é uma excelente escolha para casais ou viajantes individuais que desejam desfrutar de uma estadia confortável e agradável em um ambiente clássico e elegante. Estamos ansiosos para recebê-lo(a) em nossa pousada!",
220.90,
2,
1,
1,
2);



-- Quarto 7 ---------------------------------
INSERT INTO `pousada`.`quartos`
(`ID`,
`QUARTO`,
`DESCRICAO`,
`PRECO_DIARIA`,
`QTDE_PESSOAS`,
`DESTAQUE`,
`status_ID`,
`tipos_ID`)
VALUES
(7,
"Quarto com Vista para o Jardim",
"Bem-vindo(a) à nossa pousada! Nosso quarto com cama de casal, com um toque de verde para trazer tranquilidade e harmonia ao ambiente. Este quarto é perfeito para casais ou viajantes individuais que procuram uma estadia confortável e agradável.

A decoração é clássica e elegante, com paredes em tons suaves de verde e detalhes em madeira que trazem um toque de naturalidade ao ambiente. A iluminação é suave e aconchegante, criando um ambiente tranquilo para relaxar após um longo dia de passeios ou trabalho.

O quarto também possui uma mesa de trabalho para aqueles que precisam trabalhar durante a estadia, bem como uma televisão para momentos de lazer. Além disso, há uma conexão Wi-Fi gratuita para que você possa se manter conectado durante a sua estadia.

O banheiro privativo é equipado com um chuveiro com água quente, toalhas macias e produtos de higiene pessoal gratuitos para sua comodidade.

No geral, nosso quarto com cama de casal e tons de verde é uma excelente escolha para casais ou viajantes individuais que desejam desfrutar de uma estadia confortável e agradável em um ambiente tranquilo e harmônico. Estamos ansiosos para recebê-lo(a) em nossa pousada!",
190.99,
2,
1,
1,
2);






-- INSERT IMAGENS -------------------------------------------------------------------------------------------------------
-- Quarto 1 ---------------------------------
INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto1.jpg",
"../images/quartos/quarto1.jpg",
1);

INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto1-2.jpg",
"../images/quartos/quarto1-2.jpg",
1);

INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto1-3.jpg",
"../images/quartos/quarto1-3.jpg",
1);






-- Quarto 2 ---------------------------------
INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto2.jpg",
"../images/quartos/quarto2.jpg",
2);

INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto2-2.jpg",
"../images/quartos/quarto2-2.jpg",
2);

INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto2-3.jpg",
"../images/quartos/quarto2-3.jpg",
2);

INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto2-4.jpg",
"../images/quartos/quarto2-4.jpg",
2);






-- Quarto 3 ---------------------------------
INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto3.jpg",
"../images/quartos/quarto3.jpg",
3);

INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto3-2.jpg",
"../images/quartos/quarto3-2.jpg",
3);

INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto3-3.jpg",
"../images/quartos/quarto3-3.jpg",
3);

INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto3-4.jpg",
"../images/quartos/quarto3-4.jpg",
3);







-- Quarto 4 ---------------------------------
INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto4.jpg",
"../images/quartos/quarto4.jpg",
4);

INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto4-2.jpg",
"../images/quartos/quarto4-2.jpg",
4);

INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto4-3.jpg",
"../images/quartos/quarto4-3.jpg",
4);

INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto4-4.jpg",
"../images/quartos/quarto4-4.jpg",
4);






-- Quarto 5 ---------------------------------
INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto5.jpg",
"../images/quartos/quarto5.jpg",
5);

INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto5-2.webp",
"../images/quartos/quarto5-2.webp",
5);

INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto5-3.webp",
"../images/quartos/quarto5-3.webp",
5);

INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto5-4.jpg",
"../images/quartos/quarto5-4.jpg",
5);






-- Quarto 6 ---------------------------------
INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto6.jpg",
"../images/quartos/quarto6.jpg",
6);

INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto6-2.jpg",
"../images/quartos/quarto6-2.jpg",
6);






-- Quarto 7 ---------------------------------
INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto7.jpg",
"../images/quartos/quarto7.jpg",
7);

INSERT INTO `pousada`.`imagens`
(`IMAGEM_CAMINHO_1`,
`IMAGEM_CAMINHO_2`,
`quartos_ID`)
VALUES
("images/quartos/quarto7-2.jpg",
"../images/quartos/quarto7-2.jpg",
7);






-- Cliente ---------------------------------
INSERT INTO `pousada`.`clientes`
(`ID`,
`NOME`,
`CPF`,
`RG`,
`SENHA`,
`EMAIL`)
VALUES
(1,
"Carlos Silva Oliveira",
"231.456.343-65",
"23.678.342-8",
"1234",
"carlos@gmail.com");




INSERT INTO `pousada`.`enderecos_cli`
(`ID`,
`CEP`,
`CIDADE`,
`UF`,
`cliente_ID`)
VALUES
(1,
"90890-200",
"São Paulo",
"SP",
1);




INSERT INTO `pousada`.`telefones_cli`
(`ID`,
`TIPO`,
`TEL`,
`cliente_ID`)
VALUES
(1,
"Celular Pessoal",
"(+55) 11 9780-0987",
1);