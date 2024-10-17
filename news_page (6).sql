-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 03:52 AM
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
-- Database: `news_page`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `first_name`, `last_name`, `password`, `created_at`) VALUES
(1, 'admin1', 'admin', 'Ladmin', '$2y$10$7WAivihSlirSWSOZ.KNIne5GJbhsb9Iav6SHIvV0csS24Y.zP2xTW', '2024-09-17 09:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `author_id`, `category_id`, `created_at`) VALUES
(1, 'ทดสอบ', 'ทดสอบ', NULL, 1, '2024-09-26 17:00:00'),
(2, 'ทดสอบ2', 'ทดสอบ2', NULL, 1, '2024-09-26 17:00:00'),
(3, 'ทดสอบ3', '3ทดสอบฟหกแฟหแหแฟแหแฟหหปแแฟแ', NULL, 1, '2024-09-28 17:00:00'),
(4, 'ทดสอบ4', 'ทดสอบ4sfcsssfsdgdgdgdg', NULL, 1, '2024-10-02 17:00:00'),
(5, 'ทดดดด', 'ทดดดด', NULL, 1, '2024-10-02 17:00:00'),
(6, 'ทดดดด', 'ทดดดด', NULL, 1, '2024-10-02 17:00:00'),
(7, 'ทดสอบบบบบบ', 'เครือข่ายบริหารการวิจัยภาคใต้ตอนบน เปิดรับข้อเสนอโครงการวิจัยฯ ภาครัฐร่วมเอกชนในเชิงพาณิชย์ (PRELIMINARY RESEARCH) ปีงบประมาณ พ.ศ. 2567\n\n          วันที่ 30 มกราคม พ.ศ. 2567 มหาวิทยาลัยวลัยลักษณ์ โดยสำนักวิชาสาธารณสุขศาสตร์ สำนักวิชาวิศวกรรมศาสตร์และเทคโนโลยี และศูนย์บริการวิชาการ ในฐานะที่ปรึกษา “โครงการพัฒนาศักยภาพสำนักงานทรัพยากรธรรมชาติและสิ่งแวดล้อมจังหวัด เพื่อพัฒนาแผนงานด้านการเปลี่ยนแปลงสภาพภูมิอากาศระดับจังหวัด จังหวัดตรัง” นำโดย รองศาสตราจารย์ ดร.วาริท เจาะจิตต์ รองอธิการบดีมหาวิทยาลัยวลัยลักษณ์ อาจารย์นิธิมา หนูหลง และผู้ช่วยศาสตราจารย์ ดร.ประเสริฐ มากแก้ว อาจารย์ประจำสำนักวิชาสาธารณสุขศาสตร์ และผู้ช่วยศาสตาจารย์ ดร.กมล ถิ่นสุราษฎร์ อาจารย์ประจำสำนักวิชาวิศวกรรมศาสตร์และเทคโนโลยี มหาวิทยาลัยวลัยลักษณ์ เข้าร่วมประชุมคณะทำงานด้านการเปลี่ยนแปลงสภาพภูมิอากาศอากาศระดับจังหวัด จังหวัดตรัง ครั้งที่ 5 และเข้าร่วมพิธีเปิดศูนย์ประสานงาน ด้านการเปลี่ยนแปลง สภาพภูมิอากาศและความหลากหลายทางชีวภาพ จังหวัดตรัง ณ ห้องธนารินทร์ 2 ชั้น 2 โรงแรมธรรมรินทร์ ธนา อำเภอเมืองตรัง จังหวัดตรัง โดยมีนายทรงกลดสว่างวงศ์ ผู้ว่าราชการจังหวัดตรัง เป็นประธานการประชุม วัตถุประสงค์ของการเปิดศูนย์ประสานงานด้านการเปลี่ยนแปลงสภาพภูมิอากาศและความหลากหลายทางชีวภาพ จังหวัดตรัง เพื่อขับเคลื่อนตามนโยบายกระทรวงทรัพยากรธรรมชาติและสิ่งแวดล้อมอย่างต่อเนื่อง มีภารกิจหลัก 1. เป็นเกณฑ์กลางในการสื่อสาร สร้างความเข้าใจและความตระหนักต่อการเปลี่ยนแปลงสภาพภูมิอากาศ 2. ประสานความร่วมมือเชื่อมโยงการดำเนินงานร่วมกับคณะทำงาน รวมถึงภาคส่วนต่าง ๆ ที่เกี่ยวข้อง และเป็นแหล่งข้อมูล เกี่ยวกับการเปลี่ยนแปลงสภาพภูมิอากาศและความหลากหลายทางชีวภาพ สามารถนำไปใช้ประกอบการดำเนินการต่าง ๆ ได้ อีกทั้งในที่ประชุมมหาวิทยาลัยวลัยลักษณ์ในฐานะที่ปรึกษาโครงการฯ ได้นำเสนอแผนปฏิบัติการปรับตัวต่อผลกระทบจากการเปลี่ยนแปลงสภาพภูมิอากาศ ในจังหวัดตรัง และรับฟังความคิดเห็นจากคณะทำงานด้านการเปลี่ยนแปลงสภาพภูมิอากาศระดับจังหวัด จังหวัดตรัง สำหรับหน่วยงานหลัก และหน่วยงานสนับสนุน เพื่อขับเคลื่อนแผนปฏิบัติการปรับต่อต่อผลกระทบจากการเปลี่ยนแปลงสภาพภูมิอากาศในจังหวัดตรัง ต่อไป\n\n          ซึ่งการดำเนินการดังกล่าว สอดคล้องกับเป้าหมายการพัฒนาที่ยั่งยืน (SDGs) เป้าหมายตาม SDG ข้อที่ 13 (Climate Action) การรับมือการเปลี่ยนแปลงสภาพภูมิอากาศ และข้อที่ 17 (Partnerships for the Goals) สร้างความร่วมมือกับเครือข่ายและหน่วยงานต่าง ๆ ที่เกี่ยวข้องอีกด้วย', NULL, 1, '2024-10-02 17:00:00'),
(8, 'ทดสอบบบบบบ', 'เครือข่ายบริหารการวิจัยภาคใต้ตอนบน เปิดรับข้อเสนอโครงการวิจัยฯ ภาครัฐร่วมเอกชนในเชิงพาณิชย์ (PRELIMINARY RESEARCH) ปีงบประมาณ พ.ศ. 2567\r\n\r\n          วันที่ 30 มกราคม พ.ศ. 2567 มหาวิทยาลัยวลัยลักษณ์ โดยสำนักวิชาสาธารณสุขศาสตร์ สำนักวิชาวิศวกรรมศาสตร์และเทคโนโลยี และศูนย์บริการวิชาการ ในฐานะที่ปรึกษา “โครงการพัฒนาศักยภาพสำนักงานทรัพยากรธรรมชาติและสิ่งแวดล้อมจังหวัด เพื่อพัฒนาแผนงานด้านการเปลี่ยนแปลงสภาพภูมิอากาศระดับจังหวัด จังหวัดตรัง” นำโดย รองศาสตราจารย์ ดร.วาริท เจาะจิตต์ รองอธิการบดีมหาวิทยาลัยวลัยลักษณ์ อาจารย์นิธิมา หนูหลง และผู้ช่วยศาสตราจารย์ ดร.ประเสริฐ มากแก้ว อาจารย์ประจำสำนักวิชาสาธารณสุขศาสตร์ และผู้ช่วยศาสตาจารย์ ดร.กมล ถิ่นสุราษฎร์ อาจารย์ประจำสำนักวิชาวิศวกรรมศาสตร์และเทคโนโลยี มหาวิทยาลัยวลัยลักษณ์ เข้าร่วมประชุมคณะทำงานด้านการเปลี่ยนแปลงสภาพภูมิอากาศอากาศระดับจังหวัด จังหวัดตรัง ครั้งที่ 5 และเข้าร่วมพิธีเปิดศูนย์ประสานงาน ด้านการเปลี่ยนแปลง สภาพภูมิอากาศและความหลากหลายทางชีวภาพ จังหวัดตรัง ณ ห้องธนารินทร์ 2 ชั้น 2 โรงแรมธรรมรินทร์ ธนา อำเภอเมืองตรัง จังหวัดตรัง โดยมีนายทรงกลดสว่างวงศ์ ผู้ว่าราชการจังหวัดตรัง เป็นประธานการประชุม วัตถุประสงค์ของการเปิดศูนย์ประสานงานด้านการเปลี่ยนแปลงสภาพภูมิอากาศและความหลากหลายทางชีวภาพ จังหวัดตรัง เพื่อขับเคลื่อนตามนโยบายกระทรวงทรัพยากรธรรมชาติและสิ่งแวดล้อมอย่างต่อเนื่อง มีภารกิจหลัก 1. เป็นเกณฑ์กลางในการสื่อสาร สร้างความเข้าใจและความตระหนักต่อการเปลี่ยนแปลงสภาพภูมิอากาศ 2. ประสานความร่วมมือเชื่อมโยงการดำเนินงานร่วมกับคณะทำงาน รวมถึงภาคส่วนต่าง ๆ ที่เกี่ยวข้อง และเป็นแหล่งข้อมูล เกี่ยวกับการเปลี่ยนแปลงสภาพภูมิอากาศและความหลากหลายทางชีวภาพ สามารถนำไปใช้ประกอบการดำเนินการต่าง ๆ ได้ อีกทั้งในที่ประชุมมหาวิทยาลัยวลัยลักษณ์ในฐานะที่ปรึกษาโครงการฯ ได้นำเสนอแผนปฏิบัติการปรับตัวต่อผลกระทบจากการเปลี่ยนแปลงสภาพภูมิอากาศ ในจังหวัดตรัง และรับฟังความคิดเห็นจากคณะทำงานด้านการเปลี่ยนแปลงสภาพภูมิอากาศระดับจังหวัด จังหวัดตรัง สำหรับหน่วยงานหลัก และหน่วยงานสนับสนุน เพื่อขับเคลื่อนแผนปฏิบัติการปรับต่อต่อผลกระทบจากการเปลี่ยนแปลงสภาพภูมิอากาศในจังหวัดตรัง ต่อไป\r\n\r\n          ซึ่งการดำเนินการดังกล่าว สอดคล้องกับเป้าหมายการพัฒนาที่ยั่งยืน (SDGs) เป้าหมายตาม SDG ข้อที่ 13 (Climate Action) การรับมือการเปลี่ยนแปลงสภาพภูมิอากาศ และข้อที่ 17 (Partnerships for the Goals) สร้างความร่วมมือกับเครือข่ายและหน่วยงานต่าง ๆ ที่เกี่ยวข้องอีกด้วย', NULL, 1, '2024-10-02 17:00:00'),
(9, 'ทดสอบบบบบบๅๅๅๅๅๅๅ', 'เครือข่ายบริหารการวิจัยภาคใต้ตอนบน เปิดรับข้อเสนอโครงการวิจัยฯ ภาครัฐร่วมเอกชนในเชิงพาณิชย์ (PRELIMINARY RESEARCH) ปีงบประมาณ พ.ศ. 2567\r\n\r\n          วันที่ 30 มกราคม พ.ศ. 2567 มหาวิทยาลัยวลัยลักษณ์ โดยสำนักวิชาสาธารณสุขศาสตร์ สำนักวิชาวิศวกรรมศาสตร์และเทคโนโลยี และศูนย์บริการวิชาการ ในฐานะที่ปรึกษา “โครงการพัฒนาศักยภาพสำนักงานทรัพยากรธรรมชาติและสิ่งแวดล้อมจังหวัด เพื่อพัฒนาแผนงานด้านการเปลี่ยนแปลงสภาพภูมิอากาศระดับจังหวัด จังหวัดตรัง” นำโดย รองศาสตราจารย์ ดร.วาริท เจาะจิตต์ รองอธิการบดีมหาวิทยาลัยวลัยลักษณ์ อาจารย์นิธิมา หนูหลง และผู้ช่วยศาสตราจารย์ ดร.ประเสริฐ มากแก้ว อาจารย์ประจำสำนักวิชาสาธารณสุขศาสตร์ และผู้ช่วยศาสตาจารย์ ดร.กมล ถิ่นสุราษฎร์ อาจารย์ประจำสำนักวิชาวิศวกรรมศาสตร์และเทคโนโลยี มหาวิทยาลัยวลัยลักษณ์ เข้าร่วมประชุมคณะทำงานด้านการเปลี่ยนแปลงสภาพภูมิอากาศอากาศระดับจังหวัด จังหวัดตรัง ครั้งที่ 5 และเข้าร่วมพิธีเปิดศูนย์ประสานงาน ด้านการเปลี่ยนแปลง สภาพภูมิอากาศและความหลากหลายทางชีวภาพ จังหวัดตรัง ณ ห้องธนารินทร์ 2 ชั้น 2 โรงแรมธรรมรินทร์ ธนา อำเภอเมืองตรัง จังหวัดตรัง โดยมีนายทรงกลดสว่างวงศ์ ผู้ว่าราชการจังหวัดตรัง เป็นประธานการประชุม วัตถุประสงค์ของการเปิดศูนย์ประสานงานด้านการเปลี่ยนแปลงสภาพภูมิอากาศและความหลากหลายทางชีวภาพ จังหวัดตรัง เพื่อขับเคลื่อนตามนโยบายกระทรวงทรัพยากรธรรมชาติและสิ่งแวดล้อมอย่างต่อเนื่อง มีภารกิจหลัก 1. เป็นเกณฑ์กลางในการสื่อสาร สร้างความเข้าใจและความตระหนักต่อการเปลี่ยนแปลงสภาพภูมิอากาศ 2. ประสานความร่วมมือเชื่อมโยงการดำเนินงานร่วมกับคณะทำงาน รวมถึงภาคส่วนต่าง ๆ ที่เกี่ยวข้อง และเป็นแหล่งข้อมูล เกี่ยวกับการเปลี่ยนแปลงสภาพภูมิอากาศและความหลากหลายทางชีวภาพ สามารถนำไปใช้ประกอบการดำเนินการต่าง ๆ ได้ อีกทั้งในที่ประชุมมหาวิทยาลัยวลัยลักษณ์ในฐานะที่ปรึกษาโครงการฯ ได้นำเสนอแผนปฏิบัติการปรับตัวต่อผลกระทบจากการเปลี่ยนแปลงสภาพภูมิอากาศ ในจังหวัดตรัง และรับฟังความคิดเห็นจากคณะทำงานด้านการเปลี่ยนแปลงสภาพภูมิอากาศระดับจังหวัด จังหวัดตรัง สำหรับหน่วยงานหลัก และหน่วยงานสนับสนุน เพื่อขับเคลื่อนแผนปฏิบัติการปรับต่อต่อผลกระทบจากการเปลี่ยนแปลงสภาพภูมิอากาศในจังหวัดตรัง ต่อไป\r\n\r\n          ซึ่งการดำเนินการดังกล่าว สอดคล้องกับเป้าหมายการพัฒนาที่ยั่งยืน (SDGs) เป้าหมายตาม SDG ข้อที่ 13 (Climate Action) การรับมือการเปลี่ยนแปลงสภาพภูมิอากาศ และข้อที่ 17 (Partnerships for the Goals) สร้างความร่วมมือกับเครือข่ายและหน่วยงานต่าง ๆ ที่เกี่ยวข้องอีกด้วย', NULL, 1, '2024-10-02 17:00:00'),
(10, 'ทดสอบบบบบบ222222222222222', 'เครือข่ายบริหารการวิจัยภาคใต้ตอนบน เปิดรับข้อเสนอโครงการวิจัยฯ ภาครัฐร่วมเอกชนในเชิงพาณิชย์ (PRELIMINARY RESEARCH) ปีงบประมาณ พ.ศ. 2567\r\n\r\n          วันที่ 30 มกราคม พ.ศ. 2567 มหาวิทยาลัยวลัยลักษณ์ โดยสำนักวิชาสาธารณสุขศาสตร์ สำนักวิชาวิศวกรรมศาสตร์และเทคโนโลยี และศูนย์บริการวิชาการ ในฐานะที่ปรึกษา “โครงการพัฒนาศักยภาพสำนักงานทรัพยากรธรรมชาติและสิ่งแวดล้อมจังหวัด เพื่อพัฒนาแผนงานด้านการเปลี่ยนแปลงสภาพภูมิอากาศระดับจังหวัด จังหวัดตรัง” นำโดย รองศาสตราจารย์ ดร.วาริท เจาะจิตต์ รองอธิการบดีมหาวิทยาลัยวลัยลักษณ์ อาจารย์นิธิมา หนูหลง และผู้ช่วยศาสตราจารย์ ดร.ประเสริฐ มากแก้ว อาจารย์ประจำสำนักวิชาสาธารณสุขศาสตร์ และผู้ช่วยศาสตาจารย์ ดร.กมล ถิ่นสุราษฎร์ อาจารย์ประจำสำนักวิชาวิศวกรรมศาสตร์และเทคโนโลยี มหาวิทยาลัยวลัยลักษณ์ เข้าร่วมประชุมคณะทำงานด้านการเปลี่ยนแปลงสภาพภูมิอากาศอากาศระดับจังหวัด จังหวัดตรัง ครั้งที่ 5 และเข้าร่วมพิธีเปิดศูนย์ประสานงาน ด้านการเปลี่ยนแปลง สภาพภูมิอากาศและความหลากหลายทางชีวภาพ จังหวัดตรัง ณ ห้องธนารินทร์ 2 ชั้น 2 โรงแรมธรรมรินทร์ ธนา อำเภอเมืองตรัง จังหวัดตรัง โดยมีนายทรงกลดสว่างวงศ์ ผู้ว่าราชการจังหวัดตรัง เป็นประธานการประชุม วัตถุประสงค์ของการเปิดศูนย์ประสานงานด้านการเปลี่ยนแปลงสภาพภูมิอากาศและความหลากหลายทางชีวภาพ จังหวัดตรัง เพื่อขับเคลื่อนตามนโยบายกระทรวงทรัพยากรธรรมชาติและสิ่งแวดล้อมอย่างต่อเนื่อง มีภารกิจหลัก 1. เป็นเกณฑ์กลางในการสื่อสาร สร้างความเข้าใจและความตระหนักต่อการเปลี่ยนแปลงสภาพภูมิอากาศ 2. ประสานความร่วมมือเชื่อมโยงการดำเนินงานร่วมกับคณะทำงาน รวมถึงภาคส่วนต่าง ๆ ที่เกี่ยวข้อง และเป็นแหล่งข้อมูล เกี่ยวกับการเปลี่ยนแปลงสภาพภูมิอากาศและความหลากหลายทางชีวภาพ สามารถนำไปใช้ประกอบการดำเนินการต่าง ๆ ได้ อีกทั้งในที่ประชุมมหาวิทยาลัยวลัยลักษณ์ในฐานะที่ปรึกษาโครงการฯ ได้นำเสนอแผนปฏิบัติการปรับตัวต่อผลกระทบจากการเปลี่ยนแปลงสภาพภูมิอากาศ ในจังหวัดตรัง และรับฟังความคิดเห็นจากคณะทำงานด้านการเปลี่ยนแปลงสภาพภูมิอากาศระดับจังหวัด จังหวัดตรัง สำหรับหน่วยงานหลัก และหน่วยงานสนับสนุน เพื่อขับเคลื่อนแผนปฏิบัติการปรับต่อต่อผลกระทบจากการเปลี่ยนแปลงสภาพภูมิอากาศในจังหวัดตรัง ต่อไป\r\n\r\n          ซึ่งการดำเนินการดังกล่าว สอดคล้องกับเป้าหมายการพัฒนาที่ยั่งยืน (SDGs) เป้าหมายตาม SDG ข้อที่ 13 (Climate Action) การรับมือการเปลี่ยนแปลงสภาพภูมิอากาศ และข้อที่ 17 (Partnerships for the Goals) สร้างความร่วมมือกับเครือข่ายและหน่วยงานต่าง ๆ ที่เกี่ยวข้องอีกด้วย', NULL, 1, '2024-10-02 17:00:00'),
(11, 'ทดดด', 'ด้านนายอับดุลรุซ์ดาน หิมะ นักศึกษาชั้นปีที่ 3 ตัวแทนนักศึกษาได้กล่าวถึงความรู้สึกที่ได้เข้าร่วมกิจกรรมในครั้งนี้ว่า “เป็นกิจกรรมการเรียนที่สนุกมากและดีใจที่ได้ลองใช้กล้องคุณภาพสูงจาก Sony ที่พี่ๆทีมงานนำมาสอนและให้ได้ทดลองใช้ในการทำกิจกรรมถ่ายภาพในครั้งนี้ ซึ่งนอกจากจะได้ความรู้แล้วยังได้รู้จักฟังก์ชั่นการใช้งานต่าง ๆ ของกล้อง Sony และได้เรียนรู้เทคนิคในการสร้างคอนเทนต์ การออกแบบให้น่าสนใจ สามารถนำไปปรับใช้ได้จริงทั้งในการเรียนและในอนาคตด้วยครับ ขอขอบคุณบริษัท Sony และพี่ ๆ ทีมงานวิทยากรทุกท่านเป็นอย่างสูงสำหรับโอกาสให้ผมและเพื่อนๆในครั้งนี้ และขอบคุณอาจารย์ผู้สอนในรายวิชาและอาจารย์ในหลักสูตรดิจิทัลคอนเทนต์และสื่อทุกท่าน สำหรับกิจกรรมการเรียนที่สนุกสนานและได้ประสบการณ์จริงจากผู้เชี่ยวชาญในครั้งนี้ครับ”', NULL, 2, '2024-10-02 17:00:00'),
(12, 'ทด', '     \r\n\r\nอาจารย์ ดร.นภารัตน์ ชูเกิด กล่าวในตอนท้ายว่า ทางสำนักวิชาสารสนเทศศาสตร์ และหลักสูตรหลักสูตรดิจิทัลคอนเทนต์และสื่อ มหาวิทยาลัยวลัยลักษณ์ ขอขอบคุณบริษัทโซนี่ ไทย จำกัด ที่เสียสละเวลาและให้เกียรติในการร่วมบรรยายให้ความรู้ทั้งภาคทฤษฏีและปฏิบัติ รวมทั้งการสอนเทคนิคการใช้กล้องคุณภาพสูงแก่นักศึกษาในครั้งนี้ และขอขอบคุณสำหรับการเอื้อเฟื้ออุปกรณ์ถ่ายภาพให้นักศึกษาได้ใช้ในการฝึกอบรม เรียนรู้และทดลองปฏิบัติจริง', NULL, 3, '2024-10-02 17:00:00'),
(13, '', NULL, NULL, 1, '2024-10-03 17:00:00'),
(14, 'หกหก', 'กหกห', NULL, 1, '2024-10-10 17:00:00'),
(15, 'หกหกฟหแฟหแ', 'กหกหฟหแฟหฟหแฟหแหแฟหแแผปฟ ฟแหแฟแ', NULL, 1, '2024-10-10 17:00:00'),
(16, '3333333333', '3333333333333333333333333333333333333333333333333', NULL, 1, '2024-10-10 17:00:00'),
(17, '444444444444444444444444', '22222222222224hq3rtbweytweryeyqb', NULL, 1, '2024-10-10 17:00:00'),
(20, 'ทด', '/ ดึงข้อมูลไฟล์สื่อที่เกี่ยวข้อง เพื่อใช้ในการลบไฟล์\r\n    $sql_media = &quot;SELECT m.file_name, m.file_type \r\n                  FROM media m \r\n                  INNER JOIN article_media am ON m.id = am.media_id \r\n                  WHERE am.article_id = ?&quot;;\r\n    $stmt_media = $conn-&gt;prepare($sql_media);\r\n    $stmt_media-&gt;bind_param(&quot;i&quot;, $article_id);\r\n    $stmt_media-&gt;execute();\r\n    $media_result = $stmt_media-&gt;get_result();\r\n    $media_files = $media_result-&gt;fetch_all(MYSQLI_ASSOC);\r\n', NULL, 2, '2024-10-16 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `article_media`
--

CREATE TABLE `article_media` (
  `article_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_media`
--

INSERT INTO `article_media` (`article_id`, `media_id`) VALUES
(1, 1),
(3, 55),
(3, 56),
(3, 57),
(4, 2),
(4, 3),
(4, 4),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(5, 10),
(5, 11),
(6, 12),
(6, 13),
(6, 14),
(7, 15),
(7, 16),
(7, 17),
(8, 18),
(8, 19),
(8, 20),
(9, 21),
(9, 22),
(9, 23),
(10, 29),
(11, 31),
(11, 32),
(11, 33),
(11, 85),
(12, 34),
(12, 35),
(12, 36),
(13, 40),
(13, 41),
(13, 42),
(13, 43),
(13, 44),
(13, 45),
(13, 46),
(13, 48),
(13, 49),
(14, 58),
(14, 59),
(14, 60),
(15, 61),
(15, 62),
(15, 63),
(16, 64),
(16, 65),
(16, 66),
(17, 67),
(17, 68),
(17, 69),
(20, 91),
(20, 92),
(20, 93);

-- --------------------------------------------------------

--
-- Table structure for table `article_tag`
--

CREATE TABLE `article_tag` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'งานวิชาการ', 'academic'),
(2, 'อบรม/สมนา', 'training-seminar'),
(3, 'กิจกรรม', 'activities');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `duration` int(11) DEFAULT NULL COMMENT 'ระยะเวลาของวิดีโอเป็นวินาที'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `file_name`, `file_type`, `file_path`, `duration`) VALUES
(1, 'example_video.mp4', 'video/mp4', '/uploads/videos/example_video.mp4', 120),
(2, '66fe1edc714f7_Screenshot 2024-07-30 143431.png', 'image', 'uploads/images/66fe1edc714f7_Screenshot 2024-07-30 143431.png', NULL),
(3, '66fe1edc7166d_นอมอล-1.pdf', 'pdf', 'uploads/pdf/66fe1edc7166d_นอมอล-1.pdf', NULL),
(4, '66fe1edc716d6_45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', 'video/mp4', 'uploads/videos/66fe1edc716d6_45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', NULL),
(5, '66fe571a98d53_24432.jpg', 'image', 'uploads/images/66fe571a98d53_24432.jpg', NULL),
(6, '66fe571a98df3_24469.jpg', 'image', 'uploads/images/66fe571a98df3_24469.jpg', NULL),
(7, '66fe571a98e48_26377.jpg', 'image', 'uploads/images/66fe571a98e48_26377.jpg', NULL),
(8, '66fe571a98e96_26381.jpg', 'image', 'uploads/images/66fe571a98e96_26381.jpg', NULL),
(9, '66fe571a98edb_26384.jpg', 'image', 'uploads/images/66fe571a98edb_26384.jpg', NULL),
(10, '66fe571a98f25_เป2.pdf', 'pdf', 'uploads/pdf/66fe571a98f25_เป2.pdf', NULL),
(11, '66fe571a98f74_f784618f-a71d-4b14-9587-1350558938e7.mp4', 'video', 'uploads/videos/66fe571a98f74_f784618f-a71d-4b14-9587-1350558938e7.mp4', NULL),
(12, '66fe57b231eb5_Screenshot 2024-07-30 143431.png', 'image', 'uploads/images/66fe57b231eb5_Screenshot 2024-07-30 143431.png', NULL),
(13, '66fe57b231f60_เป2.pdf', 'pdf', 'uploads/pdf/66fe57b231f60_เป2.pdf', NULL),
(14, '66fe57b23202f_f784618f-a71d-4b14-9587-1350558938e7.mp4', 'video', 'uploads/videos/66fe57b23202f_f784618f-a71d-4b14-9587-1350558938e7.mp4', NULL),
(15, '66febf46cd73d_Screenshot 2024-07-30 143431.png', 'image', 'uploads/images/66febf46cd73d_Screenshot 2024-07-30 143431.png', NULL),
(16, '66febf46cd89f_นอมอล-1.pdf', 'pdf', 'uploads/pdf/66febf46cd89f_นอมอล-1.pdf', NULL),
(17, '66febf46cd912_f784618f-a71d-4b14-9587-1350558938e7.mp4', 'video', 'uploads/videos/66febf46cd912_f784618f-a71d-4b14-9587-1350558938e7.mp4', NULL),
(18, '66febf630a1c3_Screenshot 2024-07-30 143431.png', 'image', 'uploads/images/66febf630a1c3_Screenshot 2024-07-30 143431.png', NULL),
(19, '66febf630a25a_นอมอล-1.pdf', 'pdf', 'uploads/pdf/66febf630a25a_นอมอล-1.pdf', NULL),
(20, '66febf630a2bd_f784618f-a71d-4b14-9587-1350558938e7.mp4', 'video', 'uploads/videos/66febf630a2bd_f784618f-a71d-4b14-9587-1350558938e7.mp4', NULL),
(21, '66fec1d4dc5d2_24432.jpg', 'image', 'uploads/images/66fec1d4dc5d2_24432.jpg', NULL),
(22, '66fec1d4dc67c_เป2.pdf', 'pdf', 'uploads/pdf/66fec1d4dc67c_เป2.pdf', NULL),
(23, '66fec1d4dc6db_f784618f-a71d-4b14-9587-1350558938e7.mp4', 'video', 'uploads/videos/66fec1d4dc6db_f784618f-a71d-4b14-9587-1350558938e7.mp4', NULL),
(29, '66fec9c9b9fbb_เป2.pdf', 'pdf', 'uploads/pdf/66fec9c9b9fbb_เป2.pdf', NULL),
(31, '66fecc7809b0c_Screenshot 2024-07-30 143431.png', 'image', 'uploads/images/66fecc7809b0c_Screenshot 2024-07-30 143431.png', NULL),
(32, '66fecc7809bbe_64101587 เกียรติศักดิ์์.pdf', 'pdf', 'uploads/pdf/66fecc7809bbe_64101587 เกียรติศักดิ์์.pdf', NULL),
(33, '66fecc7809c1b_45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', 'video', 'uploads/videos/66fecc7809c1b_45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', NULL),
(34, '66fecd12a0fab_Screenshot 2024-07-30 143431.png', 'image', 'uploads/images/66fecd12a0fab_Screenshot 2024-07-30 143431.png', NULL),
(35, '66fecd12a105d_เป1.pdf', 'pdf', 'uploads/pdf/66fecd12a105d_เป1.pdf', NULL),
(36, '66fecd12a10be_f784618f-a71d-4b14-9587-1350558938e7.mp4', 'video', 'uploads/videos/66fecd12a10be_f784618f-a71d-4b14-9587-1350558938e7.mp4', NULL),
(37, 'ใบลา เทม.pdf', 'pdf', 'D:/XAMPP/htdocs/P2/HOME/uploads/pdf/ใบลา เทม.pdf', NULL),
(38, '45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', 'video', 'D:/XAMPP/htdocs/P2/HOME/uploads/videos/45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', NULL),
(39, 'Screenshot 2024-07-30 143431.png', 'image', 'D:/XAMPP/htdocs/P2/HOME/uploads/images/Screenshot 2024-07-30 143431.png', NULL),
(40, '66ffa69f5cf48_24432.jpg', 'image', 'uploads/images/66ffa69f5cf48_24432.jpg', NULL),
(41, '66ffa69f5cfec_24469.jpg', 'image', 'uploads/images/66ffa69f5cfec_24469.jpg', NULL),
(42, '66ffa69f5d041_26377.jpg', 'image', 'uploads/images/66ffa69f5d041_26377.jpg', NULL),
(43, '66ffa69f5d089_26381.jpg', 'image', 'uploads/images/66ffa69f5d089_26381.jpg', NULL),
(44, '66ffa69f5d115_26384.jpg', 'image', 'uploads/images/66ffa69f5d115_26384.jpg', NULL),
(45, '66ffa69f5d18a_ใบลา - Copy.pdf', 'pdf', 'uploads/pdf/66ffa69f5d18a_ใบลา - Copy.pdf', NULL),
(46, '66ffa69f5d1e1_45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', 'video', 'uploads/videos/66ffa69f5d1e1_45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', NULL),
(48, '45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', 'video', 'D:/XAMPP/htdocs/P2/HOME/uploads/videos/45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', NULL),
(49, 'Screenshot 2024-07-30 143431.png', 'image', 'D:/XAMPP/htdocs/P2/HOME/uploads/images/Screenshot 2024-07-30 143431.png', NULL),
(55, 'ใบลาป่วย  ลากิจส่วนตัว ลาคลอดบุตร   (เทม).docx', 'pdf', 'D:/XAMPP/htdocs/P2/HOME/uploads/pdf/ใบลาป่วย  ลากิจส่วนตัว ลาคลอดบุตร   (เทม).docx', NULL),
(56, 'f784618f-a71d-4b14-9587-1350558938e7.mp4', 'video', 'D:/XAMPP/htdocs/P2/HOME/uploads/videos/f784618f-a71d-4b14-9587-1350558938e7.mp4', NULL),
(57, 'Screenshot 2024-07-30 143431.png', 'image', 'D:/XAMPP/htdocs/P2/HOME/uploads/images/Screenshot 2024-07-30 143431.png', NULL),
(58, '670940937c814_Screenshot 2024-07-30 143431.png', 'image', 'uploads/images/670940937c814_Screenshot 2024-07-30 143431.png', NULL),
(59, '670940937c96b_เป2.pdf', 'pdf', 'uploads/pdf/670940937c96b_เป2.pdf', NULL),
(60, '670940937c9d3_45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', 'video', 'uploads/videos/670940937c9d3_45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', NULL),
(61, '670949f80bd8e_Screenshot 2024-07-30 143431.png', 'image', 'uploads/images/670949f80bd8e_Screenshot 2024-07-30 143431.png', NULL),
(62, '670949f80be33_เป2.pdf', 'pdf', 'uploads/pdf/670949f80be33_เป2.pdf', NULL),
(63, '670949f80be8e_45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', 'video', 'uploads/videos/670949f80be8e_45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', NULL),
(64, '67094c6e49643_Screenshot 2024-07-30 143431.png', 'image', 'uploads/images/67094c6e49643_Screenshot 2024-07-30 143431.png', NULL),
(65, '67094c6e4971b_นอมอล-1.pdf', 'pdf', 'uploads/pdf/67094c6e4971b_นอมอล-1.pdf', NULL),
(66, '67094c6e49780_f784618f-a71d-4b14-9587-1350558938e7.mp4', 'video', 'uploads/videos/67094c6e49780_f784618f-a71d-4b14-9587-1350558938e7.mp4', NULL),
(67, '67094e0a90c93_Screenshot 2024-07-30 143431.png', 'image', 'uploads/images/67094e0a90c93_Screenshot 2024-07-30 143431.png', NULL),
(68, '67094e0a90d38_นอมอล-1.pdf', 'pdf', 'uploads/pdf/67094e0a90d38_นอมอล-1.pdf', NULL),
(69, '67094e0a90d99_45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', 'video', 'uploads/videos/67094e0a90d99_45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', NULL),
(72, '67095360cc871_45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', 'video', 'uploads/videos/67095360cc871_45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', NULL),
(81, 'การทำงานเก่า  ----  ใหม่.drawio', 'pdf', 'D:/XAMPP/htdocs/P2/HOME/uploads/pdf/การทำงานเก่า  ----  ใหม่.drawio', NULL),
(84, 'Screenshot 2024-07-30 143431.png', 'image', 'D:/XAMPP/htdocs/P2/HOME/uploads/images/Screenshot 2024-07-30 143431.png', NULL),
(85, '24469.jpg', 'image', 'D:/XAMPP/htdocs/P2/HOME/uploads/images/24469.jpg', NULL),
(86, '670e36ad0bbdf_Screenshot 2024-07-30 143431.png', 'image', 'uploads/images/670e36ad0bbdf_Screenshot 2024-07-30 143431.png', NULL),
(87, '670e36ad0bc98_ทด.png', 'image', 'uploads/images/670e36ad0bc98_ทด.png', NULL),
(88, '670e36ad0bcfc_เป2 (1).pdf', 'pdf', 'uploads/pdf/670e36ad0bcfc_เป2 (1).pdf', NULL),
(89, '670e36ad0bd54_45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', 'video', 'uploads/videos/670e36ad0bd54_45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', NULL),
(90, '24432.jpg', 'image', 'D:/XAMPP/htdocs/P2/HOME/uploads/images/24432.jpg', NULL),
(91, '67106af1b3b9e_Screenshot 2024-07-30 143431.png', 'image', 'uploads/images/67106af1b3b9e_Screenshot 2024-07-30 143431.png', NULL),
(92, '67106af1b3e47_นอมอล-1.pdf', 'pdf', 'uploads/pdf/67106af1b3e47_นอมอล-1.pdf', NULL),
(93, '67106af1b3f47_45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', 'video', 'uploads/videos/67106af1b3f47_45a88d2d-c931-4554-9c74-ade634cd7a1a.mp4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `article_media`
--
ALTER TABLE `article_media`
  ADD PRIMARY KEY (`article_id`,`media_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `article_tag`
--
ALTER TABLE `article_tag`
  ADD PRIMARY KEY (`article_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `admin` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `article_media`
--
ALTER TABLE `article_media`
  ADD CONSTRAINT `article_media_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_media_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `article_tag`
--
ALTER TABLE `article_tag`
  ADD CONSTRAINT `article_tag_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
