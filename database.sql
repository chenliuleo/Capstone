DROP SCHEMA IF EXISTS csp_homework;
CREATE SCHEMA  csp_homework;
USE csp_homework;

CREATE TABLE users (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(32) NOT NULL UNIQUE, -- credantials only (like gpeter12, not gpeter12@slu.edu)
	first_name NVARCHAR(32),
	last_name NVARCHAR(32),
	password NVARCHAR(40),
	banner_id NVARCHAR(9),
	user_type ENUM('Student', 'Faculty') -- student = 1, faculty = 2
);

CREATE TABLE courses (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name NVARCHAR(8) NOT NULL,
	section NVARCHAR(2) NOT NULL,
	description TEXT,
	course_year NVARCHAR(4),
	semester NVARCHAR(6),
	start_date DATE,
	end_date DATE
)DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE homework (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	title NVARCHAR(64) NOT NULL,
	description TEXT,
	course_id INT,
	deadline DATETIME NOT NULL,
	active BOOLEAN DEFAULT TRUE,
	total_points INT(6),
	attached_files INT,
	FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
)DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE files (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	filename NVARCHAR(256) NOT NULL,
	submit_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	user_id INT,
	hw_id INT,
	FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
	FOREIGN KEY (hw_id) REFERENCES homework(id) ON DELETE CASCADE
)DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE courses_faculty (
	course_id INT,
	faculty_id INT,
	FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
	FOREIGN KEY (faculty_id) REFERENCES users(id) ON DELETE CASCADE	
);

CREATE TABLE course_students (
	course_id INT,
	student_id INT,
	FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
	FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE
);

ALTER TABLE homework ADD CONSTRAINT FOREIGN KEY (attached_files) REFERENCES files(id);