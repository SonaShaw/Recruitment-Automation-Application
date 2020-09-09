-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2019 at 09:07 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reception1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ca`
--

CREATE TABLE `ca` (
  `cnum` varchar(20) NOT NULL,
  `family_member_ca` varchar(20) NOT NULL,
  `qualification` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ca`
--

INSERT INTO `ca` (`cnum`, `family_member_ca`, `qualification`) VALUES
('2019-09-007', 'Father', 'CA');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `cnum` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `profile` varchar(50) NOT NULL,
  `experience` int(5) NOT NULL,
  `ca` varchar(10) NOT NULL,
  `source` varchar(30) NOT NULL,
  `subsource` varchar(30) NOT NULL,
  `consultancy` varchar(30) NOT NULL,
  `other_source` varchar(30) NOT NULL,
  `q_set` varchar(20) NOT NULL,
  `register_date` date NOT NULL,
  `register_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`cnum`, `name`, `department`, `profile`, `experience`, `ca`, `source`, `subsource`, `consultancy`, `other_source`, `q_set`, `register_date`, `register_time`) VALUES
('2019-08-000', 'Sona Shaw', 'Accounting', 'Senior Accountant', 15, 'NO', 'Online', 'Naukri.com', '', '', 'Intermediate', '2019-08-19', '01:59:43'),
('2019-09-001', 'Sumanjit kuity', 'Accounting', 'Accountant', 30, 'NO', 'Online', 'LinkedIn.com', '', '', 'Basic', '2019-09-03', '10:39:17'),
('2019-09-002', 'Suman Das', 'Accounting', 'Junior Accountant', 12, 'NO', 'Online', 'Naukri.com', '', '', 'Basic', '2019-09-03', '10:44:32'),
('2019-09-003', 'Rohan Dinda', 'Accounting', 'Accountant', 5, 'NO', 'Online', 'Indeed.com', '', '', 'Basic', '2019-09-04', '00:01:51'),
('2019-09-004', 'Subhodip Pramanik', 'Accounting', 'Junior Accountant', 14, 'NO', 'Online', 'Naukri.com', '', '', 'Basic', '2019-09-04', '00:02:22'),
('2019-09-005', 'Rimi Naskar', 'Accounting', 'Junior Accountant', 11, 'NO', 'Consultancy', 'Free', 'A', '', 'Intermediate', '2019-09-04', '15:42:05'),
('2019-09-006', 'Rahul Giri', 'Accounting', 'Assistant Accountant', 7, 'NO', 'Online', 'Indeed.com', '', '', 'Intermediate', '2019-09-04', '15:43:04'),
('2019-09-007', 'Sona Shaw', 'Accounting', 'Accountant', 6, 'NO', 'Consultancy', 'Free', 'A', '', 'Basic', '2019-09-07', '13:20:01'),
('2019-09-008', 'xyz', 'Accounting', 'Assistant Accountant', 12, 'NO', 'Online', 'Indeed.com', '', '', 'Intermediate', '2019-09-14', '22:39:46'),
('2019-09-009', 'Rahul Giri ', 'Accounting', 'Assistant Accountant', 23, 'NO', 'Consultancy', 'Paid', 'D', '', 'Intermediate', '2019-09-18', '08:14:19'),
('2019-09-010', 'Nishant Jha', 'Accounting', 'Assistant Accountant', 45, 'NO', 'Consultancy', 'Paid', 'D', '', 'Intermediate', '2019-09-18', '08:15:32');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_login`
--

CREATE TABLE `candidate_login` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_login`
--

INSERT INTO `candidate_login` (`name`, `email`, `password`, `role`) VALUES
('Sanjib Sanghi', 'ceo@cloudinfosolutions.com', 'CEO@123', 'CEO'),
('Sarita Mam', 'hod@cloudinfosolutions.com', 'HOD@123', 'HOD'),
('Juhi Kothari', 'hr-admin@cloudinfosolutions.com', 'hr-admin@123', 'HR-Head'),
('Juhi Kothari', 'screening@cloudinfosolutions.com', 'Screening@123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `cnum` varchar(20) NOT NULL,
  `child_type` varchar(10) NOT NULL,
  `age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`cnum`, `child_type`, `age`) VALUES
('2019-09-002', 'son', 2),
('2019-09-002', 'son', 0),
('2019-09-002', 'daughter', 55),
('2019-09-004', 'son', 3),
('2019-09-004', 'son', 8),
('2019-09-004', 'daughter', 9);

-- --------------------------------------------------------

--
-- Table structure for table `current_emp`
--

CREATE TABLE `current_emp` (
  `cnum` varchar(20) NOT NULL,
  `name_of_org` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `tenure` int(10) DEFAULT NULL,
  `current_salary` int(10) DEFAULT NULL,
  `reason` varchar(500) DEFAULT NULL,
  `notice_period` int(10) DEFAULT NULL,
  `exp_salary` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_emp`
--

INSERT INTO `current_emp` (`cnum`, `name_of_org`, `designation`, `tenure`, `current_salary`, `reason`, `notice_period`, `exp_salary`) VALUES
('2019-09-004', 'Cloud Infosolutions', 'Manager', 20, 1000, 'jbyewgycuyuea', 12, 15000),
('2019-09-010', '', '', 0, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `final_interview`
--

CREATE TABLE `final_interview` (
  `cnum` varchar(20) NOT NULL,
  `hod_feedback` varchar(1024) NOT NULL,
  `hod_recomendation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_interview`
--

INSERT INTO `final_interview` (`cnum`, `hod_feedback`, `hod_recomendation`) VALUES
('2019-09-003', 'jknfwiuhfuieahufyef', 'hire'),
('2019-09-008', 'jugudw', 'hire');

-- --------------------------------------------------------

--
-- Table structure for table `final_score`
--

CREATE TABLE `final_score` (
  `cnum` varchar(20) NOT NULL,
  `accounting_marks` int(4) NOT NULL,
  `excel_marks` float NOT NULL,
  `exsum` float NOT NULL,
  `exmax` float NOT NULL,
  `exmin` float NOT NULL,
  `exavg` float NOT NULL,
  `filter` int(4) NOT NULL,
  `vlookup` int(4) NOT NULL,
  `cellref` int(4) NOT NULL,
  `concatenate` int(4) NOT NULL,
  `find_n_replace` int(4) NOT NULL,
  `pivot_table` int(4) NOT NULL,
  `english_marks` int(4) NOT NULL,
  `aptitude_marks` int(4) NOT NULL,
  `typing_marks` int(4) NOT NULL,
  `accuracy` int(4) NOT NULL,
  `screening_status` varchar(10) NOT NULL,
  `is_interviewed` varchar(8) NOT NULL,
  `reason` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_score`
--

INSERT INTO `final_score` (`cnum`, `accounting_marks`, `excel_marks`, `exsum`, `exmax`, `exmin`, `exavg`, `filter`, `vlookup`, `cellref`, `concatenate`, `find_n_replace`, `pivot_table`, `english_marks`, `aptitude_marks`, `typing_marks`, `accuracy`, `screening_status`, `is_interviewed`, `reason`) VALUES
('2019-09-002', 1, 25, 2.5, 2.5, 2.5, 2.5, 5, 5, 0, 0, 5, 0, 1, 1, 23, 88, 'fail', 'Callforr', ''),
('2019-09-003', 4, 35, 2.5, 2.5, 0, 0, 5, 5, 5, 5, 5, 5, 3, 2, 45, 90, 'fail', 'yes', 'Good in excel and typing,seems confident'),
('2019-09-004', 6, 30, 2.5, 0, 2.5, 0, 5, 5, 5, 0, 5, 5, 5, 2, 45, 90, 'fail', 'yes', 'Good in excel and typing,seems confident'),
('2019-09-005', 2, 12.5, 2.5, 0, 0, 0, 0, 0, 5, 0, 0, 5, 4, 2, 45, 56, 'fail', 'no', ''),
('2019-09-008', 6, 30, 2.5, 2.5, 2.5, 2.5, 5, 0, 5, 5, 0, 5, 0, 0, 56, 88, 'fail', 'yes', 'Experienced, good in excel and typing.');

-- --------------------------------------------------------

--
-- Table structure for table `govt_exam`
--

CREATE TABLE `govt_exam` (
  `cnum` varchar(20) NOT NULL,
  `more_details` varchar(1000) DEFAULT NULL,
  `anything_else` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `govt_exam`
--

INSERT INTO `govt_exam` (`cnum`, `more_details`, `anything_else`) VALUES
('2019-09-002', 'wfwvwv', 'wvwvwv'),
('2019-09-004', 'hweuguf', 'jkwehuifhuewf');

-- --------------------------------------------------------

--
-- Table structure for table `hired_candidate`
--

CREATE TABLE `hired_candidate` (
  `cnum` varchar(20) NOT NULL,
  `ctc` int(15) NOT NULL,
  `date_of_joining` varchar(10) NOT NULL,
  `other_terms` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hired_candidate`
--

INSERT INTO `hired_candidate` (`cnum`, `ctc`, `date_of_joining`, `other_terms`) VALUES
('2019-09-003', 45002, '2020-03-04', 'jkwuchweuifh'),
('2019-09-008', 60000, '2019-02-23', 'ugyftdtrdey');

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `cnum` varchar(20) NOT NULL,
  `noticable_point` varchar(1024) NOT NULL,
  `hr_feedback` varchar(1024) NOT NULL,
  `recomendation` varchar(10) NOT NULL,
  `register_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interview`
--

INSERT INTO `interview` (`cnum`, `noticable_point`, `hr_feedback`, `recomendation`, `register_time`) VALUES
('2019-09-003', 'wFUIHFUIEWFIAEAEAG', 'KHIHIUHFWEUIAFUIHEWF', 'proceed', '00:01:51'),
('2019-09-004', 'HUYWQGYf', 'uigyyugywqd', 'reject', '00:02:22'),
('2019-09-008', 'vghftydrdr', 'yfytftytf', 'proceed', '22:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `last_emp`
--

CREATE TABLE `last_emp` (
  `cnum` varchar(20) NOT NULL,
  `name_of_org` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `tenure` int(10) DEFAULT NULL,
  `last_salary` int(10) DEFAULT NULL,
  `reason` varchar(500) DEFAULT NULL,
  `notice_period` int(10) DEFAULT NULL,
  `exp_salary` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `last_emp`
--

INSERT INTO `last_emp` (`cnum`, `name_of_org`, `designation`, `tenure`, `last_salary`, `reason`, `notice_period`, `exp_salary`) VALUES
('2019-09-007', '', '', 0, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `led_team`
--

CREATE TABLE `led_team` (
  `cnum` varchar(20) NOT NULL,
  `role` varchar(10) DEFAULT NULL,
  `num_of_mem` int(10) DEFAULT NULL,
  `capacity` varchar(1000) DEFAULT NULL,
  `responsibility` varchar(1000) DEFAULT NULL,
  `instance` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `led_team`
--

INSERT INTO `led_team` (`cnum`, `role`, `num_of_mem`, `capacity`, `responsibility`, `instance`) VALUES
('2019-09-004', 'manage', 11, 'ewjhcuihweu', 'jkewufhuihcvev', 'kjwuihuiwhe');

-- --------------------------------------------------------

--
-- Table structure for table `managed_client`
--

CREATE TABLE `managed_client` (
  `cnum` varchar(20) NOT NULL,
  `role` varchar(10) DEFAULT NULL,
  `num_of_client` int(10) DEFAULT NULL,
  `capacity` varchar(1000) DEFAULT NULL,
  `responsibility` varchar(1000) DEFAULT NULL,
  `expectation` varchar(1000) DEFAULT NULL,
  `big_issue` varchar(1000) DEFAULT NULL,
  `delivery` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managed_client`
--

INSERT INTO `managed_client` (`cnum`, `role`, `num_of_client`, `capacity`, `responsibility`, `expectation`, `big_issue`, `delivery`) VALUES
('2019-09-004', '', 11, 'jbygygyugdwc', 'uihugewgyeag', 'judwgUG7AEWGFYC', 'UHWQUIdwgfiy', 'euiahuihuihv');

-- --------------------------------------------------------

--
-- Table structure for table `no_fresher`
--

CREATE TABLE `no_fresher` (
  `cnum` varchar(20) NOT NULL,
  `is_working_anywhere` varchar(8) NOT NULL,
  `is_led_team` varchar(8) NOT NULL,
  `is_managed_client` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `no_fresher`
--

INSERT INTO `no_fresher` (`cnum`, `is_working_anywhere`, `is_led_team`, `is_managed_client`) VALUES
('2019-09-004', 'yes', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `cnum` varchar(20) NOT NULL,
  `salutation` varchar(8) NOT NULL,
  `re_interview` varchar(8) NOT NULL,
  `motivation` varchar(1024) DEFAULT NULL,
  `father_name` varchar(50) NOT NULL,
  `father_occupation` varchar(50) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `mother_occupation` varchar(50) NOT NULL,
  `m_other_occupation` varchar(100) DEFAULT NULL,
  `is_sibling` varchar(8) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `spouse_name` varchar(50) DEFAULT NULL,
  `spouse_occupation` varchar(50) DEFAULT NULL,
  `sp_other_occupation` varchar(100) DEFAULT NULL,
  `is_child` varchar(8) DEFAULT NULL,
  `planning` varchar(50) DEFAULT NULL,
  `residence` varchar(20) NOT NULL,
  `locality` varchar(50) NOT NULL,
  `estimated_time` int(5) NOT NULL,
  `transport` varchar(20) NOT NULL,
  `is_family_member_ca` varchar(8) NOT NULL,
  `short_term_plans` varchar(1024) NOT NULL,
  `long_term_plans` varchar(1024) NOT NULL,
  `is_med_issue` varchar(8) NOT NULL,
  `is_phy_issue` varchar(20) DEFAULT NULL,
  `is_mental_issue` varchar(20) DEFAULT NULL,
  `desc_issue` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`cnum`, `salutation`, `re_interview`, `motivation`, `father_name`, `father_occupation`, `mother_name`, `mother_occupation`, `m_other_occupation`, `is_sibling`, `marital_status`, `spouse_name`, `spouse_occupation`, `sp_other_occupation`, `is_child`, `planning`, `residence`, `locality`, `estimated_time`, `transport`, `is_family_member_ca`, `short_term_plans`, `long_term_plans`, `is_med_issue`, `is_phy_issue`, `is_mental_issue`, `desc_issue`) VALUES
('2019-09-002', 'Mr.', 'yes', 'wec', 'cwec', 'wecwec', 'wecwec', 'Others', 'wewed', 'yes', 'Married', 'fvs', 'Others', 'swf', 'yes', '', 'North Kolkata', 'hdfbdfb', 2, 'Two-wheeler', 'CA', 'ererfrf', 'egrerger', 'yes', 'no', 'no', 'ergerg'),
('2019-09-003', 'Mr.', 'NO', '', 'Dilip Shetty', 'CEO', 'Rima Shetty', 'Home-Maker', '', 'no', 'Single', '', '', '', 'no', '', 'North Kolkata', 'KOLKATA', 13, 'Auto', 'no', 'bwef', 'uheugw', 'no', 'no', 'no', ''),
('2019-09-004', 'Mr.', 'NO', '', 'Dilip Shetty', 'CEO', 'Rima Shetty', 'Others', 'zxc', 'yes', 'Separated', 'fwagag', 'Others', 'Software Engineer', 'yes', '', 'North Kolkata', 'KOLKATA', 12, 'Auto', 'CA', 'kjhuihugygygcs', 'klmkihuihuihcuihuischsc', 'yes', 'no', 'no', 'Weak'),
('2019-09-005', 'Mr.', 'NO', '', 'Dilip Shetty', 'CEO', 'Rima Shetty', 'Home-Maker', '', 'no', 'Single', '', '', '', 'no', '', 'North Kolkata', 'KOLKATA', 4, 'Metro', 'no', 'wqf', 'ewff', 'no', 'no', 'no', ''),
('2019-09-007', 'Mr.', 'NO', '', 'wef', 'CEO', 'Rima Shetty', 'Home-Maker', '', 'yes', 'Single', '', '', '', 'yes', '', 'North Kolkata', 'sdc', 56, 'Metro', 'yes', 'ui87', 'jugyut', 'no', 'no', 'no', ''),
('2019-09-008', 'Mr.', 'NO', '', 'Dilip Shetty', 'CEO', 'Rima Shetty', 'Home-Maker', '', 'no', 'Single', '', '', '', 'no', '', 'North Kolkata', 'KOLKATA', 4, 'Metro', 'no', 'jbug', 'hgyf', 'no', 'no', 'no', ''),
('2019-09-010', 'Mr.', 'NO', '', 'Dilip Shetty', 'CEO', 'Rima Shetty', 'Home-Maker', '', 'no', 'Single', '', '', '', 'no', '', 'North Kolkata', 'KOLKATA', 12, 'Metro', 'no', 'dcugywgdcy', 'jkhihcduihuidcg', 'no', 'no', 'no', ''),
('2019-09-009', 'Mr.', 'NO', '', 'Dilip Shetty', 'CEO', 'Rima Shetty', 'Home-Maker', '', 'no', 'Single', '', '', '', 'no', '', 'North Kolkata', 'KOLKATA', 4, 'Metro', 'no', 'hrdfh', 'hrxru', 'no', 'no', 'no', '');

-- --------------------------------------------------------

--
-- Table structure for table `professional_course`
--

CREATE TABLE `professional_course` (
  `cnum` varchar(20) NOT NULL,
  `ca` varchar(8) DEFAULT NULL,
  `cs` varchar(8) DEFAULT NULL,
  `costing` varchar(8) DEFAULT NULL,
  `other` varchar(8) DEFAULT NULL,
  `last_exam` varchar(50) DEFAULT NULL,
  `next_exam` varchar(20) DEFAULT NULL,
  `leave_for_exam` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professional_course`
--

INSERT INTO `professional_course` (`cnum`, `ca`, `cs`, `costing`, `other`, `last_exam`, `next_exam`, `leave_for_exam`) VALUES
('2019-09-002', 'CA', '', '', '', 'Foundation', '2019-09', 3),
('2019-09-004', 'CA', '', 'Costing', '', 'Foundation', '2020-08', 20);

-- --------------------------------------------------------

--
-- Table structure for table `professional_details`
--

CREATE TABLE `professional_details` (
  `cnum` varchar(20) NOT NULL,
  `is_fresher` varchar(8) NOT NULL,
  `is_pro_course` varchar(8) NOT NULL,
  `is_govt_exam` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professional_details`
--

INSERT INTO `professional_details` (`cnum`, `is_fresher`, `is_pro_course`, `is_govt_exam`) VALUES
('2019-09-002', 'yes', 'yes', 'yes'),
('2019-09-003', 'yes', 'no', 'no'),
('2019-09-004', 'no', 'yes', 'yes'),
('2019-09-005', 'yes', 'no', 'no'),
('2019-09-007', 'yes', 'no', 'no'),
('2019-09-008', 'yes', 'no', 'no'),
('2019-09-010', 'yes', 'no', 'no'),
('2019-09-009', 'yes', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `question_bank`
--

CREATE TABLE `question_bank` (
  `qid` int(11) NOT NULL,
  `statement` varchar(1024) NOT NULL,
  `answer1` varchar(512) NOT NULL,
  `answer2` varchar(512) NOT NULL,
  `answer3` varchar(512) NOT NULL,
  `answer4` varchar(512) NOT NULL,
  `correctanswer` tinyint(4) NOT NULL,
  `cat_id` int(4) DEFAULT NULL,
  `level_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_bank`
--

INSERT INTO `question_bank` (`qid`, `statement`, `answer1`, `answer2`, `answer3`, `answer4`, `correctanswer`, `cat_id`, `level_id`) VALUES
(1, 'When a customer returns goods, the account to be debited is:', 'Revenue Account', 'Cash Account', 'Return Inward Account', 'Return Outward Account', 3, 1, 1),
(2, 'The document sent to a customer when s/he returns the goods sold to her/him is called a:', 'Credit note', 'Debit note', 'Invoice', 'Promissory note', 1, 1, 1),
(3, 'Which of the following statement is most appropriate?', 'Adjusting entries affect the balance sheet only', 'Adjusting entries affect the income statement only', 'Adjusting entries affect both the balance sheet and the income statement', 'Adjusting entries may affect two or more accounts within the balance sheet or two or more accounts within the income statement but the adjustment(s) cannot affect both the balance sheet and the income statement simultaneously', 3, 1, 1),
(4, 'Rs. 1,500 spent on repairs before using a second-hand car purchased recently is a:', 'Capital expenditure', 'Revenue expenditure', 'Prepaid revenue expenditure', 'None of the above', 1, 1, 1),
(5, 'Adjusting entry for outstanding rent is:', 'Outstanding Rent Account ………. Dr.\r\nTo Rent Account\r\n', 'Outstanding Rent Account ………. Dr.\r\nTo Cash Account\r\n', 'Rent Account ………. Dr.\r\nTo Accounts Payable Account\r\n', 'Rent Account ………. Dr.\r\nTo Outstanding Rent Account\r\n', 4, 1, 1),
(6, 'The owner of the business takes Rs. 100 in cash and goods costing Rs. 200 for his family. The journal entry for this transaction is:', 'Drawings Account ………. Dr. \r\nTo Cash Account\r\nTo Purchase Account\r\n', 'Drawings Account\r\nTo Cash Account\r\nTo Goods Account\r\n', 'Drawings Account ………. Dr.\r\nTo Cash Account\r\n		To Sales Account', 'Cash Account ………. Dr.\r\nPurchase Account ………. Dr.\r\nTo Drawings Account\r\n', 1, 1, 1),
(7, 'Commission received in advance is a:', 'Personal Account ', 'Nominal Account', 'Real Account', 'None of the above', 1, 1, 1),
(8, 'The correct entry for the sale of goods on credit is:', 'Accounts receivable ………. Dr.\r\nTo Profit & Loss Account\r\n', 'Cash Account ………. Dr.\r\nTo Sales Account\r\n', 'Accounts Receivable ………. Dr.\r\nTo Asset Account\r\n', 'Accounts Receivable ………. Dr. \r\nTo Sales Account\r\n', 4, 1, 1),
(9, 'Brown Glory Co. has:\r\na. Sales revenue – Rs. 1,50,000 \r\nb. Sales discount – Rs. 12,000 \r\nc. Sales return – Rs. 24,000\r\nd. Cost of goods sold – Rs. 60,000\r\nWhat is the net sales revenue of Brown Glory Co.?', 'Rs. 1,02,000', 'Rs. 54,000', 'Rs. 90,000', 'Rs. 1,14,000', 4, 1, 1),
(10, 'Merchandise stolen by someone should be debited to:', 'Loss on transit Account', 'Sales Account', 'Loss by Theft Account', 'No entry should be passed', 3, 1, 1),
(11, 'All the acceptances received from debtors are recorded in the:', 'Cash Account', 'Debtors Account', 'Accounts Receivable', 'Accounts Payable', 3, 1, 1),
(12, 'Credit purchase of machinery is recorded in the:', 'Cash Account', 'Purchase Account ', 'Sales Account', 'Journal Proper', 4, 1, 1),
(13, 'Which one of the following is a correct adjusting entry to record depreciation on furniture?', 'Depreciation Account – Furniture ………. Dr.\r\nTo Accumulated Depreciation – Furniture\r\n', 'Depreciation Account – Furniture ………. Dr.\r\nTo Fixed Assets Account\r\n', 'Depreciation Account – Furniture ………. Dr.\r\nTo Capital Account\r\n', 'Accumulated Depreciation – Furniture ………. Dr.\r\nTo Depreciation Account – Furniture\r\n', 1, 1, 1),
(14, 'An account having a credit balance in the general ledger will be classified as:', 'An Asset Account', 'An Expense Account', 'A Liability Account', 'None of the above', 1, 1, 1),
(15, 'Cost of goods sold – Rs. 1,50,000\nClosing inventory – Rs. 40,000\nOpening inventory – Rs. 60,000\nFind the amount of purchases:', 'Rs. 1,30,000', 'Rs. 1,70,000', 'Rs. 50,000', 'None of the above', 1, 1, 1),
(16, 'The correct entry for purchase of goods on credit is:', 'Purchase Account ………. Dr. \r\nTo Cash Account', 'Purchase Account ………. Dr. \r\nTo Accounts Payable', 'Purchase Account ………. Dr. \r\nTo Liability Account', 'Accounts Payable ………. Dr. \r\nTo Purchase Account', 2, 1, 1),
(18, 'The correct journal entry for return of goods purchased from Mr. John on credit is:', 'Cash Account ………. Dr.\r\nTo Purchase Account', 'Mr. John’s Account ………. Dr.\r\nTo Goods Account', 'Mr. John’s Account ………. Dr.\r\nTo Purchase Returns & Allowances Account', 'None of the above', 3, 1, 1),
(19, 'When a customer returns goods, the account to be debited is:', 'Revenue Account', 'Cash Account', 'Return Inward Account', 'Return Outward Account', 3, 1, 1),
(20, 'What is meant by accounts receivable?', 'Money owed to a company by its debtors', 'Money owed by a company to its creditors', 'Money owed to a company by its employees', 'Money owed by a company to its vendors', 1, 1, 1),
(21, 'Find the odd one out: 3, 5, 11, 14, 17, 21', '5', '3', '17', '14', 4, 2, 1),
(22, 'What number should come last in the pattern: 9, 16, 23, 30, ___', '33', '36', '37', '43', 3, 2, 1),
(23, 'Solve: 0.9 X 0.007 = _________', '0.063', '0.0063', '0.63', '0.00063', 2, 2, 1),
(24, 'One-fifth of John’s expenditure is equal to one-half of his savings. If his monthly income is Rs.6300 how much amount does he save?', 'Rs. 1,550', 'Rs. 1,800', 'Rs. 2,000', 'Rs. 2,350', 2, 2, 1),
(25, 'The profit obtained by selling an article for Rs. 56 is the same as the loss obtained by selling it for Rs. 42. What is the cost price of the article?', 'Rs. 40', 'Rs. 50', 'Rs. 49', 'None of the above', 3, 2, 1),
(26, 'What number should fill the blank in the given series: \r\nV, VIII, XI, XIV, __, XX', 'IX', 'XXIII', 'XV', 'XVII', 4, 2, 1),
(27, 'What is 75% of 5?', '4', '5.4', '8', '1', 1, 2, 1),
(28, 'Your mother\'s brother\'s only brother-in-law is asleep on your couch. Who is asleep on your couch?', 'Your Uncle', 'Your Father', 'Your Grandfather', 'Your Cousin', 2, 2, 1),
(29, 'Bob\'s father has 4 children. Momo, Meme, and Mumu are three of them. Who\'s the fourth?', 'Mama', 'Mimi', 'Moeu', 'None of the above', 4, 2, 1),
(30, 'Which of the following is a prime number?', '99', '49', '51', '97', 4, 2, 1),
(31, 'Find the odd one out: 10, 14, 16, 18, 21, 24, 26', '14', '18', '21', '24', 3, 2, 1),
(32, 'Which of the following is not a prime number?', '31', '61', '71', '91', 4, 2, 1),
(33, 'What number comes next in the pattern: 14, 26, 38, 50, ___', '62', '64', '56', '78', 1, 2, 1),
(34, 'A fruit-seller sells 40% of his apples and still has 420 apples left. When he started selling, he had:', '588 apples', '600 apples', '700 apples', '672 apples', 1, 2, 1),
(35, 'If 20% of a = b, then b% of 20 is the same as:', '5% of a', '4% of a', '20% of a', 'None of the above', 2, 2, 1),
(36, 'Alfred buys an old scooter for Rs. 4,700 and spends Rs. 800 on its repairs. If he sells the scooter for Rs. 5,800, his gain percent is:', '4.54%', '5.45%', '5%', '4%', 2, 2, 1),
(37, 'Solve: 0.009/ ___ = 0.01', '0.009', '0.09', '0.9', '9', 3, 2, 1),
(38, 'Ajay said, \"This girl’s mother\'s brother is the only son of my mother\'s father.\" How is the girl\'s mother related to Ajay?', 'Ajay’s aunt', 'Ajay’s mother', 'Ajay’s cousin', 'None of the above', 1, 2, 1),
(39, 'Larry’s father has five sons named Ten, Twenty, Thirty, Forty, ___. Guess what would be the name of the fifth?', 'Fifty', 'Zero', 'Twenty-five', 'None of the above', 4, 2, 1),
(40, 'Solve: ½ ÷ ?', '1/3', '0.6', '3', 'None of the above', 3, 2, 1),
(41, 'Find the odd one out: 3, 5, 7, 12, 17, 19', '19', '17', '5', '12', 4, 2, 1),
(42, 'Identify the correct sentence:', 'The students was jumping and falling all over the place.', 'The students were jumping and fell all over the place.', 'The students were jumping and falling all over the place.', 'The students jumped and were falling all over the place.', 3, 3, 1),
(43, 'Fill in the blanks: The boy is ____ the class.', 'in', 'into', 'by', 'within', 1, 3, 1),
(44, 'Fill in the blanks: In some countries, ______very hot all the time.', 'there is', 'is', 'it is', 'it were', 3, 3, 1),
(45, 'Fill in the blanks: You have no authority _____ say so.', 'for', 'over', 'upon', 'to', 4, 3, 1),
(46, 'Fill in the blanks: Who is ____________, Marina or Sachiko?', 'tallest', 'more taller', 'taller', 'more tall', 3, 3, 1),
(47, 'Fill in the blanks: The concert will begin ________ fifteen minutes.', 'in', 'about', 'by', 'into', 1, 3, 1),
(48, 'Fill in the blanks: Eli\'s hobbies include jogging, swimming, and __________.', 'to climb mountains', 'climb mountains', 'to climb', 'climbing mountains', 4, 3, 1),
(49, 'Fill in the blanks: The majority of the news ______ about violence or scandal.', 'is', 'am', 'are', 'were', 1, 3, 1),
(50, 'Choose the correct sentence:', 'Each day after school, Jerome run five miles.', 'Each day after school, Jerome runs five miles.', 'Each day after school Jerome run five mile.', 'Each days after school Jerome run five miles.', 2, 3, 1),
(51, 'Fill in the blanks: He is addicted _____ gambling.', 'to', 'for', 'within', 'as', 1, 3, 1),
(52, 'The following will have debit balance:', 'Loan to other party', 'Capital account', 'Outstanding salary account', 'Revenue for doubtful debts', 1, 1, 2),
(53, 'Following figures have been taken from trial balance of a trader:\r\na. Cost of goods sold – Rs. 45,000\r\nb. Sales – Rs. 60,000\r\nc.Closing inventory – Rs. 10,000\r\nThe amount of gross profit will be:', 'Rs. 15,000', 'Rs. 25,000', 'Rs. 5,000', 'None of the above', 1, 1, 2),
(54, 'Journal entry for wages paid for installation of plant will be: ', 'Plant Account ………. Dr.\r\n         To Cash Account', 'Wages Account ………. Dr.\r\n         To Cash Account', 'Plant Repairs Account ………. Dr.\r\n         To Cash Account', 'None of the above', 1, 1, 2),
(55, 'Rs. 1,500 spent on repairs before using a second-hand car purchased recently is a:', 'Capital expenditure', 'Revenue expenditure', 'Prepaid revenue expenditure', 'None of the above', 1, 1, 2),
(56, 'Net salary paid to employees Rs. 45,000 in cash after deducting income tax Rs. 1,000, professional tax Rs. 200, employees provident fund Rs. 2,000, staff welfare fund Rs. 100 and recovery of loan Rs. 1,700. Salary account will be debited with:', 'Rs. 50,000', 'Rs. 45,000', 'Rs. 48,000', 'None of the above', 1, 1, 2),
(57, 'A manager gets 5% commission on sales. Cost price of goods sold is Rs. 40,000 which he sells at a margin of 20% on sale. Commission will be:', 'Rs. 2,500', 'Rs. 2,400', 'Rs. 2,000', 'None of the above', 1, 1, 2),
(58, 'The correct entry for the sale of goods on credit is:', 'Accounts Receivable ………. Dr.\r\n           To Profit & Loss Account', 'Cash Account ………. Dr.\r\n          To Sales Account', 'Accounts Receivable ………. Dr.\r\n          To Asset Account', 'Accounts Receivable ………. Dr.\r\n          To Sales Account', 4, 1, 2),
(59, 'Which of the following documents authorizes the purchase transaction?', 'Credit memo from supplier', 'Invoice or bill from supplier', 'Purchase order', 'Purchase requisition', 3, 1, 2),
(60, 'Unexpired portion of capital expenditure is shown in:', 'Trading account', 'Profit and loss account', 'Balance sheet', 'None of the above', 3, 1, 2),
(63, 'When a customer returns goods, the account to be debited is:', 'Revenue Account', 'Cash Account', 'Return Inward Account', 'Return Outward Account', 3, 1, 2),
(64, 'After preparing the trial balance the accountant finds that the total of the credit side is short by Rs. 2,000. This difference will be:', 'Debited to Suspense Account', 'Credited to Suspense Account', 'Adjusted to any of the credit balance account', 'djusted to any of the debit balance account', 2, 1, 2),
(65, 'Commission Received in Advance is a:', 'Personal Account', 'Nominal Account', 'Real Account', 'None of the above', 1, 1, 2),
(66, 'A second-hand car is purchased for Rs. 15,000, the amount of Rs. 1,000 is spent on its repairs, Rs. 500 is incurred to get the car registered in owner’s name and Rs. 1,200 is paid as dealer’s commission. The amount debited to Car Account will be:', 'Rs. 17,700', 'Rs. 16,000', 'Rs. 16,500', 'Rs. 17,000', 1, 1, 2),
(67, 'Rings and pistols of an engine were charged at accost of Rs. 5,000 to increase fuel efficiency is:', 'Capital Expenditure', 'Revenue Expenditure', 'Prepaid Revenue Expenditure', 'None of the above', 1, 1, 2),
(68, 'a. Cost of goods sold – Rs. 1,50,000\r\nb. Closing inventory – Rs. 40,000\r\nc. Opening inventory – Rs. 60,000\r\nFind the amount of purchases:', 'Rs. 1,30,000', 'Rs. 1,70,000', 'Rs. 50,000', 'None of the above', 1, 1, 2),
(69, 'The owner of the business takes Rs. 100 in cash and goods costing Rs. 200 for his family. The journal entry for this transaction is:', 'Drawings Account ………. Dr.\r\n             To Cash Account\r\n             To Purchase Account', 'Drawings Account ………. Dr.\r\n      To Cash Account\r\n      To Goods Account', 'Drawings Account ………. Dr.\r\n      To Cash Account\r\n      To Sales Account', 'Cash Account ………. Dr.\r\n	  Purchase Account ………. Dr.\r\n            To Drawings Account', 1, 1, 2),
(70, 'What is meant by Accounts Receivable?', 'Money owed to a company by its debtors', 'Money owed by a company to its creditors', 'Money owed by a company to its creditors', 'Money owed by a company to its vendors', 1, 1, 2),
(71, 'Closing entry for transfer of net profit Rs 6300 to capital account will be:', 'Trading Account ………. Dr.\r\n                    To Balance Sheet', 'Trading Account ………. Dr.\r\n                    To Profit and Loss Account', 'Profit and Loss Account ………. Dr.\r\n                      To Capital Account', 'Capital Account ………. Dr.\r\n                     To Profit and Loss Account', 3, 1, 2),
(72, 'Which of phrases given below each sentence should replace the underlined phrase to make the grammatically correct? \r\nHad you been told me about your problem, I would have helped you.', 'If you would have told', 'Had you have told', 'Had you told', 'If you have told', 3, 3, 2),
(73, 'Pick out the most effective word(s) from the given words to fill in the blank to make the sentence meaningfully complete.\r\nAyesha always _____ the permission of her father before going for movies.\r\n', 'seeking', 'sought', 'seeker', 'seeks', 4, 3, 2),
(74, 'Pick out the most effective word(s) from the given words to fill in the blank to make the sentence meaningfully complete.\r\nIn high school many of us never realized the importance that grammar would ______in later life.\r\n', 'exercise', 'figure', 'play', 'portray', 3, 3, 2),
(75, 'Find the correctly spelt words.', 'Foreign', 'Foreine', 'Foreing', 'None of the above', 1, 3, 2),
(76, 'In the question given below, there is a sentence of which some parts have been jumbled up. Rearrange these parts which are labelled P, Q, R and S to produce the correct sentence. Choose the proper sequence.\r\n        “When he ___________________”\r\n         P:did not know\r\n         Q:he was nervous and\r\n         R:heard the hue and cry at midnight\r\n         S:what to do\r\n          The Proper sequence should be:\r\n', 'RQPS', 'PQRS', 'SRQP', 'RPQS', 1, 3, 2),
(77, 'Which of phrases given below each sentence should replace the underlined phrase to make the grammatically correct?\r\n  ‘The man to who I sold my house was a cheat.’', 'to whom I sell', 'to who I sell', 'who was sold to', 'to whom I sold', 4, 3, 2),
(78, 'Fill in the blanks with correct option: \r\n     His conduct is bad, and his honesty is not ____ suspicion.\r\n', 'beyond', 'above', 'under', 'in', 2, 3, 2),
(79, 'Which of phrases given below each sentence should replace the underlined phrase to make the grammatically correct? \r\nHe never has and ever will take such strong measures.', 'had taken nor will ever take', 'had taken and will ever take', 'has and never will take', 'had and ever will take', 1, 3, 2),
(80, 'Fill in the blanks:\r\nMany ___decisions were taken at the meeting.\r\n', 'historic', 'hectic', 'historical', 'histrionic', 1, 3, 2),
(81, 'Pick out the most effective word from the given words to fill in the blank to make the sentence meaningfully complete.\r\nThe robbers were arrested and ____prison yesterday.\r\n', 'taken to', 'brought into', 'taken into', 'brought to', 1, 3, 2),
(82, 'In the question below five words are given. Find out that word, the spelling of which is wrong.', 'Filled', 'Skilled', 'Fulfilled', 'All correct', 3, 3, 2),
(83, 'In the question below, there is a sentence of which some parts have been jumbled up. Rearrange these parts which are labelled P, Q, R and S to produce the correct sentence. Choose the proper sequence.\r\n“It was to be_________”\r\nP: before their school examination \r\nQ: which was due to start \r\nR: the last expedition \r\nS: in a month’s\r\nThe proper sequence should be:', 'RPQS', 'PQRS', 'SRQP', 'RQPS', 1, 3, 2),
(84, 'Select the grammatically correct sentence.', 'You need not come unless you want to.', 'You don\'t need to come unless you want to.', 'You come only when you want to.', 'You come unless you don\'t want to.', 2, 3, 2),
(85, 'Fill in the blank with appropriate word:\r\nThe ruling party will have to put its own house _____ order.\r\n', 'in', 'on', 'through', 'to', 1, 3, 2),
(86, 'Which of the following is largest fraction amongst: 5/8, 3/7, 2/9, 4/5?', '3/7', '5/8', '4/5', 'All are equal', 3, 2, 2),
(87, 'If a shopkeeper gives 20% discount and then 10% discount on a pen, which has the marked price of Rs. 500, how much would be the selling price of the pen?', 'Rs.350', 'Rs.150', 'Rs.320', 'Rs.360', 4, 2, 2),
(88, 'Tea is to Leave as Coffee is to ________.', 'Plant', 'Leave', 'Beverage', 'Seeds', 4, 2, 2),
(89, 'What will be value of:\r\n74.6 - 38.9 - 5.7', '30', '29.5', '28', '30.5', 1, 2, 2),
(90, 'Find the odd one out:\r\n10, 25, 45, 54, 60, 75, 80', '10', '45', '54', '75', 3, 2, 2),
(91, '3/4 part of tank is full of water. When 30 litres of water is taken out it becomes empty. The capacity of the tank is?', '36 litres', '42 litres', '40 litres', '38 litres', 3, 2, 2),
(92, 'The average weight of 8 people increases by 2.5 kg when a new person comes in place of one of them weighing 65 kg. What might be the weight of the new person?', '76 kg', '76.5 kg', '85 kg', 'None of these', 3, 2, 2),
(93, 'Look carefully for the pattern, and then choose which number should be filled in the blank:\n34, 43, __, 54, 56, 65', '45', '53', '48', '47', 1, 2, 2),
(94, 'Pointing to a photograph Lata says,\"He is the son of the only son of my grandfather.\" How is the man in the photograph related to Lata?', 'Brother', 'Uncle', 'Cousin', 'Step-father', 1, 2, 2),
(95, 'A can do a work in 15 days and B in 20 days. If they work on it together for 4 days, then the fraction of the work that is left is:', '1/4', '1/10', '7/10', '8/15', 4, 2, 2),
(96, 'There is a 10% discount on a dozen pairs of trousers marked at Rs. 8,000. How many pair of trousers can be bought with Rs.2,400?', '4', '5', '8', '2', 1, 2, 2),
(97, 'What is increasing order of the fractions: 6/7, 8/9, 7/8, 9/10?', '8/9, 7/8, 9/10', '9/10, 7/8, 8/9', '7/8, 8/9, 9/10', '9/10, 8/9, 7/8', 3, 2, 2),
(98, 'Find the odd one: 8, 27, 64, 100, 125, 216, 343', '27', '100', '125', '343', 2, 2, 2),
(99, 'The average age of Ram and Shyam is 65 years. The average age of Ram, Shyam and John is 53 years. What is the age of John?', '29 years', '31 years', '59 years', '45 years', 1, 2, 2),
(100, 'A number is multiplied by its one-third to get 192. Find the number.', '16', '20', '24', '28', 3, 2, 2),
(101, 'Look carefully for the pattern, and then choose which number should be filled in the blank: 42 41 39 __32', '38', '36', '35', '34', 2, 2, 2),
(102, 'Introducing a boy, a girl said, \"He is the son of the daughter of the father of my uncle.\" How is the boy related to the girl?', 'Brother', 'Nephew', 'Uncle', 'Son in law', 1, 2, 2),
(103, 'Steve\'s father has four children. If the first three are named Sam, Sem, and Sim, what is the fourth\'s name?', 'Sum', 'Som', 'Son', 'None of the above', 4, 2, 2),
(104, 'Which is heavier of the two:\r\na. a pound of feather or\r\nb. a pound of gold\r\n', 'Feather', 'Gold', 'Neither', 'Can’t say', 3, 2, 2),
(105, 'A can lay railway track between two given stations in 16 days and B can do the same job in 12 days. With help of C, they did the job in 4 days only. Then, how much work did C do in a day when working with A and C:', '4/58', '5/48', '4/48', '5/58', 2, 2, 2),
(106, 'When closing inventory is understated, net income for the accounting period will be:', 'Overstated', 'Understated', 'Will not be affected', 'None of the above', 2, 1, 3),
(107, 'On equity shares of Rs. 10, the company has called up Rs. 9 but actually received Rs. 8. The share capital would be credited by:', 'Rs. 10', 'Rs. 9', 'Rs. 8', 'Rs. 5', 2, 1, 3),
(108, 'a. Cash sales – Rs. 1,40,000\r\nb. Total sales – Rs. 5,26,000\r\nc. Bad debts – Rs. 14,000\r\nd. Opening trade receivables - Rs. 60,000\r\ne. Closing trade receivables – Rs. 32,000\r\nCash collected from receivables will be:', 'Rs. 4,00,000', 'Rs. 5,40,000', 'Rs. 5,00,000', 'None of the above', 1, 1, 3),
(109, 'The total of Discount Allowed column in the cash book for the month of July, 2010 amounting to Rs. 10000 was not posted. Rectifying entry for the same will be:', 'Discount Allowed Account ………. Dr. \r\n                To Suspense Account', 'Suspense Account ………. Dr. \r\n                To Discount Allowed Account', 'Customer Account ………. Dr. \r\n                To Discount Allowed Account', 'None of the above', 1, 1, 3),
(110, 'On 1st January 2009, Loose Tools Account showed the balance of Rs. 4,320. On 31st December 2009, closing balance of Loose Tools Account was Rs. 4,680. During the year loose tools were purchased for Rs. 1,440. Depreciation on loose tools will be:', 'Rs. 1,080', 'Rs. 1,200', 'Rs. 1,000', 'None of the above', 1, 1, 3),
(111, 'An item of purchase of Rs. 151 was entered in the purchase book at Rs. 15 and posted to supplier’s account as Rs. 51. Rectifying entry will be: ', 'Purchase Account ………. Dr. Rs. 136\r\n              To Suspense Account              Rs. 36\r\n              To Suppliers Account              Rs. 100', 'Purchase Account ………. Dr. Rs. 136\r\n              To Suppliers Account             Rs. 136', 'Purchase Account ………. Dr. Rs. 136\r\n              To Suspense Account             Rs. 136', 'None of the above', 1, 1, 3),
(112, 'The total of debit and credit side of Mr. Raja’s Trial Balance as on 31st March, 2016 were Rs. 20,000 and Rs. 10,000 respectively. The difference was transferred to Suspense Account. On 4th April 2016, it was found that the total of Sales Book was carried forward as Rs. 5,000 instead of Rs. 4,000. The balance of Suspense Account after rectification of this error will be:', 'Rs. 10,000', 'Rs. 11,000', 'Rs. 9,000', 'Rs. 12,000', 2, 1, 3),
(113, 'Goods of Rs. 600 (sales price) sent on sale on approval basis were included in Sales Book. The profit included in the sales was at 20% on cost. Closing stock will increase by:', 'Rs. 500', 'Rs. 600', 'Rs. 480', 'None of the above', 1, 1, 3),
(114, 'An undervaluation of previous year’s opening inventory will: ', 'Cause current year’s net income to be overstated', 'Cause previous year’s income to be overstated', 'Cause previous year’s income to be understated', 'None of the above', 2, 1, 3),
(115, 'If total sales for the year is Rs. 1,00,000, cash sales is Rs. 20,000 and outstanding trade receivables at the end of year is Rs. 30,000, then cash received from the customer during the year will be:', 'Rs. 70,000', 'Rs. 50,000', 'Rs. 90,000', 'Rs. 1,10,000', 2, 1, 3),
(116, 'Goods destroyed by fire Rs 50000 and insurance co. admitted full claim. Claim receivables will be recorded in:', 'Trading Account', 'Profit & Loss Appropriation Account', 'Profit & Loss Account', 'Balance Sheet', 4, 1, 3),
(117, 'The book value of an asset as on 1st April, 2011 is Rs. 1,00,000. Depreciation is charged on the assets @ 10%. on 1st October 2011, the asset is sold for Rs. 64,000. Profit or loss on the sale will be:', 'Rs. 30,000', 'Rs. 31,000', 'Rs. 36,000', 'None of the above', 2, 1, 3),
(118, 'Bills Receivable from Mr. A of Rs 1000 was posted to the credit of bills payable account and also credited to the account of Mr. A. Rectifying entry for the same will be:', 'Bills Payable ………. Dr.                   Rs. 1000\r\n        To A’s Account                                         Rs. 1000', 'Bills Receivable Account………. Dr. Rs. 1000\r\n        To A’s Account                                         Rs. 1000', 'Bills Receivable Account………. Dr. Rs. 1000\r\nBills Payable Account………. Dr.      Rs. 1000 \r\n        To Suspense Account                                Rs. 2000', 'None of the above', 3, 1, 3),
(119, '100 articles at the sale price of Rs 200 each sent to customer on approval basis were recorded as actual sales of that price. The sale price was made cost plus 25%. The amount of inventory on approval will be:', 'Rs. 16,000', 'Rs. 20,000', 'Rs. 15,000', 'None of the above', 1, 1, 3),
(120, 'Mohan paid Rs 500 towards a debit of Rs 2500 which was written off as bad in the previous year. Mohan’s Account will be credited with:', 'Rs. 2,500', 'Rs. 2,000', 'Rs. 500', 'None of the above', 4, 1, 3),
(121, 'When balance as per Cash Book is the starting point, and cheques issued for payment Rs. 400 was wrongly credited by bank as Rs. 900, then in The Bank Reconciliation Statement cash balance will be:', 'Added by Rs. 1,300', 'Subtracted by Rs. 1,300', 'Added Rs. 900', 'Subtracted by Rs. 400', 1, 1, 3),
(122, 'Fill in with suitable word: I have got some tea, but I do not have ___sugar.', 'some', 'more', 'any', 'a', 3, 3, 3),
(123, 'Replace the underlined phrase with suitable word: ‘The case was held over due to the great opposition to it.’', 'postponed', 'cancelled', 'stopped', 'dropped', 1, 3, 3),
(124, 'Fill in the blank with suitable word: Government buildings are ____on the Republic day.', 'enlightened', 'lightened', 'illuminated', 'glowed', 3, 3, 3),
(125, 'In the question, an incomplete statement followed by fillers is given. Pick out the best one which can complete incomplete stem correctly and meaningfully. ‘Although initial investigations pointed towards him _____. ‘', 'the preceding events corroborated his involvement in the crime', 'the additional information confirmed his guilt', 'the subsequent events established that he was guilt', 'the subsequent events proved that he was innocent', 4, 3, 3),
(126, 'In question given below, a part of the sentence is underlined. Below are given alternatives to the underlined part which may improve the sentence. Choose the correct alternative.  \r\n‘Not long back, in Japan, a mysterious nerve gas affected a large number of people.’', 'effected', 'infected', 'infested', 'affects', 2, 3, 3),
(128, 'Catching the earlier train will give us the ____to do some shopping.', 'Chance', 'luck', 'possibility', 'occasion', 1, 3, 3),
(129, 'Replace the underlined phrase with suitable words: \r\n‘Anand has the guts to rise from the occasion and come out successfully.’', 'in rising from', 'to raise with', 'to rise to', 'to rise against', 3, 3, 3),
(130, 'In the question, an incomplete statement followed by fillers is given. Pick out the best one which can complete incomplete stem correctly and meaningfully.\r\n‘Although, he is reputed for making very candid statements ______.', 'his today speech was not fairly audible', 'his promises had always been realistic', 'his speech was very interesting', 'his today\'s statements were very ambiguous', 4, 3, 3),
(131, 'Fill in the blanks with suitable word:\r\nWe had to pay more taxi fare because the driver brought us by a _____route.', 'circular', 'circumscribed', 'longest', 'circuitous', 4, 3, 3),
(132, 'Which of phrases given below each sentence should replace the underlined phrase to make the grammatically correct?\r\n‘We met him immediately after the session in which he had been given a nice speech.’', 'would be giving', 'has been given', 'will have given', 'had given', 4, 3, 3),
(133, 'A man has Rs. 480 in the denominations of one-rupee notes, five-rupee notes and ten-rupee notes. The number of notes of each denomination is equal. What is the total number of notes that he has?', '45', '60', '75', '90', 4, 2, 3),
(134, 'A trader mixes 26 kg of rice at Rs. 20 per kg with 30 kg of rice of other variety at Rs. 36 per kg and sells the mixture at Rs. 30 per kg. His profit percent is:', 'No profit no loss ', '5% profit', '8% profit', '5% negative profit', 2, 2, 3),
(135, 'Insert the missing number.\r\n8, 24, 12, 36, 18, 54, ___ ', '27', '36', '58', '76', 1, 2, 3),
(136, 'If 6th March, 2005 is Monday, what was the day of the week on 6th March, 2004?', 'Sunday', 'Wednesday', 'Tuesday', 'Friday', 1, 2, 3),
(137, 'Father is aged three times more than his son Ronit. After 8 years, he would be two and a half times of Ronit\'s age. After further 8 years, how many times would he be of Ronit\'s age?', '2 times', '2.3 times', '2.5 times', '3 times ', 1, 2, 3),
(138, 'Find the odd one out:\r\n331, 482, 551, 263, 383, 362', '331', '482', '383', '362', 3, 2, 3),
(139, 'If A + B means A is the father of B; A - B means A is the brother B; A % B means A is the wife of B and A x B means A is the mother of B, which of the following shows that M is the maternal grandmother of T?', 'M x N % S + T', 'M x N - S % T', 'M x S - N % T', 'M x N x S % T', 1, 2, 3),
(140, '36400 -:- 140 = 1/3 * ___?', '780', '680', '700', '800', 1, 2, 3),
(141, 'In an election between two candidates, one got 55% of the total valid votes, 20% of the votes were invalid. If the total number of votes was 7500, the number of valid votes that the other candidate got, was:', '2700', '2800', '2900', '3000', 1, 2, 3),
(142, 'In a 200 metres race A beats B by 35 m or 7 seconds. What is the speed of B?', '5 m/sec', '5 km/ hr', '28.5 m/sec', 'None of the above', 1, 2, 3),
(143, 'A number consists of two digits. If the digits interchange places and the new number is added to the original number, then the resulting number will be divisible by:', '3', '5', '9', '11', 4, 2, 3),
(144, 'Insert the missing number: 15, 31, 63, 127, 255, ___', '513', '511', '517', '523', 2, 2, 3),
(145, 'Today is Monday. After 345 days, it will be:', 'Wednesday', 'Thursday', 'Friday', 'Monday', 1, 2, 3),
(146, 'If A + B means A is the brother of B; A - B means A is the sister of B and A x B means A is the father of B. Which of the following means that C is the son of M?', 'M - N x C + F', 'F - C + N x M', 'M x N - C + F', 'N + M - F x C', 3, 2, 3),
(147, 'On selling 17 balls at Rs. 720, there is a loss equal to the cost price of 5 balls. The cost price of a ball is:', 'Rs. 45', 'Rs. 55', 'Rs. 60', 'Rs. 70', 3, 2, 3),
(148, 'Ayesha\'s father was 38 years of age when she was born while her mother was 36 years old when her brother four years younger to her was born. What is the difference between the ages of her parents?', '2 years', '4 years', '6 years', '8 years', 3, 2, 3),
(149, 'A man has some hens and cows. If the number of heads be 48 and the number of feet equals 140, then the number of hens will be:', '22', '24', '26', '28', 3, 2, 3),
(150, 'Find the odd one: \r\n8, 27, 64, 100, 125, 216, 343', '100', '125', '216', '27', 1, 2, 3),
(151, 'Rajeev buys good worth Rs. 6,650. He gets a rebate of 6% on it. After getting the rebate, he pays sales tax @ 10%. Find the amount he will have to pay for the goods.', 'Rs. 6,876.10', 'Rs. 6,999.20', 'Rs. 6,654', 'Rs. 7,000', 1, 2, 3),
(152, 'A student multiplied a number by 3/5 instead of 5/3. What is the percentage error in the calculation?', '34%', '44%', '54%', '64%', 4, 2, 3),
(153, 'Commenced business with cash as capital.', 'Cash Account ………. Dr.\r\n            To Capital Account', 'Capital Account ………. Dr.\r\n            To Cash Account', 'Business Account ………. Dr.\r\n            To Capital Account', 'Capital Account ………. Dr.\r\n             To Business Account', 1, 1, 4),
(154, 'Goods taken by the proprietor for personal use.', 'Drawings Account ………. Dr.\r\n             To Purchase Account', 'Drawings Account ………. Dr.\r\n             To Inventory Account', 'Inventory Account ………. Dr.\r\n             To Drawings Account', 'Purchase Account ………. Dr.\r\n             To Drawings Account', 2, 1, 4),
(155, 'Sold goods to Pranav on credit.', 'Pranav Account ………. Dr.\r\n             To Sales Account', 'Pranav Account ………. Dr.\r\n             To Inventory Account', 'Inventory Account ………. Dr.\r\n             To Sales Account', 'Inventory Account ………. Dr. \r\n             To Pranav Account', 1, 1, 4),
(156, 'Cash deposited into bank.', 'Cash Account ………. Dr.\r\n            To Bank Account', 'Bank Account ………. Dr.\r\n            To Deposit Account', 'Bank Account ………. Dr. \r\n            To Cash Account', 'Deposit Account ………. Dr.\r\n            To Cash Account', 3, 1, 4),
(157, 'Loan given to Bhuvan.', 'Bhuvan’s Loan Account ………. Dr.\r\n            To Bank Account', 'Bank Account ………. Dr.\r\n            To Bhuvan’s Loan Account', 'Cash Account ………. Dr.\r\n            To Bank Account', 'Bhuvan Account ………. Dr.\r\n            To Loan Account', 1, 1, 4),
(158, 'Withdrew from bank for office use.', 'Office Expenses Account  ………. Dr.\r\n            To bank Account', 'Office Expenses Account ………. Dr.\r\n            To Cash Account', 'Cash Account ………. Dr.\r\n            To Bank Account', 'Bank Account ………. Dr.\r\n            To Cash Account', 3, 1, 4),
(159, 'Goods were withdrawn by the proprietor for his personal use. The account to be credited is:', 'Sales Account', 'Drawings Account', 'Purchases Account', 'Expenses Account', 3, 1, 4),
(160, 'Provision for bad debts as on 1.4.2008 was Rs. 1,000 during the year 2008-09. There were no bad debts and debtors as on 31.3.2009 was Rs. 90,000. Provision for bad debts is required @ 1%. Which of the following journal entry will be passed on 31.3.2009?', 'Profit & Loss Account ………. Dr.      Rs. 100\r\n            To Provision for Bad Debts Account      Rs. 100', 'Provision for Doubtful Debts Account ………. Dr.      Rs. 100\r\n            To Profit & Loss Account      Rs. 100', 'Profit & Loss Account ………. Dr.      Rs. 900\r\n            To Provision for Bad Debts Account      Rs. 900', 'No entry will be passed', 2, 1, 4),
(161, 'Fixed Assets are held by business organization for:', 'Creating NPAs', 'Generating Income', 'Making Payments', 'None of the Above', 2, 1, 4),
(162, 'Mr. Nirmal has bought furniture for proprietor\'s residence and paid cash in the month of April. Pass Journal Entry for the transaction.', 'Drawings Account ………. Dr.\r\n            To Cash Account', 'Furniture Account ………. Dr.\r\n            To Cash Account', 'Drawings Account ………. Dr.\r\n            To Furniture Account', 'Furniture Account ………. Dr. \r\n            To Drawings Account', 1, 1, 4),
(163, 'Commenced business with cash as capital.', 'Cash Account ………. Dr.\r\n            To Capital Account', 'Capital Account ………. Dr.\r\n            To Cash Account', 'Business Account ………. Dr.\r\n            To Capital Account', 'Capital Account ………. Dr.\r\n            To Business Account', 1, 1, 4),
(164, 'Paid to Ayush by cheque on loan account.', 'Loan from Ayush Account ………. Dr.\r\n            To Bank Account', 'Bank Account ………. Dr.\r\n            To Ayush Account', 'Bank Account ………. Dr.\r\n            To Loan Account', 'Ayush Account ………. Dr.\r\n            To Loan Account', 1, 1, 4),
(165, 'Carriage paid on purchase of goods.', 'Carriage Inwards Account ………. Dr.\r\n            To Purchase Account', 'Carriage Inwards Account ………. Dr.\r\n            To Cash Account ', 'Cash Account ………. Dr.\r\n            To Carriage Inwards Account', 'Carriage Inwards Account ………. Dr.\r\n            To Cash Account', 2, 1, 4),
(166, 'Purchased stationary from Kagaz & Co. and paid by cheque.', 'Stationary Account ………. Dr.  \r\n            To Kagaz & Co. Account', 'Kagaz & Co. Account ………. Dr.   \r\n            To Stationary Account', 'Stationary Account ………. Dr.  \r\n            To Kagaz & Co. Account', 'Stationary Account ………. Dr.  \r\n            To Bank Accoun', 4, 1, 4),
(167, 'Paid salary to Mr. Charan.', 'Mr. Charan Account ………. Dr.  \r\n            To Cash Account', 'Mr. Charan Account ………. Dr.  \r\n            To Salary Account', 'Salary Account ………. Dr.   \r\n            To Cash Account', 'Mr. Charan Account ………. Dr.  \r\n            To Salary Account', 3, 1, 4),
(168, 'A furniture dealer during the financial year 2010-11, sold furniture of Rs. 25,000 to Mr. Sunil on cash basis. In the books of dealer ______ account will be debited and ________ account will be credited', 'Cash, Fixed Assets', 'Cash, Furniture', 'Cash, Sales', 'Cash, Sunil\'s', 3, 1, 4),
(169, 'Rent of proprietor\'s house paid from business account by cash will_______:-', 'Decrease the profit', 'Increase the profit', 'Reduce the capital of business', 'Reduce the cash as well as capital of business', 4, 1, 4),
(170, 'Capital of business is Rs. 75,000 and liability is Rs. 25,000 then total assets of business would be:', 'Rs. 1,00,000', 'Rs. 15,000', 'Rs. 75,000', 'Rs. 50,000', 1, 1, 4),
(171, 'Hashim Khan, the owner, invested Rs. 57,500 cash and Rs. 32,500 of photography equipment in the business where paid Rs. 3,000 cash for an insurance policy covering the next 24 months. Pass Journal Entry for the transaction.', 'Cash Account ………. Dr.      Rs. 54,500 \r\nPhotography Equipment Account ………. Dr.      Rs. 32,500 \r\nPrepaid Insurance Account ………. Dr.      Rs. 3,000\r\n            To Hashim Khan Account      Rs. 90,000', 'Cash Account ………. Dr.      Rs. 57,500 \r\nPhotography Equipment Account ………. Dr.      Rs. 32,500 \r\nPrepaid Insurance Account ………. Dr.      Rs. 3,000   \r\n            To Hashim Khan Account      Rs. 93,000', 'Cash Account ………. Dr.      Rs. 57,500 \r\nPhotography Equipment Account ………. Dr.      Rs. 32,500 \r\n            To Prepaid Insurance Account      Rs. 6,000\r\n            To Hashim Khan Account      Rs. 87,000', ' Hashim Khan Account ………. Dr.      Rs. 93,000 \r\n            To Cash Account      Rs. 57,500 \r\n            To Photography Equipment Account      Rs. 32,500  \r\n            To Prepaid Insurance Account      Rs. 3,000', 1, 1, 4),
(172, 'Mr. Rahim bought goods from Bilal and Friends Rs. 1,000 and by cash from XYZ Co. Rs 2,000. Pass Journal Entry for the transaction.', 'Purchases Account ………. Dr.       Rs. 3,000  \r\n            To Accounts Payable Account (Bilal & Friends)       Rs. 1,000  \r\n            To Cash Account      Rs. 2,000', 'Purchase Account ………. Dr.       Rs. 3,000   \r\n            To Inventory Account      Rs. 3,000', 'Inventory Account ………. Dr.      Rs. 3,000  \r\n            To Bilal & Friends Account      Rs. 1,000 \r\n            To XYZ Co. Account      Rs. 2,000', 'Inventory Account ………. Dr.       Rs. 3,000  \r\n            To Purchase Account      Rs. 3,000', 1, 1, 4),
(173, 'Wooden Steel & Co. gives salary to Ashok Rs.10, 000, where TDS is Rs.      Rs. 200 and Professional Tax, Rs.100 is deducted from his salary. Pass Accrual Journal Entry on 31.03.2018 in the books of the company. Pass payment entry of salary, TDS, Professional Tax as of 9th April 2018.', 'Salary to Ashok Account ………. Dr.      Rs. 10,000 \r\n            To Salary Payable Account      Rs. 10,000\r\n\r\nSalary Payable Account ………. Dr.      Rs. 10,000  \r\n            To Cash Account      Rs. 9,700 \r\n            To TDS Account      Rs.      Rs. 200  \r\n            To Professional Tax      Rs.      Rs. 100', 'Ashok Account ………. Dr.      Rs. 13,000\r\n            To Salary Account      Rs. 10,000 \r\n            To TDS Account.      Rs.      Rs. 200    \r\n            To Professional Tax.      Rs.      Rs. 100  \r\n\r\nCash Account ………. Dr.      Rs. 10,300\r\n            To Salary Account      Rs. 10,300', 'Ashok Account ………. Dr.      Rs. 10,000  \r\n            To Cash Account      Rs. 10,000\r\n\r\nCash Account ………. Dr.      Rs. 10,000  \r\n            To salary Account ………. Dr.      Rs. 9,700  \r\n            To TDS Account      Rs.      Rs. 200  \r\n            To Professional Tax      Rs.      Rs. 1000', 'Ashok Account ………. Dr.      Rs. 10,000  \r\n            To Salary Account      Rs. 10,000', 1, 1, 4),
(174, 'John purchased fixed assets worth Rs.15, 000. He paid      Rs. 5,000 in cash and took loan of Rs. 10,000 to pay for the fixed assets. Write journal entries in the books of John to record the above transaction. Monthly payment of Rs. 1, 000 is made against above loan, interest Rs.      Rs. 200 and principal amount is Rs. 800.', 'Fixed Assets Account ………. Dr.      Rs. 15,000  \r\n            To Cash Account ………. Dr.      Rs.      Rs. 5,000 \r\n            To Loan Account      Rs. 10,000\r\n\r\nLoan Account ………. Dr.      Rs. 1,000 \r\n            To Cash      Rs. 1,000', 'Fixed Assets Account ………. Dr.      Rs. 15,000  \r\n            To Cash Account      Rs.      Rs. 5,000\r\n            To Loan Account      Rs. 10,000\r\n\r\nLoan Account ………. Dr.      Rs. 1,000\r\n            To Principal Amount      Rs. 800 \r\n            To Interest on Loan Account      Rs.      Rs. 200', 'Fixed Assets Account ………. Dr.      Rs. 15,000  \r\n            To Cash Account      Rs.      Rs. 5,000 \r\n            To Loan Account      Rs. 10,000', 'Cash Account ………. Dr.      Rs.      Rs. 5,000 \r\nLoan Account ………. Dr.      Rs. 10,000    \r\n            To Fixed Assets Account ………. Dr.      Rs. 15,000', 3, 1, 4),
(175, 'Ashok an employee in XYZ Company took loan from the company where he worked. Pass Journal Entries to book loan in company’s book.', 'Loan to Ashok Account ………. Dr.        \r\nTo Cash Account', 'Loan Account ………. Dr.        \r\nTo Ashok Account', 'Cash Account ………. Dr.         \r\nTo Ashok Account', 'Company Loan Account ………. Dr.         \r\nTo Ashok Account', 1, 1, 4),
(176, 'On 1st of April, Rs. 1,000 was deducted from his salary against partial repayment of loan. Pass Journal Entry in the books of Company.', 'Cash Account ………. Dr.      Rs. 1,000  \r\n            To Loan to Ashok Account      Rs. 1,000', 'Salary Account ………. Dr.      Rs. 10,000  \r\n            To Cash Account       Rs. 9,000 \r\n            To Loan to Ashok Account      Rs. 1,000', 'Salary Account ………. Dr.      Rs. 10,000  \r\n            To Cash Account      Rs. 8,700 \r\n            To Loan to Ashok Account      Rs. 1,000 \r\n            To TDS Account      Rs. 200 \r\n            To Professional Tax Account      Rs. 100', 'Loan to Ashok Account ………. Dr.      Rs. 1,000\r\n			Cash Account ………. Dr.      Rs. 9,000\r\n            To Salary Account      Rs. 10,000', 3, 1, 4),
(177, 'ABC Company has Rs. 50, 000 as advance from customers in Balance Sheet. He wants to book 50% as sales against his advance. Book Journal Entry in the books of ABC Company to book the sales.', 'Advance from Customers’ Account ………. Dr.      Rs. 50,000    \r\n            To Sales Account      Rs. 25,000    \r\n            To Cash Account      Rs. 25,000', 'Sales Account ………. Dr.      Rs. 25,000     \r\nCash Account ………. Dr.      Rs. 25,000    \r\n            To Advance from Customers’ Account      Rs. 50,000', 'Sales Account ………. Dr.      Rs. 25,000    \r\n            To Advance from Customers’ Account      Rs. 25,000', 'Advance from Customers’ Account ………. Dr.      Rs. 25,000    \r\n            To Sales Account      Rs. 25,000', 4, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `cnum` varchar(20) DEFAULT NULL,
  `q_set` varchar(20) DEFAULT NULL,
  `cat_id` int(4) DEFAULT NULL,
  `qid` int(11) DEFAULT NULL,
  `response` int(4) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`cnum`, `q_set`, `cat_id`, `qid`, `response`, `status`) VALUES
('2019-09-002', 'Basic', 1, 153, 1, '1'),
('2019-09-002', 'Basic', 1, 169, 3, '0'),
('2019-09-002', 'Basic', 1, 175, 2, '0'),
('2019-09-002', 'Basic', 1, 16, 1, '0'),
('2019-09-002', 'Basic', 1, 163, 3, '0'),
('2019-09-002', 'Basic', 1, 14, 4, '0'),
('2019-09-002', 'Basic', 1, 12, 0, '2'),
('2019-09-002', 'Basic', 1, 3, 0, '2'),
('2019-09-002', 'Basic', 1, 18, 0, '2'),
('2019-09-002', 'Basic', 1, 155, 0, '2'),
('2019-09-002', 'Basic', 1, 156, 0, '2'),
('2019-09-002', 'Basic', 1, 164, 0, '2'),
('2019-09-002', 'Basic', 1, 6, 0, '2'),
('2019-09-002', 'Basic', 1, 2, 0, '2'),
('2019-09-002', 'Basic', 1, 167, 0, '2'),
('2019-09-002', 'Basic', 1, 20, 0, '2'),
('2019-09-002', 'Basic', 1, 19, 0, '2'),
('2019-09-002', 'Basic', 1, 166, 0, '2'),
('2019-09-002', 'Basic', 1, 15, 0, '2'),
('2019-09-002', 'Basic', 1, 159, 0, '2'),
('2019-09-002', 'Basic', 3, 50, 4, '0'),
('2019-09-002', 'Basic', 3, 48, 2, '0'),
('2019-09-002', 'Basic', 3, 44, 2, '0'),
('2019-09-002', 'Basic', 3, 49, 3, '0'),
('2019-09-002', 'Basic', 3, 46, 4, '0'),
('2019-09-002', 'Basic', 3, 51, 1, '1'),
('2019-09-002', 'Basic', 3, 45, 2, '0'),
('2019-09-002', 'Basic', 3, 47, 0, '2'),
('2019-09-002', 'Basic', 3, 43, 0, '2'),
('2019-09-002', 'Basic', 3, 42, 0, '2'),
('2019-09-002', 'Basic', 2, 25, 1, '0'),
('2019-09-002', 'Basic', 2, 30, 2, '0'),
('2019-09-002', 'Basic', 2, 21, 2, '0'),
('2019-09-002', 'Basic', 2, 41, 3, '0'),
('2019-09-002', 'Basic', 2, 31, 3, '1'),
('2019-09-002', 'Basic', 2, 32, 0, '2'),
('2019-09-002', 'Basic', 2, 24, 0, '2'),
('2019-09-002', 'Basic', 2, 22, 0, '2'),
('2019-09-002', 'Basic', 2, 39, 0, '2'),
('2019-09-002', 'Basic', 2, 36, 0, '2'),
('2019-09-003', 'Basic', 1, 2, 2, '0'),
('2019-09-003', 'Basic', 1, 13, 1, '1'),
('2019-09-003', 'Basic', 1, 169, 3, '0'),
('2019-09-003', 'Basic', 1, 156, 1, '0'),
('2019-09-003', 'Basic', 1, 167, 2, '0'),
('2019-09-003', 'Basic', 1, 9, 2, '0'),
('2019-09-003', 'Basic', 1, 174, 2, '0'),
('2019-09-003', 'Basic', 1, 8, 1, '0'),
('2019-09-003', 'Basic', 1, 18, 4, '0'),
('2019-09-003', 'Basic', 1, 159, 2, '0'),
('2019-09-003', 'Basic', 1, 12, 2, '0'),
('2019-09-003', 'Basic', 1, 172, 4, '0'),
('2019-09-003', 'Basic', 1, 16, 1, '0'),
('2019-09-003', 'Basic', 1, 4, 3, '0'),
('2019-09-003', 'Basic', 1, 165, 3, '0'),
('2019-09-003', 'Basic', 1, 173, 3, '0'),
('2019-09-003', 'Basic', 1, 5, 4, '1'),
('2019-09-003', 'Basic', 1, 161, 2, '1'),
('2019-09-003', 'Basic', 1, 154, 2, '1'),
('2019-09-003', 'Basic', 1, 20, 2, '0'),
('2019-09-003', 'Basic', 3, 43, 3, '0'),
('2019-09-003', 'Basic', 3, 45, 4, '1'),
('2019-09-003', 'Basic', 3, 46, 2, '0'),
('2019-09-003', 'Basic', 3, 48, 3, '0'),
('2019-09-003', 'Basic', 3, 44, 1, '0'),
('2019-09-003', 'Basic', 3, 49, 1, '1'),
('2019-09-003', 'Basic', 3, 50, 2, '1'),
('2019-09-003', 'Basic', 3, 42, 2, '0'),
('2019-09-003', 'Basic', 3, 51, 2, '0'),
('2019-09-003', 'Basic', 3, 47, 3, '0'),
('2019-09-003', 'Basic', 2, 21, 2, '0'),
('2019-09-003', 'Basic', 2, 27, 4, '0'),
('2019-09-003', 'Basic', 2, 31, 1, '0'),
('2019-09-003', 'Basic', 2, 36, 3, '0'),
('2019-09-003', 'Basic', 2, 24, 2, '1'),
('2019-09-003', 'Basic', 2, 38, 3, '0'),
('2019-09-003', 'Basic', 2, 33, 3, '0'),
('2019-09-003', 'Basic', 2, 37, 2, '0'),
('2019-09-003', 'Basic', 2, 22, 4, '0'),
('2019-09-003', 'Basic', 2, 29, 4, '1'),
('2019-09-004', 'Basic', 1, 18, 2, '0'),
('2019-09-004', 'Basic', 1, 4, 1, '1'),
('2019-09-004', 'Basic', 1, 7, 3, '0'),
('2019-09-004', 'Basic', 1, 165, 1, '0'),
('2019-09-004', 'Basic', 1, 175, 2, '0'),
('2019-09-004', 'Basic', 1, 13, 2, '0'),
('2019-09-004', 'Basic', 1, 173, 1, '1'),
('2019-09-004', 'Basic', 1, 155, 2, '0'),
('2019-09-004', 'Basic', 1, 171, 2, '0'),
('2019-09-004', 'Basic', 1, 11, 1, '0'),
('2019-09-004', 'Basic', 1, 177, 2, '0'),
('2019-09-004', 'Basic', 1, 167, 3, '1'),
('2019-09-004', 'Basic', 1, 14, 4, '0'),
('2019-09-004', 'Basic', 1, 166, 0, '2'),
('2019-09-004', 'Basic', 1, 2, 3, '0'),
('2019-09-004', 'Basic', 1, 154, 3, '0'),
('2019-09-004', 'Basic', 1, 19, 3, '1'),
('2019-09-004', 'Basic', 1, 10, 3, '1'),
('2019-09-004', 'Basic', 1, 9, 2, '0'),
('2019-09-004', 'Basic', 1, 161, 2, '1'),
('2019-09-004', 'Basic', 3, 47, 3, '0'),
('2019-09-004', 'Basic', 3, 42, 2, '0'),
('2019-09-004', 'Basic', 3, 45, 4, '1'),
('2019-09-004', 'Basic', 3, 46, 2, '0'),
('2019-09-004', 'Basic', 3, 49, 1, '1'),
('2019-09-004', 'Basic', 3, 43, 4, '0'),
('2019-09-004', 'Basic', 3, 44, 3, '1'),
('2019-09-004', 'Basic', 3, 51, 0, '2'),
('2019-09-004', 'Basic', 3, 50, 2, '1'),
('2019-09-004', 'Basic', 3, 48, 4, '1'),
('2019-09-004', 'Basic', 2, 21, 3, '0'),
('2019-09-004', 'Basic', 2, 35, 2, '1'),
('2019-09-004', 'Basic', 2, 30, 1, '0'),
('2019-09-004', 'Basic', 2, 26, 3, '0'),
('2019-09-004', 'Basic', 2, 36, 3, '0'),
('2019-09-004', 'Basic', 2, 27, 2, '0'),
('2019-09-004', 'Basic', 2, 25, 2, '0'),
('2019-09-004', 'Basic', 2, 22, 1, '0'),
('2019-09-004', 'Basic', 2, 32, 3, '0'),
('2019-09-004', 'Basic', 2, 28, 2, '1'),
('2019-09-005', 'Intermediate', 1, 176, 2, '0'),
('2019-09-005', 'Intermediate', 1, 59, 2, '0'),
('2019-09-005', 'Intermediate', 1, 173, 2, '0'),
('2019-09-005', 'Intermediate', 1, 6, 2, '0'),
('2019-09-005', 'Intermediate', 1, 68, 1, '1'),
('2019-09-005', 'Intermediate', 1, 171, 2, '0'),
('2019-09-005', 'Intermediate', 1, 166, 2, '0'),
('2019-09-005', 'Intermediate', 1, 161, 3, '0'),
('2019-09-005', 'Intermediate', 1, 174, 2, '0'),
('2019-09-005', 'Intermediate', 1, 165, 1, '0'),
('2019-09-005', 'Intermediate', 1, 177, 3, '0'),
('2019-09-005', 'Intermediate', 1, 158, 4, '0'),
('2019-09-005', 'Intermediate', 1, 167, 1, '0'),
('2019-09-005', 'Intermediate', 1, 7, 2, '0'),
('2019-09-005', 'Intermediate', 1, 71, 3, '1'),
('2019-09-005', 'Intermediate', 1, 55, 3, '0'),
('2019-09-005', 'Intermediate', 1, 10, 2, '0'),
('2019-09-005', 'Intermediate', 1, 2, 3, '0'),
('2019-09-005', 'Intermediate', 1, 66, 2, '0'),
('2019-09-005', 'Intermediate', 1, 5, 1, '0'),
('2019-09-005', 'Intermediate', 3, 72, 2, '0'),
('2019-09-005', 'Intermediate', 3, 85, 2, '0'),
('2019-09-005', 'Intermediate', 3, 48, 4, '1'),
('2019-09-005', 'Intermediate', 3, 47, 3, '0'),
('2019-09-005', 'Intermediate', 3, 81, 3, '0'),
('2019-09-005', 'Intermediate', 3, 44, 1, '0'),
('2019-09-005', 'Intermediate', 3, 73, 4, '1'),
('2019-09-005', 'Intermediate', 3, 50, 2, '1'),
('2019-09-005', 'Intermediate', 3, 82, 3, '1'),
('2019-09-005', 'Intermediate', 3, 42, 2, '0'),
('2019-09-005', 'Intermediate', 2, 38, 2, '0'),
('2019-09-005', 'Intermediate', 2, 23, 2, '1'),
('2019-09-005', 'Intermediate', 2, 22, 2, '0'),
('2019-09-005', 'Intermediate', 2, 104, 2, '0'),
('2019-09-005', 'Intermediate', 2, 87, 2, '0'),
('2019-09-005', 'Intermediate', 2, 40, 2, '0'),
('2019-09-005', 'Intermediate', 2, 96, 3, '0'),
('2019-09-005', 'Intermediate', 2, 91, 4, '0'),
('2019-09-005', 'Intermediate', 2, 95, 4, '1'),
('2019-09-005', 'Intermediate', 2, 25, 0, '2'),
('2019-09-007', 'Basic', 1, 5, 2, '0'),
('2019-09-007', 'Basic', 1, 158, 1, '0'),
('2019-09-007', 'Basic', 1, 1, 3, '1'),
('2019-09-007', 'Basic', 1, 172, 3, '0'),
('2019-09-007', 'Basic', 1, 164, 2, '0'),
('2019-09-007', 'Basic', 1, 20, 3, '0'),
('2019-09-007', 'Basic', 1, 12, 0, '2'),
('2019-09-007', 'Basic', 1, 18, 2, '0'),
('2019-09-007', 'Basic', 1, 3, 4, '0'),
('2019-09-007', 'Basic', 1, 175, 4, '0'),
('2019-09-007', 'Basic', 1, 162, 4, '0'),
('2019-09-007', 'Basic', 1, 177, 1, '0'),
('2019-09-007', 'Basic', 1, 154, 0, '2'),
('2019-09-007', 'Basic', 1, 15, 0, '2'),
('2019-09-007', 'Basic', 1, 176, 0, '2'),
('2019-09-007', 'Basic', 1, 8, 0, '2'),
('2019-09-007', 'Basic', 1, 14, 0, '2'),
('2019-09-007', 'Basic', 1, 10, 0, '2'),
('2019-09-007', 'Basic', 1, 171, 0, '2'),
('2019-09-007', 'Basic', 1, 161, 0, '2'),
('2019-09-007', 'Basic', 3, 42, 2, '0'),
('2019-09-007', 'Basic', 3, 51, 2, '0'),
('2019-09-007', 'Basic', 3, 43, 2, '0'),
('2019-09-007', 'Basic', 3, 48, 0, '2'),
('2019-09-007', 'Basic', 3, 44, 2, '0'),
('2019-09-007', 'Basic', 3, 47, 4, '0'),
('2019-09-007', 'Basic', 3, 49, 3, '0'),
('2019-09-007', 'Basic', 3, 46, 2, '0'),
('2019-09-007', 'Basic', 3, 50, 1, '0'),
('2019-09-007', 'Basic', 3, 45, 1, '0'),
('2019-09-007', 'Basic', 2, 21, 2, '0'),
('2019-09-007', 'Basic', 2, 41, 2, '0'),
('2019-09-007', 'Basic', 2, 36, 0, '2'),
('2019-09-007', 'Basic', 2, 23, 0, '2'),
('2019-09-007', 'Basic', 2, 38, 0, '2'),
('2019-09-007', 'Basic', 2, 30, 4, '1'),
('2019-09-007', 'Basic', 2, 33, 2, '0'),
('2019-09-007', 'Basic', 2, 29, 0, '2'),
('2019-09-007', 'Basic', 2, 25, 3, '1'),
('2019-09-007', 'Basic', 2, 28, 0, '2'),
('2019-09-008', 'Intermediate', 1, 153, 2, '0'),
('2019-09-008', 'Intermediate', 1, 160, 3, '0'),
('2019-09-008', 'Intermediate', 1, 9, 2, '0'),
('2019-09-008', 'Intermediate', 1, 68, 4, '0'),
('2019-09-008', 'Intermediate', 1, 161, 2, '1'),
('2019-09-008', 'Intermediate', 1, 158, 2, '0'),
('2019-09-008', 'Intermediate', 1, 12, 1, '0'),
('2019-09-008', 'Intermediate', 1, 5, 4, '1'),
('2019-09-008', 'Intermediate', 1, 166, 4, '1'),
('2019-09-008', 'Intermediate', 1, 177, 2, '0'),
('2019-09-008', 'Intermediate', 1, 157, 1, '1'),
('2019-09-008', 'Intermediate', 1, 52, 3, '0'),
('2019-09-008', 'Intermediate', 1, 11, 4, '0'),
('2019-09-008', 'Intermediate', 1, 155, 3, '0'),
('2019-09-008', 'Intermediate', 1, 54, 3, '0'),
('2019-09-008', 'Intermediate', 1, 64, 4, '0'),
('2019-09-008', 'Intermediate', 1, 173, 1, '1'),
('2019-09-008', 'Intermediate', 1, 57, 2, '0'),
('2019-09-008', 'Intermediate', 1, 14, 4, '0'),
('2019-09-008', 'Intermediate', 1, 154, 2, '1'),
('2019-09-008', 'Intermediate', 3, 72, 2, '0'),
('2019-09-008', 'Intermediate', 3, 44, 1, '0'),
('2019-09-008', 'Intermediate', 3, 51, 2, '0'),
('2019-09-008', 'Intermediate', 3, 50, 1, '0'),
('2019-09-008', 'Intermediate', 3, 84, 3, '0'),
('2019-09-008', 'Intermediate', 3, 80, 4, '0'),
('2019-09-008', 'Intermediate', 3, 49, 3, '0'),
('2019-09-008', 'Intermediate', 3, 75, 2, '0'),
('2019-09-008', 'Intermediate', 3, 73, 1, '0'),
('2019-09-008', 'Intermediate', 3, 46, 1, '0'),
('2019-09-008', 'Intermediate', 2, 22, 2, '0'),
('2019-09-008', 'Intermediate', 2, 93, 2, '0'),
('2019-09-008', 'Intermediate', 2, 86, 1, '0'),
('2019-09-008', 'Intermediate', 2, 41, 2, '0'),
('2019-09-008', 'Intermediate', 2, 27, 4, '0'),
('2019-09-008', 'Intermediate', 2, 105, 3, '0'),
('2019-09-008', 'Intermediate', 2, 98, 1, '0'),
('2019-09-008', 'Intermediate', 2, 25, 2, '0'),
('2019-09-008', 'Intermediate', 2, 30, 2, '0'),
('2019-09-008', 'Intermediate', 2, 103, 2, '0'),
('2019-09-010', 'Intermediate', 1, 161, 3, '0'),
('2019-09-010', 'Intermediate', 1, 6, 2, '0'),
('2019-09-010', 'Intermediate', 1, 59, 3, '1'),
('2019-09-010', 'Intermediate', 1, 14, 3, '0'),
('2019-09-010', 'Intermediate', 1, 2, 1, '1'),
('2019-09-010', 'Intermediate', 1, 71, 4, '0'),
('2019-09-010', 'Intermediate', 1, 172, 2, '0'),
('2019-09-010', 'Intermediate', 1, 164, 2, '0'),
('2019-09-010', 'Intermediate', 1, 160, 1, '0'),
('2019-09-010', 'Intermediate', 1, 10, 4, '0'),
('2019-09-010', 'Intermediate', 1, 176, 3, '1'),
('2019-09-010', 'Intermediate', 1, 13, 1, '1'),
('2019-09-010', 'Intermediate', 1, 165, 2, '1'),
('2019-09-010', 'Intermediate', 1, 177, 4, '1'),
('2019-09-010', 'Intermediate', 1, 69, 4, '0'),
('2019-09-010', 'Intermediate', 1, 163, 2, '0'),
('2019-09-010', 'Intermediate', 1, 158, 3, '1'),
('2019-09-010', 'Intermediate', 1, 174, 2, '0'),
('2019-09-010', 'Intermediate', 1, 54, 1, '1'),
('2019-09-010', 'Intermediate', 1, 53, 3, '0'),
('2019-09-010', 'Intermediate', 3, 78, 1, '0'),
('2019-09-010', 'Intermediate', 3, 45, 4, '1'),
('2019-09-010', 'Intermediate', 3, 83, 2, '0'),
('2019-09-010', 'Intermediate', 3, 73, 2, '0'),
('2019-09-010', 'Intermediate', 3, 84, 2, '1'),
('2019-09-010', 'Intermediate', 3, 49, 1, '1'),
('2019-09-010', 'Intermediate', 3, 47, 3, '0'),
('2019-09-010', 'Intermediate', 3, 43, 3, '0'),
('2019-09-010', 'Intermediate', 3, 79, 1, '1'),
('2019-09-010', 'Intermediate', 3, 51, 2, '0'),
('2019-09-010', 'Intermediate', 2, 98, 3, '0'),
('2019-09-010', 'Intermediate', 2, 34, 2, '0'),
('2019-09-010', 'Intermediate', 2, 25, 1, '0'),
('2019-09-010', 'Intermediate', 2, 39, 3, '0'),
('2019-09-010', 'Intermediate', 2, 104, 1, '0'),
('2019-09-010', 'Intermediate', 2, 92, 2, '0'),
('2019-09-010', 'Intermediate', 2, 95, 2, '0'),
('2019-09-010', 'Intermediate', 2, 23, 4, '0'),
('2019-09-010', 'Intermediate', 2, 29, 1, '0'),
('2019-09-010', 'Intermediate', 2, 88, 2, '0'),
('2019-09-009', 'Intermediate', 1, 161, 2, '1'),
('2019-09-009', 'Intermediate', 1, 2, 2, '0'),
('2019-09-009', 'Intermediate', 1, 163, 4, '0'),
('2019-09-009', 'Intermediate', 1, 65, 1, '1'),
('2019-09-009', 'Intermediate', 1, 53, 2, '0'),
('2019-09-009', 'Intermediate', 1, 167, 3, '1'),
('2019-09-009', 'Intermediate', 1, 165, 3, '0'),
('2019-09-009', 'Intermediate', 1, 64, 2, '1'),
('2019-09-009', 'Intermediate', 1, 16, 4, '0'),
('2019-09-009', 'Intermediate', 1, 172, 2, '0'),
('2019-09-009', 'Intermediate', 1, 153, 1, '1'),
('2019-09-009', 'Intermediate', 1, 18, 1, '0'),
('2019-09-009', 'Intermediate', 1, 158, 2, '0'),
('2019-09-009', 'Intermediate', 1, 174, 2, '0'),
('2019-09-009', 'Intermediate', 1, 70, 3, '0'),
('2019-09-009', 'Intermediate', 1, 170, 0, '2'),
('2019-09-009', 'Intermediate', 1, 8, 2, '0'),
('2019-09-009', 'Intermediate', 1, 57, 0, '2'),
('2019-09-009', 'Intermediate', 1, 166, 3, '0'),
('2019-09-009', 'Intermediate', 1, 10, 0, '2'),
('2019-09-009', 'Intermediate', 3, 83, 2, '0'),
('2019-09-009', 'Intermediate', 3, 77, 3, '0'),
('2019-09-009', 'Intermediate', 3, 43, 3, '0'),
('2019-09-009', 'Intermediate', 3, 49, 4, '0'),
('2019-09-009', 'Intermediate', 3, 51, 0, '2'),
('2019-09-009', 'Intermediate', 3, 81, 2, '0'),
('2019-09-009', 'Intermediate', 3, 42, 0, '2'),
('2019-09-009', 'Intermediate', 3, 79, 2, '0'),
('2019-09-009', 'Intermediate', 3, 45, 2, '0'),
('2019-09-009', 'Intermediate', 3, 84, 2, '1'),
('2019-09-009', 'Intermediate', 2, 101, 2, '1'),
('2019-09-009', 'Intermediate', 2, 40, 4, '0'),
('2019-09-009', 'Intermediate', 2, 25, 2, '0'),
('2019-09-009', 'Intermediate', 2, 93, 3, '0'),
('2019-09-009', 'Intermediate', 2, 34, 2, '0'),
('2019-09-009', 'Intermediate', 2, 97, 2, '0'),
('2019-09-009', 'Intermediate', 2, 105, 2, '1'),
('2019-09-009', 'Intermediate', 2, 32, 4, '1'),
('2019-09-009', 'Intermediate', 2, 92, 3, '1'),
('2019-09-009', 'Intermediate', 2, 27, 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `cnum` varchar(20) NOT NULL,
  `cat_id` int(4) NOT NULL,
  `marks` int(10) NOT NULL,
  `correct_answer` int(5) NOT NULL,
  `wrong_answer` int(5) NOT NULL,
  `not_attemt` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`cnum`, `cat_id`, `marks`, `correct_answer`, `wrong_answer`, `not_attemt`) VALUES
('2019-09-002', 1, 1, 1, 5, 14),
('2019-09-002', 3, 1, 1, 6, 3),
('2019-09-002', 2, 1, 1, 4, 5),
('2019-09-003', 1, 4, 4, 16, 0),
('2019-09-003', 3, 3, 3, 7, 0),
('2019-09-003', 2, 2, 2, 8, 0),
('2019-09-004', 1, 6, 6, 13, 1),
('2019-09-004', 3, 5, 5, 4, 1),
('2019-09-004', 2, 2, 2, 8, 0),
('2019-09-005', 1, 2, 2, 18, 0),
('2019-09-005', 3, 4, 4, 6, 0),
('2019-09-005', 2, 2, 2, 7, 1),
('2019-09-007', 1, 1, 1, 10, 9),
('2019-09-007', 3, 0, 0, 9, 1),
('2019-09-007', 2, 2, 2, 3, 5),
('2019-09-008', 1, 6, 6, 14, 0),
('2019-09-008', 3, 0, 0, 10, 0),
('2019-09-008', 2, 0, 0, 10, 0),
('2019-09-010', 1, 8, 8, 12, 0),
('2019-09-010', 3, 4, 4, 6, 0),
('2019-09-010', 2, 0, 0, 10, 0),
('2019-09-009', 1, 5, 5, 12, 3),
('2019-09-009', 3, 1, 1, 7, 2),
('2019-09-009', 2, 4, 4, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `siblings`
--

CREATE TABLE `siblings` (
  `cnum` varchar(20) NOT NULL,
  `sibling_type` varchar(10) NOT NULL,
  `qualification` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siblings`
--

INSERT INTO `siblings` (`cnum`, `sibling_type`, `qualification`) VALUES
('2019-09-002', 'brother', 'sdfsdf'),
('2019-09-002', 'brother', 'sdfsdf'),
('2019-09-002', 'sister', ''),
('2019-09-004', 'brother', 'mba'),
('2019-09-004', 'sister', 'ca'),
('2019-09-007', 'brother', 'mba'),
('2019-09-007', 'brother', 'ca');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`name`, `email`, `password`) VALUES
('Adhiraj Sir', 'frontdesk@cloudinfosolutions.com', 'FrontDesk@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ca`
--
ALTER TABLE `ca`
  ADD KEY `cnum` (`cnum`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`cnum`);

--
-- Indexes for table `candidate_login`
--
ALTER TABLE `candidate_login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD KEY `cnum` (`cnum`);

--
-- Indexes for table `current_emp`
--
ALTER TABLE `current_emp`
  ADD KEY `cnum` (`cnum`);

--
-- Indexes for table `final_interview`
--
ALTER TABLE `final_interview`
  ADD KEY `cnum` (`cnum`);

--
-- Indexes for table `final_score`
--
ALTER TABLE `final_score`
  ADD KEY `cnum` (`cnum`);

--
-- Indexes for table `govt_exam`
--
ALTER TABLE `govt_exam`
  ADD KEY `cnum` (`cnum`);

--
-- Indexes for table `hired_candidate`
--
ALTER TABLE `hired_candidate`
  ADD KEY `cnum` (`cnum`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD KEY `cnum` (`cnum`);

--
-- Indexes for table `last_emp`
--
ALTER TABLE `last_emp`
  ADD KEY `cnum` (`cnum`);

--
-- Indexes for table `led_team`
--
ALTER TABLE `led_team`
  ADD KEY `cnum` (`cnum`);

--
-- Indexes for table `managed_client`
--
ALTER TABLE `managed_client`
  ADD KEY `cnum` (`cnum`);

--
-- Indexes for table `no_fresher`
--
ALTER TABLE `no_fresher`
  ADD KEY `cnum` (`cnum`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD KEY `cnum` (`cnum`);

--
-- Indexes for table `professional_course`
--
ALTER TABLE `professional_course`
  ADD KEY `cnum` (`cnum`);

--
-- Indexes for table `professional_details`
--
ALTER TABLE `professional_details`
  ADD KEY `cnum` (`cnum`);

--
-- Indexes for table `question_bank`
--
ALTER TABLE `question_bank`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD KEY `cnum` (`cnum`),
  ADD KEY `qid` (`qid`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD KEY `cnum` (`cnum`);

--
-- Indexes for table `siblings`
--
ALTER TABLE `siblings`
  ADD KEY `cnum` (`cnum`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question_bank`
--
ALTER TABLE `question_bank`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ca`
--
ALTER TABLE `ca`
  ADD CONSTRAINT `ca_ibfk_1` FOREIGN KEY (`cnum`) REFERENCES `candidate` (`cnum`);

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_ibfk_1` FOREIGN KEY (`cnum`) REFERENCES `candidate` (`cnum`);

--
-- Constraints for table `current_emp`
--
ALTER TABLE `current_emp`
  ADD CONSTRAINT `current_emp_ibfk_1` FOREIGN KEY (`cnum`) REFERENCES `candidate` (`cnum`);

--
-- Constraints for table `final_interview`
--
ALTER TABLE `final_interview`
  ADD CONSTRAINT `final_interview_ibfk_1` FOREIGN KEY (`cnum`) REFERENCES `candidate` (`cnum`);

--
-- Constraints for table `final_score`
--
ALTER TABLE `final_score`
  ADD CONSTRAINT `final_score_ibfk_1` FOREIGN KEY (`cnum`) REFERENCES `candidate` (`cnum`);

--
-- Constraints for table `govt_exam`
--
ALTER TABLE `govt_exam`
  ADD CONSTRAINT `govt_exam_ibfk_1` FOREIGN KEY (`cnum`) REFERENCES `candidate` (`cnum`);

--
-- Constraints for table `hired_candidate`
--
ALTER TABLE `hired_candidate`
  ADD CONSTRAINT `hired_candidate_ibfk_1` FOREIGN KEY (`cnum`) REFERENCES `candidate` (`cnum`);

--
-- Constraints for table `interview`
--
ALTER TABLE `interview`
  ADD CONSTRAINT `interview_ibfk_1` FOREIGN KEY (`cnum`) REFERENCES `candidate` (`cnum`);

--
-- Constraints for table `last_emp`
--
ALTER TABLE `last_emp`
  ADD CONSTRAINT `last_emp_ibfk_1` FOREIGN KEY (`cnum`) REFERENCES `candidate` (`cnum`);

--
-- Constraints for table `led_team`
--
ALTER TABLE `led_team`
  ADD CONSTRAINT `led_team_ibfk_1` FOREIGN KEY (`cnum`) REFERENCES `candidate` (`cnum`);

--
-- Constraints for table `managed_client`
--
ALTER TABLE `managed_client`
  ADD CONSTRAINT `managed_client_ibfk_1` FOREIGN KEY (`cnum`) REFERENCES `candidate` (`cnum`);

--
-- Constraints for table `no_fresher`
--
ALTER TABLE `no_fresher`
  ADD CONSTRAINT `no_fresher_ibfk_1` FOREIGN KEY (`cnum`) REFERENCES `candidate` (`cnum`);

--
-- Constraints for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD CONSTRAINT `personal_details_ibfk_1` FOREIGN KEY (`cnum`) REFERENCES `candidate` (`cnum`);

--
-- Constraints for table `professional_course`
--
ALTER TABLE `professional_course`
  ADD CONSTRAINT `professional_course_ibfk_1` FOREIGN KEY (`cnum`) REFERENCES `candidate` (`cnum`);

--
-- Constraints for table `professional_details`
--
ALTER TABLE `professional_details`
  ADD CONSTRAINT `professional_details_ibfk_1` FOREIGN KEY (`cnum`) REFERENCES `candidate` (`cnum`);

--
-- Constraints for table `responses`
--
ALTER TABLE `responses`
  ADD CONSTRAINT `responses_ibfk_1` FOREIGN KEY (`cnum`) REFERENCES `candidate` (`cnum`),
  ADD CONSTRAINT `responses_ibfk_2` FOREIGN KEY (`qid`) REFERENCES `question_bank` (`qid`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`cnum`) REFERENCES `candidate` (`cnum`);

--
-- Constraints for table `siblings`
--
ALTER TABLE `siblings`
  ADD CONSTRAINT `siblings_ibfk_1` FOREIGN KEY (`cnum`) REFERENCES `candidate` (`cnum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
