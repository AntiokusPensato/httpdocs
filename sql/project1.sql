-- _PET_SUPPLIES DATABASE

CREATE TABLE SALES_REP
(
	REP_ID int primary key,
	FIRST_NAME varchar(20) not null,
	LAST_NAME varchar(20) not null,
	ADDRESS varchar(20),
	CITY varchar(15),
	STATE char(2),
	POSTAL char(5),
	CELL_PHONE char(12),
	COMMISSION decimal(7,2),
	RATE decimal(3,2)
);

INSERT INTO SALES_REP
	SELECT * FROM _PET_SUPPLIES.dbo.SALES_REP

CREATE TABLE ITEM
(
	ITEM_ID char(4) primary key,
	DESCRIPTION varchar(30) not null,
	ON_HAND int,
	CATEGORY char(3),
	LOCATION char (1),
	PRICE decimal(7, 2)
);

INSERT INTO ITEM
	SELECT * FROM _PET_SUPPLIES.dbo.ITEM

CREATE TABLE CUSTOMER
(
	CUST_ID int primary key,
	FIRST_NAME varchar(20) not null,
	LAST_NAME varchar(20) not null,
	ADDRESS varchar(20),
	CITY varchar(15),
	STATE char(2),
	POSTAL char(5),
	EMAIL varchar(30),
	BALANCE decimal(7,2),
	CREDIT_LIMIT decimal(7,2),
	REP_ID int not null,
);

ALTER TABLE CUSTOMER
ADD FOREIGN KEY (REP_ID) REFERENCES SALES_REP(REP_ID);

INSERT INTO CUSTOMER
	SELECT * FROM _PET_SUPPLIES.dbo.CUSTOMER

CREATE TABLE INVOICES
(
	INVOICE_NUM int primary key,
	INVOICE_DATE date not null,
	CUST_ID int not null, 
);

ALTER TABLE INVOICES
ADD FOREIGN KEY (CUST_ID) REFERENCES CUSTOMER(CUST_ID);

INSERT INTO INVOICES
	SELECT * FROM _PET_SUPPLIES.dbo.INVOICES

CREATE TABLE INVOICE_LINE
(
	INVOICE_NUM int not null references	INVOICES(INVOICE_NUM),
	ITEM_ID char(4) not null references ITEM(ITEM_ID),
	QUANTITY int not null,
	QUOTED_PRICE decimal(7,2) not null,
	primary key(INVOICE_NUM, ITEM_ID)
);

INSERT INTO INVOICE_LINE
	SELECT * FROM _PET_SUPPLIES.dbo.INVOICE_LINE

	-- Student Housing Database

CREATE TABLE SERVICE_CATEGORY
(
	CATEGORY_NUM int primary key,
	CATEGORY_DESCRIPTION varchar(100) not null,
);

INSERT INTO SERVICE_CATEGORY
	SELECT * FROM _STUDENT_HOUSING.dbo.SERVICE_CATEGORY

CREATE TABLE OWNER
(
	OWNER_NUM char(5) primary key,
	LAST_NAME varchar(20) not null,
	FIRST_NAME varchar(20) not null,
	ADDRESS varchar(100) not null,
	CITY varchar(20) not null,
	STATE char(2) not null,
	ZIP_CODE char(5) not null,
);

INSERT INTO OWNER
	SELECT * FROM _STUDENT_HOUSING.dbo.OWNER

CREATE TABLE OFFICE
(
	OFFICE_NUM	int primary key,
	OFFICE_NAME varchar(50) not null,
	ADDRESS varchar(100) not null,
	AREA varchar(50) not null,
	CITY varchar(20) not null,
	STATE char(2) not null,
	ZIP_CODE char(5) not null
);

INSERT INTO OFFICE
	SELECT * FROM _STUDENT_HOUSING.dbo.OFFICE

CREATE TABLE PROPERTY
(
	PROPERTY_ID int primary key,
	OFFICE_NUM int not null references OFFICE(OFFICE_NUM),
	ADDRESS varchar(100) not null,
	SQR_FT int not null,
	BDRMS int not null,
	FLOORS int not null,
	MONTHLY_RENT int,
	OWNER_NUM char(5) not null references OWNER(OWNER_NUM)
);

INSERT INTO PROPERTY
	SELECT * FROM _STUDENT_HOUSING.dbo.PROPERTY

CREATE TABLE RESIDENTS
(
	RESIDENT_ID int primary key,
	FIRST_NAME varchar(20) not null,
	SURNAME varchar(20) not null,
	PROPERTY_ID int not null references PROPERTY(PROPERTY_ID)
);

INSERT INTO RESIDENTS
	SELECT * FROM _STUDENT_HOUSING.dbo.RESIDENTS

CREATE TABLE SERVICE_REQUEST
(
	SERVICE_ID int primary key,
	PROPERTY_ID int not null references PROPERTY(PROPERTY_ID),
	CATEGORY_NUM int not null references SERVICE_CATEGORY(CATEGORY_NUM),
	OFFICE_NUM int not null references OFFICE(OFFICE_NUM),
	DESCRIPTION varchar(200) not null,
	STATUS varchar(200) not null,
	EST_HOURS int not null,
	SPENT_HOURS int not null,
	NEXT_SERVICE_DATE date
);

INSERT INTO SERVICE_REQUEST
	SELECT * FROM _STUDENT_HOUSING.dbo.SERVICE_REQUEST