## comandos
> -u = usuario
>> -p = password
>>> caso não haja senha e so da o -p e da enter que ele entra normal
- `mariadb -u alessandro -p livre` => acessa o mariadb no terminal

## comondos database  
- `SHOW DATABASES;` =>  mostra todos os bancos
- `SHOW TABLES;` => mostra todas as tabelas
- `CREATE DATABASE db_escola;` => cria o banco db_escola
- `USE db_escola;` => usa o banco db_escola
- `DESC nome_tabela;` => ver estrutura da tabela depois de ser criada

## cria tabelas
```sql
CREATE TABLE tb_professor(
  id INT(11) PRIMARY KEY AUTO_INCREMENT, 
  nome VARCHAR(100) NOT NULL,
  cpf CHAR(11) UNIQUE NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE tb_aluno(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  cpf CHAR(11) UNIQUE NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
);

CREATE TABLE tb_diciplina(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  carga_horaria INT(4),
  nome VARCHAR(100) NOT NULL,
);

CREATE TABLE tb_curso(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  id_professor INT,
  id_diciplina INT,
  FOREIGN KEY(id_professores) REFERENCES tb_professor(id),
  FOREIGN KEY(id_diciplina) REFERENCES tb_diciplina(id)
);
```

## Excluir

```sql
--- (NAO RECOMENDADO EM PRODUÇÃO) ---
-- exclui tabela --
DROP TABLE tb_professor;

-- um registro --
DELETE FROM tb_professor WHERE id='2'
```

## Iserir
```sql
INSERT INTO tb_professor (nome, email, cpf)
VALUES (
  'Alessandro','ale@email.com','12345678911'
);

----- iserindo multiplos ------
INSERT INTO tb_professor (nome, email, cpf)
VALUES 
('Alessandro','ale@email.com','12345678910')
('Alessandro1','ale1@email.com','12345678911')
('Alessandro2','ale2@email.com','12345678912')
('Alessandro3','ale3@email.com','12345678913');

```

## editar (UPDATE)
```sql
----- todos -----
-- MUITO CUIDADO POIS ALTERANDO NAO TEM COMO VOLTAR --
UPDATE tb_professor SET nome='alterando todos pra luiza';

--- apenas um  ---
UPDATE tb_professor SET nome='alterando todos pra luiza' WHERE cpf='12345678914';

```

## Buscar dados
```sql
-- todos --
SELECT * FROM tb_professor;

-- apenas um --
SELECT * FROM tb_professor WHERE id='5';

-- dados especificos de todos
SELECT nome, cpf FROM tb_professor;

-- dados especificos de apenas um
SELECT nome, cpf FROM tb_professor WHERE id='5';

-- dados especificos de todos que o id for maior que 5 --
SELECT nome, cpf FROM tb_professor WHERE id > 5;
```
