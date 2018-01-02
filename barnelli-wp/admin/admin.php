<?php
global $barnelli_foodMenuSlug;
global $barnelli_foodMenuName;
global $barnelli_fontsArray;

$barnelli_fontsArray = array("Open Sans" => "Open Sans", "ABeeZee" => "ABeeZee", "Abel" => "Abel", "Abril Fatface" => "Abril Fatface", "Aclonica" => "Aclonica", "Acme" => "Acme", "Actor" => "Actor", "Adamina" => "Adamina", "Advent Pro" => "Advent Pro", "Aguafina Script" => "Aguafina Script", "Akronim" => "Akronim", "Aladin" => "Aladin", "Aldrich" => "Aldrich", "Alef" => "Alef", "Alegreya" => "Alegreya", "Alegreya SC" => "Alegreya SC", "Alegreya Sans" => "Alegreya Sans", "Alegreya Sans SC" => "Alegreya Sans SC", "Alex Brush" => "Alex Brush", "Alfa Slab One" => "Alfa Slab One", "Alice" => "Alice", "Alike" => "Alike", "Alike Angular" => "Alike Angular", "Allan" => "Allan", "Allerta" => "Allerta", "Allerta Stencil" => "Allerta Stencil", "Allura" => "Allura", "Almendra" => "Almendra", "Almendra Display" => "Almendra Display", "Almendra SC" => "Almendra SC", "Amarante" => "Amarante", "Amaranth" => "Amaranth", "Amatic SC" => "Amatic SC", "Amethysta" => "Amethysta", "Anaheim" => "Anaheim", "Andada" => "Andada", "Andika" => "Andika", "Angkor" => "Angkor", "Annie Use Your Telescope" => "Annie Use Your Telescope", "Anonymous Pro" => "Anonymous Pro", "Antic" => "Antic", "Antic Didone" => "Antic Didone", "Antic Slab" => "Antic Slab", "Anton" => "Anton", "Arapey" => "Arapey", "Arbutus" => "Arbutus", "Arbutus Slab" => "Arbutus Slab", "Architects Daughter" => "Architects Daughter", "Archivo Black" => "Archivo Black", "Archivo Narrow" => "Archivo Narrow", "Arimo" => "Arimo", "Arizonia" => "Arizonia", "Armata" => "Armata", "Artifika" => "Artifika", "Arvo" => "Arvo", "Asap" => "Asap", "Asset" => "Asset", "Astloch" => "Astloch", "Asul" => "Asul", "Atomic Age" => "Atomic Age", "Aubrey" => "Aubrey", "Audiowide" => "Audiowide", "Autour One" => "Autour One", "Average" => "Average", "Average Sans" => "Average Sans", "Averia Gruesa Libre" => "Averia Gruesa Libre", "Averia Libre" => "Averia Libre", "Averia Sans Libre" => "Averia Sans Libre", "Averia Serif Libre" => "Averia Serif Libre", "Bad Script" => "Bad Script", "Balthazar" => "Balthazar", "Bangers" => "Bangers", "Basic" => "Basic", "Battambang" => "Battambang", "Baumans" => "Baumans", "Bayon" => "Bayon", "Belgrano" => "Belgrano", "Belleza" => "Belleza", "BenchNine" => "BenchNine", "Bentham" => "Bentham", "Berkshire Swash" => "Berkshire Swash", "Bevan" => "Bevan", "Bigelow Rules" => "Bigelow Rules", "Bigshot One" => "Bigshot One", "Bilbo" => "Bilbo", "Bilbo Swash Caps" => "Bilbo Swash Caps", "Bitter" => "Bitter", "Black Ops One" => "Black Ops One", "Bokor" => "Bokor", "Bonbon" => "Bonbon", "Boogaloo" => "Boogaloo", "Bowlby One" => "Bowlby One", "Bowlby One SC" => "Bowlby One SC", "Brawler" => "Brawler", "Bree Serif" => "Bree Serif", "Bubblegum Sans" => "Bubblegum Sans", "Bubbler One" => "Bubbler One", "Buda" => "Buda", "Buenard" => "Buenard", "Butcherman" => "Butcherman", "Butterfly Kids" => "Butterfly Kids", "Cabin" => "Cabin", "Cabin Condensed" => "Cabin Condensed", "Cabin Sketch" => "Cabin Sketch", "Caesar Dressing" => "Caesar Dressing", "Cagliostro" => "Cagliostro", "Calligraffitti" => "Calligraffitti", "Cambo" => "Cambo", "Candal" => "Candal", "Cantarell" => "Cantarell", "Cantata One" => "Cantata One", "Cantora One" => "Cantora One", "Capriola" => "Capriola", "Cardo" => "Cardo", "Carme" => "Carme", "Carrois Gothic" => "Carrois Gothic", "Carrois Gothic SC" => "Carrois Gothic SC", "Carter One" => "Carter One", "Caudex" => "Caudex", "Cedarville Cursive" => "Cedarville Cursive", "Ceviche One" => "Ceviche One", "Changa One" => "Changa One", "Chango" => "Chango", "Chau Philomene One" => "Chau Philomene One", "Chela One" => "Chela One", "Chelsea Market" => "Chelsea Market", "Chenla" => "Chenla", "Cherry Cream Soda" => "Cherry Cream Soda", "Cherry Swash" => "Cherry Swash", "Chewy" => "Chewy", "Chicle" => "Chicle", "Chivo" => "Chivo", "Cinzel" => "Cinzel", "Cinzel Decorative" => "Cinzel Decorative", "Clicker Script" => "Clicker Script", "Coda" => "Coda", "Coda Caption" => "Coda Caption", "Codystar" => "Codystar", "Combo" => "Combo", "Comfortaa" => "Comfortaa", "Coming Soon" => "Coming Soon", "Concert One" => "Concert One", "Condiment" => "Condiment", "Content" => "Content", "Contrail One" => "Contrail One", "Convergence" => "Convergence", "Cookie" => "Cookie", "Copse" => "Copse", "Corben" => "Corben", "Courgette" => "Courgette", "Cousine" => "Cousine", "Coustard" => "Coustard", "Covered By Your Grace" => "Covered By Your Grace", "Crafty Girls" => "Crafty Girls", "Creepster" => "Creepster", "Crete Round" => "Crete Round", "Crimson Text" => "Crimson Text", "Croissant One" => "Croissant One", "Crushed" => "Crushed", "Cuprum" => "Cuprum", "Cutive" => "Cutive", "Cutive Mono" => "Cutive Mono", "Damion" => "Damion", "Dancing Script" => "Dancing Script", "Dangrek" => "Dangrek", "Dawning of a New Day" => "Dawning of a New Day", "Days One" => "Days One", "Delius" => "Delius", "Delius Swash Caps" => "Delius Swash Caps", "Delius Unicase" => "Delius Unicase", "Della Respira" => "Della Respira", "Denk One" => "Denk One", "Devonshire" => "Devonshire", "Dhurjati" => "Dhurjati", "Didact Gothic" => "Didact Gothic", "Diplomata" => "Diplomata", "Diplomata SC" => "Diplomata SC", "Domine" => "Domine", "Donegal One" => "Donegal One", "Doppio One" => "Doppio One", "Dorsa" => "Dorsa", "Dosis" => "Dosis", "Dr Sugiyama" => "Dr Sugiyama", "Droid Sans" => "Droid Sans", "Droid Sans Mono" => "Droid Sans Mono", "Droid Serif" => "Droid Serif", "Duru Sans" => "Duru Sans", "Dynalight" => "Dynalight", "EB Garamond" => "EB Garamond", "Eagle Lake" => "Eagle Lake", "Eater" => "Eater", "Economica" => "Economica", "Ek Mukta" => "Ek Mukta", "Electrolize" => "Electrolize", "Elsie" => "Elsie", "Elsie Swash Caps" => "Elsie Swash Caps", "Emblema One" => "Emblema One", "Emilys Candy" => "Emilys Candy", "Engagement" => "Engagement", "Englebert" => "Englebert", "Enriqueta" => "Enriqueta", "Erica One" => "Erica One", "Esteban" => "Esteban", "Euphoria Script" => "Euphoria Script", "Ewert" => "Ewert", "Exo" => "Exo", "Exo 2" => "Exo 2", "Expletus Sans" => "Expletus Sans", "Fanwood Text" => "Fanwood Text", "Fascinate" => "Fascinate", "Fascinate Inline" => "Fascinate Inline", "Faster One" => "Faster One", "Fasthand" => "Fasthand", "Fauna One" => "Fauna One", "Federant" => "Federant", "Federo" => "Federo", "Felipa" => "Felipa", "Fenix" => "Fenix", "Finger Paint" => "Finger Paint", "Fira Mono" => "Fira Mono", "Fira Sans" => "Fira Sans", "Fjalla One" => "Fjalla One", "Fjord One" => "Fjord One", "Flamenco" => "Flamenco", "Flavors" => "Flavors", "Fondamento" => "Fondamento", "Fontdiner Swanky" => "Fontdiner Swanky", "Forum" => "Forum", "Francois One" => "Francois One", "Freckle Face" => "Freckle Face", "Fredericka the Great" => "Fredericka the Great", "Fredoka One" => "Fredoka One", "Freehand" => "Freehand", "Fresca" => "Fresca", "Frijole" => "Frijole", "Fruktur" => "Fruktur", "Fugaz One" => "Fugaz One", "GFS Didot" => "GFS Didot", "GFS Neohellenic" => "GFS Neohellenic", "Gabriela" => "Gabriela", "Gafata" => "Gafata", "Galdeano" => "Galdeano", "Galindo" => "Galindo", "Gentium Basic" => "Gentium Basic", "Gentium Book Basic" => "Gentium Book Basic", "Geo" => "Geo", "Geostar" => "Geostar", "Geostar Fill" => "Geostar Fill", "Germania One" => "Germania One", "Gidugu" => "Gidugu", "Gilda Display" => "Gilda Display", "Give You Glory" => "Give You Glory", "Glass Antiqua" => "Glass Antiqua", "Glegoo" => "Glegoo", "Gloria Hallelujah" => "Gloria Hallelujah", "Goblin One" => "Goblin One", "Gochi Hand" => "Gochi Hand", "Gorditas" => "Gorditas", "Goudy Bookletter 1911" => "Goudy Bookletter 1911", "Graduate" => "Graduate", "Grand Hotel" => "Grand Hotel", "Gravitas One" => "Gravitas One", "Great Vibes" => "Great Vibes", "Griffy" => "Griffy", "Gruppo" => "Gruppo", "Gudea" => "Gudea", "Gurajada" => "Gurajada", "Habibi" => "Habibi", "Halant" => "Halant", "Hammersmith One" => "Hammersmith One", "Hanalei" => "Hanalei", "Hanalei Fill" => "Hanalei Fill", "Handlee" => "Handlee", "Hanuman" => "Hanuman", "Happy Monkey" => "Happy Monkey", "Headland One" => "Headland One", "Henny Penny" => "Henny Penny", "Herr Von Muellerhoff" => "Herr Von Muellerhoff", "Hind" => "Hind", "Holtwood One SC" => "Holtwood One SC", "Homemade Apple" => "Homemade Apple", "Homenaje" => "Homenaje", "IM Fell DW Pica" => "IM Fell DW Pica", "IM Fell DW Pica SC" => "IM Fell DW Pica SC", "IM Fell Double Pica" => "IM Fell Double Pica", "IM Fell Double Pica SC" => "IM Fell Double Pica SC", "IM Fell English" => "IM Fell English", "IM Fell English SC" => "IM Fell English SC", "IM Fell French Canon" => "IM Fell French Canon", "IM Fell French Canon SC" => "IM Fell French Canon SC", "IM Fell Great Primer" => "IM Fell Great Primer", "IM Fell Great Primer SC" => "IM Fell Great Primer SC", "Iceberg" => "Iceberg", "Iceland" => "Iceland", "Imprima" => "Imprima", "Inconsolata" => "Inconsolata", "Inder" => "Inder", "Indie Flower" => "Indie Flower", "Inika" => "Inika", "Irish Grover" => "Irish Grover", "Istok Web" => "Istok Web", "Italiana" => "Italiana", "Italianno" => "Italianno", "Jacques Francois" => "Jacques Francois", "Jacques Francois Shadow" => "Jacques Francois Shadow", "Jim Nightshade" => "Jim Nightshade", "Jockey One" => "Jockey One", "Jolly Lodger" => "Jolly Lodger", "Josefin Sans" => "Josefin Sans", "Josefin Slab" => "Josefin Slab", "Joti One" => "Joti One", "Judson" => "Judson", "Julee" => "Julee", "Julius Sans One" => "Julius Sans One", "Junge" => "Junge", "Jura" => "Jura", "Just Another Hand" => "Just Another Hand", "Just Me Again Down Here" => "Just Me Again Down Here", "Kalam" => "Kalam", "Kameron" => "Kameron", "Kantumruy" => "Kantumruy", "Karla" => "Karla", "Karma" => "Karma", "Kaushan Script" => "Kaushan Script", "Kavoon" => "Kavoon", "Kdam Thmor" => "Kdam Thmor", "Keania One" => "Keania One", "Kelly Slab" => "Kelly Slab", "Kenia" => "Kenia", "Khand" => "Khand", "Khmer" => "Khmer", "Kite One" => "Kite One", "Knewave" => "Knewave", "Kotta One" => "Kotta One", "Koulen" => "Koulen", "Kranky" => "Kranky", "Kreon" => "Kreon", "Kristi" => "Kristi", "Krona One" => "Krona One", "La Belle Aurore" => "La Belle Aurore", "Laila" => "Laila", "Lakki Reddy" => "Lakki Reddy", "Lancelot" => "Lancelot", "Lato" => "Lato", "League Script" => "League Script", "Leckerli One" => "Leckerli One", "Ledger" => "Ledger", "Lekton" => "Lekton", "Lemon" => "Lemon", "Libre Baskerville" => "Libre Baskerville", "Life Savers" => "Life Savers", "Lilita One" => "Lilita One", "Lily Script One" => "Lily Script One", "Limelight" => "Limelight", "Linden Hill" => "Linden Hill", "Lobster" => "Lobster", "Lobster Two" => "Lobster Two", "Londrina Outline" => "Londrina Outline", "Londrina Shadow" => "Londrina Shadow", "Londrina Sketch" => "Londrina Sketch", "Londrina Solid" => "Londrina Solid", "Lora" => "Lora", "Love Ya Like A Sister" => "Love Ya Like A Sister", "Loved by the King" => "Loved by the King", "Lovers Quarrel" => "Lovers Quarrel", "Luckiest Guy" => "Luckiest Guy", "Lusitana" => "Lusitana", "Lustria" => "Lustria", "Macondo" => "Macondo", "Macondo Swash Caps" => "Macondo Swash Caps", "Magra" => "Magra", "Maiden Orange" => "Maiden Orange", "Mako" => "Mako", "Mallanna" => "Mallanna", "Mandali" => "Mandali", "Marcellus" => "Marcellus", "Marcellus SC" => "Marcellus SC", "Marck Script" => "Marck Script", "Margarine" => "Margarine", "Marko One" => "Marko One", "Marmelad" => "Marmelad", "Marvel" => "Marvel", "Mate" => "Mate", "Mate SC" => "Mate SC", "Maven Pro" => "Maven Pro", "McLaren" => "McLaren", "Meddon" => "Meddon", "MedievalSharp" => "MedievalSharp", "Medula One" => "Medula One", "Megrim" => "Megrim", "Meie Script" => "Meie Script", "Merienda" => "Merienda", "Merienda One" => "Merienda One", "Merriweather" => "Merriweather", "Merriweather Sans" => "Merriweather Sans", "Metal" => "Metal", "Metal Mania" => "Metal Mania", "Metamorphous" => "Metamorphous", "Metrophobic" => "Metrophobic", "Michroma" => "Michroma", "Milonga" => "Milonga", "Miltonian" => "Miltonian", "Miltonian Tattoo" => "Miltonian Tattoo", "Miniver" => "Miniver", "Miss Fajardose" => "Miss Fajardose", "Modern Antiqua" => "Modern Antiqua", "Molengo" => "Molengo", "Molle" => "Molle", "Monda" => "Monda", "Monofett" => "Monofett", "Monoton" => "Monoton", "Monsieur La Doulaise" => "Monsieur La Doulaise", "Montaga" => "Montaga", "Montez" => "Montez", "Montserrat" => "Montserrat", "Montserrat Alternates" => "Montserrat Alternates", "Montserrat Subrayada" => "Montserrat Subrayada", "Moul" => "Moul", "Moulpali" => "Moulpali", "Mountains of Christmas" => "Mountains of Christmas", "Mouse Memoirs" => "Mouse Memoirs", "Mr Bedfort" => "Mr Bedfort", "Mr Dafoe" => "Mr Dafoe", "Mr De Haviland" => "Mr De Haviland", "Mrs Saint Delafield" => "Mrs Saint Delafield", "Mrs Sheppards" => "Mrs Sheppards", "Muli" => "Muli", "Mystery Quest" => "Mystery Quest", "NTR" => "NTR", "Neucha" => "Neucha", "Neuton" => "Neuton", "New Rocker" => "New Rocker", "News Cycle" => "News Cycle", "Niconne" => "Niconne", "Nixie One" => "Nixie One", "Nobile" => "Nobile", "Nokora" => "Nokora", "Norican" => "Norican", "Nosifer" => "Nosifer", "Nothing You Could Do" => "Nothing You Could Do", "Noticia Text" => "Noticia Text", "Noto Sans" => "Noto Sans", "Noto Serif" => "Noto Serif", "Nova Cut" => "Nova Cut", "Nova Flat" => "Nova Flat", "Nova Mono" => "Nova Mono", "Nova Oval" => "Nova Oval", "Nova Round" => "Nova Round", "Nova Script" => "Nova Script", "Nova Slim" => "Nova Slim", "Nova Square" => "Nova Square", "Numans" => "Numans", "Nunito" => "Nunito", "Odor Mean Chey" => "Odor Mean Chey", "Offside" => "Offside", "Old Standard TT" => "Old Standard TT", "Oldenburg" => "Oldenburg", "Oleo Script" => "Oleo Script", "Oleo Script Swash Caps" => "Oleo Script Swash Caps", "Open Sans" => "Open Sans", "Open Sans Condensed" => "Open Sans Condensed", "Oranienbaum" => "Oranienbaum", "Orbitron" => "Orbitron", "Oregano" => "Oregano", "Orienta" => "Orienta", "Original Surfer" => "Original Surfer", "Oswald" => "Oswald", "Over the Rainbow" => "Over the Rainbow", "Overlock" => "Overlock", "Overlock SC" => "Overlock SC", "Ovo" => "Ovo", "Oxygen" => "Oxygen", "Oxygen Mono" => "Oxygen Mono", "PT Mono" => "PT Mono", "PT Sans" => "PT Sans", "PT Sans Caption" => "PT Sans Caption", "PT Sans Narrow" => "PT Sans Narrow", "PT Serif" => "PT Serif", "PT Serif Caption" => "PT Serif Caption", "Pacifico" => "Pacifico", "Paprika" => "Paprika", "Parisienne" => "Parisienne", "Passero One" => "Passero One", "Passion One" => "Passion One", "Pathway Gothic One" => "Pathway Gothic One", "Patrick Hand" => "Patrick Hand", "Patrick Hand SC" => "Patrick Hand SC", "Patua One" => "Patua One", "Paytone One" => "Paytone One", "Peddana" => "Peddana", "Peralta" => "Peralta", "Permanent Marker" => "Permanent Marker", "Petit Formal Script" => "Petit Formal Script", "Petrona" => "Petrona", "Philosopher" => "Philosopher", "Piedra" => "Piedra", "Pinyon Script" => "Pinyon Script", "Pirata One" => "Pirata One", "Plaster" => "Plaster", "Play" => "Play", "Playball" => "Playball", "Playfair Display" => "Playfair Display", "Playfair Display SC" => "Playfair Display SC", "Podkova" => "Podkova", "Poiret One" => "Poiret One", "Poller One" => "Poller One", "Poly" => "Poly", "Pompiere" => "Pompiere", "Pontano Sans" => "Pontano Sans", "Port Lligat Sans" => "Port Lligat Sans", "Port Lligat Slab" => "Port Lligat Slab", "Prata" => "Prata", "Preahvihear" => "Preahvihear", "Press Start 2P" => "Press Start 2P", "Princess Sofia" => "Princess Sofia", "Prociono" => "Prociono", "Prosto One" => "Prosto One", "Puritan" => "Puritan", "Purple Purse" => "Purple Purse", "Quando" => "Quando", "Quantico" => "Quantico", "Quattrocento" => "Quattrocento", "Quattrocento Sans" => "Quattrocento Sans", "Questrial" => "Questrial", "Quicksand" => "Quicksand", "Quintessential" => "Quintessential", "Qwigley" => "Qwigley", "Racing Sans One" => "Racing Sans One", "Radley" => "Radley", "Rajdhani" => "Rajdhani", "Raleway" => "Raleway", "Raleway Dots" => "Raleway Dots", "Ramabhadra" => "Ramabhadra", "Ramaraja" => "Ramaraja", "Rambla" => "Rambla", "Rammetto One" => "Rammetto One", "Ranchers" => "Ranchers", "Rancho" => "Rancho", "Rationale" => "Rationale", "Ravi Prakash" => "Ravi Prakash", "Redressed" => "Redressed", "Reenie Beanie" => "Reenie Beanie", "Revalia" => "Revalia", "Ribeye" => "Ribeye", "Ribeye Marrow" => "Ribeye Marrow", "Righteous" => "Righteous", "Risque" => "Risque", "Roboto" => "Roboto", "Roboto Condensed" => "Roboto Condensed", "Roboto Slab" => "Roboto Slab", "Rochester" => "Rochester", "Rock Salt" => "Rock Salt", "Rokkitt" => "Rokkitt", "Romanesco" => "Romanesco", "Ropa Sans" => "Ropa Sans", "Rosario" => "Rosario", "Rosarivo" => "Rosarivo", "Rouge Script" => "Rouge Script", "Rozha One" => "Rozha One", "Rubik Mono One" => "Rubik Mono One", "Rubik One" => "Rubik One", "Ruda" => "Ruda", "Rufina" => "Rufina", "Ruge Boogie" => "Ruge Boogie", "Ruluko" => "Ruluko", "Rum Raisin" => "Rum Raisin", "Ruslan Display" => "Ruslan Display", "Russo One" => "Russo One", "Ruthie" => "Ruthie", "Rye" => "Rye", "Sacramento" => "Sacramento", "Sail" => "Sail", "Salsa" => "Salsa", "Sanchez" => "Sanchez", "Sancreek" => "Sancreek", "Sansita One" => "Sansita One", "Sarina" => "Sarina", "Sarpanch" => "Sarpanch", "Satisfy" => "Satisfy", "Scada" => "Scada", "Schoolbell" => "Schoolbell", "Seaweed Script" => "Seaweed Script", "Sevillana" => "Sevillana", "Seymour One" => "Seymour One", "Shadows Into Light" => "Shadows Into Light", "Shadows Into Light Two" => "Shadows Into Light Two", "Shanti" => "Shanti", "Share" => "Share", "Share Tech" => "Share Tech", "Share Tech Mono" => "Share Tech Mono", "Shojumaru" => "Shojumaru", "Short Stack" => "Short Stack", "Siemreap" => "Siemreap", "Sigmar One" => "Sigmar One", "Signika" => "Signika", "Signika Negative" => "Signika Negative", "Simonetta" => "Simonetta", "Sintony" => "Sintony", "Sirin Stencil" => "Sirin Stencil", "Six Caps" => "Six Caps", "Skranji" => "Skranji", "Slabo 13px" => "Slabo 13px", "Slabo 27px" => "Slabo 27px", "Slackey" => "Slackey", "Smokum" => "Smokum", "Smythe" => "Smythe", "Sniglet" => "Sniglet", "Snippet" => "Snippet", "Snowburst One" => "Snowburst One", "Sofadi One" => "Sofadi One", "Sofia" => "Sofia", "Sonsie One" => "Sonsie One", "Sorts Mill Goudy" => "Sorts Mill Goudy", "Source Code Pro" => "Source Code Pro", "Source Sans Pro" => "Source Sans Pro", "Source Serif Pro" => "Source Serif Pro", "Special Elite" => "Special Elite", "Spicy Rice" => "Spicy Rice", "Spinnaker" => "Spinnaker", "Spirax" => "Spirax", "Squada One" => "Squada One", "Sree Krushnadevaraya" => "Sree Krushnadevaraya", "Stalemate" => "Stalemate", "Stalinist One" => "Stalinist One", "Stardos Stencil" => "Stardos Stencil", "Stint Ultra Condensed" => "Stint Ultra Condensed", "Stint Ultra Expanded" => "Stint Ultra Expanded", "Stoke" => "Stoke", "Strait" => "Strait", "Sue Ellen Francisco" => "Sue Ellen Francisco", "Sunshiney" => "Sunshiney", "Supermercado One" => "Supermercado One", "Suranna" => "Suranna", "Suravaram" => "Suravaram", "Suwannaphum" => "Suwannaphum", "Swanky and Moo Moo" => "Swanky and Moo Moo", "Syncopate" => "Syncopate", "Tangerine" => "Tangerine", "Taprom" => "Taprom", "Tauri" => "Tauri", "Teko" => "Teko", "Telex" => "Telex", "Tenali Ramakrishna" => "Tenali Ramakrishna", "Tenor Sans" => "Tenor Sans", "Text Me One" => "Text Me One", "The Girl Next Door" => "The Girl Next Door", "Tienne" => "Tienne", "Timmana" => "Timmana", "Tinos" => "Tinos", "Titan One" => "Titan One", "Titillium Web" => "Titillium Web", "Trade Winds" => "Trade Winds", "Trocchi" => "Trocchi", "Trochut" => "Trochut", "Trykker" => "Trykker", "Tulpen One" => "Tulpen One", "Ubuntu" => "Ubuntu", "Ubuntu Condensed" => "Ubuntu Condensed", "Ubuntu Mono" => "Ubuntu Mono", "Ultra" => "Ultra", "Uncial Antiqua" => "Uncial Antiqua", "Underdog" => "Underdog", "Unica One" => "Unica One", "UnifrakturCook" => "UnifrakturCook", "UnifrakturMaguntia" => "UnifrakturMaguntia", "Unkempt" => "Unkempt", "Unlock" => "Unlock", "Unna" => "Unna", "VT323" => "VT323", "Vampiro One" => "Vampiro One", "Varela" => "Varela", "Varela Round" => "Varela Round", "Vast Shadow" => "Vast Shadow", "Vesper Libre" => "Vesper Libre", "Vibur" => "Vibur", "Vidaloka" => "Vidaloka", "Viga" => "Viga", "Voces" => "Voces", "Volkhov" => "Volkhov", "Vollkorn" => "Vollkorn", "Voltaire" => "Voltaire", "Waiting for the Sunrise" => "Waiting for the Sunrise", "Wallpoet" => "Wallpoet", "Walter Turncoat" => "Walter Turncoat", "Warnes" => "Warnes", "Wellfleet" => "Wellfleet", "Wendy One" => "Wendy One", "Wire One" => "Wire One", "Yanone Kaffeesatz" => "Yanone Kaffeesatz", "Yellowtail" => "Yellowtail", "Yeseva One" => "Yeseva One", "Yesteryear" => "Yesteryear", "Zeyada" => "Zeyada");

YoPressBase::instance()->registerAdminPage(__('General', THEME_NAME), 'general-settings', 1);
YoPressBase::instance()->registerAdminPageSettings('general-settings', 'generalSettings', __('General', THEME_NAME), '', 1);
YoPressBase::instance()->registerAdminPageSettings('general-settings', 'excerptSettings', __('Excerpt settings', THEME_NAME), __('Description', THEME_NAME), 1);
YoPressBase::instance()->registerAdminPageSettings('general-settings', 'teamSettings', __('Team settings', THEME_NAME), __('Description', THEME_NAME), 1);

YoPressBase::instance()->registerAdminPage(__('Mobile', THEME_NAME), 'mobile-settings', 1);
YoPressBase::instance()->registerAdminPageSettings('mobile-settings', 'mobileSettings', __('Mobile', THEME_NAME), '', 1);

YoPressBase::instance()->registerAdminPage(__('Blog', THEME_NAME), 'blog', 1);
YoPressBase::instance()->registerAdminPageSettings('blog', 'blogSettings', __('Blog', THEME_NAME), '', 1);

YoPressBase::instance()->registerAdminPage(__('Footer', THEME_NAME), 'footer', 1);
YoPressBase::instance()->registerAdminPageSettings('footer', 'footerSettings', __('Footer General Settings', THEME_NAME), '', 1);
YoPressBase::instance()->registerAdminPageSettings('footer', 'footerSettingsRestaurant', __('Footer on Restaurant Page', THEME_NAME), '', 1);

if (barnelli_isPluginActive('woocommerce/woocommerce.php')) {
	YoPressBase::instance()->registerAdminPageSettings('footer', 'footerSettingsMenu', __('Footer on WooCommerce Menu Page', THEME_NAME), '', 1);
}

YoPressBase::instance()->registerAdminPage(__('Appearance', THEME_NAME), 'appearance', 1);
YoPressBase::instance()->registerAdminPageSettings('appearance', 'appearanceSettings', __('Appearance', THEME_NAME), '', 1);
YoPressBase::instance()->registerAdminPageSettings('appearance', 'logoSettings', __('Logo & Favicon', THEME_NAME), '', 1);
YoPressBase::instance()->registerAdminPageSettings('appearance', 'scrollbarSettings', __('Scrollbar', THEME_NAME), '', 1);
YoPressBase::instance()->registerAdminPageSettings('appearance', 'youtubeSettings', __('Youtube', THEME_NAME), '', 1);
YoPressBase::instance()->registerAdminPageSettings('appearance', 'fontsColorsSettings', __('Navigation Fonts & Colors', THEME_NAME), '', 1);
YoPressBase::instance()->registerAdminPageSettings('appearance', 'mobileNavigationColor', __('Mobile Navigation Colors', THEME_NAME), '', 1);


YoPressBase::instance()->registerAdminPageSettings('appearance', 'topAppearance', __('Top Navigation Bar Appearance', THEME_NAME), '', 1);


YoPressBase::instance()->registerAdminPage(__('Slider', THEME_NAME), 'slider', 1);
YoPressBase::instance()->registerAdminPageSettings('slider', 'sliderSettings', __('Slider', THEME_NAME), '', 1);

YoPressBase::instance()->registerAdminPage(__('Full Screen Video', THEME_NAME), 'video', 1);
YoPressBase::instance()->registerAdminPageSettings('video', 'videoMobileImage', __('Mobile', THEME_NAME), '', 1);
YoPressBase::instance()->registerAdminPageSettings('video', 'videoAddress', __('Video', THEME_NAME), '', 1);
YoPressBase::instance()->registerAdminPageSettings('video', 'videoSettings', __('Settings', THEME_NAME), '', 1);

YoPressBase::instance()->registerAdminPage(__('Contact page', THEME_NAME), 'contact', 7);

YoPressBase::instance()->registerAdminPageSettings('contact', 'contactMap', __('Map', THEME_NAME), __('Description', THEME_NAME), 1);
YoPressBase::instance()->registerAdminPageSettings('contact', 'contactPlaceholders', __('Contact Form', THEME_NAME), __('Description', THEME_NAME), 1);
YoPressBase::instance()->registerAdminPageSettings('contact', 'contactAddress', __('Phone &amp; address', THEME_NAME), __('Description', THEME_NAME), 1);
YoPressBase::instance()->registerAdminPageSettings('contact', 'contactInfo', __('Info', THEME_NAME), __('Description', THEME_NAME), 1);

YoPressBase::instance()->registerAdminPage(__('Multiple Contact page', THEME_NAME), 'contactMultiple', 7);
YoPressBase::instance()->registerAdminPageSettings('contactMultiple', 'multipleContactMap', __('Map', THEME_NAME), __('Description', THEME_NAME), 1);
YoPressBase::instance()->registerAdminPageSettings('contactMultiple', 'multipleContactInfo', __('Info', THEME_NAME), __('Description', THEME_NAME), 1);
YoPressBase::instance()->registerAdminPageSettings('contactMultiple', 'multipleContactPlaceholders', __('Contact Form', THEME_NAME), __('Description', THEME_NAME), 1);
YoPressBase::instance()->registerAdminPageSettings('contactMultiple', 'multipleContactCaptcha', __('Settings', THEME_NAME), __('Description', THEME_NAME), 1);

YoPressBase::instance()->registerAdminPage( __('Reservation', THEME_NAME), 'reservation', 1 );
YoPRessBase::instance()->registerAdminPageSettings( 'reservation', 'reservationCaptcha', __('Reservation captcha', THEME_NAME), '', 1);
YoPressBase::instance()->registerAdminPageSettings( 'reservation', 'reservationSettings', __('Reservation config', THEME_NAME), '', 1 );
YoPressBase::instance()->registerAdminPageSettings( 'reservation', 'reservationTranslation', __('Reservation Translation', THEME_NAME), '', 1 );
YoPressBase::instance()->registerAdminPageSettings( 'reservation', 'reservationValidation', __('Reservation Validation', THEME_NAME), '', 1 );

// YoPressBase::instance()->registerAdminPage( __('Reservation Log', THEME_NAME), 'reservation-log', 1 );
// YoPRessBase::instance()->registerAdminPageSettings( 'reservation-log', 'reservationLog', __('Reservation Log', THEME_NAME), '', 1);

YoPressBase::instance()->registerAdminPage( __('Opening times', THEME_NAME), 'opening', 1 );
YoPressBase::instance()->registerAdminPageSettings( 'opening', 'openingSettings', __('Opening times', THEME_NAME), '', 1 );
YoPressBase::instance()->registerAdminPageSettings( 'opening', 'openingLabels', __('Opening labels', THEME_NAME), '', 1 );
//YoPressBase::instance()->registerAdminPageSettings( 'opening', 'closingSettings', __('Date ranges when restaurant is closed', THEME_NAME), '', 1 );
YoPressBase::instance()->registerAdminPageSettings( 'opening', 'timezoneSettings', __('Time Zone', THEME_NAME), '', 1 );

YoPressBase::instance()->registerAdminPage( __('Custom Food Menus', THEME_NAME), 'custommenu', 1 );
YoPressBase::instance()->registerAdminPageSettings( 'custommenu', 'customMenuSettings', __('Custom menus', THEME_NAME), '', 1 );

YoPressBase::instance()->registerAdminPage(__('Demo Importer', THEME_NAME), 'demoimporter', 20);
YoPressBase::instance()->registerAdminPageSettings('demoimporter', 'demoImporter', __('Demo Importer', THEME_NAME), __('Description', THEME_NAME), 1);

function drawDemoImport() {
	global $yopress_Demo_Importer;

	$yopress_Demo_Importer->show_import();
}

$tmp = YSettings::g('dynamic_menu_list', 'foodmenu[:space:]Food Menu');
$tmp_barnelli_menuList = explode('[:split:]', $tmp);

$barnelli_menuList = array();

foreach ($tmp_barnelli_menuList as $key => $value) {
	if (!empty($value)) {
		$barnelli_menuList[] = $value;
	}	
}

foreach ($barnelli_menuList as $foodmenu) {
	global $barnelli_fontsArray;

	$m = explode('[:space:]', $foodmenu);
	$barnelli_foodMenuSlug = $m[0];
	$barnelli_foodMenuName = $m[1];	

	YoPressBase::instance()->registerAdminPage(__t($barnelli_foodMenuName), $barnelli_foodMenuSlug , 1);

	YoPressBase::instance()->registerAdminPageSettingsWithParam($barnelli_foodMenuSlug, create_function('$barnelli_foodMenuSlug', '
		return array(
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_menu_type",
				"type" => "dropdown",
				"label" => __t("Menu Type"),
				"default" => array(
					"1" => "List",
					"2" => "Grid",
					"3" => "Photo Grid",
				),
				"htmlOptions" => array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_menu_style",
				"type" => "dropdown",
				"label" => __t("Menu Style"),
				"default" => array(
					"bullets" => "With Bullets",
					"no-bullets" => "Without Bullets",
				),
				"htmlOptions" => array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_colorbox",
				"type" => "checkbox",
				"label" => __t("Enable Colorbox Gallery"),
				"default" => "1",
				"htmlOptions" => array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_center_menu",
				"type" => "checkbox",
				"label" => __t("Center Menu Items"),
				"default" => "0",
				"htmlOptions" => array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_number_of_prices",
				"type" => "dropdown",
				"label" => __t("Number of prices"),
				"default" => array(
					"1" => "1",
					"2" => "2",
					"3" => "3",
					"4" => "4",
					"5" => "5"
				),
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_grid_mod",
				"type" => "dropdown",
				"label" => __t("Number of Menu Columns"),
				"default" => array(
					"6" => "2",
					"4" => "3",
					"3" => "4"
				),
				"htmlOptions" => array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_top_menu_font_color",
				"type" => "colorpicker",
				"label" => __t("Menu Title Color (Page Title)<br/><small>ie. Our Tasty menu or Menu</small>"),
				"default" => "#ffffff",
				"htmlOptions" =>array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_top_menu_font_size",
				"type" => "input",
				"label" => __t("Menu Title Size (Page Title)<br/><small>ie. Our Tasty menu or Menu</small>"),
				"default" => 20,
				"htmlOptions" =>array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_cat_font_color",
				"type" => "colorpicker",
				"label" => __t("Food Category Color<br/><small>ie. Main Dishes</small>"),
				"default" => "#ffffff",
				"htmlOptions" =>array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_cat_font_size",
				"type" => "input",
				"label" => __t("Food Category Size<br/><small>ie. Main Dishes</small>"),
				"default" => 20,
				"htmlOptions" =>array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_cat_description_font_color",
				"type" => "colorpicker",
				"label" => __t("Food Category Description Color"),
				"default" => "#ffffff",
				"htmlOptions" =>array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_cat_description_font_size",
				"type" => "input",
				"label" => __t("Food Category Description Size"),
				"default" => 20,
				"htmlOptions" =>array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_title_font_color",
				"type" => "colorpicker",
				"label" => __t("Food Item Color<br/><small>ie. Pizza Pepperoni (small portion)</small>"),
				"default" => "#ffffff",
				"htmlOptions" =>array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_title_font_size",
				"type" => "input",
				"label" => __t("Food Item Size<br/><small>ie. Pizza Pepperoni (small portion)</small>"),
				"default" => 20,
				"htmlOptions" =>array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_description_font_color",
				"type" => "colorpicker",
				"label" => __t("Description Font Color<br/><small>ie. cheese, sauce, pepperoni</small>"),
				"default" => "#a4a4a4",
				"htmlOptions" =>array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_description_font_size",
				"type" => "input",
				"label" => __t("Description Font Size<br/><small>ie. cheese, sauce, pepperoni</small>"),
				"default" => 20,
				"htmlOptions" =>array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_price_currency",
				"type" => "input",
				"label" => __t("Currency Sign<br/><small>ie. $, &#128;, &pound; etc.</small>"),
				"default" => "",
				"htmlOptions" => array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_price_font_color",
				"type" => "colorpicker",
				"label" => __t("Price Color"),
				"default" => "#ffffff",
				"htmlOptions" =>array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_price_font_size",
				"type" => "input",
				"label" => __t("Price Size"),
				"default" => 20,
				"htmlOptions" =>array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_currency_side",
				"type" => "dropdown",
				"label" => __t("Currency Sign Position"),
				"default" => array(
					"left" => "left",
					"right" => "right",
					"none" => "none"
					),
				"htmlOptions" => array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_seperator_color",
				"type" => "colorpicker",
				"label" => __t("Category separator color<br/><small>(menu type 2 and 3 only)</small>"),
				"default" => "#ffffff",
				"htmlOptions" =>array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_bg_image",
				"type" => "uploader",
				"label" => __t( "Menu Background <br/><small>Chalkboard url: ".THEME_DIR_URI . "/img/chalkboard-loop.jpg</small>" ),
				"default" => "",
				"htmlOptions" => array()
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_bg_color",
				"type" => "colorpicker",
				"label" => __t("Background Color"),
				"default" => "#000000",
				"htmlOptions" =>array()
			),
			array(
				"name"=>"dynamic_".$barnelli_foodMenuSlug."_menu_font",
				"type" => "fontpicker",
				"label" => __t("Menu Font"),
				"htmlOptions" => array(),
				"default" => array("Covered By Your Grace" => "Covered By Your Grace", "Abel" => "Abel", "Abril Fatface" => "Abril Fatface", "Aclonica" => "Aclonica", "Acme" => "Acme", "Actor" => "Actor", "Adamina" => "Adamina", "Advent Pro" => "Advent Pro", "Aguafina Script" => "Aguafina Script", "Aladin" => "Aladin", "Aldrich" => "Aldrich", "Alegreya" => "Alegreya", "Alegreya SC" => "Alegreya SC", "Alex Brush" => "Alex Brush", "Alfa Slab One" => "Alfa Slab One", "Alice" => "Alice", "Alike" => "Alike", "Alike Angular" => "Alike Angular", "Allan" => "Allan", "Allerta" => "Allerta", "Allerta Stencil" => "Allerta Stencil", "Allura" => "Allura", "Almendra" => "Almendra", "Almendra SC" => "Almendra SC", "Amaranth" => "Amaranth", "Amatic SC" => "Amatic SC", "Amethysta" => "Amethysta", "Andada" => "Andada", "Andika" => "Andika", "Angkor" => "Angkor", "Annie Use Your Telescope" => "Annie Use Your Telescope", "Anonymous Pro" => "Anonymous Pro", "Antic" => "Antic", "Antic Didone" => "Antic Didone", "Antic Slab" => "Antic Slab", "Anton" => "Anton", "Arapey" => "Arapey", "Arbutus" => "Arbutus", "Architects Daughter" => "Architects Daughter", "Arimo" => "Arimo", "Arizonia" => "Arizonia", "Armata" => "Armata", "Artifika" => "Artifika", "Arvo" => "Arvo", "Asap" => "Asap", "Asset" => "Asset", "Astloch" => "Astloch", "Asul" => "Asul", "Atomic Age" => "Atomic Age", "Aubrey" => "Aubrey", "Audiowide" => "Audiowide", "Average" => "Average", "Averia Gruesa Libre" => "Averia Gruesa Libre", "Averia Libre" => "Averia Libre", "Averia Sans Libre" => "Averia Sans Libre", "Averia Serif Libre" => "Averia Serif Libre", "Bad Script" => "Bad Script", "Balthazar" => "Balthazar", "Bangers" => "Bangers", "Basic" => "Basic", "Battambang" => "Battambang", "Baumans" => "Baumans", "Bayon" => "Bayon", "Belgrano" => "Belgrano", "Belleza" => "Belleza", "Bentham" => "Bentham", "Berkshire Swash" => "Berkshire Swash", "Bevan" => "Bevan", "Bigshot One" => "Bigshot One", "Bilbo" => "Bilbo", "Bilbo Swash Caps" => "Bilbo Swash Caps", "Bitter" => "Bitter", "Black Ops One" => "Black Ops One", "Bokor" => "Bokor", "Bonbon" => "Bonbon", "Boogaloo" => "Boogaloo", "Bowlby One" => "Bowlby One", "Bowlby One SC" => "Bowlby One SC", "Brawler" => "Brawler", "Bree Serif" => "Bree Serif", "Bubblegum Sans" => "Bubblegum Sans", "Buda" => "Buda", "Buenard" => "Buenard", "Butcherman" => "Butcherman", "Butterfly Kids" => "Butterfly Kids", "Cabin" => "Cabin", "Cabin Condensed" => "Cabin Condensed", "Cabin Sketch" => "Cabin Sketch", "Caesar Dressing" => "Caesar Dressing", "Cagliostro" => "Cagliostro", "Calligraffitti" => "Calligraffitti", "Cambo" => "Cambo", "Candal" => "Candal", "Cantarell" => "Cantarell", "Cantata One" => "Cantata One", "Cardo" => "Cardo", "Carme" => "Carme", "Carter One" => "Carter One", "Caudex" => "Caudex", "Cedarville Cursive" => "Cedarville Cursive", "Ceviche One" => "Ceviche One", "Changa One" => "Changa One", "Chango" => "Chango", "Chau Philomene One" => "Chau Philomene One", "Chelsea Market" => "Chelsea Market", "Chenla" => "Chenla", "Cherry Cream Soda" => "Cherry Cream Soda", "Chewy" => "Chewy", "Chicle" => "Chicle", "Chivo" => "Chivo", "Coda" => "Coda", "Codystar" => "Codystar", "Comfortaa" => "Comfortaa", "Coming Soon" => "Coming Soon", "Concert One" => "Concert One", "Condiment" => "Condiment", "Content" => "Content", "Contrail One" => "Contrail One", "Convergence" => "Convergence", "Cookie" => "Cookie", "Copse" => "Copse", "Corben" => "Corben", "Cousine" => "Cousine", "Coustard" => "Coustard", "Crafty Girls" => "Crafty Girls", "Creepster" => "Creepster", "Crete Round" => "Crete Round", "Crimson Text" => "Crimson Text", "Crushed" => "Crushed", "Cuprum" => "Cuprum", "Cutive" => "Cutive", "Damion" => "Damion", "Dancing Script" => "Dancing Script", "Dangrek" => "Dangrek", "Dawning of a New Day" => "Dawning of a New Day", "Days One" => "Days One", "Delius" => "Delius", "Delius Swash Caps" => "Delius Swash Caps", "Delius Unicase" => "Delius Unicase", "Della Respira" => "Della Respira", "Devonshire" => "Devonshire", "Didact Gothic" => "Didact Gothic", "Diplomata" => "Diplomata", "Diplomata SC" => "Diplomata SC", "Doppio One" => "Doppio One", "Dorsa" => "Dorsa", "Dosis" => "Dosis", "Dr Sugiyama" => "Dr Sugiyama", "Droid Sans" => "Droid Sans", "Droid Sans Mono" => "Droid Sans Mono", "Droid Serif" => "Droid Serif", "Duru Sans" => "Duru Sans", "Dynalight" => "Dynalight", "EB Garamond" => "EB Garamond", "Eater" => "Eater", "Economica" => "Economica", "Electrolize" => "Electrolize", "Emblema One" => "Emblema One", "Emilys Candy" => "Emilys Candy", "Engagement" => "Engagement", "Enriqueta" => "Enriqueta", "Erica One" => "Erica One", "Esteban" => "Esteban", "Euphoria Script" => "Euphoria Script", "Ewert" => "Ewert", "Exo" => "Exo", "Expletus Sans" => "Expletus Sans", "Fanwood Text" => "Fanwood Text", "Fascinate" => "Fascinate", "Fascinate Inline" => "Fascinate Inline", "Federant" => "Federant", "Federo" => "Federo", "Felipa" => "Felipa", "Fjalla One" => "Fjalla One", "Fjord One" => "Fjord One", "Flamenco" => "Flamenco", "Flavors" => "Flavors", "Fondamento" => "Fondamento", "Fontdiner Swanky" => "Fontdiner Swanky", "Forum" => "Forum", "Francois One" => "Francois One", "Fredericka the Great" => "Fredericka the Great", "Fredoka One" => "Fredoka One", "Freehand" => "Freehand", "Fresca" => "Fresca", "Frijole" => "Frijole", "Fugaz One" => "Fugaz One", "GFS Didot" => "GFS Didot", "GFS Neohellenic" => "GFS Neohellenic", "Galdeano" => "Galdeano", "Gentium Basic" => "Gentium Basic", "Gentium Book Basic" => "Gentium Book Basic", "Geo" => "Geo", "Geostar" => "Geostar", "Geostar Fill" => "Geostar Fill", "Germania One" => "Germania One", "Gilda Display" => "Gilda Display", "Give You Glory" => "Give You Glory", "Glass Antiqua" => "Glass Antiqua", "Glegoo" => "Glegoo", "Gloria Hallelujah" => "Gloria Hallelujah", "Goblin One" => "Goblin One", "Gochi Hand" => "Gochi Hand", "Gorditas" => "Gorditas", "Goudy Bookletter 1911" => "Goudy Bookletter 1911", "Graduate" => "Graduate", "Gravitas One" => "Gravitas One", "Great Vibes" => "Great Vibes", "Gruppo" => "Gruppo", "Gudea" => "Gudea", "Habibi" => "Habibi", "Hammersmith One" => "Hammersmith One", "Handlee" => "Handlee", "Hanuman" => "Hanuman", "Happy Monkey" => "Happy Monkey", "Henny Penny" => "Henny Penny", "Herr Von Muellerhoff" => "Herr Von Muellerhoff", "Holtwood One SC" => "Holtwood One SC", "Homemade Apple" => "Homemade Apple", "Homenaje" => "Homenaje", "IM Fell DW Pica" => "IM Fell DW Pica", "IM Fell DW Pica SC" => "IM Fell DW Pica SC", "IM Fell Double Pica" => "IM Fell Double Pica", "IM Fell Double Pica SC" => "IM Fell Double Pica SC", "IM Fell English" => "IM Fell English", "IM Fell English SC" => "IM Fell English SC", "IM Fell French Canon" => "IM Fell French Canon", "IM Fell French Canon SC" => "IM Fell French Canon SC", "IM Fell Great Primer" => "IM Fell Great Primer", "IM Fell Great Primer SC" => "IM Fell Great Primer SC", "Iceberg" => "Iceberg", "Iceland" => "Iceland", "Imprima" => "Imprima", "Inconsolata" => "Inconsolata", "Inder" => "Inder", "Indie Flower" => "Indie Flower", "Inika" => "Inika", "Irish Grover" => "Irish Grover", "Istok Web" => "Istok Web", "Italiana" => "Italiana", "Italianno" => "Italianno", "Jim Nightshade" => "Jim Nightshade", "Jockey One" => "Jockey One", "Jolly Lodger" => "Jolly Lodger", "Josefin Sans" => "Josefin Sans", "Josefin Slab" => "Josefin Slab", "Judson" => "Judson", "Julee" => "Julee", "Junge" => "Junge", "Jura" => "Jura", "Just Another Hand" => "Just Another Hand", "Just Me Again Down Here" => "Just Me Again Down Here", "Kameron" => "Kameron", "Karla" => "Karla", "Kaushan Script" => "Kaushan Script", "Kelly Slab" => "Kelly Slab", "Kenia" => "Kenia", "Khmer" => "Khmer", "Knewave" => "Knewave", "Kotta One" => "Kotta One", "Koulen" => "Koulen", "Kranky" => "Kranky", "Kreon" => "Kreon", "Kristi" => "Kristi", "Krona One" => "Krona One", "La Belle Aurore" => "La Belle Aurore", "Lancelot" => "Lancelot", "Lato" => "Lato", "League Script" => "League Script", "Leckerli One" => "Leckerli One", "Ledger" => "Ledger", "Lekton" => "Lekton", "Lemon" => "Lemon", "Lilita One" => "Lilita One", "Limelight" => "Limelight", "Linden Hill" => "Linden Hill", "Lobster" => "Lobster", "Lobster Two" => "Lobster Two", "Londrina Outline" => "Londrina Outline", "Londrina Shadow" => "Londrina Shadow", "Londrina Sketch" => "Londrina Sketch", "Londrina Solid" => "Londrina Solid", "Lora" => "Lora", "Love Ya Like A Sister" => "Love Ya Like A Sister", "Loved by the King" => "Loved by the King", "Lovers Quarrel" => "Lovers Quarrel", "Luckiest Guy" => "Luckiest Guy", "Lusitana" => "Lusitana", "Lustria" => "Lustria", "Macondo" => "Macondo", "Macondo Swash Caps" => "Macondo Swash Caps", "Magra" => "Magra", "Maiden Orange" => "Maiden Orange", "Mako" => "Mako", "Marcellus" => "Marcellus", "Marcellus SC" => "Marcellus SC", "Marck Script" => "Marck Script", "Marko One" => "Marko One", "Marmelad" => "Marmelad", "Marvel" => "Marvel", "Mate" => "Mate", "Mate SC" => "Mate SC", "Maven Pro" => "Maven Pro", "Meddon" => "Meddon", "MedievalSharp" => "MedievalSharp", "Medula One" => "Medula One", "Megrim" => "Megrim", "Merienda One" => "Merienda One", "Merriweather" => "Merriweather", "Metal" => "Metal", "Metamorphous" => "Metamorphous", "Metrophobic" => "Metrophobic", "Michroma" => "Michroma", "Miltonian" => "Miltonian", "Miltonian Tattoo" => "Miltonian Tattoo", "Miniver" => "Miniver", "Miss Fajardose" => "Miss Fajardose", "Modern Antiqua" => "Modern Antiqua", "Molengo" => "Molengo", "Monofett" => "Monofett", "Monoton" => "Monoton", "Monsieur La Doulaise" => "Monsieur La Doulaise", "Montaga" => "Montaga", "Montez" => "Montez", "Montserrat" => "Montserrat", "Moul" => "Moul", "Moulpali" => "Moulpali", "Mountains of Christmas" => "Mountains of Christmas", "Mr Bedfort" => "Mr Bedfort", "Mr Dafoe" => "Mr Dafoe", "Mr De Haviland" => "Mr De Haviland", "Mrs Saint Delafield" => "Mrs Saint Delafield", "Mrs Sheppards" => "Mrs Sheppards", "Muli" => "Muli", "Mystery Quest" => "Mystery Quest", "Neucha" => "Neucha", "Neuton" => "Neuton", "News Cycle" => "News Cycle", "Niconne" => "Niconne", "Nixie One" => "Nixie One", "Nobile" => "Nobile", "Nokora" => "Nokora", "Norican" => "Norican", "Nosifer" => "Nosifer", "Nothing You Could Do" => "Nothing You Could Do", "Noticia Text" => "Noticia Text", "Noto Sans" => "Noto Sans", "Nova Cut" => "Nova Cut", "Nova Flat" => "Nova Flat", "Nova Mono" => "Nova Mono", "Nova Oval" => "Nova Oval", "Nova Round" => "Nova Round", "Nova Script" => "Nova Script", "Nova Slim" => "Nova Slim", "Nova Square" => "Nova Square", "Numans" => "Numans", "Nunito" => "Nunito", "Odor Mean Chey" => "Odor Mean Chey", "Old Standard TT" => "Old Standard TT", "Oldenburg" => "Oldenburg", "Oleo Script" => "Oleo Script", "Open Sans" => "Open Sans", "Orbitron" => "Orbitron", "Original Surfer" => "Original Surfer", "Oswald" => "Oswald", "Over the Rainbow" => "Over the Rainbow", "Overlock" => "Overlock", "Overlock SC" => "Overlock SC", "Ovo" => "Ovo", "Oxygen" => "Oxygen", "PT Mono" => "PT Mono", "PT Sans" => "PT Sans", "PT Sans Caption" => "PT Sans Caption", "PT Sans Narrow" => "PT Sans Narrow", "PT Serif" => "PT Serif", "PT Serif Caption" => "PT Serif Caption", "Pacifico" => "Pacifico", "Parisienne" => "Parisienne", "Passero One" => "Passero One", "Passion One" => "Passion One", "Patrick Hand" => "Patrick Hand", "Patua One" => "Patua One", "Paytone One" => "Paytone One", "Permanent Marker" => "Permanent Marker", "Petrona" => "Petrona", "Philosopher" => "Philosopher", "Piedra" => "Piedra", "Pinyon Script" => "Pinyon Script", "Plaster" => "Plaster", "Play" => "Play", "Playball" => "Playball", "Playfair Display" => "Playfair Display", "Podkova" => "Podkova", "Poiret One" => "Poiret One", "Poller One" => "Poller One", "Poly" => "Poly", "Pompiere" => "Pompiere", "Pontano Sans" => "Pontano Sans", "Port Lligat Sans" => "Port Lligat Sans", "Port Lligat Slab" => "Port Lligat Slab", "Prata" => "Prata", "Preahvihear" => "Preahvihear", "Press Start 2P" => "Press Start 2P", "Princess Sofia" => "Princess Sofia", "Prociono" => "Prociono", "Prosto One" => "Prosto One", "Puritan" => "Puritan", "Quantico" => "Quantico", "Quattrocento" => "Quattrocento", "Quattrocento Sans" => "Quattrocento Sans", "Questrial" => "Questrial", "Quicksand" => "Quicksand", "Qwigley" => "Qwigley", "Radley" => "Radley", "Raleway" => "Raleway", "Rammetto One" => "Rammetto One", "Rancho" => "Rancho", "Rationale" => "Rationale", "Redressed" => "Redressed", "Reenie Beanie" => "Reenie Beanie", "Revalia" => "Revalia", "Ribeye" => "Ribeye", "Ribeye Marrow" => "Ribeye Marrow", "Righteous" => "Righteous", "Rochester" => "Rochester", "Rock Salt" => "Rock Salt", "Rokkitt" => "Rokkitt", "Ropa Sans" => "Ropa Sans", "Rosario" => "Rosario", "Rosarivo" => "Rosarivo", "Rouge Script" => "Rouge Script", "Ruda" => "Ruda", "Ruge Boogie" => "Ruge Boogie", "Ruluko" => "Ruluko", "Ruslan Display" => "Ruslan Display", "Russo One" => "Russo One", "Ruthie" => "Ruthie", "Sail" => "Sail", "Salsa" => "Salsa", "Sancreek" => "Sancreek", "Sansita One" => "Sansita One", "Sarina" => "Sarina", "Satisfy" => "Satisfy", "Schoolbell" => "Schoolbell", "Seaweed Script" => "Seaweed Script", "Sevillana" => "Sevillana", "Seymour One" => "Seymour One", "Shadows Into Light" => "Shadows Into Light", "Shadows Into Light Two" => "Shadows Into Light Two", "Shanti" => "Shanti", "Share" => "Share", "Shojumaru" => "Shojumaru", "Short Stack" => "Short Stack", "Siemreap" => "Siemreap", "Sigmar One" => "Sigmar One", "Signika" => "Signika", "Signika Negative" => "Signika Negative", "Simonetta" => "Simonetta", "Sirin Stencil" => "Sirin Stencil", "Six Caps" => "Six Caps", "Slackey" => "Slackey", "Smokum" => "Smokum", "Smythe" => "Smythe", "Sniglet" => "Sniglet", "Snippet" => "Snippet", "Sofia" => "Sofia", "Sonsie One" => "Sonsie One", "Sorts Mill Goudy" => "Sorts Mill Goudy", "Special Elite" => "Special Elite", "Spicy Rice" => "Spicy Rice", "Spinnaker" => "Spinnaker", "Spirax" => "Spirax", "Squada One" => "Squada One", "Stardos Stencil" => "Stardos Stencil", "Stint Ultra Condensed" => "Stint Ultra Condensed", "Stint Ultra Expanded" => "Stint Ultra Expanded", "Stoke" => "Stoke", "Sue Ellen Francisco" => "Sue Ellen Francisco", "Sunshiney" => "Sunshiney", "Supermercado One" => "Supermercado One", "Suwannaphum" => "Suwannaphum", "Swanky and Moo Moo" => "Swanky and Moo Moo", "Syncopate" => "Syncopate", "Tangerine" => "Tangerine", "Taprom" => "Taprom", "Telex" => "Telex", "Tenor Sans" => "Tenor Sans", "The Girl Next Door" => "The Girl Next Door", "Tienne" => "Tienne", "Tinos" => "Tinos", "Titan One" => "Titan One", "Trade Winds" => "Trade Winds", "Trocchi" => "Trocchi", "Trochut" => "Trochut", "Trykker" => "Trykker", "Tulpen One" => "Tulpen One", "Ubuntu" => "Ubuntu", "Ubuntu Condensed" => "Ubuntu Condensed", "Ubuntu Mono" => "Ubuntu Mono", "Ultra" => "Ultra", "Uncial Antiqua" => "Uncial Antiqua", "UnifrakturMaguntia" => "UnifrakturMaguntia", "Unkempt" => "Unkempt", "Unlock" => "Unlock", "Unna" => "Unna", "VT323" => "VT323", "Varela" => "Varela", "Varela Round" => "Varela Round", "Vast Shadow" => "Vast Shadow", "Vibur" => "Vibur", "Vidaloka" => "Vidaloka", "Viga" => "Viga", "Voces" => "Voces", "Volkhov" => "Volkhov", "Vollkorn" => "Vollkorn", "Voltaire" => "Voltaire", "Waiting for the Sunrise" => "Waiting for the Sunrise", "Wallpoet" => "Wallpoet", "Walter Turncoat" => "Walter Turncoat", "Wellfleet" => "Wellfleet", "Wire One" => "Wire One", "Yanone Kaffeesatz" => "Yanone Kaffeesatz", "Yellowtail" => "Yellowtail", "Yeseva One" => "Yeseva One", "Yesteryear" => "Yesteryear", "Zeyada" => "Zeyada")
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_footer_menu_header_color",
				"type" => "colorpicker",
				"label" => __("Footer Headers Color", THEME_NAME),
				"default" => "#ffffff"
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_footer_menu_color",
				"type" => "colorpicker",
				"label" => __("Footer Font Color", THEME_NAME),
				"default" => "#ffffff"
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_footer_menu_link_color",
				"type" => "colorpicker",
				"label" => __("Footer Link Color", THEME_NAME),
				"default" => "#ffffff"
			),
			array(
				"name" => "dynamic_".$barnelli_foodMenuSlug."_footer_menu_hover_link_color",
				"type" => "colorpicker",
				"label" => __("Footer Hover Link Color", THEME_NAME),
				"default" => "#cccccc"
			)
		);'), $barnelli_foodMenuSlug, __('Menu appearance', THEME_NAME), '', 1 );
}

YoPressBase::instance()->registerAdminPage(__('Social', THEME_NAME), 'social', 1);
YoPressBase::instance()->registerAdminPageSettings('social', 'socialSettings', __('Profiles (Drag & drop to change order)', THEME_NAME), '', 1);
YoPressBase::instance()->registerAdminPageSettings('social', 'socialShare', __('Share on', THEME_NAME), '', 1);
YoPressBase::instance()->registerAdminPageSettings('social', 'socialShareOptions', __('Options', THEME_NAME), '', 1);
//YoPressBase::instance()->registerAdminPageSettings('social', 'socialKeys', __('API Keys', THEME_NAME), '', 1);

YoPressBase::instance()->registerAdminPage(__('Restaurant', THEME_NAME), 'restaurant', 1);
YoPressBase::instance()->registerAdminPageSettings('restaurant', 'restaurantSettings', __('Restaurant settings', THEME_NAME), '', 1 );
YoPressBase::instance()->registerAdminPage(__('Restaurant Appearance', THEME_NAME), 'restaurant-appearance', 1);
YoPressBase::instance()->registerAdminPageSettings('restaurant-appearance', 'restaurantApperanceSettings', __('Apperance settings', THEME_NAME), '', 1);

YoPressBase::instance()->registerAdminPage(__('Event calendar', THEME_NAME), 'eventcalendar', 8);
YoPressBase::instance()->registerAdminPageSettings('eventcalendar', 'calndarSettings', __('Event Calendar', THEME_NAME), __('Description', THEME_NAME), 1);

YoPressBase::instance()->registerAdminPage(__('Custom CSS', THEME_NAME), 'customcss', 9);
YoPressBase::instance()->registerAdminPageSettings('customcss', 'customStyles', __('Custom CSS', THEME_NAME), __('Description', THEME_NAME), 1);

YoPressBase::instance()->registerAdminPage(__('SMTP Mail', THEME_NAME), 'smtpmail', 9);
YoPressBase::instance()->registerAdminPageSettings('smtpmail', 'smtpMail', __('SMTP Mail', THEME_NAME), __('Description', THEME_NAME), 1);

YoPressBase::instance()->registerAdminPage(__('SEO', THEME_NAME), 'seosettings', 9);
YoPressBase::instance()->registerAdminPageSettings('seosettings', 'seoSettings', __('SEO Settings', THEME_NAME), __('Description', THEME_NAME), 1);

YoPressBase::instance()->registerAdminPage(__('Theme update', THEME_NAME), 'themeupdate', 10);
YoPressBase::instance()->registerAdminPageSettings('themeupdate', 'themeUpdateSettings', __('Theme Update', THEME_NAME), __('Description', THEME_NAME), 1);

YoPressBase::instance()->registerAdminPage(__('System info', THEME_NAME), 'systeminfo', 10);
YoPressBase::instance()->registerAdminPageSettings('systeminfo', 'themeSystemInfo', __('System Info', THEME_NAME), __('Description', THEME_NAME), 1);

//YoPressBase::instance()->registerAdminPage(__('Demo Import', THEME_NAME), 'demoImport', 10);
//YoPressBase::instance()->registerAdminPageSettings('demoImport', 'demoImporter', __('Demo Import', THEME_NAME), __('Description', THEME_NAME), 1);

function seoSettings() {
	return array(
		array(
			'name'=>'barnelli_seo_enabled',
			'type' => 'dropdown',
			'label' => __('Enable SEO Settings', THEME_NAME),
			'default' => array('no'=>__('No', THEME_NAME), 'yes'=>__('Yes', THEME_NAME))
		),
		array(
			'name' => 'barnelli_seo_description',
			'type' => 'input',
			'label' => __('Site Description', THEME_NAME),
			'default' => ''
		),
		array(
			'name' => 'barnelli_seo_keywords',
			'type' => 'input',
			'label' => __('Site Keywords<br/><small>Comma separated list</small>', THEME_NAME),
			'default' => ''
		),
	);
}

function smtpMail() {
	return array(
		array(
			'name'=>'barnelli_smtp_enabled',
			'type' => 'dropdown',
			'label' => __('Enable SMTP Mail<br/><small>Enable this to use smtp server instead of PHP mail() function</small>', THEME_NAME),
			'default' => array('no'=>__('No', THEME_NAME), 'yes'=>__('Yes', THEME_NAME))
		),
		array(
			'name' => 'barnelli_smtp_host',
			'type' => 'input',
			'label' => __('SMTP Host', THEME_NAME),
			'default' => ''
		),
		array(
			'name' => 'barnelli_smtp_port',
			'type' => 'input',
			'label' => __('SMTP Port<br/><small>Likely to be 25, 465 or 587</small>', THEME_NAME),
			'default' => 587
		),
		array(
			'name'=>'barnelli_smtp_auth',
			'type' => 'dropdown',
			'label' => __('SMTP Auth', THEME_NAME),
			'default' => array('yes'=>__('Yes', THEME_NAME), 'no'=>__('No', THEME_NAME))
		),
		array(
			'name' => 'barnelli_smtp_username',
			'type' => 'input',
			'label' => __('SMTP Username', THEME_NAME),
			'default' => ''
		),
		array(
			'name' => 'barnelli_smtp_password',
			'type' => 'password',
			'label' => __('SMTP Password', THEME_NAME),
			'default' => ''
		),
		array(
			'name' => 'barnelli_smtp_secure',
			'type' => 'dropdown',
			'label' => __('SMTP Secure Method', THEME_NAME),
			'default' => array('tls'=>'TLS', 'ssl'=>'SSL')
		),
	);
}

function demoImporter() {
	return array(
		array(
			'name' => 'demo_import',
			'type' => 'custom',
			'content' => 'drawDemoImport',
		)
	);
}

if (barnelli_isPluginActive('woocommerce/woocommerce.php')) {
	YoPressBase::instance()->registerAdminPage( __t('WooCommerce Shop Appearance'), 'woocommerceconfig', 1 );
	YoPressBase::instance()->registerAdminPageSettings( 'woocommerceconfig', 'woocommerceSettings', __t('General'), '', 1 );
	YoPressBase::instance()->registerAdminPageSettings( 'woocommerceconfig', 'woocommerceColorsConfig', __t('Shop fonts & colors'), '', 1 );
}

function themeSystemInfo() {
	return array(
		array(
			'name' => 'system_info',
			'type' => 'custom',
			'content' => 'drawSystemInfo',
		)
	);
}

function topAppearance() {
	global $barnelli_fontsArray;

	return array(
		array(
			'name'=>'top_navbar_backgroud_color',
			'type'=>'colorpicker',
			'label'=>'Navigation Bar Color',
			'default'=>'#ffffff',
			'htmlOptions' => array()
		),
		array(
			'name' => 'top_navbar_backgroud_color_opacity',
			'type' => 'slider',
			'label' => __('Navigation Bar Color Opacity', THEME_NAME),
			'default' => 95,
			'htmlOptions' => array('min'=>1, 'max'=>100)
		),
		array(
			"name"=>"top_nav_menu_font",
			"type" => "fontpicker",
			"label" => __t("Navigation Bar Font"),
			"htmlOptions" => array(),
			"default" => $barnelli_fontsArray
		),
		array(
			"name"=>"top_nav_menu_font_size",
			"type" => "input",
			"label" => __t("Navigation Bar Font Size"),
			"htmlOptions" => array(),
			"default" => 16,
		),
		array(
			'name' => 'top_nav_menu_font_color',
			'type' => 'colorpicker',
			'label' => __('Navigation Bar Font Color', THEME_NAME),
			'default' => '#ffffff',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'top_nav_menu_font_hover_color',
			'type' => 'colorpicker',
			'label' => __('Navigation Bar Font Hover Color', THEME_NAME),
			'default' => '#cccccc',
			'htmlOptions' =>array()
		)
	);
}

function woocommerceSettings() {
	return array(
		array(
			'name' => 'woo_disable_placeholders',
			'type' => 'checkbox',
			'label' => __t('Disable Form Placeholders'),
			'htmlOptions' => array(),
			'default' => '0'
		),
		array(
			'name' => 'woo_display_footer',
			'type' => 'checkbox',
			'label' => __t('Show footer'),
			'htmlOptions' => array(),
			'default' => '0'
		),
		array(
			'name' => 'woo_sidebar_position_shop',
			'type' => 'dropdown',
			'label' => __('Shop sidebar position', THEME_NAME),
			'default' => array('left' => 'left', 'right' => 'right', 'none' => 'none'),
			'selected' => 'none',
			'htmlOptions' => array()
		),
		array(
			'name' => 'woo_sidebar_position_product',
			'type' => 'dropdown',
			'label' => __('Product sidebar position', THEME_NAME),
			'default' => array('left' => 'left', 'right' => 'right', 'none' => 'none'),
			'selected' => 'none',
			'htmlOptions' => array()
		),
		array(
			'name' => 'woo_disable_reviews',
			'type' => 'checkbox',
			'label' => __t('Disable Reviews'),
			'htmlOptions' => array(),
			'default' => '0'
		),
	);
}

function woocommerceColorsConfig() {
	return array(
		array(
			'name' => 'woo_shop_background',
			'type' => 'uploader',
			'label' => __t('Shop Background Image') . '<br/><small>Chalkboard url: '.THEME_DIR_URI . '/img/chalkboard-loop.jpg</small>',
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'woo_shop_background_color',
			'type' => 'colorpicker',
			'label' => __t('Shop Background Color'),
			'default' => '#ffffff',
			'htmlOptions' => array()
		),
		array(
			'name' => 'woo_shop_font',
			'type' => 'fontpicker',
			'label' => __t('Shop Font'),
			'htmlOptions' => array(),
			'default' => array("Open Sans" => "Open Sans", "Covered By Your Grace" => "Covered By Your Grace", "Abel" => "Abel", "Abril Fatface" => "Abril Fatface", "Aclonica" => "Aclonica", "Acme" => "Acme", "Actor" => "Actor", "Adamina" => "Adamina", "Advent Pro" => "Advent Pro", "Aguafina Script" => "Aguafina Script", "Aladin" => "Aladin", "Aldrich" => "Aldrich", "Alegreya" => "Alegreya", "Alegreya SC" => "Alegreya SC", "Alex Brush" => "Alex Brush", "Alfa Slab One" => "Alfa Slab One", "Alice" => "Alice", "Alike" => "Alike", "Alike Angular" => "Alike Angular", "Allan" => "Allan", "Allerta" => "Allerta", "Allerta Stencil" => "Allerta Stencil", "Allura" => "Allura", "Almendra" => "Almendra", "Almendra SC" => "Almendra SC", "Amaranth" => "Amaranth", "Amatic SC" => "Amatic SC", "Amethysta" => "Amethysta", "Andada" => "Andada", "Andika" => "Andika", "Angkor" => "Angkor", "Annie Use Your Telescope" => "Annie Use Your Telescope", "Anonymous Pro" => "Anonymous Pro", "Antic" => "Antic", "Antic Didone" => "Antic Didone", "Antic Slab" => "Antic Slab", "Anton" => "Anton", "Arapey" => "Arapey", "Arbutus" => "Arbutus", "Architects Daughter" => "Architects Daughter", "Arimo" => "Arimo", "Arizonia" => "Arizonia", "Armata" => "Armata", "Artifika" => "Artifika", "Arvo" => "Arvo", "Asap" => "Asap", "Asset" => "Asset", "Astloch" => "Astloch", "Asul" => "Asul", "Atomic Age" => "Atomic Age", "Aubrey" => "Aubrey", "Audiowide" => "Audiowide", "Average" => "Average", "Averia Gruesa Libre" => "Averia Gruesa Libre", "Averia Libre" => "Averia Libre", "Averia Sans Libre" => "Averia Sans Libre", "Averia Serif Libre" => "Averia Serif Libre", "Bad Script" => "Bad Script", "Balthazar" => "Balthazar", "Bangers" => "Bangers", "Basic" => "Basic", "Battambang" => "Battambang", "Baumans" => "Baumans", "Bayon" => "Bayon", "Belgrano" => "Belgrano", "Belleza" => "Belleza", "Bentham" => "Bentham", "Berkshire Swash" => "Berkshire Swash", "Bevan" => "Bevan", "Bigshot One" => "Bigshot One", "Bilbo" => "Bilbo", "Bilbo Swash Caps" => "Bilbo Swash Caps", "Bitter" => "Bitter", "Black Ops One" => "Black Ops One", "Bokor" => "Bokor", "Bonbon" => "Bonbon", "Boogaloo" => "Boogaloo", "Bowlby One" => "Bowlby One", "Bowlby One SC" => "Bowlby One SC", "Brawler" => "Brawler", "Bree Serif" => "Bree Serif", "Bubblegum Sans" => "Bubblegum Sans", "Buda" => "Buda", "Buenard" => "Buenard", "Butcherman" => "Butcherman", "Butterfly Kids" => "Butterfly Kids", "Cabin" => "Cabin", "Cabin Condensed" => "Cabin Condensed", "Cabin Sketch" => "Cabin Sketch", "Caesar Dressing" => "Caesar Dressing", "Cagliostro" => "Cagliostro", "Calligraffitti" => "Calligraffitti", "Cambo" => "Cambo", "Candal" => "Candal", "Cantarell" => "Cantarell", "Cantata One" => "Cantata One", "Cardo" => "Cardo", "Carme" => "Carme", "Carter One" => "Carter One", "Caudex" => "Caudex", "Cedarville Cursive" => "Cedarville Cursive", "Ceviche One" => "Ceviche One", "Changa One" => "Changa One", "Chango" => "Chango", "Chau Philomene One" => "Chau Philomene One", "Chelsea Market" => "Chelsea Market", "Chenla" => "Chenla", "Cherry Cream Soda" => "Cherry Cream Soda", "Chewy" => "Chewy", "Chicle" => "Chicle", "Chivo" => "Chivo", "Coda" => "Coda", "Codystar" => "Codystar", "Comfortaa" => "Comfortaa", "Coming Soon" => "Coming Soon", "Concert One" => "Concert One", "Condiment" => "Condiment", "Content" => "Content", "Contrail One" => "Contrail One", "Convergence" => "Convergence", "Cookie" => "Cookie", "Copse" => "Copse", "Corben" => "Corben", "Cousine" => "Cousine", "Coustard" => "Coustard", "Crafty Girls" => "Crafty Girls", "Creepster" => "Creepster", "Crete Round" => "Crete Round", "Crimson Text" => "Crimson Text", "Crushed" => "Crushed", "Cuprum" => "Cuprum", "Cutive" => "Cutive", "Damion" => "Damion", "Dancing Script" => "Dancing Script", "Dangrek" => "Dangrek", "Dawning of a New Day" => "Dawning of a New Day", "Days One" => "Days One", "Delius" => "Delius", "Delius Swash Caps" => "Delius Swash Caps", "Delius Unicase" => "Delius Unicase", "Della Respira" => "Della Respira", "Devonshire" => "Devonshire", "Didact Gothic" => "Didact Gothic", "Diplomata" => "Diplomata", "Diplomata SC" => "Diplomata SC", "Doppio One" => "Doppio One", "Dorsa" => "Dorsa", "Dosis" => "Dosis", "Dr Sugiyama" => "Dr Sugiyama", "Droid Sans" => "Droid Sans", "Droid Sans Mono" => "Droid Sans Mono", "Droid Serif" => "Droid Serif", "Duru Sans" => "Duru Sans", "Dynalight" => "Dynalight", "EB Garamond" => "EB Garamond", "Eater" => "Eater", "Economica" => "Economica", "Electrolize" => "Electrolize", "Emblema One" => "Emblema One", "Emilys Candy" => "Emilys Candy", "Engagement" => "Engagement", "Enriqueta" => "Enriqueta", "Erica One" => "Erica One", "Esteban" => "Esteban", "Euphoria Script" => "Euphoria Script", "Ewert" => "Ewert", "Exo" => "Exo", "Expletus Sans" => "Expletus Sans", "Fanwood Text" => "Fanwood Text", "Fascinate" => "Fascinate", "Fascinate Inline" => "Fascinate Inline", "Federant" => "Federant", "Federo" => "Federo", "Felipa" => "Felipa", "Fjalla One" => "Fjalla One", "Fjord One" => "Fjord One", "Flamenco" => "Flamenco", "Flavors" => "Flavors", "Fondamento" => "Fondamento", "Fontdiner Swanky" => "Fontdiner Swanky", "Forum" => "Forum", "Francois One" => "Francois One", "Fredericka the Great" => "Fredericka the Great", "Fredoka One" => "Fredoka One", "Freehand" => "Freehand", "Fresca" => "Fresca", "Frijole" => "Frijole", "Fugaz One" => "Fugaz One", "GFS Didot" => "GFS Didot", "GFS Neohellenic" => "GFS Neohellenic", "Galdeano" => "Galdeano", "Gentium Basic" => "Gentium Basic", "Gentium Book Basic" => "Gentium Book Basic", "Geo" => "Geo", "Geostar" => "Geostar", "Geostar Fill" => "Geostar Fill", "Germania One" => "Germania One", "Gilda Display" => "Gilda Display", "Give You Glory" => "Give You Glory", "Glass Antiqua" => "Glass Antiqua", "Glegoo" => "Glegoo", "Gloria Hallelujah" => "Gloria Hallelujah", "Goblin One" => "Goblin One", "Gochi Hand" => "Gochi Hand", "Gorditas" => "Gorditas", "Goudy Bookletter 1911" => "Goudy Bookletter 1911", "Graduate" => "Graduate", "Gravitas One" => "Gravitas One", "Great Vibes" => "Great Vibes", "Gruppo" => "Gruppo", "Gudea" => "Gudea", "Habibi" => "Habibi", "Hammersmith One" => "Hammersmith One", "Handlee" => "Handlee", "Hanuman" => "Hanuman", "Happy Monkey" => "Happy Monkey", "Henny Penny" => "Henny Penny", "Herr Von Muellerhoff" => "Herr Von Muellerhoff", "Holtwood One SC" => "Holtwood One SC", "Homemade Apple" => "Homemade Apple", "Homenaje" => "Homenaje", "IM Fell DW Pica" => "IM Fell DW Pica", "IM Fell DW Pica SC" => "IM Fell DW Pica SC", "IM Fell Double Pica" => "IM Fell Double Pica", "IM Fell Double Pica SC" => "IM Fell Double Pica SC", "IM Fell English" => "IM Fell English", "IM Fell English SC" => "IM Fell English SC", "IM Fell French Canon" => "IM Fell French Canon", "IM Fell French Canon SC" => "IM Fell French Canon SC", "IM Fell Great Primer" => "IM Fell Great Primer", "IM Fell Great Primer SC" => "IM Fell Great Primer SC", "Iceberg" => "Iceberg", "Iceland" => "Iceland", "Imprima" => "Imprima", "Inconsolata" => "Inconsolata", "Inder" => "Inder", "Indie Flower" => "Indie Flower", "Inika" => "Inika", "Irish Grover" => "Irish Grover", "Istok Web" => "Istok Web", "Italiana" => "Italiana", "Italianno" => "Italianno", "Jim Nightshade" => "Jim Nightshade", "Jockey One" => "Jockey One", "Jolly Lodger" => "Jolly Lodger", "Josefin Sans" => "Josefin Sans", "Josefin Slab" => "Josefin Slab", "Judson" => "Judson", "Julee" => "Julee", "Junge" => "Junge", "Jura" => "Jura", "Just Another Hand" => "Just Another Hand", "Just Me Again Down Here" => "Just Me Again Down Here", "Kameron" => "Kameron", "Karla" => "Karla", "Kaushan Script" => "Kaushan Script", "Kelly Slab" => "Kelly Slab", "Kenia" => "Kenia", "Khmer" => "Khmer", "Knewave" => "Knewave", "Kotta One" => "Kotta One", "Koulen" => "Koulen", "Kranky" => "Kranky", "Kreon" => "Kreon", "Kristi" => "Kristi", "Krona One" => "Krona One", "La Belle Aurore" => "La Belle Aurore", "Lancelot" => "Lancelot", "Lato" => "Lato", "League Script" => "League Script", "Leckerli One" => "Leckerli One", "Ledger" => "Ledger", "Lekton" => "Lekton", "Lemon" => "Lemon", "Lilita One" => "Lilita One", "Limelight" => "Limelight", "Linden Hill" => "Linden Hill", "Lobster" => "Lobster", "Lobster Two" => "Lobster Two", "Londrina Outline" => "Londrina Outline", "Londrina Shadow" => "Londrina Shadow", "Londrina Sketch" => "Londrina Sketch", "Londrina Solid" => "Londrina Solid", "Lora" => "Lora", "Love Ya Like A Sister" => "Love Ya Like A Sister", "Loved by the King" => "Loved by the King", "Lovers Quarrel" => "Lovers Quarrel", "Luckiest Guy" => "Luckiest Guy", "Lusitana" => "Lusitana", "Lustria" => "Lustria", "Macondo" => "Macondo", "Macondo Swash Caps" => "Macondo Swash Caps", "Magra" => "Magra", "Maiden Orange" => "Maiden Orange", "Mako" => "Mako", "Marcellus" => "Marcellus", "Marcellus SC" => "Marcellus SC", "Marck Script" => "Marck Script", "Marko One" => "Marko One", "Marmelad" => "Marmelad", "Marvel" => "Marvel", "Mate" => "Mate", "Mate SC" => "Mate SC", "Maven Pro" => "Maven Pro", "Meddon" => "Meddon", "MedievalSharp" => "MedievalSharp", "Medula One" => "Medula One", "Megrim" => "Megrim", "Merienda One" => "Merienda One", "Merriweather" => "Merriweather", "Metal" => "Metal", "Metamorphous" => "Metamorphous", "Metrophobic" => "Metrophobic", "Michroma" => "Michroma", "Miltonian" => "Miltonian", "Miltonian Tattoo" => "Miltonian Tattoo", "Miniver" => "Miniver", "Miss Fajardose" => "Miss Fajardose", "Modern Antiqua" => "Modern Antiqua", "Molengo" => "Molengo", "Monofett" => "Monofett", "Monoton" => "Monoton", "Monsieur La Doulaise" => "Monsieur La Doulaise", "Montaga" => "Montaga", "Montez" => "Montez", "Montserrat" => "Montserrat", "Moul" => "Moul", "Moulpali" => "Moulpali", "Mountains of Christmas" => "Mountains of Christmas", "Mr Bedfort" => "Mr Bedfort", "Mr Dafoe" => "Mr Dafoe", "Mr De Haviland" => "Mr De Haviland", "Mrs Saint Delafield" => "Mrs Saint Delafield", "Mrs Sheppards" => "Mrs Sheppards", "Muli" => "Muli", "Mystery Quest" => "Mystery Quest", "Neucha" => "Neucha", "Neuton" => "Neuton", "News Cycle" => "News Cycle", "Niconne" => "Niconne", "Nixie One" => "Nixie One", "Nobile" => "Nobile", "Nokora" => "Nokora", "Norican" => "Norican", "Nosifer" => "Nosifer", "Nothing You Could Do" => "Nothing You Could Do", "Noticia Text" => "Noticia Text", "Noto Sans" => "Noto Sans", "Nova Cut" => "Nova Cut", "Nova Flat" => "Nova Flat", "Nova Mono" => "Nova Mono", "Nova Oval" => "Nova Oval", "Nova Round" => "Nova Round", "Nova Script" => "Nova Script", "Nova Slim" => "Nova Slim", "Nova Square" => "Nova Square", "Numans" => "Numans", "Nunito" => "Nunito", "Odor Mean Chey" => "Odor Mean Chey", "Old Standard TT" => "Old Standard TT", "Oldenburg" => "Oldenburg", "Oleo Script" => "Oleo Script", "Open Sans" => "Open Sans", "Orbitron" => "Orbitron", "Original Surfer" => "Original Surfer", "Oswald" => "Oswald", "Over the Rainbow" => "Over the Rainbow", "Overlock" => "Overlock", "Overlock SC" => "Overlock SC", "Ovo" => "Ovo", "Oxygen" => "Oxygen", "PT Mono" => "PT Mono", "PT Sans" => "PT Sans", "PT Sans Caption" => "PT Sans Caption", "PT Sans Narrow" => "PT Sans Narrow", "PT Serif" => "PT Serif", "PT Serif Caption" => "PT Serif Caption", "Pacifico" => "Pacifico", "Parisienne" => "Parisienne", "Passero One" => "Passero One", "Passion One" => "Passion One", "Patrick Hand" => "Patrick Hand", "Patua One" => "Patua One", "Paytone One" => "Paytone One", "Permanent Marker" => "Permanent Marker", "Petrona" => "Petrona", "Philosopher" => "Philosopher", "Piedra" => "Piedra", "Pinyon Script" => "Pinyon Script", "Plaster" => "Plaster", "Play" => "Play", "Playball" => "Playball", "Playfair Display" => "Playfair Display", "Podkova" => "Podkova", "Poiret One" => "Poiret One", "Poller One" => "Poller One", "Poly" => "Poly", "Pompiere" => "Pompiere", "Pontano Sans" => "Pontano Sans", "Port Lligat Sans" => "Port Lligat Sans", "Port Lligat Slab" => "Port Lligat Slab", "Prata" => "Prata", "Preahvihear" => "Preahvihear", "Press Start 2P" => "Press Start 2P", "Princess Sofia" => "Princess Sofia", "Prociono" => "Prociono", "Prosto One" => "Prosto One", "Puritan" => "Puritan", "Quantico" => "Quantico", "Quattrocento" => "Quattrocento", "Quattrocento Sans" => "Quattrocento Sans", "Questrial" => "Questrial", "Quicksand" => "Quicksand", "Qwigley" => "Qwigley", "Radley" => "Radley", "Raleway" => "Raleway", "Rammetto One" => "Rammetto One", "Rancho" => "Rancho", "Rationale" => "Rationale", "Redressed" => "Redressed", "Reenie Beanie" => "Reenie Beanie", "Revalia" => "Revalia", "Ribeye" => "Ribeye", "Ribeye Marrow" => "Ribeye Marrow", "Righteous" => "Righteous", "Rochester" => "Rochester", "Rock Salt" => "Rock Salt", "Rokkitt" => "Rokkitt", "Ropa Sans" => "Ropa Sans", "Rosario" => "Rosario", "Rosarivo" => "Rosarivo", "Rouge Script" => "Rouge Script", "Ruda" => "Ruda", "Ruge Boogie" => "Ruge Boogie", "Ruluko" => "Ruluko", "Ruslan Display" => "Ruslan Display", "Russo One" => "Russo One", "Ruthie" => "Ruthie", "Sail" => "Sail", "Salsa" => "Salsa", "Sancreek" => "Sancreek", "Sansita One" => "Sansita One", "Sarina" => "Sarina", "Satisfy" => "Satisfy", "Schoolbell" => "Schoolbell", "Seaweed Script" => "Seaweed Script", "Sevillana" => "Sevillana", "Seymour One" => "Seymour One", "Shadows Into Light" => "Shadows Into Light", "Shadows Into Light Two" => "Shadows Into Light Two", "Shanti" => "Shanti", "Share" => "Share", "Shojumaru" => "Shojumaru", "Short Stack" => "Short Stack", "Siemreap" => "Siemreap", "Sigmar One" => "Sigmar One", "Signika" => "Signika", "Signika Negative" => "Signika Negative", "Simonetta" => "Simonetta", "Sirin Stencil" => "Sirin Stencil", "Six Caps" => "Six Caps", "Slackey" => "Slackey", "Smokum" => "Smokum", "Smythe" => "Smythe", "Sniglet" => "Sniglet", "Snippet" => "Snippet", "Sofia" => "Sofia", "Sonsie One" => "Sonsie One", "Sorts Mill Goudy" => "Sorts Mill Goudy", "Special Elite" => "Special Elite", "Spicy Rice" => "Spicy Rice", "Spinnaker" => "Spinnaker", "Spirax" => "Spirax", "Squada One" => "Squada One", "Stardos Stencil" => "Stardos Stencil", "Stint Ultra Condensed" => "Stint Ultra Condensed", "Stint Ultra Expanded" => "Stint Ultra Expanded", "Stoke" => "Stoke", "Sue Ellen Francisco" => "Sue Ellen Francisco", "Sunshiney" => "Sunshiney", "Supermercado One" => "Supermercado One", "Suwannaphum" => "Suwannaphum", "Swanky and Moo Moo" => "Swanky and Moo Moo", "Syncopate" => "Syncopate", "Tangerine" => "Tangerine", "Taprom" => "Taprom", "Telex" => "Telex", "Tenor Sans" => "Tenor Sans", "The Girl Next Door" => "The Girl Next Door", "Tienne" => "Tienne", "Tinos" => "Tinos", "Titan One" => "Titan One", "Trade Winds" => "Trade Winds", "Trocchi" => "Trocchi", "Trochut" => "Trochut", "Trykker" => "Trykker", "Tulpen One" => "Tulpen One", "Ubuntu" => "Ubuntu", "Ubuntu Condensed" => "Ubuntu Condensed", "Ubuntu Mono" => "Ubuntu Mono", "Ultra" => "Ultra", "Uncial Antiqua" => "Uncial Antiqua", "UnifrakturMaguntia" => "UnifrakturMaguntia", "Unkempt" => "Unkempt", "Unlock" => "Unlock", "Unna" => "Unna", "VT323" => "VT323", "Varela" => "Varela", "Varela Round" => "Varela Round", "Vast Shadow" => "Vast Shadow", "Vibur" => "Vibur", "Vidaloka" => "Vidaloka", "Viga" => "Viga", "Voces" => "Voces", "Volkhov" => "Volkhov", "Vollkorn" => "Vollkorn", "Voltaire" => "Voltaire", "Waiting for the Sunrise" => "Waiting for the Sunrise", "Wallpoet" => "Wallpoet", "Walter Turncoat" => "Walter Turncoat", "Wellfleet" => "Wellfleet", "Wire One" => "Wire One", "Yanone Kaffeesatz" => "Yanone Kaffeesatz", "Yellowtail" => "Yellowtail", "Yeseva One" => "Yeseva One", "Yesteryear" => "Yesteryear", "Zeyada" => "Zeyada")
		),
		array(
			'name' => 'woo_shop_category_font_color',
			'type' => 'colorpicker',
			'label' => __t('Category Font Color'),
			'default' => '#333333',
			'htmlOptions' => array()
		),
		array(
			'name' => 'woo_shop_category_font_size',
			'type' => 'input',
			'label' => __t('Category Font Size'),
			'default' => '40',
			'htmlOptions' => array()
		),
		array(
			'name' => 'woo_shop_category_desc_font_color',
			'type' => 'colorpicker',
			'label' => __t('Category Description Font Color'),
			'default' => '#333333',
			'htmlOptions' => array()
		),
		array(
			'name' => 'woo_shop_category_desc_font_size',
			'type' => 'input',
			'label' => __t('Category Description Font Size'),
			'default' => '30',
			'htmlOptions' => array()
		),
		array(
			'name' => 'woo_shop_item_font_color',
			'type' => 'colorpicker',
			'label' => __t('Item Font Color'),
			'default' => '#333333',
			'htmlOptions' => array()
		),
		array(
			'name' => 'woo_shop_item_font_size',
			'type' => 'input',
			'label' => __t('Item Font Size'),
			'default' => '20',
			'htmlOptions' => array()
		),
		array(
			'name' => 'woo_shop_desc_font_color',
			'type' => 'colorpicker',
			'label' => __t('Description Font Color'),
			'default' => '#333333',
			'htmlOptions' => array()
		),
		array(
			'name' => 'woo_shop_desc_font_size',
			'type' => 'input',
			'label' => __t('Description Font Size'),
			'default' => '18',
			'htmlOptions' => array()
		),
		array(
			'name' => 'woo_shop_item_stars',
			'type' => 'colorpicker',
			'label' => __t('Star Rating Color'),
			'default' => '#333333',
			'htmlOptions' => array()
		),
		array(
			'name' => 'woo_shop_currency_color',
			'type' => 'colorpicker',
			'label' => __t('Price Font Color'),
			'default' => '#333333',
			'htmlOptions' => array()
		),
		array(
			'name' => 'woo_shop_currency_size',
			'type' => 'input',
			'label' => __t('Price Font Size'),
			'default' => '20',
			'htmlOptions' => array()
		),
		array(
			'name' => 'woo_shop_header_separator',
			'type' => 'colorpicker',
			'label' => __t('Category Separator Color'),
			'default' => '#333333',
			'htmlOptions' => array()
		),
		array(
			'name' => 'woo_shop_button',
			'type' => 'colorpicker',
			'label' => __t('Buttons Color'),
			'default' => '#333333',
			'htmlOptions' => array()
		),
	);
}

function drawSystemInfo() {
	require_once THEME_INCLUDES . '/sys-info.php';

	$system_info = new Simple_System_Info();

	echo '<div id="system_info_default_section_group' . '">';

	echo '<div id="redux-system-info">';
	echo $system_info->get( true );
	echo '</div>';

	echo '</div>';
}

function customStyles() {
	return array(
		array(
			'name' => 'theme_custom_css',
			'type' => 'textarea',
			'label' => __('Custom CSS', THEME_NAME),
			'default' => '',
			'htmlOptions' => array('style'=>'height:400px;')
		)
	);
}

function themeUpdateSettings() {
	return array(
		array(
			'name' => 'themeforest_username',
			'type' => 'input',
			'label' => __('Themeforest username', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'themeforest_api_key',
			'type' => 'input',
			'label' => __('Themeforest API Key', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
	);
}

function calndarSettings() {
	return array(
		array(
			'name' => 'eventcalendar_header_color',
			'type' => 'colorpicker',
			'label' => __('Header color', THEME_NAME),
			'default' => '#333',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'eventcalendar_table_text_color',
			'type' => 'colorpicker',
			'label' => __('Table text color', THEME_NAME),
			'default' => '#333',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'eventcalendar_table_header_color',
			'type' => 'colorpicker',
			'label' => __('Table header color', THEME_NAME),
			'default' => '#333',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'eventcalendar_counter_background',
			'type' => 'colorpicker',
			'label' => __('Event counter background', THEME_NAME),
			'default' => '#ccc',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'eventcalendar_counter_text_color',
			'type' => 'colorpicker',
			'label' => __('Event counter text color', THEME_NAME),
			'default' => '#fff',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'eventcalendar_background',
			'type' => 'colorpicker',
			'label' => __('Event background', THEME_NAME),
			'default' => '#f5f5f5',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'eventcalendar_text',
			'type' => 'colorpicker',
			'label' => __('Event text', THEME_NAME),
			'default' => '#333',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'eventcalendar_hover_background',
			'type' => 'colorpicker',
			'label' => __('Event hover background', THEME_NAME),
			'default' => '#333',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'eventcalendar_hover_text',
			'type' => 'colorpicker',
			'label' => __('Event hover text', THEME_NAME),
			'default' => '#fff',
			'htmlOptions' =>array()
		),		
		
		array(
			'name' => 'eventcalendar_table_border_color',
			'type' => 'colorpicker',
			'label' => __('Table border color', THEME_NAME),
			'default' => '#f2f2f2',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'eventcalendar_overlay_color',
			'type' => 'colorpicker',
			'label' => __('Overlay color', THEME_NAME),
			'default' => '#000',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'eventcalendar_no_events_color',
			'type' => 'colorpicker',
			'label' => __('No events color', THEME_NAME),
			'default' => '#333',
			'htmlOptions' =>array()
		),
		array(
			'name'=>'eventcalendar_active_grid',
			'type' => 'checkbox',
			'label' => __('Grid view enabled', THEME_NAME),
			'default' => '1',
		),
		array(
			'name'=>'eventcalendar_active_list_month',
			'type' => 'checkbox',
			'label' => __('List/month view enabled', THEME_NAME),
			'default' => '1',
		),
		array(
			'name'=>'eventcalendar_active_list_year',
			'type' => 'checkbox',
			'label' => __('List/year view enabled', THEME_NAME),
			'default' => '1',
		),
		array(
			'name'=>'eventcalendar_default_view',
			'type' => 'dropdown',
			'label' => __('Default view', THEME_NAME),
			'default' => array('grid'=>'Grid', 'list'=>'List', 'year'=>'Year')
		),
		array(
			'name'=>'eventcalendar_display_months',
			'type' => 'dropdown',
			'label' => __('Display months<br/><small>(only year view)</small>', THEME_NAME),
			'default' => array('yes'=>'Yes', 'no'=>'No')
		),
	);
}

function barnelli_getTitle( $a ) {
	return $a->post_title;
}

function barnelli_getId( $a ) {
	return $a->ID;
}

function restaurantGrid() {
	$wpml_languages = barnelli_getWPMLLanguages();
	if ($wpml_languages) {
		?><script>var wpml_languages = <?php echo json_encode($wpml_languages); ?>;</script>
<?php
	}
	?>
	<div id="wrapper">
		<section>
			<div id="workingarea">
				<div class="actions" style="margin-bottom:10px; ">
					<input id="EightButton" type="button" value="4x2" class="button" />
					<input id="TwelveButton" type="button" value="4x3" class="button"  />
					<input id="SixTeenButton" type="button" value="4x4" class="button" />
					<input id="TwentyButton" type="button" value="4x5" class="button" />
					<input id="saveCode" type="button" value="OK" class="button button-primary"/>
					<input id="resetButton" type="button" value="Reset" class="button" />
				
					<div style="margin-top: 8px"><strong style="color:red">Don't forget to click 'OK' and then 'Save Changes' after layout change!</strong></div>
				</div>
				<div id="placeholderGrid" class="grid"></div>
				<div id="workingGrid" class="grid"></div>
				<div class='controls'>
					<div class="keys">
						<div class="key s1x1"></div>
						<div style="clear:both"></div>
						<div class="key s2x1"></div>
						<div style="clear:both"></div>
						<div class="key s2x2"></div>
						<div style="clear:both"></div>
						<div class="key s4x1"></div>
						<div style="clear:both"></div>
						<div class="key s4x2"></div>
					</div>
				</div>
			</div>	
		</section>
		<br/>
	</div>

	<div id="editBox" class="hidden" style="position: absolute;top: 70px;left: 0px; background-color: #ffffff; height: 650px;width: 95%;padding-left: 5%;">
				<h4>Block Settings</h4>
				<div class="inside">
					<label for="theme_grid_name"><?php _e('Name', THEME_NAME); ?></label><br/>
					<input type="text" id="theme_grid_name" name="theme_grid_name" value="" />
				</div>

				<div class="inside">
					<label for="theme_grid_background_image"><?php _e('Background Image', THEME_NAME); ?></label><br/>
					<input id="theme_grid_background_image" class="uploadinput-2" type="text" size="20" name="theme_grid_background_image" value="" style="">
					<input id="upload_image_button" class="button button-primary upload_image_button" type="button" value="<?php _e('Choose', THEME_NAME); ?>" data-id="2">
					<input class="button button-primary upload_image_remove_button" type="button" value="<?php _e('Remove', THEME_NAME); ?>" data-id="2">
				</div>

				<div class="inside">
					<label for="theme_grid_function"><?php _e('Function', THEME_NAME); ?></label><br/>
					<select data-sel="function" name="theme_grid_function" id="theme_grid_function">
						<option value="none" selected="selected"><?php _e('None', THEME_NAME); ?></option>
						<option value="link"><?php _e('Link', THEME_NAME); ?></option>
						<option value="category"><?php _e('Last post from category', THEME_NAME); ?></option>
						<option value="page"><?php _e('Page', THEME_NAME); ?></option>
						<option value="opening_hours"><?php _e('Opening hours', THEME_NAME); ?></option>
						<option value="slider_category"><?php _e('Category slider', THEME_NAME); ?></option>
						<!-- <option value="twitter"><?php _e('Twitter feed', THEME_NAME); ?></option>
						<option value="facebook"><?php _e('Facebook feed', THEME_NAME); ?></option> -->
						<option value="events"><?php _e('Events', THEME_NAME); ?></option>
						<option value="map"><?php _e('Map', THEME_NAME); ?></option>
						<option value="custom_code"><?php _e('Custom Code', THEME_NAME); ?></option>
					</select>
				</div>

				<div class="inside function" id="theme_grid_option_opening_hours">
					<label for="theme_grid_opening_hours"><?php _e('Current Day Opening Times', THEME_NAME); ?></label><br/><br/>
					<input data-sel="opening_hours" type="checkbox" id="theme_grid_opening_hours" name="theme_grid_opening_hours" value="" /> <?php _e('Show opening hours for current day on "Restaurant" page block instead of "open" or "close" label which can be found in <strong>YoPress->Opening Times</strong> settings', THEME_NAME); ?>
				</div>

				<div class="inside function" id="theme_grid_option_twitter">
					<label for="theme_grid_twitter"><?php _e('Twitter handle', THEME_NAME); ?></label><br/>
					<input data-sel="twitter" type="text" id="theme_grid_twitter" name="theme_grid_twitter" value="" />
					<label for="theme_grid_twitter_number"><?php _e('No. of tweets', THEME_NAME); ?></label>&nbsp;
					<input style="width:40px;" type="text" id="theme_grid_twitter_number" name="theme_grid_twitter_number" value="" />
				</div>
				<div class="inside function" id="theme_grid_option_facebook">
					<label for="theme_grid_facebook"><?php _e('Facebook page id', THEME_NAME); ?></label><br/>
					<input data-sel="link" type="text" id="theme_grid_facebook" name="theme_grid_facebook" value="" />
					<label for="theme_grid_facebook_number"><?php _e('No. of posts', THEME_NAME); ?></label>&nbsp;
					<input style="width:40px;" type="text" id="theme_grid_facebook_number" name="theme_grid_facebook_number" value="" />
				</div>

				<div class="inside function" id="theme_grid_option_events">
					<label for="theme_grid_events"><?php _e('Show', THEME_NAME); ?></label><br/>
					<select data-sel="link" type="text" id="theme_grid_events" name="theme_grid_events">
						<option value="latest"><?php _e('Latest Added', THEME_NAME); ?></option>
						<option value="upcoming"><?php _e('Upcoming', THEME_NAME); ?></option>
					</select>
					<label for="theme_grid_events_number"><?php _e('No. of events', THEME_NAME); ?></label>&nbsp;
					<input style="width:40px;" type="text" id="theme_grid_events_number" name="theme_grid_events_number" value="" />
					<label for="theme_grid_events_slide_duration"><?php _e('Slide duration (in seconds)', THEME_NAME); ?></label>&nbsp;
					<input style="width:40px;" type="text" id="theme_grid_events_slide_duration" name="theme_grid_events_slide_duration" value="" />
				</div>

				<div class="inside function" id="theme_grid_option_custom_code">
					<label for="theme_grid_custom_code"><?php _e('Custom Code', THEME_NAME); ?></label><br/>
					<textarea style="width:400px;height:50px;" id="theme_grid_custom_code" name="theme_grid_custom_code"></textarea><br/>
					<input type="checkbox" value="" id="theme_grid_custom_code_center" name="theme_grid_custom_code_center" /> <?php _e('Center vertically &amp; horizontally', THEME_NAME); ?>
				</div>

				<div class="inside function" id="theme_grid_option_map">
					<br/><?php _e('Shows map defined in YoPress > Contact page', THEME_NAME); ?>
				</div>

				<div class="inside function" id="theme_grid_option_link">
					<label for="theme_grid_link"><?php _e('Link address', THEME_NAME); ?></label><br/>
					<?php if (function_exists('icl_get_languages')) :
					$languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
					?>
					<?php if (count($languages) > 1) : ?>
					<?php foreach ($languages as $key => $lang): ?>
						<?php echo strtoupper($lang['language_code']); ?> <input data-sel="link" type="text" id="theme_grid_link_<?php echo $lang['language_code'];?>" name="theme_grid_link_<?php echo $lang['language_code'];?>" value="" /><br/>
					<?php endforeach; ?>
					<?php else: ?>
						<input data-sel="link" type="text" id="theme_grid_link" name="theme_grid_link" value="" />
					<?php endif; ?>
					<?php else: ?>
						<input data-sel="link" type="text" id="theme_grid_link" name="theme_grid_link" value="" />
					<?php endif;?>
					<br/>
					<label for="theme_grid_link_blank"></label><br/>
					<input type="checkbox" value="" id="theme_grid_link_blank" name="theme_grid_link_blank" /> <?php _e('Open link in new window', THEME_NAME); ?>
				</div>

				<div class="inside function hidden" id="theme_grid_option_category">
					<label for="theme_grid_category"><?php _e('Category', THEME_NAME); ?></label><br/>
					<select name="yopress[theme_grid_category]" id="theme_grid_category">
						<?php
						$categories = get_categories(
							array(
								'type'                     => 'post',
								'child_of'                 => 0,
								'parent'                   => '',
								'orderby'                  => 'name',
								'order'                    => 'ASC',
								'hide_empty'               => 1,
								'hierarchical'             => 1,
								'exclude'                  => '',
								'include'                  => '',
								'number'                   => '',
								'taxonomy'                 => 'category',
								'pad_counts'               => false
							)
						);
						foreach ($categories as $category) : ?>
						<option value="<?php echo $category->slug; ?>"><?php echo $category->name; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<?php

				$page_list = get_posts( array( 
					'posts_per_page'   => -1,
					'offset'           => 0,
					'category'         => '',
					'orderby'          => 'post_title',
					'order'            => 'DESC',
					'include'          => '',
					'exclude'          => '',
					'meta_key'         => '',
					'meta_value'       => '',
					'post_type'        => 'page',
					'post_mime_type'   => '',
					'post_parent'      => '',
					'post_status'      => 'publish')
				);

				$page_title = array_map('barnelli_getTitle', $page_list );
				$page_ids = array_map('barnelli_getId', $page_list );

				$pagesArray = array_combine($page_ids, $page_title );

				ksort($pagesArray);
				?>
				<div class="inside function hidden" id="theme_grid_option_page">
					<label for="theme_grid_page"><?php _e('Page', THEME_NAME); ?></label><br/>
					<?php if (function_exists('icl_get_languages')) : ?>
					<?php					
					$languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
					if (!empty($languages)) :
						foreach ($languages as $key => $lang): ?>
							<?php echo strtoupper($lang['language_code']); ?>: <select name="yopress[theme_grid_page_<?php echo $lang['language_code']; ?>]" id="theme_grid_page_<?php echo $lang['language_code']; ?>">
								<?php
								foreach ($pagesArray as $p => $page) : ?>
								<option value="<?php echo $p; ?>"><?php echo $page; ?></option>
								<?php endforeach; ?>
							</select>
						<?php endforeach; ?>
						<?php else : ?>
							<select name="yopress[theme_grid_page]" id="theme_grid_page">
								<?php
								foreach ($pagesArray as $p => $page) : ?>
								<option value="<?php echo $p; ?>"><?php echo $page; ?></option>
								<?php endforeach; ?>
							</select>
						<?php endif;?>
					<?php else : ?>
					<select name="yopress[theme_grid_page]" id="theme_grid_page">
						<?php
						foreach ($pagesArray as $p => $page) : ?>
						<option value="<?php echo $p; ?>"><?php echo $page; ?></option>
						<?php endforeach; ?>
					</select>
					<?php endif; ?>
				</div>
				<div class="inside function hidden" id="theme_grid_option_slider_category">
					<label for="theme_grid_slider_category"><?php _e('Slider Category', THEME_NAME); ?></label><br/>
					<select name="yopress[theme_grid_slider_category]" id="theme_grid_slider_category">
						<?php
						$categories = get_categories(
							array(
								'type'                     => 'post',
								'child_of'                 => 0,
								'parent'                   => '',
								'orderby'                  => 'name',
								'order'                    => 'ASC',
								'hide_empty'               => 1,
								'hierarchical'             => 1,
								'exclude'                  => '',
								'include'                  => '',
								'number'                   => '',
								'taxonomy'                 => 'category',
								'pad_counts'               => false
							)
						);
						foreach ($categories as $category) : ?>
						<option value="<?php echo $category->slug; ?>"><?php echo $category->name; ?></option>
						<?php endforeach; ?>
					</select>
					<label for="theme_grid_slider_category_number"><?php _e('No. of posts', THEME_NAME); ?></label>&nbsp;
					<input style="width:40px;" type="text" id="theme_grid_slider_category_number" name="theme_grid_slider_category_number" value="" />

					<label for="theme_grid_slider_category_slide_duration"><?php _e('Slide duration (in seconds)', THEME_NAME); ?></label>&nbsp;
					<input style="width:40px;" type="text" id="theme_grid_slider_category_slide_duration" name="theme_grid_slider_category_slide_duration" value="" />
				</div>
				<hr>
				<div style="float:left; width: 33%;" class="titles">
					<h4><?php _e('Normal State', THEME_NAME); ?></h4>
					<div class="inside">
						<label for="theme_grid_title"><?php _e('Title', THEME_NAME); ?></label><br/>
						<input type="text" id="theme_grid_title" name="theme_grid_title" value="">
					</div>
					<div class="inside">
						<label for="theme_grid_subtitle"><?php _e('Subtitle', THEME_NAME); ?></label><br/>
						<input type="text" id="theme_grid_subtitle" name="theme_grid_subtitle" value="">
					</div>
				</div>
				<div style="float:left;margin-left:10px; width: 65%;">
					<h4><?php _e('Hover State', THEME_NAME); ?></h4>
					<div class="inside" class="titles">
						<label class="titles" for="theme_grid_title_hover"><?php _e('Hover Title', THEME_NAME); ?></label><br/>
						<input class="titles" type="text" id="theme_grid_title_hover" name="theme_grid_title_hover" value="">
					</div>
					
					<div class="inside" class="titles">
						<label class="titles" for="theme_grid_subtitle_hover"><?php _e('Hover Subtitle', THEME_NAME); ?></label><br/>
						<input class="titles" type="text" id="theme_grid_subtitle_hover" name="theme_grid_subtitle_hover" value="">
					</div>

					<div class="inside">
						<label for="theme_grid_icon"><?php _e('Icon', THEME_NAME); ?></label><br/>
						<i class="fa fa-leaf" id="restaurant-block-icon"></i>
						<input type="hidden" id="theme_grid_icon" name="theme_grid_icon" value="">
						<?php
						include_once THEME_INCLUDES . '/icon-picker.php';
						?>
					</div>

					<div class="inside">
						<label for="theme_grid_icon_image"><?php _e('Icon Image', THEME_NAME); ?></label><br/>
						<input id="theme_grid_icon_image" class="uploadinput-3" type="text" size="20" name="theme_grid_icon_image" value="" style="">
						<input id="upload_image_button" class="button button-primary upload_image_button" type="button" value="<?php _e('Choose', THEME_NAME); ?>" data-id="3">
						<input class="button button-primary upload_image_remove_button" type="button" value="<?php _e('Remove', THEME_NAME); ?>" data-id="3">
					</div>

				</div>
				<div>
						<?php _e('Note: Title &amp; Subtitle fields here always have higher priority.', THEME_NAME); ?>
				</div>
				<div style="clear:both"></div>

				<div class="inside">
					<label for="theme_grid_icon_save">&nbsp;</label><br/>
					<button class="button button-primary" name="save-edit-item" id="save-edit-item" value="save item"><?php _e('Ok', THEME_NAME); ?></button>
				</div>

		</div>
	<?php
}

function restaurantApperanceSettings() {
	global $barnelli_fontsArray;

	return array(
		array(
			'name' => 'restaurant_block_header_title_font',
			'type' => 'fontpicker',
			'label' => __('Title font', THEME_NAME),
			'htmlOptions' => array(),
			'default' => $barnelli_fontsArray,
		),
		array(
			'name' => 'restaurant_block_header_title_color',
			'type' => 'colorpicker',
			'label' => __('Title color', THEME_NAME),
			'default' => '#ffffff',
			'htmlOptions' => array()
		),
		array(
			'name' => 'restaurant_block_header_title_hover_color',
			'type' => 'colorpicker',
			'label' => __('Title hover olor', THEME_NAME),
			'default' => '#ffffff',
			'htmlOptions' => array()
		),
		array(
			'name' => 'restaurant_block_header_title_font_size',
			'type' => 'input',
			'label' => __('Title font size', THEME_NAME),
			'htmlOptions' => array(),
			'default' => '32'
		),
		array(
			'name' => 'restaurant_block_header_description_font',
			'type' => 'fontpicker',
			'label' => __('Subtitle font', THEME_NAME),
			'htmlOptions' => array(),
			'default' => $barnelli_fontsArray,
		),
		array(
			'name' => 'restaurant_block_header_description_color',
			'type' => 'colorpicker',
			'label' => __('Subtitle color', THEME_NAME),
			'default' => '#9e9e9e',
			'htmlOptions' => array()
		),
		array(
			'name' => 'restaurant_block_header_description_hover_color',
			'type' => 'colorpicker',
			'label' => __('Subtitle hover color', THEME_NAME),
			'default' => '#9e9e9e',
			'htmlOptions' => array()
		),
		array(
			'name' => 'restaurant_block_header_description_size',
			'type' => 'input',
			'label' => __('Subtitle font size', THEME_NAME),
			'htmlOptions' => array(),
			'default' => '16'
		),
		array(
			'name' => 'restaurant_block_color',
			'type' => 'colorpicker',
			'label' => __('Block color', THEME_NAME),
			'default' => '#000000',
			'htmlOptions' => array()
		),
		array(
			'name' => 'restaurant_caption_block_color',
			'type' => 'colorpicker',
			'label' => __('Caption block color', THEME_NAME),
			'default' => '#000000',
			'htmlOptions' => array()
		),
		array(
			'name' => 'restaurant_block_weekdays_color',
			'type' => 'colorpicker',
			'label' => __('Week days color', THEME_NAME),
			'default' => '#efefef',
			'htmlOptions' => array()
		),
		array(
			'name' => 'restaurant_block_opening_hours_color',
			'type' => 'colorpicker',
			'label' => __('Opening hours color', THEME_NAME),
			'default' => '#ffffff',
			'htmlOptions' => array()
		),
		array(
			'name' => 'bg_restaurant_img',
			'type' => 'uploader',
			'label' => __('Background image in Restaurant', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'bg_restaurant_color',
			'type' => 'colorpicker',
			'label' => __('Background Color in Restaurant', THEME_NAME),
			'default' => '#ffffff',
			'htmlOptions' => array()
		),
		array(
			'name'=>'restaurant_overwrite_block_image_with_featured',
			'type' => 'checkbox',
			'label' => __('Overwrite Block Image with Post Featured Image', THEME_NAME),
			'default' => '1',
		),
		array(
			'name' => 'restaurant_category_slide_duration',
			'type' => 'slider',
			'label' => __('Category Slide Duration', THEME_NAME),
			'default' => 4,
			'htmlOptions' => array('min'=>1, 'max'=>10)
		),
	);
}

function restaurantSettings() {

	$currentGridIndexes = explode(',', YSettings::g('restaurant_grid_indexes', '1390903454876,0,1390903454877,0,0,0,1390903454878,1390903454879,1390903480611,1390903480610,1390903480612,0,'));
	array_pop($currentGridIndexes);

	$indexes = array();
	$j = 1;

	foreach ($currentGridIndexes as $curr) {
		if ($curr != '0') {
			$indexes[] = array(
				'name' => 'theme_grid_name_'.$curr,
				'type' => 'hiddenInput',
				'default' => "block $j",
				'htmlOptions' => array()
			);

			$j++;

			$indexes[] = array(
				'name' => 'theme_grid_background_image_'.$curr,
				'type' => 'hiddenInput',
				'default' => '',
				'htmlOptions' => array()
			);
			$indexes[] = array(
				'name' => 'theme_grid_function_'.$curr,
				'type' => 'hiddenInput',
				'default' => '',
				'htmlOptions' => array()
			);
			$indexes[] = array(
				'name' => 'theme_grid_function_value_'.$curr,
				'type' => 'hiddenTextarea',
				'default' => '',
				'htmlOptions' => array()
			);

			$wpmllangs = barnelli_getWPMLLanguages();

			if ($wpmllangs) {
				foreach($wpmllangs as $wpmllang) {
					$indexes[] = array(
						'name' => 'theme_grid_function_value_'.$wpmllang.'_'.$curr,
						'type' => 'hiddenTextarea',
						'default' => '',
						'htmlOptions' => array()
					);
				}
			}

			$indexes[] = array(
				'name' => 'theme_grid_function_value_number_'.$curr,
				'type' => 'hiddenInput',
				'default' => '3',
				'htmlOptions' => array()
			);
			$indexes[] = array(
				'name' => 'theme_grid_function_value_duration_'.$curr,
				'type' => 'hiddenInput',
				'default' => '4',
				'htmlOptions' => array()
			);
			$indexes[] = array(
				'name' => 'theme_grid_title_'.$curr,
				'type' => 'hiddenInput',
				'default' => '',
				'htmlOptions' => array()
			);
			$indexes[] = array(
				'name' => 'theme_grid_subtitle_'.$curr,
				'type' => 'hiddenInput',
				'default' => '',
				'htmlOptions' => array()
			);
			$indexes[] = array(
				'name' => 'theme_grid_title_hover_'.$curr,
				'type' => 'hiddenInput',
				'default' => '',
				'htmlOptions' => array()
			);
			$indexes[] = array(
				'name' => 'theme_grid_subtitle_hover_'.$curr,
				'type' => 'hiddenInput',
				'default' => '',
				'htmlOptions' => array()
			);
			$indexes[] = array(
				'name' => 'theme_grid_icon_'.$curr,
				'type' => 'hiddenInput',
				'default' => 'fa fa-leaf',
				'htmlOptions' => array()
			);
			$indexes[] = array(
				'name' => 'theme_grid_icon_image_'.$curr,
				'type' => 'hiddenInput',
				'default' => '',
				'htmlOptions' => array()
			);
		}
	}

	$data = array(
		array(
			'name' => 'restaurant_grid_array',
			'type' => 'hiddenInput',
			'default' => 's2x2,0,s2x1,0,|0,0,s1x1,s1x1,|s1x1,s1x1,s2x1,0,|',
			'htmlOptions' => array()
		),
		array(
			'name' => 'restaurant_grid_indexes',
			'type' => 'hiddenInput',
			'default' => '1390903454876,0,1390903454877,0,0,0,1390903454878,1390903454879,1390903480611,1390903480610,1390903480612,0,',
			'htmlOptions' => array()
		),
		array(
			'name' => 'restaurant_grid',
			'type' => 'custom',
			'content' => 'restaurantGrid',
		),
	);

	return array_merge($data, $indexes);
}

function teamSettings() {
	return array(
		array(
			'name' => 'barnelli_team_number_of_columns',
			'type' => 'dropdown',
			'label' => __('Number of columns', THEME_NAME),
			'default' => array(
				'6' => '6',
				'5' => '5',
				'4' => '4',
				'3' => '3'
			),
			'htmlOptions' => array()
		),
	);
}

function excerptSettings() {
	return array(
		array(
			'name'=>'post_excerpt_length',
			'type' => 'input',
			'label' => 'Post excerpt length',
			'default' => 160,
			'htmlOptions' => array()
		),
	);
}

function drawCustomMenu() {
	$tmp = YSettings::g('dynamic_menu_list', 'foodmenu[:space:]Food Menu');
	$tmpCustomFoodMenus = explode('[:split:]', $tmp);

	$customFoodMenus = array();

	foreach ($tmpCustomFoodMenus as $key => $value) {
		if (!empty($value)) {
			$customFoodMenus[] = $value;
		}	
	}
?>
	<input type="hidden" id="dynamic_menu_list" name="yopress[dynamic_menu_list]" value="<?php echo $tmp; ?>" />

	<tr class="form-field">
		<td>
			<p>For example add slug: <strong>breakfast</strong> and name: <strong>Breakfast Menu</strong></p>
			<br/>
			<?php if (!empty($customFoodMenus)): ?>
			<ul id="menu-list-field">
				<?php foreach ($customFoodMenus as $key=>$cfm) : $m = explode('[:space:]', $cfm);?>
					<li id="food-menu-<?php echo $key; ?>">
						<div style="width:180px;float:left;">slug: <strong><?php echo $m[0]; ?></strong></div>
						<div style="width:180px;float:left;"> name: <strong><?php echo $m[1]; ?></strong></div>
						<div style="width:60px;float:left;"> <a class="delete-food-menu" data-id="<?php echo $key;?>" data-value="<?php echo $m[0]; ?>[:space:]<?php echo $m[1]; ?>" href="#"><i style="color:red" class="fa fa-times"></i> Delete</a></div>
						<div style="clear:both;"></div>

				<?php endforeach; ?>
			</ul>
			<br/>
			<div>
				slug: <input id="new-food-menu-slug" type="text" name="new-food-menu-slug" style="width:150px;" />
				name: <input id="new-food-menu-name" style="width:150px;" name="new-food-menu-name" type="text" />
				<button id="add-food-menu" name="add-food-menu" class="add button">Add</button>
			</div>
			<?php else : ?>
			<ul id="menu-list-field"></ul>
			<div>
				slug: <input id="new-food-menu-slug" type="text" name="new-food-menu-slug" style="width:150px;" />
				name: <input id="new-food-menu-name" style="width:150px;" name="new-food-menu-name" type="text" />
				<button id="add-food-menu" name="add-food-menu" class="add button">Add</button>
			</div>
			<br/>
			<?php endif; ?>
		</td>
	</tr>
	<script type="text/javascript">
	$ = jQuery.noConflict();
	$('document').ready(function($) {
		$('.delete-food-menu').click(function(e) {
			e.preventDefault();
			if (confirm('<?php _e('Removing this menu will end with removing of all menu items also. Continue ?', THEME_NAME);?>')) {
				var toRemove = $(this).data('value');
				var listId = $(this).data('id');

				var currentDynamicMenuList = $('#dynamic_menu_list').val();
				var newDynamicMenuList = currentDynamicMenuList.replace(toRemove, '').replace('[:split:][:split:]','[:split:]');
				$('#dynamic_menu_list').val(newDynamicMenuList);
				$('#food-menu-'+listId).remove();

				//ajax to remove it
				$.ajax({
					url: ajaxurl,
					type: 'POST',
					dataType: 'json',
					data: { 'action' : 'barnelli-food-menu-delete', 'value':toRemove },
				});
			}
		});

		$('#add-food-menu').click(function(e) {
			e.preventDefault();

			var newSlug = $('#new-food-menu-slug').val();
			var newName = $('#new-food-menu-name').val();

			if (!/^[a-z]+$/.test(newSlug)) {
				alert('<?php _e('Only a-z characters allowed in slug');?>');

				return false;
			}

			if (!/^[a-zA-Z0-9\-\_\ ]+$/i.test(newName)) {
				alert('<?php _e('Only a-Z 0-9 -_ and space are allowed in menu names');?>');

				return false;
			}

			if ( ((newSlug == false) || (newSlug == '')) || ((newName == false) || (newName == '')) ) {
				alert('<?php _e('Insert slug & name');?>');

				return false;
			}

			var newItem = newSlug + '[:space:]' + newName;
			var currentDynamicMenuList = $('#dynamic_menu_list').val();
			var newDynamicMenuList = currentDynamicMenuList + '[:split:]' + newItem;

			$('#dynamic_menu_list').val(newDynamicMenuList);

			var newElement = '<li id="food-menu-0">'+
				'<div style="width:180px;float:left;">slug: <strong>'+newSlug+'</strong></div>'+
				'<div style="width:180px;float:left;"> name: <strong>'+newName+'</strong></div>'+
				'<div style="width:60px;float:left;"> <a class="delete-food-menu" data-id="0" data-value="'+newSlug+'[:space:]'+newName+'" href="#"><i style="color:red" class="fa fa-times"></i> Delete</a></div>'+
				'<div style="clear:both;"></div>';

			$('#menu-list-field').append(newElement);
			$('#new-food-menu-slug').val('');
			$('#new-food-menu-name').val('');

		});
	});
	</script>
	<?php
}

function customMenuSettings() {
	return array(
		array(
			'name' => 'custom_menu',
			'type' => 'custom',
			'content' => 'drawCustomMenu'
		),
	);
}

function dynamicMenuSettings() {
	global $barnelli_foodMenuSlug;
	global $barnelli_foodMenuName;

	return array(
		array(
			'name' => 'dynamic_'.$barnelli_foodMenuSlug.'_menu_type',
			'type' => 'dropdown',
			'label' => __('Menu Type', THEME_NAME),
			'default' => array(
				'1' => 'List',
				'2' => 'Grid',
				'3' => 'Photo-grid',
			),
			'htmlOptions' => array()
		),
		array(
			'name' => 'dynamic_'.$barnelli_foodMenuSlug.'_grid_mod',
			'type' => 'dropdown',
			'label' => __('Number of Menu Columns', THEME_NAME),
			'default' => array(
				'4' => '3',
				'3' => '4'
				),
			'htmlOptions' => array()
		),
		array(
			'name' => 'dynamic_'.$barnelli_foodMenuSlug.'_top_menu_font_color',
			'type' => 'colorpicker',
			'label' => __('Menu Title Color (Page Title) ie. Our Tasty menu or Menu', THEME_NAME),
			'default' => '#ffffff',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'dynamic_'.$barnelli_foodMenuSlug.'_cat_font_color',
			'type' => 'colorpicker',
			'label' => __('Food Category ie. Main Dishes', THEME_NAME),
			'default' => '#ffffff',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'dynamic_'.$barnelli_foodMenuSlug.'_title_font_color',
			'type' => 'colorpicker',
			'label' => __('Food Item & Description ie. Pizza Pepperoni (small portion)', THEME_NAME),
			'default' => '#ffffff',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'dynamic_'.$barnelli_foodMenuSlug.'_description_font_color',
			'type' => 'colorpicker',
			'label' => __('Description Font Color ie. cheese, sauce, pepperoni', THEME_NAME),
			'default' => '#a4a4a4',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'dynamic_'.$barnelli_foodMenuSlug.'_price_currency',
			'type' => 'input',
			'label' => __('Currency Sign ie. $, &#128;, &pound; etc.', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'dynamic_'.$barnelli_foodMenuSlug.'_price_font_color',
			'type' => 'colorpicker',
			'label' => __('Currency Sign Color', THEME_NAME),
			'default' => '#ffffff',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'dynamic_'.$barnelli_foodMenuSlug.'_currency_side',
			'type' => 'dropdown',
			'label' => __('Currency Sign Position', THEME_NAME),
			'default' => array(
				'left' => 'left',
				'right' => 'right',
				'none' => 'none'
				),
			'htmlOptions' => array()
		),
		array(
			'name' => 'dynamic_'.$barnelli_foodMenuSlug.'_seperator_color',
			'type' => 'colorpicker',
			'label' => __('Category separator color (menu type 2 and 3 only)', THEME_NAME),
			'default' => '#ffffff',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'dynamic_'.$barnelli_foodMenuSlug.'_bg_image',
			'type' => 'uploader',
			'label' => __t( 'Menu Background' ),
			'default' => THEME_DIR_URI . '/img/chalkboard-loop.jpg',
			'htmlOptions' => array()
		),
		array(
			'name' => 'dynamic_'.$barnelli_foodMenuSlug.'_bg_color',
			'type' => 'colorpicker',
			'label' => __('Background Color', THEME_NAME),
			'default' => '#ffffff',
			'htmlOptions' =>array()
		),
		array(
			'name'=>'dynamic_'.$barnelli_foodMenuSlug.'_menu_font',
			'type' => 'fontpicker',
			'label' => __('Menu Font', THEME_NAME),
			'htmlOptions' => array(),
			'default' => $barnelli_fontsArray
		)
	);
}

function timezoneSettings() {
	$timezones = array('Africa/Cairo' => 'Africa/Cairo', 'Africa/Casablanca' => 'Africa/Casablanca', 'Africa/Harare' => 'Africa/Harare', 'Africa/Johannesburg' => 'Africa/Johannesburg', 'Africa/Lagos' => 'Africa/Lagos', 'Africa/Monrovia' => 'Africa/Monrovia', 'Africa/Nairobi' => 'Africa/Nairobi', 'America/Argentina/Buenos_Aires' => 'America/Argentina/Buenos_Aires', 'America/Argentina/Buenos_Aires' => 'America/Argentina/Buenos_Aires', 'America/Bogota' => 'America/Bogota', 'America/Bogota' => 'America/Bogota', 'America/Caracas' => 'America/Caracas', 'America/Chihuahua' => 'America/Chihuahua', 'America/Chihuahua' => 'America/Chihuahua', 'America/Godthab' => 'America/Godthab', 'America/La_Paz' => 'America/La_Paz', 'America/Lima' => 'America/Lima', 'America/Los_Angeles' => 'America/Los_Angeles', 'America/Managua' => 'America/Managua', 'America/Mazatlan' => 'America/Mazatlan', 'America/Mexico_City' => 'America/Mexico_City', 'America/Mexico_City' => 'America/Mexico_City', 'America/Monterrey' => 'America/Monterrey', 'America/Noronha' => 'America/Noronha', 'America/Santiago' => 'America/Santiago', 'America/Sao_Paulo' => 'America/Sao_Paulo', 'America/Tijuana' => 'America/Tijuana', 'Asia/Almaty' => 'Asia/Almaty', 'Asia/Baghdad' => 'Asia/Baghdad', 'Asia/Baku' => 'Asia/Baku', 'Asia/Bangkok' => 'Asia/Bangkok', 'Asia/Bangkok' => 'Asia/Bangkok', 'Asia/Calcutta' => 'Asia/Calcutta', 'Asia/Calcutta' => 'Asia/Calcutta', 'Asia/Calcutta' => 'Asia/Calcutta', 'Asia/Calcutta' => 'Asia/Calcutta', 'Asia/Chongqing' => 'Asia/Chongqing', 'Asia/Dhaka' => 'Asia/Dhaka', 'Asia/Dhaka' => 'Asia/Dhaka', 'Asia/Hong_Kong' => 'Asia/Hong_Kong', 'Asia/Hong_Kong' => 'Asia/Hong_Kong', 'Asia/Irkutsk' => 'Asia/Irkutsk', 'Asia/Jakarta' => 'Asia/Jakarta', 'Asia/Jerusalem' => 'Asia/Jerusalem', 'Asia/Kabul' => 'Asia/Kabul', 'Asia/Kamchatka' => 'Asia/Kamchatka', 'Asia/Karachi' => 'Asia/Karachi', 'Asia/Karachi' => 'Asia/Karachi', 'Asia/Katmandu' => 'Asia/Katmandu', 'Asia/Kolkata' => 'Asia/Kolkata', 'Asia/Krasnoyarsk' => 'Asia/Krasnoyarsk', 'Asia/Kuala_Lumpur' => 'Asia/Kuala_Lumpur', 'Asia/Kuwait' => 'Asia/Kuwait', 'Asia/Magadan' => 'Asia/Magadan', 'Asia/Magadan' => 'Asia/Magadan', 'Asia/Magadan' => 'Asia/Magadan', 'Asia/Muscat' => 'Asia/Muscat', 'Asia/Muscat' => 'Asia/Muscat', 'Asia/Novosibirsk' => 'Asia/Novosibirsk', 'Asia/Rangoon' => 'Asia/Rangoon', 'Asia/Riyadh' => 'Asia/Riyadh', 'Asia/Seoul' => 'Asia/Seoul', 'Asia/Singapore' => 'Asia/Singapore', 'Asia/Taipei' => 'Asia/Taipei', 'Asia/Tashkent' => 'Asia/Tashkent', 'Asia/Tbilisi' => 'Asia/Tbilisi', 'Asia/Tehran' => 'Asia/Tehran', 'Asia/Tokyo' => 'Asia/Tokyo', 'Asia/Tokyo' => 'Asia/Tokyo', 'Asia/Tokyo' => 'Asia/Tokyo', 'Asia/Ulan_Bator' => 'Asia/Ulan_Bator', 'Asia/Urumqi' => 'Asia/Urumqi', 'Asia/Vladivostok' => 'Asia/Vladivostok', 'Asia/Yakutsk' => 'Asia/Yakutsk', 'Asia/Yekaterinburg' => 'Asia/Yekaterinburg', 'Asia/Yerevan' => 'Asia/Yerevan', 'Atlantic/Azores' => 'Atlantic/Azores', 'Atlantic/Cape_Verde' => 'Atlantic/Cape_Verde', 'Australia/Adelaide' => 'Australia/Adelaide', 'Australia/Brisbane' => 'Australia/Brisbane', 'Australia/Canberra' => 'Australia/Canberra', 'Australia/Darwin' => 'Australia/Darwin', 'Australia/Hobart' => 'Australia/Hobart', 'Australia/Melbourne' => 'Australia/Melbourne', 'Australia/Perth' => 'Australia/Perth', 'Australia/Sydney' => 'Australia/Sydney', 'Canada/Atlantic' => 'Canada/Atlantic', 'Canada/Newfoundland' => 'Canada/Newfoundland', 'Canada/Saskatchewan' => 'Canada/Saskatchewan', 'Etc/Greenwich' => 'Etc/Greenwich', 'Europe/Amsterdam' => 'Europe/Amsterdam', 'Europe/Athens' => 'Europe/Athens', 'Europe/Belgrade' => 'Europe/Belgrade', 'Europe/Berlin' => 'Europe/Berlin', 'Europe/Berlin' => 'Europe/Berlin', 'Europe/Bratislava' => 'Europe/Bratislava', 'Europe/Brussels' => 'Europe/Brussels', 'Europe/Bucharest' => 'Europe/Bucharest', 'Europe/Budapest' => 'Europe/Budapest', 'Europe/Copenhagen' => 'Europe/Copenhagen', 'Europe/Helsinki' => 'Europe/Helsinki', 'Europe/Helsinki' => 'Europe/Helsinki', 'Europe/Istanbul' => 'Europe/Istanbul', 'Europe/Lisbon' => 'Europe/Lisbon', 'Europe/Ljubljana' => 'Europe/Ljubljana', 'Europe/London' => 'Europe/London', 'Europe/London' => 'Europe/London', 'Europe/Madrid' => 'Europe/Madrid', 'Europe/Minsk' => 'Europe/Minsk', 'Europe/Moscow' => 'Europe/Moscow', 'Europe/Moscow' => 'Europe/Moscow', 'Europe/Paris' => 'Europe/Paris', 'Europe/Prague' => 'Europe/Prague', 'Europe/Riga' => 'Europe/Riga', 'Europe/Rome' => 'Europe/Rome', 'Europe/Sarajevo' => 'Europe/Sarajevo', 'Europe/Skopje' => 'Europe/Skopje', 'Europe/Sofia' => 'Europe/Sofia', 'Europe/Stockholm' => 'Europe/Stockholm', 'Europe/Tallinn' => 'Europe/Tallinn', 'Europe/Vienna' => 'Europe/Vienna', 'Europe/Vilnius' => 'Europe/Vilnius', 'Europe/Volgograd' => 'Europe/Volgograd', 'Europe/Warsaw' => 'Europe/Warsaw', 'Europe/Zagreb' => 'Europe/Zagreb', 'Nuku`alofa' => 'Pacific/Tongatapu', 'Pacific/Auckland' => 'Pacific/Auckland', 'Pacific/Auckland' => 'Pacific/Auckland', 'Pacific/Fiji' => 'Pacific/Fiji', 'Pacific/Fiji' => 'Pacific/Fiji', 'Pacific/Guam' => 'Pacific/Guam', 'Pacific/Honolulu' => 'Pacific/Honolulu', 'Pacific/Kwajalein' => 'Pacific/Kwajalein', 'Pacific/Midway' => 'Pacific/Midway', 'Pacific/Port_Moresby' => 'Pacific/Port_Moresby', 'Pacific/Samoa' => 'Pacific/Samoa', 'US/Alaska' => 'US/Alaska', 'US/Arizona' => 'US/Arizona', 'US/Central' => 'US/Central', 'US/East-Indiana' => 'US/East-Indiana', 'US/Eastern' => 'US/Eastern', 'US/Mountain' => 'US/Mountain', 'UTC' => 'UTC');
	return array(
		array(
			'name' => 'restaurant_location_timezone',
			'type' => 'dropdown',
			'label' => __('Restaurant location timezone', THEME_NAME),
			'default' => $timezones,
			'htmlOptions' => array(),
			'selected' => 'UTC'
		)
	);
}

function drawOpenings() {
	$timeArray = array();
	$secondTimeArray = array();

	$timeArray['closed'] = 'Closed';
	$secondTimeArray['-'] = '-';

	for ($i=0;$i<=23;$i++) {
		if ($i<10) {
				$i = '0'.$i;
		}
		for ($j=0;$j<60;$j+=15) {
			if ($j<10) {
				$j = '0'.$j;
			}

			$tmp = $i .':'. $j;
			$timeArray[$tmp] = $i.':'.$j;
			$secondTimeArray[$tmp] = $i.':'.$j;
		}
	}

	$timeArray['24:00'] = '24:00';
	$secondTimeArray['24:00'] = '24:00';

	$weekDays = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
	$placeHolders = array('Md.', 'Tu.', 'We.', 'Th.', 'Fr.', 'Sa.', 'Su.');
	$i = 0;
	?>
	<tr class="form-field"><th scope="row"><?php _e('Day Name');?> / <?php _e('Short Name');?></th><td><?php _e('Open');?> / <?php _e('Close');?></td><td><?php _e('Secondary');?><br/><?php _e('Open');?> / <?php _e('Close');?><br/>(<?php _e('Optional');?>)</td></tr>
	<?php foreach ($weekDays as $day) : ?>
	<tr class="form-field">
		<th scope="row">
			<label for="theme_<?php echo $day; ?>_long_id">
				<input style="width:80px;" type="text" id="theme_<?php echo $day; ?>_long_id" placeholder="<?php echo ucfirst($day); ?>" name="yopress[theme_<?php echo $day; ?>_long]" value="<?php echo YSettings::g("theme_".$day."_long"); ?>">
				<input style="width:40px;" type="text" id="theme_<?php echo $day; ?>_short_id" placeholder="<?php echo $placeHolders[$i]; ?>" name="yopress[theme_<?php echo $day; ?>_short]" value="<?php echo YSettings::g("theme_".$day."_short"); ?>">
			</label>
		</th>
		<td>
			<select class="open" name="yopress[theme_<?php echo $day; ?>_open]" id="theme_<?php echo $day; ?>_open_id">
				<?php foreach ($timeArray as $time) : ?>
				<option value="<?php echo $time; ?>" <?php selected(YSettings::g('theme_'.$day.'_open'), $time, true); ?>><?php echo $time; ?></option>
				<?php endforeach; ?>
			</select>
			<select class="close" name="yopress[theme_<?php echo $day; ?>_close]" id="theme_<?php echo $day; ?>_close_id">
				<?php foreach ($timeArray as $time) : ?>
				<option value="<?php echo $time; ?>" <?php selected(YSettings::g('theme_'.$day.'_close'), $time, true); ?>><?php echo $time; ?></option>
				<?php endforeach; ?>
			</select>
		</td>
		<td>
			<select class="open" name="yopress[theme_<?php echo $day; ?>_open_second]" id="theme_<?php echo $day; ?>_open_second_id">
				<?php foreach ($secondTimeArray as $time) : ?>
				<option value="<?php echo $time; ?>" <?php selected(YSettings::g('theme_'.$day.'_open_second'), $time, true); ?>><?php echo $time; ?></option>
				<?php endforeach; ?>
			</select>
			<select class="close" name="yopress[theme_<?php echo $day; ?>_close_second]" id="theme_<?php echo $day; ?>_close_second_id">
				<?php foreach ($secondTimeArray as $time) : ?>
				<option value="<?php echo $time; ?>" <?php selected(YSettings::g('theme_'.$day.'_close_second'), $time, true); ?>><?php echo $time; ?></option>
				<?php endforeach; ?>
			</select>
		</td>
	</tr>
	<?php
	$i++;
	endforeach;
}

function openingLabels() {
	return array(
		array(
			'name' => 'reservation_open_label',
			'type' => 'input',
			'label' => __('Open label', THEME_NAME),
			'default' => 'open',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_closed_label',
			'type' => 'input',
			'label' => __('Closed label', THEME_NAME),
			'default' => 'closed',
			'htmlOptions' => array()
		),
		array(
			'name' => 'opening_times_format',
			'type' => 'dropdown',
			'label' => __('Time format', THEME_NAME),
			'default' => array('24h'=>'24 h', '12h'=>'12 h'),
			'htmlOptions' => array()
		),
	);
}

function openingSettings() {
	return array(
		array(
			'name' => 'theme_monday_open_test',
			'type' => 'custom',
			'content' => 'drawOpenings',
		), 
		array(
			'name' => 'reservation_closed',
			'type' => 'input',
			'label' => __('Close label', THEME_NAME),
			'default' => 'Closed',
			'htmlOptions' => array()
		)
	);
}

function drawClosingSettings() {
	?>
	<tr class="form-field">
		<th scope="row">
			<label for="reservation_open_label_id"><?php _e('Add Date Range');?></label>
		</th>
		<td>
			<input type="text" style="width:200px;" id="add-range" name="add-range"/> <button id="add-range-button" class="button"><?php _e('Add');?></button>
		</td>
	</tr>
	
	<?php
}

function closingSettings() {
	return array(
		array(
			'name' => 'theme_closing_times',
			'type' => 'custom',
			'content' => 'drawClosingSettings',
		), 
	);
}

function reservationValidation() {
	return array(
		array(
			'name' => 'reservation_validation_show',
			'type' => 'checkbox',
			'label' => __('Show Additional Information', THEME_NAME),
			'default' => 0,
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_validation_date',
			'type' => 'input',
			'label' => __('Wrong Date Message', THEME_NAME),
			'default' => 'We are closed at this time',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_validation_name',
			'type' => 'input',
			'label' => __('Insert Name Message', THEME_NAME),
			'default' => 'Please insert your name',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_validation_email',
			'type' => 'input',
			'label' => __('Insert E-Mail Message', THEME_NAME),
			'default' => 'Please insert valid email address',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_validation_phone',
			'type' => 'input',
			'label' => __('Insert Phone Message', THEME_NAME),
			'default' => 'Please insert your telephone number',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_validation_amount',
			'type' => 'input',
			'label' => __('Insert Amount Message', THEME_NAME),
			'default' => 'Please insert number of people',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_validation_custom_1',
			'type' => 'input',
			'label' => __('Insert Custom 1 Message', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_validation_custom_2',
			'type' => 'input',
			'label' => __('Insert Custom 2 Message', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_validation_custom_3',
			'type' => 'input',
			'label' => __('Insert Custom 3 Message', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_validation_message',
			'type' => 'input',
			'label' => __('Insert Message', THEME_NAME),
			'default' => 'Please insert some message',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_validation_captcha',
			'type' => 'input',
			'label' => __('Wrong Captcha Message', THEME_NAME),
			'default' => 'Inserted wrong captcha, check it again!',
			'htmlOptions' => array()
		),
	);
}

function reservationLog() {
	return array(
		array(
			'name' => 'reservation_log',
			'type' => 'custom',
			'content' => 'drawReservationLog',
		)
	);
}

function drawReservationLog() {
	?>
	Reservation log, log of all reservation separated daily, with option to confirm/cancel each reservation, add more info into reservation.
	Option to print week log or daily log.

	<table id="reservation-log-table" class="table table-bordered">
	  <thead>
	  	<th>Date</th>
	  	<th>Hour</th>
	    <th>Name</th>
	    <th>Email</th>
	    <th>Phone</th>
	    <th>Amount</th>
	    <th>Custom 1</th>
	    <th>Custom 2</th>
	    <th>Custom 3</th>
	    <th>Message</th>
	    <th>Confirmation</th>
	    <th>Notes</th>
	  </thead>
	  <tbody>
	  </tbody>
	</table>
	<?php
}

function reservationTranslation() {
	return array(
		array(
			'name' => 'reservation_january',
			'type' => 'input',
			'label' => __('January', THEME_NAME),
			'default' => 'January',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_february',
			'type' => 'input',
			'label' => __('February', THEME_NAME),
			'default' => 'February',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_march',
			'type' => 'input',
			'label' => __('March', THEME_NAME),
			'default' => 'March',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_april',
			'type' => 'input',
			'label' => __('April', THEME_NAME),
			'default' => 'April',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_may',
			'type' => 'input',
			'label' => __('May', THEME_NAME),
			'default' => 'May',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_june',
			'type' => 'input',
			'label' => __('June', THEME_NAME),
			'default' => 'June',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_july',
			'type' => 'input',
			'label' => __('July', THEME_NAME),
			'default' => 'July',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_august',
			'type' => 'input',
			'label' => __('August', THEME_NAME),
			'default' => 'August',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_september',
			'type' => 'input',
			'label' => __('September', THEME_NAME),
			'default' => 'September',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_october',
			'type' => 'input',
			'label' => __('October', THEME_NAME),
			'default' => 'October',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_november',
			'type' => 'input',
			'label' => __('November', THEME_NAME),
			'default' => 'November',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_december',
			'type' => 'input',
			'label' => __('December', THEME_NAME),
			'default' => 'December',
			'htmlOptions' => array()
		),
	);
}

function reservationCaptcha() {
	$arr =  array(
		array(
			'name' => 'reservation_captcha_enabled',
			'type' => 'checkbox',
			'label' => __('Enable captcha', THEME_NAME),
			'default' => '1',
			'htmlOptions' => array(),
		),
		array(
			'name' => 'reservation_captcha_placeholder',
			'type' => 'input',
			'label' => __('Captcha placeholder', THEME_NAME),
			'default' => 'captcha',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_captcha_type',
			'type' => 'dropdown',
			'label' => __('Captcha type', THEME_NAME),
			'default' => array('mathematic'=>'Mathematic', 'string'=>'String'),
			'selected' => 'mathematic',
			'htmlOptions' => array()
		)
	);
	if (YSettings::g('reservation_captcha_type', 'mathematic') == 'string') {
		$arr[] = array(
			'name' => 'reservation_captcha_string_length',
			'type' => 'slider',
			'label' => __('Captcha string length', THEME_NAME),
			'default' => 6,
			'htmlOptions' => array('min'=>2, 'max'=>8)
		);

	}
	return $arr;
}

function reservationSettings() {
	return array(
		array(
			'name' => 'reservation_disable_opening_check',
			'type' => 'checkbox',
			'label' => __('Disable date time picker', THEME_NAME),
			'default' => '0',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_current_label',
			'type' => 'input',
			'label' => __('Current day label', THEME_NAME),
			'default' => 'Opening hours',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_past_label',
			'type' => 'input',
			'label' => __('Past day label', THEME_NAME),
			'default' => 'This day already passed',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_time_format',
			'type' => 'dropdown',
			'label' => __('Reservation time format', THEME_NAME),
			'default' => array('12h' => '12 h (am/pm)', '24h' => '24 h'),
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_title',
			'type' => 'input',
			'label' => __('Reservation header/title', THEME_NAME),
			'default' => 'Reservation',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_description',
			'type' => 'textarea',
			'label' => __('Reservation text box', THEME_NAME),
			'default' => '',
			'htmlOptions' => array("style"=>'height:100px;')
		),
		array(
			'name' => 'reservation_date_header',
			'type' => 'input',
			'label' => __('Date picker header', THEME_NAME),
			'default' => 'Date',
			'htmlOptions' => array()
		),array(
			'name' => 'reservation_form_header',
			'type' => 'input',
			'label' => __('Reservation form header', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_name',
			'type' => 'input',
			'label' => __('Name placeholder', THEME_NAME),
			'default' => 'name',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_name_required',
			'type' => 'checkbox',
			'label' => __('Name required', THEME_NAME),
			'default' => '1',
			'htmlOptions' => array(),
		),
		array(
			'name' => 'reservation_email',
			'type' => 'input',
			'label' => __('E-mail placeholder', THEME_NAME),
			'default' => 'e-mail',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_email_required',
			'type' => 'checkbox',
			'label' => __('Email required', THEME_NAME),
			'default' => '1',
			'htmlOptions' => array(),
		),
		array(
			'name' => 'reservation_phone',
			'type' => 'input',
			'label' => __('Phone placeholder', THEME_NAME),
			'default' => 'phone',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_phone_required',
			'type' => 'checkbox',
			'label' => __('Phone required', THEME_NAME),
			'default' => '1',
			'htmlOptions' => array(),
		),
		array(
			'name' => 'reservation_people_amount',
			'type' => 'input',
			'label' => __('People amount placeholder', THEME_NAME),
			'default' => 'people amount',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_people_required',
			'type' => 'checkbox',
			'label' => __('People required', THEME_NAME),
			'default' => '1',
			'htmlOptions' => array(),
		),
		array(
			'name' => 'reservation_message',
			'type' => 'input',
			'label' => __('Message placeholder', THEME_NAME),
			'default' => 'message',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_message_required',
			'type' => 'checkbox',
			'label' => __('Message required', THEME_NAME),
			'default' => '1',
			'htmlOptions' => array(),
		),
		array(
			'name' => 'reservation_custom_1',
			'type' => 'input',
			'label' => __('Custom input 1', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_custom_1_required',
			'type' => 'checkbox',
			'label' => __('Custom input 1 required', THEME_NAME),
			'default' => '',
			'htmlOptions' => array(),
		),
		array(
			'name' => 'reservation_custom_2',
			'type' => 'input',
			'label' => __('Custom input 2', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_custom_2_required',
			'type' => 'checkbox',
			'label' => __('Custom input 2 required', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_custom_3',
			'type' => 'input',
			'label' => __('Custom input 3', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_custom_3_required',
			'type' => 'checkbox',
			'label' => __('Custom input 3 required', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_terms',
			'type' => 'textarea',
			'label' => __('Reservation Terms Link', THEME_NAME),
			'default' => "",
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_terms_required',
			'type' => 'checkbox',
			'label' => __('Reservation Terms required', THEME_NAME),
			'default' => '0',
			'htmlOptions' => array()
		),

		array(
			'name' => 'button_value',
			'type' => 'input',
			'label' => __('Button text', THEME_NAME),
			'default' => 'confirm',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'reservation_send_message',
			'type' => 'input',
			'label' => __('Message after success reservation', THEME_NAME),
			'default' => 'Reservation message was sent. Thank you!',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_send_fail',
			'type' => 'input',
			'label' => __('Message sending error', THEME_NAME),
			'default' => 'Error occurred! Try again later!',
			'htmlOptions' => array()
		),
		
		array(
			'name' => 'mail_destination',
			'type' => 'input',
			'label' => __('Where to send mail?', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'reservation_send_confirmation',
			'type' => 'checkbox',
			'label' => __('Send reservation confirmation to customer', THEME_NAME),
			'default' => '0',
			'htmlOptions' => array()
		),
	);
}

function mobileSettings() {
	$page_list = get_posts(array(
		'posts_per_page'   => -1,
		'offset'           => 0,
		'category'         => '',
		'orderby'          => 'post_title',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'page',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish')
	);

	$page_title = array_merge( array('-- '.__('Choose', THEME_NAME).' --'), array_map('barnelli_getTitle', $page_list ));
	$page_ids = array_merge( array('-'), array_map('barnelli_getId', $page_list ));
	$pagesArray = array_combine($page_ids, $page_title);

	return array(
		array(
			'name' => 'arrow_link',
			'type' => 'input',
			'label' => __('Mobile Arrow URL Link', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'arrow_link_enabled',
			'type' => 'checkbox',
			'label' => __('Enable Arrow Link', THEME_NAME),
			'default' => '1',
			'htmlOptions' => array()
		),
		array(
			'name' => 'turn_off_amazing_menu',
			'type' => 'checkbox',
			'label' => __('Auto Close Menu', THEME_NAME),
			'default' => '1',
			'htmlOptions' => array()
		),
		array(
			'name' => 'disable_mobile_sidebars',
			'type' => 'checkbox',
			'label' => __('Disable Sidebars on Mobile', THEME_NAME),
			'default' => '0',
			'htmlOptions' => array()
		),
		// array(
		// 	'name' => 'alternative_mobile_page',
		// 	'type' => 'dropdown',
		// 	'label' => __('Alternative Mobile Page', THEME_NAME),
		// 	'default' => $pagesArray,
		// 	'htmlOptions' => array()
		// )
	);
}

function generalSettings() {
	$array = array(
		array(
			'name' => 'theme_google_analytics',
			'type' => 'textarea',
			'label' => __('Google Analytics script code', THEME_NAME),
			'default' => '',
			'htmlOptions' => array('style'=>'height:100px;')
		),
		array(
			'name' => 'remove_wp_version',
			'type' => 'checkbox',
			'label' => __('Hide WP Version', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		//TODO: dynamic menu position top/bottom/mixed (default - bottom slider rest top)
		// array(
		// 	'name' => 'theme_navbar_position',
		// 	'type' => 'dropdown',
		// 	'label' => __('Position of navigation bar', THEME_NAME),
		// 	'default' => array(
		// 		'dynamic' => __('Dynamic (at bottom on homepage, rest pages at top)', THEME_NAME),
		// 		'top' => __('Top', THEME_NAME),
		// 		'bottom' => __('Bottom', THEME_NAME)
		// 	),
		// 	'htmlOptions' => array()
		// ),
		array(
			'name' => 'theme_navbar_always_on_top',
			'type' => 'checkbox',
			'label' => __('Navigation Menu Always On Top', THEME_NAME),
			'default' => '0',
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_show_title_on_pages',
			'type' => 'checkbox',
			'label' => __('Show title header on post/pages', THEME_NAME),
			'default' => '0',
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_enable_top_bar_languages',
			'type' => 'checkbox',
			'label' => __('Enable WPML switcher in top bar', THEME_NAME),
			'default' => '0',
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_menu_searchbar',
			'type' => 'checkbox',
			'label' => __('Show search in top bar', THEME_NAME),
			'default' => '0',
			'htmlOptions' => array()
		)
	);

	if (!barnelli_isPluginActive('woocommerce/woocommerce.php')) {
		$array[] = array(
			'name' => 'theme_disable_djax',
			'type' => 'checkbox',
			'label' => __('Disable DJAX<br/><small>(dynamic page load via ajax)</small>', THEME_NAME),
			'default' => '0',
			'htmlOptions' => array()
		);
	}

	return $array;
}

function blogSettings() {
	return array(
		array(
			'name' => 'blog_settings_div',
			'type' => 'custom',
			'content' => 'drawBlogSettings',
		),
		array(
			'name' => 'blog_show_author',
			'type' => 'checkbox',
			'label' => __('Show Author', THEME_NAME),
			'default' => '1',
			'htmlOptions' => array()
		),
		array(
			'name' => 'blog_show_date',
			'type' => 'checkbox',
			'label' => __('Show Date', THEME_NAME),
			'default' => '1',
			'htmlOptions' => array()
		),
		array(
			'name' => 'blog_show_cat',
			'type' => 'checkbox',
			'label' => __('Show Categories', THEME_NAME),
			'default' => '1',
			'htmlOptions' => array()
		),
		array(
			'name' => 'blog_show_tag',
			'type' => 'checkbox',
			'label' => __('Show Tags', THEME_NAME),
			'default' => '1',
			'htmlOptions' => array()
		),
		array(
			'name' => 'blog_show_readmore',
			'type' => 'checkbox',
			'label' => __('Show Read More Link', THEME_NAME),
			'default' => '0',
			'htmlOptions' => array()
		),
		array(
			'name' => 'blog_show_readmore_label',
			'type' => 'input',
			'label' => __('Read More Link Label', THEME_NAME),
			'default' => 'Read More ...',
			'htmlOptions' => array()
		),
		array(
			'name' => 'blog_comments_validation_error',
			'type' => 'input',
			'label' => __('Blog Comment Validation Error', THEME_NAME),
			'default' => 'You might have left one of the fields blank, or be posting too quickly',
			'htmlOptions' => array()
		),
		array(
			'name' => 'blog_comments_validation_success',
			'type' => 'input',
			'label' => __('Blog Comment Validation Success', THEME_NAME),
			'default' => 'Thanks for your comment. We appreciate your response.',
			'htmlOptions' => array()
		)
	);
}

function footerSettings() {
	return array(
		array(
			'name' => 'theme_footer',
			'type' => 'checkbox',
			'label' => __('Display Footer', THEME_NAME) . '<br/><small>(' . __('Posts, Pages with global footer settings') . ')</small>',
			'default' => '0',
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_footer_columns',
			'type' => 'dropdown',
			'label' => __('Number Of Columns', THEME_NAME),
			'default' => array('4'=>__('Four', THEME_NAME), '3'=>__('Three', THEME_NAME), '2'=>__('Two', THEME_NAME), '1'=>__('One', THEME_NAME)),
			'selected' => '4',
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_footer_archive',
			'type' => 'checkbox',
			'label' => __('Display Footer On Search/404/Archive/Author/Tags Page', THEME_NAME),
			'default' => '0',
			'htmlOptions' => array()
		),
	);
}

function footerSettingsRestaurant() {
	return array(
		array(
			'name' => 'theme_footer_restaurant_header_color',
			'type' => 'colorpicker',
			'label' => __('Footer Headers Color', THEME_NAME),
			'default' => '#ffffff'
		),
		array(
			'name' => 'theme_footer_restaurant_color',
			'type' => 'colorpicker',
			'label' => __('Footer Font Color', THEME_NAME),
			'default' => '#ffffff'
		),
		array(
			'name' => 'theme_footer_restaurant_link_color',
			'type' => 'colorpicker',
			'label' => __('Footer Link Color', THEME_NAME),
			'default' => '#ffffff'
		),
		array(
			'name' => 'theme_footer_restaurant_hover_link_color',
			'type' => 'colorpicker',
			'label' => __('Footer Hover Link Color', THEME_NAME),
			'default' => '#cccccc'
		),
	);
}

function footerSettingsMenu() {
	return array(
		array(
			'name' => 'theme_footer_menu_header_color',
			'type' => 'colorpicker',
			'label' => __('Footer Headers Color', THEME_NAME),
			'default' => '#ffffff'
		),
		array(
			'name' => 'theme_footer_menu_color',
			'type' => 'colorpicker',
			'label' => __('Footer Font Color', THEME_NAME),
			'default' => '#ffffff'
		),
		array(
			'name' => 'theme_footer_menu_link_color',
			'type' => 'colorpicker',
			'label' => __('Footer Link Color', THEME_NAME),
			'default' => '#ffffff'
		),
		array(
			'name' => 'theme_footer_menu_hover_link_color',
			'type' => 'colorpicker',
			'label' => __('Footer Hover Link Color', THEME_NAME),
			'default' => '#cccccc'
		),
	);
}

function drawBlogSettings() {
	$dropdownCategories = array('all'=>__('All categories', THEME_NAME));

	$categories = get_categories();

	foreach ($categories as $category) {
		$dropdownCategories[$category->cat_ID] = $category->name;
	}

	$blog_categories = YSettings::g('blog_category', 'all');
	$blog_categories_arr = explode(',', $blog_categories);

	?>
	<tr class="form-field">
		<th scope="row">
			<label for="blog_category_id">Blog Categories</label>
		</th>
		<!-- <td><input style="width:320px;" type="text" id="blog_category_id" name="yopress[blog_category]" value=""></td> -->
		<td>
			<?php
				foreach ($dropdownCategories as $key => $cat) {
					$checked = (in_array($key, $blog_categories_arr)) ? ' checked="checked" ' : '';
					?>
					<input <?php echo $checked; ?> type="checkbox" class="blog_categories" value="<?php echo $key;?>"><?php echo $cat; ?> 
					<?php
				}
			?>
			<input type="hidden" id="blog_category_id" name="yopress[blog_category]" value="<?php echo $blog_categories; ?>" />
		</td>
	</tr>
	<script type="text/javascript">
	var blogCategories = jQuery(".blog_categories");

	blogCategories.change(function() {

		var newBlogCategories = new Array();

		blogCategories.each(function(index) {
			var checked = jQuery(this).is(':checked');
			if (checked) {
				newBlogCategories.push(jQuery(this).val());
			}
		});

		jQuery('#blog_category_id').val(newBlogCategories.join(','));

	});
	
	</script>
	<?php
}

function scrollbarSettings() {
	return array(
		array(
			'name' => 'scrollbar_width',
			'type' => 'input',
			'label' => __('Scrollbar width', THEME_NAME),
			'default' => 5,
			'htmlOptions' => array()
		),
		array(
			'name' => 'scrollbar_color',
			'type' => 'colorpicker',
			'label' => __('Scrollbar color', THEME_NAME),
			'default' => '#000000',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'scrollbar_color_menu',
			'type' => 'colorpicker',
			'label' => __('Scrollbar color in Menu', THEME_NAME),
			'default' => '#ffffff',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'scrollbar_visibility',
			'type' => 'checkbox',
			'label' => __('Scrollbar always visible', THEME_NAME),
			'default' => '0',
			'htmlOptions' =>array()	
		),
		array(
			'name' => 'scrollbar_system',
			'type' => 'checkbox',
			'label' => __('Use system scrollbar', THEME_NAME),
			'default' => '0',
			'htmlOptions' =>array()	
		)
	);
}

function logoSettings() {
	return array(
		array(
			'name' => 'favicon',
			'type' => 'uploader',
			'label' => __('Favicon Icon 32x32px', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'logo_image',
			'type' => 'uploader',
			'label' => __('Logo image', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
	);
}

function youtubeSettings() {
	return array(
		array(
			'name' => 'video_auto_play',
			'type' => 'checkbox',
			'label' => __('Youtube auto play', THEME_NAME),
			'default' => '0',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'video_show_controls',
			'type' => 'checkbox',
			'label' => __('Show Youtube controls', THEME_NAME),
			'default' => '',
			'htmlOptions' =>array()
		)
	);
}

function fontsColorsSettings() {
	global $barnelli_fontsArray;

	return array(
		// array(
		// 	"name"=>"main_theme_font",
		// 	"type" => "fontpicker",
		// 	"label" => __t("Main Font"),
		// 	"htmlOptions" => array(),
		// 	"default" => $barnelli_fontsArray
		// ),
		// array(
		// 	"name"=>"main_theme_font_size",
		// 	"type" => "input",
		// 	"label" => __t("Main Font Size"),
		// 	"htmlOptions" => array(),
		// 	"default" => 16,
		// ),
		// array(
		// 	'name' => 'main_theme_font_color',
		// 	'type' => 'colorpicker',
		// 	'label' => __('Main Font Color', THEME_NAME),
		// 	'default' => '#000000',
		// 	'htmlOptions' =>array()
		// ),
		array(
			'name'=>'navbar_backgroud_color',
			'type'=>'colorpicker',
			'label'=>'Navigation Menu Color',
			'default'=>'#ffffff',
			'htmlOptions' => array()
		),
		array(
			'name' => 'navbar_backgroud_color_opacity',
			'type' => 'slider',
			'label' => __('Navigation Menu Color Opacity', THEME_NAME),
			'default' => 95,
			'htmlOptions' => array('min'=>1, 'max'=>100)
		),
		array(
			"name"=>"nav_menu_font",
			"type" => "fontpicker",
			"label" => __t("Navigation Menu Font"),
			"htmlOptions" => array(),
			"default" => $barnelli_fontsArray
		),
		array(
			"name"=>"nav_menu_font_size",
			"type" => "input",
			"label" => __t("Navigation Menu Font Size"),
			"htmlOptions" => array(),
			"default" => 16,
		),
		array(
			'name' => 'nav_menu_font_color',
			'type' => 'colorpicker',
			'label' => __('Navigation Menu Font Color', THEME_NAME),
			'default' => '#000000',
			'htmlOptions' =>array()
		),
		array(
			'name' => 'nav_menu_font_color_hover',
			'type' => 'colorpicker',
			'label' => __('Navigation Menu Icon Color', THEME_NAME),
			'default' => '#666666',
			'htmlOptions' =>array()
		)
	);
}

function mobileNavigationColor() {
	return array(
		array(
			'name'=>'navbar_mobile_hamburger_background_color',
			'type'=>'colorpicker',
			'label'=>'Hamburger Background Color Closed',
			'default'=>'#f1f1f1',
			'htmlOptions' => array()
		),
		array(
			'name'=>'navbar_mobile_hamburger_color',
			'type'=>'colorpicker',
			'label'=>'Hamburger Color Closed',
			'default'=>'#000000',
			'htmlOptions' => array()
		),
		array(
			'name'=>'navbar_mobile_hamburger_hover_background_color',
			'type'=>'colorpicker',
			'label'=>'Hamburger Background Color Open',
			'default'=>'#333333',
			'htmlOptions' => array()
		),
		array(
			'name'=>'navbar_mobile_hamburger_hover_color',
			'type'=>'colorpicker',
			'label'=>'Hamburger Color Open',
			'default'=>'#ffffff',
			'htmlOptions' => array()
		),
	);
}

function appearanceSettings() {
	return array(
		array(
			'name'=>'general_use_custom_gallery',
			'type' => 'checkbox',
			'label' => 'Use theme specific gallery style ?',
			'default' => '1',
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_show_social_icons',
			'type' => 'checkbox',
			'label' => __('Show Social Icons on Front Page', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_sidebar_position',
			'type' => 'dropdown',
			'label' => __('Post sidebar position', THEME_NAME),
			'default' => array('left' => 'left', 'right' => 'right', 'none' => 'none'),
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_page_sidebar_position',
			'type' => 'dropdown',
			'label' => __('Page sidebar position', THEME_NAME),
			'default' => array('left' => 'left', 'right' => 'right', 'none' => 'none'),
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_menu_style',
			'type' => 'dropdown',
			'label' => __('Menu line style', THEME_NAME),
			'default' => array('none' => 'None', 'dotted' => 'Dotted line', 'single' => 'Single line', 'double' => 'Double line'),
			'htmlOptions' => array()
		),
		array(
			'name'=>'theme_menu_line_color',
			'type'=>'colorpicker',
			'label'=>'Menu Line Color<br/><small>(don\'t work for dotted line style)</small>',
			'default'=>'#000000',
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_menu_css_style',
			'type' => 'dropdown',
			'label' => __('Menu style', THEME_NAME),
			'default' => array('white' => 'White', 'gray' => 'Gray'),
			'htmlOptions' => array()
		)
	);
}

function videoMobileImage() {
	return array(
		array(
			'name' => 'video_mobile_image',
			'type' => 'uploader',
			'label' => __('Still Image on Mobile').'<br/><small>('.__('Image displayed instead of video on mobile devices', THEME_NAME).'</small>',
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'video_mobile_image_enabled',
			'type' => 'checkbox',
			'label' => __('Enable Mobile Still Image', THEME_NAME),
			'default' => '0',
			'htmlOptions' => array()
		)
	);
}

function videoAddress() {
	if (YSettings::g('slider_video_type', 'youtube') == 'youtube') {
	return array(
		array(
			'name' => 'slider_video_type',
			'type' => 'dropdown',
			'label' => __('Video Type', THEME_NAME),
			'default' => array('youtube'=>'Youtube', 'self_hosted'=>'Self Hosted Video'),
			'htmlOptions' => array()
		),
		array(
			'name' => 'slider_video_image',
			'type' => 'uploader',
			'label' => __('Still image after video<br/><small>(Works only if Video Repeat is off)</small>', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'slider_video_url',
			'type' => 'input',
			'label' => __('Youtube Video URL', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'slider_video_skip',
			'type' => 'input',
			'label' => __('Youtube Skip first (in seconds)', THEME_NAME),
			'default' => '0',
			'htmlOptions' => array()
		)
	);
	} else {
		return array(
		array(
			'name' => 'slider_video_type',
			'type' => 'dropdown',
			'label' => __('Video Type', THEME_NAME),
			'default' => array('youtube'=>'Youtube', 'self_hosted'=>'Self Hosted Video'),
			'htmlOptions' => array()
		),
		array(
			'name' => 'slider_video_image',
			'type' => 'uploader',
			'label' => __('Still image after video<br/><small>(Works only if Video Repeat is off)</small>', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'slider_video_self_hosted_mp4',
			'type' => 'uploader',
			'label' => __('Self hosted video MP4<br/><small>(Compatibility: IE: Yes, Chrome: YES, Firefox: NO, Safari: YES, Opera: NO)</small>', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'slider_video_self_hosted_webm',
			'type' => 'uploader',
			'label' => __('Self hosted video WEBM<br/><small>(Compatibility: IE: NO, Chrome: YES, Firefox: YES, Safari: NO, Opera: YES)</small>', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'slider_video_self_hosted_ogg',
			'type' => 'uploader',
			'label' => __('Self hosted video OGG<br/><small>(Compatibility: IE: NO, Chrome: YES, Firefox: YES, Safari: NO, Opera: YES)</small>', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		)
	);
	}
}

function videoSettings() {
	return array(
		array(
			'name' => 'slider_video_repeat',
			'type' => 'checkbox',
			'label' => __('Video Repeat', THEME_NAME),
			'default' => '1',
			'htmlOptions' => array()
		),
		array(
			'name' => 'slider_video_mute',
			'type' => 'checkbox',
			'label' => __('Video Mute', THEME_NAME),
			'default' => '1',
			'htmlOptions' => array()
		),
		array(
			'name' => 'slider_video_auto_play',
			'type' => 'checkbox',
			'label' => __('Video Auto Play', THEME_NAME),
			'default' => '1',
			'htmlOptions' => array()
		),
	);
}

function sliderSettings() {

	if (is_plugin_active('revslider/revslider.php')) {
		$arr = array(
			array(
				'name' => 'slider_type',
				'type' => 'dropdown',
				'label' => __('Slider', THEME_NAME),
				'default' => array('barnelli'=>'Barnelli Slider', 'revolution'=>'Revolution Slider'),
				'htmlOptions' => array()
			)
		);
		if (YSettings::g('slider_type', 'barnelli') == 'barnelli') {
			$arr[] = array(
				'name' => 'slider_pause',
				'type' => 'checkbox',
				'label' => __('Pause on hover', THEME_NAME),
				'default' => '1',
				'htmlOptions' => array()
			);
			$arr[] = array(
				'name' => 'slider_post_count',
				'type' => 'input',
				'label' => __('Number of slides', THEME_NAME),
				'default' => 3,
				'htmlOptions' => array()
			);
			$arr[] = array(
				'name' => 'slider_duration',
				'type' => 'slider',
				'label' => __('Slide duration', THEME_NAME),
				'default' => 5,
				'htmlOptions' => array('min'=>1, 'max'=>10)
			);
			$arr[] = array(
				'name' => 'slider_transition_duration',
				'type' => 'slider',
				'label' => __('Slide transition duration', THEME_NAME),
				'default' => 2,
				'htmlOptions' => array('min'=>1, 'max'=>10)
			);
			$arr[] = array(
				'name' => 'slider_animation_type',
				'type' => 'dropdown',
				'label' => __('Slide animation type', THEME_NAME),
				'default' => array('fadeTransition'=>'Fade Transition', 'slide'=>'Slide', 'fade'=>'Fade'),
				'htmlOptions' => array()
			);
			$arr[] = array(
				'name' => 'slider_animation_easing',
				'type' => 'dropdown',
				'label' => __('Slide animation easing', THEME_NAME),
				'default' => array(
					'linear'=>'linear',
					'swing'=>'swing',
					'easeInQuad'=>'easeInQuad',
					'easeOutQuad'=>'easeOutQuad',
					'easeInOutQuad'=>'easeInOutQuad',
					'easeInCubic'=>'easeInCubic',
					'easeOutCubic'=>'easeOutCubic',
					'easeInOutCubic'=>'easeInOutCubic',
					'easeInQuart'=>'easeInQuart',
					'easeOutQuart'=>'easeOutQuart',
					'easeInOutQuart'=>'easeInOutQuart',
					'easeInQuint'=>'easeInQuint',
					'easeOutQuint'=>'easeOutQuint',
					'easeInOutQuint'=>'easeInOutQuint',
					'easeInSine'=>'easeInSine',
					'easeOutSine'=>'easeOutSine',
					'easeInOutSine'=>'easeInOutSine',
					'easeInExpo'=>'easeInExpo',
					'easeOutExpo'=>'easeOutExpo',
					'easeInOutExpo'=>'easeInOutExpo',
					'easeInCirc'=>'easeInCirc',
					'easeOutCirc'=>'easeOutCirc',
					'easeInOutCirc'=>'easeInOutCirc',
					'easeInElastic'=>'easeInElastic',
					'easeOutElastic'=>'easeOutElastic',
					'easeInOutElastic'=>'easeInOutElastic',
					'easeInBack'=>'easeInBack',
					'easeOutBack'=>'easeOutBack',
					'easeInOutBack'=>'easeInOutBack',
					'easeInBounce'=>'easeInBounce',
					'easeOutBounce'=>'easeOutBounce',
					'easeInOutBounce'=>'easeInOutBounce'
				),
				'htmlOptions' => array()
			);
		} else {
			$arr[] = array(
				'name' => 'revolution_slider',
				'type' => 'input',
				'label' => __('Slider Shortcode', THEME_NAME),
				'default' => '',
				'htmlOptions' => array()
			);
		}
	} else {
		$arr = array(array(
				'name' => 'slider_post_count',
				'type' => 'input',
				'label' => __('Number of slides', THEME_NAME),
				'default' => 3,
				'htmlOptions' => array()
			)
			);
			$arr[] = array(
				'name' => 'slider_duration',
				'type' => 'slider',
				'label' => __('Slide duration', THEME_NAME),
				'default' => 5,
				'htmlOptions' => array('min'=>1, 'max'=>10)
			);
			$arr[] = array(
				'name' => 'slider_transition_duration',
				'type' => 'slider',
				'label' => __('Slide transition duration', THEME_NAME),
				'default' => 2,
				'htmlOptions' => array('min'=>1, 'max'=>10)
			);
			$arr[] = array(
				'name' => 'slider_animation_type',
				'type' => 'dropdown',
				'label' => __('Slide animation type', THEME_NAME),
				'default' => array('fadeTransition'=>'Fade Transition', 'slide'=>'Slide', 'fade'=>'Fade'),
				'htmlOptions' => array()
			);
			$arr[] = array(
				'name' => 'slider_animation_easing',
				'type' => 'dropdown',
				'label' => __('Slide animation easing', THEME_NAME),
				'default' => array(
					'linear'=>'linear',
					'swing'=>'swing',
					'easeInQuad'=>'easeInQuad',
					'easeOutQuad'=>'easeOutQuad',
					'easeInOutQuad'=>'easeInOutQuad',
					'easeInCubic'=>'easeInCubic',
					'easeOutCubic'=>'easeOutCubic',
					'easeInOutCubic'=>'easeInOutCubic',
					'easeInQuart'=>'easeInQuart',
					'easeOutQuart'=>'easeOutQuart',
					'easeInOutQuart'=>'easeInOutQuart',
					'easeInQuint'=>'easeInQuint',
					'easeOutQuint'=>'easeOutQuint',
					'easeInOutQuint'=>'easeInOutQuint',
					'easeInSine'=>'easeInSine',
					'easeOutSine'=>'easeOutSine',
					'easeInOutSine'=>'easeInOutSine',
					'easeInExpo'=>'easeInExpo',
					'easeOutExpo'=>'easeOutExpo',
					'easeInOutExpo'=>'easeInOutExpo',
					'easeInCirc'=>'easeInCirc',
					'easeOutCirc'=>'easeOutCirc',
					'easeInOutCirc'=>'easeInOutCirc',
					'easeInElastic'=>'easeInElastic',
					'easeOutElastic'=>'easeOutElastic',
					'easeInOutElastic'=>'easeInOutElastic',
					'easeInBack'=>'easeInBack',
					'easeOutBack'=>'easeOutBack',
					'easeInOutBack'=>'easeInOutBack',
					'easeInBounce'=>'easeInBounce',
					'easeOutBounce'=>'easeOutBounce',
					'easeInOutBounce'=>'easeInOutBounce'
				),
				'htmlOptions' => array()
			);
			$arr[] = array(
				'name' => 'slider_pause',
				'type' => 'checkbox',
				'label' => __('Pause on hover', THEME_NAME),
				'default' => '1',
				'htmlOptions' => array()
			);
	}

	return $arr;
}

function blogCatExclude() {
	return array(
		
	);
}

function advertisementsSettings() {
	return array(
		array(
			'name' => 'banner_display_front',
			'type' => 'checkbox',
			'label' => __('Front page', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'banner_display_search',
			'type' => 'checkbox',
			'label' => __('Search', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'banner_display_single',
			'type' => 'checkbox',
			'label' => __('Single', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'banner_display_blog',
			'type' => 'checkbox',
			'label' => __('Blog', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'banner_link',
			'type' => 'input',
			'label' => __('Link', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'banner_title',
			'type' => 'input',
			'label' => __('Title', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'banner_image',
			'type' => 'uploader',
			'label' => __('Image', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
	);
}

function barnelli_zeroPad($str, $num) {
	return str_pad($str, $num, "0", STR_PAD_LEFT);
}

function drawSocialSettings() {
	$socialsString = YSettings::g('theme_social_order', 'socicon-easid,socicon-twitter,socicon-facebook,socicon-google,socicon-pinterest,socicon-foursquare,socicon-yahoo,socicon-skype,socicon-yelp,socicon-feedburner,socicon-linkedin,socicon-viadeo,socicon-xing,socicon-myspace,socicon-soundcloud,socicon-spotify,socicon-grooveshark,socicon-lastfm,socicon-youtube,socicon-vimeo,socicon-dailymotion,socicon-vine,socicon-flickr,socicon-500px,socicon-instagram,socicon-wordpress,socicon-tumblr,socicon-blogger,socicon-technorati,socicon-reddit,socicon-dribbble,socicon-stumbleupon,socicon-digg,socicon-envato,socicon-behance,socicon-delicious,socicon-deviantart,socicon-forrst,socicon-play,socicon-zerply,socicon-wikipedia,socicon-apple,socicon-flattr,socicon-github,socicon-chimein,socicon-friendfeed,socicon-newsvine,socicon-identica,socicon-bebo,socicon-zynga,socicon-steam,socicon-xbox,socicon-windows,socicon-outlook,socicon-coderwall,socicon-tripadvisor,socicon-netcodes,socicon-lanyrd,socicon-slideshare,socicon-buffer,socicon-rss,socicon-vkontakte,socicon-disqus,fivehundredpx,aboutme,addme,amazon,aol,appstorealt,appstore,apple,bebo,behance,bing,blip,blogger,coroflot,daytum,delicious,designbump,designfloat,deviantart,diggalt,digg,dribble,drupal,ebay,email,emberapp,etsy,facebook,feedburner,flickr,foodspotting,forrst,foursquare,friendsfeed,friendstar,gdgt,github,githubalt,googlebuzz,googleplus,googletalk,gowallapin,gowalla,grooveshark,heart,hyves,icondock,icq,identica,imessage,itunes,lastfm,linkedin,meetup,metacafe,mixx,mobileme,mrwong,msn,myspace,newsvine,paypal,photobucket,picasa,pinterest,podcast,posterous,qik,quora,reddit,retweet,rss,scribd,sharethis,skype,slashdot,slideshare,smugmug,soundcloud,spotify,squidoo,stackoverflow,star,stumbleupon,technorati,tumblr,twitterbird,twitter,viddler,vimeo,virb,www,wikipedia,windows,wordpress,xing,yahoobuzz,yahoo,yelp,youtube,instagram');
	$socials = explode(',', $socialsString);
	global $barnelli_mobileIcons;
?>
<ul id="social_icons_items" class="ui-sortable">
	<?php foreach ($socials as $social) : ?>
	<li id="<?php echo $social;?>" class="menu-item" style="">
		<dl class="menu-item-bar">
			<dt class="menu-item-handle">
				<?php if (strstr($social, 'socicon')) :?>
				<div style="width:150px;float:left;"> <span class="socicon"><?php echo $barnelli_mobileIcons[$social];?></span> <span class="menu-item-title"><?php echo ucfirst($social);?></span> </div>
				<?php else: ?>
				<div style="width:150px;float:left;"> <i class="monoadmin monosymbol"><?php echo $barnelli_mobileIcons[$social];?></i> <span class="menu-item-title"><?php echo ucfirst($social);?></span></div>
				<?php endif; ?>
				<div style="width:200px;float:left;">
					<?php
						$currVal = YSettings::g( "theme_show_$social", "0");
						$checked = ($currVal == "1") ? ' checked="checked" ' : '';
					?>
					<input style="width:175px;" type="text" id="theme_<?php echo $social;?>_id" name="yopress[theme_<?php echo $social;?>]" value="<?php echo YSettings::g("theme_$social", ""); ?>">					
					<input <?php echo $checked; ?> type="checkbox" id="theme_show_<?php echo $social;?>_id" name="yopress[theme_show_<?php echo $social;?>]" value="1">
					<input type="hidden" id="theme_show_<?php echo $social;?>_id" name="yopress[theme_show_<?php echo $social;?>]" value="<?php echo YSettings::g( "theme_show_$social", "1"); ?>">
				</div>


				<div style="clear:both;"></div>
			</dt>
		</dl>
		<ul class="menu-item-transport"></ul>
	</li>
	<?php endforeach; ?>
</ul>
<input type="hidden" id="theme_social_order_id" name="yopress[theme_social_order]" value="<?php echo $socialsString;?>" />
<script>
function social_items_sort(selector, action) {
	var socialItems = jQuery(selector);
	socialItems.sortable({
		update: function(event, ui) {
			var s = socialItems.sortable('toArray').toString();
			jQuery('#theme_social_order_id').val(s);
		}
	});
}

jQuery(document).ready(function($) {
	social_items_sort('#social_icons_items', 'social_icons_apply_sort');
});
</script>
<?php
}

function socialSettings() {
	return array(
		array(
			'name' => 'social_share_div',
			'type' => 'custom',
			'content' => 'drawSocialSettings',
		),
	);
}

function socialShareOptions() {
	return array(
		array('name' => 'share_new_window', 'type' => 'checkbox', 'label' => __('Open in new window', THEME_NAME), 'default' => '0', 'htmlOptions' => array())
	);
}

function socialShare() {
	return array(
		array('name' => 'share_on_facebook', 'type' => 'checkbox', 'label' => __('Facebook', THEME_NAME), 'default' => '1', 'htmlOptions' => array()),
		array('name' => 'share_on_twitter', 'type' => 'checkbox', 'label' => __('Twitter', THEME_NAME), 'default' => '1', 'htmlOptions' => array()),
		array('name' => 'share_on_google_plus', 'type' => 'checkbox', 'label' => __('Google +', THEME_NAME), 'default' => '1', 'htmlOptions' => array()),
		array('name' => 'share_on_pinterest', 'type' => 'checkbox', 'label' => __('Pinterest', THEME_NAME), 'default' => '1', 'htmlOptions' => array()),
		array('name' => 'share_on_linkedin', 'type' => 'checkbox', 'label' => __('LinkedIn', THEME_NAME), 'default' => '1', 'htmlOptions' => array()),
	);
}

function socialKeys() {
	return array(
		array(
			'name' => 'twitter_consumer_key',
			'type' => 'input',
			'label' => __('Twitter consumer key', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'twitter_consumer_secret',
			'type' => 'input',
			'label' => __('Twitter consumer secret', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'twitter_oauth_token',
			'type' => 'input',
			'label' => __('Twitter OAuth token', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'twitter_oauth_token_secret',
			'type' => 'input',
			'label' => __('Twitter OAuth token secret', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'facebook_app_id',
			'type' => 'input',
			'label' => __('Facebook App Id', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'facebook_app_secret',
			'type' => 'input',
			'label' => __('Facebook App Secret', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
	);
}

function socialSettingsOld() {
	return array(
		array(
			'name' => 'theme_facebook',
			'type' => 'input',
			'label' => __('Facebook', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_twitter',
			'type' => 'input',
			'label' => __('Twitter', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_googleplus',
			'type' => 'input',
			'label' => __('Google+', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_pinterest',
			'type' => 'input',
			'label' => __('Pinterest', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_linkedin',
			'type' => 'input',
			'label' => __('Linkedin', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_tumblr',
			'type' => 'input',
			'label' => __('Tumblr', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_vimeo',
			'type' => 'input',
			'label' => __('Vimeo', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_skype',
			'type' => 'input',
			'label' => __('Skype', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_youtube',
			'type' => 'input',
			'label' => __('Youtube', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_soundcloud',
			'type' => 'input',
			'label' => __('Soundlocud', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		),
		array(
			'name' => 'theme_instangram',
			'type' => 'input',
			'label' => __('Instangram', THEME_NAME),
			'default' => '',
			'htmlOptions' => array()
		)
	);
}

function getCustomBlogContent($args) {
	wp_enqueue_script('barnelli-admin-js', get_template_directory_uri() . '/admin/admin.js');
	?>

	<tr valign="top">
		<th>
			<label for="blog_sidebar_position_id">Exclude categories</label>
		</th>
		<td>
			<input id="barnelli-cat-exclude-input" name="<?php echo $args['name']; ?>" value="<?php echo $args['value']; ?>" class="hidden">
			<div id="barnelli-cat-exclude">

	<?php
	$args = array(
		'orderby' => 'name',
		'order' => 'ASC',
		'hide_empty' => 0,
		'taxonomy' => 'category',
	);

	$categories = get_categories($args);

	foreach ($categories as $cat) {
		echo '<input id="cat-' . $cat->cat_ID . '" type="checkbox" value="' . $cat->cat_ID . '"/> <label for="cat-' . $cat->cat_ID . '">' . $cat->name . '</label> ';
	}
	?>
			</div>
		</td>
	</tr>

			<?php
			}

			function multipleContactCaptcha() {
				return array(
					array(
						'name' => 'multiple_contact_map_height',
						'type' => 'input',
						'label' => 'Map height',
						'default' => 300,
						'htmlOptions' => array()
					),
					array(
						'name' => 'multiple_contact_order',
						'type' => 'dropdown',
						'label' => 'Order<br/><small>(Which to display first)</small>',
						'default' => array('form'=>'Contact Form', 'info'=>'Info Box'),
						'htmlOptions' => array()
					),
					array(
						'name' => 'multiple_contact_disable_map',
						'type' => 'checkbox',
						'label' => 'Disable Map',
						'default' => '0',
						'htmlOptions' => array()
					)
				);
			}

			function multipleContactPlaceholders() {
				$arr = array(
					array(
						'name' => 'multiple_contact_form_enabled',
						'type' => 'checkbox',
						'label' => __('Display form', THEME_NAME),
						'default' => '1',
						'htmlOptions' => array(),
					),
					array(
						'name' => 'multiple_contact_form_header',
						'type' => 'input',
						'label' => __('Form header', THEME_NAME),
						'default' => 'Contact Form',
						'htmlOptions' => array()
					),
					array(
						'name' => 'multiple_contact_placeholder_name',
						'type' => 'input',
						'label' => 'Name',
						'default' => 'name',
						'htmlOptions' => array()
					),
					array(
						'name' => 'multiple_contact_name_required',
						'type' => 'checkbox',
						'label' => __('Name required', THEME_NAME),
						'default' => '1',
						'htmlOptions' => array(),
					),
					array(
						'name' => 'multiple_contact_placeholder_email',
						'type' => 'input',
						'label' => 'Email',
						'default' => 'e-mail',
						'htmlOptions' => array()
					),
					array(
						'name' => 'multiple_contact_email_required',
						'type' => 'checkbox',
						'label' => __('Email required', THEME_NAME),
						'default' => '1',
						'htmlOptions' => array(),
					),
					array(
						'name' => 'multiple_contact_placeholder_subject',
						'type' => 'input',
						'label' => 'Subject',
						'default' => 'subject',
						'htmlOptions' => array()
					),
					array(
						'name' => 'multiple_contact_subject_required',
						'type' => 'checkbox',
						'label' => __('Subject required', THEME_NAME),
						'default' => '1',
						'htmlOptions' => array(),
					),
					array(
						'name' => 'multiple_contact_placeholder_text',
						'type' => 'input',
						'label' => 'Message',
						'default' => 'message',
						'htmlOptions' => array()
					),
					array(
						'name' => 'multiple_contact_message_required',
						'type' => 'checkbox',
						'label' => __('Message required', THEME_NAME),
						'default' => '1',
						'htmlOptions' => array(),
					),

					array(
						'name' => 'multiple_contact_placeholder_message_send',
						'type' => 'input',
						'label' => 'Info when message was sent',
						'default' => 'Your message was sent. Thank you!',
						'htmlOptions' => array()
					),
					array(
						'name' => 'multiple_contact_placeholder_message_faild',
						'type' => 'input',
						'label' => 'Info when message failed to send',
						'default' => 'Error occurred! Try again later!',
						'htmlOptions' => array()
					),
					array(
						'name' => 'multiple_contact_placeholder_button',
						'type' => 'input',
						'label' => 'Button',
						'default' => 'Send',
						'htmlOptions' => array()
					),
					array(
						'name' => 'multiple_contact_mail_to',
						'type' => 'input',
						'label' => __('What e-mail address to send the form data?<br/><small>(Will send to blog admin e-mail if blank)</small>', THEME_NAME),
						'default' => '',
						'htmlOptions' => array()
					),
					array(
						'name' => 'multiple_contact_captcha_enabled',
						'type' => 'checkbox',
						'label' => __('Enable captcha', THEME_NAME),
						'default' => '1',
						'htmlOptions' => array(),
					),
					array(
						'name' => 'multiple_contact_captcha_placeholder',
						'type' => 'input',
						'label' => 'Captcha placeholder',
						'default' => 'captcha',
						'htmlOptions' => array()
					),
					array(
						'name' => 'multiple_contact_captcha_type',
						'type' => 'dropdown',
						'label' => __('Captcha type', THEME_NAME),
						'default' => array('mathematic'=>'Mathematic', 'string'=>'String'),
						'selected' => 'mathematic',
						'htmlOptions' => array()
					)
				);

				if (YSettings::g('multiple_contact_captcha_type', 'mathematic') == 'string') {
					$arr[] = array(
						'name' => 'multiple_contact_captcha_string_length',
						'type' => 'slider',
						'label' => __('Captcha string length', THEME_NAME),
						'default' => 6,
						'htmlOptions' => array('min'=>2, 'max'=>8)
					);
				}

				return $arr;
			}

			function contactPlaceholders() {
				$arr = array(
					array(
						'name' => 'contact_form_enabled',
						'type' => 'checkbox',
						'label' => __('Display form?', THEME_NAME),
						'default' => '1',
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_form_header',
						'type' => 'input',
						'label' => __('Form header', THEME_NAME),
						'default' => 'Contact Form',
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_message_template',
						'type' => 'textarea',
						'label' => __('Contact Form Message Template', THEME_NAME),
						'default' => '<table>
<tr><td><b>Message: </b></td><td>[message]</td></tr>
<tr><td><b>E-mail: </b></td><td>[email]</td></tr>
<tr><td><b>Name: </b></td><td>[name]</td></tr>
<tr><td><b>Terms: </b></td><td>[terms]</td></tr>
</table>',
						'htmlOptions' => array('style'=>'height:300px;')
					),
					array(
						'name' => 'contact_placeholder_name',
						'type' => 'input',
						'label' => 'Name',
						'default' => 'name',
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_name_required',
						'type' => 'checkbox',
						'label' => __('Name required', THEME_NAME),
						'default' => '1',
						'htmlOptions' => array(),
					),
					array(
						'name' => 'contact_placeholder_email',
						'type' => 'input',
						'label' => 'Email',
						'default' => 'e-mail',
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_email_required',
						'type' => 'checkbox',
						'label' => __('Email required', THEME_NAME),
						'default' => '1',
						'htmlOptions' => array(),
					),
					array(
						'name' => 'contact_placeholder_subject',
						'type' => 'input',
						'label' => 'Subject',
						'default' => 'subject',
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_subject_required',
						'type' => 'checkbox',
						'label' => __('Subject required', THEME_NAME),
						'default' => '1',
						'htmlOptions' => array(),
					),
					array(
						'name' => 'contact_placeholder_text',
						'type' => 'input',
						'label' => 'Message',
						'default' => 'message',
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_message_required',
						'type' => 'checkbox',
						'label' => __('Message required', THEME_NAME),
						'default' => '1',
						'htmlOptions' => array(),
					),

					array(
						'name' => 'contact_terms',
						'type' => 'textarea',
						'label' => __('Contact Terms Link', THEME_NAME),
						'default' => '',
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_terms_required',
						'type' => 'checkbox',
						'label' => __('Contact Terms required', THEME_NAME),
						'default' => '0',
						'htmlOptions' => array()
					),

					array(
						'name' => 'contact_placeholder_message_send',
						'type' => 'input',
						'label' => 'Info when message was sent',
						'default' => 'Your message was sent. Thank you!',
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_placeholder_message_fail',
						'type' => 'input',
						'label' => 'Info when message failed to send',
						'default' => 'Error occurred! Try again later!',
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_placeholder_button',
						'type' => 'input',
						'label' => 'Button',
						'default' => 'Send',
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_mail_to',
						'type' => 'input',
						'label' => __('What e-mail address to send the form data?<br/><small>(Will send to blog admin e-mail if blank)</small>', THEME_NAME),
						'default' => '',
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_captcha_enabled',
						'type' => 'checkbox',
						'label' => __('Enable captcha', THEME_NAME),
						'default' => '1',
						'htmlOptions' => array(),
					),
					array(
						'name' => 'contact_captcha_placeholder',
						'type' => 'input',
						'label' => 'Captcha placeholder',
						'default' => 'captcha',
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_captcha_type',
						'type' => 'dropdown',
						'label' => __('Captcha type', THEME_NAME),
						'default' => array('mathematic'=>'Mathematic', 'string'=>'String'),
						'selected' => 'mathematic',
						'htmlOptions' => array()
					)
				);

				if (YSettings::g('contact_captcha_type', 'mathematic') == 'string') {
					$arr[] = array(
						'name' => 'contact_captcha_string_length',
						'type' => 'slider',
						'label' => __('Captcha string length', THEME_NAME),
						'default' => 6,
						'htmlOptions' => array('min'=>2, 'max'=>8)
					);
				}
				return $arr;
			}

			function contactAddress() {
				return array(
					array(
						'name' => 'theme_contact_address',
						'type' => 'checkbox',
						'label' => __('Display contact address?', THEME_NAME),
						'default' => '',
						'htmlOptions' => array()
					),
					array(
						'name' => 'theme_contact_address_header',
						'type' => 'input',
						'label' => __('Address header', THEME_NAME),
						'default' => 'Address &amp; phone',
						'htmlOptions' => array(),
					),
					array(
						'name' => 'theme_contact_company_name',
						'type' => 'input',
						'label' => __('Company name', THEME_NAME),
						'default' => 'Barnelli Cafe &amp; Restaurnt',
						'htmlOptions' => array(),
					),
					array(
						'name' => 'contact_street_address',
						'type' => 'textarea',
						'label' => __('Street address', THEME_NAME),
						'default' => '',
						'htmlOptions' => array('style'=>'height:100px;')
					),
					array(
						'name' => 'theme_contact_postal_code',
						'type' => 'input',
						'label' => __('Postal code', THEME_NAME),
						'default' => '',
						'htmlOptions' => array(),
					),
					array(
						'name' => 'contact_phone',
						'type' => 'textarea',
						'label' => __('Phone', THEME_NAME),
						'default' => '',
						'htmlOptions' => array('style'=>'height:100px;')
					),
					array(
						'name' => 'contact_mobile',
						'type' => 'textarea',
						'label' => __('Mobile', THEME_NAME),
						'default' => '',
						'htmlOptions' => array('style'=>'height:100px;')
					),
					array(
						'name' => 'contact_fax',
						'type' => 'textarea',
						'label' => __('Fax', THEME_NAME),
						'default' => '',
						'htmlOptions' => array('style'=>'height:100px;')
					),
					array(
						'name' => 'contact_email',
						'type' => 'textarea',
						'label' => __('Email', THEME_NAME),
						'default' => '',
						'htmlOptions' => array('style'=>'height:100px;')
					),
				);
			}

			function contactInfo() {
				return array(
					array(
						'name' => 'contact_info_display',
						'type' => 'checkbox',
						'label' => __('Display contact info?', THEME_NAME),
						'default' => '',
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_info_header',
						'type' => 'input',
						'label' => __('Info header', THEME_NAME),
						'default' => 'INFO',
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_info_content',
						'type' => 'textarea',
						'label' => __('Info text', THEME_NAME),
						'default' => '',
						'htmlOptions' => array('style'=>'height:100px;')
					),
					array(
						'name' => 'contact_social_header',
						'type' => 'input',
						'label' => __('Socials header', THEME_NAME),
						'default' => 'Find us on',
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_social_display',
						'type' => 'checkbox',
						'label' => __('Show Social Icons on the Contact Page', THEME_NAME),
						'default' => '',
						'htmlOptions' => array()
					),
				);
			}

			function multipleContactInfo() {
				return array(
					array(
						'name' => 'multiple_contact_info_display',
						'type' => 'checkbox',
						'label' => __('Display contact info?', THEME_NAME),
						'default' => '',
						'htmlOptions' => array()
					),
					array(
						'name' => 'multiple_contact_info_header',
						'type' => 'input',
						'label' => __('Info header', THEME_NAME),
						'default' => 'INFO',
						'htmlOptions' => array()
					),
					array(
						'name' => 'multiple_contact_info_content',
						'type' => 'textarea',
						'label' => __('Info text', THEME_NAME),
						'default' => '',
						'htmlOptions' => array('style'=>'height:100px;')
					),
					array(
						'name' => 'multiple_contact_social_header',
						'type' => 'input',
						'label' => __('Socials header', THEME_NAME),
						'default' => 'Find us on',
						'htmlOptions' => array()
					),
					array(
						'name' => 'multiple_contact_social_display',
						'type' => 'checkbox',
						'label' => __('Show Social Icons on the Contact Page', THEME_NAME),
						'default' => '',
						'htmlOptions' => array()
					),
				);
			}

			function multipleContactMap() {
				return array(
					array(
						'name' => 'multiple_contact_map_div',
						'type' => 'custom',
						'content' => 'drawMultipleMap',
					)
				);
			}

			function contactMap() {
				return array(
					array(
						'name' => 'contact_map_disable',
						'type' => 'checkbox',
						'label' => __('Disable Map', THEME_NAME),
						'default' => '0',
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_map_div',
						'type' => 'custom',
						'content' => 'drawMap',
					),
					array(
						'name' => 'contact_map_center_lat',
						'type' => 'input',
						'label' => __('Center Latitude',THEME_NAME),
						'default' => 15,
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_map_center_lng',
						'type' => 'input',
						'label' => __('Center Longitude', THEME_NAME),
						'default' => 50,
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_map_marker_lat',
						'type' => 'input',
						'label' => __('Marker Latitude', THEME_NAME),
						'default' => 15,
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_map_marker_lng',
						'type' => 'input',
						'label' => __('Marker Longitude', THEME_NAME),
						'default' => 50,
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_map_zoom_level',
						'type' => 'input',
						'label' => __('Zoom Level', THEME_NAME),
						'default' => 8,
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_map_marker_image',
						'type' => 'uploader',
						'label' => __('Marker Image', THEME_NAME),
						'default' => '',
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_map_type',
						'type' => 'dropdown',
						'label' => __('Map type', THEME_NAME),
						'default' => array(
							'roadmap' => 'Roadmap',
							'satellite' => 'Satellite',
							'hybrid' => 'Hybrid',
							'terrain' => 'Terrain'),
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_map_style',
						'type' => 'dropdown',
						'label' => __('Map style', THEME_NAME) . '<br/><small>(' . __('Works only for Roadmap and Terrain map type', THEME_NAME) . ')</small>',
						'default' => array(
							'color' => 'Color',
							'grayscale' => 'Grayscale'
						),
						'htmlOptions' => array()
					),
					array(
						'name' => 'contact_map_height',
						'type' => 'input',
						'label' => __('Map Height', THEME_NAME),
						'default' => 300,
						'htmlOptions' => array()
					),
				);
			}

			function drawMultipleMap() {
				$mapElements = YSettings::g('multiple_contact_locations', '1');
				$mapElements = explode("|", $mapElements);

				$last = 0;
				foreach ($mapElements as $key => $element) {
					mapElement($element, $key);
					$last++;
				}

				?>
				<tr class="form-field">
					<th scope="row"><?php _e('Add More', THEME_NAME);?></th>
					<td>
						<input type="hidden" name="yopress[multiple_contact_locations]" value="<?php echo YSettings::g('multiple_contact_locations', '1'); ?>" id="multiple_contact_locations_id" />
						<button id="multiple_contact_map_add" class="button" data-id="<?php echo $last+1; ?>"><?php _e('Add', THEME_NAME);?></button>
					</td>
				</tr>
				<?php
			}

			function mapElement($uuid, $i) {
				?>
				<tr class="form-field">
					<th scope="row">
						<label for="map_canvas"><?php _e('Location', THEME_NAME);?> #<?php echo $i+1; ?></label>
					</th>
					<td><div style="width:400px;height:300px;" id="map_<?php echo $uuid; ?>" class="mulitiple_map_canvas map_<?php echo $uuid; ?>" data-uuid="<?php echo $uuid; ?>"></div></td>
				</tr>

				<tr class="form-field">
					<th scope="row"><label for="multiple_contact_map_address_id"><?php _e('Find Location', THEME_NAME);?></label></th>
					<td>
						<input style="width:310px;" type="text" class="<?php echo $uuid; ?>" id="multiple_contact_map_address_<?php echo $uuid; ?>_id" name="yopress[multiple_contact_map_address_<?php echo $uuid; ?>]" value="<?php echo YSettings::g("multiple_contact_map_address_".$uuid); ?>"> <button id="multiple_contact_map_search_<?php echo $uuid; ?>" data-uuid="<?php echo $uuid; ?>" class="button button-search">Search</button>
						<input type="hidden" name="yopress[multiple_contact_map_lat_<?php echo $uuid; ?>]" id="multiple_contact_map_lat_<?php echo $uuid; ?>_id" value="<?php echo YSettings::g("multiple_contact_map_lat_".$uuid); ?>" />
						<input type="hidden" name="yopress[multiple_contact_map_lng_<?php echo $uuid; ?>]" id="multiple_contact_map_lng_<?php echo $uuid; ?>_id" value="<?php echo YSettings::g("multiple_contact_map_lng_".$uuid); ?>" />
						<input type="hidden" name="yopress[multiple_contact_map_zoom_<?php echo $uuid; ?>]" id="multiple_contact_map_zoom_<?php echo $uuid; ?>_id" value="<?php echo YSettings::g("multiple_contact_map_zoom_".$uuid, 10); ?>" />
						<input type="hidden" name="yopress[multiple_contact_marker_width_<?php echo $uuid; ?>]" id="multiple_contact_marker_width_<?php echo $uuid; ?>_id" value="<?php echo YSettings::g("multiple_contact_marker_width_".$uuid, 0); ?>" />
						<input type="hidden" name="yopress[multiple_contact_marker_height_<?php echo $uuid; ?>]" id="multiple_contact_marker_height_<?php echo $uuid; ?>_id" value="<?php echo YSettings::g("multiple_contact_marker_height_".$uuid, 0); ?>" />
					</td>
				</tr>

				<tr valign="form-field">
					<th>
						<label for="multiple_contact_map_marker_image_<?php echo $uuid; ?>_id"><?php _e('Marker Image', THEME_NAME);?></label>
					</th>
					<td>
						<input id="upload_image" class="uploadinput marker" type="text" size="20" name="yopress[multiple_contact_map_marker_image_<?php echo $uuid; ?>]" value="<?php echo YSettings::g('multiple_contact_map_marker_image_'.$uuid); ?>" class="marker_image_<?php echo $uuid; ?>">
						<input id="upload_image_button" class="button button-primary upload_image_button" type="button" value="Upload" data-id="2">
						<input id="multiple_contact_map_marker_image_<?php echo $uuid; ?>_id" class="hidden" value="<?php echo YSettings::g('multiple_contact_map_marker_image_'.$uuid); ?>">
						<input class="button button-primary upload_image_remove_button" type="button" value="Remove" data-id="2">
					</td>
				</tr>
				<tr class="form-field">
					<th scope="row">
						<label for="multiple_contact_address_header_<?php echo $uuid; ?>_id"><?php _e('Address Header');?></label>
					</th>
					<td><input type="text" id="multiple_contact_address_header_<?php echo $uuid; ?>_id" name="yopress[multiple_contact_address_header_<?php echo $uuid; ?>]" value="<?php echo YSettings::g('multiple_contact_address_header_'.$uuid); ?>"></td>
				</tr>
				<tr class="form-field">
					<th scope="row">
						<label for="multiple_contact_address_<?php echo $uuid; ?>_id"><?php _e('Address', THEME_NAME);?></label>
					</th>
					<td><textarea id="multiple_contact_address_<?php echo $uuid; ?>_id" name="yopress[multiple_contact_address_<?php echo $uuid; ?>]"><?php echo YSettings::g('multiple_contact_address_'.$uuid); ?></textarea></td>
				</tr>
				<?php if ($i > 0) : ?>
				<tr class="form-field">
					<th scope="row"><?php _e('Remove', THEME_NAME); ?></th>
					<td><button id="multiple_contact_map_search" data-uuid="<?php echo $uuid; ?>" class="button button-remove"><?php _e('Remove this location', THEME_NAME);?></button></td>
				</tr>
				<?php endif; ?>
				<tr class="form-field">
					<th scope="row"><hr/></th>
					<td><hr/></td>
				</tr>
				<?php
			}

			function drawMap() {
			?>
	<script type="text/javascript">
		var centerPositionLat = <?php echo YSettings::g('contact_map_center_lat', 0); ?>;
		var centerPositionLng = <?php echo YSettings::g('contact_map_center_lng', 0); ?>;
		var markerPositionLat = <?php echo YSettings::g('contact_map_marker_lat', 0); ?>;
		var markerPositionLng = <?php echo YSettings::g('contact_map_marker_lng', 0); ?>;
		var zoomLevel = <?php echo YSettings::g('contact_map_zoom_level', 1); ?>;
		var markerImage = '<?php echo YSettings::g("contact_map_marker_image", ''); ?>';
		var mapType = '<?php echo YSettings::g("contact_map_type", "roadmap"); ?>';
	</script>
	<tr class="form-field">
		<th scope="row">
			<label for="map_canvas"><?php _e('Choose location', THEME_NAME);?></label>
		</th>
		<td><div style="width:400px;height:300px;" id="map_canvas"></div></td>
	</tr>
	<tr class="form-field">
		<th scope="row">
			<label for="contact_map_address_id"><?php _e('Address', THEME_NAME);?></label>
		</th>
		<td><input style="width:320px;" type="text" id="contact_map_address_id" name="yopress[contact_map_address]" value="<?php echo YSettings::g("contact_map_address"); ?>"> <button id="contact_map_search" class="button"><?php _e('Search', THEME_NAME);?></button></td>
	</tr>
	<?php
}
?>