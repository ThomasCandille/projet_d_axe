-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 26 mai 2023 à 19:58
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
  `post_text` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `post_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_like` int NOT NULL,
  `post_tag` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_file` mediumblob NOT NULL,
  `post_user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`post_id`, `post_text`, `post_time`, `post_like`, `post_tag`, `post_file`, `post_user_id`) VALUES
(214, 'Wow trop bien les tests !', '2023-05-26 19:38:24', 0, 'HTML', '', 2),
(217, 'test publication d\'un post', '2023-05-26 20:32:00', 0, 'HTML', '', 2),
(218, 'un autre utilisateur ? ', '2023-05-26 20:33:38', 0, 'JS', '', 8),
(219, 'In Cro Ya Ble', '2023-05-26 20:33:48', 0, 'Ruby', '', 8),
(220, 'c\'est un nouveau post ', '2023-05-26 21:53:08', 0, 'JS', '', 10),
(221, 'Courage pour la soutenance !', '2023-05-26 21:53:29', 0, 'Memes', '', 10),
(222, 'ahah c\'est trop moi ca ', '2023-05-26 21:56:02', 0, 'Memes', 0x6d656d655f636f64652e6a7067, 11),
(223, 'vraiment trop moi ca', '2023-05-26 21:57:07', 0, 'Memes', 0x655f6d656d652e6a706567, 2);

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
(2, 'thomas', '$2y$10$ACgK8d5nvt8IBQEJHQK7Vei2BkxxZQLv.06UyRyRhuUMq4N3r2O3C', 'thomas@thomas.com', 'https://fastly.picsum.photos/id/103/200/200.jpg?hmac=iAYeZbg7h6KXJzEJuemMnhxfHUPDu6OkgQ_TfAMWlRM'),
(7, 'RasperryPico <3', 'RasperryPico', 'RasperryPico@gmail.com', 'https://fastly.picsum.photos/id/149/200/200.jpg?hmac=ykhZe9T_HysK0voTz01NVBW7C8XlLYYT2EinqAhTA-0'),
(10, 'francois', '$2y$10$0pe8aeUji23hpAe4bjZ3VuLqW7UCo7KX.e867TS3Zfo2W03MY1ll.', 'francois@coisfran.com', 'https://fastly.picsum.photos/id/830/200/200.jpg?hmac=3ce7zNUn5yg_XKy7dHgIHta7t_0vghPQnAGUSGJuBZE'),
(11, 'quentin', '$2y$10$S0J29zri3ryG6sBQZ9UE.uJOoCgkNwKOxXpLY8KjRqGnMBIFeGPBa', 'quentin@garnier.com', 'https://fastly.picsum.photos/id/109/200/200.jpg?hmac=vqAWt9QCvOo67gp7N7_-QeMlU5k0G47VIWM_B8Js-ww');

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
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
