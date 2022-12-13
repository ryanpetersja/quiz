let methods = {
    selectOption(name, response, recommendation) {
        this.currentIndex++;
        this.responses.push({
            name: name,
            response: response,
        });

        if (typeof recommendation !== "undefined") {
            this.addRecomendation(recommendation);
            console.log("recomendations added");
        }

        if (this.currentIndex == this.questions.length) {
            this.tallyRecomendations();
        }
        this.submitData();
    },

    addRecomendation(recommendation) {
        this.casterScore += recommendation.caster;
        this.neemScore += recommendation.neem;
        this.gbScore += recommendation.tgb;
        // console.log("caster: " + this.casterScore);
        // console.log("neem: " + this.neemScore);
        // console.log("gb: " + this.gbScore);
    },

    tallyRecomendations() {
        // console.log("caster: " + this.casterScore);
        // console.log("neem: " + this.neemScore);
        // console.log("gb: " + this.gbScore);
        if (this.casterScore != this.neemScore) {
            if (this.casterScore > this.neemScore) {
                if (this.casterScore > this.gbScore) {
                    this.recommendations.push("caster");
                } else if (this.casterScore == this.gbScore) {
                    this.recommendations.push("gb");
                    this.recommendations.push("caster");
                } else {
                    this.recommendations.push("gb");
                }
            } else {
                if (this.neemScore > this.gbScore) {
                    // console.log(neem)
                    this.recommendations.push("neem");
                } else if (this.neem == this.gbScore) {
                    this.recommendations.push("gb");
                    this.recommendations.push("neem");
                } else {
                    this.recommendations.push("gb");
                }
            }
        } else {
            this.recommendations.push("neem");
            this.recommendations.push("caster");
        }

        this.recommendations_string = JSON.stringify(this.recommendationss);
    },

    checkForm(e) {
        if (this.name && this.age) {
            return true;
        }

        this.errors = [];

        if (!this.name) {
            this.errors.push("Name required.");
            this.nameError = "Name required, please add your name";
        } else {
            this.nameError = null;
        }
        if (!this.email) {
            this.errors.push("mail required.");
            this.emailError = "Email required, please add your email";
        } else {
            this.emailError = null;
        }

        if (this.errors.length > 0) {
            e.preventDefault();
        }
    },

    submitData() {
        let responses_string = "{";
        let i = 0;
        this.responses.forEach((element) => {
            responses_string +=
                '"' + element.name + '":' + '"' + element.response + '",';
            i++;
            if (i == this.responses.length) {
                responses_string = responses_string.substring(
                    0,
                    responses_string.length - 1
                );
                responses_string += "}";
                this.json_repsonses = responses_string;
            }
        });
        // responses_string += "}"

        // document.getElementById("result-box").innerHTML = responses_string;

        // window.alert("Things submitted");
        // var xhttp = new XMLHttpRequest();
        // xhttp.open("POST", "https://reqbin.com/echo/post/json");

        // xhttp.onreadystatechange = function() {
        //     if (this.readyState == 4 && this.status == 200) {
        //         // Typical action to be performed when the document is ready:
        //         document.getElementById("demo").innerHTML = xhttp.responseText;
        //     }
        // };
        // let data = `{
        //     "Id": 78912,
        //     "Customer": "Jason Sweet",
        //     "Quantity": 1,
        //     "Price": 18.00
        //     }`;

        // xhttp.send(data);
    },
};
