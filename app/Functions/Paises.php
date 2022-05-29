<?php
namespace App\Functions;

class Paises{

	//todos los países
	public $all=array("Afganistán","Albania","Alemania","Andorra","Angola","Antigua y Barbuda","Arabia Saudita","Argelia","Argentina","Armenia","Australia","Austria","Azerbaiyán","Bahamas","Bangladés","Barbados","Baréin","Bélgica","Belice","Benín","Bielorrusia","Birmania","Bolivia","Bosnia y Herzegovina","Botsuana","Brasil","Brunéi","Bulgaria","Burkina Faso","Burundi","Bután","Cabo Verde","Camboya","Camerún","Canadá","Catar","Chad","Chile","China","Chipre","Ciudad del Vaticano","Colombia","Comoras","Corea del Norte","Corea del Sur","Costa de Marfil","Costa Rica","Croacia","Cuba","Dinamarca","Dominica","Ecuador","Egipto","El Salvador","Emiratos Árabes Unidos","Eritrea","Eslovaquia","Eslovenia","España","Estados Unidos","Estonia","Etiopía","Filipinas","Finlandia","Fiyi","Francia","Gabón","Gambia","Georgia","Ghana","Granada","Grecia","Guatemala","Guyana","Guinea","Guinea ecuatorial","Guinea-Bisáu","Haití","Honduras","Hungría","India","Indonesia","Irak","Irán","Irlanda","Islandia","Islas Marshall","Islas Salomón","Israel","Italia","Jamaica","Japón","Jordania","Kazajistán","Kenia","Kirguistán","Kiribati","Kuwait","Laos","Lesoto","Letonia","Líbano","Liberia","Libia","Liechtenstein","Lituania","Luxemburgo","Madagascar","Malasia","Malaui","Maldivas","Malí","Malta","Marruecos","Mauricio","Mauritania","México","Micronesia","Moldavia","Mónaco","Mongolia","Montenegro","Mozambique","Namibia","Nauru","Nepal","Nicaragua","Níger","Nigeria","Noruega","Nueva Zelanda","Omán","Países Bajos","Pakistán","Palaos","Panamá","Papúa Nueva Guinea","Paraguay","Perú","Polonia","Portugal","Reino Unido","República Centroafricana","República Checa","República de Macedonia","República del Congo","República Democrática del Congo","República Dominicana","República Sudafricana","Ruanda","Rumanía","Rusia","Samoa","San Cristóbal y Nieves","San Marino","San Vicente y las Granadinas","Santa Lucía","Santo Tomé y Príncipe","Senegal","Serbia","Seychelles","Sierra Leona","Singapur","Siria","Somalia","Sri Lanka","Suazilandia","Sudán","Sudán del Sur","Suecia","Suiza","Surinam","Tailandia","Tanzania","Tayikistán","Timor Oriental","Togo","Tonga","Trinidad y Tobago","Túnez","Turkmenistán","Turquía","Tuvalu","Ucrania","Uganda","Uruguay","Uzbekistán","Vanuatu","Venezuela","Vietnam","Yemen","Yibuti","Zambia","Zimbabue");

    //zone: 1=Europa,  2=NorteAmérica, 3=CentroAmérica, 4=SudAmérica, 5=África, 6=Asia, 7=Oceanía
    public $all_list = [

        0 => ['id' => '01','nombre' => 'Afganistán','icon' => 'Afganistan.png','icon_code' => '&#x1F1E6;&#x1F1EB;','zone' => 6,'isocode_alfa2' => 'AF'],
        1 =>['id' => '02','nombre' => 'Albania','icon' => 'Albania.png','icon_code' => '&#x1F1E6;&#x1F1F1;','zone' => 1,'isocode_alfa2' => 'AL'],
        2 =>['id' => '03','nombre' => 'Alemania','icon' => 'Alemania.png','icon_code' => '&#x1F1E9;&#x1F1EA;','zone' => 1,'isocode_alfa2' => 'DE'],
        3 =>['id' => '04','nombre' => 'Andorra','icon' => 'Andorra.png','icon_code' => '&#x1F1E6;&#x1F1E9;','zone' => 1,'isocode_alfa2' => 'AD'],
        4 =>['id' => '05','nombre' => 'Angola','icon' => 'Angola.png','icon_code' => '&#x1F1E6;&#x1F1F4;','zone' => 5,'isocode_alfa2' => 'AO'],
        5 =>['id' => '06','nombre' => 'Antigua y Barbuda','icon' => 'AntiguaYBarbuda.png','icon_code' => '&#x1F1E6;&#x1F1EC;','zone' => 8,'isocode_alfa2' => 'AG'],
        6 =>['id' => '07','nombre' => 'Arabia Saudita','icon' => 'ArabiaSaudita.png','icon_code' => '&#x1F1F8;&#x1F1E6;','zone' => 6,'isocode_alfa2' => 'SA'],
        7 =>['id' => '08','nombre' => 'Argelia','icon' => 'Argelia.png','icon_code' => '&#x1F1E9;&#x1F1FF;','zone' => 5,'isocode_alfa2' => 'DZ'],
        8 =>['id' => '09','nombre' => 'Argentina','icon' => 'Argentina.png','icon_code' => '&#x1F1E6;&#x1F1F7;','zone' => 4,'isocode_alfa2' => 'AR'],
        9 =>['id' => '10','nombre' => 'Armenia','icon' => 'Armenia.png','icon_code' => '&#x1F1E6;&#x1F1F2;','zone' => 6,'isocode_alfa2' => 'AM'],

        10 =>['id' => '11','nombre' => 'Australia','icon' => 'Australia.png','icon_code' => '&#x1F1E6;&#x1F1FA;','zone' => 7,'isocode_alfa2' => 'AU'],
        11 =>['id' => '12','nombre' => 'Austria','icon' => 'Austria.png','icon_code' => '&#x1F1E6;&#x1F1F9;','zone' => 1,'isocode_alfa2' => 'AT'],
        12 =>['id' => '13','nombre' => 'Azerbaiyán','icon' => 'Azerbaiyan.png','icon_code' => '&#x1F1E6;&#x1F1FF;','zone' => 6,'isocode_alfa2' => 'AZ'],
        13 =>['id' => '14','nombre' => 'Bahamas','icon' => 'Bahamas.png','icon_code' => '&#x1F1E7;&#x1F1F8;','zone' => 3,'isocode_alfa2' => 'BS'],
        14 =>['id' => '15','nombre' => 'Bangladés','icon' => 'Banglades.png','icon_code' => '&#x1F1E7;&#x1F1E9;','zone' => 6,'isocode_alfa2' => 'BD'],
        15 =>['id' => '16','nombre' => 'Barbados','icon' => 'Barbados.png','icon_code' => '&#x1F1E7;&#x1F1E7;','zone' => 3,'isocode_alfa2' => 'BB','zone' => 8],
        16 =>['id' => '17','nombre' => 'Baréin','icon' => 'Barein.png','icon_code' => '&#x1F1E7;&#x1F1ED;','zone' => 6,'isocode_alfa2' => 'BH'],
        17 =>['id' => '18','nombre' => 'Bélgica','icon' => 'Belgica.png','icon_code' => '&#x1F1E7;&#x1F1EA;','zone' => 1,'isocode_alfa2' => 'BE'],
        18 =>['id' => '19','nombre' => 'Belice','icon' => 'Belice.png','icon_code' => '&#x1F1E7;&#x1F1FF;','zone' => 3,'isocode_alfa2' => 'BZ'],
        19 =>['id' => '20','nombre' => 'Benín','icon' => 'Benin.png','icon_code' => '&#x1F1E7;&#x1F1EF;','zone' => 5,'isocode_alfa2' => 'BJ'],

        20 =>['id' => '21','nombre' => 'Bielorrusia','icon' => 'Bielorrusia.png','icon_code' => '&#x1F1E7;&#x1F1FE;','zone' => 1,'isocode_alfa2' => 'BY'],
        21 =>['id' => '22','nombre' => 'Birmania','icon' => 'Birmania.png','icon_code' => '&#x1F1F2;&#x1F1F2;','zone' => 6,'isocode_alfa2' => 'MM'],
        22 =>['id' => '23','nombre' => 'Bolivia','icon' => 'Bolivia.png','icon_code' => '&#x1F1E7;&#x1F1F4;','zone' => 4,'isocode_alfa2' => 'BO'],
        23 =>['id' => '24','nombre' => 'Bosnia y Herzegovina','icon' => 'BosniaYHerzegovina.png','icon_code' => '&#x1F1E7;&#x1F1E6;','zone' => 1,'isocode_alfa2' => 'BA'],
        24 =>['id' => '25','nombre' => 'Botsuana','icon' => 'Botsuana.png','icon_code' => '&#x1F1E7;&#x1F1FC;','zone' => 5,'isocode_alfa2' => 'BW'],
        25 =>['id' => '26','nombre' => 'Brasil','icon' => 'Brasil.png','icon_code' => '&#x1F1E7;&#x1F1F7;','zone' => 4,'isocode_alfa2' => 'BR'],
        26 =>['id' => '27','nombre' => 'Brunéi','icon' => 'Brunei.png','icon_code' => '&#x1F1E7;&#x1F1F3;','zone' => 6,'isocode_alfa2' => 'BN'],
        27 =>['id' => '28','nombre' => 'Bulgaria','icon' => 'Bulgaria.png','icon_code' => '&#x1F1E7;&#x1F1EC;','zone' => 1,'isocode_alfa2' => 'BG'],
        28 =>['id' => '29','nombre' => 'Burkina Faso','icon' => 'BurkinaFaso.png','icon_code' => '&#x1F1E7;&#x1F1EB;','zone' => 5,'isocode_alfa2' => 'BF'],
        29 =>['id' => '30','nombre' => 'Burundi','icon' => 'Burundi.png','icon_code' => '&#x1F1E7;&#x1F1EE;','zone' => 5,'isocode_alfa2' => 'BI'],
        
        30 =>['id' => '31','nombre' => 'Bután','icon' => 'Butan.png','icon_code' => '&#x1F1E7;&#x1F1F9;','zone' => 6,'isocode_alfa2' => 'BT'],
        31 =>['id' => '32','nombre' => 'Cabo Verde','icon' => 'CaboVerde.png','icon_code' => '&#x1F1E8;&#x1F1FB;','zone' => 5,'isocode_alfa2' => 'CV'],
        32 =>['id' => '33','nombre' => 'Camboya','icon' => 'Camboya.png','icon_code' => '&#x1F1F0;&#x1F1ED;','zone' => 6,'isocode_alfa2' => 'KH'],
        33 =>['id' => '34','nombre' => 'Camerún','icon' => 'Camerun.png','icon_code' => '&#x1F1E8;&#x1F1F2;','zone' => 5,'isocode_alfa2' => 'CM'],
        34 =>['id' => '35','nombre' => 'Canadá','icon' => 'Canada.png','icon_code' => '&#x1F1E8;&#x1F1E6;','zone' => 2,'isocode_alfa2' => 'CA'],
        35 =>['id' => '36','nombre' => 'Catar','icon' => 'Catar.png','icon_code' => '&#x1F1F6;&#x1F1E6;','zone' => 6,'isocode_alfa2' => 'QA'],
        36 =>['id' => '37','nombre' => 'Chad','icon' => 'Chad.png','icon_code' => '&#x1F1F9;&#x1F1E9;','zone' => 5,'isocode_alfa2' => 'TD'],
        37 =>['id' => '38','nombre' => 'Chile','icon' => 'Chile.png','icon_code' => '&#x1F1E8;&#x1F1F1;','zone' => 4,'isocode_alfa2' => 'CL'],
        38 =>['id' => '39','nombre' => 'China','icon' => 'China.png','icon_code' => '&#x1F1E8;&#x1F1F3;','zone' => 6,'isocode_alfa2' => 'CN'],
        39 =>['id' => '40','nombre' => 'Chipre','icon' => 'Chipre.png','icon_code' => '&#x1F1E8;&#x1F1FE;','zone' => 6,'isocode_alfa2' => 'CY'],

        40 =>['id' => '41','nombre' => 'Colombia','icon' => 'Colombia.png','icon_code' => '&#x1F1E8;&#x1F1F4;','zone' => 4,'isocode_alfa2' => 'CO'],
        41 =>['id' => '42','nombre' => 'Comoras','icon' => 'Comoras.png','icon_code' => '&#x1F1F0;&#x1F1F2;','zone' => 5,'isocode_alfa2' => 'KM'],
        42 =>['id' => '43','nombre' => 'Corea del Norte','icon' => 'CoreaDelNorte.png','icon_code' => '&#x1F1F0;&#x1F1F5;','zone' => 6,'isocode_alfa2' => 'KP'],
        43 =>['id' => '44','nombre' => 'Corea del Sur','icon' => 'CoreaDelSur.png','icon_code' => '&#x1F1F0;&#x1F1F7;','zone' => 6,'isocode_alfa2' => 'KR'],
        44 =>['id' => '45','nombre' => 'Costa de Marfil','icon' => 'CostaDeMarfil.png','icon_code' => '&#x1F1E8;&#x1F1EE;','zone' => 5,'isocode_alfa2' => 'CI'],
        45 =>['id' => '46','nombre' => 'Costa Rica','icon' => 'CostaRica.png','icon_code' => '&#x1F1E8;&#x1F1F7;','zone' => 3,'isocode_alfa2' => 'CR'],
        46 =>['id' => '47','nombre' => 'Croacia','icon' => 'Croacia.png','icon_code' => '&#x1F1ED;&#x1F1F7;','zone' => 1,'isocode_alfa2' => 'HR'],
        47 =>['id' => '48','nombre' => 'Cuba','icon' => 'Cuba.png','icon_code' => '&#x1F1E8;&#x1F1FA;','zone' => 8,'isocode_alfa2' => 'CU'],
        48 =>['id' => '49','nombre' => 'Dinamarca','icon' => 'Dinamarca.png','icon_code' => '&#x1F1E9;&#x1F1F0;','zone' => 1,'isocode_alfa2' => 'DK'],
        49 =>['id' => '50','nombre' => 'Dominica','icon' => 'Dominica.png','icon_code' => '&#x1F1E9;&#x1F1F2;','zone' => 8,'isocode_alfa2' => 'DM'],

        50 =>['id' => '51','nombre' => 'Ecuador','icon' => 'Ecuador.png','icon_code' => '&#x1F1EA;&#x1F1E8;','zone' => 4,'isocode_alfa2' => 'EC'],
        51 =>['id' => '52','nombre' => 'Egipto','icon' => 'Egipto.png','icon_code' => '&#x1F1EA;&#x1F1EC;','zone' => 5,'isocode_alfa2' => 'EG'],
        52 =>['id' => '53','nombre' => 'El Salvador','icon' => 'ElSalvador.png','icon_code' => '&#x1F1F8;&#x1F1FB;','zone' => 3,'isocode_alfa2' => 'SV'],
        53 =>['id' => '54','nombre' => 'Emiratos Árabes Unidos','icon' => 'EmiratosArabesUnidos.png','icon_code' => '&#x1F1E6;&#x1F1EA;','zone' => 6,'isocode_alfa2' => 'AE'],
        54 =>['id' => '55','nombre' => 'Eritrea','icon' => 'Eritrea.png','icon_code' => '&#x1F1EA;&#x1F1F7;','zone' => 5,'isocode_alfa2' => 'ER'],
        55 =>['id' => '56','nombre' => 'Eslovaquia','icon' => 'Eslovaquia.png','icon_code' => '&#x1F1F8;&#x1F1F0;','zone' => 1,'isocode_alfa2' => 'SK'],
        56 =>['id' => '57','nombre' => 'Eslovenia','icon' => 'Eslovenia.png','icon_code' => '&#x1F1F8;&#x1F1EE;','zone' => 1,'isocode_alfa2' => 'SI'],
        57 =>['id' => '58','nombre' => 'España','icon' => 'Espana.png','icon_code' => '&#x1F1EA;&#x1F1F8;','zone' => 1,'isocode_alfa2' => 'ES'],
        58 =>['id' => '59','nombre' => 'Estados Unidos','icon' => 'EstadosUnidos.png','icon_code' => '&#x1F1FA;&#x1F1F8;','zone' => 2,'isocode_alfa2' => 'US'],
        59 =>['id' => '60','nombre' => 'Estonia','icon' => 'Estonia.png','icon_code' => '&#x1F1EA;&#x1F1EA;','zone' => 1,'isocode_alfa2' => 'EE'],

        60 =>['id' => '61','nombre' => 'Etiopía','icon' => 'Etiopía.png','icon_code' => '&#x1F1EA;&#x1F1F9;','zone' => 5,'isocode_alfa2' => 'ET'],
        61 =>['id' => '62','nombre' => 'Filipinas','icon' => 'Filipinas.png','icon_code' => '&#x1F1F5;&#x1F1ED;','zone' => 6,'isocode_alfa2' => 'PH'],
        62 =>['id' => '63','nombre' => 'Finlandia','icon' => 'Finlandia.png','icon_code' => '&#x1F1EB;&#x1F1EE;','zone' => 1,'isocode_alfa2' => 'FI'],
        63 =>['id' => '64','nombre' => 'Fiyi','icon' => 'Fiyi.png','icon_code' => '&#x1F1EB;&#x1F1EF;','zone' => 7,'isocode_alfa2' => 'FJ'],
        64 =>['id' => '65','nombre' => 'Francia','icon' => 'Francia.png','icon_code' => '&#x1F1EB;&#x1F1F7; ','zone' => 1,'isocode_alfa2' => 'FR'],
        65 =>['id' => '66','nombre' => 'Gabón','icon' => 'Gabon.png','icon_code' => '&#x1F1EC;&#x1F1E6;','zone' => 5,'isocode_alfa2' => 'GA'],
        66 =>['id' => '67','nombre' => 'Gambia','icon' => 'Gambia.png','icon_code' => '&#x1F1EC;&#x1F1F2;','zone' => 5,'isocode_alfa2' => 'GM'],
        67 =>['id' => '68','nombre' => 'Georgia','icon' => 'Georgia.png','icon_code' => '&#x1F1EC;&#x1F1EA;','zone' => 6,'isocode_alfa2' => 'GE'],
        68 =>['id' => '69','nombre' => 'Ghana','icon' => 'Ghana.png','icon_code' => '&#x1F1EC;&#x1F1ED;','zone' => 5,'isocode_alfa2' => 'GH'],
        69 =>['id' => '70','nombre' => 'Granada','icon' => 'Granada.png','icon_code' => '&#x1F1EC;&#x1F1E9;','zone' => 8,'isocode_alfa2' => 'GD'],

        70 =>['id' => '71','nombre' => 'Grecia','icon' => 'Grecia.png','icon_code' => '&#x1F1EC;&#x1F1F7;','zone' => 1,'isocode_alfa2' => 'GR'],
        71 =>['id' => '72','nombre' => 'Guatemala','icon' => 'Guatemala.png','icon_code' => '&#x1F1EC;&#x1F1F9;','zone' => 3,'isocode_alfa2' => 'GT'],        
        72 =>['id' => '74','nombre' => 'Guinea','icon' => 'Guinea.png','icon_code' => '&#x1F1EC;&#x1F1F3;','zone' => 5,'isocode_alfa2' => 'GN'],
        73 =>['id' => '76','nombre' => 'Guinea Bisáu','icon' => 'GuineaBisau.png','icon_code' => '&#x1F1EC;&#x1F1FC;','zone' => 5,'isocode_alfa2' => 'GW'],
        74 =>['id' => '75','nombre' => 'Guinea Ecuatorial','icon' => 'GuineaEcuatorial.png','icon_code' => '&#x1F1EC;&#x1F1F6;','zone' => 5,'isocode_alfa2' => 'GQ'],
        75 =>['id' => '73','nombre' => 'Guyana','icon' => 'Guyana.png','icon_code' => '&#x1F1EC;&#x1F1FE;','zone' => 4,'isocode_alfa2' => 'GY'],
        76 =>['id' => '77','nombre' => 'Haití','icon' => 'Haiti.png','icon_code' => '&#x1F1ED;&#x1F1F9;','zone' => 8,'isocode_alfa2' => 'HT'],
        77 =>['id' => '78','nombre' => 'Honduras','icon' => 'Honduras.png','icon_code' => '&#x1F1ED;&#x1F1F3;','zone' => 3,'isocode_alfa2' => 'HN'],
        78 =>['id' => '79','nombre' => 'Hungría','icon' => 'Hungria.png','icon_code' => '&#x1F1ED;&#x1F1FA;','zone' => 1,'isocode_alfa2' => 'HU'],
        79 =>['id' => '80','nombre' => 'India','icon' => 'India.png','icon_code' => '&#x1F1EE;&#x1F1F3;','zone' => 6,'isocode_alfa2' => 'IN'],

        80 =>['id' => '81','nombre' => 'Indonesia','icon' => 'Indonesia.png','icon_code' => '&#x1F1EE;&#x1F1E9;','zone' => 6,'isocode_alfa2' => 'ID'],
        81 =>['id' => '82','nombre' => 'Irak','icon' => 'Irak.png','icon_code' => '&#x1F1EE;&#x1F1F6;','zone' => 6,'isocode_alfa2' => 'IQ'],
        82 =>['id' => '83','nombre' => 'Irán','icon' => 'Iran.png','icon_code' => '&#x1F1EE;&#x1F1F7;','zone' => 6,'isocode_alfa2' => 'IR'],
        83 =>['id' => '84','nombre' => 'Irlanda','icon' => 'Irlanda.png','icon_code' => '&#x1F1EE;&#x1F1EA;','zone' => 1,'isocode_alfa2' => 'IE'],
        84 =>['id' => '85','nombre' => 'Islandia','icon' => 'Islandia.png','icon_code' => '&#x1F1EE;&#x1F1F8;','zone' => 1,'isocode_alfa2' => 'IS'],
        85 =>['id' => '86','nombre' => 'Islas Marshall','icon' => 'IslasMarshall.png','icon_code' => '&#x1F1F2;&#x1F1ED;','zone' => 7,'isocode_alfa2' => 'MH'],
        86 =>['id' => '87','nombre' => 'Islas Salomón','icon' => 'IslasSalomon.png','icon_code' => '&#x1F1F8;&#x1F1E7;','zone' => 7],'isocode_alfa2' => 'SB',
        87 =>['id' => '88','nombre' => 'Israel','icon' => 'Israel.png','icon_code' => '&#x1F1EE;&#x1F1F1;','zone' => 6,'isocode_alfa2' => 'IL'],
        88 =>['id' => '89','nombre' => 'Italia','icon' => 'Italia.png','icon_code' => '&#x1F1EE;&#x1F1F9;','zone' => 1,'isocode_alfa2' => 'IT'],
        89 =>['id' => '90','nombre' => 'Jamaica','icon' => 'Jamaica.png','icon_code' => '&#x1F1EF;&#x1F1F2;','zone' => 8'isocode_alfa2' => 'JM'],

        90 =>['id' => '91','nombre' => 'Japón','icon' => 'Japon.png','icon_code' => '&#x1F1EF;&#x1F1F5;','zone' => 6,'isocode_alfa2' => 'JP'],
        91 =>['id' => '92','nombre' => 'Jordania','icon' => 'Jordania.png','icon_code' => '&#x1F1EF;&#x1F1F4;','zone' => 6,'isocode_alfa2' => 'JO'],
        92 =>['id' => '93','nombre' => 'Kazajistán','icon' => 'Kazajistan.png','icon_code' => '&#x1F1F0;&#x1F1FF;','zone' => 6,'isocode_alfa2' => 'KZ'],
        93 =>['id' => '94','nombre' => 'Kenia','icon' => 'Kenia.png','icon_code' => '&#x1F1F0;&#x1F1EA;','zone' => 5,'isocode_alfa2' => 'KE'],
        94 =>['id' => '95','nombre' => 'Kirguistán','icon' => 'Kirguistan.png','icon_code' => '&#x1F1F0;&#x1F1EC;','zone' => 6,'isocode_alfa2' => 'KG'],
        95 =>['id' => '96','nombre' => 'Kiribati','icon' => 'Kiribati.png','icon_code' => '&#x1F1F0;&#x1F1EE;','zone' => 7,'isocode_alfa2' => 'KI'],
        96 =>['id' => '97','nombre' => 'Kuwait','icon' => 'Kuwait.png','icon_code' => '&#x1F1F0;&#x1F1FC;','zone' => 6,'isocode_alfa2' => 'KW'],
        97 =>['id' => '98','nombre' => 'Laos','icon' => 'Laos.png','icon_code' => '&#x1F1F1;&#x1F1E6;','zone' => 6,'isocode_alfa2' => 'LA'],
        98 =>['id' => '99','nombre' => 'Lesoto','icon' => 'Lesoto.png','icon_code' => '&#x1F1F1;&#x1F1F8;','zone' => 5,'isocode_alfa2' => 'LS'],
        99 =>['id' => '100','nombre' => 'Letonia','icon' => 'Letonia.png','icon_code' => '&#x1F1F1;&#x1F1FB;','zone' => 1,'isocode_alfa2' => 'LV'],

        100 =>['id' => '101','nombre' => 'Líbano','icon' => 'Libano.png','icon_code' => '&#x1F1F1;&#x1F1E7;','zone' => 6,'isocode_alfa2' => 'LB'],
        101 =>['id' => '102','nombre' => 'Liberia','icon' => 'Liberia.png','icon_code' => '&#x1F1F1;&#x1F1F7;','zone' => 5,'isocode_alfa2' => 'LR'],
        102 =>['id' => '103','nombre' => 'Libia','icon' => 'Libia.png','icon_code' => '&#x1F1E6;&#x1F1E8;','zone' => 5,'isocode_alfa2' => 'LY'],
        103 =>['id' => '104','nombre' => 'Liechtenstein','icon' => 'Liechtenstein.png','icon_code' => '&#x1F1F1;&#x1F1EE;','zone' => 1,'isocode_alfa2' => 'LI'],
        104 =>['id' => '105','nombre' => 'Lituania','icon' => 'Lituania.png','icon_code' => '&#x1F1F1;&#x1F1F9;','zone' => 1,'isocode_alfa2' => 'LT'],
        105 =>['id' => '106','nombre' => 'Luxemburgo','icon' => 'Luxemburgo.png','icon_code' => '&#x1F1F1;&#x1F1FA;','zone' => 1,'isocode_alfa2' => 'LU'],

//macedonia
        106 =>['id' => '107','nombre' => 'Madagascar','icon' => 'Madagascar.png','icon_code' => '&#x1F1F2;&#x1F1EC;','zone' => 5,'isocode_alfa2' => 'MG'],
        107 =>['id' => '108','nombre' => 'Malasia','icon' => 'Malasia.png','icon_code' => '&#x1F1F2;&#x1F1FE;','zone' => 6,'isocode_alfa2' => 'MH'],
        108 =>['id' => '109','nombre' => 'Malaui','icon' => 'Malaui.png','icon_code' => '&#x1F1F2;&#x1F1FC;','zone' => 5,'isocode_alfa2' => 'MW'],
        109 =>['id' => '110','nombre' => 'Maldivas','icon' => 'Maldivas.png','icon_code' => '&#x1F1F2;&#x1F1FB;','zone' => 6,'isocode_alfa2' => 'MV'],

        110 =>['id' => '111','nombre' => 'Malí','icon' => 'Mali.png','icon_code' => '&#x1F1F2;&#x1F1F1;','zone' => 5,'isocode_alfa2' => 'ML'],
        111 =>['id' => '112','nombre' => 'Malta','icon' => 'Malta.png','icon_code' => '&#x1F1F2;&#x1F1F9;','zone' => 1,'isocode_alfa2' => 'MT'],
        112 =>['id' => '113','nombre' => 'Marruecos','icon' => 'Marruecos.png','icon_code' => '&#x1F1F2;&#x1F1E6;','zone' => 5,'isocode_alfa2' => 'MA'],
        113 =>['id' => '114','nombre' => 'Mauricio','icon' => 'Mauricio.png','icon_code' => '&#x1F1F2;&#x1F1FA;','zone' => 5',isocode_alfa2' => 'MU'],
        114 =>['id' => '115','nombre' => 'Mauritania','icon' => 'Mauritania.png','icon_code' => '&#x1F1F2;&#x1F1F7;','zone' => 5,'isocode_alfa2' => 'MR'],
        115 =>['id' => '116','nombre' => 'México','icon' => 'Mexico.png','icon_code' => '&#x1F1F2;&#x1F1FD;','zone' => 2,'isocode_alfa2' => 'MX'],
        116 =>['id' => '117','nombre' => 'Micronesia','icon' => 'Micronesia.png','icon_code' => '&#x1F1E6;&#x1F1E8;','zone' => 7,'isocode_alfa2' => 'FM'],
        117 =>['id' => '118','nombre' => 'Moldavia','icon' => 'Moldavia.png','icon_code' => '&#x1F1F2;&#x1F1E9;','zone' => 1,'isocode_alfa2' => 'MD'],
        118 =>['id' => '119','nombre' => 'Mónaco','icon' => 'Monaco.png','icon_code' => '&#x1F1F2;&#x1F1E8;','zone' => 1,'isocode_alfa2' => 'MC'],
        119 =>['id' => '120','nombre' => 'Mongolia','icon' => 'Mongolia.png','icon_code' => '&#x1F1F2;&#x1F1F3;','zone' => 6',isocode_alfa2' => 'MN'],

        120 =>['id' => '121','nombre' => 'Montenegro','icon' => 'Montenegro.png','icon_code' => '&#x1F1F2;&#x1F1EA;','zone' => 1,'isocode_alfa2' => 'ME'],
        121 =>['id' => '122','nombre' => 'Mozambique','icon' => 'Mozambique.png','icon_code' => '&#x1F1F2;&#x1F1FF;','zone' => 5,'isocode_alfa2' => 'MZ'],
        122 =>['id' => '123','nombre' => 'Namibia','icon' => 'Namibia.png','icon_code' => '&#x1F1F3;&#x1F1E6;','zone' => 5,'isocode_alfa2' => 'NA'],
        123 =>['id' => '124','nombre' => 'Nauru','icon' => 'Nauru.png','icon_code' => '&#x1F1F3;&#x1F1F7;','zone' => 7,'isocode_alfa2' => 'NR'],
        124 =>['id' => '125','nombre' => 'Nepal','icon' => 'Nepal.png','icon_code' => '&#x1F1F3;&#x1F1F5;','zone' => 6,'isocode_alfa2' => 'NP'],
        125 =>['id' => '126','nombre' => 'Nicaragua','icon' => 'Nicaragua.png','icon_code' => '&#x1F1F3;&#x1F1EE;','zone' => 3,'isocode_alfa2' => 'NI'],
        126 =>['id' => '127','nombre' => 'Níger','icon' => 'Niger.png','icon_code' => '&#x1F1F3;&#x1F1EA;','zone' => 5,'isocode_alfa2' => 'NE'],
        127 =>['id' => '128','nombre' => 'Nigeria','icon' => 'Nigeria.png','icon_code' => '&#x1F1F3;&#x1F1EC;','zone' => 5,'isocode_alfa2' => 'NG'],
        128 =>['id' => '129','nombre' => 'Noruega','icon' => 'Noruega.png','icon_code' => '&#x1F1F3;&#x1F1F4;','zone' => 1,'isocode_alfa2' => 'NO'],
        129 =>['id' => '130','nombre' => 'Nueva Zelanda','icon' => 'NuevaZelanda.png','icon_code' => '&#x1F1F3;&#x1F1FF;','zone' => 7,'isocode_alfa2' => 'NZ'],

        130 =>['id' => '131','nombre' => 'Omán','icon' => 'Oman.png','icon_code' => '&#x1F1F4;&#x1F1F2;','zone' => 6,'isocode_alfa2' => 'OM'],
        131 =>['id' => '132','nombre' => 'Países Bajos','icon' => 'PaísesBajos.png','icon_code' => '&#x1F1F3;&#x1F1F1;','zone' => 1,'isocode_alfa2' => 'NL'],
        132 =>['id' => '133','nombre' => 'Pakistán','icon' => 'Pakistan.png','icon_code' => '&#x1F1F5;&#x1F1F0;','zone' => 6,'isocode_alfa2' => 'PK'],
        133 =>['id' => '134','nombre' => 'Palaos','icon' => 'Palaos.png','icon_code' => '&#x1F1F5;&#x1F1FC;','zone' => 7,'isocode_alfa2' => 'PW'],

//Palestina
        134 =>['id' => '135','nombre' => 'Panamá','icon' => 'Panama.png','icon_code' => '&#x1F1F5;&#x1F1E6;','zone' => 3,'isocode_alfa2' => 'PA'],
        135 =>['id' => '136','nombre' => 'Papúa Nueva Guinea','icon' => 'PapuaNuevaGuinea.png','icon_code' => '&#x1F1F5;&#x1F1EC;','zone' => 7,'isocode_alfa2' => 'PG'],
        136 =>['id' => '137','nombre' => 'Paraguay','icon' => 'Paraguay.png','icon_code' => '&#x1F1F5;&#x1F1FE;','zone' => 4,'isocode_alfa2' => 'PY'],
        137 =>['id' => '138','nombre' => 'Perú','icon' => 'Peru.png','icon_code' => '&#x1F1F5;&#x1F1EA;','zone' => 4,'isocode_alfa2' => 'PE'],
        138 =>['id' => '139','nombre' => 'Polonia','icon' => 'Polonia.png','icon_code' => '&#x1F1F5;&#x1F1F1;','zone' => 1,'isocode_alfa2' => 'PL'],
        139 =>['id' => '140','nombre' => 'Portugal','icon' => 'Portugal.png','icon_code' => '&#x1F1F5;&#x1F1F9;','zone' => 1,'isocode_alfa2' => 'PT'],

        140 =>['id' => '141','nombre' => 'Reino Unido','icon' => 'ReinoUnido.png','icon_code' => '&#x1F1EC;&#x1F1E7;','zone' => 1,'isocode_alfa2' => 'GB'],
        141 =>['id' => '142','nombre' => 'República Centroafricana','icon' => 'RepublicaCentroafricana.png','icon_code' => '&#x1F1E8;&#x1F1EB;','zone' => 5,'isocode_alfa2' => 'CF'],
        142 =>['id' => '143','nombre' => 'República Checa','icon' => 'RepúblicaCheca.png','icon_code' => '&#x1F1E8;&#x1F1FF;','zone' => 1,'isocode_alfa2' => 'CZ'],
        143 =>['id' => '144','nombre' => 'República de Macedonia','icon' => 'RepublicaDeMacedonia.png','icon_code' => '&#x1F1F2;&#x1F1F0;','zone' => 1,'isocode_alfa2' => 'MK'],
        144 =>['id' => '145','nombre' => 'República del Congo','icon' => 'RepublicaDelCongo.png','icon_code' => '&#x1F1E8;&#x1F1EC;','zone' => 5,'isocode_alfa2' => 'CG'],
        145 =>['id' => '146','nombre' => 'República Democrática del Congo','icon' => 'RepublicaDemocraticaDelCongo.png','icon_code' => '&#x1F1E8;&#x1F1E9;','zone' => 5,'isocode_alfa2' => 'CD'],
        146 =>['id' => '147','nombre' => 'República Dominicana','icon' => 'RepúblicaDominicana.png','icon_code' => '&#x1F1E9;&#x1F1F4;','zone' => 8,'isocode_alfa2' => 'DO'],
        147 =>['id' => '148','nombre' => 'República Sudafricana','icon' => 'RepublicaSudafricana.png','icon_code' => '&#x1F1FF;&#x1F1E6;','zone' => 5,'isocode_alfa2' => 'ZA'],
        148 =>['id' => '149','nombre' => 'Ruanda','icon' => 'Ruanda.png','icon_code' => '&#x1F1F7;&#x1F1FC;','zone' => 5,'isocode_alfa2' => 'RW'],
        149 =>['id' => '150','nombre' => 'Rumanía','icon' => 'Rumania.png','icon_code' => '&#x1F1F7;&#x1F1F4;','zone' => 1,'isocode_alfa2' => 'RO'],

        150 =>['id' => '151','nombre' => 'Rusia','icon' => 'Rusia.png','icon_code' => '&#x1F1F7;&#x1F1FA;','zone' => 1,'isocode_alfa2' => 'RU'],
        151 =>['id' => '152','nombre' => 'Samoa','icon' => 'Samoa.png','icon_code' => '&#x1F1FC;&#x1F1F8;','zone' => 7,'isocode_alfa2' => 'WS'],
        152 =>['id' => '153','nombre' => 'San Cristóbal y Nieves','icon' => 'SanCristobalYNieves.png','icon_code' => '&#x1F1F0;&#x1F1F3;','zone' => 8,'isocode_alfa2' => 'KN'],
        153 =>['id' => '154','nombre' => 'San Marino','icon' => 'SanMarino.png','icon_code' => '&#x1F1F8;&#x1F1F2;','zone' => 1,'isocode_alfa2' => 'SM'],
        154 =>['id' => '155','nombre' => 'San Vicente y las Granadinas','icon' => 'SanVicenteYLasGranadinas.png','icon_code' => '&#x1F1FB;&#x1F1E8;','zone' => 8,'isocode_alfa2' => 'VC'],
        155 =>['id' => '156','nombre' => 'Santa Lucía','icon' => 'SantaLucia.png','icon_code' => '&#x1F1F1;&#x1F1E8;','zone' => 8,'isocode_alfa2' => 'LC'],
        156 =>['id' => '157','nombre' => 'Santo Tomé y Príncipe','icon' => 'SantoTomeYPrincipe.png','icon_code' => '&#x1F1F8;&#x1F1F9;','zone' => 5,'isocode_alfa2' => 'ST'],
        157 =>['id' => '158','nombre' => 'Senegal','icon' => 'Senegal.png','icon_code' => '&#x1F1F8;&#x1F1F3;','zone' => 5,'isocode_alfa2' => 'SN'],
        158 =>['id' => '159','nombre' => 'Serbia','icon' => 'Serbia.png','icon_code' => '&#x1F1F7;&#x1F1F8;','zone' => 1,'isocode_alfa2' => 'RS'],
        159 =>['id' => '160','nombre' => 'Seychelles','icon' => 'Seychelles.png','icon_code' => '&#x1F1F8;&#x1F1E8;','zone' => 5,'isocode_alfa2' => 'SC'],

        160 =>['id' => '161','nombre' => 'Sierra Leona','icon' => 'SierraLeona.png','icon_code' => '&#x1F1F8;&#x1F1F1;','zone' => 5,'isocode_alfa2' => 'SL'],
        161 =>['id' => '162','nombre' => 'Singapur','icon' => 'Singapur.png','icon_code' => '&#x1F1F8;&#x1F1EC;','zone' => 6,'isocode_alfa2' => 'SG'],
        162 =>['id' => '163','nombre' => 'Siria','icon' => 'Siria.png','icon_code' => '&#x1F1F8;&#x1F1FE;','zone' => 6,'isocode_alfa2' => 'SY'],
        163 =>['id' => '164','nombre' => 'Somalia','icon' => 'Somalia.png','icon_code' => '&#x1F1F8;&#x1F1F4;','zone' => 5,'isocode_alfa2' => 'SO'],
        164 =>['id' => '165','nombre' => 'Sri Lanka','icon' => 'SriLanka.png','icon_code' => '&#x1F1F1;&#x1F1F0;','zone' => 6,'isocode_alfa2' => 'LK'],
        165 =>['id' => '166','nombre' => 'Suazilandia','icon' => 'Suazilandia.png','icon_code' => '&#x1F1F8;&#x1F1FF;','zone' => 5,'isocode_alfa2' => 'SZ'],
        166 =>['id' => '167','nombre' => 'Sudán','icon' => 'Sudan.png','icon_code' => '&#x1F1F8;&#x1F1E9;','zone' => 5,'isocode_alfa2' => 'SD'],
        167 =>['id' => '168','nombre' => 'Sudán del Sur','icon' => 'SudanDelSur.png','icon_code' => '&#x1F1F8;&#x1F1F8;','zone' => 5,'isocode_alfa2' => 'SS'],
        168 =>['id' => '169','nombre' => 'Suecia','icon' => 'Suecia.png','icon_code' => '&#x1F1F8;&#x1F1EA;','zone' => 1,'isocode_alfa2' => 'SE'],
        169 =>['id' => '170','nombre' => 'Suiza','icon' => 'Suiza.png','icon_code' => '&#x1F1E8;&#x1F1ED;','zone' => 1,'isocode_alfa2' => 'CH'],

        170 =>['id' => '171','nombre' => 'Surinam','icon' => 'Surinam.png','icon_code' => '&#x1F1F8;&#x1F1F7;','zone' => 4,'isocode_alfa2' => 'SC'],
        171 =>['id' => '172','nombre' => 'Tailandia','icon' => 'Tailandia.png','icon_code' => '&#x1F1F9;&#x1F1ED;','zone' => 6,'isocode_alfa2' => 'SC'],
//Taiwán
        172 =>['id' => '173','nombre' => 'Tanzania','icon' => 'Tanzania.png','icon_code' => '&#x1F1F9;&#x1F1FF;','zone' => 5,'isocode_alfa2' => 'TH'],
        173 =>['id' => '174','nombre' => 'Tayikistán','icon' => 'Tayikistán.png','icon_code' => '&#x1F1F9;&#x1F1EF;','zone' => 6,'isocode_alfa2' => 'TJ'],
        174 =>['id' => '175','nombre' => 'Timor Oriental','icon' => 'TimorOriental.png','icon_code' => '&#x1F1F9;&#x1F1F1;','zone' => 6,'isocode_alfa2' => 'TL'],
        175 =>['id' => '176','nombre' => 'Togo','icon' => 'Togo.png','icon_code' => '&#x1F1F9;&#x1F1EC;','zone' => 5,'isocode_alfa2' => 'TG'],
        176 =>['id' => '177','nombre' => 'Tonga','icon' => 'Tonga.png','icon_code' => '&#x1F1F9;&#x1F1F4;','zone' => 7,'isocode_alfa2' => 'TO'],
        177 =>['id' => '178','nombre' => 'Trinidad y Tobago','icon' => 'TrinidadYTobago.png','icon_code' => '&#x1F1F9;&#x1F1F9;','zone' => 8,'isocode_alfa2' => 'TT'],
        178 =>['id' => '179','nombre' => 'Túnez','icon' => 'Tunez.png','icon_code' => '&#x1F1F9;&#x1F1F3;','zone' => 5,'isocode_alfa2' => 'TN'],
        179 =>['id' => '180','nombre' => 'Turkmenistán','icon' => 'Turkmenistán.png','icon_code' => '&#x1F1F9;&#x1F1F2;','zone' => 6,'isocode_alfa2' => 'TM'],

        180 =>['id' => '181','nombre' => 'Turquía','icon' => 'Turquia.png','icon_code' => '&#x1F1F9;&#x1F1F7;','zone' => 6,'isocode_alfa2' => 'TR'],
        181 =>['id' => '182','nombre' => 'Tuvalu','icon' => 'Tuvalu.png','icon_code' => '&#x1F1F9;&#x1F1FB;','zone' => 7,'isocode_alfa2' => 'TV'],
        182 =>['id' => '183','nombre' => 'Ucrania','icon' => 'Ucrania.png','icon_code' => '&#x1F1FA;&#x1F1E6;','zone' => 1,'isocode_alfa2' => 'UA'],
        183 =>['id' => '184','nombre' => 'Uganda','icon' => 'Uganda.png','icon_code' => '&#x1F1FA;&#x1F1EC;','zone' => 5,'isocode_alfa2' => 'UG'],
        184 =>['id' => '185','nombre' => 'Uruguay','icon' => 'Uruguay.png','icon_code' => '&#x1F1FA;&#x1F1FE;','zone' => 4,'isocode_alfa2' => 'UY'],
        185 =>['id' => '186','nombre' => 'Uzbekistán','icon' => 'Uzbekistan.png','icon_code' => '&#x1F1FA;&#x1F1FF;','zone' => 6,'isocode_alfa2' => 'UZ'],
        186 =>['id' => '187','nombre' => 'Vanuatu','icon' => 'Vanuatu.png','icon_code' => '&#x1F1FB;&#x1F1FA;','zone' => 7,'isocode_alfa2' => 'VU'],
        187 =>['id' => '188','nombre' => 'Venezuela','icon' => 'Venezuela.png','icon_code' => '&#x1F1FB;&#x1F1EA;','zone' => 4,'isocode_alfa2' => 'VE'],
        188 =>['id' => '189','nombre' => 'Vietnam','icon' => 'Vietnam.png','icon_code' => '&#x1F1FB;&#x1F1F3;','zone' => 6,'isocode_alfa2' => 'VM'],
        189 =>['id' => '190','nombre' => 'Yemen','icon' => 'Yemen.png','icon_code' => '&#x1F1FE;&#x1F1EA;','zone' => 6,'isocode_alfa2' => 'YE'],

        190 =>['id' => '191','nombre' => 'Yibuti','icon' => 'Yibuti.png','icon_code' => '&#x1F1E9;&#x1F1EF;','zone' => 5,'isocode_alfa2' => 'DJ'],
        191 =>['id' => '192','nombre' => 'Zambia','icon' => 'Zambia.png','icon_code' => '&#x1F1FF;&#x1F1F2;','zone' => 5,'isocode_alfa2' => 'ZM'],
        192 =>['id' => '193','nombre' => 'Zimbabue','icon' => 'Zimbabue.png','icon_code' => '&#x1F1FF;&#x1F1FC;','zone' => 5,'isocode_alfa2' => 'ZW'],
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