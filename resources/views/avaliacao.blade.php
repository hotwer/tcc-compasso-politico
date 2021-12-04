<head>
    @include('partials.head')
</head>

<body>
    <h1>8values</h1>
    <hr>
    <div class="header-container">
        <h2 style="text-align:center;" id="question-number"></h2>
    </div>
    <p class="question" id="question-text">
        Antes de apresentarmos o seu resultado, gostariamos de saber como você se sentiu durante a 
    </p>
    
    <button id="proceed-button" class="button">Compreendi</button> <br>
    <button class="hidden-button button stronglyAgree" style="display:none;" onclick="next_question( 2)">Concordo extremamente</button> <br>
    <button class="hidden-button button agree" style="display:none;" onclick="next_question( 1)">Concordo</button> <br>
    <button class="hidden-button button neutral" style="display:none;" onclick="next_question( 0)">Neutro/Incerto</button> <br>
    <button class="hidden-button button disagree" style="display:none;" onclick="next_question( -1)">Discordo</button> <br>
    <button class="hidden-button button stronglyDisagree" style="display:none;" onclick="next_question( -2)">Discordo extremamente</button> <br>
  
    <!-- JavaScript for the test itself -->
    <script>
        let questions, qn = 0, identificacao;

        questions = [
            {
                id: 1,
                question: 'Você achou coerente a quantidade de perguntas/afirmações?',
            },
            {
                id: 2,
                question: 'Você se sentiu confortável em compreender todas as perguntas/afirmações?',
            },
            {
                id: 3,
                question: 'Você acredita que as perguntas realizadas são importantes a ser realizadas?'
            }
        ]

        run();

        function run() {
            identificacao =  getIdentificacao();
            bindEvents();
        }

        function bindEvents() {
            let proceedButton = document.getElementById('proceed-button');

            proceedButton.addEventListener('click', proceed);

            function proceed() {
                proceedButton.style.display = 'none';
                
                for (let hiddenButton of document.getElementsByClassName('hidden-button')) {
                    hiddenButton.style.display = 'block';
                }

                init_question();
            } 
        }

        function init_question() {
            document.getElementById("question-text").innerHTML = questions[qn].question;
            document.getElementById("question-number").innerHTML = "Pergunta " + (qn + 1) + " de " + (questions.length);
        }

        function next_question(avaliacao) {

            axios
                .post(`/api/avaliar/${questions[qn].id}`, {
                    "hash": identificacao.hash, 
                    "ip": identificacao.ip, 
                    "estado_id": identificacao.estadoId,
                    "cidade_id": identificacao.cidadeId,
                    "avaliacao": avaliacao,
                })
                .then(function(response) { console.log(["save", response]); });

            qn++;

            if (qn < questions.length) {
                init_question();
            } else {
                results();
            }
        }

        function prev_question() {
            if (qn == 0) {
                return;
            }
            qn--;
            init_question();
        }

        function calc_score(score, max) {
            return (100 * (max + score) / (2 * max)).toFixed(1)
        }

        function results() {
            location.href = `/resultados` +
                `?e=${getQueryVariable('e')}` +
                `&d=${getQueryVariable('d')}` +
                `&g=${getQueryVariable('g')}` +
                `&s=${getQueryVariable('s')}`
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
    </script>
</body>
