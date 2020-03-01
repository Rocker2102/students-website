-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2020 at 08:00 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nitskm_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `resource_data`
--

CREATE TABLE `resource_data` (
  `rid` int(8) NOT NULL,
  `r_type` int(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_code` varchar(16) NOT NULL,
  `semester` int(2) NOT NULL,
  `batch` int(8) NOT NULL DEFAULT 2018,
  `file_type` varchar(16) NOT NULL DEFAULT 'pdf',
  `drive_link` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resource_data`
--

INSERT INTO `resource_data` (`rid`, `r_type`, `title`, `sub_code`, `semester`, `batch`, `file_type`, `drive_link`) VALUES
(1, 1, 'Computer Science', 'CS11101', 1, 2018, 'pdf', NULL),
(2, 1, 'Introduction to Computer Systems', 'CS11102', 1, 2018, 'pdf', NULL),
(3, 1, 'Electrical Engineering', 'EE11101', 1, 2018, 'pdf', NULL),
(4, 1, 'Human Values & Effective Communication', 'HS11101', 1, 2018, 'pdf', NULL),
(5, 1, 'Mathematics', 'MA11101', 1, 2018, 'pdf', NULL),
(6, 1, 'Engineering Physics', 'PH11101', 1, 2018, 'pdf', NULL),
(7, 2, 'Computer Science', 'CS11101', 1, 2018, 'pdf', NULL),
(8, 2, 'Introduction to Computer Systems', 'CS11102', 1, 2018, 'pdf', NULL),
(9, 2, 'Electrical Engineering', 'EE11101', 1, 2018, 'pdf', NULL),
(10, 2, 'Human Values & Effective Communication', 'HS11101', 1, 2018, 'pdf', NULL),
(11, 2, 'Mathematics', 'MA11101', 1, 2018, 'pdf', NULL),
(12, 2, 'Engineering Physics', 'PH11101', 1, 2018, 'pdf', NULL),
(13, 3, 'Computer Science', 'CS11101', 1, 2018, 'pdf', NULL),
(14, 3, 'Introduction to Computer Systems', 'CS11102', 1, 2018, 'pdf', NULL),
(15, 3, 'Electrical Engineering', 'EE11101', 1, 2018, 'pdf', NULL),
(16, 3, 'Human Values & Effective Communication', 'HS11101', 1, 2018, 'pdf', NULL),
(17, 3, 'Mathematics', 'MA11101', 1, 2018, 'pdf', NULL),
(18, 3, 'Engineering Physics', 'PH11101', 1, 2018, 'pdf', NULL),
(19, 4, 'Strings in C', 'CS11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1ry32iB5XuzKwTLhVCLeHD_w_Np0FmotJ/view?usp=sharing'),
(20, 4, 'C Programming (Book)', 'CS11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1bE_osaGmsqk0PJhxO93PVi8iCN0I-t8S/view?usp=sharing'),
(21, 4, 'File Handling (1)', 'CS11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1anP8i_-y9AXpdav7DJh9ft0emO3_t2Ft/view?usp=sharing'),
(22, 4, 'File Handling (2)', 'CS11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1JoCpmyY7oX8jjL1OtTmBXdE14zZQHJ48/view?usp=sharing'),
(23, 4, 'Preprocessor Directives', 'CS11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1glnk1j3vThaN7Q5cyOIJ8ZSJJgiR9tiM/view?usp=sharing'),
(24, 4, 'Stack & Heap', 'CS11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1HbSoP14zmAzQizgZt1HT0A0O8Z2wivCd/view?usp=sharing'),
(25, 4, 'Structures, Unions, Pointers & File Handling', 'CS11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1uirK_kSBm6Ght6EsswB7mKWp4G09-UkA/view?usp=sharing'),
(26, 4, 'Assignment 1', 'CS11102', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1jOwWGYHd2b2Uk2Td7LsNy8GwvBbBlkAf/view?usp=sharing'),
(27, 4, 'Assignment 2', 'CS11102', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1p0Rdr_VkSyTTuC1ojlSDwY_B_KNvd3G4/view?usp=sharing'),
(28, 4, 'Assignment 3', 'CS11102', 1, 2018, 'pdf', 'https://drive.google.com/file/d/140dDYAkD8PtQPAP8-C6M0YWJ5wfebjlT/view?usp=sharing'),
(29, 4, 'Assignment 4', 'CS11102', 1, 2018, 'xlsx', 'https://drive.google.com/file/d/1iV536Bfa612m3ljGEA-M09zKr8S_76yT/view?usp=sharing'),
(30, 4, 'Assignment 4: Solution', 'CS11102', 1, 2018, 'zip', 'https://drive.google.com/file/d/1vp29YAMYvVJRpFCSqm5ohhndAE0Dxdhs/view?usp=sharing'),
(31, 4, 'Computer Languages', 'CS11102', 1, 2018, 'pptx', 'https://drive.google.com/file/d/1cOWIZCmufVz6RC7LE0ixaol-Vzy6pj_2/view?usp=sharing'),
(32, 4, '3-Phase Induction Motor', 'EE11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1T2wWO_domNYQwJcA6OzXzNkEtOafhKOz/view?usp=sharing'),
(33, 4, 'Electric Motors (1)', 'EE11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1z52jXi9ILgXScAcF477S0UBUAZVo0DPq/view?usp=sharing'),
(34, 4, 'Electric Motors (2)', 'EE11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/13cdhPmBX9ry02KE5BdTAtfb0IPqpvaab/view?usp=sharing'),
(35, 4, 'Electrical & Electronic Instruments', 'EE11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/13IB5FSV4pqQYRCJwn79R1EgS4JaFhbWx/view?usp=sharing'),
(36, 4, 'Electrical Machines', 'EE11101', 1, 2018, 'pptx', 'https://drive.google.com/file/d/1V1JbLBSf6idOvfCoUZGdeVTlTzaHc40I/view?usp=sharing'),
(37, 4, 'Notes: AC', 'EE11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1CI4tc-JYwyqfb-pMo---czQAZ5AIV5_h/view?usp=sharing'),
(38, 4, 'Notes: DC', 'EE11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1MVn_cMWf1EifY7nYBm8knDhjYY8Jmvc-/view?usp=sharing'),
(39, 4, 'Notes: DC Generator', 'EE11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1v8RNlEBu1plDYKiw7YyLoczFvJvlatbx/view?usp=sharing'),
(40, 4, 'Notes: DC Motor', 'EE11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/14eiaXjQmABLdPwfVwiXoTn0I9F5aSZmr/view?usp=sharing'),
(41, 4, 'Power Systems', 'EE11101', 1, 2018, 'pptx', 'https://drive.google.com/file/d/1rauyYBkBE9J1MiQADNXssvFoAIYb2Q1G/view?usp=sharing'),
(42, 4, 'Sensors', 'EE11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1v3Ux3FZDHTRygP3zli9as2zd6mr6zLeo/view?usp=sharing'),
(43, 4, 'Sensors', 'EE11101', 1, 2018, 'pptx', 'https://drive.google.com/file/d/1fXHO06dxEQ5CQWeAsVjEUuFEGqy4QUUM/view?usp=sharing'),
(44, 4, 'Single-Phase Induction Motor', 'EE11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1I6iWLbnREqbL8oYGaeMAKv_q4vKWJ5pj/view?usp=sharing'),
(45, 4, 'Star-Delta (1)', 'EE11101', 1, 2018, 'img', 'https://drive.google.com/file/d/1vdKC0cOXUFseP63ZNpr1NQDlbHAgjrl1/view?usp=sharing'),
(46, 4, 'Star-Delta (2)', 'EE11101', 1, 2018, 'img', 'https://drive.google.com/file/d/1wI3MlULj0xD9WDYGUSzkuxeWKvYzaRZV/view?usp=sharing'),
(47, 4, 'Stepper Motors', 'EE11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/12bJ1-OVva3IAs3LuqKyMLeHmYQWb5qOI/view?usp=sharing'),
(48, 4, 'Synchronous Machine', 'EE11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1FS2VKkpJtIvLFsLmWUY5FFkQt7AWyTpT/view?usp=sharing'),
(49, 4, 'Synchronous Motors', 'EE11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/10e2Bv2cIkkPAUAUZj4MFvkP1hBOqhJPl/view?usp=sharing'),
(50, 4, 'Assignment 1', 'HS11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1mslHtpChe6o021Bz46VWr5BuaQr4Ji7M/view?usp=sharing'),
(51, 4, 'Assignment 2', 'HS11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1-9BBudLf7z53mgvaeGGtFv6NSCNeB0E9/view?usp=sharing'),
(52, 4, 'Notes 1', 'HS11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1oYX-jd6QV0hGI078qr1R_fEvtmIGTEwG/view?usp=sharing'),
(53, 4, 'Essay: English In India', 'HS11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1-ax9UW3g6huUzqf0RgUzGJSdKFXfHdRX/view?usp=sharing'),
(54, 4, 'Essay: Of Studies', 'HS11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1opYonrwcGXyCL3lWoANQl5LPE7arBCwk/view?usp=sharing'),
(55, 4, 'Essay: On Doing Nothing', 'HS11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1d1EMgrULp_bP7F0ixmU_IkIWISyZlfsb/view?usp=sharing'),
(56, 4, 'Sonnet 116', 'HS11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/14HdwSuoTtkQiTKn22Mu_GMvt7HCZvYk9/view?usp=sharing'),
(57, 4, 'Poem: Tyger Text', 'HS11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1vwIy1G4m6tjEuT7PN0awmcIC1hUNeXnP/view?usp=sharing'),
(58, 4, 'Poem: West Wind', 'HS11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1Y1Av6dysodMRuTrjRxUBnfoUhMCBOIYL/view?usp=sharingL'),
(59, 4, 'Poem: When Mind is Free', 'HS11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1lBPfM4D9NLUqfDmpBhia-ivtwBOQNOfV/view?usp=sharing'),
(60, 4, 'Assignment 1', 'MA11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1RZt_Fm_S8NZGDKM_I9Azywm0okJJa7FQ/view?usp=sharing'),
(61, 4, 'Assignment 2', 'MA11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1sM4wbFW6TA_UH-IiPbBHc6xm6YdVD5IJ/view?usp=sharing'),
(62, 4, 'Assignment 3', 'MA11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1-VlaazBgHEPzloLz09UHXmGMcvgfsfwV/view?usp=sharing'),
(63, 4, 'Assignment 4', 'MA11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1w3BB3rSGQuKez1kGKzvA1p-EhTQQqqqY/view?usp=sharing'),
(64, 4, 'Linear Algebra & its Applications (Book)', 'MA11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1bcGSrZNx9kAfB732_qkBe_ob4C-s0sX7/view?usp=sharing'),
(65, 4, 'Linear Algebra (Hoffmann Kunze)', 'MA11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1IQ6glMHwYWGUWYAlCosPR8xlZyG7np-w/view?usp=sharing'),
(66, 4, 'Linear Algebra (Kenneth Ray)', 'MA11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1Pr-jzZfLZ5FM3wQtMphFtSysoZACcHkE/view?usp=sharing'),
(67, 4, 'Notes: Differential Equations', 'MA11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1uaQwjA_2sN90c1aDP4amZEQ7waY50ibE/view?usp=sharing'),
(68, 4, 'Notes: Linear Transformation', 'MA11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1ZVLJZfDtkL6dieLdrxz67kmOuhjlb0Dl/view?usp=sharing'),
(69, 4, 'Notes: Sequences & Series', 'MA11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1ZJx9dBN7R42jWX_mQ0gfJEhk_jQPk9v_/view?usp=sharing'),
(70, 4, 'Module 4: Fiber Optics', 'PH11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/18Up3XJHMf9WThpWT9_8t4EnH5I50dbUZ/view?usp=sharing'),
(71, 4, 'Optics (Book)', 'PH11101', 1, 2018, 'pdf', 'https://drive.google.com/file/d/1VCC9FS4W1bPbiaSZvlGCP7_u4LwvDdSX/view?usp=sharing'),
(72, 1, 'Foundation of Computing', 'CS12101', 2, 2018, 'pdf', NULL),
(73, 1, 'Chemistry', 'CY12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1-wvlrT2TVZ42mUO9dJWmgA2tWgwvJqve/view?usp=sharing'),
(74, 1, 'Environmental Studies', 'CY12102', 2, 2018, 'pdf', 'https://drive.google.com/file/d/101TH8rkTQ0lDrqWOii0nLrquFvX2jEHj/view?usp=sharing'),
(75, 1, 'Electronics and Communication', 'EC12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/10E9tEPvjsooyJMMaO_njHn6JVZ4dIcTn/view?usp=sharing'),
(76, 1, 'Human Values & Effective Communication', 'HS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/10ICZygppQ9pumfkX4FQqRDGazczCpDCw/view?usp=sharing'),
(77, 1, 'Mathematics', 'MA12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/10PS5GriIKQ4l_TjLDbDwjou9cLIvkcYT/view?usp=sharing'),
(78, 2, 'Foundation of Computing', 'CS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/10Us90EYkn5Z5R4puQ-wcKisaaxbRht5j/view?usp=sharing'),
(79, 2, 'Chemistry', 'CY12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/10VNDVCO1n_KThYmBeTJLk517U7fK_0dy/view?usp=sharing'),
(80, 2, 'Environmental Studies', 'CY12102', 2, 2018, 'pdf', 'https://drive.google.com/file/d/10YyCA-sfsoyop7Y31cGVRTTQ29-5Sp2h/view?usp=sharing'),
(81, 2, 'Electronics and Communication', 'EC12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/10_mNw53jvhconpmw5x_KfLpRxAN3yXDB/view?usp=sharing'),
(82, 2, 'Human Values & Effective Communication', 'HS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/10boJD3npqXGEAAI51nZvdLKzmpI4hB9f/view?usp=sharing'),
(83, 2, 'Mathematics', 'MA12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/10eLcF3vMCS1NX1fXGoP1pGjPqAJYjkRt/view?usp=sharing'),
(84, 3, 'Foundation of Computing', 'CS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1-7a1LPaWlPamH8v7kWeo-LLXtdY7SHes/view?usp=sharing'),
(85, 3, 'Chemistry', 'CY12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1-B-c6MzhgxLpsFT0m9Cb9e3e21Pk0vHR/view?usp=sharing'),
(86, 3, 'Environmental Studies', 'CY12102', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1-Gvl5p7HfaLpPxj0E6PT6zSVFhNUE5dY/view?usp=sharing'),
(87, 3, 'Electronics and Communication', 'EC12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1-QDjmB7Ucv3WgddtRnurRgzrVrgRYxSa/view?usp=sharing'),
(88, 3, 'Human Values & Effective Communication', 'HS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1-ZyOKL8_mhQnXYJDfAYtKCxuAGJIcur_/view?usp=sharing'),
(89, 3, 'Mathematics', 'MA12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1-bwGew-CtoLhPeoJtNlKNQ5iMKqHzA5n/view?usp=sharing'),
(90, 3, 'Engineering Graphics [LAB]', 'ME12102', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1-ejQrNSHp5MAAXzbmZwipjT081xCb_IM/view?usp=sharing'),
(91, 4, 'Assignment: Foundation of Programming Laboratory', 'CS12101', 2, 2018, 'docx', 'https://drive.google.com/file/d/1nxew5fwRAWFgQi_X6ri6M6BzSURxQHk-/view?usp=sharing'),
(92, 4, 'Assignment: Data Structures (Theoritical)', 'CS12101', 2, 2018, 'docx', 'https://drive.google.com/file/d/19WYvDMNviTYSfo5oRmp560_Wq823GVuB/view?usp=sharing'),
(93, 4, 'Trees Fundamental', 'CS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1grorIqkplab48Z8c7dfhyoKWL8DTfM6y/view?usp=sharing'),
(94, 4, 'Binary Search Tree', 'CS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1gLQMHqBKArKXarntDYvwOBW04orRldcc/view?usp=sharing'),
(95, 4, 'Binary Tree & Graph', 'CS12101', 2, 2018, 'docx', 'https://drive.google.com/file/d/1gzZaBTiaTNlNkCg1xk_Lf1S-KInLJYO4/view?usp=sharing'),
(96, 4, 'Binary Trees', 'CS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1CvTygsxCdZt8C5RzeU5MTfaapfciqsTU/view?usp=sharing'),
(97, 4, 'Binary Search Tree (C Program)', 'CS12101', 2, 2018, 'code', 'https://drive.google.com/file/d/1M-OpSdlcbcRzmDjL70cXBpbXK0ts63SM/view?usp=sharing'),
(98, 4, 'Doubly Linked List', 'CS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1Qmmx_oCSxgyHTMQ4GYOTsmwvaYJw7MtD/view?usp=sharing'),
(99, 4, 'Linked List (1)', 'CS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1QoOnQU6vVKSxJz1_lUB0e7r9KJ0Il8ll/view?usp=sharing'),
(100, 4, 'Linked List (2)', 'CS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1t2xsi7mrwesZqW04ofJs5k5BidWeJGgO/view?usp=sharing'),
(101, 4, 'Queue', 'CS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1su9yM8hf84TZ4Iq4VBdowJjEJWeAC_pM/view?usp=sharing'),
(102, 4, 'Stacks (1)', 'CS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1Ph-IOSr0yUZs8LOoHIaHLK0MwGhs1ewy/view?usp=sharing'),
(103, 4, 'Stacks (2)', 'CS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1nQ5357jbb87wBC3Xn66YioHpy0-Y-lF_/view?usp=sharing'),
(104, 4, 'Assignment 1', 'CY12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1wu3UUH3wKs1M4lgbvwpMK3K9fyRC9W9W/view?usp=sharing'),
(105, 4, 'Assignment 1: Solution', 'CY12101', 2, 2018, 'zip', 'https://drive.google.com/file/d/1j1Htg7Rg5mSa6JLXnF6L-UdOZ7dPUeyJ/view?usp=sharing'),
(106, 4, 'Notes 1', 'CY12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1MSe99FJ5eTtZ-JxGrVPiD6PO9XtUuXc_/view?usp=sharing'),
(107, 4, 'Notes 2', 'CY12101', 2, 2018, 'zip', 'https://drive.google.com/file/d/1DKE02fDVFugzO7WJfFPn_g9Mw37-ZkDs/view?usp=sharing'),
(108, 4, 'Electrochemistry & Corrosion', 'CY12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1fbMT3VyDSuEItlqe0Gvu18TChr2hs83K/view?usp=sharing'),
(109, 4, 'Fuels', 'CY12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1czvC8ITTrzGLtUKkNhACbymMV10Arqt-/view?usp=sharing'),
(110, 4, 'Nanoscience', 'CY12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1Dz2jyKOKrjAypt1n2cYoYok4G6AGhmXF/view?usp=sharing'),
(111, 4, 'Solid State', 'CY12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1oX2XMmQ5Qrag2FaECGmHq1MDUeW818GI/view?usp=sharing'),
(112, 4, 'Assignment 1', 'CY12102', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1oPHdAi0tPeMeXY2ujTtP4NN9yuroMqwB/view?usp=sharing'),
(113, 4, 'Assignment 1: Solution', 'CY12102', 2, 2018, 'zip', 'https://drive.google.com/file/d/1OQYAAV-8v3tQMwkSgU9z6D_B_5sX__M4/view?usp=sharing'),
(114, 4, 'Assignment 2', 'CY12102', 2, 2018, 'docx', 'https://drive.google.com/file/d/18vCqdAhQTWu-3dnPWeY4m1MbahFiYXfZ/view?usp=sharing'),
(115, 4, 'Introduction', 'CY12102', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1azIMnmlPMYERjgsQRCG_CD_A-xciDPYI/view?usp=sharing'),
(116, 4, 'Handbook', 'CY12102', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1FG9tOPdine2NrE0alVA6MV3eHPIxnXl7/view?usp=sharing'),
(117, 4, 'Lecture Notes 3', 'CY12102', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1GX2g8-2DirDDuKirkku-d4LaWmJVzLvA/view?usp=sharing'),
(118, 4, 'Lecture Notes 4', 'CY12102', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1f40llrWMi7vUqgIneUDNacHiwgcQ1u3A/view?usp=sharing'),
(119, 4, 'Lecture Notes 6', 'CY12102', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1m3eCk_cILbDe7byRn1inHkRwljAguDQI/view?usp=sharing'),
(120, 4, 'Lecture Notes 7', 'CY12102', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1qFs5nxEWrGmcPGbi_GbFQL9ft_tVn-jW/view?usp=sharing'),
(121, 4, 'Lecture Notes 8', 'CY12102', 2, 2018, 'pdf', 'https://drive.google.com/file/d/14HHC4fqaXF3yEq9hSHrlqgWPAkU_WB1j/view?usp=sharing'),
(122, 4, 'Lecture Notes: Air Pollution', 'CY12102', 2, 2018, 'pdf', 'https://drive.google.com/file/d/15u4rRhobTFPJbYipGaGzlo55KhP_ZORJ/view?usp=sharing'),
(123, 4, 'Lecture Notes: Hazardous', 'CY12102', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1a3OOO8bzD0o_pWAqMlzmkaKQGWGwA3Ug/view?usp=sharing'),
(124, 4, 'Biodiversity', 'CY12102', 2, 2018, 'pptx', 'https://drive.google.com/file/d/1q_WgGHgtsK9ps1QqqdoXBv-i9Tt4XBN8/view?usp=sharing'),
(125, 4, 'Assignment 1', 'EC12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1RkY79QrkvbeTU3s_jG6TCgMAow7Y0v9X/view?usp=sharing'),
(126, 4, 'Assignment: Short Attendance (55-74%)', 'EC12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1XtvkQVmnukxcUdOSl7Jaz6YrGLo8VA-a/view?usp=sharing'),
(127, 4, 'Assignment: Short Attendance (40-54%)', 'EC12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/19b4u13nm0YjaHioWQ0Rwx1wIniJj845C/view?usp=sharing'),
(128, 4, 'Module 1', 'EC12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1ZQ1XHfdgHNEGM5w29pL9nJIUm4-Hn6UI/view?usp=sharing'),
(129, 4, 'Notes: Diode', 'EC12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/169ucr-_GCrEqU1IR59-vbaepXvjdad1X/view?usp=sharing'),
(130, 4, 'Assignment 1', 'HS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1M2PMT5dc-cYIU2V_1EQZG8Vk4a1p5crc/view?usp=sharing'),
(131, 4, 'Assignment 1: Solution', 'HS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/16lkd9NttOCaxn-JYyjJyPJhfoca9W2uv/view?usp=sharing'),
(132, 4, 'Assignment X: Solution', 'HS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1Tfp05heOKim-xIVmGNUwbIRI5UFFW0C2/view?usp=sharing'),
(133, 4, 'Notes 1', 'HS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1kLsLiRyh9jHtJ3lYgzybXWdvlCZG0KKa/view?usp=sharing'),
(134, 4, 'Notes 2', 'HS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1nOwzsyE6hOhQ98SlVqz2ftiwDzTGOlSU/view?usp=sharing'),
(135, 4, 'Kanthapura: Novel', 'HS12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1eKs-QagdknK38U9xCdDOh-XcAFF30IT9/view?usp=sharing'),
(136, 4, 'Assignment: Module 1', 'MA12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1ek_EyUBND1I4u6lHMm21z4A27yUbchT8/view?usp=sharing'),
(137, 4, 'Module 1: Solution', 'MA12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1bAy-f7OTNIAcdDwUtUSgurk1Af8hRlQU/view?usp=sharing'),
(138, 4, 'Assignment: Module 2', 'MA12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1ffoCcC8PfzOH2sxwPlYLq_CchityBe_e/view?usp=sharing'),
(139, 4, 'Module 2: Solution', 'MA12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1lEBTEA6M5sD8N9Lhl9jA01dHANxxRN50/view?usp=sharing'),
(140, 4, 'Assignment: Module 3', 'MA12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1exzx428NsyUZy-ArCYGBf4w9FKZpKyOT/view?usp=sharing'),
(141, 4, 'Assignment: Module 4', 'MA12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1P2-B-VmF2fGNWW6Y1_KuXUcUXJsISAyy/view?usp=sharing'),
(142, 4, 'Notes: Fourier Series', 'MA12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1Y0rl8l9bsjtQU25juSzqm9jIZEYytKVA/view?usp=sharing'),
(143, 4, 'Notes: Laplace Transform', 'MA12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/127AhiSAujTf2jUBJVoCQjv6oVuv9c2xH/view?usp=sharing'),
(144, 4, 'Notes: Numerical Analysis', 'MA12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1ITinI7bmj1TO27csNy3wG_VyszYCDt2L/view?usp=sharing'),
(145, 4, 'Notes: Probability', 'MA12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/183W5iirP_9ZQ5dZNUuQSpWXdFuFf-E4i/view?usp=sharing'),
(146, 4, 'Double & Triple Integration', 'MA12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1hmzfROgsF_Qt_PZqoxRjSUybEtmTXgba/view?usp=sharing'),
(147, 4, 'Laplace Transformation (1)', 'MA12101', 2, 2018, 'pdf', 'https://drive.google.com/open?id=1QkN-DpVoDE8_N6zpxy_W-G3oCM6du8Is'),
(148, 4, 'Laplace Transformation (2)', 'MA12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1uSuT1dqih-zhYka8pX6uxVPBQinKBdv8/view?usp=sharing'),
(149, 4, 'Line Integral', 'MA12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/1FKXr4YCWUbianq8PwCWgdX9o9Ryxpc3P/view?usp=sharing'),
(150, 4, 'Trigonometry', 'MA12101', 2, 2018, 'pdf', 'https://drive.google.com/file/d/18UnOPj93x8QxVzKaJpdgghheAgJ6zUGg/view?usp=sharing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resource_data`
--
ALTER TABLE `resource_data`
  ADD PRIMARY KEY (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resource_data`
--
ALTER TABLE `resource_data`
  MODIFY `rid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
