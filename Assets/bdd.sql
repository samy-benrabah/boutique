-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : Dim 07 mars 2021 à 09:59
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `first_name`, `last_name`, `username`, `email`, `password`) VALUES
(1, 'Morad', 'LABRID', 'Moradii.84', 'morad.labrid@laplateforme.io', '123123'),
(2, 'Samy', 'BENRABAH', 'samy', 'samy.benrabah@laplateforme.io', 'samy');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `categorie_title` varchar(255) DEFAULT NULL,
  `description_title` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `categorie_title`, `description_title`) VALUES
(1, 'Cuisine', 'Vous trouvez dans cette categories tous les decorations pour votre cuisine'),
(5, 'toilette', 'Vous trouvez dans cette categories tous les decorations pour votre toilette'),
(6, 'Salle de bain', 'Vous trouvez dans cette categories tous les decorations pour votre salle de bain\r\n\r\n'),
(7, 'Chambre', 'Vous trouvez dans cette categories tous les decorations pour votre chambre'),
(8, 'salle a manger', 'Vous trouvez dans cette categories tous les decorations pour votre salle a manger');

-- --------------------------------------------------------

--
-- Structure de la table `container`
--

CREATE TABLE `container` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `container`
--

INSERT INTO `container` (`id`, `id_order`, `id_product`, `quantity`) VALUES
(1, 1, 3, 1),
(2, 1, 10, 2),
(3, 2, 12, 1),
(4, 3, 5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `discounts`
--

INSERT INTO `discounts` (`id`, `name`, `value`) VALUES
(2, 'REMY10OFF', 10),
(4, 'LAJOLIETTE', 0),
(6, 'LAPLATEFORME4', 40);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `processing` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id_order`, `order_date`, `processing`, `id_user`, `id_discount`) VALUES
(1, '2021-02-12 00:00:00', 1, 1, 6),
(2, '2021-01-28 00:00:00', 1, 2, 4),
(3, '2020-12-30 00:00:00', 1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` varchar(225) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `product_date` date DEFAULT NULL,
  `id_cate` int(11) DEFAULT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `image`, `title`, `description`, `price`, `product_date`, `id_cate`, `id_admin`) VALUES
(1, '001.jpg', 'Table avec tiroir', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.', 13, '2021-02-18', 1, 1),
(2, '002.jpg', 'Preckly Clock', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis. vase', 59, '2021-02-18', 7, 1),
(3, '003.jpg', 'Black Clock', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.', 35, '2021-02-18', 7, 2),
(4, '004.jpg', 'Lampe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.', 35, '2021-02-18', 1, 1),
(5, '005.jpg', 'Chaise blanx', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.', 28, '2021-02-18', 1, 2),
(6, '603cf7f0395712.32649335.jpg', 'Vase', 'Le matériau de ce produit est recyclable. Renseignez-vous auprès de votre commune pour connaître la réglementation locale et pou<sdvjnsd ddvr savoir s’il y a une déchetterie près de chez vous.\r\nAvec ou sans fleurs, ce vase est un bel objet de décoration.\r\n\r\nDesigner\r\nInma Bermudez\r\n\r\nLongueur: 22 cm\r\nPoids: 1.10 kg\r\nDiamètre: 16 cm\r\nColis: 1', 29.89, '2021-02-18', 6, 2),
(9, '009.jpg', 'Clew', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.', 12, '2021-02-18', 5, 2),
(10, '602f9382719510.75868677.jpg', 'BASKET WITH HANDLES', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.vase', 19, '2021-02-19', 8, 1),
(11, '603cfd96a440d7.59283265.jpg', 'Bulb lumieres', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.', 39, '2021-03-01', 7, 1),
(12, '603dffc7e3aa68.74366932.jpg', 'gazelle', 'Lorem ipsum dolor sit amet, consectetur \r\nadipiscing elit. In ut ullamcorper leo, eget euismod orci. \r\nCum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam samyyyy.vase', 60, '2021-03-01', 8, 2);

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `star` int(11) DEFAULT NULL,
  `comment` text,
  `date` date NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id`, `star`, `comment`, `date`, `id_user`, `id_product`) VALUES
(1, 3, 'Très joli vase, j‘attend de recevoir mes fleurs et ce sera magnifique !', '2021-01-13', 2, 6),
(2, 2, 'Super pour des fleurs artificielles, séchées, serait il possible d‘avoir d‘autres couleurs ?', '2020-09-20', 1, 6),
(4, 5, 'S‘intègre parfaitement dans une déco bohème chic', '2020-11-02', 3, 6),
(5, 2, 'Je ne me suis pas rendu compte que 30 cm c‘est trop pour un vase. Il me faudrait des bouquets géants !', '2021-02-23', 3, 10),
(6, 1, 'Jai jamais recu mon vase', '2021-03-05', 3, 6),
(7, 4, 'le vase est lourd un peu! a part ca il est magnifique', '2021-03-05', 3, 6),
(8, 2, 'merci keke', '2021-03-05', 3, 6),
(9, 3, 'tres jolie vase, je recommande vivement', '2021-03-05', 3, 6),
(10, 3, 'j\'aime bien...', '2021-03-05', 3, 2),
(11, 3, 'decu', '2021-03-05', 3, 2),
(12, 3, 'pas mal dommage que ca viens de chine', '2021-03-05', 3, 11);

-- --------------------------------------------------------

--
-- Structure de la table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `back_color` varchar(255) NOT NULL,
  `afficher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `title`, `description`, `back_color`, `afficher`) VALUES
(1, '001.jpg', 'Mini-Chaise', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse minus autem amet nesciunt voluptate perspiciatis iste dicta cum reprehenderit. Id reprehenderit tenetur quo voluptas doloribus? Ipsam excepturi ullam magnam non.', '#f1f1f1', 1),
(2, '002.jpg', 'Clock murale', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse minus autem amet nesciunt voluptate perspiciatis iste dicta cum reprehenderit. Id reprehenderit tenetur quo voluptas doloribus? Ipsam excepturi ullam magnam non.', '#f1f1f1', 1),
(5, '60368f4d7b71a3.77685721.png', 'Chaise noir', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse minus autem amet nesciunt voluptate perspiciatis iste dicta cum reprehenderit.', 'bisque', 1),
(7, '60369acc62ac51.25883707.png', 'Lambe bois', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse minus autem amet nesciunt voluptate perspiciatis iste dicta cum reprehenderit. Id reprehenderit tenetur quo voluptas doloribus? Ipsam excepturi ullam magnam non.', 'coral', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(225) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `registre_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `phone`, `password`, `adress`, `zip`, `city`, `country`, `registre_date`) VALUES
(1, 'Ruben', 'HABIB', 'ruben13', 'ruben@hotmail.com', '0624565538', '123', '8 rue d‘hosier', '13002', 'Marseile', 'France', '2021-02-13 00:00:00'),
(2, 'Jessica', 'Soriano', 'Jessica13', 'jessica@hotmail.com', '0771040112', '123', '8 rue d‘hosier', '13002', 'Paris', 'France', '2020-11-05 00:00:00'),
(3, 'Assia', 'Ali', 'Assia13', 'assia-ali@gmail.com', '0745826715', '123', '152 avenue du prado', '13006', 'Marseille', 'France', '2021-01-02 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `container`
--
ALTER TABLE `container`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_discount` (`id_discount`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Index pour la table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `container`
--
ALTER TABLE `container`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_discount`) REFERENCES `discounts` (`id`);

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);
