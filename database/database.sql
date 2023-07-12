/* database name: oicData */
create table Admin(
    AdmId int auto_increment primary key,
    adminName varchar(50),
    AdmPassword varchar(50));

create table Blog(
    BlogId int auto_increment primary key,
    AdmId int,
    subjectType char(20),
    blogDate varchar(15),
    author varchar(50));

create table members(
    userId int auto_increment primary key,
    userName varchar(50),
    userMail varchar(50),
    useProfile varchar(100));
create table users(
id int primary key auto_increment,
username varchar(100),
email varchar(50),
pwd varchar(50)
);

create table forum(
userForumId int primary key auto_increment,
firstName varchar (50),
secName varchar(50),
email varchar(50),
phone int,
role char(50)
);


