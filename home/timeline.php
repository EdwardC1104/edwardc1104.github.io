<head>
    <style>
        * {
        box-sizing: border-box;!important!
        }
        /* The actual timeline (the vertical ruler) */
        .timeline {
        position: relative;
        max-width: 1200px;
        margin: 0 auto;
        overflow-x: hidden;
        overflow-y: hidden;
        }
        /* The actual timeline (the vertical ruler) */
        .timeline::after {
        content: '';
        position: absolute;
        width: 6px;
        background-color: white;
        top: 0;
        bottom: 0;
        left: 50%;
        margin-left: -3px;
        }
        /* Container around content */
        .tcontainer {
        padding: 10px 40px;
        position: relative;
        background-color: inherit;
        width: 50%;
        }
        /* The circles on the timeline */
        .tcontainer::after {
        content: '';
        position: absolute;
        width: 25px;
        height: 25px;
        right: -17px;
        background-color: white;
        border: 4px solid #c0dcf7;
        top: 15px;
        border-radius: 50%;
        z-index: 1;
        }
        /* Place the container to the left */
        .left {
        left: 0;
        }
        /* Place the container to the right */
        .right {
        left: 50%;
        }
        /* Add arrows to the left container (pointing right) */
        .left::before {
        content: " ";
        height: 0;
        position: absolute;
        top: 22px;
        width: 0;
        z-index: 1;
        right: 30px;
        border: medium solid white;
        border-width: 10px 0 10px 10px;
        border-color: transparent transparent transparent white;
        }
        /* Add arrows to the right container (pointing left) */
        .right::before {
        content: " ";
        height: 0;
        position: absolute;
        top: 22px;
        width: 0;
        z-index: 1;
        left: 30px;
        border: medium solid white;
        border-width: 10px 10px 10px 0;
        border-color: transparent white transparent transparent;
        }
        /* Fix the circle for containers on the right side */
        .right::after {
        left: -16px;
        }
        /* The actual content */
        .tcontent {
        padding: 20px 30px;
        background-color: white;
        position: relative;
        border-radius: 6px;
        }
        /* Media queries - Responsive timeline on screens less than 600px wide */
        @media screen and (max-width: 600px) {
        /* Place the timelime to the left */
        .timeline::after {
        left: 31px;
        }
        /* Full-width containers */
        .tcontainer {
        width: 100%;
        padding-left: 70px;
        padding-right: 25px;
        }
        /* Make sure that all arrows are pointing leftwards */
        .tcontainer::before {
        left: 60px;
        border: medium solid white;
        border-width: 10px 10px 10px 0;
        border-color: transparent white transparent transparent;
        }
        /* Make sure all circles are at the same spot */
        .left::after, .right::after {
        left: 15px;
        }
        /* Make all right containers behave like the left ones */
        .right {
        left: 0%;
        }
        }
    </style>
</head>
<div class="timeline">
    <div data-aos="zoom-out-up">
        <div class="tcontainer left">
            <div class="tcontent">
                <h2>2017</h2>
                <p>My coding journey first started in 2017, when I was introduced to some extremely basic python and html coding at school. This really excited me and I decided to continue learning at home. I taught myself HTML and CSS from online resources. I learnt all the basic skills needed to create a finished website.</p>
            </div>
        </div>
    </div>
    <div data-aos="zoom-out-up">
        <div class="tcontainer right">
            <div class="tcontent">
                <h2>2018</h2>
                <p>I branched out into PHP and created a database so I could have a comments section on my website. This required a lot of learning as I had to know the basics of two new languages - PHP and SQL. I was helped, during this process, by my computing teacher <a href="https://twitter.com/JHolmesICT" class="transition">James Holmes</a>.</p>
            </div>
        </div>
    </div>
    <div data-aos="zoom-out-up">
        <div class="tcontainer left">
            <div class="tcontent">
                <h2>2018</h2>
                <p>I made the large decision to totally redesign my website. I wanted to make it look more modern and be more up to date. This is what it looks like today. Most pages are hundreds of lines of code and everything has come a long way from where it started.</p>
            </div>
        </div>
    </div>
    <div data-aos="zoom-out-up">
        <div class="tcontainer right">
            <div class="tcontent">
                <h2>2019</h2>
                <p>I decided to learn bootstrap to make my website responsive, so it would look professional on all devices. I was putting a lot of effort into the smaller things that make a site look professional.</p>
            </div>
        </div>
    </div>
</div>