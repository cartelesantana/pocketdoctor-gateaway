
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE admin (
  AdmId int(11) NOT NULL,
  admname char(20) DEFAULT NULL,
  AdmPassword varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO admin (AdmId, admname, AdmPassword) VALUES
(1, 'OIC', 'Innovation2023');

CREATE TABLE blog (
  id varchar(50) NOT NULL,
  subject varchar(50) DEFAULT NULL,
  link varchar(100) DEFAULT NULL,
  author varchar(50) DEFAULT NULL,
  picture varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE forum (
  userForumId varchar(50) NOT NULL,
  firstName varchar(50) DEFAULT NULL,
  secName varchar(50) DEFAULT NULL,
  email varchar(50) DEFAULT NULL,
  whatsapp varchar(20) DEFAULT NULL,
  phoneNumber int(11) DEFAULT NULL,
  twitter varchar(20) DEFAULT NULL,
  facebook varchar(20) DEFAULT NULL,
  linkedIn varchar(20) DEFAULT NULL,
  how char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE members (
  userId varchar(50) NOT NULL,
  userName varchar(50) DEFAULT NULL,
  userMail varchar(50) DEFAULT NULL,
  role varchar(100) DEFAULT NULL,
  useProfile varchar(100) DEFAULT NULL,
  fblink varchar(100) DEFAULT NULL,
  twtlink varchar(100) DEFAULT NULL,
  Lkdlink varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE reviews (
  senderName varchar(100) DEFAULT NULL,
  senderMail varchar(100) DEFAULT NULL,
  subject varchar(100) DEFAULT NULL,
  text varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE users (
  id int(11) NOT NULL,
  username varchar(100) DEFAULT NULL,
  email varchar(50) DEFAULT NULL,
  pwd varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE admin
  ADD PRIMARY KEY (AdmId);


ALTER TABLE blog
  ADD PRIMARY KEY (id);


ALTER TABLE forum
  ADD PRIMARY KEY (userForumId);


ALTER TABLE members
  ADD PRIMARY KEY (userId);


ALTER TABLE users
  ADD PRIMARY KEY (id);


ALTER TABLE admin
  MODIFY AdmId int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE users
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
