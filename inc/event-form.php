<?php
  $count = count( get_field('participant_list') );
  $max_invited_participants = get_field('max_invited_participants');
  $participant_limit = get_field('participant_limit');

  if($participant_limit):

  if($count >= $max_invited_participants){?>
    <div class="event-signup__message event-signup__message--failed">
      Unfortunately, this event is full. You'll be able to sign up, but you'll be put on the waiting list.
    </div>
  <?php
    }
  ?>

  <form action="#" class="event-signup">
    <?php
      $post_ID = get_the_ID();
      $unique_ID = uniqid();
    ?>

    <label for="first_name" class="">First Name</label>
    <input name="first_name" type="text" class="" required></input>

    <label for="last_name" class="">Last Name</label>
    <input name="last_name" type="text" class="" required></input>

    <label for="email" class="">Email address</label>
    <input name="email" type="email" class="" required></input>

    <label for="phone_number" class="">Phone Number</label>
    <input name="phone_number" type="tel" class="" required></input>

    <?php if (in_category(array('speeddates', 'case'))) {?>
      <label for="resume" class="">Resume</label>
      <input name="resume" type="file" class="" required></input>

      <label for="motivation" class="">Motivation</label>
      <input name="motivation" type="file" class="" required></input>

      <label for="portfolio" class="">Portfolio</label>
      <input name="portfolio" type="file" class=""></input>
    <?php }?>

    <input type="hidden" name="post_ID" value="<?=$post_ID?>">
    <input type="hidden" name="category" value="<?=$category?>">
    <input type="hidden" name="action" value="event_signup">

    <button type="submit" class="button" name="action" value="Submit">
      Submit
      <span class="button--loading">&#xf1ce;</span>
      <span class="button--success">&#xf00c;</span>
    </button>
  </form>

<?php
  else:?>
    <div class="event-signup__message event-signup__message--failed">
      You don't have to sign up for this event, see you there!
    </div>
  <?php endif;
?>
