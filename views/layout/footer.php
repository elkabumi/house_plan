
        
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        
       
       <!--calendar -->
   
    

    </body>
</html>

       

 <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
				$("#example3").dataTable();
				$("#example4").dataTable();
 				$('#example_simple').dataTable({
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": false,
                    "bInfo": false,
                    "bAutoWidth": false
                });
				
				  $('#example_no_order_by').dataTable({            
                    "bSort": false
                });
				
				$('#example99').dataTable({
                   
                    "bFilter": false,
                   
                });
				/*
				$(function() {
				  $('#new_table').footable();
				});
				
				$('.footable').data('limit-navigation', 5);
				$('.footable').trigger('footable_initialized');
						
				$('#change-page-size').change(function (e) {
					//	e.preventcokelat();
						var pageSize = $(this).val();
						$('.footable').data('page-size', pageSize);
						$('.footable').trigger('footable_initialized');
				});
					*/
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();
				
				//iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });
				
				//Date range picker
                $('#reservation').daterangepicker();
				
				//date picker
				$('#date_picker1').datepicker({
					format: 'dd/mm/yyyy'
				});
				
				$('#date_picker2').datepicker({
					format: 'dd/mm/yyyy'
				});
				
				$('#date_picker3').datepicker({
					format: 'dd/mm/yyyy'
				});
                
                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
				
				
				
				
            });
			
			
$.fn.scrollView = function () {
    return this.each(function () {
      $('html, body').animate({
        scrollTop: $(this).offset().top
      }, 1000);
    });
  }


$('#scroll-link').click(function (event) {
  event.preventDefault();
  $('.header').scrollView();
});


$('#i_cari_checkout').change(function (event) {
  event.preventDefault();
  
   var keyword = document.getElementById("i_cari_checkout").value;
   window.find(keyword);
   
   /*
    $.ajax({
            url: 'transaction.php?page=get_menu&keyword='+keyword,
            type: 'POST',
			dataType: 'json',
            data: { keyword : keyword},
            success: function(data) {
				
				var menu_id = data.content['menu_id'];
                alert("test");
				console.log("success");
				
            }
        });
   //$('.header').scrollView();
  */
});

$('#button_search_checkout').change(function (event) {
  event.preventDefault();
  
   var keyword = document.getElementById("i_cari_checkout").value;
   window.find(keyword);
   
   
});
          
        </script>