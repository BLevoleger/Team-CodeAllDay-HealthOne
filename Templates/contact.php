<!DOCTYPE html>
    <html>
    <?php
    include_once('defaults/head.php');
    ?>
    <body>
        <div class="container-fluid main p-0">
            <?php
            include_once ('defaults/menu.php');
            ?>
            
    <div style="width: 70vw" class="container-fluid p-0">
        <h1>Opening Hours</h1>
        <h5 >Contact Nummer: 015-257-8924</h5>
        <table>
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Times</th>
                </tr>
            </thead>
            <?php $time = getAllTimes(); ?>
            <?php foreach($time as &$times): ?>
            <tbody>
                <tr>
                    <td><?= $times->name ?></td>
                    <td><?= $times->hour ?></td>
            <?php endforeach; ?>
                </tr>
            </tbody>
        </table>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2456.639007785454!2d4.330076816035862!3d51.995232982737576!2m3!1f0!2f0!3f
        0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5b44d61a108cf%3A0x9da6361d0a36ebd1!2sZuidhoornseweg%206A%2C%202625%20DV%20Den%20Hoorn!5e0!3m2!1sen!2snl!
        4v1634121943047!5m2!1sen!2snl" style="border:0; width:100%" ></iframe>
    </div>


        <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tbody:nth-child(even) {
  background-color: #dddddd;
}
</style>

            <?php
            include_once ('defaults/footer.php');
            ?>
            </div>
    </body>
</html>
