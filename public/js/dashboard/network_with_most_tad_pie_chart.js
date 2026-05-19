$(document).ready(function (e) {

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

    $.ajax({
        url: $("input[name=route_api_dashboard_network_with_most_tad_pie_chart]").val(),
		type: "GET",
		success: function (response) {
            var options = {
                chart: {
                    height: 320,
                    type: 'pie',
                }, 
                series: response.data.series,
                labels: response.data.labels,
                colors: ["#34c38f", "#556ee6","#f46a6a", "#50a5f1", "#f1b44c"],
                legend: {
                    show: true,
                    position: 'bottom',
                    horizontalAlign: 'center',
                    verticalAlign: 'middle',
                    floating: false,
                    fontSize: '14px',
                    offsetX: 0,
                },
                responsive: [{
                    breakpoint: 600,
                    options: {
                        chart: {
                            height: 240
                        },
                        legend: {
                            show: false
                        },
                    }
                }]
              
            }
            
            var chart = new ApexCharts(
                document.querySelector("#network_with_most_tad_pie_chart"),
                options
            );
              
            chart.render();
        },
        error: function (xhr, status, error) {
			var err = eval("(" + xhr.responseText + ")");

			Swal.fire({
				html: '<strong>Oops!</strong> ' + err.meta.message
			});
		}
    });
});