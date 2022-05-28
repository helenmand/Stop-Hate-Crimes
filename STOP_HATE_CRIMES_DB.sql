-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2022 at 07:17 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `STOP_HATE_CRIMES_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `users` (
  `USERNAME` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `PASSWORD` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `USER_CATEGORIES` varchar(5) NOT NULL,
  `EMAIL` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO users (USERNAME, PASSWORD, USER_CATEGORIES, EMAIL) VALUES
('admin', 'adminP', 'admin', 'admin@gmail.com'),
('alexis', '1234567890', 'user', 'alexis01@yahoo.com'),
('hackerxxx', 'imahacker1999', 'user', 'chad1999@yahoo.com'),
('heristos', 'h73ge6eg346e', 'user', 'heristos@hotmail.com'),
('rumbling', '34werethedanger90', 'user', 'biscoti@hotmail.com'),
('spiros09', '54fer5erf4', 'user', 'spiros09@gmail.com');



CREATE TABLE `articles` (
  `ID` int(10) UNSIGNED NOT NULL,
  `TITLE` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `USERNAME` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CONTENT` varchar(1000) DEFAULT NULL,
  `DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`ID`, `TITLE`, `USERNAME`, `CONTENT`, `DATE`) VALUES
(1, 'Τελευταία στην ΕΕ στην ισότητα φυλων η Ελλάδα', 'heristos', 'With 51.2 out of 100 points, Greece ranks last in the EU on the Gender Equality Index. Its score has increased by only 4.4 points from 2005 to 2017 (+ 1.2 points compared to 2015). Despite this minor progress towards gender equality, Greece’s score places it one position lower than in 2005.\r\nBetween 2005 and 2017, Greece improved its Index score, but had a much lower score than the EU score throughout the entire period. Greece has moved towards gender equality at a slower rate than the EU’s score, meaning that the gap between Greece and the EU has increased over time. ', '2022-05-27 13:30:10'),
(2, 'Είναι ο σεξισμός', 'rumbling', 'Πριν λίγες μέρες, μια 34χρονη δέχθηκε φρικτή δολοφονική επίθεση με καυστικό υγρό. Πολλά μέσα ενημέρωσης έκριναν σκόπιμο να επικεντρωθούν στην εμφάνισή της και με ευκολία πέρασαν στο επόμενο στάδιο.\r\nΓια να είχε τέτοιο μίσος η γυναίκα που επιτέθηκε, τότε το θύμα \"κάτι θα έκανε\". Έτσι φτάσαμε να παρακολουθούμε μια χυδαία παρέλαση στερεοτύπων. Πράγματα απολύτως φυσιολογικά για κάθε άνθρωπο όπως οι σχέσεις που συνάπτει ή το πού διασκεδάζει, παρουσιάζονται ως στοιχεία, που τάχα θα \"ερμηνεύσουν το φρικτό έγκλημα\".\r\nΗ 34χρονη γυναίκα πέρα από το δράμα που ζει και θα ζήσει, μετά την επίθεση, έχει να αντιμετωπίσει και τα δικαστήρια της χυδαιότητας και της ευκολίας.\r\nΑυτά τα δικαστήρια δεν στήνονται από τη μια μέρα στην άλλη, ούτε είναι φυσικά φαινόμενα. Η νοοτροπία καλλιεργείται και οι διάφοροι \"έγκριτοι\" που κάνουν πλακίτσα δημόσια, προσφέρουν το καλύτερο λίπασμα.', '2022-05-26 17:47:06'),
(3, 'Ο σεξισμός έχει πολλές όψεις στα πανεπιστήμια', 'spiros09', 'Επίκαιρος όσο ποτέ ο σεξισμός, η παρενόχληση, οι έμφυλες διακρίσεις, έννοιες που έγιναν μέρος της καθημερινότητας μας μετά την αποκάλυψη της Ολυμπιονίκη Σοφίας Μπεκατώρου για βιασμό που άνοιξε τους ασκούς του Αιόλου με καταγγελίες να έρχονται στην επιφάνεια και από άλλες αθλητικές ομοσπονδίες, σχολές ΤΕΙ και πανεπιστήμια.\r\nΜετά τις αποκαλύψεις της parallaxi στο προσκήνιο και το Α.Π.Θ με τις γυναίκες να αποκαλύπτουν η μια μετά την άλλη περιστατικά παρενοχλήσεων από καθηγητές σχολών.\r\nΠοτέ δεν είναι αργά για την καταγγελία περιστατικών παρενόχλησης, είναι σημαντικό τόσο σοβαρά θέματα να βγαίνουν στην επιφάνεια. Εκτός όμως από τις αποκαλύψεις ένα σημαντικό κομμάτι, η πρόληψη, αυτό που το κράτος, οι δομές και η εκπαιδευτική κοινότητα οφείλουν να κάνουν βρίσκεται πολύ χαμηλά στην ατζέντα.', '2022-05-26 01:04:35'),
(4, 'Σχετικά με την κοινότητα ΛΟΑΤΚΙ', 'spiros09', 'Γνωρίζετε άτομα που είναι μέλη της κοινότητας (gay, bi, trans, genderfluid, nonbinary...); Ποια η στάση σας προς αυτά; Ποια η στάση του περιβάλλοντός σας, οικογενειακού και φιλικού;', '2022-05-25 21:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) UNSIGNED NOT NULL,
  `USERNAME` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `COMMENT` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ARTICLE_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `USERNAME`, `COMMENT`, `ARTICLE_ID`) VALUES
(1, 'rumbling', 'O κολλητός μου είναι γκέι δεν άλλαξε τίποτα στη σχέση μας όταν το έμαθα', 4),
(2, 'hackerxxx', 'Γνωρίζω και δεν έχω κάποια στάση.\r\n\r\nΌπως θα μιλήσω στον straight φίλο μου, έτσι θα μιλήσω και στον bi/gay/trans/whatever φίλο μου.', 4),
(3, 'heristos', 'asxeto alla exw paratirisei pws den exoume femboys stin ellada,den exw dei pote ekso oute sto grindr... krima', 4),
(4, 'alexis', 'Εχεις τοσο δικιοο!', 3),
(5, 'hackerxxx', 'Έχω αναπτύξει τεκμηριωμένη θεωρία ότι το θύμα όντως δεν έκανε τίποτα, και ο θύτης είχε παθολογική ζήλια με το να την παρακολουθεί από απόσταση. Διότι αν το θύμα ένιωθε ευθύνη δε νομίζω να ανακοίνωνε εντός ωρών ότι δεν έχει απατήσει γιατί με λίγη νοημοσύνη θα σκεφτόταν \"κάτσε μη λέμε πολλά και έχει φωτογραφίες\".', 2),
(6, 'alexis', 'Έτσι πρέπει!', 4),
(7, 'spiros09', 'Μόνο στο τικ τοκ έχω δει κάνα δυο! Σπανίζουν όμως', 4),
(8, 'heristos', 'distixos', 4),
(9, 'spiros09', ' \"Εχω αναπτυξει τεκμηριωμενη θεωρια\"\r\n ρε... αστειο', 2);
-- --------------------------------------------------------

--
-- Table structure for table `comments_on_comments`
--

CREATE TABLE `comments_on_comments` (
  `COMMENTS` int(11) UNSIGNED NOT NULL,
  `FOLLOWS` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `comments_on_comments` (`COMMENTS`, `FOLLOWS`) VALUES
(1, 6),
(3, 7),
(7, 8),
(5, 9);
-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `ID` int(10) UNSIGNED NOT NULL,
  `TITLE` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `USERNAME` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CONTENT` varchar(1000) DEFAULT NULL,
  `REGION` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`ID`, `TITLE`, `USERNAME`, `CONTENT`, `REGION`, `DATE`) VALUES
(1, 'ομοφοβικο περιστατικο', 'spiros09', 'Μας επιτεθηκαν μια ομαδα 4 ατομων στο κεντρο της θεσσαλονικης χθες 25/05 3:00.', 'Thessaloniki', '2022-05-26 12:34:09'),
(2, 'Σεξιστικο επεισοδιο', 'alexis', 'Επιτεθηκαν λεκτικα σε μια παρεα κοριτσιων 2 ατομα με κουκουλες σημερα 20:00 στην τουμπα κοντα στο γηπεδο του ΠΑΟΚ.', 'Athens', '2022-05-25 23:54:12'),
(3, 'τρανσφοβικη επιθεση', 'rumbling', 'Τρανσφοβικη επίθεση μεσα στο ΑΠΘ κοντα στο Πολυτεχνιο.', 'Thessaloniki', '2022-05-27 18:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USERNAME` (`USERNAME`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USERNAME` (`USERNAME`),
  ADD KEY `ARTICLE_ID` (`ARTICLE_ID`);
  
  


--
-- Indexes for table `comments_on_comments`
--
--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USERNAME` (`USERNAME`) USING HASH;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `users` (`USERNAME`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `COMMENTS_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `users` (`USERNAME`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `COMMENTS_ibfk_2` FOREIGN KEY (`ARTICLE_ID`) REFERENCES `articles` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `comments_on_comments`
--
ALTER TABLE `comments_on_comments`
  ADD CONSTRAINT `COMMENTS_ON_COMMENTS_ibfk_1` FOREIGN KEY (`COMMENTS`) REFERENCES `comments` (`ID`),
  ADD CONSTRAINT `COMMENTS_ON_COMMENTS_ibfk_2` FOREIGN KEY (`FOLLOWS`) REFERENCES `comments` (`ID`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `COMPLAINTS_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `users` (`USERNAME`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
