<?php print form_open('reservations/reserve'); ?>
<div style="width: 350px;">
    <div>
        <table border="0" align="center">
            <tr>
                <td>First name</td>
                <td>
                    <input type="text" name="fname" required="required" />
                </td>
            </tr>
            <tr>
                <td>Last name</td>
                <td>
                    <input type="text" name="lname" required="required" />
                </td>
            </tr>
            <tr>
                <td>Curret address</td>
                <td>
                    <input type="text" name="current-address" required="required" />
                </td>
            </tr>
            <tr>
                <td>Email address</td>
                <td>
                    <input type="text" name="email-address" required="required" />
                </td>
            </tr>
            <tr>
                <td>Contact number</td>
                <td>
                    <input type="text" name="contact-number" required="required" />
                </td>
            </tr>
        </table>
    </div>
    <br />
    <hr/> 
    <div>
        <b>Accommodation Date:</b> <?php print $startDate ?> to <?php print $endDate ?>
    </div>
    <br />
    <hr />
    <div>
        <img style="float:left; margin-right: 10px; margin-bottom: 10px;" src="<?php print base_url(); ?>assets/uploads/photos/<?php print $photo; ?>" width="100" />
        <div style="float: left">
            <div>

            <?php
            print '<b>'.$name.'</b>';
            ?>
            
            <input type="hidden" name="name" value="<?php print $name; ?>" />
            <input type="hidden" name="price" value="<?php print $price; ?>" />
            <input type="hidden" name="photo" value="<?php print $photo; ?>" />
            <input type="hidden" name="description" value="<?php print $description; ?>" />
            <input type="hidden" name="startDate" value="<?php print $startDate; ?>" />
            <input type="hidden" name="endDate" value="<?php print $endDate; ?>" />
             <input type="hidden" name="motorbikeID" value="<?php print $motorbikeID; ?>" />

            </div>
            <br />
            <div>
                <b>Description</b><br />
            <?php
            print $description;
            ?>
            </div>
        </div>
        <br class="clear" />
        <hr />
    </div>

    <div align="center">
        <input type="submit" name="rent" class="btn btn-primary" value="Continue Reservation..." />
        
    </div>
</div>
<?php print form_close(); ?>