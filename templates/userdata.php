                        <!--Registration form-->
                        <div class="form-content" id="new">
                            <form id="reg" method="POST">
                                <input type="text" name="login-id" id="user" placeholder="USERNAME" class="field" value="<?php echo $name; ?>" required>*<?php echo $nameErr;?><br>
                                <input type="text" name="Lastname" placeholder="LASTNAME" class="field" value="<?php echo $lastname; ?>" required>*<?php echo $lastnameErr;?><br>
                                <input type="email" name="email" id="usremail" placeholder="EMAIL ADDRESS" class="field" value="<?php echo $email; ?>" required>*<?php echo $emailErr?><br>
                                <input type="password" name="password" placeholder="PASSWORD" class="field" required>*<?php echo $pwErr?><br>
                                <input type="submit" value="Sign Up">
                                <div class="clear"></div>
                                <input type="checkbox" name="promo" id="promo-check" class="check" checked><label for="promo-check" class="check-label secondary-text promo">I'd like to receive special offers and discount coupons. No spam!</label>
                            </form>
                        </div>
