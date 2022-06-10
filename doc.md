## comandos
> -u = usuario
>> -p = password
- `mariadb -u alessandro -p livre`

## comondos database
- `SHOW DATABASES;` =>  mostra todos os bancos
- `SHOW TABLES;` => mostra todas as tabelas
- `CREATE DATABASE db_escola;` => cria o banco db_escola
- `USE db_escola;` => usa o banco db_escola
- cria tabela de professor 
```sql
CREATE TABLE tb_professor(
  nome VARCHAR(100) NOT NULL,
  cpf CHAR(11) NOT NULL,
  email VARCHAR(255) NOT NULL
);
```
