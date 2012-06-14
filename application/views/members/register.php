<?php
$error = validation_errors();
if (!empty($error)): ?>
<div class="alert alert-error">
    <?php print $error; ?>
</div>
<?php endif; ?>
<?php print form_open(current_url(), array('class' => 'form-horizontal well')); ?>
<div class="control-group">
    <label class="control-label" for="email">Email</label>
    <div class="controls">
        <input type="text" id="email" name="email" value="<?php print set_value('email', $member->email); ?>" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="password">Password</label>
    <div class="controls">
        <input type="password" id="password" name="password" value="" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="retype_password">Retype password</label>
    <div class="controls">
        <input type="password" id="retype_password" name="retype_password" value="" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="firstname">First name</label>
    <div class="controls">
        <input type="text" id="firstname" name="firstname" value="<?php print set_value('firstname', $member->firstname); ?>" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="lastname">Last name</label>
    <div class="controls">
        <input type="text" id="lastname" name="lastname" value="<?php print set_value('lastname', $member->lastname); ?>" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="gender">Gender</label>
    <div class="controls">
        <label>
        <input type="radio" id="gender_male" name="gender" value="male" <?php print $this->input->post('gender') == 'male' ? 'checked="checked"' : ''; ?> />
        Male
        </label>
        
        <label>
        <input type="radio" id="gender_female" name="gender" value="female" <?php print $this->input->post('gender') == 'female' ? 'checked="checked"' : ''; ?> />
        Female
        </label>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="address">
        Address
    </label>
    <div class="controls">
        <textarea class="span4" name="address" id="address" rows="10" cols="50"><?php print set_value('address', $this->input->post('address')); ?></textarea>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="province">
        Province
    </label>
    <div class="controls">
        <select  class="span2" id="province" name="province">
            <?php
            foreach ($provinces as $id => $province): ?>
            <option value="<?php print $id; ?>" <?php echo set_select('province', $id); ?>><?php print $province; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="zipcode">Zip code</label>
    <div class="controls">
        <input type="text" class="span1" id="zipcode" name="zipcode" value="<?php print set_value('zipcode', $this->input->post('zipcode')); ?>" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="phone_tel">Tel.</label>
    <div class="controls">
        <input type="text" id="phone_tel" name="phone_tel" value="<?php print set_value('phone_tel', $this->input->post('phone_tel')); ?>" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="phone_mobile">Mobile</label>
    <div class="controls">
        <input type="text" id="phone_mobile" name="phone_mobile" value="<?php print set_value('phone_mobile', $this->input->post('phone_mobile')); ?>" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="birthdate">Birthdate</label>
    <div class="controls">
        <input type="text" class="span1" id="birthdate_day" name="birthdate_day" value="<?php print set_value('birthdate_day', $this->input->post('birthdate_day')); ?>" />
        <select class="span2" id="birthdate_month" name="birthdate_month">
            <?php 
            $month = array(1 => 'January',
            'February', 'March', 'April', 'May', 'June', 'July',
            'August', 'September', 'October', 'November', 'December');
            for ($i = 1; $i <= 12; $i++): ?>
                <option value="<?php print $i; ?>" <?php echo set_select('birthdate_month', $this->input->post('birthdate_month')); ?>>
                    <?php print $month[$i]; ?>
                </option>
            <?php endfor; ?>
        </select>
        <input type="text" class="span1" id="birthdate_year" name="birthdate_year" value="<?php print set_value('birthdate_year', $this->input->post('birthdate_year')); ?>" />
        <p class="help-block">Example: 10 Jan 1990.</p>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="id_card">Citizen ID card no.</label>
    <div class="controls">
        <input type="text" id="id_card" name="id_card" value="<?php print set_value('id_card', $member->id_card); ?>" />
        <p class="help-block">Example: 1101100202519.</p>
    </div>
</div>

<div class="form-actions">
    <button type="submit" class="btn btn-primary">Register my account</button>
    <button class="btn" onclick="window.location.href='<?php print base_url(); ?>'; return false;">Cancel</button>
</div>
<?php form_close(); ?>
