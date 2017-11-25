        <script type="text/javascript">
			var base_url='<?php echo base_url();?>';
        </script>
        <?php echo add_js($js); ?>
		<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDLGK6wNVyhXf-p0sPVshBCXrcHb6EXYQI"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.js"></script>
		<script>
		window.onload = function() {
		var exec_mapPesertaForm=function(){
			 if($('#tikor_latlon').val()==""){
				var lat=-6.463470;
				var lon=106.811957;
			 }else{
				var ll=String($('#tikor_latlon').val()).split(", ");
				var lat=ll[0];
				var lon=ll[1];
			 }
			 $('#mapPesertaForm').locationpicker({
				location: {
					latitude: lat,
					longitude: lon
				},
				radius: 100,
				inputBinding: {
					locationNameInput: $('#tikor_latlonMapPeserta')
				},
				enableAutocomplete: true,
				onchanged: function (currentLocation, radius, isMarkerDropped) {
					$("#tikor_latlon").val(currentLocation.latitude + ", " + currentLocation.longitude);
				}
			});
		}
		exec_mapPesertaForm();		
		var exec_karyawan_info=function(){
		  var karyawan=$("#total_karyawan").val();
		  var array_karyawan=karyawan.split(",");
		  var karyawan_count=0;
		  $("#koleksi_karyawan").html("");
		  $.each(array_karyawan,function(i,e){
			  if(karyawan!==""){
				karyawan_count++
				$("#koleksi_karyawan").append("<li>"+e+"</li>");
			  }else{
				  $("#koleksi_karyawan").append("<li>Tidak Ada Karyawan</li>");
			  }
		  });
		  $("#total_karyawan_length").html(karyawan_count);
		}
		exec_karyawan_info();
		$("#total_karyawan").on('keyup',function(){
			exec_karyawan_info();
		});
		}
		</script>
		<script type="text/javascript">
            $(function() {
                $(".content").slideDown();
                $(".error_lock_screen").fadeIn();
            });
        </script>
    </body>
</html>
