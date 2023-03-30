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
  `PERIODO` VARCHAR(5) NOT NULL,
  `DESCRICAO` TEXT NOT NULL,
  `ARQUIVAR_EM` DATETIME NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`permissoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`permissoes` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `CONSULTA` BIT NOT NULL,
  `DELETE` BIT NOT NULL,
  `CRIAR` BIT NOT NULL,
  `ALTERAR` BIT NOT NULL,
  `cargos_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_permissoes_cargos1_idx` (`cargos_ID` ASC),
  CONSTRAINT `fk_permissoes_cargos1`
    FOREIGN KEY (`cargos_ID`)
    REFERENCES `pousada`.`cargos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pousada`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`status` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `STATUS` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`tipos_quarto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`tipos_quarto` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `TIPO` VARCHAR(8) NOT NULL COMMENT 'O tipo se baseia no nível qualitativo do quarto em \'master\' ou \'standard\' por isso o varchar de 8',
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pousada`.`quartos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`quartos` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `QUARTO` VARCHAR(45) NOT NULL,
  `DESCRICAO` TEXT NOT NULL,
  `PRECO_DIARIA` DOUBLE(6,2) NOT NULL,
  `QTDE_PESSOAS` INT NOT NULL,
  `DESTAQUE` BIT NOT NULL,
  `ARQUIVAR_EM` DATETIME NULL,
  `status_ID` INT(11) NOT NULL,
  `tipos_quarto_ID` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_quartos_status1_idx` (`status_ID` ASC),
  INDEX `fk_quartos_tipos_quarto1_idx` (`tipos_quarto_ID` ASC),
  CONSTRAINT `fk_quartos_status1`
    FOREIGN KEY (`status_ID`)
    REFERENCES `pousada`.`status` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_quartos_tipos_quarto1`
    FOREIGN KEY (`tipos_quarto_ID`)
    REFERENCES `pousada`.`tipos_quarto` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`imagens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`imagens` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `IMAGEM` LONGBLOB NOT NULL,
  `CODIGO` VARCHAR(32) NOT NULL,
  `quartos_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_imagens_quartos_idx` (`quartos_ID` ASC),
  CONSTRAINT `fk_imagens_quartos`
    FOREIGN KEY (`quartos_ID`)
    REFERENCES `pousada`.`quartos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pousada`.`funcionarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`funcionarios` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(100) NOT NULL,
  `DATA_NASC` DATE NOT NULL,
  `CPF` VARCHAR(9) NOT NULL,
  `RG` VARCHAR(15) NOT NULL,
  `SALARIO` DOUBLE(7,2) NOT NULL,
  `EMAIL` VARCHAR(45) NOT NULL,
  `SENHA` VARCHAR(10) NOT NULL,
  `ADMISSAO` DATETIME NOT NULL,
  `DEMISSAO` DATETIME NULL DEFAULT NULL,
  `cargos_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_funcionarios_cargos1_idx` (`cargos_ID` ASC),
  UNIQUE INDEX `CPF_UNIQUE` (`CPF` ASC),
  UNIQUE INDEX `RG_UNIQUE` (`RG` ASC),
  UNIQUE INDEX `EMAIL_UNIQUE` (`EMAIL` ASC),
  UNIQUE INDEX `SENHA_UNIQUE` (`SENHA` ASC),
  CONSTRAINT `fk_funcionarios_cargos1`
    FOREIGN KEY (`cargos_ID`)
    REFERENCES `pousada`.`cargos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`historicos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`historicos` (
  `ID` INT NOT NULL AUTO_INCREMENT,
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
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pousada`.`formas_pagamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`formas_pagamentos` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `TIPO` VARCHAR(12) NOT NULL COMMENT 'o tipo do pagamento será: credito, debito, boleto, dinheiro e dois cartões. por isso varchar de 12',
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pousada`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`clientes` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(70) NOT NULL,
  `CPF` VARCHAR(11) NOT NULL,
  `RG` VARCHAR(9) NOT NULL,
  `SENHA` VARCHAR(10) NOT NULL,
  `EMAIL` VARCHAR(70) NOT NULL,
  `RECUPERAR_SENHA` VARCHAR(45) NULL,
  `ARQUIVAR_EM` DATETIME NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `EMAIL_UNIQUE` (`EMAIL` ASC),
  UNIQUE INDEX `CPF_UNIQUE` (`CPF` ASC),
  UNIQUE INDEX `RG_UNIQUE` (`RG` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`pedidos_reservas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`pedidos_reservas` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `DATA_RESERVA` TIMESTAMP NOT NULL,
  `DATA_ENTRADA` DATETIME NOT NULL,
  `DATA_SAIDA` DATETIME NOT NULL,
  `ACOMPANHANTES` INT NOT NULL,
  `quartos_ID` INT(11) NOT NULL,
  `status_ID` INT(11) NOT NULL,
  `clientes_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_pedidos_reservas_quartos1_idx` (`quartos_ID` ASC),
  INDEX `fk_pedidos_reservas_status1_idx` (`status_ID` ASC),
  INDEX `fk_pedidos_reservas_clientes1_idx` (`clientes_ID` ASC),
  CONSTRAINT `fk_pedidos_reservas_quartos1`
    FOREIGN KEY (`quartos_ID`)
    REFERENCES `pousada`.`quartos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_reservas_status1`
    FOREIGN KEY (`status_ID`)
    REFERENCES `pousada`.`status` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_reservas_clientes1`
    FOREIGN KEY (`clientes_ID`)
    REFERENCES `pousada`.`clientes` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pousada`.`negativas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`negativas` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `MOTIVO_NEGATIVA` TEXT NOT NULL,
  `pedidos_reservas_ID` INT NOT NULL,
  `funcionarios_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_motivo_negativa_pedidos_reservas1_idx` (`pedidos_reservas_ID` ASC),
  INDEX `fk_motivo_negativa_funcionarios1_idx` (`funcionarios_ID` ASC),
  CONSTRAINT `fk_motivo_negativa_pedidos_reservas1`
    FOREIGN KEY (`pedidos_reservas_ID`)
    REFERENCES `pousada`.`pedidos_reservas` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_motivo_negativa_funcionarios1`
    FOREIGN KEY (`funcionarios_ID`)
    REFERENCES `pousada`.`funcionarios` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pousada`.`reservas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`reservas` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `PRECO_TOTAL` FLOAT(4,2) NOT NULL,
  `PARCELAS_TOTAL` INT(2) NOT NULL,
  `DATA_ENTRADA` DATETIME NULL,
  `DATA_SAIDA` DATETIME NULL,
  `pedidos_reservas_ID` INT NOT NULL,
  `funcionarios_ID` INT(11) NOT NULL,
  `status_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_reservas_pedidos_reservas1_idx` (`pedidos_reservas_ID` ASC),
  INDEX `fk_reservas_funcionarios1_idx` (`funcionarios_ID` ASC),
  INDEX `fk_reservas_status1_idx` (`status_ID` ASC),
  CONSTRAINT `fk_reservas_pedidos_reservas1`
    FOREIGN KEY (`pedidos_reservas_ID`)
    REFERENCES `pousada`.`pedidos_reservas` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservas_funcionarios1`
    FOREIGN KEY (`funcionarios_ID`)
    REFERENCES `pousada`.`funcionarios` (`ID`)
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
  `ENTRADA` FLOAT(4,2) NOT NULL,
  `RESTANTE` FLOAT(4,2) NULL,
  `TAXA_JUROS` FLOAT(3,2) NOT NULL,
  `formas_pagamento_ID` INT NOT NULL,
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
-- Table `pousada`.`notas_fiscais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`notas_fiscais` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `ATIVIDADE` TEXT NOT NULL,
  `DESCRICAO` TEXT NOT NULL,
  `pagamentos_ID` INT(11) NOT NULL,
  `reservas_ID` INT(11) NOT NULL,
  INDEX `fk_notas_fiscais_pagamentos1_idx` (`pagamentos_ID` ASC),
  INDEX `fk_notas_fiscais_reservas1_idx` (`reservas_ID` ASC),
  PRIMARY KEY (`ID`),
  CONSTRAINT `fk_notas_fiscais_pagamentos1`
    FOREIGN KEY (`pagamentos_ID`)
    REFERENCES `pousada`.`pagamentos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_notas_fiscais_reservas1`
    FOREIGN KEY (`reservas_ID`)
    REFERENCES `pousada`.`reservas` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `pousada` ;

-- -----------------------------------------------------
-- Table `pousada`.`cartoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`cartoes` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `NUMERO` VARCHAR(16) NOT NULL,
  `VALIDADE` VARCHAR(4) NOT NULL,
  `CVV` VARCHAR(3) NOT NULL,
  `TIPO` VARCHAR(7) NOT NULL,
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
  `CEP` VARCHAR(8) NOT NULL,
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
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`enderecos_func`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`enderecos_func` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `LOGRADOURO` VARCHAR(35) NOT NULL,
  `NUMERO` VARCHAR(5) NOT NULL,
  `CEP` VARCHAR(8) NOT NULL,
  `BAIRRO` VARCHAR(20) NOT NULL,
  `CIDADE` VARCHAR(20) NOT NULL,
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
-- Table `pousada`.`telefones_cli`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`telefones_cli` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `TIPO` VARCHAR(8) NOT NULL,
  `TEL` VARCHAR(11) NOT NULL,
  `cliente_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_telefone_cli_cliente1_idx` (`cliente_ID` ASC),
  CONSTRAINT `fk_telefone_cli_cliente1`
    FOREIGN KEY (`cliente_ID`)
    REFERENCES `pousada`.`clientes` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pousada`.`telefones_func`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pousada`.`telefones_func` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `TIPO` VARCHAR(8) NOT NULL,
  `TEL` VARCHAR(11) NOT NULL,
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