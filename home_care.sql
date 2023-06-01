-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 03:20 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `home care`
--

-- --------------------------------------------------------

--
-- 
--
-- --------------------------------------------------------

--
-- Table structure for table `client_details`
--

CREATE TABLE IF NOT EXISTS client_details (
  `C_Name` varchar(40) NOT NULL,
  `C_Email_Id` varchar(40) NOT NULL,
  `C_Contact` text NOT NULL,
  `C_City` varchar(20) NOT NULL,
  `C_Address` varchar(100) NOT NULL,
  `C_Password` varchar(10) NOT NULL,
  `C_Total_Service_Number` int(11) NOT NULL,
  `C_Otp` int(11) NOT NULL,
  PRIMARY KEY (`C_Email_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_details`
--

INSERT INTO client_details (`C_Name`, `C_Email_Id`, `C_Contact`, `C_City`, `C_Address`, `C_Password`, `C_Total_Service_Number`, `C_Otp`) VALUES
('Akshat Shah', 'akshat.s4@ahduni.edu.in', '7990553920', 'Mehsana', 'Palavasana Chowkdi, Mehsana', 'AU2040052', 0, 150402),
('Kinal Kagathara', 'kinal.k@ahduni.edu.in', '7990400277', 'Rajkot', '150ft ring road,Rajkot', 'AU2040240', 0, 2409),
('Omkar Pandya', 'omkar.p@ahduni.edu.in', '8980611411', 'Rajkot', 'Bolbala Marg, Rajkot', 'AU2040180', 0, 180202);

-- --------------------------------------------------------

--
-- Table structure for table `client_service_details`
--

CREATE TABLE IF NOT EXISTS client_service_details (
  `Record_No` int(11) NOT NULL AUTO_INCREMENT,
  `Client_Email_Id` varchar(40) NOT NULL,
  `Service_Id` varchar(10) NOT NULL,
  `Sub_Service_Id` varchar(10) NOT NULL,
  `S_P_Id` varchar(10) NOT NULL,
  `C_Address` varchar(100) NOT NULL,
  `C_Date` date NOT NULL,
  `P_Date` date NOT NULL,
  `Provided` tinyint(1) NOT NULL,
  `Payment_Id` varchar(10) NOT NULL,
  PRIMARY KEY (`Record_No`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;
--
--
--

-- --------------------------------------------------------

--
-- Table structure for table `contract_details`
--

CREATE TABLE IF NOT EXISTS contract_details (
  `C_Id` int(11) NOT NULL AUTO_INCREMENT,
  `C_Email_Id` varchar(40) NOT NULL,
  `Service_Id` varchar(10) NOT NULL,
  `S_P_Id` varchar(10) NOT NULL,
  `S_C_Plan` varchar(20) NOT NULL,
  `C_Start_Date` date NOT NULL,
  `C_End_Date` date NOT NULL,
  `Total_Cost` int(5) NOT NULL,
  `Payment_Id` varchar(10) NOT NULL,
  PRIMARY KEY (`C_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;


-- --------------------------------------------------------

--
-- Table structure for table `contract_record`
--

CREATE TABLE IF NOT EXISTS contract_record (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `C_Id` int(11) NOT NULL,
  `C_Date` date NOT NULL,
  `P_Date` date NOT NULL,
  `Provided` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;


-- --------------------------------------------------------

--
-- Table structure for table `feedback_details`
--

CREATE TABLE IF NOT EXISTS feedback_details (
  `F_Id` int(11) NOT NULL AUTO_INCREMENT,
  `C_Email_Id` varchar(40) NOT NULL,
  `C_Feedback` varchar(500) NOT NULL,
  `C_F_Date` date NOT NULL,
  `Service_Id` varchar(10) NOT NULL,
  `S_P_Id` varchar(10) NOT NULL,
  PRIMARY KEY (`F_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS service (
  `Service_Id` varchar(10) NOT NULL,
  `Service_Name` varchar(40) NOT NULL,
  `C_Price` int(5) NOT NULL,
  PRIMARY KEY (`Service_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO service (`Service_Id`, `Service_Name`, `C_Price`) VALUES
('S001', 'Refrigerator', 200),
('S002', 'AC', 200),
('S003', 'TV', 200),
('S004', 'Microwave', 250),
('S005', 'Washing Machine', 300),
('S006', 'RO', 200),
('S007', 'Pest Control', 250),
('S008', 'Room Heater', 200),
('S009', 'Mixer', 150),
('S010', 'Blender', 150),
('S011', 'Gas Stove', 250),
('S012', 'Tap', 200),
('S013', 'House Cleaning', 150),
('S014', 'Laptop/PC', 250),
('S015', 'Water Motor', 200),
('S016', 'Carpentry', 250),
('S017', 'Light', 100),
('S018', 'Shower', 200),
('S019', 'Geyser', 200),
('S020', 'Pipeline', 250),
('S021', 'Fan', 100),
('S022', 'Laundry', 100),
('S023', 'Car Washing', 200),
('S024', 'ghj', 509);

-- --------------------------------------------------------

--
-- Table structure for table `service_provider_details`
--

CREATE TABLE IF NOT EXISTS service_provider_details (
  `S_P_Id` varchar(10) NOT NULL,
  `S_P_Name` varchar(40) NOT NULL,
  `S_P_Experience_Year` int(2) NOT NULL,
  `S_P_Email_Id` varchar(40) NOT NULL,
  `S_P_Contact` text NOT NULL,
  `S_P_City` varchar(20) NOT NULL,
  `S_P_Address` varchar(100) NOT NULL,
  `S_P_Password` varchar(10) NOT NULL,
  PRIMARY KEY (`S_P_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_provider_details`
--

INSERT INTO service_provider_details (`S_P_Id`, `S_P_Name`, `S_P_Experience_Year`, `S_P_Email_Id`, `S_P_Contact`, `S_P_City`, `S_P_Address`, `S_P_Password`) VALUES
('SP001', 'Harish', 5, 'harish@gmail.com', '9904228202', 'Jamnagar', 'Laxminagar 3', '1234567890'),
('SP002', 'Mukesh', 4, 'mukesh@gmail.com', '9428345670', 'Morbi', 'Rajnagar 5', 'mukesh1234'),
('SP003', 'Naitik', 3, 'naitik@gmail.com', '7779027435', 'Rajkot', 'Kalawad road', '7777naitik'),
('SP004', 'Sanket', 4, 'sanket@gmail.com', '8000078231', 'Junagadh', 'Shivam park', 'sanket8000'),
('SP005', 'Ashok', 3, 'ashok@gmail.com', '9904228201', 'Rajkot', '150 feet Ring Road', 'ashok82010'),
('SP006', 'Rajesh', 3, 'rajesh@gmail.com', '9023456789', 'Jamnagar', 'Golden market', '9023rajesh'),
('SP007', 'Prashad', 5, 'prashad@gmail.com', '9879660071', 'Rajkot', 'Ravi park', 'prashad444'),
('SP008', 'Abhishek', 2, 'abhishek@gmail.com', '9898779589', 'Surendranagar', 'Mavdi Chowk', 'abhishek90'),
('SP009', 'Niketan', 1, 'niketan@gmail.com', '9925290925', 'Morbi', 'Astron Chowk', '1230925nik'),
('SP010', 'Pratik', 6, 'pratik@gmail.com', '9879807654', 'Rajkot', 'Jaljeet society', 'pratik9879'),
('SP011', 'Viral', 7, 'viral@gmail.com', '9724430702', 'Rajkot', 'Gokuldham', 'viral97244'),
('SP012', 'Dhiraj', 4, 'dhiraj1@gmail.com', '9427437445', 'Rajkot', 'Nana mauva road', 'dhiraj1111'),
('SP013', 'Ranjit', 5, 'ranjit@gmail.com', '9456789099', 'Rajkot', 'Umiya circle', '7894561230'),
('SP014', 'Kaushik', 3, 'kaushik1@gmail.com', '9974134567', 'Rajkot', 'Raiya road', 'kaushik444'),
('SP015', 'Vipul', 2, 'vipul@gmail.com', '9428254345', 'Rajkot', 'Gundavadi road', 'vipulvipul'),
('SP016', 'Mayur', 6, 'mayur@gmail.com', '7779072435', 'Rajkot', 'Lakhajiraj road', '4561237890'),
('SP017', 'Pankaj', 3, 'pankaj@gmail.com', '9875243567', 'Rajkot', 'Limda chowk', 'pankaj0000'),
('SP018', 'Darshan', 4, 'darshan@gmail.com', '9904228901', 'Jamnagar', 'Aasopalav society', '999darshan'),
('SP019', 'Jaydeep', 3, 'jaydeep@gmail.com', '9574198435', 'Rajkot', 'Silver park', 'jaydeep414'),
('SP020', 'Prakash', 2, 'prakash@gmail.com', '9437890222', 'Rajkot', 'Aastha circle', 'prakash555'),
('SP021', 'Vishvas', 6, 'vishvas@gmail.com', '9904228201', 'Rajkot', 'Raj Park', 'vishvas123'),
('SP022', 'Abhi', 6, 'abhi@gmail.com', '9904228202', 'Rajkot', 'Pedak Road', 'abhi123456'),
('SP023', 'vishal', 5, 'vishal1@gmail.com', '9904228201', 'Rajkot', 'Punitnagar', '1020102010'),
('SP024', 'Ashvin', 8, 'ashvin@gmail.com', '9904228201', 'Rajkot', 'Virani chowk', '1478523690'),
('SP025', 'Vimal', 6, 'vishal@gmail.com', '9427497287', 'Rajkot', 'Bhaktinagar circle', 'vimal01010'),
('SP026', 'Prabhas', 2, 'prabhas@gmail.com', '9574816444', 'Rajkot', 'Om nagar', '1234567890'),
('SP027', 'Satyjeet', 5, 'Satyjeet@gmail.com', '9427497277', 'Rajkot', 'Maruti circle', '77satyjeet'),
('SP028', 'Amit', 5, 'Amit@gmail.com', '9428252480', 'Rajkot', 'Shiv colony', 'amitrajkot'),
('SP029', 'Prince', 2, 'Prince@gmail.com', '7779025345', 'Morbi', 'Raj park', '4561237890'),
('SP030', 'Mahesh', 3, 'mahesh@gmail.com', '9879653456', 'Bhavnagar', 'Jubilee park', '1234567890'),
('SP031', 'Nilesh', 4, 'nilesh@gmail.com', '8200057624', 'Rajkot', 'Om nagar', '9876543210'),
('SP032', 'Dhrmesh', 4, 'dhrmesh@gmail.com', '9824157576', 'Rajkot', 'Shivraj nagar', 'dhrmesh456'),
('SP033', 'Dhiraj', 1, 'dhiraj@gmail.com', '9427220611', 'Surat', 'Sorthiyavadi circle', '7777dhiraj'),
('SP034', 'Keshu', 5, 'keshu@gmail.com', '7878688882', 'Rajkot', 'Shivam park', 'keshu55555'),
('SP035', 'Bipin', 3, 'bipin@gmail.com', '7802865324', 'Rajkot', 'Jasraj park', '5623891470'),
('SP036', 'Parth', 6, 'parth@gmail.com', '9624112566', 'Rajkot', 'Kalawad road', 'parthparth'),
('SP037', 'Kaushik', 4, 'kaushik@gmail.com', '9623445566', 'Rajkot', 'Dhrmendra road', 'kaushik789'),
('SP038', 'Krunal', 5, 'krunal@gmail.com', '9978675678', 'Surat', 'Kuvadwa road', 'krunal111'),
('SP039', 'Meet', 4, 'meet@gmail.com', '9534678990', 'Rajkot', 'Dwarkadhish society', 'meetmeet10'),
('SP040', 'Nikunj', 3, 'niknj@gmail.com', '9574515513', 'Rajkot', 'Mavdi road', '4564561230'),
('SP041', 'Rushi', 2, 'rushi@gmail.com', '9428035361', 'Rajkot', 'Raiya road', 'rushi1919'),
('SP042', 'Jaimish', 2, 'jaimish@gmail.com', '9485721364', 'Rajkot', 'Ayodhya park', 'jaimish99'),
('SP043', 'Karan', 6, 'karan@gmail.com', '9586975652', 'Morbi', 'Laxmibai circle', 'karankaran'),
('SP044', 'Jagdeesh', 4, 'jagdeesh@gmail.com', '9785623145', 'Rajkot', 'Shivaji park', '1236667770'),
('SP045', 'Magan', 7, 'magan@gmail.com', '9874561235', 'Junagadh', 'Gautam nagar', '1117774440'),
('SP046', 'Suresh', 5, 'suresh@gmail.com', '9947154862', 'Rajkot', 'Ravi park', 'suresh6789'),
('SP047', 'Ramesh', 7, 'ramesh@gmail.com', '9428554785', 'Rajkot', 'Laxminagar', 'rameshbhai'),
('SP048', 'Hiren', 3, 'hiren@gmail.com', '7776230145', 'Rajkot', 'Shiv park', 'hiren570'),
('SP049', 'Niraj', 4, 'niraj@gmail.com', '9974141526', 'Rajkot', 'Radhe hotel ', 'niraj@77'),
('SP050', 'Nagji', 2, 'nagji@gmail.com', '7779065427', 'Jamnagar', 'Jasraj park', 'nagji1230'),
('SP051', 'Vikram', 5, 'vikram@gmail.com', '7779012444', 'Rajkot', 'Saidham society', 'vikramraja'),
('SP052', 'Arvind', 5, 'arvind@gmail.com', '9974768429', 'Rajkot', 'Jalaram society', 'arvind999'),
('SP053', 'Praful', 6, 'praful@gmail.com', '8002145674', 'Rajkot', 'Rajnagar', 'praful909'),
('SP054', 'Yash', 3, 'yash@gmail.com', '8347479465', 'Rajkot', 'Gokul park', 'yash212121'),
('SP055', 'Milind', 4, 'milind@gmail.com', '9428258458', 'Morbi', 'Shreeji park', 'milind3456'),
('SP056', 'Yashraj', 2, 'yashraj@gmail.com', '9586785462', 'Rajkot', 'Raiya circle', '4560007890'),
('SP057', 'Anant', 4, 'anant@gmail.com', '9985632147', 'Vapi', 'Pranami circle', 'anant@7979'),
('SP058', 'Nirav', 6, 'nirav@gmail.com', '7765892317', 'Junagadh', 'Mathura park', '5554449990'),
('SP059', 'Nishant', 7, 'nishant@gmail.com', '9856231474', 'Rajkot', 'Ghnshyam society', '777nishant'),
('SP060', 'Karan', 4, 'karan@gmail.com', '9856237456', 'Jamnagar', 'Hari om nagar', '142karan'),
('SP061', 'Dhaval', 3, 'dhaval@gmail.com', '9974198427', 'Porbandar', 'Shastri nagar', 'dhavu99999'),
('SP062', 'Brijesh', 2, 'brijesh@gmail.com', '9568562347', 'Rajkot', 'Racecourse ring road', 'brijesh11'),
('SP063', 'Aashish', 1, 'aashish@gmail.com', '7779054777', 'Surat', 'Goverdhan chowk', '4564564560'),
('SP064', 'Paras', 4, 'paras@gmail.com', '9956234781', 'Rajkot', 'Madhapar', 'paras19191'),
('SP065', 'Jay', 5, 'jay@gmail.com', '9974198427', 'Rajkot', 'Srp nagar', 'jay*123000'),
('SP066', 'Jentilal', 6, 'jentilal@gmail.com', '9974458427', 'Bhavnagar', 'Univercity road', 'jentilal99'),
('SP067', 'Raj', 7, 'raj@gmail.com', '9534678997', 'Surat', 'Panchayat chowk', 'raj777999'),
('SP068', 'Rajveer', 1, 'rajveer@gmail.com', '9534678444', 'Ahmedabad', 'Yagnik road', '1237894560'),
('SP069', 'Jayesh', 2, 'jayesh@gmail.com', '9974198428', 'Baroda', 'West zone office', 'jayesh@99'),
('SP070', 'Ramesh', 4, 'ramesh@gmail.com', '9535578990', 'Nasik', 'Nana mauva road', 'rameshbhai'),
('SP071', 'Hemang', 3, 'hemang@gmail.com', '9428345677', 'Rajkot', 'Om nagar', 'hemang*909'),
('SP072', 'Krupal', 5, 'krupal@gmail.com', '7776230177', 'Rajkot', 'Mavdi chowk', 'krupal999'),
('SP073', 'Mohit', 6, 'mohit@gmail.com', '9428345456', 'Morbi', 'Umiya circle', '9994443330'),
('SP074', 'Ravi', 4, 'ravi@gmail.com', '9974198444', 'Junagadh', 'Gopal park', 'ravi777777'),
('SP075', 'Manish', 3, 'manish@gmail.com', '9428567890', 'Rajkot', 'Radhe society', 'manish2079'),
('SP076', 'Bharat', 2, 'bharat@gmail.com', '9724567897', 'Ahmedabad', 'Shree society', '0123987456'),
('SP077', 'Bhavesh', 4, 'bhavesh@gmail.com', '9974198455', 'Rajkot', 'Ridham park', '9874152630'),
('SP078', 'Dilip', 5, 'dilip@gmail.com', '9976230145', 'Porbandar', 'Aastha society', '4564564564'),
('SP079', 'Mukesh', 5, 'mukesh@gmail.com', '7776230145', 'Rajkot', 'Harivandna society', 'mukesh222'),
('SP080', 'Rajesh', 6, 'rajesh@gmail.com', '9904228777', 'Rajkot', 'Ravi park', 'rajeshbhai'),
('SP081', 'Aashish', 3, 'aashish@gmail.com', '9534678991', 'Rajkot', 'Krishna chowk', 'aashish678'),
('SP082', 'Bhavesh', 3, 'bhavesh@gmail.com', '9534678990', 'Morbi', 'Shivaji park', 'bhavesh33'),
('SP083', 'Dinesh', 4, 'dinesh@gmail.com', '9904228207', 'Rajkot', 'Laxmibai chowk', '7dinesh707'),
('SP084', 'Chirag', 5, 'chirag@gmail.com', '9428578546', 'Rajkot', 'Jaljeet society', 'chirag4100'),
('SP085', 'Sanjay', 2, 'sanjay@gmail.com', '9974198452', 'Surat', 'Saidham society', '9974198452'),
('SP086', 'Keshu', 3, 'keshu@gmail.com', '7776299145', 'Rajkot', 'New era park', '7775554440'),
('SP087', 'Paresh', 4, 'paresh@gmail.com', '9904228206', 'Rajkot', 'Ajanta park', 'paresh120'),
('SP088', 'Hiren', 6, 'hiren@gmail.com', '9904228222', 'Morbi', 'Vishnu nagar', '74474hiren'),
('SP089', 'Arun', 4, 'arun@gmail.com', '9428345456', 'Rajkot', 'Shree nagar', 'arun999999'),
('SP090', 'Rakesh', 4, 'rakesh@gmail.com', '9428312345', 'Surat', 'Om society', 'rakeshshiv'),
('SP091', 'Isha', 1, 'ishachavda1999@gmail.com', '9427497277', 'gfhj', 'ertyu70o[-po8iyt5432\r\n', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `service_provider_services`
--

CREATE TABLE IF NOT EXISTS service_provider_services (
  `S_Extra` int(11) NOT NULL AUTO_INCREMENT,
  `Service_Id` varchar(10) NOT NULL,
  `S_P_Id` varchar(10) NOT NULL,
  PRIMARY KEY (`S_Extra`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=148 ;

--
-- Dumping data for table `service_provider_services`
--

INSERT INTO service_provider_services (`S_Extra`, `Service_Id`, `S_P_Id`) VALUES
(1, 'S001', 'SP001'),
(2, 'S001', 'SP002'),
(3, 'S001', 'SP003'),
(4, 'S001', 'SP077'),
(5, 'S001', 'SP090'),
(6, 'S001', 'SP041'),
(7, 'S002', 'SP004'),
(8, 'S002', 'SP080'),
(9, 'S002', 'SP040'),
(10, 'S002', 'SP064'),
(11, 'S003', 'SP005'),
(12, 'S003', 'SP012'),
(13, 'S003', 'SP030'),
(14, 'S003', 'SP006'),
(15, 'S003', 'SP088'),
(16, 'S004', 'SP065'),
(17, 'S004', 'SP006'),
(18, 'S004', 'SP084'),
(19, 'S004', 'SP082'),
(20, 'S004', 'SP035'),
(21, 'S004', 'SP077'),
(22, 'S005', 'SP010'),
(23, 'S005', 'SP023'),
(24, 'S005', 'SP008'),
(25, 'S005', 'SP038'),
(26, 'S005', 'SP036'),
(27, 'S005', 'SP029'),
(28, 'S006', 'SP027'),
(29, 'S006', 'SP007'),
(30, 'S006', 'SP034'),
(31, 'S007', 'SP011'),
(32, 'S007', 'SP013'),
(33, 'S007', 'SP019'),
(34, 'S007', 'SP039'),
(35, 'S007', 'SP049'),
(36, 'S007', 'SP059'),
(37, 'S008', 'SP013'),
(38, 'S008', 'SP045'),
(39, 'S008', 'SP047'),
(40, 'S008', 'SP048'),
(41, 'S009', 'SP047'),
(42, 'S009', 'SP090'),
(43, 'S009', 'SP071'),
(44, 'S010', 'SP051'),
(45, 'S010', 'SP062'),
(46, 'S010', 'SP042'),
(47, 'S010', 'SP072'),
(48, 'S010', 'SP047'),
(49, 'S011', 'SP052'),
(50, 'S011', 'SP063'),
(51, 'S011', 'SP043'),
(52, 'S011', 'SP073'),
(53, 'S011', 'SP032'),
(54, 'S011', 'SP033'),
(55, 'S012', 'SP054'),
(56, 'S012', 'SP074'),
(57, 'S012', 'SP064'),
(58, 'S013', 'SP013'),
(59, 'S013', 'SP036'),
(60, 'S013', 'SP054'),
(61, 'S013', 'SP075'),
(62, 'S013', 'SP039'),
(63, 'S014', 'SP012'),
(64, 'S014', 'SP019'),
(65, 'S014', 'SP065'),
(66, 'S015', 'SP055'),
(67, 'S015', 'SP016'),
(68, 'S015', 'SP010'),
(69, 'S015', 'SP076'),
(70, 'S015', 'SP083'),
(71, 'S015', 'SP067'),
(72, 'S016', 'SP084'),
(73, 'S016', 'SP057'),
(74, 'S016', 'SP085'),
(75, 'S017', 'SP068'),
(76, 'S017', 'SP009'),
(77, 'S017', 'SP079'),
(78, 'S017', 'SP086'),
(79, 'S017', 'SP088'),
(80, 'S018', 'SP058'),
(81, 'S018', 'SP069'),
(82, 'S018', 'SP064'),
(83, 'S018', 'SP008'),
(84, 'S018', 'SP032'),
(85, 'S019', 'SP007'),
(86, 'S019', 'SP066'),
(87, 'S019', 'SP060'),
(88, 'S019', 'SP027'),
(89, 'S020', 'SP028'),
(90, 'S020', 'SP040'),
(91, 'S020', 'SP050'),
(92, 'S021', 'SP051'),
(93, 'S021', 'SP089'),
(94, 'S021', 'SP055'),
(95, 'S021', 'SP090'),
(96, 'S021', 'SP020'),
(97, 'S021', 'SP025'),
(98, 'S022', 'SP035'),
(99, 'S022', 'SP045'),
(100, 'S022', 'SP055'),
(101, 'S022', 'SP049'),
(102, 'S023', 'SP033'),
(103, 'S023', 'SP009'),
(104, 'S023', 'SP043'),
(105, 'S023', 'SP044'),
(106, 'S023', 'SP066'),
(107, 'S023', 'SP025'),
(108, 'S002', 'SP014'),
(109, 'S022', 'SP015'),
(110, 'S017', 'SP017'),
(111, 'S018', 'SP018'),
(112, 'S012', 'SP024'),
(113, 'S013', 'SP026'),
(114, 'S020', 'SP031'),
(115, 'S017', 'SP037'),
(116, 'S016', 'SP046'),
(117, 'S023', 'SP053'),
(118, 'S021', 'SP056'),
(119, 'S018', 'SP061'),
(120, 'S015', 'SP070'),
(121, 'S003', 'SP078'),
(122, 'S022', 'SP081'),
(124, 'S006', 'SP027'),
(125, 'S022', 'SP087'),
(126, 'S023', 'SP001'),
(127, 'S022', 'SP001');

-- --------------------------------------------------------

--
-- Table structure for table `sub_service`
--

CREATE TABLE IF NOT EXISTS sub_service (
  `Service_Id` varchar(10) NOT NULL,
  `S_Sub_Id` varchar(10) NOT NULL,
  `S_Sub_Name` varchar(40) NOT NULL,
  `S_Sub_Charge` int(5) NOT NULL,
  PRIMARY KEY (`S_Sub_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_service`
--

INSERT INTO sub_service (`Service_Id`, `S_Sub_Id`, `S_Sub_Name`, `S_Sub_Charge`) VALUES
('S001', 'S001_01', 'Not Cooling', 350),
('S001', 'S001_02', 'Noice Problem', 200),
('S001', 'S001_03', 'Ice Not Forming In Freezer', 450),
('S001', 'S001_04', 'Water Leacking', 300),
('S001', 'S001_05', 'Defrost Problem', 350),
('S001', 'S001_06', 'Installation', 100),
('S001', 'S001_07', 'Dispenser Not Working', 200),
('S001', 'S001_08', 'Light Prroblem', 150),
('S001', 'S001_09', 'Gas Refilling', 300),
('S002', 'S002_01', 'Repairing', 300),
('S002', 'S002_02', 'Installation', 400),
('S002', 'S002_03', 'Uninstallation', 250),
('S002', 'S002_04', 'Start Up Problem', 300),
('S002', 'S002_05', 'Gas Refill', 1200),
('S002', 'S002_06', 'Cooling Problem', 300),
('S002', 'S002_07', 'Noice Problem', 350),
('S002', 'S002_08', 'Water Leakage', 350),
('S002', 'S002_09', 'Ice Formation', 450),
('S002', 'S002_10', 'Switch Installation', 200),
('S002', 'S002_11', 'Stabilizer Installation', 200),
('S002', 'S002_12', 'Stabilizer Repairing', 300),
('S003', 'S003_01', 'Repairing', 200),
('S003', 'S003_02', 'Installation', 300),
('S004', 'S004_01', 'Sparking', 200),
('S004', 'S004_02', 'Glass Plate Not Spinning', 200),
('S004', 'S004_03', 'Buttons Not Working', 200),
('S004', 'S004_04', 'Display Not Working', 250),
('S005', 'S005_01', 'Spinning Problem', 300),
('S005', 'S005_02', 'Noice Problem', 250),
('S005', 'S005_03', 'Draining Problem', 200),
('S005', 'S005_04', 'Dryer Problem', 200),
('S005', 'S005_05', 'Button Problem', 200),
('S006', 'S006_01', 'Installation', 200),
('S006', 'S006_02', 'Uninstallation', 200),
('S006', 'S006_03', 'Membrane Changing', 1800),
('S006', 'S006_04', 'Flow Problem', 200),
('S006', 'S006_05', 'Taste Problem', 150),
('S006', 'S006_06', 'Water Leaking', 250),
('S006', 'S006_07', 'Vibration', 300),
('S007', 'S007_01', 'Termite Control', 2000),
('S007', 'S007_02', 'Rodent Control', 400),
('S007', 'S007_03', 'Bad Bug Control', 400),
('S007', 'S007_04', 'Mosquito Fogging', 500),
('S008', 'S008_01', 'Installation', 200),
('S008', 'S008_02', 'Uninstallation', 200),
('S008', 'S008_03', 'Dirty Air', 250),
('S008', 'S008_04', 'Light Issue', 250),
('S009', 'S009_01', 'Jar Blade Repairing', 150),
('S009', 'S009_02', 'Jar Socket Reparing', 150),
('S009', 'S009_03', 'Motor Change', 300),
('S009', 'S009_04', 'Noise Problem', 200),
('S010', 'S010_01', 'Not Working', 200),
('S010', 'S010_02', 'Shaft Changing', 100),
('S010', 'S010_03', 'Cable Changing', 100),
('S010', 'S010_04', 'Switch Not Working', 100),
('S011', 'S011_01', 'Burner Change', 100),
('S012', 'S012_01', 'Leakage', 100),
('S012', 'S012_02', 'Installation', 100),
('S013', 'S013_01', 'Complete House', 3500),
('S013', 'S013_02', 'Sofa', 200),
('S013', 'S013_03', 'Carpet', 400),
('S013', 'S013_04', 'Kitchen', 300),
('S013', 'S013_05', 'Bathroom Cleaning', 400),
('S014', 'S014_01', 'Startup Problem', 400),
('S014', 'S014_02', 'Format', 200),
('S014', 'S014_03', 'Battery Problem', 1000),
('S014', 'S014_04', 'Charger/Adapter Repairing', 300),
('S014', 'S014_05', 'Motherboard', 300),
('S014', 'S014_06', 'BIOS', 300),
('S014', 'S014_07', 'Back Up and Restore', 400),
('S014', 'S014_08', 'Heating Problem', 300),
('S015', 'S015_01', 'Starting Problem', 200),
('S015', 'S015_02', 'Noise Problem', 300),
('S015', 'S015_03', 'Capacitor Damage', 100),
('S015', 'S015_04', 'Broken Pump Wire', 200),
('S016', 'S016_01', 'Repairing', 200),
('S016', 'S016_02', 'Door and Window Installation', 200),
('S016', 'S016_03', 'Hinge Reparing', 100),
('S016', 'S016_04', 'Latch Reparing', 100),
('S016', 'S016_05', 'Lock Installation', 150),
('S016', 'S016_06', 'Lock Repairing', 100),
('S017', 'S017_01', 'Installation', 100),
('S017', 'S017_02', 'Uninstallation', 100),
('S018', 'S018_01', 'Installation', 200),
('S018', 'S018_02', 'Uninstallation', 150),
('S018', 'S018_03', 'Low Water Pressure', 150),
('S019', 'S019_01', 'Water Leackage', 300),
('S019', 'S019_02', 'Not Heating', 200),
('S020', 'S020_01', 'Installation', 300),
('S020', 'S020_02', 'Uninstallation', 250),
('S020', 'S020_03', 'Leackage Problem', 250),
('S021', 'S021_01', 'Installation', 200),
('S021', 'S021_02', 'Regulator Not Working', 50),
('S021', 'S021_03', 'Vibration', 200),
('S021', 'S021_04', 'Motor Working Slow', 200),
('S022', 'S022_01', 'Wash and Fold', 10),
('S022', 'S022_02', 'Iron', 5),
('S022', 'S022_03', 'Dry Cleaning', 100),
('S023', 'S023_01', 'Complete Car Wash', 1000),
('S023', 'S023_02', 'External Detailing', 500),
('S023', 'S023_03', 'Internal Detailing', 500);

CREATE TABLE IF NOT EXISTS payment_details (
  `Payment_Id` varchar(10) NOT NULL,
  `Service_Id` varchar(10) NOT NULL,
  `S_P_Id` varchar(10) NOT NULL,
  `C_Email_Id` varchar(40) NOT NULL,
  `Amount` int,
  `Record_No` int(11),
  `Date` date NOT NULL,
  `time` DATETIME NOT NULL,
  PRIMARY KEY (`Payment_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE payment_details 
  ADD CONSTRAINT FK2 FOREIGN KEY (Service_Id) REFERENCES service (Service_Id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT FK10 FOREIGN KEY (S_P_Id) REFERENCES service_provider_details (S_P_Id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT FK13 FOREIGN KEY (C_Email_Id) REFERENCES client_details (C_Email_Id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT FK17 FOREIGN KEY (Record_No) REFERENCES client_service_details (Record_No) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE sub_service
  ADD CONSTRAINT FK1 FOREIGN KEY (Service_Id) REFERENCES service (Service_Id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE client_service_details
  ADD CONSTRAINT FK3 FOREIGN KEY (Sub_Service_Id) REFERENCES sub_service (S_Sub_Id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT FK14 FOREIGN KEY (Payment_Id) REFERENCES payment_details (Payment_Id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE service_provider_services
  ADD CONSTRAINT FK11 FOREIGN KEY (Service_Id) REFERENCES service (Service_Id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT FK12 FOREIGN KEY (S_P_Id) REFERENCES service_provider_details (S_P_Id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE contract_details
  ADD CONSTRAINT FK6 FOREIGN KEY (C_Email_Id) REFERENCES client_details (C_Email_Id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT FK7 FOREIGN KEY (Service_Id) REFERENCES service (Service_Id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT FK8 FOREIGN KEY (S_P_Id) REFERENCES service_provider_details (S_P_Id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT FK16 FOREIGN KEY (Payment_Id) REFERENCES payment_details (Payment_Id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE feedback_details
  ADD CONSTRAINT FK4 FOREIGN KEY (S_P_Id) REFERENCES service_provider_details (S_P_Id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT FK5 FOREIGN KEY (C_Email_Id) REFERENCES client_details (C_Email_Id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT FK15 FOREIGN KEY (Service_Id) REFERENCES service (Service_Id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE contract_record
  ADD CONSTRAINT FK9 FOREIGN KEY (C_Id) REFERENCES contract_details (C_Id) ON DELETE CASCADE ON UPDATE CASCADE;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
