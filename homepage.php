<?php
/*
Template Name: Home Page */
global $is_home;
$is_home = true;
get_header();
$articles = wpmu_latest_post_links("/articles/",2,5000);
$journalisms = wpmu_latest_post_links("/journalisms/",2,5000);
$mondays = wpmu_latest_post_links("/mondays/",3,10000);
$events = wpmu_latest_post_links("/",3,10000);
?>

<div id="main" role="main">

  <div class="content last home">

    <div class="col1 col-xs-12 col-sm-6 col-md-3">
      <h2><div class="thin_rule"><a href="<?php echo bloginfo('url')?>/about"><span>About</span></a><br><span class="caption">The space + people</span></div></h2>

      <h2><div class="thin_rule"><a href="<?php echo bloginfo('url')?>/contact"><span>Contact</span></a><br><span class="caption">How to get in touch</span></div></h2>

      <h2><div class="thin_rule"><a href="<?php echo bloginfo('url')?>/about/#lists"><span>Subscribe</span></a><br><span class="caption">Subscribe to our mailing lists</span></div></h2>

      <h2><div class="thin_rule"><a href="<?php echo bloginfo('url')?>/about/#directions"><span>Directions</span></a><br><span class="caption">How to get to 16 Beaver</span></div></h2>

      <h2><div class="thin_rule"><a href="<?php echo bloginfo('url')?>/events"><span>Events Calendar</span></a><br><span class="caption">Openings, actions, screenings</span></div></h2>

      <h2><div class="thin_rule"><a href="links.htm"><span>Counter Cartography Links</span></a><br><span class="caption">Spaces, artist groups, collectives, network</span></div></h2>
    </div>


    <div class="col col-xs-12 col-sm-6 col-md-3"><!-- dont touch -->

      <h2>Upcoming and Recent</h2>
      <?php
      foreach($mondays as $article) { ?>
      <h3><div class="thin_rule"><a href="<?= $article->post_url ?>"><?= $article->post_title?></a></div></h3>
      <? } ?>
      <div class="spacer"></div>

      <h2>Events</h2>
      <?php
      foreach($events as $article) { ?>
      <h3><div class="thin_rule"><a href="/events/<?= $article->post_name ?>"><?= $article->post_title?></a></div></h3>
      <? } ?>
      <div class="spacer"></div>

      <h2>Articles</h2>
      <?php
      foreach($articles as $article) { ?>
      <h3><div class="thin_rule"><a href="<?= $article->post_url?>"><?= $article->post_title?></a></div></h3>
      <? } ?>
      <div class="spacer"></div>

      <h2>Journalisms</h2>
      <?php
      foreach($journalisms as $article) { ?>
      <h3><div class="thin_rule"><a href="<?= $article->post_url?>"><?= $article->post_title?></a></div></h3>
      <? } ?>
      <div class="spacer"></div>
    </div>

    <div class="col col-xs-12 col-sm-6 col-md-3">
      <h2>Seminars</h2>
      <div class="thin_rule"><h3><a href="/common/">A Common(s) Course: Commoning the City & Withdrawing from the Community of Money</a><br><span class="subtitle">ongoing</span></h3></div>
      <h3><div class="thin_rule"><a href="/everything/">Welcome to the New Paradigm or Crisis of Everything Everywhere</a><br><span class="subtitle">Jan. 7-15, 2012</span></div></h3>
      <h3><div class="thin_rule"><a href="/silvia_george_david/">Beyond Good and Evil Commons</a><br><span class="subtitle">JAug. 18-20, 2011</span></div></h3>
      <h3><div class="thin_rule"><a href="/farocki/">Something Becomes Visible</a></div></h3>
      <h3><div class="thin_rule"><a href="/bifo/">Connective Mutations</a></div></h3>
      <h3><div class="thin_rule"><a href="/drift/">Continental Drift</a></div></h3>
      <div class="spacer"></div>

      <h2>Film/discussion programs</h2>
      <h3><div class="thin_rule"><a href="/anotherworld/">US Social Forum</a></div></h3>
      <h3><div class="thin_rule"><a href="signsofchange.htm">Signs of Change</a></div></h3>
      <h3><div class="thin_rule"><a href="/occupation/">How occupation works</a></div></h3>
      <div class="spacer"></div>

      <h2>Projects</h2>
      <h3><div class="thin_rule"><span class="date">seoul & gwangju</span><br><a href="/korea/">Between us</a></div></h3>
      <h3><div class="thin_rule"><span class="date">london</span><br><a href="london">C of the Willing</a></div></h3>
      <h3><div class="thin_rule"><span class="date">baltimore</span><br><a href="/baltimore/patriot.htm">Patriot</a><br><a href="/baltimore/countercampus.htm">counter-campus</a></div></h3>
    </div>

    <div class="col col-xs-12 col-sm-6 col-md-3">
      <h3><div class="thin_rule"><span class="date">sydney</span><br><a href="http://www.theregoestheneighbourhood.org">There Goes the Neighborhood</a></div></h3>
      <h3><div class="thin_rule"><span class="date">denmark</span><br><a href="/denmark/">Divided States</a></div></h3>
      <h3><div class="thin_rule"><span class="date">mit</span><br><a href="/MIT/">Teach-In</a></div></h3>
      <h3><div class="thin_rule"><span class="date">singapore</span><br><a href="/singapore/">Home Fronts</a></div></h3>
      <h3><div class="thin_rule"><span class="date">mass mOca</span><br><a href="/massmoca/">The Interventionists</a></div></h3>

      <h3><div class="thin_rule"><span class="date">sydney</span><br><a href="/vilnus/">24/7</a></div></h3>
      <h3><div class="thin_rule"><span class="date">weimar/leipzig</span><br><a href="/w-l/">Get rid of yourself</a></div></h3>
      <h3><div class="thin_rule"><span class="date">vienna</span><br><a href="/intorno/">intorno</a></div></h3>

      <div class="spacer"></div>

      <h3><div class="thin_rule"><a href="/radioactive/">radioactive</a></div></h3>
      <h3><div class="thin_rule"><a href="/hownow/">operation how</a></div></h3>
      <h3><div class="thin_rule"><a href="lunchtimesummit.htm">lunchtime summit</a></div></h3>
    </div>

  </div>

</div>
<?php get_footer(); ?>
