# VAII-Semestralna-Praca
# Terra Nova 

Semestrálna práca z predmetu **VAII** (Vývoj webových aplikácií).

**Autor:** Varvara Marozava
**Študijná skupina:** 5ZYI34

## Popis projektu

Terra Nova je webová aplikácia, ktorá pomáha pri vymýšľaní fantasy svetov, napríklad pre stolové hry typu D&D. Rieši problém, že autori herných svetov majú nápady rozhádzané v poznámkach a dokumentoch. V aplikácii si môžu pre každý svet na jednom mieste spravovať biómy, rasy a príšery a mať tak prehľad o tom, čo svet obsahuje.

Aplikácia je určená hlavne majstrom hry (game masterom) a tvorcom fantasy príbehov, ale aj hráčom, ktorí si chcú svet prezrieť. Svet môže byť súkromný, alebo verejný. Verejné svety si môže prezrieť každý, ohodnotiť ich lajkom a nechať sa nimi inšpirovať. Všetok obsah je pôvodný, aplikácia nepoužíva texty z oficiálnych pravidiel žiadnej hry.

## Role v projekte

| Rola | Čo môže |
|---|---|
| **Návštevník** | prezerať verejné svety, biómy, rasy a príšery, registrovať sa, prihlásiť sa |
| **Tvorca** (prihlásený používateľ) | vytvárať vlastné svety, upravovať a mazať ich obsah, nahrávať obrázky, dávať lajky, písať komentáre |
| **Spolutvorca** (rola v konkrétnom svete, rozširujúca funkcia) | upravovať obsah sveta, do ktorého ho pozval tvorca |
| **Správca** (admin) | spravovať všetkých používateľov, skrývať alebo mazať akýkoľvek svet a komentár |

# Prípady použitia podľa rolí

**Návštevník**
- Prezrie si katalóg verejných svetov.
- Vyhľadá svet podľa názvu a zoradí ich podľa najnovších alebo najobľúbenejších.
- Otvorí detail sveta a prezrie si jeho biómy, rasy a príšery.
- Zaregistruje sa a prihlási.

**Tvorca**
- Vytvorí nový svet a nahrá jeho obálku.
- Nastaví svet ako súkromný alebo verejný.
- Pridá, upraví alebo zmaže biómy, rasy a príšery vo svojom svete.
- Pri príšere nastaví nebezpečenstvo, životy, útok, obranu, biom a obrázok.
- Dá lajk cudziemu verejnému svetu.
- Pozve spolutvorcu do svojho sveta.
- Zmaže vlastný svet.

**Spolutvorca**
- Otvorí svet, do ktorého bol pozvaný.
- Pridá alebo upraví biómy, rasy a príšery v tomto svete.

**Správca**
- Zobrazí zoznam všetkých používateľov a zmení im rolu alebo ich zablokuje.
- Skryje alebo zmaže nevhodný svet.
- Odstráni nevhodný komentár.

# Plánované entity

- **Používateľ (`users`)**: prihlásený človek. Atribúty: `id`, `username`, `email`, `password_hash`, `role` (user / admin). Je vlastníkom svetov.
- **Svet (`worlds`)**: hlavná entita, jeden vymyslený svet. Atribúty: `id`, `owner_id`, `title`, `description`, `cover`, `is_public`, `created_at`. Patrí jednému používateľovi a obsahuje biómy, rasy a príšery.
- **Bióm (`biomes`)**: prostredie sveta, napríklad les alebo púšť. Atribúty: `id`, `world_id`, `name`, `description`, `climate`. Patrí jednému svetu a môže v ňom žiť viac príšer.
- **Rasa (`races`)**: národ sveta. Atribúty: `id`, `world_id`, `name`, `description`, `strength`, `agility`, `intelligence`. Patrí jednému svetu.
- **Príšera (`monsters`)**: tvor sveta. Atribúty: `id`, `world_id`, `biome_id`, `name`, `description`, `danger` (1 až 10), `hp`, `attack`, `defense`, `image`. Patrí jednému svetu a jednému biómu.
- **Spolutvorca sveta (`world_members`)**: asociačná tabuľka. Atribúty: `world_id`, `user_id`, `role`. Určuje, ktorý používateľ môže upravovať ktorý svet.
- **Lajk (`likes`)**: asociačná tabuľka. Atribúty: `world_id`, `user_id`. Zaznamenáva, ktorý používateľ ohodnotil ktorý svet.
- **Komentár (`comments`)**: rozširujúca entita. Atribúty: `id`, `world_id`, `user_id`, `text`, `created_at`. Patrí jednému svetu a jednému autorovi.

# Vzťahy medzi entitami

- Používateľ – Svet: **1:N** (jeden používateľ vlastní viac svetov, svet má jedného vlastníka).
- Svet – Bióm: **1:N** (svet má viac biómov).
- Svet – Rasa: **1:N** (svet má viac rás).
- Svet – Príšera: **1:N** (svet má viac príšer).
- Bióm – Príšera: **1:N** (v jednom bióme žije viac príšer, príšera patrí jednému biómu).
- Používateľ – Svet cez `likes`: **M:N** (používateľ môže dať lajk viacerým svetom, svet môže mať lajky od viacerých používateľov). Dvojica (`world_id`, `user_id`) je unikátna, aby sa nedal dať lajk dvakrát.
- Používateľ – Svet cez `world_members`: **M:N** (svet môže mať viac spolutvorcov, používateľ môže byť spolutvorcom vo viacerých svetoch).
- Svet – Komentár a Používateľ – Komentár: **1:N**.

# Hlavné stránky aplikácie

1. **Domovská stránka**: úvod do aplikácie, ukážka sveta a zoznam obľúbených svetov.
2. **Katalóg svetov**: zoznam verejných svetov s vyhľadávaním a triedením (AJAX).
3. **Detail sveta**: obálka, popis, lajk a záložky Biómy, Rasy a Príšery.
4. **Registrácia**: vytvorenie účtu.
5. **Prihlásenie**: prihlásenie používateľa.
6. **Moje svety**: zoznam svetov prihláseného používateľa (len pre prihlásených).
7. **Formulár sveta**: vytvorenie a úprava sveta vrátane nahratia obálky.
8. **Správa príšer sveta**: tabuľka príšer s filtrovaním podľa biómu, úpravou a mazaním.
9. **Formulár príšery**: pridanie a úprava príšery s náhľadom a nahratím obrázka.
10. **Správa biómov a rás**: zoznamy a formuláre pre biómy a rasy sveta.
11. **Správa spolutvorcov**: pozvanie a odobratie spolutvorcov (len tvorca).
12. **Administrácia**: zoznam používateľov a moderovanie svetov (len správca).

# Rozdelenie funkcionality

**Základné funkcie**
- Registrácia, prihlásenie a odhlásenie, hashované heslá.
- Role a autorizácia (návštevník, tvorca, správca).
- CRUD svetov a CRUD príšer; podľa času aj biómov a rás.
- Súkromné a verejné svety.
- Katalóg verejných svetov a detail sveta.
- Nahrávanie obrázkov (obálka sveta, obrázok príšery).
- AJAX: vyhľadávanie a filtrovanie v katalógu.
- AJAX: lajk sveta.
- Validácia formulárov na klientovi aj na serveri.
- Ochrana proti SQL injection (pripravené dotazy).
- Responzívny dizajn.
- Docker a demo údaje.

**Rozširujúce funkcie**
- Komentáre pod svetom.
- Spolutvorcovia sveta (rola v konkrétnom svete).
- Kopírovanie príšery do iného sveta.
- Obrázok mapy sveta a drag & drop nahrávanie.
- Export sveta do PDF.
- Stránkovanie, tmavý režim.