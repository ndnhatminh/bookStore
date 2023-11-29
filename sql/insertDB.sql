Use e_bookstore;

INSERT INTO Customer
VALUES (101,'Trần Văn Nam','namtran0301','123456','SILVER',1901,'1996-01-03');
INSERT INTO Customer
VALUES (102,'Nguyễn Anh' ,'anhnguyen123','spear456','BRONZE',342,'1998-07-28');
INSERT INTO Customer
VALUES (103,'Lê Văn Anh','levananh','ray2802','SILVER',640,'2001-02-28');
INSERT INTO Customer
VALUES (104,'Trần An','tranan2803','Bella2002','GOLDEN',2504,'2005-02-20');
INSERT INTO Customer
VALUES (105,'Thanh Xuân','xuan0104','mike0123','DIAMOND',5032,'1999-04-01');
INSERT INTO Customer
VALUES (106,'Phạm Thị Thuỷ','thuypham369','tomyum246','SILVER',1102,'2000-12-25');

INSERT INTO Staff
VALUES (201,'Trần Nam','admin1','201000','MALE','20000000');
INSERT INTO Staff
VALUES (202,'Đạt Lê','admin2','202001','FEMALE','25000000');
INSERT INTO Staff
VALUES (203,'Kate Will','admin3','203001','FEMALE','10000000');
INSERT INTO Staff
VALUES (211,'Tuấn Anh','admin4','204000','MALE','15000000');
INSERT INTO Staff
VALUES (212,'Lê Minh','admin5','205001','FEMALE','28000000');
INSERT INTO Staff
VALUES (221,'Anh Thư','admin6','206000','MALE','21000000');
INSERT INTO Staff
VALUES (222,'Tiến Dũng','admin7','207000','MALE','17000000');
INSERT INTO Staff
VALUES (223,'Ngọc Thắng','admin8','208000','MALE','25000000');

INSERT INTO Warehouse_Staff
VALUES (201);
INSERT INTO Warehouse_Staff
VALUES (202);
INSERT INTO Warehouse_Staff
VALUES (203);

INSERT INTO PageAdmin
VALUES (211);
INSERT INTO PageAdmin
VALUES (212);

INSERT INTO Client_care
VALUES (221);
INSERT INTO Client_care
VALUES (222);
INSERT INTO Client_care
VALUES (223);

INSERT INTO Categories (C_Name)
VALUES ('Tâm lý học');
INSERT INTO Categories (C_Name)
VALUES ('Giả tưởng');
INSERT INTO Categories (C_Name)
VALUES ('Nấu ăn');
INSERT INTO Categories (C_Name)
VALUES ('Lịch sử');
INSERT INTO Categories (C_Name)
VALUES ('Bí ẩn');
INSERT INTO Categories (C_Name)
VALUES ('Lãng mạn');
INSERT INTO Categories (C_Name)
VALUES ('Khoa học');
INSERT INTO Categories (C_Name)
VALUES ('Sách giáo khoa');
INSERT INTO Categories (C_Name)
VALUES ('Tâm lý - Triết học');
INSERT INTO Categories (C_Name)
VALUES ('Truyện');
INSERT INTO Categories (C_Name)
VALUES ('Nhật ký');
INSERT INTO Categories (C_Name)
VALUES ('Học thuật');
INSERT INTO Categories (C_Name)
VALUES ('Kỹ năng sống');
INSERT INTO Categories (C_Name)
VALUES ('Ngôn tình');
INSERT INTO Categories (C_Name)
VALUES ('Chính trị');
INSERT INTO Categories (C_Name)
VALUES ('Ngoại ngữ');
INSERT INTO Categories (C_Name)
VALUES ('Kinh tế');
INSERT INTO Categories (C_Name)
VALUES ('Quản trị - Lãnh đạo');
INSERT INTO Categories (C_Name)
VALUES ('Marketing');

INSERT INTO Book
VALUES ('1501','Muôn Kiếp Nhân Sinh','John Vu',2023,'Tổng Hợp Thành Phố Hồ Chí Minh',190000,'search1.jpg','mô tả');
INSERT INTO Book
VALUES ('1001','Keep Sharp','Sanjay Gupta M.D.',2021,'Simon & Schuster',140000,'db1.jpg','Keep your brain young, healthy, and sharp with this science-driven guide to protecting your mind from decline by neurosurgeon and CNN chief medical correspondent Dr. Sanjay Gupta.');
INSERT INTO Book
VALUES ('1002','The Organized Mind','Daniel J. Levitin',2014,'Luke Daniels',170000,'db2.jpg','New York Times best-selling author and neuroscientist Daniel J. Levitin shifts his keen insights from your brain on music to your brain in a sea of details.');
INSERT INTO Book
VALUES ('1003','The Defining Decade','Meg Jay',2021,'Twelve',120000,'db3.jpg','New York Times best-selling psychologist Dr. Meg Jay uses real stories from real lives to provide smart, compassionate, and constructive advice about the crucial (and difficult) years we cannot afford to miss.');
INSERT INTO Book
VALUES ('1101','The Gilded Ones','Namina Forna',2021,'Shayna Small',160000,'db3.jpg','INSTANT NEW YORK TIMES BESTSELLER NAMED ONE OF THE BEST BOOKS OF THE YEAR BY TEEN VOGUE');
INSERT INTO Book
VALUES ('1102','The Annotated American Gods','Neil Gaiman',2020,'William Morrow',230000,'db4.jpg','Destined to be a treasure for the millions of fans who made American Gods an internationally bestselling phenomenon, this beautifully designed and illustrated collectible edition of Neil Gaiman’s revered masterpiece features enlightening and incisive notes throughout by award-winning annotator and editor Leslie S. Klinger.');
INSERT INTO Book
VALUES ('1201','Masterchef Cookbook','JoAnn Cianciulli',2010,'Rodale Books',190000,'db5.jpg','SUPERANNO This is the official companion book to Master Chef, the Fox reality cooking competition premiering in July 2010 that pits 50 amateur cooks from across the country in a head-to-head battle for culinary supremacy.');
INSERT INTO Book
VALUES ('1202','Recipes from My Home Kitchen','Christine Ha',2013,'Rodale Books',220000,'db5.jpg','Easy Vietnamese comfort food recipes from the winner of MasterChef Season 3.');
INSERT INTO Book
VALUES ('1203','The Chinese Home Kitchen','Chyou Huang',2022,'Chyou Huang',140000,'db6.jpg','Full-Color Premium Printing Edition with Vibrant Color Pictures of Each Finished Meals for the Recipes');
INSERT INTO Book
VALUES ('1204','My Modern American Table','Shaun O Neale',2017,'Abrams',250000,'db7.jpg','Viewers fell in love with Shaun O’Neale on Season 7 of MasterChef. In his debut cookbook, O’Neale presents his take on modern American cuisine with international influences. It’s experimental, it’s edgy, and it’s full of big flavors.');
INSERT INTO Book
VALUES ('1205','Gordon Ramsay Quick and Delicious','Gordon Ramsay',2020,'Grand Central Publishing',290000,'db8.jpg','Create chef-quality food without spending hours in the kitchen -- these are the recipes and straightforward tips you need to make good food fast.');
INSERT INTO Book
VALUES ('1301','Over the Edge of the World','Laurence Bergreen',2009,'Mariner Books',200000,'db9.jpg','“A first-rate historical page turner.” —New York Times Book Review');
INSERT INTO Book
VALUES ('1401','Long Shadows (Memory Man Series)','David Baldacci',2022,'Grand Central Publishing',140000,'db10.jpg','From the author of The 6:20 Man, “Memory Man” Amos Decker—an FBI consultant with perfect recall');


INSERT INTO Belong
VALUES ('7','1001');
INSERT INTO Belong
VALUES ('6','1002');
INSERT INTO Belong
VALUES ('5','1003');
INSERT INTO Belong
VALUES ('4','1101');
INSERT INTO Belong
VALUES ('3','1102');
INSERT INTO Belong
VALUES ('2','1201');
INSERT INTO Belong
VALUES ('2','1202');
INSERT INTO Belong
VALUES ('2','1203');
INSERT INTO Belong
VALUES ('6','1204');
INSERT INTO Belong
VALUES ('6','1205');
INSERT INTO Belong
VALUES ('7','1301');
INSERT INTO Belong
VALUES ('7','1401');