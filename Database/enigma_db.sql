-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2022 at 04:32 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

-- --------------------------------------------------------

--
-- Table structure for table `6_sem`
--

CREATE TABLE `6_sem` (
  `date` varchar(30) NOT NULL,
  `register_no` varchar(20) NOT NULL,
  `st` varchar(20) NOT NULL,
  `nsm` varchar(20) NOT NULL,
  `ism` varchar(20) NOT NULL,
  `cc` varchar(20) NOT NULL,
  `mc` varchar(20) NOT NULL,
  `iot` varchar(20) NOT NULL,
  `stlab` varchar(20) NOT NULL,
  `nsmlab` varchar(20) NOT NULL,
  `pw2` varchar(20) NOT NULL,
  `implant` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submit`
--

CREATE TABLE `assignment_submit` (
  `register_no` varchar(30) NOT NULL,
  `message` varchar(80) NOT NULL DEFAULT 'No Message',
  `assignment_file` varchar(50) NOT NULL,
  `submitted_on` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_submit`
--

INSERT INTO `assignment_submit` (`register_no`, `message`, `assignment_file`, `submitted_on`) VALUES
('147cs19001', 'Ok', 'count.vbs', '30-7-2022'),
('147CS19001', 'I have doubt', 'mYeSCM9bHRo.jpg', '12-8-2022'),
('147CS19020', 'ST Report', 'Capture.PNG', '26-8-2022');

-- --------------------------------------------------------

--
-- Table structure for table `assign_semester`
--

CREATE TABLE `assign_semester` (
  `register_no` varchar(20) NOT NULL,
  `semester` int(10) NOT NULL,
  `Backlogs` int(3) NOT NULL,
  `back_subjects` varchar(150) NOT NULL DEFAULT 'NO BACK'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_semester`
--

INSERT INTO `assign_semester` (`register_no`, `semester`, `Backlogs`, `back_subjects`) VALUES
('147CS17029', 6, 4, 'DBMS\r\nM2\r\nGC\r\nOOPs'),
('147CS18002', 6, 2, 'SE\r\nDBMS'),
('147CS18008', 6, 4, 'SE\r\nDBMS\r\nM2\r\nOOPs'),
('147CS18009', 6, 0, ''),
('147CS19001', 6, 0, ''),
('147CS19002', 6, 5, 'M2\r\nDBMS\r\nWP\r\nDAA\r\nSE'),
('147CS19003', 6, 0, ''),
('147CS19006', 6, 4, 'M2\r\nDBMS\r\nSE\r\nWP'),
('147CS19007', 6, 4, 'GC\r\nDS\r\nOOPs\r\nWP'),
('147cs19008', 6, 1, 'WP'),
('147CS19012', 6, 0, ''),
('147CS19013', 6, 0, ''),
('147CS19020', 6, 0, ''),
('147EC19001', 6, 3, 'M2\r\nMC\r\nSD'),
('147EC19002', 6, 4, 'DC\r\nMC\r\nAEC\r\nDE'),
('147EC19003', 6, 0, ''),
('147EC19004', 6, 0, ''),
('147EC19005', 6, 2, 'M2\r\nDE'),
('147EC19006', 6, 0, ''),
('147EC19007', 6, 3, 'AC\r\nMC\r\nM2'),
('147EC19008', 6, 3, 'AC\r\nOME\r\nACom'),
('147EC19009', 6, 1, 'AS'),
('147EC19010', 6, 0, ''),
('147ME19001', 6, 2, 'MD\r\nMech'),
('147ME19002', 6, 1, 'M1'),
('147ME19003', 6, 0, ''),
('147ME19004', 6, 5, 'IM\r\nATE\r\nMD\r\nMech\r\nM2'),
('147ME19005', 6, 0, ''),
('147ME19006', 6, 2, 'M2\r\nMD'),
('147ME19008', 6, 0, ''),
('178CS19009', 6, 5, 'SE\r\nWP\r\nGC\r\nC\r\nDAA'),
('182ce19020', 1, 1, 'OOPS'),
('187CS18902', 6, 0, ''),
('643723442', 6, 3, 'Python\r\nM1\r\nM2');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `teacher_id` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `semester` int(10) NOT NULL,
  `subject` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`teacher_id`, `course`, `semester`, `subject`) VALUES
('178235142', 'ECE', 5, 'Python'),
('178235142', 'CSE', 4, 'Cloud'),
('19004', 'CSE', 6, 'Information'),
('19009', 'CSE', 6, 'Network_Security_and_Managemen'),
('19005', 'CSE', 6, 'Cloud_Computing');

-- --------------------------------------------------------

--
-- Table structure for table `book_information`
--

CREATE TABLE `book_information` (
  `book_id` int(10) NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `book_author` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `pages` int(5) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(5) NOT NULL,
  `publisher` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_information`
--

INSERT INTO `book_information` (`book_id`, `book_title`, `book_author`, `description`, `pages`, `price`, `quantity`, `publisher`) VALUES
(13900, 'DSA', 'Ishwar Mahadev', 'Data Structures and algos', 120, 80, 4, 'EBPB'),
(46652, 'C Programming', 'Rajesh Hongal', 'Programming', 280, 350, 5, 'EBPB'),
(81381, 'C_Programming', 'Rajesh Hongal', 'Hhd', 21, 2, 2, 'hda');

-- --------------------------------------------------------

--
-- Table structure for table `book_issued`
--

CREATE TABLE `book_issued` (
  `issue_id` int(10) NOT NULL,
  `register_no` varchar(30) NOT NULL,
  `book_title` varchar(30) NOT NULL,
  `issued_date` varchar(14) NOT NULL,
  `due_date` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `book_issued_status`
-- (See below for the actual view)
--
CREATE TABLE `book_issued_status` (
`register_no` varchar(30)
,`issue_id` int(10)
,`book_title` varchar(30)
,`issued_date` varchar(14)
,`due_date` varchar(14)
,`first_name` varchar(30)
,`middle_name` varchar(30)
,`last_name` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `class_result`
--

CREATE TABLE `class_result` (
  `class_result_id` int(11) NOT NULL,
  `roll_no` varchar(30) NOT NULL,
  `course_code` varchar(30) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `total_marks` varchar(11) NOT NULL,
  `obtain_marks` varchar(11) NOT NULL,
  `result_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_result`
--

INSERT INTO `class_result` (`class_result_id`, `roll_no`, `course_code`, `subject_code`, `semester`, `total_marks`, `obtain_marks`, `result_date`) VALUES
(1, 'MCS-S19-1', 'MCS', 'OOP', '2', '100', '98', '10-03-20'),
(2, '25', 'MCS', 'OOP', '2', '100', '93', '10-03-20'),
(3, '27', 'MCS', 'OOP', '2', '100', '92', '10-03-20'),
(4, '29', 'MCS', 'OOP', '2', '100', '98', '10-03-20'),
(5, '31', 'MCS', 'OOP', '2', '100', '96', '10-03-20'),
(6, '33', 'MCS', 'OOP', '2', '100', '97', '10-03-20'),
(7, '34', 'MCS', 'OOP', '2', '100', '94', '10-03-20'),
(8, '35', 'MCS', 'OOP', '2', '100', '91', '10-03-20'),
(9, '36', 'MCS', 'OOP', '2', '100', '90', '10-03-20'),
(10, 'MCS-S19-1', 'MCS', 'DBMS', '2', '100', '98', '10-03-20'),
(11, '25', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(12, '27', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(13, '29', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(14, '31', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(15, '33', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(16, 'MCS-S19-1', 'MCS', 'SE', '2', '100', '64', '10-03-20'),
(17, '35', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(18, '36', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(28, 'MCS-S19-1', 'MCS', 'DLD', '2', '100', '76', '29-03-20'),
(35, '', '', '', '', '', '', '29-03-20'),
(36, '', '', '', '', '', '', '29-03-20'),
(37, 'MCS-S19-1', 'MCS', 'SE', '2', '100', '80', '30-03-20'),
(38, '', '', '', '', '', '', '30-03-20'),
(39, '', '', '', '', '', '', '30-03-20'),
(40, '', '', '', '', '', '', '30-03-20'),
(41, '', '', '', '', '', '', '30-03-20'),
(42, '', '', '', '', '', '', '30-03-20'),
(43, '', '', '', '', '', '', '30-03-20'),
(44, '', '', '', '', '', '', '30-03-20'),
(45, '', '', '', '', '', '', '30-03-20'),
(46, 'MCS-S19-1', 'MCS', 'SE', '2', '100', '80', '30-03-20'),
(47, '', '', '', '', '', '', '30-03-20'),
(48, '', '', '', '', '', '', '30-03-20'),
(49, '', '', '', '', '', '', '30-03-20'),
(50, '', '', '', '', '', '', '30-03-20'),
(51, '', '', '', '', '', '', '30-03-20'),
(52, '', '', '', '', '', '', '30-03-20'),
(53, '', '', '', '', '', '', '30-03-20'),
(54, '', '', '', '', '', '', '30-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_box`
--

CREATE TABLE `complaint_box` (
  `submitted_by` varchar(20) NOT NULL,
  `complaint_id` int(10) NOT NULL,
  `date` varchar(14) NOT NULL,
  `about` varchar(30) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint_box`
--

INSERT INTO `complaint_box` (`submitted_by`, `complaint_id`, `date`, `about`, `description`) VALUES
('147CS19020', 1235, '26-8-2022', 'CLassroom', 'no chalkpiece available'),
('147CS19001', 1821, '25-8-2022', 'Classroom', 'Our classroom fans are not working..please fix it as fast as possible..its sunny days'),
('147CS19020', 4650, '26-8-2022', 'bdh', 'hjfhdhsh');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `semester_or_year` varchar(10) NOT NULL,
  `no_of_year` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_code`, `course_name`, `semester_or_year`, `no_of_year`) VALUES
('CE', 'Civil Engineering', '6', 3),
('CSE', 'Computer Science Engineering', '6', 3),
('ECE', 'Electrical and Communication Engineering', '6', 3),
('ME', 'Mechanical Engineering', '6', 3);

-- --------------------------------------------------------

--
-- Table structure for table `course_subjects`
--

CREATE TABLE `course_subjects` (
  `subject_code` varchar(10) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `scheme` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_subjects`
--

INSERT INTO `course_subjects` (`subject_code`, `subject_name`, `course_code`, `semester`, `scheme`) VALUES
('15CP01E', 'Communication Skills in English', 'CSE', 2, 'C-15'),
('15CS11P', 'Basic Computer skills lab', 'CSE', 1, 'C-15'),
('15CS21T', 'Digital and Computer Fundamentals', 'CSE', 2, 'C-15'),
('15CS22P', 'Basic Web Design Lab', 'CSE', 2, 'C-15'),
('15CS23P', ' Multimedia Lab ', 'CSE', 2, 'C-15'),
('15CS31T', 'Programming with C  ', 'CSE', 3, 'C-15'),
('15CS32T', 'Computer Organisation ', 'CSE', 3, 'C-15'),
('15CS33T', 'Database Management System', 'CSE', 3, 'C-15'),
('15CS34T', 'Computer Network', 'CSE', 3, 'C-15'),
('15CS35P', 'Programming with C Lab', 'CSE', 3, 'C-15'),
('15CS36P', 'DBMS and GUI Lab ', 'CSE', 3, 'C-15'),
('15CS37P', 'Network Administration Lab', 'CSE', 3, 'C-15'),
('15CS41T', 'Data Structures using C ', 'CSE', 4, 'C-15'),
('15CS42T', 'OOP with Java ', 'CSE', 4, 'C-15'),
('15CS43T', 'Operating System', 'CSE', 4, 'C-15'),
('15CS44T', 'Professional Ethics & Indian Constitution', 'CSE', 4, 'C-15'),
('15CS45P', 'Data Structures lab ', 'CSE', 4, 'C-15'),
('15CS46P', 'OOP with Java Lab ', 'CSE', 4, 'C-15'),
('15CS47P', 'Linux Lab  ', 'CSE', 4, 'C-15'),
('15CS51T', 'Software Engineering', 'CSE', 5, 'C-15'),
('15CS53T', 'Design and Analysis of Algorithms', 'CSE', 5, 'C-15'),
('15CS54T', 'Green Computing', 'CSE', 5, 'C-15'),
('15CS55P', 'Web Programming Lab   ', 'CSE', 5, 'C-15'),
('15CS56P', 'Design and Analysis of Algorithms  lab', 'CSE', 5, 'C-15'),
('15CS57P', 'Professional Practices lab ', 'CSE', 5, 'C-15'),
('15CS58P', 'Project Work Phase-1', 'CSE', 5, 'C-15'),
('15CS61T', 'Software_Testing', 'CSE', 6, 'C-15'),
('15CS62T', 'Network_Security_and_Management', 'CSE', 6, 'C-15'),
('15CS63A', 'Information_Storage_and_Management', 'CSE', 6, 'C-15'),
('15CS63B', 'Cloud_Computing', 'CSE', 6, 'C-15'),
('15CS63C', 'Mobile_Computing ', 'CSE', 6, 'C-15'),
('15CS63F', 'Internet_of_Things  ', 'CSE', 6, 'C-15'),
('15CS64P', ' Software_Testing_Lab   ', 'CSE', 6, 'C-15'),
('15CS65P', 'Network_Security_Lab  ', 'CSE', 6, 'C-15'),
('15CS67P', 'Project_Work_Phase-2', 'CSE', 6, 'C-15'),
('15EC01T', 'Concepts of Electrical & Electronic Engineering', 'CSE', 1, 'C-15'),
('15EC02P', 'Basic Electronics Lab ', 'CSE', 1, 'C-15'),
('15EC03P', 'Digital Electronics Lab', 'CSE', 2, 'C-15'),
('15SC01M', 'Engineering Mathematics -1', 'CSE', 1, 'C-15'),
('15SC02M', 'Engineering Mathematics -2  ', 'CSE', 2, 'C-15'),
('15SC03S', 'Applied Science', 'CSE', 1, 'C-15'),
('15SC04P', 'Applied Science Lab ', 'CSE', 1, 'C-15'),
('18CS66P', 'Inplant Training', 'CSE', 6, 'C-15');

-- --------------------------------------------------------

--
-- Table structure for table `doubt_solution`
--

CREATE TABLE `doubt_solution` (
  `teacher_email` varchar(80) NOT NULL,
  `solution` varchar(200) NOT NULL,
  `links` varchar(100) NOT NULL DEFAULT 'No Links',
  `doubt_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doubt_solution`
--

INSERT INTO `doubt_solution` (`teacher_email`, `solution`, `links`, `doubt_id`) VALUES
('staff1@gmail.com', 'nfasf fnadnfjds fdasjn', 'jaf djfasdjj', 3819),
('teacher@gmail.com', 'nfnke ', 'kjfjj', 3819),
('teacher@gmail.com', 'dasjdh', 'SELECT doubt,teacher_information.first_name,solution,links FROM doubt_solution,teacher_information,s', 3819),
('teacher@gmail.com', 'andjh', 'jjdjhdjds ', 3819),
('teacher@gmail.com', 'andjh', 'jjdjhdjds ', 3819);

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

CREATE TABLE `ebooks` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `semester` int(5) NOT NULL,
  `course` varchar(10) NOT NULL,
  `ebook_file` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ebooks`
--

INSERT INTO `ebooks` (`id`, `name`, `semester`, `course`, `ebook_file`) VALUES
(52394, 'Information Storage Management', 6, 'CSE', 'ism qb.txt'),
(55765, 'Network Security Management', 6, 'CSE', 'SE UNIT 1.pdf'),
(61656, 'Green Computing', 5, 'CSE', 'GC Notes.pdf'),
(70200, 'Operating System', 4, 'CSE', 'Operating System.pdf'),
(70397, 'Java OOPs', 4, 'CSE', 'New doc 8 Jul 2021 10.30 am.pd'),
(73592, 'C Programming', 3, 'CSE', 'Programming with c.pdf'),
(77588, 'Software Testing', 6, 'CSE', 'Software Testing Notes.pdf'),
(83774, 'Web Programming', 5, 'CSE', 'UNIT-1 Notes.pdf'),
(83848, 'DBMS', 3, 'CSE', 'Database Management System.Not'),
(84122, 'Design & Analysis of Algorithm', 5, 'CSE', 'DAA_Orignal.pdf'),
(86471, 'DAA', 4, 'CSE', 'Capture.PNG'),
(89393, 'Computer Network', 3, 'CSE', 'computer networks.pdf'),
(97756, 'Data Structure', 4, 'CSE', 'DS_Lab_Prgms_Abhi.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE `exam_result` (
  `date` varchar(20) DEFAULT NULL,
  `register_no` varchar(20) NOT NULL,
  `subject 1` varchar(40) NOT NULL,
  `subject 2` varchar(40) NOT NULL,
  `subject 3` varchar(40) NOT NULL,
  `subject  4` varchar(40) NOT NULL,
  `subject 5` varchar(40) NOT NULL,
  `subject 6` varchar(40) NOT NULL,
  `subject 7` varchar(40) NOT NULL,
  `subject 8` varchar(40) NOT NULL,
  `subject 9` varchar(40) NOT NULL,
  `subject 10` varchar(40) NOT NULL,
  `marks 1` int(3) NOT NULL,
  `marks 2` int(3) NOT NULL,
  `marks 3` int(3) NOT NULL,
  `marks 4` int(3) NOT NULL,
  `marks 5` int(3) NOT NULL,
  `marks 6` int(3) NOT NULL,
  `marks 7` int(3) NOT NULL,
  `marks 8` int(3) NOT NULL,
  `marks 9` int(3) NOT NULL,
  `marks 10` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_result`
--

INSERT INTO `exam_result` (`date`, `register_no`, `subject 1`, `subject 2`, `subject 3`, `subject  4`, `subject 5`, `subject 6`, `subject 7`, `subject 8`, `subject 9`, `subject 10`, `marks 1`, `marks 2`, `marks 3`, `marks 4`, `marks 5`, `marks 6`, `marks 7`, `marks 8`, `marks 9`, `marks 10`) VALUES
('$date', '$reg', '$sub1', '$sub2', '$sub3', '$sub4', '$sub5', '$sub6', '$sub7', '$sub8', '$sub9', '$sub10', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('26-8-2022', 'Select Register No', '15CS61T', '15CS62T', '15CS63A', '15CS43T', 'Select Subject 5', 'Select Subject 6', 'Select Subject 7', 'Select Subject 8', 'Select Subject 9', 'Select Subject 10', 70, 60, 70, 23, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ia_result`
--

CREATE TABLE `ia_result` (
  `date` varchar(30) NOT NULL,
  `register_no` varchar(30) NOT NULL,
  `scheme` varchar(10) NOT NULL,
  `subject` varchar(40) NOT NULL,
  `ia` varchar(10) NOT NULL,
  `course` varchar(30) NOT NULL,
  `semester` int(10) NOT NULL,
  `total_marks` int(5) NOT NULL,
  `obtained_marks` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ia_result`
--

INSERT INTO `ia_result` (`date`, `register_no`, `scheme`, `subject`, `ia`, `course`, `semester`, `total_marks`, `obtained_marks`) VALUES
('$date', '$register_no', '$scheme', '$subject', '$ia', '$course', 0, 0, 0),
('3-8-2022', '182ce19020', 'C-15', 'Network', 'ia-1', 'ME', 5, 0, 0),
('3-8-2022', '182ce19020', 'C-15', 'Select Subject', 'ia-2', 'CSE', 0, 20, 15);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Role` varchar(10) NOT NULL,
  `account` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `user_id`, `Password`, `Role`, `account`) VALUES
(2, 'admin@gmail.com', 'admin123***', 'Admin', 'Activate'),
(5, 'staff1@gmail.com', 'teacher123*', 'Teacher', 'Activate'),
(6, '156EE16299', 'student123*', 'Student', 'Activate'),
(23, '147cs19001', 'student123*', 'Student', 'Activate'),
(29, 'dbhsdhs@gmail.com', 'teacher123*', 'Teacher', ''),
(30, 'dbhsdhs@gmail.com', 'teacher123*', 'Teacher', ''),
(31, 'jhjhjhjh', 'teacher123*', 'Teacher', ''),
(32, 'jhjhjhjh', 'teacher123*', 'Teacher', ''),
(33, 'jhjhjhjh', 'teacher123*', 'Teacher', ''),
(34, 'hjhj@gmail.com', 'teacher123*', 'Teacher', ''),
(35, 'hjhj@gmail.com', 'teacher123*', 'Teacher', ''),
(36, '236135635', 'student123*', 'Student', ''),
(37, 'teacher@gmail.com', 'teacher123*', 'Teacher', 'Activate'),
(38, 'hjhj@gmail.com', 'teacher123*', 'Teacher', ''),
(39, '643723442', 'student123*', 'Student', 'Activate'),
(40, '182ce19020', 'student123*', 'Student', 'Activate'),
(41, '187CS18902', 'student123*', 'Student', ''),
(43, 'library', 'library123*', 'Librarian', 'Activate'),
(44, '147CS19001', 'student123*', 'Student', 'Activate'),
(45, '147CS17029', 'student123*', 'Student', 'Activate'),
(46, '147CS19002', 'student123*', 'Student', 'Activate'),
(47, '147CS19007', 'student123*', 'Student', 'Activate'),
(48, '178CS19009', 'student123*', 'Student', 'Activate'),
(49, '147CS19003', 'student123*', 'Student', 'Activate'),
(50, '147CS19013', 'student123*', 'Student', 'Activate'),
(51, '147CS18002', 'student123*', 'Student', 'Activate'),
(52, '147cs19008', 'student123*', 'Student', 'Activate'),
(53, '147CS19006', 'student123*', 'Student', 'Activate'),
(54, '147CS19012', 'student123*', 'Student', 'Activate'),
(55, '147CS18009', 'student123*', 'Student', 'Activate'),
(56, '147CS18008', 'student123*', 'Student', 'Activate'),
(57, '132314343', 'student123*', 'Student', 'Activate'),
(58, '147EC19001', 'student123*', 'Student', 'Activate'),
(59, '147EC19002', 'student123*', 'Student', 'Activate'),
(60, '147EC19003', 'student123*', 'Student', 'Activate'),
(61, '147EC19004', 'student123*', 'Student', 'Activate'),
(62, '147EC19005', 'student123*', 'Student', 'Activate'),
(63, '147EC19006', 'student123*', 'Student', 'Activate'),
(64, '147EC19007', 'student123*', 'Student', 'Activate'),
(65, '147EC19008', 'student123*', 'Student', 'Activate'),
(66, '147EC19009', 'student123*', 'Student', 'Activate'),
(67, '147EC19010', 'student123*', 'Student', 'Activate'),
(68, '147ME19001', 'student123*', 'Student', 'Activate'),
(69, '147ME19002', 'student123*', 'Student', 'Activate'),
(70, '147ME19003', 'student123*', 'Student', 'Activate'),
(71, '147ME19004', 'student123*', 'Student', 'Activate'),
(72, '147ME19005', 'student123*', 'Student', 'Activate'),
(73, '147ME19006', 'student123*', 'Student', 'Activate'),
(74, '147ME19007', 'student123*', 'Student', 'Activate'),
(75, '147ME19007', 'student123*', 'Student', 'Activate'),
(76, '147ME19008', 'student123*', 'Student', 'Activate'),
(77, 'rameshitagi123@gmail.com', 'teacher123*', 'Teacher', 'Activate'),
(78, '21dhjur@gmail.com', 'teacher123*', 'Teacher', 'Activate'),
(79, 'praveen2431@gmail.com', 'teacher123*', 'Teacher', 'Activate'),
(80, '147CS19020', 'student123*', 'Student', 'Activate');

-- --------------------------------------------------------

--
-- Table structure for table `magazine`
--

CREATE TABLE `magazine` (
  `id` int(11) NOT NULL,
  `language` varchar(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `price` int(5) NOT NULL,
  `Publisher` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magazine`
--

INSERT INTO `magazine` (`id`, `language`, `Name`, `price`, `Publisher`) VALUES
(67592, 'Hindi', 'Mahabharat', 200, 'Kolkata pub'),
(83895, 'Hindi', 'Ramayana', 21, 'Delhi Pub');

-- --------------------------------------------------------

--
-- Table structure for table `mytable`
--

CREATE TABLE `mytable` (
  `id` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `course_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mytable`
--

INSERT INTO `mytable` (`id`, `name`, `course_code`) VALUES
('B.Fashion-S19-1', 'husnain', 'B.Fashion'),
('B.Fashion-S19-2', 'razarai663@gmail.com', 'B.Fashion'),
('MCS-S19-1', 'Muhammad Husnain Raza', 'MCS'),
('MCS-S19-2', 'razarai663@gmail.com', 'MCS'),
('MIT-S19-1', 'Muhammad Husnain Raza', 'MIT');

-- --------------------------------------------------------

--
-- Table structure for table `news_paper`
--

CREATE TABLE `news_paper` (
  `newspaper_id` int(5) NOT NULL,
  `language` varchar(20) NOT NULL,
  `newspaper_name` varchar(20) NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_paper`
--

INSERT INTO `news_paper` (`newspaper_id`, `language`, `newspaper_name`, `price`) VALUES
(57660, 'Kannada', 'Vijaywani', 21),
(89347, 'dfjhhh', 'hhdj', 32),
(94878, 'Marathi', 'Tarun Bharat', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notice_board`
--

CREATE TABLE `notice_board` (
  `notice_id` int(11) NOT NULL,
  `Date` varchar(15) NOT NULL,
  `Subject` varchar(40) NOT NULL,
  `Description` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice_board`
--

INSERT INTO `notice_board` (`notice_id`, `Date`, `Subject`, `Description`) VALUES
(3409, '24-7-2022', 'Dance Competation', 'Dance Competation is on Monday'),
(2047, '26-8-2022', 'Theory Exams', 'Theory exams will start from 1st september');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `session` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `session`, `created_date`) VALUES
(1, 'S19', '2020-03-11 20:20:44');

-- --------------------------------------------------------

--
-- Stand-in structure for view `short_student_info`
-- (See below for the actual view)
--
CREATE TABLE `short_student_info` (
`register_no` varchar(30)
,`first_name` varchar(30)
,`middle_name` varchar(30)
,`last_name` varchar(30)
,`course` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `attendance_id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `attendance` int(11) NOT NULL,
  `attendance_date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`attendance_id`, `course_code`, `subject_code`, `semester`, `student_id`, `attendance`, `attendance_date`) VALUES
(1, 'MCS', 'DBMS', 2, 'MCS-S19-1', 1, '15-03-20'),
(2, 'MCS', 'DBMS', 2, 'MCS-S19-1', 1, '15-03-20'),
(3, 'MCS', 'DBMS', 2, 'MCS-S19-1', 1, '15-03-20'),
(4, 'MCS', 'DBMS', 2, 'MCS-S19-1', 0, '15-03-20'),
(5, 'MCS', 'DLD', 2, 'MCS-S19-1', 1, '15-03-20'),
(6, 'MCS', 'OOP', 2, 'MCS-S19-1', 1, '15-03-20'),
(7, 'MCS', 'SE', 2, 'MCS-S19-1', 0, '15-03-20'),
(8, 'MCS', 'WEB', 2, 'MCS-S19-1', 1, '15-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `student_course_id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `roll_no` varchar(10) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `session` varchar(10) NOT NULL,
  `assign_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`student_course_id`, `course_code`, `semester`, `roll_no`, `subject_code`, `session`, `assign_date`) VALUES
(1, 'MCS', 2, 'MCS-S19-1', 'OOP', 'S19', '15-03-20'),
(2, 'MCS', 2, 'MCS-S19-1', 'DBMS', 'S19', '15-03-20'),
(3, 'MCS', 2, 'MCS-S19-1', 'DLD', 'S19', '15-03-20'),
(4, 'MCS', 2, 'MCS-S19-1', 'SE', 'S19', '15-03-20'),
(5, 'MCS', 2, 'MCS-S19-1', 'WEB', 'S19', '15-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `student_doubt`
--

CREATE TABLE `student_doubt` (
  `register_no` varchar(30) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `doubt` varchar(150) NOT NULL,
  `doubt_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_doubt`
--

INSERT INTO `student_doubt` (`register_no`, `subject`, `doubt`, `doubt_id`) VALUES
('', '', '', 0),
('147cs19001', 'Cloud', 'what is platform as a service sir?', 1135),
('147cs19001', 'Network', 'I am not understanding.. RSA Algorithm..Please explain me sir', 3819);

-- --------------------------------------------------------

--
-- Table structure for table `student_fee`
--

CREATE TABLE `student_fee` (
  `fee_voucher` int(11) NOT NULL,
  `roll_no` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_fee`
--

INSERT INTO `student_fee` (`fee_voucher`, `roll_no`, `amount`, `posting_date`, `status`) VALUES
(1, 'MCS-S19-1', 23455, '2020-03-29 11:24:36', 'Paid'),
(2, 'MCS-S19-1', 20093, '2020-03-30 12:35:39', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `recipt_no` int(10) NOT NULL,
  `date` varchar(15) NOT NULL,
  `register_no` varchar(30) NOT NULL,
  `total_fees` int(20) NOT NULL,
  `paid_fees` int(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_fees`
--

INSERT INTO `student_fees` (`recipt_no`, `date`, `register_no`, `total_fees`, `paid_fees`, `status`) VALUES
(31845, '26-8-2022', '147CS19003', 6500, 6500, 'Paid'),
(39612, '26-8-2022', '147CS19006', 7000, 7000, 'Paid'),
(50478, '26-8-2022', '147EC19010', 4000, 3000, 'Unpaid'),
(62150, '26-8-2022', '178CS19009', 7000, 7000, 'Paid'),
(74767, '26-8-2022', '147CS19001', 4500, 4500, 'Paid'),
(88613, '26-8-2022', '147CS19012', 5500, 5500, 'Paid'),
(89143, '26-8-2022', '147EC19007', 8000, 7000, 'Unpaid'),
(94350, '26-8-2022', '147CS19002', 6000, 5000, 'Unpaid'),
(94369, '26-8-2022', '147CS19007', 6000, 5000, 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `student_information`
--

CREATE TABLE `student_information` (
  `register_no` varchar(30) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `mobile_no` varchar(13) DEFAULT NULL,
  `mobile_no_2` varchar(13) DEFAULT NULL,
  `course` varchar(30) DEFAULT NULL,
  `applicant_status` varchar(30) DEFAULT NULL,
  `application_status` varchar(30) DEFAULT NULL,
  `dob` varchar(30) DEFAULT NULL,
  `native_city` varchar(30) DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `caste` varchar(30) DEFAULT NULL,
  `subcaste` varchar(30) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `date_of_submission` varchar(30) DEFAULT NULL,
  `nationality` varchar(30) DEFAULT NULL,
  `sslc_percentage` varchar(10) DEFAULT NULL,
  `home_address` varchar(80) DEFAULT NULL,
  `place_of_birth` varchar(30) DEFAULT NULL,
  `mother_tongue` varchar(30) DEFAULT NULL,
  `sslc_complition_date` varchar(30) DEFAULT NULL,
  `sslc_attempt` varchar(30) DEFAULT NULL,
  `profile_image` varchar(60) DEFAULT NULL,
  `matric_certificate` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_information`
--

INSERT INTO `student_information` (`register_no`, `first_name`, `middle_name`, `last_name`, `email`, `mobile_no`, `mobile_no_2`, `course`, `applicant_status`, `application_status`, `dob`, `native_city`, `pincode`, `caste`, `subcaste`, `gender`, `date_of_submission`, `nationality`, `sslc_percentage`, `home_address`, `place_of_birth`, `mother_tongue`, `sslc_complition_date`, `sslc_attempt`, `profile_image`, `matric_certificate`) VALUES
('132314343', 'fsdj', 'kjfjdj', 'kjdsfj', 'kjdfjskj@gmail.com', '3892817', '7234873472', 'CSE', 'Admitted', 'Approved', '2002-02-21', 'jfdhfjj', '43', 'Hindu', '2a', 'Male', '11-8-2022', 'Indian', '32', 'hjdsfh', 'jasdfh', 'hfjhs', '2019-02-21', '1', '', ''),
('147CS17029', 'Soyab ', 'M', 'Saidapur', 'soyab1211@gmail.com', '8938977473', '9893273732', 'CSE', 'Admitted', 'Approved', '2000-09-20', 'Gadag', '582102', 'Muslim', '2b', 'Male', '11-8-2022', 'Indian', '80', 'SB Nagar Betgeri', 'Betgeri', 'Hindi', '2017-06-21', '1', 'ZqEr0zMRM3E.jpg', '5JIRCN6B06c.jpg'),
('147CS18002', 'Pooja', 'M', 'Raybagi', 'pooja@gmail.com', '8993278732', '9832732323', 'CSE', 'Admitted', 'Approved', '2002-06-21', 'Gadag', '582102', 'Hindu', '2a', 'Female', '11-8-2022', 'Indian', '91', 'PB Road,Betgeri', 'Gadag', 'Hindi', '2019-06-21', '1', 'JoZazcPhW5Y.jpg', 'SGYrmWHLruk.jpg'),
('147CS18008', 'Anupama ', 'T', 'Gurubasavanavar', 'anupama@gmail.com', '8891272121', '889020222', 'CSE', 'Admitted', 'Approved', '2002-02-21', 'Gadag', '582102', 'Hindu', '2a', 'Male', '11-8-2022', 'Indian', '84', 'Hockey Ground,Gadag', 'Gadag', 'Kannada', '2019-06-21', '1', '1WsvLdTxeN4.jpg', 'RmO0BMX8J-0.jpg'),
('147CS18009', 'Muskan', 'R', 'Ramdurg', 'muskan32@gmail.com', '8983203221', '9898938321', 'CSE', 'Admitted', 'Approved', '2003-02-11', 'Ron', '582104', 'Muslim', '2b', 'Female', '11-8-2022', 'Indian', '89', 'Near Bustand Ron', 'Ron', 'Hindi', '2019-06-21', '1', 'UukVnrW-roE.jpg', 'RmO0BMX8J-0.jpg'),
('147CS19001', 'Abhisheksingh', 'Ranadheersingh', 'Fulanekar', 'abhishek@gmail.com', '7019221332', '8324733433', 'CSE', 'Admitted', 'Approved', '2003-10-31', 'Betgeri', '582102', 'Hindu', '2a', 'Male', '11-8-2022', 'Indian', '88', 'Gouri Gudi Gadag', 'Gadag', 'Hindi', '2019-06-22', '1', '500077500374_420045.jpg', 'QxAliZVh764.jpg'),
('147CS19002', 'Anishsingh', 'A ', 'Jamadar', 'anishj2312@gmail.com', '7213873222', '9736223233', 'CSE', 'Admitted', 'Approved', '2003-08-30', 'Gadag', '582102', 'Hindu', '2a', 'Male', '11-8-2022', 'Indian', '81', 'Rajput Galli, Betgeri', 'Gadag', 'Hindi', '2019-06-21', '1', 'oZmr7_qDs3s.jpg', 'KpjpoEDB0Jo.jpg'),
('147CS19003', 'Ayisha', 'M', 'Kukanoor', 'ayisha@gmail.com', '783747878', '737287893', 'CSE', 'Admitted', 'Approved', '2003-07-22', 'Gadag', '582102', 'Hindu', '2a', 'Male', '11-8-2022', 'Indian', '88', 'Tanginkai Bazzar,Betgeri', 'Betgeri', 'Hindi', '2019-06-21', '1', 'WLIJzbZXqc8.jpg', 'zPUjlMQLpfU.jpg'),
('147CS19006', 'Nasreen', 'R', 'Mulagund', 'nasreen@gmail.com', '8908887878', '8998875425', 'CSE', 'Admitted', 'Approved', '2003-03-21', 'Gadag', '582102', 'Muslim', '2b', 'Female', '11-8-2022', 'Indian', '77', 'MG Road,Gadag', 'Gadag', 'Hindi', '2019-06-21', '1', 'SkC-hOHHsw4.jpg', 't3xOIdJmm9k.jpg'),
('147CS19007', 'Kiran ', 'R ', 'Madar', 'kiran@gmail.com', '7283766323', '982376733', 'CSE', 'Admitted', 'Approved', '2002-07-24', 'Gadag', '582108', 'Hindu', '2a', 'Male', '11-8-2022', 'Indian', '83', 'Near Bustand hosalli', 'Hosalli', 'Kannada', '2019-06-21', '1', 'SlNaasXuuHo.jpg', '9NilCZSk4PU.jpg'),
('147cs19008', 'Kavya', 'R', 'Gudlanur', 'kavya@gmail.com', '8921889829', '9733373283', 'CSE', 'Admitted', 'Approved', '2003-02-22', 'Gadag', '582102', 'Hindu', '2a', 'Female', '11-8-2022', 'Indian', '78', 'PB Road,Betgeri', 'Gadag', 'Kannada', '2019-08-09', '1', 'wrXziQTIFUY.jpg', '767Ffbf-sQQ.jpg'),
('147CS19012', 'Nisarga', 'R', 'Devemane', 'nisarga@gmail.com', '7828332221', '8323723733', 'CSE', 'Admitted', 'Approved', '2002-02-21', 'Gadag', '582101', 'Hindu', '2a', 'Female', '11-8-2022', 'Indian', '88', 'DC Mill Road,Gadag', 'Betgeri', 'Kannada', '2019-07-03', '1', '767Ffbf-sQQ.jpg', '2A-MD_DhtVE.jpg'),
('147CS19013', 'Pallavi ', 'R', 'Halabhavi', 'pallavi@gmail.com', '7892327387', '8993828732', 'CSE', 'Admitted', 'Approved', '2002-02-21', 'Gadag', '582102', 'Hindu', '2a', 'Male', '11-8-2022', 'Indian', '89', 'Near MC Road,Gadag', 'Dharwad', 'Kannada', '2019-06-21', '1', 'oZmr7_qDs3s.jpg', 'OVhcOk9VsPM.jpg'),
('147CS19020', 'James ', 'Smith ', 'Anderson', 'jamesanderson@gmail.com', '8753511123', '9825111234', 'CSE', 'Admitted', 'Approved', '2002-10-21', 'Banglore', '582731', 'Hindu', '2a', 'Male', '14-8-2022', 'Indian', '92', 'Street Ring Road,Banglore', 'New York', 'English', '2019-06-21', '1', 'index.jpg', ''),
('147EC19001', 'Qabool', 'Ram ', 'Bandi', 'qabool324@gmail.com', '893273773', '883774827', 'ECE', 'Admitted', 'Approved', '2003-02-22', 'gadag', '582102', 'Hindu', '2a', 'Male', '11-8-2022', 'Indian', '82', '79,Lalitgunj,gadag', 'gurgaon', 'Hindi', '2003-06-21', '1', '', ''),
('147EC19002', 'Mowgli', ' ', 'Jayaraman', 'mowgli@gmail.com', '8945362189', '8976543219', 'ECE', 'Admitted', 'Approved', '2003-08-22', 'Gadag', '582102', 'Hindu', '2a', 'Male', '11-8-2022', 'Indian', '86', '37,ObaidPur,Gadag', 'obaidPur', 'Hindi', '2019-06-21', '1', '', ''),
('147EC19003', 'Arjun', '', 'jaggi', '23werr2@gmail.com', '8976543210', '8907654321', 'ECE', 'Admitted', 'Approved', '2003-05-20', 'Gadag', '582102', 'Hindu', 'obc', 'Male', '11-8-2022', 'Indian', '87', '90,aundh,Gadag', 'Gadag', 'kannada', '2019-06-21', '1', '', ''),
('147EC19004', 'Somnath', 'Dev', 'Pall', '356t@gmail.com', '8976098765', '8912345678', 'ECE', 'Admitted', 'Approved', '2003-07-06', 'Gadag', '582102', 'Hindu', '2a', 'Male', '11-8-2022', 'Indian', '94', 'ring,road,Gadag', 'Gadag', 'Hindi', '2019-06-21', '1', '', ''),
('147EC19005', 'Ajay', ' ', 'Chia', 'sygfr@gmail.com', '8976545677', '8934563456', 'ECE', 'Admitted', 'Approved', '2003-08-04', 'Gadag', '582102', 'Hindu', '2b', 'Male', '11-8-2022', 'Indian', '92', 'rfyfdy,Gadag', 'Gadag', 'Kannada', '2019-06-21', '1', '', ''),
('147EC19006', 'Naina', '', 'Kapur', 'wert@gmail.com', '8970987053', '8902613498', 'ECE', 'Admitted', 'Approved', '2003-08-05', 'Gadag', '582102', 'Hindu', '2b', 'Female', '11-8-2022', 'Indian', '94', 'ljytg,Gadag', 'Gadag', 'kannada', '', '1', '', ''),
('147EC19007', 'Dipti', '   ', 'Kata', 'dhjur@gmail.com', '8967678543', '8909876543', 'ECE', 'Admitted', 'Approved', '2003-05-04', 'Gadag', '582102', 'Hindu', 'obc', 'Female', '11-8-2022', 'Indian', '94', 'fdjkh,Gadag', 'Gadag', 'Hindi', '2019-06-21', '1', '', ''),
('147EC19008', 'Falguni', '  ', 'Kalita', 'dyiuy@gmail.com', '8902345432', '8970765432', 'ECE', 'Admitted', 'Approved', '2003-05-04', 'Gadag', '582102', 'Hindu', 'obc', 'Female', '11-8-2022', 'Indian', '95', 'wet,Gadag', 'Gadag', 'Kannada', '2019-06-21', '1', '', ''),
('147EC19009', 'Maya', ' ', 'Pant', 'fhj@gmail.com', '8978085642', '8905643217', 'ECE', 'Admitted', 'Approved', '2003-04-22', 'Gadag', '582102', 'Hindu', '2a', 'Female', '11-8-2022', 'Indian', '93', 'ddfhh,Gadag', 'Gadag', 'Hindi', '2019-06-21', '1', '', ''),
('147EC19010', 'Anshu', '  ', 'Dhar', 'dgh@gmail.com', '897654398', '897654321', 'ECE', 'Admitted', 'Approved', '2003-08-13', 'Gadag', '582102', 'Hindu', '2a', 'Female', '11-8-2022', 'Indian', '91', 'dujb,Gadag', 'Gadag', 'Hindi', '2019-06-21', '1', '', ''),
('147ME19001', 'Mukund', '  ', 'Shukla', 'rfyguh@gmail.com', '8970756432', '8970723997', 'ME', 'Admitted', 'Approved', '2003-11-14', 'Gadag', '582102', 'Hindu', '2a', 'Male', '11-8-2022', 'Indian', '92', 'dhkhkj,Gadag', 'Gadag', 'Kannada', '2019-06-21', '1', '', ''),
('147ME19002', 'Ajeet', '  ', 'Walia', 'sfgfds@gmail.com', '8956723145', '8976544334', 'ME', 'Admitted', 'Approved', '2003-12-21', 'Gadag', '582102', 'Hindu', '2b', 'Male', '11-8-2022', 'Indian', '90', 'fgiyggj,Gadag', 'Gadag', 'Kannada', '2019-06-21', '1', '', ''),
('147ME19003', 'Kalyan', '  ', 'Bhakta', 'hohyt@gmail.com', '8976546890', '8976324567', 'ME', 'Admitted', 'Approved', '2003-02-14', 'Gadag', '582102', 'Hindu', '2a', 'Male', '11-8-2022', 'Indian', '85', 'fuyiyi,Gadag', 'Gadag', 'Kannada', '', '1', '', ''),
('147ME19004', 'Amrit  ', '  ', 'keer', 'dhguyt@gmail.com', '8965434676', '8976578907', 'ME', 'Admitted', 'Approved', '2003-12-13', 'Gadag', '582102', 'Hindu', '2b', 'Male', '11-8-2022', 'Indian', '86', 'guhug,Gadag', 'Gadag', 'Hindi', '2019-06-21', '1', '', ''),
('147ME19005', 'Aarif', '   ', 'Kashyap', 'duyiuj@gmail.com', '8976543456', '8978906754', 'ME', 'Admitted', 'Approved', '2003-06-05', 'Gadag', '582102', 'Hindu', '2a', 'Male', '11-8-2022', 'Indian', '98', 'fxdgh,Gadag', 'Gadag', 'Hindi', '', '1', '', ''),
('147ME19006', 'Chhaya', '  ', 'Bhatti', 'vjgkgg@gmail.com', '8978905566', '8978956789', 'ME', 'Admitted', 'Approved', '2003-09-12', 'Gadag', '582102', 'Hindu', '2a', 'Select Gender', '11-8-2022', 'Indian', '95', 'fug,Gadag', 'Gadag', 'Hindi', '2019-06-21', '1', '', ''),
('147ME19007', 'Juhi', '  ', 'Vala', 'hguy@gmail.com', '8976543215', '8978906543', 'ME', 'Admitted', 'Approved', '2003-05-05', 'Gadag', '582102', 'Hindu', '2a', 'Female', '11-8-2022', 'Indian', '96', 'ghkuyrd,Gadag', 'Gadag', 'Hindi', '2019-06-21', '1', '', ''),
('147ME19008', 'Diya', '', 'Modi', 'dyty@gmail.com', '8976543213', '8976543245', 'ME', 'Admitted', 'Approved', '2003-04-15', 'Gadag', '582102', 'Hindu', '2a', 'Female', '11-8-2022', 'Indian', '93', 'gjjklhg,Gadag', 'Gadag', 'Hindi', '2019-06-21', '1', '', ''),
('178CS19009', 'Raghavendra', 'M', 'Hulakund', 'raghu4324@gmail.com', '783973728', '8037847732', 'CSE', 'Admitted', 'Approved', '2001-01-20', 'Gadag', '582102', 'Hindu', '2a', 'Male', '11-8-2022', 'Indian', '86', 'Station Road,Betgeri', 'Betgeri', 'Hindi', '2019-06-21', '1', 'KrbtE8Br8y0.jpg', 'BK9KeewF-QI.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendance`
--

CREATE TABLE `teacher_attendance` (
  `attendance_id` int(11) NOT NULL,
  `teacher_id` varchar(30) NOT NULL,
  `attendance` int(11) NOT NULL,
  `attendance_date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`attendance_id`, `teacher_id`, `attendance`, `attendance_date`) VALUES
(1, '3', 1, '09-03-20'),
(2, '3', 1, '10-03-20'),
(3, '3', 1, '11-04-20'),
(4, '3', 1, '30-03-20'),
(5, '2', 0, '30-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_courses`
--

CREATE TABLE `teacher_courses` (
  `teacher_courses_id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `teacher_id` varchar(10) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `assign_date` varchar(10) NOT NULL,
  `total_classes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_courses`
--

INSERT INTO `teacher_courses` (`teacher_courses_id`, `course_code`, `semester`, `teacher_id`, `subject_code`, `assign_date`, `total_classes`) VALUES
(1, 'MCS', 2, '3', 'OOP', '27-03-20', 30),
(2, 'MCS', 2, '1', 'DBMS', '27-03-20', 30),
(3, 'MCS', 2, '3', 'DLD', '27-03-20', 30),
(4, 'MCS', 2, '1', 'SE', '27-03-20', 30),
(5, 'MCS', 2, '3', 'WEB', '27-03-20', 30);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_information`
--

CREATE TABLE `teacher_information` (
  `teacher_id` varchar(30) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile_no` varchar(15) DEFAULT NULL,
  `alternate_mobile_no` varchar(15) DEFAULT NULL,
  `date_of_birth` varchar(30) DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `address` varchar(70) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `qualification` varchar(20) DEFAULT NULL,
  `experience` varchar(20) DEFAULT NULL,
  `hire_date` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `profile_image` varchar(30) DEFAULT NULL,
  `resume` varchar(30) DEFAULT NULL,
  `matric_certificate` varchar(30) DEFAULT NULL,
  `qualification_certificate` varchar(30) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_information`
--

INSERT INTO `teacher_information` (`teacher_id`, `first_name`, `middle_name`, `last_name`, `email`, `mobile_no`, `alternate_mobile_no`, `date_of_birth`, `gender`, `address`, `city`, `qualification`, `experience`, `hire_date`, `status`, `profile_image`, `resume`, `matric_certificate`, `qualification_certificate`, `date`) VALUES
('178235142', 'Guru', 'Ragham', 'Charanam', 'teacher@gmail.com', '7019331732', '9763553122', '1991-03-21', 'Male', 'pb road,kc rani park,gadag-betgeri', 'gadag', 'B.Ed', '3', '2022-10-21', 'Permanent', 'wrXziQTIFUY.jpg', '6yGGbuX5O5o.jpg', '2A-MD_DhtVE.jpg', 'UukVnrW-roE.jpg', '2021-07-22'),
('19001', 'Siddalingeshwar ', 'L', 'Patil', 'siddlingeshwar312@gmail.com', '989289182', '898298282', '1991-10-31', 'Male', 'Gadag', 'Gadag', 'B.E', '4', '11-8-2022', 'Permanent', 'GPL-I2jevRY.jpg', 'UukVnrW-roE.jpg', 'AspXHqEzAQs.jpg', 't3xOIdJmm9k.jpg', '2011-08-22'),
('19002', 'Shivaji', ' ', 'Lamani', 'shivaji4321@gmail.com', '938213727', '839843882', '1991-02-21', 'Male', 'Gadag', 'Gadag', 'B.E', '4', '11-8-2022', 'Contract', 'UukVnrW-roE.jpg', '6yGGbuX5O5o.jpg', 'SkC-hOHHsw4.jpg', 'QrwDutd2l-Q.jpg', '2011-08-22'),
('19003', 'Anupama', ' ', 'Tambrallimath', 'anupama3232@gmail.com', '7326367232', '998983827', '2002-08-31', 'Female', 'Gadag', 'Gadag', 'B.E', '3', '11-8-2022', 'Permanent', 'UukVnrW-roE.jpg', '6yGGbuX5O5o.jpg', '2A-MD_DhtVE.jpg', 't3xOIdJmm9k.jpg', '2011-08-22'),
('19004', 'Mahantesh', ' ', 'Guddin', 'guddin@gmail.com', '8212612211', '898298382', '2003-02-21', 'Female', 'Home Add, Gadag', 'Betgeri', 'B.E', '3', '11-8-2022', 'Permanent', '6yGGbuX5O5o.jpg', '767Ffbf-sQQ.jpg', 'RmO0BMX8J-0.jpg', 'UukVnrW-roE.jpg', '2011-08-22'),
('19009', 'Praveeen', 'M', 'Patel', 'praveen2431@gmail.com', '782378648', '6763474', '', 'Select ', '', '', 'B.E', '0', '12-8-2022', 'Select Status', '', '', '', '', '2012-08-22'),
('21217', 'fakjj', 'jjdksjfsk', 'jkjfjdk', '21dhjur@gmail.com', '67', '676', '2002-02-21', 'Male', '', '', 'B.E', '0', '12-8-2022', 'Select Status', '', '', '', '', '2011-08-22'),
('36737', 'jhsh', 'hjfhdsh', 'hjhjdhfh', 'hjdsh@gmail.com', '732476675', '12443421', '2000-02-21', 'Male', 'ndahh', 'hjhfjh', 'B.E', '2', '27-7-2022', 'Contract', 'uides.png', 'webpc-passthru.webp', 'Dataflow-diagram-of-toll-syste', 'uides.png', '2027-07-22'),
('5265362354', 'dsa', 'hjdf', 'jhfd', '5ad@gmail.com', '36237356', '62352653', '1992-03-12', 'Male', 'gadga', 'gfga', 'B.E', '2', '2014-02-02', 'Contract', '767Ffbf-sQQ.jpg', '767Ffbf-sQQ.jpg', 'AspXHqEzAQs.jpg', '6yGGbuX5O5o.jpg', '2021-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_notice`
--

CREATE TABLE `teacher_notice` (
  `assignmet_id` int(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `due_date` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_notice`
--

INSERT INTO `teacher_notice` (`assignmet_id`, `date`, `subject`, `due_date`, `description`) VALUES
(1842, '30-7-2022', 'Cloud', '2022-08-03', 'Complete notes and submit on monday'),
(2430, '26-8-2022', 'Network_Security_and', '2022-08-30', 'Make report on software testing tool and submit'),
(2837, '12-8-2022', 'Network_Security_and', '2022-08-14', 'COmplete and submit'),
(4374, '3-8-2022', 'Python', '2022-08-24', 'write prgm to add two nors');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_salary`
--

CREATE TABLE `teacher_salary` (
  `recipt_no` int(10) NOT NULL,
  `date_paid` varchar(20) NOT NULL,
  `teacher_id` varchar(20) NOT NULL,
  `salary_paid` int(20) NOT NULL,
  `advance_salary` int(20) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_salary`
--

INSERT INTO `teacher_salary` (`recipt_no`, `date_paid`, `teacher_id`, `salary_paid`, `advance_salary`) VALUES
(70674, '2-8-2022', '36737', 80000, 0),
(79225, '2-8-2022', '178235142', 40000, 0),
(50949, '26-8-2022', '19009', 50000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_salary_allowances`
--

CREATE TABLE `teacher_salary_allowances` (
  `teacher_id` int(11) NOT NULL,
  `basic_salary` int(11) NOT NULL,
  `medical_allowance` int(11) NOT NULL,
  `hr_allowance` int(11) NOT NULL,
  `scale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_salary_allowances`
--

INSERT INTO `teacher_salary_allowances` (`teacher_id`, `basic_salary`, `medical_allowance`, `hr_allowance`, `scale`) VALUES
(1, 40000, 5, 10, 15),
(2, 55000, 7, 15, 18),
(3, 43000, 5, 8, 14),
(146, 20000, 0, 0, 0),
(312314, 20000, 1000, 8000, 11000),
(178235142, 20000, 1000, 2000, 17000);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_salary_report`
--

CREATE TABLE `teacher_salary_report` (
  `salary_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `paid_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_salary_report`
--

INSERT INTO `teacher_salary_report` (`salary_id`, `teacher_id`, `total_amount`, `status`, `paid_date`) VALUES
(1, 1, 46000, 'Paid', '2020-03-27 11:28:57'),
(2, 2, 67100, 'Paid', '2020-03-27 11:50:13'),
(3, 3, 48590, 'Paid', '2020-03-27 11:55:58'),
(4, 1, 46000, 'Paid', '2020-03-27 12:33:39'),
(5, 3, 48590, 'Paid', '2020-03-28 08:26:59'),
(6, 2, 67100, 'Paid', '2020-03-28 08:30:46'),
(7, 2, 67100, 'Paid', '2020-03-28 08:32:06'),
(8, 2, 67100, 'Paid', '2020-03-28 08:32:46'),
(9, 2, 67100, 'Paid', '2020-03-28 08:33:59'),
(10, 2, 67100, 'Paid', '2020-03-28 08:35:54'),
(11, 2, 67100, 'Paid', '2020-03-28 08:38:17'),
(12, 2, 67100, 'Paid', '2020-03-28 08:39:22'),
(13, 2, 67100, 'Paid', '2020-03-28 08:40:44'),
(14, 2, 67100, 'Paid', '2020-03-28 08:41:26'),
(15, 2, 67100, 'Paid', '2020-03-28 08:42:25'),
(16, 2, 67100, 'Paid', '2020-03-28 08:43:32'),
(17, 2, 67100, 'Paid', '2020-03-28 08:44:03'),
(18, 2, 67100, 'Paid', '2020-03-28 08:44:39'),
(19, 2, 67100, 'Paid', '2020-03-28 08:45:09'),
(20, 2, 67100, 'Paid', '2020-03-28 08:45:22'),
(21, 2, 67100, 'Paid', '2020-03-28 08:45:36'),
(22, 2, 67100, 'Paid', '2020-03-28 08:45:45'),
(23, 2, 67100, 'Paid', '2020-03-28 08:45:59'),
(24, 2, 67100, 'Paid', '2020-03-28 08:47:42'),
(25, 2, 67100, 'Paid', '2020-03-28 08:48:11'),
(26, 3, 48590, 'Paid', '2020-03-28 08:48:22'),
(27, 3, 48590, 'Paid', '2020-03-28 08:48:40'),
(28, 3, 48590, 'Paid', '2020-03-28 10:48:28'),
(29, 3, 48590, 'Paid', '2020-03-28 10:49:47'),
(30, 3, 48590, 'Paid', '2020-03-30 12:37:11'),
(31, 178235142, 620000, 'Paid', '2022-07-23 18:37:36'),
(32, 178235142, 620000, 'Paid', '2022-07-23 18:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `timing_from` varchar(10) NOT NULL,
  `timing_to` varchar(10) NOT NULL,
  `day` varchar(20) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `room_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`id`, `course_code`, `semester`, `timing_from`, `timing_to`, `day`, `subject_code`, `room_no`) VALUES
(1, 'MCS', 2, '18:00', '21:00', '1', 'OOP', 21),
(2, 'MCS', 2, '18:00', '21:00', '2', 'DBMS', 21),
(3, 'MCS', 2, '18:00', '21:00', '3', 'DLD', 7),
(4, 'MCS', 2, '18:00', '21:00', '4', 'SE', 21),
(5, 'MCS', 2, '18:00', '21:00', '5', 'WEB', 21),
(6, 'MIT', 2, '18:00', '21:00', '4', 'MBAD', 12),
(7, 'CE', 6, '11:22', '15:21', '1', '15CS61P', 12);

-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--

CREATE TABLE `weekdays` (
  `day_id` int(11) NOT NULL,
  `day_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weekdays`
--

INSERT INTO `weekdays` (`day_id`, `day_name`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

-- --------------------------------------------------------

--
-- Structure for view `book_issued_status`
--
DROP TABLE IF EXISTS `book_issued_status`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `book_issued_status`  AS SELECT `book_issued`.`register_no` AS `register_no`, `book_issued`.`issue_id` AS `issue_id`, `book_issued`.`book_title` AS `book_title`, `book_issued`.`issued_date` AS `issued_date`, `book_issued`.`due_date` AS `due_date`, `student_information`.`first_name` AS `first_name`, `student_information`.`middle_name` AS `middle_name`, `student_information`.`last_name` AS `last_name` FROM (`student_information` join `book_issued`) WHERE `student_information`.`register_no` = `book_issued`.`register_no` ;

-- --------------------------------------------------------

--
-- Structure for view `short_student_info`
--
DROP TABLE IF EXISTS `short_student_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `short_student_info`  AS SELECT `student_information`.`register_no` AS `register_no`, `student_information`.`first_name` AS `first_name`, `student_information`.`middle_name` AS `middle_name`, `student_information`.`last_name` AS `last_name`, `student_information`.`course` AS `course` FROM `student_information` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_semester`
--
ALTER TABLE `assign_semester`
  ADD PRIMARY KEY (`register_no`);

--
-- Indexes for table `book_information`
--
ALTER TABLE `book_information`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `class_result`
--
ALTER TABLE `class_result`
  ADD PRIMARY KEY (`class_result_id`);

--
-- Indexes for table `complaint_box`
--
ALTER TABLE `complaint_box`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `course_subjects`
--
ALTER TABLE `course_subjects`
  ADD PRIMARY KEY (`subject_code`);

--
-- Indexes for table `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_result`
--
ALTER TABLE `exam_result`
  ADD PRIMARY KEY (`register_no`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `magazine`
--
ALTER TABLE `magazine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mytable`
--
ALTER TABLE `mytable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_paper`
--
ALTER TABLE `news_paper`
  ADD PRIMARY KEY (`newspaper_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`student_course_id`),
  ADD KEY `course_code` (`course_code`);

--
-- Indexes for table `student_doubt`
--
ALTER TABLE `student_doubt`
  ADD PRIMARY KEY (`doubt_id`);

--
-- Indexes for table `student_fee`
--
ALTER TABLE `student_fee`
  ADD PRIMARY KEY (`fee_voucher`),
  ADD KEY `roll_no` (`roll_no`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`recipt_no`);

--
-- Indexes for table `student_information`
--
ALTER TABLE `student_information`
  ADD PRIMARY KEY (`register_no`);

--
-- Indexes for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `teacher_courses`
--
ALTER TABLE `teacher_courses`
  ADD PRIMARY KEY (`teacher_courses_id`);

--
-- Indexes for table `teacher_information`
--
ALTER TABLE `teacher_information`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_notice`
--
ALTER TABLE `teacher_notice`
  ADD PRIMARY KEY (`assignmet_id`);

--
-- Indexes for table `teacher_salary_allowances`
--
ALTER TABLE `teacher_salary_allowances`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_salary_report`
--
ALTER TABLE `teacher_salary_report`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekdays`
--
ALTER TABLE `weekdays`
  ADD PRIMARY KEY (`day_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_result`
--
ALTER TABLE `class_result`
  MODIFY `class_result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `student_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_fee`
--
ALTER TABLE `student_fee`
  MODIFY `fee_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher_courses`
--
ALTER TABLE `teacher_courses`
  MODIFY `teacher_courses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher_salary_report`
--
ALTER TABLE `teacher_salary_report`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `weekdays`
--
ALTER TABLE `weekdays`
  MODIFY `day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `teacher_salary_report`
--
ALTER TABLE `teacher_salary_report`
  ADD CONSTRAINT `teacher_salary_report_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_salary_allowances` (`teacher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
