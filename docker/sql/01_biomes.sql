CREATE TABLE IF NOT EXISTS biomes (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    climate VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO biomes (name, climate, description) VALUES
    ('Forest', 'Temperate', 'Ancient woods with thick canopy and hidden trails.'),
    ('Crypt', 'Cold', 'Forgotten burial halls beneath the old kingdom.'),
    ('Caves', 'Cool', 'Deep winding tunnels and underground lakes.'),
    ('Mountains', 'Alpine', 'Jagged peaks, thin air and dragon lairs.'),
    ('Swamp', 'Humid', 'Foggy wetlands full of mud and strange lights.');
