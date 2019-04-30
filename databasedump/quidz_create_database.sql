CREATE DATABASE Quidz;

CREATE TABLE `tPlayer` (
	`PID` INT NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(150),
	`vname` VARCHAR(150),
	`nname` VARCHAR(150),
	`mail` VARCHAR(200),
	`pwd` VARCHAR(50),
	PRIMARY KEY (`PID`)
);

CREATE TABLE `tScoreBoard` (
 	`PID` INT NOT NULL AUTO_INCREMENT,
	`time` TIME,
	`price` INT,
	PRIMARY KEY (`PID`),
    FOREIGN KEY (`PID`) REFERENCES tPlayer (`PID`)
);

CREATE TABLE `tDifficulty` (
	`SID` INT NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(150),
    PRIMARY KEY (`SID`)
);

CREATE TABLE `tQuestions` (
	`FID` INT NOT NULL AUTO_INCREMENT,
	`question` VARCHAR(150),
	`a1` VARCHAR(150),
    `a2` VARCHAR(150),
    `a3` VARCHAR(150),
    `a4` VARCHAR(150),
	`ra` INT,
	`SID` INT,
	PRIMARY KEY (`FID`),
    FOREIGN KEY (`SID`) REFERENCES tDifficulty (`SID`)
);