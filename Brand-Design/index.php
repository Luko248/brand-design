<?php
mb_internal_encoding("UTF-8");
$hlaska = '';
if ($_POST)
{
    if (isset($_POST['jmeno']) && $_POST['jmeno'] &&
        isset($_POST['priezvisko']) && $_POST['priezvisko'] &&
        isset($_POST['email']) && $_POST['email'] &&
        isset($_POST['zprava']) && $_POST['zprava'] &&
        isset($_POST['cislo']) && $_POST['cislo'])
    {
        $hlavicka = 'From:'. 'Meno: ' . $_POST['jmeno'] .' '. $_POST['priezvisko'] . ' | Tel: ' . $_POST['cislo'];
        $hlavicka .= "\nMIME-Version: 1.0\n";
        $hlavicka .= "Content-Type: text/html; charset=\"utf-8\"\n";
        $adresa = 'info@brand-design.cz';
        $predmet = 'Nová správa z brand-design.cz';
        $uspech = mb_send_mail($adresa, $predmet, $_POST['zprava'], $hlavicka);
        if ($uspech)
        {
            $hlaska = '<p class="form__validation-message">Email byl úspěšně odeslán, Odpovíme Vám v co nejkratším možném čase.<p>';
        }
        else
            $hlaska = '<p class="form__validation-message form__validation-message--error">Email se nepovedlo odesát. Zkontrolujte adresu.<p>';	
    }
    else
        $hlaska = '<p class="form__validation-message form__validation-message--error">Formulař není správně vyplněn!<p>';
}
?>

<!DOCTYPE html>
<html lang="en-us" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<title>BrandDESIGN - graphic solutions</title>
	<meta name="author" content="Lukáš Chylík" />
	<meta name="description" content="Navrh brandu a loga, velkoplošní grafika, Design konferenčních a veltržních stánků, návrh a výroba velkoplošních polepú na auta či výlohu" />
	<meta name="keywords" content="Návrg Loga Brno, Logo Brno, Návrh designu, Design Brno, Konferenční stánky, Návrh brandu, Brand, Design, Velkoplošní grafika, Polepy na auta">
	<meta name="google-site-verification" content="WlojpglePdITx8NvvfRNi0UoxVJ5Ft-Yy0G-QUHjUs0" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="apple-touch-icon" sizes="180x180" href="/Resources/Images/Favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/Resources/Images/Favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/Resources/Images/Favicons/favicon-16x16.png">
	<link rel="manifest" href="/Resources/Images/Favicons/site.webmanifest">
	<link rel="mask-icon" href="/Resources/Images/Favicons/safari-pinned-tab.svg" color="#170f24">
	<meta name="msapplication-TileColor" content="#170f24">
	<meta name="theme-color" content="#170f24">

	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="Brand-Design" />
	<meta itemprop="description" content="" />
	<meta itemprop="image" content="/Resources/Images/Meta/meta-image-google.png" />

	<!-- Open Graph data -->
	<meta property="og:title" content="Brand-Design" />
	<meta property="og:url" content="" />
	<meta property="og:image" content="/Resources/Images/Meta/meta-image-fb.png" />
	<meta property="og:description" content="" />

	<!-- Twitter Card data -->
	<meta name="twitter:card" content="">
	<meta name="twitter:site" content="">
	<meta name="twitter:title" content="Brand-Design" />
	<meta name="twitter:description" content="" />
	<meta name="twitter:creator" content="">
	<meta name="twitter:image" content="/Resources/Images/Meta/meta-image-twitter.png" />

	<link href="Resources/Scripts/Libs/aos/aos.css" rel="stylesheet" />
	<link href="Resources/Stylesheets/CSS/style.css" rel="stylesheet" />
</head>

<body>
	<div class="loading-anim">
		<div>
			<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="35.4427mm" height="27.332mm" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
				 viewBox="0 0 351 270"
				 xmlns:xlink="http://www.w3.org/1999/xlink">
			<defs>
			<style type="text/css">
				<![CDATA[
				 .str2 {stroke:#01FFA9;stroke-width:0.753609}
				 .str1 {stroke:#7E07DB;stroke-width:0.753609}
				 .str0 {stroke:#A815D7;stroke-width:0.753609}
				 .fil0 {fill:#01FFA9}
				 .fil2 {fill:#7E07DB}
				 .fil3 {fill:#7E07DB}
				 .fil1 {fill:#A815D7}
				]]>
				</style>
 </defs>
			<g id="Vrstva_x0020_1">
			<metadata id="CorelCorpID_0Corel-Layer" />



			<g id="_823242128">
			<path class="fil0" d="M120 261c-45,-19 -76,-64 -76,-115 0,-4 0,-7 0,-10l0 -101c0,-1 0,-1 0,-2 0,0 0,-1 0,-2l0 0 0 0c1,-16 14,-30 31,-31 0,0 30,23 29,58 -2,35 -19,26 -16,42 3,16 23,11 29,-1 8,-16 21,-8 20,-1l0 0c-15,10 -26,28 -26,48 0,13 5,25 13,35 0,0 -15,12 -9,20 6,8 6,6 11,10 5,3 10,7 4,16 -6,8 -13,11 -10,33l0 1z" />



			<path class="fil1 str0" d="M44 151c0,-1 0,-3 0,-5 0,-2 0,-7 0,-10l0 -59c2,1 4,0 4,-2 4,-17 13,-36 28,-29 9,5 5,19 2,24 -8,12 -17,32 -21,46 -3,10 -1,15 -2,25 0,2 -4,10 -11,10z" />



			<path class="fil2" d="M225 146c0,-14 -13,-42 -31,-51 7,-32 -1,-67 -37,-74 3,0 7,0 11,0 27,0 53,9 73,25 -6,7 -9,19 -3,30 8,14 29,21 41,32 7,6 11,12 7,22 -1,4 -6,4 -8,0 -3,-7 -7,-14 -15,-8 -9,9 5,21 10,28 10,10 13,40 1,50 -2,2 -14,12 -14,12 3,1 6,-1 9,-2 4,-1 7,-3 10,-5 -15,31 -43,51 -76,61 0,-1 28,-22 25,-41 0,0 -4,-10 -13,-5 -10,5 -12,16 -19,10 -3,-2 -4,-6 -4,-11 1,-4 3,-8 6,-12 4,-4 16,-12 24,-20 8,-8 12,-17 1,-26l0 0c0,0 2,-10 2,-15z" />



			<path class="fil1" d="M168 270c-14,0 -33,-3 -48,-10 -3,-22 4,-25 10,-33 6,-9 1,-13 -4,-16 -5,-4 -5,-2 -11,-10 -4,-6 5,-18 9,-20 10,13 22,21 44,21 22,0 49,-17 55,-41 22,18 -17,36 -25,46 -7,8 -8,18 -2,23 7,6 9,-5 18,-10 10,-6 14,5 14,5 3,19 -25,40 -25,41 -11,3 -20,4 -35,4z" />



			<path class="fil1" d="M75 0c0,0 1,0 2,0 18,0 33,15 33,33 0,1 0,2 0,2 14,-7 30,-12 47,-14 54,10 37,74 37,74l0 0c-8,-4 -17,-6 -26,-6 -11,0 -22,3 -31,9l0 0c1,-7 -12,-15 -20,1 -6,12 -26,17 -29,1 -3,-16 14,-7 16,-42 1,-35 -29,-58 -29,-58z" />



			<path class="fil0" d="M300 142c-1,7 7,9 10,4 5,-7 1,-9 6,-15 8,-9 21,-2 19,10 -5,29 -40,59 -66,69 -3,1 -6,3 -9,2 0,0 12,-10 14,-12 12,-10 9,-40 -1,-50 -5,-7 -19,-19 -10,-28 8,-6 12,1 15,8 2,4 7,4 8,0 4,-10 0,-16 -7,-22 -12,-11 -33,-18 -41,-32 -12,-23 12,-49 32,-34 28,21 35,65 30,100z" />



			<path class="fil1 str0" d="M264 115c-7,-3 -8,-2 -21,-2 -6,0 -11,-6 -9,-11 5,-11 25,-5 30,13z" />



			<path class="fil3 str1" d="M21 71c5,1 15,10 13,15 -4,-1 -2,-2 -14,-7 -1,0 -3,0 -4,-1 -4,-2 -3,-10 5,-7z" />



			<path class="fil0 str2" d="M339 114c-17,7 -19,7 -27,15 4,-9 26,-44 38,-28 2,8 -6,11 -11,13z" />



			<path class="fil1 str0" d="M225 257c0,0 24,-10 39,-35 0,0 4,-6 8,-5 4,1 10,5 8,13 -4,25 -34,29 -55,27z" />



			<path class="fil0 str2" d="M40 140c-9,-9 -11,-9 -30,-16 -9,-4 -13,-15 -6,-21 12,-13 38,7 36,37z" />



  </g>
 </g>
</svg>
		</div>
	</div>
	<header class="header header--landing" id="Home">
		<div class="slider">
			<div class="slider__item slider__item--first">
				<div class="slider__content">
					<h3 class="slider__title">
						<b>Vaše</b> značka je důležitá
					</h3>
					<a href="#About" id="AboutScroll" class="slider__button">
						Zjistit více
					</a>
				</div>
			</div>
			<div class="slider__item slider__item--second">
				<div class="slider__content">
					<h3 class="slider__title">
						Výstavní stánky <br>po <b>celém světě</b>
					</h3>
					<a href="expositions.html" class="slider__button">
						Zobrazit galerii
					</a>
				</div>
			</div>
			<div class="slider__item slider__item--third">
				<div class="slider__content">
					<h3 class="slider__title">
						Kérka pro <b>Váš</b> vůz?
					</h3>
					<a href="#Contact" id="ContactScroll" class="slider__button">
						Kontaktujte nás
					</a>
				</div>
			</div>
		</div>
	</header>
	<!--Navigation-->
	<nav class="nav">
		<a href="/" class="nav__logo">
			<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="38.1416mm" height="15.0395mm" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
				 viewBox="0 0 250 99"
				 xmlns:xlink="http://www.w3.org/1999/xlink">
			<defs>
 </defs>
			<g id="Vrstva_x0020_1">
			<metadata id="CorelCorpID_0Corel-Layer" />



			<g id="_734310704">
			<path class="fil0" d="M44 95c-17,-7 -28,-23 -28,-42 0,-1 0,-2 0,-3l0 -37c0,0 0,-1 0,-1 0,0 0,0 0,-1l0 0 0 0c0,-6 5,-11 11,-11 0,0 11,8 11,21 -1,13 -7,10 -6,15 1,6 9,4 11,0 3,-6 7,-3 7,0l0 0c-5,3 -9,10 -9,17 0,5 2,10 4,13 0,0 -5,5 -3,8 2,2 2,2 4,3 2,1 4,3 2,6 -3,3 -5,4 -4,12l0 0z" />



			<path class="fil1 str0" d="M16 55c0,0 0,-1 0,-2 0,-1 0,-2 0,-3l0 -22c1,1 2,0 2,-1 1,-6 4,-13 10,-10 3,2 2,7 1,8 -3,5 -7,12 -8,17 -1,4 0,6 -1,9 0,1 -1,4 -4,4z" />



			<path class="fil2" d="M82 53c0,-5 -4,-15 -11,-18 3,-12 0,-25 -14,-27 2,0 3,0 5,0 9,0 19,3 26,9 -2,3 -3,7 -1,11 3,5 11,7 15,11 2,3 4,5 3,8 -1,2 -3,2 -3,0 -2,-2 -3,-5 -6,-2 -3,3 2,7 4,10 3,3 5,14 0,18 -1,1 -5,4 -5,4 1,1 2,0 3,0 2,-1 3,-1 4,-2 -6,11 -16,19 -28,22 0,0 10,-8 9,-15 0,0 -1,-4 -5,-2 -3,2 -4,6 -6,4 -1,-1 -2,-2 -2,-4 0,-1 1,-3 2,-4 2,-2 6,-5 9,-8 3,-3 4,-6 1,-9l0 0c0,0 0,-4 0,-6z" />



			<path class="fil1" d="M62 99c-6,0 -13,-2 -18,-4 -1,-8 1,-9 4,-12 2,-3 0,-5 -2,-6 -2,-1 -2,-1 -4,-3 -1,-3 2,-7 3,-8 4,5 8,8 17,8 8,0 17,-7 20,-15 8,6 -7,13 -10,17 -2,3 -3,6 0,8 2,2 3,-2 6,-4 4,-2 5,2 5,2 1,7 -9,15 -9,15 -4,1 -7,2 -12,2z" />



			<path class="fil1" d="M27 0c1,0 1,0 1,0 7,0 12,5 12,12 0,0 0,1 0,1 5,-3 11,-5 17,-5 20,3 14,27 14,27l0 0c-3,-2 -6,-3 -9,-3 -5,0 -8,2 -12,4l0 0c0,-3 -4,-6 -7,0 -2,4 -10,6 -11,0 -1,-5 5,-2 6,-15 0,-13 -11,-21 -11,-21z" />



			<path class="fil0" d="M110 52c-1,2 2,3 3,1 2,-2 1,-3 3,-5 2,-4 7,-1 6,3 -1,11 -14,22 -24,26 -1,0 -2,1 -3,0 0,0 4,-3 5,-4 5,-4 3,-15 0,-18 -2,-3 -7,-7 -4,-10 3,-3 4,0 6,2 0,2 2,2 3,0 1,-3 -1,-5 -3,-8 -4,-4 -12,-6 -15,-11 -4,-9 4,-18 12,-13 10,8 13,24 11,37z" />



			<path class="fil1 str0" d="M97 42c-3,-1 -4,-1 -8,-1 -2,0 -4,-2 -3,-4 1,-4 9,-1 11,5z" />



			<path class="fil3 str1" d="M8 26c1,0 5,4 4,5 -1,0 0,0 -5,-2 0,0 -1,0 -1,0 -2,-1 -1,-4 2,-3z" />



			<path class="fil0 str2" d="M124 42c-6,2 -7,2 -10,5 1,-3 9,-16 14,-10 1,3 -2,4 -4,5z" />



			<path class="fil1 str0" d="M82 94c0,0 9,-4 15,-13 0,0 1,-2 2,-2 2,0 4,2 4,5 -2,9 -13,11 -21,10z" />



			<path class="fil0 str2" d="M15 51c-4,-3 -4,-3 -11,-6 -4,-1 -5,-5 -3,-8 5,-4 14,3 14,14z" />



  </g>
			<path class="fil4 str3" d="M137 42c-1,0 -2,0 -2,-1 -1,-1 -1,-2 -1,-3l0 -15c0,-1 0,-1 0,-2 0,-1 1,-1 1,-1 1,-1 2,-1 2,-1l6 0c0,0 0,0 1,0 1,0 2,1 3,1 1,0 1,1 2,1 0,1 1,2 1,3 1,0 1,1 1,2 0,0 0,1 0,1 0,1 -1,2 -2,3l1 0 0 0 0 0 1 1c0,0 0,0 1,1 0,0 0,1 0,1 1,1 1,2 1,2 0,1 0,2 -1,2 0,1 0,2 -1,2 0,1 0,1 -1,1 -1,1 -1,1 -2,2 -1,0 -2,0 -3,0l-8 0zm4 -15l2 0c0,0 0,0 0,0 1,0 1,0 1,-1 0,0 0,0 -1,0 0,0 0,-1 -1,-1l-1 0 0 2zm0 9l3 0c1,0 1,0 1,-1 0,0 0,0 0,0 0,-1 0,-1 0,-1 0,0 0,0 -1,0l-3 0 0 2zm16 6c0,0 -1,0 -2,-1 -1,0 -1,-1 -1,-2l0 -11c0,-1 0,-2 1,-2 1,-1 2,-1 2,-1l4 2 0 0 0 -1 0 0c1,-1 2,-1 3,-1 0,0 1,0 1,0 1,0 1,0 1,1 1,0 1,1 1,1 0,1 0,1 0,1 0,1 0,1 0,2 -1,1 -2,1 -3,1 0,0 0,0 0,0 0,0 0,1 -1,1 0,0 0,0 -1,0 0,0 0,1 -1,1 0,0 0,1 0,1 0,0 0,1 0,2l0 3c0,0 0,1 0,2 -1,0 -1,1 -2,1 0,0 -1,0 -2,0zm17 -17c0,0 1,0 1,0 2,0 3,0 4,1l0 0 3 -1c0,-1 1,-1 1,-1 1,0 1,1 1,1 1,1 2,2 2,3l0 11c0,1 -1,2 -1,2 -1,1 -2,1 -3,1l-3 -1 0 0c-1,1 -2,1 -4,1 0,0 -1,0 -1,0 -1,0 -2,0 -3,-1 -1,-1 -2,-1 -3,-2 0,-1 0,-2 -1,-3 0,-1 0,-2 0,-3 0,-1 0,-3 1,-4 1,-1 1,-2 2,-3 1,-1 3,-1 4,-1zm0 9c0,0 0,1 1,2 0,0 1,0 1,0 1,0 1,0 2,0 0,0 0,0 0,-1 1,0 1,-1 1,-1 0,0 0,0 0,-1 0,-1 -1,-2 -2,-2 0,0 0,0 -1,0 0,0 -1,0 -1,0 -1,1 -1,1 -1,2 0,0 0,0 0,0 0,0 0,1 0,1zm14 7c0,0 -1,-1 -1,-2l0 -11c0,-1 1,-2 1,-2 1,-1 2,-1 3,-1l3 1 0 0c0,0 0,0 0,0 2,-1 3,-1 4,-1 1,0 1,0 2,0 1,0 2,0 3,1 1,1 1,1 2,2 0,1 0,2 0,3l0 8c0,0 0,1 0,2 -1,0 -1,1 -2,1 0,0 -1,0 -1,0 -1,0 -2,0 -3,-1 -1,0 -1,-1 -1,-2l0 -7c0,0 0,-1 0,-1 -1,0 -1,-1 -2,-1 0,0 -1,1 -1,1 0,0 -1,1 -1,1l0 7c0,1 0,2 -1,2 0,1 -1,1 -2,1 -1,0 -2,0 -3,-1zm30 -16c0,0 0,0 0,0l0 -4c0,-1 1,-2 1,-3 1,-1 2,-1 3,-1 1,0 1,0 2,0 0,1 1,1 1,2 0,0 0,1 0,2l0 18c0,0 0,1 0,2 0,0 -1,1 -1,1 -1,0 -1,0 -2,0l-3 -1 0 0c-1,1 -2,1 -4,1 0,0 -1,0 -2,0 -1,0 -3,-1 -4,-2 -1,-1 -2,-3 -2,-5 0,0 0,-1 0,-2 0,0 0,-1 0,-2 0,-1 1,-2 1,-3 1,-1 2,-2 3,-2 1,-1 2,-1 4,-1 1,0 2,0 3,0zm-4 8c0,1 0,2 0,3 1,0 1,0 2,0 1,0 1,0 2,0 0,-1 0,-1 0,-2l0 -1c0,-1 0,-2 -1,-2 -1,0 -1,0 -1,0 -1,0 -1,0 -1,0 -1,1 -1,1 -1,2 0,0 0,0 0,0zm-80 34l0 -16c0,-1 0,-1 0,-2 0,0 1,-1 1,-1 1,0 2,-1 2,-1l5 0c2,0 4,1 5,1 1,0 3,1 4,2 1,0 2,1 2,2 1,1 2,3 2,4 0,1 0,2 0,3 0,2 0,4 -1,6 -1,2 -3,3 -5,4 -1,1 -3,1 -6,1l-6 0c-1,0 -2,0 -2,-1 -1,0 -1,-1 -1,-2zm7 -3l2 0c1,0 2,0 2,-1 1,0 2,-1 2,-1 1,-1 1,-2 1,-3 0,0 0,-1 0,-1 0,-1 -1,-2 -2,-3 -1,-1 -2,-1 -4,-1l-1 0 0 10zm16 4c0,0 0,-1 0,-1l0 -16c0,-1 0,-1 0,-2 1,0 1,-1 2,-1 0,0 1,-1 2,-1l8 0c1,0 1,0 2,1 0,0 1,0 1,1 0,0 0,1 0,2 0,0 0,1 0,1 0,1 -1,1 -1,1 -1,1 -1,1 -2,1l-5 0 0 2 4 0c1,0 1,0 2,0 0,0 0,0 1,1 0,0 0,0 0,1 1,0 1,0 1,1 0,1 -1,1 -1,2 -1,1 -2,1 -3,1l-4 0 0 2 5 0c1,0 2,0 2,1 1,0 1,1 1,1 0,0 0,1 0,1 0,1 0,2 -1,2 0,1 -1,1 -2,1l-8 0c-1,0 -2,0 -2,0 -1,-1 -1,-1 -2,-2zm18 1c0,0 -1,-1 -1,-1 -1,-1 -1,-1 -1,-2 0,-1 0,-1 1,-2 0,-1 1,-1 2,-1 0,0 1,0 1,0l2 0 1 1 1 0 0 0c0,0 0,0 1,0 0,0 0,0 1,0 0,0 0,0 1,0 0,0 0,0 0,0 1,0 1,-1 1,-1 0,0 0,0 -1,0 0,0 0,0 0,0l-1 -1 0 0 -2 0 0 0 -2 -1c-1,0 -2,-1 -3,-1 -1,-1 -1,-1 -2,-2 0,-1 -1,-2 -1,-3 0,-1 1,-2 1,-3 0,0 1,-1 1,-2 1,-1 2,-1 3,-2 1,0 2,-1 4,-1 0,0 1,0 1,0 1,0 2,0 4,1 1,0 2,0 2,1 1,0 1,1 1,1 1,1 1,1 1,2 0,0 -1,1 -1,1 0,1 -1,1 -1,1 0,1 -1,1 -1,1 -1,0 -2,0 -2,-1l-1 0 -1 0 0 0 -1 0 0 0 -1 -1c0,0 0,0 0,0 0,0 0,0 0,0 -1,0 -1,1 -1,1 0,0 0,0 0,0 0,0 0,0 0,1 0,0 0,0 0,0l1 0 0 0 1 0 1 0 2 1c1,0 2,1 3,1 0,0 1,1 1,1 1,1 1,1 1,1 1,1 1,2 1,2 0,1 0,1 0,2 0,1 -1,3 -2,4 -2,3 -4,4 -8,4 0,0 0,0 -1,0 -3,-1 -4,-1 -6,-2zm19 1c0,-1 -1,-2 -1,-3l0 -16c0,-1 1,-2 1,-3 1,-1 2,-1 3,-1 1,0 1,0 2,1 0,0 1,0 1,1 0,1 1,1 1,2l0 16c0,0 0,1 -1,1 0,1 0,1 0,2 -1,0 -2,1 -3,1 -1,0 -2,-1 -3,-1zm22 -6c2,0 2,-1 3,-1l-2 0c-1,0 -2,0 -2,-1 -1,-1 -1,-2 -1,-2 0,-1 0,-2 0,-2 0,-1 1,-1 1,-1 1,-1 1,-1 2,-1l6 0c2,0 3,2 3,4 0,1 0,2 0,2 0,1 0,2 -1,3 -1,1 -1,2 -2,3 -1,1 -2,2 -4,2 -1,0 -2,1 -4,1 -1,0 -2,0 -3,-1 -1,0 -3,0 -4,-1 -1,0 -2,-1 -3,-2 -1,-1 -1,-2 -2,-4 0,-1 -1,-3 -1,-4 0,-2 1,-4 2,-6 1,-1 2,-3 4,-4 2,-1 4,-2 7,-2 0,0 1,0 1,0 1,0 2,0 3,1 1,0 2,1 3,1 2,1 3,3 3,4 0,1 0,1 -1,2 -1,1 -1,1 -2,1 -1,0 -1,0 -2,-1l0 0 -1 0c0,0 -1,-1 -1,-1 -1,0 -2,-1 -3,-1 -1,0 -2,1 -3,1 0,0 -1,1 -2,2 0,0 0,1 0,2 -1,0 -1,1 -1,1 0,0 0,1 1,1 0,1 0,2 0,2 1,1 2,1 2,2 1,0 2,0 3,0 0,0 1,0 1,0zm13 6c-1,-1 -1,-2 -1,-3l0 -16c0,-1 0,-2 1,-2 0,-1 0,-1 1,-2 1,0 1,0 1,0 2,0 3,1 4,2l8 9 0 -7c0,-1 0,-2 1,-3 1,-1 1,-1 2,-1 1,0 1,0 2,0 0,1 1,1 1,1 0,1 1,1 1,1 0,1 0,1 0,2l0 16c0,0 0,0 0,1 0,0 0,1 -1,1 0,1 -1,1 -1,1 -1,1 -1,1 -2,1 0,0 -1,-1 -2,-1 0,0 0,0 0,-1l-9 -10 0 8c0,1 0,2 -1,3 -1,0 -1,1 -2,1 -1,0 -2,-1 -3,-1z" />



			<path class="fil5" d="M136 78c1,0 1,0 1,0 1,0 1,0 2,1l0 0 1 -1c0,0 0,0 0,0 1,0 1,0 1,0 0,1 1,1 1,2l0 4c0,1 -1,2 -1,2 0,1 0,2 -1,2 0,0 0,1 -1,1 0,0 -1,0 -2,0 0,0 0,0 0,0 -1,0 -2,0 -2,0 0,-1 -1,-1 -1,-1 0,0 0,0 0,-1 0,0 0,0 0,0 0,-1 1,-1 1,-1 0,0 0,0 1,0l0 0 0 0c0,0 0,0 0,0 0,0 0,0 0,0 1,0 1,1 1,1 1,-1 1,-1 1,-1 0,0 0,0 0,0 1,0 1,0 1,0 -1,0 -1,0 -2,0 0,0 0,0 -1,0 0,0 0,0 -1,-1 0,0 -1,0 -1,-1 0,-1 0,-1 0,-2 0,0 0,-1 0,-1 0,-1 0,-1 0,-1 1,-1 1,-1 1,-1 1,-1 1,-1 1,-1zm1 4c0,0 0,1 0,1 0,0 0,0 1,0 0,0 0,0 0,0 0,0 1,0 1,-1 0,0 0,0 0,0 0,0 -1,-1 -1,-1 0,0 0,0 0,0 0,0 -1,0 -1,0 0,0 0,0 0,0 0,0 0,1 0,1zm7 4c-1,0 -1,0 -1,-1 -1,0 -1,0 -1,-1l0 -4c0,-1 0,-1 1,-1 0,-1 0,-1 1,-1l1 1 0 0 0 0 1 0c0,-1 0,-1 1,-1 0,0 0,0 0,0 0,0 1,0 1,1 0,0 0,0 0,0 0,0 0,1 0,1 0,0 0,0 0,0 0,1 -1,1 -1,1 0,0 0,0 0,0 0,0 0,0 -1,0 0,0 0,0 0,0 0,1 0,1 0,1 0,0 -1,0 -1,0 0,0 0,1 0,1l0 1c0,1 0,1 0,1 0,0 0,0 0,1 -1,0 -1,0 -1,0zm7 -8c0,0 0,0 1,0 0,0 1,0 1,1l0 0 2 -1c0,0 0,0 0,0 0,0 0,0 0,0 1,1 1,1 1,2l0 4c0,1 0,1 0,1 -1,1 -1,1 -1,1l-2 -1 0 0c0,1 -1,1 -1,1 -1,0 -1,0 -1,0 -1,0 -1,0 -1,-1 -1,0 -1,0 -1,-1 -1,0 -1,0 -1,-1 0,0 0,-1 0,-1 0,-1 0,-1 0,-2 1,0 1,-1 1,-1 1,0 1,-1 2,-1zm0 4c0,0 0,1 0,1 1,0 1,0 1,0 0,0 0,0 1,0 0,0 0,0 0,0 0,0 0,-1 0,-1 0,0 0,0 0,0 0,-1 0,-1 -1,-1 0,0 0,0 0,0 0,0 0,0 -1,0 0,0 0,1 0,1 0,0 0,0 0,0 0,0 0,0 0,0zm6 7c0,-1 0,-1 0,-1l0 -8c0,-1 0,-1 0,-1 1,-1 1,-1 1,-1l2 1 0 0c0,-1 1,-1 1,-1 1,0 1,0 1,0 1,0 1,1 1,1 1,0 1,0 1,1 1,0 1,1 1,1 0,1 0,1 0,1 0,0 0,1 0,1 0,1 -1,1 -1,2 0,0 -1,0 -1,1 -1,0 -1,0 -2,0 0,0 0,0 -1,0l0 0 0 0 0 2c0,0 0,0 -1,1 0,0 0,0 -1,0 0,0 0,0 -1,0zm3 -7c0,0 0,1 0,1 0,0 1,0 1,0 0,0 0,0 1,0 0,0 0,-1 0,-1 0,0 0,-1 0,-1 -1,0 -1,0 -1,0 0,0 -1,0 -1,0 0,0 0,1 0,1zm7 4c0,0 -1,0 -1,-1 0,0 0,0 0,-1l0 -8c0,0 0,0 0,0 0,-1 0,-1 0,-1 1,0 1,0 1,0 0,0 1,0 1,0 0,0 0,0 0,1 1,0 1,0 1,0l0 3c0,0 0,-1 0,-1 1,0 1,0 2,0 0,0 0,0 1,0 0,0 0,1 1,1 0,0 0,0 0,1 0,0 0,0 0,1l0 3c0,1 0,1 0,1 0,1 -1,1 -1,1 -1,0 -1,0 -1,-1 -1,0 -1,0 -1,-1l0 -3c0,0 0,0 0,0 0,0 0,0 -1,0 0,0 0,0 0,0 0,0 0,0 0,0l0 3c0,1 0,1 -1,1 0,0 0,1 0,1 0,0 -1,0 -1,0zm9 0c-1,0 -1,0 -1,-1 -1,0 -1,0 -1,-1l0 -4c0,-1 0,-1 0,-1 0,0 1,-1 1,-1 0,0 0,0 1,0 0,0 0,0 0,0 1,1 1,1 1,1 0,0 0,0 0,1l0 4c0,1 0,1 0,1 -1,1 -1,1 -1,1zm-2 -9c0,0 0,0 0,-1 0,0 0,-1 1,-1 0,0 0,0 0,0 0,0 0,0 1,0 0,0 0,0 1,0 0,0 0,1 0,1 0,1 0,1 0,1 -1,1 -1,1 -1,1 -1,0 -1,0 -2,-1zm5 7c-1,0 -1,-1 -1,-2 0,0 0,-1 0,-1 0,-1 1,-1 1,-1 0,-1 0,-1 0,-1 1,0 1,0 2,-1 0,0 0,0 1,0 0,0 0,0 1,0 1,0 2,1 2,2 0,0 0,1 -1,1 0,0 0,0 0,0 0,0 -1,0 -1,0l0 0 0 0 0 0 -1 0c0,0 0,0 0,0 0,0 -1,0 -1,0 0,0 0,1 0,1 0,0 0,0 0,1 0,0 0,0 0,0 1,0 1,0 1,0 0,0 0,0 0,0l1 0 0 0c0,0 0,0 1,0 0,0 0,0 1,0 0,1 0,1 0,1 0,1 0,1 0,1 -1,0 -1,1 -1,1 -1,0 -1,0 -2,0 -1,0 -1,0 -2,-1 -1,0 -1,0 -1,-1zm11 1c0,0 -1,0 -1,-1 0,0 0,0 0,0 0,0 1,-1 1,-1 0,0 0,0 1,0 0,0 0,0 0,0l0 0 1 0c0,0 0,0 0,1l1 0 0 0c0,0 0,-1 0,-1 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0l0 0 -1 0 0 0 0 0c-1,0 -1,0 -1,-1 -1,0 -1,0 -1,0 0,0 0,0 0,-1 0,0 -1,0 -1,0 0,-1 1,-1 1,-2 0,0 1,0 1,-1 1,0 1,0 2,0 0,0 1,0 1,0 1,0 1,1 2,1 0,0 0,0 0,1 0,0 0,0 0,0 -1,0 -1,1 -1,1 0,0 0,0 0,0 -1,0 -1,0 -1,0l0 -1 -1 0 0 0c0,0 0,0 0,0 0,0 0,0 0,0l-1 0 0 0c0,0 0,0 0,0 0,1 0,1 1,1 0,0 0,0 0,0 0,0 0,0 0,0l0 0 0 0 0 0 1 0 0 0c0,0 1,0 1,1 0,0 1,0 1,0 0,1 0,1 0,1 0,1 0,2 -1,2 -1,1 -1,1 -2,1 0,0 -1,0 -1,0 -1,0 -1,0 -2,-1zm10 1c0,0 -1,0 -2,-1 0,0 -1,0 -1,-1 0,-1 -1,-1 -1,-2 0,-1 1,-1 1,-2 0,-1 1,-1 1,-1 1,-1 2,-1 2,-1 1,0 1,0 2,0 0,1 1,1 1,1 0,0 1,0 1,1 0,0 0,0 0,0 0,1 0,1 0,1 0,0 1,1 1,1 0,0 -1,1 -1,1 0,1 0,1 0,1 -1,1 -1,1 -1,1 -1,1 -2,1 -3,1zm-1 -4c0,0 0,1 1,1 0,0 0,0 0,0 0,0 1,0 1,0 0,0 0,0 1,-1 0,0 0,0 0,0 0,0 -1,0 -1,-1 0,0 0,0 -1,0 0,0 0,0 0,0 -1,1 -1,1 -1,1zm7 3c-1,0 -1,0 -1,-1l0 -8c0,0 0,0 0,0 1,-1 1,-1 1,-1 0,0 0,0 1,0 0,0 0,0 1,0 0,0 0,0 0,1 0,0 0,0 0,0l0 8c0,1 0,1 0,1 -1,1 -1,1 -1,1 -1,0 -1,0 -1,-1zm6 1c-1,0 -2,-1 -2,-1 -1,-1 -1,-2 -1,-3l0 -2c0,-1 0,-1 0,-1 0,0 1,-1 1,-1 0,0 0,0 1,0 0,0 0,0 1,1 0,0 0,0 0,1l0 2c0,1 0,1 0,1 0,0 1,0 1,0 0,0 0,0 0,0 1,0 1,0 1,-1l0 -2c0,-1 0,-1 0,-1 0,0 0,0 0,-1 1,0 1,0 1,0 0,0 1,0 1,0 0,0 0,1 0,1 1,0 1,0 1,1l0 2c0,1 0,2 -1,2 0,1 0,1 -1,1 0,1 -1,1 -1,1 -1,0 -1,0 -1,0 0,0 -1,0 -1,0zm5 -7c0,-1 1,-1 1,-1l0 0 0 0c0,-1 0,-1 1,-2 0,0 0,0 1,0 0,0 1,0 1,0 0,1 0,1 0,2l0 0 0 0c1,0 1,0 1,1 1,0 1,0 1,1 0,0 0,0 0,0 0,0 0,0 0,0 0,0 -1,0 -1,0 0,1 0,1 -1,1l0 0 0 3c0,1 0,1 0,1 0,1 -1,1 -1,1 -1,0 -1,0 -1,-1 -1,0 -1,0 -1,-1l0 -3 0 0c0,0 -1,0 -1,-1 0,0 0,0 0,0 0,-1 0,-1 0,-1zm7 7c0,0 0,0 -1,-1 0,0 0,0 0,-1l0 -4c0,-1 0,-1 0,-1 0,0 0,-1 1,-1 0,0 0,0 0,0 1,0 1,0 1,0 0,1 1,1 1,1 0,0 0,0 0,1l0 4c0,1 0,1 -1,1 0,1 0,1 -1,1zm-1 -9c0,0 0,0 0,-1 0,0 0,-1 0,-1 0,0 1,0 1,0 0,0 0,0 0,0 1,0 1,0 1,0 1,0 1,1 1,1 0,1 0,1 -1,1 0,1 0,1 -1,1 0,0 -1,0 -1,-1zm8 9c-1,0 -2,0 -2,-1 -1,0 -2,0 -2,-1 0,-1 0,-1 0,-2 0,-1 0,-1 0,-2 0,-1 1,-1 2,-1 0,-1 1,-1 2,-1 0,0 1,0 1,0 1,1 1,1 1,1 1,0 1,0 1,1 0,0 0,0 0,0 0,1 1,1 1,1 0,0 0,1 0,1 0,0 0,1 -1,1 0,1 0,1 0,1 -1,1 -1,1 -1,1 -1,1 -2,1 -2,1zm-1 -4c0,0 0,1 0,1 0,0 0,0 1,0 0,0 0,0 0,0 0,0 1,0 1,-1 0,0 0,0 0,0 0,0 0,0 0,-1 -1,0 -1,0 -1,0 -1,0 -1,0 -1,0 0,1 0,1 0,1zm6 3c0,0 -1,0 -1,-1l0 -4c0,-1 1,-1 1,-1 0,-1 0,-1 1,-1l1 1 0 0c0,0 0,0 0,0 1,-1 2,-1 2,-1 0,0 1,0 1,0 0,0 1,0 1,1 0,0 1,0 1,1 0,0 0,0 0,1l0 3c0,1 0,1 0,1 0,0 -1,1 -1,1 0,0 0,0 -1,0 0,0 0,0 -1,-1 0,0 0,0 0,-1l0 -3c0,0 0,0 0,0 0,0 -1,0 -1,0 0,0 0,0 0,0 -1,0 -1,0 -1,0l0 3c0,1 0,1 0,1 0,1 -1,1 -1,1 -1,0 -1,0 -1,-1zm8 0c0,0 0,0 0,-1 0,0 0,0 0,0 0,0 0,-1 0,-1 0,0 0,0 1,0 0,0 0,0 0,0l1 0 0 0c0,0 1,0 1,1l0 0 0 0c0,0 0,-1 0,-1 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0l0 0 0 0 -1 0 0 0c0,0 -1,0 -1,-1 0,0 -1,0 -1,0 0,0 0,0 0,-1 0,0 0,0 0,0 0,-1 0,-1 0,-2 0,0 1,0 1,-1 1,0 1,0 2,0 1,0 1,0 2,0 0,0 1,1 1,1 0,0 0,0 0,1 0,0 0,0 0,0 0,0 0,1 -1,1 0,0 0,0 0,0 0,0 0,0 -1,0l0 -1 0 0 -1 0c0,0 0,0 0,0 0,0 0,0 0,0l0 0 0 0c0,0 0,0 0,0 0,1 0,1 0,1 0,0 0,0 0,0 0,0 0,0 0,0l0 0 0 0 1 0 0 0 0 0c1,0 1,0 1,1 1,0 1,0 1,0 0,1 0,1 0,1 0,1 0,2 -1,2 0,1 -1,1 -2,1 0,0 0,0 -1,0 0,0 -1,0 -2,-1z" />



 </g>
</svg>

		</a>
		<div class="burger-button">
			<div></div>
		</div>
		<ul class="nav__menu">
			<li><a href="#Home" id="HomeScroll" class="nav__item nav__item--active"><span>Domů</span></a></li>
			<li><a href="#About" id="AboutScroll" class="nav__item"><span>O společnosti</span></a></li>
			<li><a href="#References" id="ReferencesScroll" class="nav__item"><span>Reference</span></a></li>
			<li><a href="#Contact" id="ContactScroll" class="nav__item"><span>Kontakt</span></a></li>
		</ul>
	</nav>

	<main>
		<section class="section section--about" id="About">
			<div class="container">
				<div class="flex-container flex-container--small-reverse flex-container--center">
					<div class="flex-container__box">
						<div class="big-logo-container" data-aos="fade-right">
							<img src="Resources/Images/Logos/logo_circle.svg" alt="Main logo" class="main-logo" />
						</div>
					</div>
					<div class="flex-container__box flex-container__box--with-padding">
					<h1 class="main-title">BrandDESIGN - Graphic Solutions</h1>
						<h2 class="section__title section__title--left" data-aos="fade-left" data-aos-delay="100">O společnosti</h2>
						<p class="section__desc section__desc--left" data-aos="fade-left" data-aos-delay="100">
							Společnost <strong>BrandDESING</strong> vznikla po dlouholetých zkušenostech, aby zviditelnila <b>Vaši značku</b>. Zabývá se digitální velkoformátovým tiskem, řezanou grafikou a lepením, se sídlem v Brně.
						</p>
						<p class="section__desc section__desc--left" data-aos="fade-left" data-aos-delay="100">
							Dlouhodobě spolupracujeme z firmami na výrobě grafiky pro veletrhy, výstavy a kongresy, nejen v ČR, ale i po <b>celém světě</b>. Realizujeme polepy aut, výloh a pod. Výrobou 3D log a potiskem textilu. Výrobu reklamy zajistímetot od návrhu, přes výrobu až po samotné nalepení
						</p>
					</div>
				</div>
			</div>
		</section>
		<section class="parallax-window" data-parallax="scroll" data-image-src="Resources/Images/Backgrounds/parallax-bg-1.jpg">
			<div class="parallax-window__content">
				<h3 data-aos="fade-right">Spolu najdeme vhodné řešení i pro <b>Vás</b></h3>
				<a href="#Contact" data-aos="fade-left">Chci spolupracovat</a>
			</div>
		</section>
		<section class="section section--references" id="References">
			<div class="container">
				<h2 class="section__title" data-aos="fade-up">Co nabízíme</h2>
				<div class="flex-container flex-container--center">
					<div class="flex-container__box flex-container__box--with-padding">
						<a href="printing-and-production.html" class="anim-box anim-box--print" data-aos="fade-right">
							<div class="anim-box__inner-box">
								<div>
									<h3>Tisk / Výroba</h3>
									<p>Zobrazit galerii</p>
								</div>
							</div>
							<div class="anim-box__view-ico">
								<img src="Resources/Images/Icons/view-ico.svg" alt="search-icon" />
							</div>
						</a>
					</div>
					<div class="flex-container__box flex-container__box--with-padding">
						<div>
							<h3 class="section__subtitle section__subtitle--left" data-aos="fade-left">Tisk / Výroba</h3>
							<p class="section__desc section__desc--left section__desc--mo-margin" data-aos="fade-left">
								Technologické vybavení nám umožnuje vyhovět <b>nejmodernějším trendům</b>.
								Výroba a digitální tisk samolepek, tisk z ořezem, celoplošní tisk fólií,  plakátů, bannerů a pod. Výroba 3D log a potisk textilu.
							</p>
						</div>
					</div>
				</div>
				<div class="flex-container flex-container--center flex-container--mobile-reverse">
					<div class="flex-container__box flex-container__box--with-padding">
						<div>
							<h3 class="section__subtitle section__subtitle--right" data-aos="fade-right">Výstavy</h3>
							<p class="section__desc section__desc--right section__desc--mo-margin" data-aos="fade-right">
								Poskytujeme komplexní servis od výroby veletržní grafiky až po montáž grafiky po <b>celém světe</b>.
							</p>
						</div>
					</div>
					<div class="flex-container__box flex-container__box--with-padding">
						<a href="expositions.html" class="anim-box anim-box--expo" data-aos="fade-left">
							<div class="anim-box__inner-box">
								<div>
									<h3>Výstavy</h3>
									<p>Zobrazit galerii</p>
								</div>
							</div>
							<div class="anim-box__view-ico">
								<img src="Resources/Images/Icons/view-ico.svg" alt="search-icon" />
							</div>
						</a>
					</div>
				</div>
				<div class="flex-container flex-container--center">
					<div class="flex-container__box flex-container__box--with-padding">
						<a href="sticks.html" class="anim-box anim-box--stick" data-aos="fade-right">
							<div class="anim-box__inner-box">
								<div>
									<h3>Polepy</h3>
									<p>Zobrazit galerii</p>
								</div>
							</div>
							<div class="anim-box__view-ico">
								<img src="Resources/Images/Icons/view-ico.svg" alt="search-icon" />
							</div>
						</a>
					</div>
					<div class="flex-container__box flex-container__box--with-padding">
						<div>
							<h3 class="section__subtitle section__subtitle--left" data-aos="fade-left">Polepy</h3>
							<p class="section__desc section__desc--left section__desc--mo-margin" data-aos="fade-left">
								Provádíme velkoplošné reklamní polepy, polepy áut, polepy vozidel, výloh, od grafického návrhu až po samotné nalepení. Máte zájem o polep v Brně? <b>Kontaktujte nás</b>.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="section section--partners">
			<div class="container">
				<h2 class="section__title" data-aos="fade-top">Partneři</h2>
				<div class="partners">
					<p class="partners__text" data-aos="fade-right">
						Aktivne spolupracujeme s firmou Mistry Mont s.r.o.
					</p>
					<a href="https://www.mistrymont.cz/" class="partners__logo" target="_blank" data-aos="fade-left">
						<img src="Resources/Images/Logos/mistry-mont-logo.svg" alt="Mistry Mont Logo" />
					</a>
				</div>
			</div>
		</section>
		<section class="section section--contact" id="Contact">
			<div class="flex-container flex-container--small-reverse">
				<div id="ConfMap" class="flex-container__box"></div>
				<div class="flex-container__box flex-container__box--with-padding">
					<div class="container container--no-padding">
						<h2 class="section__title section__title--left" data-aos="fade-right">Napište nám</h2>
						<div data-aos="fade-right">
							<form class="form" method="post">
								<div class="form__wrapper">
									<input type="text"
										   name="jmeno"
										   class="form__input"
										   placeholder=" "
										   required />
									<label class="form__label">Jméno *</label>
								</div>
								<div class="form__wrapper">
									<input type="text"
										   name="priezvisko"
										   class="form__input"
										   placeholder=" "
										   required />
									<label class="form__label">Příjmení *</label>
								</div>
								<div class="form__wrapper">
									<input type="email"
										   class="form__input"
										   placeholder=" "
										   name="email"
										   required />
									<label class="form__label">Email *</label>
								</div>
								<div class="form__wrapper">
									<input type="tel"
										   class="form__input"
										   placeholder=" "
										   name="cislo"
										   required
										   pattern="*." />
									<label class="form__label">Telefon</label>
								</div>
								<div class="form__wrapper">
									<textarea class="form__input form__input--textarea" name="zprava" placeholder=" " required></textarea>
									<label class="form__label">Vaše zpráva *</label>
								</div>
								<button type="submit" value="Odeslat" class="button button--submit">
									<span class="button__text">Send</span>
								</button>
									<?php
								if ($hlaska)
								echo ($hlaska);
								?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<footer class="footer">
		<div class="footer__container">
			<div class="footer__box">
				<h4 class="footer__text-item footer__text-item--title">
					Kontaktní osoba
				</h4>
				<p class="footer__text-item footer__text-item--user">
					Martin Luksaj
				</p>
				<p class="footer__text-item footer__text-item--mail">
					<a href="mailto:info@brand-design.cz?subject=Správa_z_brand-design.cz" class="footer__link">info@brand-design.cz</a>
				</p>
				<p class="footer__text-item footer__text-item--phone">
					<a href="tel:+420 777 135 686" class="footer__link">+420 777 135 686</a>
				</p>
			</div>
			<div class="footer__box footer__box--social">
				<a href="https://cs-cz.facebook.com/" target="_blank" title="Facebook">
					<img src="Resources/Images/Icons/facebook.svg" alt="Facebook" />
				</a>
				<a href="https://www.instagram.com/" target="_blank" title="Instagram">
					<img src="Resources/Images/Icons/instagram.svg" alt="Instagram" />
				</a>
			</div>
			<div class="footer__box footer__box--address">
				<h4 class="footer__text-item footer__text-item--right footer__text-item--title">
					Adresa
				</h4>
				<p class="footer__text-item footer__text-item--right">
					Veslařská 254/349
				</p>
				<p class="footer__text-item footer__text-item--right">
					637 00, Brno
				</p>
				<p class="footer__text-item footer__text-item--right">
					IČO: 3327108
				</p>
			</div>
			<div class="footer__box footer__box--full-flex">
				<p class="footer__text-item">
					<strong>
						©BrandDESIGN&nbsp;
					</strong>
					2018, Všechna práva vyhrazena
				</p>
			</div>
		</div>
	</footer>

	<script src="Resources/Scripts/Libs/jQuery/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="Resources/Scripts/Libs/Slick/slick.min.js" type="text/javascript"></script>
	<script src="Resources/Scripts/Libs/Paralax/parallax.min.js"></script>
	<script src="Resources/Scripts/Libs/aos/aos.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBV0KW_yweaQJEXvzMdNr-2uEbO_3Ba-Ls&callback=conferenceMap" async defer></script>
	<script src="Resources/Scripts/JS/Init.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('.slider').slick({
				infinite: true,
				slidesToShow: 1,
				slidesToScroll: 1,
				speed: 1000,
				autoplay: true,
				autoplaySpeed: 4000,
				dots: true,
				focusOnSelect: false,
				arrows: false,
				fade: true
			});
			AOS.init({
				startEvent: 'load',
				easing: 'ease-in-out-sine',
				disable: 'mobile'
			});
		});
	</script>

</body>
</html>