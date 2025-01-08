CREATE TABLE `User` (
  `id` integer PRIMARY KEY,
  `name` varchar(32),
  `email` varchar(320),
  `password` varchar(32),
  `admin` ineger(1),
  `created_at` datetime
);

CREATE TABLE `Salons` (
  `id` integer PRIMARY KEY,
  `owner_id` int,
  `salon_name` varchar(67),
  `salon_location` varchar(320)
);

CREATE TABLE `Posts` (
  `id` integer PRIMARY KEY,
  `title` varchar(150),
  `location` varchar(320),
  `information` text,
  `posted_time` datetime,
  `starts_at` datetime
);

CREATE TABLE `Interactions` (
  `id` integer PRIMARY KEY,
  `user_id` integer,
  `post_id` integer,
  `like` bool,
  `watched` double
);

ALTER TABLE `Posts` ADD FOREIGN KEY (`id`) REFERENCES `Interactions` (`post_id`);

ALTER TABLE `Salons` ADD FOREIGN KEY (`owner_id`) REFERENCES `User` (`id`);

ALTER TABLE `Interactions` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);
