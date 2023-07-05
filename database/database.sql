/* database name: OICBASE */

create table SuperAdmin(
    supreID int(1),
    superPassword varchar(50)
);

create table Admin(
    AdmId int auto_increment primary key,
    Admname varchar(50),
    email varchar(50),
    Admrole varchar(50),
    Admnumber int,
    AdmPassword varchar(50));

create table files(
    fileId int auto_increment primary key,
    AdmId int,
    destination varchar(200),
    FOREIGN KEY (AdmId) references Admin(AdmId));

create table Blog(
    BlogId int auto_increment primary key,
    AdmId int,
    subjectType char(20),
    blogDate varchar(15),
    author varchar(50),
    FOREIGN KEY (AdmId) references Admin(AdmId));

create table user(
    userId int auto_increment primary key,
    userName varchar(50),
    userMail varchar(50));

create table reviews(
    reviewId int auto_increment primary key,
    userId int,
    reviewText varchar (200),
    reviewDate varchar (15),
    FOREIGN KEY (userId) references user(userId)
);


