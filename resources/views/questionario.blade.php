<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700|Roboto:400,700" rel="stylesheet">
    <link href='style.css' rel='stylesheet' type='text/css'>
    <title>8values Quiz</title>
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

    <!-- JavaScript for the test itself -->
    <script>
        let questions,
            max_econ, max_dipl, max_govt, max_scty, // Max possible scores
            qn = 0,
            econ_array, dipl_array, govt_array, scty_array;

        max_econ = max_dipl = max_govt = max_scty = 0;

        axios   
            .get('/api/perguntas')
            .then(function(response) {
                questions = response.data;
                run();
            });



        function run() {
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