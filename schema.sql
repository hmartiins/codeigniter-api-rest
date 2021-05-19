-- MySQL / MariaDB

-- Cria o database usado
DROP DATABASE IF EXISTS CodeIgniter;
CREATE DATABASE CodeIgniter;

-- Cria o usuario do CodeIgniter

CREATE USER codeigniter@localhost;
GRANT ALL PRIVILEGES ON CodeIgniter.* TO codeigniter@localhost;

-- Cria a tabela

CREATE TABLE tb_anime(
    cd_anime INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
    nm_anime VARCHAR(200) NOT NULL UNIQUE,
    vl_genero VARCHAR(100) NOT NULL,
    vl_ano YEAR NOT NULL,
    vl_rating INTEGER CHECK( 0 < vl_rating <= 5)
);

-- Carga basica

INSERT INTO tb_anime (nm_anime, vl_genero, vl_ano, vl_rating) VALUES
("Kimetsu no Yaiba", "Shounen", '2016', 4),
("JoJo Kimiuo No Buken", "Shounen", '2004', 5),
("Black Clover", "Shounen", '2015', 4),
("Kimetsu no Yaiba Mugen Train", "Shounen", '2021', 5),
("Bakemonogatari", "Suspense", '2007', 5);
