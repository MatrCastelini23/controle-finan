USE controle_finan;

CREATE TABLE compras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ativo VARCHAR(10) NOT NULL,
    quantidade INT NOT NULL,
    valor_unitario DECIMAL(10, 2) NOT NULL,
    data_compra DATE NOT NULL
);


CREATE TABLE dividendos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ativo VARCHAR(10) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    data_recebimento DATE NOT NULL
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL
);

/* FAKEDATA */



INSERT INTO compras (ativo, quantidade, valor_unitario, data_compra) VALUES ('PETR4', 100, 25.50, '2024-01-15');
INSERT INTO compras (ativo, quantidade, valor_unitario, data_compra) VALUES ('VALE3', 50, 30.00, '2024-02-20'); 

INSERT INTO dividendos (ativo, valor, data_recebimento) VALUES ('PETR4', 150.00, '2024-03-10');
INSERT INTO dividendos (ativo, valor, data_recebimento) VALUES ('VALE3', 75.00, '2024-04-05');  