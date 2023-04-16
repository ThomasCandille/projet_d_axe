-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 16 avr. 2023 à 21:48
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_d_axe`
--

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `post_id` int NOT NULL,
  `post_pseudo` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `post_text` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `post_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_like` int NOT NULL,
  `post_pp` text COLLATE utf8mb4_general_ci NOT NULL,
  `post_tag` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_tag_class` text COLLATE utf8mb4_general_ci NOT NULL,
  `post_file` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`post_id`, `post_pseudo`, `post_text`, `post_time`, `post_like`, `post_pp`, `post_tag`, `post_tag_class`, `post_file`) VALUES
(110, 'thomas', 'plus jamais je touche aux images', '2023-04-16 20:48:38', 0, 'https://fastly.picsum.photos/id/103/200/200.jpg?hmac=iAYeZbg7h6KXJzEJuemMnhxfHUPDu6OkgQ_TfAMWlRM', 'PhP', 'PhP', 0x7361636a6572656d2e706e67),
(111, 'thomas', 'je suis aussi bon en css qu\'en dessin, voici une de mes meilleurs oeuvres :', '2023-04-16 20:50:28', 0, 'https://fastly.picsum.photos/id/103/200/200.jpg?hmac=iAYeZbg7h6KXJzEJuemMnhxfHUPDu6OkgQ_TfAMWlRM', 'CSS', 'CSS', 0x77797665726e652e706e67),
(113, 'thomas', 'me when i realise i missed a \';\'', '2023-04-16 21:36:48', 0, 'https://fastly.picsum.photos/id/103/200/200.jpg?hmac=iAYeZbg7h6KXJzEJuemMnhxfHUPDu6OkgQ_TfAMWlRM', 'PhP', 'PhP', 0x6769665f746573742e676966),
(114, 'thomas', 'litteraly python :', '2023-04-16 22:33:24', 0, 'https://fastly.picsum.photos/id/103/200/200.jpg?hmac=iAYeZbg7h6KXJzEJuemMnhxfHUPDu6OkgQ_TfAMWlRM', 'Python', 'Python', 0x707974686f6e717569707974686f6e6e652e706e67),
(115, 'thomas', 'quand je vois quentin dans le meme groupe que moi', '2023-04-16 23:29:54', 0, 'https://fastly.picsum.photos/id/103/200/200.jpg?hmac=iAYeZbg7h6KXJzEJuemMnhxfHUPDu6OkgQ_TfAMWlRM', 'Memes', 'Memes', 0x73706565646572206d656d65),
(116, 'thomas', 'Hello, bienvenue sur ce projet\r\nMoi c\'est Thomas, 18 ans, étudiant a l\'iim en plein rush pour finir son projet, j\'espere que le projet va vous plaire\r\nLa bise !', '2023-04-16 23:33:51', 0, 'https://fastly.picsum.photos/id/103/200/200.jpg?hmac=iAYeZbg7h6KXJzEJuemMnhxfHUPDu6OkgQ_TfAMWlRM', 'Misc', 'Misc', 0x494d475f333133302e4a5047),
(118, 'thomas', 'final push, bonne nuit <3', '2023-04-16 23:47:35', 0, 'https://fastly.picsum.photos/id/103/200/200.jpg?hmac=iAYeZbg7h6KXJzEJuemMnhxfHUPDu6OkgQ_TfAMWlRM', 'HTML', 'HTML', 0x306378697779767468676336312e706e67);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `user_name` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_mail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_pp` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_mail`, `user_pp`) VALUES
(1, 'tommahs', '$2y$10$OFd2W7yPNsrBteL.rEKImuZQaayKuxzlJOYuYmQuSh5Ue3jE1ASf2', 'tom@mas.com', 'https://fastly.picsum.photos/id/421/200/200.jpg?hmac=Kix073-H73pkRedH4XJ8fenHLI9Sd9akWlOFjKog0EA'),
(2, 'thomas', '$2y$10$ACgK8d5nvt8IBQEJHQK7Vei2BkxxZQLv.06UyRyRhuUMq4N3r2O3C', 'thomas@thomas.com', 'https://fastly.picsum.photos/id/103/200/200.jpg?hmac=iAYeZbg7h6KXJzEJuemMnhxfHUPDu6OkgQ_TfAMWlRM'),
(5, 'tommas', '$2y$10$Twi3QT6VOzDssNZASa9jlOZM522e1wxAtVLa3u4ukX7oyw1WEocCi', 'tomm@as.com', 'https://fastly.picsum.photos/id/221/200/200.jpg?hmac=zy33VSww4_QQk0Hf2MngBaudI_ahiadnRwuREDTbWnA');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
