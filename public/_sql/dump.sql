drop table jogadors;
drop table times;

create table jogadors (
id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
nome varchar(50),
nacionalidade varchar(50),
posicao varchar(20) ,
idade int(10),
time_id varchar(10),
created_at datetime ,
updated_at datetime
);

create table times (
id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
nome varchar (50),
estado varchar (10),
cidade varchar (30),
divisao varchar (10),
created_at datetime ,
updated_at datetime
);
