-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 13, 2021 at 08:24 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum-ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Berita'),
(2, 'Teknologi'),
(3, 'Gosip');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `id_thread` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `id_thread`, `id_user`, `star`) VALUES
(1, 1, 1, 2),
(2, 12, 1, 5),
(3, 1, 5, 5),
(5, 28, 1, 5),
(6, 17, 1, 5),
(8, 18, 2, 3),
(9, 10, 2, 1),
(10, 6, 1, 3),
(11, 27, 3, 1),
(12, 31, 1, 4),
(13, 30, 3, 4),
(14, 23, 3, 3),
(15, 13, 2, 3),
(16, 47, 1, 5),
(17, 19, 1, 1),
(18, 1, 3, 2),
(19, 34, 3, 1),
(20, 38, 2, 2),
(21, 32, 2, 4),
(22, 42, 2, 1),
(23, 2, 3, 1),
(24, 20, 2, 5),
(25, 46, 1, 3),
(26, 10, 1, 5),
(27, 47, 2, 3),
(28, 17, 3, 2),
(29, 3, 3, 5),
(30, 48, 1, 2),
(31, 23, 2, 4),
(32, 49, 3, 3),
(33, 26, 2, 3),
(34, 34, 2, 5),
(35, 7, 3, 2),
(36, 32, 3, 2),
(37, 10, 3, 3),
(38, 46, 3, 1),
(39, 19, 1, 3),
(40, 9, 1, 5),
(41, 9, 3, 5),
(42, 1, 2, 4),
(43, 5, 3, 1),
(44, 43, 3, 5),
(45, 12, 1, 3),
(46, 16, 1, 4),
(47, 11, 2, 2),
(48, 49, 2, 5),
(49, 48, 3, 1),
(50, 23, 1, 5),
(51, 29, 3, 4),
(52, 1, 1, 5),
(53, 18, 1, 5),
(54, 40, 3, 1),
(55, 20, 1, 3),
(56, 27, 2, 5),
(57, 33, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `id_thread` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `id_thread`, `id_user`, `isi`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3, 1, 5, '<p>test pertama</p>', '2021-02-09 01:48:55', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id`, `judul`, `isi`, `id_kategori`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Mouse', '<figure class=\"image\"><img src=\"http://localhost:8080/uploads/threads/1612537241_96aebbdb65ed32a0a5e8.jpg\"><figcaption>asdasdasdasd</figcaption></figure><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, '2021-02-05 09:01:17', 1, '2021-02-05 23:17:27', 1),
(7, 'What is Lorem Ipsum?', '<figure class=\"image\"><img src=\"http://localhost:8080/uploads/threads/1612597332_af83f0f99c56a76dc63e.jpg\"><figcaption>Motherboard</figcaption></figure><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 1, '2021-02-06 01:42:39', 1, NULL, NULL),
(8, 'Nisi aut veritatis quasi qui ipsa ullam.', 'Id beatae tempore non dicta dolor. Ipsum perferendis recusandae eum omnis. Soluta similique sequi animi ducimus repudiandae. Sit sequi ipsa ad et delectus voluptatibus ipsa. Illum unde qui voluptas non culpa maiores ipsam. Odio at qui ut hic rerum sit vero. Ipsam laborum optio ad aliquid ut. Earum facere quo ut non quas.', 3, '2021-02-08 02:14:59', 1, NULL, NULL),
(9, 'Amet sequi dolorum non qui labore aperiam quisquam unde.', 'Aut animi voluptatem voluptas. Aut eos quos vero dolores. Molestias id ut sit iste enim mollitia. Laboriosam ut aliquam numquam quia ea omnis quas perspiciatis. Quam alias est corporis eveniet suscipit. Tenetur occaecati minima commodi quisquam incidunt adipisci iste. Nihil tempore eum dolorem.', 3, '2021-02-08 02:15:00', 1, NULL, NULL),
(10, 'Culpa qui hic illo dolorem.', 'Sed ea nostrum aut. Dolore qui dolorem voluptas explicabo temporibus ea in quia. Iusto non quaerat perspiciatis debitis et corporis. Non reiciendis rerum voluptas temporibus aut repellendus. Sed esse itaque dolorum explicabo. Et ullam natus molestiae aut. Et cum exercitationem molestias accusantium. Amet est nisi laudantium officiis deleniti assumenda esse.', 1, '2021-02-08 02:15:00', 1, NULL, NULL),
(11, 'Ut aut et alias porro repellendus neque ad.', 'Sapiente repellendus quaerat eius. Quis ea et ratione esse minima reiciendis. Eos deleniti non voluptatem quia impedit nam quam. Aut ipsa ab molestiae commodi enim quaerat. Id mollitia sequi similique adipisci odit doloremque est. Cum occaecati sit unde nihil. Voluptates et odio est quis facilis. Et inventore excepturi voluptas nihil sit. Quis est voluptas ut ut et quibusdam.', 2, '2021-02-08 02:15:00', 1, NULL, NULL),
(12, 'Velit et quod rerum eos nulla nesciunt.', 'Fugiat sit assumenda consequatur molestiae sed pariatur. Eum architecto mollitia ex quia quis perferendis. Omnis quas non quia ipsam. Est provident odio qui vitae quis sit quis. Quia consequatur ut assumenda atque quos.', 1, '2021-02-08 02:15:00', 1, NULL, NULL),
(13, 'Dolorem non molestias quibusdam aperiam.', 'Delectus enim beatae placeat et. Aut amet consectetur est aspernatur. Voluptates nulla optio qui enim impedit nihil itaque quis. Libero nulla qui mollitia consequatur beatae. Quaerat cum dolorum enim exercitationem quidem omnis et odio. Occaecati sit sed ab magnam sint illum et dolore. Et eveniet voluptates enim distinctio. Voluptatem voluptatibus est at inventore eum molestiae.', 3, '2021-02-08 02:15:00', 1, NULL, NULL),
(14, 'Placeat fugit maxime labore sunt et corrupti quam velit.', 'Consequuntur est praesentium magni suscipit. Quia et ipsum dolorem ab dignissimos asperiores amet. Autem animi consequatur consequatur iure provident. Numquam perferendis qui ut et adipisci veritatis dolore. Perspiciatis nam sit et qui accusamus. Eveniet sequi ut id perspiciatis.', 2, '2021-02-08 02:15:01', 1, NULL, NULL),
(15, 'Sit ex molestiae aut.', 'Eligendi consequuntur sit eveniet culpa inventore asperiores. Voluptatum incidunt sunt in et laudantium aspernatur cumque. Quidem soluta veritatis ipsam numquam labore tempora atque. Sapiente omnis sed labore explicabo magni nam ut. Aut delectus aut suscipit et sed. Illum rerum ea nam consequuntur porro aut dolorum.', 1, '2021-02-08 02:15:01', 1, NULL, NULL),
(16, 'Ratione et est omnis blanditiis atque fuga sit.', 'Occaecati magni qui quis eveniet et velit sunt. Autem odit placeat est voluptate in quis minus. Quia necessitatibus dignissimos eum ut quos. Dolor unde rerum nostrum accusamus doloremque. Autem odit ipsam sint qui et. Qui nisi facere quis et ratione veritatis. Vel vero quia qui et impedit consequatur.', 1, '2021-02-08 02:15:01', 1, NULL, NULL),
(17, 'Quidem in non deleniti.', 'Odit quibusdam ut id fugit eligendi quibusdam laboriosam. Facilis id ut reiciendis. Voluptatem reiciendis quasi debitis provident ipsa quod sit. Debitis rerum illo assumenda beatae velit. Sunt consequatur laboriosam consequatur et autem sed. Qui dignissimos sed doloribus voluptas. Quia ea nihil aut necessitatibus nihil. Incidunt culpa atque consequuntur. Omnis non perspiciatis mollitia assumenda voluptatem reprehenderit.', 3, '2021-02-08 02:15:01', 1, NULL, NULL),
(18, 'Fuga voluptatibus nisi nisi reiciendis placeat temporibus.', 'Autem odio error dolor libero aut ea eum. In numquam dolor deserunt pariatur aliquid et delectus. Quo ut illo alias voluptates ut delectus. Maiores in accusantium dolorum et. Dicta numquam provident ut et ea fugit est commodi. Facere molestiae corrupti incidunt delectus. Nobis et et ea inventore. Non accusamus impedit corporis cupiditate quae. Fugiat nihil aspernatur aut et aut.', 2, '2021-02-08 02:15:01', 1, NULL, NULL),
(19, 'Quia sapiente placeat id vero.', 'Aut quis ut dolores autem vitae. Dicta optio at cum molestiae aut delectus. Consequatur sit eos recusandae porro porro nemo animi. Blanditiis veniam enim accusantium sed debitis consectetur. Vero iure dolorem architecto nemo quis dolor eum dolorem. Modi voluptatibus architecto quo recusandae. Voluptas velit necessitatibus et ad accusantium asperiores optio. Quos et ex quis ut autem illum quod.', 3, '2021-02-08 02:15:01', 1, NULL, NULL),
(20, 'Autem non suscipit quae quos soluta aut.', 'Sunt atque dolorem sed eveniet. Architecto ducimus incidunt et veniam. Assumenda impedit reiciendis ipsa consequuntur voluptates dignissimos. Provident explicabo autem molestiae non consequatur est voluptatem. Eveniet at necessitatibus beatae voluptate. Delectus provident consequatur qui est id explicabo occaecati. Mollitia ut ipsam rerum corrupti hic.', 3, '2021-02-08 02:15:01', 1, NULL, NULL),
(21, 'Dolorum aliquam nobis et non quos.', 'Reprehenderit excepturi ut veniam. Ex id architecto sit quis. Inventore natus doloribus ut rerum voluptatem sit ullam. Ad enim id ut quidem voluptas. Facere saepe ratione eum modi aliquam. Deleniti aliquam quia nulla provident quasi itaque. Occaecati quae deserunt sint aut eos. Voluptatibus aut sequi fuga quo quia alias ut consequatur.', 1, '2021-02-08 02:15:01', 1, NULL, NULL),
(22, 'Qui quia ratione consequatur sapiente.', 'Exercitationem iusto dolor quia occaecati quis. Qui explicabo dolorem deleniti aut explicabo. Ut maxime qui cumque omnis. Delectus quo ea quod magnam et amet. Est quia hic maxime. Perferendis modi rerum dolor consequuntur accusamus atque. Est dolorum ea perferendis modi totam dolores. Est dolorem officia quis in ratione assumenda.', 2, '2021-02-08 02:15:01', 1, NULL, NULL),
(24, 'Nisi id quia minus sed et officiis laboriosam ut.', 'Quia est in est voluptatem in dolor sed nobis. Voluptatibus et natus eos rerum. Adipisci soluta a iste fuga. Iusto vitae laudantium sapiente nihil rem. Dolor eius quia et iste. Soluta ea et voluptatem est alias dolorem. Deserunt sit quos sapiente magni sunt molestiae consequuntur. Harum qui voluptate at quam vero magni.', 1, '2021-02-08 02:15:01', 1, NULL, NULL),
(25, 'Optio totam et veniam quis.', 'Earum molestias tenetur voluptatibus suscipit facilis neque mollitia. Aliquid consectetur et libero. Quis molestiae est iusto. Consectetur illum quaerat doloribus delectus. Rerum perspiciatis facere molestias praesentium accusamus porro.', 2, '2021-02-08 02:15:01', 1, NULL, NULL),
(26, 'Velit ut aut non eum animi qui.', 'Tempore explicabo ut omnis voluptas molestiae quaerat consequatur. Qui rerum et blanditiis odio laboriosam hic. Voluptatem dignissimos quae ut quae sit eveniet dicta. Aut doloribus vel labore a. Fugiat quia aut voluptatem similique amet culpa corrupti.', 3, '2021-02-08 02:15:01', 1, NULL, NULL),
(27, 'Voluptates sint sunt sapiente magnam qui excepturi alias.', 'Quo quod facilis aliquid explicabo natus iste. Omnis modi quia dolorum qui. Non totam quia repudiandae. Iusto quasi magni quasi minima et. Quia quaerat omnis quo commodi saepe odit. Et est aut earum fugiat architecto vero esse.', 2, '2021-02-08 02:15:02', 1, NULL, NULL),
(28, 'Labore quasi porro suscipit autem nihil nostrum esse praesentium.', 'Doloribus nisi velit sint voluptas quos qui. Dolorem quos ullam sed ex sed veniam. Iste ut molestiae minus velit fuga consectetur. Eius voluptatem velit placeat quis quia dolorum sunt eum. Quos aliquid enim quaerat. Minima tempora est quod doloremque nihil autem iusto. Assumenda laborum nobis adipisci iste atque quo alias consequatur. Saepe voluptas consequuntur nihil architecto id voluptatem sit ea.', 1, '2021-02-08 02:15:02', 1, NULL, NULL),
(29, 'Quia eos ratione quia.', 'Temporibus aliquam accusamus dolores non et amet. Eum distinctio voluptatem animi et qui deserunt. Non aliquam quisquam magnam et aut quasi maxime occaecati. Tenetur qui id ea repellendus similique animi dolores pariatur. Dicta rerum omnis quis corporis aut. Velit quos sunt accusamus repellat aut quod. Quia non officiis enim est fugiat.', 3, '2021-02-08 02:15:02', 1, NULL, NULL),
(30, 'Et sequi dolor qui dolorem.', 'Quia magni eum voluptatibus velit ut illum qui nisi. Fugiat voluptate doloribus possimus reiciendis consectetur praesentium voluptatem. Labore qui facilis sint molestiae animi praesentium natus eveniet. Architecto qui voluptatem id nihil sed tempora eum. Error quia molestias aut harum sapiente sit aut. Aut sapiente vel eum omnis eum amet voluptatem. Aspernatur odit dicta modi maiores velit voluptates nihil. Et sint saepe recusandae asperiores molestiae possimus accusamus saepe.', 2, '2021-02-08 02:15:02', 1, NULL, NULL),
(31, 'Doloribus nulla voluptate nemo optio.', 'Necessitatibus qui deserunt sed aperiam. Voluptatem voluptatem quam mollitia nobis. In quaerat ullam necessitatibus nihil est omnis. Debitis explicabo neque quos atque nemo. Nulla facere soluta quas numquam. In molestias quis vero.', 1, '2021-02-08 02:15:02', 1, NULL, NULL),
(32, 'Veritatis magnam sed aut quo hic ut.', 'Praesentium neque a fugiat atque. Modi libero id officiis tempore nihil quos corrupti. Itaque illo et inventore architecto repellat. Aut dicta aspernatur impedit dignissimos dolor. In sequi fugit unde explicabo hic.', 2, '2021-02-08 02:15:02', 1, NULL, NULL),
(33, 'Omnis quo inventore aut iure qui.', 'Repellat eos tempore rerum neque rerum est rerum. Non fuga hic impedit deleniti numquam quasi unde. Ullam quisquam rerum tempora veniam voluptatem. Quaerat quia numquam tenetur ut animi voluptas et ipsa. Quae repellat aut accusamus nemo tempora consequatur. Dolorem necessitatibus quaerat tempora magni eum voluptatem. Numquam sed inventore ut provident cum expedita. Impedit dolorum et tempore labore voluptatibus aut. Itaque sed beatae deserunt.', 2, '2021-02-08 02:15:02', 1, NULL, NULL),
(34, 'Voluptas voluptates consequuntur expedita dignissimos dolor.', 'Qui nisi molestias fugit alias voluptas sapiente. Excepturi eum quas libero deserunt iusto sequi dolor voluptas. Minus qui voluptas fugit sequi. Sit vel quisquam magnam ab est quis. Ut cupiditate dolorem corporis natus eum qui non recusandae. Earum est unde repellendus dolor accusantium architecto ipsa.', 2, '2021-02-08 02:15:02', 1, NULL, NULL),
(35, 'Nam autem in quibusdam sed dolorem.', 'Facere qui quasi illum voluptas ut aut. Ad ipsam officia vero perferendis fugit sed delectus. Et incidunt magni dolores amet reiciendis. Quam reiciendis cumque qui alias. Debitis harum autem aut et cum modi exercitationem. Perspiciatis non asperiores debitis expedita qui autem. Expedita a praesentium id fuga.', 1, '2021-02-08 02:15:02', 1, NULL, NULL),
(36, 'Omnis voluptatem qui rem fuga doloremque odit.', 'Eius fugiat et rem aut eos inventore dolor. Omnis provident saepe et enim ipsum laborum aut. Ea quia nisi debitis minus in. Ea illum eos ad dignissimos. Et quam cumque in.', 3, '2021-02-08 02:15:02', 1, NULL, NULL),
(37, 'Culpa sit ut et quia minus et.', 'Sit non minus et magni vitae rerum. Eum soluta ipsam voluptatem dolorum cupiditate. Perferendis vel minus tempore ea quidem. Est deleniti eligendi enim perspiciatis unde asperiores id.', 3, '2021-02-08 02:15:02', 1, NULL, NULL),
(38, 'Veritatis eum placeat quae dolores.', 'Saepe beatae rem deleniti esse quasi sunt eum laboriosam. Nihil unde assumenda voluptatem voluptatibus in. Non aut sint corporis. Et id quo amet deserunt id et suscipit. Vel ex nesciunt incidunt culpa culpa. Molestias excepturi nesciunt molestiae ipsum nesciunt. Et sapiente autem quo suscipit qui voluptas qui vero. Voluptas fugiat quaerat temporibus enim minus facilis qui.', 3, '2021-02-08 02:15:02', 1, NULL, NULL),
(39, 'Ut eveniet beatae iste voluptatem.', 'A ex et magni rerum qui. Animi enim sit voluptas recusandae eius temporibus recusandae. Nam dolor possimus atque in consequatur consequatur vel. Ipsam pariatur error cum accusamus sequi et. Rerum delectus velit incidunt soluta ut sit ea ea. Placeat placeat debitis cupiditate maxime omnis sit.', 2, '2021-02-08 02:15:02', 1, NULL, NULL),
(40, 'Molestiae velit itaque rerum enim.', 'Iste eligendi delectus aperiam et labore accusantium voluptas. Fuga adipisci repudiandae nesciunt quo blanditiis et. Eos velit necessitatibus ut ut. Aut rerum aspernatur et eos voluptas accusantium facere. Expedita reiciendis voluptatem ipsa repellat.', 3, '2021-02-08 02:15:02', 1, NULL, NULL),
(41, 'Enim qui omnis earum iure sed.', 'Magnam fugiat rerum aliquid facere aperiam autem eos error. Sequi expedita maiores blanditiis fugiat qui est fuga magnam. In provident cum est vel rerum eos perferendis. Quidem molestias et labore quaerat porro quia et. Et eligendi est placeat a quod omnis laborum.', 1, '2021-02-08 02:15:03', 1, NULL, NULL),
(42, 'Possimus est adipisci dolores harum saepe quia aspernatur.', 'Est dolorem ullam explicabo enim laboriosam. Veritatis est autem nobis ea est voluptatibus. Aut iste quam similique et qui et. Molestiae possimus temporibus pariatur nesciunt.', 1, '2021-02-08 02:15:03', 1, NULL, NULL),
(43, 'Quae impedit tempore minus voluptatem eos et.', 'Harum animi corrupti officiis omnis molestias qui similique. Quibusdam et rerum ullam fugit officia officia reiciendis voluptas. Sit minus qui necessitatibus officia voluptas quos quia ut. Nemo dolore et a praesentium corporis. Deserunt enim fuga quis quae. Dignissimos voluptatem eveniet et quam quia. Ipsam consequatur dolores omnis repellat sed. Nihil quis quas ipsum et eligendi est velit molestiae. Maiores qui animi possimus id et.', 3, '2021-02-08 02:15:03', 1, NULL, NULL),
(44, 'Accusantium voluptas blanditiis inventore incidunt sed.', 'Ea laborum omnis consequatur non. Necessitatibus dignissimos ipsa aperiam omnis vitae in non totam. Est et omnis ea voluptas. Dolore dolorem velit autem consectetur. Et itaque id quo quia tempore. Eveniet aliquam eos facere.', 2, '2021-02-08 02:15:03', 1, NULL, NULL),
(45, 'Et facere incidunt dolore quia voluptatem reiciendis.', 'Dolore perspiciatis totam tempora rerum repellat perferendis beatae nihil. Sed ut neque voluptates et dolore impedit architecto. Velit hic omnis et. Repellat dolor quidem consequatur culpa id ut. Laborum non amet aut sit. Occaecati mollitia sapiente est suscipit.', 2, '2021-02-08 02:15:03', 1, NULL, NULL),
(46, 'Itaque id nihil temporibus molestiae.', 'Ab ut error totam quia. Veritatis debitis id qui et sit. Ullam nihil est aspernatur voluptatum distinctio rerum sequi facilis. Minus necessitatibus culpa earum velit. Accusantium omnis consectetur atque labore aperiam. Ea praesentium ea possimus quasi aperiam pariatur. Incidunt alias quia placeat et consequuntur. Corporis voluptas ratione a velit ut facilis nemo molestiae.', 1, '2021-02-08 02:15:03', 1, NULL, NULL),
(47, 'Consequatur quia sed quisquam nulla voluptas.', 'Dolorem qui aut aut. Deserunt dignissimos quasi eos qui facilis. Recusandae libero mollitia ut reiciendis saepe omnis maxime iure. Alias enim sunt rerum sit et voluptatibus non. Aut assumenda quia sed ullam qui. Minima illo iusto reiciendis aspernatur. Hic numquam dolores optio id. Delectus quia et doloribus vel est rerum odit. Itaque ad adipisci est dolores aliquid sunt provident ut.', 1, '2021-02-08 02:15:03', 1, NULL, NULL),
(48, 'Labore fugit sit incidunt aliquid nisi totam nesciunt.', 'Voluptas autem omnis minima ea amet ea. Doloremque libero provident consequatur et harum sint illo. Saepe odit ea eligendi similique quos. Qui enim laborum nihil quaerat id dicta. Aspernatur sed sint dolores non. Quas aut enim ut quo porro harum. Vel voluptatem neque aperiam molestias impedit.', 3, '2021-02-08 02:15:03', 1, NULL, NULL),
(49, 'Voluptas unde possimus ad.', 'Tempore velit quasi enim provident vero. Aut deserunt eum incidunt suscipit debitis. Delectus maxime aut expedita nihil alias recusandae fuga. Asperiores consequatur tempore et dolor magni eos. Reprehenderit qui omnis eum modi dicta est sed.', 1, '2021-02-08 02:15:03', 1, NULL, NULL),
(50, 'Sint non rerum porro in laborum.', 'Qui aliquid dolores molestias veniam et modi illum. Eveniet et voluptatibus assumenda illum molestiae. Sint deleniti voluptates dolore accusamus animi deserunt reiciendis. Beatae explicabo dolor delectus facilis et quae accusantium. Ad voluptas a est.', 2, '2021-02-08 02:15:03', 1, NULL, NULL),
(51, 'Qui ratione ullam qui et autem officia.', 'Doloribus earum est rem totam. Et voluptate id vitae optio nulla. Et quae voluptas nemo culpa. Dolor dolor quibusdam asperiores optio quod omnis.', 3, '2021-02-08 02:15:03', 1, NULL, NULL),
(52, 'Totam ad velit qui et.', 'Quia recusandae tenetur nam qui quaerat. Perferendis consequuntur explicabo et iste quas minima. Qui dolore eum qui ut et architecto quidem suscipit. Delectus molestiae saepe id. Voluptatibus magnam reiciendis a est.', 3, '2021-02-08 02:15:03', 1, NULL, NULL),
(53, 'Cumque non esse consequatur nostrum ipsam quis et porro.', 'Aut et architecto incidunt mollitia aut. Voluptas omnis id ut neque eligendi adipisci minima. Aut adipisci sed tempora est nulla voluptatem at. Possimus nostrum quas eum. Et ullam aliquam iusto animi sint aspernatur culpa. Aut adipisci repellendus vero qui et.', 3, '2021-02-08 02:15:03', 1, NULL, NULL),
(54, 'Ut assumenda quisquam voluptate soluta voluptates laboriosam.', 'Non cum sunt quia velit laudantium rem tempore qui. Quod nam voluptas quibusdam cum. Non blanditiis qui quisquam ducimus. Quod aliquid magnam quibusdam rerum occaecati perferendis cumque. Quas neque ipsum et et. Ut voluptas odio nisi. Enim recusandae facilis ducimus et et.', 1, '2021-02-08 02:15:03', 1, NULL, NULL),
(55, 'Doloribus in quas ullam eos nobis.', 'Et itaque consequatur nostrum qui. Eligendi quos rerum molestias ut consequatur laboriosam. Incidunt magnam est unde officiis perspiciatis est. Et molestias excepturi aut mollitia.', 3, '2021-02-08 02:15:03', 1, NULL, NULL),
(56, 'Magni dolor aspernatur consequatur.', 'Accusantium qui quia ut earum illo voluptatem. Sed neque eos fuga provident quia. Perspiciatis exercitationem veritatis minima sint est. Laboriosam consequatur ut illum sequi molestias neque. Sit corporis nostrum cupiditate illum fugiat.', 2, '2021-02-08 02:15:04', 1, NULL, NULL),
(57, 'Aut eum voluptas ut.', 'Nihil pariatur aperiam molestiae tempora. Autem omnis est iste ad. Laborum non assumenda quasi et dolorum et ab. Ut quis et aut. Voluptas at dolore sed occaecati consequatur eos. Et aut animi consequuntur nobis nostrum id.', 3, '2021-02-08 02:15:04', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `salt`, `nama`, `email`, `tgl_lahir`, `alamat`, `no_telp`, `avatar`, `role`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'admin', '8480fdd98a61d502eb94ce5faf91975d', '601511d7c57296.80098928', 'admin', 'admin@gmail.com', '2011-03-01', 'Jl.Pepaya', '98765', '1612001356_ad89f1aee5f23b006e62.jpg', 0, '2021-01-30 01:59:19', 0, '2021-01-30 04:09:17', 0),
(5, 'harun', 'da2e495a299dca1440259d6435490a67', '601bd86e4d3497.77387645', 'Harun Saputra', 'harun@gmail.com', '2021-02-04', 'Jl.Pemuda', '876875', '1612437614_ea5166262433f31a3e07.jpg', 1, '2021-02-04 05:20:14', 0, NULL, NULL),
(6, 'asdaskj', '48f6949e921e8638dbcad699a2335023', '601c0089944e88.91141772', 'asdasd', 'admin@gmail.com', '2021-02-03', 'kjamsd', '342376', '1612447881_3b28a2f2097d0ac74246.jpg', 1, '2021-02-04 08:11:21', 0, NULL, NULL),
(7, 'kjhklj', '5ab51fc393459b15dda4c076c1f99b84', '601c08af5a1dd8.04455429', 'iokj', 'ridho@gmail.com', '2021-02-09', 'kjf', '1243', '1612449967_17076e1320c617482ba4.jpg', 1, '2021-02-04 08:46:07', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_rating`
-- (See below for the actual view)
--
CREATE TABLE `view_rating` (
`id_thread` int(11)
,`sub_star` decimal(32,0)
,`count_star` bigint(21)
,`rating` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Structure for view `view_rating`
--
DROP TABLE IF EXISTS `view_rating`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_rating`  AS  select `rating`.`id_thread` AS `id_thread`,sum(`rating`.`star`) AS `sub_star`,count(`rating`.`star`) AS `count_star`,round(sum(`rating`.`star`) / count(`rating`.`star`),0) AS `rating` from `rating` group by `rating`.`id_thread` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_thread` (`id_thread`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_thread` (`id_thread`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`id_thread`) REFERENCES `thread` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `thread_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
