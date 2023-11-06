-- Active: 1695210957650@@localhost@5432@postgres

CREATE TABLE
    Users(
        id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        email varchar(30) NOT NULL,
        password varchar(18),
        firstname varchar(25) NOT NULL,
        lastname varchar(25) NOT NULL,
        emailConfirmation BOOLEAN NOT NULL,
        resetPassword BOOLEAN NULL,
        avatar varchar(15),
        registrationDate TIMESTAMP NOT NULL,
        role int NOT NULL
    );

CREATE TABLE
    Portfolio(
        id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        user_id int NOT NULL,
        name varchar(30) NOT NULL,
        categorie varchar(30) NOT NULL,
        created_at TIMESTAMP NOT NULL,
        CONSTRAINT userid FOREIGN KEY(user_id) REFERENCES Users(id)
    );

CREATE TABLE
    Project(
        id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        portfolio_id int NOT NULL,
        image varchar(15) NOT NULL,
        title varchar(30) NOT NULL,
        categorie varchar(30) NOT NULL,
        created_at TIMESTAMP NOT NULL,
        CONSTRAINT portfolioid FOREIGN KEY(portfolio_id) REFERENCES Portfolio(id)
    );

CREATE TABLE
    Page(
        id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        project_id int NOT NULL,
        image varchar(15) NOT NULL,
        title varchar(30) NOT NULL,
        content TEXT NOT NULL,
        created_at TIMESTAMP NOT NULL,
        CONSTRAINT projectid FOREIGN KEY(project_id) REFERENCES Project(id)
    );

CREATE TABLE
    Contact(
        id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        user_id int NOT NULL,
        linkedin varchar(30) NULL,
        twitter varchar(30) NULL,
        facebook varchar(30) NULL,
        email varchar(30) NULL,
        github varchar(30) NULL,
        tel varchar(10) NULL,
        CONSTRAINT userid FOREIGN KEY(user_id) REFERENCES Users(id)
    );

CREATE TABLE
    Comments(
        id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        portfolio_id int NOT NULL,
        image varchar(15) NOT NULL,
        title varchar(30) NOT NULL,
        content TEXT NOT NULL,
        created_at TIMESTAMP NOT NULL,
        CONSTRAINT portfolioid FOREIGN KEY(portfolio_id) REFERENCES Portfolio(id)
    );