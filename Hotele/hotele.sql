-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 30, 2025 at 07:51 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotele`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `noclegi`
--

CREATE TABLE `noclegi` (
  `id_nocleg` int(20) NOT NULL,
  `Nazwa` varchar(100) NOT NULL,
  `Miasto` varchar(100) NOT NULL,
  `Kod_pocztowy` varchar(6) NOT NULL,
  `Ulica` varchar(90) NOT NULL,
  `Typ_Noclegu` varchar(40) NOT NULL,
  `Typ_Noclegu_d` varchar(40) NOT NULL,
  `Telefon` varchar(12) NOT NULL,
  `Mail` varchar(70) NOT NULL,
  `Ladowarka_S` varchar(70) NOT NULL,
  `Info` varchar(300) NOT NULL,
  `O_M_Auschwitz` int(10) NOT NULL,
  `O_Energylandia` int(10) NOT NULL,
  `O_Krakow` int(10) NOT NULL,
  `O_M_JP` int(10) NOT NULL,
  `Link` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `noclegi`
--

INSERT INTO `noclegi` (`id_nocleg`, `Nazwa`, `Miasto`, `Kod_pocztowy`, `Ulica`, `Typ_Noclegu`, `Typ_Noclegu_d`, `Telefon`, `Mail`, `Ladowarka_S`, `Info`, `O_M_Auschwitz`, `O_Energylandia`, `O_Krakow`, `O_M_JP`, `Link`) VALUES
(1, 'Grojec', 'Grojecka Ostoja', '32-615', 'ul. Skotnica 4', 'Hotel', '', '+48 51076577', 'brak', 'brak informacji', 'Oferują posiłki (śniadanie,obiad,kolacja), stajnie z koniami, bilarda', 6, 10, 76, 20, 'https://roomadmin.pl/widget/reservation-v2/start?fh=68ef9503644ae93f885540952582f6210defad2d&arrival=2025-05-06&departure=2025-05-07&rooms[0][numberOfGuests]=2&style=%7B%22color_accent%22%3A%22%231a73e8%22%2C%22color_bg%22%3A%22%23FFFFFF%22%7D&header=1&src=googlehc&lang=pl\r'),
(2, 'Zator', 'KempingZator', '32-640', 'ul. Andrychowska 4', 'Kemping', 'Ośrodek Wypoczynkowy', '+48 73317117', 'biuro@kempingzator.pl', 'brak informacji', 'Plac zabaw, pole namiotowe, kuchnia, wypożyczalnia sprzętu kempingowego', 24, 5, 62, 14, 'https://kempingzator.pl/\r'),
(3, 'Przecieszów', 'Wolne Pokoje \"Pod Baranami\"', '32-641', 'ul. Szkolna 54', 'Hotel', '', '+48 73262335', 'podbaranami@wp.pl', 'brak informacji', 'Klimatyzacja, aneks kuchenny, plac zabaw', 17, 5, 61, 19, 'https://podbaranami.pl.tl/Pokoje.htm\r'),
(4, 'Piotrowice', 'Apartamenty Modrzewiowa', '32-641', 'ul. Modrzewiowa 29', 'Apartament', '', 'brak', 'brak', 'brak informacji', 'Wanna z hydromasażem, klimatyzacja, darmowe wifi i parking', 20, 7, 62, 17, 'https://www.booking.com/hotel/pl/apartamenty-modrzewiowa-zator.pl.html?aid=1288294&label=metagha-link-LUPL-hotel-8353783_dev-desktop_los-1_bw-1_dow-Tuesday_defdate-1_room-0_gstadt-2_rateid-public_aud-0_gacid-21411110600_mcid-50_bc-AH939w_ppa-0_clrid-0_ad-1_gstkid-0_checkin-20250506_ppt-B_lp-2616_r-4'),
(5, 'Oświęcim', 'White Garden', '32-600', 'ul. Wysoka 8', 'Miejsce Noclegowe', '', '+48 60114405', 'zbyszek@propertyonline.pl', 'brak informacji', 'Darmowe wifi, klimatyzacja, aneks kuchenny, altanka', 4, 18, 75, 32, 'https://zatorturystyka.pl/nocleg/apartament/white-garden/\r'),
(6, 'Oświęcim', 'B&M Guesthouse', '32-600', 'ul. Aleksandra Orłowskiego 29', 'Hotel', 'Pensjonat', '+48 57519418', 'brak', 'brak informacji', 'Taras letni, Opcja śniadaniowa w formie bufetu, darmowe wifi', 2, 18, 70, 32, 'https://meteor-turystyka.pl/guesthouse-oswiecim,oswiecim.html'),
(8, 'Zator', 'Pokoje gościnne „Domek u Mai”', '32-640', 'ul. Wiejska 5', 'Kwatera Prywatna', '', 'brak', 'brak', 'brak informacji', 'Bezpłatne Wi-Fi, plac zabaw, ogród oraz bezpłatny prywatny parking.', 25, 5, 60, 15, 'https://www.booking.com/hotel/pl/domek-u-mai.pl.html?aid=318615&label=New_English_EN_PL_26768406505-3ubvx3wQHMniAPajOHsKlgS637942141574%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atidsa-912298700561%3Alp9067394%3Ali%3Adec%3Adm%3Aag26768406505%3Acmp394949905&sid=533d12ba6f74b76eb5a6c37eb967bab6&dest_i'),
(9, 'Bachowice', 'Noclegi Bachowice - Zator Energylandia ,Wadowice', '34-116', 'ul. Księdza Gołby 57', 'Hotel', '', 'brak', 'brak', 'brak informacji', 'kuchnia, telewizor w każdym pokoju, suszarka do włosów w każdym pokoju,  WI-FI, parking do dyspozycji gości altana z grillem. ', 30, 9, 46, 12, 'https://www.nocowanie.pl/noclegi/zator/kwatery_i_pokoje/233391/#jtt\r'),
(10, 'Oświęcim', 'Guesthouse Willa nad Sołą', '32-600', 'ul. Przeczna 2', 'Hotel', '', 'brak', 'brak', 'brak informacji', 'Bezpłatny parking, bezpłatne Wi-Fi', 5, 16, 70, 30, 'https://www.booking.com/hotel/pl/willa-nad-sola.pl.html?aid=1288294&label=metagha-link-LUPL-hotel-5662808_dev-desktop_los-1_bw-0_dow-Friday_defdate-1_room-0_gstadt-2_rateid-public_aud-0_gacid-21411110600_mcid-10_ppa-0_clrid-0_ad-1_gstkid-0_checkin-20250509_ppt-_lp-2616_r-2914477845650609243&sid=533d'),
(11, 'Zator', 'Kapsułowo Noclegi', '32-640', 'ul. Rynek 7', 'Hotel', '', 'brak', 'brak', 'brak informacji', 'Bezpłatny parking, bezpłatne Wi-Fi, restauracja, opcja pokoju rodzinnego, pokoje są w kapsułach', 23, 2, 57, 14, 'https://www.agoda.com/pl-pl/kapsula-hostel/hotel/all/zator-pl.html?countryId=182&finalPriceView=2&isShowMobileAppPrice=false&cid=1918349&numberOfBedrooms=&familyMode=false&adults=2&children=0&rooms=1&maxRooms=0&checkIn=2025-05-9&isCalendarCallout=false&childAges=&numberOfGuest=0&missingChildAges=fal'),
(12, 'Przybradz', 'Rajska Oaza', '34-108', 'ul. Główna 37', 'Hotel', 'Apartamenty', '+48 79755481', 'biuro@rajskaoaza.pl', 'brak informacji', 'Bezpłatny parking, bezpłatne Wi-Fi, wypożyczalnia rowerów i trasy rowerowe w pobliżu', 25, 8, 65, 11, 'https://rajskaoaza.pl/');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `noclegi`
--
ALTER TABLE `noclegi`
  ADD PRIMARY KEY (`id_nocleg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `noclegi`
--
ALTER TABLE `noclegi`
  MODIFY `id_nocleg` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
