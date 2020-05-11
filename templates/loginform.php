

<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <!--label for="user" >Ange E-postadress:</label--> 
        <input type="email" name="email" id="usremail" placeholder="EMAIL ADDRESS" class="field" value="<?php echo $email; ?>" required>*<?php echo $emailErr?><br>
        <input type="password" name="password" placeholder="PASSWORD" class="field" required>*<?php echo $pwErr?><br>
        <!--input type= "text" name="user">
        <label for="user" >Ange Lösenord:</label> 
        <input type= "text" name="user"-->
        <input type= "submit" name="logga in">
</form>

