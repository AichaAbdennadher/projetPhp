-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 06 avr. 2025 à 01:39
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `glow &glam`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(1, 'Hair Care', 'Hair Care.jpeg'),
(2, 'Body Care', 'body-care.jpeg'),
(3, 'Face Care', 'Face Care.jpeg'),
(4, 'Fragrance', 'Fragrance.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `image`, `category_id`) VALUES
(1, 'Comfort Exfoliating Cream', 'FLORAISON Comfort Exfoliating Cream is designed to gently exfoliate while respecting even the most delicate skin. Thanks to its formula enriched with prickly pear powder and precious oils, it eliminates dead cells, refines skin texture, and leaves a feeling of immediate comfort.', 40, 10, 'kkk.jpeg', 3),
(3, 'Eye Repair', 'Our Eye Repair eye cream is the secret to fresh, rested eyes. Its unique formula, enriched with powerful natural active ingredients, hydrates, smooths, and refreshes the eye contour area, for visibly younger, more luminous eyes.', 20, 20, '11.webp', 3),
(5, 'Paradise Smell Women Deodorant Cream', 'Discover Paradise Smell Floraison Women Deodorant Cream, a natural and effective alternative to conventional deodorants. Its gentle, skin-friendly formula, free of chemicals, petroleum, aluminum, and carcinogenic ingredients, offers long-lasting protection against odors.', 20, 8, '1.jpeg', 2),
(6, 'Black Soap', 'Rediscover the ancestral ritual of the hammam with our traditional black soap. Formulated with olive oil and essential oils, it deeply cleanses, removes impurities, and leaves your skin soft and radiant.', 30, 10, '5555.jpeg', 2),
(7, 'Protein Hair Lotion', 'Deeply repair and nourish your hair with our keratin hair lotion. Enriched with argan and sesame oils, it penetrates deep into the hair fiber to repair dry and damaged hair. Plant proteins strengthen the hair structure, while flax extract adds shine and softness.', 40, 9, '2.jpeg', 2),
(8, 'Hair Pro Oil - Dry & Damaged Hair', 'Hair Pro Oil is specially formulated to deeply nourish dry and damaged hair. Enriched with precious oils (argan, mustard, castor, shea, sesame, lavender, rosemary, ginger, ylang-ylang, cinnamon), it repairs hair fibers, stimulates growth, and provides unparalleled shine.', 40, 10, '333.jpeg', 1),
(9, 'Vitamin C Cleansing Foam', 'Floraison Vitamin C Radiance & Glow Cleansing Foam is a soft, light foam rich in vitamin C. It gently cleanses and smooths skin texture for a renewed skin effect. It is suitable for all skin types.\r\n\r\nDirections for use: Apply Floraison Vitamin C Radiance & Glow Cleansing Foam daily to a wet face. Lather by massaging gently. Rinse thoroughly, then apply moisturizer.', 40, 8, '000.jpeg', 3),
(10, 'Shower Gel Flower Flower', 'Our Flower Blossom shower gel is a true elixir of softness for your skin. Its delicate formula, enriched with vegetable glycerin and floral extracts, gently cleanses and envelops your body in a delicate fragrance.\r\n\r\nBenefits:\r\n\r\nGentle cleansing: Its sulfate-free formula respects your skin hydrolipidic film.\r\nIntense hydration: Vegetable glycerin deeply hydrates your skin, leaving it soft and supple.\r\nCaptivating floral fragrance: Its delicate scent transports you to a blooming garden.', 30, 20, '200.jpeg', 2),
(11, 'Mist cactus flower', 'Escape to a world of freshness and exoticism with our Cactus Flower Mist. This alcohol-free spray, specially designed to delicately scent your body and hair, envelops you in a refreshing and unforgettable fragrance with notes of lemon, bergamot, cactus, coconut, and musk.', 40, 10, '500.jpeg', 4),
(12, 'Midnight Wish Mist', 'Let yourself be captivated by the allure of our Midnight Wish Fragranced Mist. This delicate yet sophisticated scented mist offers a true moment of well-being and sensual delight. Its subtle, romantic fragrance wraps you in a veil of mystery and elegance that lingers all day long.', 57, 15, '80.jpeg', 4),
(15, 'Pro Hair Serum', 'Treat your hair to exceptional care with Hair Pro. Formulated with provitamin B5 and vitamin E, this regenerating serum penetrates deep into the hair fiber, intensely nourishing and repairing it from root to tip. Enriched with geranium, lemon, and ylang-ylang essential oils, it provides a touch of freshness and unparalleled shine.', 45, 15, '78.jpeg', 1),
(16, 'Sunguard SPF50+ Combination to Oily Skin', 'Shield your skin from harmful UV rays while preserving its youthful glow with Floraison Anti-Aging Sunscreen SPF 50+. This luxurious, high-protection mineral formula is infused with powerful ingredients like Coenzyme Q10 and niacinamide to not only defend against UVA/UVB damage, but also smooth fine lines, fade dark spots, and enhance skin elasticity. Lightweight and non-greasy, it absorbs effortlessly, leaving your complexion radiant, even-toned, and perfectly protected throughout the day. Ideal for daily use, it’s your ultimate ally against premature aging.', 60, 20, '655.jpeg', 3),
(17, 'Flower Blossom Lip Balm', 'Flower Blossom Lip Balm is a truly gentle caress for your lips. Its melting formula, enriched with nourishing shea butter and precious plant oils, intensely moisturizes, repairs dry lips, and envelops them in a protective veil. Day after day, they regain suppleness, comfort, and a subtly enhanced natural shine. A beauty essential for irresistibly soft and radiant lips.', 15, 15, '75.jpeg', 3),
(20, 'Darling Banana Mist', 'Let yourself be swept away by a whirlwind of tropical indulgence with our Darling Banana Mist. This alcohol-free spray, specially designed to delicately scent your body and hair, envelops you in an irresistible fragrance with notes of sweet banana, juicy melon, creamy pina colada, sun-kissed jasmine, sweet vanilla, and sensual white musk.', 30, 10, '255.jpeg', 4),
(22, 'Gommage au beurre et au chocolat', 'Indulgent Pleasure, Softness & Comforting Care\r\n\r\nTreat your skin to an exquisite sensory experience with the Chocolate Butter Scrub, a deliciously scented exfoliant that removes impurities while enveloping the skin in a luxurious veil of rich cocoa notes. Its creamy, melting texture intensely hydrates, leaving skin soft, nourished, and delicately scented.', 22, 10, '855.jpeg', 2),
(25, 'Organic Prickly Pear Seed Vegetable Oil', 'Discover Floraison Organic Prickly Pear Seed Oil, a truly 100% pure, rare, and effective serum. This precious elixir reduces wrinkles, smooths the eye contours, and provides a deep lifting effect, making it an exceptional ally against skin aging.', 30, 10, '55.jpeg', 3),
(26, 'Collagen Mask', 'Discover the Collagen Mask from Floraison, a highly concentrated marine collagen gel mask designed to effectively combat the signs of aging. Its unique formula smooths, firms, and regenerates your skin, restoring youthfulness and radiance.', 35, 10, '250.jpeg', 3),
(30, 'Fresh Hydra Gentle Care Water', 'Hydra Soft Skin Care Water: The ally of sensitive and dehydrated skin\r\n\r\nOur Hydra Soft Skin Care Water is the ideal way to complete cleansing and refresh the skin while respecting its balance. Its unique formula, enriched with cucumber and chamomile extracts, provides an immediate feeling of soothing. Refreshed by its fine, fresh mist, the skin becomes soft and comfortable.', 15, 15, '605.jpeg', 3),
(33, 'Black Seed Vegetable Oil', 'Black cumin oil, extracted by first cold pressing from black cumin seeds, is a true natural elixir.\r\nRich in essential fatty acids, vitamins, and antioxidants, it is packed with benefits for skin and hair. Soothing, nourishing, and regenerating, it helps restore skin balance, strengthen hair fibers, and enhance natural beauty every day.', 15, 10, '330.jpeg', 3),
(66, 'Little One Baby Cream Shampoo', 'FLORAION Baby Cream Shampoo is a very gentle hair cleanser that soap free hypoallergenic and certified paraben phthalate and phenoxyethanol free. Thanks to its very gentle natural formula, it cleanses your babys hair without drying it out and wont sting the eyes.\r\n\r\nHow to use: Pour a small amount of FLORAISON Baby Cream Shampoo into your hands. Then apply to your babys hair, massaging gently until a light emulsion forms. Rinse thoroughly.', 40, 10, '820.jpeg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`name`, `email`, `password`, `phone`, `location`) VALUES
('Aicha Abdennadher', 'abdennadheraicha19@gmail.com', 'aicha123', '20964601', 'sfax');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_category` (`category_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
