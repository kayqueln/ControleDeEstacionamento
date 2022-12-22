Create database Estacionamento;

Use Estacionamento;

Create table Funcionario (
    IdFuncionario int not null primary key auto_increment,
    Nome varchar(30) not null,
    Cargo varchar(30) not null,
    Foto varchar(60) null
);

Create table Escala (
    IdEscala int not null primary key auto_increment,
    HoraEntrada time not null,
    HoraSaida time not null,
    DiaSemana varchar(200) not null,
    IdFuncionario int not null,
    constraint FK_Escala_Usuario foreign key(IdFuncionario)
    references Funcionario(IdFuncionario)
    on DELETE CASCADE
);

Create table Veiculo (
    IdVeiculo int not null primary key auto_increment,
    Placa varchar(15) not null,
    Modelo varchar(30) not null,
    Cor varchar(15) not null,
    IdFuncionario int not null,
    constraint FK_Carros_Usuario foreign key(IdFuncionario)
    references Funcionario(IdFuncionario)
    on DELETE CASCADE
);

Create table Acesso (
    IdAcesso int not null primary key auto_increment,
    DataAcesso date not null,
    EntradaAcesso time not null,
    SaidaAcesso time null,
    IdFuncionario int not null,
    constraint FK_Acesso_Funcionarios foreign key(IdFuncionario)
    references Funcionario(IdFuncionario)
    on DELETE CASCADE
);

Create table Administrador (
    IdFuncionario int not null primary key,
    LoginAdm varchar(30) null,
    SenhaAdm varchar(30) not null,
    constraint FK_administrador_Funcionarios foreign key(IdFuncionario)
    references Funcionario(IdFuncionario)
    on DELETE CASCADE
);

INSERT INTO Funcionario
VALUES (null, 'Julia', 'Professor(a)', "../arquivos/639fd7a3139b1.png"),
(null, 'Isabela', 'Coordenador(a)', "../arquivos/639fd7accff98.png"),
(null, 'Edson', 'Professor(a)', "../arquivos/639fd7cce75ec.png"),
(null, 'Claudio', 'Cantina', "../arquivos/639fd7d2c2962.png"),
(null, 'Neusa', 'Professor(a)', "../arquivos/639fd7d8e9bc2.png"),
(null, 'Firmino', 'Cantina', "../arquivos/639fd7df85baa.png"),
(null, 'Bernadete', 'Coordenador(a)', "../arquivos/639fd7e5d9cd5.png");

INSERT INTO Escala 
VALUES(null, '18:00', '22:00', 'Segunda, Quarta e Sexta', 1),
(null, '19:30', '21:30', 'Terca, Quarta, Quinta e Sexta', 2),
(null, '18:30', '22:30', 'Quarta, Quinta e Sexta', 3),
(null, '19:45', '21:30', 'Segunda, Terca, Quarta, Quinta e Sexta', 4),
(null, '20:00', '22:30', 'Terca, Quarta, e Sexta', 5),
(null, '19:45', '21:30', 'Terça, Quarta, Quinta e Sexta', 6),
(null, '18:30', '21:00', 'Segunda, Terca, Quinta e Sexta', 7);

INSERT INTO Veiculo
VALUES(null, 'ETE1234', 'IX35', 'Preto', 1),
(null, 'VIC1234', 'Onix', 'Cinza', 2),
(null, 'KET1234', 'Vectra', 'Preto', 3),
(null, 'SID1234', 'JEEP Renegate', 'Branco', 4),
(null, 'SAR1234', 'Agile', 'Vermelho', 5),
(null, 'KAY1234', 'Corolla', 'Cinza', 6),
(null, 'GIL1234', 'HB20', 'Azul Marinho', 7);

INSERT INTO Acesso
VALUES(null, '2022-02-03', '18:00', '22:00', 1),
(null, '2022-02-03', '19:30', '21:30', 2),
(null, '2022-03-10', '18:30', '22:30', 3),
(null, '2022-03-15', '19:45', '21:30', 4),
(null, '2022-03-30', '20:00', '22:30', 5),
(null, '2022-04-07', '19:45', '21:30', 6),
(null, '2022-04-21', '18:30', '21:00', 7);

INSERT INTO Administrador
VALUES(2, 2, '1234'),
(7, 7, '4321');