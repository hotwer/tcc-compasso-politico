<head>
    @include('partials.head')
</head>

<body>
    @include('partials.github-corner')
    <h1>8values</h1>
    <hr>
    <div class="center">
        <div class="axis_name quadcolumn">ECONÔMICO</div>
        <div class="axis_name quadcolumn">DIPLOMATICO</div>
        <div class="axis_name quadcolumn">CIVIL</div>
        <div class="axis_name quadcolumn">SOCIAL</div>
        <a href="#anchor"><img src="value_images/equality_pt-br.svg" class="quadcolumn"></a>
        <a href="#anchor"><img src="value_images/nation_pt-br.svg" class="quadcolumn"></a>
        <a href="#anchor"><img src="value_images/liberty_pt-br.svg" class="quadcolumn"></a>
        <a href="#anchor"><img src="value_images/tradition_pt-br.svg" class="quadcolumn"></a>
        <a href="#anchor"><img src="value_images/markets_pt-br.svg" class="quadcolumn"></a>
        <a href="#anchor"><img src="value_images/globe_pt-br.svg" class="quadcolumn"></a>
        <a href="#anchor"><img src="value_images/authority_pt-br.svg" class="quadcolumn"></a>
        <a href="#anchor"><img src="value_images/progress_pt-br.svg" class="quadcolumn"></a>
    </div>
    <br>
    <button class="button" onclick="location.href='/instrucoes';" style="font-size:36pt;">Clique aqui para
        iniciar!</button>
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
        Existem <b><u><span id="numOfQuestions"></span></u></b> questões no teste.
    </p>

    <h2><a id="anchor">O que são os oito valores?</a></h2>
    <p>Existem quatro eixos ideológicos - Econômico, Diplomático, Civil e Social - e cada um tem dois valores opostos
        atribuídos a eles. Estes são:</p>
    <div class="explanation_bg">
        <div class="spacer">
            <div class="explanation_blurb_left">
                <p class="value"><b style="color:#d32f2f;">IGUALDADE</b></p>
                <p class="blurb-text">
                    Aqueles com uma pontuação maior em Igualdade acreditam que a economia deve distribuir valor
                    igualmente entre a população. Estes tendem a apoiar leis tributárias progressivas, programas
                    sociais, e no geral, socialismo.
                </p>
            </div>
            <div class="explanation_axis">
                <p class="axis_name">ECONÔMICO</p>
                <img class="arrow" src="double_arrow.svg">
            </div>
            <div class="explanation_blurb_right">
                <p class="value"><b style="color:#00796b;">MERCADO</b></p>
                <p class="blurb-text">
                    Aqueles com uma pontuação maior em Mercado acreditam que a economia deve focar em crescimento
                    rápido. Estes tendem a apoiar impostos mais baixos, privatização, desregulamentação, e no geral,
                    capitalismo laissez-faire (liberalismo).
                </p>
            </div>
        </div>
        <div class="spacer">
            <div class="explanation_blurb_left">
                <p class="value"><b style="color:#f57c00;">NACIONALISMO</b></p>
                <p class="blurb-text">
                    Aqueles com uma pontuação maior em Nacionalismo são patriotas. Estes geralmente acreditam numa
                    política externa agressiva, valorizando as forças armadas, a soberania nacional, e se preciso, o uso
                    da força militar.
                </p>
            </div>
            <div class="explanation_axis">
                <p class="axis_name">DIPLOMATICO</p>
                <img class="arrow" src="double_arrow.svg">
            </div>
            <div class="explanation_blurb_right">
                <p class="value"><b style="color:#0288d1;">GLOBALIZAÇÃO</b></p>
                <p class="blurb-text">
                    Aqueles com uma pontuação maior em Globalização são cosmopolitas. Estes geralmente acreditam numa
                    política externa pacífica, enfatizando diplomacia, cooperação, integração, e no geral, uma unidade
                    global de interesse mútuo.
                </p>
            </div>
        </div>
        <div class="spacer">
            <div class="explanation_blurb_left">
                <p class="value"><b style="color:#fbc02d;">LIBERDADE</b></p>
                <p class="blurb-text">
                    Aqueles com uma pontuação maior em Liberdade acreditam em forte liberdade civil. Estes tendem a
                    apoiar democracia e opor-se à intervenção do Estado nas vidas pessoais. Note que isto se refere a
                    liberdades civis, não a liberdades econômicas.
                </p>
            </div>
            <div class="explanation_axis">
                <p class="axis_name">CIVIL</p>
                <img class="arrow" src="double_arrow.svg">
            </div>
            <div class="explanation_blurb_right">
                <p class="value"><b style="color:#303f9f;">AUTORIDADE</b></p>
                <p class="blurb-text">
                    Aqueles com uma pontuação maior em Autoridade acreditam em forte poder do Estado. Estes tendem a
                    apoiar a intervenção do Estado nas vidas pessoais, fiscalização governamental, e se preciso, censura
                    ou autocracia.
                </p>
            </div>
        </div>
        <div class="spacer">
            <div class="explanation_blurb_left">
                <p class="value"><b style="color:#689f38;">TRADIÇÃO</b></p>
                <p class="blurb-text">
                    Aqueles com uma pontuação maior em Tradição acreditam em valores conservadores e aderência estrita a
                    um código moral. Embora nem sempre, usualmente são religiosos, e apoiam o status quo vigente.
                </p>
            </div>
            <div class="explanation_axis">
                <p class="axis_name">SOCIAL</p>
                <img class="arrow" src="double_arrow.svg">
            </div>
            <div class="explanation_blurb_right">
                <p class="value"><b style="color:#7b1fa2;">PROGRESSO</b></p>
                <p class="blurb-text">
                    Aqueles com uma pontuação maior em Progresso acreditam em avanços sociais e racionalidade. Embora
                    nem sempre, usualmente são seculares ou agnósticos, e apoiam ações ambientais e grandes
                    investimentos em pesquisa científica ou tecnológica.
                </p>
            </div>
        </div>
        <br />
    </div>

    <h2 style="margin-top: 17pt;">O que significa "perfil mais próximo" ao final dos resultados?</h2>
    <p>Adicionalmente à associação dos oito valores, o questionário também tenta calcular o seu perfil ideológico.
        Isto é um trabalho em andamento e muito menos preciso que os valores e eixos ideológicos, então não o leve
        muito a sério. Se você discorda com a ideologia que lhe foi atribuída, nos mande um email no endereço
        eightvalues@gmail.com com sua pontuação, ideologia atribuída e ideologia preferida, e vamos tentar ajustar o
        sistema. Obrigado!</h2>
    <p>¯\_(ツ)_/¯<br /> Se você tem alguma sugestão ou crítica construtiva, sinta-se à vontade para enviar um e-mail para
        <a href="mailto:eightvalues@gmail.com">eightvalues@gmail.com</a>
    </p>
    <br>
    <br>
    <p>
        <small>Se você tem alguma dúvida sobre esse compasso político você pode entrar em contato diretamente comigo
            pelo e-mail <a href="mailto:bernardo.k.araujo@gmail.com">bernardo.k.araujo@gmail.com</a></small>
    </p>

    <!-- This is the script for the page itself -->
    <script type="text/javascript">
        axios
            .get('/api/perguntas/quantidade')
            .then(function(response) {
                document.getElementById("numOfQuestions").innerHTML = response.data.quantidade;
            });
    </script>
</body>
