<?php
if(!$_SESSION['login']){
    header("location: ../login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
<title>Siteplan System</title>
<link rel="stylesheet" type="text/css" href="../css/style_table.css" />
<!-- tooltip -->
 <link rel="stylesheet" type="text/css" href="../css/tooltip/tooltip-classic.css" />
  <!--button component-->
 		<link rel="stylesheet" type="text/css" href="../css/button_component/normalize.css" />
		<link rel="stylesheet" type="text/css" href="../css/button_component/demo.css" />
		<link rel="stylesheet" type="text/css" href="../css/button_component/component.css" />
		<link rel="stylesheet" type="text/css" href="../css/button_component/content.css" />
      <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
       <!-- lookup -->
       <link rel="stylesheet" type="text/css" href="../css/lookup/bootstrap-select.css">
     
        <!-- jQuery 2.0.2 -->
       <script src="../js/jquery.js"></script>
     
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
     
		<!-- select -->
		<script type="text/javascript" src="../js/lookup/bootstrap-select.js"></script>
    
        
       <script type="text/javascript">
       		function save_all_position(){
				<?php
				$q_save = select_table($building_id);
				while($r_save = mysql_fetch_array($q_save)){
				?>
				
				var element = document.getElementById('makeMeDraggable_<?php echo $r_save['table_id']?>');
				var position = element.getBoundingClientRect();
				var x = position.left;
				var y = position.top;
				
				 $.ajax({
					type: "GET",
					url: "table.php?page=save_table_location",
					data:{id:<?= $r_save['table_id']?>, data_x:x, data_y:y}
				}).done(function( result ) {
				   //alert("Simpan berhasil");
				});
				
				<?php
				}
				?>
				alert("Simpan berhasil");
			}
       </script>
    
		<script src="../js/button_component/modernizr.custom.js"></script>
<style>
body{
	background-color:#ecf0f5;
}
.border_meja_edit{
	background:url(../img/building/<?= $building_img ?>) no-repeat;
}
<?php

	$q3 = select_table($building_id);
	while($r3 = mysql_fetch_array($q3)){
	?>
	
	#makeMeDraggable_<?= $r3['table_id']?> { 
	position: absolute;
	width: 40px; height: 40px; 
	margin-left:
	<?php
	$data_x = ($r3['data_x']) ? $r3['data_x'] : 0;
	echo $data_x ?>px; 
	margin-top:
	<?php
	$data_y = ($r3['data_y']) ? $r3['data_y'] : 0;
	echo $data_y ?>px; 
	cursor: pointer; 
	
	}
	<?php
	
	}

	?>
	
</style>
 
<script type="text/javascript" src="../js/table/jquery.js"></script>
<script type="text/javascript" src="../js/table/jquery.min.js"></script>
 
<script type="text/javascript">
 
$( init );
 
function init() {
	<?php
	
	$q2 = select_table($building_id);
	while($r2 = mysql_fetch_array($q2)){
	?>
	  $('#makeMeDraggable_<?= $r2['table_id']?>').draggable( {
	    containment: '#content',
	    cursor: 'move',
	    snap: '',
	    stop: ''
	  } );

 	<?php
	
	}
	
	?>

  $( "#makeMeDraggable1" ).dblclick(function() {
  alert( "test" );



});
}

<?php
	
	$q4 = select_table($building_id);
	while($r4 = mysql_fetch_array($q4)){
	?>

function handleDragStop_<?= $r4['table_id']?>( event, ui) {
	
  	var offsetXPos = parseInt( ui.offset.left );
  	var offsetYPos = parseInt( ui.offset.top );
	
  //alert(<?= $r2['table_id']?>);
  //alert( "Drag stopped!\n\nOffset: (" + offsetXPos + ", " + offsetYPos + ")\n");
   $.ajax({
        type: "GET",
        url: "table.php?page=save_table_location",
        data:{id:<?= $r4['table_id']?>, data_x:offsetXPos, data_y:offsetYPos}
    }).done(function( result ) {
       //alert("Simpan berhasil");
    });
}

<?php
	}

	?>

</script>
 
</head>
<body margin-left="0" margin-top="0">



 <div class="header_fixed"> 
 
 <!--
 <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
						<button type="button">ADD ROOM</button>
						<div class="morph-content">
							<div>
								<div class="content-style-form content-style-form-2">
									<span class="icon icon-close">Close the dialog</span>
									<h2>ADD ROOM</h2>
									<form action="<?= $action_room?>" method="post" enctype="multipart/form-data" role="form">
										<p><label>Room Name</label><input type="text" name="i_room_name" required  /></p>
									
										<p>
										  <input type="submit" name="button" id="button" value="SAVE" class="button_building">
										</p>
									</form>
								</div>
							</div>
						</div>
					</div>
                    
               -->     
                    
                     <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
						<button class="blue_color_button" type="button">TAMBAH RUMAH</button>
						<div class="morph-content">
							<div>
								<div class="content-style-form content-style-form-2">
									<span class="icon icon-close">Close the dialog</span>
									
									<form action="<?= $action_table?>" method="post" enctype="multipart/form-data" role="form">
										<label>Nomor	</label><input type="text" name="i_name" required  class="popup_textfield" />
                                        <label>Harga	</label><input type="text" name="i_price" required  class="popup_textfield" />
										 
                                          <label>Tipe - Blok - Wilayah</label>
                                           <select id="basic" name="i_tt_id" size="1" class="selectpicker show-tick form-control" data-live-search="true"/>
                                           <?php
										   $query_tt = mysql_query("select a.*, c.tb_name, d.building_name 
																from table_types a 
																join table_blocks c on c.tb_id = a.tb_id
																join buildings d on d.building_id = c.building_id
																where d.building_id = $building_id
																order by tt_id");
                                           while($r_tt = mysql_fetch_array($query_tt)){
										   ?>
                                             <option value="<?= $r_tt['tt_id'] ?>"><?= $r_tt['tt_name']." - ".$r_tt['tb_name']." - ".$r_tt['building_name'] ?></option>
                                             <?php
										   }
											 ?>
                                           </select>                                    
                                  		
										<p>
										  <input type="submit" name="button" id="button" value="SAVE" class="button_building">
										</p>
									</form>
								</div>
							</div>
						</div>
					</div>

					<div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
						<button class="blue_color_button" type="button"  onClick="javascript: window.location.href = 'home.php'; ">BACK TO MENU</button>
						
					</div><!-- morph-button -->


					<div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
						<button class="red_color_button" type="button"  onClick="save_all_position(); ">SAVE</button>
						
					</div><!-- morph-button -->

 </div>
 
 <div class="border_meja_edit">
  <img src="../img/building/<?= $building_img ?>" style="visibility:hidden;" />
 </div>
 
 
<div id="content_new">
	
	<?php
	$no = 1;
	$query =  select_table($building_id);
	while($row = mysql_fetch_array($query)){
		
		switch($row['table_status']){
			case 0: $class_meja = "class='meja2'"; break;
			case 1: $class_meja = "class='meja3'"; break;
			
		}
		
	?>
  <span class="tooltip tooltip-effect-1">
	<div id="makeMeDraggable_<?= $row['table_id']?>" class="meja1" style="background-color:<?= $row['tt_color']?>">
	 
				
			<div class="meja_title">
			  <?php
                if($row['table_status'] == 1){
				?>
				<div class="meja_status"></div>
                <?php
				}
				?>
			<?= $row['tb_name'].$row['table_name']?></div>
				<span class="tooltip-content clearfix">
					
						<?php 
						
							include('table_item.php');	
						
						?>
					
				</span>
			   
	 </div>
      </span>
  
	<?php
	$no++;
	}
	?>
  
</div>


 <div class="footer_fixed"> 
			<div class="morph-button morph-button-sidebar morph-button-fixed">
			<button type="button" class="green_color_button"><?= $building_name?></button>
			<div class="morph-content">
				<div>
					<div class="content-style-sidebar">
						<span class="icon icon-close">Close the overlay</span>
						<h2>Room</h2>
						<ul>
                       <?php
						$q_building5 = mysql_query("select * from buildings order by building_id");
						while($r_building5 = mysql_fetch_array($q_building5)){
							?>
							<li ><a style="text-decoration:none;" href="table.php?building_id=<?= $r_building5['building_id']?>"><?= $r_building5['building_name']?></a></li>
                            <?php
						}
							?>
                       
							
						</ul>
					</div>
				</div>
			</div>
		</div><!-- morph-button -->
        
        <?php
        include 'color_item.php';
		?>
        
        </div>
       
   

	<script src="../js/button_component/classie.js"></script>
		<script src="../js/button_component/uiMorphingButton_fixed.js"></script>
		<script>
			(function() {
				var docElem = window.document.documentElement, didScroll, scrollPosition;

				// trick to prevent scrolling when opening/closing button
				function noScrollFn() {
					window.scrollTo( scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0 );
				}

				function noScroll() {
					window.removeEventListener( 'scroll', scrollHandler );
					window.addEventListener( 'scroll', noScrollFn );
				}

				function scrollFn() {
					window.addEventListener( 'scroll', scrollHandler );
				}

				function canScroll() {
					window.removeEventListener( 'scroll', noScrollFn );
					scrollFn();
				}

				function scrollHandler() {
					if( !didScroll ) {
						didScroll = true;
						setTimeout( function() { scrollPage(); }, 60 );
					}
				};

				function scrollPage() {
					scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
					didScroll = false;
				};

				scrollFn();

				[].slice.call( document.querySelectorAll( '.morph-button' ) ).forEach( function( bttn ) {
					new UIMorphingButton( bttn, {
						closeEl : '.icon-close',
						onBeforeOpen : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterOpen : function() {
							// can scroll again
							canScroll();
						},
						onBeforeClose : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterClose : function() {
							// can scroll again
							canScroll();
						}
					} );
				} );

				// for demo purposes only
				[].slice.call( document.querySelectorAll( 'form button' ) ).forEach( function( bttn ) { 
					bttn.addEventListener( 'click', function( ev ) { ev.preventDefault(); } );
				} );
			})();
		</script>
    
		
</body>
</html>