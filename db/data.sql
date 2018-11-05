INSERT INTO User (user_id, username, email, birthdate, photo, password, gender) Values (1, 'lorem', 'lorem@gmail.com', '1998-12-03', 'lorem.jpg', 'asdfg', 'male');
INSERT INTO User (username, email, birthdate, photo, password, gender) Values ('lorina', 'lorina@gmail.com', '1998-12-03', 'lorina.jpg', 'asdfghj', 'female');

INSERT INTO Story (writer_id, likes, dislikes, text, photo, category) VALUES (1, 0, 0,
 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in ultricies mi. Sed fermentum vitae sapien sed aliquam. Maecenas a.',
 'lorem.jpg', 'fun fact').

 INSERT INTO Comment (story_id, user_id, likes, dislikes, text) VALUES (1, 2, 0, 0, 'nice!').