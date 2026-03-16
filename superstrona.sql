-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 26, 2026 at 11:26 PM
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
-- Database: `superstrona`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `artykuly`
--

CREATE TABLE `artykuly` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `il_akapitow` int(11) NOT NULL,
  `nazwa_pliku` varchar(50) NOT NULL,
  `akapit1` varchar(500) NOT NULL,
  `akapit2` varchar(500) DEFAULT NULL,
  `akapit3` varchar(500) DEFAULT NULL,
  `akapit4` varchar(500) DEFAULT NULL,
  `akapit5` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artykuly`
--

INSERT INTO `artykuly` (`id`, `nazwa`, `link`, `il_akapitow`, `nazwa_pliku`, `akapit1`, `akapit2`, `akapit3`, `akapit4`, `akapit5`) VALUES
(1, 'Silksong wyszedł!', 'silksong.php', 4, 'silksong.webp', 'Hollow Knight: Silksong to oczekiwana kontynuacja gry Hollow Knight, opracowywana przez Team Cherry. Fabuła koncentruje się na postaci Hornet, która wyrusza w podróż przez nieznane krainy. Gra ma oferować nowe mechaniki, wrogów oraz eksplorację bardziej rozbudowanego świata, zachowując charakterystyczny klimat mrocznej, ręcznie rysowanej metroidvanii.', 'Po latach oczekiwań Silksong wreszcie ukazał się 4 września 2025 roku. Premiera odbyła się jednocześnie na PC, konsolach Xbox, PlayStation i Nintendo Switch, a gra trafiła także do biblioteki Xbox Game Pass. Zainteresowanie było ogromne – serwery platform dystrybucyjnych chwilowo nie wytrzymały naporu fanów.', 'Recenzje okazały się entuzjastyczne. Krytycy chwalą piękną oprawę audiowizualną, płynniejszy system walki i bogatszy świat, choć część graczy wskazuje na bardzo wysoki poziom trudności. Mimo tego, Silksong szybko zdobył miliony graczy i stał się jednym z najgłośniejszych tytułów niezależnych ostatnich lat.', 'Sukces kontynuacji potwierdził pozycję Team Cherry jako jednego z czołowych studiów indie. Twórcy zapowiadają dalsze wsparcie i darmowe aktualizacje, które mają rozszerzyć historię Hornet. Silksong udowadnia, że nawet niewielki zespół może stworzyć dzieło, które dorównuje największym produkcjom branży.', NULL),
(2, 'Kolejna kontynuacja Supralandu', 'supraworld.php', 4, 'obraz2.jpg', 'Supraworld to niezależna gra przygodowa typu open world, która zyskała popularność dzięki połączeniu kolorowej estetyki i głębokiej eksploracji. Gracz wciela się w postać podróżnika odkrywającego surrealistyczny świat pełen tajemnic, zagadek i ukrytych ścieżek. Produkcja inspirowana jest klasycznymi platformówkami 3D oraz tytułami przygodowymi z przełomu lat 90. i 2000.', 'Świat Supraworld zbudowany jest z wielu połączonych ze sobą biomów, z których każdy ma własną mechanikę i styl artystyczny. Gracz może wspinać się, pływać, latać, a także korzystać z różnorodnych narzędzi, by odblokowywać kolejne sekcje mapy. Rozgrywka zachęca do swobodnego odkrywania i eksperymentowania z ruchem, co nadaje grze płynności i dynamiki.', 'Twórcy gry skupili się na stworzeniu doświadczenia bez przemocy – Supraworld kładzie nacisk na eksplorację, zagadki środowiskowe i interakcję z otoczeniem. Dzięki temu gra jest relaksująca, ale jednocześnie satysfakcjonująca dla osób lubiących logiczne wyzwania i poszukiwanie sekretów w każdym zakątku świata.', 'Supraworld zyskał uznanie zarówno graczy, jak i recenzentów, którzy docenili jego oryginalny styl graficzny, muzykę oraz atmosferę przygody. Tytuł uznawany jest za duchowego spadkobiercę klasyków takich jak Banjo-Kazooie czy A Hat in Time, łącząc nowoczesne rozwiązania z nostalgią za dawnym podejściem do gier eksploracyjnych.', NULL),
(3, 'Nowa wersja Genshin Impact: Luna I', 'genshin_lunaI.php', 4, 'genshin.jpg', 'Genshin Impact: Luna I to duża aktualizacja oznaczona numerem 6.0, wydana 10 września 2025 roku. Wprowadza nowy rozdział fabularny, którego motywem przewodnim są mroźne krainy i magiczny blask księżyca. Gracze mogą odkrywać nowe regiony, wykonywać zadania Archontów oraz poznawać historie związane z tajemniczymi zjawiskami na północy Teyvat.', 'Aktualizacja dodała trzy nowe postacie: pięciogwiazdkową Laumę (Dendro), Flins (Electro) oraz czterogwiazdkową Aino (Hydro). Oprócz nich pojawiły się nowe bronie, artefakty i wydarzenia sezonowe, w tym festiwal inspirowany zimowym przesileniem, łączący elementy muzyki i tańca z eksploracją nowych lokacji.', 'Twórcy wprowadzili także liczne poprawki i usprawnienia. Interfejs został uproszczony, dodano nowe funkcje ekwipunku i mapy, a system walki zyskał lepszą równowagę między żywiołami. Spiral Abyss otrzymał zmienione przeciwników oraz nowe efekty Ley Line, zwiększając poziom wyzwania dla doświadczonych graczy.', 'Luna I to aktualizacja, która łączy świeżość fabularną z technicznym dopracowaniem. Wnosi do Genshin Impact nie tylko nową zawartość, ale też poczucie odnowienia i spójności świata, dając graczom motywację, by ponownie zanurzyć się w przygody Teyvat.', NULL),
(4, 'Nowy update Minecraft', 'minecraft_update.php', 4, 'obraz.jpg', 'Aktualizacja z Armadillo do Minecrafta, znana jako Armored Paws Update, została wydana 23 kwietnia 2024 roku. Wprowadziła do gry nowego mobka – pancernika, który pojawia się naturalnie w biomach sawanny i badlands. Była to jedna z najbardziej oczekiwanych nowości, ponieważ po raz pierwszy od dawna dodano zwierzę o unikalnych właściwościach defensywnych i nowym zastosowaniu w rozgrywce.', 'Pancernik to spokojny, neutralny mob, który w razie zagrożenia zwija się w kulę, chroniąc się przed atakiem gracza lub potworów. Gracze mogą zbierać z niego fragmenty pancerzyka zwane scute, które stanowią nowy surowiec rzemieślniczy. Proces ten nie jest agresywny – scute wypada naturalnie po pewnym czasie, co zachęca do opiekuńczego podejścia zamiast polowania.', 'Najważniejszym zastosowaniem nowego materiału jest możliwość stworzenia pancerza dla wilków. Dzięki temu po raz pierwszy w historii Minecrafta można wzmocnić swojego towarzysza bojowego. Wilki ubrane w taki pancerz stają się bardziej odporne na obrażenia, a ich wygląd zmienia się w zależności od użytych materiałów i kolorów farb.', 'Aktualizacja Armored Paws przyniosła też kilka pomniejszych usprawnień, w tym poprawki AI zwierząt, zmiany w systemie spawnów oraz nowe animacje ruchu. Społeczność przyjęła ją bardzo pozytywnie, chwaląc Mojang za wprowadzenie funkcji, która wzbogaca relację między graczem a jego zwierzęcym towarzyszem', NULL),
(5, 'Już niedługo Pokemon Z-A', 'pokemonza.php', 4, 'pkmnza.jpg', 'Pokémon Z-A to nadchodząca główna odsłona serii Pokémon, zapowiedziana jako duchowy następca Pokémon X i Y. Akcja gry rozgrywa się ponownie w regionie Kalos, jednak w zupełnie nowym ujęciu – w mieście Lumiose, które przechodzi futurystyczną przebudowę. Gra ma łączyć klasyczne elementy serii z nowoczesną stylistyką i nowym podejściem do eksploracji świata Pokémonów.', 'Pokémon Z-A został oficjalnie ogłoszony w lutym 2024 roku, a jego premiera planowana jest na 2025. Twórcy z Game Freak zapowiedzieli, że tytuł będzie pierwszą główną grą z serii w pełni opracowaną z myślą o konsoli Nintendo Switch 2. Ulepszony silnik graficzny, dynamiczne oświetlenie i bardziej szczegółowe modele Pokémonów mają nadać grze świeży, nowoczesny wygląd.', 'Fabuła ma koncentrować się na ekologicznej przebudowie Lumiose City oraz tajemniczej energii Z, która wpływa na naturę i Pokémony w całym regionie. Nowe formy Pokémonów, rozwinięty system walki oraz większy nacisk na decyzje gracza mają zapewnić świeże doświadczenie zarówno dla weteranów, jak i nowych fanów serii.', 'Pokémon Z-A zapowiada się jako połączenie nostalgii z innowacją – tytuł, który ma oddać hołd klasycznym odsłonom, a jednocześnie wprowadzić serię w nową erę technologii i opowieści. Dla wielu graczy będzie to nie tylko powrót do Kalos, ale też symboliczny krok w przyszłość marki Pokémon.', NULL),
(6, 'Rain Code: Detektywistyczna Visual Novela', 'raincode.php', 5, 'rain.jpg', 'Rain Code Archives to rozbudowane uniwersum narracyjne, które koncentruje się na mrocznych zagadkach, pamięci oraz granicy między prawdą a iluzją. Projekt łączy elementy gry detektywistycznej i powieści wizualnej, oferując graczom historię osadzoną w deszczowym, futurystycznym mieście pełnym sekretów. Motyw przewodni archiwów nawiązuje do utraconych wspomnień i danych, które stopniowo odkrywa się wraz z postępami fabuły.', 'Rdzeniem Rain Code Archives jest rozbudowana opowieść podzielona na rozdziały, z których każdy skupia się na innej sprawie kryminalnej. Gracz wciela się w postać śledczego, analizującego wskazówki, przesłuchującego świadków oraz eksplorującego cyfrowe archiwa. Każda decyzja wpływa na interpretację wydarzeń, co nadaje historii wielowarstwowy i niejednoznaczny charakter.', 'Świat gry został zaprojektowany z dużą dbałością o atmosferę. Stały deszcz, neonowe światła i surowa architektura budują klimat izolacji i niepokoju. Lokacje, choć często zamknięte i klaustrofobiczne, kryją liczne szczegóły fabularne, które nagradzają uważnych graczy dodatkowymi informacjami o tle wydarzeń i bohaterach.', 'Rain Code Archives wyróżnia się także warstwą mechaniczną. System dedukcji łączy klasyczne łamigłówki logiczne z dynamicznymi sekwencjami wyborów czasowych. W miarę rozwoju fabuły odblokowywane są nowe narzędzia analityczne, pozwalające głębiej ingerować w archiwa i rekonstruować przebieg dawnych zdarzeń.', 'Całość tworzy spójne doświadczenie, skierowane do graczy ceniących narrację i atmosferę ponad szybkie tempo akcji. Rain Code Archives to propozycja dla tych, którzy lubią angażujące historie, moralne dylematy i powolne odkrywanie prawdy ukrytej pod warstwą danych, wspomnień i nieustannie padającego deszczu.'),
(8, 'Do przyszłego miasta Detroit', 'detroitbh.php', 4, 'detroit.webp', 'Detroit: Become Human to narracyjna gra przygodowa studia Quantic Dream, osadzona w futurystycznym Detroit, gdzie androidy stały się integralną częścią codziennego życia. Fabuła koncentruje się na relacjach między ludźmi a sztuczną inteligencją, poruszając tematy wolnej woli, dyskryminacji oraz granic człowieczeństwa. Gracz obserwuje świat w momencie narastającego napięcia społecznego, w którym maszyny zaczynają kwestionować swoją rolę.', 'Historia przedstawiona jest z perspektywy trzech grywalnych bohaterów: Connora, Markusa i Kary. Każda z postaci doświadcza odmiennych problemów i wyzwań, a ich losy splatają się w kluczowych momentach fabuły. Decyzje podejmowane przez gracza mają bezpośredni wpływ na rozwój wydarzeń, prowadząc do wielu możliwych zakończeń i diametralnie różnych konsekwencji.', 'Jednym z największych atutów Detroit: Become Human jest rozbudowany system wyborów i konsekwencji. Nawet pozornie drobne decyzje mogą zmienić przebieg całej historii, a przejrzyste drzewka fabularne pozwalają śledzić alternatywne ścieżki narracyjne. Oprawa audiowizualna, realistyczna animacja postaci i filmowa reżyseria dodatkowo wzmacniają emocjonalny odbiór gry.', 'Detroit: Become Human to tytuł, który stawia na refleksję i zaangażowanie emocjonalne gracza. Zamiast tradycyjnej akcji oferuje głęboką opowieść o wyborach, odpowiedzialności i poszukiwaniu tożsamości. Dzięki temu gra pozostaje jednym z najbardziej rozpoznawalnych przykładów interaktywnej narracji we współczesnych grach wideo.', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sesje`
--

CREATE TABLE `sesje` (
  `id` int(11) NOT NULL,
  `id_uzytkownika` int(11) DEFAULT NULL,
  `data_utw` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sesje`
--

INSERT INTO `sesje` (`id`, `id_uzytkownika`, `data_utw`) VALUES
(9, 2, '2026-01-26 23:26:11'),
(10, 1, '2026-01-26 23:26:11');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL,
  `haslo` varchar(150) NOT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `nazwa`, `haslo`, `mail`) VALUES
(1, 'admin', '04c72343945e2a6ef09221862164ac3a9e914373', 'admin@admin.net'),
(2, 'abcd', '7c222fb2927d828af22f592134e8932480637c0d', 'abcd@abcd.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `artykuly`
--
ALTER TABLE `artykuly`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `sesje`
--
ALTER TABLE `sesje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_uzy` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artykuly`
--
ALTER TABLE `artykuly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sesje`
--
ALTER TABLE `sesje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sesje`
--
ALTER TABLE `sesje`
  ADD CONSTRAINT `FK_uzy` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
