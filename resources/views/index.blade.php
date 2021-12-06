<head>
    @include('partials.head')
</head>

<body>
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

    https://www.linkedin.com/in/bernardo-araujo-7419a610a/
    
    <hr>
    <h2>Importante!</h2>
    <p>Esse é um projeto de pesquisa de TCC desenvolvido por <u><a href="https://www.linkedin.com/in/bernardo-araujo-7419a610a/">Bernardo Kauer Comba de Araujo</a></u> pela Universidade Univeritas do Rio de Janeiro, sob a orientação do professor Yuri Lima, com o objetivo 
       de realizar coleta de informações para trabalho de pesquisa sem fins comerciais.
       <br /> <br />
       Parte desse projeto é baseado no teste conhecido como <i>8values</i>. Foi modificado e traduzido para aderir aos formatos da pesquisa.
       <br /> <br />
       Caso você tenha interesse em conhecer o projeto original, você pode encontra-lo no repositório GitHub
       <a href="https://github.com/8values/8values.github.io">https://github.com/8values/8values.github.io</a>
       <br /> <br />
       Parte dessas traduções foram baseadas em um outro projeto com o foco na tradução para português do projeto original, que tem como autoria o Rafael Arrais (raph) 
       <a href="https://raph.com.br/8values/">https://raph.com.br/8values/</a>
    </p>
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

    <h2><a id="anchor">O que e quais são os oito valores?</a></h2>
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
                <p class="value"><b style="color:#f57c00;">NAÇÃO</b></p>
                <p class="blurb-text">
                    Aqueles com uma pontuação maior em Nação são patriotas e nacionalistas. Estes geralmente acreditam numa
                    política externa agressiva, valorizando as forças armadas, a soberania nacional, e se preciso, o uso
                    da força militar.
                </p>
            </div>
            <div class="explanation_axis">
                <p class="axis_name">DIPLOMATICO</p>
                <img class="arrow" src="double_arrow.svg">
            </div>
            <div class="explanation_blurb_right">
                <p class="value"><b style="color:#0288d1;">MUNDO</b></p>
                <p class="blurb-text">
                    Aqueles com uma pontuação maior em Mundo são cosmopolitas e globalistas. Estes geralmente acreditam numa
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
    <br />
    <h2 style="margin-top: 17pt;">O que significa "perfil mais próximo" ao final dos resultados?</h2>
    <p>Adicionalmente à associação dos oito valores, o questionário também tenta calcular o seu perfil ideológico.
        Isto é um trabalho em andamento e muito menos preciso que os valores e eixos ideológicos, então não o leve
        muito a sério. Obrigado!</h2>
    <br>
    <br>
    <p>
        <small>Se você tem alguma dúvida sobre esse compasso político você pode entrar em contato diretamente comigo
            pelo e-mail <a href="mailto:bernardo.k.araujo@gmail.com">bernardo.k.araujo@gmail.com</a>
        </small>
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
