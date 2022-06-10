## comandos
> -u = usuario
>> -p = password
- `mariadb -u alessandro -p livre` => acessa o mariadb no terminal

## comondos database
- `SHOW DATABASES;` =>  mostra todos os bancos
- `SHOW TABLES;` => mostra todas as tabelas
- `CREATE DATABASE db_escola;` => cria o banco db_escola
- `USE db_escola;` => usa o banco db_escola
- cria tabelas
```sql
CREATE TABLE tb_professor(
  nome VARCHAR(100) NOT NULL,
  cpf CHAR(11) NOT NULL,
  email VARCHAR(255) NOT NULL
);

CREATE TABLE tb_aluno(
  nome VARCHAR(100) NOT NULL,
  cpf CHAR(11) NOT NULL,
  email VARCHAR(255) NOT NULL,
  matricula VARCHAR(10) NOT NULL,
);
```

- iserindo dados 
```sql
INSERT INTO tb_professor (nome, email, cpf)
VALUES (
  'Alessandro','ale@email.com','12345678911'
);
```

- buscando dados no banco
```sql
SELECT * FROM tb_professor;
```
