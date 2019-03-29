<?php
/*
    * Template Name: Partners List
*/
get_header();

$partnerSchools = [
    [
        "name"=>"Städtische Berufsschule II Regensburg, Regensburg",
        "country"=>"Germany",
        "url"=>"https://www.regensburg.de/bs2"
    ],
    [
        "name"=>"GO! atheneum Redingenhof, Leuven",
        "country"=>"Belgium",
    ],
    [
        "name"=>"LICEO \"A.G. RONCALLI\", Manfredonia",
        "country"=>"Italy",
        "url"=>"https://www.roncalliweb.edu.it/"
    ],
    [
        "name"=>"Agrupamento de Escolas Monte da Lua, Sintra",
        "country"=>"Portugal",
    ],
    [
        "name"=>"OSG de Ring van Putten, Spijkenisse",
        "country"=>"The Netherlands",
    ],
    [
        "name"=>"Liceul Teoretic \"Tudor Arghezi\", Craiov",
        "country"=>"Romania",
    ],
    [
        "name"=>"Kerteminde 10. Klasse Center, Munkebo",
        "country"=>"Denmark",
    ],
    [
        "name"=>"Säynätsalon Peruskoulu, Jyväskyl",
        "country"=>"Finland",
    ],
    [
        "name"=>"Skrillingeskolen, Middlefar",
        "country"=>"Denmark",
    ],
    [
        "name"=>"Srednja Poklcna in Strokovna Šola Bezigrad, Ljubljana",
        "country"=>"Slovenia",
    ],
    [
        "name"=>"Robert-Schuman-Institut, EUPEN",
        "country"=>"Belgium",
    ],
];

$partnerInstitutions = [
    [
        "name"=>"Vitra Design Museum, Weil am Rhein",
        "country"=>"Germany",
    ],
    [
        "name"=>"Sligo Institute of Technology",
        "country"=>"Ireland",
    ],
    [
        "name"=>"Europass sas, Florence",
        "country"=>"Italy",
    ],
    [
        "name"=>"Bett Technology Conference, London",
        "country"=>"United Kingdom",
    ],
    [
        "name"=>"Elderberry Giryd Limited, Birmingham",
        "country"=>"United Kingdom",
    ],
];

$selectedCountry = ucwords(str_replace("_", " ", get_query_var("country")));
$partnerSchoolsFiltered = array_filter($partnerSchools, function($partner) use ($selectedCountry) {
    return ($partner["country"] === $selectedCountry);
});
$partnerInstitutionsFiltered = array_filter($partnerInstitutions, function($partner) use ($selectedCountry) {
    return ($partner["country"] === $selectedCountry);
});
?>
<body id="top"> 
    <style>
    .partner-link {
        color: var(--blue);
    }
    </style>
    <?php
    get_template_part("nav");
    ?>
    <header>Our Partners in <?php echo $selectedCountry ?></header>
    <main>

        <?php if (empty(!$partnerSchoolsFiltered)): ?>
        <h1>Partner Schools</h1>
        <ul>
        <?php foreach ($partnerSchoolsFiltered as $partner): ?>
                <li>
                    <?php if (isset($partner["url"])): ?>
                    <a  class='partner-link' href="<?php echo $partner["url"]?>">
                        <?php echo ucwords($partner["name"]), ", ", ucwords($partner["country"]); ?>
                    </a>
                    <?php else: ?> 
                    <?php echo ucwords($partner["name"]), ", ", ucwords($partner["country"]); ?>              
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <?php if (!empty($partnerInstitutionsFiltered)):?>
        <h1>Partner Institutions</h1>
        <ul>
            <?php foreach ($partnerInstitutionsFiltered as $partner): ?>
                <li class='partner-name'>
                    <?php if (isset($partner["url"])): ?>
                    <a class="partner-link" href="<?php echo $partner["url"]?>">
                        <?php echo ucwords($partner["name"]), ", ", ucwords($partner["country"]); ?>
                    </a>
                    <?php else: ?> 
                    <?php echo ucwords($partner["name"]), ", ", ucwords($partner["country"]); ?>              
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </main>
    <?php
    get_footer();
    ?>
</body>