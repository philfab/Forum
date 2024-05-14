CREATE DATABASE IF NOT EXISTS Forum_phil;
USE Forum_phil;

CREATE TABLE IF NOT EXISTS User(
   id_user INT AUTO_INCREMENT,
   userName VARCHAR(255) NOT NULL,
   password VARCHAR(255) NOT NULL,
   registrationDate DATETIME NOT NULL,
   email VARCHAR(255) NOT NULL,
   roles VARCHAR(30) NOT NULL,
   status VARCHAR(20) NOT NULL,
   PRIMARY KEY(id_user)
);

CREATE TABLE IF NOT EXISTS Category(
   id_category INT AUTO_INCREMENT,
   description VARCHAR(30) NOT NULL,
   PRIMARY KEY(id_category)
);

CREATE TABLE IF NOT EXISTS Topic(
   id_topic INT AUTO_INCREMENT,
   title VARCHAR(255) NOT NULL,
   creationDate DATETIME NOT NULL,
   isLocked TINYINT(1) NOT NULL DEFAULT '0',
   category_id INT NOT NULL,
   user_id INT NOT NULL,
   PRIMARY KEY(id_topic),
   FOREIGN KEY(category_id) REFERENCES Category(id_category) ON DELETE CASCADE,
   FOREIGN KEY(user_id) REFERENCES User(id_user) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Post(
   id_post INT AUTO_INCREMENT,
   text TEXT,
   publishDate DATETIME NOT NULL,
   status VARCHAR(20) NOT NULL,
   topic_id INT NOT NULL,
   user_id INT NOT NULL,
   PRIMARY KEY(id_post),
   FOREIGN KEY(topic_id) REFERENCES Topic(id_topic) ON DELETE CASCADE,
   FOREIGN KEY(user_id) REFERENCES User(id_user) ON DELETE CASCADE
);

INSERT INTO User (userName, password, registrationDate, email, roles, status) 
VALUES 
('user1', '$2y$10$Wj2Y4A/WF5B2/Gj4HJZCVuU1KPhF./O8Jk4xDB3P.ZEoWReZ7TTv2', NOW(), 'user1@example.com', 'ROLE_USER', 'active'),
('user2', '$2y$10$N1LhX3C/n/.Duj6/YaB4ouj5R9sHbGNPg0IukopW5ojdGUlOE.RF2', NOW(), 'user2@example.com', 'ROLE_USER', 'active'),
('phil_admin', '$2y$10$Kd6.b2q61f5Zm9jxXhI7zex23ZT3fBz0/USkEgay8V7B1PFAK5So6', NOW(), 'phil_admin@gmail.com', 'ROLE_ADMIN', 'active');

--catégories
INSERT INTO Category (description) VALUES
('Films'),
('Sport');

--topics
INSERT INTO Topic (title, creationDate, isLocked, category_id, user_id) VALUES
('Topic 1 dans Films', NOW(), 0, 1, 1),
('Topic 2 dans Films', NOW(), 0, 1, 2);

-- posts 
INSERT INTO Post (text, publishDate, status, topic_id, user_id) VALUES
('Premier post dans Topic 1 dans Films', NOW(), 'active', 1, 1),
('Second post dans Topic 1 dans Films', NOW(), 'active', 1, 2),
('Troisieme post dans Topic 1 dans Films', NOW(), 'active', 1, 1),

('Premier post dans Topic 2 dans Films', NOW(), 'active', 2, 2),
('Second post dans Topic 2 dans Films', NOW(), 'active', 2, 1),
('Troisieme post dans Topic 2 dans Films', NOW(), 'active', 2, 2);

--topics sport
INSERT INTO Topic (title, creationDate, isLocked, category_id, user_id) VALUES
('Topic 1 dans Sport', NOW(), 0, 2, 1),
('Topic 2 dans Sport', NOW(), 0, 2, 2);

-- posts dans topic 1 et topic 2
INSERT INTO Post (text, publishDate, status, topic_id, user_id) VALUES
('Premier post dans Topic 1 dans Sport', NOW(), 'active', 3, 1),
('Second post dans Topic 1 dans Sport', NOW(), 'active', 3, 2),
('Troisieme post dans Topic 1 dans Sport', NOW(), 'active', 3, 1),

('Premier post dans Topic 2 dans Sport', NOW(), 'active', 4, 2),
('Second post dans Topic 2 dans Sport', NOW(), 'active', 4, 1),
('Troisieme post dans Topic 2 dans Sport', NOW(), 'active', 4, 2);
