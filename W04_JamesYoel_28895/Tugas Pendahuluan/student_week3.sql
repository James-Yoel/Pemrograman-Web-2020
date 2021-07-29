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
    Email VARCHAR(50),
    Pass VARCHAR(20),
    Salt VARCHAR(10)
);
/*pass: abcde*/
INSERT INTO user(Email, Pass, Salt) VALUES("admin@umn.ac.id", "179730a03f8b8292b202db7e7b649edf", "admin"), ("agung@umn.ac.id", "6e33ab487ef8998248b6153fd9a54079", "coba");
