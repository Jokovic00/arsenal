<?php
    include('partials/header.php');
?>
    <img src="https://upload.wikimedia.org/wikipedia/en/5/53/Arsenal_FC.svg" alt="Arsenal Logo" width="100">

  <!-- Forum Thread -->
  <section>
    <h2>Match Reactions: Arsenal vs Spurs</h2>

    <article>
      <h3>GunnerAlex</h3>
      <p>I can't believe that goal from Saka! We're looking strong this season. Thoughts?</p>
      <small>Posted on May 3, 2025</small>
    </article>
    <hr>

    <article>
      <h3>RedArmy87</h3>
      <p>The midfield was tight today, Odegaard controlled everything. COYG!</p>
      <small>Posted on May 3, 2025</small>
    </article>
    <hr>
  </section>

  <!-- Reply Form -->
  <section>
    <h2>Reply to Thread</h2>
    <form method="post" action="#">
      <label for="username">Name:</label><br>
      <input type="text" id="username" name="username" required><br><br>

      <label for="comment">Comment:</label><br>
      <textarea id="comment" name="comment" rows="5" cols="50" required></textarea><br><br>

      <input type="submit" value="Post Reply">
    </form>
  </section>

</body>
</html>
<?php
include("partials/footer.php")
?>