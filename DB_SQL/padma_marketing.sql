-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 15, 2021 at 01:25 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `padma_marketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `place_of_birth` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `marital_status` tinyint(4) DEFAULT NULL,
  `nid_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_no` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_certificate_no` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_certificate_image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preferred_branch` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_road_or_village` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_post_office` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_division` tinyint(4) DEFAULT NULL,
  `pre_district` tinyint(4) DEFAULT NULL,
  `pre_years` tinyint(4) DEFAULT NULL,
  `per_road_or_village` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_post_office` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_division` tinyint(4) DEFAULT NULL,
  `per_district` tinyint(4) DEFAULT NULL,
  `cell` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell_years` tinyint(4) DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_years` tinyint(4) DEFAULT NULL,
  `occupation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_acc_no` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu_institute` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_exam` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_of_passing` smallint(6) DEFAULT NULL,
  `cgpa_division_class` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_board_university` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_degree` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_contact_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_contact_relationship` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_contact_phn1` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_contact_phn2` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_contact_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_contact_relationship` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_contact_phn1` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_contact_phn2` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_reference_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_reference_relationship` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_reference_employee_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_reference_contact` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_dob` date DEFAULT NULL,
  `spouse_contact` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_dob` date DEFAULT NULL,
  `fathers_contact` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_dob` date DEFAULT NULL,
  `mothers_contact` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankruptcy` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankruptcy_details` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `borrower` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `borrower_details` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `convicted_by_court` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `convicted_by_court_details` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_union` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_union_details` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_details` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `rm_id` int(11) DEFAULT NULL,
  `assc_acc_no` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `name`, `dob`, `place_of_birth`, `gender`, `marital_status`, `nid_no`, `passport_no`, `birth_certificate_no`, `nid_image`, `passport_image`, `birth_certificate_image`, `preferred_branch`, `pre_road_or_village`, `pre_post_office`, `pre_division`, `pre_district`, `pre_years`, `per_road_or_village`, `per_post_office`, `per_division`, `per_district`, `cell`, `cell_years`, `email`, `tin`, `social`, `social_years`, `occupation`, `bank_acc_no`, `bank_name`, `branch`, `edu_institute`, `name_of_exam`, `year_of_passing`, `cgpa_division_class`, `name_board_university`, `professional_degree`, `primary_contact_name`, `primary_contact_relationship`, `primary_contact_phn1`, `primary_contact_phn2`, `secondary_contact_name`, `secondary_contact_relationship`, `secondary_contact_phn1`, `secondary_contact_phn2`, `employee_reference_name`, `employee_reference_relationship`, `employee_reference_employee_id`, `employee_reference_contact`, `spouse_name`, `spouse_dob`, `spouse_contact`, `fathers_name`, `fathers_dob`, `fathers_contact`, `mothers_name`, `mothers_dob`, `mothers_contact`, `bankruptcy`, `bankruptcy_details`, `borrower`, `borrower_details`, `convicted_by_court`, `convicted_by_court_details`, `trade_union`, `trade_union_details`, `member`, `member_details`, `applicant_image`, `status`, `rm_id`, `assc_acc_no`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'JOBAYED ULLAH', '1992-01-15', 'Hatiya', 0, 0, '2361782630', NULL, NULL, NULL, NULL, NULL, 'BD0010002', 'Badda', 'Badda-1212', 1, 1, 13, 'Hatiya', 'Hatiya', 2, 5, '01763353145', 8, 'shuvo.pma@gmail.com', '37853785738', 'fb', 10, 'Job', '021227777', 'Padma', 'BD0010002', 'Dhaka Univ', 'HONS', 2018, '3.50', 'Dhaka University', NULL, 'A', NULL, '6434785437', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ahasan Ullah', '1962-04-18', '3745875787', NULL, NULL, NULL, 'on', NULL, 'on', NULL, 'on', NULL, 'on', NULL, 'on', NULL, '1623840755.jpg', 1, NULL, NULL, NULL, '2021-06-16 04:52:35', '2021-06-23 02:57:06', NULL),
(2, 'Rashed Chowdhury', '1983-05-11', 'Hatiya', 0, 1, '73875377588', NULL, NULL, NULL, NULL, NULL, 'BD0010002', 'Badda', 'Badda-1212', 1, 1, 20, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BD0010002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, 'on', NULL, 'on', NULL, 'on', NULL, 'on', NULL, 'placeholder.png', 1, NULL, NULL, NULL, '2021-06-16 05:26:02', '2021-06-16 05:26:02', NULL),
(3, 'Jobayer Ahmed', '1987-04-16', 'Narsingdi', 0, 1, '64736537', NULL, NULL, NULL, NULL, NULL, 'BD0010003', 'Shahjadpur', 'Gulshan', 1, 1, 12, 'Narsingdi', 'Narsingdi', 1, 2, '01763353145', 8, 'jobayer.ahmed@padmabankbd.com', '37853785738', 'fb', 10, 'Job', '74265723758', 'Padma', 'BD0010002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, 'on', NULL, 'on', NULL, 'on', NULL, 'on', NULL, 'jobayer.jpg', 101, NULL, NULL, 4, '2021-06-16 05:34:03', '2021-06-24 02:04:48', NULL),
(4, 'JOBAYED ULLAH', '2021-06-03', 'Narsingdi', 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'BD0010002', NULL, NULL, 1, 1, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BD0010002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '0', NULL, '0', NULL, '1', NULL, '1', NULL, 'placeholder.png', 0, NULL, NULL, NULL, '2021-06-16 05:37:43', '2021-06-16 05:37:43', NULL),
(5, 'Manzurul Ahsan', '2021-06-15', 'hgsdfghs', 0, 1, '784357465', NULL, NULL, NULL, NULL, NULL, 'BD0010003', NULL, NULL, 1, 1, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BD0010002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '1623914450.jpg', 102, NULL, NULL, 4, '2021-06-17 01:20:50', '2021-06-24 00:44:45', NULL),
(6, 'JOBAYED ULLAH hhh', '2021-06-22', 'Narsingdi', 0, 0, '2361782630888', NULL, NULL, NULL, NULL, NULL, 'BD0010003', 'Shahjadpur', 'Gulshan', 4, 3, 20, 'Narsingdi', 'Hatiya', 3, 6, '01777777777', 8, 'zia@sme.com', '9898989898', NULL, NULL, NULL, NULL, NULL, 'BD0010002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '1624269145.jpg', 101, 9, NULL, 4, '2021-06-21 03:52:25', '2021-06-24 05:11:38', NULL),
(7, 'Karim Benjama', '1983-05-19', 'ABCD', 0, 1, NULL, 'BY65644788', NULL, NULL, NULL, NULL, 'BD0010003', 'ABCD', 'Gulshan', 2, 7, 13, 'Paris', 'Paris - 1288', 1, 3, '01777777777', 12, 'abcdef@gmail.com', '654654654', 'jhhjjh jyhj linked in', 5, 'Football Player', '6356769999988', 'AB BAnk', 'BD0010008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '1624533986.jpg', 101, 9, NULL, 4, '2021-06-24 05:26:26', '2021-06-24 05:40:55', NULL),
(8, 'Khandoker Zibanur Rahman', '2021-06-14', 'hgsdfghs', 0, 0, '73875377588', NULL, NULL, NULL, NULL, NULL, 'BD0010011', 'ABCD', 'Gulshan', 1, 1, 20, 'Narsingdi', 'Narsingdi', 1, 1, '01777777777', 89, 'pdbladmin@padmabankbd.com', '654577488', NULL, NULL, 'Football Player', '1115467476777', 'Padma', 'BD0010002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '1624780079.jpg', 1, NULL, NULL, NULL, '2021-06-27 01:48:00', '2021-06-27 01:48:00', NULL),
(9, 'Nabila APu', '1987-02-18', 'Mohammadpur', 1, 1, '544554555568', NULL, NULL, NULL, NULL, NULL, 'BD0010002', 'Moh', '122', 1, 1, 10, 'Moh', '111', 2, 7, '01888123123', 10, 'a@b', NULL, 'fb', 10, NULL, NULL, NULL, 'BD0010002', NULL, NULL, NULL, NULL, NULL, NULL, 'PBL Name', 'Bro', '01763455455', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aaa', NULL, NULL, 'fff', NULL, NULL, 'mmm', NULL, NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '1625123879.png', 1, NULL, NULL, NULL, '2021-07-01 01:17:59', '2021-07-01 01:17:59', NULL),
(10, 'A', '2021-07-01', 't', 0, 0, '4444444444', NULL, NULL, NULL, NULL, NULL, 'BD0010048', '3', '4', 1, 1, 1, '1', '1111', 1, 1, '01201010101', 3, 'd@g.tr', NULL, '33', 3, NULL, NULL, NULL, 'BD0010002', NULL, NULL, NULL, NULL, NULL, NULL, 'G', 'F', '01500000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S', NULL, NULL, 'F', NULL, NULL, 'M', NULL, NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '1', 'FRDGF', '1625124692.png', 2, NULL, NULL, 12, '2021-07-01 01:31:32', '2021-07-06 03:35:59', NULL),
(11, 'Image Upload Test', '2000-05-31', 'hds', 0, 0, '4444446666', NULL, NULL, NULL, NULL, NULL, 'BD0010003', 'abcd', 'abcd-111', 2, 6, 20, 'fff', 'fff-1111', 1, 2, '01763456456', 10, 'abc@gmail.com', NULL, 'facebook.com/aaa', 10, NULL, NULL, NULL, 'BD0010002', NULL, NULL, NULL, NULL, NULL, NULL, 'shfj', 'dggd', '01755222333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ABBB', NULL, NULL, 'gffg', NULL, NULL, 'hghghgh', NULL, NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '1625466271.png', 101, NULL, NULL, 4, '2021-07-05 00:24:31', '2021-07-07 03:36:54', NULL),
(12, 'e', '1973-05-09', 'e', 0, 0, '3333333333', NULL, NULL, NULL, NULL, NULL, 'BD0010002', '3', '3', 1, 1, 3, '3', '3', 1, 1, '01200000000', 3, '3@g.h', NULL, '3', 3, NULL, NULL, NULL, 'BD0010002', NULL, NULL, NULL, NULL, NULL, NULL, '3', '3', '01200000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, '3', NULL, NULL, '3', NULL, NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '1625466427.png', 1, NULL, NULL, NULL, '2021-07-05 00:27:07', '2021-07-05 00:27:07', NULL),
(13, 'ttt', '2021-07-01', 'u', 0, 0, '2222222224', NULL, NULL, NULL, NULL, NULL, 'BD0010035', 't', 't', 4, NULL, 4, '4', '4', 2, 6, '01201010101', 4, '3@g.h44', NULL, '4', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'e', 'e', '01200000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'e', NULL, NULL, 'e', NULL, NULL, 'e', NULL, NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '1625561662.png', 1, NULL, NULL, NULL, '2021-07-06 02:54:22', '2021-07-06 02:54:22', NULL),
(14, 'ttf', '1973-05-09', 'a', 0, 0, '222333333334', NULL, NULL, NULL, NULL, NULL, 'BD0010035', '3', 'r', 2, 5, 4, '4', '4', 2, 6, '01200000005', 4, '3@g.h4443', NULL, '3', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'r', 'HH', '01500000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'y', NULL, NULL, 't', NULL, NULL, 'r', NULL, NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '1625562253.png', 2, NULL, NULL, 12, '2021-07-06 03:04:13', '2021-07-07 00:46:34', NULL),
(15, 'khulna app', '1973-05-09', 'a', 0, 0, '333333333333335', NULL, NULL, NULL, NULL, NULL, 'BD0010035', '5', '4', NULL, NULL, 4, '4', '4', NULL, NULL, '01201010101', 4, '3@g.hs', NULL, 'r', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'r', 'HH', '01500000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'f', NULL, NULL, 'f', NULL, NULL, 'f', NULL, NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '1625563044.png', 1, NULL, NULL, NULL, '2021-07-06 03:17:24', '2021-07-06 03:17:24', NULL),
(16, 'app nilphamari', '2021-06-27', 'a', 0, 0, '23232323232323232', NULL, NULL, NULL, NULL, NULL, 'BD0010048', 'q', '1', 1, 2, 1, 'a', 'a', 1, 1, '01200000000', 4, 'nabila.alam@padmabankbd.com', NULL, 'w', 99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'w', 'w', '01500000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, 'w', NULL, NULL, 'w', NULL, NULL, '0', 'wwwwwwwwwwww', '0', NULL, '0', NULL, '0', NULL, '0', NULL, '1625633787.png', 101, 16, NULL, 4, '2021-07-06 22:56:27', '2021-07-07 23:36:59', NULL),
(17, 't', '2021-07-07', 'a', 0, 0, '5656666666', NULL, NULL, NULL, NULL, NULL, 'BD0010048', '6', '6', 1, 1, 6, '6', '6', 1, 2, '01201010101', 6, 'd@g.tr6', NULL, '6', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', '6', '01500000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', NULL, NULL, '6', NULL, NULL, '6', NULL, NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '1625640669.png', 2, NULL, NULL, 12, '2021-07-07 00:51:09', '2021-07-07 00:52:44', NULL),
(18, 'yy', '2021-07-01', 'dg', 0, 0, '3333444455', NULL, NULL, NULL, NULL, NULL, 'BD0010048', '4', '4', 1, 1, 4, '4', '4', 2, 5, '01500000000', 2, '3@g.h4', NULL, '4', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', '4', '01500000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, '4', NULL, NULL, '4', NULL, NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '1625650768.png', 101, NULL, NULL, 4, '2021-07-07 03:39:28', '2021-07-07 03:44:00', NULL),
(19, 'u', '2021-07-01', 't', 0, 0, '6565656565', NULL, NULL, NULL, NULL, NULL, 'BD0010048', '5', '5', 1, 1, 5, '5', '5', 2, 5, '01201010101', 3, 'd@g.tr55', NULL, '5', 5, NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL, '2000', NULL, 'h', 'g', '01200000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'g', NULL, NULL, 'l', NULL, NULL, 't', NULL, NULL, '0', 'ttt', '0', 'nnn', '0', 'mmm', '0', 'jhh', '0', 'ggg', '1625727559.png', 2, NULL, NULL, 12, '2021-07-08 00:59:19', '2021-07-15 05:00:38', NULL),
(20, 'u', '2021-07-08', 'y', 0, 0, '3333333334', NULL, NULL, NULL, NULL, NULL, 'BD0010048', '4', '4', 1, 3, 4, '4', '4', 2, 6, '01201010101', 4, '3@g.h44', NULL, '4', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', 'g', '01200000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, '5', NULL, NULL, '6', NULL, NULL, '1', 'a', '1', 'b', '1', 'c', '1', 'd', '0', NULL, '1625733961.png', 102, NULL, NULL, 11, '2021-07-08 02:46:01', '2021-07-14 03:33:13', NULL),
(21, 'e', '2021-07-12', 'a', 1, 1, '0101010102', NULL, NULL, '1626081700.png', NULL, NULL, 'BD0010048', '4', '4', 1, 2, 3, '4', '4', 1, 2, '01200000000', 4, '3@g.h443', NULL, 'https://www.facebook.com/test5', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'r', 'r', '01500000069', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'f', NULL, NULL, 'd', NULL, NULL, 'e', NULL, NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '0', NULL, '1626081700.png', 4, NULL, NULL, 11, '2021-07-12 03:21:40', '2021-07-14 00:53:58', NULL),
(22, 'gg', '2000-07-13', 't', 1, 1, '0101010102', NULL, NULL, '1626152354.png', NULL, NULL, 'BD0010048', '5', '3', 2, 6, 2, '5', '3', 2, 6, '01201010101', 3, 'd@g.trfd', NULL, 'https://www.facebook.com/testtre', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'feds', 'HH', '01500000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 's', NULL, NULL, 'g', NULL, NULL, 'h', NULL, NULL, '1', 'sere', '0', NULL, '0', NULL, '0', NULL, '0', NULL, '1626152354.png', 102, NULL, NULL, 11, '2021-07-12 22:59:14', '2021-07-14 23:39:03', NULL),
(23, 'db check', '1940-07-13', 'abc', 1, 1, '4815023694', '7845124578', NULL, '1626154001.png', '1626154001.png', NULL, 'BD0010048', '3', '5', 2, 6, 5, '3', '5', 2, 6, '01201010101', 4, 'd@g.tr3', '150201042', 'https://www.facebook.com/testtre', 5, 'j', '0120145203125', '51', 'sada', 'sada', 'sd', 2000, '22', 'fsd', 'ds', 'sdfdyr', 'yu', '01500000069', '01574859632', 'esfr', 'dsf', '01469584712', '01305147852', 'dsf', 'dsfgd', NULL, '01501420365', 'sdf', '2021-03-01', '01515151515', 'd', '2021-07-01', '01402010321', 'f', '2021-07-14', '01514253615', '1', 'xhytr', '0', NULL, '1', 'tfrhyx', '0', NULL, '0', NULL, '1626154001.png', 102, NULL, NULL, 11, '2021-07-12 23:26:41', '2021-07-15 04:50:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `BANK_CODE` tinyint(4) NOT NULL,
  `BANK_NAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `BANK_CODE`, `BANK_NAME`) VALUES
(1, 15, 'AL-ARAFAH ISLAMI BANK LTD.'),
(2, 60, 'BRAC BANK LTD.'),
(3, 127, 'JANATA BANK LTD.'),
(4, 125, 'ISLAMI BANK BANGLDESH LTD.'),
(5, 127, 'NATIONAL BANK LTD.'),
(6, 127, 'SOCIAL ISLAMI BANK LTD'),
(7, 127, 'COMMUNITY BANK BANGLADESH LTD.'),
(8, 35, 'BANGLADESH KRISHI BANK'),
(9, 25, 'BANGLADESH BANK'),
(10, 80, 'COMMERCIAL BANK OF CYLON'),
(11, 105, 'FIRST SECURITY ISLAMI BANK LTD.'),
(12, 95, 'EASTERN BANK LTD.'),
(13, 127, 'NATIONAL CREDIT & COMMERCE BANK LTD.'),
(14, 127, 'RAJSHAHI KRISHI UNNAYAN BANK'),
(15, 127, 'PUBALI BANK LTD.'),
(16, 127, 'RUPALI BANK LTD.'),
(17, 127, 'STATE BANK OF INDIA'),
(18, 127, 'MIDLAND BANK LIMITED'),
(19, 110, 'HABIB BANK LTD.'),
(20, 127, 'ONE BANK LTD.'),
(21, 127, 'THE CITY BANK LTD.'),
(22, 127, 'NRB COMMERCIAL BANK LTD.'),
(23, 10, 'AGRANI BANK LTD.'),
(24, 65, 'BANK AL-FALAH LTD'),
(25, 127, 'UNITED COMMERCIAL BANK LTD.'),
(26, 127, 'NRB GLOBAL BANK LIMITED'),
(27, 30, 'BANGLADESH COMMERCE BANK LTD.'),
(28, 20, 'AB BANK LTD.'),
(29, 85, 'DHAKA BANK LTD.'),
(30, 90, 'DUTCH-BANGLA BANK LTD'),
(31, 127, 'JAMUNA BANK LTD.'),
(32, 127, 'MERCANTILE BANK LTD.'),
(33, 127, 'PRIME BANK LTD.'),
(34, 127, 'NATIONAL BANK OF PAKISTAN'),
(35, 127, 'SOUTHEAST BANK LTD.'),
(36, 127, 'STANDARD BANK LTD.'),
(37, 127, 'THE PREMIER BANK LTD.'),
(38, 127, 'UTTARA BANK LTD.'),
(39, 127, 'MEGHNA BANK LIMITED'),
(40, 75, 'CITI BANK N A'),
(41, 127, 'ICB ISLAMIC BANK LTD'),
(42, 127, 'WOORI BANK'),
(43, 127, 'SHIMANTO BANK LIMITED'),
(44, 40, 'BANGLADESH SAMABAYA BANK LTD.'),
(45, 47, 'BANGLADESH DEVELOPMENT BANK LTD.'),
(46, 55, 'BASIC BANK LTD.'),
(47, 100, 'EXIM BANK LTD.'),
(48, 127, 'MUTUAL TRUST BANK LTD.'),
(49, 127, 'SONALI BANK LTD.'),
(50, 127, 'TRUST BANK LTD.'),
(51, 127, 'STANDARD CHARTERED BANK'),
(52, 70, 'BANK ASIA LTD.'),
(53, 115, 'HONGKONG & SHANGHAI BANKING CORP.'),
(54, 120, 'IFIC BANK LTD.'),
(55, 127, 'SHAHJALAL ISLAMI BANK LTD.'),
(56, 127, 'PADMA BANK LIMITED'),
(57, 127, 'NRB BANK LIMITED'),
(58, 127, 'UNION BANK LTD.'),
(59, 127, 'SBAC BANK LIMITED'),
(60, 127, 'MODHUMOTI BANK LIMITED');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `BRANCH_ID` int(5) NOT NULL,
  `T24_BR` varchar(10) DEFAULT NULL,
  `BR_NAME` varchar(50) DEFAULT NULL,
  `ST_NAME` varchar(20) DEFAULT NULL,
  `BR_TYPE` int(1) DEFAULT NULL,
  `CLUSTER_ID` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`BRANCH_ID`, `T24_BR`, `BR_NAME`, `ST_NAME`, `BR_TYPE`, `CLUSTER_ID`) VALUES
(2, 'BD0010002', 'Gulshan Corporate Branch', 'GCB', 1, NULL),
(3, 'BD0010003', 'Kachua Branch', 'KCU', 1, 6),
(4, 'BD0010004', 'Motijheel Branch', 'MTJ', 1, 1),
(5, 'BD0010005', 'Bakshigonj Branch', 'BKJ', 1, 3),
(6, 'BD0010006', 'Bhulta Branch', 'BHL', 1, 1),
(7, 'BD0010007', 'Haluaghat Branch', 'HLG', 1, 3),
(8, 'BD0010008', 'Chinishpur Branch', 'CNS', 1, 2),
(9, 'BD0010009', 'Shyampur Branch', 'SAM', 1, 1),
(10, 'BD0010010', 'Chandpur Branch', 'CND', 1, 6),
(11, 'BD0010011', 'Polashbari Branch', 'PLS', 1, 2),
(12, 'BD0010012', 'Sreebardi Branch', 'SBD', 1, 3),
(13, 'BD0010013', 'Tarakanda Branch', 'TKD', 1, 3),
(14, 'BD0010014', 'Sherpur Branch', 'SPR', 1, 3),
(15, 'BD0010015', 'Joypara Branch', 'JOY', 1, 1),
(16, 'BD0010016', 'Patuakhali Branch', 'PKL', 1, 5),
(17, 'BD0010017', 'Imamgonj Branch', 'IMJ', 1, 1),
(18, 'BD0010018', 'Aganagar Branch', 'AGR', 1, 1),
(19, 'BD0010019', 'Dumki Branch', 'DMK', 1, 5),
(20, 'BD0010020', 'Jamalpur Branch', 'JML', 1, 3),
(21, 'BD0010021', 'Nalitabari Branch', 'NLT', 1, 3),
(22, 'BD0010022', 'Bogra Branch', 'BOG', 1, 5),
(23, 'BD0010023', 'Khatungonj Branch', 'LGR', 1, 4),
(24, 'BD0010024', 'Lohagara Branch', 'KTG', 1, 4),
(25, 'BD0010025', 'Mawna Branch', 'MAW', 1, 2),
(26, 'BD0010026', 'Kamrangirchor Branch', 'KCR', 1, 1),
(27, 'BD0010027', 'Rahimanagar Branch', 'RGR', 1, 6),
(28, 'BD0010028', 'Siddhirgonj Branch', 'SDG', 1, 1),
(29, 'BD0010029', 'Gridkalindiya Branch', 'GKD', 1, 6),
(30, 'BD0010030', 'Mymensingh Branch', 'MYN', 1, 3),
(31, 'BD0010031', 'Netrokona Branch', 'NTK', 1, 3),
(32, 'BD0010032', 'Keranihat Branch', 'KHT', 1, 4),
(33, 'BD0010033', 'Hazigonj Branch', 'HAJ', 1, 6),
(34, 'BD0010034', 'Kalashkathi Branch', 'KLS', 1, 5),
(35, 'BD0010035', 'Khulna Branch', 'KLN', 1, 5),
(36, 'BD0010036', 'Chandnighat Branch', 'CGT', 1, 4),
(37, 'BD0010037', 'Goalabazar Branch', 'GBR', 1, 4),
(38, 'BD0010038', 'Gopalgonj Branch', 'GPL', 1, 5),
(39, 'BD0010039', 'Mirpur Branch', 'MIR', 1, 2),
(40, 'BD0010040', 'Subidkhali Branch', 'SKL', 1, 5),
(41, 'BD0010041', 'Brahmanbaria Branch', 'BBR', 1, 4),
(42, 'BD0010042', 'Naogaon Branch', 'NAG', 1, 5),
(43, 'BD0010043', 'Narayanpur Branch', 'NPR', 1, 6),
(44, 'BD0010044', 'Cumilla Branch', 'COM', 1, 6),
(45, 'BD0010001', 'Human Resources Division', 'HRD', 2, NULL),
(46, 'BD0010001', 'Information Technology Division', 'ITD', 2, NULL),
(47, 'BD0010001', 'International Division', 'ID', 2, NULL),
(48, 'BD0010001', 'Treasury Division', 'TRD', 2, NULL),
(49, 'BD0010001', 'Financial Administration Division', 'FAD', 2, NULL),
(50, 'BD0010001', 'Banking Operation Division', 'BOD', 2, NULL),
(51, 'BD0010001', 'Office of Chairman', 'OC', 2, NULL),
(52, 'BD0010001', 'Internal Control & Compliance Division', 'ICCD', 2, NULL),
(53, 'BD0010001', 'Board Secretariat', 'BS', 2, NULL),
(54, 'BD0010001', 'Office of MD & CEO', 'MDS', 2, NULL),
(55, 'BD0010001', 'Research & Planning Division', 'REPLD', 2, NULL),
(56, 'BD0010001', 'Law & Recovery Department', 'LRD', 2, NULL),
(57, 'BD0010001', 'Risk Management Division', 'RMD', 2, NULL),
(58, 'BD0010001', 'Credit Admin, Monitoring & Recovery Division', 'CAMRCD', 2, NULL),
(59, 'BD0010001', 'SME, Agri & Rural Banking Division', 'SME', 2, NULL),
(60, 'BD0010001', 'Corporate Banking Division', 'CBD', 2, NULL),
(61, 'BD0010001', 'Credit Risk Management Division', 'CRMD', 2, NULL),
(62, 'BD0010001', 'Retail Banking Division', '', 2, NULL),
(63, 'BD0010001', 'General Services Division', 'GSD', 2, NULL),
(64, 'BD0010001', 'Marketing Division', '', 2, NULL),
(65, 'BD0010001', 'Business Team', '', 2, NULL),
(66, 'BD0010001', 'Office of MD & CEO (CC)', 'OAMD', 2, NULL),
(67, 'BD0010001', 'Recovery Team', 'RT', 2, NULL),
(68, 'BD0010050', 'Bibir Bazar Branch', 'BIB', 1, 6),
(69, 'BD0010051', 'Dhanmondi Branch', 'DHN', 1, 1),
(70, 'BD0010056', 'Tangail Branch', 'TNG', 1, 3),
(71, 'BD0010045', 'Jhenaigati Branch', 'JNG', 1, 3),
(72, 'BD0010046', 'Kalmakanda Branch', 'KND', 1, 3),
(73, 'BD0010001', 'Head Office', 'BNK', 1, NULL),
(75, 'BD0010047', 'Gulshan South Avenue Branch', 'GSA', 1, 2),
(76, 'BD0010048', 'Nilphamari Branch', 'NIL', 1, 5),
(77, 'BD0010049', 'Sujatpur Bazar Branch', 'SJT', 1, 6),
(78, 'BD0010057', 'Kakrail Branch', 'KAK', 1, 1),
(79, 'BD0010052', 'Islampur Branch', 'ISP', 1, 3),
(80, 'BD0010053', 'Shyamgonj Kalibari Bazar Branch', 'SMJ', 1, 3),
(81, 'BD0010054', 'Bashundhara Branch', 'BSN', 1, 2),
(82, 'BD0010055', 'Uttara Branch', 'UTT', 1, 2),
(83, 'BD0010058', 'Kazi Nazrul Islam Avenue Branch', 'KNI', 1, 1),
(84, 'BD0010059', 'Pragati Sarani Branch', 'PSB', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cluster`
--

CREATE TABLE `cluster` (
  `id` int(11) NOT NULL,
  `cluster_name` varchar(50) DEFAULT NULL,
  `br_id` varchar(200) DEFAULT NULL,
  `cluster_head_id` varchar(15) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `create_date` datetime DEFAULT current_timestamp(),
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cluster`
--

INSERT INTO `cluster` (`id`, `cluster_name`, `br_id`, `cluster_head_id`, `status`, `create_date`, `update_date`) VALUES
(1, 'Dhaka South', '\'BD0010018\',\'BD0010017\',\'BD0010015\', \'BD0010051\', \'BD0010004\', \'BD0010006\', \'BD0010057\', \'BD0010028\', \'BD0010026\', \'BD0010058\', \'BD0010009\'', '20190701001', 1, '2021-06-09 11:08:47', NULL),
(2, 'Dhaka North', 'BD0010054,BD0010047,BD0010039,BD0010011,BD0010059,BD0010055,BD0010025,BD0010008', '20150524001', 1, '2021-06-09 11:08:59', NULL),
(3, 'Mymensingh', 'BD0010046,BD0010031,BD0010005,BD0010052,BD0010020,BD0010053,BD0010007,BD0010045,BD0010021,BD0010014,BD0010012,BD0010056,BD0010030,BD0010013\r\n', '20170301004', 1, '2021-06-09 11:09:19', NULL),
(4, 'Chattogram', 'BD0010036,BD0010037,BD0010041,BD0010032,BD0010024,BD0010023', '20190429001', 1, '2021-06-09 11:09:39', NULL),
(5, 'Khulna', 'BD0010034,BD0010019,BD0010016,BD0010040,BD0010048,BD0010042,BD0010022,BD0010035,BD0010038', '20201231002', 1, '2021-06-09 11:09:51', NULL),
(6, 'Cumilla', 'BD0010010,BD0010033,BD0010003,BD0010049,BD0010043,BD0010027,BD0010029,BD0010050,BD0010044', '20161211001', 1, '2021-06-09 11:10:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `DIVISION_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`ID`, `NAME`, `DIVISION_ID`) VALUES
(1, 'Dhaka', 1),
(2, 'Gazipur', 1),
(3, 'Kishoreganj', 1),
(4, 'Manikganj', 1),
(5, 'Chittagong', 2),
(6, 'Rangamati', 2),
(7, 'Coxs Bazar', 2);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`ID`, `NAME`) VALUES
(1, 'Dhaka'),
(2, 'Chittagong'),
(3, 'Barisal'),
(4, 'Khulna'),
(5, 'Rajshahi'),
(6, 'Sylhet'),
(7, 'Rangpur'),
(8, 'Mymensingh');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forward_logs`
--

CREATE TABLE `forward_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `forward_from` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forward_to` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forward_logs`
--

INSERT INTO `forward_logs` (`id`, `application_id`, `forward_from`, `forward_to`, `remarks`, `updated_by`, `level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 'BD0010003', '6', 'forward to cluster head', NULL, NULL, '2021-06-23 03:08:55', '2021-06-23 03:08:55', NULL),
(2, 5, 'BD0010003', '6', 'Forward to Cluster Head', NULL, NULL, '2021-06-23 03:17:04', '2021-06-23 03:17:04', NULL),
(3, 6, '6', '100', 'Forward to Head Office', NULL, NULL, '2021-06-23 05:09:32', '2021-06-23 05:09:32', NULL),
(4, 6, 'HO', 'BR', 'This Application is accepted and has been sent to Branch.', NULL, NULL, '2021-06-24 00:04:46', '2021-06-24 00:04:46', NULL),
(5, 5, '6', '100', 'Forward to Head office', NULL, NULL, '2021-06-24 00:43:46', '2021-06-24 00:43:46', NULL),
(6, 5, 'HO', 'BR', 'This application is not fully filled', NULL, NULL, '2021-06-24 00:44:45', '2021-06-24 00:44:45', NULL),
(7, 3, 'BD0010003', '6', 'Forwarding to Cluster Manager', NULL, NULL, '2021-06-24 02:00:12', '2021-06-24 02:00:12', NULL),
(8, 3, '6', '100', 'Forward to Head Office', NULL, NULL, '2021-06-24 02:00:56', '2021-06-24 02:00:56', NULL),
(9, 3, 'HO', 'BR', 'Accepted and Forwarded to branch', NULL, NULL, '2021-06-24 02:12:19', '2021-06-24 02:12:19', NULL),
(10, 7, 'BD0010003', '6', 'Karim Benjama is a good guy. Please accept his credentials.\r\n\r\nThanks and regards,\r\nBranch Manager\r\nKachua Branch', NULL, NULL, '2021-06-24 05:27:59', '2021-06-24 05:27:59', NULL),
(11, 7, '6', '100', 'Forward to Head Office', NULL, NULL, '2021-06-24 05:39:11', '2021-06-24 05:39:11', NULL),
(12, 7, 'HO', 'BR', 'Accepted and send to Branch', NULL, NULL, '2021-06-24 05:40:19', '2021-06-24 05:40:19', NULL),
(13, 10, 'BD0010048', '5', 'for', 11, 1, '2021-07-06 03:35:13', '2021-07-06 03:35:13', NULL),
(14, 10, '5', '100', 'to ho', 12, 2, '2021-07-06 03:35:59', '2021-07-06 03:35:59', NULL),
(15, 16, 'BD0010048', '5', 'Forwarded by nil branch. please look into the matter', 11, 1, '2021-07-06 23:56:41', '2021-07-06 23:56:41', NULL),
(16, 16, '5', '100', 'Forwarded by khulna branch. please look into the matter...', 12, 2, '2021-07-07 00:20:28', '2021-07-07 00:20:28', NULL),
(17, 14, 'BD0010035', '5', 'look into the matter....forwarding', 12, 1, '2021-07-07 00:46:34', '2021-07-07 00:46:34', NULL),
(18, 14, '5', '100', 'look into the matter....forwarding', 12, 2, '2021-07-07 00:46:34', '2021-07-07 00:46:34', NULL),
(19, 17, 'BD0010048', '5', 'from nil to khl...ok', 11, 1, '2021-07-07 00:52:01', '2021-07-07 00:52:01', NULL),
(20, 17, '5', '100', 'from khl to ho...ok', 12, 2, '2021-07-07 00:52:44', '2021-07-07 00:52:44', NULL),
(21, 16, 'HO', 'BR', 'Glad to accept', 4, 3, '2021-07-07 02:59:29', '2021-07-07 02:59:29', NULL),
(22, 11, 'BD0010003', '6', 'Forward to Cluster from Kachua Branch (test remarks)', 5, 1, '2021-07-07 03:26:32', '2021-07-07 03:26:32', NULL),
(23, 11, '6', '100', 'Forward To Head Office (Test Remarks 2)', 6, 2, '2021-07-07 03:35:40', '2021-07-07 03:35:40', NULL),
(24, 11, 'HO', 'BR', 'Forward to Kachua Branch (Test Remarks 3)', 4, 3, '2021-07-07 03:36:54', '2021-07-07 03:36:54', NULL),
(25, 18, 'BD0010048', '5', 'Branch Nil to Cluster Khulna (Remarks test 1)', 11, 1, '2021-07-07 03:42:01', '2021-07-07 03:42:01', NULL),
(26, 18, '5', '100', 'Cluster Khulna to Head Office (Remarks Test 2)', 12, 2, '2021-07-07 03:43:00', '2021-07-07 03:43:00', NULL),
(27, 18, 'HO', 'BR', 'HO to Branch Nil (Remarks test 3)', 4, 3, '2021-07-07 03:44:00', '2021-07-07 03:44:00', NULL),
(28, 19, 'BD0010048', '5', 'ok', 11, 1, '2021-07-14 00:53:58', '2021-07-14 00:53:58', NULL),
(29, 21, 'BD0010048', '5', 'ok', 11, 1, '2021-07-14 00:53:58', '2021-07-14 00:53:58', NULL),
(30, 20, 'BD0010048', '5', 'fhsfh', 11, 1, '2021-07-14 03:33:13', '2021-07-14 03:33:13', NULL),
(31, 22, 'BD0010048', '5', 'Not OK', 11, 1, '2021-07-14 23:39:03', '2021-07-14 23:39:03', NULL),
(32, 23, 'BD0010048', '5', 'rejected', 11, 1, '2021-07-15 04:50:32', '2021-07-15 04:50:32', NULL),
(33, 19, '5', '100', 'ok', 12, 2, '2021-07-15 05:00:38', '2021-07-15 05:00:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_15_103551_create_applications_table', 2),
(5, '2021_06_17_064247_create_users_table', 3),
(6, '2021_06_17_065937_create_users_table', 4),
(7, '2021_06_20_050738_create_roles_table', 5),
(8, '2021_06_20_055211_create_roles_table', 6),
(9, '2021_06_23_063349_create_forward_logs_table', 7),
(10, '2021_06_23_082016_create_forward_logs_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_short_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_role_id` int(11) DEFAULT NULL,
  `user_by` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `role_short_name`, `parent_role_id`, `user_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'RM', 'rm', 3, 3, 1, '2021-06-20 00:40:49', '2021-06-22 00:59:23', NULL),
(2, 'HO', 'ho', NULL, 3, 1, '2021-06-20 00:41:31', '2021-06-22 01:00:22', NULL),
(3, 'BR', 'br', 4, 3, 1, '2021-06-20 00:42:30', '2021-06-22 00:59:58', NULL),
(4, 'Cluster Manager', 'cm', 2, 3, 1, '2021-06-20 01:24:32', '2021-06-22 01:02:12', NULL),
(5, 'Admin', 'admin', NULL, 3, 1, '2021-06-20 04:53:28', '2021-06-22 01:00:48', NULL),
(6, 'Marketing Associate', 'assc', NULL, 3, 1, '2021-06-20 04:53:59', '2021-06-24 00:53:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `role_id`, `image`, `employee_id`, `branch_id`, `parent_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'JOBAYED ULLAH', 'shuvo.pma@gmail.com', '23245247676', NULL, '$2y$10$sFl73FW1OU0ZW/uSt7.n4uil6L8FuuRO1h69PWR4ZCRQtvZTAy2sy', NULL, 5, '1623927771.jpg', '23245247676', 'BD0010003', NULL, 1, '2021-06-17 05:02:51', '2021-06-23 00:59:14', NULL),
(4, 'Jobayer Ahmed', 'zia@sme.com', '123456789', NULL, '$2y$10$8CATqVPqjaK12AXqk5/n4e4Pt/nyfmAn2yETuwW6PCWuza5QKwgle', NULL, 2, '1624176604.jpeg', '123456789', 'BD0010003', NULL, 1, '2021-06-20 02:10:04', '2021-06-23 01:06:14', NULL),
(5, 'Abdul Malek', 'office.jobayed@gmail.com', '64364667', NULL, '$2y$10$OAgfuU6hlHIB.Ob9qZSFZ.jqSXCEdbodP9uTgOW4USsINihEUlsFq', NULL, 3, '1624340213.jpeg', '64364667', 'BD0010003', NULL, 1, '2021-06-21 23:36:54', '2021-06-24 03:27:29', NULL),
(6, 'Rashed', 'jobayed.ullah@padmabankbd.com', '365338957', NULL, '$2y$10$J7eoySGPakcRPH0DGrsbN.1pOPSce2VcjgOEXdeg3nxmJS0IVzoz2', NULL, 4, '1624440875.jpg', '365338957', 'BD0010003', NULL, 1, '2021-06-23 03:34:35', '2021-06-23 03:34:35', NULL),
(8, 'Jobayer Ahmed', 'jobayer.ahmed@padmabankbd.com', '011216666', NULL, '$2y$10$ZambfeOkDkZnquIsEv1SDeVcLJBGGiFGd03NuYt1dGEOuzIIHVQsO', NULL, 6, 'jobayer.jpg', '011216666', 'BD0010003', NULL, 1, '2021-06-24 02:12:19', '2021-06-24 02:15:57', NULL),
(9, 'RM User', 'kamal@gmail.com', '12341234', NULL, '$2y$10$NsNLft00ih9ZBb9BIoVDR.yVyh48yHA94ginaCE5.Up776.xc8SXi', NULL, 1, '1624530494.jpeg', '12341234', 'BD0010003', NULL, 1, '2021-06-24 04:25:53', '2021-06-24 04:28:14', NULL),
(10, 'Karim Benjama', 'abcdef@gmail.com', 'abcdef@gmail.com', NULL, '$2y$10$47vSPNJbH.rlkKhq.SyG5.zHocQuBvL5wbsqS6jsKpxvnYH3E7j0i', NULL, 6, '1624533986.jpg', ' ', 'BD0010003', NULL, 1, '2021-06-24 05:40:19', '2021-06-24 05:40:19', NULL),
(11, 'bm nilphamari', 'd@g.tr', '2019010101', NULL, '$2y$10$ngADXOLq9vCRfE/6NcIx1OgyE0izAuq.3dJb8RcKRFsp5plRYhP.K', NULL, 3, '1626171406.png', '2019010101', 'BD0010048', NULL, 1, '2021-07-06 01:01:09', '2021-07-13 04:16:46', NULL),
(12, 'cl bm khulna', 'd@kg.tr', '20201231002', NULL, '$2y$10$DQfVcGyHZIh1UUfVWCWqBeIssqz25kiQghjmNZ2d4reKe6a7fbK7W', NULL, 4, 'placeholder.png', '20201231002', 'BD0010035', NULL, 1, '2021-07-06 01:18:11', '2021-07-06 02:34:07', NULL),
(13, 'app nilphamari', 'nabila.alam@padmabankbd.com', 'nabila.alam@padmabankbd.com', NULL, '$2y$10$lDFfdjcQMRnT1mIag1ubGex2Jd7LtiYW.gpBteGtPTYSb3CfnjSe6', NULL, 6, '1625633787.png', ' ', 'BD0010048', NULL, 1, '2021-07-07 02:59:29', '2021-07-07 02:59:29', NULL),
(14, 'Image Upload Test', 'abc@gmail.com', 'abc@gmail.com', NULL, '$2y$10$Cf1uEuvDdzKX0JcQnOwIr.eMCEdVeKA/66EakQMMDAduIa0TLvH3W', NULL, 6, '1625466271.png', ' ', 'BD0010003', NULL, 1, '2021-07-07 03:36:54', '2021-07-07 03:36:54', NULL),
(15, 'yy', '3@g.h4', '3@g.h4', NULL, '$2y$10$sSKJVbpvHjNBukcjdo6QDujCJpeG9D5h//evhrChFufZ5YUxl7vZO', NULL, 6, '1625650768.png', ' ', 'BD0010048', NULL, 1, '2021-07-07 03:44:00', '2021-07-07 03:44:00', NULL),
(16, 'test RM', '3@g.hl', '1010203010', NULL, '$2y$10$Wdn23eR4EQvKB0mID/bjiOjrVL/D8qjY0AXM/o1o.fSmUsiK9VRpG', NULL, 1, '1625721603.png', '1010203010', 'BD0010048', NULL, 1, '2021-07-07 23:20:03', '2021-07-07 23:20:03', NULL),
(17, 'test2 rm', '3@g.hsde', '15151515', NULL, '$2y$10$gHtPG8NDDq2Sbb8sFcTd6udkS2HBWB4eC.CK0A23NZneXO7Bw0zsW', NULL, 1, '1625721746.png', '15151515', 'BD0010007', NULL, 1, '2021-07-07 23:22:26', '2021-07-07 23:22:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`BRANCH_ID`);

--
-- Indexes for table `cluster`
--
ALTER TABLE `cluster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forward_logs`
--
ALTER TABLE `forward_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `BRANCH_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `cluster`
--
ALTER TABLE `cluster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forward_logs`
--
ALTER TABLE `forward_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
