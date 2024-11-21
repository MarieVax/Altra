<?php
if ($anchor = get_sub_field('anchor')) :
  $id = sanitize_title($anchor);
endif;

echo '<div class="text-center altra--section2 altra-section altra--section-' . $id . '" id="' . $id . '">';
echo '<div class="altra--section-background"></div>';

echo '<div id="altra--section-' . $id . '">';

//Heading
if ($heading = get_sub_field('heading')) :
  $headerTag = (get_sub_field('heading_tag')) ? get_sub_field('heading_tag') : 'h2';
  printf('<%s class="altra--heading heading-h2"><div class="heading-h2-before"></div>%s<div class="heading-h2-after"></div></%s>', $headerTag, $heading, $headerTag);
endif;

//Sub-heading
if ($subheading = get_sub_field('subheading')) :
  printf('<div class="altra--subheading subheading">%s</div>', $subheading);
endif;

if (have_rows('approches')) :
  echo '<div class="altra--approches">';
  $count = 0;
  while (have_rows('approches')) : the_row();
    if ($approche = get_sub_field('approche')) :
      if ($nb = get_sub_field('number')) :
        echo '<div class="altra--approches-item altra--approches-item_' . $count . '">';

        printf('<div class="altra--approches-item-nb">%s<img src="' . get_stylesheet_directory_uri() . '/assets/img/point.svg" class= "altra--approches-item-nb-after" alt=""></div><div class="altra--approches-item-text">%s</div>', $nb, $approche);
        echo '</div>';
      endif;
    endif;
    $count++;
  endwhile;
endif;

//Heading
if ($heading2 = get_sub_field('heading_2')) :
  $headerTag2 = (get_sub_field('heading_tag_2')) ? get_sub_field('heading_tag_2') : 'h2';
  printf('<%s class="altra--heading2">%s</%s>', $headerTag2, $heading2, $headerTag2);
endif;

//Content
if ($content = get_sub_field('content')) :
  printf('<div class="altra--content">%s</div>', $content);
endif;


//Link
$link = get_sub_field('link');
if (isset($link) && !empty($link)) :

  $target = (isset($link['target']) && !empty($link['target'])) ? 'target="' . $link['target'] . '"' : '';
  $url = (isset($link['url']) && !empty($link['url'])) ? 'href="' . $link['url'] . '"' : '';
  $title = (isset($link['title']) && !empty($link['title'])) ? $link['title'] : '';

  printf('<a %s %s class="c-btn c-btn-altra c-btn-light">%s</a>', $url, $target, $title);

endif;
echo '</div>';
echo '</div>';
echo '</div>';
?>

<div id="numbers-block" class="numbers-block">
  <div class="overlay-block"></div>
  <div class="numbers-container">

    <div class="flex numbers">
      <div class="flex-1 text-center numbers-col numbers-col1">
        <div class="numbers-col-item numbers-col1-item1 ">
          <?php
          //Position Cabinet
          if ($cab_position = get_sub_field('cab_position')) :
            printf('<div class="numbers--cab_position numbers-col-item--heading">%s</div>', $cab_position);
          endif;
          //Position Cabinet text
          if ($cab_position_txt = get_sub_field('cab_position_text')) :
            printf('<div class="numbers--cab_position_txt numbers-col-item--text">%s</div>', $cab_position_txt);
          endif;
          //Position Cabinet Sous-text
          if ($cab_position_subtxt = get_sub_field('cab_position_subtext')) :
            printf('<div class="numbers--cab_position_subtxt numbers-col-item--subtext">%s</div>', $cab_position_subtxt);
          endif;
          ?>
        </div>
        <div class="relative numbers-col-item numbers-col1-item2">
          <img class="absolute z-10 img-dot" src="/wp-content/themes/altra/assets/img/animations/ellipse-background.svg" alt="">
          <img class="absolute z-20 img-dot img-dot-rotate1" src="/wp-content/themes/altra/assets/img/animations/dot-light-red-square.svg" alt="">
          <img class="absolute z-20 img-dot img-dot-rotate2" src="/wp-content/themes/altra/assets/img/animations/dot-red-square.svg" alt="">
          <img class="absolute z-30 img-dot" src="/wp-content/themes/altra/assets/img/animations/ellipse-foreground.svg" alt="">
          <?php
          //Nombre de clients
          if ($client_numbers = get_sub_field('client_numbers')) :
            printf('<div class="relative z-50 numbers--client_numbers numbers-col-item--heading">%s</div>', $client_numbers);
          endif;
          //Nombre de clients texte
          if ($client_numbers_txt = get_sub_field('client_text')) :
            printf('<div class="relative z-50 numbers--client_numbers_text numbers-col-item--text">%s</div>', $client_numbers_txt);
          endif;
          ?>
        </div>
        <div class="numbers-col-item numbers-col3-item2">
          <?php
          //Pourcentage de satisfaction
          if ($satisfaction_percentage = get_sub_field('satisfaction_percentage')) :
            printf('<div class="numbers--satisfaction_percentage numbers-col-item--heading">%s</div>', $satisfaction_percentage);
          endif;
          //Pourcentage de satisfaction texte
          if ($satisfaction_percentage_txt = get_sub_field('satisfaction_percentage_text')) :
            printf('<div class="numbers--satisfaction_percentage_text numbers-col-item--text">%s</div>', $satisfaction_percentage_txt);
          endif;
          ?>
        </div>
      </div>
      <div class="flex-1 text-center numbers-col numbers-col2">
        <div class="numbers-col-item numbers-col2-item1">
          <?php
          //Années d'expérience
          if ($years_experience = get_sub_field('years_experience')) :
            echo '<div class="numbers--years_experience numbers-col-item--heading">';
            printf('%s', $years_experience);
            echo '<span class="">ans</span>';
            echo '<div class="relative flex numbers--years_experience-img">
                <img src="/wp-content/themes/altra/assets/img/animations/Line-light-red.svg" alt="" class="numbers--years_experience-img1">
                <img src="/wp-content/themes/altra/assets/img/animations/Line-light-red.svg" alt="" class="numbers--years_experience-img1">
                <img src="/wp-content/themes/altra/assets/img/animations/arrow.svg" alt="" class="absolute numbers--years_experience-img2">
              </div>';
            echo '</div>';
          endif; ?>

          <?php
          //Années d'expérience text
          if ($years_experience_txt = get_sub_field('years_experience_text')) :
            printf('<div class="numbers--years_experience_text numbers-col-item--text">%s</div>', $years_experience_txt);
          endif;
          ?>
        </div>
        <div class="numbers-col-item numbers-col2-item2">
          <?php
          //Montant récupéré
          if ($money_retrieved = get_sub_field('money_retrieved')) :
            printf('<div class="numbers--money_retrieved numbers-col-item--heading"><div class="numbers--money_retrieved-100 numbers--money_retrieved Money">100</div><div class="numbers--money_retrieved-200 numbers--money_retrieved Money">200</div><div class="numbers--money_retrieved-300 numbers--money_retrieved Money">%s</div></div>', $money_retrieved);
          endif;
          //Montant récupéré texte

          if ($money_retrieved_txt = get_sub_field('money_retrieved_text')) :
            printf('<div class="numbers--money_retrieved_text numbers-col-item--text">%s</div>', $money_retrieved_txt);
          endif;
          ?>
        </div>
        <div class="numbers-col-item numbers-col3-item1 ">
          <?php
          //Nombres de collaborateurs
          if ($workers_number = get_sub_field('workers_number')) :
            printf('<div class="numbers--workers_number numbers-col-item--heading">%s</div>', $workers_number);
          endif;
          //Nombres de collaborateurs
          if ($workers_number_text = get_sub_field('workers_text')) :
            printf('<div class="numbers--workers_number_text numbers-col-item--text">%s</div>', $workers_number_text);
          endif;
          ?>
        </div>
      </div>
    </div>
  </div>
</div>