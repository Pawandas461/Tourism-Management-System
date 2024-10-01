-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2024 at 03:23 PM
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
-- Database: `bs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(4) NOT NULL,
  `a_username` varchar(30) NOT NULL,
  `a_password` varchar(30) NOT NULL,
  `admin_logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `a_username`, `a_password`, `admin_logo`) VALUES
(1, 'pawan', '123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_detail`
--

CREATE TABLE `booking_detail` (
  `DETAIL_ID` int(11) NOT NULL,
  `BOOK_ID` int(11) DEFAULT NULL,
  `PERSON_NAME` varchar(255) DEFAULT NULL,
  `PERSON_AGE` int(11) DEFAULT NULL,
  `PERSON_GENDER` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_detail`
--

INSERT INTO `booking_detail` (`DETAIL_ID`, `BOOK_ID`, `PERSON_NAME`, `PERSON_AGE`, `PERSON_GENDER`) VALUES
(1, 49, 'Pawan Das', 21, 'Male'),
(2, 49, 'Tufan Das', 22, 'Male'),
(3, 49, 'Suchitra Das', 41, 'Female'),
(4, 49, 'Biren Das', 45, 'Male'),
(5, 50, 'ABHISHEK Roy', 25, 'Male'),
(6, 50, 'ABHISHEK Das', 24, 'Male'),
(7, 50, 'Subham Ror', 21, 'Male'),
(8, 50, 'Choto bhai', 9, 'Male'),
(9, 50, 'choto bon', 7, 'Male'),
(10, 51, 'ABHISHEK Roy', 25, 'Male'),
(11, 51, 'ABHISHEK Das', 24, 'Male'),
(12, 51, 'Subham Ror', 21, 'Male'),
(13, 51, 'Choto bhai', 9, 'Male'),
(14, 51, 'choto bon', 7, 'Male'),
(15, 52, 'ABHISHEK Roy', 25, 'Male'),
(16, 52, 'ABHISHEK Das', 24, 'Male'),
(17, 52, 'Subham Ror', 21, 'Male'),
(18, 52, 'Choto bhai', 9, 'Male'),
(19, 52, 'choto bon', 7, 'Male'),
(20, 53, 'ABHISHEK Roy', 25, 'Male'),
(21, 53, 'ABHISHEK Das', 24, 'Male'),
(22, 53, 'Subham Ror', 21, 'Male'),
(23, 53, 'Choto bhai', 9, 'Male'),
(24, 53, 'choto bon', 7, 'Male'),
(25, 54, 'Holi', 3, 'Female'),
(26, 54, 'whiteman', 55, 'Male'),
(27, 54, 'jorg', 10, 'Male'),
(28, 54, 'shelly', 45, 'Female'),
(29, 55, 'Ajit', 23, 'Male'),
(30, 55, 'Taposh', 34, 'Male'),
(31, 55, 'shila', 21, 'Female'),
(32, 55, 'shima', 10, 'Female'),
(33, 56, 'Hori', 22, 'Male'),
(34, 56, 'Radha', 21, 'Female'),
(35, 56, 'shiba', 1, 'Male'),
(36, 56, 'gouri', 3, 'Female'),
(37, 57, 'toto', 10, 'Female'),
(38, 57, 'auto', 20, 'Male'),
(39, 57, 'maruti', 25, 'Female'),
(40, 57, 'alto', 35, 'Male'),
(41, 57, 'cng', 5, 'Male'),
(42, 58, 'yogi', 20, 'Male'),
(43, 58, 'modi', 23, 'Male'),
(44, 58, 'mamta', 12, 'Female'),
(45, 58, 'amit', 13, 'Male'),
(46, 59, 'Bikash Das', 22, 'Male'),
(47, 59, 'Rajib Das', 22, 'Male'),
(48, 59, 'Rahul Das', 22, 'Male'),
(49, 59, 'Prity Das', 21, 'Male'),
(50, 59, 'Dona Das', 16, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `co_package`
--

CREATE TABLE `co_package` (
  `CP_ID` int(6) NOT NULL,
  `PL_LOCATION` varchar(50) NOT NULL,
  `P_NAME` varchar(40) NOT NULL,
  `PL_NAME` varchar(50) NOT NULL,
  `PL_ADDRESS` varchar(100) NOT NULL,
  `P_COST` int(10) NOT NULL,
  `DURATION` int(5) NOT NULL,
  `TOURIST_NUMBER` int(4) NOT NULL,
  `TOTAL_SEAT` int(3) NOT NULL,
  `AVL_SEAT` int(3) NOT NULL,
  `P_DETAILS` int(2) NOT NULL,
  `VEHICLE` int(6) NOT NULL,
  `HOTEL` int(3) NOT NULL,
  `RESTAURANT` text NOT NULL,
  `P_TYPE` varchar(20) NOT NULL,
  `TOUR_GUID_NAME` varchar(50) NOT NULL,
  `PL_IMAGE` varchar(255) DEFAULT NULL,
  `P_DATE` date NOT NULL,
  `STATUS` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `co_package`
--

INSERT INTO `co_package` (`CP_ID`, `PL_LOCATION`, `P_NAME`, `PL_NAME`, `PL_ADDRESS`, `P_COST`, `DURATION`, `TOURIST_NUMBER`, `TOTAL_SEAT`, `AVL_SEAT`, `P_DETAILS`, `VEHICLE`, `HOTEL`, `RESTAURANT`, `P_TYPE`, `TOUR_GUID_NAME`, `PL_IMAGE`, `P_DATE`, `STATUS`) VALUES
(43, 'Mirik', 'Mirik Tour', 'Mirik', 'Mirik, West Bengal, 435452', 60000, 5, 5, 30, 22, 1, 1, 1, 'Mirik Restaurant', 'Mountain View', 'Subham Roy', '15.jpg', '2024-02-07', 1),
(44, 'Madarihat', 'Forest Tour', 'Jaldapara National Park', 'Madarihat, Alipurduar, 735220', 50000, 4, 4, 30, 24, 1, 1, 1, 'MYSTIC FOOD', 'Jungle Adventure', 'Rajib Das', 'jaldapara2.jpg', '2024-08-25', 1),
(45, 'Kerela', 'South India Tour', 'Kerela', 'South India, Kerela, River view, 834723', 60000, 4, 3, 30, 30, 1, 1, 1, 'Paragon', 'Sea Side', 'Amban', 'carousel-1.jpg', '2024-09-27', 1),
(46, 'Delhi', 'Delhi Tour with Us ', 'Taj Mahal', 'Delhi, main town, big city,', 78000, 4, 3, 20, 20, 1, 1, 1, 'The GT Road', 'Historical Place', 'Apu Karmakar', 'about-1.jpg', '2024-10-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `H_ID` int(6) NOT NULL,
  `H_NAME` varchar(100) NOT NULL,
  `H_LOCATION` varchar(20) NOT NULL,
  `H_ADDR` varchar(100) NOT NULL,
  `H_CONTACT` varchar(15) NOT NULL,
  `H_DESCR` varchar(255) NOT NULL,
  `TOTAL_ROOMS` int(6) NOT NULL,
  `AVL_ROOMS` int(6) NOT NULL,
  `ROOM_RENT` int(10) NOT NULL,
  `H_IMAGE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`H_ID`, `H_NAME`, `H_LOCATION`, `H_ADDR`, `H_CONTACT`, `H_DESCR`, `TOTAL_ROOMS`, `AVL_ROOMS`, `ROOM_RENT`, `H_IMAGE`) VALUES
(6, 'Hotel Mirik', 'Mirik', 'Mirik, west bengal , 647382', '627291223', 'Indulge in pure bliss at our luxurious spa, where a menu of rejuvenating treatments awaits. From soothing massages to invigorating facials, our skilled therapists will pamper you from head to toe, leaving you feeling refreshed and revitalized.', 15, 10, 3000, NULL),
(17, 'Royal Heritage', 'Mirik', 'Mirik, west bengal , 647382', '9755645343', 'Indulge in pure bliss at our luxurious spa, where a menu of rejuvenating treatments awaits. From soothing massages to invigorating facials, our skilled therapists will pamper you from head to toe, leaving you feeling refreshed and revitalized.', 12, 12, 3000, 'about-2.jpg'),
(18, 'Aavesham', 'Kerela', 'Kerela city, address 1, sea side, 877343', '9373231234', 'Set within 15 km of Kochi Biennale and 5.6 km of Cochin Shipyard, Cochin Legacy offers rooms with air conditioning and a private bathroom in Cochin. This 3-star hotel offers room service, an ATM and free WiFi. The hotel has an indoor pool, outdoor pool an', 30, 30, 3000, 'ShayamBhaban.jpg'),
(19, 'Radisson blue plaza Delhi', 'Delhi', 'Delhi, Big market, LallKila', '6473843232', 'The hotel is located next to India’s busiest international airport. The Airport Express metro line is just walking distance from the hotel, leading you to VFS Visa Centre in 20min.', 20, 20, 3499, 'radisson-blu-plaza-delhi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE `keyword` (
  `keyword_id` int(11) NOT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `CP_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keyword`
--

INSERT INTO `keyword` (`keyword_id`, `keyword`, `CP_ID`) VALUES
(10, 'mirik ,  siliguri , mountain , hill , Mirik , Siliguri , Mountain , Hill ', 43);

-- --------------------------------------------------------

--
-- Table structure for table `package_booking`
--

CREATE TABLE `package_booking` (
  `BOOK_ID` int(11) NOT NULL,
  `CP_ID` int(11) DEFAULT NULL,
  `BOOK_EMAIL` varchar(255) NOT NULL,
  `BOOK_PHONE` varchar(20) NOT NULL,
  `ADULT_COUNT` int(11) NOT NULL,
  `CHILD_COUNT` int(11) NOT NULL,
  `TOUR_DATE` date NOT NULL,
  `BOOKING_STATUS` int(11) NOT NULL,
  `BOOKING_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_booking`
--

INSERT INTO `package_booking` (`BOOK_ID`, `CP_ID`, `BOOK_EMAIL`, `BOOK_PHONE`, `ADULT_COUNT`, `CHILD_COUNT`, `TOUR_DATE`, `BOOKING_STATUS`, `BOOKING_DATE`) VALUES
(47, 43, 'daspawan53785@gmail.com', '7478991407', 3, 2, '2024-02-07', 0, '2024-07-07'),
(48, 44, 'das723240@gmail.com', '7236266723', 2, 2, '2024-08-25', 0, '2024-07-07'),
(49, 44, 'daspawan53785@gmail.com', '7478991407', 2, 2, '2024-08-25', 0, '2024-07-13'),
(50, 43, 'daspawan53785@gmail.com', '7706366266', 3, 2, '2024-02-07', 0, '2024-07-22'),
(51, 43, 'daspawan53785@gmail.com', '7706366266', 3, 2, '2024-02-07', 0, '2024-07-22'),
(52, 43, 'daspawan53785@gmail.com', '7706366266', 3, 2, '2024-02-07', 0, '2024-07-22'),
(53, 43, 'daspawan53785@gmail.com', '7706366266', 3, 2, '2024-02-07', 0, '2024-07-22'),
(54, 44, 'daspawan53785@gmail.com', '4545342322', 2, 2, '2024-08-25', 0, '2024-07-22'),
(55, 44, 'daspawan53785@gmail.com', '08890163682', 2, 2, '2024-08-25', 0, '2024-07-22'),
(56, 44, 'dtufan38@gmail.com', '7564423232', 2, 2, '2024-08-25', 0, '2024-07-22'),
(57, 43, 'dtufan38@gmail.com', '7654423232', 3, 2, '2024-02-07', 0, '2024-07-22'),
(58, 44, 'dtufan38@gmail.com', '8765453453', 2, 2, '2024-08-25', 0, '2024-07-22'),
(59, 43, 'daspawan53785@gmail.com', '7564342432', 4, 1, '2024-02-07', 0, '2024-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `package_details`
--

CREATE TABLE `package_details` (
  `PD_ID` int(11) NOT NULL,
  `CP_ID` int(11) DEFAULT NULL,
  `DURATION` int(11) DEFAULT NULL,
  `DAY1` text DEFAULT NULL,
  `DAY2` text DEFAULT NULL,
  `DAY3` text DEFAULT NULL,
  `DAY4` text DEFAULT NULL,
  `DAY5` text DEFAULT NULL,
  `DAY6` text DEFAULT NULL,
  `DAY7` text DEFAULT NULL,
  `DAY8` text DEFAULT NULL,
  `P_DESCR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_details`
--

INSERT INTO `package_details` (`PD_ID`, `CP_ID`, `DURATION`, `DAY1`, `DAY2`, `DAY3`, `DAY4`, `DAY5`, `DAY6`, `DAY7`, `DAY8`, `P_DESCR`) VALUES
(39, 43, 5, 'Guided Hiking Tours: Explore scenic trails with a knowledgeable guide who can provide insights on the local flora, fauna, and history of the area.', 'Mountain Biking Excursions: Enjoy thrilling rides through rugged terrain and breathtaking landscapes while experiencing the adrenaline rush of mountain biking.', 'Scenic Gondola Rides: Take a leisurely gondola ride to enjoy panoramic views of the mountains and surrounding valleys, providing a peaceful and relaxing experience.', 'Rock Climbing Adventures: Challenge yourself with rock climbing excursions suitable for all skill levels, led by experienced guides who prioritize safety and instruction.\r\n\r\n', 'Campfire Dinners: Unwind after a day of exploring by cozying up around a campfire, enjoying a delicious outdoor dinner under the stars while sharing stories and connecting with fellow travelers.', NULL, NULL, NULL, 'Escape to the serene hills of Mirik, nestled in the picturesque landscape of West Bengal. This 5-day tour package offers a perfect blend of natural beauty, cultural experiences, and relaxation.'),
(40, 44, 4, 'Arrive at Jaldapara and check into your comfortable jungle lodge.\r\nEvening nature walk to acquaint yourself with the surroundings.', 'Early morning jeep safari through Jaldapara National Park.\r\nSpot the famous one-horned rhinoceros, elephants, and diverse bird species.\r\nAfternoon visit to the vibrant Toto Para tribal village.', 'Enjoy an exciting elephant safari for a closer view of wildlife.\r\nVisit the nearby Chilapata Forest for a guided tour.\r\nEvening relaxation by the campfire with local folklore and stories.', 'Morning bird-watching session.\r\nCheck-out and departure with cherished memories of the wild.', NULL, NULL, NULL, NULL, 'Book your Jaldapara jungle safari now and immerse yourself in the untamed beauty of West Bengals wilderness!'),
(41, 45, 4, 'Arrival: Arrive at Kochi International Airport or Ernakulam Railway Station, where you will be greeted by our representative.\r\nTransfer to .\r\nMunnar: Enjoy a scenic drive to Munnar, a hill station known for its tea plantations, rolling hills, and pleasant climate.', 'Breakfast: Enjoy a hearty breakfast at the hotel.\r\nEravikulam National Park: Visit this park, home to the endangered Nilgiri Tahr and famous for its breathtaking views and rich biodiversity.\r\nMattupetty Dam: Explore this picturesque dam and enjoy boating on the serene waters.\r\nEcho Point: Experience the natural echo phenomenon at this popular spot.\r\nKundala Lake: Enjoy a peaceful boat ride on this beautiful lake.\r\nTea Plantations: Take a guided tour of the expansive tea plantations and learn about the tea-making process.\r\nOvernight Stay: Stay at a hotel in Munnar.', 'Breakfast: Have breakfast at the hotel.\r\nTransfer to Alleppey: Drive to Alleppey, known for its tranquil backwaters and houseboat cruises.\r\nHouseboat Cruise: Check-in to a traditional houseboat and embark on a serene cruise through the backwaters. Enjoy the stunning scenery, palm-fringed canals, and glimpses of local life.\r\nLunch and Dinner: Enjoy delicious meals prepared on board using fresh local ingredients.\r\nOvernight Stay: Stay on the houseboat in Alleppey.', 'Breakfast: Enjoy breakfast on the houseboat.\r\nDisembark: Check-out from the houseboat and transfer to Kochi.\r\nKochi Sightseeing: Explore the vibrant city of Kochi. Visit Fort Kochi, St. Francis Church, Chinese Fishing Nets, Mattancherry Palace, and the Jewish Synagogue.\r\nShopping: Spend some time shopping for souvenirs and spices in the local markets.\r\nDeparture: Transfer to Kochi International Airport or Ernakulam Railway Station for your onward journey.', NULL, NULL, NULL, NULL, 'Experience the serene beauty and rich culture of Kerala with this 4-day tour. Start with the lush tea gardens and scenic vistas of Munnar, then drift through the tranquil backwaters of Alleppey on a traditional houseboat, and conclude with a vibrant city '),
(42, 46, 4, ' Arrival in Delhi\r\nArrive in Delhi and check into your comfortable hotel.\r\nEvening at leisure to explore local markets and cuisine.', 'Red Fort and Old Delhi\r\n\r\nMorning visit to the iconic Red Fort, a UNESCO World Heritage Site.\r\nExplore the bustling lanes of Chandni Chowk and visit Jama Masjid.\r\nEnjoy a rickshaw ride through the vibrant streets of Old Delhi.', 'India Gate and New Delhi\r\n\r\nMorning visit to India Gate, a war memorial and prominent landmark.\r\nDrive past Rashtrapati Bhavan and Parliament House.\r\nExplore the serene Lodhi Gardens and Humayuns Tomb.', ' Taj Mahal Excursion\r\n\r\nEarly morning drive to Agra for a day trip to the Taj Mahal, one of the Seven Wonders of the World.\r\nExplore the majestic beauty and history of the Taj Mahal.\r\nReturn to Delhi in the evening for departure.', NULL, NULL, NULL, NULL, 'Book your Delhi historical tour package now and immerse yourself in the timeless splendor of Indias capital');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `PL_ID` int(6) NOT NULL,
  `PL_NAME` varchar(50) NOT NULL,
  `PL_LOCATION` varchar(100) NOT NULL,
  `PL_ADDR` varchar(100) NOT NULL,
  `ATRACTIONS` varchar(100) NOT NULL,
  `SIGHT_SEEING` varchar(100) NOT NULL,
  `PL_DESCR` text NOT NULL,
  `PL_DETAILS` int(6) NOT NULL DEFAULT 0,
  `PL_IMAGE1` varchar(255) DEFAULT NULL,
  `PL_IMAGE2` varchar(255) DEFAULT NULL,
  `PL_IMAGE3` varchar(255) DEFAULT NULL,
  `PL_IMAGE4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`PL_ID`, `PL_NAME`, `PL_LOCATION`, `PL_ADDR`, `ATRACTIONS`, `SIGHT_SEEING`, `PL_DESCR`, `PL_DETAILS`, `PL_IMAGE1`, `PL_IMAGE2`, `PL_IMAGE3`, `PL_IMAGE4`) VALUES
(21, 'Mirik', 'Mirik', 'Mirik, West Bengal, 435452', 'Lake', '1 Lake, 1 pine Forest', 'Mirik is a small town and a Notified Area of Darjeeling district in the state of West Bengal, India. It is the headquarters of the Mirik subdivision. The name Mirik comes from the Lepcha words Mir-Yok meaning \"place burnt by fire\".', 1, 'Mirik1.jpg', 'Mrik2.jpg', 'Mirik3.jpg', 'Mirik4.jpg'),
(33, 'Jaldapara National Park', 'Madarihat', 'Madarihat, Alipurduar, 735220', 'Forest ', '5 Sights', 'Jaldapara National Park is a national park situated at the foothills of the Eastern Himalayas in Alipurduar District of northern West Bengal, India, and on the banks of the Torsa River. ', 1, 'jaldapara3.jpg', '16.jpg', '19.jpg', 'fairypools.jpg'),
(34, 'Kerela', 'Kerela', 'South India, Kerela, River view, 834723', 'River, Sea, Beach', '5 River, Sea side, Beaches, City view', 'Kerala, a state on Indias tropical Malabar Coast, has nearly 600km of Arabian Sea shoreline. Its known for its palm-lined beaches and backwaters, a network of canals. Inland are the Western Ghats, mountains whose slopes support tea, coffee and spice plantations as well as wildlife.', 1, 'place.jpg', 'fairypools.jpg', 'package-2.jpg', 'blog-3.jpg'),
(35, 'Taj Mahal', 'Delhi', 'Delhi, main town, big city,', 'Tajmahal, historical place', 'India Gate, Red Fort, Lotus temple', 'The Taj Mahal is an ivory-white marble mausoleum on the right bank of the river Yamuna in Agra, Uttar Pradesh, India. It was commissioned in 1631 by the fifth Mughal emperor, Shah Jahan to house the tomb of his beloved wife, Mumtaz Mahal.', 1, 'about-1.jpg', 'tg.jpg', 'tg2.jpg', 'hq720.jpg'),
(36, 'Goa', 'Goa', 'Goa, Sea Beach, Ocean ', 'Sea beach', 'Sea beach, water park, Fishing', 'Goa, a coastal paradise in India, offers stunning beaches, vibrant nightlife, water sports, and rich cultural heritage. Experience sun-soaked sands, thrilling adventures, lively parties, and historic sites in this tropical haven.', 1, 'package-6.jpg', 'package-5.jpg', 'carousel-2.jpg', 'package-4.jpg'),
(37, 'Darjeeling', 'Darjeeling', 'Darjeeling, West Bengal, 730037', 'Hills and Tea Garden', 'Mountains, rivers , hills, view points', 'Darjeeling offers stunning mountain views of Kanchenjunga and lush tea gardens. Explore verdant estates and experience the serene beauty and rich culture of this charming hill station.', 0, 'blog-2.jpg', 'Darjeeling2.jpg', 'Darjeeling3.jpg', 'Darjeeling.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `place_details`
--

CREATE TABLE `place_details` (
  `PDES_ID` int(11) NOT NULL,
  `PL_ID` int(11) DEFAULT NULL,
  `DESCRIPTION_1` text DEFAULT NULL,
  `DESCRIPTION_2` text DEFAULT NULL,
  `DESCRIPTION_3` text DEFAULT NULL,
  `HEADING_1` varchar(255) DEFAULT NULL,
  `HEADING_2` varchar(255) DEFAULT NULL,
  `HEADING_3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `place_details`
--

INSERT INTO `place_details` (`PDES_ID`, `PL_ID`, `DESCRIPTION_1`, `DESCRIPTION_2`, `DESCRIPTION_3`, `HEADING_1`, `HEADING_2`, `HEADING_3`) VALUES
(1, 33, 'This town is situated on the outskirts of Jaldapara National Park, which is famous for being home of Indian rhinoceros. This is one of the main tourist spots in North Bengal, surrounded by tea gardens, forests, hills, and small rivers, and also having highly diverse population.', 'Surrounded with thick mixed forest, the journey towards the Madarihat is an unforgettable experience which is filled with the astounding view of changing landscape. Traveling through the paddy fields, lush tea garden while crossing the iconic Coronation Bridge to reach Madarihat which offers the panoramic vista of emerald blue river Teesta meandering through the lofty mountain hill is a visual treat from the tourist. Sited at the vicinity of the Jaldapara National Park, Madarihat with its lodging facility has become the base for many adventurer and tourist who want to explore the vast grassland and riverine forest of Jaldapara National Park. ', 'Dooars region experiences a heavy rainfall during rainy season so the best time to visit Madarihat to relish the pristine beauty of Dooars region is the post monsoon season from October to May when the weather remain soothing. It is best to avoid the rainy season since the forest area of Dooars remain close from mid July to mid September.', 'Indian rhinoceros', 'Tourist Places to visit in Madarihat', 'Best Time to Visit Madarihat'),
(2, 21, 'It has become a popular tourist destination due to its pleasant climate, natural beauty, and easy accessibility. Sumendu Lake is the centerstage of attraction of Mirik, which is surrounded by a garden on one side and pine trees on the other side with an arching footbridge called Indreni Pull linking both the sides.', 'It is a picturesque natural water body that serves as a popular tourist destination. Also known as Sumendu Lake, it is surrounded by lush green forests and offers breathtaking views of the surrounding Himalayan peaks, making it a tranquil retreat for nature lovers and adventure enthusiasts alike.', 'Mirik is a small town and a Notified Area of Darjeeling district in the state of West Bengal, India. It is the headquarters of the Mirik subdivision.Mirik is a small town and a Notified Area of Darjeeling district in the state of West Bengal, India. It is the headquarters of the Mirik subdivision.', 'The Valley of the Sun', 'Places To Visit In Mirik', 'How to Reach Mirik'),
(3, 34, 'Vembanad Lake is the longest backwater in Kerala, as well as the longest lake in India. The Kochi city, Kuttanad, Kumarakom, and Pathiramanal Island are located in this long backwater. The Vellayani Lake, the Pookode Lake, and the Sasthamcotta Lake are the freshwater lakes in Kerala.', 'Keralas landscape is adorned top to bottom by a plethora of beaches that cater to locals and visitors alike. The view on offer is magical and these draw in large crowds to simply relax by the shore or go for a soothing swim. There are numerous water activities and sports at these beaches for those seeking adventure.', 'There are 44 major rivers in Kerala, all but three originating in the Western Ghats. 41 of them flow westward and 3 eastward. The rivers of Kerala are small, in terms of length, breadth and water discharge. The rivers flow faster, owing to the hilly terrain and as the short distance between the Western Ghats and the sea. All the rivers are entirely monsoon-fed and many of them shrink into rivulets or dry up completely during summer.', 'Backwaters in kerala', 'Beaches in kerala', 'Rivers in kerala'),
(4, 35, 'The Taj Mahal is an ivory-white marble mausoleum on the right bank of the river Yamuna in Agra, Uttar Pradesh, India. It was commissioned in 1631 by the fifth Mughal emperor, Shah Jahan to house the tomb of his beloved wife, Mumtaz Mahal.', 'The India Gate (formerly known as All India War Memorial) is a war memorial located near the Kartavya path on the eastern edge of the ceremonial axis of New Delhi, formerly called Rajpath in New Delhi. It stands as a memorial to 74,187 soldiers of the Indian Army who died between 1914 and 1921 in the First World War, in France, Flanders, Mesopotamia, Persia, East Africa, Gallipoli and elsewhere in the Near and the Far East, and the Third Anglo-Afghan War', 'The Red Fort or Lal Qila is a historic fort in Delhi, India, that historically served as the main residence of the Mughal emperors. Emperor Shah Jahan commissioned construction of the Red Fort on 12 May 1639, when he decided to shift his capital from Agra to Delhi.', 'Taj Mahal', 'India Gate', 'Red Fort'),
(5, 36, 'Goas beaches, with their golden sands and crystal-clear waters, offer a perfect blend of relaxation and adventure. Enjoy sunbathing, water sports, beachside shacks, and vibrant nightlife. Each beach, from lively Baga to serene Palolem, provides a unique coastal experience.', 'Goas water parks provide thrilling fun for all ages with exciting slides, wave pools, and lazy rivers. Enjoy adrenaline-pumping rides at Splashdown Water Park or Aqua Water Park, perfect for families and groups. These parks offer a refreshing escape from the beach, complete with food courts, relaxation zones, and entertainment options, making them a must-visit for a fun-filled day in Goa.', 'Goa offers stunning seaside and mountain views. Its pristine beaches, like Calangute and Palolem, feature golden sands and azure waters, perfect for relaxation and water activities. The Western Ghats provide a picturesque backdrop with lush greenery, rolling hills, and scenic trekking routes, offering breathtaking panoramas and a serene escape from the bustling coast.\r\n\r\n', 'Goas Beaches ', 'Famous Water Parks', 'Awesome view points ');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `RES_ID` int(6) NOT NULL,
  `RES_NAME` text NOT NULL,
  `RES_LOCATION` varchar(30) NOT NULL,
  `RES_CATEGORY` text NOT NULL,
  `RES_CONTACT` varchar(15) NOT NULL,
  `RES_ADDR` text NOT NULL,
  `RES_DESCR` text NOT NULL,
  `RES_IMAGE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`RES_ID`, `RES_NAME`, `RES_LOCATION`, `RES_CATEGORY`, `RES_CONTACT`, `RES_ADDR`, `RES_DESCR`, `RES_IMAGE`) VALUES
(34, 'Mirik Restaurant', 'Mirik', 'Chinese', '7837623233', 'Mirik, kalimpong, darjeeling, 784323', 'Mirik Restaurant, nestled in the scenic town of Mirik, offers delicious local and international cuisines. Known for its cozy ambiance and stunning lake views, it\'s a perfect spot for a memorable dining experience.', 'blog-1.jpg'),
(36, 'MYSTIC FOOD', 'Madarihat', 'abc', '8776565345', 'Jaldapara, Madarihat, 784723', 'Mystic Food express: An initiative from the owners of The Mystic Hotels rated as finest boutique hotels with trip advisor certificate of excellence in all categories including food for consecutive 03 Years. This newly built restaurant and takeaway chain will meet and pamper your taste buds with authentic taste and hygienically prepared and served food with sanitized sitting area and kitchen Locations in Jaldapara, Kalimpong and Darjeeling', 'gorkhaRestaurant_Mirik.jpg'),
(37, 'Paragon', 'Kerela', 'Traditional Malabar food since 1939', '8847343743', 'Lulu mall, kochi, 747343', 'Iconic Malabar restaurant specialising in seafood specialties such as masala fried fish.', 'kerela_res.jpg'),
(38, 'The GT Road', 'Delhi', 'Vegetarian dishes', '7665345334', 'Delhi, India Gate, 8853423', 'The GT Road is a 2600 km gastronomical journey from Kabul to Chittagong. A rich geography that witnessed history like no other. A land seeped in traditions, culture, beliefs & rituals. It is our mission to bring back the lost recipes of an era gone by, the authentic organic spices & masalas to transport one back in time, using traditional cooking methods & secrets to retain the authentic taste & flavors.', 'restaurant.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ST_ID` int(6) NOT NULL,
  `ST_NAME` varchar(50) NOT NULL,
  `ST_AGE` int(3) NOT NULL,
  `ST_ADDR` varchar(100) NOT NULL,
  `ST_SALARY` int(10) NOT NULL,
  `ST_JOIN_DATE` date NOT NULL,
  `ST_CONTACT` varchar(15) NOT NULL,
  `ST_TYPE` varchar(50) NOT NULL,
  `ST_IMAGE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ST_ID`, `ST_NAME`, `ST_AGE`, `ST_ADDR`, `ST_SALARY`, `ST_JOIN_DATE`, `ST_CONTACT`, `ST_TYPE`, `ST_IMAGE`) VALUES
(4, 'Subham Roy', 21, 'Dinhata, West Bengal, 739321', 15000, '2024-05-29', '8954853434', 'tour guide', '1000055704.jpg'),
(6, 'Rajib Das', 22, 'Madarihat, Alipurduar, 735220', 18000, '2024-05-29', '9847673444', 'staff', 'pic.jpg'),
(7, 'Amban', 30, 'Kerela, Kochi, Lulu mall, 783473', 25000, '2024-07-29', '7564453434', 'tour guide', 'team-4.jpg'),
(8, 'Apu Karmakar', 22, 'Delhi, Kolakata, Hydrabad', 24000, '2024-08-02', '7756434332', 'staff', 'testimonial-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tag_hotels`
--

CREATE TABLE `tag_hotels` (
  `PH_ID` int(11) NOT NULL,
  `CP_ID` int(11) DEFAULT NULL,
  `H_NAME` varchar(255) DEFAULT NULL,
  `H_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tag_hotels`
--

INSERT INTO `tag_hotels` (`PH_ID`, `CP_ID`, `H_NAME`, `H_ID`) VALUES
(13, 43, 'Royal Heritage', 17),
(14, 44, 'Royal Heritage', 17),
(15, 45, 'Aavesham', 18),
(16, 46, 'Radisson blue plaza Delhi', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tag_transport`
--

CREATE TABLE `tag_transport` (
  `tran_id` int(11) NOT NULL,
  `CP_ID` int(11) DEFAULT NULL,
  `tran_name` varchar(255) DEFAULT NULL,
  `tran_number` varchar(255) DEFAULT NULL,
  `seat_tran1` int(11) DEFAULT NULL,
  `seat_tran2` int(11) DEFAULT NULL,
  `seat_tran3` int(11) DEFAULT NULL,
  `seat_tran4` int(11) DEFAULT NULL,
  `trip_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tag_transport`
--

INSERT INTO `tag_transport` (`tran_id`, `CP_ID`, `tran_name`, `tran_number`, `seat_tran1`, `seat_tran2`, `seat_tran3`, `seat_tran4`, `trip_date`) VALUES
(13, 43, 'Maruti suzuki', 'WB67S4673', NULL, NULL, NULL, NULL, NULL),
(14, 44, 'NBSTC', 'HJSd278', NULL, NULL, NULL, NULL, NULL),
(15, 45, 'Maruti suzuki', 'WB67D4733', NULL, NULL, NULL, NULL, NULL),
(16, 46, 'Wagner 750', 'WB63B9065', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `username`, `email`, `password`) VALUES
(22, 'Protap Barman ', 'yoyoprotap@gmail.com', 'yoyo'),
(55, 'Pawan', 'daspawan53785@gmail.com', '123'),
(57, 'Pawan', 'bishaldas461461@gmail.com', '123'),
(58, 'Akshay', 'das723240@gmail.com', '123'),
(59, 'Vishal das', 'vishal0902203@gmail.com', '123'),
(60, 'Tufan Das', '', '1245');

-- --------------------------------------------------------

--
-- Table structure for table `user_query`
--

CREATE TABLE `user_query` (
  `query_id` int(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_query`
--

INSERT INTO `user_query` (`query_id`, `username`, `email`, `subject`, `message`) VALUES
(1, 'Pawan', 'abhishekbadra096@gmail.com', 'Test Case 1', 'Message 1'),
(2, 'Pawan', 'abhishekbadra096@gmail.com', 'Test Case 1', 'Message 1'),
(3, 'Pawan', 'abhishekbadra096@gmail.com', 'Test Case 1', 'Message 1'),
(4, 'Pawan', 'abhishekbadra096@gmail.com', 'Test Case 2', 'Message 2'),
(5, 'Pawan', 'abhishekbadra096@gmail.com', 'Test Case 3', 'Message 3'),
(6, 'Pawan', 'abhishekbadra096@gmail.com', 'Test Case 4', 'Message 4 ');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `CAR_ID` int(6) NOT NULL,
  `CAR_NO` varchar(10) NOT NULL,
  `CAR_NAME` varchar(35) NOT NULL,
  `CAR_LOCATION` varchar(30) NOT NULL,
  `SEAT_NO` int(3) NOT NULL,
  `DRIVER_CONTACT` varchar(15) NOT NULL,
  `DRIVER_NAME` varchar(50) NOT NULL,
  `DRIVER_AGE` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`CAR_ID`, `CAR_NO`, `CAR_NAME`, `CAR_LOCATION`, `SEAT_NO`, `DRIVER_CONTACT`, `DRIVER_NAME`, `DRIVER_AGE`) VALUES
(1, 'WB73B9038', 'Bolero Pickup', 'Madarihat', 18, '6748367236', 'Taposh Das', 35),
(2, 'HJSd278', 'NBSTC', 'Jaldapara', 50, '7845435454', 'Exmaple Dvr.', 34),
(3, 'WB67D4733', 'NBSTC BUS', 'Falakata', 45, '7483436734', 'Rajib Das', 20),
(4, 'WB67J7483', 'TOYOTA', 'Siliguri', 20, '7489332344', 'Deep Das', 21),
(5, 'WB67S4673', 'Maruti suzuki', 'Mirik', 10, '7647348332', 'Akash Roy', 22),
(6, 'WB49H7483', 'Wagner 750', 'Madarihat', 6, '783473726', 'Dilip Karmakar', 45),
(7, 'WB78H8934', 'JEEPSE', 'Coochbehar', 100, '7539478387', 'Gopal Saha', 22),
(8, 'WB73B9933', 'Ponkhi raj', 'Rajasthan', 30, '9847344788', 'Tanmay das', 34),
(9, 'WB49H7483', 'TOYOTA', 'New Location ', 30, '0906564564', 'Partho', 20),
(10, 'WB67D4733', 'Maruti suzuki', 'Kerela', 30, '7485784532', 'Amit Das', 25),
(11, 'WB63B9065', 'Wagner 750', 'Delhi', 30, '8676565445', 'Sujan Das ', 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD PRIMARY KEY (`DETAIL_ID`),
  ADD KEY `BOOK_ID` (`BOOK_ID`);

--
-- Indexes for table `co_package`
--
ALTER TABLE `co_package`
  ADD PRIMARY KEY (`CP_ID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`H_ID`);

--
-- Indexes for table `keyword`
--
ALTER TABLE `keyword`
  ADD PRIMARY KEY (`keyword_id`),
  ADD KEY `CP_ID` (`CP_ID`);

--
-- Indexes for table `package_booking`
--
ALTER TABLE `package_booking`
  ADD PRIMARY KEY (`BOOK_ID`),
  ADD KEY `CP_ID` (`CP_ID`);

--
-- Indexes for table `package_details`
--
ALTER TABLE `package_details`
  ADD PRIMARY KEY (`PD_ID`),
  ADD KEY `CP_ID` (`CP_ID`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`PL_ID`);

--
-- Indexes for table `place_details`
--
ALTER TABLE `place_details`
  ADD PRIMARY KEY (`PDES_ID`),
  ADD KEY `PL_ID` (`PL_ID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`RES_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ST_ID`);

--
-- Indexes for table `tag_hotels`
--
ALTER TABLE `tag_hotels`
  ADD PRIMARY KEY (`PH_ID`),
  ADD KEY `CP_ID` (`CP_ID`),
  ADD KEY `H_ID` (`H_ID`);

--
-- Indexes for table `tag_transport`
--
ALTER TABLE `tag_transport`
  ADD PRIMARY KEY (`tran_id`),
  ADD KEY `CP_ID` (`CP_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user_query`
--
ALTER TABLE `user_query`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`CAR_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_detail`
--
ALTER TABLE `booking_detail`
  MODIFY `DETAIL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `co_package`
--
ALTER TABLE `co_package`
  MODIFY `CP_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `H_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `keyword`
--
ALTER TABLE `keyword`
  MODIFY `keyword_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `package_booking`
--
ALTER TABLE `package_booking`
  MODIFY `BOOK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `package_details`
--
ALTER TABLE `package_details`
  MODIFY `PD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `PL_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `place_details`
--
ALTER TABLE `place_details`
  MODIFY `PDES_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `RES_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ST_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tag_hotels`
--
ALTER TABLE `tag_hotels`
  MODIFY `PH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tag_transport`
--
ALTER TABLE `tag_transport`
  MODIFY `tran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user_query`
--
ALTER TABLE `user_query`
  MODIFY `query_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `CAR_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD CONSTRAINT `booking_detail_ibfk_1` FOREIGN KEY (`BOOK_ID`) REFERENCES `package_booking` (`BOOK_ID`);

--
-- Constraints for table `keyword`
--
ALTER TABLE `keyword`
  ADD CONSTRAINT `keyword_ibfk_1` FOREIGN KEY (`CP_ID`) REFERENCES `co_package` (`CP_ID`);

--
-- Constraints for table `package_booking`
--
ALTER TABLE `package_booking`
  ADD CONSTRAINT `package_booking_ibfk_1` FOREIGN KEY (`CP_ID`) REFERENCES `co_package` (`CP_ID`);

--
-- Constraints for table `package_details`
--
ALTER TABLE `package_details`
  ADD CONSTRAINT `package_details_ibfk_1` FOREIGN KEY (`CP_ID`) REFERENCES `co_package` (`CP_ID`);

--
-- Constraints for table `place_details`
--
ALTER TABLE `place_details`
  ADD CONSTRAINT `place_details_ibfk_1` FOREIGN KEY (`PL_ID`) REFERENCES `place` (`PL_ID`);

--
-- Constraints for table `tag_hotels`
--
ALTER TABLE `tag_hotels`
  ADD CONSTRAINT `tag_hotels_ibfk_1` FOREIGN KEY (`CP_ID`) REFERENCES `co_package` (`CP_ID`),
  ADD CONSTRAINT `tag_hotels_ibfk_2` FOREIGN KEY (`H_ID`) REFERENCES `hotel` (`H_ID`);

--
-- Constraints for table `tag_transport`
--
ALTER TABLE `tag_transport`
  ADD CONSTRAINT `tag_transport_ibfk_1` FOREIGN KEY (`CP_ID`) REFERENCES `co_package` (`CP_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
