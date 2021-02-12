        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username:</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>"><br><br>
                <span class="help-block mt-2 mb-2" style="color: red;"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password:</label>
                <input type="password" name="password" autocomplete="on" class="form-control"><br><br>
                <span class="help-block mt-2 mb-2" style="color: red;"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" name="action" class="btn btn-secondary" value="Login">
            </div>
        </form>
