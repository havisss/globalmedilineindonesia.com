-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2026 at 04:29 PM
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
-- Database: `global_mediline`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1791640134),
('laravel-cache-356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1791640134;', 1791640134),
('laravel-cache-livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1791637364),
('laravel-cache-livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1791637364;', 1791637364);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('Rumah Sakit','Klinik','Apotek','Lainnya') NOT NULL DEFAULT 'Rumah Sakit',
  `contact_person` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `tax_id` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `type`, `contact_person`, `phone`, `email`, `address`, `tax_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'RSUD Harapan Bunda', 'Rumah Sakit', 'Dr. Andi', '021-9876543', 'admin@rsudharapan.com', 'Jl. Raya Sehat No. 10, Depok', NULL, 1, '2026-10-10 04:55:04', '2026-10-10 04:55:04'),
(2, 'Apotek Sejahtera', 'Apotek', 'Bpk. Rudi', '021-1234567', NULL, 'Jl. Kemerdekaan No. 45, Bogor', NULL, 1, '2026-10-10 04:55:04', '2026-10-10 04:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inbound_invoices`
--

CREATE TABLE `inbound_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `pdf_file` varchar(255) DEFAULT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `status` enum('Unpaid','Partial','Paid','Cancelled') NOT NULL DEFAULT 'Unpaid',
  `subtotal_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `tax_amount` decimal(15,2) NOT NULL DEFAULT 0.00 COMMENT 'PPN',
  `total_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `paid_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inbound_invoices`
--

INSERT INTO `inbound_invoices` (`id`, `supplier_id`, `pdf_file`, `invoice_number`, `issue_date`, `due_date`, `status`, `subtotal_amount`, `tax_amount`, `total_amount`, `paid_amount`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 'kk3hrzOu3oz4V35tMLbTHsBTVM1cVDV2E8NSbYfV.jpg', 'INV/BS25/X1/3355', '2025-11-19', '2025-12-19', 'Paid', 5866501.00, 645315.11, 7081816.00, 7081816.00, NULL, '2026-10-10 05:48:06', '2026-10-10 05:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `inbound_invoice_items`
--

CREATE TABLE `inbound_invoice_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inbound_invoice_id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(15,2) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_10_07_000000_create_global_mediline_schema', 1),
(5, '2026_10_10_134321_add_ocr_subtotal_keyword_to_suppliers_table', 2),
(6, '2026_10_10_134618_add_pdf_file_to_invoices_tables', 3),
(7, '2026_10_10_135616_add_discount_and_unit_to_outbound_invoice_items', 4),
(8, '2026_10_10_143039_create_products_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `outbound_invoices`
--

CREATE TABLE `outbound_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `pdf_file` varchar(255) DEFAULT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `status` enum('Unpaid','Partial','Paid','Cancelled') NOT NULL DEFAULT 'Unpaid',
  `subtotal_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `tax_amount` decimal(15,2) NOT NULL DEFAULT 0.00 COMMENT 'PPN 11%',
  `total_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `paid_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outbound_invoices`
--

INSERT INTO `outbound_invoices` (`id`, `client_id`, `pdf_file`, `invoice_number`, `issue_date`, `due_date`, `status`, `subtotal_amount`, `tax_amount`, `total_amount`, `paid_amount`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'JL26101019', '2026-10-10', '2026-11-09', 'Unpaid', 50000.00, 5500.00, 55500.00, 0.00, NULL, '2026-10-10 06:01:30', '2026-10-10 06:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `outbound_invoice_items`
--

CREATE TABLE `outbound_invoice_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `outbound_invoice_id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `unit_price` decimal(15,2) NOT NULL,
  `discount_percentage` decimal(5,2) NOT NULL DEFAULT 0.00,
  `subtotal` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outbound_invoice_items`
--

INSERT INTO `outbound_invoice_items` (`id`, `outbound_invoice_id`, `item_name`, `quantity`, `unit`, `unit_price`, `discount_percentage`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 'hayoyoy', 1, 'Pcs', 100000.00, 50.00, 50000.00, '2026-10-10 06:01:30', '2026-10-10 06:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `unit` varchar(255) NOT NULL DEFAULT 'Pcs',
  `price` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `photo`, `description`, `unit`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Reagen Test Hba1C 25T', '1.png', 'Reagen tes rata-rata gula darah.', '25', 1375000.00, '2026-10-10 06:32:40', '2026-10-10 06:32:40'),
(2, 'Reagent Test CEA', '2.png', 'Reagen deteksi penanda tumor kanker.', '25', 6500000.00, '2026-10-10 06:32:40', '2026-10-10 06:32:40'),
(3, 'Reagent Test AFP', '3.png', 'Reagen deteksi dini kanker hati.', '25', 6500000.00, '2026-10-10 06:32:40', '2026-10-10 06:32:40'),
(4, 'Catrige Electrolyte', '4.png', 'Kartrid pengukur elektrolit dalam darah.', '25', 3000000.00, '2026-10-10 06:32:40', '2026-10-10 06:32:40'),
(5, 'Control Electrolyte', '5.png', 'Cairan kontrol kalibrasi mesin elektrolit.', '1', 1500000.00, '2026-10-10 06:32:40', '2026-10-10 06:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dnRJdaNilaefFTIGG6RuzrzvYrEF1zPGAemMyecX', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJTcjBxUFFyZnhYd3Q4c2Myd2M1MFIwcFp6eG1xaU9FU093T1JCU3JvIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pbiIsInJvdXRlIjoiZmlsYW1lbnQuYWRtaW4ucGFnZXMuZGFzaGJvYXJkIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsInBhc3N3b3JkX2hhc2hfd2ViIjoiNmI1MTdmYTQ5NTc4MTg1ZGMyMTEyNzg3OWU5OGNiMWFkZmY0ZWQ0ZjY0ZmQ3ZGNmMmM1NjhiNzBiZjZkZWM4OSIsImZpbGFtZW50IjpbXX0=', 1791644277);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `tax_id` varchar(255) DEFAULT NULL COMMENT 'NPWP',
  `top_days` int(11) NOT NULL DEFAULT 0 COMMENT 'Term of Payment in days',
  `ocr_invoice_keyword` varchar(255) DEFAULT NULL,
  `ocr_date_keyword` varchar(255) DEFAULT NULL,
  `ocr_subtotal_keyword` varchar(255) DEFAULT NULL,
  `ocr_total_keyword` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `contact_person`, `phone`, `email`, `address`, `tax_id`, `top_days`, `ocr_invoice_keyword`, `ocr_date_keyword`, `ocr_subtotal_keyword`, `ocr_total_keyword`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'PT. BIO CARE SEJAHTERA ', 'Budi Santoso', '081234567890', 'budi@BIOCARE.com', 'Jl. Kesehatan No. 1, Jakarta', '12.345.678.9-001.000', 30, 'No. Faktur', 'Tgl Faktur', 'Sub Total :', 'Total Faktur', 1, '2026-10-10 04:55:04', '2026-10-10 05:44:26'),
(2, 'CV. Alat Medis Indo', 'Siti Aminah', '089876543210', 'siti@alatmedis.co.id', 'Jl. Industri No. 2, Bandung', NULL, 14, 'Invoice No.', 'Issue Date:', NULL, 'Grand Total:', 1, '2026-10-10 04:55:04', '2026-10-10 04:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin GBI', 'gbi@gmail.com', '2026-10-10 04:55:04', '$2y$12$L2OyV2U9pT.uC0Jbp5M./u6l9hC4eurd5tfSNxtlH99up/zDiiGe2', 'G6F6kPEZIr', '2026-10-10 04:55:04', '2026-10-10 04:55:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `inbound_invoices`
--
ALTER TABLE `inbound_invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inbound_invoices_invoice_number_unique` (`invoice_number`),
  ADD KEY `inbound_invoices_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `inbound_invoice_items`
--
ALTER TABLE `inbound_invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inbound_invoice_items_inbound_invoice_id_foreign` (`inbound_invoice_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outbound_invoices`
--
ALTER TABLE `outbound_invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `outbound_invoices_invoice_number_unique` (`invoice_number`),
  ADD KEY `outbound_invoices_client_id_foreign` (`client_id`);

--
-- Indexes for table `outbound_invoice_items`
--
ALTER TABLE `outbound_invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outbound_invoice_items_outbound_invoice_id_foreign` (`outbound_invoice_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inbound_invoices`
--
ALTER TABLE `inbound_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inbound_invoice_items`
--
ALTER TABLE `inbound_invoice_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `outbound_invoices`
--
ALTER TABLE `outbound_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `outbound_invoice_items`
--
ALTER TABLE `outbound_invoice_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inbound_invoices`
--
ALTER TABLE `inbound_invoices`
  ADD CONSTRAINT `inbound_invoices_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inbound_invoice_items`
--
ALTER TABLE `inbound_invoice_items`
  ADD CONSTRAINT `inbound_invoice_items_inbound_invoice_id_foreign` FOREIGN KEY (`inbound_invoice_id`) REFERENCES `inbound_invoices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `outbound_invoices`
--
ALTER TABLE `outbound_invoices`
  ADD CONSTRAINT `outbound_invoices_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `outbound_invoice_items`
--
ALTER TABLE `outbound_invoice_items`
  ADD CONSTRAINT `outbound_invoice_items_outbound_invoice_id_foreign` FOREIGN KEY (`outbound_invoice_id`) REFERENCES `outbound_invoices` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
