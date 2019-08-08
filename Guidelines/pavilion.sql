-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2019 at 06:13 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pavilion`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Food & Beverages', 'Famous local or foreign restaurants', '2019-03-28 22:22:33', '2019-03-28 22:22:33'),
(2, 'Fashion', 'Clothes stores with beautifuls, elegance costumes', '2019-03-28 22:23:33', '2019-03-28 22:23:33'),
(3, 'Entertainment', 'Stores providing interesting and relaxing products and services', '2019-03-28 22:24:33', '2019-03-28 22:24:33'),
(4, 'Beauty & Wellness', 'Products and services for skin care, beauty and body fitness', '2019-03-28 22:25:33', '2019-03-28 22:25:33'),
(5, 'Supermarket', 'Stores for purchasing domestic products', '2019-03-28 22:26:33', '2019-03-28 22:26:33'),
(6, 'Home', 'Stores for purchasing home applicances and furnitures', '2019-03-28 22:27:33', '2019-03-28 22:27:33'),
(7, 'Book & Stationaries', 'Stores for purchasing books and stationaries', '2019-03-28 22:28:33', '2019-03-28 22:28:33'),
(8, 'Jewellry & Timepieces', 'Stores for purchasing graceful jewellry and watches', '2019-03-28 22:29:33', '2019-03-28 22:29:33'),
(9, 'Communication & IT', 'IT stores providing latest and high tech electronic gadgets and applicances', '2019-03-28 22:30:33', '2019-03-28 22:30:33'),
(10, 'Optical & Eyeware', 'Stores with high quality eyeware products and services', '2019-03-28 22:31:33', '2019-03-28 22:31:33'),
(11, 'Toy & Games', 'Stores for purchasing toys, gaming consoles and famous games', '2019-03-28 22:32:33', '2019-03-28 22:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2019_03_28_012647_create_categories_table', 1),
(22, '2019_03_28_044618_create_zone_table', 1),
(23, '2019_03_28_051525_create_tenants_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_name_index` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

DROP TABLE IF EXISTS `tenants`;
CREATE TABLE IF NOT EXISTS `tenants` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shopName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lotNo` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor` int(10) UNSIGNED NOT NULL,
  `zone_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tenants_lotno_unique` (`lotNo`),
  KEY `tenants_zone_id_foreign` (`zone_id`),
  KEY `tenants_category_id_foreign` (`category_id`),
  KEY `tenants_shopname_index` (`shopName`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `shopName`, `lotNo`, `floor`, `zone_id`, `category_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Starbukcs Coffee', 'F011', 1, 1, 1, 'Starbucks offers fresh, rich-brewed, Italian-style espresso beverages, a variety of pastries and confections, as well as coffee-related merchandizes and equipment. Set in a relaxing environment with large sofas and comfortable chairs, Starbucks friendly baristas are always delighted to make a cup that’s just right for you. Committed to responsible coffee sourcing, from the moment those beans are picked to when they are served, you are assured of the best cup each and every time. Set in a relaxing environment with large sofas, comfortable chairs and complimentary Wi-Fi Internet, Starbucks is the 3rd Place between office and home. Sit back and unwind over your favourite Starbucks beverage.', '2019-03-28 22:22:33', '2019-03-28 22:22:33'),
(2, 'McDonald\'s', 'F012', 1, 1, 1, 'McDonald\'s has charmed millions of food lovers with its great value wholesome meals. Drop by anytime, for Breakfast, Lunch or Dinner – and eat in or take away. They’ve got all your favourite foods, including world famous Fries, Big Mac®, Quarter Pounder®, Chicken McNuggets®, Egg McMuffin®.', '2019-03-28 22:23:33', '2019-03-28 22:23:33'),
(3, 'Tealive', 'F013', 1, 1, 1, 'Tea lovers rejoice! Built on a passion for tea, Tealive’s mission is to change the tea game and make tea that everyone can enjoy. Feeling thirsty? Come by for a refreshing drink of tea, coffee, smoothie, or even sparkling juice today and experience what Tealive is all about!', '2019-03-28 22:24:33', '2019-03-28 22:24:33'),
(4, 'Koong Woh Tong', 'F014', 1, 1, 1, 'This health food chain is simply packed with all sorts of health products to give you an added edge for your busy day. We should know, we’re fans of their complete body restoring Herbal Jelly, which contains 20 Chinese herbs and is braised following a secret recipe from China.', '2019-03-28 22:25:33', '2019-03-28 22:25:33'),
(5, 'Nando\'s', 'F015', 1, 1, 1, 'An original South African restaurant, Nando’s keeps foodies happy with their specialty Afro-Portuguese Peri-Peri Flame-Grilled Chicken. These butterfly-cut chickens are marinated for 24 hours in the Afro-Portuguese recipe, then flame-grilled to perfection in your choice of Peri-Peri sauces, Lemon & Herbs, Mild, Hot, or Extra Hot. (Peri-Peri means bird’s eye chilli and is packed with vitamins A and C!)', '2019-03-28 22:26:33', '2019-03-28 22:26:33'),
(6, 'Dragon-I', 'F016', 1, 1, 1, 'Dragon-I inspired by the rich and diverse culinary offerings from China especially from the region of Shanghai, Szechuan and Lanzhou', '2019-03-28 22:22:34', '2019-03-28 22:22:34'),
(7, 'Haagen Dazs', 'F017', 1, 1, 1, 'Passionate about everything they do, Haagen-Dazs make their ice cream using only the purest fresh cream and milk, and the finest ingredients from all over the world. Blended with just enough air for a texture that’s dense and creamy, it’s the rich taste that promises a longer slow-melting moment of pleasure.', '2019-03-28 22:22:37', '2019-03-28 22:22:37'),
(8, 'Seoul Garden', 'F018', 1, 1, 1, 'At Seoul Garden, we go to \"buffet\" lengths for our signature Korean marinated meats for the grill, and fresh ingredients for our hotpot stocks. Whether it for your special occasion, or looking for a culinary inspiration, we\'ve got something and everything delicious for everyone. Just check out our buffet menu and prepare to get hungry', '2019-03-28 22:22:38', '2019-03-28 22:22:38'),
(9, 'Padini Concept Store', 'F021', 1, 2, 2, 'Padini is mainly an integrated operation that controls its products - fashion wear and accessories - from concept stage to manufacturing, merchandising and image marketing. Each brand represents a fashion philosophy; each philosophy covers a comprehensive range of products aimed at a targeted consumer. Brand image is strongly backed up by real value: quality, functionality and price.', '2019-03-28 22:23:38', '2019-03-28 22:23:38'),
(10, 'Smart Master', 'F022', 1, 2, 2, 'Suit up with the ready-to-wear and tailor-made gentlemen\'s professional apparel from Smart Master, an international fashion label founded in 1999 by master tailor Dickson Phang. Created with an artisan\'s eye for detail and an uncompromising dedication to quality, our exquisitely-tailored suits and shirts are favourites among the city’s professionals. Not only does Smart Master offer Smart Master a comprehensive selection of casual and professional apparel for both men and women, but accessories such as ties, belts, shoes and more. You’ll get personal assurance of polished design, quality tailoring and exceptional value here.', '2019-03-28 22:23:39', '2019-03-28 22:23:39'),
(11, 'Giordano', 'F023', 1, 2, 2, 'Hong Kong\'s Giordano is a well-known and established fashion retailer, with a mission of make people feel good & look great. ', '2019-03-28 22:23:40', '2019-03-28 22:23:40'),
(12, 'Cotton On', 'F024', 1, 2, 2, 'This Australian fashion chain may have started off small, but it’s now one of the favourite destinations of young Malaysian shopaholics. With cool, laidback basics that go beyond plain colours to include floral, checkered and striped patterns, we have to agree with the fans – Cotton On is here to stay!', '2019-03-28 22:23:41', '2019-03-28 22:23:41'),
(13, 'Brands Outlet', 'F025', 1, 2, 2, 'Retailing of fashion apparels', '2019-03-28 22:23:42', '2019-03-28 22:23:42'),
(14, 'F.O.S', 'F026', 1, 2, 2, 'Cancelled orders and overruns of popular, premium brands put the sparkle in the bargain hunter’s eyes. FOS showers the shopper with an abundance of choice in clothing and accessories (including in-house brands) and proves usually irresistible – very few leave this store without a purchase.', '2019-03-28 22:23:43', '2019-03-28 22:23:43'),
(15, 'Uniqlo', 'F027', 1, 2, 2, 'Shop at UNIQLO for innovative and exceptional clothing for men, women, and kids. Browse stylish, affordable, high-quality basics that are simple, casual wear at remarkably affordable prices.', '2019-03-28 22:23:45', '2019-03-28 22:23:45'),
(16, 'Dees', 'F028', 1, 2, 2, 'Dee Sing Trading established in 1995 and was renamed to DEE SENG FASHION TRADING SDN BHD in 9 Nov 2004. With years of experienced in fashion & retail industry. DEE SENG is capable to satisfy its customers unique insight & demands. DEE SENG product lines consist of ladies, mens, and children apparels. Each of these lines is being monitored under a dedicated team. To remain competitive in this industry, we outsource the materials & manufacturer from countries such as CHINA, HONG KONG, KOREA, THAILAND & etc. DEES is a DEE SENG in-house brand. The main focus of DEES is to provide high quality but affordable apparels to middle & upper-middle market segment. DEES is in rapid expansion, in term of brand awareness and market penetration. To collaborate with this expansion, we plans to setup few new outlets each year until 2015. Advertising & promotion activities will come along to enhance our expansion.', '2019-03-28 22:23:46', '2019-03-28 22:23:46'),
(17, 'The Port Family Karaoke', 'F031', 1, 3, 3, 'Karaoke entertainment services', '2019-03-28 22:29:19', '2019-03-28 22:29:19'),
(18, 'CP Amusements', 'F032', 1, 3, 3, 'Amusement centre', '2019-03-28 22:29:20', '2019-03-28 22:29:20'),
(19, 'Reka Zone', 'F033', 1, 3, 3, 'Reka Zone is a fun and recreational playground. It’s the perfect place for the whole family to spend time together with numerous play sections like the Foam Ball Arena, Toddler Play Area, Crawl Play and lots more!', '2019-03-28 22:28:23', '2019-03-28 22:28:23'),
(20, 'Fun Scape', 'F034', 1, 3, 3, 'Amusement centre', '2019-03-28 22:29:32', '2019-03-28 22:29:32'),
(21, 'Fitness First', 'F035', 1, 3, 4, 'Make every movement count. With just the right amount of training and motivation, we can help you reach your fitness goals. Fully furnished gyms and specially crafted exercise routines such as our Dynamic Movement Training will provide a constant challenge to better yourself. ', '2019-03-28 22:29:30', '2019-03-28 22:29:30'),
(22, 'Guardian', 'F036', 1, 3, 4, 'Guardian is the largest health, beauty & personal care chain in Malaysia, offering quality products at affordable prices for everyone. Our extensive range of health & beauty products, along with our customer driven focus, enabled us to maintain our position at the top of the market.', '2019-03-28 22:30:31', '2019-03-28 22:30:31'),
(23, 'Watsons', 'F037', 1, 3, 4, 'Look good. Feel great. Have fun in life. As a leader in the health and beauty retail industry, Watsons has been helping people achieve these personal goals and more.', '2019-03-28 22:30:32', '2019-03-28 22:30:32'),
(24, 'Fitness Concept', 'F041', 1, 4, 4, 'This record-breaking fitness store will help you break your fitness records. Listed in the Malaysia Book of Records as the largest fitness specialist chain store in the country, Fitness Concept carries all the health and fitness gear you’ll need on your journey to become fit and fabulous. Try out their treadmills, exercise bikes, strength training systems and get advice on everything fitness related. Don’t forget to also add some trendy workout gear from NordicTrack, Reebok, Adidas, LifeFitness and more to your wardrobe!', '2019-03-28 22:30:33', '2019-03-28 22:30:33'),
(25, 'Caring Pharmacy', 'F042', 1, 4, 4, 'With a name like Caring, you know the staff here are all about promoting a healthy lifestyle to the community they know and love. So drop by for your regular vitamins or medicine for a cold, or pick up some home beauty products and give yourself a nice little pick-me-up.', '2019-03-28 22:30:34', '2019-03-28 22:30:34'),
(26, 'Sports Empire', 'F043', 1, 4, 3, 'With passion and dedication to match the sheer magnitude of our collection, Sports Empire is Malaysia’s leading authentic sports retailer affiliated with renowned brands such as New Balance, K-Swiss, Nike, Adidas, Asics, Puma, Converse, and more. The strong belief in the evolution of the sports arena sparked a curious commitment amongst our founding fathers to create a domain loyal to each and every sport our customers pursue. This domain is the heart of our empire, and it drives our dynamic team to constantly race against the clock to bring and serve sports enthusiasts and fans alike the very best equipment they deserve.', '2019-03-28 22:30:35', '2019-03-28 22:30:35'),
(27, 'Royal Sporting House', 'F044', 1, 4, 3, 'Retailing of sports apparel and products', '2019-03-28 22:30:36', '2019-03-28 22:30:36'),
(28, 'Aeon', 'F045', 1, 4, 5, 'This department store is probably the most well known – and well shopped – throughout Malaysia! AEON is definitely a leader when it comes to the best in clothing for all, lifestyle merchandise, and food – all under one roof.', '2019-03-28 22:30:37', '2019-03-28 22:30:37'),
(29, 'Yubiso', 'S011', 2, 1, 6, 'YUBISO Japan dedicated to be global consumer friends. We aim to forge a true friendship between consumers and manufacturers. All these while most business entities always take big chunk of profits and consumers are left where no one taking care off. We tend to reverse the cycle by prioritize our consumers first! Becoming consumer’s best friends in our YUBISO World. As YUBISO is a goods fashion designers company at Japan. Headquarter at Tokyo District, Japan, Our designer chief Mr. Hisashi Sato and his team has proudly provide us creative and innovative products all around the clock.', '2019-03-28 22:22:33', '2019-03-28 22:22:33'),
(30, 'SenQ', 'S012', 2, 1, 6, 'Retailing of all electrical appliances brands and products', '2019-03-28 22:23:33', '2019-03-28 22:23:33'),
(31, 'Daiso', 'S013', 2, 1, 6, 'Get quality products at low prices at Daiso, where you’ll find quirky and useful finds in every single aisle. With its wide-ranging product line-up that are not only popular in Japan but the world over, Daiso’s highly competitive prices and high-quality selections will never fail to satisfy. Plus, you’ll be pleasantly surprised with the uniqueness of each and every Daiso product, where new ideas come together to help make your life a breeze and more convenient. From household goods to everyday necessities, shop at Daiso till your heart’s content without feeling the pinch!', '2019-03-28 22:24:33', '2019-03-28 22:24:33'),
(32, 'Mr DIY', 'S014', 2, 1, 6, 'MR.D.I.Y. offers more than 20,000 products ranging from household items like hardware, gardening, electrical, stationery, sports, car accessories, jewellery, cosmetics and toys.', '2019-03-28 22:25:33', '2019-03-28 22:25:33'),
(33, 'Ace Hardware', 'S015', 2, 1, 6, 'For the do-it-yourself nut, Ace Hardware is definitely a one-stop centre. Come here for any kind of lawn and garden, outdoor living or indoor DIY work. Ace has paint, home goods, tools, hardware, plumbing devices and more.', '2019-03-28 22:26:33', '2019-03-28 22:26:33'),
(34, 'Supersave', 'S016', 2, 1, 6, 'One stop concept store that sells everything of everyday\'s necessities aiming \"savings for everyone\"!', '2019-03-28 22:22:34', '2019-03-28 22:22:34'),
(35, '7 Eleven', 'S017', 2, 1, 7, 'Convenience store chain', '2019-03-28 22:22:37', '2019-03-28 22:22:37'),
(36, 'myNEWS.com', 'S018', 2, 1, 7, 'For the widest selection of newspapers, magazines, and light novellas in Malay, English & Chinese, drop by myNEWS.com. Don\'t forget to pick up a some nice chocs or a drink with your paper – after all, there are lots of snacks available here, too.', '2019-03-28 22:22:38', '2019-03-28 22:22:38'),
(37, 'Popular', 'S021', 2, 2, 7, 'POPULAR sells a wide variety of fiction, non-fiction and general interest books in English, Chinese and Malay languages, as well as school textbooks and revision books. In addition, it also offers a large selection of magazines, stationery, multi-media products, gift items and CDs.', '2019-03-28 22:23:38', '2019-03-28 22:23:38'),
(38, 'Comic Tracks', 'S022', 2, 2, 7, 'Retailing of comic books and cartoon related gifts', '2019-03-28 22:23:39', '2019-03-28 22:23:39'),
(39, 'City Chain', 'S023', 2, 2, 8, 'City Chain is a favourite among KL men and women for its wide range of well-known watch labels and its friendly, helpful staff. Whatever you’re looking for in the wrist candy department, you’re sure to find it here – and the accessories to go with it, as well!', '2019-03-28 22:23:40', '2019-03-28 22:23:40'),
(40, 'Poh Kong', 'S024', 2, 2, 8, 'From heartland traditional goldsmith to Malaysia’s largest jewellery retail chain, Poh Kong is a pioneer jeweller with lots to offer, most important being a fine balance of design, quality, craftsmanship and exclusivity. There’s always something for everyone, from simple designs to exquisite pieces, from irresistible collectibles to dazzling custom made works of art for every age, taste and budget. Brides and grooms to be may want to check out the exclusive Love Collection wedding bands and Happy Love traditional wedding jewellery collection. Poh Kong is also the only place where you can find your favourite international brands, Schoeffel Pearl from Germany, Luca Carati from Italy, Angel Diamond from Belgium, and Disney.', '2019-03-28 22:23:41', '2019-03-28 22:23:41'),
(41, 'AWG', 'S025', 2, 2, 8, 'Retailing of timepieces', '2019-03-28 22:23:42', '2019-03-28 22:23:42'),
(42, 'Tomei', 'S026', 2, 2, 8, 'We invite you to take a gander at Tomei’s impressive range of white gold, diamonds, gold, gemstones, loose diamonds, and certificated items. With a legacy that dates back to 1968, don’t be surprised to find plenty of interesting collections and designs.', '2019-03-28 22:23:43', '2019-03-28 22:23:43'),
(43, 'Star Ted', 'S027', 2, 2, 8, 'Bringing you the trendiest timepieces since 2013, Star Ted houses multiple renown brands under their roof. Offering you a vast selection of affordable and fashionable timepieces, they believe that telling time and being on time should always be an exciting affair. Star Ted also offers excellent after sale services such as watch repair, battery replacement, watch screen protector installation, and accessories replacement. Now you know where to go the next time you want some new arm bling to jazz up your outfit!', '2019-03-28 22:23:45', '2019-03-28 22:23:45'),
(44, 'Lazo Diamond', 'S028', 2, 2, 8, 'Owning diamond is no longer a dream - that’s the motto over here at Lazo Diamond. Experience the VIP treatment as you browse the sparkly array of white gold and diamonds on offer, with Lazo Diamond’s team of knowledgeable staff providing you invaluable advice when it comes to selecting the perfect bling to add a little lustre to your life.', '2019-03-28 22:23:46', '2019-03-28 22:23:46'),
(45, 'U Mobile', 'S031', 2, 3, 9, 'Telecommunication related services', '2019-03-28 22:29:19', '2019-03-28 22:29:19'),
(46, 'Maxis', 'S032', 2, 3, 9, 'This is the one-stop Internet centre from Malaysian phone service provider, Maxis. If you’re looking to set up wireless Internet or WIFI at home or the office, visit Maxis and find out how it’s done.', '2019-03-28 22:29:20', '2019-03-28 22:29:20'),
(47, 'Epi Centre', 'S033', 2, 3, 9, 'We are the first Apple Premium Reseller (APR) in the region. We took risks with first-to-market retail and marketing strategies. None before us brought such a comprehensive range of exclusive Apple-complementary products to meet all Mac lovers\' wants. Ours is a story of innovation and re-invention at the beginning and at every turn, which has served to bring us great success in the region. Founded by Mac lovers, EpiCentre rocked the boat, and we will rock your world.', '2019-03-28 22:28:23', '2019-03-28 22:28:23'),
(48, 'Asus', 'S034', 2, 3, 9, 'Retailing of ASUS related gadgetry and mobile accessories', '2019-03-28 22:29:32', '2019-03-28 22:29:32'),
(49, 'QMac', 'S035', 2, 3, 9, 'Mobile accessories retails.', '2019-03-28 22:29:30', '2019-03-28 22:29:30'),
(50, 'Oppo', 'S036', 2, 3, 9, 'Retailing of OPPO mobile phones', '2019-03-28 22:30:31', '2019-03-28 22:30:31'),
(51, 'Huawei', 'S037', 2, 3, 9, 'Retailing Huawei mobile phones and other telecommunication accessories', '2019-03-28 22:30:32', '2019-03-28 22:30:32'),
(52, 'O.W.L', 'S041', 2, 4, 10, 'OBSESSED WITH LOOKS. ALL-IN-ONE PRICE FRAME + LENS FROM RM179 TO RM399', '2019-03-28 22:30:33', '2019-03-28 22:30:33'),
(53, 'MOG Eyewear', 'S042', 2, 4, 10, 'Retailing of eyewear, sunglasses and optical products', '2019-03-28 22:30:34', '2019-03-28 22:30:34'),
(54, 'Jac\'s Optometry', 'S043', 2, 4, 10, 'Retailing of eyewear, sunglasses and optical products', '2019-03-28 22:30:35', '2019-03-28 22:30:35'),
(55, 'Toys\'R\'Us', 'S044', 2, 4, 11, 'Toys\'R\'Us is positioned as \"the Worldwide authority on kids, families and fun\". It is the largest child-related product specialty chain store in the world. Toys\'R\'Us believes in providing a happy shopping experience to customers with the biggest selection of toys and baby products priced to offer best value for money.', '2019-03-28 22:30:36', '2019-03-28 22:30:36'),
(56, 'PlayStation', 'S045', 2, 4, 11, 'Playstation products console hardware software and related accessorizes', '2019-03-28 22:30:37', '2019-03-28 22:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$ANzLBw82QPPAp.tj6Dg08ubsQwQ0OBygWuRug4BhI1/8.8DTDkZkq', '2TcmqZpbpMe9MhzcDuDaoYKkPsaalkOFahQVjSbywCY5BR9cBqFgeeKQ1mfZ', '2019-03-30 03:09:20', '2019-03-30 03:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

DROP TABLE IF EXISTS `zones`;
CREATE TABLE IF NOT EXISTS `zones` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `zones_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'North', 'North area', '2019-03-28 22:28:33', '2019-03-28 22:28:33'),
(2, 'East', 'East area', '2019-03-28 22:29:33', '2019-03-28 22:29:33'),
(3, 'South', 'South area', '2019-03-28 22:30:33', '2019-03-28 22:30:33'),
(4, 'West', 'West area', '2019-03-28 22:31:33', '2019-03-28 22:31:33');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tenants`
--
ALTER TABLE `tenants`
  ADD CONSTRAINT `tenants_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `tenants_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
