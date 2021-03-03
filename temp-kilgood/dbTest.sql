CREATE TABLE users (
    idUser INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    useFirst VARCHAR(255) NOT NULL,
    useLast VARCHAR(255) NOT NULL,
    useEmail VARCHAR(255) NOT NULL,
    useUid VARCHAR(255) NOT NULL,
    usePwd VARCHAR(255) NOT NULL
);

INSERT INTO users (useFirst, useLast, useEmail, useUid, usePwd)
    VALUES('Killian', 'Good', 'killian.good@eduvaud.ch', 'admin', 'admin');