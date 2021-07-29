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