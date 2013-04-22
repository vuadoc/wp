<?php $this->load->view('admin/admin_header'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Nhà sách BookBook - Đăng nhập</title>
  </head>
  <body>
  	<div  class="clearfix">
    <div class="login_wrapper">
        <div id="Content_Wrapper">
            <div class="login_holder">
                <div class="Box_login">
                    <div class="Box_Head_login"></div>
                        <div class="Box_Content_login">
                            <div id="Shorts_key" class="sub_box">
                                <span class="heading">
    <h1>Đăng Nhập</h1>
    </span>
    <?php echo validation_errors(); ?>
    <?php echo form_open('/admin/login'); ?>
    <ul class="login_ul">
     <li>
   	 <span id="user_id" >
      <label for="username">Tên đăng nhập</label>
      <input type="text" size="20" id="username" name="username" 
      onfocus="if(this.value==this.defaultValue)this.value='';"
      onblur="if(this.value=='')this.value=this.defaultValue;" value = "Tên đăng nhập"/>
      <br/>
      </span>
      </li>
      
      <li>
      <span id="pass_id">
      <label for="password">Mật khẩu</label>
      <input type="password" size="20" id="passowrd" name="password" 
      onfocus="if(this.value==this.defaultValue)this.value='';"
      onblur="if(this.value=='')this.value=this.defaultValue;" value = "password"/>
      <br/>
      </span>
	  </li>
	  
      <input type="submit" value="Đăng Nhập"/>
     </ul>
    <?php echo form_close(); ?>
    <div id="bar_chat_wrapper" class="k-content">
                                    <div class="chart-wrapper">
                                        <div id="chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

        </div>
    </div>
</div>
  </body>
</html>
