<?php $this->load->view('admin/admin_header');?>
<div id="Main_Wrapper" class="clearfix">
<?php $this->load->view('admin/admin_sidebar');?>
    <div id="Content_Wrapper">
    	<div class="Box">
        	<div class="Box_Head"></div>
                <div class="Box_Content">
                    <div id="Shorts_key" class="sub_box">
                        <h2>USER MANAGEMENT</h2>
                        <br clear="all">
                        <?php if(!empty ($result)):?>
                        	
                            <table>
                                <thead>
                                    <th>User id</th>
                                    <th>User name</th>
                                    <th>Email</th>
                                   
                                    <th>Edit</th>
                                    <th>Remove</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $key => $value):?>
                                        <tr id="tr_<?php echo $value->id;?>">
                                            <td><?php echo $value->id;?></td>        
                                            <td><?php echo $value->username;?></td>                                          
                                            <td ><?php echo $value->email;?></td>
                                            
                                            <td id="edit_<?php echo $value->id;?>"><a href="<?php echo site_url('admin/editUser/'.$value->id);?>" rel="facebox"><img src="<?php echo site_url('application/assets/images/admin/edit.png');?>"/></a></td>
                                            <td id="remove_<?php echo $value->id;?>"><a href="<?php echo site_url('admin/confirmDeleteUser/'.$value->id);?>" rel="facebox"><img src="<?php echo site_url('application/assets/images/admin/delete.png');?>"/></a></td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                                
                            </table>

                        <?php endif?>
                        <span id="message"></span>
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


<script type="text/javascript">
function editUser(actionid,userid)
{   
    val ='username='+username+'&password='+password;
    $.ajax({
	        url: baseUrl+"admin/login",
	        type: "POST",
	        data: val,
            dataType: 'json',
	        success: function(data){
               if(data==true)
               window.location.replace(baseUrl+"admin/index");
               else
                  $('#message').html('');
                  $('#message').html('invalid login');
            }
        })

}
function status(id)
{
    active = $('#active_'+id).html();
    val ='status='+active+'&id='+id;
    $.ajax({
	        url: baseUrl+"administrator/updateUserStatus",
	        type: "POST",
	        data: val,
            dataType: 'json',
	        success: function(data){
               if(data==true)
               {
                   if(active==1)
                    {
                        $('#status_'+id).html("<img src='<?php echo site_url('application/assets/images/admin/disable.png')?>'/>");
                        $('#active_'+id).html(0);
                    }
                    if(active==0){
                        $('#status_'+id).html("<img src='<?php echo site_url('application/assets/images/admin/enable.png')?>'/>");
                        $('#active_'+id).html(1);
                    }
               }
            }
        })
    
}
</script>
