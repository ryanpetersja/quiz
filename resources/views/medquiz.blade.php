<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


</head>

<body>
    <style>
        [v-cloak] {
            display: none !important;
        }

        #page-title {
            text-align: center;
            display: block !important;
            width: 100% !important;
            color: #ab9574
        }

        .quiz-box {
            padding-top: 45px
        }

        .answer {
            width: 100%;
            border: solid 1px #eecce2;
            display: block;
            border-radius: 30px;
            padding: 10px 25px;
            margin-bottom: 25px;
            text-align: center;
            background: #ab9574;

        }

        .question-title {
            text-align: center;
            margin: 0 45px 45px 45px;
            color: #ab9574;
        }

        .quiz-box {
            margin-top: 30px
        }

        .info-box {
            /* text-align: center */
        }

        .info-box h3 {
            text-align: center
        }

        .info-box p {
            text-align: center
        }

        .info-box label {
            margin-bottom: 10px
        }

        .field-error {
            color: #f8d7da;
            display: block;
            padding: 0px 15px;
            background: #842029;
            width: 80%;
            margin: auto;
            border-radius: 0 0 30px 30px;
            text-align: center;
        }

        .error-title {
            background: #f8d7da;
            display: block;
            padding: 15px 15px;
            color: #842029;
            width: 80%;
            margin: 45px auto;
            border-radius: 30px 30px;
        }

        .info-box button {
            margin: 25px auto !important;
            display: block;
        }

        .results-blerb {
            width: 80%;
            display: block;
            margin: auto;
            margin-bottom: 20px
        }

        .form-group {
            margin-bottom: 25px
        }
    </style>
    <div id="quiz">
        <div class="container">
            <div class="row">
                <div class="offset-md-3 col-md-6 ">
                    <h1 id="page-title">@{{ title }}</h1>
                    <div id="result-box">
                    </div>

                    <div class="quiz-box">
                        <div class="row">
                            <div class="col-sm-4">Neem <span>@{{ neemScore }}</span></div>
                            <div class="col-sm-4">Caster <span>@{{ casterScore }}</span></div>
                            <div class="col-sm-4">Growth Blend <span>@{{ gbScore }}</span></div>
                        </div>
                        <div v-for="question in questions">
                            <div v-if="question.index == currentIndex" :name="question.name" :id="question.name">
                                <h2 class="question-title">@{{ question.question }}</h2>
                                <span class="answer"
                                    @:click="selectOption(question.name, option.value, option.recommendation)"
                                    v-for="option in question.answers" :value="option.value">
                                    @{{ option.answer }}
                                </span>
                            </div>
                        </div>
                        <div class="info-box" v-if="currentIndex > questions.length - 1">
                            <h3>Your results are ready!</h3>
                            <p class="results-blerb">Fill in the info below and we'll send you your recomendations based
                                your issues and goals</p>

                            <p v-if="errors.length" class="error-title">
                                hm, seems you have a error or to in the form
                            </p>
                            <form method="post" @submit="checkForm" action="/submit-hair-quiz">
                                @csrf
                                <div class="form-group">
                                    <label for="name">What is your name?</label>
                                    <input v-model="name" name="name" type="text" class="form-control"
                                        id="name" placeholder="Enter your name">
                                    <small v-if="this.nameError != null"
                                        class="field-error">@{{ this.nameError }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input v-model="email" name="email" type="email" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                    <small v-if="this.emailError != null"
                                        class="field-error">@{{ this.emailError }}</small>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone (whatsapp)</label>
                                    <input v-model="phone" name="phone" type="text" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phone number">
                                    <small id="whatsapphelp" class="form-text text-muted">Recieve your results on
                                        whatsapp</small>
                                </div>
                                <div v-show="false">
                                    <input type="text" name="responses" v-model="json_repsonses">
                                </div>
                                <input v-show="false" type="text" name="recommendations_string"
                                    v-model="recommendations">

                                <button type="submit" class="btn btn-warning">Send me my
                                    results</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="js/questions.js"></script>
    <script src="js/methods.js"></script>
    <script>
        let app = Vue.createApp({
            data: function() {
                return {
                    title: "Medwigs Haircare Quiz",
                    currentIndex: 0,
                    email: null,
                    phone: null,
                    name: null,
                    submitted: false,
                    json_repsonses: null,
                    questions: questions,
                    responses: [],
                    errors: [],
                    nameError: null,
                    emalError: null,
                    neemScore: 0,
                    gbScore: 0,
                    casterScore: 0,
                    recommendations: [],
                    recommendations_string: null
                }

            },
            methods: methods
        })
        app.mount("#quiz");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
