<?php
  if (time() < strtotime(get_field('end_datetime'))) {

    $count = 0;
    if(have_rows('participant_list')){
      $count = count(get_field('participant_list') );
    }
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
        $post_title = get_the_title();
        $unique_ID = uniqid();
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
          $category = $categories[0]->name;
        }

        $req_fields = array(
          'first_name' => array('First Name','text','Required'),
          'last_name' => array('Last Name','text','Required'),
          'email' => array('Email','email','Required'),
          'phone_number' => array('Phone Number','tel','Required'),
          'resume' => array('Resumé','file', get_field('resume')),
          'motivation' => array('Motivation','file', get_field('motivation')),
          'portfolio' => array('Portfolio','file', get_field('portfolio')),
        );
      ?>

      <?php foreach ($req_fields as $field => $value) {
        if ($value[2] != 'No') {?>
          <label for="<?=$value[0]?>"><?=$value[0]?> <?php if($value[2] == 'Required'){echo '*';} ?></label>
          <?php if($value[2] != 'Required'){?><p><?=$value[0]?> is an optional field</p><?php } ?>
          <input name="<?=$field?>" type="<?=$value[1]?>" <?php if($value[2] == 'Required'){echo 'required';} ?>></input>
        <?php }
      } ?>

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
      <div class="event-signup__message event-signup__message--success">
        You don't have to sign up for this event, see you there!
      </div>
    <?php endif;
  } else {
    ?>
      <div class="event-signup__message event-signup__message--failed">
        This event has already passed, we hope to see you another time.
      </div>
    <?php
  }
?>
