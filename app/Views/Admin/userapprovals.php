<?php echo view('header'); ?>
				<style>
			.btnadd{
				background-color: #13bfa6 !important;
				color: #fff !important;
				display: block;
			    
			    padding: 9px 25px;
			    line-height: 1.573;
			    color: #fff;
			    border-radius: 4px;
			    font-weight: 500;
			}
		</style>
<?php echo view('appheader'); ?> 
<?php echo view('appsidebar'); ?>


<!--APP-CONTENT OPEN-->
				<div class="app-content main-content mt-0">
					<div class="side-app">
						<!-- CONTAINER -->
						<div class="main-container container-fluid">
							<!-- PAGE-HEADER -->
							<div class="page-header">
								<?php echo $_SESSION['message'];?>
								<div>
									<h1 class="page-title">Add Role
									</h1>

								</div>
								<div class="ms-auto pageheader-btn">


									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="http://vyz.bz/ridingsolo_admin/javascript:void(0);">Roles</a></li>
										<li class="breadcrumb-item active" aria-current="page">Add Role</li>
									</ol>
								</div>
							</div>
							<!-- PAGE-HEADER END -->

<div class="table-responsive">
	<div id="alert_message"></div>
	<table class="table table-striped">
		<thead class="thead-light" style="background-color:rgba(0, 150, 73, 0.9) !important;color:#fff;">
		<tr>
			<td>S.No</td>
			<td>Name</td>
			<td>Email</td>
			<td>user_mobile</td>
			<td>Created</td>
			<td>Source</td>			
			<td>User Status</td>
			<td>Action</td>
		</tr>
	</thead>
<?php 
if($result){
	$i=1;
foreach($result as $r){ //print_r($r);?>
		<tr>
			<td><?php echo $i++;?></td>
			<td><?php echo $r->user_fname;?></td>
			<td><?php echo $r->user_email;?></td>
			<td><?php echo $r->user_mobile;?></td>
			<td><?php echo $r->user_create;?></td>
			<td><?php echo 'Google';?></td>
			
			<td><?php echo $r->ustatus==1?'Approve':($r->utatus==NULL?'Pending':'Reject');?></td>
			<td id="action">
				<div id="ustatus_<?php echo $r->user_id;?>">
					<?php if($r->ustatus==Null){ ?>
					<div class="btn btn-sm btn-primary" onclick="Approverejectuser('1','<?php echo $r->user_id;?>');">Approve
					</div>
					<div class="btn btn-sm btn-danger" onclick="Approverejectuser('0','<?php echo $r->user_id;?>');">Reject
					</div>
				<?php }else if($r->ustatus==1){ ?>
					<div class="btn btn-sm btn-danger" onclick="Approverejectuser('0','<?php echo $r->user_id;?>');">Reject
					</div>
				<?php }else{ ?>
					<div class="btn btn-sm btn-primary" onclick="Approverejectuser('1','<?php echo $r->user_id;?>');">Approve
					</div>
				 <?php } ?>
				</div>
			</td>
		</tr>
		<?php } } ?>
	</table>

</div>



</div></div></div>
<script type="text/javascript">
	function Approverejectuser(ustatus,uid){
		
		ustatustext = ustatus==0?'Approve':'Reject';
		ustatuscls = ustatus==0?'btn-primary':'btn-danger';
		numustatus = ustatus?'0':'1';
		$.ajax({
		   method: "POST",            
		   url: "<?php echo base_url(); ?>/Approverejectuser",
		   data: {"user_id":uid,"ustatus":ustatus,"modified_by":"1"},
		   success: function(data) {        
		        console.log(data);
		        
		       var resultdata = $.parseJSON(data);
		        if(data){
		        if(resultdata.status == 200){
		        
		        $('#ustatus_'+uid).html('<div class="btn btn-sm '+ustatuscls+'" onclick="Approverejectuser('+numustatus+','+uid+');">'+ustatustext+'</div>');
		        $('#alert_message').html(resultdata.message);
		        }else{
		        	alert('not updated');
		        }
		        
		        }else{
		        alert('error');
		        }
		    }
   		});
	}
</script>
<?php echo view('footer_text');?>
			<?php echo view('footer');?>
