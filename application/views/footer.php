        <script type="text/javascript">
			var base_url='<?php echo base_url();?>';
        </script>
        <?php echo add_js($js); ?>
		<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDLGK6wNVyhXf-p0sPVshBCXrcHb6EXYQI"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.js"></script>
		<script>
		window.addEventListener("load", function(){
			setTimeout(function(){$(".fa-gear").parent().remove();},1000);
		});
		window.onload = function() {
		var ttl_input=function(){
			$('[name="ttl"]').val($('[name="ttl1"]').val()+", "+$('[name="ttl2"]').val());
		}
		ttl_input();
		$('[name="ttl1"],[name="ttl2"]').on('keyup',function(){
			ttl_input();
		});
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
		<script type="text/javascript" src="<?php echo base_url();?>/js/plugins/jqvmap/dist/jquery.vmap.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>/js/plugins/jqvmap/dist/maps/jquery.vmap.indonesia.js" charset="utf-8"></script>
		<script>
		  jQuery(document).ready(function () {
			var URLto;
			var URLto2nd;
			var loadTableProvInfo=function(){
			$("[data-total-wirausaha-by-name-region]").each(function(){
				URLto2nd=$("div[data-map-name='"+$(this).attr("data-total-wirausaha-by-name-region")+"']").attr("data-map-url");
				var labels=$(this).attr("data-total-wirausaha-by-name-region");
				//alert(labels+" "+URLto2nd);
				$.post( URLto2nd, { getJsonData: true },function(JumlahPeserta, status){
				  if(JumlahPeserta==""){ JumlahPeserta=0; }
					$("[data-total-wirausaha-by-name-region='"+labels+"']").html(JumlahPeserta+" Wirausaha");
				} );
			});
			}
			$(".provinsiKoleksi").attr('style','visibility:hidden;');
			$("<span id='msg_wait_prov_data'><b>Harap Menunggu beberapa detik, Sedang Mendapatkan Data ...</b></span>").insertBefore('.provinsiKoleksi');
			loadTableProvInfo();
			setTimeout(function(){
				$('#msg_wait_prov_data').remove();
				$(".provinsiKoleksi").attr('style','visibility:visible;');
			},10000);
			$(".provinsiKoleksi .pagination").on('click',function(){
				$(".provinsiKoleksi").attr('style','visibility:hidden;');
				$("<span id='msg_wait_prov_data'><b>Harap Menunggu beberapa detik, Sedang Mendapatkan Data ...</b></span>").insertBefore('.provinsiKoleksi');
				loadTableProvInfo();
				setTimeout(function(){
					$('#msg_wait_prov_data').remove();
					$(".provinsiKoleksi").attr('style','visibility:visible;');
				},10000);
				
			});
			jQuery('#vmap').vectorMap({
			  map: 'indonesia_id',
			  enableZoom: true,
			  showTooltip: true,
			  selectedColor: null,
			  onLabelShow: function(event, label, code) {
				  URLto=$("div[data-map-name='"+label[0].innerHTML+"']").attr("data-map-url");
				  var labels=label[0].innerHTML;
				  $.post( URLto, { getJsonData: true },function(JumlahPeserta, status){
					  label[0].innerHTML="";
					  if(JumlahPeserta==""){ JumlahPeserta=0; }
					  label[0].innerHTML="Nama Provinsi : "+labels+" <br> Total Wirausaha : "+JumlahPeserta+" Wirausaha";
				  } );
			  },
			  onRegionClick: function(event, code, region){
				event.preventDefault();
				window.location=URLto;
			  }
			});
		  });
		</script>
    </body>
</html>
