CREATE TABLE users (
	user_id BIGINT AUTO_INCREMENT PRIMARY KEY,
	user_name VARCHAR(30) NOT NULL,
	email VARCHAR(50) NOT NULL,
	password varchar(30) NOT NULL,
	class_id BIGINT,
	FOREIGN KEY (class_id) REFERENCES clazz(class_id)
);

CREATE TABLE clazz (
	class_id BIGINT AUTO_INCREMENT PRIMARY KEY,
	class_name NVARCHAR(255) NOT NULL,
);

CREATE TABLE clazz_subject(
	class_id BIGINT NOT NULL,
	subject_id BIGINT NOT NULL,
	start_at DATE NOT NULL,
	finish_at DATE NOT NULL,
	PRIMARY KEY (class_id, subject_id),
	FOREIGN KEY (class_id) REFERENCES clazz(class_id) ON DELETE RESTRICT ON UPDATE CASCADE,
	FOREIGN KEY (subject_id) REFERENCES subjects(subject_id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE subjects (
	subject_id BIGINT AUTO_INCREMENT PRIMARY KEY,
	subject_name NVARCHAR(255) NOT NULL,
);