-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8mb4 ;
-- -----------------------------------------------------
-- Schema pousada
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pousada
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pousada` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`tipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tipos` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `TIPO` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

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
-- Table `pousada`.`acoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`acoes` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(45) NOT NULL,
  `cargos_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_acoes_cargos1_idx` (`cargos_ID` ASC) ,
  CONSTRAINT `fk_acoes_cargos1`
    FOREIGN KEY (`cargos_ID`)
    REFERENCES `pousada`.`cargos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  UNIQUE INDEX `EMAIL_UNIQUE` (`EMAIL` ASC) ,
  UNIQUE INDEX `CPF_UNIQUE` (`CPF` ASC) ,
  UNIQUE INDEX `RG_UNIQUE` (`RG` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`cartoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`cartoes` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `NOME_TITULAR` VARCHAR(45) NOT NULL,
  `NUMERO` VARCHAR(21) NOT NULL,
  `VALIDADE` VARCHAR(7) NOT NULL,
  `CVV` VARCHAR(32) NOT NULL,
  `TIPO` VARCHAR(12) NOT NULL,
  `clientes_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `CVV_UNIQUE` (`CVV` ASC) ,
  INDEX `fk_cartoes_clientes1_idx` (`clientes_ID` ASC) ,
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
  `numero` VARCHAR(6) NOT NULL,
  `cliente_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_endereco_cli_cliente1_idx` (`cliente_ID` ASC) ,
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
  `ADMISSAO` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `DEMISSAO` DATETIME NULL DEFAULT NULL,
  `cargos_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `CPF_UNIQUE` (`CPF` ASC) ,
  UNIQUE INDEX `RG_UNIQUE` (`RG` ASC) ,
  UNIQUE INDEX `EMAIL_UNIQUE` (`EMAIL` ASC) ,
  INDEX `fk_funcionarios_cargos1_idx` (`cargos_ID` ASC) ,
  CONSTRAINT `fk_funcionarios_cargos1`
    FOREIGN KEY (`cargos_ID`)
    REFERENCES `pousada`.`cargos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


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
  INDEX `fk_endereco_func_funcionario1_idx` (`funcionario_ID` ASC) ,
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
  INDEX `fk_historicos_funcionarios1_idx` (`funcionarios_ID` ASC) ,
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
  INDEX `fk_quartos_status1_idx` (`status_ID` ASC) ,
  INDEX `fk_quartos_tipos1_idx` (`tipos_ID` ASC) ,
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
  INDEX `fk_imagens_quartos_idx` (`quartos_ID` ASC) ,
  CONSTRAINT `fk_imagens_quartos`
    FOREIGN KEY (`quartos_ID`)
    REFERENCES `pousada`.`quartos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 47
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
  INDEX `fk_pedidos_reservas_quartos1_idx` (`quartos_ID` ASC) ,
  INDEX `fk_pedidos_reservas_status1_idx` (`status_ID` ASC) ,
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
  INDEX `fk_motivo_negativa_pedidos_reservas1_idx` (`pedidos_reservas_ID` ASC) ,
  INDEX `fk_motivo_negativa_funcionarios1_idx` (`funcionarios_ID` ASC) ,
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
  UNIQUE INDEX `EMAIL_UNIQUE` (`EMAIL` ASC) )
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
  INDEX `fk_reservas_pedidos_reservas1_idx` (`pedidos_reservas_ID` ASC) ,
  INDEX `fk_reservas_funcionarios1_idx` (`funcionarios_ID` ASC) ,
  INDEX `fk_reservas_status1_idx` (`status_ID` ASC) ,
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
  INDEX `fk_pagamentos_formas_pagamento1_idx` (`formas_pagamento_ID` ASC) ,
  INDEX `fk_pagamentos_reservas1_idx` (`reservas_ID` ASC) ,
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
  `acoes_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_permissoes_acoes1_idx` (`acoes_ID` ASC) ,
  CONSTRAINT `fk_permissoes_acoes1`
    FOREIGN KEY (`acoes_ID`)
    REFERENCES `pousada`.`acoes` (`ID`)
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
  INDEX `fk_telefone_cli_cliente1_idx` (`cliente_ID` ASC) ,
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
  INDEX `fk_telefone_func_funcionario1_idx` (`funcionario_ID` ASC) ,
  CONSTRAINT `fk_telefone_func_funcionario1`
    FOREIGN KEY (`funcionario_ID`)
    REFERENCES `pousada`.`funcionarios` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `pousada` ;

-- -----------------------------------------------------
-- Placeholder table for view `pousada`.`clientecartao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`clientecartao` (`ID` INT, `NOME` INT, `CPF` INT, `RG` INT, `EMAIL` INT, `NOME_TITULAR` INT, `NUMERO` INT, `VALIDADE` INT, `CVV` INT, `TIPO` INT, `clientes_ID` INT);

-- -----------------------------------------------------
-- View `pousada`.`clientecartao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pousada`.`clientecartao`;
USE `pousada`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pousada`.`clientecartao` AS select `pousada`.`cartoes`.`ID` AS `ID`,`pousada`.`clientes`.`NOME` AS `NOME`,`pousada`.`clientes`.`CPF` AS `CPF`,`pousada`.`clientes`.`RG` AS `RG`,`pousada`.`clientes`.`EMAIL` AS `EMAIL`,`pousada`.`cartoes`.`NOME_TITULAR` AS `NOME_TITULAR`,`pousada`.`cartoes`.`NUMERO` AS `NUMERO`,`pousada`.`cartoes`.`VALIDADE` AS `VALIDADE`,`pousada`.`cartoes`.`CVV` AS `CVV`,`pousada`.`cartoes`.`TIPO` AS `TIPO`,`pousada`.`cartoes`.`clientes_ID` AS `clientes_ID` from (`pousada`.`clientes` join `pousada`.`cartoes` on(`pousada`.`clientes`.`ID` = `pousada`.`cartoes`.`clientes_ID`));

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
