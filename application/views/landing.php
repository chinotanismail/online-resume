<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chino Tan Ismail</title>
    <link rel="icon" href="<?php echo asset_url();?>img/favicon.png" sizes="16x16" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/style.css">
  </head>
  <body>
    <div class="body-container">
      <section id="landing">
        <div class="content">
          <div class="logo">
            <img src="<?php echo asset_url();?>img/LOGO.png" alt="logo">
          </div>
          <div class="title">
            <h2>CHINO TAN ISMAIL</h2>
            <h4>Résumé</h4>
          </div>
        </div>
      </section>
      <section id="keywords">
        <div class="content">
          <div class="beating">
            <div id="display-pic-border"></div>
            <div id="display-pic" style="background-image: url('<?php echo asset_url();?>img/display.png');"></div>
          </div>
          <div class="add-word">
            <input type="text" name="" value="" id="add-input">
            <a href="javascript:void(0)" id="add-button">Add Word</a>
          </div>
        </div>
        <?php
          foreach($words as $word){
            ?>
            <input type="hidden" name="words" value="<?php echo $word->word;?>">
        <?php
          }
        ?>
      </section>
      <section id="education">
        <h1>Education.</h1>
        <div class="content">
          <div class="school">
            <div class="logo">
              <img src="<?php echo asset_url()?>img/PUP.png" alt="">
            </div>
            <div class="details">
              <div class="name">
                <h3>Polytechnic University of the Philippines</h3>
              </div>
              <div class="degree">
                <h4>Bachelor of Science in Information Technology, Magna Cum Laude</h4>
              </div>
            </div>
            <div class="year">
              <h4>2012-2016</h4>
            </div>
          </div>
          <div class="school">
            <div class="logo">
              <img src="<?php echo asset_url()?>img/JMIS.png" alt="">
            </div>
            <div class="details">
              <div class="name">
                <h3>Jesu-Mariae <br class="mobile"/>International School</h3>
              </div>
              <div class="degree">
                <h4>Highschool</h4>
              </div>
            </div>
            <div class="year">
              <h4>2008-2012</h4>
            </div>
          </div>
        </div>
      </section>
      <section id="work">
        <h1>Work Experience.</h1>
        <div class="left" id="work-left">
          <i class="fa fa-angle-left"></i>
        </div>
        <div class="right" id="work-right">
          <i class="fa fa-angle-right"></i>
        </div>
        <div class="container">
          <div class="slider" id="work-slider">
            <div class="slide">
              <div class="slide-container">
                <h5>September 2019 - Present</h5>
                <h2>Wirecard Indonesia</h2>
                <h3>Software Engineer</h3>
              </div>
            </div>
            <div class="slide">
              <div class="slide-container">
                <h5>March 2018 - August 2019</h5>
                <h2>Redcomm Indonesia</h2>
                <h3>Full-stack Developer</h3>
              </div>
            </div>
            <div class="slide">
              <div class="slide-container">
                <h5>October 2017 - May 2018</h5>
                <h2>International Islamic <br class="mobile"/>College</h2>
                <h3>Part-time Lecturer</h3>
              </div>
            </div>
            <div class="slide">
              <div class="slide-container">
                <h5>November 2016 - February 2018</h5>
                <h2>Asia Select Indonesia</h2>
                <h3>Project Consultant</h3>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="projects">
        <h1>Freelance<span class="mobile"> Work</span>.</h1>
        <div class="left" id="projects-left">
          <i class="fa fa-angle-left"></i>
        </div>
        <div class="right" id="projects-right">
          <i class="fa fa-angle-right"></i>
        </div>
        <div class="container">
          <div class="slider" id="projects-slider">
            <div class="slide">
              <div class="slide-container">
                <h5>October 2019</h5>
                <h2>Starbucks CoC <br class="mobile"/>Campaign 2019</h2>
                <h3>Microsite Development</h3>
              </div>
            </div>
            <div class="slide">
              <div class="slide-container">
                <h5>December 2019</h5>
                <h2>Hanochem Tiaka <br class="mobile"/>Samudera</h2>
                <h3>Website Development</h3>
              </div>
            </div>
            <div class="slide">
              <div class="slide-container">
                <h5>April 2018 - September 2018</h5>
                <h2>PinterPolitik</h2>
                <h3>Audit Consultant</h3>
              </div>
            </div>
            <div class="slide">
              <div class="slide-container">
                <h5>November 2016 - March 2017</h5>
                <h2>ASI Talent Bank System</h2>
                <h3>System Development</h3>
              </div>
            </div>
            <div class="slide">
              <div class="slide-container">
                <h5>October 2016 - May 2017</h5>
                <h2>Pusaka Islam Online Storefront</h2>
                <h3>Application Implementation</h3>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="contact">
        <h1>Contact.</h1>
        <div class="content">
          <div class="inputs">
            <div class="input-form">
              <span class="input-title">name</span>
              <input type="text" id="visitor-name">
            </div>
            <div class="input-form">
              <span class="input-title">email</span>
              <input type="email" id="visitor-email">
            </div>
            <div class="input-form message">
              <span class="input-title">message</span>
              <textarea name="name" rows="8" cols="80" id="visitor-message"></textarea>
            </div>
            <div class="input-form cv">
              <span class="input-title">request full CV?</span>
              <input type="hidden" name="cv" value="N" id="visitor-cvrequest">
              <a href="javascript:void(0);" id="checkbox-cv">
                <i class="fa fa-check" id="check"></i>
              </a>
            </div>
            <div class="input-form send-button">
              <a href="javascript:void(0);" id="send">Send</a>
            </div>
          </div>
        </div>
      </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="<?php echo asset_url();?>js/script.js"></script>
  </body>
</html>
