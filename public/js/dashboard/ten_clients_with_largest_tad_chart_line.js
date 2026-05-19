$(document).ready(function (e) {
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

    $.ajax({
		url: $("input[name=route_api_dashboard_ten_clients_with_largest_tad_chart_line]").val(),
		type: "GET",
		success: function (response) {

			var clients = response.data.clients;
			var total_employees = response.data.total_employees;

			var options = {
				series: [{
					name: 'Total Employees',
					data: total_employees
				}],
				chart: {
					height: 565,
					type: 'bar',
				},
				plotOptions: {
					bar: {
						borderRadius: 10,
						columnWidth: '50%',
					}
				},
				dataLabels: {
					enabled: false
				},
				stroke: {
					width: 2
				},

				grid: {
					row: {
						colors: ['#fff', '#f2f2f2']
					}
				},
				xaxis: {
					labels: {
						rotate: -45
					},
					categories: clients,
					tickPlacement: 'on'
				},
				yaxis: {
					title: {
						text: 'Servings',
					},
				},
				fill: {
					type: 'gradient',
					gradient: {
						shade: 'light',
						type: "horizontal",
						shadeIntensity: 0.25,
						gradientToColors: undefined,
						inverseColors: true,
						opacityFrom: 0.85,
						opacityTo: 0.85,
						stops: [50, 0, 100]
					},
				}
			};

			var chart = new ApexCharts(
				document.querySelector("#ten_clients_with_largest_tad_chart_line"),
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