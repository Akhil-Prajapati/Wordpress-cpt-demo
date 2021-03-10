<?php $firstname = get_post_meta( get_the_ID(),'firstname',true); ?>
<?php $whatsapp_number = get_post_meta( get_the_ID(),'whatsapp_number',true); ?>
<?php $address = get_post_meta( get_the_ID(),'address',true); ?>
<?php $date = get_post_meta( get_the_ID(),'date',true); ?>
<?php $email = get_post_meta( get_the_ID(),'email',true); ?>
<?php $file = get_post_meta( get_the_ID(), 'file', true); ?>
<div>
    <div>
        <b>Restaurants Name :</b>
        <input class="inp" type="text" name="firstname" value="<?php echo $firstname ?>">
        <p><?php if($firstname) { echo $firstname; }  else{ echo 'Not Available'; } ?></p>
    </div>
    <div>
        <b>E-Mail :</b>
        <input class="inp" type="text" name="email" placeholder="xyz@mail.com" value="<?php echo $email ?>">
        <p><?php if($email) { echo $email; }  else{ echo 'Not Available'; } ?></p>
    </div>
    <div>
        <b>Restaurants Number :</b>
        <input class="inp" type="text" name="whatsapp_number" placeholder="+91" value="<?php echo $whatsapp_number ?>" >
        <p><?php if($whatsapp_number) { echo $whatsapp_number; }  else{ echo 'Not Available'; } ?></p>
    </div>
    <div>
        <b>Address :</b>
        <input class="box" type="text" name="address"value="<?php echo $address ?>" >
        <p><?php if($address) { echo $address; }  else{ echo 'Not Available'; } ?></p>
    </div>
    <div>
        <b>Date :</b>
        <input class="inp" type="date" name="date" value="<?php echo $date ?>" >
        <p><?php if($date) { echo $date; }  else{ echo 'Not Available'; } ?></p>
    </div>

    <div>
        <b>Image :</b>
        <div>
            <img id="image_upload_preview" src="http://placehold.it/180" width="250px" height="250px" class="inp" alt="your image" >
                <input type='file' name='file' id='file' value="<?php echo $file ?>"/>
            </img>
        </div>
        <img src="<?php echo $file ?>" width="250px" height="250px"></img>
    </div>
</div>
