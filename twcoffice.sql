-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2020 at 06:37 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twcoffice`
--

-- --------------------------------------------------------

--
-- Table structure for table `bsoft_activities`
--

CREATE TABLE `bsoft_activities` (
  `activity_id` bigint(20) UNSIGNED NOT NULL,
  `activity_of_user_id` bigint(20) UNSIGNED NOT NULL,
  `activity_note` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_for_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `activity_project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `activity_shift_id` bigint(20) UNSIGNED DEFAULT NULL,
  `activity_attendance_id` bigint(20) UNSIGNED DEFAULT NULL,
  `activity_item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `activity_item_log_id` bigint(20) UNSIGNED DEFAULT NULL,
  `activity_payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `activity_option_id` bigint(20) UNSIGNED DEFAULT NULL,
  `activity_bank_id` bigint(20) UNSIGNED DEFAULT NULL,
  `activity_invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `activity_loan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bsoft_activities`
--

INSERT INTO `bsoft_activities` (`activity_id`, `activity_of_user_id`, `activity_note`, `activity_for_user_id`, `activity_project_id`, `activity_shift_id`, `activity_attendance_id`, `activity_item_id`, `activity_item_log_id`, `activity_payment_id`, `activity_option_id`, `activity_bank_id`, `activity_invoice_id`, `activity_loan_id`, `created_at`) VALUES
(410, 61, 'Profile Updated', 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 21:55:57'),
(411, 61, 'Client Created', 62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:12:58'),
(412, 61, 'Project Created', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:12:58'),
(413, 61, 'Client Updated', 62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:18:43'),
(414, 61, 'Client Updated', 62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:19:35'),
(415, 61, 'Client Updated', 62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:21:26'),
(416, 61, 'Administrator Created', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:33:27'),
(417, 61, 'Shift added to the Project', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:34:24'),
(418, 61, 'Shift added to the Project', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:34:24'),
(419, 61, 'Shift added to the Project', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:55:13'),
(420, 61, 'Shift added to the Project', NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:55:13'),
(421, 61, 'Shift added to the Project', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:55:55'),
(422, 61, 'Shift added to the Project', NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:55:55'),
(423, 61, 'Shift added to the Project', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:56:43'),
(424, 61, 'Shift added to the Project', NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:56:43'),
(425, 61, 'Shift added to the Project', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:57:24'),
(426, 61, 'Shift added to the Project', NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:57:24'),
(427, 61, 'Shift added to the Project', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:58:42'),
(428, 61, 'Shift added to the Project', NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:58:43'),
(429, 61, 'Shift added to the Project', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:59:17'),
(430, 61, 'Shift added to the Project', NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-22 22:59:17'),
(431, 61, 'Project Assigned', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-23 00:59:27'),
(432, 61, 'Project Assigned', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-23 00:59:27'),
(433, 63, 'Staff Created', 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-23 05:34:50'),
(434, 63, 'Project Assigned', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-23 05:34:50'),
(435, 63, 'Project Assigned', 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-23 05:34:50'),
(436, 63, 'Worker Payment Successful!', NULL, NULL, NULL, NULL, NULL, NULL, 21, NULL, NULL, NULL, NULL, '2020-03-23 05:37:01'),
(437, 65, 'Administrator Updated', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-23 05:44:18'),
(438, 61, 'Administrator Created', 66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-28 03:41:50'),
(439, 61, 'Administrator Updated', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-17 13:30:12'),
(440, 61, 'Administrator Updated', 66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 15:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `bsoft_attendances`
--

CREATE TABLE `bsoft_attendances` (
  `attendance_id` bigint(20) UNSIGNED NOT NULL,
  `attendance_user_id` bigint(20) UNSIGNED NOT NULL,
  `attendance_project_id` bigint(20) UNSIGNED NOT NULL,
  `attendance_shift_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attendance_date` date NOT NULL,
  `attendance_payable_amount` double(15,2) NOT NULL,
  `attendance_paid_amount` double(15,2) DEFAULT NULL,
  `attendance_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bsoft_bank_accounts`
--

CREATE TABLE `bsoft_bank_accounts` (
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `bank_account_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bank_balance` double(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bsoft_invoices`
--

CREATE TABLE `bsoft_invoices` (
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_item_log` bigint(20) UNSIGNED NOT NULL,
  `invoice_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_address_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_address_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bsoft_items`
--

CREATE TABLE `bsoft_items` (
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_reusable` tinyint(1) NOT NULL DEFAULT 0,
  `item_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_price` float DEFAULT NULL,
  `item_price_final` float DEFAULT NULL,
  `final_price_up` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bsoft_item_logs`
--

CREATE TABLE `bsoft_item_logs` (
  `il_id` bigint(20) UNSIGNED NOT NULL,
  `il_item_id` bigint(20) UNSIGNED NOT NULL,
  `il_vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `il_project_from` bigint(20) UNSIGNED DEFAULT NULL,
  `il_project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `il_quantity` double(15,2) NOT NULL,
  `il_cost` double(15,2) NOT NULL DEFAULT 0.00,
  `il_paid_amount` double(15,2) NOT NULL DEFAULT 0.00,
  `il_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `il_per_cost` double(15,2) NOT NULL DEFAULT 0.00,
  `final_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bsoft_loans`
--

CREATE TABLE `bsoft_loans` (
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `loan_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_amount` double(15,2) NOT NULL,
  `loan_paid` double(15,2) NOT NULL DEFAULT 0.00,
  `loan_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bsoft_options`
--

CREATE TABLE `bsoft_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bsoft_options`
--

INSERT INTO `bsoft_options` (`option_id`, `option_name`, `option_content`) VALUES
(8, 'company_name', 'THE WORLD CONSTRUCTION'),
(9, 'company_cash', '0'),
(10, 'company_address', 'House: 423/Kha Road: 02 \r\nBaitul Aman Housing society  \r\nAdabor Dhaka - 1207'),
(11, 'company_phone', '01711994004'),
(12, 'background_image', 'Background/10_1568042084_20180729_190717.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `bsoft_password_resets`
--

CREATE TABLE `bsoft_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bsoft_payments`
--

CREATE TABLE `bsoft_payments` (
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_to_user` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_from_user` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_to_bank_account` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_from_bank_account` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_for_project` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_purpose` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash',
  `payment_amount` double(15,2) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_withdrawn` tinyint(1) NOT NULL DEFAULT 0,
  `payment_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bsoft_projects`
--

CREATE TABLE `bsoft_projects` (
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `project_price` double(15,2) NOT NULL,
  `project_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bsoft_projects`
--

INSERT INTO `bsoft_projects` (`project_id`, `project_name`, `project_location`, `project_client_id`, `project_price`, `project_status`, `project_description`, `project_image`, `created_at`, `updated_at`) VALUES
(4, 'Followars Quater', 'Sheak Hasina Cantonment, Labukhali, Potuakhali.', 62, 16000000.00, 'active', '14 Story residential  building 8 unit', NULL, '2020-03-22 22:12:58', '2020-03-22 22:12:58');

-- --------------------------------------------------------

--
-- Table structure for table `bsoft_project_logs`
--

CREATE TABLE `bsoft_project_logs` (
  `pl_id` bigint(20) UNSIGNED NOT NULL,
  `pl_user_id` bigint(20) UNSIGNED NOT NULL,
  `pl_project_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bsoft_project_logs`
--

INSERT INTO `bsoft_project_logs` (`pl_id`, `pl_user_id`, `pl_project_id`, `created_at`, `updated_at`) VALUES
(55, 63, 4, '2020-03-23 00:59:27', '2020-03-23 00:59:27'),
(56, 64, 4, '2020-03-23 05:34:50', '2020-03-23 05:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `bsoft_roles`
--

CREATE TABLE `bsoft_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_slug` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bsoft_roles`
--

INSERT INTO `bsoft_roles` (`role_id`, `role_name`, `role_slug`) VALUES
(27, 'Administrator', 'administrator'),
(28, 'Manager', 'manager'),
(29, 'Project Manager', 'project_manager'),
(30, 'Accountant', 'accountant'),
(31, 'Client', 'client'),
(32, 'Supplier', 'supplier'),
(33, 'Engineer', 'engineer'),
(34, 'Machine', 'machine'),
(35, 'Labour', 'labour'),
(36, 'Helper', 'helper');

-- --------------------------------------------------------

--
-- Table structure for table `bsoft_users`
--

CREATE TABLE `bsoft_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fathers_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `can_login` tinyint(1) NOT NULL DEFAULT 0,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double(10,2) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bsoft_users`
--

INSERT INTO `bsoft_users` (`id`, `role_id`, `name`, `fathers_name`, `email`, `username`, `mobile`, `phone`, `address`, `email_verified_at`, `password`, `image`, `can_login`, `section`, `salary`, `remember_token`, `note`, `created_at`, `updated_at`, `status`) VALUES
(61, 27, 'Md Yasir Arafat', NULL, 'hellomstq@gmail.com', NULL, '1711994004', NULL, NULL, NULL, '$2y$12$uuzyJlO.bo8Lm56iX5usMunk5Z0IMbBSoauwNu4CS5v712ebGIUES', 'Administrators/10_1567012712_Arafat.jpg', 0, NULL, NULL, NULL, NULL, NULL, '2020-03-22 21:55:57', 1),
(62, 31, 'Abul Kalam Azad', NULL, 'taufiqgp@gmail.com', NULL, '1740555855', NULL, 'Pouroshova Moi, Potuakhali Sadar, Potualhali.', NULL, NULL, 'Clients/61_1584915679_Screenshot_2020-03-23_at_4.17.07_AM.jpg', 0, NULL, NULL, NULL, NULL, '2020-03-22 22:12:57', '2020-03-22 22:21:26', 1),
(63, 28, 'Md Ali Hossain', NULL, 'ali@twcinfobd.com', NULL, '1753130270', NULL, 'Amtoli Barguna', NULL, '$2y$12$uuzyJlO.bo8Lm56iX5usMunk5Z0IMbBSoauwNu4CS5v712ebGIUES', 'Administrators/55_1567008581_25626959_415490502198497_184210561253322696_o.jpg', 0, NULL, NULL, NULL, NULL, '2020-03-22 22:33:27', '2020-05-17 13:30:12', 1),
(64, 29, 'Md. Yasir arafat', 'Md Abdul  Hannan', NULL, NULL, '1919796999', NULL, 'House - 423/Kha (2nd Floor), Road No. 02\r\nBaitul Aman Housing Society\r\nAdabor', NULL, NULL, NULL, 0, 'Admin', 1500.00, NULL, NULL, '2020-03-23 05:34:50', '2020-06-15 08:16:12', 1),
(65, 27, 'Admin', NULL, 'admin@bdsoftit.com', NULL, NULL, NULL, NULL, NULL, '$2y$12$auPxTbeQ9zwWTl5NkI1TWuZGmQtpJC9HBdz5C2LlMEvmZ4epbeLFu', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(66, 27, 'BD Soft it', NULL, 'support@bdsoftit.com', NULL, '1911343443', NULL, 'lalmatia dhaka', NULL, '$2y$10$F0cioFrzQqFSFDdxBc9DN.SgPmA0Z5xHUTlog1PZGgxQtVSLAm9/i', NULL, 0, NULL, NULL, NULL, NULL, '2020-03-28 03:41:50', '2020-06-13 15:10:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bsoft_working_shifts`
--

CREATE TABLE `bsoft_working_shifts` (
  `shift_id` bigint(20) UNSIGNED NOT NULL,
  `shift_project_id` bigint(20) UNSIGNED NOT NULL,
  `shift_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shift_start` time NOT NULL,
  `shift_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bsoft_working_shifts`
--

INSERT INTO `bsoft_working_shifts` (`shift_id`, `shift_project_id`, `shift_name`, `shift_start`, `shift_end`) VALUES
(6, 4, '1st Shift', '08:00:00', '13:00:00'),
(7, 4, '2nd Shift', '14:00:00', '18:00:00'),
(8, 4, '3rd Shift', '18:00:00', '22:00:00'),
(9, 4, '4th Shift', '22:00:00', '01:00:00'),
(10, 4, '5th (Cont)', '01:00:00', '04:00:00'),
(11, 4, '6th (Cont)', '04:00:00', '08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mother_category_id` bigint(20) NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `mother_category_id`, `category_name`, `active`, `created_at`, `updated_at`) VALUES
(53, 16, 'Reinforcement', 1, '2020-03-22 23:19:16', '2020-03-22 23:19:16'),
(54, 16, 'Cement', 1, '2020-03-22 23:19:34', '2020-03-22 23:19:34'),
(55, 16, 'Stone', 1, '2020-03-22 23:19:54', '2020-03-22 23:19:54'),
(56, 16, 'Briks', 1, '2020-03-22 23:20:13', '2020-03-22 23:20:13'),
(57, 16, 'Sand', 1, '2020-03-22 23:20:29', '2020-03-22 23:20:29'),
(58, 17, 'Column shutter', 1, '2020-03-22 23:21:12', '2020-03-22 23:21:12'),
(59, 17, 'Beam Shutter', 1, '2020-03-22 23:21:54', '2020-03-22 23:21:54'),
(60, 17, 'Props', 1, '2020-03-22 23:22:06', '2020-03-22 23:22:06'),
(61, 17, 'hollow Box', 1, '2020-03-22 23:22:24', '2020-03-22 23:22:24'),
(62, 17, 'MS Sheet', 1, '2020-03-22 23:22:36', '2020-03-22 23:22:36'),
(63, 19, 'Lifting Equipment', 1, '2020-03-22 23:23:21', '2020-03-22 23:23:21'),
(64, 19, 'Casting Equipments', 1, '2020-03-22 23:24:14', '2020-03-22 23:27:44'),
(65, 19, 'Dewatering Machine', 1, '2020-03-22 23:24:59', '2020-03-22 23:24:59'),
(66, 19, 'Rebar Fabrication M/C', 1, '2020-03-22 23:25:43', '2020-03-22 23:25:43'),
(67, 20, 'Cutting Tools', 1, '2020-03-22 23:28:49', '2020-03-22 23:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_managements`
--

CREATE TABLE `inventory_managements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mother_category_id` bigint(20) NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `sub_category_id` bigint(20) DEFAULT NULL,
  `manufacture_id` bigint(20) DEFAULT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` double(15,2) NOT NULL,
  `item_reusable` tinyint(1) NOT NULL DEFAULT 0,
  `item_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_managements`
--

INSERT INTO `inventory_managements` (`id`, `mother_category_id`, `category_id`, `sub_category_id`, `manufacture_id`, `item_name`, `item_unit`, `item_price`, `item_reusable`, `item_image`, `created_at`, `updated_at`, `item_description`, `item_type`) VALUES
(15, 17, 60, 42, 8, 'MS Pipe for Slab', 'Pcs', 610.00, 1, NULL, '2020-03-23 01:01:58', '2020-03-23 01:01:58', 'Length 8.50 ft to 11.50 ft', 'Vertical Support'),
(16, 19, 63, NULL, 9, 'Tower Hoist', 'Nos', 740000.00, 1, NULL, '2020-03-29 19:06:02', '2020-03-29 19:06:02', 'Capacity up to 16 floor', 'Heavy Machine'),
(17, 19, 63, NULL, 9, 'Roof Hoist', 'Nos', 180000.00, 1, './images/items/20200330010958-1585508998-Construction Winch Hoist.jpg', '2020-03-29 19:09:58', '2020-03-29 19:09:58', 'Capacity up to 16 floor', 'Electric 440 KW'),
(18, 19, 64, NULL, 9, 'Concrete Mixer Machine', 'Nos', 85000.00, 1, './images/items/20200330011314-1585509194-concrete-mixer-machine.jpg', '2020-03-29 19:13:14', '2020-03-29 19:13:14', 'Movable', 'Manuel (Diesel Engine)'),
(19, 19, 64, NULL, NULL, 'Vibrator', 'Nos', 8000.00, 1, './images/items/20200330012153-1585509713-003213437771.jpg', '2020-03-29 19:21:53', '2020-03-29 19:21:53', '3 HP Motor', 'Electric'),
(20, 19, NULL, NULL, NULL, 'YEPPE', 'KG', 500.00, 1, NULL, '2020-06-19 06:58:52', '2020-06-19 06:59:48', 'dnfsdjfsdjf', 'skdjf');

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(8, 'TWC', 1, '2020-03-23 00:55:43', '2020-03-23 00:55:43'),
(9, 'Hawladar Engineering', 1, '2020-03-29 18:33:15', '2020-03-29 18:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_07_17_105640_create_bsoft_roles_table', 1),
(2, '2019_07_17_105657_create_bsoft_users_table', 1),
(3, '2019_07_17_105719_create_bsoft_password_resets_table', 1),
(4, '2019_07_17_110758_create_bsoft_projects_table', 1),
(5, '2019_07_17_122920_create_bsoft_working_shifts_table', 1),
(6, '2019_07_17_122925_create_bsoft_project_logs_table', 1),
(7, '2019_07_17_122926_create_bsoft_attendances_table', 1),
(8, '2019_07_17_123344_create_bsoft_items_table', 1),
(9, '2019_07_17_123358_create_bsoft_item_logs_table', 1),
(10, '2019_07_18_005541_create_bsoft_options_table', 1),
(11, '2019_07_18_113747_create_bsoft_bank_accounts_table', 1),
(12, '2019_07_18_123454_create_bsoft_payments_table', 1),
(13, '2019_07_27_021801_create_bsoft_loans_table', 1),
(14, '2019_07_27_021846_create_bsoft_invoices_table', 1),
(15, '2019_07_27_021848_create_bsoft_activities_table', 1),
(16, '2020_01_27_121301_create_settings_table', 2),
(25, '2020_01_28_135353_create_mother_categories_table', 3),
(26, '2020_01_28_135519_create_categories_table', 3),
(27, '2020_01_28_135554_create_sub_categories_table', 3),
(28, '2020_01_28_135741_create_manufactures_table', 3),
(31, '2020_02_02_123238_create_inventory_managements_table', 4),
(39, '2020_02_04_114717_create_request_items_table', 5),
(40, '2020_02_18_163612_create_purchase_items_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mother_categories`
--

CREATE TABLE `mother_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mother_categories`
--

INSERT INTO `mother_categories` (`id`, `mother_name`, `active`, `created_at`, `updated_at`) VALUES
(16, 'RAW Materials', 1, '2020-03-22 23:00:09', '2020-03-22 23:00:09'),
(17, 'Shuttering Materials', 1, '2020-03-22 23:04:20', '2020-03-22 23:04:20'),
(19, 'Machine & Equipments', 1, '2020-03-22 23:05:43', '2020-03-22 23:07:12'),
(20, 'Tools (Electric)', 1, '2020-03-22 23:06:19', '2020-03-22 23:29:38'),
(21, 'Hardware Items', 1, '2020-03-22 23:08:21', '2020-03-22 23:08:52'),
(22, 'Electrical Items', 1, '2020-03-22 23:09:31', '2020-03-22 23:09:31'),
(23, 'Materials for Finishing Work (Raj)', 1, '2020-03-22 23:12:43', '2020-03-22 23:12:43'),
(24, 'Utility (Project)', 1, '2020-03-22 23:13:49', '2020-03-22 23:18:02'),
(25, 'Utility (H/O)', 1, '2020-03-22 23:18:25', '2020-03-22 23:18:25'),
(26, 'Tools (Manual)', 1, '2020-03-22 23:30:07', '2020-03-22 23:30:07');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(15,2) NOT NULL,
  `vat` double(15,2) DEFAULT NULL,
  `quantity` bigint(20) NOT NULL,
  `amount` double(15,2) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `request_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cartId` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `payment_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `project_id` int(50) DEFAULT NULL,
  `vendor_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `item_id`, `price`, `vat`, `quantity`, `amount`, `user_id`, `request_code`, `cartId`, `status`, `payment_amount`, `created_at`, `updated_at`, `project_id`, `vendor_id`) VALUES
(1, '19 - Vibrator', 9500.00, NULL, 2, 19000.00, 63, 'REG19 - Machine & Equipments64PL8419', 'JiuMMZqHlbW', 0, NULL, '2020-05-17 13:50:22', '2020-05-17 13:50:22', 4, NULL),
(2, '19 - Vibrator', 9500.00, NULL, 2, 19000.00, 63, 'REG19 - Machine & Equipments64PL8419', 'JiuMMZqHlbW', 0, NULL, '2020-05-17 13:50:30', '2020-05-17 13:50:30', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request_items`
--

CREATE TABLE `request_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mother_category_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacture_id` bigint(20) DEFAULT NULL,
  `item_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(15,2) NOT NULL,
  `vat` double(15,2) DEFAULT NULL,
  `quantity` bigint(20) NOT NULL,
  `amount` double(15,2) DEFAULT NULL,
  `project_id` bigint(20) NOT NULL,
  `request_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_id` bigint(20) NOT NULL,
  `request_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cartId` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_req` tinyint(1) DEFAULT 0,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_items`
--

INSERT INTO `request_items` (`id`, `mother_category_id`, `category_id`, `sub_category_id`, `manufacture_id`, `item_id`, `price`, `vat`, `quantity`, `amount`, `project_id`, `request_date`, `request_id`, `request_code`, `created_at`, `updated_at`, `cartId`, `status_req`, `item_type`, `item_description`) VALUES
(1, '19 - Machine & Equip', '64 - Casting Equipme', NULL, 8, '19 - Vibrator', 9500.00, NULL, 2, 19000.00, 4, '2020-05-17 19:48:55', 63, 'REG19 - Machine & Equipments64PL8419', '2020-05-17 13:49:34', '2020-05-17 13:50:29', 'JiuMMZqHlbWj', 1, 'Electrical', '3 HP');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `header_title`, `header_img`, `icon_img`, `created_at`, `updated_at`) VALUES
(18, 'The World Construction ', './images/settings/logo/20200127135335-1580111615-helmet.png', './images/settings/icon/20200127140205-1580112125-light-bulb.png', NULL, NULL),
(19, 'THE WORLD CONSTRUCTION', './images/settings/logo/20200323035326-1584914006-TWC-Add copy.png', './images/settings/icon/20200323035326-1584914006-Company-Profile-Cover copy copy.jpg', '2020-03-22 21:53:26', '2020-03-22 21:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mother_category_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `sub_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `mother_category_id`, `category_id`, `sub_category_name`, `active`, `created_at`, `updated_at`) VALUES
(41, 17, 60, 'Jack Props', 1, '2020-03-23 00:39:03', '2020-03-23 00:39:03'),
(42, 17, 60, 'MS Pipe 2\"', 1, '2020-03-23 00:40:11', '2020-03-23 00:40:11'),
(43, 17, 60, 'U Head', 1, '2020-03-23 00:47:55', '2020-03-23 00:47:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bsoft_activities`
--
ALTER TABLE `bsoft_activities`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `bsoft_activities_activity_of_user_id_foreign` (`activity_of_user_id`);

--
-- Indexes for table `bsoft_attendances`
--
ALTER TABLE `bsoft_attendances`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `bsoft_attendances_attendance_user_id_foreign` (`attendance_user_id`),
  ADD KEY `bsoft_attendances_attendance_project_id_foreign` (`attendance_project_id`),
  ADD KEY `bsoft_attendances_attendance_shift_id_foreign` (`attendance_shift_id`);

--
-- Indexes for table `bsoft_bank_accounts`
--
ALTER TABLE `bsoft_bank_accounts`
  ADD PRIMARY KEY (`bank_id`),
  ADD KEY `bsoft_bank_accounts_bank_user_id_foreign` (`bank_user_id`);

--
-- Indexes for table `bsoft_invoices`
--
ALTER TABLE `bsoft_invoices`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `bsoft_invoices_invoice_item_log_foreign` (`invoice_item_log`);

--
-- Indexes for table `bsoft_items`
--
ALTER TABLE `bsoft_items`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `bsoft_items_item_name_unique` (`item_name`);

--
-- Indexes for table `bsoft_item_logs`
--
ALTER TABLE `bsoft_item_logs`
  ADD PRIMARY KEY (`il_id`),
  ADD KEY `bsoft_item_logs_il_vendor_id_foreign` (`il_vendor_id`),
  ADD KEY `bsoft_item_logs_il_item_id_foreign` (`il_item_id`),
  ADD KEY `bsoft_item_logs_il_project_id_foreign` (`il_project_id`);

--
-- Indexes for table `bsoft_loans`
--
ALTER TABLE `bsoft_loans`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `bsoft_options`
--
ALTER TABLE `bsoft_options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `bsoft_password_resets`
--
ALTER TABLE `bsoft_password_resets`
  ADD KEY `bsoft_password_resets_email_index` (`email`);

--
-- Indexes for table `bsoft_payments`
--
ALTER TABLE `bsoft_payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `bsoft_payments_payment_to_user_foreign` (`payment_to_user`),
  ADD KEY `bsoft_payments_payment_from_user_foreign` (`payment_from_user`),
  ADD KEY `bsoft_payments_payment_to_bank_account_foreign` (`payment_to_bank_account`),
  ADD KEY `bsoft_payments_payment_from_bank_account_foreign` (`payment_from_bank_account`),
  ADD KEY `bsoft_payments_payment_for_project_foreign` (`payment_for_project`);

--
-- Indexes for table `bsoft_projects`
--
ALTER TABLE `bsoft_projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `bsoft_projects_project_client_id_foreign` (`project_client_id`);

--
-- Indexes for table `bsoft_project_logs`
--
ALTER TABLE `bsoft_project_logs`
  ADD PRIMARY KEY (`pl_id`),
  ADD KEY `bsoft_project_logs_pl_user_id_foreign` (`pl_user_id`),
  ADD KEY `bsoft_project_logs_pl_project_id_foreign` (`pl_project_id`);

--
-- Indexes for table `bsoft_roles`
--
ALTER TABLE `bsoft_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `bsoft_users`
--
ALTER TABLE `bsoft_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bsoft_users_email_unique` (`email`),
  ADD UNIQUE KEY `bsoft_users_username_unique` (`username`),
  ADD KEY `bsoft_users_role_id_foreign` (`role_id`);

--
-- Indexes for table `bsoft_working_shifts`
--
ALTER TABLE `bsoft_working_shifts`
  ADD PRIMARY KEY (`shift_id`),
  ADD KEY `bsoft_working_shifts_shift_project_id_foreign` (`shift_project_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_managements`
--
ALTER TABLE `inventory_managements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inventory_managements_item_name_unique` (`item_name`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mother_categories`
--
ALTER TABLE `mother_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_items`
--
ALTER TABLE `request_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bsoft_activities`
--
ALTER TABLE `bsoft_activities`
  MODIFY `activity_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;

--
-- AUTO_INCREMENT for table `bsoft_attendances`
--
ALTER TABLE `bsoft_attendances`
  MODIFY `attendance_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bsoft_bank_accounts`
--
ALTER TABLE `bsoft_bank_accounts`
  MODIFY `bank_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bsoft_invoices`
--
ALTER TABLE `bsoft_invoices`
  MODIFY `invoice_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bsoft_items`
--
ALTER TABLE `bsoft_items`
  MODIFY `item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bsoft_item_logs`
--
ALTER TABLE `bsoft_item_logs`
  MODIFY `il_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bsoft_loans`
--
ALTER TABLE `bsoft_loans`
  MODIFY `loan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bsoft_options`
--
ALTER TABLE `bsoft_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bsoft_payments`
--
ALTER TABLE `bsoft_payments`
  MODIFY `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bsoft_projects`
--
ALTER TABLE `bsoft_projects`
  MODIFY `project_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bsoft_project_logs`
--
ALTER TABLE `bsoft_project_logs`
  MODIFY `pl_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `bsoft_roles`
--
ALTER TABLE `bsoft_roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `bsoft_users`
--
ALTER TABLE `bsoft_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `bsoft_working_shifts`
--
ALTER TABLE `bsoft_working_shifts`
  MODIFY `shift_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `inventory_managements`
--
ALTER TABLE `inventory_managements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `mother_categories`
--
ALTER TABLE `mother_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request_items`
--
ALTER TABLE `request_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bsoft_activities`
--
ALTER TABLE `bsoft_activities`
  ADD CONSTRAINT `bsoft_activities_activity_of_user_id_foreign` FOREIGN KEY (`activity_of_user_id`) REFERENCES `bsoft_users` (`id`);

--
-- Constraints for table `bsoft_attendances`
--
ALTER TABLE `bsoft_attendances`
  ADD CONSTRAINT `bsoft_attendances_attendance_project_id_foreign` FOREIGN KEY (`attendance_project_id`) REFERENCES `bsoft_projects` (`project_id`),
  ADD CONSTRAINT `bsoft_attendances_attendance_shift_id_foreign` FOREIGN KEY (`attendance_shift_id`) REFERENCES `bsoft_working_shifts` (`shift_id`),
  ADD CONSTRAINT `bsoft_attendances_attendance_user_id_foreign` FOREIGN KEY (`attendance_user_id`) REFERENCES `bsoft_users` (`id`);

--
-- Constraints for table `bsoft_bank_accounts`
--
ALTER TABLE `bsoft_bank_accounts`
  ADD CONSTRAINT `bsoft_bank_accounts_bank_user_id_foreign` FOREIGN KEY (`bank_user_id`) REFERENCES `bsoft_users` (`id`);

--
-- Constraints for table `bsoft_invoices`
--
ALTER TABLE `bsoft_invoices`
  ADD CONSTRAINT `bsoft_invoices_invoice_item_log_foreign` FOREIGN KEY (`invoice_item_log`) REFERENCES `bsoft_item_logs` (`il_id`);

--
-- Constraints for table `bsoft_item_logs`
--
ALTER TABLE `bsoft_item_logs`
  ADD CONSTRAINT `bsoft_item_logs_il_item_id_foreign` FOREIGN KEY (`il_item_id`) REFERENCES `bsoft_items` (`item_id`),
  ADD CONSTRAINT `bsoft_item_logs_il_project_id_foreign` FOREIGN KEY (`il_project_id`) REFERENCES `bsoft_projects` (`project_id`),
  ADD CONSTRAINT `bsoft_item_logs_il_vendor_id_foreign` FOREIGN KEY (`il_vendor_id`) REFERENCES `bsoft_users` (`id`);

--
-- Constraints for table `bsoft_payments`
--
ALTER TABLE `bsoft_payments`
  ADD CONSTRAINT `bsoft_payments_payment_for_project_foreign` FOREIGN KEY (`payment_for_project`) REFERENCES `bsoft_projects` (`project_id`),
  ADD CONSTRAINT `bsoft_payments_payment_from_bank_account_foreign` FOREIGN KEY (`payment_from_bank_account`) REFERENCES `bsoft_bank_accounts` (`bank_id`),
  ADD CONSTRAINT `bsoft_payments_payment_from_user_foreign` FOREIGN KEY (`payment_from_user`) REFERENCES `bsoft_users` (`id`),
  ADD CONSTRAINT `bsoft_payments_payment_to_bank_account_foreign` FOREIGN KEY (`payment_to_bank_account`) REFERENCES `bsoft_bank_accounts` (`bank_id`),
  ADD CONSTRAINT `bsoft_payments_payment_to_user_foreign` FOREIGN KEY (`payment_to_user`) REFERENCES `bsoft_users` (`id`);

--
-- Constraints for table `bsoft_projects`
--
ALTER TABLE `bsoft_projects`
  ADD CONSTRAINT `bsoft_projects_project_client_id_foreign` FOREIGN KEY (`project_client_id`) REFERENCES `bsoft_users` (`id`);

--
-- Constraints for table `bsoft_users`
--
ALTER TABLE `bsoft_users`
  ADD CONSTRAINT `bsoft_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `bsoft_roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
