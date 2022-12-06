USE art_gallery;

INSERT INTO artgroup (name)
VALUES
("Baroque"),
("Cubism"),
("Impressionism"),
("Renaissance"),
("Romanticism"),
("Symbolism")
;

INSERT INTO artist (name, birthplace, age, group_name)
VALUES
("Vincent van Gogh",      "Netherlands", 53, "Impressionism"),
("Leonardo da Vinci",     "Italy",       52, "Renaissance"),
("Pablo Picasso",         "Spain",       81, "Cubism"),
("Pierre-Auguste Renoir", "France",      41, "Impressionism"),
("Albrecht Durer",        "Germany",     71, "Renaissance"),
("Paul Gauguin",          "France",      48, "Symbolism"),
("Francisco Goya",        "Spain",       46, "Romanticism"),
("Rembrandt",             "Netherlands", 69, "Baroque"),
("Alfred Sisley",         "UK",          39, "Impressionism"),
("Titian",                "Italy",       88, "Renaissance")
;

INSERT INTO artwork (name, year, style_name, price, artist_name, group_name)
VALUES
("Wheatfield with Cypresses", "1889-01-01", "Oil Painting", 89000000, "Vincent van Gogh",      "Symbolism"),
("Lamp in front of a Window", "1885-01-01", "Watercolor",   85000000, "Vincent van Gogh",      "Impressionism"),
("The Baptism of Christ",     "1475-01-01", "Oil Painting", 75000000, "Leonardo da Vinci",     "Renaissance"),
("The Mackerel",              "1903-01-01", "Charcoal",      3000000, "Pablo Picasso",         "Cubism"),
("Crown of Roses",            "1818-01-01", "Watercolor",   18000000, "Pierre-Auguste Renoir", "Impressionism"),
("Melencolia",                "1514-01-01", "Engraving",    15000000, "Albrecht Durer",        "Renaissance"),
("Coastal landscape",         "1801-01-01", "Oil Painting",  1000000, "Paul Gauguin",          "Symbolism"),
("The Sacrifice to Vesta",    "1771-01-01", "Charcoal",     18000000, "Francisco Goya",        "Romanticism"),
("The Sense Of Sight",        "1624-01-01", "Oil Painting", 24000000, "Rembrandt",             "Baroque"),
("By the River Loing",        "1896-01-01", "Engraving",     6000000, "Alfred Sisley",         "Impressionism"),
("Portrait of Ariosto",       "1508-01-01", "Watercolor",    8000000, "Titian",                "Renaissance")
;

INSERT INTO customer (name, address, expenditure)
VALUES
("Thapar Renu",   "12121 Richmond Avenue, Texas",      18000000),
("Steven Croft",  "7777 Southwest Street, Florida",   174000000),
("Noah Jaffee",   "11375 S Sam, Houston",                     0),
("Omar Durrani",  "12121 Richmond Avenue, Texas",       3000000),
("Venkat Sankar", "8901 Boone Road, California",        1000000),
("Monique Jones", "8850 Long Point Road, Redwood",            0),
("Martha Jones",  "6630 Roxburgh Street, New Jersey",         0)
;

INSERT INTO fav_artists (cust_name, artist_name)
VALUES
("Thapar Renu",  "Leonardo da Vinci"),
("Thapar Renu",  "Albrecht Durer"),
("Steven Croft", "Vincent van Gogh"),
("Steven Croft", "Pierre-Auguste Renoir"),
("Noah Jaffee",  "Titian"),
("Noah Jaffee",  "Alfred Sisley")
;

INSERT INTO fav_groups (cust_name, group_name)
VALUES
("Thapar Renu",  "Renaissance"),
("Steven Croft", "Impressionism"),
("Noah Jaffee",  "Renaissance"),
("Noah Jaffee",  "Impressionism")
;

INSERT INTO transactions (art_name, cust_name, day)
VALUES
("Wheatfield with Cypresses", "Steven Croft",  "2021-03-20"),
("Lamp in front of a Window", "Steven Croft",  "2021-04-30"),
("The Sacrifice to Vesta",    "Thapar Renu",   "2022-05-02"),
("The Mackerel",              "Omar Durrani",  "2022-06-17"),
("Coastal landscape",         "Venkat Sankar", "2022-06-21")
;
