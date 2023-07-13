
-- Base de données : `oicdata`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE admin (
  AdmId int(11) NOT NULL,
  admname char(20) DEFAULT NULL,
  AdmPassword varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO admin (`AdmId`, `admname`, `AdmPassword`) VALUES
(1, 'OIC', 'Innovation2023');

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE blog (
  id varchar(50) NOT NULL ,
  subject varchar(50) DEFAULT NULL,
  link varchar(100) DEFAULT NULL,
  author varchar(50) DEFAULT NULL,
  picture varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO blog (`id`, `subject`, `link`, `author`, `picture`) VALUES
('64afb61e47458', 'test 3', 'com.cartele.oic', 'cartele', 'BlogImages/IMG-20230619-WA0029.jpg'),
('64afba7d3b40b', 'test 3', 'com.cartele.oic', 'cartele', 'BlogImages/IMG-20230619-WA0029.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE forum (
  userForumId int(11) NOT NULL,
  firstName varchar(50) DEFAULT NULL,
  secName varchar(50) DEFAULT NULL,
  email varchar(50) DEFAULT NULL,
  phone int(11) DEFAULT NULL,
  role char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE members (
  userId varchar  NOT NULL,
  userName varchar(50) DEFAULT NULL,
  userMail varchar(50) DEFAULT NULL,
  role varchar(100) DEFAULT NULL,
  useProfile varchar(100) DEFAULT NULL,
  fblink varchar(100) DEFAULT NULL,
  twtlink varchar(100) DEFAULT NULL,
  Lkdlink varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`userId`, `userName`, `userMail`, `role`, `useProfile`, `fblink`, `twtlink`, `Lkdlink`) VALUES
(64, 'cartele', 'catele@gmail.com', 'Software Dev', 'MemberProfiles/iai.jpeg', 'duchel tassonwa', 'carteledev', 'none');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE users (
  id int(11) NOT NULL ,
  username varchar(100) DEFAULT NULL,
  email varchar(50) DEFAULT NULL,
  pwd varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pwd`) VALUES
(1, 'cartele', 'mandeimelda13@gmail.com', '$2y$10$ScJGhhxCXGkLG6IL52XG8urh7JzqNAmZOaCkw99fgEwW7C55CJNgG'),
(2, 'liliane', 'mandeimelda13@gmail.com', '$2y$10$Ggv9OGYb4VI13mLWxNQrvu4naqa/JihsCWHbPpYHe75MS9SifiNCy'),
(3, 'lho', '654+6@gmail.com', '$2y$10$vqdVfq6IKuZ.nz4MY4Y4muCLbAZeI03OgKSkXrz06nQNZwAy8omk2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE admin
  ADD PRIMARY KEY (`AdmId`);

--
-- Index pour la table `blog`
--
ALTER TABLE blog
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forum`
--
ALTER TABLE forum
  ADD PRIMARY KEY (`userForumId`);

--
-- Index pour la table `members`
--
ALTER TABLE members
  ADD PRIMARY KEY (`userId`);

--
-- Index pour la table `users`
--
ALTER TABLE users
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE admin
  MODIFY AdmId int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE forum
  MODIFY userForumId int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE members
  MODIFY userId int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE users
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
