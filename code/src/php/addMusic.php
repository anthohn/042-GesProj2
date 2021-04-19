<?php
require "header.php";
if(isLogged() && (isAdmin())):
$types = $DB->getAllType(); ?>
 <div class="selectSection input">
    <select name="genre" id="genre">
        <option value="0">Genre</option>
        <?php foreach($types as $type) : ?>
            <option value="<?= $type["idType"]; ?>"><?= $type["typeName"]; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<?php else :
    header('Location: 404.php'); 

endif; 
?>
<?php require "footer.php";?>