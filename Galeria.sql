CREATE DATABASE bd_galeria;
USE bd_galeria;

-- Tabela de Categoria
CREATE TABLE CATEGORIA (
    cate_id INT AUTO_INCREMENT PRIMARY KEY,
    cate_nome VARCHAR(255) NOT NULL,
    cate_descricao TEXT
);

-- Tabela de Artista
CREATE TABLE usuario (
    arti_id INT AUTO_INCREMENT PRIMARY KEY,
    arti_nome VARCHAR(255) NOT NULL,
    arti_senha VARCHAR(255) NOT NULL,
    arti_email VARCHAR(255) UNIQUE
   
);

-- Tabela de Apreciador
CREATE TABLE usuario2 (
    apre_id INT AUTO_INCREMENT PRIMARY KEY,
    apre_nome VARCHAR(255) NOT NULL,
    apre_senha VARCHAR(255) NOT NULL,
    apre_email VARCHAR(255) UNIQUE
   
);

-- Tabela de Obra
CREATE TABLE OBRA (
    obra_id INT AUTO_INCREMENT PRIMARY KEY,
    obra_titulo VARCHAR(255) NOT NULL,
    obra_dir_imagem VARCHAR(255),
    obra_dt_postada DATETIME,
    obra_descricao TEXT,
    cate_id INT,
    arti_id INT,
    FOREIGN KEY (cate_id) REFERENCES CATEGORIA(cate_id),
    FOREIGN KEY (arti_id) REFERENCES ARTISTA(arti_id)
);

-- Tabela de Carrinho
CREATE TABLE CARRINHO (
    carr_id INT AUTO_INCREMENT PRIMARY KEY,
    carr_data DATETIME,
    carr_status VARCHAR(255),
    obra_id INT,
    apre_id INT,
    FOREIGN KEY (obra_id) REFERENCES OBRA(obra_id),
    FOREIGN KEY (apre_id) REFERENCES APRECIADOR(apre_id)
);

-- Tabela de Tipo Pagamento
CREATE TABLE TIPO_PAGAMENTO (
    tipa_id INT AUTO_INCREMENT PRIMARY KEY,
    tipa_credito BOOLEAN,
    tipa_debito BOOLEAN,
    tipa_pix BOOLEAN
);

-- Tabela de Venda
CREATE TABLE VENDA (
    vend_id INT AUTO_INCREMENT PRIMARY KEY,
    vend_data DATETIME,
    vend_valor DECIMAL(10, 2),
    vend_status VARCHAR(255),
    vend_horario TIME,
    apre_id INT,
    obra_id INT,
    tipa_id INT,
    FOREIGN KEY (apre_id) REFERENCES APRECIADOR(apre_id),
    FOREIGN KEY (obra_id) REFERENCES OBRA(obra_id),
    FOREIGN KEY (tipa_id) REFERENCES TIPO_PAGAMENTO(tipa_id)
);

-- Tabela de Auditoria (com as colunas adicionais)
CREATE TABLE Auditoria (
    audi_id INT AUTO_INCREMENT PRIMARY KEY,
    audi_dh_log DATETIME DEFAULT CURRENT_TIMESTAMP,
    audi_maquina VARCHAR(255),
    audi_tabela VARCHAR(255),
    audi_dml VARCHAR(10),
    audi_vl_new TEXT,
    audi_vl_old TEXT
);
-- TRIGGERS DE AUDITORIA PARA TODAS AS TABELAS

-- CATEGORIA
DELIMITER //
CREATE TRIGGER registro_categoria AFTER INSERT ON CATEGORIA
FOR EACH ROW
BEGIN
    INSERT INTO Auditoria (audi_maquina, audi_tabela, audi_dml, audi_vl_new)
    VALUES (USER(), 'CATEGORIA', 'INSERT', 
            CONCAT('nome: ', NEW.cate_nome, ', descricao: ', NEW.cate_descricao));
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER atualizacao_categoria AFTER UPDATE ON CATEGORIA
FOR EACH ROW
BEGIN
    INSERT INTO Auditoria (audi_maquina, audi_tabela, audi_dml, audi_vl_new, audi_vl_old)
    VALUES (USER(), 'CATEGORIA', 'UPDATE',
            CONCAT('nome: ', NEW.cate_nome, ', descricao: ', NEW.cate_descricao),
            CONCAT('nome: ', OLD.cate_nome, ', descricao: ', OLD.cate_descricao));
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER exclusao_categoria AFTER DELETE ON CATEGORIA
FOR EACH ROW
BEGIN
    INSERT INTO Auditoria (audi_maquina, audi_tabela, audi_dml, audi_vl_old)
    VALUES (USER(), 'CATEGORIA', 'DELETE',
            CONCAT('nome: ', OLD.cate_nome, ', descricao: ', OLD.cate_descricao));
END;
//
DELIMITER ;

-- ARTISTA
DELIMITER //
CREATE TRIGGER registro_artista AFTER INSERT ON ARTISTA
FOR EACH ROW
BEGIN
    INSERT INTO Auditoria (audi_maquina, audi_tabela, audi_dml, audi_vl_new)
    VALUES (USER(), 'ARTISTA', 'INSERT', 
            CONCAT('nome: ', NEW.arti_nome, ', email: ', NEW.arti_email, ', telefone: ', NEW.arti_telefone, ', país: ', NEW.arti_pais));
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER atualizacao_artista AFTER UPDATE ON ARTISTA
FOR EACH ROW
BEGIN
    INSERT INTO Auditoria (audi_maquina, audi_tabela, audi_dml, audi_vl_new, audi_vl_old)
    VALUES (USER(), 'ARTISTA', 'UPDATE',
            CONCAT('nome: ', NEW.arti_nome, ', email: ', NEW.arti_email, ', telefone: ', NEW.arti_telefone, ', país: ', NEW.arti_pais),
            CONCAT('nome: ', OLD.arti_nome, ', email: ', OLD.arti_email, ', telefone: ', OLD.arti_telefone, ', país: ', OLD.arti_pais));
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER exclusao_artista AFTER DELETE ON ARTISTA
FOR EACH ROW
BEGIN
    INSERT INTO Auditoria (audi_maquina, audi_tabela, audi_dml, audi_vl_old)
    VALUES (USER(), 'ARTISTA', 'DELETE',
            CONCAT('nome: ', OLD.arti_nome, ', email: ', OLD.arti_email, ', telefone: ', OLD.arti_telefone, ', país: ', OLD.arti_pais));
END;
//
DELIMITER ;

-- APRECIADOR
DELIMITER //
CREATE TRIGGER registro_apreciador AFTER INSERT ON APRECIADOR
FOR EACH ROW
BEGIN
    INSERT INTO Auditoria (audi_maquina, audi_tabela, audi_dml, audi_vl_new)
    VALUES (USER(), 'APRECIADOR', 'INSERT', 
            CONCAT('nome: ', NEW.apre_nome, ', email: ', NEW.apre_email, ', telefone: ', NEW.apre_telefone));
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER atualizacao_apreciador AFTER UPDATE ON APRECIADOR
FOR EACH ROW
BEGIN
    INSERT INTO Auditoria (audi_maquina, audi_tabela, audi_dml, audi_vl_new, audi_vl_old)
    VALUES (USER(), 'APRECIADOR', 'UPDATE',
            CONCAT('nome: ', NEW.apre_nome, ', email: ', NEW.apre_email, ', telefone: ', NEW.apre_telefone),
            CONCAT('nome: ', OLD.apre_nome, ', email: ', OLD.apre_email, ', telefone: ', OLD.apre_telefone));
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER exclusao_apreciador AFTER DELETE ON APRECIADOR
FOR EACH ROW
BEGIN
    INSERT INTO Auditoria (audi_maquina, audi_tabela, audi_dml, audi_vl_old)
    VALUES (USER(), 'APRECIADOR', 'DELETE',
            CONCAT('nome: ', OLD.apre_nome, ', email: ', OLD.apre_email, ', telefone: ', OLD.apre_telefone));
END;
//
DELIMITER ;

-- OBRA
DELIMITER //
CREATE TRIGGER registro_obra AFTER INSERT ON OBRA
FOR EACH ROW
BEGIN
    INSERT INTO Auditoria (audi_maquina, audi_tabela, audi_dml, audi_vl_new)
    VALUES (USER(), 'OBRA', 'INSERT', 
            CONCAT('título: ', NEW.obra_titulo, ', descrição: ', NEW.obra_descricao));
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER atualizacao_obra AFTER UPDATE ON OBRA
FOR EACH ROW
BEGIN
    INSERT INTO Auditoria (audi_maquina, audi_tabela, audi_dml, audi_vl_new, audi_vl_old)
    VALUES (USER(), 'OBRA', 'UPDATE',
            CONCAT('título: ', NEW.obra_titulo, ', descrição: ', NEW.obra_descricao),
            CONCAT('título: ', OLD.obra_titulo, ', descrição: ', OLD.obra_descricao));
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER exclusao_obra AFTER DELETE ON OBRA
FOR EACH ROW
BEGIN
    INSERT INTO Auditoria (audi_maquina, audi_tabela, audi_dml, audi_vl_old)
    VALUES (USER(), 'OBRA', 'DELETE',
            CONCAT('título: ', OLD.obra_titulo, ', descrição: ', OLD.obra_descricao));
END;
//
DELIMITER ;

-- CARRINHO
DELIMITER //
CREATE TRIGGER registro_carrinho AFTER INSERT ON CARRINHO
FOR EACH ROW
BEGIN
    INSERT INTO Auditoria (audi_maquina, audi_tabela, audi_dml, audi_vl_new)
    VALUES (USER(), 'CARRINHO', 'INSERT', 
            CONCAT('data: ', NEW.carr_data, ', status: ', NEW.carr_status));
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER atualizacao_carrinho AFTER UPDATE ON CARRINHO
FOR EACH ROW
BEGIN
    INSERT INTO Auditoria (audi_maquina, audi_tabela, audi_dml, audi_vl_new, audi_vl_old)
    VALUES (USER(), 'CARRINHO', 'UPDATE',
            CONCAT('data: ', NEW.carr_data, ', status: ', NEW.carr_status),
            CONCAT('data: ', OLD.carr_data, ', status: ', OLD.carr_status));
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER exclusao_carrinho AFTER DELETE ON CARRINHO
FOR EACH ROW
BEGIN
    INSERT INTO Auditoria (audi_maquina, audi_tabela, audi_dml, audi_vl_old)
    VALUES (USER(), 'CARRINHO', 'DELETE',
            CONCAT('data: ', OLD.carr_data, ', status: ', OLD.carr_status));
END;
//
DELIMITER ;


-- PROCEDURE
DELIMITER //
CREATE PROCEDURE atualizar_preco_obra (IN obra_id_param INT, IN novo_preco DECIMAL(10, 2))
BEGIN
    UPDATE OBRA SET obra_preco = novo_preco WHERE obra_id = obra_id_param;
END;
//
DELIMITER ;
-- Functions
DELIMITER //
CREATE FUNCTION calcular_total_vendas_artista (arti_id_param INT)
RETURNS DECIMAL(10, 2) DETERMINISTIC
BEGIN
    DECLARE total DECIMAL(10, 2);
    SELECT SUM(vend_valor) INTO total FROM VENDA
    INNER JOIN OBRA ON VENDA.obra_id = OBRA.obra_id
    WHERE OBRA.arti_id = arti_id_param;
    RETURN total;
END //
DELIMITER ;

-- Views
CREATE VIEW obras_mais_vendidas AS
SELECT obra_titulo, COUNT(*) AS total_vendas
FROM VENDA
INNER JOIN OBRA ON VENDA.obra_id = OBRA.obra_id
GROUP BY obra_titulo
ORDER BY total_vendas DESC;