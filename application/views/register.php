<?php
$this->load->view('layouts/header');
$this->load->view('layouts/sidebar');

?>
<div id="mainBody">
    <div class="container">
        <div class="row">
            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                    <li class="active">Registration</li>
                </ul>
                <h3> Registration</h3>
                <?php if($this->session->flashdata('success')):?>
                <div class="alert alert-success">
                    <?=$this->session->flashdata('success')?>
                </div>
                <?php endif; ?>
                <div class="well">
                       <?php echo form_open('register/signUp',array('class'=>'form-horizontal','method'=>'POST'))?>
                        <h4>Your personal information</h4>
                        <div class="control-group">
                            <label class="control-label">User Name <sup>*</sup></label>
                            <div class="controls">
                                <?php echo form_input(array('name'=>'user_name','id'=>'user_name','placeholder'=>'User Name'))?>
                                <?php echo form_error('user_name','<div class="error">','</div>')?>
                            </div>

                        </div>
                        <div class="control-group">
                            <label class="control-label">First Name <sup>*</sup></label>
                            <div class="controls">
                                <?php echo form_input(array('name'=>'first_name','id'=>'first_name','placeholder'=>'First Name'))?>
                                <?php echo form_error('first_name','<div class="error">','</div>')?>

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Last name <sup>*</sup></label>
                            <div class="controls">
                                <?php echo form_input(array('name'=>'last_name','id'=>'last_name','placeholder'=>'Last Name'))?>
                                <?php echo form_error('last_name','<div class="error">','</div>')?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Email <sup>*</sup></label>
                            <div class="controls">
                                <?php echo form_input(array('name'=>'email','id'=>'email','placeholder'=>'Email','type'=>'email'))?>
                                <?php echo form_error('email','<div class="error">','</div>')?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Password <sup>*</sup></label>
                            <div class="controls">
                                <?php echo form_input(array('name'=>'password','id'=>'password','placeholder'=>'Password','type'=>'password'))?>
                                <?php echo form_error('password','<div class="error">','</div>')?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Mobile Phone <sup>*</sup></label>
                            <div class="controls">
                                <?php echo form_input(array('name'=>'mobile_no','id'=>'mobile_no','placeholder'=>'Mobile Phone','type'=>'tel'))?>
                                <?php echo form_error('mobile_no','<div class="error">','</div>')?>
                            </div>
                        </div>
                        <!--<div class="alert alert-block alert-error fade in">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                        </div> -->
                        <div class="control-group">
                            <div class="controls">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                <input class="btn btn-large btn-success" type="submit" value="Register" />
                            </div>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>
</div>
</div>
</div>
<?php $this->load->view('layouts/footer');
?>
