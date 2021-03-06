<head>
    @include('partials.head')
</head>

<body>
    <style>
        
    </style>

    <h1>8values</h1>
    <hr>

    <h1>Resultados</h1>

    <h2>Eixo econômico: <span class="weight-300" id="economic-label"></span></h2>
    <div class="axis">
        <img id="img-equality" src="value_images/equality_pt-br.svg" height="128pt" />
        <div class="bar equality" id="bar-equality">
            <div class="text-wrapper" id="equality"></div>
        </div>
        <div class="bar wealth" id="bar-wealth">
            <div class="text-wrapper" id="wealth"></div>
        </div>
        <img id="img-wealth" src="value_images/markets_pt-br.svg" height="128pt" />
    </div>
    <h2>Eixo diplomático: <span class="weight-300" id="diplomatic-label"></span></h2>
    <div class="axis">
        <img id="img-might" src="value_images/nation_pt-br.svg" height="128pt" />
        <div class="bar might" id="bar-might">
            <div class="text-wrapper" id="might"></div>
        </div>
        <div class="bar peace" id="bar-peace">
            <div class="text-wrapper" id="peace"></div>
        </div>
        <img id="img-peace" src="value_images/globe_pt-br.svg" height="128pt" />
    </div>
    <h2>Eixo civil: <span class="weight-300" id="state-label"></span></h2>
    <div class="axis">
        <img id="img-liberty" src="value_images/liberty_pt-br.svg" height="128pt" />
        <div class="bar liberty" id="bar-liberty">
            <div class="text-wrapper" id="liberty"></div>
        </div>
        <div class="bar authority" id="bar-authority">
            <div class="text-wrapper" id="authority"></div>
        </div>
        <img id="img-authority" src="value_images/authority_pt-br.svg" height="128pt" />
    </div>
    <h2>Eixo social: <span class="weight-300" id="society-label"></span></h2>
    <div class="axis">
        <img id="img-tradition" src="value_images/tradition_pt-br.svg" height="128pt" />
        <div class="bar tradition" id="bar-tradition">
            <div class="text-wrapper" id="tradition"></div>
        </div>
        <div class="bar progress" id="bar-progress">
            <div class="text-wrapper" id="progress"></div>
        </div>
        <img id="img-progress" src="value_images/progress_pt-br.svg" height="128pt" />
    </div>
    <h2>Perfil mais próximo: <span class="weight-300" id="ideology-label"></span></h2>
    <p>O cálculo do perfil ideológico é um trabalho em andamento, e é muito menos exato que os valores e eixos
        ideológicos acima.</p>
    <br><br>
    <div class="avaliacao-concordancia">
        <h4>Você concorda com o resultado calculado para o seu perfil?</h4>
        <label class="avaliacao-concordancia-option">
            Discordo Fortemente <br />
            <input type="radio" name="avaliacao-concordancia" value="-2">
        </label><label class="avaliacao-concordancia-option">
            Discordo <br />
            <input type="radio" name="avaliacao-concordancia" value="-1">
        </label><label class="avaliacao-concordancia-option">
            Neutro/Incerto <br />
            <input type="radio" name="avaliacao-concordancia" value="0">
        </label><label class="avaliacao-concordancia-option">
            Concordo <br />
            <input type="radio" name="avaliacao-concordancia" value="1">
        </label><label class="avaliacao-concordancia-option">
            Concordo Fortemente <br />
            <input type="radio" name="avaliacao-concordancia" value="2">
        </label>
    </div>
    <br><br><br /> <br />
    <p>Você pode enviar esses resultados copiando e colando a URL no topo da página ou usando a imagem abaixo.</p>
    <br />
    <p>Se você tem gostaria de ver o código fonte desse projeto você pode encontra-lo no repositório do GitHub 
        <a href="https://github.com/hotwer/tcc-compasso-politico">https://github.com/hotwer/tcc-compasso-politico</a></p>
    <hr />
    <img src="" id="banner">
    <button class="button" onclick="location.href='/';">Voltar</button> <br>
    </noscript>
    <script>
        const identificacao =  getIdentificacao();

        let ideology, version = '{{ 'Bernardo A. - Univeritas' }}';

        bindEvents();

        function bindEvents() {
            for (let radioLabel of document.getElementsByClassName('avaliacao-concordancia-option')) {
                let radio = radioLabel.lastElementChild;

                radio.addEventListener('change', onAvaliarChange);
            }

            function onAvaliarChange() {
                axios.post('/api/avaliar/0', {
                    "hash": identificacao.hash,
                    "ip": identificacao.ip, 
                    "estado_id": identificacao.estadoId,
                    "cidade_id": identificacao.cidadeId,
                    'avaliacao': this.value
                });

                alert('Muito obrigado por participar!!!');
            }
        }

        function getQueryVariable(variable) {
            var query = window.location.search.substring(1)
            var vars = query.split("&")
            for (var i = 0; i < vars.length; i++) {
                var pair = vars[i].split("=")
                if (pair[0] == variable) {
                    return pair[1]
                }
            }
            return (NaN);
        }

        function setBarValue(name, value) {
            innerel = document.getElementById(name)
            outerel = document.getElementById("bar-" + name)
            outerel.style.width = (value + "%")
            innerel.innerHTML = (value + "%")
            if (innerel.offsetWidth + 20 > outerel.offsetWidth) {
                innerel.style.visibility = "hidden"
            }
        }

        econArray = ["Comunista", "Socialista", "Social", "Centrista", "Mercado", "Capitalista", "Liberalista"]
        diplArray = ["Cosmopolita", "Internacionalista", "Pacifista", "Balanceado", "Patriótico", "Nacionalista",
            "Chauvinista"
        ]
        govtArray = ["Anarquista", "Libertário", "Liberal", "Moderado", "Estadista", "Autoritário", "Totalitarista"]
        sctyArray = ["Revolucionário", "Muito Progressista", "Progressista", "Neutro", "Conservador", "Muito Conservador",
            "Reacionário"
        ]

        function setLabel(val, ary) {
            if (val > 100) {
                return ""
            } else
            if (val > 90) {
                return ary[0]
            } else
            if (val > 75) {
                return ary[1]
            } else
            if (val > 60) {
                return ary[2]
            } else
            if (val >= 40) {
                return ary[3]
            } else
            if (val >= 25) {
                return ary[4]
            } else
            if (val >= 10) {
                return ary[5]
            } else
            if (val >= 0) {
                return ary[6]
            } else {
                return ""
            }
        }

        equality = getQueryVariable("e")
        peace = getQueryVariable("d")
        liberty = getQueryVariable("g")
        progress = getQueryVariable("s")
        wealth = (100 - equality).toFixed(1)
        might = (100 - peace).toFixed(1)
        authority = (100 - liberty).toFixed(1)
        tradition = (100 - progress).toFixed(1)

        setBarValue("equality", equality)
        setBarValue("wealth", wealth)
        setBarValue("peace", peace)
        setBarValue("might", might)
        setBarValue("liberty", liberty)
        setBarValue("authority", authority)
        setBarValue("progress", progress)
        setBarValue("tradition", tradition)

        document.getElementById("economic-label").innerHTML = setLabel(equality, econArray)
        document.getElementById("diplomatic-label").innerHTML = setLabel(peace, diplArray)
        document.getElementById("state-label").innerHTML = setLabel(liberty, govtArray)
        document.getElementById("society-label").innerHTML = setLabel(progress, sctyArray)

        axios
            .get("/api/ideologias")
            .then(function(response) {
                loadIdeologies(response.data);
            });

        function loadIdeologies(ideologies) {
            ideology = ""
            ideodist = Infinity
            for (var i = 0; i < ideologies.length; i++) {
                dist = 0
                dist += Math.pow(Math.abs(ideologies[i].stats.econ - equality), 2)
                dist += Math.pow(Math.abs(ideologies[i].stats.govt - liberty), 2)
                dist += Math.pow(Math.abs(ideologies[i].stats.dipl - peace), 1.73856063)
                dist += Math.pow(Math.abs(ideologies[i].stats.scty - progress), 1.73856063)
                if (dist < ideodist) {
                    ideology = ideologies[i].name
                    ideodist = dist
                }
            }
            document.getElementById("ideology-label").innerHTML = ideology

            buildIdeologyImage();
        }

        function createImage(src, x, y, w, h) {
            img = new Image()
            img.src = src
            img.onLoad = function() {
                ctx.drawImage(img, x, y, w, h)
            }
        }

        function buildIdeologyImage() {
            var c = document.createElement("canvas")
            var ctx = c.getContext("2d")
            c.width = 800;
            c.height = 650;
            ctx.fillStyle = "#EEEEEE"
            ctx.fillRect(0, 0, 800, 650);

            img = document.getElementById("img-equality")
            ctx.drawImage(img, 20, 170, 100, 100);
            img = document.getElementById("img-wealth")
            ctx.drawImage(img, 680, 170, 100, 100)
            img = document.getElementById("img-might")
            ctx.drawImage(img, 20, 290, 100, 100)
            img = document.getElementById("img-peace")
            ctx.drawImage(img, 680, 290, 100, 100)
            img = document.getElementById("img-liberty")
            ctx.drawImage(img, 20, 410, 100, 100)
            img = document.getElementById("img-authority")
            ctx.drawImage(img, 680, 410, 100, 100)
            img = document.getElementById("img-tradition")
            ctx.drawImage(img, 20, 530, 100, 100)
            img = document.getElementById("img-progress")
            ctx.drawImage(img, 680, 530, 100, 100)

            ctx.fillStyle = "#222222"
            ctx.fillRect(120, 180, 560, 80)
            ctx.fillRect(120, 300, 560, 80)
            ctx.fillRect(120, 420, 560, 80)
            ctx.fillRect(120, 540, 560, 80)
            ctx.fillStyle = "#f44336"
            ctx.fillRect(120, 184, 5.6 * equality - 2, 72)
            ctx.fillStyle = "#00897b"
            ctx.fillRect(682 - 5.6 * wealth, 184, 5.6 * wealth - 2, 72)
            ctx.fillStyle = "#ff9800"
            ctx.fillRect(120, 304, 5.6 * might - 2, 72)
            ctx.fillStyle = "#03a9f4"
            ctx.fillRect(682 - 5.6 * peace, 304, 5.6 * peace - 2, 72)
            ctx.fillStyle = "#ffeb3b"
            ctx.fillRect(120, 424, 5.6 * liberty - 2, 72)
            ctx.fillStyle = "#3f51b5"
            ctx.fillRect(682 - 5.6 * authority, 424, 5.6 * authority - 2, 72)
            ctx.fillStyle = "#8bc34a"
            ctx.fillRect(120, 544, 5.6 * tradition - 2, 72)
            ctx.fillStyle = "#9c27b0"
            ctx.fillRect(682 - 5.6 * progress, 544, 5.6 * progress - 2, 72)
            ctx.fillStyle = "#222222"
            ctx.font = "700 80px Montserrat"
            ctx.textAlign = "left"
            ctx.fillText("8values", 20, 90)
            ctx.font = "50px Montserrat"
            ctx.fillText(ideology, 20, 140)

            ctx.textAlign = "left"
            if (equality > 30) {
                ctx.fillText(equality + "%", 130, 237.5)
            }
            if (might > 30) {
                ctx.fillText(might + "%", 130, 357.5)
            }
            if (liberty > 30) {
                ctx.fillText(liberty + "%", 130, 477.5)
            }
            if (tradition > 30) {
                ctx.fillText(tradition + "%", 130, 597.5)
            }
            ctx.textAlign = "right"
            if (wealth > 30) {
                ctx.fillText(wealth + "%", 670, 237.5)
            }
            if (peace > 30) {
                ctx.fillText(peace + "%", 670, 357.5)
            }
            if (authority > 30) {
                ctx.fillText(authority + "%", 670, 477.5)
            }
            if (progress > 30) {
                ctx.fillText(progress + "%", 670, 597.5)
            }

            ctx.font = "300 25px Montserrat"
            // ctx.fillText("https://github.com/hotwer/tcc-compasso-politico", 780, 60)
            ctx.fillText(version, 780, 90)
            ctx.textAlign = "center"
            ctx.fillText("Eixo econômico: " + document.getElementById("economic-label").innerHTML, 400, 175)
            ctx.fillText("Eixo diplomático: " + document.getElementById("diplomatic-label").innerHTML, 400, 295)
            ctx.fillText("Eixo civil: " + document.getElementById("state-label").innerHTML, 400, 415)
            ctx.fillText("Eixo social: " + document.getElementById("society-label").innerHTML, 400, 535)

            document.getElementById("banner").src = c.toDataURL();
        }
    </script>
</body>
