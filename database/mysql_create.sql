CREATE DATABASE IF NOT EXISTS business_db;
USE business_db;

CREATE TABLE IF NOT EXISTS `exercise` (
	`ExerciseID` bigint NOT NULL AUTO_INCREMENT,
	`UserID` bigint NOT NULL,
	`ExerciseName` TEXT NOT NULL,
	`ExerciseType` bigint NOT NULL,
	PRIMARY KEY (`ExerciseID`)
);

CREATE TABLE IF NOT EXISTS `workoutlog` (
	`WorkoutID` bigint NOT NULL AUTO_INCREMENT,
	`UserID` bigint NOT NULL,
	`SessionID` bigint NOT NULL,
	`ExerciseID` bigint NOT NULL,
	`Reps` int NOT NULL,
	`Weight` FLOAT NOT NULL,
	`RPE` int NOT NULL,
	`Timestamp` bigint NOT NULL,
	PRIMARY KEY (`WorkoutID`)
);

CREATE TABLE IF NOT EXISTS `user` (
	`UserID` bigint NOT NULL AUTO_INCREMENT,
	`UserName` TEXT NOT NULL,
	`UserMail` TEXT,
	`UserPassword` TEXT,
	`UserSalt` TEXT,
	PRIMARY KEY (`UserID`)
);

CREATE TABLE IF NOT EXISTS `device` (
       `DeviceID` bigint NOT NULL AUTO_INCREMENT,
       `Location` TEXT NOT NULL,
       `UserID` bigint NOT NULL,
       PRIMARY KEY (`DeviceID`)
);

CREATE TABLE IF NOT EXISTS `Sensors` (
       `SensorID` bigint NOT NULL AUTO_INCREMENT,
       `DeviceID` bigint NOT NULL,
       `Type` bigint NOT NULL,
       `Unit` bigint NOT NULL,
       PRIMARY KEY (`SensorID`)
);

ALTER TABLE `device` ADD CONSTRAINT `Device_fk0` FOREIGN KEY (`UserID`) REFERENCES `user`(`UserID`);

ALTER TABLE `Sensors` ADD CONSTRAINT `Sensors_fk0` FOREIGN KEY (`DeviceID`) REFERENCES `device`(`DeviceID`);

ALTER TABLE `workoutlog` ADD CONSTRAINT `workoutlog_fk0` FOREIGN KEY (`UserID`) REFERENCES `user`(`UserID`);

ALTER TABLE `workoutlog` ADD CONSTRAINT `workoutlog_fk1` FOREIGN KEY (`ExerciseID`) REFERENCES `exercise`(`ExerciseID`);

ALTER TABLE `exercise` ADD CONSTRAINT `Exercise_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);


INSERT INTO `user` (UserName, UserMail, UserPassword, UserSalt) VALUES ('Consti', 'Constantin.Schieber@outlook.com', '$1$2GHwXknt$zmhhpWFT124imxu8erC5f0', '');

INSERT INTO `user` (UserName, UserMail, UserPassword, UserSalt) VALUES ('Test', 'Test@outlook.com', '$1$2QcTQNsy$jzgkW.mb1ueLQ9wfyGpsj/', '');

INSERT INTO `device` (Location, UserID) VALUES ('Testloc1', '1');
INSERT INTO `device` (Location, UserID) VALUES ('Testloc2', '1');
INSERT INTO `device` (Location, UserID) VALUES ('Testloc3', '1');

INSERT INTO `exercise` (UserID, ExerciseName, ExerciseType) VALUES ('1', 'Squat', '0');
INSERT INTO `exercise` (UserID, ExerciseName, ExerciseType) VALUES ('1', 'Bench', '0');
INSERT INTO `exercise` (UserID, ExerciseName, ExerciseType) VALUES ('2', 'Squat', '0');
INSERT INTO `exercise` (UserID, ExerciseName, ExerciseType) VALUES ('2', 'Bench', '0');

INSERT INTO `workoutlog` (UserID, SessionID, ExerciseID, Reps, Weight, RPE, Timestamp) VALUES ('1', '1', '1', 5, 80, 8, '1546168656');
INSERT INTO `workoutlog` (UserID, SessionID, ExerciseID, Reps, Weight, RPE, Timestamp) VALUES ('1', '1', '1', 5, 80, 8, '1546168756');
INSERT INTO `workoutlog` (UserID, SessionID, ExerciseID, Reps, Weight, RPE, Timestamp) VALUES ('1', '1', '1', 5, 80, 8, '1546168656');

INSERT INTO `workoutlog` (UserID, SessionID, ExerciseID, Reps, Weight, RPE, Timestamp) VALUES ('1', '1', '2', 5, 50, 8, '1546168656');
INSERT INTO `workoutlog` (UserID, SessionID, ExerciseID, Reps, Weight, RPE, Timestamp) VALUES ('1', '1', '2', 5, 50, 8, '1546168756');
INSERT INTO `workoutlog` (UserID, SessionID, ExerciseID, Reps, Weight, RPE, Timestamp) VALUES ('1', '1', '2', 5, 50, 8, '1546168656');

INSERT INTO `workoutlog` (UserID, SessionID, ExerciseID, Reps, Weight, RPE, Timestamp) VALUES ('2', '2', '1', 5, 80, 8, '1546169756');
INSERT INTO `workoutlog` (UserID, SessionID, ExerciseID, Reps, Weight, RPE, Timestamp) VALUES ('2', '2', '1', 5, 80, 8, '1546169856');
INSERT INTO `workoutlog` (UserID, SessionID, ExerciseID, Reps, Weight, RPE, Timestamp) VALUES ('2', '2', '1', 5, 80, 8, '1546169856');

INSERT INTO `workoutlog` (UserID, SessionID, ExerciseID, Reps, Weight, RPE, Timestamp) VALUES ('2', '1', '2', 5, 50, 8, '1546168656');
INSERT INTO `workoutlog` (UserID, SessionID, ExerciseID, Reps, Weight, RPE, Timestamp) VALUES ('2', '1', '2', 5, 50, 8, '1546168756');
INSERT INTO `workoutlog` (UserID, SessionID, ExerciseID, Reps, Weight, RPE, Timestamp) VALUES ('2', '1', '2', 5, 50, 8, '1546168656');
