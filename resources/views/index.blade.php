<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700|Roboto:400,700" rel="stylesheet">
    <link href='style.css' rel='stylesheet' type='text/css'>
    <title>8values</title>
    <link rel="icon" type="x-icon" href="icon.png">
    <link rel="shortcut icon" type="x-icon" href="icon.png">
    <meta charset="utf-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-6511426299019766",
            enable_page_level_ads: true
        });
    </script>
</head>

<body>
    <a href="https://github.com/8values/8values.github.io" class="github-corner" aria-label="View source on Github"><svg width="80" height="80" viewBox="0 0 250 250" style="fill:#151513; color:#fff; position: absolute; top: 0; border: 0; right: 0;" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a>
    <style>
        .github-corner:hover .octo-arm {
            animation: octocat-wave 560ms ease-in-out
        }
        
        @keyframes octocat-wave {
            0%,
            100% {
                transform: rotate(0)
            }
            20%,
            60% {
                transform: rotate(-25deg)
            }
            40%,
            80% {
                transform: rotate(10deg)
            }
        }
        
        @media (max-width:500px) {
            .github-corner:hover .octo-arm {
                animation: none
            }
            .github-corner .octo-arm {
                animation: octocat-wave 560ms ease-in-out
            }
        }
    </style>
    <h1>8values</h1>
    <hr>
    <div class="center">
        <div class="axis_name quadcolumn">ECONÔMICO</div>
        <div class="axis_name quadcolumn">DIPLOMATICO</div>
        <div class="axis_name quadcolumn">CIVIL</div>
        <div class="axis_name quadcolumn">SOCIAL</div>
        <a href="#anchor"><img src="value_images/equality.svg" class="quadcolumn"></a>
        <a href="#anchor"><img src="value_images/nation.svg" class="quadcolumn"></a>
        <a href="#anchor"><img src="value_images/liberty.svg" class="quadcolumn"></a>
        <a href="#anchor"><img src="value_images/tradition.svg" class="quadcolumn"></a>
        <a href="#anchor"><img src="value_images/markets.svg" class="quadcolumn"></a>
        <a href="#anchor"><img src="value_images/globe.svg" class="quadcolumn"></a>
        <a href="#anchor"><img src="value_images/authority.svg" class="quadcolumn"></a>
        <a href="#anchor"><img src="value_images/progress.svg" class="quadcolumn"></a>
    </div>
    <br>
    <button class="button" onclick="location.href='/instrucoes';" style="font-size:36pt;">Clique aqui para iniciar!</button>
    <br>
    <hr>
    <h2>O que é o 8values?</h2>
    <p>O 8values é, em essência, um teste de coordenadas políticas que tenta indicar porcentagens
       para oito diferentes valores ideológicos. Você será apresentado a uma afirmação e, então,
       você responderá com sua opinião sobre esta afirmação, de Concordo Fortemente a Discordo Fortemente, 
       e cada resposta afetará a sua pontuação final. Ao encerrar o questionário, suas repostas serão 
       comparadas com o máximo possível para cada valor, resultando assim em porcentagens dentro de 
       cada eixo ideológico. Responda honestamente!
       <br />
       <br /> 
       Existem <b><u><span id="numOfQuestions"></span></u></b> questões no teste.</p>

    <h2><a id="anchor">O que são os oito valores?</a></h2>
    <p>Existem quatro eixos ideológicos - Econômico, Diplomático, Civil e Social - e cada um tem dois valores opostos atribuídos a eles. Estes são:</p>
    <div class="explanation_bg">
        <div class="spacer">
            <div class="explanation_blurb_left">
                <p class="value"><b style="color:#d32f2f;">IGUALDADE</b></p>
                <p class="blurb-text">
                    Aqueles com uma pontuação maior em Igualdade acreditam que a economia deve distribuir valor igualmente entre a população. Estes tendem a apoiar leis tributárias progressivas, programas sociais, e no geral, socialismo.
                </p>
            </div>
            <div class="explanation_axis">
                <p class="axis_name">ECONÔMICO</p>
                <img class="arrow" src="double_arrow.svg">
            </div>
            <div class="explanation_blurb_right">
                <p class="value"><b style="color:#00796b;">MERCADO</b></p>
                <p class="blurb-text">
                    Aqueles com uma pontuação maior em Mercado acreditam que a economia deve focar em crescimento rápido. Estes tendem a apoiar impostos mais baixos, privatização, desregulamentação, e no geral, capitalismo laissez-faire (liberalismo).
                </p>
            </div>
        </div>
        <div class="spacer">
            <div class="explanation_blurb_left">
                <p class="value"><b style="color:#f57c00;">NACIONALISMO</b></p>
                <p class="blurb-text">
                    Aqueles com uma pontuação maior em Nacionalismo são patriotas. Estes geralmente acreditam numa política externa agressiva, valorizando as forças armadas, a soberania nacional, e se preciso, o uso da força militar.
                </p>
            </div>
            <div class="explanation_axis">
                <p class="axis_name">DIPLOMATICO</p>
                <img class="arrow" src="double_arrow.svg">
            </div>
            <div class="explanation_blurb_right">
                <p class="value"><b style="color:#0288d1;">GLOBALIZAÇÃO</b></p>
                <p class="blurb-text">
                    Aqueles com uma pontuação maior em Globalização são cosmopolitas. Estes geralmente acreditam numa política externa pacífica, enfatizando diplomacia, cooperação, integração, e no geral, uma unidade global de interesse mútuo.
                </p>
            </div>
        </div>
        <div class="spacer">
            <div class="explanation_blurb_left">
                <p class="value"><b style="color:#fbc02d;">LIBERDADE</b></p>
                <p class="blurb-text">
                    Aqueles com uma pontuação maior em Liberdade acreditam em forte liberdade civil. Estes tendem a apoiar democracia e opor-se à intervenção do Estado nas vidas pessoais. Note que isto se refere a liberdades civis, não a liberdades econômicas.
                </p>
            </div>
            <div class="explanation_axis">
                <p class="axis_name">CIVIL</p>
                <img class="arrow" src="double_arrow.svg">
            </div>
            <div class="explanation_blurb_right">
                <p class="value"><b style="color:#303f9f;">AUTORIDADE</b></p>
                <p class="blurb-text">
                    Aqueles com uma pontuação maior em Autoridade acreditam em forte poder do Estado. Estes tendem a apoiar a intervenção do Estado nas vidas pessoais, fiscalização governamental, e se preciso, censura ou autocracia.
                </p>
            </div>
        </div>
        <div class="spacer">
            <div class="explanation_blurb_left">
                <p class="value"><b style="color:#689f38;">TRADIÇÃO</b></p>
                <p class="blurb-text">
                    Aqueles com uma pontuação maior em Tradição acreditam em valores conservadores e aderência estrita a um código moral. Embora nem sempre, usualmente são religiosos, e apoiam o status quo vigente.
                </p>
            </div>
            <div class="explanation_axis">
                <p class="axis_name">SOCIAL</p>
                <img class="arrow" src="double_arrow.svg">
            </div>
            <div class="explanation_blurb_right">
                <p class="value"><b style="color:#7b1fa2;">PROGRESSO</b></p>
                <p class="blurb-text">
                    Aqueles com uma pontuação maior em Progresso acreditam em avanços sociais e racionalidade. Embora nem sempre, usualmente são seculares ou agnósticos, e apoiam ações ambientais e grandes investimentos em pesquisa científica ou tecnológica.
                </p>
            </div>
        </div>
        <br/>
    </div>

    <h2 style="margin-top: 17pt;">O que significa "perfil mais próximo" ao final dos resultados?</h2>
    <p>Adicionalmente à associação dos oito valores, o questionário também tenta calcular o seu perfil ideológico. 
        Isto é um trabalho em andamento e muito menos preciso que os valores e eixos ideológicos, então não o leve 
        muito a sério. Se você discorda com a ideologia que lhe foi atribuída, nos mande um email no endereço 
        eightvalues@gmail.com com sua pontuação, ideologia atribuída e ideologia preferida, e vamos tentar ajustar o sistema. Obrigado!</h2>
    <p>¯\_(ツ)_/¯<br/> Se você tem alguma sugestão ou crítica construtiva, sinta-se à vontade para enviar um e-mail para <a href="mailto:eightvalues@gmail.com">eightvalues@gmail.com</a></p>
    <br>
    <br>
    <p>
        <small>Se você tem alguma dúvida sobre esse compasso político você pode entrar em contato diretamente comigo pelo e-mail <a href="mailto:bernardo.k.araujo@gmail.com">bernardo.k.araujo@gmail.com</a></small>
    </p>
    <!-- Website visit statistics - no personal information is collected! -->
    <script type="text/javascript">
        var sc_project = 11325211;
        var sc_invisible = 1;
        var sc_security = "fd9f0659";
        var scJsHost = (("https:" == document.location.protocol) ?
            "https://secure." : "http://www.");
        document.write("<sc" + "ript type='text/javascript' src='" +
            scJsHost +
            "statcounter.com/counter/counter.js'></" + "script>");
    </script>
    <noscript><div class="statcounter"><a title="web stats"
href="http://statcounter.com/" target="_blank"><img
class="statcounter"
src="//c.statcounter.com/11325211/0/fd9f0659/1/" alt="web
stats"></a></div></noscript>

    <!-- This is the script for the page itself -->
    <script type="text/javascript">
        axios
            .get('/api/perguntas/quantidade')
            .then(function(response) {
                document.getElementById("numOfQuestions").innerHTML = response.data.quantidade;
            });
    </script>
</body>