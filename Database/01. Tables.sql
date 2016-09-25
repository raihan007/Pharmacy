CREATE TABLE IF NOT EXISTS users_info (
EntityNo int(11) NOT NULL AUTO_INCREMENT,
UserId varchar(50) NOT NULL,
FirstName varchar(20) NOT NULL,
LastName varchar(20) NOT NULL,
Gender varchar(11) NOT NULL,
Email varchar(50) NOT NULL,
Photo varchar(150) DEFAULT NULL,
PermanentAddress varchar(150) NOT NULL,
PresentAddress varchar(150) NOT NULL,
PhoneNo varchar(20) NOT NULL,
Birthdate date NOT NULL,
BloodGroup varchar(5) NOT NULL,
NationalIdNo varchar(50) NOT NULL,
JoinDate datetime DEFAULT CURRENT_TIMESTAMP,
Role varchar(10) NOT NULL DEFAULT 'Employee',
LastChanged datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
LastChangedBy varchar(50) NOT NULL,
PRIMARY KEY (UserId),
UNIQUE (EntityNo,UserId,Email,PhoneNo,NationalIdNo,Photo)
);

CREATE TABLE IF NOT EXISTS dt_user_permission (
EntityNo int(11) NOT NULL AUTO_INCREMENT,
UserId varchar(50) NOT NULL,
PermissionNo int(5) NOT NULL,
LastChanged datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
LastChangedBy varchar(50) NOT NULL,
PRIMARY KEY (EntityNo),
UNIQUE (EntityNo),
FOREIGN KEY (UserId) REFERENCES users_info(UserId)
);

CREATE TABLE IF NOT EXISTS users_access (
EntityNo int(11) NOT NULL AUTO_INCREMENT,
UserId varchar(50) NOT NULL,
Username varchar(20) NOT NULL,
Password varchar(60) NOT NULL,
PRIMARY KEY (UserId),
UNIQUE (EntityNo,Username,Password),
FOREIGN KEY (UserId) REFERENCES users_info(UserId)
);

CREATE TABLE IF NOT EXISTS access_history (
EntityNo int(11) NOT NULL AUTO_INCREMENT,
UserId varchar(50) NOT NULL,
LoginTime datetime NOT NULL,
PRIMARY KEY (EntityNo),
UNIQUE (EntityNo),
FOREIGN KEY (UserId) REFERENCES users_info(UserId)
);


CREATE OR REPLACE VIEW users_Info_view
AS
SELECT users_info.*,users_access.Username,users_access.Password FROM users_info 
JOIN users_access ON users_info.UserId = users_access.UserId;


CREATE OR REPLACE VIEW access_history_view
AS
SELECT users_info.EntityNo,concat(users_info.FirstName,' ',users_info.LastName) AS "FullName",users_info.Email,access_history.LoginTime FROM access_history 
JOIN users_info ON access_history.UserId = users_info.UserId;