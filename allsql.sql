CREATE TABLE `account`.`user` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(234) NOT NULL , `password` VARCHAR(300) NOT NULL , `email` VARCHAR(200) NOT NULL , `is_staff` BOOLEAN NOT NULL DEFAULT FALSE , `is_superuser` BOOLEAN NOT NULL DEFAULT FALSE , PRIMARY KEY (`id`), UNIQUE (`email`)) ENGINE = InnoDB;
CREATE TABLE profle (
    id int AUTO_INCREMENT,
    address varchar(250),
    phone varchar(250),
    CONSTRAINT pk PRIMARY KEY (id),
    CONSTRAINT fk FOREIGN KEY (id) REFERENCES user(id) ON DELETE CASCADE
    );
INSERT INTO `user` (`id`, `username`, `password`, `email`, `is_staff`, `is_superuser`, `first_name`, `last_name`) VALUES (NULL, 'ajio', PASSWORD('asio'), 'shahori8888ar.fahim@gmail.com', '0', '0', NULL, 'Fahim6');
INSERT INTO `profle` (`id`, `address`, `phone`) VALUES ('1', 'tongi gazipur', '01773032999');


INSERT INTO `user` (`id`, `username`, `password`, `email`, `is_staff`, `is_superuser`, `first_name`, `last_name`)
SELECT * FROM (NULL, 'ajio', PASSWORD('asio'), 'shahori8888ar.fahim@gmail.com', '0', '0', NULL, 'Fahim6') AS tmp
WHERE NOT EXISTS (
    SELECT email FROM user WHERE email = 'shahori8888ar.fahim@gmail.com'
) LIMIT 1;

INSERT INTO `user` (username, password, email,first_name, last_name)
SELECT * FROM (select 'ajio', PASSWORD('asio'), 'shahori8888arj.fahim@gmail.com',  'll', 'Fahim6') as tem
WHERE NOT EXISTS (
    SELECT email FROM user WHERE email = 'shahori8888arj.fahim@gmail.com'
) LIMIT 1;

INSERT INTO user (username, password, email,first_name, last_name) SELECT * FROM (select 'ajio', PASSWORD('asio'), 'shahori8888arj.fahim@gmail.com', 'll', 'Fahim6') as tem WHERE NOT EXISTS ( SELECT email FROM user WHERE email = 'shahori8888arj.fahim@gmail.com' ) LIMIT 1;

create table supplier(
  email varchar(20),
  phone varchar(20),
  c_name varchar(20) UNIQUE ,
  CONSTRAINT pk primary key(c_name)
);
create table products (
  id int AUTO_INCREMENT,
  name varchar(60),
  price float,
  quantity int,
  c_name varchar(20) ,
  CONSTRAINT pk primary key(id),
  CONSTRAINT supplier_fk FOREIGN key(c_name) REFERENCES supplier(c_name) on DELETE CASCADE
);
insert into supplier(email,phone,c_name) values (
  'email@g.com',
  '3o3u48888',
  'accer'
);
insert into products(name,price,quantity,c_name)values (
  'aspier 5',
  55550.5,
  5,
  'accer'
);
insert into products(name,price,quantity,c_name)values (
  'aspier 5 gx 4gb ram',
  55550.5,
  5,
  'accer2'
);
create table catagory (name varchar(20) CONSTRAINT pk primary key (name));
ALTER TABLE products add created date DEFAULT CURRENT_DATE;
ALTER TABLE products add CONSTRAINT catagory_fk FOREIGN KEY(catagory_n) REFERENCES catagory(name);
