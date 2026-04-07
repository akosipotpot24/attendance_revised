-- =====================================
-- CREATE DATABASE
-- =====================================
CREATE DATABASE IF NOT EXISTS school_db;
USE school_db;

-- =====================================
-- TABLE: students
-- =====================================
CREATE TABLE students (
    student_number VARCHAR(10) PRIMARY KEY,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    gender VARCHAR(10),
    section VARCHAR(20)
);

INSERT INTO students VALUES
('2024001','Juan','Dela Cruz','Male','BSIT'),
('2024002','Maria','Santos','Female','BSIT'),
('2024003','Pedro','Reyes','Male','BSBA'),
('2024004','Ana','Garcia','Female','BSBA'),
('2024005','Luis','Torres','Male','BSIT'),
('2024006','Liza','Flores','Female','BSCS'),
('2024007','Mark','Gomez','Male','BSCS'),
('2024008','Jane','Lopez','Female','BSIT'),
('2024009','Carlo','Mendoza','Male','BSBA'),
('2024010','Ella','Castro','Female','BSCS'),
('2024011','Noel','Ramos','Male','BSIT'),
('2024012','Ivy','Aquino','Female','BSBA'),
('2024013','Paul','Navarro','Male','BSCS'),
('2024014','Rose','Diaz','Female','BSIT'),
('2024015','Jake','Villanueva','Male','BSBA'),
('2024016','Mia','Soriano','Female','BSCS'),
('2024017','Ken','Valdez','Male','BSIT'),
('2024018','Lea','Ortega','Female','BSBA'),
('2024019','Ryan','Cruz','Male','BSCS'),
('2024020','Nina','Morales','Female','BSIT'),
('2024021','Alex','Perez','Male','BSIT'),
('2024022','Joy','Herrera','Female','BSBA'),
('2024023','Ivan','Gutierrez','Male','BSCS'),
('2024024','Kate','Domingo','Female','BSIT'),
('2024025','Sam','Salazar','Male','BSBA'),
('2024026','Chloe','Marquez','Female','BSCS'),
('2024027','Leo','Fernandez','Male','BSIT'),
('2024028','Ava','De Leon','Female','BSBA'),
('2024029','Josh','Castillo','Male','BSCS'),
('2024030','Bea','Padilla','Female','BSIT'),
('2024031','Ethan','Aguilar','Male','BSIT'),
('2024032','Zoe','Pascual','Female','BSBA'),
('2024033','Kyle','Espino','Male','BSCS'),
('2024034','Faith','Rosales','Female','BSIT'),
('2024035','Sean','Bautista','Male','BSBA'),
('2024036','Clara','Galang','Female','BSCS'),
('2024037','Miguel','Sarmiento','Male','BSIT'),
('2024038','Angel','Yap','Female','BSBA'),
('2024039','Nathan','Tan','Male','BSCS'),
('2024040','Lily','Uy','Female','BSIT'),
('2024041','Adrian','Co','Male','BSIT'),
('2024042','Bianca','Lim','Female','BSBA'),
('2024043','Dylan','Sy','Male','BSCS'),
('2024044','Ella','Chua','Female','BSIT'),
('2024045','Marco','Go','Male','BSBA'),
('2024046','Trish','Ong','Female','BSCS'),
('2024047','Vince','Dy','Male','BSIT'),
('2024048','Grace','Ang','Female','BSBA'),
('2024049','Caleb','Tan','Male','BSCS'),
('2024050','Iris','Lee','Female','BSIT');

-- =====================================
-- TABLE: attendance
-- =====================================
CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_number VARCHAR(10),
    date DATE,
    time_in TIME,
    FOREIGN KEY (student_number) REFERENCES students(student_number)
);

INSERT INTO attendance (student_number, date, time_in) VALUES
('2024001','2026-04-01','08:00:00'),
('2024002','2026-04-01','08:05:00'),
('2024003','2026-04-01','08:10:00'),
('2024004','2026-04-01','08:15:00'),
('2024005','2026-04-01','08:20:00'),
('2024006','2026-04-01','08:25:00'),
('2024007','2026-04-01','08:30:00'),
('2024008','2026-04-01','08:35:00'),
('2024009','2026-04-01','08:40:00'),
('2024010','2026-04-01','08:45:00'),
('2024001','2026-04-02','08:01:00'),
('2024002','2026-04-02','08:06:00'),
('2024003','2026-04-02','08:11:00'),
('2024004','2026-04-02','08:16:00'),
('2024005','2026-04-02','08:21:00'),
('2024006','2026-04-02','08:26:00'),
('2024007','2026-04-02','08:31:00'),
('2024008','2026-04-02','08:36:00'),
('2024009','2026-04-02','08:41:00'),
('2024010','2026-04-02','08:46:00');

-- =====================================
-- TABLE: subjects
-- =====================================
CREATE TABLE subjects (
    subject_id INT AUTO_INCREMENT PRIMARY KEY,
    subject_name VARCHAR(100),
    units INT
);

INSERT INTO subjects (subject_name, units) VALUES
('Database Systems',3),
('Programming 1',3),
('Programming 2',3),
('Web Development',3),
('Data Structures',3),
('Operating Systems',3),
('Networking',3),
('Software Engineering',3),
('Information Security',3),
('Data Analytics',3);

-- =====================================
-- TABLE: teachers
-- =====================================
CREATE TABLE teachers (
    teacher_id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    department VARCHAR(50)
);

INSERT INTO teachers (firstname, lastname, department) VALUES
('John','Smith','IT'),
('Anna','Brown','IT'),
('David','Wilson','Business'),
('Sarah','Taylor','CS'),
('Michael','Anderson','IT'),
('Laura','Thomas','CS'),
('James','Jackson','Business'),
('Emma','White','IT'),
('Daniel','Harris','CS'),
('Sophia','Martin','IT');

-- =====================================
-- TABLE: classes
-- =====================================
CREATE TABLE classes (
    class_id INT AUTO_INCREMENT PRIMARY KEY,
    subject_id INT,
    teacher_id INT,
    section VARCHAR(20),
    FOREIGN KEY (subject_id) REFERENCES subjects(subject_id),
    FOREIGN KEY (teacher_id) REFERENCES teachers(teacher_id)
);

INSERT INTO classes (subject_id, teacher_id, section) VALUES
(1,1,'BSIT'),
(2,2,'BSIT'),
(3,3,'BSBA'),
(4,4,'BSCS'),
(5,5,'BSIT'),
(6,6,'BSCS'),
(7,7,'BSBA'),
(8,8,'BSIT'),
(9,9,'BSCS'),
(10,10,'BSIT');

-- =====================================
-- TABLE: enrollments
-- =====================================
CREATE TABLE enrollments (
    enrollment_id INT AUTO_INCREMENT PRIMARY KEY,
    student_number VARCHAR(10),
    class_id INT,
    FOREIGN KEY (student_number) REFERENCES students(student_number),
    FOREIGN KEY (class_id) REFERENCES classes(class_id)
);

INSERT INTO enrollments (student_number, class_id) VALUES
('2024001',1),
('2024002',1),
('2024003',3),
('2024004',3),
('2024005',1),
('2024006',4),
('2024007',4),
('2024008',1),
('2024009',3),
('2024010',4);

-- =====================================
-- TABLE: grades
-- =====================================
CREATE TABLE grades (
    grade_id INT AUTO_INCREMENT PRIMARY KEY,
    student_number VARCHAR(10),
    subject_id INT,
    grade DECIMAL(5,2),
    FOREIGN KEY (student_number) REFERENCES students(student_number),
    FOREIGN KEY (subject_id) REFERENCES subjects(subject_id)
);

INSERT INTO grades (student_number, subject_id, grade) VALUES
('2024001',1,1.75),
('2024002',1,2.00),
('2024003',3,1.50),
('2024004',3,2.25),
('2024005',1,1.25),
('2024006',4,1.75),
('2024007',4,2.00),
('2024008',1,1.50),
('2024009',3,2.50),
('2024010',4,1.75);