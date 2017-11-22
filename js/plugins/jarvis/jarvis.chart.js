/*
 * Author: Adian E Putra
 * Date: 11 Aug 2014
 * Description: load data from database for dashboard
 * 
 **/
function load_chart(){
	// RENTANG USIA
	var pathArray = window.location.pathname.split( '/' );
	$.get(base_url+"annual_report/chart_report/rentang_usia/"+pathArray[3]+"/"+pathArray[4], function (response) {
		var bar = new Morris.Bar({
			element: 'rentang_usia',
			resize: true,
			//gridTextSize:10,
			data: response,
			barColors: ['#00a65a'],
			xkey: 'y',
			ykeys: ['a'],
			labels: ['Rentang Usia'],
			hideHover: 'auto'
		});
	}, "json");
	
	$.get(base_url+"kategori/chart_report/rentang_usia/"+pathArray[3]+"/"+pathArray[4], function (response) {
		var bar = new Morris.Bar({
			element: 'kategori_rentang_usia',
			resize: true,
			//gridTextSize:10,
			data: response,
			barColors: ['#00a65a'],
			xkey: 'y',
			ykeys: ['a'],
			labels: ['Rentang Usia'],
			hideHover: 'auto'
		});
	}, "json");

	// PENDIDIKAN
	$.get(base_url+"annual_report/chart_report/pendidikan/"+pathArray[3]+"/"+pathArray[4], function (response) {
		var bar = new Morris.Bar({
			element: 'pendidikan',
			resize: true,
			data: response,
			barColors: ['#3c8dbc'],
			xkey: 'y',
			ykeys: ['a'],
			labels: ['Pendidikan'],
			hideHover: 'auto'
		});
	}, "json");
	$.get(base_url+"kategori/chart_report/pendidikan/"+pathArray[3]+"/"+pathArray[4], function (response) {
		var bar = new Morris.Bar({
			element: 'kategori_pendidikan',
			resize: true,
			data: response,
			barColors: ['#3c8dbc'],
			xkey: 'y',
			ykeys: ['a'],
			labels: ['Pendidikan'],
			hideHover: 'auto'
		});
	}, "json");
}
load_chart();
//setInterval('load_chart()', 60*60*1000);
