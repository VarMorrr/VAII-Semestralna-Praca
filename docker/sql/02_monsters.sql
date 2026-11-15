CREATE TABLE IF NOT EXISTS monsters (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    biomeId INT UNSIGNED NOT NULL,
    name VARCHAR(100) NOT NULL,
    danger TINYINT UNSIGNED NOT NULL,
    hp INT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_monsters_biome FOREIGN KEY (biomeId) REFERENCES biomes (id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO monsters (biomeId, name, danger, hp) VALUES
    (1, 'Goblin Scout', 1, 7),
    (2, 'Skeleton Archer', 2, 13),
    (1, 'Dire Wolf', 3, 37),
    (3, 'Cave Troll', 6, 84),
    (4, 'Red Dragon', 9, 200);
