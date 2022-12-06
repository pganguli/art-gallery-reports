CREATE DATABASE art_gallery;
USE art_gallery;

CREATE TABLE artgroup (
    name VARCHAR(25),
    PRIMARY KEY(name)
);

CREATE TABLE artist (
    name VARCHAR(25),
    birthplace VARCHAR(100),
    age INTEGER,
    group_name VARCHAR(25),
    PRIMARY KEY (name),
    FOREIGN KEY (group_name) REFERENCES artgroup(name)
);

CREATE TABLE artwork (
    name VARCHAR(25),
    year DATE,
    style_name VARCHAR(25),
    price DECIMAL,
    artist_name VARCHAR(25),
    group_name VARCHAR(25),
    PRIMARY KEY (name),
    FOREIGN KEY (artist_name) REFERENCES artist(name),
    FOREIGN KEY (group_name) REFERENCES artgroup(name)
);

CREATE TABLE customer (
    name VARCHAR(25),
    address VARCHAR(100),
    expenditure DECIMAL,
    PRIMARY KEY (name)
);

CREATE TABLE fav_artists (
    cust_name VARCHAR(25),
    artist_name VARCHAR(25),
    PRIMARY KEY (cust_name, artist_name),
    FOREIGN KEY (cust_name) REFERENCES customer(name),
    FOREIGN KEY (artist_name) REFERENCES artist(name)
);

CREATE TABLE fav_groups (
    cust_name VARCHAR(25),
    group_name VARCHAR(25),
    PRIMARY KEY (cust_name, group_name),
    FOREIGN KEY (cust_name) REFERENCES customer(name),
    FOREIGN KEY (group_name) REFERENCES artgroup(name)
);

CREATE TABLE transactions (
    id INT NOT NULL AUTO_INCREMENT,
    art_name VARCHAR(25),
    cust_name VARCHAR(25),
    day DATE,
    PRIMARY KEY (id),
    FOREIGN KEY (art_name) REFERENCES artwork(name),
    FOREIGN KEY (cust_name) REFERENCES customer(name)
);
