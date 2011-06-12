--
-- Databse Version 0.8.2
--
ALTER TABLE `addressbook` ADD `salutation` VARCHAR( 25 ) NULL AFTER `lastname`;
ALTER TABLE `addressbook` ADD `postbox` VARCHAR( 100 ) NULL AFTER `postalcode`;