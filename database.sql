-- Commands pasted in from Psequel work on database today

  -- PHP example (full inventory select for project page)

SELECT i.id, i.year, i.mileage, ma.name as make, mo.name as model, mo.doors, c.name as color
FROM inventory i
JOIN models mo ON i.model_id = mo.id
JOIN makes ma ON mo.make_id = ma.id
JOIN colors c ON i.color_id = c.id;

CREATE TABLE makes(
    id serial PRIMARY key,
    name varchar(30) UNIQUE NOT NULL,
    is_domestic BOOLEAN DEFAULT FALSE
);

INSERT INTO makes (name, is_domestic) VALUES ('Mazda', false);
INSERT INTO makes (name, is_domestic) VALUES ('Honda', false);
INSERT INTO makes (name, is_domestic) VALUES ('Jeep', true);
INSERT INTO makes (name, is_domestic) VALUES ('Toyota', false);
INSERT INTO makes (name, is_domestic) VALUES ('Subaru', false);
INSERT INTO makes (name, is_domestic) VALUES ('Saab', false);
INSERT INTO makes (name, is_domestic) VALUES ('Chevrolet', true);
INSERT INTO makes (name, is_domestic) VALUES ('Mitsubshi', false);
INSERT INTO makes (name, is_domestic) VALUES ('Cadillac', true);

CREATE TABLE models(
    id serial PRIMARY key,
    name varchar(30) UNIQUE NOT NULL,
    make_id INTEGER REFERENCES makes (id),
    is_hatchback BOOLEAN DEFAULT FALSE,
    doors INTEGER DEFAULT 4
);

INSERT INTO models (name, make_id, is_hatchback, doors) VALUES ('MVP', 1, true, 4);
INSERT INTO models (name, make_id, is_hatchback, doors) VALUES ('RX-7', 1, false, 2);
INSERT INTO models (name, make_id, is_hatchback, doors) VALUES ('Accord', 2, false, 4);
INSERT INTO models (name, make_id, is_hatchback, doors) VALUES ('Civic', 2, true, 2);
INSERT INTO models (name, make_id, is_hatchback, doors) VALUES ('Cherokee', 3, false, 4);
INSERT INTO models (name, make_id, is_hatchback, doors) VALUES ('Wrangler', 3, false, 2);
INSERT INTO models (name, make_id, is_hatchback, doors) VALUES ('Camry', 4, false, 4);
INSERT INTO models (name, make_id, is_hatchback, doors) VALUES ('Tundra', 4, false, 2);
INSERT INTO models (name, make_id, is_hatchback, doors) VALUES ('WR-X', 5, false, 4);
INSERT INTO models (name, make_id, is_hatchback, doors) VALUES ('Forester', 5, false, 4);
INSERT INTO models (name, make_id, is_hatchback, doors) VALUES ('95', 6, false, 4);
INSERT INTO models (name, make_id, is_hatchback, doors) VALUES ('93', 6, false, 2);
INSERT INTO models (name, make_id, is_hatchback, doors) VALUES ('Corvette', 7, false, 2);
INSERT INTO models (name, make_id, is_hatchback, doors) VALUES ('Silverado', 7, false, 2);
INSERT INTO models (name, make_id, is_hatchback, doors) VALUES ('Evolution', 8, false, 4);
INSERT INTO models (name, make_id, is_hatchback, doors) VALUES ('Gallant', 8, false, 4);
INSERT INTO models (name, make_id, is_hatchback, doors) VALUES ('DeVille', 9, false, 4);
INSERT INTO models (name, make_id, is_hatchback, doors) VALUES ('Escalade', 9, true, 4);

CREATE TABLE inventory(
    id serial PRIMARY key,
    model_id INTEGER REFERENCES models(id),
    YEAR INTEGER,
    color_id INTEGER REFERENCES colors(id),
    mileage INTEGER,
    purchase_price NUMERIC(7,2),
    sale_price NUMERIC(7,2),
    vin VARCHAR(20),
    history text,
    purchase_date DATE,
    sale_date DATE
);

INSERT INTO inventory (model_id, year, color_id, mileage, purchase_price, vin, purchase_date) VALUES (1, 2017, 1, 10000, 1000, 'ABC123', '10/01/2017');
INSERT INTO inventory (model_id, year, color_id, mileage, purchase_price, vin, purchase_date) VALUES (18, 2000, 2, 20000, 1000, 'ABC123', '10/01/2017');
INSERT INTO inventory (model_id, year, color_id, mileage, purchase_price, vin, purchase_date) VALUES (3, 2001, 3, 30000, 1000, 'ABC123', '10/01/2017');
INSERT INTO inventory (model_id, year, color_id, mileage, purchase_price, vin, purchase_date) VALUES (4, 2002, 4, 40000, 1000, 'ABC123', '10/01/2017');
INSERT INTO inventory (model_id, year, color_id, mileage, purchase_price, vin, purchase_date) VALUES (5, 2003, 5, 50000, 1000, 'ABC123', '10/01/2017');
INSERT INTO inventory (model_id, year, color_id, mileage, purchase_price, vin, purchase_date) VALUES (17, 2004, 6, 60000, 1000, 'ABC123', '10/01/2017');
INSERT INTO inventory (model_id, year, color_id, mileage, purchase_price, vin, purchase_date) VALUES (7, 2005, 7, 70000, 1000, 'ABC123', '10/01/2017');
INSERT INTO inventory (model_id, year, color_id, mileage, purchase_price, vin, purchase_date) VALUES (16, 2006, 8, 80000, 1000, 'ABC123', '10/01/2017');
INSERT INTO inventory (model_id, year, color_id, mileage, purchase_price, vin, purchase_date) VALUES (9, 2007, 9, 90000, 1000, 'ABC123', '10/01/2017');
INSERT INTO inventory (model_id, year, color_id, mileage, purchase_price, vin, purchase_date) VALUES (10, 2008, 10, 100000, 1000, 'ABC123', '10/01/2017');
INSERT INTO inventory (model_id, year, color_id, mileage, purchase_price, vin, purchase_date) VALUES (11, 2009, 11, 11000, 1000, 'ABC123', '10/01/2017');
INSERT INTO inventory (model_id, year, color_id, mileage, purchase_price, vin, purchase_date) VALUES (5, 2010, 1, 12000, 1000, 'ABC123', '10/01/2017');
INSERT INTO inventory (model_id, year, color_id, mileage, purchase_price, vin, purchase_date) VALUES (13, 2011, 2, 13000, 1000, 'ABC123', '10/01/2017');
INSERT INTO inventory (model_id, year, color_id, mileage, purchase_price, vin, purchase_date) VALUES (14, 2012, 3, 14000, 1000, 'ABC123', '10/01/2017');
INSERT INTO inventory (model_id, year, color_id, mileage, purchase_price, vin, purchase_date) VALUES (15, 2013, 4, 15000, 1000, 'ABC123', '10/01/2017');
INSERT INTO inventory (model_id, year, color_id, mileage, purchase_price, vin, purchase_date) VALUES (16, 2014, 5, 16000, 1000, 'ABC123', '10/01/2017');
INSERT INTO inventory (model_id, year, color_id, mileage, purchase_price, vin, purchase_date) VALUES (17, 2015, 6, 17000, 1000, 'ABC123', '10/01/2017');
INSERT INTO inventory (model_id, year, color_id, mileage, purchase_price, vin, purchase_date) VALUES (18, 2016, 7, 18000, 1000, 'ABC123', '10/01/2017');
