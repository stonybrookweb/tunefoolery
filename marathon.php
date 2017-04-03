<style type="text/css">
    .marathon {
        border: 5px solid #1898c0;
        border-radius: 5px;
        width: 100%;
        min-height: 200px;
        height: auto;

    }

    .inner-marathon {
        width: 70%;
        float: left;
    }

    .marathon h2 {
        font-size: 140%;
    }

    .marathon p {
        font-size: 16px;
    }

    .marathon-horn{
        float: left;
    }

    .marathon-text {
        padding: 20px;
    }

    .marathon-button {
        float:right;
        width: 30%;
        max-width: 300px;
        min-width: 300px;
    }

    .marathon-photo {
        margin-top: 10px;
        height: 180px;
        float: left;
        border-radius: 5px;
    }

    .marathon-button button {
    height: 180px;
    margin-left: 10px;
    margin-right: 10px;
    margin-top: 10px;
    width: 140px;
    border-radius: 5px;
    color: white;
    font-size: 16px;
    border:4px #03bf19 solid;
    float: right;
    transition: opacity 2s;
    background: #009933; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#009933, #006633); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#009933, #006633); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#009933, #006633); /* For Firefox 3.6 to 15 */
    background: linear-gradient(#009933, #006633); /* Standard syntax */
    -webkit-box-shadow: 4px 4px 5px 0px rgba(0,0,0,0.75);
    -moz-box-shadow: 4px 4px 5px 0px rgba(0,0,0,0.75);
    box-shadow: 4px 4px 5px 0px rgba(0,0,0,0.75);
    }

    .marathon-button button:hover {
    opacity: 0.7;
    }

    .marathon-clear{
        clear: both;
    }

    #content{
        clear: both;
    }

@media only screen and (max-width:1100px){
    .inner-marathon {
        width: 60%;
        max-width: 600px;
    }
}


@media only screen and (max-width:1150px){
    .inner-marathon {
        max-width: 600px;
    }
}

@media only screen and (max-width: 1000px){
    .marathon {
        height: 250px;
    }
}

@media only screen and (max-width:850px){
    .marathon {
        width: 100%;
        height: 460px;
    }

    .inner-marathon {
        width: 100%;
    }

    .marathon-button {
        clear: both;
        float:none;
        margin: 0 auto;
        width: initial;
    }

   .marathon-photo {
        float: left;
    }

    .marathon-button button {
    float: left;
    }
}

@media only screen and (max-width:667px){
    .marathon {
        height: 620px;
    }
}





</style>
<div class ="marathon">
    <div class="inner-marathon">
    <img class="marathon-horn" src="<?php echo TEMPLATE_URL; ?>/images/horn_logo.jpeg" alt="Tunefoolery Horn Logo"/>
        <div class="marathon-text">
        <h2>Tunefoolery Runs the 2017 Boston Marathon</h2>
        <p>Tunefoolery is proud to announce that two Boston Marathon Runners are raising funds to support Tunefoolery! Please support these amazing runners as they raise important funds for Tunefoolery Music!</p>
        </div>
    </div>

    <div class="marathon-button">
        <img src="<?php echo TEMPLATE_URL; ?>/images/vic-lacy-optimized.jpg" class="marathon-photo" alt="Victor and Lacy Tunefoolery Marathon Runners"/>
        <a href="https://www.crowdrise.com/tunefoolery-music-lifts-those-who-play-and-those-who-hear/" target="_blank"><button>
        Donate to the Marathon Fundraiser Now!
        </button></a>
    </div>
</div>