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
DROP TABLE IF EXISTS LikesStories;
DROP TABLE IF EXISTS DislikesStories;
DROP TABLE IF EXISTS LikesComments;
DROP TABLE IF EXISTS DislikesComments;

CREATE TABLE Users (
  user_id INTEGER PRIMARY KEY AUTOINCREMENT,
  username VARCHAR NOT NULL UNIQUE,
  email VARCHAR NOT NULL,
  birthdate DATE,
  photo VARCHAR,
  presentation VARCHAR,
  password VARCHAR NOT NULL
);

CREATE TABLE Story (
  story_id INTEGER PRIMARY KEY AUTOINCREMENT,
  writer_id INTEGER REFERENCES Users,
  title VARCHAR NOT NULL,
  text VARCHAR NOT NULL,
  photo VARCHAR,
  date DATE,
  id_taste INTEGER NOT NULL
);

CREATE TABLE Comment (
  id_comment INTEGER PRIMARY KEY AUTOINCREMENT,
  story_id INTEGER REFERENCES Story,
  user_id INTEGER REFERENCES Users,
  date DATE,
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

CREATE TABLE LikesStories (
  user_id INTEGER REFERENCES Users,
  story_id INTEGER REFERENCES Story,
  PRIMARY KEY(user_id, story_id)
);

CREATE TABLE DislikesStories (
  user_id INTEGER REFERENCES Users,
  story_id INTEGER REFERENCES Story,
  PRIMARY KEY(user_id, story_id)
);

CREATE TABLE LikesComments (
  user_id INTEGER REFERENCES Users,
  comment_id INTEGER REFERENCES Story,
  PRIMARY KEY(user_id, comment_id)
);

CREATE TABLE DislikesComments (
  user_id INTEGER REFERENCES Users,
  comment_id INTEGER REFERENCES Story,
  PRIMARY KEY(user_id, comment_id)
);

INSERT INTO TasteChoice (taste) VALUES ('animals');
INSERT INTO TasteChoice (taste) VALUES ('art');
INSERT INTO TasteChoice (taste) VALUES ('photography');
INSERT INTO TasteChoice (taste) VALUES ('music');
INSERT INTO TasteChoice (taste) VALUES ('books');
INSERT INTO TasteChoice (taste) VALUES ('fashion');
INSERT INTO TasteChoice (taste) VALUES ('health');
INSERT INTO TasteChoice (taste) VALUES ('movies');
