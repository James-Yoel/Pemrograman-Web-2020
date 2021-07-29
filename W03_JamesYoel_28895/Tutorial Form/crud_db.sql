USE crud_db;

CREATE TABLE users(
    id int(11) NOT NULL auto_increment,
    name VARCHAR(100),
    email VARCHAR(50),
    mobile VARCHAR(15),
    PRIMARY KEY (id)
);

