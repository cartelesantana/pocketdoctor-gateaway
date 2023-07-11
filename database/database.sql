/* database name: OICBASE */
create table Admin(
    AdmId int auto_increment primary key,
    Admname varchar(50),
    email varchar(50),
    Admrole varchar(50),
    Admnumber int,
    AdmPassword varchar(50),
    AdmProfile varchar(100));

create table Blog(
    BlogId int auto_increment primary key,
    AdmId int,
    subjectType char(20),
    blogDate varchar(15),
    author varchar(50));

create table user(
    userId int auto_increment primary key,
    userName varchar(50),
    userMail varchar(50),
    useProfile varchar(100));

create table forum(
userForumId int primary key auto_increment,
firstName varchar (50),
secName varchar(50),
email varchar(50)
phone int,
role char(50)
);


