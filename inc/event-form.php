<form action="#" class="event-signup">
  <?php $post_ID = get_the_ID(); ?>

  <label for="first_name" class="">First Name</label>
  <input name="first_name" class="" ></input>

  <label for="last_name" class="">Last Name</label>
  <input name="last_name" class="" ></input>

  <label for="email" class="">Email address</label>
  <input name="email" type="email" class="" ></input>

  <label for="phone_number" class="">Phone Number</label>
  <input name="phone_number" type="tel" class="" ></input>

  <label for="resume" class="">Resume</label>
  <input name="resume" type="file" class="" ></input>

  <label for="motivation" class="">Motivation</label>
  <input name="motivation" type="file" class="" ></input>

  <label for="portfolio" class="">Portfolio</label>
  <input name="portfolio" type="file" class="" ></input>

  <input type="hidden" name="post_ID" value="<?=$post_ID?>">
  <input type="hidden" name="action" value="event_signup">

  <input type="submit" name="action" value="Submit">
</form>
