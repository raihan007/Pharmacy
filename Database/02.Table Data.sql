INSERT INTO `users_info` (`EntityNo`, `UserId`, `FirstName`, `LastName`, `Gender`, `Email`, `Photo`, `PermanentAddress`, `PresentAddress`, `PhoneNo`, `Birthdate`, `BloodGroup`, `NationalIdNo`, `JoinDate`, `Role`, `LastChanged`, `LastChangedBy`) VALUES (2, '5925025E-8C57-48C7-BB68-187A52F26926', 'Raihan', 'Talukder', 'Male', 'raihan.cse92@gmail.com', '5925025E-8C57-48C7-BB68-187A52F26926.jpg', '257,East Goran,Dhaka-1219', '257,East Goran,Dhaka-1219', '01685072115', '1993-08-10', 'O+', '10-08-1992-raihan', '2016-09-15 15:36:55', 'Manager','2016-09-09 15:12:42', NULL), (3, 'FC9F2761-3F2B-41D3-8523-1AA438454193', 'Mr. Korim', 'Ali', 'Male', 'korim_it_coaching@gmail.com', 'E4CFB1F7-E63A-4659-BAE1-C1CDC66ECB3F.jpg', 'Bangladesh', 'Bangladesh', '+880170000000', '2016-09-13', 'A+', '10-08-1992-raihan', '2016-09-15 15:36:55', 'Employee', '2016-09-10 07:15:45', NULL)

-- dt_user_permissions

INSERT INTO `dt_user_permission` (`EntityNo`, `UserId`, `PermissionNo`, `LastChanged`, `LastChangedBy`) VALUES
(1, '5925025E-8C57-48C7-BB68-187A52F26926', 1000, '2016-09-19 20:35:08', '5925025E-8C57-48C7-BB68-187A52F26926'),
(2, '5925025E-8C57-48C7-BB68-187A52F26926', 1001, '2016-09-19 20:35:08', '5925025E-8C57-48C7-BB68-187A52F26926'),
(3, '5925025E-8C57-48C7-BB68-187A52F26926', 1002, '2016-09-19 20:35:08', '5925025E-8C57-48C7-BB68-187A52F26926'),
(4, '5925025E-8C57-48C7-BB68-187A52F26926', 1003, '2016-09-19 20:35:08', '5925025E-8C57-48C7-BB68-187A52F26926'),
(5, 'FC9F2761-3F2B-41D3-8523-1AA438454193', 2001, '2016-09-19 22:20:07', '5925025E-8C57-48C7-BB68-187A52F26926'),
(6, 'FC9F2761-3F2B-41D3-8523-1AA438454193', 2000, '2016-09-19 22:20:07', '5925025E-8C57-48C7-BB68-187A52F26926');

-- users_access

INSERT INTO `users_access` (`EntityNo`, `UserId`, `Username`, `Password`) VALUES
(2, '5925025E-8C57-48C7-BB68-187A52F26926', 'raihan', '8854e89fab187685f0492556f2ef73d97505f541a2bbeea22a4eb59d1534f3aadcc7a97a70d2f4137988971638a59653c459a9f8d4427eab43369894905b7e1c'),
(1, 'FC9F2761-3F2B-41D3-8523-1AA438454193', 'Raihan_007', '$2y$10$dOfNhzhE9c37IMIkg9ORi.DmbK6Qloq5GAcLnuZDcExd5YnSb9d9S');


--- access_history

INSERT INTO `access_history` (`EntityNo`, `UserId`, `LoginTime`) VALUES
(1, '5925025E-8C57-48C7-BB68-187A52F26926', '2016-09-15 13:22:54'),
(2, 'FC9F2761-3F2B-41D3-8523-1AA438454193', '2016-09-15 13:22:54'),
(3, 'FC9F2761-3F2B-41D3-8523-1AA438454193', '2016-09-15 13:23:21'),
(4, '5925025E-8C57-48C7-BB68-187A52F26926', '2016-09-15 13:23:21'),
(5, 'FC9F2761-3F2B-41D3-8523-1AA438454193', '2016-07-12 12:20:30'),
(6, '5925025E-8C57-48C7-BB68-187A52F26926', '2016-06-14 08:14:21');


--- dealers_info

INSERT INTO `dealers_info` (`EntityNo`, `DealerId`, `DealerTitle`, `DealerAddress`, `City`, `Country`, `Phone`, `Email`, `Fax`, `Remarks`, `LastChanged`, `LastChangedBy`) VALUES
(1, '5E90F9A9-13E7-46D8-923D-C60F325E6B9D', 'Acme Pharmaceutical (Pvt.) Ltd.', 'House # 5, Road # 12/A, Satmosjit Road, Dhanmondi', 'Dhaka - 1209', 'Bangladesh', '+880-2-8118692', 'acme@acme.net', '+880-2-9340140', 'Leading Medicine Importers, Exporters & Distributors', '2016-09-24 06:21:48', '5925025E-8C57-48C7-BB68-187A52F26926'),
(2, 'C442A171-5196-4CF4-A8E6-101E12584A03', 'A.N. International Ltd.', 'Prachi-Niket, (5th floor), 54, Dilkusha C/A, Motijheel', 'Dhaka - 1000', 'Bangladesh', '+880-2-9553616, 9555150', 'a.n.inter@gmail.com', '+880-2-9567672', 'Leading Medicine Importers, Exporters & Distributors', '2016-09-24 08:26:45', '5925025E-8C57-48C7-BB68-187A52F26926'),
(3, 'A0E739AA-4B6C-4488-99FB-18ED643EFA69', 'Alfa Scientific Co.', '33/3 Hatkhola Road', 'Dhaka - 1203', 'Bangladesh', '+880-2-7114325, 7113296', 'alfa@gmail.com', '+880-2-9567736', 'Exclusive Distributor of HITACHI?s Analytical & Quality Control (QC) Equipments with General & Life Science Products from Bibby Scientific (Jenway, Stuart & Techno) in Bangladesh.', '2016-09-25 18:34:01', '5925025E-8C57-48C7-BB68-187A52F26926'),
(4, '6F8E82A1-E1A6-46E3-8BFB-8A8EAA2FA508', 'Hyeimpex International (Pvt.) Ltd.', 'A.M. Plaza (3rd floor), 76 DIT Road, Malibagh', 'Dhaka - 1217', 'Bangladesh', '+880-2-8316895, 8321468', 'hyeimpex@gmail.com', '+880-2-8316897', 'Leading Medicine Importers, Exporters & Distributors', '2016-09-25 18:41:55', '5925025E-8C57-48C7-BB68-187A52F26926'),
(5, 'BDC46075-E491-4639-AF0F-F58F9FD38F78', 'S.A. Surgicals', '5/2, Topkhana Road, BMA Bhaban, Shop 7, (1st Floor)', 'Dhaka-1000', 'Bangladesh', '9587428, 01977-699111', 's.a.surgicals@ymail.com', '+88-02-9577540', '', '2016-09-25 18:44:42', '5925025E-8C57-48C7-BB68-187A52F26926'),
(6, 'ADA958AF-8A82-46DF-909B-00BADAF50123', 'Surgicals', 'dvfdgfd', 'Dhaka-1000', 'Bangladesh', '9587428, 01977-699111', 'surgicals@ymail.com', '+88-02-9577540', '', '2016-09-25 18:46:10', '5925025E-8C57-48C7-BB68-187A52F26926');

