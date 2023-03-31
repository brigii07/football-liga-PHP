-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Már 30. 09:15
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
-- Tábla szerkezet ehhez a táblához `admin_valasz`
--

CREATE TABLE `admin_valasz` (
  `valasz` varchar(255) DEFAULT NULL,
  `cimzett` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

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
  `hazai_sz` varchar(4) DEFAULT NULL,
  `dontetlen_sz` varchar(4) DEFAULT NULL,
  `idegen_sz` varchar(4) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `eredmeny_hazai` int(11) DEFAULT NULL,
  `eredmeny_idegen` int(11) DEFAULT NULL,
  `idopont` date DEFAULT NULL,
  `hazai_csapat` varchar(255) DEFAULT NULL,
  `idegen_csapat` varchar(255) DEFAULT NULL,
  `fogadas_eredmeny` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `csapat_parositas`
--

INSERT INTO `csapat_parositas` (`hazai_sz`, `dontetlen_sz`, `idegen_sz`, `id`, `eredmeny_hazai`, `eredmeny_idegen`, `idopont`, `hazai_csapat`, `idegen_csapat`, `fogadas_eredmeny`) VALUES
('1.5', '6', '4', 29, 1, 1, '2023-03-30', 'Ferencváros', 'Budapest Honvéd FC', 2),
('2', '3.5', '1.4', 30, NULL, NULL, NULL, 'Mezőkövesd Zsóry FC', 'Puskás Akadémia FC', NULL),
('1.9', '4', '2.8', 31, NULL, NULL, NULL, 'Vasas SC', 'Zalaegerszegi TE FC', NULL);

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
-- Tábla szerkezet ehhez a táblához `fogadas`
--

CREATE TABLE `fogadas` (
  `felhasznaloId` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `meccsId` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `fogadas_tipusa` int(11) DEFAULT NULL,
  `alapCredit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jatekosok`
--

CREATE TABLE `jatekosok` (
  `csapat` varchar(255) DEFAULT NULL,
  `jatekos_nev` varchar(255) DEFAULT NULL,
  `poszt` varchar(255) DEFAULT NULL,
  `sebesseg` double(8,2) DEFAULT round(rand() * 50.01 + 99.99,2),
  `pontossag` double(8,2) DEFAULT round(rand() * 50.01 + 99.99,2),
  `vedekezes` double(8,2) DEFAULT round(rand() * 50.01 + 99.99,2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `jatekosok`
--

INSERT INTO `jatekosok` (`csapat`, `jatekos_nev`, `poszt`, `sebesseg`, `pontossag`, `vedekezes`) VALUES
('Budapest Honvéd FC', 'Dúzs Gellért', 'Kapus', 98.50, 63.58, 70.36),
('Budapest Honvéd FC', 'Ivan Lovric', 'Balhátvéd', 62.09, 98.36, 59.51),
('Budapest Honvéd FC', 'Nikola Miltrovic', 'Középhátvéd', 50.49, 72.92, 65.13),
('Budapest Honvéd FC', 'Luka Capan', 'Jobbhátvéd', 56.90, 88.08, 72.72),
('Budapest Honvéd FC', 'Zsótér Donát', 'Védekező középpályás', 98.37, 76.69, 87.34),
('Budapest Honvéd FC', 'Brandon Domingués', 'Jobboldali középpályás', 58.64, 79.16, 71.87),
('Budapest Honvéd FC', 'Jairo Samperio', 'Baloldali középpályás', 71.90, 93.86, 56.63),
('Budapest Honvéd FC', 'Keresztes Noel', 'Jobbszélső', 98.57, 76.94, 87.98),
('Budapest Honvéd FC', 'Bocskay Bertalan', 'Támadóközéppályás', 61.11, 89.58, 67.58),
('Budapest Honvéd FC', 'Lukas Klemenz', 'Balszélső', 68.14, 88.00, 87.55),
('Budapest Honvéd FC', 'Nenad Lukic', 'Középcsatár', 74.74, 61.06, 80.09),
('Ferencváros', 'Dibusz Dénes', 'Kapus', 69.25, 55.99, 71.19),
('Ferencváros', 'Samy Mmaee', 'Balhátvéd', 88.98, 83.34, 50.75),
('Ferencváros', 'Myenty Abena', 'Középhátvéd', 51.74, 56.45, 77.01),
('Ferencváros', 'Henry Wingo', 'Jobbhátvéd', 67.70, 57.47, 83.25),
('Ferencváros', 'Kristofer Zachariassen', 'Védekező középpályás', 95.84, 81.46, 69.76),
('Ferencváros', 'Xavier Mercier', 'Jobboldali középpályás', 54.41, 61.78, 95.69),
('Ferencváros', 'Lisztes Krisztián', 'Baloldali középpályás', 96.08, 94.34, 84.46),
('Ferencváros', 'Mats Knoester', 'Jobbszélső', 89.30, 94.09, 54.54),
('Ferencváros', 'Muhamed Besic', 'Támadóközéppályás', 87.46, 76.68, 71.03),
('Ferencváros', 'Botka Endre', 'Balszélső', 75.10, 63.39, 90.68),
('Ferencváros', 'Ryan Mmaee', 'Középcsatár', 66.24, 58.12, 90.91),
('Kisvárda FC', 'Danijel Petkovic', 'Kapus', 83.19, 93.23, 68.57),
('Kisvárda FC', 'Dominik Kovacic', 'Balhátvéd', 62.17, 55.14, 88.20),
('Kisvárda FC', 'Aleksandar Jovicic', 'Középhátvéd', 78.59, 78.34, 56.92),
('Kisvárda FC', 'Matheus Leoni', 'Jobbhátvéd', 97.58, 71.13, 61.94),
('Kisvárda FC', 'Czérna Gábor Erik', 'Védekező középpályás', 95.29, 93.65, 83.35),
('Kisvárda FC', 'Ötvös Bence', 'Jobboldali középpályás', 85.82, 80.05, 92.79),
('Kisvárda FC', 'Vida Kristopher', 'Baloldali középpályás', 75.78, 50.55, 73.41),
('Kisvárda FC', 'Anton Kravcsenko', 'Jobbszélső', 67.41, 66.80, 81.78),
('Kisvárda FC', 'Janisz Karabeljov', 'Támadóközéppályás', 60.51, 56.22, 98.57),
('Kisvárda FC', 'Jaroslav Navrátil', 'Balszélső', 78.18, 94.18, 88.39),
('Kisvárda FC', 'Mario Ilievski', 'Középcsatár', 60.39, 84.78, 94.71),
('Magyar Testgyakorlók Köre (MTK)', 'Somodi Bence', 'Kapus', 71.24, 71.07, 91.64),
('Magyar Testgyakorlók Köre (MTK)', 'Nagy Zsombor', 'Balhátvéd', 96.98, 61.98, 66.97),
('Magyar Testgyakorlók Köre (MTK)', 'Bobál Dávid', 'Középhátvéd', 98.88, 96.52, 86.94),
('Magyar Testgyakorlók Köre (MTK)', 'Vadnai Dániel', 'Jobbhátvéd', 95.14, 66.89, 97.04),
('Magyar Testgyakorlók Köre (MTK)', 'Bognár István', 'Védekező középpályás', 87.51, 96.43, 71.64),
('Magyar Testgyakorlók Köre (MTK)', 'Kata Mihály', 'Jobboldali középpályás', 67.90, 74.59, 70.25),
('Magyar Testgyakorlók Köre (MTK)', 'Nikolas Spalek', 'Baloldali középpályás', 77.47, 77.60, 56.60),
('Magyar Testgyakorlók Köre (MTK)', 'Kocsis Gergő', 'Jobbszélső', 98.21, 75.26, 80.64),
('Magyar Testgyakorlók Köre (MTK)', 'Khaly Iyane Thian', 'Támadóközéppályás', 78.44, 51.26, 68.98),
('Magyar Testgyakorlók Köre (MTK)', 'Mihály Ádám', 'Balszélső', 92.14, 56.74, 55.29),
('Magyar Testgyakorlók Köre (MTK)', 'Kovács Mátyás', 'Középcsatár', 56.21, 65.21, 58.39),
('Mezőkövesd Zsóry FC', 'Riccardo Piscitelli', 'Kapus', 95.33, 55.49, 88.47),
('Mezőkövesd Zsóry FC', 'Andrej Lukic', 'Balhátvéd', 78.86, 78.88, 58.84),
('Mezőkövesd Zsóry FC', 'Younn Zahary', 'Középhátvéd', 56.57, 56.34, 61.97),
('Mezőkövesd Zsóry FC', 'Steliano Filip', 'Jobbhátvéd', 90.83, 71.23, 82.65),
('Mezőkövesd Zsóry FC', 'Cseri Tamás', 'Védekező középpályás', 51.58, 57.95, 84.99),
('Mezőkövesd Zsóry FC', 'David Babunski', 'Jobboldali középpályás', 54.09, 63.51, 56.25),
('Mezőkövesd Zsóry FC', 'Nagy Gergő', 'Baloldali középpályás', 89.73, 82.90, 95.33),
('Mezőkövesd Zsóry FC', 'Marko Brtan', 'Jobbszélső', 79.93, 63.64, 77.44),
('Mezőkövesd Zsóry FC', 'Vajda Sándor', 'Támadóközéppályás', 97.29, 57.12, 90.72),
('Mezőkövesd Zsóry FC', 'Márkus Márk Attila', 'Balszélső', 85.26, 55.14, 67.91),
('Mezőkövesd Zsóry FC', 'Nagy Dominik', 'Középcsatár', 75.13, 72.91, 89.18),
('Paks FC', 'Nagy Gergely', 'Kapus', 79.16, 78.26, 54.84),
('Paks FC', 'Szabó János', 'Balhátvéd', 87.41, 75.55, 65.49),
('Paks FC', 'Kádár Tamás', 'Középhátvéd', 50.83, 56.67, 80.87),
('Paks FC', 'Lenzsér Bence', 'Jobbhátvéd', 86.31, 89.95, 91.84),
('Paks FC', 'Windecker József', 'Védekező középpályás', 90.35, 77.23, 65.12),
('Paks FC', 'Balogh Balázs', 'Jobboldali középpályás', 92.87, 72.02, 80.49),
('Paks FC', 'Böle Lukács', 'Baloldali középpályás', 87.39, 96.46, 72.13),
('Paks FC', 'Haris Attila', 'Jobbszélső', 70.28, 85.02, 66.23),
('Paks FC', 'Papp Kristóf', 'Támadóközéppályás', 75.11, 77.87, 65.01),
('Paks FC', 'Nagy Richárd', 'Balszélső', 90.42, 60.10, 77.22),
('Paks FC', 'Böde Dániel', 'Középcsatár', 57.82, 56.43, 58.71),
('Puskás Akadémia FC', 'Tóth Balázs', 'Kapus', 74.23, 96.03, 60.46),
('Puskás Akadémia FC', 'Patrizio Stronati', 'Balhátvéd', 62.22, 79.71, 63.87),
('Puskás Akadémia FC', 'Nagy Zsolt', 'Középhátvéd', 79.24, 56.61, 93.30),
('Puskás Akadémia FC', 'Batik Bence', 'Jobbhátvéd', 50.69, 70.53, 52.59),
('Puskás Akadémia FC', 'Marius Corbu', 'Védekező középpályás', 50.37, 93.06, 68.18),
('Puskás Akadémia FC', 'Martin Kern', 'Jobboldali középpályás', 60.72, 98.07, 62.21),
('Puskás Akadémia FC', 'Jakub Plsek', 'Baloldali középpályás', 64.82, 87.49, 94.98),
('Puskás Akadémia FC', 'Posztobányi Patrik', 'Jobbszélső', 64.44, 85.24, 84.90),
('Puskás Akadémia FC', 'Yoell van Nieff', 'Támadóközéppályás', 69.78, 93.19, 59.62),
('Puskás Akadémia FC', 'Markek Tamás', 'Balszélső', 66.53, 54.81, 73.43),
('Puskás Akadémia FC', 'Sahab Zaedi', 'Középcsatár', 54.73, 52.37, 96.67),
('Soroksár SC', 'Holczer Ádám', 'Kapus', 80.22, 61.08, 63.77),
('Soroksár SC', 'Németh Erik', 'Balhátvéd', 85.59, 88.66, 87.51),
('Soroksár SC', 'Valencsik Dávid', 'Középhátvéd', 72.59, 50.42, 82.30),
('Soroksár SC', 'Lipcsei Krisztián', 'Jobbhátvéd', 63.27, 68.43, 53.34),
('Soroksár SC', 'Halmai Ádám', 'Védekező középpályás', 60.42, 92.09, 82.16),
('Soroksár SC', 'Vass Ádám', 'Jobboldali középpályás', 84.55, 77.28, 82.75),
('Soroksár SC', 'Korozmán Kevin', 'Baloldali középpályás', 82.89, 67.21, 86.39),
('Soroksár SC', 'Sipos Zoltán', 'Jobbszélső', 82.33, 53.45, 68.27),
('Soroksár SC', 'Hudák Martin', 'Támadóközéppályás', 81.99, 57.13, 87.68),
('Soroksár SC', 'Köböl Milán Krisztián', 'Balszélső', 70.01, 86.04, 72.14),
('Soroksár SC', 'Lovrencsics Balázs', 'Középcsatár', 52.58, 94.47, 68.63),
('Szombathelyi Haladás', 'Verpecz István', 'Kapus', 58.73, 86.74, 60.54),
('Szombathelyi Haladás', 'Németh Milán', 'Balhátvéd', 90.46, 73.67, 95.99),
('Szombathelyi Haladás', 'Csonka Bonifác', 'Középhátvéd', 61.95, 69.78, 64.04),
('Szombathelyi Haladás', 'Devecseri Szilárd', 'Jobbhátvéd', 60.84, 62.12, 78.05),
('Szombathelyi Haladás', 'Rácz Barnabás', 'Védekező középpályás', 55.88, 93.26, 52.67),
('Szombathelyi Haladás', 'Csernik Kornél', 'Jobboldali középpályás', 80.58, 96.90, 94.74),
('Szombathelyi Haladás', 'Tóth Máté', 'Baloldali középpályás', 84.02, 85.86, 78.25),
('Szombathelyi Haladás', 'Csilus Tamás', 'Jobbszélső', 83.65, 84.49, 72.53),
('Szombathelyi Haladás', 'Vanja Zvekanov', 'Támadóközéppályás', 59.18, 77.31, 61.03),
('Szombathelyi Haladás', 'Mohos Barnabás', 'Balszélső', 72.18, 78.84, 78.63),
('Szombathelyi Haladás', 'Lencse László', 'Középcsatár', 57.65, 51.36, 82.84),
('Újpest FC', 'Banai Dávid', 'Kapus', 63.13, 66.12, 91.23),
('Újpest FC', 'Lirim Kastrati', 'Balhátvéd', 60.77, 78.15, 60.45),
('Újpest FC', 'Tim Hall', 'Középhátvéd', 66.79, 53.59, 66.58),
('Újpest FC', 'Abdoulaye Diaby', 'Jobbhátvéd', 73.14, 66.97, 65.42),
('Újpest FC', 'Luis Jakovi', 'Védekező középpályás', 76.20, 85.72, 52.02),
('Újpest FC', 'Simon Krisztián', 'Jobboldali középpályás', 50.95, 97.69, 89.59),
('Újpest FC', 'Vincent Onovo', 'Baloldali középpályás', 55.87, 58.57, 75.24),
('Újpest FC', 'Luca Mack', 'Jobbszélső', 52.50, 84.78, 69.40),
('Újpest FC', 'Heinz Mörschel', 'Támadóközéppályás', 91.66, 53.08, 87.43),
('Újpest FC', 'Petrus Boumal', 'Balszélső', 80.93, 92.34, 70.93),
('Újpest FC', 'Csoboth Kevin', 'Középcsatár', 76.63, 71.35, 76.88),
('Vasas SC', 'Jova Levente', 'Kapus', 71.32, 75.98, 66.92),
('Vasas SC', 'Hegedűs János', 'Balhátvéd', 56.68, 81.62, 90.07),
('Vasas SC', 'Baráth Botond', 'Középhátvéd', 57.50, 65.26, 54.84),
('Vasas SC', 'Litauszki Róbert', 'Jobbhátvéd', 77.39, 74.43, 89.97),
('Vasas SC', 'Vida Máté', 'Védekező középpályás', 78.59, 73.03, 79.36),
('Vasas SC', 'Berecz Zsombor', 'Védekező középpályás', 78.71, 56.48, 94.26),
('Vasas SC', 'Pátkai Máté', 'Baloldali középpályás', 55.88, 93.62, 54.44),
('Vasas SC', 'Hidi Patrik', 'Jobbszélső', 88.36, 81.46, 92.25),
('Vasas SC', 'Márkvárt Dávid', 'Támadóközéppályás', 68.85, 66.52, 76.02),
('Vasas SC', 'Jozef Urblík', 'Balszélső', 81.57, 80.79, 60.25),
('Vasas SC', 'Balogh Norbert', 'Középcsatár', 57.88, 58.64, 69.55),
('Zalaegerszegi TE FC', 'Demjén Patrik', 'Kapus', 72.84, 56.54, 63.17),
('Zalaegerszegi TE FC', 'Huszti András', 'Balhátvéd', 96.26, 94.78, 86.13),
('Zalaegerszegi TE FC', 'Gergényi Bence', 'Középhátvéd', 96.28, 75.04, 85.35),
('Zalaegerszegi TE FC', 'Mocsi Attila', 'Jobbhátvéd', 53.65, 60.19, 89.99),
('Zalaegerszegi TE FC', 'Tajti Mátyás', 'Védekező középpályás', 72.39, 90.99, 89.76),
('Zalaegerszegi TE FC', 'Bedi Bence', 'Jobboldali középpályás', 76.85, 64.94, 93.18),
('Zalaegerszegi TE FC', 'Szendrei Norbert', 'Baloldali középpályás', 74.06, 89.79, 78.73),
('Zalaegerszegi TE FC', 'Oleksandr Koszovscsuk', 'Jobbszélső', 74.31, 85.35, 55.83),
('Zalaegerszegi TE FC', 'Bojan Sankovic', 'Támadóközéppályás', 71.10, 89.00, 83.71),
('Zalaegerszegi TE FC', 'Denys Kryvotsiuk', 'Balszélső', 52.55, 59.64, 90.52),
('Zalaegerszegi TE FC', 'Gergely Mim', 'Középcsatár', 76.68, 61.86, 78.24);

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
-- Tábla szerkezet ehhez a táblához `meccs_lejatszas`
--

CREATE TABLE `meccs_lejatszas` (
  `id` int(11) NOT NULL,
  `meccsid` int(11) DEFAULT NULL,
  `esemenyek` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `meccs_lejatszas`
--

INSERT INTO `meccs_lejatszas` (`id`, `meccsid`, `esemenyek`) VALUES
(1461, 29, 'Ferencváros elkezdte a meccset. Muhamed Besic vezeti a labdát.'),
(1462, 29, 'Passzol Samy Mmaee felé. Most nála a labda.'),
(1463, 29, 'Samy Mmaee vezeti a labdát.'),
(1464, 29, 'Samy Mmaee vezeti a labdát. Kikerüli a védőt! ÉÉÉÉS... MELLÉ. Dúzs Gellért kirúgáshoz készülődik. Brandon Domingués szerzi meg a labdát.'),
(1465, 29, 'Xavier Mercier sikeresen megszerezte a labdát és gyors ellentámadást indít.'),
(1466, 29, 'Passzol Kristofer Zachariassen felé. Most nála a labda.'),
(1467, 29, 'Kristofer Zachariassen vezeti a labdát. Kikerüli a védőt! ÉÉÉÉS... MELLÉ. Dúzs Gellért kirúgáshoz készülődik. Jairo Samperio szerzi meg a labdát.'),
(1468, 29, 'OUCH! Ez biztos fájt. A bíró a zsebe felé nyúl... ééés... végül eltekint a laptól. Szabadrúgást kap a Budapest Honvéd FC, melyet gyorsan el is végeztek.'),
(1469, 29, 'OUCH! Ez biztos fájt. A bíró a zsebe felé nyúl... ééés... SÁRGA lap. Szabadrúgást kap a Budapest Honvéd FC, melyet gyorsan el is végeztek.'),
(1470, 29, 'OUCH! Ez biztos fájt. A bíró a zsebe felé nyúl... ééés... végül eltekint a laptól. Szabadrúgást kap a Budapest Honvéd FC, melyet gyorsan el is végeztek.'),
(1471, 29, 'Jairo Samperio vezeti a labdát.'),
(1472, 29, 'Budapest Honvéd FC elkezdte a második félidőt. Lukas Klemenz vezeti a labdát.'),
(1473, 29, 'OUCH! Ez biztos fájt. A bíró a zsebe felé nyúl... ééés... végül eltekint a laptól. Szabadrúgást kap a Budapest Honvéd FC, melyet gyorsan el is végeztek.'),
(1474, 29, 'Lukas Klemenz vezeti a labdát.'),
(1475, 29, 'Lukas Klemenz vezeti a labdát. Kikerüli a védőt! ÉÉÉÉS... GÓÓÓÓL. Az eredmény: 0 - 1 A Budapest Honvéd FC boldogan feláll a kezdéshez. Lisztes Krisztián vezeti a labdát.'),
(1476, 29, 'Lisztes Krisztián vezeti a labdát. Kikerüli a védőt! ÉÉÉÉS... GÓÓÓÓL. Az eredmény: 1 - 1 A Ferencváros boldogan feláll a kezdéshez.Zsótér Donát vezeti a labdát.'),
(1477, 29, 'Botka Endre sikeresen megszerezte a labdát és gyors ellentámadást indít.'),
(1478, 29, 'OUCH! Ez biztos fájt. A bíró a zsebe felé nyúl... ééés... SÁRGA lap. Szabadrúgást kap a Ferencváros, melyet gyorsan el is végeztek.'),
(1479, 29, 'OUCH! Ez biztos fájt. A bíró a zsebe felé nyúl... ééés... végül eltekint a laptól. Szabadrúgást kap a Ferencváros, melyet gyorsan el is végeztek.'),
(1480, 29, 'OUCH! Ez biztos fájt. A bíró a zsebe felé nyúl... ééés... végül eltekint a laptól. Szabadrúgást kap a Ferencváros, melyet gyorsan el is végeztek.'),
(1481, 29, 'Nenad Lukic sikeresen megszerezte a labdát és gyors ellentámadást indít.'),
(1482, 29, 'Nenad Lukic vezeti a labdát. Kikerüli a védőt! ÉÉÉÉS... MELLÉ. Dibusz Dénes kirúgáshoz készülődik. Henry Wingo szerzi meg a labdát.'),
(1483, 29, 'A bíró a szájához emeli a sípot, és a meccs véget ér. A végeredmény: 1 - 1');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `nyeremeny`
--

CREATE TABLE `nyeremeny` (
  `nyeremeny` int(11) UNSIGNED DEFAULT NULL,
  `id` int(11) NOT NULL,
  `felhasznaloId` int(11) DEFAULT NULL,
  `fogadasId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `registered`
--

CREATE TABLE `registered` (
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `eletkor` int(11) DEFAULT NULL,
  `credit` int(11) UNSIGNED DEFAULT NULL,
  `credit_vetel` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `registered`
--

INSERT INTO `registered` (`username`, `password`, `email`, `eletkor`, `credit`, `credit_vetel`, `id`, `admin`) VALUES
('admin', '$2y$10$9D6PTzzoIe6PhuY8.9B5Mulep3EIPMMAV7OelkS0cSOBy./73feme', 'admin@admin.hu', 19, 1500, 0, 7, 1),
('felhasznalo', '$2y$10$xv0YlnybcNkbuoIIL4xwHeFIGVGd2q3z9o4l4gCON9ZkYnFf1LWbm', 'felhasznalo@felhasznalo.hu', 19, 1500, 0, 8, 0);

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
(10, 'A credit vételnél vannak problémák, mert nem jelent meg rögtön a credit', 'felhasznalo', 'felhasznalo@felhasznalo.hu'),
(11, 'nincs elég creditem', 'marci', 'marci@marci.hu');

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
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `csapatok`
--
ALTER TABLE `csapatok`
  ADD PRIMARY KEY (`csapatnev`);

--
-- A tábla indexei `csapat_parositas`
--
ALTER TABLE `csapat_parositas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hazai_csapat` (`hazai_csapat`),
  ADD KEY `idegen_csapat` (`idegen_csapat`);

--
-- A tábla indexei `fogadas`
--
ALTER TABLE `fogadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `felhasznaloId` (`felhasznaloId`),
  ADD KEY `meccsId` (`meccsId`);

--
-- A tábla indexei `jatekosok`
--
ALTER TABLE `jatekosok`
  ADD KEY `csapat` (`csapat`);

--
-- A tábla indexei `kredit_vetel`
--
ALTER TABLE `kredit_vetel`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `meccs_lejatszas`
--
ALTER TABLE `meccs_lejatszas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meccsid` (`meccsid`);

--
-- A tábla indexei `nyeremeny`
--
ALTER TABLE `nyeremeny`
  ADD PRIMARY KEY (`id`),
  ADD KEY `felhasznaloId` (`felhasznaloId`),
  ADD KEY `fogadasId` (`fogadasId`);

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
-- AUTO_INCREMENT a táblához `csapat_parositas`
--
ALTER TABLE `csapat_parositas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT a táblához `fogadas`
--
ALTER TABLE `fogadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT a táblához `kredit_vetel`
--
ALTER TABLE `kredit_vetel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `meccs_lejatszas`
--
ALTER TABLE `meccs_lejatszas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1484;

--
-- AUTO_INCREMENT a táblához `nyeremeny`
--
ALTER TABLE `nyeremeny`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT a táblához `registered`
--
ALTER TABLE `registered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `uzenetek`
--
ALTER TABLE `uzenetek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `csapat_parositas`
--
ALTER TABLE `csapat_parositas`
  ADD CONSTRAINT `csapat_parositas_ibfk_1` FOREIGN KEY (`hazai_csapat`) REFERENCES `csapatok` (`csapatnev`),
  ADD CONSTRAINT `csapat_parositas_ibfk_2` FOREIGN KEY (`idegen_csapat`) REFERENCES `csapatok` (`csapatnev`);

--
-- Megkötések a táblához `fogadas`
--
ALTER TABLE `fogadas`
  ADD CONSTRAINT `fogadas_ibfk_1` FOREIGN KEY (`felhasznaloId`) REFERENCES `registered` (`id`),
  ADD CONSTRAINT `fogadas_ibfk_2` FOREIGN KEY (`meccsId`) REFERENCES `csapat_parositas` (`id`);

--
-- Megkötések a táblához `jatekosok`
--
ALTER TABLE `jatekosok`
  ADD CONSTRAINT `jatekosok_ibfk_1` FOREIGN KEY (`csapat`) REFERENCES `csapatok` (`csapatnev`);

--
-- Megkötések a táblához `meccs_lejatszas`
--
ALTER TABLE `meccs_lejatszas`
  ADD CONSTRAINT `meccs_lejatszas_ibfk_1` FOREIGN KEY (`meccsid`) REFERENCES `csapat_parositas` (`id`);

--
-- Megkötések a táblához `nyeremeny`
--
ALTER TABLE `nyeremeny`
  ADD CONSTRAINT `nyeremeny_ibfk_2` FOREIGN KEY (`felhasznaloId`) REFERENCES `registered` (`id`),
  ADD CONSTRAINT `nyeremeny_ibfk_3` FOREIGN KEY (`fogadasId`) REFERENCES `fogadas` (`id`);

--
-- Megkötések a táblához `valaszok`
--
ALTER TABLE `valaszok`
  ADD CONSTRAINT `valaszok_ibfk_1` FOREIGN KEY (`felhasznaloiId`) REFERENCES `registered` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
