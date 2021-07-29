CREATE database student_week3;
USE student_week3;

CREATE TABLE student(
    id INTEGER NOT NULL AUTO_INCREMENT,
    studentId BIGINT,
    namaDepan VARCHAR(20),
    namaBelakang VARCHAR(20),
    deskripsi VARCHAR(200),
    PRIMARY KEY (id)
);

CREATE TABLE user(
    email VARCHAR(50),
    password VARCHAR(100),
    PRIMARY KEY (email)
);

INSERT INTO user(email, password) VALUE('admin@umn.ac.id', '7f587eca6386321f07073c00be7e1224');