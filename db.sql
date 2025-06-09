CREATE DATABASE IF NOT EXISTS lost_and_found_hub;

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_lost` date NOT NULL,
  `location_lost` varchar(255) NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `date_reported` timestamp NOT NULL DEFAULT current_timestamp(),
  `found` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
)