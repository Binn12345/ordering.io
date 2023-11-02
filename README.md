## Food Hub 'Ordering System'
## SQL
- ALTER TABLE `users`
CHANGE COLUMN `idkey` `idkey` BIGINT NULL DEFAULT NULL AFTER `id`,
ADD COLUMN `fullname` VARCHAR(255) NULL DEFAULT NULL AFTER `userkey`;
- ALTER TABLE `users`
ADD COLUMN `email` VARCHAR(255) NULL DEFAULT NULL AFTER `idkey`;
- CREATE TABLE personal_data(
	id INT NOT NULL AUTO_INCREMENT,
	ukey BIGINT NULL,
	isActive INT NULL,
	isTerm INT NULL,
	firstname VARCHAR(255) NULL,
	middlename VARCHAR(255) NULL,
	PRIMARY KEY(id)
);
