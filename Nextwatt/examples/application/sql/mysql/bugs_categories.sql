CREATE TABLE `bugs_categories` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `bug_id` BIGINT UNSIGNED NOT NULL,
    `category_id` BIGINT UNSIGNED NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;