<div class="wrap">
    <h2>Settings</h2>
    <form method="post" action="options.php">
        <?php settings_fields('vipdrv-settings-group'); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Site Id</th>
                <td>
                    <input type="text" name="vipdrv-site-id" value="<?php echo get_option('vipdrv-site-id'); ?>"/>
                    <p class="description" id="admin-email-description">Login to the <a href="https://admin.testdrive.pw" target="_blank">Customer Portal</a> go to "Sites" and get the "SiteId" of your Website</p>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Show widget on VLP</th>
                <td>
                    <input type="checkbox" name="inject-widget-to-vlp"
                           value="1" <?php checked(1, get_option('inject-widget-to-vlp', true), true); ?> />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Show widget on VDP</th>
                <td>
                    <input type="checkbox" name="inject-widget-to-vdp"
                           value="1" <?php checked(1, get_option('inject-widget-to-vdp', true), true); ?> />
                </td>
            </tr>
        </table>
        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>"/>
        </p>
    </form>
</div>
