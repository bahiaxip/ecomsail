<?php
namespace App\Functions;

class Paises{

	//todos los países
	public $all=array("Afganistán","Albania","Alemania","Andorra","Angola","Antigua y Barbuda","Arabia Saudita","Argelia","Argentina","Armenia","Australia","Austria","Azerbaiyán","Bahamas","Bangladés","Barbados","Baréin","Bélgica","Belice","Benín","Bielorrusia","Birmania","Bolivia","Bosnia y Herzegovina","Botsuana","Brasil","Brunéi","Bulgaria","Burkina Faso","Burundi","Bután","Cabo Verde","Camboya","Camerún","Canadá","Catar","Chad","Chile","China","Chipre","Ciudad del Vaticano","Colombia","Comoras","Corea del Norte","Corea del Sur","Costa de Marfil","Costa Rica","Croacia","Cuba","Dinamarca","Dominica","Ecuador","Egipto","El Salvador","Emiratos Árabes Unidos","Eritrea","Eslovaquia","Eslovenia","España","Estados Unidos","Estonia","Etiopía","Filipinas","Finlandia","Fiyi","Francia","Gabón","Gambia","Georgia","Ghana","Granada","Grecia","Guatemala","Guyana","Guinea","Guinea ecuatorial","Guinea-Bisáu","Haití","Honduras","Hungría","India","Indonesia","Irak","Irán","Irlanda","Islandia","Islas Marshall","Islas Salomón","Israel","Italia","Jamaica","Japón","Jordania","Kazajistán","Kenia","Kirguistán","Kiribati","Kuwait","Laos","Lesoto","Letonia","Líbano","Liberia","Libia","Liechtenstein","Lituania","Luxemburgo","Madagascar","Malasia","Malaui","Maldivas","Malí","Malta","Marruecos","Mauricio","Mauritania","México","Micronesia","Moldavia","Mónaco","Mongolia","Montenegro","Mozambique","Namibia","Nauru","Nepal","Nicaragua","Níger","Nigeria","Noruega","Nueva Zelanda","Omán","Países Bajos","Pakistán","Palaos","Panamá","Papúa Nueva Guinea","Paraguay","Perú","Polonia","Portugal","Reino Unido","República Centroafricana","República Checa","República de Macedonia","República del Congo","República Democrática del Congo","República Dominicana","República Sudafricana","Ruanda","Rumanía","Rusia","Samoa","San Cristóbal y Nieves","San Marino","San Vicente y las Granadinas","Santa Lucía","Santo Tomé y Príncipe","Senegal","Serbia","Seychelles","Sierra Leona","Singapur","Siria","Somalia","Sri Lanka","Suazilandia","Sudán","Sudán del Sur","Suecia","Suiza","Surinam","Tailandia","Tanzania","Tayikistán","Timor Oriental","Togo","Tonga","Trinidad y Tobago","Túnez","Turkmenistán","Turquía","Tuvalu","Ucrania","Uganda","Uruguay","Uzbekistán","Vanuatu","Venezuela","Vietnam","Yemen","Yibuti","Zambia","Zimbabue");

    public $all_icons = [

        1 =>['id' => '02','nombre' => 'Afganistán','icon' => 'Afganistan.png'],
        1 =>['id' => '02','nombre' => 'Albania','icon' => 'Albania.png'],
        2 =>['id' => '03','nombre' => 'Alemania','icon' => 'Alemania.png'],
        3 =>['id' => '04','nombre' => 'Andorra','icon' => 'Andorra.png'],
        4 =>['id' => '05','nombre' => 'Angola','icon' => 'Angola.png'],
        5 =>['id' => '06','nombre' => 'Antigua y Barbuda','icon' => 'AntiguaYBarbuda.png'],
        6 =>['id' => '07','nombre' => 'Arabia Saudita','icon' => 'ArabiaSaudita.png'],
        7 =>['id' => '08','nombre' => 'Argelia','icon' => 'Argelia.png'],
        8 =>['id' => '09','nombre' => 'Argentina','icon' => 'Argentina.png'],
        9 =>['id' => '10','nombre' => 'Armenia','icon' => 'Armenia.png'],

        10 =>['id' => '11','nombre' => 'Australia','icon' => 'Australia.png'],
        11 =>['id' => '12','nombre' => 'Austria','icon' => 'Austria.png'],
        12 =>['id' => '13','nombre' => 'Azerbaiyán','icon' => 'Azerbaiyan.png'],
        13 =>['id' => '14','nombre' => 'Bahamas','icon' => 'Bahamas.png'],
        14 =>['id' => '15','nombre' => 'Bangladés','icon' => 'Banglades.png'],
        15 =>['id' => '16','nombre' => 'Barbados','icon' => 'Barbados.png'],
        16 =>['id' => '17','nombre' => 'Baréin','icon' => 'Barein.png'],
        17 =>['id' => '18','nombre' => 'Bélgica','icon' => 'Belgica.png'],
        18 =>['id' => '19','nombre' => 'Belice','icon' => 'Belice.png'],
        19 =>['id' => '20','nombre' => 'Benín','icon' => 'Benin.png'],

        20 =>['id' => '11','nombre' => 'Bielorrusia','icon' => 'Bielorrusia.png'],
        21 =>['id' => '12','nombre' => 'Birmania','icon' => 'Birmania.png'],
        22 =>['id' => '13','nombre' => 'Bolivia','icon' => 'Bolivia.png'],
        23 =>['id' => '14','nombre' => 'Bosnia y Herzegovina','icon' => 'BosniaYHerzegovina.png'],
        24 =>['id' => '15','nombre' => 'Botsuana','icon' => 'Botsuana.png'],
        25 =>['id' => '16','nombre' => 'Brasil','icon' => 'Brasil.png'],
        26 =>['id' => '17','nombre' => 'Brunéi','icon' => 'Brunei.png'],
        27 =>['id' => '18','nombre' => 'Bulgaria','icon' => 'Bulgaria.png'],
        28 =>['id' => '19','nombre' => 'Burkina Faso','icon' => 'BurkinaFaso.png'],
        29 =>['id' => '20','nombre' => 'Burundi','icon' => 'Burundi.png'],
        
        30 =>['id' => '11','nombre' => 'Bután','icon' => 'Butan.png'],
        31 =>['id' => '12','nombre' => 'Cabo Verde','icon' => 'CaboVerde.png'],
        32 =>['id' => '13','nombre' => 'Camboya','icon' => 'Camboya.png'],
        33 =>['id' => '14','nombre' => 'Camerún','icon' => 'Camerun.png'],
        34 =>['id' => '15','nombre' => 'Canadá','icon' => 'Canada.png'],
        35 =>['id' => '16','nombre' => 'Catar','icon' => 'Catar.png'],
        36 =>['id' => '17','nombre' => 'Chad','icon' => 'Chad.png'],
        37 =>['id' => '18','nombre' => 'Chile','icon' => 'Chile.png'],
        38 =>['id' => '19','nombre' => 'China','icon' => 'China.png'],
        39 =>['id' => '20','nombre' => 'Chipre','icon' => 'Chipre.png'],

        40 =>['id' => '11','nombre' => 'Colombia','icon' => 'Colombia.png'],
        41 =>['id' => '12','nombre' => 'Comoras','icon' => 'Comoras.png'],
        42 =>['id' => '13','nombre' => 'Corea del Norte','icon' => 'CoreaDelNorte.png'],
        43 =>['id' => '14','nombre' => 'Corea del Sur','icon' => 'CoreaDelSur.png'],
        44 =>['id' => '15','nombre' => 'Costa de Marfil','icon' => 'CostaDeMarfil.png'],
        45 =>['id' => '16','nombre' => 'Costa Rica','icon' => 'CostaRica.png'],
        46 =>['id' => '17','nombre' => 'Croacia','icon' => 'Croacia.png'],
        47 =>['id' => '18','nombre' => 'Cuba','icon' => 'Cuba.png'],
        48 =>['id' => '19','nombre' => 'Dinamarca','icon' => 'Dinamarca.png'],
        49 =>['id' => '20','nombre' => 'Dominica','icon' => 'Dominica.png'],

        50 =>['id' => '11','nombre' => 'Ecuador','icon' => 'Ecuador.png'],
        51 =>['id' => '12','nombre' => 'Egipto','icon' => 'Egipto.png'],
        52 =>['id' => '13','nombre' => 'El Salvador','icon' => 'ElSalvador.png'],
        53 =>['id' => '14','nombre' => 'Emiratos Árabes Unidos','icon' => 'EmiratosArabesUnidos.png'],
        54 =>['id' => '15','nombre' => 'Eritrea','icon' => 'Eritrea.png'],
        55 =>['id' => '16','nombre' => 'Eslovaquia','icon' => 'Eslovaquia.png'],
        56 =>['id' => '17','nombre' => 'Eslovenia','icon' => 'Eslovenia.png'],
        57 =>['id' => '18','nombre' => 'España','icon' => 'Espana.png'],
        58 =>['id' => '19','nombre' => 'Estados Unidos','icon' => 'EstadosUnidos.png'],
        59 =>['id' => '20','nombre' => 'Estonia','icon' => 'Estonia.png'],

        60 =>['id' => '11','nombre' => 'Etiopía','icon' => 'Etiopía.png'],
        61 =>['id' => '12','nombre' => 'Filipinas','icon' => 'Filipinas.png'],
        62 =>['id' => '13','nombre' => 'Finlandia','icon' => 'Finlandia.png'],
        63 =>['id' => '14','nombre' => 'Fiyi','icon' => 'Fiyi.png'],
        64 =>['id' => '15','nombre' => 'Francia','icon' => 'Francia.png'],
        65 =>['id' => '16','nombre' => 'Gabón','icon' => 'Gabon.png'],
        66 =>['id' => '17','nombre' => 'Gambia','icon' => 'Gambia.png'],
        67 =>['id' => '18','nombre' => 'Georgia','icon' => 'Georgia.png'],
        68 =>['id' => '19','nombre' => 'Ghana','icon' => 'Ghana.png'],
        69 =>['id' => '20','nombre' => 'Granada','icon' => 'Granada.png'],

        70 =>['id' => '11','nombre' => 'Grecia','icon' => 'Grecia.png'],
        71 =>['id' => '12','nombre' => 'Guatemala','icon' => 'Guatemala.png'],        
        72 =>['id' => '14','nombre' => 'Guinea','icon' => 'Guinea.png'],
        73 =>['id' => '16','nombre' => 'Guinea Bisáu','icon' => 'GuineaBisau.png'],
        74 =>['id' => '15','nombre' => 'Guinea Ecuatorial','icon' => 'GuineaEcuatorial.png'],
        75 =>['id' => '13','nombre' => 'Guyana','icon' => 'Guyana.png'],
        76 =>['id' => '17','nombre' => 'Haití','icon' => 'Haiti.png'],
        77 =>['id' => '18','nombre' => 'Honduras','icon' => 'Honduras.png'],
        78 =>['id' => '19','nombre' => 'Hungría','icon' => 'Hungria.png'],
        79 =>['id' => '20','nombre' => 'India','icon' => 'India.png'],

        80 =>['id' => '11','nombre' => 'Indonesia','icon' => 'Indonesia.png'],
        81 =>['id' => '12','nombre' => 'Irak','icon' => 'Irak.png'],
        82 =>['id' => '13','nombre' => 'Irán','icon' => 'Iran.png'],
        83 =>['id' => '14','nombre' => 'Irlanda','icon' => 'Irlanda.png'],
        84 =>['id' => '15','nombre' => 'Islandia','icon' => 'Islandia.png'],
        85 =>['id' => '16','nombre' => 'Islas Marshall','icon' => 'IslasMarshall.png'],
        86 =>['id' => '17','nombre' => 'Islas Salomón','icon' => 'IslasSalomon.png'],
        87 =>['id' => '18','nombre' => 'Israel','icon' => 'Israel.png'],
        88 =>['id' => '19','nombre' => 'Italia','icon' => 'Italia.png'],
        89 =>['id' => '20','nombre' => 'Jamaica','icon' => 'Jamaica.png'],

        90 =>['id' => '11','nombre' => 'Japón','icon' => 'Japon.png'],
        91 =>['id' => '12','nombre' => 'Jordania','icon' => 'Jordania.png'],
        92 =>['id' => '13','nombre' => 'Kazajistán','icon' => 'Kazajistan.png'],
        93 =>['id' => '14','nombre' => 'Kenia','icon' => 'Kenia.png'],
        94 =>['id' => '15','nombre' => 'Kirguistán','icon' => 'Kirguistan.png'],
        95 =>['id' => '16','nombre' => 'Kiribati','icon' => 'Kiribati.png'],
        96 =>['id' => '17','nombre' => 'Kuwait','icon' => 'Kuwait.png'],
        97 =>['id' => '18','nombre' => 'Laos','icon' => 'Laos.png'],
        98 =>['id' => '19','nombre' => 'Lesoto','icon' => 'Lesoto.png'],
        99 =>['id' => '20','nombre' => 'Letonia','icon' => 'Letonia.png'],

        100 =>['id' => '11','nombre' => 'Líbano','icon' => 'Libano.png'],
        101 =>['id' => '12','nombre' => 'Liberia','icon' => 'Liberia.png'],
        102 =>['id' => '13','nombre' => 'Libia','icon' => 'Libia.png'],
        103 =>['id' => '14','nombre' => 'Liechtenstein','icon' => 'Liechtenstein.png'],
        104 =>['id' => '15','nombre' => 'Lituania','icon' => 'Lituania.png'],
        105 =>['id' => '16','nombre' => 'Luxemburgo','icon' => 'Luxemburgo.png'],

//macedonia
        106 =>['id' => '17','nombre' => 'Madagascar','icon' => 'Madagascar.png'],
        107 =>['id' => '18','nombre' => 'Malasia','icon' => 'Malasia.png'],
        108 =>['id' => '19','nombre' => 'Malaui','icon' => 'Malaui.png'],
        109 =>['id' => '20','nombre' => 'Maldivas','icon' => 'Maldivas.png'],

        110 =>['id' => '11','nombre' => 'Malí','icon' => 'Mali.png'],
        111 =>['id' => '12','nombre' => 'Malta','icon' => 'Malta.png'],
        112 =>['id' => '13','nombre' => 'Marruecos','icon' => 'Marruecos.png'],
        113 =>['id' => '14','nombre' => 'Mauricio','icon' => 'Mauricio.png'],
        114 =>['id' => '15','nombre' => 'Mauritania','icon' => 'Mauritania.png'],
        115 =>['id' => '16','nombre' => 'México','icon' => 'Mexico.png'],
        116 =>['id' => '17','nombre' => 'Micronesia','icon' => 'Micronesia.png'],
        117 =>['id' => '18','nombre' => 'Moldavia','icon' => 'Moldavia.png'],
        118 =>['id' => '19','nombre' => 'Mónaco','icon' => 'Monaco.png'],
        119 =>['id' => '20','nombre' => 'Mongolia','icon' => 'Mongolia.png'],

        120 =>['id' => '11','nombre' => 'Montenegro','icon' => 'Montenegro.png'],
        121 =>['id' => '12','nombre' => 'Mozambique','icon' => 'Mozambique.png'],
        122 =>['id' => '13','nombre' => 'Namibia','icon' => 'Namibia.png'],
        123 =>['id' => '14','nombre' => 'Nauru','icon' => 'Nauru.png'],
        124 =>['id' => '15','nombre' => 'Nepal','icon' => 'Nepal.png'],
        125 =>['id' => '16','nombre' => 'Nicaragua','icon' => 'Nicaragua.png'],
        126 =>['id' => '17','nombre' => 'Níger','icon' => 'Niger.png'],
        127 =>['id' => '18','nombre' => 'Nigeria','icon' => 'Nigeria.png'],
        128 =>['id' => '19','nombre' => 'Noruega','icon' => 'Noruega.png'],
        129 =>['id' => '20','nombre' => 'Nueva Zelanda','icon' => 'NuevaZelanda.png'],

        130 =>['id' => '11','nombre' => 'Omán','icon' => 'Oman.png'],
        131 =>['id' => '12','nombre' => 'Países Bajos','icon' => 'PaísesBajos.png'],
        132 =>['id' => '13','nombre' => 'Pakistán','icon' => 'Pakistan.png'],
        133 =>['id' => '14','nombre' => 'Palaos','icon' => 'Palaos.png'],

//Palestina
        134 =>['id' => '15','nombre' => 'Panamá','icon' => 'Panama.png'],
        135 =>['id' => '16','nombre' => 'Papúa Nueva Guinea','icon' => 'PapuaNuevaGuinea.png'],
        136 =>['id' => '17','nombre' => 'Paraguay','icon' => 'Paraguay.png'],
        137 =>['id' => '18','nombre' => 'Perú','icon' => 'Peru.png'],
        138 =>['id' => '19','nombre' => 'Polonia','icon' => 'Polonia.png'],
        139 =>['id' => '20','nombre' => 'Portugal','icon' => 'Portugal.png'],

        140 =>['id' => '11','nombre' => 'Reino Unido','icon' => 'ReinoUnido.png'],
        141 =>['id' => '12','nombre' => 'República Centroafricana','icon' => 'RepublicaCentroafricana.png'],
        142 =>['id' => '13','nombre' => 'República Checa','icon' => 'RepúblicaCheca.png'],
        143 =>['id' => '14','nombre' => 'República de Macedonia','icon' => 'RepublicaDeMacedonia.png'],
        144 =>['id' => '15','nombre' => 'República del Congo','icon' => 'RepublicaDelCongo.png'],
        145 =>['id' => '16','nombre' => 'República Democrática del Congo','icon' => 'RepublicaDemocraticaDelCongo.png'],
        146 =>['id' => '17','nombre' => 'República Dominicana','icon' => 'RepúblicaDominicana.png'],
        147 =>['id' => '18','nombre' => 'República Sudafricana','icon' => 'RepublicaSudafricana.png'],
        148 =>['id' => '19','nombre' => 'Ruanda','icon' => 'Ruanda.png'],
        149 =>['id' => '20','nombre' => 'Rumanía','icon' => 'Rumania.png'],

        150 =>['id' => '11','nombre' => 'Rusia','icon' => 'Rusia.png'],
        151 =>['id' => '12','nombre' => 'Samoa','icon' => 'Samoa.png'],
        152 =>['id' => '13','nombre' => 'San Cristóbal y Nieves','icon' => 'SanCristobalYNieves.png'],
        153 =>['id' => '14','nombre' => 'San Marino','icon' => 'SanMarino.png'],
        154 =>['id' => '15','nombre' => 'San Vicente y las Granadinas','icon' => 'SanVicenteYLasGranadinas.png'],
        155 =>['id' => '16','nombre' => 'Santa Lucía','icon' => 'SantaLucia.png'],
        156 =>['id' => '17','nombre' => 'Santo Tomé y Príncipe','icon' => 'SantoTomeYPrincipe.png'],
        157 =>['id' => '18','nombre' => 'Senegal','icon' => 'Senegal.png'],
        158 =>['id' => '19','nombre' => 'Serbia','icon' => 'Serbia.png'],
        159 =>['id' => '20','nombre' => 'Seychelles','icon' => 'Seychelles.png'],

        160 =>['id' => '11','nombre' => 'Sierra Leona','icon' => 'SierraLeona.png'],
        161 =>['id' => '12','nombre' => 'Singapur','icon' => 'Singapur.png'],
        162 =>['id' => '13','nombre' => 'Siria','icon' => 'Siria.png'],
        163 =>['id' => '14','nombre' => 'Somalia','icon' => 'Somalia.png'],
        164 =>['id' => '15','nombre' => 'Sri Lanka','icon' => 'SriLanka.png'],
        165 =>['id' => '16','nombre' => 'Suazilandia','icon' => 'Suazilandia.png'],
        166 =>['id' => '17','nombre' => 'Sudán','icon' => 'Sudan.png'],
        167 =>['id' => '18','nombre' => 'Sudán del Sur','icon' => 'SudanDelSur.png'],
        168 =>['id' => '19','nombre' => 'Suecia','icon' => 'Suecia.png'],
        169 =>['id' => '20','nombre' => 'Suiza','icon' => 'Suiza.png'],

        170 =>['id' => '11','nombre' => 'Surinam','icon' => 'Surinam.png'],
        171 =>['id' => '12','nombre' => 'Tailandia','icon' => 'Tailandia.png'],
//Taiwán
        172 =>['id' => '13','nombre' => 'Tanzania','icon' => 'Tanzania.png'],
        173 =>['id' => '14','nombre' => 'Tayikistán','icon' => 'Tayikistán.png'],
        174 =>['id' => '15','nombre' => 'Timor Oriental','icon' => 'TimorOriental.png'],
        175 =>['id' => '16','nombre' => 'Togo','icon' => 'Togo.png'],
        176 =>['id' => '17','nombre' => 'Tonga','icon' => 'Tonga.png'],
        177 =>['id' => '18','nombre' => 'Trinidad y Tobago','icon' => 'TrinidadYTobago.png'],
        178 =>['id' => '19','nombre' => 'Túnez','icon' => 'Tunez.png'],
        179 =>['id' => '20','nombre' => 'Turkmenistán','icon' => 'Turkmenistán.png'],

        180 =>['id' => '11','nombre' => 'Turquía','icon' => 'Turquia.png'],
        181 =>['id' => '12','nombre' => 'Tuvalu','icon' => 'Tuvalu.png'],
        182 =>['id' => '13','nombre' => 'Ucrania','icon' => 'Ucrania.png'],
        183 =>['id' => '14','nombre' => 'Uganda','icon' => 'Uganda.png'],
        184 =>['id' => '15','nombre' => 'Uruguay','icon' => 'Uruguay.png'],
        185 =>['id' => '16','nombre' => 'Uzbekistán','icon' => 'Uzbekistan.png'],
        186 =>['id' => '17','nombre' => 'Vanuatu','icon' => 'Vanuatu.png'],
        187 =>['id' => '18','nombre' => 'Venezuela','icon' => 'Venezuela.png'],
        188 =>['id' => '19','nombre' => 'Vietnam','icon' => 'Vietnam.png'],
        189 =>['id' => '20','nombre' => 'Yemen','icon' => 'Yemen.png'],

        190 =>['id' => '11','nombre' => 'Yibuti','icon' => 'Yibuti.png'],
        191 =>['id' => '12','nombre' => 'Zambia','icon' => 'Zambia.png'],
        192 =>['id' => '13','nombre' => 'Zimbabue','icon' => 'Zimbabue.png'],
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