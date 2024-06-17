-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 07:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `podcast_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verified` tinyint(1) DEFAULT 0,
  `verification_code` varchar(255) DEFAULT NULL,
  `security_question` varchar(255) NOT NULL,
  `security_answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `verified`, `verification_code`, `security_question`, `security_answer`) VALUES
(1, 'Vincent Andy Facturanan', 'peter@yahoo.com', '$2y$10$Ll62gABXS7MFL5JYZkK9fO6jE14/FCAnz8L.jumvjqB1QcNE1ustG', 1, NULL, '', ''),
(2, 'Jun Facturanan', 'vincentandyfacturanan@gmail.com', '$2y$10$PWWhGNUs6z9pv8ldxCDXlea.icO4qvTXFi.bZXAaRcM1lyYN6mDCm', 1, NULL, '', ''),
(4, 'Joel Griffin', 'griffin@email.com', '$2y$10$rl2kZALArr2vzZcMHu.NNOVERVhajwsH3X4/z7Uey5jQ4NcCxqHIm', 1, NULL, '', ''),
(5, 'Trisha', 'trisha.posadas@ustp.ed.ph', '$2y$10$F455Q0f65KHRAY59BG3uYOweJ2wdXoco2t9UQVr9lDa3yB5aEzMxW', 1, NULL, '', ''),
(6, 'Peter Griffin', 'PGriffin@gmail.com', '$2y$10$FmK2xM8q8QRc2kfbF62OF.1nbTlLkDQ12/B7TH3QSJb0r/40JD3Dy', 1, NULL, 'What is my first name?', '$2y$10$Khd.LdagTAX0XnlxISBPNuWTEYLvEgO5TvDn1R9T9PIVGkswkB3tm'),
(7, 'Vincent Andy Facturanan', 'hellnah@gmail.com', '$2y$10$fluwAuHyImckUrD/IY.66eni6bcHL6eGUpB.zzljHACtwvR0n4DQO', 1, NULL, 'What is my first name?', '$2y$10$IBoOvLfe6ZlSP.kZdP92KumiI/ZBNbyVzNn49z/vTfE747OXJ7vLK'),
(8, 'Dana', 'dana@gmail.com', '$2y$10$44VKudObKgxXQJKXNXwFQ.7KnycRwM5Y7i4vdhKb/UMiheHqTePE2', 1, NULL, 'What was the name of your first pet?', '$2y$10$MME0hKd7HSjxoFj1ee3piuhWDcMnLwFlenP2Qcvy95k/8b2q1I6Vm'),
(9, 'Vincent', 'vincent@gmail.com', '$2y$10$SxB8u6wHCrtDz0IKJgQOueyRak9vzibwY1VBGREK26poqiKa5zN6S', 1, NULL, 'What was the name of your first pet?', '$2y$10$xlBTQ4/HQWpBh6kql0Fd0.MSP1OZ01yMycqop4n0wz.ixpvuGnEFS'),
(10, 'Dana Ba', 'danadana@gmail.com', '$2y$10$f5pCJroxLaUnoohDpU3Cnuq//AOzrC9rwYtmg5yKD3fqeuFLFi0US', 1, NULL, 'What is your mother\'s maiden name?', '$2y$10$2GPZTX9tib8Ho.a0ECokR.kXGEjPnmtMjbRY.RFyvOnqXrMmKYYl6'),
(11, 'Skro', 'Matter@gmail.com', '$2y$10$FUuQcoNWgSNFOQ86a8iDWe2hEWVr9ryVJI7yn.Yo6wwajcJHNLY9i', 1, NULL, 'What is your favorite book?', '$2y$10$rF2G0kbxZ5fgqGfDsYQgxOrDp5qlkzCLJR2IDC8BCS9ZBe8AUhayi'),
(12, 'Vincent Andy Facturanan', 'andy@rocket.com', '$2y$10$1d/gGF2R0YQ5Z4rQq6tu.emSPVnYlJnAN3lBI1zbJ5LiRvY/a.v2C', 1, NULL, 'What is your mother\'s maiden name?', '$2y$10$SIIFznll5SxkAxWy5XpDzO.tsXaih2nANGaFWNdKeXsIy74hV/LSu'),
(18, 'Peter Griffin', 'iamgod@yahoo.com', '$2y$10$e3/tlYi9SC3JpLM8rSH32.MIfV1/SqGpPMEsK8tE3DTFZQz87Q7vi', 1, NULL, 'What is your mother\'s maiden name?', '$2y$10$c54WOq.YFlM5pR.f/N26UO4JLzi3NBpUqBjrFhOTexu31C2dYVviG'),
(19, 'Peter Griffin', 'iamgod1@yahoo.com', '$2y$10$MkOI3EJ2fev3/DYVgzQq8ePa3lWSHx/kuajLNt2n11TyS/MbcPHh.', 1, NULL, 'What is your mother\'s maiden name?', '$2y$10$5uTdgzY5nA5yRBJtsYklDuqcijryTE/hlM3gPQZxEdQ7NWErE8Ov.'),
(20, 'Vincent Andy Facturanan', 'andy1@gmail.com', '$2y$10$mLAGvTEFRtaFUIhpReWeOuLDn3GcAqpdZhr1Veou5LNJ4dg3dQhMS', 1, NULL, 'What city were you born in?', '$2y$10$5AxmDJmZD1MMznRVS2KFh..XZWRZQio3dZD1lL9CVaRhjfXHLDsa2'),
(21, 'Vincent Andy', 'test1@gmail.com', '$2y$10$ZnshJuFvlvHVaBa/iruM/eQtdRtwKqvdHpOCBe2b1vdA12IOFyWSu', 1, NULL, 'What is your mother\'s maiden name?', '$2y$10$mreanmboDMaI4tj5CnGT7ujeXoK13Hpo/xpdJMYHDJLOB79SZx3gm'),
(22, 'Trisha Posadas', 'trisha123@yahoo.com', '$2y$10$.bZ3nn6zDhHakOGtsoJ8l..1WiSEzQqIS1hlHktvOTRpmu5w0a5wW', 1, NULL, 'other', '$2y$10$ZpLhG3JUKGyLePURQY/ewu7ynaYIOB2pI4id56Knl69nO7LVlc98G');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
