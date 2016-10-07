# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.12-MariaDB)
# Database: symfony
# Generation Time: 2016-10-07 12:16:45 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`category_id`, `parent_category_id`, `top_category_id`, `title`, `slug`, `rank`, `lft`, `rgt`, `level`)
VALUES
	(1,NULL,1,'Nábytek','nabytek',853,0,13,0),
	(2,1,1,'Sedací soupravy','sedaci-soupravy',370,1,6,1),
	(3,2,1,'Sedací vaky','sedaci-vaky',289,2,3,2),
	(4,2,1,'Televizní křesla','televizni-kresla',334,4,5,2),
	(5,1,1,'Stoly','stoly',804,7,12,1),
	(6,5,1,'Televizní stolky','televizni-stolky',18,8,9,2),
	(7,5,1,'Pracovní stoly','pracovni-stoly',679,10,11,2),
	(8,NULL,8,'Mobilní telefony','mobilni-telefony',339,14,27,0),
	(9,8,8,'Mobily','mobily',659,15,20,1),
	(10,9,8,'Android','android',278,16,17,2),
	(11,9,8,'iPhone','iphone',412,18,19,2),
	(12,8,8,'Příslušenství','mobily-prislusenstvi',226,21,26,1),
	(13,12,8,'Selfie tyče','selfie-tyce',894,22,23,2),
	(14,12,8,'Pouzda na mobily','pouzdra-na-mobily',792,24,25,2),
	(15,NULL,15,'TV, audio, video','tv-audio-video',279,28,35,0),
	(16,15,15,'Televize','televize',20,29,30,1),
	(17,15,15,'Hifi věže','hifi-veze',261,31,32,1),
	(18,15,15,'Blu-ray přehrávače','blu-ray-prehravace',245,33,34,1);

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`product_id`, `title`, `image`, `slug`, `description`, `price`, `rank`)
VALUES
	(1245717,'SCONTO CENTRO Psací stůl','https://zrks.cz/storage/img/20150429/458x258_75c47da75229482f87a677dfce1b2b75.jpg','sconto-centro-psaci-stul','moderní psací stůl\noptimální využití pro domácí kancelář\nvčetně komody a úložného prostoru\nkomoda 1 zásuvka a dvířka\notevřený regál s policí\nnožky a úchyty v barvě kovu\ndodáváno v demontu\nBarevné provedení: \n\ndub sonoma / bílá\n\nRozměry (š x v x h): \n\n85 x',3999,579),
	(1318256,'SCONTO KUBA Psací stůl','https://zrks.cz/storage/img/20150728/458x258_9b7d2f55c6c83a43bfd18adb50aaca3d.jpg','sconto-kuba-psaci-stul','psací stůl\n3 zásuvky a 1 dvířka\npovrch odolný proti poškrábání\nsnadná údržba\nBarevné provedení: \n\n00.buk\n01.olše\n02.třešeň\n03.javor\n04.nocce\n\nRozměry ( š x v x h): \n\n138 x 75 x 68 cm',2699,547),
	(1440987,'JVC LT-40V750 černá + Doprava zdarma','https://zrks.cz/storage/img/20151203/458x258_d1b9e4b21e95a31518d6cbccc7a6b610.jpg','jvc-lt-40v750-cerna-doprava-zdarma','Podlehněte ostrému obrazu\nNový model televizoru JVC se může chlubit ostrostí obrazu, která si nezadá s ostrostí samurajského meče. Díky zobrazovací technologii Clear Motion Picture s frekvencí 200 HZ si vychutnáte čistotu, ostrost a plynulost obrazu. A to',12990,998),
	(1479244,'Hyundai MS 132 DU3BL černá barva','https://zrks.cz/storage/img/20160301/458x258_9320177096f36f02dd3f609545268148.jpg','hyundai-ms-132-du3bl-cerna-barva','Stylový mikrosystém s mnoha funkcemi\nStylový mikrosystém pro přehrávání CD, CD-R/RW disponuje FM tunerem s 30 předvolbami. Navíc umožňuje přehrávat audio soubory i z mobilních zařízení díky zabudovanému Bluetooth® a souborů z médeií připojitelných přes US',2690,349),
	(1490520,'Monopod - Selfie fotografický set','https://zrks.cz/storage/img/20160315/458x258_21bf82326ffe1eee8aefcaf5dea9d29b.jpg','monopod-selfie-fotograficky-set',' \r\n\r\nSelfies ovládají svět - jděte s dobou a mějte i vy fotky z dovolené, párty nebo koncertu v moderní formě! Set obsahuje tři nepřekonatelné pomůcky, které vám usnadní fotografování i natáčení videí. Sada obsahuje teleskopický monoskop - vysouvací tyč p',799,753),
	(1496540,'Mobilní telefon Lenovo A2010 DualSIM LTE (PA1J0036CZ ) bílý','https://zrks.cz/storage/img/20160317/458x258_70f13ddf045dfef8ab43bd78c4c92bb9.jpg','mobilni-telefon-lenovo-a2010-dualsim-lte-pa1j0036cz-bily','RYCHLÝ A CENOVĚ DOSTUPNÝ SMARTPHONE.\n\n• Plynulý a efektivní systém \n• Podpora sítí 4G pro rychlé datové připojení \n• Ergonomické provedení pro pohodlné ovládání jednou rukou \n• Používání dvou čísel najednou díky podpoře dvou SIM karet \n• Pořizuje úžasné s',2799,715),
	(1512564,'Apple iPhone 6s 128GB - Rose Gold (MKQW2CN/A) růžový + Voucher na skin Skinzone pro Mobil CZ v hodnotě 399 Kč jako dárek + Doprava zdarma','https://zrks.cz/storage/img/20160408/458x258_f982f2165153ac11963a8ba7880d396f.jpg','apple-iphone-6s-128gb-rose-gold-mkqw2cn-a-ruzovy-voucher-na-skin-skinzone-pro-mobil-cz-v-hodnote-399-kc-jako-darek-doprava-zdarma','Když vezmete iPhone 6s do ruky, uvědomíte si, že něco takového jste ještě nedrželi. Pomocí 3D Touch dokážete jedním stisknutím víc než kdy předtím. Live Photos působivě oživí vaše vzpomínky. A to je teprve začátek. Když se na iPhone 6s podíváte podrobně, ',27590,316),
	(1512570,'Apple iPhone 6 Plus 64GB - space grey (MGAH2CN/A) černý/šedý + Voucher na skin Skinzone pro Mobil CZ v hodnotě 399 Kč jako dárek + Doprava zdarma','https://zrks.cz/storage/img/20160408/458x258_6d170683a52d1b7bb05019e0cae5e456.jpg','apple-iphone-6-plus-64gb-space-grey-mgah2cn-a-cerny-sedy-voucher-na-skin-skinzone-pro-mobil-cz-v-hodnote-399-kc-jako-darek-doprava-zdarma','Apple iPhone 6 Plus 64GB Space Gray\n\niPhone 6 Plus není jen větší - je ve všech směrech lepší. Má větší plochu, a přitom je podstatně tenčí. Je výkonnější, ovšem výjimečně úsporný. Jeho kovový povrch hladce přechází v nový Retina HD displej. V jednom souv',24390,437),
	(1516604,'Denon DCD-520AE, černá - DCD-520AEB','https://zrks.cz/storage/img/20160413/458x258_565c212a88804ef0ff0282a624c24ca6.jpg','denon-dcd-520ae-cerna-dcd-520aeb','Výkonný CD přehrávač s odolnou konstrukcí eliminující vibrace, mechanika CD-DA, CD-R, CD-RW, mód Pure Direct, výkonný zdroj, velmi krátké signální cesty, dvoukanálový stereo výstup a optický digitální výstup',5690,236),
	(1517045,'GoGEN 2 Selfie tyč teleskopická, bluetooth, červená - GOGBTSELFIE2R','https://zrks.cz/storage/img/20160413/458x258_1c2dc7f5e947a744db9d5cd02b683261.jpg','gogen-2-selfie-tyc-teleskopicka-bluetooth-cervena-gogbtselfie2r','Teleskopický selfie monopod s integrovaným ovládáním Bluetooth, rozsah vysunutí 22cm - 104cm, otočný o 360°, maximální zátěž 500 g, držák pro telefony a stativový závit 1/4\" pro fotoaparáty a outdoor kamery.',498,869),
	(1517508,'Denon SC-M40, černá','https://zrks.cz/storage/img/20160413/458x258_c78d1f13889b351045c73b0e5603d152.jpg','denon-sc-m40-cerna','Dvojice stylových regálových reproduktorů, 2-pásmový Bassreflex, 1x výškový 25mm s textilní kalotou a 1x středobasový 120mm zvukový měnič, frekvenční rozsah 45 – 40 000 Hz, max. výkon 120 W (60W RMS), impedance 6 Ohm, elegantní provedení.',3490,639),
	(1546708,'Sony KDL-55W756C - 139cm - KDL55W756CSAEP','https://zrks.cz/storage/img/20160513/458x258_93d07138afcff8decaa6c2e8a41df6fe.jpg','sony-kdl-55w756c-139cm-kdl55w756csaep','Elegantní LCD televizor s LED podsvícením; vylepšené technologie X-Reality PRO a Motionflow XR, sportovní režim Football, intuitivní rozhraní One-Flick, zrcadlení obrazovky. Velikost 55\" (139 cm), rozlišení 1920 x 1080 bodů, 20 W reproduktory, příjem DVB-',24990,587),
	(1561902,'Mobilní telefon Samsung S6 Edge (G925) 32 GB (SM-G925FZKAETL) černý','https://zrks.cz/storage/img/20160604/458x258_1cc5a30b15a8f744899defe6d8914c77.jpg','mobilni-telefon-samsung-s6-edge-g925-32-gb-sm-g925fzkaetl-cerny','Zakřivený displej? Nyní realita!\nVypadá to, že některým technikům ze Samsungu se klasický rovný displej zdál už okoukaný, proto se rozhodli u své nové vlajkové lodi přidat ke klasické verzi ještě verzi „Edge“, která má zakřivený displej a to dokonce z obo',17999,16),
	(1564363,'Panasonic TX-55CR730E stříbrná + Doprava zdarma','https://zrks.cz/storage/img/20160607/458x258_2bb51d0af02c178d1ca4d68f98048395.jpg','panasonic-tx-55cr730e-stribrna-doprava-zdarma','Prohnutý 4K televizor, který nechává ostatní vzadu\nVylepšená konstrukce a působivé linie dávají modelu CR730 vyniknout mezi ostatními prohnutými televizory. Rozlišení 4K a řada chytrých funkcí zajištuje, že jeho krása nezůstává jen na povrchu.\n\nTelevizor ',54990,322),
	(1564372,'Panasonic TX-55CR850E stříbrná + Doprava zdarma','https://zrks.cz/storage/img/20160607/458x258_a7199a01419b3c5e6712d5d0695de182.jpg','panasonic-tx-55cr850e-stribrna-doprava-zdarma','Působivé snímky ve 4K, inspirující design\nSpojením elegantního prohnutého provedení s nativním rozlišením 4K a procesorem zajišťujícím nekompromisní kvalitu obrazu vznikl televizor, který je mimořádný navenek i uvnitř.\n\nTelevizor 4K Ultra HD/ 4K Ultra HD\n',69990,560),
	(1564383,'JVC LT-24V250 černá + Doprava zdarma','https://zrks.cz/storage/img/20160607/458x258_881780ab16427679af90fbcf57b215b7.jpg','jvc-lt-24v250-cerna-doprava-zdarma','Podlehněte ostrému obrazu\nNový model televizoru JVC se může chlubit ostrostí obrazu, která si nezadá s ostrostí samurajského meče. Díky zobrazovací technologii Clear Motion Picture s frekvencí 100 HZ si vychutnáte čistotu, ostrost a plynulost obrazu. A to',6990,835),
	(1566429,'GoGEN Maxipes Fík MAXI TELKA 24 R červená + Doprava zdarma','https://zrks.cz/storage/img/20160608/458x258_f29dc55b13249d8b1650f7b7e7397051.jpg','gogen-maxipes-fik-maxi-telka-24-r-cervena-doprava-zdarma','LED televize, která rozzáří každý dětský pokojíček. Ve veselých barvách a s potisky obrázků z večerníčku Maxipes Fík na rámečku televizoru. Můžete si vybrat z 5 barevných variant – zelené, bílé, modré, růžové nebo červené a zvolit barvu, která se bude nej',5590,496),
	(1573517,'Pouzdro na mobil flipové Samsung pro Galaxy S7 (EF-ZG930C) (EF-ZG930CSEGWW) stříbrné','https://zrks.cz/storage/img/20160614/458x258_d4a9aad34e93120fac1b3a794844e781.jpg','pouzdro-na-mobil-flipove-samsung-pro-galaxy-s7-ef-zg930c-ef-zg930csegww-stribrne','',999.46,972),
	(1616535,'PC stůl s knihovnou Lexington','https://zrks.cz/storage/img/20160718/458x258_1ce8f404e95ba29bdb5a605338e7698d.jpg','pc-stul-s-knihovnou-lexington','barevné provedení bílá \n\nkombinace stolu a knihovny \n\nstůl - 2 chromové nohy (6 x 70 cm), pracovní deska (lamino 22 mm) \n\nknihovna - 8 úložných prostorů, deska (lamino 18 mm) \n\n ',4760,375),
	(1632308,'Pouzdro na mobil flipové Celly pro Galaxy A3 (WALLY452) černé','https://zrks.cz/storage/img/20160810/458x258_c03708d795ec23ba585992c6e2256341.jpg','pouzdro-na-mobil-flipove-celly-pro-galaxy-a3-wally452-cerne','',349,960),
	(1642173,'Apple iPhone 5s 16GB (ME432CS/A) šedý + Voucher na skin Skinzone pro Mobil CZ v hodnotě 399 Kč jako dárek + Doprava zdarma','https://zrks.cz/storage/img/20160824/458x258_042d89b087a6da476846fc108e806538.jpg','apple-iphone-5s-16gb-me432cs-a-sedy-voucher-na-skin-skinzone-pro-mobil-cz-v-hodnote-399-kc-jako-darek-doprava-zdarma','Až do teď nedosažitelné. Od teď už nepostradatelné.\nProcesor s 64bitovou architekturou. Identifikační snímač otisků prstů. Lepší, rychlejší fotoaparát. A operační systém vyvinutý přímo pro 64bitovou architekturu. Smartphone s jakoukoli z těchto vlastností',11990,673),
	(1644748,'Sedací polštář Liva XXL','https://zrks.cz/storage/img/20160826/458x258_4cfc345d16a438ae119a02e0faf0765e.jpg','sedaci-polstar-liva-xxl','Chcete si přečíst pár kapitol a odpočinout si? Lehněte si, sedněte nebo se jinak uvelebte na sedací polštář Liva 3XL. Budete jako v bavlnce a stejně dobře se na něm budou cítit i vaše děti. Oceníte i široký výběr barev potahů z odolné ekokůže.\r\nRozměry se',5875,487),
	(1645755,'TV komoda Hugo, dub','https://zrks.cz/storage/img/20160829/458x258_20b5ec86ac577d3ba869ca6c71667a46.jpg','tv-komoda-hugo-dub','Hugo je kolekce nábytku, kterou zdobí oblé tvary a barevný minimalismus. Jako hlavní materiál je použitá dýhovaná dřevovláknitá MDF deska a vlastní nohy jsou pak vyrobeny z masivního dubu. \n\nHugo svým konceptem moderního, funkčního a tvarově chytlavého ná',11155,414),
	(1645776,'Křeslo Milton, světle šedé','https://zrks.cz/storage/img/20160829/458x258_df84f053c66629c799ca79ada6483fc8.jpg','kreslo-milton-svetle-sede','Milton, to je křeslo stvořené pro lenošení a odpočinek.\n\nJednoduché, leč velmi milé a na pohled příjemné křeslo díky svému důmyslnému tvaru a designu bude trendy i za dvacet let.\n\nPotah křesla je vyroben z polyesterové textilie, která se vyznačuje velmi v',19083,611),
	(1645777,'Křeslo Milton, pískové','https://zrks.cz/storage/img/20160829/458x258_e984737e3da279a4d38e5a010ab90e85.jpg','kreslo-milton-piskove','Milton, to je křeslo stvořené pro lenošení a odpočinek.\n\nJednoduché, leč velmi milé a na pohled příjemné křeslo díky svému důmyslnému tvaru a designu bude trendy i za dvacet let.\n\nPotah křesla je vyroben z polyesterové textilie, která se vyznačuje velmi v',19083,813),
	(1645790,'Rozkládací křeslo Karup Funk Black/Brown','https://zrks.cz/storage/img/20160829/458x258_9874836b67fcfad43d185901febee482.jpg','rozkladaci-kreslo-karup-funk-black-brown','Funk, to je veledílo dánské značky Karup, která se při své tvorbě však inspiruje japonským stylem bydlení.\n\nKřeslo Funk tvoří dřevěný rám jednoduchého, ale výrazného tvaru a pohodlná matrace. Tu lze nechat složenou ve tvaru křesla, anebo ji rozložíte a pr',9500,233),
	(1651347,'Televizní stolek Percy','https://zrks.cz/storage/img/20160905/458x258_b49e05bde261a7734294adbf94bd9184.jpg','televizni-stolek-percy','Těšíte se na večer strávený s přáteli při sledování filmového hitu? Nedovolte, aby ošklivý TV stojan kazil atmosféru. Pořiďte si raději televizní stolek Percy v atraktivním dekoru akát mali hnědý / wenge.\r\nPřekvapte hosty a ze 2 skříněk vytáhněte vynikají',3542,724),
	(1656618,'GoGEN 4 teleskopická, bluetooth (GOGBTSELFIE4B) černá + Doprava zdarma','https://zrks.cz/storage/img/20160912/458x258_b912ab87b0a31af97c577820e93cdd47.jpg','gogen-4-teleskopicka-bluetooth-gogbtselfie4b-cerna-doprava-zdarma','SELFIE, řeklo by se taková hloupost, ALE…\n\nFocení „Selfie“ - autoportrétu, neboli focení sami sebe je oblíbenou zábavou nejen mladší generace. Při různých příležitostech jako jsou rodinné oslavy, party, výlety do přírody, Eurovíkendy strávené v Evropských',1990,922),
	(1656676,'Sedací míč Basketbal XXXL (3XL)','https://zrks.cz/storage/img/20160912/458x258_5aeb9f5c3d06e998766bace73b276cfd.jpg','sedaci-mic-basketbal-xxxl-3xl','Hraje váš potomek basketbal a vy byste ho v jeho koníčku rádi podpořili i doma? Pořiďte mu tématický sedací pytel Basketbal XXXL ve tvaru basketbalového míče. Velký rozměr sedacího pytle poskytuje dostatek místa pro pohodlné sezení, polehávání i relax u o',4606,437),
	(1656819,'BANDUNG houpací křeslo','https://zrks.cz/storage/img/20160912/458x258_080fd3898133b8ef6295ac89d117e40f.jpg','bandung-houpaci-kreslo','BANDUNG houpací křeslo\nTento produkt je vyroben z pravého ratanu – nejedná se o žádnou imitaci! Naším dodavatelem je výrobní společnost s patnáctiletou historií. Ratanové produkty jsou vyráběny na Jávě, každý kus je vyráběn ručně – každý kus je originál!\n',2974.14,421),
	(1669768,'Teleskopická selfie tyč s jackem nebo bluetooth v různých barvách','https://zrks.cz/storage/img/20160913/458x258_08242068be00aba95c1e235ddd6bea51.jpg','teleskopicka-selfie-tyc-s-jackem-nebo-bluetooth-v-ruznych-barvach','',599,794),
	(1673159,'SEDVAK Sedací vak 2x fotbal XXL+L 01 barva bílá 10 černá','https://zrks.cz/storage/img/20160916/458x258_4e4b2d4d1689ebb6c5e40b06790e7921.jpg','sedvak-sedaci-vak-2x-fotbal-xxl-l-01-barva-bila-10-cerna','Sedací vak FOTBAL 2x AKCE SLEVA 41%\r\nvelikost XXL + L\r\nBarevná varianta bílo/černá \r\n vhodný pro děti i dospěláky\r\nSedací pytel FOTBAL XXL + L\r\nAkční cena platí pouze pro naše zákazníky \r\n  \r\nPerfektní doplněk do dětského pokoje či studentského pokoje,vak',2340,706),
	(1673368,'Huawei P8, Mystic Champagne - SP-P8SSGOM','https://zrks.cz/storage/img/20160916/458x258_a15a46f2747ba361fb168d5b713dbffc.jpg','huawei-p8-mystic-champagne-sp-p8ssgom','Elegantní smartphone s designem kovového unibody těla, nespoutaným výkonem, skvělými fotoaparáty.a rychlým připojením LTE. 5.2\" IPS displej s rozlišením FullHD, 8jádrový procesor Hisilicon Kirin 930 64bit 2,0 GHz, 3GB RAM, 16GB interní paměti; 13 Mpix a 8',9988,148),
	(1674975,'Skleněný kancelářský stůl na počítač KLASIK černý','https://zrks.cz/storage/img/20160919/458x258_7a8b4c8cc6be4bc1b4ae065bd8b1d479.jpg','skleneny-kancelarsky-stul-na-pocitac-klasik-cerny','Skleněný kancelářský stůl na počítač KLASIK černý\nPerfektně designově řešený kancelářský stůl, se stane funkční okrasou Vaší kanceláře. Stůl je dostatečně prostorný, aby se na něj vešel počítač i s potřebným příslušenstvím. V levém dolním rohu se nachází ',4969.2,621),
	(1679611,'Samsung MX-J630 černá barva + Doprava zdarma','https://zrks.cz/storage/img/20160923/458x258_db9b90b13141512cafc54eb44ea89d59.jpg','samsung-mx-j630-cerna-barva-doprava-zdarma','Mějte na párty ovládání zábavy na dosah ruky\nSvým mobilním zařízením můžete zábavu ještě více rozproudit. Díky rychle stažitelné bezplatné aplikaci* budete mít možnost přizpůsobení zážitku z vaší party přímo na dlani své ruky. Aplikace nabízí základní ovl',4390,664),
	(1681261,'BeanBag Sedací pytel 179x140 perfekt dark blue','https://zrks.cz/storage/img/20160926/458x258_5056dff3cddeccb55004cc2330ed2e5e.jpg','beanbag-sedaci-pytel-179x140-perfekt-dark-blue','',3750,454),
	(1681312,'BeanBag Sedací vak želva Turtlák','https://zrks.cz/storage/img/20160926/458x258_4cd668acc1765809e7092c2c741c114c.jpg','beanbag-sedaci-vak-zelva-turtlak','',1490,279),
	(1683571,'Cyklistické pouzdro Roswheel na mobil a jiné drobnosti','https://zrks.cz/storage/img/20160929/458x258_9276ab3e257a9c0d11cb92a2b65867e3.jpg','cyklisticke-pouzdro-roswheel-na-mobil-a-jine-drobnosti','',430,34),
	(1685432,'Samsung Galaxy A5 2016 (SM-A510F) (SM-A510FZDAETL) zlatý + Voucher na skin Skinzone pro Mobil CZ v hodnotě 399 Kč jako dárek + Doprava zdarma','https://zrks.cz/storage/img/20161001/458x258_d46aa10b8ff4eec097a6d2604fa92172.jpg','samsung-galaxy-a5-2016-sm-a510f-sm-a510fzdaetl-zlaty-voucher-na-skin-skinzone-pro-mobil-cz-v-hodnote-399-kc-jako-darek-doprava-zdarma','Jedinečná kombinace kovu a skla\nSpojení pevného kovu s naleštěnou povrchovou úpravou a atraktivního skla Gorilla Glass. Vychutnejte si stabilnější, pohodlnější přenosnost v tenkém provedení s tenčím prstencem.\n\nVysoký výkon\nZažijte mimořádný výkon hardwar',9990,334),
	(1686879,'Sony KDL-40R450 černá + Doprava zdarma','https://zrks.cz/storage/img/20161005/458x258_4317705d03c7a47bd84b4770ed8447f1.jpg','sony-kdl-40r450-cerna-doprava-zdarma','Skvělý obraz, tenké provedení\n\nTelevizor LED Full HD s technologií Clear Resolution Enhancer, funkcí Photo Share a nahráváním na pevný disk přes USB\n\nDostupné velikosti obrazovky: 102 cm (40\")\nRozlišení Full HD\nTenké provedení\nTechnologie Clear Resolution',8777,568),
	(1687378,'Pouzdro s peněženkou pro Huawei P9','https://zrks.cz/storage/img/20160923/458x258_8ecab28379e97ac1b091f881ae3da114.jpg','pouzdro-s-penezenkou-pro-huawei-p9','',845,835),
	(1687934,'Selfie tyč s bluetooth dálkovým ovládáním - 3 barvy','https://zrks.cz/storage/img/20160924/458x258_6b0a02bd24a8d90212796c242f85957d.jpg','selfie-tyc-s-bluetooth-dalkovym-ovladanim-3-barvy','',409,474),
	(1687945,'Selfie tyč s bluetooth dálkovým ovládáním - dodání do 2 dnů','https://zrks.cz/storage/img/20160922/458x258_df459c940a0d4c043eef3cf0416ba7ed.jpg','selfie-tyc-s-bluetooth-dalkovym-ovladanim-dodani-do-2-dnu','',325,864),
	(1688572,'Mobilní telefon vždy při ruce: Barevná sportovní pouzdra zn. Free Knight','https://zrks.cz/storage/img/20161006/458x258_c4b4527950082a2cf32ea8a930dac454.jpg','mobilni-telefon-vzdy-pri-ruce-barevna-sportovni-pouzdra-zn-free-knight','',399,899);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products_categories
# ------------------------------------------------------------

LOCK TABLES `products_categories` WRITE;
/*!40000 ALTER TABLE `products_categories` DISABLE KEYS */;

INSERT INTO `products_categories` (`product_id`, `category_id`)
VALUES
	(1245717,7),
	(1318256,7),
	(1440987,16),
	(1479244,17),
	(1490520,13),
	(1496540,10),
	(1512564,11),
	(1512570,11),
	(1516604,18),
	(1517045,13),
	(1517508,17),
	(1546708,16),
	(1561902,10),
	(1564363,16),
	(1564372,16),
	(1564383,16),
	(1566429,16),
	(1573517,14),
	(1616535,7),
	(1632308,14),
	(1642173,11),
	(1644748,3),
	(1645755,6),
	(1645776,4),
	(1645777,4),
	(1645790,4),
	(1651347,6),
	(1656618,13),
	(1656676,3),
	(1656819,4),
	(1669768,13),
	(1673159,3),
	(1673368,10),
	(1674975,7),
	(1679611,17),
	(1681261,3),
	(1681312,3),
	(1683571,14),
	(1685432,10),
	(1686879,16),
	(1687378,14),
	(1687934,13),
	(1687945,13),
	(1688572,14);

/*!40000 ALTER TABLE `products_categories` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
