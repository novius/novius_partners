ALTER TABLE `novius_partner`
ADD `part_context` VARCHAR( 25 ) NOT NULL,
ADD `part_context_common_id` INT( 11 ) NOT NULL,
ADD `part_context_is_main` BOOLEAN NOT NULL DEFAULT FALSE;

ALTER TABLE `novius_partner_group`
ADD `group_context` VARCHAR( 25 ) NOT NULL,
ADD `group_context_common_id` INT( 11 ) NOT NULL,
ADD `group_context_is_main` BOOLEAN NOT NULL DEFAULT FALSE;

