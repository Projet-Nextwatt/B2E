<div class="ace-settings-container" id="ace-settings-container">
    <!-- settings box goes here -->
    <p>Ace-setting...</p>
</div>

<div class="page-header">
    <h1>Ajouter une énergie</h1>
</div>

<div class="row">
    <?php echo validation_errors(); ?>

    <?php echo form_open('parametre/add_energie'); ?>

    <h5>Username</h5>
    <input type="text" name="username" value="" size="50" />

    <h5>Password</h5>
    <input type="text" name="password" value="" size="50" />

    <h5>Password Confirm</h5>
    <input type="text" name="passconf" value="" size="50" />

    <h5>Email Address</h5>
    <input type="text" name="email" value="" size="50" />

    <div><input type="submit" value="Submit" /></div>

</form>
</div>

    