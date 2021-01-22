SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `project`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `funkce`
--

CREATE TABLE `funkce` (
  `id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `manager` tinyint(1) NOT NULL,
  `programmer` tinyint(1) NOT NULL,
  `projectManager` tinyint(1) NOT NULL,
  `wasteManager` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `funkce`
--

INSERT INTO `funkce` (`id`, `user_Id`, `manager`, `programmer`, `projectManager`, `wasteManager`) VALUES
(1, 1, 0, 1, 0, 1),
(2, 2, 0, 0, 1, 0),
(3, 3, 0, 1, 0, 0),
(4, 4, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `zamestnanci`
--

CREATE TABLE `zamestnanci` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `zamestnanci`
--

INSERT INTO `zamestnanci` (`id`, `firstName`, `lastName`) VALUES
(1, 'Jan', 'Novák'),
(2, 'Jakub', 'Novák'),
(3, 'Jaroslav', 'Novotný'),
(4, 'Filip', 'Novotný');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `funkce`
--
ALTER TABLE `funkce`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `zamestnanci`
--
ALTER TABLE `zamestnanci`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `funkce`
--
ALTER TABLE `funkce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pro tabulku `zamestnanci`
--
ALTER TABLE `zamestnanci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
