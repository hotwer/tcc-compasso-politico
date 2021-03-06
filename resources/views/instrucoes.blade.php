<head>
    @include('partials.head')
</head>

<body>
    <h1>8values</h1>
    <hr>
    <h2 style="text-align:center;">Instruções</h2>
    <p class="question">
        <span>
            Uma série de afirmações será apresentada. Para cada uma, clique no botão correspondente à
            sua opinião.
        </span>
        <br>
        <small>
            Em cada uma das perguntas existe uma caixa de <b>comentário</b> caso você tenha vontade de complementar a sua opinião
            referente aquela pergunta/afirmação. Lembre-se de preenche-la <b>ANTES</b> de selecionar sua opção.
        </small>
        <br />
        <small>Por favor, selecione de qual estado/cidade você está realizando o questionário.  
            <br><br> 
            Essas informações serão utilizadas apenas para avaliações estatisticas de forma anonima e agregada, 
            nenhuma informação será usada para identificação pessoal.
        </small>
    </p>
    <div id="estado-cidade"></div>
    <button id="proceed-button" class="button disabled">Entendi!</button> <br>
    <button class="button disagree" onclick="location.href='/';">Espera, deixa pra lá!</button> <br>

    <script>
        const proceedButton = document.getElementById('proceed-button');

        run();

        function run() {
            bindEvents();

            let identificacao = getIdentificacao();

            if (!identificacao || !identificacao.hash) { // create hash to identify user
                updateIdentificacao('hash', uuidv4());
            }

            // always update the ip (should i?)
            getIpInfo(function(response) {
                updateIdentificacao('ip', response.data.geoplugin_request);
            });
            axios
                .get('/api/estados')
                .then(function (response) {
                    loadEstados(response.data);
                    loadCidades([]);
                });
        }

        function bindEvents() {
            proceedButton.addEventListener('click', proceed);
        }

        function loadEstados(estados) {
            let select = document.createElement('select');

            select.id = 'estado';

            select.addEventListener('change', onSelectEstado);

            let emptyOption = document.createElement('option');

            emptyOption.text = '---';
            emptyOption.value = '';

            select.appendChild(emptyOption);

            for (let estado of estados) {
                let option = document.createElement('option');

                option.text = estado.nome;
                option.value = estado.id;

                select.appendChild(option);
            }

            let estrangeiroOption = document.createElement('option');

            estrangeiroOption.text = 'Estrangeiro';
            estrangeiroOption.value = '0';

            select.appendChild(estrangeiroOption);

            document.getElementById('estado-cidade').appendChild(select);
        }

        function onSelectEstado() {
            if (this.value == '') {
                loadCidades([]);
            } else {
                axios
                    .get(`/api/estado/${this.value}/cidades`)
                    .then(function(response) {
                        loadCidades(response.data);
                    });
            }
        }

        function loadCidades(cidades) {
            let cidadeSelect = document.getElementById('cidade');

            if (cidadeSelect) {
                proceedButton.classList.add('disabled');
                cidadeSelect.remove();
            }

            let select = document.createElement('select');

            select.addEventListener('change', onSelectCidade);

            select.id = 'cidade';

            let emptyOption = document.createElement('option');

            emptyOption.text = '---';
            emptyOption.value = '';

            select.appendChild(emptyOption);

            for (let cidade of cidades) {
                let option = document.createElement('option');

                option.text = cidade.nome;
                option.value = cidade.id;

                select.appendChild(option);

            }

            document.getElementById('estado-cidade').appendChild(select);
        }

        function onSelectCidade() {
            if (this.value == '') {
                proceedButton.classList.add('disabled');
            } else {
                proceedButton.classList.remove('disabled');
            }
        }

        function proceed() {
            if (this.classList.contains('disabled')) {
                return ;
            }

            updateIdentificacao('estadoId', document.getElementById('estado').value);
            updateIdentificacao('cidadeId', document.getElementById('cidade').value);

            location.href = '/questionario'; 
        }

    </script>
</body>
