<?php
namespace App\Functions;

class Paises{

	//todos los países
	public $all=array("Afganistán","Albania","Alemania","Andorra","Angola","Antigua y Barbuda","Arabia Saudita","Argelia","Argentina","Armenia","Australia","Austria","Azerbaiyán","Bahamas","Bangladés","Barbados","Baréin","Bélgica","Belice","Benín","Bielorrusia","Birmania","Bolivia","Bosnia y Herzegovina","Botsuana","Brasil","Brunéi","Bulgaria","Burkina Faso","Burundi","Bután","Cabo Verde","Camboya","Camerún","Canadá","Catar","Chad","Chile","China","Chipre","Ciudad del Vaticano","Colombia","Comoras","Corea del Norte","Corea del Sur","Costa de Marfil","Costa Rica","Croacia","Cuba","Dinamarca","Dominica","Ecuador","Egipto","El Salvador","Emiratos Árabes Unidos","Eritrea","Eslovaquia","Eslovenia","España","Estados Unidos","Estonia","Etiopía","Filipinas","Finlandia","Fiyi","Francia","Gabón","Gambia","Georgia","Ghana","Granada","Grecia","Guatemala","Guyana","Guinea","Guinea ecuatorial","Guinea-Bisáu","Haití","Honduras","Hungría","India","Indonesia","Irak","Irán","Irlanda","Islandia","Islas Marshall","Islas Salomón","Israel","Italia","Jamaica","Japón","Jordania","Kazajistán","Kenia","Kirguistán","Kiribati","Kuwait","Laos","Lesoto","Letonia","Líbano","Liberia","Libia","Liechtenstein","Lituania","Luxemburgo","Madagascar","Malasia","Malaui","Maldivas","Malí","Malta","Marruecos","Mauricio","Mauritania","México","Micronesia","Moldavia","Mónaco","Mongolia","Montenegro","Mozambique","Namibia","Nauru","Nepal","Nicaragua","Níger","Nigeria","Noruega","Nueva Zelanda","Omán","Países Bajos","Pakistán","Palaos","Panamá","Papúa Nueva Guinea","Paraguay","Perú","Polonia","Portugal","Reino Unido","República Centroafricana","República Checa","República de Macedonia","República del Congo","República Democrática del Congo","República Dominicana","República Sudafricana","Ruanda","Rumanía","Rusia","Samoa","San Cristóbal y Nieves","San Marino","San Vicente y las Granadinas","Santa Lucía","Santo Tomé y Príncipe","Senegal","Serbia","Seychelles","Sierra Leona","Singapur","Siria","Somalia","Sri Lanka","Suazilandia","Sudán","Sudán del Sur","Suecia","Suiza","Surinam","Tailandia","Tanzania","Tayikistán","Timor Oriental","Togo","Tonga","Trinidad y Tobago","Túnez","Turkmenistán","Turquía","Tuvalu","Ucrania","Uganda","Uruguay","Uzbekistán","Vanuatu","Venezuela","Vietnam","Yemen","Yibuti","Zambia","Zimbabue");

    public $all_list = [

        0 =>['id' => '01','nombre' => 'Afganistán','icon' => 'Afganistan.png','code' => '&#x1F1E6;&#x1F1EB;','zone' => 6],
        1 =>['id' => '02','nombre' => 'Albania','icon' => 'Albania.png','code' => '&#x1F1E6;&#x1F1F1;','zone' => 1],
        2 =>['id' => '03','nombre' => 'Alemania','icon' => 'Alemania.png','code' => '&#x1F1E9;&#x1F1EA;','zone' => 1],
        3 =>['id' => '04','nombre' => 'Andorra','icon' => 'Andorra.png','code' => '&#x1F1E6;&#x1F1E9;','zone' => 1],
        4 =>['id' => '05','nombre' => 'Angola','icon' => 'Angola.png','code' => '&#x1F1E6;&#x1F1F4;','zone' => 5],
        5 =>['id' => '06','nombre' => 'Antigua y Barbuda','icon' => 'AntiguaYBarbuda.png','code' => '&#x1F1E6;&#x1F1EC;'],
        6 =>['id' => '07','nombre' => 'Arabia Saudita','icon' => 'ArabiaSaudita.png','code' => '&#x1F1F8;&#x1F1E6;','zone' => 6],
        7 =>['id' => '08','nombre' => 'Argelia','icon' => 'Argelia.png','code' => '&#x1F1E9;&#x1F1FF;','zone' => 5],
        8 =>['id' => '09','nombre' => 'Argentina','icon' => 'Argentina.png','code' => '&#x1F1E6;&#x1F1F7;','zone' => 4],
        9 =>['id' => '10','nombre' => 'Armenia','icon' => 'Armenia.png','code' => '&#x1F1E6;&#x1F1F2;','zone' => 6],

        10 =>['id' => '11','nombre' => 'Australia','icon' => 'Australia.png','code' => '&#x1F1E6;&#x1F1FA;','zone' => 7],
        11 =>['id' => '12','nombre' => 'Austria','icon' => 'Austria.png','code' => '&#x1F1E6;&#x1F1F9;','zone' => 1],
        12 =>['id' => '13','nombre' => 'Azerbaiyán','icon' => 'Azerbaiyan.png','code' => '&#x1F1E6;&#x1F1FF;','zone' => 6],
        13 =>['id' => '14','nombre' => 'Bahamas','icon' => 'Bahamas.png','code' => '&#x1F1E7;&#x1F1F8;'],
        14 =>['id' => '15','nombre' => 'Bangladés','icon' => 'Banglades.png','code' => '&#x1F1E7;&#x1F1E9;','zone' => 6],
        15 =>['id' => '16','nombre' => 'Barbados','icon' => 'Barbados.png','code' => '&#x1F1E7;&#x1F1E7;'],
        16 =>['id' => '17','nombre' => 'Baréin','icon' => 'Barein.png','code' => '&#x1F1E7;&#x1F1ED;','zone' => 6],
        17 =>['id' => '18','nombre' => 'Bélgica','icon' => 'Belgica.png','code' => '&#x1F1E7;&#x1F1EA;','zone' => 1],
        18 =>['id' => '19','nombre' => 'Belice','icon' => 'Belice.png','code' => '&#x1F1E7;&#x1F1FF;','zone' => 3],
        19 =>['id' => '20','nombre' => 'Benín','icon' => 'Benin.png','code' => '&#x1F1E7;&#x1F1EF;','zone' => 5],

        20 =>['id' => '21','nombre' => 'Bielorrusia','icon' => 'Bielorrusia.png','code' => '&#x1F1E7;&#x1F1FE;','zone' => 1],
        21 =>['id' => '22','nombre' => 'Birmania','icon' => 'Birmania.png','code' => '&#x1F1F2;&#x1F1F2;','zone' => 6],
        22 =>['id' => '23','nombre' => 'Bolivia','icon' => 'Bolivia.png','code' => '&#x1F1E7;&#x1F1F4;','zone' => 4],
        23 =>['id' => '24','nombre' => 'Bosnia y Herzegovina','icon' => 'BosniaYHerzegovina.png','code' => '&#x1F1E7;&#x1F1E6;','zone' => 1],
        24 =>['id' => '25','nombre' => 'Botsuana','icon' => 'Botsuana.png','code' => '&#x1F1E7;&#x1F1FC;','zone' => 5],
        25 =>['id' => '26','nombre' => 'Brasil','icon' => 'Brasil.png','code' => '&#x1F1E7;&#x1F1F7;','zone' => 4],
        26 =>['id' => '27','nombre' => 'Brunéi','icon' => 'Brunei.png','code' => '&#x1F1E7;&#x1F1F3;','zone' => 6],
        27 =>['id' => '28','nombre' => 'Bulgaria','icon' => 'Bulgaria.png','code' => '&#x1F1E7;&#x1F1EC;','zone' => 1],
        28 =>['id' => '29','nombre' => 'Burkina Faso','icon' => 'BurkinaFaso.png','code' => '&#x1F1E7;&#x1F1EB;','zone' => 5],
        29 =>['id' => '30','nombre' => 'Burundi','icon' => 'Burundi.png','code' => '&#x1F1E7;&#x1F1EE;','zone' => 5],
        
        30 =>['id' => '31','nombre' => 'Bután','icon' => 'Butan.png','code' => '&#x1F1E7;&#x1F1F9;','zone' => 6],
        31 =>['id' => '32','nombre' => 'Cabo Verde','icon' => 'CaboVerde.png','code' => '&#x1F1E8;&#x1F1FB;','zone' => 5],
        32 =>['id' => '33','nombre' => 'Camboya','icon' => 'Camboya.png','code' => '&#x1F1F0;&#x1F1ED;','zone' => 6],
        33 =>['id' => '34','nombre' => 'Camerún','icon' => 'Camerun.png','code' => '&#x1F1E8;&#x1F1F2;','zone' => 5],
        34 =>['id' => '35','nombre' => 'Canadá','icon' => 'Canada.png','code' => '&#x1F1E8;&#x1F1E6;','zone' => 2],
        35 =>['id' => '36','nombre' => 'Catar','icon' => 'Catar.png','code' => '&#x1F1F6;&#x1F1E6;','zone' => 6],
        36 =>['id' => '37','nombre' => 'Chad','icon' => 'Chad.png','code' => '&#x1F1F9;&#x1F1E9;','zone' => 5],
        37 =>['id' => '38','nombre' => 'Chile','icon' => 'Chile.png','code' => '&#x1F1E8;&#x1F1F1;','zone' => 4],
        38 =>['id' => '39','nombre' => 'China','icon' => 'China.png','code' => '&#x1F1E8;&#x1F1F3;','zone' => 6],
        39 =>['id' => '40','nombre' => 'Chipre','icon' => 'Chipre.png','code' => '&#x1F1E8;&#x1F1FE;','zone' => 6],

        40 =>['id' => '41','nombre' => 'Colombia','icon' => 'Colombia.png','code' => '&#x1F1E8;&#x1F1F4;','zone' => 4],
        41 =>['id' => '42','nombre' => 'Comoras','icon' => 'Comoras.png','code' => '&#x1F1F0;&#x1F1F2;','zone' => 5],
        42 =>['id' => '43','nombre' => 'Corea del Norte','icon' => 'CoreaDelNorte.png','code' => '&#x1F1F0;&#x1F1F5;','zone' => 6],
        43 =>['id' => '44','nombre' => 'Corea del Sur','icon' => 'CoreaDelSur.png','code' => '&#x1F1F0;&#x1F1F7;','zone' => 6],
        44 =>['id' => '45','nombre' => 'Costa de Marfil','icon' => 'CostaDeMarfil.png','code' => '&#x1F1E8;&#x1F1EE;','zone' => 5],
        45 =>['id' => '46','nombre' => 'Costa Rica','icon' => 'CostaRica.png','code' => '&#x1F1E8;&#x1F1F7;','zone' => 3],
        46 =>['id' => '47','nombre' => 'Croacia','icon' => 'Croacia.png','code' => '&#x1F1ED;&#x1F1F7;','zone' => 1],
        47 =>['id' => '48','nombre' => 'Cuba','icon' => 'Cuba.png','code' => '&#x1F1E8;&#x1F1FA;'],
        48 =>['id' => '49','nombre' => 'Dinamarca','icon' => 'Dinamarca.png','code' => '&#x1F1E9;&#x1F1F0;','zone' => 1],
        49 =>['id' => '50','nombre' => 'Dominica','icon' => 'Dominica.png','code' => '&#x1F1E9;&#x1F1F2;'],

        50 =>['id' => '51','nombre' => 'Ecuador','icon' => 'Ecuador.png','code' => '&#x1F1EA;&#x1F1E8;','zone' => 4],
        51 =>['id' => '52','nombre' => 'Egipto','icon' => 'Egipto.png','code' => '&#x1F1EA;&#x1F1EC;','zone' => 5],
        52 =>['id' => '53','nombre' => 'El Salvador','icon' => 'ElSalvador.png','code' => '&#x1F1F8;&#x1F1FB;','zone' => 3],
        53 =>['id' => '54','nombre' => 'Emiratos Árabes Unidos','icon' => 'EmiratosArabesUnidos.png','code' => '&#x1F1E6;&#x1F1EA;','zone' => 6],
        54 =>['id' => '55','nombre' => 'Eritrea','icon' => 'Eritrea.png','code' => '&#x1F1EA;&#x1F1F7;','zone' => 5],
        55 =>['id' => '56','nombre' => 'Eslovaquia','icon' => 'Eslovaquia.png','code' => '&#x1F1F8;&#x1F1F0;','zone' => 1],
        56 =>['id' => '57','nombre' => 'Eslovenia','icon' => 'Eslovenia.png','code' => '&#x1F1F8;&#x1F1EE;','zone' => 1],
        57 =>['id' => '58','nombre' => 'España','icon' => 'Espana.png','code' => '&#x1F1EA;&#x1F1F8;','zone' => 1],
        58 =>['id' => '59','nombre' => 'Estados Unidos','icon' => 'EstadosUnidos.png','code' => '&#x1F1FA;&#x1F1F8;','zone' => 2],
        59 =>['id' => '60','nombre' => 'Estonia','icon' => 'Estonia.png','code' => '&#x1F1EA;&#x1F1EA;','zone' => 1],

        60 =>['id' => '61','nombre' => 'Etiopía','icon' => 'Etiopía.png','code' => '&#x1F1EA;&#x1F1F9;','zone' => 5],
        61 =>['id' => '62','nombre' => 'Filipinas','icon' => 'Filipinas.png','code' => '&#x1F1F5;&#x1F1ED;','zone' => 6],
        62 =>['id' => '63','nombre' => 'Finlandia','icon' => 'Finlandia.png','code' => '&#x1F1EB;&#x1F1EE;','zone' => 1],
        63 =>['id' => '64','nombre' => 'Fiyi','icon' => 'Fiyi.png','code' => '&#x1F1EB;&#x1F1EF;','zone' => 7],
        64 =>['id' => '65','nombre' => 'Francia','icon' => 'Francia.png','code' => '&#x1F1EB;&#x1F1F7; ','zone' => 1],
        65 =>['id' => '66','nombre' => 'Gabón','icon' => 'Gabon.png','code' => '&#x1F1EC;&#x1F1E6;','zone' => 5],
        66 =>['id' => '67','nombre' => 'Gambia','icon' => 'Gambia.png','code' => '&#x1F1EC;&#x1F1F2;','zone' => 5],
        67 =>['id' => '68','nombre' => 'Georgia','icon' => 'Georgia.png','code' => '&#x1F1EC;&#x1F1EA;','zone' => 6],
        68 =>['id' => '69','nombre' => 'Ghana','icon' => 'Ghana.png','code' => '&#x1F1EC;&#x1F1ED;','zone' => 5],
        69 =>['id' => '70','nombre' => 'Granada','icon' => 'Granada.png','code' => '&#x1F1EC;&#x1F1E9; '],

        70 =>['id' => '71','nombre' => 'Grecia','icon' => 'Grecia.png','code' => '&#x1F1EC;&#x1F1F7;','zone' => 1],
        71 =>['id' => '72','nombre' => 'Guatemala','icon' => 'Guatemala.png','code' => '&#x1F1EC;&#x1F1F9;','zone' => 3],        
        72 =>['id' => '74','nombre' => 'Guinea','icon' => 'Guinea.png','code' => '&#x1F1EC;&#x1F1F3;','zone' => 5],
        73 =>['id' => '76','nombre' => 'Guinea Bisáu','icon' => 'GuineaBisau.png','code' => '&#x1F1EC;&#x1F1FC;','zone' => 5],
        74 =>['id' => '75','nombre' => 'Guinea Ecuatorial','icon' => 'GuineaEcuatorial.png','code' => '&#x1F1EC;&#x1F1F6;','zone' => 5],
        75 =>['id' => '73','nombre' => 'Guyana','icon' => 'Guyana.png','code' => '&#x1F1EC;&#x1F1FE;','zone' => 4],
        76 =>['id' => '77','nombre' => 'Haití','icon' => 'Haiti.png','code' => '&#x1F1ED;&#x1F1F9; '],
        77 =>['id' => '78','nombre' => 'Honduras','icon' => 'Honduras.png','code' => '&#x1F1ED;&#x1F1F3;','zone' => 3],
        78 =>['id' => '79','nombre' => 'Hungría','icon' => 'Hungria.png','code' => '&#x1F1ED;&#x1F1FA;','zone' => 1],
        79 =>['id' => '80','nombre' => 'India','icon' => 'India.png','code' => '&#x1F1EE;&#x1F1F3;','zone' => 6],

        80 =>['id' => '81','nombre' => 'Indonesia','icon' => 'Indonesia.png','code' => '&#x1F1EE;&#x1F1E9;','zone' => 6],
        81 =>['id' => '82','nombre' => 'Irak','icon' => 'Irak.png','code' => '&#x1F1EE;&#x1F1F6;','zone' => 6],
        82 =>['id' => '83','nombre' => 'Irán','icon' => 'Iran.png','code' => '&#x1F1EE;&#x1F1F7;','zone' => 6],
        83 =>['id' => '84','nombre' => 'Irlanda','icon' => 'Irlanda.png','code' => '&#x1F1EE;&#x1F1EA;','zone' => 1],
        84 =>['id' => '85','nombre' => 'Islandia','icon' => 'Islandia.png','code' => '&#x1F1EE;&#x1F1F8;','zone' => 1],
        85 =>['id' => '86','nombre' => 'Islas Marshall','icon' => 'IslasMarshall.png','code' => '&#x1F1F2;&#x1F1ED;','zone' => 7],
        86 =>['id' => '87','nombre' => 'Islas Salomón','icon' => 'IslasSalomon.png','code' => '&#x1F1F8;&#x1F1E7;','zone' => 7],
        87 =>['id' => '88','nombre' => 'Israel','icon' => 'Israel.png','code' => '&#x1F1EE;&#x1F1F1;','zone' => 6],
        88 =>['id' => '89','nombre' => 'Italia','icon' => 'Italia.png','code' => '&#x1F1EE;&#x1F1F9;','zone' => 1],
        89 =>['id' => '90','nombre' => 'Jamaica','icon' => 'Jamaica.png','code' => '&#x1F1EF;&#x1F1F2;'],

        90 =>['id' => '91','nombre' => 'Japón','icon' => 'Japon.png','code' => '&#x1F1EF;&#x1F1F5;','zone' => 6],
        91 =>['id' => '92','nombre' => 'Jordania','icon' => 'Jordania.png','code' => '&#x1F1EF;&#x1F1F4;','zone' => 6],
        92 =>['id' => '93','nombre' => 'Kazajistán','icon' => 'Kazajistan.png','code' => '&#x1F1F0;&#x1F1FF;','zone' => 6],
        93 =>['id' => '94','nombre' => 'Kenia','icon' => 'Kenia.png','code' => '&#x1F1F0;&#x1F1EA;','zone' => 5],
        94 =>['id' => '95','nombre' => 'Kirguistán','icon' => 'Kirguistan.png','code' => '&#x1F1F0;&#x1F1EC;','zone' => 6],
        95 =>['id' => '96','nombre' => 'Kiribati','icon' => 'Kiribati.png','code' => '&#x1F1F0;&#x1F1EE;','zone' => 7],
        96 =>['id' => '97','nombre' => 'Kuwait','icon' => 'Kuwait.png','code' => '&#x1F1F0;&#x1F1FC;','zone' => 6],
        97 =>['id' => '98','nombre' => 'Laos','icon' => 'Laos.png','code' => '&#x1F1F1;&#x1F1E6;','zone' => 6],
        98 =>['id' => '99','nombre' => 'Lesoto','icon' => 'Lesoto.png','code' => '&#x1F1F1;&#x1F1F8;','zone' => 5],
        99 =>['id' => '100','nombre' => 'Letonia','icon' => 'Letonia.png','code' => '&#x1F1F1;&#x1F1FB;','zone' => 1],

        100 =>['id' => '101','nombre' => 'Líbano','icon' => 'Libano.png','code' => '&#x1F1F1;&#x1F1E7;','zone' => 6],
        101 =>['id' => '102','nombre' => 'Liberia','icon' => 'Liberia.png','code' => '&#x1F1F1;&#x1F1F7;','zone' => 5],
        102 =>['id' => '103','nombre' => 'Libia','icon' => 'Libia.png','code' => '&#x1F1E6;&#x1F1E8;','zone' => 5],
        103 =>['id' => '104','nombre' => 'Liechtenstein','icon' => 'Liechtenstein.png','code' => '&#x1F1F1;&#x1F1EE;','zone' => 1],
        104 =>['id' => '105','nombre' => 'Lituania','icon' => 'Lituania.png','code' => '&#x1F1F1;&#x1F1F9;','zone' => 1],
        105 =>['id' => '106','nombre' => 'Luxemburgo','icon' => 'Luxemburgo.png','code' => '&#x1F1F1;&#x1F1FA;','zone' => 1],

//macedonia
        106 =>['id' => '107','nombre' => 'Madagascar','icon' => 'Madagascar.png','code' => '&#x1F1F2;&#x1F1EC;','zone' => 5],
        107 =>['id' => '108','nombre' => 'Malasia','icon' => 'Malasia.png','code' => '&#x1F1F2;&#x1F1FE;','zone' => 6],
        108 =>['id' => '109','nombre' => 'Malaui','icon' => 'Malaui.png','code' => '&#x1F1F2;&#x1F1FC;','zone' => 5],
        109 =>['id' => '110','nombre' => 'Maldivas','icon' => 'Maldivas.png','code' => '&#x1F1F2;&#x1F1FB;','zone' => 6],

        110 =>['id' => '111','nombre' => 'Malí','icon' => 'Mali.png','code' => '&#x1F1F2;&#x1F1F1;','zone' => 5],
        111 =>['id' => '112','nombre' => 'Malta','icon' => 'Malta.png','code' => '&#x1F1F2;&#x1F1F9;','zone' => 1],
        112 =>['id' => '113','nombre' => 'Marruecos','icon' => 'Marruecos.png','code' => '&#x1F1F2;&#x1F1E6;','zone' => 5],
        113 =>['id' => '114','nombre' => 'Mauricio','icon' => 'Mauricio.png','code' => '&#x1F1F2;&#x1F1FA;','zone' => 5],
        114 =>['id' => '115','nombre' => 'Mauritania','icon' => 'Mauritania.png','code' => '&#x1F1F2;&#x1F1F7;','zone' => 5],
        115 =>['id' => '116','nombre' => 'México','icon' => 'Mexico.png','code' => '&#x1F1F2;&#x1F1FD;','zone' => 2],
        116 =>['id' => '117','nombre' => 'Micronesia','icon' => 'Micronesia.png','code' => '&#x1F1E6;&#x1F1E8;','zone' => 7],
        117 =>['id' => '118','nombre' => 'Moldavia','icon' => 'Moldavia.png','code' => '&#x1F1F2;&#x1F1E9;','zone' => 1],
        118 =>['id' => '119','nombre' => 'Mónaco','icon' => 'Monaco.png','code' => '&#x1F1F2;&#x1F1E8;','zone' => 1],
        119 =>['id' => '120','nombre' => 'Mongolia','icon' => 'Mongolia.png','code' => '&#x1F1F2;&#x1F1F3;','zone' => 6],

        120 =>['id' => '121','nombre' => 'Montenegro','icon' => 'Montenegro.png','code' => '&#x1F1F2;&#x1F1EA;','zone' => 1],
        121 =>['id' => '122','nombre' => 'Mozambique','icon' => 'Mozambique.png','code' => '&#x1F1F2;&#x1F1FF;','zone' => 5],
        122 =>['id' => '123','nombre' => 'Namibia','icon' => 'Namibia.png','code' => '&#x1F1F3;&#x1F1E6;','zone' => 5],
        123 =>['id' => '124','nombre' => 'Nauru','icon' => 'Nauru.png','code' => '&#x1F1F3;&#x1F1F7;','zone' => 7],
        124 =>['id' => '125','nombre' => 'Nepal','icon' => 'Nepal.png','code' => '&#x1F1F3;&#x1F1F5;','zone' => 6],
        125 =>['id' => '126','nombre' => 'Nicaragua','icon' => 'Nicaragua.png','code' => '&#x1F1F3;&#x1F1EE;','zone' => 3],
        126 =>['id' => '127','nombre' => 'Níger','icon' => 'Niger.png','code' => '&#x1F1F3;&#x1F1EA;','zone' => 5],
        127 =>['id' => '128','nombre' => 'Nigeria','icon' => 'Nigeria.png','code' => '&#x1F1F3;&#x1F1EC;','zone' => 5],
        128 =>['id' => '129','nombre' => 'Noruega','icon' => 'Noruega.png','code' => '&#x1F1F3;&#x1F1F4;','zone' => 1],
        129 =>['id' => '130','nombre' => 'Nueva Zelanda','icon' => 'NuevaZelanda.png','code' => '&#x1F1F3;&#x1F1FF;','zone' => 7],

        130 =>['id' => '131','nombre' => 'Omán','icon' => 'Oman.png','code' => '&#x1F1F4;&#x1F1F2;','zone' => 6],
        131 =>['id' => '132','nombre' => 'Países Bajos','icon' => 'PaísesBajos.png','code' => '&#x1F1F3;&#x1F1F1;','zone' => 1],
        132 =>['id' => '133','nombre' => 'Pakistán','icon' => 'Pakistan.png','code' => '&#x1F1F5;&#x1F1F0;','zone' => 6],
        133 =>['id' => '134','nombre' => 'Palaos','icon' => 'Palaos.png','code' => '&#x1F1F5;&#x1F1FC;','zone' => 7],

//Palestina
        134 =>['id' => '135','nombre' => 'Panamá','icon' => 'Panama.png','code' => '&#x1F1F5;&#x1F1E6;','zone' => 3],
        135 =>['id' => '136','nombre' => 'Papúa Nueva Guinea','icon' => 'PapuaNuevaGuinea.png','code' => '&#x1F1F5;&#x1F1EC;','zone' => 7],
        136 =>['id' => '137','nombre' => 'Paraguay','icon' => 'Paraguay.png','code' => '&#x1F1F5;&#x1F1FE;','zone' => 4],
        137 =>['id' => '138','nombre' => 'Perú','icon' => 'Peru.png','code' => '&#x1F1F5;&#x1F1EA;','zone' => 4],
        138 =>['id' => '139','nombre' => 'Polonia','icon' => 'Polonia.png','code' => '&#x1F1F5;&#x1F1F1;','zone' => 1],
        139 =>['id' => '140','nombre' => 'Portugal','icon' => 'Portugal.png','code' => '&#x1F1F5;&#x1F1F9;','zone' => 1],

        140 =>['id' => '141','nombre' => 'Reino Unido','icon' => 'ReinoUnido.png','code' => '&#x1F1EC;&#x1F1E7;','zone' => 1],
        141 =>['id' => '142','nombre' => 'República Centroafricana','icon' => 'RepublicaCentroafricana.png','code' => '&#x1F1E8;&#x1F1EB;','zone' => 5],
        142 =>['id' => '143','nombre' => 'República Checa','icon' => 'RepúblicaCheca.png','code' => '&#x1F1E8;&#x1F1FF;','zone' => 1],
        143 =>['id' => '144','nombre' => 'República de Macedonia','icon' => 'RepublicaDeMacedonia.png','code' => '&#x1F1F2;&#x1F1F0;','zone' => 1],
        144 =>['id' => '145','nombre' => 'República del Congo','icon' => 'RepublicaDelCongo.png','code' => '&#x1F1E8;&#x1F1EC;','zone' => 5],
        145 =>['id' => '146','nombre' => 'República Democrática del Congo','icon' => 'RepublicaDemocraticaDelCongo.png','code' => '&#x1F1E8;&#x1F1E9;','zone' => 5],
        146 =>['id' => '147','nombre' => 'República Dominicana','icon' => 'RepúblicaDominicana.png','code' => '&#x1F1E9;&#x1F1F4;'],
        147 =>['id' => '148','nombre' => 'República Sudafricana','icon' => 'RepublicaSudafricana.png','code' => '&#x1F1FF;&#x1F1E6;','zone' => 5],
        148 =>['id' => '149','nombre' => 'Ruanda','icon' => 'Ruanda.png','code' => '&#x1F1F7;&#x1F1FC;','zone' => 5],
        149 =>['id' => '150','nombre' => 'Rumanía','icon' => 'Rumania.png','code' => '&#x1F1F7;&#x1F1F4;','zone' => 1],

        150 =>['id' => '151','nombre' => 'Rusia','icon' => 'Rusia.png','code' => '&#x1F1F7;&#x1F1FA;','zone' => 1],
        151 =>['id' => '152','nombre' => 'Samoa','icon' => 'Samoa.png','code' => '&#x1F1FC;&#x1F1F8;','zone' => 7],
        152 =>['id' => '153','nombre' => 'San Cristóbal y Nieves','icon' => 'SanCristobalYNieves.png','code' => '&#x1F1F0;&#x1F1F3;'],
        153 =>['id' => '154','nombre' => 'San Marino','icon' => 'SanMarino.png','code' => '&#x1F1F8;&#x1F1F2;','zone' => 1],
        154 =>['id' => '155','nombre' => 'San Vicente y las Granadinas','icon' => 'SanVicenteYLasGranadinas.png','code' => '&#x1F1FB;&#x1F1E8;'],
        155 =>['id' => '156','nombre' => 'Santa Lucía','icon' => 'SantaLucia.png','code' => '&#x1F1F1;&#x1F1E8;'],
        156 =>['id' => '157','nombre' => 'Santo Tomé y Príncipe','icon' => 'SantoTomeYPrincipe.png','code' => '&#x1F1F8;&#x1F1F9;','zone' => 5],
        157 =>['id' => '158','nombre' => 'Senegal','icon' => 'Senegal.png','code' => '&#x1F1F8;&#x1F1F3;','zone' => 5],
        158 =>['id' => '159','nombre' => 'Serbia','icon' => 'Serbia.png','code' => '&#x1F1F7;&#x1F1F8;','zone' => 1],
        159 =>['id' => '160','nombre' => 'Seychelles','icon' => 'Seychelles.png','code' => '&#x1F1F8;&#x1F1E8;','zone' => 5],

        160 =>['id' => '161','nombre' => 'Sierra Leona','icon' => 'SierraLeona.png','code' => '&#x1F1F8;&#x1F1F1;','zone' => 5],
        162 =>['id' => '163','nombre' => 'Singapur','icon' => 'Singapur.png','code' => '&#x1F1F8;&#x1F1EC;','zone' => 6],
        163 =>['id' => '164','nombre' => 'Siria','icon' => 'Siria.png','code' => '&#x1F1F8;&#x1F1FE;','zone' => 6],
        164 =>['id' => '165','nombre' => 'Somalia','icon' => 'Somalia.png','code' => '&#x1F1F8;&#x1F1F4;','zone' => 5],
        165 =>['id' => '166','nombre' => 'Sri Lanka','icon' => 'SriLanka.png','code' => '&#x1F1F1;&#x1F1F0;','zone' => 6],
        166 =>['id' => '167','nombre' => 'Suazilandia','icon' => 'Suazilandia.png','code' => '&#x1F1F8;&#x1F1FF;','zone' => 5],
        167 =>['id' => '168','nombre' => 'Sudán','icon' => 'Sudan.png','code' => '&#x1F1F8;&#x1F1E9;','zone' => 5],
        168 =>['id' => '169','nombre' => 'Sudán del Sur','icon' => 'SudanDelSur.png','code' => '&#x1F1F8;&#x1F1F8;','zone' => 5],
        169 =>['id' => '170','nombre' => 'Suecia','icon' => 'Suecia.png','code' => '&#x1F1F8;&#x1F1EA;','zone' => 1],
        170 =>['id' => '171','nombre' => 'Suiza','icon' => 'Suiza.png','code' => '&#x1F1E8;&#x1F1ED;','zone' => 1],

        171 =>['id' => '172','nombre' => 'Surinam','icon' => 'Surinam.png','code' => '&#x1F1F8;&#x1F1F7;','zone' => 4],
        172 =>['id' => '173','nombre' => 'Tailandia','icon' => 'Tailandia.png','code' => '&#x1F1F9;&#x1F1ED;','zone' => 6],
//Taiwán
        173 =>['id' => '174','nombre' => 'Tanzania','icon' => 'Tanzania.png','code' => '&#x1F1F9;&#x1F1FF;','zone' => 5],
        174 =>['id' => '175','nombre' => 'Tayikistán','icon' => 'Tayikistán.png','code' => '&#x1F1F9;&#x1F1EF;','zone' => 6],
        175 =>['id' => '176','nombre' => 'Timor Oriental','icon' => 'TimorOriental.png','code' => '&#x1F1F9;&#x1F1F1;','zone' => 6],
        176 =>['id' => '177','nombre' => 'Togo','icon' => 'Togo.png','code' => '&#x1F1F9;&#x1F1EC;','zone' => 5],
        177 =>['id' => '178','nombre' => 'Tonga','icon' => 'Tonga.png','code' => '&#x1F1F9;&#x1F1F4;','zone' => 7],
        178 =>['id' => '179','nombre' => 'Trinidad y Tobago','icon' => 'TrinidadYTobago.png','code' => '&#x1F1F9;&#x1F1F9;'],
        179 =>['id' => '180','nombre' => 'Túnez','icon' => 'Tunez.png','code' => '&#x1F1F9;&#x1F1F3;','zone' => 5],
        180 =>['id' => '181','nombre' => 'Turkmenistán','icon' => 'Turkmenistán.png','code' => '&#x1F1F9;&#x1F1F2;','zone' => 6],

        181 =>['id' => '182','nombre' => 'Turquía','icon' => 'Turquia.png','code' => '&#x1F1F9;&#x1F1F7;','zone' => 6],
        182 =>['id' => '183','nombre' => 'Tuvalu','icon' => 'Tuvalu.png','code' => '&#x1F1F9;&#x1F1FB;','zone' => 7],
        183 =>['id' => '184','nombre' => 'Ucrania','icon' => 'Ucrania.png','code' => '&#x1F1FA;&#x1F1E6;','zone' => 1],
        184 =>['id' => '185','nombre' => 'Uganda','icon' => 'Uganda.png','code' => '&#x1F1FA;&#x1F1EC;','zone' => 5],
        185 =>['id' => '186','nombre' => 'Uruguay','icon' => 'Uruguay.png','code' => '&#x1F1FA;&#x1F1FE;','zone' => 4],
        186 =>['id' => '187','nombre' => 'Uzbekistán','icon' => 'Uzbekistan.png','code' => '&#x1F1FA;&#x1F1FF;','zone' => 6],
        187 =>['id' => '188','nombre' => 'Vanuatu','icon' => 'Vanuatu.png','code' => '&#x1F1FB;&#x1F1FA;','zone' => 7],
        188 =>['id' => '189','nombre' => 'Venezuela','icon' => 'Venezuela.png','code' => '&#x1F1FB;&#x1F1EA;','zone' => 4],
        189 =>['id' => '190','nombre' => 'Vietnam','icon' => 'Vietnam.png','code' => '&#x1F1FB;&#x1F1F3;','zone' => 6],
        190 =>['id' => '191','nombre' => 'Yemen','icon' => 'Yemen.png','code' => '&#x1F1FE;&#x1F1EA;','zone' => 6],

        191 =>['id' => '192','nombre' => 'Yibuti','icon' => 'Yibuti.png','code' => '&#x1F1E9;&#x1F1EF;','zone' => 5],
        192 =>['id' => '193','nombre' => 'Zambia','icon' => 'Zambia.png','code' => '&#x1F1FF;&#x1F1F2;','zone' => 5],
        193 =>['id' => '194','nombre' => 'Zimbabue','icon' => 'Zimbabue.png','code' => '&#x1F1FF;&#x1F1FC;','zone' => 5],
    ];
		//países de la UE
	public $ue=["Alemania","Austria","Bélgica","Bulgaria","Chipre","Croacia","Dinamarca","Eslovaquia","Eslovenia","España","Estonia","Finlandia","Francia","Grecia","Hungría","Irlanda","Italia","Letonia","Lituania","Luxemburgo","Malta","Paises Bajos","Polonia","Portugal","Reino Unido","Repúblic Checa","Rumanía","Suecia"];

		//provincias españolas menos Ceuta y Melilla(no son provincias
		// pero si ciudades autónomas)
	public $provincias=array("Álava", "Albacete", "Alicante", "Almería", "Asturias", "Ávila", "Badajoz", "Barcelona", "Burgos", "Cáceres", "Cádiz", "Cantabria", "Castellón", "Ciudad Real", "Córdoba", "Cuenca", "Gerona", "Granada", "Guadalajara", "Guipúzcoa", "Huelva", "Huesca", "Islas Baleares", "Jaén", "La Coruña", "La Rioja", "Las Palmas", "León", "Lérida", "Lugo", "Madrid", "Málaga", "Murcia", "Navarra", "Orense", "Palencia", "Pontevedra", "Salamanca", "Santa Cruz de Tenerife", "Segovia", "Sevilla", "Soria", "Tarragona", "Teruel", "Toledo", "Valencia", "Valladolid", "Vizcaya", "Zamora", "Zaragoza");

		//Array principal
    /*
    $andalucia = array(
        //Arrays de cada provincia con sus tres pueblos
        "Almería" => array ("Roquetas de Mar","Mojácar","Cabo de Gata"),
        "Granada" => array ("Almuñécar","La Zubia","Salobreña"),
        "Jaén" => array ("Úbeda","Baeza","Linares"),
        "Córdoba" => array ("Pozoblanco","Lucena","Fernán-Núñez"),
        "Sevilla" => array ("Osuna","La Roda de Andalucía","Mairena del Aljarafe"),
        "Málaga" => array ("Torremolinos","Vélez-Málaga","Marbella"),
        "Huelva" => array ("Río Tinto","Lepe","Isla Cristina"),
        "Cádiz" => array ("El Puerto de Santa María","Chiclana de la Frontera","Algeciras"),
        );
    */
    //Como es bidimensional, necesitamos dos foreach para mostrar
    /*foreach ($andalucia as $comunidad => $provincia) {
        foreach ($provincia as $capital => $pueblo) {
            echo "El municipio de ".$pueblo." pertenece a la provincia de ".$comunidad."<br>";
        }
    }*/
}

?>