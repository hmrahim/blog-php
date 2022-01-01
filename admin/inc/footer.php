<?php

 $db= new Database();
  ?>
<div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
    <?php 
        $query = "SELECT * FROM  tbl_copyright ";
        $footerquery = $db->select($query);
        if ($footerquery) {
           while ($result = $footerquery->fetch_assoc()) {
               # code...
           
        
    ?>
        <p>
         &copy; Copyright <a href="#"><?php echo $result['copytext'] ?></a>. All Rights Reserved.
        </p>
    <?php }}?>
    </div>
</body>
</html>
