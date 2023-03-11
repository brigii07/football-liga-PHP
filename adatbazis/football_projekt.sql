-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Már 08. 09:37
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `football_projekt`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `csapatok`
--

CREATE TABLE `csapatok` (
  `kepnev` varchar(255) DEFAULT NULL,
  `csapatnev` varchar(255) NOT NULL,
  `csapatleiras` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `csapatok`
--

INSERT INTO `csapatok` (`kepnev`, `csapatnev`, `csapatleiras`) VALUES
('honved.jpg', 'Budapest Honvéd FC', 'A Budapest Honvéd FC Magyarország egyik legismertebb labdarúgócsapata Budapest XIX. kerületéből. A kispesti klub jelenleg a magyar labdarúgó-bajnokság első osztályában szerepel. Az egyesületet 1909-ben Kispesti AC néven hozták létre eredetileg.'),
('fradi.jpg', 'Ferencváros', 'A Ferencvárosi Torna Club, vagy röviden FTC budapesti sportegyesület és labdarúgócsapat Budapest IX. kerületében. 1899-es alapítása óta 33 alkalommal avatták magyar bajnokká, 1975-ben a második helyet szerezte meg a kupagyőztesek Európa-kupájában.'),
('kisvarda.jpg', 'Kisvárda FC', 'A Kisvárda FC Kisvárda labdarúgócsapata, mely jelenleg Kisvárda Master Good néven a magyar élvonalban szerepel. A klubot 1911-ben hozták létre KSE (Kisvárdai Sport Egyesület) néven, azóta szerepelt jó pár névvel.'),
('mtk.jpeg', 'Magyar Testgyakorlók Köre (MTK)', 'Az MTK a 20. század elejétől fogva a budapesti nagy klubok egyikeként mindig meghatározó szerepet játszott a hazai labdarúgásban. Kupaaranyérmek számát tekintve a Ferencvárosi TC után a második legeredményesebb szereplője a magyar labdarúgó-bajnokságnak.'),
('mezokovesd.jpg', 'Mezőkövesd Zsóry FC', 'A Mezőkövesdi SE (szponzorált nevén, a felnőtt csapat: Mezőkövesd Zsóry FC) magyar labdarúgóklub Mezőkövesd városából. Jelenleg az NB I-ben szerepel.'),
('paks.jpg', 'Paks FC', 'A Paksi FC jelenleg a magyar labdarúgó-bajnokság első osztályában szerepel. Rendszeres tagjai a bajnokságnak. A csapat legnagyobb sikere, hogy 2011-ben megnyerte a Ligakupát, valamint a 2010-11 NB I-es bajnokságban ezüstérmes lett.'),
('puskas.jpg', 'Puskás Akadémia FC', 'A Puskás Akadémia FC (Videoton-Puskás Akadémia) egy felcsúti székhelyű labdarúgóklub. Bár független egyesület, 2012-ig a Videoton második csapata volt. Először a 2013–2014-es szezonban szerepelt az NB I-ben, 2017 óta újra ebben a bajnokságban játszik.'),
('soroksar.jpg', 'Soroksár SC', 'Az 1999-ben alapított Soroksár SC egy budapesti magyar labdarúgócsapat, mely utódja az 1933–1934-es magyar labdarúgókupa kupagyőzelmet szerző Soroksári AC-nak . Jelenleg a NB II-ben szerepel.'),
('haladas.jpg', 'Szombathelyi Haladás', 'A Szombathelyi Haladás VSE 1919-ben alakult szombathelyi labdarúgóklub. A labdarúgó-bajnokság másodosztályának tagja. Legnagyobb sikere egy magyar bajnoki bronzérem (2008–09), valamint három Magyar Kupa-ezüstérem. '),
('ujpest.jpg', 'Újpest FC', 'Az Újpest FC a második legrégebben alapított magyar sportegyesület labdarúgócsapata, melynek székhelye, Budapest IV. kerülete, tehát Újpest. A lila-fehérben szereplő csapat 20-szoros magyar bajnok, 21-szeres magyar bajnoki második helyezett.'),
('vasas.jpg', 'Vasas SC', 'A Vasas FC vagy röviden Vasas nagy múltú magyar élvonalbeli labdarúgócsapat Budapest XIII. kerületéből. Története során hat alkalommal nyert magyar bajnoki címet, négy alkalommal pedig kupagyőztes volt.'),
('zte.png', 'Zalaegerszegi TE FC', 'A Zalaegerszegi TE FC magyar labdarúgócsapat. A 2001–2002-es NB I-es szezon bajnoka.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `csapat_parositas`
--

CREATE TABLE `csapat_parositas` (
  `hazai_cs` varchar(255) DEFAULT NULL,
  `idegen_cs` varchar(255) DEFAULT NULL,
  `hazai_sz` varchar(4) DEFAULT NULL,
  `dontetlen_sz` varchar(4) DEFAULT NULL,
  `idegen_sz` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `csapat_parositas`
--

INSERT INTO `csapat_parositas` (`hazai_cs`, `idegen_cs`, `hazai_sz`, `dontetlen_sz`, `idegen_sz`) VALUES
('Kisvárda FC', 'Soroksár SC', '1', '2', '3'),
('Budapest Honvéd FC', 'Ferencváros', '1', '2', '3'),
('Soroksár SC', 'Mezőkövesd Zsóry FC', '1.5', '6', '4');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `eredmenyek`
--

CREATE TABLE `eredmenyek` (
  `vegeredmeny` varchar(255) DEFAULT NULL,
  `idopont` date DEFAULT NULL,
  `hazai` varchar(255) DEFAULT NULL,
  `idegen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `eredmenyek`
--

INSERT INTO `eredmenyek` (`vegeredmeny`, `idopont`, `hazai`, `idegen`) VALUES
('0-0', '2022-12-21', 'Mezőkövesdi SE', 'Ferencváros'),
('2-0', '2022-11-13', 'Ferencváros', 'Honvéd FC'),
('3-2', '2022-11-09', 'Ferencváros', 'Paks FC'),
('2-1', '2022-10-30', 'Ferencváros', 'Zalaegerszeg FC'),
('2-1', '2022-10-16', 'Mezőkövesd SE', 'Ferencváros'),
('0-6', '2022-09-04', 'Újpest FC', 'Ferencváros'),
('0-1', '2022-08-31', 'Vasas SC', 'Ferencváros'),
('3-1', '2022-02-28', 'Ferencváros', 'Honvéd FC'),
('3-0', '2022-05-11', 'Ferencváros', 'Paks FC'),
('0-1', '2022-03-01', 'Honvéd FC', 'Ferencváros'),
('2-0', '2022-11-10', 'Honvéd FC', 'Vasas FC'),
('5-0', '2022-11-06', 'Paks FC', 'Honvéd FC'),
('0-2', '2022-10-22', 'Zalaegerszeg FC', 'Honvéd FC'),
('1-2', '2022-10-19', 'Szombathelyi Haladás', 'Honvéd FC'),
('2-2', '2022-10-08', 'Honvéd FC', 'Mezőkövesdi SE'),
('0-1', '2022-09-04', 'Kisvárda FC', 'Honvéd FC'),
('0-0', '2022-09-01', 'Honvéd FC', 'Újpest FC'),
('1-2', '2022-08-21', 'Vasas FC', 'Honvéd FC'),
('0-1', '2022-10-29', 'Paks FC', 'Vasas FC'),
('1-0', '2022-11-13', 'Vasas FC', 'Mezőkövesdi SE'),
('3-0', '2022-10-15', 'Zalaegerszeg FC', 'Paks FC'),
('0-0', '2022-05-02', 'Szombathelyi Haladás', 'Vasas FC'),
('0-1', '2022-04-06', 'Szombathelyi Haladás', 'Soroksár SC'),
('1-3', '2022-08-31', 'Paks FC', 'Kisvárda FC'),
('1-3', '2022-08-20', 'Zalaegerszeg FC', 'Kisvárda FC'),
('1-1', '2022-08-14', 'Kisvárda FC', 'Puskás Akadémia'),
('3-3', '2022-05-22', 'Vasas FC', 'Soroksár SE'),
('0-1', '2022-11-05', 'Puskás Akadémia', 'Kisvárda FC'),
('1-1', '2022-10-28', 'Mezőkövesd SE', 'Kisvárda FC'),
('2-0', '2022-10-08', 'Kisvárda FC', 'Vasas FC'),
('4-0', '2022-10-01', 'Újpest FC', 'Kisvárda FC'),
('0-1', '2022-11-05', 'Puskás Akadémia', 'Kisvárda FC'),
('1-3', '2022-10-09', 'Paks FC', 'Puskás Akadémia'),
('1-3', '2022-09-11', 'Zalaegerszeg FC', 'Puskás Akadémia'),
('1-1', '2022-09-03', 'Vasas FC', 'Puskás Akadémia'),
('1-0', '2022-08-30', 'Puskás Akadémia', 'Mezőkövesd FC');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kredit_vetel`
--

CREATE TABLE `kredit_vetel` (
  `id` int(11) NOT NULL,
  `kerdes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kredit_vetel`
--

INSERT INTO `kredit_vetel` (`id`, `kerdes`) VALUES
(1, 'Mekkora volt a legnagyobb Credit nyereséged?'),
(2, 'Mekkora nyereség céljával regisztráltál ide?'),
(3, 'Mikor regisztráltál?'),
(4, 'Mit változtatnál meg az oldalon?'),
(5, 'Mekkora volt a legnagyobb Credit, amit egy meccsre tettél?'),
(6, 'Melyik a kedvenc csapatod?'),
(7, 'Fogadnál külföldi csapatokra is?');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `registered`
--

CREATE TABLE `registered` (
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `eletkor` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `credit_vetel` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `registered`
--

INSERT INTO `registered` (`username`, `password`, `email`, `eletkor`, `credit`, `credit_vetel`, `id`, `admin`) VALUES
('valami', '$2y$10$I8Gb0fvgmtHwQ.2YvnS97.LR2eoB8ScqyPAsjJAQoE9/TTMzAR5Oe', 'valami@valami.hu', 19, 1500, 0, 2, 1),
('valami2', '$2y$10$yP5/PyeguLo7Yu1ALvWONujKW7k3M.3LU30vaHbA1DMJdSKnrDOLm', 'valami2@valami2.hu', 19, 1500, 0, 3, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `uzenetek`
--

CREATE TABLE `uzenetek` (
  `id` int(11) NOT NULL,
  `uzenet` varchar(255) DEFAULT NULL,
  `felhasznaloi_nev` varchar(255) DEFAULT NULL,
  `email_cim` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `uzenetek`
--

INSERT INTO `uzenetek` (`id`, `uzenet`, `felhasznaloi_nev`, `email_cim`) VALUES
(6, 'xd', 'valami2', 'valami2@valami2.hu'),
(7, 'xddd', 'valami2', 'valami2@valami2.hu'),
(8, 'minden is', 'valami2', 'valami2@valami2.hu'),
(9, 'szopatsz', 'valami2', 'valami2@valami2.hu');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `valaszok`
--

CREATE TABLE `valaszok` (
  `valasz` varchar(255) DEFAULT NULL,
  `vasarolt_mar` mediumint(11) DEFAULT NULL,
  `felhasznaloiId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `valaszok`
--

INSERT INTO `valaszok` (`valasz`, `vasarolt_mar`, `felhasznaloiId`) VALUES
('semmit', 0, 3);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `csapatok`
--
ALTER TABLE `csapatok`
  ADD PRIMARY KEY (`csapatnev`);

--
-- A tábla indexei `kredit_vetel`
--
ALTER TABLE `kredit_vetel`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `registered`
--
ALTER TABLE `registered`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A tábla indexei `uzenetek`
--
ALTER TABLE `uzenetek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `valaszok`
--
ALTER TABLE `valaszok`
  ADD KEY `felhasznaloiId` (`felhasznaloiId`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `kredit_vetel`
--
ALTER TABLE `kredit_vetel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `registered`
--
ALTER TABLE `registered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `uzenetek`
--
ALTER TABLE `uzenetek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `valaszok`
--
ALTER TABLE `valaszok`
  ADD CONSTRAINT `valaszok_ibfk_1` FOREIGN KEY (`felhasznaloiId`) REFERENCES `registered` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
