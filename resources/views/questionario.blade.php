<head>
    @include('partials.head')
</head>

<body>
    <h1>8values</h1>
    <hr>
    <h2 style="text-align:center;" id="question-number">Carregando...</h2>
    <p class="question" id="question-text"></p>
    <button class="button stronglyAgree" onclick="next_question( 1.0)">Concordo extremamente</button> <br>
    <button class="button agree" onclick="next_question( 0.5)">Concordo</button> <br>
    <button class="button neutral" onclick="next_question( 0.0)">Neutral/Incerto</button> <br>
    <button class="button disagree" onclick="next_question(-0.5)">Discordo</button> <br>
    <button class="button stronglyDisagree" onclick="next_question(-1.0)">Discordo extremamente</button> <br>
    <button class="small_button" onclick="prev_question()" id="back_button">Voltar</button>
    <button class="small_button_off" id="back_button_off">Voltar</button><br>

    <!-- JavaScript for the test itself -->
    <script>
        let questions,
            max_econ, max_dipl, max_govt, max_scty, // Max possible scores
            qn = 0,
            econ_array, dipl_array, govt_array, scty_array,
            identificacao;

        max_econ = max_dipl = max_govt = max_scty = 0;

        axios
            .get('/api/perguntas')
            .then(function(response) {
                questions = response.data;
                run();
            });

        function run() {
            identificacao =  getIdentificacao();

            econ_array = new Array(questions.length);
            dipl_array = new Array(questions.length);
            govt_array = new Array(questions.length);
            scty_array = new Array(questions.length);
            init_question();
            for (var i = 0; i < questions.length; i++) {
                max_econ += Math.abs(questions[i].effect.econ)
                max_dipl += Math.abs(questions[i].effect.dipl)
                max_govt += Math.abs(questions[i].effect.govt)
                max_scty += Math.abs(questions[i].effect.scty)
            }
        }

        function init_question() {
            document.getElementById("question-text").innerHTML = questions[qn].question;
            document.getElementById("question-number").innerHTML = "Pergunta " + (qn + 1) + " de " + (questions.length);
            if (qn == 0) {
                document.getElementById("back_button").style.display = 'none';
                document.getElementById("back_button_off").style.display = 'block';
            } else {
                document.getElementById("back_button").style.display = 'block';
                document.getElementById("back_button_off").style.display = 'none';
            }
        }

        function next_question(mult) {
            econ_array[qn] = mult * questions[qn].effect.econ
            dipl_array[qn] = mult * questions[qn].effect.dipl
            govt_array[qn] = mult * questions[qn].effect.govt
            scty_array[qn] = mult * questions[qn].effect.scty

            
            axios
                .post(`/api/resposta/save/${questions[qn].id}`, {
                    "hash": identificacao.hash, 
                    "ip": identificacao.ip, 
                    "estado_id": identificacao.estadoId,
                    "cidade_id": identificacao.cidadeId,
                    "multiplicador": mult
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
            let final_econ = econ_array.reduce((a, b) => a + b, 0)
            let final_dipl = dipl_array.reduce((a, b) => a + b, 0)
            let final_govt = govt_array.reduce((a, b) => a + b, 0)
            let final_scty = scty_array.reduce((a, b) => a + b, 0)
            location.href = `/resultados` +
                `?e=${calc_score(final_econ,max_econ)}` +
                `&d=${calc_score(final_dipl,max_dipl)}` +
                `&g=${calc_score(final_govt,max_govt)}` +
                `&s=${calc_score(final_scty,max_scty)}`
        }
    </script>
</body>
