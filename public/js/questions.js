let questions = [
    {
        index: 0,
        question: "Do you have a hair care routine?",
        name: "routine",

        answers: [
            {
                value: "YES",
                answer: "Yes, I do",
            },
            {
                value: "NO",
                answer: "No, I don't",
            },
        ],
    },
    {
        question: "Have you ever worn a wig before?",
        name: "wig-before",
        index: 1,

        answers: [
            {
                value: "YES",
                answer: "Yes, I have",
            },
            {
                value: "NO",
                answer: "No, I've never worn one",
            },
        ],
    },
    {
        question: "What is your biggest challenge with your hair?",
        name: "challenge",
        index: 2,

        answers: [
            {
                value: "low-growth",
                answer: "It's not growing as fast as I want it to",
                recommendation: {
                    neem: 45,
                    caster: 10,
                    tgb: 1,
                },
            },
            {
                value: "breakage/split",
                answer: "It has alot of breakage/split ends ",
                recommendation: {
                    neem: 25,
                    caster: 35,
                    tgb: 40,
                },
            },
            {
                value: "thin_and_brittle",
                answer: "It thin and brittle",
                recommendation: {
                    neem: 20,
                    caster: 30,
                    tgb: 50,
                },
            },
            {
                value: "heat_damage",
                answer: "It has heat damage",
                recommendation: {
                    neem: 15,
                    caster: 35,
                    tgb: 50,
                },
            },
            {
                value: "dry_scalp/dandruff",
                answer: "Dry scalp/dandruff",
                recommendation: {
                    neem: 35,
                    caster: 15,
                    tgb: 50,
                },
            },
        ],
    },
    {
        question: "What is your ultimate hair goal?",
        name: "goal",
        index: 3,

        answers: [
            {
                value: "low-healthy",
                answer: "To grow long healthy hair",
                recommendation: {
                    neem: 20,
                    caster: 10,
                    tgb: 1,
                },
            },
            {
                value: "stop_breakage",
                answer: "To stop breakage ",
                recommendation: {
                    neem: 30,
                    caster: 40,
                    tgb: 50,
                },
            },
            {
                value: "volume",
                answer: "To have thick voluminous hair",
                recommendation: {
                    neem: 55,
                    caster: 15,
                    tgb: 30,
                },
            },
            {
                value: "texture",
                answer: "To improve my hair texture",
                recommendation: {
                    neem: 10,
                    caster: 50,
                    tgb: 40,
                },
            },
        ],
    },
];
