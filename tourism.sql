-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2025 at 09:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(4, 'sai', '$2y$10$pgbp5W/ATNZruTkJd4KPGefYbDLXQ949FlclsiTZNeYjR0PkyHFaO');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Adventure_Places'),
(2, 'Devotional_Tourism'),
(3, 'Beach_Coastal_Tourism'),
(4, 'Cultural_Heritage_Tourism'),
(5, 'Nature_Wildlife_Tourism ');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `staying_options` text DEFAULT NULL,
  `website_link` varchar(255) DEFAULT NULL,
  `nearby_places` text DEFAULT NULL,
  `hotels` text DEFAULT NULL,
  `transport_options` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `state_id`, `category_id`, `name`, `description`, `image`, `location`, `staying_options`, `website_link`, `nearby_places`, `hotels`, `transport_options`) VALUES
(9, 1, 2, '🛕 Srisailam Mallikarjuna Temple', 'One of the 12 Jyotirlingas, dedicated to Lord Shiva.', 'ap.webp', 'Srisailam, Andhra Pradesh', '🏨 Nearby lodges & guest houses', 'https://srisailamonline.com', '🏞 Akkamahadevi Caves, 🌊 Srisailam Dam', '🏨 Haritha Hotel, 🏨 Ganga Sadan', '🚌 Buses from Hyderabad & Vijayawada 🚗'),
(10, 1, 2, '🛕 Simhachalam Temple', 'Temple of Lord Narasimha with unique deity structure.', 'uploads/simhachalam.jpg', 'Visakhapatnam, Andhra Pradesh', '🏨 Hotels in Visakhapatnam', 'https://simhachalamtemple.com', '🏖 RK Beach, 🌄 Kailasagiri', '🏨 Novotel, 🏨 The Gateway Hotel', '✈️ Visakhapatnam Airport, 🚆 Railway station, 🚖 Local taxis'),
(11, 1, 2, '🛕 Kanaka Durga Temple', 'Famous temple of Goddess Kanaka Durga on Indrakeeladri Hill.', 'uploads/kanakadurgatemple.jpg', 'Vijayawada, Andhra Pradesh', '🏨 Hotels near temple', 'https://kanakadurgatemple.org', '🌉 Prakasam Barrage, 🌄 Gandhi Hill', '🏨 Fortune Murali Park, 🏨 The Gateway Hotel', '🚆 Vijayawada Railway Station, 🚖 Local Autos & Buses'),
(12, 1, 2, '🛕 Lepakshi Temple', 'Ancient temple with hanging pillar, dedicated to Veerabhadra.', 'uploads/lepakshitemple.jpg', 'Anantapur, Andhra Pradesh', '🏨 Hotels & Lodges nearby', 'https://lepakshi-temple.com', '🐍 Nandi Statue, 🎭 Heritage Caves', '🏨 Haritha Hotel, 🏨 Sri Srinivasa Lodge', '🚆 Hindupur Railway Station, 🚖 Cabs & Buses'),
(13, 1, 2, '🛕 Ahobilam Temple', 'Sacred pilgrimage site of Lord Narasimha with nine shrines.', 'images.jpeg', 'Nandyal, Andhra Pradesh', '🏨 Dharmashalas & Lodges', 'https://ahobilamtemple.com', '🏞 Nallamala Forest, 🏰 Ugra Sthambham', '🏨 Ahobilam Cottages, 🏨 Local Guest Houses', '🚂 Nandyal Railway Station, 🚖 Jeeps to Ahobilam'),
(14, 1, 2, '🛕 Mangalagiri Panakala Narasimha Temple', 'Hill temple with self-draining Panakam (jaggery water).', 'uploads/mangalagiri.jpg', 'Guntur, Andhra Pradesh', '🏨 Nearby Lodges', 'https://mangalagiritemple.com', '🌉 Undavalli Caves, 🏛 Amaravati Stupa', '🏨 Taj Gateway Guntur, 🏨 Hotel Geetha Regency', '🚆 Guntur Railway Station, 🚖 Auto & Cabs'),
(15, 1, 2, '🛕 Sri Kalahasti Temple', 'Vayu Lingam shrine, part of Pancha Bhoota temples.', 'uploads/kalahasti.jpg', 'Chittoor, Andhra Pradesh', '🏨 Budget & Luxury Hotels', 'https://srikalahastitemple.com', '🛕 Tirupati Balaji, 🏰 Chandragiri Fort', '🏨 Hotel MGM Grand, 🏨 Hotel Bliss', '🚆 Sri Kalahasti Railway Station, 🚖 Cabs & Buses'),
(16, 1, 2, '🛕 Draksharamam Temple', 'One of the Pancharama Kshetras dedicated to Lord Shiva.', 'uploads/draksharamam.jpg', 'East Godavari, Andhra Pradesh', '🏨 Lodging available', 'https://draksharamamtemple.com', '🏞 Papi Hills, 🏖 Kakinada Beach', '🏨 Hotel Anand Regency, 🏨 Grand Kakinada', '🚆 Rajahmundry Railway Station, 🚗 Private Cars & Buses'),
(17, 1, 2, '🛕 Tirumala Venkateswara Temple', 'One of the richest and most visited temples in the world, dedicated to Lord Balaji.', 'uploads/tirupati.jpg', 'Tirupati, Andhra Pradesh', '🏨 Luxury & budget hotels available', 'https://www.tirumala.org', '🛕 Sri Kalahasti Temple, 🏰 Chandragiri Fort', '🏨 Taj Tirupati, 🏨 Fortune Select Grand Ridge', '🚆 Tirupati Railway Station, ✈️ Tirupati Airport, 🚖 Cabs & Buses'),
(18, 1, 2, '🛕 Kanipakam Vinayaka Temple', 'Ancient temple dedicated to Lord Ganesha, known for its self-manifested deity.', 'uploads/kanipakam.jpg', 'Chittoor, Andhra Pradesh', '🏨 Nearby guest houses & hotels', 'https://kanipakam.com', '🛕 Tirupati Temple, 🏞 Horsley Hills', '🏨 Haritha Hotel Kanipakam, 🏨 Grand Ridge', '🚆 Chittoor Railway Station, 🚖 Buses & Autos'),
(19, 1, 2, '🛕 Annavaram Satyanarayana Temple', 'Famous for Sri Satyanarayana Swamy Pooja.', 'images (1).jpeg', 'Annavaram, Andhra Pradesh', '🏨 Temple cottages available', 'https://annavaramdevasthanam.nic.in', '🏖 Kakinada Beach, 🌉 Dowleswaram Barrage', '🏨 Haritha Hotel, 🏨 Hotel Royal Park', '🚆 Annavaram Railway Station, 🚖 Autos & Buses'),
(20, 1, 2, '🛕 Yaganti Temple', 'Temple dedicated to Lord Shiva, known for its unique Nandi idol that is believed to grow in size.', 'uploads/yaganti.jpg', 'Kurnool, Andhra Pradesh', '🏨 Lodging available', 'https://yagantitemple.com', '⛰ Belum Caves, 🏞 Oravakallu Rock Garden', '🏨 Haritha Hotel, 🏨 Kurnool Residency', '🚆 Kurnool Railway Station, 🚖 Buses & Taxis'),
(21, 1, 2, '🛕 Mantralayam Raghavendra Swamy Temple', 'Sacred pilgrimage site of Guru Raghavendra Swamy.', 'uploads/mantralayam.jpg', 'Mantralayam, Andhra Pradesh', '🏨 Temple cottages & hotels', 'https://srsmatha.org', '🏞 Panchamukhi Anjaneya Temple, 🌊 Tungabhadra River', '🏨 Haritha Hotel, 🏨 Mantralaya Residency', '🚆 Mantralayam Road Railway Station, 🚖 Buses & Autos'),
(22, 1, 2, '🛕 Arasavalli Sun Temple', 'One of the few Sun God temples in India, dedicated to Lord Suryanarayana.', 'arasavilli-suryanarayana.jpg', 'Srikakulam, Andhra Pradesh', '🏨 Lodging & hotels nearby', 'https://arasavallitemple.com', '🏖 Kalingapatnam Beach, 🏞 Telineelapuram Bird Sanctuary', '🏨 Haritha Hotel, 🏨 Srikakulam Residency', '🚆 Srikakulam Railway Station, 🚖 Buses & Autos'),
(23, 1, 2, '🛕 Mukhalingam Temple', 'Ancient temple of Lord Shiva with intricate Kalinga architecture.', 'uploads/mukhalingam.jpg', 'Srikakulam, Andhra Pradesh', '🏨 Hotels & lodges nearby', 'https://mukhalingamtemple.com', '🏞 Baruva Beach, 🌉 Narayanavanam Waterfalls', '🏨 Haritha Hotel, 🏨 Grand Srikakulam', '🚆 Srikakulam Railway Station, 🚖 Buses & Private Taxis'),
(24, 1, 2, '🛕 Penukonda Lakshmi Narasimha Temple', 'Temple of Lord Narasimha, known for its historical significance.', 'uploads/penukonda.jpg', 'Anantapur, Andhra Pradesh', '🏨 Hotels available', 'https://penukondatemple.com', '🏞 Lepakshi Temple, 🏰 Gooty Fort', '🏨 Haritha Hotel, 🏨 Grand Anantapur', '🚆 Anantapur Railway Station, 🚖 Buses & Cabs'),
(25, 1, 2, '🛕 Bugga Ramalingeswara Swamy Temple', 'Famous Shiva temple with natural underground water source.', 'uploads/bugga.jpg', 'Tadipatri, Andhra Pradesh', '🏨 Lodging nearby', 'https://buggaramalingeswara.com', '🏞 Belum Caves, 🏰 Gandikota Fort', '🏨 Haritha Hotel Tadipatri, 🏨 Royal Residency', '🚆 Tadipatri Railway Station, 🚖 Buses & Autos'),
(26, 1, 2, '🛕 Vontimitta Kodanda Rama Temple', 'One of the grandest temples dedicated to Lord Rama in Andhra Pradesh.', 'uploads/vontimitta.jpg', 'Kadapa, Andhra Pradesh', '🏨 Hotels in Kadapa', 'https://vontimittatemple.com', '🛕 Ahobilam Temple, 🏞 Sri Lankamalleswara Wildlife Sanctuary', '🏨 Haritha Hotel Kadapa, 🏨 Hotel Swagath', '🚆 Kadapa Railway Station, 🚖 Buses & Taxis'),
(27, 1, 3, '🏖 Ramakrishna Beach', 'A popular beach in Visakhapatnam known for its scenic beauty and local attractions.', 'image-95.png', 'Visakhapatnam, Andhra Pradesh', '🏨 Various hotels and resorts nearby', 'https://www.visakhapatnam.tourism/rk_beach', '🚢 INS Kursura Submarine Museum, 🌄 Kailasagiri', '🏨 Novotel Visakhapatnam, 🏨 The Gateway Hotel', '🚆 Visakhapatnam Railway Station, 🚌 City buses, 🚖 Taxis'),
(28, 1, 3, '🏖 Rishikonda Beach', 'A serene beach ideal for water sports and relaxation.', 'uploads/rishikonda_beach.jpg', 'Visakhapatnam, Andhra Pradesh', '🏨 Beachfront resorts and cottages', 'https://www.visakhapatnam.tourism/rishikonda_beach', '🏝 Bheemili Beach, 🏛 Thotlakonda Buddhist Complex', '🏨 Sai Priya Beach Resort, 🏨 Bay Leaf Resort', '✈️ Visakhapatnam Airport, 🚖 Local taxis, 🚌 City buses'),
(29, 1, 3, '🏖 Bheemili Beach', 'A historic beach with colonial significance and calm waters.', 'image-95.png', 'Bheemunipatnam, Andhra Pradesh', '🏨 Guesthouses and beach resorts', 'https://www.visakhapatnam.tourism/bheemili_beach', '🏞 Rishikonda Beach, 🏛 Pavurallakonda', '🏨 The Bheemli Resort, 🏨 Bay Breeze Hotel', '🚆 Visakhapatnam Railway Station, 🚖 Cabs, 🚌 Local buses'),
(30, 1, 3, '🏖 Mypadu Beach', 'A tranquil beach known for its golden sands and clear waters.', 'uploads/mypadu_beach.jpg', 'Nellore, Andhra Pradesh', '🏨 AP Tourism Haritha Resort', 'https://www.nellore.tourism/mypadu_beach', '🐦 Pulicat Lake, 🏞 Nelapattu Bird Sanctuary', '🏨 Haritha Resort, 🏨 Local lodges', '🚆 Nellore Railway Station, 🚖 Cabs, 🚌 Local buses'),
(31, 1, 3, '🏖 Suryalanka Beach', 'A pristine beach perfect for weekend getaways.', 'uploads/suryalanka_beach.jpg', 'Bapatla, Andhra Pradesh', '🏨 Beachside cottages and resorts', 'https://www.guntur.tourism/suryalanka_beach', '🏝 Vodarevu Beach, 🏛 Bhavanarayana Swamy Temple', '🏨 Haritha Beach Resort, 🏨 Local accommodations', '🚆 Guntur Railway Station, 🚖 Auto & Cabs, 🚌 Buses'),
(32, 1, 3, '🏖 Vodarevu Beach', 'A quiet beach destination with fishing activities and beautiful sunrises.', 'uploads/vodarevu_beach.jpg', 'Chirala, Andhra Pradesh', '🏨 Local beach lodges', 'https://www.prakasam.tourism/vodarevu_beach', '🏝 Suryalanka Beach, 🏛 St. Marys Church', '🏨 Haritha Resort Chirala, 🏨 Sea Breeze Hotel', '🚆 Chirala Railway Station, 🚖 Taxis, 🚌 Buses'),
(33, 1, 3, '🏖 Manginapudi Beach', 'A unique black sand beach with shallow waters, ideal for family visits.', 'entrance-to-manginapudi.jpg', 'Machilipatnam, Andhra Pradesh', '🏨 Nearby resorts & hotels', 'https://www.krishna.tourism/manginapudi_beach', '🏛 Panduranga Swamy Temple, 🎣 Fishing Harbour', '🏨 Haritha Resort Machilipatnam, 🏨 Local lodges', '🚆 Machilipatnam Railway Station, 🚖 Auto & Cabs, 🚌 Buses'),
(34, 1, 3, '🏖 Perupalem Beach', 'A less crowded beach known for its scenic beauty and peaceful environment.', 'uploads/perupalem_beach.jpg', 'West Godavari, Andhra Pradesh', '🏨 Nearby beach resorts', 'https://www.westgodavari.tourism/perupalem_beach', '🏛 Dwaraka Tirumala, 🏞 Kolleru Lake', '🏨 Local resorts, 🏨 Private guesthouses', '🚆 Bhimavaram Railway Station, 🚖 Cabs & Buses'),
(35, 1, 3, '🏖 Yanam Beach', 'A charming beach along the Godavari riverbank with a mix of French colonial vibes.', 'uploads/yanam_beach.jpg', 'Yanam, Andhra Pradesh', '🏨 Beachside resorts and lodges', 'https://www.yanam.tourism/yanam_beach', '🏛 Grand Mosque, 🎡 Yanam Ferry Point', '🏨 Regency Beach Resort, 🏨 Yanam Guest Houses', '🚆 Kakinada Railway Station, 🚖 Taxis & Buses'),
(36, 1, 3, '🏖 Kakinada Beach', 'A long stretch of scenic coastline with coconut trees and pleasant weather.', 'view-of-one-of-the-beaches-in-kakinada-Cover-Photo-840x425.jpg', 'Kakinada, Andhra Pradesh', '🏨 Resorts & beach cottages', 'https://www.kakinada.tourism/kakinada_beach', '🏝 Hope Island, 🏞 Coringa Wildlife Sanctuary', '🏨 Dolphin Hotel, 🏨 Grand Kakinada', '🚆 Kakinada Railway Station, 🚖 Auto & Cabs, 🚌 Buses'),
(49, 1, 5, '🐘 Kambalakonda Wildlife Sanctuary', 'A lush forest reserve home to rare wildlife and adventure activities.', 'images (2).jpeg', 'Visakhapatnam, Andhra Pradesh', '🏕️ Eco-camps & Lodges', 'https://www.kambalakonda.tourism', '🏖 Rushikonda Beach, 🌄 Kailasagiri', '🏨 Haritha Beach Resort, 🏨 Novotel Vizag', '🚆 Vizag Railway Station, 🚖 Local Cabs, 🚴 Cycling Trails'),
(50, 1, 5, '🦜 Pulicat Lake Bird Sanctuary', 'Second largest brackish water lake, home to flamingos & migratory birds.', 'uploads/pulicat.jpg', 'Nellore, Andhra Pradesh', '🏕️ Guest Houses & Nature Camps', 'https://www.pulicat.tourism', '🏖 Sriharikota ISRO, 🏝 Nelapattu Bird Sanctuary', '🏨 Pulicat Resort, 🏕️ Beachside Lodges', '🚂 Nellore Railway Station, 🚗 Private Transport, 🚤 Boating Tours'),
(51, 1, 5, '🐅 Papikonda National Park', 'A dense tropical forest along the Godavari River, rich in biodiversity.', 'uploads/papikonda.jpg', 'Rajahmundry, Andhra Pradesh', '🏕️ Forest Guest Houses', 'https://www.papikonda.tourism', '🏞 Papi Hills, 🌊 Godavari Boat Cruises', '🏨 Haritha Resort Rajahmundry, 🏕️ Eco Camps', '🚆 Rajahmundry Railway Station, 🚤 River Cruises, 🚖 Private Jeeps'),
(52, 1, 5, '🐊 Coringa Wildlife Sanctuary', 'One of India’s largest mangrove forests, home to crocodiles and rare bird species.', 'Coringa-Wildlife-sanctuary-Cover-Image-1 (1).jpg', 'Kakinada, Andhra Pradesh', '🏕️ Eco Resorts & Cottages', 'https://www.coringa.tourism', '🏖 Hope Island, ⚓ Kakinada Port', '🏨 Hotel Anand Regency, 🏕️ Coringa Nature Camp', '🚆 Kakinada Railway Station, 🚖 Cabs & Buses, 🚤 Mangrove Boat Rides'),
(53, 1, 5, '🦚 Rollapadu Wildlife Sanctuary', 'A dry grassland reserve, famous for the Great Indian Bustard and other rare species.', 'uploads/rollapadu.jpg', 'Kurnool, Andhra Pradesh', '🏕️ Wildlife Camp Stay', 'https://www.rollapadu.tourism', '🏰 Kurnool Fort, 🏞 Oravakallu Rock Garden', '🏨 Hotel DVR Mansion, 🏕️ Forest Camps', '🚆 Kurnool Railway Station, 🚖 Safari Jeeps, 🚌 Private Buses'),
(54, 1, 5, '🐘 Kambalakonda Wildlife Sanctuary', 'A lush forest reserve home to rare wildlife and adventure activities.', 'uploads/kambalakonda.jpg', 'Visakhapatnam, Andhra Pradesh', '🏕️ Eco-camps & Lodges', 'https://www.kambalakonda.tourism', '🏖 Rushikonda Beach, 🌄 Kailasagiri', '🏨 Haritha Beach Resort, 🏨 Novotel Vizag', '🚆 Vizag Railway Station, 🚖 Local Cabs, 🚴 Cycling Trails'),
(55, 1, 5, '🦜 Pulicat Lake Bird Sanctuary', 'Second largest brackish water lake, home to flamingos & migratory birds.', 'uploads/pulicat.jpg', 'Nellore, Andhra Pradesh', '🏕️ Guest Houses & Nature Camps', 'https://www.pulicat.tourism', '🏖 Sriharikota ISRO, 🏝 Nelapattu Bird Sanctuary', '🏨 Pulicat Resort, 🏕️ Beachside Lodges', '🚂 Nellore Railway Station, 🚗 Private Transport, 🚤 Boating Tours'),
(56, 1, 5, '🐅 Papikonda National Park', 'A dense tropical forest along the Godavari River, rich in biodiversity.', 'uploads/papikonda.jpg', 'Rajahmundry, Andhra Pradesh', '🏕️ Forest Guest Houses', 'https://www.papikonda.tourism', '🏞 Papi Hills, 🌊 Godavari Boat Cruises', '🏨 Haritha Resort Rajahmundry, 🏕️ Eco Camps', '🚆 Rajahmundry Railway Station, 🚤 River Cruises, 🚖 Private Jeeps'),
(57, 1, 5, '🐊 Coringa Wildlife Sanctuary', 'One of India’s largest mangrove forests, home to crocodiles and rare bird species.', 'download.jpeg', 'Kakinada, Andhra Pradesh', '🏕️ Eco Resorts & Cottages', 'https://www.coringa.tourism', '🏖 Hope Island, ⚓ Kakinada Port', '🏨 Hotel Anand Regency, 🏕️ Coringa Nature Camp', '🚆 Kakinada Railway Station, 🚖 Cabs & Buses, 🚤 Mangrove Boat Rides'),
(58, 1, 5, '🦚 Rollapadu Wildlife Sanctuary', 'A dry grassland reserve, famous for the Great Indian Bustard and other rare species.', 'uploads/rollapadu.jpg', 'Kurnool, Andhra Pradesh', '🏕️ Wildlife Camp Stay', 'https://www.rollapadu.tourism', '🏰 Kurnool Fort, 🏞 Oravakallu Rock Garden', '🏨 Hotel DVR Mansion, 🏕️ Forest Camps', '🚆 Kurnool Railway Station, 🚖 Safari Jeeps, 🚌 Private Buses'),
(79, 1, 4, '🏰 Chandragiri Fort', 'A historical fort built by the Vijayanagara kings, known for its scenic views.', 'DSC_3905.webp', 'Tirupati, Andhra Pradesh', '🏨 Lodges & Hotels in Tirupati', 'https://www.chandragiri.tourism', '🛕 Tirupati Balaji Temple, 🌄 Talakona Waterfalls', '🏨 Fortune Select Grand Ridge, 🏨 Marasa Sarovar Premiere', '🚆 Tirupati Railway Station, 🚖 Cabs & Buses'),
(80, 1, 4, '🏛 Lepakshi Temple', 'Famous for its Hanging Pillar and 16th-century Vijayanagara murals.', 'uploads/lepakshi.jpg', 'Anantapur, Andhra Pradesh', '🏨 Hotels & Lodges nearby', 'https://www.lepakshi.tourism', '🐍 Nandi Statue, 🏞 Heritage Caves', '🏨 Haritha Hotel, 🏨 Sri Srinivasa Lodge', '🚆 Hindupur Railway Station, 🚖 Cabs & Buses'),
(81, 1, 4, '🏛 Amaravati Stupa', 'An ancient Buddhist stupa with inscriptions dating back to Emperor Ashoka.', '20VJ_AMARAVATHI.jpeg', 'Amaravati, Andhra Pradesh', '🏕️ Tourist Guest Houses', 'https://www.amaravati.tourism', '🏰 Undavalli Caves, 🌉 Prakasam Barrage', '🏨 The Taj Gateway Vijayawada, 🏨 Hotel Ilapuram', '🚆 Vijayawada Railway Station, 🚖 Local Taxis & Buses'),
(82, 1, 4, '🏯 Kondapalli Fort', 'A magnificent fort from the 14th century, known for its handcrafted wooden toys.', 'uploads/kondapalli.jpg', 'Vijayawada, Andhra Pradesh', '🏨 Lodging in Vijayawada', 'https://www.kondapalli.tourism', '🏖 Bhavani Island, 🌉 Prakasam Barrage', '🏨 The Gateway Hotel, 🏨 Haritha Resort', '🚆 Vijayawada Railway Station, 🚖 Private Cabs'),
(83, 1, 4, '🏛 Belum Caves', 'One of the largest cave systems in India, with ancient Buddhist relics.', 'gandikota2-1024x348.jpg', 'Kurnool, Andhra Pradesh', '🏕️ Lodges & Resorts', 'https://www.belumcaves.tourism', '🏞 Gandikota Fort, ⛪ Yaganti Temple', '🏨 Hotel DVR Mansion, 🏕️ Local Guest Houses', '🚆 Tadipatri Railway Station, 🚖 Cabs & Buses'),
(84, 1, 4, '🏰 Gandikota Fort', 'Known as the \"Grand Canyon of India\", famous for its stunning landscape and historical ruins.', 'uploads/gandikota.jpg', 'Kadapa, Andhra Pradesh', '🏕️ Adventure Stay & Camping', 'https://www.gandikota.tourism', '🏞 Pennar River Gorge, 🏛 Belum Caves', '🏨 Haritha Resort, 🏕️ Camping Tents', '🚆 Jammalamadugu Railway Station, 🚖 Jeeps & Private Buses'),
(85, 1, 4, '🏯 Golconda Buddhist Stupa', 'Ancient Buddhist ruins from 3rd century BCE, with rock-cut sculptures.', 'uploads/golconda.jpg', 'Guntur, Andhra Pradesh', '🏕️ Nearby Guest Houses', 'https://www.golconda.tourism', '🏰 Undavalli Caves, 🛕 Mangalagiri Temple', '🏨 Hotel Grand Guntur, 🏨 Geetha Regency', '🚆 Guntur Railway Station, 🚖 Auto & Cabs'),
(86, 1, 4, '🏛 Thotlakonda Buddhist Complex', 'A serene hilltop Buddhist heritage site overlooking the Bay of Bengal.', 'uploads/thotlakonda.jpg', 'Visakhapatnam, Andhra Pradesh', '🏕️ Beach Resorts & Guest Houses', 'https://www.thotlakonda.tourism', '🏖 Rushikonda Beach, 🌊 Yarada Beach', '🏨 Novotel Visakhapatnam, 🏨 Dolphin Hotel', '🚆 Visakhapatnam Railway Station, 🚖 Local Cabs & Buses'),
(87, 1, 1, '⛰️ Gandikota Canyon', 'Known as the Grand Canyon of India, offering breathtaking landscapes and adventure activities.', 'hq720.jpg', 'Kadapa, Andhra Pradesh', '🏨 Nearby resorts & camping sites', 'https://www.kadapa.tourism/gandikota', '🏰 Belum Caves, 🏛 Penna River Viewpoint', '🏨 Haritha Resort Gandikota, 🏨 Local Homestays', '🚆 Kadapa Railway Station, 🚖 Cabs, 🏕️ Trekking Routes'),
(88, 1, 1, '🛶 Papikondalu Hills & Boat Ride', 'A scenic hill range with thrilling boat rides along the Godavari River.', 'uploads/papikondalu.jpg', 'Rajahmundry, Andhra Pradesh', '🏨 Houseboats & Riverfront resorts', 'https://www.papikondalu.tourism', '🏝 Papi Hills, 🌊 Perantapalli Village', '🏨 River Bay Resort, 🏨 Godavari Houseboats', '🚆 Rajahmundry Railway Station, ⛴️ Boat Services, 🚖 Cabs'),
(89, 1, 1, '🛕 Ahobilam Trek', 'An adventurous trek through the Nallamala forests to reach the sacred Ahobilam temples.', 'blog6.jpg', 'Nandyal, Andhra Pradesh', '🏕️ Camping options & Guest houses', 'https://www.ahobilam.tourism', '🌄 Ugra Stambham Peak, 🏞 Nallamala Forest', '🏨 Ahobilam Cottages, 🏨 Dharmashalas', '🚆 Nandyal Railway Station, 🚖 Local Jeeps, 🥾 Trekking'),
(90, 1, 1, '🚣 Kondaveedu Fort Trek', 'A thrilling trek to the historic fort with panoramic views of the region.', 'uploads/kondaveedu_fort.jpg', 'Guntur, Andhra Pradesh', '🏕️ Tent stays & Eco-resorts', 'https://www.kondaveedu.tourism', '🏰 Amaravati Stupa, 🌄 Ethipothala Falls', '🏨 Haritha Resort, 🏨 Local Lodges', '🚆 Guntur Railway Station, 🚖 Trekking Route, 🚘 Private Cabs'),
(91, 1, 1, '🏔️ Horsley Hills Adventure Park', 'A hill station with zip-lining, rock climbing, and rappelling.', 'uploads/horsley_hills.jpg', 'Chittoor, Andhra Pradesh', '🏕️ Hilltop Resorts & Eco-stays', 'https://www.horsleyhills.tourism', '🏞 Talakona Waterfalls, 🏛 Koundinya Wildlife Sanctuary', '🏨 Haritha Resort Horsley Hills, 🏨 Wild Woods Camp', '🚆 Madanapalle Railway Station, 🚖 Hilltop Jeep Rides, 🥾 Trekking'),
(92, 1, 1, '🦜 Kambalakonda Wildlife Sanctuary', 'A biodiversity hotspot with jungle trekking, birdwatching, and nature trails.', 'uploads/kambalakonda.jpg', 'Visakhapatnam, Andhra Pradesh', '🏨 Eco-friendly Resorts & Jungle Camps', 'https://www.kambalakonda.tourism', '🏞 Katiki Waterfalls, 🌄 Borra Caves', '🏨 Haritha Jungle Resort, 🏨 Bay Leaf Resort', '🚆 Visakhapatnam Railway Station, 🚖 Cabs, 🥾 Guided Trekking'),
(93, 1, 1, '🌊 Ethipothala Waterfalls', 'A mesmerizing 70ft waterfall offering trekking and camping experiences.', 'uploads/ethipothala_falls.jpg', 'Guntur, Andhra Pradesh', '🏕️ Riverside camping & Lodges', 'https://www.ethipothala.tourism', '🏰 Nagarjuna Sagar Dam, 🛕 Macherla Temple', '🏨 Haritha Resort Nagarjuna Sagar, 🏨 Local Guest Houses', '🚆 Guntur Railway Station, 🚖 Cabs & Jeep Safaris'),
(94, 1, 1, '🧗 Belum Caves', 'The largest underground cave system in India with thrilling passageways and rock formations.', 'Belum_caves_12.webp', 'Kurnool, Andhra Pradesh', '🏕️ Camping & Nearby Hotels', 'https://www.belumcaves.tourism', '🏞 Gandikota Fort, 🛕 Yaganti Temple', '🏨 Haritha Resort Belum, 🏨 Local Homestays', '🚆 Tadipatri Railway Station, 🚖 Auto & Private Cabs'),
(95, 1, 1, '🛶 Coringa Mangrove Boat Ride', 'A breathtaking boat ride through one of India’s largest mangrove forests.', 'uploads/coringa_boat_ride.jpg', 'Kakinada, Andhra Pradesh', '🏨 Riverfront Resorts & Eco Lodges', 'https://www.coringa.tourism', '🏞 Hope Island, 🏖 Kakinada Beach', '🏨 Grand Kakinada Resort, 🏨 Dolphin Hotel', '🚆 Kakinada Railway Station, ⛴️ Boat Services, 🚖 Taxis'),
(96, 1, 1, '🌄 Vanjangi Hills', 'A breathtaking hilltop with stunning sunrise views above the clouds.', 'uploads/vanjangi_hills.jpg', 'Paderu, Andhra Pradesh', '🏕️ Camping sites & Homestays', 'https://www.vanjangihills.tourism', '🏞 Araku Valley, 🍵 Coffee Plantations', '🏨 Haritha Resort Araku, 🏕️ Local Tents', '🚆 Vizag Railway Station, 🚖 Private Jeeps, 🥾 Trekking'),
(97, 1, 1, '🌲 Lambasingi', 'The \"Kashmir of Andhra Pradesh,\" known for its freezing temperatures and misty landscapes.', 'uploads/lambasingi.jpg', 'Visakhapatnam, Andhra Pradesh', '🏕️ Cottages & Forest Camping', 'https://www.lambasingi.tourism', '🏞 Kothapalli Waterfalls, 🌳 Chintapalli Forests', '🏨 Haritha Hill Resort, 🏕️ Homestays', '🚆 Visakhapatnam Railway Station, 🚖 Cabs & Buses, 🚴 Cycling Routes');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `zone_id`, `name`, `image`) VALUES
(1, 1, 'Andhra Pradesh', 'ap.webp'),
(2, 1, 'Tamil Nadu', 'tamilnadu.jpg'),
(3, 1, 'Karnataka', 'Screenshot 2025-02-16 130418.png'),
(4, 1, 'Kerala', 'kearala.png'),
(5, 2, 'Jammu & Kashmir', 'jammu.jpg'),
(6, 2, 'Himachal Pradesh', 'best-places-to-visit-in-himachal-pradesh.jpg'),
(7, 2, 'Punjab', 'punjab.webp'),
(8, 2, 'Uttarakhand', 'Top-Uttarakhand-Places_page-0001.jpg'),
(9, 2, 'Haryana', 'haryana.jpg'),
(10, 2, 'Delhi', 'places-to-visit-in-Delhi.webp'),
(11, 2, 'Uttar Pradesh', 'uttar-pradesh-tour-packages.jpg'),
(12, 2, 'Chandigarh', 'chandigar.jpg'),
(13, 3, 'Bihar', 'bhihar.jpg'),
(14, 3, 'Jharkhand', 'jharkhand.jpg'),
(15, 3, 'Odisha', 'odisha.jpg'),
(16, 3, 'West Bengal', 'west bengal.jpg'),
(17, 3, 'Sikkim', 'sikkim.jpg'),
(18, 3, 'Assam', 'assam.jpeg'),
(19, 3, 'Meghalaya', 'meghalaya.jpg'),
(20, 3, 'Tripura', 'Tripura (1).jpg'),
(21, 3, 'Arunachal Pradesh', 'images (3).jpeg'),
(22, 3, 'Manipur', 'manipur.jpeg'),
(23, 3, 'Nagaland', 'nagaland.jpeg'),
(24, 3, 'Mizoram', 'mizoram.webp'),
(25, 4, 'Rajasthan', 'rajasthan.jpg'),
(26, 4, 'Gujarat', 'gujarath.jpg'),
(27, 4, 'Goa', 'goa.png'),
(28, 4, 'Maharashtra', 'maharashtra.webp'),
(29, 4, 'Madhya Pradesh', 'madyapradesh.jpg'),
(30, 4, 'Dadra & Nagar Haveli and Daman & Diu', 'dara nagar haveli.jpeg'),
(31, 1, 'Telangana', 'ts.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `name`) VALUES
(1, 'South Zone'),
(2, 'North Zone'),
(3, 'East Zone'),
(4, 'West Zone');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zone_id` (`zone_id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `places_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_ibfk_1` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
