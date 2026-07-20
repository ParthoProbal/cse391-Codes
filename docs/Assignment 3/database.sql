-- create database if not exists carWorkshopDb;
-- use carWorkshopDb;


create table if not exists mechanics (
    mechanicId int not null auto_increment,
    mechanicName varchar(100) not null,
    primary key (mechanicId)
);


create table if not exists appointments (
    appointmentId int not null auto_increment,
    clientName varchar(100) not null,
    clientAddress varchar(255) not null,
    clientPhone varchar(20) not null,
    carLicenseNumber varchar(50) not null,
    carEngineNumber varchar(50) not null,
    appointmentDate date not null,
    mechanicId int not null,
    primary key (appointmentId),
    foreign key (mechanicId) references mechanics(mechanicId)
);


insert into mechanics (mechanicName) values ('Leon Kennedy');
insert into mechanics (mechanicName) values ('Ada Wong');
insert into mechanics (mechanicName) values ('Claire Redfield');
insert into mechanics (mechanicName) values ('Nemesis');
insert into mechanics (mechanicName) values ('Jack Krauser');
insert into mechanics (mechanicName) values ('Verdugo');


create table if not exists admins (
    adminId VARCHAR(50) PRIMARY KEY,
    adminPassword VARCHAR(255) NOT NULL
);

-- Insert default ADmin
insert into admins (adminId, adminPassword) values ('admin', 'admin');