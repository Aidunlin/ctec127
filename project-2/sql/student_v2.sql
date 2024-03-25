-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2019 at 06:07 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctec`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_v2`
--

CREATE TABLE `student_v2` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `student_id` mediumint(9) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `degree_program` varchar(255) NOT NULL,
  `gpa` float NULL,
  `financial_aid` mediumint(9) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_v2`
--

INSERT INTO `student_v2` (`id`, `student_id`, `first_name`, `last_name`, `email`, `phone`, `degree_program`, `gpa`, `financial_aid`, `date_created`) VALUES
(1, 1000, 'Quinn', 'Berger', 'lobortis.ultrices.Vivamus@aliquamenimnec.co.uk', '749-1162', '', 1, 1, '2019-02-14 04:01:15'),
(2, 999, 'Troyster', 'Rojas', 'rutrum.magna@faucibusorciluctus.org', '921-0141', '', 4, 1, '2019-02-14 04:01:15'),
(3, 998, 'Lionel', 'Merrill', 'ligula.eu.enim@iaculisquis.edu', '1-653-852-2223', '', 2, 1, '2019-02-14 04:01:15'),
(4, 997, 'Kellyanne', 'Farrell', 'semper.et@in.edu', '1-879-348-6543', '', 2, 0, '2019-02-14 04:01:15'),
(5, 996, 'Carlie', 'Rosales', 'suscipit@Curabiturutodio.org', '720-4936', '', 2, 1, '2019-02-14 04:01:15'),
(6, 995, 'Patience', 'Knapp', 'nunc.ullamcorper@enimconsequatpurus.org', '189-6243', '', 3, 0, '2019-02-14 04:01:15'),
(7, 994, 'Amanda', 'Floyd', 'enim.Nunc@Vestibulumaccumsanneque.edu', '825-0545', '', 0, 0, '2019-02-14 04:01:15'),
(8, 993, 'Caleb', 'Knight', 'ultricies@et.edu', '843-7777', '', 2, 0, '2019-02-14 04:01:15'),
(9, 992, 'Nirra', 'Barrett', 'Nulla.tincidunt@esttemporbibendum.net', '1-518-491-0740', '', 2, 1, '2019-02-14 04:01:15'),
(10, 991, 'Keiko', 'Meyer', 'arcu@nequesedsem.co.uk', '1-670-222-9896', '', 1, 0, '2019-02-14 04:01:15'),
(11, 990, 'Brynn', 'West', 'condimentum@ipsumac.com', '1-517-135-4370', '', 2, 0, '2019-02-14 04:01:15'),
(12, 989, 'Justine', 'Newman', 'euismod.ac.fermentum@Morbi.net', '160-7944', '', 4, 0, '2019-02-14 04:01:15'),
(13, 988, 'Vladimir', 'Morris', 'dignissim@nectellusNunc.edu', '1-767-956-7875', '', 3, 1, '2019-02-14 04:01:15'),
(14, 987, 'Yolanda', 'Parker', 'risus@eu.edu', '881-2614', '', 1, 0, '2019-02-14 04:01:15'),
(15, 986, 'Macy', 'Mcdonald', 'consequat@posuereat.net', '771-9845', '', 4, 1, '2019-02-14 04:01:15'),
(16, 985, 'Noelle', 'Faulkner', 'quam@egetmassa.co.uk', '1-917-102-2008', '', 0, 0, '2019-02-14 04:01:15'),
(17, 984, 'Shoshana', 'Duncan', 'nibh.Aliquam@posuereenim.edu', '1-703-273-5136', '', 0, 1, '2019-02-14 04:01:15'),
(18, 983, 'Rowan', 'Guzman', 'urna.Ut.tincidunt@dictum.org', '967-7163', '', 1, 0, '2019-02-14 04:01:15'),
(19, 982, 'Yuli', 'Pollard', 'mattis@purus.org', '851-4218', '', 2, 1, '2019-02-14 04:01:15'),
(20, 981, 'Blossom', 'Schmidt', 'tempus@vehicularisusNulla.net', '297-4322', '', 0, 0, '2019-02-14 04:01:15'),
(21, 980, 'Sebastian', 'Richard', 'elit.erat@faucibusidlibero.net', '447-6422', '', 1, 1, '2019-02-14 04:01:15'),
(22, 979, 'Hoppie', 'Long', 'ligula@lobortisauguescelerisque.edu', '921-6923', '', 2, 1, '2019-02-14 04:01:15'),
(23, 978, 'Kathleen', 'Flores', 'eget.mollis@duinecurna.edu', '1-948-504-2374', '', 1, 0, '2019-02-14 04:01:15'),
(24, 977, 'Madonna', 'Mercado', 'vel.sapien.imperdiet@magnatellus.net', '1-418-124-2959', '', 2, 1, '2019-02-14 04:01:15'),
(25, 976, 'Russell', 'Murphy', 'pharetra.felis@ornare.net', '696-0131', '', 2, 0, '2019-02-14 04:01:15'),
(26, 975, 'Demetria', 'James', 'penatibus@ligulaconsectetuer.edu', '1-350-932-8438', '', 2, 1, '2019-02-14 04:01:15'),
(27, 974, 'Lacota', 'Chase', 'feugiat@lacusQuisqueimperdiet.com', '670-9058', '', 1, 1, '2019-02-14 04:01:15'),
(28, 973, 'Quon', 'Massey', 'neque.non.quam@Praesenteu.co.uk', '846-8776', '', 4, 1, '2019-02-14 04:01:15'),
(29, 972, 'Cairo', 'Bass', 'tempor@eulacus.edu', '212-8740', '', 2, 0, '2019-02-14 04:01:15'),
(30, 971, 'Alea', 'Meadows', 'hendrerit.a.arcu@egettinciduntdui.com', '1-466-461-7634', '', 2, 1, '2019-02-14 04:01:15'),
(31, 970, 'Martena', 'Santos', 'placerat@vel.edu', '364-9973', '', 3, 1, '2019-02-14 04:01:15'),
(32, 969, 'Quintessa', 'Frye', 'diam@natoquepenatibus.ca', '1-324-946-0846', '', 0, 1, '2019-02-14 04:01:15'),
(33, 968, 'Emma', 'Patterson', 'senectus@ligula.co.uk', '152-2847', '', 3, 1, '2019-02-14 04:01:15'),
(34, 967, 'Samson', 'Fuentes', 'Nunc.sed.orci@Donecat.edu', '1-957-911-3953', '', 0, 1, '2019-02-14 04:01:15'),
(35, 966, 'Regan', 'Walter', 'sed@tempusnonlacinia.co.uk', '1-737-127-2686', '', 0, 1, '2019-02-14 04:01:15'),
(36, 965, 'Cullen', 'Shannon', 'eget@DuisgravidaPraesent.ca', '1-862-693-8443', '', 0, 1, '2019-02-14 04:01:15'),
(37, 964, 'Adrian', 'Rosa', 'justo@montesnascetur.net', '522-1164', '', 2, 1, '2019-02-14 04:01:15'),
(38, 963, 'Alden', 'Boone', 'risus.Morbi.metus@diamdictum.co.uk', '1-216-337-5812', '', 0, 1, '2019-02-14 04:01:15'),
(39, 962, 'Christen', 'Mooney', 'Sed@famesac.ca', '269-5574', '', 4, 0, '2019-02-14 04:01:15'),
(40, 961, 'Reece', 'Berger', 'sed.tortor.Integer@Namporttitorscelerisque.com', '1-369-100-6550', '', 4, 0, '2019-02-14 04:01:15'),
(41, 960, 'Quail', 'Williamson', 'hendrerit.neque.In@Sed.ca', '425-4598', '', 2, 0, '2019-02-14 04:01:15'),
(42, 959, 'Kasimir', 'Cunningham', 'augue.porttitor.interdum@Proin.co.uk', '1-936-174-9963', '', 0, 0, '2019-02-14 04:01:15'),
(43, 958, 'Colorado', 'Fowler', 'urna.convallis.erat@adipiscing.com', '1-831-372-0237', '', 2, 1, '2019-02-14 04:01:15'),
(44, 957, 'Price', 'Alston', 'malesuada@convallisligulaDonec.co.uk', '351-1474', '', 2, 0, '2019-02-14 04:01:15'),
(45, 956, 'Fiona', 'Vinson', 'egestas.blandit@sitamet.edu', '1-159-704-7609', '', 3, 1, '2019-02-14 04:01:15'),
(46, 955, 'Ruby', 'Lloyd', 'Curabitur@idblandit.net', '487-9293', '', 3, 1, '2019-02-14 04:01:15'),
(47, 954, 'Brennan', 'Gutierrez', 'magnis.dis@interdumenimnon.net', '1-834-663-8027', '', 3, 1, '2019-02-14 04:01:15'),
(48, 953, 'Patience', 'Conley', 'Fusce@vestibulummassa.org', '533-9572', '', 2, 1, '2019-02-14 04:01:15'),
(49, 952, 'Lyle', 'Mcmahon', 'et@massaQuisque.org', '957-2452', '', 1, 1, '2019-02-14 04:01:15'),
(50, 951, 'Destiny', 'Brady', 'consequat.auctor.nunc@consequatauctor.org', '1-467-894-1269', '', 0, 0, '2019-02-14 04:01:15'),
(51, 950, 'Kelsey', 'Owens', 'vulputate.velit@acmattis.co.uk', '480-9805', '', 4, 0, '2019-02-14 04:01:15'),
(52, 949, 'Madeson', 'Blankenship', 'ac.turpis.egestas@vitaesodales.edu', '203-4960', '', 0, 0, '2019-02-14 04:01:15'),
(53, 948, 'Gabriel', 'Perry', 'eget.varius.ultrices@hymenaeosMaurisut.org', '1-259-114-7112', '', 0, 1, '2019-02-14 04:01:15'),
(54, 947, 'Melodie', 'Mcfadden', 'ac@aliquet.org', '1-201-949-2137', '', 4, 0, '2019-02-14 04:01:15'),
(55, 946, 'Natalie', 'Golden', 'varius.orci@facilisisloremtristique.edu', '1-662-427-8289', '', 3, 0, '2019-02-14 04:01:15'),
(56, 945, 'Arden', 'Austin', 'dis@elit.edu', '1-241-800-7859', '', 3, 1, '2019-02-14 04:01:15'),
(57, 944, 'Lara', 'Morales', 'dictum@temporbibendum.edu', '1-977-951-2618', '', 2, 1, '2019-02-14 04:01:15'),
(58, 943, 'Vaughan', 'Nieves', 'sit.amet.faucibus@a.ca', '809-6836', '', 0, 0, '2019-02-14 04:01:15'),
(59, 942, 'Scarlet', 'Cardenas', 'eu@ut.com', '405-4296', '', 3, 0, '2019-02-14 04:01:15'),
(60, 941, 'Ezra', 'Gonzalez', 'tellus.Nunc@nuncQuisque.co.uk', '870-2535', '', 1, 1, '2019-02-14 04:01:15'),
(61, 940, 'Shaeleigh', 'Manning', 'in.magna@ipsumCurabitur.com', '991-9702', '', 3, 0, '2019-02-14 04:01:15'),
(62, 939, 'Aurelia', 'Chapman', 'vitae.nibh.Donec@consequatpurus.edu', '1-351-145-0552', '', 2, 0, '2019-02-14 04:01:15'),
(63, 938, 'Merritt', 'Nielsen', 'arcu.Vivamus.sit@leo.ca', '617-3872', '', 3, 0, '2019-02-14 04:01:15'),
(64, 937, 'Wesley', 'Price', 'rutrum@ultricesDuis.net', '861-5826', '', 0, 1, '2019-02-14 04:01:15'),
(65, 936, 'Aiko', 'Russo', 'quis.arcu@Nullam.edu', '403-2031', '', 2, 0, '2019-02-14 04:01:15'),
(66, 935, 'Olga', 'Valdez', 'porttitor.vulputate.posuere@ipsumac.com', '1-652-870-4304', '', 2, 1, '2019-02-14 04:01:15'),
(67, 934, 'Kalia', 'Carlson', 'scelerisque@enimgravidasit.net', '123-4154', '', 4, 1, '2019-02-14 04:01:15'),
(68, 933, 'Erica', 'Martin', 'arcu.Sed.et@metusIn.ca', '566-7092', '', 3, 0, '2019-02-14 04:01:15'),
(69, 932, 'Darius', 'Navarro', 'Sed@augue.co.uk', '1-307-569-8839', '', 1, 0, '2019-02-14 04:01:15'),
(70, 931, 'Micah', 'Camacho', 'metus.urna@penatibuset.edu', '621-0421', '', 4, 0, '2019-02-14 04:01:15'),
(71, 930, 'Hop', 'Ellison', 'id.erat.Etiam@Nunclaoreetlectus.ca', '1-760-357-2698', '', 2, 0, '2019-02-14 04:01:15'),
(72, 929, 'Magee', 'Bradford', 'non.lorem.vitae@malesuadaIntegerid.org', '460-4542', '', 4, 0, '2019-02-14 04:01:15'),
(73, 928, 'Athena', 'Bridges', 'facilisis.vitae@magna.com', '1-548-790-6819', '', 3, 1, '2019-02-14 04:01:15'),
(74, 927, 'Kim', 'Coleman', 'pede.malesuada@NuncmaurisMorbi.edu', '861-7576', '', 4, 1, '2019-02-14 04:01:15'),
(75, 926, 'Ivana', 'Nichols', 'magnis@metus.edu', '787-0730', '', 0, 0, '2019-02-14 04:01:15'),
(76, 925, 'Gwendolyn', 'Hinton', 'Sed.pharetra.felis@odioapurus.edu', '1-395-958-4433', '', 3, 1, '2019-02-14 04:01:15'),
(77, 924, 'Kim', 'Sparks', 'in.lobortis.tellus@lobortisultricesVivamus.org', '1-609-408-9192', '', 0, 1, '2019-02-14 04:01:15'),
(78, 923, 'Ursula', 'Koch', 'hymenaeos@consequat.co.uk', '1-975-505-9457', '', 2, 0, '2019-02-14 04:01:15'),
(79, 922, 'Xaviera', 'Clements', 'nulla.Integer.vulputate@blanditcongue.co.uk', '1-559-184-0104', '', 2, 0, '2019-02-14 04:01:15'),
(80, 921, 'Brianna', 'Bowen', 'vel@gravidaAliquamtincidunt.edu', '703-7863', '', 1, 1, '2019-02-14 04:01:15'),
(81, 920, 'Nolan', 'Hickman', 'rutrum.non@afeugiat.co.uk', '1-924-765-4693', '', 4, 1, '2019-02-14 04:01:15'),
(82, 919, 'Arthur', 'Fuller', 'Nam.nulla.magna@pretiumneque.net', '661-4142', '', 2, 1, '2019-02-14 04:01:15'),
(83, 918, 'Mason', 'Johnston', 'semper.dui.lectus@necmetus.edu', '834-0295', '', 0, 0, '2019-02-14 04:01:15'),
(84, 917, 'Carson', 'Mccarthy', 'enim.Suspendisse.aliquet@felis.net', '654-2083', '', 4, 0, '2019-02-14 04:01:15'),
(85, 916, 'Clare', 'Santiago', 'amet.faucibus.ut@eratvelpede.com', '403-4664', '', 1, 0, '2019-02-14 04:01:15'),
(86, 915, 'Alan', 'Padilla', 'turpis@necligula.com', '480-6116', '', 2, 0, '2019-02-14 04:01:15'),
(87, 914, 'George', 'Dorsey', 'vitae@utodiovel.org', '1-360-139-4660', '', 2, 0, '2019-02-14 04:01:15'),
(88, 913, 'Colby', 'Sheppard', 'Integer.vitae@Cras.com', '1-348-165-4526', '', 1, 1, '2019-02-14 04:01:15'),
(89, 912, 'Mollie', 'Carver', 'mollis.vitae@Incondimentum.edu', '768-1352', '', 0, 1, '2019-02-14 04:01:15'),
(90, 911, 'Norman', 'Levine', 'id.mollis.nec@uteros.ca', '273-2347', '', 1, 1, '2019-02-14 04:01:15'),
(91, 910, 'Phillip', 'Cannon', 'sagittis.Duis.gravida@auguescelerisque.edu', '1-824-661-1038', '', 0, 1, '2019-02-14 04:01:15'),
(92, 909, 'Irma', 'Beasley', 'malesuada@ornarelectus.org', '1-650-348-8761', '', 2, 0, '2019-02-14 04:01:15'),
(93, 908, 'Vielka', 'Brewer', 'Quisque.porttitor.eros@feugiatmetus.net', '1-659-245-0304', '', 4, 0, '2019-02-14 04:01:15'),
(94, 907, 'Althea', 'Adams', 'dapibus.quam@eget.org', '1-411-636-1873', '', 1, 1, '2019-02-14 04:01:15'),
(95, 906, 'Kaye', 'Owen', 'facilisis@volutpatnuncsit.net', '821-2802', '', 2, 0, '2019-02-14 04:01:15'),
(96, 905, 'Thane', 'Morton', 'sed.turpis@morbitristiquesenectus.net', '865-3431', '', 1, 0, '2019-02-14 04:01:15'),
(97, 904, 'Chase', 'Hunt', 'Donec.elementum.lorem@Sednullaante.ca', '616-6561', '', 4, 0, '2019-02-14 04:01:15'),
(98, 903, 'Kaye', 'Hobbs', 'lorem.Donec@Lorem.com', '1-418-873-2447', '', 4, 0, '2019-02-14 04:01:15'),
(99, 902, 'Cheryl', 'Clemons', 'Aenean@nislelementumpurus.edu', '424-9989', '', 0, 0, '2019-02-14 04:01:15'),
(100, 901, 'Kelsey', 'Mccullough', 'risus.In.mi@orcisemeget.edu', '524-3686', '', 4, 1, '2019-02-14 04:01:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_v2`
--
ALTER TABLE `student_v2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_v2`
--
ALTER TABLE `student_v2`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
