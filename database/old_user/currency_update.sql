ALTER TABLE `px_owner_company` ADD `currency` INT(50) NULL DEFAULT NULL AFTER `paypal_email`;
UPDATE `px_owner_company` SET `currency` = '25' WHERE `px_owner_company`.`id` = 1;