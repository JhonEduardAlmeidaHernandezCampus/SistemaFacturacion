CREATE DATABASE db_hunter_facture_JhonHernandez_;
USE db_hunter_facture_JhonHernandez_;
CREATE TABLE tb_client(
    id_client INT(10) NOT NULL PRIMARY KEY COMMENT 'Cedula del cliente',
    name_client VARCHAR(60) NOT NULL COMMENT 'Nombre del cliente',
    email_client VARCHAR(30) NOT NULL COMMENT 'Email del cliente',
    client_address VARCHAR(30) NOT NULL COMMENT 'Direccion del cliente',
    client_phone INT(10) NOT NULL COMMENT 'Telefono del cliente'
);
CREATE TABLE tb_invoice(
    N_Invoice VARCHAR(20) NOT NULL PRIMARY KEY COMMENT 'Numero de factura',
    D_Invoice DATETIME NOT NULL DEFAULT NOW() UNIQUE COMMENT 'Fecha de la factura'
);
CREATE TABLE tb_products(
    cod_product VARCHAR(30) NOT NULL PRIMARY KEY COMMENT 'Codigo del producto',
    name_product VARCHAR(40) NOT NULL COMMENT 'Nombre del producto',
    amount_product INT(10) NOT NULL COMMENT 'Cantidad del producto',
    unit_value_product INT(10) NOT NULL COMMENT 'Precio valor unidad de cada producto'
);
CREATE TABLE tb_seller(
    id_seller INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'Id del vendedor autoincrementable',
    seller VARCHAR(60) NOT NULL COMMENT 'Nombre del vendedor'
);

ALTER TABLE tb_invoice MODIFY fk_id_client INT(25) NOT NULL COMMENT 'Relacion de la tabla tb_client';
ALTER TABLE tb_invoice MODIFY fk_cod_product VARCHAR(30) NOT NULL COMMENT 'Relacion de la tabla tb_products';
ALTER TABLE tb_invoice MODIFY fk_id_seller INTEGER(11) NOT NULL COMMENT 'Relacion de la tabla tb_seller';
ALTER TABLE tb_invoice ADD CONSTRAINT tb_invoice_tb_client_fk FOREIGN KEY(fk_id_client) REFERENCES tb_client(id_client);
ALTER TABLE tb_invoice ADD CONSTRAINT tb_invoice_tb_products_fk FOREIGN KEY(fk_cod_product) REFERENCES tb_products(cod_product);
ALTER TABLE tb_invoice ADD CONSTRAINT tb_invoice_tb_seller_fk FOREIGN KEY(fk_id_seller) REFERENCES tb_seller(id_seller);

USE db_hunter_facture;
INSERT INTO tb_client(identificacion, full_name, email, address, phone)VALUE("1102391275", "Jhon Eduard Almeida Hernandez", "jhonhernandez.campus@gmail.com", "Calle 11B - Zafiro", "3005559677");