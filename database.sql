PRAGMA foreign_keys = ON;
.mode columns
.headers on
. nullvalue NULL

DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Story;
DROP TABLE IF EXISTS Comment;
DROP TABLE IF EXISTS Saved_story;

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
  writer_id INTEGER REFERENCES user,
  likes INTEGER NOT NULL,
  dislikes INTEGER NOT NULL,
  text VARCHAR NOT NULL,
  photo VARCHAR,
  tasteChoice VARCHAR NOT NULL
);

CREATE TABLE Comment (
  id_comment INTEGER PRIMARY KEY AUTOINCREMENT,
  story_id INTEGER REFERENCES story,
  user_id INTEGER REFERENCES user,
  likes INTEGER NOT NULL,
  dislikes INTEGER NOT NULL,
  text VARCHAR NOT NULL
);

CREATE TABLE TasteChoice (
  id_taste INTEGER PRIMARY KEY AUTOINCREMENT,
  user_id INTEGER REFERENCES user,
  taste VARCHAR NOT NULL
);

CREATE TABLE SavedStory (
  user_id INTEGER REFERENCES user,
  story_id INTEGER REFERENCES story,
  PRIMARY KEY(user_id, story_id)
);

