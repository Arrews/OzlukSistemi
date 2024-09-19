CREATE TABLE `classroom` (
  `classroom_id` int(11) NOT NULL AUTO_INCREMENT,
  `classroom_name` varchar(255) DEFAULT NULL,
  `classroom_capacity` int(11) DEFAULT NULL,
  `classroom_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`classroom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO classroom VALUES ('4', 'c', '21', 'Geçici');
INSERT INTO classroom VALUES ('6', 'Lab-7', '60', 'Bilgisayar Laboratuvarı');
INSERT INTO classroom VALUES ('7', 'asd', '123', 'Elektronik Laboratuvarı');
INSERT INTO classroom VALUES ('8', 'asdd', '123', 'Elektronik Laboratuvarı');
INSERT INTO classroom VALUES ('9', 'asd231', '123', 'Sınıf');
INSERT INTO classroom VALUES ('10', 'basd', '32', 'Bilgisayar Laboratuvarı');
INSERT INTO classroom VALUES ('11', 'Sınıf1asd', '30', 'Sınıf');
INSERT INTO classroom VALUES ('12', 'Sınıf134', '30', 'Sınıf');
INSERT INTO classroom VALUES ('13', 'adminkadir', '32', 'Otomotiv Atölyesi');
INSERT INTO classroom VALUES ('14', 'Bil-Lab7', '80', 'Bilgisayar Laboratuvarı');
INSERT INTO classroom VALUES ('15', 'Bil-Lab2', '60', 'Bilgisayar Laboratuvarı');
INSERT INTO classroom VALUES ('16', 'E12', '100', 'Sınıf');
INSERT INTO classroom VALUES ('17', 'Bil-Lab3', '70', 'Bilgisayar Laboratuvarı');


CREATE TABLE `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) DEFAULT NULL,
  `course_mandatory` tinyint(1) DEFAULT NULL,
  `course_length` decimal(4,2) NOT NULL,
  `program_id` int(11) NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `fk_program` (`program_id`),
  CONSTRAINT `fk_program` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO course VALUES ('25', 'Philosophy', '0', '12.25', '6');
INSERT INTO course VALUES ('26', 'Economics', '1', '11.00', '6');
INSERT INTO course VALUES ('27', 'Sociology', '0', '13.00', '6');
INSERT INTO course VALUES ('28', 'Psychology', '1', '14.50', '6');
INSERT INTO course VALUES ('29', 'Political Sci', '0', '9.50', '6');
INSERT INTO course VALUES ('30', 'Music Theory', '1', '8.75', '6');
INSERT INTO course VALUES ('31', 'Drama Class', '0', '7.25', '6');
INSERT INTO course VALUES ('32', 'French Lang', '1', '12.00', '6');
INSERT INTO course VALUES ('34', 'German Lang', '1', '11.50', '6');
INSERT INTO course VALUES ('35', 'Japanese', '0', '14.00', '6');
INSERT INTO course VALUES ('36', 'Chinese', '1', '13.75', '6');
INSERT INTO course VALUES ('37', 'Algebra', '1', '15.00', '6');
INSERT INTO course VALUES ('38', 'Geometry', '0', '10.25', '6');
INSERT INTO course VALUES ('39', 'Calculus', '1', '14.75', '6');
INSERT INTO course VALUES ('40', 'Statistics', '0', '9.25', '6');
INSERT INTO course VALUES ('41', 'Astronomy', '1', '12.50', '6');
INSERT INTO course VALUES ('42', 'Botany', '0', '10.00', '6');
INSERT INTO course VALUES ('43', 'Zoology', '1', '11.25', '6');
INSERT INTO course VALUES ('44', 'Geography', '0', '13.00', '6');
INSERT INTO course VALUES ('47', 'aaaa', '1', '2.00', '6');
INSERT INTO course VALUES ('48', 'test1234', '1', '2.00', '6');
INSERT INTO course VALUES ('49', 'testkadir', '1', '1.00', '6');
INSERT INTO course VALUES ('50', 'kadirtest', '1', '2.00', '6');
INSERT INTO course VALUES ('53', 'aaaakadir', '1', '3.00', '6');
INSERT INTO course VALUES ('55', 'Sunucu İşletim Sistemleri', '0', '3.45', '6');
INSERT INTO course VALUES ('56', 'Görsel Programlama-II', '1', '3.45', '6');
INSERT INTO course VALUES ('57', 'İşletme Yönetimi', '0', '1.45', '6');
INSERT INTO course VALUES ('58', 'Sistem Analizi ve Tasarımı', '1', '3.45', '6');
INSERT INTO course VALUES ('59', 'Nesne Tabanlı Programlama-II', '1', '3.45', '6');
INSERT INTO course VALUES ('60', 'Mesleki Yabancı Dil-II', '1', '1.45', '6');
INSERT INTO course VALUES ('61', 'İnternet Programcılığı-II', '1', '3.45', '6');
INSERT INTO course VALUES ('64', 'Bitki Bilimi', '1', '2.00', '6');
INSERT INTO course VALUES ('65', 'Kimya', '1', '4.00', '6');


CREATE TABLE `courseschedule` (
  `CS_id` int(11) NOT NULL AUTO_INCREMENT,
  `timetable_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `lecturer_id` int(11) DEFAULT NULL,
  `classroom_id` int(11) DEFAULT NULL,
  `course_start` int(11) DEFAULT NULL,
  `course_end` int(11) DEFAULT NULL,
  `course_day` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CS_id`),
  KEY `courseschedule_ibfk_1` (`timetable_id`),
  KEY `courseschedule_ibfk_2` (`course_id`),
  KEY `courseschedule_ibfk_3` (`program_id`),
  KEY `courseschedule_ibfk_4` (`lecturer_id`),
  KEY `courseschedule_ibfk_5` (`classroom_id`),
  CONSTRAINT `courseschedule_ibfk_1` FOREIGN KEY (`timetable_id`) REFERENCES `timetable` (`timetable_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `courseschedule_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `courseschedule_ibfk_3` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `courseschedule_ibfk_4` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturer` (`lecturer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `courseschedule_ibfk_5` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`classroom_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO courseschedule VALUES ('75', '1', '41', '6', '75', '17', '6', '9', 'Pazartesi');
INSERT INTO courseschedule VALUES ('76', '1', '42', '6', '46', '15', '1', '4', 'Pazartesi');
INSERT INTO courseschedule VALUES ('77', '1', '44', '6', '47', '9', '2', '5', 'Pazartesi');
INSERT INTO courseschedule VALUES ('78', '1', '40', '6', '53', '14', '2', '2', 'Pazartesi');
INSERT INTO courseschedule VALUES ('81', '1', '40', '6', '65', '15', '1', '3', 'Persembe');
INSERT INTO courseschedule VALUES ('83', '1', '34', '6', '65', '16', '6', '8', 'Persembe');
INSERT INTO courseschedule VALUES ('87', '1', '26', '6', '46', '13', '6', '9', 'Cuma');


CREATE TABLE `lecturer` (
  `lecturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `lecturer_name` varchar(255) DEFAULT NULL,
  `lecturer_status` tinyint(1) DEFAULT NULL,
  `lecturer_mail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`lecturer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO lecturer VALUES ('16', 'Kaiys', '0', 'emirl@gmail.com');
INSERT INTO lecturer VALUES ('18', 'Ufuk', '1', 'ufuk@eleman.com');
INSERT INTO lecturer VALUES ('19', 'Emir Efe ÖNAL', '0', 'nerwat06@g');
INSERT INTO lecturer VALUES ('20', 'A', '1', 'a@abc.com');
INSERT INTO lecturer VALUES ('21', 'Emir Efe ÖNAL', '1', 'emirefasfe.onal@gmail.com');
INSERT INTO lecturer VALUES ('22', 'B', '0', 'b@abc.com');
INSERT INTO lecturer VALUES ('23', 'asd asd', '0', '123123413123@gmail.com');
INSERT INTO lecturer VALUES ('24', 'c', '1', 'cccc@abc.com');
INSERT INTO lecturer VALUES ('25', 'asdf', '1', 'asdk@gm');
INSERT INTO lecturer VALUES ('26', 'asd', '1', 'hsdf');
INSERT INTO lecturer VALUES ('27', 'd', '1', 'd@abc.com');
INSERT INTO lecturer VALUES ('28', 'qweqaxd', '1', 'qwedas');
INSERT INTO lecturer VALUES ('29', 'asdas', '0', '3qrweasdxzc');
INSERT INTO lecturer VALUES ('30', 'e', '0', 'e@abc.com');
INSERT INTO lecturer VALUES ('31', '12ewqsda', '1', '12weqdsa');
INSERT INTO lecturer VALUES ('32', '42rwefsd', '0', '253rwedsf');
INSERT INTO lecturer VALUES ('33', 'f', '0', 'f@abc.com');
INSERT INTO lecturer VALUES ('34', '63215qrwe', '1', '624twerfsd');
INSERT INTO lecturer VALUES ('36', 'İlker', '1', 'ilker@ilker.com');
INSERT INTO lecturer VALUES ('37', 'John Doe', '1', 'john.doe@mail.com');
INSERT INTO lecturer VALUES ('38', 'Jane Smith', '0', 'jane.smith@mail.com');
INSERT INTO lecturer VALUES ('39', 'Mark Evans', '1', 'mark.evans@mail.com');
INSERT INTO lecturer VALUES ('40', 'Lucy Hale', '1', 'lucy.hale@mail.com');
INSERT INTO lecturer VALUES ('41', 'James Bond', '0', 'james.bond@mail.com');
INSERT INTO lecturer VALUES ('42', 'Laura Croft', '1', 'laura.croft@mail.com');
INSERT INTO lecturer VALUES ('43', 'Tom Hardy', '0', 'tom.hardy@mail.com');
INSERT INTO lecturer VALUES ('44', 'Emma Stone', '1', 'emma.stone@mail.com');
INSERT INTO lecturer VALUES ('45', 'Chris Pine', '0', 'chris.pine@mail.com');
INSERT INTO lecturer VALUES ('46', 'Amy Adams', '1', 'amy.adams@mail.com');
INSERT INTO lecturer VALUES ('47', 'Brad Pitt', '0', 'brad.pitt@mail.com');
INSERT INTO lecturer VALUES ('48', 'Hugh Jackman', '1', 'hugh.jackman@mail.com');
INSERT INTO lecturer VALUES ('49', 'Cate Blanchet', '0', 'cate.blanchet@mail.com');
INSERT INTO lecturer VALUES ('50', 'Matt Damon', '1', 'matt.damon@mail.com');
INSERT INTO lecturer VALUES ('51', 'Liv Tyler', '0', 'liv.tyler@mail.com');
INSERT INTO lecturer VALUES ('52', 'Will Smith', '1', 'will.smith@mail.com');
INSERT INTO lecturer VALUES ('53', 'Ava Taylor', '0', 'ava.taylor@mail.com');
INSERT INTO lecturer VALUES ('54', 'Tom Cruise', '1', 'tom.cruise@mail.com');
INSERT INTO lecturer VALUES ('55', 'Ryan Gosling', '0', 'ryan.gosling@mail.com');
INSERT INTO lecturer VALUES ('56', 'Halle Berry', '1', 'halle.berry@mail.com');
INSERT INTO lecturer VALUES ('57', 'Gary Oldman', '0', 'gary.oldman@mail.com');
INSERT INTO lecturer VALUES ('58', 'Eva Green', '1', 'eva.green@mail.com');
INSERT INTO lecturer VALUES ('59', 'Bill Murray', '0', 'bill.murray@mail.com');
INSERT INTO lecturer VALUES ('60', 'Zoe Saldana', '1', 'zoe.saldana@mail.com');
INSERT INTO lecturer VALUES ('61', 'Idris Elba', '0', 'idris.elba@mail.com');
INSERT INTO lecturer VALUES ('62', 'Tina Fey', '1', 'tina.fey@mail.com');
INSERT INTO lecturer VALUES ('63', 'Ken Watanabe', '0', 'ken.watanabe@mail.com');
INSERT INTO lecturer VALUES ('64', 'Mila Kunis', '1', 'mila.kunis@mail.com');
INSERT INTO lecturer VALUES ('65', 'Tom Hank', '0', 'tom.hanks@mail.com');
INSERT INTO lecturer VALUES ('66', 'Keira Knight', '1', 'keira.knight@mail.com');
INSERT INTO lecturer VALUES ('67', 'Madison Beer', '0', 'madisonbeer@mail.com');
INSERT INTO lecturer VALUES ('71', 'EMİN CAN KALKANLI', '0', 'kalkanemin97@gmail.com');
INSERT INTO lecturer VALUES ('74', 'Şeymanur Güneri', '1', 'seymanurguneri0@gmail.com');
INSERT INTO lecturer VALUES ('75', 'adminKadir', '1', 'kadir@yetkili.com');
INSERT INTO lecturer VALUES ('76', 'Coşkun HARMANŞAH', '1', 'coskun@harmansah.com');
INSERT INTO lecturer VALUES ('77', 'Volkan SÖZERİ', '1', 'volkan@sozeri.com');
INSERT INTO lecturer VALUES ('78', 'Özlem Arınık TOPUZ', '1', 'ozlem@topuz.com');
INSERT INTO lecturer VALUES ('79', 'Duygu BAĞCI DAŞ', '1', 'duygu@bagcidas.com');


CREATE TABLE `period` (
  `period_no` int(2) NOT NULL,
  `period_start` time NOT NULL,
  `period_end` time NOT NULL,
  PRIMARY KEY (`period_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO period VALUES ('1', '08:15:00', '09:00:00');
INSERT INTO period VALUES ('2', '09:15:00', '10:00:00');
INSERT INTO period VALUES ('3', '10:15:00', '11:00:00');
INSERT INTO period VALUES ('4', '11:15:00', '12:00:00');
INSERT INTO period VALUES ('5', '12:00:00', '12:45:00');
INSERT INTO period VALUES ('6', '13:00:00', '13:45:00');
INSERT INTO period VALUES ('7', '14:00:00', '14:45:00');
INSERT INTO period VALUES ('8', '15:00:00', '15:45:00');
INSERT INTO period VALUES ('9', '16:00:00', '16:45:00');


CREATE TABLE `program` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_name` varchar(255) DEFAULT NULL,
  `program_class` int(11) DEFAULT NULL,
  `program_headcount` int(11) DEFAULT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO program VALUES ('6', 'Bilgisayar Programcılığı-II', '2', '120');
INSERT INTO program VALUES ('7', 'Bilgisayar Programcılığı-I', '1', '97');
INSERT INTO program VALUES ('8', 'teste', '1', '12');
INSERT INTO program VALUES ('9', 'testasd1ewqsda', '1', '12');
INSERT INTO program VALUES ('10', 'Botanik', '1', '120');
INSERT INTO program VALUES ('11', 'Bilgisayar Mühendisliği', '1', '24');


CREATE TABLE `timetable` (
  `timetable_id` int(11) NOT NULL AUTO_INCREMENT,
  `timetable_semester` varchar(255) DEFAULT NULL,
  `timetable_year` int(11) DEFAULT NULL,
  `dayStart` time DEFAULT NULL,
  `dayEnd` time DEFAULT NULL,
  PRIMARY KEY (`timetable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO timetable VALUES ('1', 'Bahar', '2024', '08:15:00', '16:45:00');


CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_perm` tinyint(1) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_mail` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users VALUES ('2', 'root', '4', 'root', 'root@root.com');
INSERT INTO users VALUES ('3', 'Emir Efe ÖNAL', '4', '12345', 'ornek@gmail.com');
INSERT INTO users VALUES ('4', 'Eray Erdoğan', '4', 'eray', 'eray@eray.com');
INSERT INTO users VALUES ('5', 'Tolga Abi', '4', 'tolga', 'tolga@gmail.com');
INSERT INTO users VALUES ('6', 'Kadir Şahin', '4', 'kadir', 'kadir@kadir.com');
INSERT INTO users VALUES ('7', 'Emin Can Kalkanlı', '4', 'emin', 'emin@emin.com');
INSERT INTO users VALUES ('8', 'Kadir Şahin (Yetkisiz)', '0', 'kadir', 'kadir@yetkisiz.com');


