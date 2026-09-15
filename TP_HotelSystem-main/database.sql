CREATE DATABASE IF NOT EXISTS hotel_system CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE hotel_system;

CREATE TABLE IF NOT EXISTS room_types (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  size VARCHAR(50) NOT NULL,
  view VARCHAR(100) NOT NULL,
  amenities TEXT NOT NULL,
  description TEXT,
  price DECIMAL(10,2) NOT NULL DEFAULT 0,
  image_url VARCHAR(500) DEFAULT NULL,
  capacity INT UNSIGNED NOT NULL DEFAULT 2,
  is_special TINYINT(1) NOT NULL DEFAULT 0,
  special_label VARCHAR(100) DEFAULT NULL
);

ALTER TABLE room_types ADD COLUMN IF NOT EXISTS image_url VARCHAR(500) DEFAULT NULL;
ALTER TABLE room_types ADD COLUMN IF NOT EXISTS capacity INT UNSIGNED NOT NULL DEFAULT 2;
ALTER TABLE room_types ADD COLUMN IF NOT EXISTS is_special TINYINT(1) NOT NULL DEFAULT 0;
ALTER TABLE room_types ADD COLUMN IF NOT EXISTS special_label VARCHAR(100) DEFAULT NULL;

CREATE TABLE IF NOT EXISTS rooms (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  room_number VARCHAR(20) NOT NULL UNIQUE,
  room_type_id INT UNSIGNED NOT NULL,
  status ENUM('available','maintenance') NOT NULL DEFAULT 'available',
  CONSTRAINT fk_rooms_type FOREIGN KEY (room_type_id) REFERENCES room_types(id)
);

CREATE TABLE IF NOT EXISTS users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  status ENUM('active','banned') NOT NULL DEFAULT 'active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  role ENUM('customer','admin') NOT NULL DEFAULT 'customer'
);

ALTER TABLE users ADD COLUMN IF NOT EXISTS role ENUM('customer','admin') NOT NULL DEFAULT 'customer';

CREATE TABLE IF NOT EXISTS bookings (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  room_id INT UNSIGNED NOT NULL,
  user_id INT UNSIGNED NOT NULL,
  check_in DATE NOT NULL,
  check_out DATE NOT NULL,
  guests INT UNSIGNED NOT NULL DEFAULT 1,
  special_request TEXT,
  status ENUM('pending','confirmed','cancelled','completed') NOT NULL DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_bookings_room FOREIGN KEY (room_id) REFERENCES rooms(id),
  CONSTRAINT fk_bookings_user FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS reviews (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NOT NULL,
  room_id INT UNSIGNED NOT NULL,
  rating TINYINT UNSIGNED NOT NULL,
  comment TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_reviews_user FOREIGN KEY (user_id) REFERENCES users(id),
  CONSTRAINT fk_reviews_room FOREIGN KEY (room_id) REFERENCES rooms(id)
);

INSERT INTO room_types (name, size, view, amenities, description, price)
SELECT 'デラックスツイン', '32㎡', '海側', 'Wi-Fi、バスタブ、朝食、ワークデスク', '窓いっぱいに海を望む、ゆったりとしたツインルームです。', 18000, 'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=1200&q=85', 2, 0, NULL
WHERE NOT EXISTS (SELECT 1 FROM room_types WHERE name = 'デラックスツイン');
INSERT INTO room_types (name, size, view, amenities, description, price)
SELECT 'プレミアムスイート', '58㎡', 'オーシャンビュー', 'Wi-Fi、リビング、バルコニー、朝食', '記念日や長期滞在にふさわしい開放的なスイートです。', 32000, 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=1200&q=85', 4, 1, '期間限定プラン'
WHERE NOT EXISTS (SELECT 1 FROM room_types WHERE name = 'プレミアムスイート');

INSERT INTO rooms (room_number, room_type_id)
SELECT '501', id FROM room_types WHERE name = 'デラックスツイン'
AND NOT EXISTS (SELECT 1 FROM rooms WHERE room_number = '501');
INSERT INTO rooms (room_number, room_type_id)
SELECT '601', id FROM room_types WHERE name = 'プレミアムスイート'
AND NOT EXISTS (SELECT 1 FROM rooms WHERE room_number = '601');

INSERT INTO rooms (room_number, room_type_id)
SELECT '502', id FROM room_types WHERE name = 'デラックスツイン'
AND NOT EXISTS (SELECT 1 FROM rooms WHERE room_number = '502');
INSERT INTO rooms (room_number, room_type_id)
SELECT '503', id FROM room_types WHERE name = 'デラックスツイン'
AND NOT EXISTS (SELECT 1 FROM rooms WHERE room_number = '503');
INSERT INTO rooms (room_number, room_type_id)
SELECT '602', id FROM room_types WHERE name = 'プレミアムスイート'
AND NOT EXISTS (SELECT 1 FROM rooms WHERE room_number = '602');
INSERT INTO rooms (room_number, room_type_id)
SELECT '603', id FROM room_types WHERE name = 'プレミアムスイート'
AND NOT EXISTS (SELECT 1 FROM rooms WHERE room_number = '603');
INSERT INTO rooms (room_number, room_type_id)
SELECT '701', id FROM room_types WHERE name = 'デラックスツイン'
AND NOT EXISTS (SELECT 1 FROM rooms WHERE room_number = '701');
INSERT INTO rooms (room_number, room_type_id)
SELECT '702', id FROM room_types WHERE name = 'プレミアムスイート'
AND NOT EXISTS (SELECT 1 FROM rooms WHERE room_number = '702');

INSERT INTO users (id, name, email, password)
SELECT 1, 'デモユーザー', 'demo@example.com', 'demo-user'
WHERE NOT EXISTS (SELECT 1 FROM users WHERE id = 1);

INSERT INTO users (name, email, password, role)
SELECT '管理者', 'admin@example.com', 'admin-demo', 'admin'
WHERE NOT EXISTS (SELECT 1 FROM users WHERE email = 'admin@example.com');
