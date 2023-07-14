
CREATE TABLE admin (
  AdmId int(11) NOT NULL,
  admname char(20) DEFAULT NULL,
  AdmPassword varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO admin (`AdmId`, `admname`, `AdmPassword`) VALUES
(1, 'OIC', 'Innovation2023');

CREATE TABLE blog (
  id varchar(50) NOT NULL ,
  subject varchar(50) DEFAULT NULL,
  link varchar(100) DEFAULT NULL,
  author varchar(50) DEFAULT NULL,
  picture varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO blog (`id`, `subject`, `link`, `author`, `picture`) VALUES
('64afb61e47458', 'test 3', 'com.cartele.oic', 'cartele', 'BlogImages/IMG-20230619-WA0029.jpg'),
('64afba7d3b40b', 'test 3', 'com.cartele.oic', 'cartele', 'BlogImages/IMG-20230619-WA0029.jpg');

CREATE TABLE forum (
  userForumId int(11) NOT NULL,
  firstName varchar(50) DEFAULT NULL,
  secName varchar(50) DEFAULT NULL,
  email varchar(50) DEFAULT NULL,
  phone int(11) DEFAULT NULL,
  role char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE members (
  userId varchar(50)  NOT NULL,
  userName varchar(50) DEFAULT NULL,
  userMail varchar(50) DEFAULT NULL,
  role varchar(100) DEFAULT NULL,
  useProfile varchar(100) DEFAULT NULL,
  fblink varchar(100) DEFAULT NULL,
  twtlink varchar(100) DEFAULT NULL,
  Lkdlink varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `members` (`userId`, `userName`, `userMail`, `role`, `useProfile`, `fblink`, `twtlink`, `Lkdlink`) VALUES
(64, 'cartele', 'catele@gmail.com', 'Software Dev', 'MemberProfiles/iai.jpeg', 'duchel tassonwa', 'carteledev', 'none');

CREATE TABLE users (
  id int(11) NOT NULL ,
  username varchar(100) DEFAULT NULL,
  email varchar(50) DEFAULT NULL,
  pwd varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `username`, `email`, `pwd`) VALUES
(1, 'cartele', 'mandeimelda13@gmail.com', '$2y$10$ScJGhhxCXGkLG6IL52XG8urh7JzqNAmZOaCkw99fgEwW7C55CJNgG');

ALTER TABLE admin
  ADD PRIMARY KEY (`AdmId`);

ALTER TABLE blog
  ADD PRIMARY KEY (`id`);

ALTER TABLE forum
  ADD PRIMARY KEY (`userForumId`);

ALTER TABLE members
  ADD PRIMARY KEY (`userId`);

ALTER TABLE users
  ADD PRIMARY KEY (`id`);

ALTER TABLE admin
  MODIFY AdmId int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE forum
  MODIFY userForumId int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE members
  MODIFY userId int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

ALTER TABLE users
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

