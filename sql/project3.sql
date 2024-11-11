-- Pet Supplies Database
--Trying a different way to format on this assignment

--1. Customers who ordered Large Pet Carriers
SELECT DISTINCT 
	c.FIRST_NAME,
	c.LAST_NAME
FROM
	CUSTOMER c
	JOIN INVOICES i
		ON c.CUST_ID = i.CUST_ID
	JOIN INVOICE_LINE il
		ON i.INVOICE_NUM = il.INVOICE_NUM
	JOIN ITEM itm
		ON il.ITEM_ID = itm.ITEM_ID
WHERE
	itm.DESCRIPTION = 'Large Pet Carrier';

--2. Order Total for James Gonzalez
SELECT
	SUM(il.QUANTITY * il.QUOTED_PRICE) AS OrderTotal
FROM
	CUSTOMER c
	JOIN INVOICES i
		ON c.CUST_ID = i.CUST_ID
	JOIN INVOICE_LINE il
		ON i.INVOICE_NUM = il.INVOICE_NUM
WHERE
	c.FIRST_NAME = 'James'
	and c.LAST_NAME = 'Gonzalez';

--3. Items ordered by Donna Smith's customers
SELECT DISTINCT
	itm.DESCRIPTION
FROM
	SALES_REP sr
	JOIN CUSTOMER c
		ON sr.REP_ID = c.REP_ID
	JOIN INVOICES i
		ON c.CUST_ID = i.CUST_ID
	JOIN INVOICE_LINE il
		ON i.INVOICE_NUM = il.INVOICE_NUM
	JOIN ITEM itm
		ON il.ITEM_ID = itm.ITEM_ID
WHERE
	sr.FIRST_NAME = 'Donna'
	AND sr.LAST_NAME = 'Smith';

--4. Count of Wild Bird Food (25 lb) orders
SELECT
	SUM(il.QUANTITY) AS TotalOrdered
FROM
	INVOICE_LINE il
	JOIN ITEM itm
		ON il.ITEM_ID = itm.ITEM_ID
WHERE
	itm.DESCRIPTION = 'Wild Bird Food (25 lb)';

--5. Customers who placed orders on Nov 18, 2021
SELECT DISTINCT
	c.FIRST_NAME,
	c.LAST_NAME
FROM
	CUSTOMER c
	JOIN INVOICES i
		ON c.CUST_ID = i.CUST_ID
WHERE
	i.INVOICE_DATE = '2021-11-18';

--6. Invoices from Nov 15, 2021 with the customers details
SELECT
	i.INVOICE_NUM,
	c.CUST_ID,
	c.FIRST_NAME,
	c.LAST_NAME
FROM
	INVOICES i
	JOIN CUSTOMER c
		ON i.CUST_ID = c.CUST_ID
WHERE
	i.INVOICE_DATE = '2021-11-15';

--7. Use IN subquery for Nov 15, 2021 orders
SELECT
	CUST_ID,
	FIRST_NAME,
	LAST_NAME
FROM
	CUSTOMER
WHERE
	CUST_ID IN (
		SELECT
			CUST_ID
		FROM
			INVOICES
		WHERE
			INVOICE_DATE = '2021-11-15'
	);

--8. Repeat #7 but use EXISTS subquery
SELECT
	c.CUST_ID,
	c.FIRST_NAME,
	c.LAST_NAME
FROM
	CUSTOMER c
WHERE
	EXISTS (
		SELECT 1
		FROM INVOICES i
		WHERE
			i.CUST_ID = c.CUST_ID
			AND i.INVOICE_DATE = '2021-11-15'
	);

--9. Sales reps who have customers with a credit limit of at least $500
SELECT DISTINCT
    sr.REP_ID,
    sr.FIRST_NAME,
    sr.LAST_NAME
FROM 
    SALES_REP sr
WHERE 
    sr.REP_ID IN (
        SELECT 
            REP_ID
        FROM 
            CUSTOMER
        WHERE 
            CREDIT_LIMIT >= 500
    );

--10. Repeat #9 but do not use a subquery
SELECT DISTINCT
	sr.REP_ID,
	sr.FIRST_NAME,
	sr.LAST_NAME
FROM
	SALES_REP sr
	JOIN CUSTOMER c
		ON sr.REP_ID = c.REP_ID
WHERE
	c.CREDIT_LIMIT >= 500;

--11. List information on items that havent been ordered
SELECT
	itm.CATEGORY,
	itm.DESCRIPTION,
	itm.ON_HAND
FROM
	ITEM itm
	LEFT JOIN INVOICE_LINE il
		ON itm.ITEM_ID = il.ITEM_ID
WHERE
	il.ITEM_ID IS NULL;

--12. Customers who have not placed and order
SELECT 
    c.FIRST_NAME,
    c.LAST_NAME,
    c.CREDIT_LIMIT
FROM 
    CUSTOMER c
    LEFT JOIN INVOICES i 
        ON c.CUST_ID = i.CUST_ID
WHERE 
    i.INVOICE_NUM IS NULL;

--Student Housing Database

--13. Offices collecting more that $9500 in rent
SELECT
	o.OFFICE_NAME,
	o.CITY,
	o.STATE
FROM
	OFFICE o
	JOIN PROPERTY p
		ON o.OFFICE_NUM = p.OFFICE_NUM
GROUP BY
	o.OFFICE_NAME,
	o.CITY,
	o.STATE
HAVING
	SUM(p.MONTHLY_RENT) > 9500;

--14. Properties listed with rent and owner info
SELECT
	p.PROPERTY_ID,
	p.MONTHLY_RENT,
	o.FIRST_NAME,
	o.LAST_NAME
FROM
	PROPERTY p
	INNER JOIN OWNER o
		ON p.OWNER_NUM = o.OWNER_NUM
ORDER BY
	o.LAST_NAME;

--15. Repeat 14 but with different join technique
SELECT
	p.PROPERTY_ID,
	p.MONTHLY_RENT,
	o.FIRST_NAME,
	o.LAST_NAME
FROM
	PROPERTY p
	LEFT JOIN OWNER o
		ON p.OWNER_NUM = o.OWNER_NUM
ORDER BY
	o.LAST_NAME;

--16. Condos that have at least 2 bedrooms and 800 sqft and owners who dont live in Washington
SELECT
	p.PROPERTY_ID,
	p.OFFICE_NUM,
	p.SQR_FT
FROM
	PROPERTY p
	JOIN OWNER o
		ON p.OWNER_NUM = o.OWNER_NUM
WHERE
	p.BDRMS >= 2
	AND p.SQR_FT >= 800
	AND o.STATE != 'WA';

--17. List service category descriptions that have never been used.
SELECT
	sc.CATEGORY_DESCRIPTION
From
	SERVICE_CATEGORY sc
	LEFT JOIN SERVICE_REQUEST sr
		ON sc.CATEGORY_NUM = sr.CATEGORY_NUM
WHERE
	sr.CATEGORY_NUM IS NULL;

--18. Which Properties have no service requests
SELECT
	p.PROPERTY_ID
FROM
	PROPERTY p
	LEFT JOIN SERVICE_REQUEST sr
		ON p.PROPERTY_ID = sr.PROPERTY_ID
WHERE
	sr.PROPERTY_ID IS NULL;

--19. Do #18 again but with a different join technique
SELECT
	p.PROPERTY_ID
FROM
	SERVICE_REQUEST sr
	RIGHT JOIN PROPERTY p
		ON sr.PROPERTY_ID = p.PROPERTY_ID
WHERE
	sr.PROPERTY_ID IS NULL;

--20. Service categories with 4 or more hours spent on them
SELECT
	sc.CATEGORY_DESCRIPTION
FROM
	SERVICE_CATEGORY sc
	JOIN SERVICE_REQUEST sr
		ON sc.CATEGORY_NUM = sr.CATEGORY_NUM
GROUP BY
	sc.CATEGORY_DESCRIPTION
HAVING
	SUM(sr.EST_HOURS) >=4;

--21. Wo owns a property with 2 or more bedrooms?
SELECT DISTINCT
	o.FIRST_NAME,
	o.LAST_NAME
FROM
	OWNER o
	JOIN PROPERTY p
		ON o.OWNER_NUM = p.OWNER_NUM
WHERE
	p.BDRMS >= 2;

--22. Which owners own more than 1 property?
SELECT
	o.FIRST_NAME,
	o.LAST_NAME,
	COUNT(p.PROPERTY_ID) AS PropertyCount
FROM
	OWNER o
	JOIN PROPERTY p
		ON o.OWNER_NUM = p.OWNER_NUM
GROUP BY
	o.FIRST_NAME,
	o.LAST_NAME
HAVING
	COUNT(p.PROPERTY_ID) > 1;

--23. Number of residents in properties > 1000 sqft
SELECT
	COUNT(r.RESIDENT_ID) AS ResidentNumber
FROM
	RESIDENTS r
	JOIN PROPERTY p
		ON r.PROPERTY_ID = p.PROPERTY_ID
WHERE
	p.SQR_FT > 1000;

--24. Who owns Tahir Halabi's property
SELECT
	o.FIRST_NAME,
	o.LAST_NAME
FROM
	OWNER o
	JOIN PROPERTY p
		ON o.OWNER_NUM = p.OWNER_NUM
	JOIN RESIDENTS r
		ON p.PROPERTY_ID = r.PROPERTY_ID
WHERE
	r.FIRST_NAME = 'Tahir'
	AND r.SURNAME = 'Halabi';

--25. With a subquery who resident in property with most estimated service hours remaining
SELECT
	r.FIRST_NAME,
	r.SURNAME
FROM
	RESIDENTS r
	JOIN PROPERTY p
		ON r.PROPERTY_ID = p.PROPERTY_ID
WHERE
	p.PROPERTY_ID = (
		SELECT TOP 1
			PROPERTY_ID
		FROM
			SERVICE_REQUEST
		GROUP BY
			PROPERTY_ID
		ORDER BY
			SUM(EST_HOURS) DESC
	);

 