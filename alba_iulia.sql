CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `short_description` text DEFAULT NULL,
  `catch_phrase` varchar(255) DEFAULT NULL,
  `ticket_price` varchar(50) DEFAULT NULL,
  `visiting_hours` varchar(100) DEFAULT NULL,
  `more_info_link` varchar(255) DEFAULT NULL,
  `map_link` varchar(255) DEFAULT NULL,
  `nearest_coffee` varchar(255) DEFAULT NULL,
  `taxi_link` varchar(255) DEFAULT NULL,
  `social_media_facebook` varchar(255) DEFAULT NULL,
  `social_media_instagram` varchar(255) DEFAULT NULL,
  `social_media_youtube` varchar(255) DEFAULT NULL,
  `social_media_website` varchar(255) DEFAULT NULL,
  `social_media_tiktok` varchar(255) DEFAULT NULL,
  `social_media_x` varchar(255) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `location_coordinates` varchar(255) DEFAULT NULL,
  `location_camera_type` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
```sql
CREATE TABLE `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `short_description` text DEFAULT NULL,
  `catch_phrase` varchar(255) DEFAULT NULL,
  `ticket_price` varchar(50) DEFAULT NULL,
  `visiting_hours` varchar(100) DEFAULT NULL,
  `more_info_link` varchar(255) DEFAULT NULL,
  `map_link` varchar(255) DEFAULT NULL,
  `taxi_link` varchar(255) DEFAULT NULL,
  `social_media_facebook` varchar(255) DEFAULT NULL,
  `social_media_instagram` varchar(255) DEFAULT NULL,
  `social_media_youtube` varchar(255) DEFAULT NULL,
  `social_media_website` varchar(255) DEFAULT NULL,
  `social_media_tiktok` varchar(255) DEFAULT NULL,
  `social_media_x` varchar(255) DEFAULT NULL,
  `location_coordinates` varchar(255) DEFAULT NULL,
  `location_camera_type` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expiration_date` date DEFAULT NULL,
  `nearest_coffee` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Populate the db with dummy info
-- Populating the `locations` table with dummy data
INSERT INTO `locations` (`title`, `description`, `short_description`, `catch_phrase`, `ticket_price`, `visiting_hours`, `more_info_link`, `map_link`, `nearest_coffee`, `taxi_link`, `social_media_facebook`, `social_media_instagram`, `social_media_youtube`, `social_media_website`, `social_media_tiktok`, `social_media_x`, `location_coordinates`, `location_camera_type`, `expiration_date`) VALUES
('St. Michael\'s Cathedral', 'The oldest and longest cathedral in Romania, showcasing Romanesque architecture. Houses sarcophagi of historical figures such as Iancu de Hunedoara.', 'Oldest and longest cathedral in Romania', 'A majestic piece of history', 'Free', 'Daily 08:00 – 18:00', 'https://en.wikipedia.org/wiki/St._Michael%27s_Cathedral,_Alba_Iulia', 'https://goo.gl/maps/UfweWkNGRm82', 'https://goo.gl/maps/coffeeshop', 'https://taxiapp.com/to/StMichael', 'https://facebook.com/StMichaelCathedral', 'https://instagram.com/StMichaelCathedral', 'https://youtube.com/StMichaelCathedral', 'https://stmichaelcathedral.ro', 'https://tiktok.com/@StMichaelCathedral', 'https://x.com/StMichaelCathedral', '45.4001,23.2904', 'Static', '2025-12-31'),
('Coronation Cathedral', 'Built with support from the Royal House of Romania, where King Ferdinand and Queen Maria were crowned in 1922.', 'Historic coronation site', 'Crowning glory of Romania', 'Free', 'Daily 08:00 – 20:00', 'https://en.wikipedia.org/wiki/Coronation_Cathedral,_Alba_Iulia', 'https://goo.gl/maps/TrVME4JWx6x', 'https://goo.gl/maps/coffeeshop', 'https://taxiapp.com/to/CoronationCathedral', 'https://facebook.com/CoronationCathedral', 'https://instagram.com/CoronationCathedral', 'https://youtube.com/CoronationCathedral', 'https://coronationcathedral.ro', 'https://tiktok.com/@CoronationCathedral', 'https://x.com/CoronationCathedral', '45.8002,23.5905', 'Dynamic', '2025-12-31'),
('Union Hall', 'Site where the Union of Transylvania with Romania was voted and the act of union signed on December 1, 1918.', 'Historic union site', 'Where history was made', 'Free', 'Tuesday – Sunday 09:00 – 18:00', 'https://www.muzeulunirii.ro', 'https://goo.gl/maps/2rGm1kX9dPN2', 'https://goo.gl/maps/coffeeshop', 'https://taxiapp.com/to/UnionHall', 'https://facebook.com/UnionHall', 'https://instagram.com/UnionHall', 'https://youtube.com/UnionHall', 'https://unionhall.ro', 'https://tiktok.com/@UnionHall', 'https://x.com/UnionHall', '45.7003,23.4906', 'Rotational', '2025-12-31');

-- Populating the `users` table with dummy data
INSERT INTO `users` (`username`, `password`) VALUES
('user1', '$2y$10$e0NRw3zXt9LQjDEOT.eLxOXbJeHt3D5K/jyQYhy8aG1.L2dFGqTjG'), -- Password: password1
('user2', '$2y$10$e0NRw3zXt9LQjDEOT.eLxOWyQouZt4jD3/9y.X3jhD4Flgf4.s5FW'), -- Password: password2
('user3', '$2y$10$e0NRw3zXt9LQjDEOT.eLxOWxYP9.z1tC6/8yT6Xp5D2Gzg8dVn1aQ'); -- Password: password3


