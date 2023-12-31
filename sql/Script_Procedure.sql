USE e_bookstore;
DELIMITER $$
CREATE FUNCTION LOGIN_CUSTOMER( 
	Un VARCHAR(30),
    Pw VARCHAR(30)
)
RETURNS BOOLEAN
DETERMINISTIC
BEGIN
	DECLARE NUMBER INT;
    DECLARE RESULT BOOL;
    SET NUMBER = 0;
	SELECT COUNT(*) INTO NUMBER FROM Customer WHERE Username=Un and Pass_word = Pw;
    IF NUMBER > 0 THEN SET RESULT = TRUE;
    ELSE SET RESULT = FALSE;
    END IF;
    
    RETURN RESULT;
END $$
DELIMITER ;
-- drop function LOGIN_CUSTOMER
-- authenticate staff
DELIMITER $$
CREATE FUNCTION LOGIN_STAFF( 
	Un VARCHAR(30),
    Pw VARCHAR(30)
)
RETURNS BOOL
DETERMINISTIC
BEGIN
	DECLARE NUMBER INT;
    DECLARE RESULT BOOL;
    set number = 0;
	SELECT COUNT(*) into NUMBER FROM staff where Username=Un and Pass_word=PW;
    IF NUMBER > 0 THEN SET RESULT = TRUE;
    ELSE SET RESULT = FALSE;
    END IF;
    
    RETURN RESULT;
END $$
DELIMITER ;

DELIMITER $$
CREATE FUNCTION TOTAL_BOOK(
	CATEGORIES_ID INT   
)
RETURNS INT
DETERMINISTIC
BEGIN
	DECLARE RESULT INT;
    SET RESULT =0;
	SELECT COUNT(distinct BOOKID) INTO RESULT FROM BELONG WHERE ID=CATEGORIES_ID;
    RETURN RESULT;
END $$
DELIMITER ;

-- ADD NEW BOOK
DELIMITER $$
CREATE PROCEDURE ADD_BOOK(
	BookID VARCHAR(10),
    Title VARCHAR(30),
    Author VARCHAR(30),
	Year_publication INT,
	Publisher VARCHAR(30),
	List_price INT,
    COVER VARCHAR(255),
    DES TEXT,
    Categories_Name VARCHAR(30)
)
BEGIN
	DECLARE CID INT;
    SET CID = -1;
    SELECT ID INTO CID FROM CATEGORIES WHERE CATEGORIES.C_Name=Categories_Name;
	INSERT INTO BOOK () VALUES (BookID,Title,Author,Year_publication,Publisher,List_price, COVER, DES);
	INSERT INTO BELONG () VALUES (CID, BookID);
END $$
DELIMITER ;

-- CHECK FOR ALREADY EXIST BOOK
DELIMITER $$
CREATE FUNCTION Book_exist(
	BookID VARCHAR(10)
)
RETURNS BOOL
DETERMINISTIC
BEGIN
	DECLARE NUMBER INT;
    SET NUMBER =0;
    SELECT COUNT(*) INTO NUMBER FROM BOOK WHERE BOOK.BOOKID=BookID;
    IF NUMBER > 0
    THEN RETURN TRUE;
    ELSE RETURN FALSE;
    END IF;
END $$
DELIMITER ;

-- ADD NEW CATEGORIES
DELIMITER $$
CREATE PROCEDURE ADD_CATEGORY(
    Categories_Name VARCHAR(30)
)
BEGIN
	INSERT INTO CATEGORIES (C_Name) VALUES(Categories_Name);
END $$
DELIMITER ;

-- CHECK FOR ALREADY EXIST CATEGORY
DELIMITER $$
CREATE FUNCTION Category_exist(
	name VARCHAR(30)
)
RETURNS BOOL
DETERMINISTIC
BEGIN
	DECLARE NUMBER INT;
    SET NUMBER =0;
    SELECT COUNT(*) INTO NUMBER FROM categories WHERE categories.C_Name=name;
    IF NUMBER > 0
    THEN RETURN TRUE;
    ELSE RETURN FALSE;
    END IF;
END $$
DELIMITER ;

-- ADD NEW DISCOUNT PROGRAM
DELIMITER $$
CREATE PROCEDURE ADD_PROGRAM(
    program VARCHAR(30),
    des text,
    per float
)
BEGIN
	INSERT INTO dis_program (D_Name, Descriptions, Percents) VALUES(program, des, per);
END $$
DELIMITER ;

-- CHECK FOR ALREADY EXIST DISCOUNT PROGRAM
DELIMITER $$
CREATE FUNCTION Program_exist(
	program VARCHAR(30)
)
RETURNS BOOL
DETERMINISTIC
BEGIN
	DECLARE NUMBER INT;
    SET NUMBER =0;
    SELECT COUNT(*) INTO NUMBER FROM dis_program WHERE dis_program.D_Name=program;
    IF NUMBER > 0
    THEN RETURN TRUE;
    ELSE RETURN FALSE;
    END IF;
END $$
DELIMITER ;

-- delete book
DELIMITER $$
CREATE PROCEDURE DELETE_BOOK(
	ID VARCHAR(10)
)
DETERMINISTIC
BEGIN
	DELETE FROM BOOK WHERE BookID=ID;
END $$
DELIMITER ;

-- UPDATE CATEGORY
DELIMITER $$
CREATE PROCEDURE UPDATE_CATEGORY(
    Categories_ID INT,
    Categories_Name VARCHAR(30)
)
BEGIN
	UPDATE CATEGORIES SET C_Name = Categories_Name WHERE ID=Categories_ID;
END $$
DELIMITER ;

CALL UPDATE_CATEGORY(123, 'novel');

-- update detail of books
DELIMITER $$
CREATE PROCEDURE UPDATE_BOOK(
	BookID VARCHAR(10),
    Title VARCHAR(30),
    Author VARCHAR(30),
	Year_publication INT,
	Publisher VARCHAR(30),
	List_price INT,
    COVER VARCHAR(255),
    DES TEXT,
    Categories_ID INT
)
BEGIN
	UPDATE BOOK AS B
    SET 
    B.Title=Title,
    B.Author=Author,
	B.Year_publication=Year_publication,
    B.Publisher=Publisher,
    B.List_price=List_price,
    B.COVER=COVER,
    B.Des=DES
    WHERE B.BookID=BookID;
    UPDATE BELONG
    SET ID=Categories_ID WHERE BELONG.BookID=BookID;
END $$
DELIMITER ;

-- check for already exist customer by username 
DELIMITER $$
CREATE FUNCTION Customer_exist(
	name VARCHAR(30)
)
RETURNS BOOL
DETERMINISTIC
BEGIN
	DECLARE NUMBER INT;
    SET NUMBER =0;
    SELECT COUNT(*) INTO NUMBER FROM customer WHERE customer.Username=name;
    IF NUMBER > 0
    THEN RETURN TRUE;
    ELSE RETURN FALSE;
    END IF;
END $$
DELIMITER ;

-- Add new customer
DELIMITER $$
CREATE PROCEDURE ADD_CUSTOMER(
    fullname VARCHAR(30),
    un varchar(30),
    pw varchar(30),
    DOB date
)
BEGIN
	DECLARE CID INT;
    SET CID=0;
	INSERT INTO Customer (CustomerName, Username, Pass_word, Score, dateofBirth, Membership) VALUES(fullname, un, pw, 0, DOB, "BRONZE");
	SELECT CustomerID INTO CID FROM Customer WHERE Username=UN;
    INSERT INTO cart  VALUES (CID,CID);
END $$
DELIMITER ;

-- check for already exist staff by username 
DELIMITER $$
CREATE FUNCTION Staff_exist(
	name VARCHAR(30)
)
RETURNS BOOL
DETERMINISTIC
BEGIN
	DECLARE NUMBER INT;
    SET NUMBER =0;
    SELECT COUNT(*) INTO NUMBER FROM staff WHERE staff.Username=name;
    IF NUMBER > 0
    THEN RETURN TRUE;
    ELSE RETURN FALSE;
    END IF;
END $$
DELIMITER ;

-- add book in cart
DELIMITER $$
CREATE PROCEDURE ADD_TO_CART(
    BookID VARCHAR(10),
    UN varchar(30)
)
BEGIN
	DECLARE ID INT;
    SET ID = -1;
    SELECT CustomerID INTO ID FROM Customer WHERE username=UN;
	INSERT INTO CONTAIN () VALUES(ID,BookID,1);
END $$
DELIMITER ;
-- delete book in cart
DELIMITER $$
CREATE PROCEDURE DELETE_TO_CART(
    BookID VARCHAR(10),
    UN varchar(30)
)
BEGIN
	DECLARE ID INT;
    SET ID = -1;
    SELECT CustomerID INTO ID FROM Customer WHERE username=UN;
	DELETE FROM CONTAIN WHERE CONTAIN.BookID=BookID and Code=ID;
END $$
DELIMITER ;
-- update the number of book in cart
DELIMITER $$
CREATE PROCEDURE UPDATE_TO_CART(
    BookID VARCHAR(10),
    UN varchar(30),
    Quanity INT
)
BEGIN
	DECLARE ID INT;
    SET ID = -1;
    SELECT CustomerID INTO ID FROM Customer WHERE username=UN;
	UPDATE CONTAIN SET NUMBER= Quanity WHERE CONTAIN.BookID=BookID and Code=ID;
END $$
DELIMITER ;
Call UPDATE_TO_CART('100010','thaotattoo', 8)
-- check for already exits book in cart
DELIMITER $$
CREATE FUNCTION EXIST_BOOK(
    BOOKID VARCHAR(10),
    UN VARCHAR(30)
)
RETURNS INT
DETERMINISTIC
BEGIN
	DECLARE ID, EXIST INT;
    SET ID = -1;
    SET EXIST =0;
    SELECT CustomerID INTO ID FROM CUSTOMER WHERE username=UN;
	SELECT NUMBER INTO EXIST FROM CONTAIN WHERE CONTAIN.BOOKID=BOOKID AND CODE=ID;
	RETURN EXIST;
END $$
DELIMITER ;

-- delete book after payment
DELIMITER $$
CREATE PROCEDURE DELETE_ALL(
    UN varchar(30)
)
BEGIN
	DECLARE ID INT;
    SET ID = -1;
    SELECT CustomerID INTO ID FROM CUSTOMER WHERE username=UN;
	DELETE FROM CONTAIN WHERE CONTAIN.CODE=ID;
END $$
DELIMITER ;

-- caculate total bill for each cart
DELIMITER $$
CREATE FUNCTION TOTAL_ALL(
    UN varchar(30)
)
RETURNS INT
DETERMINISTIC
BEGIN
    DECLARE TOTAL,ID INT;
    SET ID = -1;
    SET TOTAL=0;
    SELECT CustomerID INTO ID FROM CUSTOMER WHERE username=UN;
    
    CREATE TEMPORARY TABLE A
		SELECT CONTAIN.BOOKID, (NUMBER*LIST_PRICE) AS PRICE
		FROM CONTAIN JOIN BOOK ON CONTAIN.BOOKID=BOOK.BOOKID
		WHERE CODE=ID;
	CREATE TEMPORARY TABLE B
		SELECT PRICE, PERCENTS
		FROM (A LEFT JOIN APPLIES ON A.BOOKID=APPLIES.BOOKID) 
			LEFT JOIN DIS_PROGRAM ON APPLIES.ID=DIS_PROGRAM.ID;
	UPDATE B SET PERCENTS=0 WHERE PERCENTS IS NULL;
    SELECT (SUM(PRICE) - SUM(PRICE*PERCENTS)) INTO TOTAL FROM B;
    DROP TEMPORARY TABLE A;
    DROP TEMPORARY TABLE B;
    RETURN TOTAL;
END $$
DELIMITER ;

-- ADD APPLIES PROGRAM
DELIMITER $$
CREATE PROCEDURE ADD_APPLY(
	programID INT,
    bookID VARCHAR(30),
    sd date,
    ed date
)
BEGIN
	INSERT INTO applies (ID, BookID, StartDate, EndDate) VALUES(programID, bookID, sd, ed);
END $$
DELIMITER;

-- check for exist apply
DELIMITER $$
CREATE FUNCTION Apply_exist(
	programID INT,
    bookID VARCHAR(30)
)
RETURNS BOOL
DETERMINISTIC
BEGIN
	DECLARE NUMBER INT;
    SET NUMBER =0;
    SELECT COUNT(*) INTO NUMBER FROM applies WHERE ID=programID AND applies.BookID=bookID;
    IF NUMBER > 0
    THEN RETURN TRUE;
    ELSE RETURN FALSE;
    END IF;
END $$
DELIMITER ;

-- delete apply
DELIMITER $$
CREATE PROCEDURE DELETE_APPLY(
    programID INT,
    bookID VARCHAR(30)
)
BEGIN
	DELETE FROM applies WHERE ID=programID and applies.bookID=bookID;
END $$
DELIMITER ;

