-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Ara 2017, 16:12:11
-- Sunucu sürümü: 10.1.26-MariaDB
-- PHP Sürümü: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `register`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `addsubject`
--

CREATE TABLE `addsubject` (
  `sub_code` varchar(45) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `addsubject`
--

INSERT INTO `addsubject` (`sub_code`, `name`) VALUES
('BLM', 'Kako si'),
('BLM375', 'C'),
('BLM444', 'Data Mining'),
('COM111', 'DAlila Z');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `exam_no` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `start_hour` time NOT NULL,
  `finish_hour` time NOT NULL,
  `subject` varchar(45) NOT NULL,
  `duration` int(11) NOT NULL,
  `username` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `exam`
--

INSERT INTO `exam` (`id`, `exam_no`, `start_date`, `finish_date`, `start_hour`, `finish_hour`, `subject`, `duration`, `username`) VALUES
(27, 1, '2017-12-31', '2017-12-31', '00:00:00', '23:59:00', 'C', 60, 'fairouz'),
(28, 2, '2017-12-02', '2017-12-22', '04:45:00', '04:45:00', 'C', 60, 'fairouz'),
(29, 3, '2017-12-09', '2017-12-10', '02:24:00', '23:24:00', 'C', 20, 'fairouz'),
(30, 1, '2017-12-16', '2017-12-31', '04:45:00', '04:45:00', 'Data', 45, 'fairouz');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `exam_question`
--

CREATE TABLE `exam_question` (
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `subject` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `exam_question`
--

INSERT INTO `exam_question` (`exam_id`, `question_id`, `username`, `subject`) VALUES
(27, 2, 'fairouz', 'C'),
(27, 4, 'fairouz', 'C'),
(27, 6, 'fairouz', 'C'),
(27, 8, 'fairouz', 'C'),
(27, 9, 'fairouz', 'C'),
(28, 6, 'fairouz', 'C'),
(28, 9, 'fairouz', 'C'),
(28, 10, 'fairouz', 'C'),
(28, 11, 'fairouz', 'C'),
(28, 12, 'fairouz', 'C'),
(28, 13, 'fairouz', 'C'),
(28, 14, 'fairouz', 'C'),
(28, 15, 'fairouz', 'C');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `questions`
--

CREATE TABLE `questions` (
  `no` int(11) NOT NULL,
  `subject` text NOT NULL,
  `answer` text NOT NULL,
  `question` text NOT NULL,
  `option_A` text NOT NULL,
  `option_B` text NOT NULL,
  `option_C` text NOT NULL,
  `option_D` text NOT NULL,
  `username` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `questions`
--

INSERT INTO `questions` (`no`, `subject`, `answer`, `question`, `option_A`, `option_B`, `option_C`, `option_D`, `username`) VALUES
(1, 'Calculus', 'kj', 'jkj', 'kj', 'kj', 'kj', 'kj', 'fairouz'),
(2, 'C', 'A', 'What Ä°s your name?', 'Dalila', 'Fairouz', 'Hassan', 'Mirza', 'fairouz'),
(3, 'C++', 'A', 'Where do you live?', 'Ankara', 'Istanbul', 'Ä±zmir', 'Antalya', 'fairouz'),
(4, 'C', 'jh', 'hh', 'hjh', 'jh', 'jh', 'jh', 'fairouz'),
(6, 'C', '', '', '', '', '', '', 'fairouz'),
(7, 'Calculus', 'nm', 'mnnmnm', 'mnmn', 'mnm', 'nmn', 'mnm', 'fairouz'),
(8, 'C', 'bnb', 'mnbnb', 'nbnb', 'nnbnb', 'nbn', 'bnbn', 'fairouz'),
(9, 'C', 'kj', 'kojkhjk', 'kj', 'kjk', 'j', 'kj', 'fairouz'),
(10, 'C', 'kjk', 'hjhkj', 'kjkjk', 'jkj', 'kj', 'kjkj', 'fairouz'),
(11, 'C', 'jkj', 'kjkjkj', 'kj', 'kj', 'kjk', 'jk', 'fairouz'),
(12, 'C', 'hm', 'mnmnm', 'h', 'mhm', 'hm', 'hmh', 'fairouz'),
(13, 'C', 'hjkh', 'kbjkhjk', 'hjkhk', 'jhkj', 'hkj', 'hkj', 'fairouz'),
(14, 'C', 'jlk', 'lkjlkj', 'lkj', 'lkj', 'lkjl', 'kjlk', 'fairouz'),
(15, 'C', 'lkj', 'ljklkjlk', 'lkj', 'lkjlk', 'jlkj', 'lkj', 'fairouz'),
(16, 'C', 'jlkjlk', 'kjlkjlk', 'jlkjlk', 'jlk', 'jlk', 'jlk', 'fairouz'),
(17, 'C', 'k', 'How kjk', 'jkj', 'kjk', 'jk', 'jk', 'fairouz'),
(18, 'Data', 'lkjlk', 'kljlk', 'jlkj', 'lkj', 'lkj', 'lkj', 'fairouz'),
(19, 'Data', 'jhjh', 'jhjhj', 'hjjh', 'jh', 'jhj', 'jh', 'fairouz'),
(20, 'Data', 'nmn', 'mnmnnm', 'nmnmn', 'mnmn', 'mnm', 'nm', 'fairouz'),
(21, 'Data', 'lkjlk', 'jkljklj', 'lkj', 'lkj', 'lkj', 'lkj', 'fairouz');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `quiz`
--

CREATE TABLE `quiz` (
  `userans` text NOT NULL,
  `ans` text NOT NULL,
  `username` varchar(45) NOT NULL,
  `subject` varchar(45) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `quiz`
--

INSERT INTO `quiz` (`userans`, `ans`, `username`, `subject`, `id`) VALUES
('A', 'A', 'dalila', 'Algoritam', 1),
('B', 'A', 'dalila', 'Algoritam', 1),
('A', 'A', 'dalila', 'Algoritam', 1),
('A', 'm', 'dalila', 'Geog', 783),
('A', '', 'dalila', 'C', 0),
('e', '', 'dalila', 'C', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `result`
--

CREATE TABLE `result` (
  `username` varchar(45) NOT NULL,
  `percentage` double NOT NULL,
  `subject` varchar(45) NOT NULL,
  `total_marks` float NOT NULL,
  `marks_obtained` float NOT NULL,
  `result` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `result`
--

INSERT INTO `result` (`username`, `percentage`, `subject`, `total_marks`, `marks_obtained`, `result`) VALUES
('100', 0, 'C', 1, 1, 'EXCELLENT'),
('0', 0, 'Geog', 7, 0, 'FAIL'),
('100', 0, 'Algoritam', 2, 2, 'EXCELLENT'),
('100', 0, 'Algoritam', 3, 3, 'EXCELLENT'),
('50', 0, 'C', 2, 1, 'BELOW AVERAGE'),
('33.333333333333', 0, 'C', 3, 1, 'FAIL'),
('25', 0, 'C', 4, 1, 'FAIL'),
('0', 0, 'Geog', 8, 0, 'FAIL'),
('40', 0, 'C', 5, 2, ''),
('40', 0, 'C', 5, 2, ''),
('0', 0, 'Geog', 9, 0, 'FAIL'),
('0', 0, 'Geog', 9, 0, 'FAIL'),
('50', 0, 'C', 6, 3, 'BELOW AVERAGE'),
('42.857142857143', 0, 'C', 7, 3, 'BELOW AVERAGE'),
('0', 0, 'Geog', 10, 0, 'FAIL'),
('0', 0, 'Math', 1, 0, 'FAIL'),
('0', 0, 'Geog', 11, 0, 'FAIL'),
('80', 0, 'Algoritam', 5, 4, 'GOOD'),
('0', 0, 'Geog', 12, 0, 'FAIL'),
('83.333333333333', 0, 'Algoritam', 6, 5, 'VERY GOOD'),
('85.714285714286', 0, 'Algoritam', 7, 6, 'VERY GOOD');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `results`
--

CREATE TABLE `results` (
  `username` varchar(45) NOT NULL,
  `subject` varchar(45) NOT NULL,
  `percentage` double NOT NULL,
  `total_questions` int(11) NOT NULL,
  `total_correct` int(11) NOT NULL,
  `result` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `results`
--

INSERT INTO `results` (`username`, `subject`, `percentage`, `total_questions`, `total_correct`, `result`) VALUES
('dalila', 'Algoritam', 90, 10, 9, 'VERY GOOD'),
('dalila', 'Algoritam', 100, 1, 1, 'EXCELLENT'),
('dalila', 'Algoritam', 50, 2, 1, 'BELOW AVERAGE'),
('fairouz', '', 0, 0, 0, ''),
('fairouz', '', 0, 0, 0, ''),
('dalila', 'Algoritam', 66.666666666667, 3, 2, 'AVERAGE'),
('dalila', 'Geog', 0, 1, 0, 'FAIL');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `student`
--

CREATE TABLE `student` (
  `type` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `user` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `student`
--

INSERT INTO `student` (`type`, `name`, `lname`, `user`, `password`, `email`) VALUES
('student', 'dalila', 'zaimovic', 'dalila', 'dalila', 'zaimovic.dalila@gmail.com'),
('student', 'ayse', 'ergul', 'ayse', 'ayse', 'ayse@dalila.xom'),
('student', 'Sabina', 'Zaimovic', 'sabina', 'sabina', 'sabina@zaimovic'),
('student', 'Ozkan', 'Daga', 'ozkan', 'ozkan', 'ozi@gmail.com'),
('student', 'hj', 'hh', 'hh', 'hh', 'hjh@jkjk');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teacher`
--

CREATE TABLE `teacher` (
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `teacher`
--

INSERT INTO `teacher` (`username`, `password`, `name`, `lname`, `email`) VALUES
('dalila', '123456', 'Dalila', 'Zaimovic', 'dalila@z'),
('fairouz', '123456', 'Fairouz', 'Hassan', 'fairouz@com'),
('sabina', 'sabina', 'Sabina', 'Zaimovic', 'sabina@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `todo`
--

CREATE TABLE `todo` (
  `username` varchar(45) NOT NULL,
  `task` varchar(200) NOT NULL,
  `done` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `todo`
--

INSERT INTO `todo` (`username`, `task`, `done`) VALUES
('fairouz', 'sasasa', 0),
('fairouz', 'Go to ', 0),
('fairouz', 'koko', 0),
('fairouz', 'go to work', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `addsubject`
--
ALTER TABLE `addsubject`
  ADD PRIMARY KEY (`sub_code`);

--
-- Tablo için indeksler `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`no`);

--
-- Tablo için indeksler `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`username`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Tablo için AUTO_INCREMENT değeri `questions`
--
ALTER TABLE `questions`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
