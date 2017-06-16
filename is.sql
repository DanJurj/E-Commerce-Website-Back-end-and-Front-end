-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Mai 2017 la 19:25
-- Versiune server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `is`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `categorii`
--

CREATE TABLE `categorii` (
  `ID` int(11) NOT NULL,
  `Denumire` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `categorii`
--

INSERT INTO `categorii` (`ID`, `Denumire`) VALUES
(1, 'Electronice si Electrocasnice'),
(2, 'Imobiliare'),
(3, 'Animale de companie'),
(4, 'Imbracaminte'),
(5, 'Casa si gradina');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `conturi`
--

CREATE TABLE `conturi` (
  `username` varchar(40) NOT NULL,
  `ID_tipCont` int(11) NOT NULL,
  `nume` varchar(40) NOT NULL,
  `prenume` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `parola` varchar(40) NOT NULL,
  `telefon` varchar(40) NOT NULL,
  `adresa` varchar(40) NOT NULL,
  `judet` varchar(40) NOT NULL,
  `localitate` varchar(40) NOT NULL,
  `raspuns` varchar(40) NOT NULL,
  `Bani` int(11) NOT NULL,
  `statusC` varchar(40) NOT NULL,
  `statusU` varchar(40) NOT NULL,
  `timpDelogare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `conturi`
--

INSERT INTO `conturi` (`username`, `ID_tipCont`, `nume`, `prenume`, `email`, `parola`, `telefon`, `adresa`, `judet`, `localitate`, `raspuns`, `Bani`, `statusC`, `statusU`, `timpDelogare`) VALUES
('asdsdadasd', 1, 'dan', 'asd', 'daasdd@yahoo.com', '12aA', '0754985147', 'Str fantanele', 'asd', 'CÃ¢mpeni', 'a', 0, 'activ', 'delogat', 0),
('danut', 2, 'jurj', 'danut', 'dan.jurj19@gmail.com', '123456aA', '0754985147', 'Str fantanele', 'bucuresti', 'Campeni', 'lessie', 66945, 'activ', 'logat', 3600),
('electro', 1, 'Jurj', 'Danut', 'dad@yahoo.com', '123456aA', '0754985147', 'Str fantanele', 'bucuresti', 'sector 5', 'lessie', 0, 'blocat', 'delogat', 0),
('electro09', 1, 'dan', 'jj', 'dad@yahoo.com', '123456aA', '0754985147', 'asd', 'asd', 'asd', 'asd', 0, 'activ', 'delogat', 0),
('electro093', 1, 'dan', 'jj', 'daad@yahoo.com', '123456aA', '0754985147', 'asd', 'asd', 'asd', 'asd', 0, 'activ', 'delogat', 0),
('guest', 1, 'guest', 'guest', 'guest@yahoo.com', 'guest', '0754985147', 'asd', 'asd', 'asd', 'asd', 0, 'activ', 'delogat', 0);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `cos`
--

CREATE TABLE `cos` (
  `ID_Inregistrare` int(11) NOT NULL,
  `User` varchar(40) NOT NULL,
  `ID_Produs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `cos`
--

INSERT INTO `cos` (`ID_Inregistrare`, `User`, `ID_Produs`) VALUES
(1, 'danut', 1),
(3, 'danut', 7);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `favorite`
--

CREATE TABLE `favorite` (
  `ID_Inregistrare` int(11) NOT NULL,
  `User` varchar(40) NOT NULL,
  `ID_Produs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `favorite`
--

INSERT INTO `favorite` (`ID_Inregistrare`, `User`, `ID_Produs`) VALUES
(9, 'danut', 3),
(10, 'danut', 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `plati`
--

CREATE TABLE `plati` (
  `ID_Plata` int(11) NOT NULL,
  `User` varchar(40) NOT NULL,
  `Denumire` varchar(40) NOT NULL,
  `Suma_Platita` int(11) NOT NULL,
  `Data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `plati`
--

INSERT INTO `plati` (`ID_Plata`, `User`, `Denumire`, `Suma_Platita`, `Data`) VALUES
(1, 'danut', 'Amstaff', 1500, '2017-05-01 00:00:00'),
(2, 'danut', 'Iphone 7 Rose Gold', 3700, '2017-05-07 00:00:00'),
(13, 'danut', 'Iphone 6S', 2705, '2017-05-25 19:59:28'),
(14, 'danut', 'Converse Dama', 300, '2017-05-25 19:59:28');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `produse`
--

CREATE TABLE `produse` (
  `ID` int(11) NOT NULL,
  `Denumire` varchar(40) NOT NULL,
  `Pret` double NOT NULL,
  `Img1` varchar(200) NOT NULL,
  `Img2` varchar(200) NOT NULL,
  `Img3` varchar(200) NOT NULL,
  `Img4` varchar(200) NOT NULL,
  `ID Categorie` int(11) NOT NULL,
  `Vizualizari` int(11) NOT NULL,
  `Descriere` varchar(1000) NOT NULL,
  `Negociabil` varchar(10) NOT NULL,
  `Stare` varchar(10) NOT NULL,
  `Username Vanzator` varchar(40) NOT NULL,
  `Stoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `produse`
--

INSERT INTO `produse` (`ID`, `Denumire`, `Pret`, `Img1`, `Img2`, `Img3`, `Img4`, `ID Categorie`, `Vizualizari`, `Descriere`, `Negociabil`, `Stare`, `Username Vanzator`, `Stoc`) VALUES
(1, 'Iphone 6S', 2705, 'database/Anunturi/Electronice si electrocasnice/1 Iphone 6s/3.jpg', 'database/Anunturi/Electronice si electrocasnice/1 Iphone 6s/2.jpg', 'database/Anunturi/Electronice si electrocasnice/1 Iphone 6s/1.jpg', 'database/Anunturi/Electronice si electrocasnice/1 Iphone 6s/4.jpg', 1, 100, 'Dau iphone 6s plus impecabil , neverlook , 16 gb .', 'NU', 'NOU', 'danut', 2),
(2, 'Aparat capsule Tchibo', 1100, 'database/Anunturi/Electronice si electrocasnice/10 Aparat capsule Tchibo Cafissimo/1.jpg', 'database/Anunturi/Electronice si electrocasnice/10 Aparat capsule Tchibo Cafissimo/2.jpg', 'database/Anunturi/Electronice si electrocasnice/10 Aparat capsule Tchibo Cafissimo/3.jpg', 'database/Anunturi/Electronice si electrocasnice/10 Aparat capsule Tchibo Cafissimo/4.jpg', 1, 46, 'Este ca si nou! Nu a fost folosit. Cafissimo COMPACT, specialistul practic in prepararea cafelei Trei butoane, trei presiuni de preparare pentru o ceasca perfecta de espresso, caffe crema si cafea filtru. Recipientul pentru colectare capsule este foarte practic: acum poti face o serie de cafele, una dupa alta, rapid si usor. Avantaje Cafissimo COMPACT: - 3 presiuni de preparare pentru o ceasca perfecta espresso, caffe crema si cafea filtru; - recipient pentru colectare capsule cu capacitate de pana la 8 capsule; - rezervor pentru apa detasabil, de 1.2 l, suficient pentru 8 cesti de caffe crema. Specificatii generale Tip aparat: Automat Tip bautura: Cafea, Caffe crema, Espresso Capacitate rezervor apa: 1.2 l Capacitate cesti: 1 Presiune: 15 bar Alimentare: Capsule', 'NU', 'FOLOSIT', 'danut', 3),
(3, 'Iphone 7 Rose Gold', 3700, 'database/Anunturi/Electronice si electrocasnice/5 Iphone 7 Rose Gold/1.jpg', 'database/Anunturi/Electronice si electrocasnice/5 Iphone 7 Rose Gold/2.jpg', 'database/Anunturi/Electronice si electrocasnice/5 Iphone 7 Rose Gold/3.jpg', 'database/Anunturi/Electronice si electrocasnice/5 Iphone 7 Rose Gold/4.jpg', 1, 65, 'Iphone 7 Rose Gold 128 GB,neverlocked din fabrica,stare 10/10,folie fata-spate,husa,cutie, accesorile noi nefolosite,garantie internationala Feb 2018,(Schimb cu iphone 7 +)', 'NU', 'FOLOSIT', 'danut', 10),
(4, 'Amstaff', 1500, 'database/Anunturi/Animale de companie/1 Amstaff de vanzare/1.jpg', 'database/Anunturi/Animale de companie/1 Amstaff de vanzare/2.jpg', 'database/Anunturi/Animale de companie/1 Amstaff de vanzare/3.jpg', 'database/Anunturi/Animale de companie/1 Amstaff de vanzare/4.jpg', 3, 87, 'Catei amstaff in varsta de 6 luni cu toate tratamentele la zi. Pentru mai multe detalii sunati sau mesaj privat.', 'NU', 'FOLOSIT', 'electro', 0),
(5, 'Rochie de mireasa', 2900, 'database/Anunturi/Imbracaminte/3 Rochie mireasa/1.jpg', 'database/Anunturi/Imbracaminte/3 Rochie mireasa/2.jpg', 'database/Anunturi/Imbracaminte/3 Rochie mireasa/3.jpg', 'database/Anunturi/Imbracaminte/3 Rochie mireasa/4.jpg', 4, 45, 'Vand rochie de mireasa folosita doar o data. Pretul nu este negociabil. Rochia arata impecabil!', 'NU', 'NOU', 'danut', 100),
(6, 'Porcusor de Guineea', 100, 'database/Anunturi/Animale de companie/2 Porcusor de Guineea/1.jpg', 'database/Anunturi/Animale de companie/2 Porcusor de Guineea/2.jpg', 'database/Anunturi/Animale de companie/2 Porcusor de Guineea/3.jpg', 'database/Anunturi/Animale de companie/2 Porcusor de Guineea/4.jpg', 3, 12, 'Vand un porcusor de Guineea frezat, femela. Culoare galben cu alb.  Doresc sa fiu contactat doar de iubitori de animale.', 'DA', 'FOLOSIT', 'danut', 2),
(7, 'Converse Dama', 300, 'database/Anunturi//Imbracaminte/5 Converse Dama Albi/1.jpg', 'database/Anunturi/Imbracaminte/5 Converse Dama Albi/2.jpg', 'database/Anunturi/Imbracaminte/5 Converse Dama Albi/3.jpg', 'database/Anunturi/Imbracaminte/5 Converse Dama Albi/4.jpg', 4, 1, 'Vand Converse Dama Albi din material textil, marimea 37, serie 537204C. Sunt achizitionati din Sun Plazza Mall, magazinul Office Shoes la pretul de 319 RON. Mentionez ca sunt purtati o singura data. Tenesii arata impecabil, nu prezinta nicio zgarietura. Asigur si cer seriozitate.', 'NU', 'NOU', 'electro', 4),
(8, 'Villa', 12700, 'database/Anunturi/Imobiliare/1 Vila/1.jpg', 'database/Anunturi/Imobiliare/1 Vila/2.jpg', 'database/Anunturi/Imobiliare/1 Vila/3.jpg', 'database/Anunturi/Imobiliare/1 Vila/4.jpg', 2, 4, 'Villa perfecta pentru oricine doreste o casa de vis. Pretul este usor negociabil!', 'DA', 'FOLOSIT', 'danut', 5),
(9, 'Samsung S6', 2200, 'database/Anunturi/Electronice si electrocasnice/2 Samsung s6/1.jpg', 'database/Anunturi/Electronice si electrocasnice/2 Samsung s6/2.jpg', 'database/Anunturi/Electronice si electrocasnice/2 Samsung s6/3.jpg', 'database/Anunturi/Electronice si electrocasnice/2 Samsung s6/4.jpg', 1, 45, 'Telefonul este liber de retea, de un an , este in stare foarte buna ,  \nare folie de sticla aplicata pe ecran, nici o zgarietura pe ecran sau pe spate , \nfunctioneaza exact ca si atunci când l-am luat ,adica impecabil.  \nTelefonul vine la pachet cu un incarcator (Fast Charge), cablu de date si o husa pe spate', 'DA', 'NOU', 'danut', 1),
(10, 'Laptop Lenovo', 2000, 'database/Anunturi/Electronice si electrocasnice/3 Laptop/1.jpg', 'database/Anunturi/Electronice si electrocasnice/3 Laptop/2.jpg', 'database/Anunturi/Electronice si electrocasnice/3 Laptop/3.pg.jpg', 'database/Anunturi/Electronice si electrocasnice/3 Laptop/4.jpg', 1, 567, 'Vand laptop Lenovo special pentru jocuri Procesorul I5 pana in 2.4 ghz  Memorie ram 12 giga ddr3 Hard-disk 1000 giga  Display 15.6 FULL HD REZOLUTIA DVD-RW FOARTE SUPTIRE Doua placi video  Intel HD GRAFIC Nvidia 840m 4 GIGA DEDICATA SPECIAL PENTRU JOCURI Functioneaza orice joc pe el Vine la cutine  Are bon fiscal Cumparat din italia Wifi Bluetooth Camera WEB HD Retea Sunet dolby digital Culoare alb cu corp metalic Nu trimit in tara  Nu fac schimburi cu telefoane  Laptop are cutie incarcatorul original + bonul fiscal de garantie', 'DA', 'FOLOSIT', 'electro', 10),
(11, 'Frigider', 700, 'database/Anunturi/Electronice si electrocasnice/6 Frigider/1.jpg', 'database/Anunturi/Electronice si electrocasnice/6 Frigider/2.jpg', 'database/Anunturi/Electronice si electrocasnice/6 Frigider/3.jpg', 'database/Anunturi/Electronice si electrocasnice/6 Frigider/4.jpg', 1, 3, 'Vand Frigider Combina Frigorifica Indesit mare 2 metri 2 usi functie Super Freeze Electronic Control clasa A+  Se ofera proba !!! Asigur Transport Contra Cost !!!', 'DA', 'FOLOSIT', 'danut', 0),
(12, 'LG G4', 1600, 'database/Anunturi/Electronice si electrocasnice/4 LG/1.jpg', 'database/Anunturi/Electronice si electrocasnice/4 LG/2.jpg', 'database/Anunturi/Electronice si electrocasnice/4 LG/3.jpg', 'database/Anunturi/Electronice si electrocasnice/4 LG/4.jpg', 1, 23, 'se vinde LG G4 model cu spatele din piele neagra este varianta dual sim (2 simuri+slot card) 32GB pachetul este complet factura+garantie  pozele accesoriilor sunt facute cu telefonul.', 'DA', 'FOLOSIT', 'danut', 3);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `tipcont`
--

CREATE TABLE `tipcont` (
  `ID` int(11) NOT NULL,
  `tip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `tipcont`
--

INSERT INTO `tipcont` (`ID`, `tip`) VALUES
(1, 'user'),
(2, 'admin'),
(3, 'guest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorii`
--
ALTER TABLE `categorii`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `conturi`
--
ALTER TABLE `conturi`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `k1` (`ID_tipCont`);

--
-- Indexes for table `cos`
--
ALTER TABLE `cos`
  ADD PRIMARY KEY (`ID_Inregistrare`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`ID_Inregistrare`);

--
-- Indexes for table `plati`
--
ALTER TABLE `plati`
  ADD PRIMARY KEY (`ID_Plata`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tipcont`
--
ALTER TABLE `tipcont`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cos`
--
ALTER TABLE `cos`
  MODIFY `ID_Inregistrare` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `ID_Inregistrare` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `plati`
--
ALTER TABLE `plati`
  MODIFY `ID_Plata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tipcont`
--
ALTER TABLE `tipcont`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `conturi`
--
ALTER TABLE `conturi`
  ADD CONSTRAINT `k1` FOREIGN KEY (`ID_tipCont`) REFERENCES `tipcont` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
