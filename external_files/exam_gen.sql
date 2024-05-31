-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2024 at 06:36 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_gen`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `cid` int(11) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `UserID` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`cid`, `subject`, `message`, `UserID`) VALUES
(2, 'BUG: Manually Created Exams', 'Saved exams randomly disappear on each login or when generating other exams.', 3),
(3, 'Feature Request: Forget Password', 'Request Add Forget Password via Email. There is no other way of restoring password without contacting admins :(.', 9),
(4, 'Print Multiple Exams.', 'Is there a way for printing multiple exams on exam preview page? how? if not can you add this feature or similar features?', 7),
(5, 'Login Button.', 'Login Button Not Working On Internet Explorer 11.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `CourseID` int(11) NOT NULL,
  `CourseString` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CourseString`) VALUES
(1, 'Website Dev''t'),
(2, 'C++ Basics');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `ExamID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`ExamID`, `CourseID`, `DateTime`, `UserID`) VALUES
(2, 1, '2024-11-03 17:29:01', 5),
(3, 2, '2024-11-03 18:12:25', 6),
(4, 2, '2024-11-03 18:12:44', 6),
(5, 1, '2024-11-06 05:40:25', 6),
(7, 1, '2024-11-07 15:50:28', 1),
(8, 1, '2024-11-08 00:18:57', 10),
(9, 2, '2024-11-08 00:20:03', 10),
(10, 1, '2024-11-08 00:20:24', 10),
(11, 1, '2024-11-08 00:21:03', 7),
(12, 2, '2024-11-08 00:21:12', 7);

-- --------------------------------------------------------

--
-- Table structure for table `examquestions`
--

CREATE TABLE IF NOT EXISTS `examquestions` (
  `ExamID` int(11) NOT NULL,
  `QuestionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examquestions`
--

INSERT INTO `examquestions` (`ExamID`, `QuestionID`) VALUES
(2, 1),
(5, 1),
(7, 1),
(11, 1),
(5, 2),
(7, 2),
(8, 2),
(5, 3),
(7, 3),
(8, 3),
(2, 4),
(5, 4),
(7, 4),
(8, 4),
(5, 5),
(7, 5),
(8, 5),
(2, 6),
(5, 6),
(7, 6),
(10, 6),
(2, 7),
(5, 7),
(7, 7),
(8, 7),
(10, 7),
(2, 8),
(5, 8),
(7, 8),
(10, 8),
(11, 8),
(5, 9),
(7, 9),
(8, 9),
(10, 9),
(5, 10),
(7, 10),
(8, 10),
(10, 10),
(11, 10),
(2, 11),
(7, 11),
(2, 12),
(7, 12),
(11, 12),
(7, 13),
(7, 14),
(11, 14),
(2, 15),
(7, 15),
(2, 16),
(7, 16),
(10, 16),
(7, 17),
(2, 18),
(7, 18),
(10, 18),
(3, 19),
(4, 19),
(9, 19),
(12, 19),
(3, 20),
(9, 20),
(12, 20),
(3, 21),
(4, 21),
(3, 22),
(4, 22),
(9, 22),
(3, 23),
(4, 23),
(9, 23),
(12, 23),
(9, 24),
(12, 24);

-- --------------------------------------------------------

--
-- Table structure for table `exam_manual`
--

CREATE TABLE IF NOT EXISTS `exam_manual` (
  `ExamID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `ExamTitle` text NOT NULL,
  `ExamString` text NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_manual`
--

INSERT INTO `exam_manual` (`ExamID`, `CourseID`, `ExamTitle`, `ExamString`, `DateTime`, `UserID`) VALUES
(6, 1, 'Quiz #5', '\n						\n						\n						\n						\n						\n						\n					<div id="A" style="background-color: transparent; min-height: 1000px; width: 100%; padding-top: 20px; overflow: auto;"><style></style><section style="width: 816px; min-height: 1056px; padding: 96px;"><p class=" Normal" style="text-align: center;"><span style="font-weight: 700; font-size: 21px; background-color: white;">ADMAS UNIVERSITY</span></p><p class=" Normal" style="text-align: center;"><span style="font-weight: 700; font-size: 21px; background-color: white;">WEB QUIZ</span></p><p class=" Normal"><span style="font-weight: 700; font-size: 21px; background-color: white;"></span></p><p class=" Normal"><span style="font-weight: 700; font-size: 21px; background-color: white;"><u><i>Question: 1</i></u></span></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;">Web page editors works on a ____ principle.</span></p><p class=" Normal"><span style="background-color: white;">(A) WWW   (B) HTML   (C) WYSIWY     m(D) WYGWYSI</span></p><p class=" Normal"><span style="background-color: white;">Ans: C </span></p><p class=" Normal"><span style="background-color: white;">Question: 2</span></p><p class=" Normal"><span style="background-color: white;">Which program is used by web clients to view the web pages?</span></p><p class=" Normal"><span style="background-color: white;">(A) Web browser     (B) Protocol    (C) Web server   (D) Search Engine</span></p><p class=" Normal"><span style="background-color: white;">Ans: A</span></p><p class=" Normal"><span style="background-color: white;">Question: 3</span></p><p class=" Normal"><span style="background-color: white;">What is the name of the location address of the hypertext documents?</span></p><p class=" Normal"><span style="background-color: white;">(A) Uniform Resource Locator   (B) Web server  (C) File  (D) Web address</span></p><p class=" Normal"><span style="background-color: white;">Ans: A</span></p><p class=" Normal"><span style="background-color: white;">Uniform Resource Locator</span></p><p class=" Normal"><span style="background-color: white;">Question: 4</span></p><p class=" Normal"><span style="background-color: white;">What are shared on the Internet and are called as Web pages?</span></p><p class=" Normal"><span style="background-color: white;">(A) Programs     (B) Cables    (C) Hypertext documents  (D) None</span></p><p class=" Normal"><span style="background-color: white;">Ans: C</span></p><p class=" Normal"><span style="background-color: white;">Hypertext documents</span></p><p class=" Normal"><span style="background-color: white;">Question: 5</span></p><p class=" Normal"><span style="background-color: white;">How many colour names are used by the browsers?</span></p><p class=" Normal"><span style="background-color: white;">(A) 8     (B) 10  (C) 12   (D) 16</span></p><p class=" Normal"><span style="background-color: white;">Ans: D</span></p><p class=" Normal"><span style="background-color: white;">Toggle navigation</span></p><p class=" Normal"><span style="font-size: 21px; background-color: white;"><b style=""><u><i>Question: 6</i></u></b></span></p><p class=" Normal"><span style="background-color: white;">Which tag is used to display text in title bar of a web document?</span></p><p class=" Normal"><span style="background-color: white;">(A) Body tag  (B) Meta tag  (C) Title tag  (D) Comment tag</span></p><p class=" Normal"><span style="background-color: white;">Ans: C</span></p><p class=" Normal"><span style="background-color: white;">Title tag</span></p><p class=" Normal"><span style="background-color: white;"> </span><span style="background-color: white;">True and False (T/F)</span></p><p class=" Normal"><span style="background-color: white;">1    Internet is not a commercial information service.               (F)</span></p><p class=" Normal"><span style="background-color: white;">.2    The IP address space is divided into classes five in all which are given letters A through E       (F)</span></p><p class=" Normal"><span style="background-color: white;">3    The Request for Comments (RFCs) core topics are Internet and the TCP/IP protocol suites.      (T)</span></p><p class=" Normal"><span style="background-color: white;">4    The Back and Forward buttons can be used to visit only pages from the same website              (F)</span></p><p class=" Normal"><span style="background-color: white;">5    A protocol used for fetching e-mail from a mailbox is POP3             (T)</span></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;"> </span></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;"> </span></p><p class=" Normal" style="margin-bottom: 13px; line-height: 115%; text-align: left;"><span style="background-color: white;"></span></p></section></div>												', '2024-11-07 21:02:15', 1),
(7, 1, 'Web Development Assignment 5 2018', '<div id="A" style="background-color: transparent; min-height: 1000px; width: 100%; padding-top: 20px; overflow: auto;"><style></style><section style="width: 816px; min-height: 1056px; padding: 96px;"><p class=" Normal" style="text-align: center;"><span style="font-weight: 700; font-size: 21px; background-color: white;">ADMAS UNIVERSITY</span></p><p class=" Normal" style="text-align: center;"><span style="font-weight: 700; font-size: 21px; background-color: white;">WEB QUIZ</span></p><p class=" Normal"><span style="font-weight: 700; font-size: 21px; background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;"><font size="3" style=""><b>Question: 1</b></font></span></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;">Web page editors works on a ____ principle.</span></p><p class=" Normal"><span style="background-color: white;">(A) WWW&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(B) HTML&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(C) WYSIWYG&nbsp; &nbsp; &nbsp; &nbsp; (D) WYGWYSI</span></p><p class=" Normal"><br></p><p class=" Normal"><b>Question: 2</b></p><p class=" Normal"><span style="background-color: white;">Which program is used by web clients to view the web pages?</span></p><p class=" Normal"><span style="background-color: white;">(A) Web browser&nbsp; &nbsp; &nbsp; &nbsp;(B) Protocol&nbsp; &nbsp; &nbsp; (C) Web server&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(D) Search Engine</span></p><p class=" Normal"><br></p><p class=" Normal"><span style="background-color: white;"><font size="3" style=""><b>Question: 3</b></font></span></p><p class=" Normal"><span style="background-color: white;">What is the name of the location address of the hypertext documents?</span></p><p class=" Normal"><span style="background-color: white;">(A) Uniform Resource Locator&nbsp; &nbsp; &nbsp; &nbsp; (B) Web server&nbsp; &nbsp; &nbsp; &nbsp;(C) File&nbsp; &nbsp; &nbsp; &nbsp; (D) Web address</span></p><p class=" Normal"><br></p><p class=" Normal"><b>Question: 4</b><br></p><p class=" Normal"><span style="background-color: white;">What are shared on the Internet and are called as Web pages?</span></p><p class=" Normal"><span style="background-color: white;">(A) Programs&nbsp; &nbsp; &nbsp;(B) Cables&nbsp; &nbsp; &nbsp; &nbsp;(C) Hypertext documents&nbsp; &nbsp; &nbsp; &nbsp; (D) None</span></p><p class=" Normal"><br></p><p class=" Normal"><span style="background-color: white;"><b><font size="3">Question: 5</font></b></span></p><p class=" Normal"><span style="background-color: white;">How many colour names are used by the browsers?</span></p><p class=" Normal"><span style="background-color: white;">(A) 8&nbsp; &nbsp; &nbsp; &nbsp;(B) 10&nbsp; &nbsp; &nbsp;(C) 12&nbsp; &nbsp; &nbsp; &nbsp;(D) 16</span></p><p class=" Normal"><br></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;"> </span></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;"> </span></p><p class=" Normal" style="margin-bottom: 13px; line-height: 115%; text-align: left;"><span style="background-color: white;"></span></p></section></div>', '2024-11-08 00:00:10', 1),
(8, 2, 'C++ First-Year Assignments 1', '\n				<div style="text-align: center;"><b style="font-size: x-large;"><br></b></div><div style="text-align: center;"><b style=""><font size="6">Introduction To C++</font></b></div><div style="text-align: center;"><b style="font-size: x-large;"><br></b></div><div style="text-align: left;"><font size="4">&nbsp; &nbsp; &nbsp; &nbsp; 1. Write C++ Program That Converts Binary To Decimal</font></div><div style="text-align: left;"><font size="4"><br></font></div><div style="text-align: left;"><font size="4">&nbsp; &nbsp; &nbsp; &nbsp; 2. Write Tetris Game In C++</font></div><div style="text-align: left;"><font size="4"><br></font></div><div style="text-align: left;"><font size="4">&nbsp; &nbsp; &nbsp; &nbsp; 3. Write C++ Program That send file to another computer</font></div><div style="text-align: left;"><br></div>			', '2024-11-08 00:04:54', 5),
(9, 1, 'Web CSS Workout 1', '<div><font size="4"><br></font></div><div style="font-size: large;"><font size="4"><br></font></div><div style="font-size: large;"><font size="4"><br></font></div><div style="text-align: center;"><b style=""><font size="5">&nbsp;CSS #1 Assignment</font></b></div><div style="font-size: large;"><font size="4"><br></font></div><div style="font-size: large;"><font size="4"><br></font></div><font size="4">&nbsp; &nbsp; &nbsp; &nbsp; 1. CSS that inserts image into div</font><div><font size="4"><br></font><div><font size="4">&nbsp; &nbsp; &nbsp; &nbsp; 2. CSS that move div by pixel</font></div><div><font size="4"><br></font></div><div><font size="4">&nbsp; &nbsp; &nbsp; &nbsp; 3. Simple Nav Bar In Css + HTML.</font></div></div>', '2024-11-08 00:08:00', 9),
(10, 2, 'C++ Assignment 5', '<div style="text-align: center;"><b style="font-size: xx-large;"><br></b></div><div style="text-align: center;"><b style="font-size: xx-large;">Nothing</b></div><div style="text-align: center;"><ul><li style="text-align: left;"><font size="4">Blue</font></li><li style="text-align: left;"><font size="4">Red</font></li><li style="text-align: left;"><font size="4">Lists</font></li><li style="text-align: left;"><font size="4">...</font></li><li style="text-align: left;"><font size="4"><br></font></li></ul></div>', '2024-11-08 00:09:14', 9),
(11, 1, 'Website TF question Quiz + Answers', '\n				<div id="A" style="background-color: transparent; min-height: 1000px; width: 100%; padding-top: 20px; overflow: auto;"><style></style><section style="width: 816px; min-height: 1056px; padding: 96px;"><p class=" Normal" style="text-align: center;"><span style="font-weight: 700; background-color: white;"><font size="6">ADMAS UNIVERSITY</font></span></p><p class=" Normal" style="text-align: center;"><span style="font-size: 21px;"><b>Web Development Chapter 2 Questions</b></span></p><p class=" Normal" style="text-align: center;"><br></p><p class=" Normal"><span style="background-color: white;"><font size="4">1    Internet is not a commercial information service.               (F)</font></span></p><p class=" Normal"><span style="background-color: white;"><font size="4"><br></font></span></p><p class=" Normal"><span style="background-color: white;"><font size="4">2    The IP address space is divided into classes five in all which are given letters A through E       (F)</font></span></p><p class=" Normal"><span style="background-color: white;"><font size="4"><br></font></span></p><p class=" Normal"><span style="background-color: white;"><font size="4">3    The Request for Comments (RFCs) core topics are Internet and the TCP/IP protocol suites.      (T)</font></span></p><p class=" Normal"><span style="background-color: white;"><font size="4"><br></font></span></p><p class=" Normal"><span style="background-color: white;"><font size="4">4    The Back and Forward buttons can be used to visit only pages from the same website              (F)</font></span></p><p class=" Normal"><span style="background-color: white;"><font size="4"><br></font></span></p><p class=" Normal"><span style="background-color: white;"><font size="4">5    A protocol used for fetching e-mail from a mailbox is POP3             (T)</font></span></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;"> </span></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;"></span></p><p class=" Normal"><span style="background-color: white;"> </span></p><p class=" Normal" style="margin-bottom: 13px; line-height: 115%; text-align: left;"><span style="background-color: white;"></span></p></section></div>			', '2024-11-08 00:10:54', 1),
(12, 2, 'C++ test page', '<div style="text-align: center;"><b><font size="6">This is Test Page&nbsp;</font></b></div>', '2024-11-08 00:22:00', 7),
(13, 2, 'C++ Test Editor', '<b><font size="6">Bold</font></b><div style="text-align: right;"><i style=""><font size="6">italic</font></i></div><div style="text-align: center;"><u style=""><font size="6">Underline</font></u></div><div><font size="6"><u><b><i>ALL</i></b></u></font></div><div><u style=""><br></u></div>', '2024-11-08 00:23:18', 7),
(14, 2, 'Admin Manual Test', '<i>This <u>is</u> <b>Test</b></i>', '2024-11-08 05:12:39', 1),
(15, 1, 'Course Test 2', '<div style="text-align: right;"><font size="6"><b>This is Actually HTML nothing More</b></font></div>', '2024-11-08 05:13:14', 1),
(16, 2, 'C++ Linked List Test', '<div style="text-align: center;"><b><font size="6">Write C++&nbsp;</font></b></div><div style="text-align: center;"><font size="6" style=""><i style="">Write C++ ...</i></font></div>', '2024-11-08 05:14:50', 1),
(17, 1, 'Test', '<div style="text-align: center;"><b style="font-size: xx-large;"><br></b></div><div style="text-align: center;"><b style="font-size: xx-large;">Web Dev''t Test 3</b></div><div style="text-align: center;"><b style="font-size: xx-large;"><br></b></div><div style="text-align: left;"><b style=""><font size="4">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Name _______________&nbsp; &nbsp; &nbsp;ID ________&nbsp; &nbsp; &nbsp; Section _______</font></b></div>', '2024-11-08 16:03:54', 1),
(18, 1, 'Website test 3', '<h2 align="center" style="font-family: sans-serif;"><font size="6">Admas University</font></h2><h2 align="center" style="font-family: sans-serif;">Website Dev''t Test 3.</h2><br style="font-family: sans-serif; font-size: 16px;"><div id="info-stud" style="font-weight: bold; font-size: 17px; margin-top: 20px; margin-left: 30px; font-family: sans-serif;">Name ____________________________ ID __________ Section __________</div><br style="font-family: sans-serif; font-size: 16px;"><div class="q-type" style="font-weight: bold; margin-left: 30px; margin-top: 30px; font-family: sans-serif; font-size: 16px;"><u>I. True or False (1pt each)</u></div><div class="question" style="margin-left: 50px; padding: 7px; width: 993.156px; margin-top: 6px; font-family: sans-serif; font-size: 16px;">1. PHP is Server-Side Scripting Language.</div><div class="question" style="margin-left: 50px; padding: 7px; width: 993.156px; margin-top: 6px; font-family: sans-serif; font-size: 16px;">2. HTTP is a Language used for Client-Side Scripting.</div><div class="question" style="margin-left: 50px; padding: 7px; width: 993.156px; margin-top: 6px; font-family: sans-serif; font-size: 16px;">3. JS can be used for server-side scripting.<br></div><div class="q-type" style="font-weight: bold; margin-left: 30px; margin-top: 30px; font-family: sans-serif; font-size: 16px;"><u>II. Choose The Best Answer (1.5pt each)</u></div><div class="question" style="margin-left: 50px; padding: 7px; width: 993.156px; margin-top: 6px; font-family: sans-serif; font-size: 16px;">1. Which one of this is a Website vulnerability?</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">A) XSS</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">B) SQLi</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">C) CRLFi</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">D) All</div><div class="question" style="margin-left: 50px; padding: 7px; width: 993.156px; margin-top: 6px; font-family: sans-serif; font-size: 16px;">2. What''s Wrong With This PHP Code `echo ''hello"; `?</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">A) Unterminated String</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">B) Missing Semicolon</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">C) Undeclared Variable</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">D) Nothing</div><div class="question" style="margin-left: 50px; padding: 7px; width: 993.156px; margin-top: 6px; font-family: sans-serif; font-size: 16px;">3. `printf("%c", 65);` This PHP code prints?</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">A) %c</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">B) c</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">C) A</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">D) "%c"</div><div class="question" style="margin-left: 50px; padding: 7px; width: 993.156px; margin-top: 6px; font-family: sans-serif; font-size: 16px;">4. Which one of the following is not php builtin function?</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">A) count</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">B) isset</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">C) rand</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">D) register</div><div class="question" style="margin-left: 50px; padding: 7px; width: 993.156px; margin-top: 6px; font-family: sans-serif; font-size: 16px;">5. _______ is PHP function used get length of array.</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">A) array_length</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">B) count</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">C) length_of</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">D) None</div><div class="question" style="margin-left: 50px; padding: 7px; width: 993.156px; margin-top: 6px; font-family: sans-serif; font-size: 16px;">6. ________ is PHP function used to check if a variable is set.</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">A) isset</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">B) var_setted</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">C) var_set</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">D) None</div><div class="question" style="margin-left: 50px; padding: 7px; width: 993.156px; margin-top: 6px; font-family: sans-serif; font-size: 16px;">7. Which one of this PHP statements contain Error?</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">A) echo "hey";</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">B) $c = 1 + 0;</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">C) $c--;</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">D) None</div><div class="question" style="margin-left: 50px; padding: 7px; width: 993.156px; margin-top: 6px; font-family: sans-serif; font-size: 16px;">8. PHP is __________ language.</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">A) Markup</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">B) Compiled</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">C) Scripting</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">D) Stylesheet</div><div class="question" style="margin-left: 50px; padding: 7px; width: 993.156px; margin-top: 6px; font-family: sans-serif; font-size: 16px;">9. HTML is __________ language.</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">A) Markup</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">B) Compiled</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">C) Scripting</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">D) None</div><div class="question" style="margin-left: 50px; padding: 7px; width: 993.156px; margin-top: 6px; font-family: sans-serif; font-size: 16px;">10. PHP is Used _________ side.</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">A) Server</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">B) Client</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">C) Both</div><div class="choice" style="width: 882.812px; margin-left: 85px; font-family: sans-serif; font-size: 16px;">D) None</div><div class="q-type" style="font-weight: bold; margin-left: 30px; margin-top: 30px; font-family: sans-serif; font-size: 16px;"><u>III. Give Short Answer (5pt)</u></div><div class="question" style="margin-left: 50px; padding: 7px; width: 993.156px; margin-top: 6px; font-family: sans-serif; font-size: 16px;">1. Write PHP code That Generate Random strings(length = 64).</div>', '2024-11-08 16:11:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `multiplechoice`
--

CREATE TABLE IF NOT EXISTS `multiplechoice` (
  `MultipleChoiceID` int(11) NOT NULL,
  `MultipleChoiceString` text NOT NULL,
  `QuestionID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multiplechoice`
--

INSERT INTO `multiplechoice` (`MultipleChoiceID`, `MultipleChoiceString`, `QuestionID`) VALUES
(1, 'XSS', 1),
(2, 'SQLi', 1),
(3, 'CRLFi', 1),
(4, 'All', 1),
(5, 'Unterminated String', 2),
(6, 'Missing Semicolon', 2),
(7, 'Undeclared Variable', 2),
(8, 'Nothing', 2),
(9, '%c', 3),
(10, 'c', 3),
(11, 'A', 3),
(12, '"%c"', 3),
(13, 'count', 4),
(14, 'isset', 4),
(15, 'rand', 4),
(16, 'register', 4),
(17, 'array_length', 5),
(18, 'count', 5),
(19, 'length_of', 5),
(20, 'None', 5),
(21, 'isset', 6),
(22, 'var_setted', 6),
(23, 'var_set', 6),
(24, 'None', 6),
(25, 'echo "hey";', 7),
(26, '$c = 1 + 0;', 7),
(27, '$c--;', 7),
(28, 'None', 7),
(29, 'Markup', 8),
(30, 'Compiled', 8),
(31, 'Scripting', 8),
(32, 'Stylesheet', 8),
(33, 'Markup', 9),
(34, 'Compiled', 9),
(35, 'Scripting', 9),
(36, 'None', 9),
(37, 'Server', 10),
(38, 'Client', 10),
(39, 'Both', 10),
(40, 'None', 10);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `QuestionID` int(11) NOT NULL,
  `QuestionType` int(11) NOT NULL,
  `QuestionString` text NOT NULL,
  `CourseID` int(11) NOT NULL,
  `Chapter` int(11) NOT NULL,
  `Answer` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`QuestionID`, `QuestionType`, `QuestionString`, `CourseID`, `Chapter`, `Answer`) VALUES
(1, 2, 'Which one of this is a Website vulnerability?', 1, 1, 4),
(2, 2, 'What''s Wrong With This PHP Code `echo ''hello"; `?', 1, 1, 1),
(3, 2, '`printf("%c", 65);` This PHP code prints?', 1, 1, 3),
(4, 2, 'Which one of the following is not php builtin function?', 1, 1, 4),
(5, 2, '_______ is PHP function used get length of array.', 1, 1, 2),
(6, 2, '________ is PHP function used to check if a variable is set.', 1, 1, 1),
(7, 2, 'Which one of this PHP statements contain Error?', 1, 1, 4),
(8, 2, 'PHP is __________ language.', 1, 1, 3),
(9, 2, 'HTML is __________ language.', 1, 1, 1),
(10, 2, 'PHP is Used _________ side.', 1, 1, 1),
(11, 1, 'PHP is Server-Side Scripting Language.', 1, 2, 1),
(12, 1, 'HTTP is a Language used for Client-Side Scripting.', 1, 2, 2),
(13, 1, '<h6> is the largest header Tag in HTML.', 1, 2, 2),
(14, 1, 'rand() is builtin PHP function that is used for generating random number.', 1, 2, 1),
(15, 1, 'JS can be used for server-side scripting.', 1, 2, 1),
(16, 3, 'Write PHP code That Generate Random strings(length = 64).', 1, 1, NULL),
(17, 3, 'Write PHP code tha connect and insert data into database.', 1, 1, NULL),
(18, 3, 'JS Code That Validates Email using Reg Exp.', 1, 1, NULL),
(19, 1, 'Cout is used for output stream.', 2, 1, 1),
(20, 1, 'cin is used for input stream.', 2, 1, 1),
(21, 1, 'C++ does not support oprator overloading.', 2, 1, 2),
(22, 1, '// indicates the line is comment.', 2, 1, 1),
(23, 1, 'C++ is not OOP language.', 2, 1, 2),
(24, 1, 'C++ does not support function overloading.', 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(11) NOT NULL,
  `UserType` int(11) NOT NULL DEFAULT '1',
  `Username` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Activated` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserType`, `Username`, `Password`, `Name`, `Email`, `Activated`) VALUES
(1, 0, 'admin', '25d55ad283aa400af464c76d713c07ad', 'Admino Tura', 'admin@thissite.com', 1),
(2, 1, 'Natty', '25d55ad283aa400af464c76d713c07ad', 'Natneal Tefera', 'naty208@gmail.com', 0),
(3, 1, 'desu_w', '25d55ad283aa400af464c76d713c07ad', 'Desalegn W', 'Desu58@gmail.com', 1),
(4, 1, 'Tamiru_F', '25d55ad283aa400af464c76d713c07ad', 'Tamiru Fikre', 'ftame@gmail.com', 0),
(5, 1, 'nahom', '25d55ad283aa400af464c76d713c07ad', 'Nahom Chernet', 'nahom@gmail.com', 1),
(6, 1, 'Tisge', '25d55ad283aa400af464c76d713c07ad', 'Tsigereda Abebaw', 't_abebaw@gmail.com', 1),
(7, 1, 'hana_g', '25d55ad283aa400af464c76d713c07ad', 'Hana Gutema', 'hana_g@gmail.com', 1),
(8, 1, 'biruk_t', '25d55ad283aa400af464c76d713c07ad', 'Biruk Tadele', 'biruk@gmai.com', 1),
(9, 1, 'FikruT', '25d55ad283aa400af464c76d713c07ad', 'Fikru Tolera', 'FikruT@gmail.com', 1),
(10, 1, 'nahom_m', '25d55ad283aa400af464c76d713c07ad', 'Nahom Minas', 'nahom15@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`ExamID`,`CourseID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `examquestions`
--
ALTER TABLE `examquestions`
  ADD PRIMARY KEY (`ExamID`,`QuestionID`),
  ADD KEY `QuestionID` (`QuestionID`);

--
-- Indexes for table `exam_manual`
--
ALTER TABLE `exam_manual`
  ADD PRIMARY KEY (`ExamID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `multiplechoice`
--
ALTER TABLE `multiplechoice`
  ADD PRIMARY KEY (`MultipleChoiceID`,`QuestionID`),
  ADD KEY `QuestionID` (`QuestionID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`QuestionID`,`CourseID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Username_2` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `ExamID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `exam_manual`
--
ALTER TABLE `exam_manual`
  MODIFY `ExamID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `multiplechoice`
--
ALTER TABLE `multiplechoice`
  MODIFY `MultipleChoiceID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `contact_us_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `examquestions`
--
ALTER TABLE `examquestions`
  ADD CONSTRAINT `examquestions_ibfk_1` FOREIGN KEY (`ExamID`) REFERENCES `exam` (`ExamID`) ON DELETE CASCADE,
  ADD CONSTRAINT `examquestions_ibfk_2` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`) ON DELETE CASCADE;

--
-- Constraints for table `exam_manual`
--
ALTER TABLE `exam_manual`
  ADD CONSTRAINT `exam_manual_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_manual_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE;

--
-- Constraints for table `multiplechoice`
--
ALTER TABLE `multiplechoice`
  ADD CONSTRAINT `multiplechoice_ibfk_1` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
