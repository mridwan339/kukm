        <script type="text/javascript">
			var base_url='<?php echo base_url();?>';
        </script>
        <?php echo add_js($js); ?>
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
					  label[0].innerHTML="Nama Provinsi : "+labels+" <br> Total Peserta : "+JumlahPeserta+" Peserta";
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
