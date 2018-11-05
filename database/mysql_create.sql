CREATE DATABASE IF NOT EXISTS business_db;
USE business_db;

CREATE TABLE IF NOT EXISTS `Device` (
	`DeviceID` bigint NOT NULL AUTO_INCREMENT,
	`Location` TEXT NOT NULL,
	`UserID` bigint NOT NULL,
	PRIMARY KEY (`DeviceID`)
);

CREATE TABLE IF NOT EXISTS `User` (
	`UserID` bigint NOT NULL AUTO_INCREMENT,
	`UserName` TEXT NOT NULL,
	PRIMARY KEY (`UserID`)
);

CREATE TABLE IF NOT EXISTS `Sensors` (
	`SensorID` bigint NOT NULL AUTO_INCREMENT,
	`DeviceID` bigint NOT NULL,
	`Type` bigint NOT NULL,
	`Unit` bigint NOT NULL,
	PRIMARY KEY (`SensorID`)
);

ALTER TABLE `Device` ADD CONSTRAINT `Device_fk0` FOREIGN KEY (`UserID`) REFERENCES `User`(`UserID`);

ALTER TABLE `Sensors` ADD CONSTRAINT `Sensors_fk0` FOREIGN KEY (`DeviceID`) REFERENCES `Device`(`DeviceID`);

