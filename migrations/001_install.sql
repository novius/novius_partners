CREATE TABLE IF NOT EXISTS `novius_partner` (
  `part_id`         INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `part_title`      VARCHAR(255)     NOT NULL,
  `part_link`       VARCHAR(255)     NOT NULL,
  `part_created_at` TIMESTAMP        NOT NULL DEFAULT '0000-00-00 00:00:00',
  `part_updated_at` TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`part_id`),
  KEY `part_created_at` (`part_created_at`),
  KEY `part_updated_at` (`part_updated_at`)
)
  DEFAULT CHARSET =utf8
  AUTO_INCREMENT =1;
CREATE TABLE IF NOT EXISTS `novius_partner_group` (
  `group_id`            INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_title`         VARCHAR(255)     NOT NULL,
  `group_foreign_id`    INT              NOT NULL,
  `group_foreign_model` INT              NOT NULL,
  `group_order`         INT              NOT NULL,
  `group_created_at`    TIMESTAMP        NOT NULL DEFAULT '0000-00-00 00:00:00',
  `group_updated_at`    TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`group_id`),
  KEY `group_created_at` (`group_created_at`),
  KEY `group_updated_at` (`group_updated_at`)
)
  DEFAULT CHARSET =utf8
  AUTO_INCREMENT =1;

CREATE TABLE IF NOT EXISTS `novius_partner_group_partner` (
  `grpa_id`       INT(11) NOT NULL AUTO_INCREMENT,
  `grpa_group_id` INT(11) NOT NULL,
  `grpa_part_id`  INT(11) NOT NULL,
  `grpa_order`    INT(11) DEFAULT 0,
  PRIMARY KEY (`grpa_id`),
  KEY `grpa_part_id` (`grpa_part_id`, `grpa_group_id`)
)
  ENGINE =MyISAM
  DEFAULT CHARSET =utf8
  AUTO_INCREMENT =1;
