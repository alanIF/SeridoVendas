create database serido_vendas;
use serido_vendas;
create table usuario(
	id int auto_increment not null,
	nome varchar(200) not null,
	email varchar(200) not null,
	senha varchar(200) not null,
	tipo int not null,
	primary key(id)
);
create table fornecedor(
	id int auto_increment not null,
	nome text not null,
	endereco text not null,
	contato text not null,
	cnpj text not null,
	primary key(id)
);

create table produto(
	id int auto_increment not null,
	descricao text not null,
	codigo_barras text not null,
	porcetagem_lucro float,
	preco float,
	estoque_minimo int not null,
	primary key(id)
); 

create table fornecer_produto(
	id int auto_increment not null,
	id_fornecedor int not null,
	id_produto int not null,
	primary key(id),
	foreign key(id_fornecedor) references fornecedor(id),
	foreign key(id_produto) references produto(id)
);



create table entrada(
	id int auto_increment not null,
	qtd_total int not null,
	valor_total float not null,
	data_entrada text not null,
	observacao text,
	primary key(id)
);

create table item_entrada(
	id int auto_increment not null,
	id_produto int not null,
	id_entrada int not null,
	qtd int not null,
	preco_compra float not null,
	data_fabricacao text not null,
	data_validade text not null,
	primary key(id),
	foreign key(id_produto) references produto(id),
	foreign key(id_entrada) references entrada(id)
);

create table venda(
	id int auto_increment not null,
	valor_total float not null,
	data_venda text not null,
	primary key(id)
);

create table item_venda(
	id int auto_increment not null,
	id_produto int not null,
	id_venda int not null,
	qtd int not null,
	primary key(id),
	foreign key(id_produto) references produto(id),
	foreign key(id_venda) references venda(id)
);


