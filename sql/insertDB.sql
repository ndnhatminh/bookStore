Use e_bookstore;

INSERT INTO Book
VALUES ('1002','The Organized Mind','Daniel J. Levitin',2014,'Luke Daniels',17,'db2.jpg','New York Times best-selling author and neuroscientist Daniel J. Levitin shifts his keen insights from your brain on music to your brain in a sea of details.');
INSERT INTO Book
VALUES ('1003','The Defining Decade','Meg Jay',2021,'Twelve',12,'db3.jpg','New York Times best-selling psychologist Dr. Meg Jay uses real stories from real lives to provide smart, compassionate, and constructive advice about the crucial (and difficult) years we cannot afford to miss.');
INSERT INTO Book
VALUES ('1101','The Gilded Ones','Namina Forna',2021,'Shayna Small',16,'db3.jpg','INSTANT NEW YORK TIMES BESTSELLER NAMED ONE OF THE BEST BOOKS OF THE YEAR BY TEEN VOGUE');
INSERT INTO Book
VALUES ('1102','The Annotated American Gods','Neil Gaiman',2020,'William Morrow',23,'db4.jpg','Destined to be a treasure for the millions of fans who made American Gods an internationally bestselling phenomenon, this beautifully designed and illustrated collectible edition of Neil Gaiman’s revered masterpiece features enlightening and incisive notes throughout by award-winning annotator and editor Leslie S. Klinger.');
INSERT INTO Book
VALUES ('1201','Masterchef Cookbook','JoAnn Cianciulli',2010,'Rodale Books',19,'db5.jpg','SUPERANNO This is the official companion book to Master Chef, the Fox reality cooking competition premiering in July 2010 that pits 50 amateur cooks from across the country in a head-to-head battle for culinary supremacy.');
INSERT INTO Book
VALUES ('1202','Recipes from My Home Kitchen','Christine Ha',2013,'Rodale Books',22,'db5.jpg','Easy Vietnamese comfort food recipes from the winner of MasterChef Season 3.');
INSERT INTO Book
VALUES ('1203','The Chinese Home Kitchen','Chyou Huang',2022,'Chyou Huang',14,'db6.jpg','Full-Color Premium Printing Edition with Vibrant Color Pictures of Each Finished Meals for the Recipes');
INSERT INTO Book
VALUES ('1204','My Modern American Table','Shaun O Neale',2017,'Abrams',25,'db7.jpg','Viewers fell in love with Shaun O’Neale on Season 7 of MasterChef. In his debut cookbook, O’Neale presents his take on modern American cuisine with international influences. It’s experimental, it’s edgy, and it’s full of big flavors.');
INSERT INTO Book
VALUES ('1205','Gordon Ramsay Quick and Delicious','Gordon Ramsay',2020,'Grand Central Publishing',29,'db8.jpg','Create chef-quality food without spending hours in the kitchen -- these are the recipes and straightforward tips you need to make good food fast.');
INSERT INTO Book
VALUES ('1301','Over the Edge of the World','Laurence Bergreen',2009,'Mariner Books',20,'db9.jpg','“A first-rate historical page turner.” —New York Times Book Review');
INSERT INTO Book
VALUES ('1401','Long Shadows (Memory Man Series)','David Baldacci',2022,'Grand Central Publishing',14,'db10.jpg','From the author of The 6:20 Man, “Memory Man” Amos Decker—an FBI consultant with perfect recall');



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
