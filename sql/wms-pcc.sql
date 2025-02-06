-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2025 at 08:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wms-pcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `pet_data`
--

CREATE TABLE `pet_data` (
  `petID` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(5) NOT NULL,
  `sex` varchar(8) NOT NULL,
  `age` float NOT NULL,
  `breed` varchar(50) NOT NULL,
  `characteristics` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_data`
--

INSERT INTO `pet_data` (`petID`, `name`, `type`, `sex`, `age`, `breed`, `characteristics`, `img`, `description`) VALUES
(1, 'Andrew', 'Cat', 'Male', 1, 'Tabby', 'Playful;Affectionate', '../pics/Cats/C1.jpg', 'loving, playful, and litter-trained cat looking for a forever home!'),
(2, 'Aivan', 'Cat', 'Male', 2, 'Ginger Tabby', 'Calm;Affectionate', '../pics/Cats/C2.jpg', 'friendly, affectionate, and well-behaved cat ready to find a loving home!'),
(3, 'Julius', 'Dog', 'Male', 0.3, 'Cross Breed', 'Energetic;Playful', '../pics/Dogs/D1.jpg', 'Loyal, loving, and full of energy—looking for a forever home!'),
(4, 'Trina', 'Cat', 'Female', 3, 'Cross Breed', 'Calm;Playful', '../pics/Cats/C3.jpg', 'sweet and playful cat looking for a loving home!'),
(5, 'Daniel', 'Dog', 'Male', 0.3, 'Cross Breed', 'Playful;Affectionate', '../pics/Dogs/D2.jpg', 'A friendly and affectionate dog ready to be your best friend!'),
(6, 'Shein', 'Dog', 'Female', 1, 'Aspin', 'Energetic;Playful', '../pics/Dogs/D3.jpg', 'Playful, smart, and eager to please—adopt this wonderful pup!'),
(7, 'Marvic', 'Cat', 'Male', 1, 'Ginger Tabby', 'Affectionate;Playful', '../pics/Cats/C4.jpg', 'Affectionate, curious, and ready to be your new best friend!'),
(8, 'Rowine', 'Dog', 'Male', 0.7, 'Shih Tzu', 'Calm;Affectionate', '../pics/Dogs/D4.png', 'Always up for an adventure or a cozy nap by your side!'),
(9, 'Edda', 'Dog', 'Male', 0.5, 'Canaan', 'Playful;Energetic', '../pics/Dogs/D5.png', 'Loves belly rubs, enjoys playtime, and loves cuddling!'),
(10, 'Trisha', 'Cat', 'Female', 2, 'Siamese', 'Calm;Affectionate', '../pics/Cats/C5.jpg', 'Independent yet cuddly—this cat is the perfect companion!'),
(11, 'Tom', 'Dog', 'Male', 4, 'Aspin', 'Playful;Affectionate', '../pics/Dogs/D6.png', 'This dog will bring endless joy and companionship to your home!'),
(12, 'Mark', 'Cat', 'Male', 4, 'Cross Breed', 'Calm;Energetic', '../pics/Cats/Csquare.png', 'Litter-trained, gentle, and full of personality!'),
(13, 'James', 'Cat', 'Male', 0.8, 'Cross Breed', 'Playful;Energetic', '../pics/Cats/C7.png', 'Loves to nap, play, and purr—ready for a forever home!'),
(14, 'Trishia', 'Dog', 'Female', 1, 'Aspin', 'Affectionate;Calm', '../pics/Dogs/D7.png', 'Well-mannered, affectionate, and full of tail wags!'),
(15, 'Angelo', 'Dog', 'Male', 2, 'Cross Breed', 'Energetic;Playful', '../pics/Dogs/D8.png', 'playful and energetic pup looking for a loving family!'),
(16, 'Jamaica', 'Cat', 'Female', 3, 'Cross Breed', 'Playful;Calm', '../pics/Cats/C8.png', 'charming and loving cat who enjoys both cuddles and adventures!'),
(17, 'Jane', 'Dog', 'Female', 0.3, 'Jack Russel', 'Affectionate;Calm', '../pics/Dogs/D9.png', 'Sweet, gentle, and great with kids—your perfect family dog!'),
(18, 'Joy', 'Cat', 'Female', 0.2, 'British Shorthair', 'Affectionate;Energetic', '../pics/Cats/C9.png', 'Soft, snuggly, and always ready for playtime!'),
(19, 'Rico', 'Cat', 'Male', 0.3, 'LaPerm', 'Calm;Energetic', '../pics/Cats/C10.png', 'Low-maintenance but full of love—adopt this wonderful cat today!'),
(20, 'Karl', 'Dog', 'Male', 3, 'Aspin', 'Playful;Calm', '../pics/Dogs/D10.png', 'Loves fetch, long walks, and snuggles on the couch!'),
(21, 'Migs', 'Dog', 'Male', 2, 'Pitbull', 'Energetic;Affectionate', '../pics/Dogs/D11.png', 'brave and loyal protector with a heart full of love!'),
(22, 'Dwayne', 'Cat', 'Male', 3, 'Cross Breed', 'Affectionate;Playful', '../pics/Cats/C11.png', 'A graceful and intelligent cat searching for a caring family!'),
(23, 'Anthony', 'Dog', 'Male', 5, 'Aspin', 'Playful;Affectionate', '../pics/Dogs/D12.png', 'Friendly, house-trained, and always happy to see you!'),
(24, 'Vincent', 'Cat', 'Male', 4, 'Ginger Tabby', 'Calm;Affectionate', '../pics/Cats/C12.png', 'Loves chin scratches and cozy spots—your perfect lap cat!'),
(25, 'Neil', 'Cat', 'Male', 0.4, 'Cross Breed', 'Affectionate;Calm', '../pics/Cats/C13.png', 'Elegant, friendly, and full of curiosity—ready to join your home!'),
(26, 'Trixia', 'Dog', 'Female', 0.4, 'Chinook', 'Playful;Calm', '../pics/Dogs/D13.png', 'the one who will shower you with love, kisses, and wagging tails!'),
(27, 'Rei', 'Dog', 'Male', 3, 'Dutch Hound', 'Calm;Energetic', '../pics/Dogs/D14.png', 'gentle and obedient pup ready for a lifetime of love!'),
(28, 'Shane', 'Cat', 'Female', 4, 'Bengal Cat', 'Energetic;Affectionate', '../pics/Cats/C14square.png', 'little shy at first but warms up into the sweetest companion!'),
(29, 'Evan', 'Dog', 'Male', 1, 'Poodle', 'Calm;Affectionate', '../pics/Dogs/D15.png', 'Loyal and affectionate—a perfect companion for any home!'),
(30, 'Malone', 'Cat', 'Male', 1, 'Cross Breed', 'Playful;Affectionate', '../pics/Cats/C15.png', 'Loyal, independent, and endlessly entertaining!'),
(31, 'Carem', 'Cat', 'Female', 0.4, 'Tabby', 'Calm;Affectionate', '../pics/Cats/C16.png', 'a cat that will fill your home with love, warmth, and purrs!'),
(32, 'Ethan', 'Dog', 'Male', 4, 'Chihuahua', 'Affectionate;Calm', '../pics/Dogs/D16.png', 'is a dog who loves playing outside and relaxing with the family!'),
(33, 'Joana', 'Dog', 'Female', 0.1, 'Jack Russel', 'Playful;Affectionate', '../pics/Dogs/D17.png', 'a smart and loving dog eager to learn and bond with you!'),
(34, 'Ranzi', 'Cat', 'Male', 0.8, 'Ginger Tabby', 'Calm;Playful', '../pics/Cats/C17.png', 'a cat who loves playtime, sunny naps, and being part of the family!'),
(35, 'Khyle', 'Dog', 'Female', 0.3, 'Golden Retriever', 'Playful;Energetic', '../pics/Dogs/D18.png', 'happy, social, and always ready for a new adventure!'),
(36, 'Clark', 'Cat', 'Male', 3, 'Tabby', 'Affectionate;Calm', '../pics/Cats/C18.png', 'gentle and quiet companion looking for a peaceful home!'),
(37, 'Idriz', 'Cat', 'Male', 4, 'Cross Breed', 'Playful;Energetic', '../pics/Cats/C19.png', 'silly, fun, and full of mischief—this cat will keep you smiling!'),
(38, 'Joaquin', 'Dog', 'Male', 1, 'Shih Tzu', 'Calm;Affectionate', '../pics/Dogs/D19.png', 'full of personality and looking for a best friend!'),
(39, 'Diana', 'Dog', 'Female', 2, 'aspin', 'Playful;Affectionate', '../pics/Dogs/D20.png', 'ready to bring joy and love into your life!'),
(40, 'Ernest', 'Cat', 'Male', 3, 'Cross Breed', 'Affectionate;Energetic', '../pics/Cats/C20.png', 'charming and affectionate cat ready to bring joy into your life!');

-- --------------------------------------------------------

--
-- Table structure for table `rehomer_info`
--

CREATE TABLE `rehomer_info` (
  `username` varchar(25) NOT NULL,
  `pword` varchar(300) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `phonenum` varchar(15) NOT NULL,
  `honorific` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rehomer_info`
--

INSERT INTO `rehomer_info` (`username`, `pword`, `fname`, `lname`, `phonenum`, `honorific`) VALUES
('daland4ni', '55b7e8b895d047537e672250dd781555', 'Aeron Jamil', 'Roxas', '09287968320', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `rehomer_pets`
--

CREATE TABLE `rehomer_pets` (
  `petID` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rehomer_pets`
--

INSERT INTO `rehomer_pets` (`petID`, `username`) VALUES
('1', 'daland4ni'),
('4', 'daland4ni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pet_data`
--
ALTER TABLE `pet_data`
  ADD UNIQUE KEY `PRIMARY KEY` (`petID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pet_data`
--
ALTER TABLE `pet_data`
  MODIFY `petID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
