CREATE TABLE `image` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `url` VARCHAR(255) NOT NULL,
    `width` INT(3) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `index_image_url` (`url`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
