
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- Users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(100) NOT NULL,
    `password` VARCHAR(32) NOT NULL,
    `userrole` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `UniqueName` (`username`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Products
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Products`;

CREATE TABLE `Products`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `productName` VARCHAR(255) NOT NULL,
    `description` TEXT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
