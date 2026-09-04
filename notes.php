<?php
// notes.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Little Notes — Mei ♡</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600&display=swap" rel="stylesheet">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #fffdf9;
            color: #171717;
            overflow-x: hidden;
        }

        :root {
            --black: #171717;
            --white: #fffdf9;

            --pink: #f8b8cf;
            --pink-light: #fde3ec;

            --yellow: #f9df91;
            --yellow-light: #fff3c9;

            --blue: #b9dff2;
            --blue-light: #e5f4fb;
        }


        /* =========================
           NAVBAR
        ========================= */

        nav {
            position: fixed;
            top: 0;
            left: 0;

            width: 100%;
            height: 76px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 6%;

            background: rgba(255, 253, 249, 0.86);
            backdrop-filter: blur(14px);

            border-bottom: 1px solid rgba(23,23,23,0.06);

            z-index: 1000;
        }

        .logo {
            font-size: 21px;
            font-weight: 700;
        }

        .logo span {
            color: #e98aad;
        }

        .nav-links {
            display: flex;
            gap: 28px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--black);

            font-size: 14px;
            font-weight: 500;

            transition: 0.25s ease;
        }

        .nav-links a:hover {
            transform: translateY(-2px);
        }


        /* =========================
           HERO
        ========================= */

        .hero {
            padding: 150px 20px 50px;

            text-align: center;
        }

        .label {
            display: inline-block;

            background: var(--yellow-light);

            padding: 8px 16px;

            border-radius: 50px;

            font-size: 12px;
            font-weight: 600;

            margin-bottom: 22px;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;

            font-size: clamp(55px, 9vw, 90px);

            line-height: 1;

            letter-spacing: -4px;

            margin-bottom: 22px;
        }

        .hero h1 span {
            position: relative;
        }

        .hero h1 span::after {
            content: "";

            position: absolute;

            left: 0;
            bottom: 3px;

            width: 100%;
            height: 12px;

            background: var(--pink-light);

            z-index: -1;

            transform: rotate(-2deg);
        }

        .hero p {
            max-width: 500px;

            margin: auto;

            color: #777;

            font-size: 15px;

            line-height: 1.7;
        }


        /* =========================
           MAIN
        ========================= */

        .notes-container {
            max-width: 900px;

            margin: auto;

            padding: 25px 20px 120px;
        }


        /* =========================
           MOOD FILTER
        ========================= */

        .mood-filter {
            display: flex;

            justify-content: center;

            flex-wrap: wrap;

            gap: 9px;

            margin-bottom: 40px;
        }

        .filter-btn {
            border: 1px solid rgba(23,23,23,0.08);

            background: white;

            padding: 10px 15px;

            border-radius: 50px;

            cursor: pointer;

            font-family: inherit;

            font-size: 12px;

            transition: 0.25s ease;
        }

        .filter-btn:hover {
            transform: translateY(-3px);
        }

        .filter-btn.active {
            background: var(--black);

            color: white;

            border-color: var(--black);
        }


        /* =========================
           NOTE AREA
        ========================= */

        .note-area {
            display: flex;

            justify-content: center;

            perspective: 1200px;
        }

        .note-card {
            width: 100%;

            max-width: 650px;

            min-height: 430px;

            border-radius: 35px;

            padding: 55px 50px;

            background: var(--pink-light);

            position: relative;

            overflow: hidden;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            text-align: center;

            box-shadow:
                0 20px 60px rgba(0,0,0,0.07);

            transition:
                background 0.4s ease,
                transform 0.5s ease,
                opacity 0.3s ease;
        }

        .note-card::before {
            content: "♡";

            position: absolute;

            top: -45px;
            right: -10px;

            font-family: serif;

            font-size: 190px;

            opacity: 0.08;

            transform: rotate(15deg);
        }

        .note-card::after {
            content: "✦";

            position: absolute;

            bottom: -40px;
            left: 30px;

            font-size: 120px;

            opacity: 0.08;
        }


        /* =========================
           ENVELOPE
        ========================= */

        .envelope {
            font-size: 70px;

            margin-bottom: 20px;

            cursor: pointer;

            transition: 0.3s ease;
        }

        .envelope:hover {
            transform:
                scale(1.1)
                rotate(-5deg);
        }

        .note-card.opening {
            animation: openNote 0.55s ease;
        }

        @keyframes openNote {

            0% {
                opacity: 0.4;

                transform:
                    rotateX(-8deg)
                    scale(0.96);
            }

            50% {
                opacity: 0.7;
            }

            100% {
                opacity: 1;

                transform:
                    rotateX(0)
                    scale(1);
            }

        }


        /* =========================
           NOTE CONTENT
        ========================= */

        .note-category {
            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: 2px;

            color: #777;

            margin-bottom: 16px;
        }

        .note-text {
            max-width: 520px;

            font-family: 'Playfair Display', serif;

            font-size: clamp(25px, 4vw, 36px);

            line-height: 1.35;

            letter-spacing: -0.5px;

            margin-bottom: 25px;
        }

        .note-signature {
            font-size: 13px;

            color: #777;
        }


        /* =========================
           OPEN BUTTON
        ========================= */

        .open-btn {
            margin-top: 30px;

            border: none;

            background: var(--black);

            color: white;

            padding: 14px 22px;

            border-radius: 50px;

            font-family: inherit;

            font-size: 13px;

            font-weight: 600;

            cursor: pointer;

            transition: 0.3s ease;
        }

        .open-btn:hover {
            transform: translateY(-4px);

            box-shadow:
                0 12px 25px rgba(0,0,0,0.15);
        }


        /* =========================
           COUNTER
        ========================= */

        .progress {
            text-align: center;

            margin-top: 28px;
        }

        .progress-text {
            font-size: 12px;

            color: #888;

            margin-bottom: 10px;
        }

        .progress-bar {
            width: 220px;

            height: 5px;

            background: #eee;

            border-radius: 20px;

            overflow: hidden;

            margin: auto;
        }

        .progress-fill {
            width: 0%;

            height: 100%;

            background: var(--pink);

            border-radius: 20px;

            transition: width 0.5s ease;
        }


        /* =========================
           EMPTY / COMPLETE
        ========================= */

        .complete {
            display: none;

            text-align: center;

            padding: 80px 20px;
        }

        .complete .big {
            font-size: 65px;

            margin-bottom: 20px;
        }

        .complete h2 {
            font-family: 'Playfair Display', serif;

            font-size: 40px;

            margin-bottom: 15px;
        }

        .complete p {
            color: #777;

            font-size: 14px;

            line-height: 1.7;
        }


        /* =========================
           RESET
        ========================= */

        .reset {
            display: block;

            margin: 25px auto 0;

            border: none;

            background: transparent;

            color: #aaa;

            font-family: inherit;

            font-size: 11px;

            text-decoration: underline;

            cursor: pointer;
        }

        .reset:hover {
            color: #555;
        }


        /* =========================
           FOOTER
        ========================= */

        footer {
            background: var(--black);

            color: white;

            text-align: center;

            padding: 50px 20px 70px;
        }

        footer .heart {
            font-size: 25px;

            margin-bottom: 12px;
        }

        footer p {
            color: #aaa;

            font-size: 12px;

            line-height: 1.7;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 700px) {

            .nav-links {
                display: none;
            }

            nav {
                padding: 0 5%;
            }

            .hero {
                padding-top: 125px;
            }

            .hero h1 {
                letter-spacing: -3px;
            }

            .note-card {
                min-height: 420px;

                padding: 45px 25px;
            }

            .note-text {
                font-size: 25px;
            }

            .mood-filter {
                padding: 0 5px;
            }

        }

    </style>
</head>


<body>


    <!-- =========================
         NAVBAR
    ========================== -->

    <nav>

        <div class="logo">
            Mei<span>♡</span>
        </div>

        <div class="nav-links">

            <a href="menu.php">
                Home
            </a>

            <a href="music.php">
                Music
            </a>

            <a href="notes.php">
                Notes
            </a>

            <a href="foryou.php">
                For You
            </a>

            <a href="games.php">
                Games
            </a>

        </div>

    </nav>


    <!-- =========================
         HERO
    ========================== -->

    <section class="hero">

        <div class="label">
            a little something for you ♡
        </div>

        <h1>
            Little <span>Notes</span>
        </h1>

        <p>
            There are a thousand little things
            I could say to you.
            Here's one of them.
        </p>

    </section>


    <!-- =========================
         NOTES
    ========================== -->

    <main class="notes-container">


        <!-- FILTER -->

        <div class="mood-filter">

            <button
                class="filter-btn active"
                onclick="setFilter('all', this)">
                ✨ All
            </button>

            <button
                class="filter-btn"
                onclick="setFilter('romantic', this)">
                💗 Romantic
            </button>

            <button
                class="filter-btn"
                onclick="setFilter('sweet', this)">
                🌷 Sweet
            </button>

            <button
                class="filter-btn"
                onclick="setFilter('comfort', this)">
                🫂 Comfort
            </button>

            <button
                class="filter-btn"
                onclick="setFilter('funny', this)">
                😂 Funny
            </button>

            <button
                class="filter-btn"
                onclick="setFilter('motivation', this)">
                💪 Motivation
            </button>

            <button
                class="filter-btn"
                onclick="setFilter('miss', this)">
                💭 Miss You
            </button>

        </div>


        <!-- NOTE -->

        <div class="note-area">

            <div
                class="note-card"
                id="noteCard">

                <div
                    class="envelope"
                    onclick="openNewNote()">

                    💌

                </div>

                <div
                    class="note-category"
                    id="noteCategory">

                    A little note

                </div>

                <div
                    class="note-text"
                    id="noteText">

                    Tap the envelope
                    to open a note ♡

                </div>

                <div
                    class="note-signature"
                    id="noteSignature">

                    — from someone who thinks about you

                </div>

                <button
                    class="open-btn"
                    onclick="openNewNote()">

                    Open a note ♡

                </button>

            </div>

        </div>


        <!-- PROGRESS -->

        <div class="progress">

            <div
                class="progress-text"
                id="progressText">

                0 / 1000 notes discovered

            </div>

            <div class="progress-bar">

                <div
                    class="progress-fill"
                    id="progressFill">
                </div>

            </div>

        </div>


        <!-- COMPLETE -->

        <div
            class="complete"
            id="complete">

            <div class="big">
                💌
            </div>

            <h2>
                You found them all.
            </h2>

            <p>
                1,000 little notes,
                and somehow there are still
                more things left to say. ♡
            </p>

        </div>


        <button
            class="reset"
            onclick="resetNotes()">

            Reset discovered notes

        </button>

    </main>


    <!-- =========================
         FOOTER
    ========================== -->

    <footer>

        <div class="heart">
            ♡
        </div>

        <p>
            A thousand little notes,<br>
            made for one Mei.
        </p>

    </footer>



    <script>


        /* ==================================================
           NOTE DATABASE
        ================================================== */

        const noteTemplates = {

            romantic: [

                "I don't need a special reason to think about you. You just somehow appear in my thoughts.",

                "If I could send you one thing right now, it would probably be a hug.",

                "Somehow, talking to you can make an ordinary day feel different.",

                "I really like having you in my life.",

                "You have a little place in my heart that nobody else gets to have.",

                "If you ever wonder whether someone is thinking about you, there's a pretty good chance I am.",

                "I hope you know how special you are to me.",

                "You make distance feel a little less distant.",

                "I don't know how you do it, but you make me smile without even trying.",

                "If I had to choose one person to talk to at the end of the day, I'd choose you.",

                "You are one of my favorite notifications.",

                "I like the idea of having more days with you in them.",

                "Some people become part of your routine. Somehow, you became part of mine.",

                "I hope one day all these little messages turn into memories we can laugh about together.",

                "You're worth waiting for.",

                "I don't think you realize how often you cross my mind.",

                "There are songs I hear now that somehow remind me of you.",

                "I like you. Just thought you should know that again.",

                "Even from far away, you can still make my day better.",

                "One day, I want to tell you all these things without needing a screen between us."

            ],


            sweet: [

                "I hope something unexpectedly nice happens to you today.",

                "Please remember to drink some water, little reminder from me.",

                "You deserve soft days and easy mornings.",

                "I hope you smiled today. If not, consider this your tiny reason to smile.",

                "You are doing better than you think.",

                "Take your time. You don't have to rush everything.",

                "I hope today treats you gently.",

                "Just a reminder that you're doing great.",

                "You make the world a little nicer just by being yourself.",

                "Don't forget that you are allowed to rest.",

                "I hope you find something today that makes you genuinely happy.",

                "You deserve good things, even on ordinary days.",

                "Take a deep breath. You're okay.",

                "I hope your day has at least one really good moment.",

                "You're allowed to be proud of yourself.",

                "Here's your random reminder that you're cute.",

                "Please be kind to yourself today.",

                "You don't need to be perfect to be wonderful.",

                "I hope you sleep peacefully tonight.",

                "Whatever happens today, you've got this."

            ],


            comfort: [

                "It's okay if today isn't your best day.",

                "You don't have to pretend that everything is okay.",

                "If today feels heavy, take it one little step at a time.",

                "You are allowed to have bad days.",

                "Rest isn't something you need to earn.",

                "You don't have to figure everything out today.",

                "Take a breath. Tomorrow is another chance.",

                "Whatever you're feeling right now, you don't have to face it alone.",

                "It's okay to slow down.",

                "I wish I could give you a hug right now.",

                "You are stronger than you give yourself credit for.",

                "It's okay to not have the right words.",

                "Give yourself the same kindness you give everyone else.",

                "You can take a break without feeling guilty.",

                "One bad moment doesn't define your whole day.",

                "You are still doing your best, and that's enough.",

                "If you need a quiet moment, take one.",

                "Everything doesn't have to be solved immediately.",

                "Be gentle with yourself today.",

                "I'm quietly cheering for you."

            ],


            funny: [

                "Breaking news: Mei is still cute. Experts remain confused.",

                "Reminder: being adorable is a full-time job. Please rest accordingly.",

                "I have conducted extensive research and concluded that Mei needs snacks.",

                "Scientists have discovered that smiling makes Mei even cuter. Further research is unnecessary.",

                "Today's mission: survive and look cute while doing it.",

                "You have been selected for one free virtual hug. No refunds.",

                "Emergency announcement: go drink some water.",

                "I checked. You're still my favorite human.",

                "If being cute was illegal, we'd both have problems.",

                "This note has no useful information. I just wanted to bother you.",

                "Congratulations. You opened another note instead of doing something productive.",

                "Your daily dose of nonsense has arrived.",

                "Please remain calm. You are currently being thought about.",

                "Official report: Mei is dangerously lovable.",

                "I would tell you a joke, but you're already talking to me.",

                "This is your sign to get a snack.",

                "Warning: excessive cuteness detected.",

                "I hope you're proud of yourself. If not, I am.",

                "Plot twist: you are actually the main character.",

                "No thoughts. Just Mei."

            ],


            motivation: [

                "You can do this. One step at a time.",

                "You don't need to be perfect. Just keep going.",

                "I believe you can handle whatever today throws at you.",

                "Progress is still progress, even when it's slow.",

                "You've already made it through difficult days before.",

                "Don't underestimate yourself.",

                "Keep going. Your future self will thank you.",

                "You are capable of more than you think.",

                "Start small. Small still counts.",

                "You don't have to finish everything today.",

                "Take a breath, then try again.",

                "Your effort matters even when nobody sees it.",

                "It's okay to make mistakes. Keep learning.",

                "You're closer than you think.",

                "Don't give up just because today feels difficult.",

                "I know you can do it.",

                "Keep moving at your own pace.",

                "You deserve to see what happens if you don't give up.",

                "Future Mei is going to be proud of you.",

                "You've got this. Seriously."

            ],


            miss: [

                "I wonder what you're doing right now.",

                "Sometimes I wish distance came with a skip button.",

                "I miss talking to you when the day gets quiet.",

                "There are moments when I really wish you were closer.",

                "If I could teleport anywhere right now, you already know where I'd go.",

                "I miss you a little extra today.",

                "Distance is annoying. You are not.",

                "I hope we get to turn this distance into a funny story someday.",

                "I wonder if you're looking at the same sky right now.",

                "One day, I won't have to miss you from this far away.",

                "Until then, here's a little reminder that you're on my mind.",

                "Sometimes I just want to hear your voice.",

                "I wish I could randomly show up and say hi.",

                "There are days when a message from you is all I need.",

                "I can't wait for the day distance isn't part of the conversation.",

                "If missing someone was a sport, we'd probably be professionals.",

                "I hope you know that even from far away, you're close to my thoughts.",

                "A little message from Jakarta to wherever Mei is right now.",

                "Wish you were a little closer today.",

                "Until we can meet, I'll keep sending little pieces of me through these notes."

            ]

        };


        /* ==================================================
           GENERATE 1000 UNIQUE NOTES
        ================================================== */

        const notes = [];

        let noteID = 0;


        Object.keys(noteTemplates).forEach(category => {

            noteTemplates[category].forEach(text => {

                for (let i = 1; i <= 10; i++) {

                    noteID++;

                    notes.push({

                        id: noteID,

                        category: category,

                        text: createVariation(text, i)

                    });

                }

            });

        });


        /*
         * 6 categories
         * 20 base messages
         * x 10 variations
         *
         * = 1,200 possible notes
         *
         * We only use the first 1,000.
         */

        const allNotes = notes.slice(0, 1000);


        /* ==================================================
           CREATE VARIATIONS
        ================================================== */

        function createVariation(text, number) {

            const endings = [

                " ♡",

                " ✨",

                " — just a little reminder.",

                " 💗",

                " 🌷",

                " 🫂",

                " — from me.",

                " ☀️",

                " 🌙",

                " ♡ okay?"

            ];

            return text + endings[number - 1];

        }


        /* ==================================================
           STATE
        ================================================== */

        const STORAGE_KEY =
            "mei_discovered_notes_v1";


        let discovered =
            JSON.parse(
                localStorage.getItem(STORAGE_KEY) || "[]"
            );


        let currentFilter = "all";


        /* ==================================================
           ELEMENTS
        ================================================== */

        const noteCard =
            document.getElementById("noteCard");

        const noteText =
            document.getElementById("noteText");

        const noteCategory =
            document.getElementById("noteCategory");

        const progressText =
            document.getElementById("progressText");

        const progressFill =
            document.getElementById("progressFill");

        const complete =
            document.getElementById("complete");


        /* ==================================================
           CATEGORY NAMES
        ================================================== */

        const categoryNames = {

            romantic: "A romantic little note 💗",

            sweet: "A sweet little note 🌷",

            comfort: "A note for when you need it 🫂",

            funny: "Something silly 😂",

            motivation: "A little push 💪",

            miss: "From far away 💭"

        };


        /* ==================================================
           SET FILTER
        ================================================== */

        function setFilter(filter, button) {

            currentFilter = filter;


            document
                .querySelectorAll(".filter-btn")
                .forEach(btn => {

                    btn.classList.remove("active");

                });


            button.classList.add("active");

        }


        /* ==================================================
           OPEN NOTE
        ================================================== */

        function openNewNote() {


            let available =
                allNotes.filter(note => {

                    const matchesFilter =
                        currentFilter === "all"
                        || note.category === currentFilter;

                    const notRead =
                        !discovered.includes(note.id);

                    return matchesFilter && notRead;

                });


            /*
             * If selected category has no unread notes,
             * tell the user instead of repeating.
             */

            if (available.length === 0) {

                noteCard.style.transform =
                    "scale(0.98)";

                setTimeout(() => {

                    noteText.innerHTML =
                        "You've discovered all the notes in this category ♡";

                    noteCategory.innerHTML =
                        "No more unread notes";

                    noteCard.style.transform =
                        "scale(1)";

                }, 150);

                return;

            }


            /* RANDOM */

            const randomIndex =
                Math.floor(
                    Math.random() * available.length
                );


            const note =
                available[randomIndex];


            /* SAVE */

            discovered.push(note.id);


            localStorage.setItem(
                STORAGE_KEY,
                JSON.stringify(discovered)
            );


            /* ANIMATION */

            noteCard.classList.remove("opening");

            void noteCard.offsetWidth;

            noteCard.classList.add("opening");


            /* CONTENT */

            noteCategory.textContent =
                categoryNames[note.category];

            noteText.textContent =
                note.text;


            document.getElementById("noteSignature")
                .textContent =
                "— from someone who thinks about you ♡";


            /* UPDATE */

            updateProgress();

        }


        /* ==================================================
           UPDATE PROGRESS
        ================================================== */

        function updateProgress() {

            const count =
                discovered.length;


            const percentage =
                Math.min(
                    (count / 1000) * 100,
                    100
                );


            progressText.textContent =
                count + " / 1000 notes discovered";


            progressFill.style.width =
                percentage + "%";


            if (count >= 1000) {

                complete.style.display =
                    "block";

            }

        }


        /* ==================================================
           RESET
        ================================================== */

        function resetNotes() {

            const confirmed =
                confirm(
                    "Reset all discovered notes?"
                );


            if (!confirmed) {
                return;
            }


            discovered = [];


            localStorage.removeItem(
                STORAGE_KEY
            );


            noteCategory.textContent =
                "A little note";

            noteText.textContent =
                "Tap the envelope to open a note ♡";


            progressText.textContent =
                "0 / 1000 notes discovered";


            progressFill.style.width =
                "0%";


            complete.style.display =
                "none";

        }


        /* ==================================================
           INITIALIZE
        ================================================== */

        updateProgress();

    </script>

</body>
</html>