PRAGMA foreign_keys = ON;
.mode columns
.headers on
. nullvalue NULL

DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Story;
DROP TABLE IF EXISTS Comment;
DROP TABLE IF EXISTS SavedStory;
DROP TABLE IF EXISTS TasteChoice;
DROP TABLE IF EXISTS TasteChoiceUser;

CREATE TABLE Users (
  user_id INTEGER PRIMARY KEY AUTOINCREMENT,
  username VARCHAR NOT NULL UNIQUE,
  email VARCHAR NOT NULL,
  birthdate DATE,
  photo VARCHAR,
  password VARCHAR NOT NULL,
  gender VARCHAR NOT NULL
);

CREATE TABLE Story (
  story_id INTEGER PRIMARY KEY AUTOINCREMENT,
  writer_id INTEGER REFERENCES Users,
  title VARCHAR NOT NULL,
  likes INTEGER NOT NULL,
  dislikes INTEGER NOT NULL,
  text VARCHAR NOT NULL,
  photo VARCHAR,
  id_taste INTEGER NOT NULL
);

CREATE TABLE Comment (
  id_comment INTEGER PRIMARY KEY AUTOINCREMENT,
  story_id INTEGER REFERENCES Story,
  user_id INTEGER REFERENCES Users,
  likes INTEGER NOT NULL,
  dislikes INTEGER NOT NULL,
  text VARCHAR NOT NULL
);

CREATE TABLE TasteChoice (
  id_taste INTEGER PRIMARY KEY AUTOINCREMENT,
  taste VARCHAR NOT NULL
);

CREATE TABLE TasteChoiceUser (
  id_taste INTEGER,
  user_id INTEGER REFERENCES Users,
  PRIMARY KEY(user_id, id_taste)
);

CREATE TABLE SavedStory (
  user_id INTEGER REFERENCES Users,
  story_id INTEGER REFERENCES Story,
  PRIMARY KEY(user_id, story_id)
);

INSERT INTO Users (user_id, username, email, birthdate, photo, password, gender) Values (1, 'lorem', 'lorem@gmail.com', '1998-12-03', 'lorem.jpg', 'asdfg', 'male');
INSERT INTO Users (username, email, birthdate, photo, password, gender) Values ('lorina', 'lorina@gmail.com', '1998-12-03', 'lorina.jpg', 'asdfghj', 'female');

INSERT INTO Story (writer_id, title, likes, dislikes, text, photo, id_taste) VALUES (1, 'Lorem', 0, 0,
 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in ultricies mi. Sed fermentum vitae sapien sed aliquam. Maecenas a.',
 'lorem.jpg', 1);
INSERT INTO Story (writer_id, title, likes, dislikes, text, photo, id_taste) VALUES (2, 'Ipsum', 2, 0,
 'Ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in ultricies mi. Sed fermentum vitae sapien sed aliquam. Maecenas a.',
 'orem.jpg', 2);

INSERT INTO Comment (story_id, user_id, likes, dislikes, text) VALUES (1, 2, 0, 0, 'nice!');

INSERT INTO TasteChoice (taste) VALUES ('animals');
INSERT INTO TasteChoice (taste) VALUES ('art');
INSERT INTO TasteChoice (taste) VALUES ('photography');
INSERT INTO TasteChoice (taste) VALUES ('music');
INSERT INTO TasteChoice (taste) VALUES ('books');
INSERT INTO TasteChoice (taste) VALUES ('fashion');
INSERT INTO TasteChoice (taste) VALUES ('health');
INSERT INTO TasteChoice (taste) VALUES ('movies');

INSERT INTO TasteChoiceUser (user_id, id_taste) VALUES (1, 1);
INSERT INTO TasteChoiceUser (user_id, id_taste) VALUES (2, 1);
INSERT INTO TasteChoiceUser (user_id, id_taste) VALUES (2, 3);

INSERT INTO SavedStory (user_id, story_id) VALUES (1, 2);