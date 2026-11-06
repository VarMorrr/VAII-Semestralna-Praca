CREATE TABLE IF NOT EXISTS monsters (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    biome VARCHAR(50) NOT NULL,
    danger TINYINT UNSIGNED NOT NULL,
    hp INT UNSIGNED NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO monsters (name, biome, danger, hp) VALUES
    ('Goblin Scout', 'Forest', 1, 7),
    ('Skeleton Archer', 'Crypt', 2, 13),
    ('Dire Wolf', 'Forest', 3, 37),
    ('Cave Troll', 'Caves', 6, 84),
    ('Red Dragon', 'Mountains', 9, 200);
