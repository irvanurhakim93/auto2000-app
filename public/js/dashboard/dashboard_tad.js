$(document).ready(function (e) {
    
// $('#div-bottom-table').hide();
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

   setTimeout(function(){
      location.reload(true);
   }, 1800000); // 5 seconds 

    $('#vertical-menu-btn').trigger('click');
    //Get Current Date
    var date = new Date();

    //Create Variable for first day of current month
    var firstDay = $('#start-date').val();

    //Create variable for last day of next month
    var lastDay = $('#end-date').val();
    var today = $('#today').val();

    $('input[name="daterange"]').daterangepicker({
        opens: 'left',
        minDate: firstDay,
        maxDate: lastDay,
        // "starDate": firstDay,
        // "endDate": today,
        locale: {
            format: 'YYYY-MM-DD'
        },
        autoApply: true,
        // linkedCalendars: false,
        drops: 'up'    
    }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });

    $('input[name="daterange"]').data('daterangepicker').setStartDate(firstDay);
    $('input[name="daterange"]').data('daterangepicker').setEndDate(today);

        function filterOption(date_range, mapping_network_area, client_data, upload_status, group_client) { 

        // Use arg1 and arg2 here 
        //alert('Hello')
            var url = "/t_dashboard_v2?date_range=" + date_range + "&mapping_network_area=" + mapping_network_area + "&client_data=" + client_data + "&upload_status=" + upload_status + "&group_client=" + group_client;
            return url;
        };    
        
        function filterOptionV2(date_range, mapping_network_area, client_data, upload_status, group_client) { 

        // Use arg1 and arg2 here 
        //alert('Hello')
            var url = "/v_dashboard_v1?date_range=" + date_range + "&mapping_network_area=" + mapping_network_area + "&client_data=" + client_data + "&upload_status=" + upload_status + "&group_client=" + group_client;
            return url;
        };    
     
     $('input[name="daterange"]').on('apply.daterangepicker', function(e, picker) {
        
        var DateRange = ($(e.currentTarget).val()) ? $(e.currentTarget).val() : 0;
        var MappingNetworkArea = ($('#mapping-network-area').find(':selected').val()) ? $('#mapping-network-area').find(':selected').val() : 0;
        var ClientData = ($('#client-data').find(':selected').val()) ? $('#client-data').find(':selected').val() : 0;
        var UploadStatus = ($('#upload-status').find(':selected').val()) ? $('#upload-status').find(':selected').val() : 0;
        var GroupClient = ($('#group-client').find(':selected').val()) ? $('#group-client').find(':selected').val() : 0;
         
        var fO = filterOption(DateRange, MappingNetworkArea, ClientData, UploadStatus, GroupClient);
        var fO2 = filterOptionV2(DateRange, MappingNetworkArea, ClientData, UploadStatus, GroupClient);

         $('#left-table').DataTable().ajax.url(fO).load();
         $('#middle-table').DataTable().ajax.url(fO).load();
         $('#right-table').DataTable().ajax.url(fO).load();
         $('#bottom-table').DataTable().ajax.url(fO2).load();
    
    });

    $('#mapping-network-area').on('change.select2', function (e) {
        
        var dateRange = ($('input[name="daterange"]').val()) ? $('input[name="daterange"]').val() : 0;
        var MappingNetworkArea = ($(e.currentTarget).val()) ? $(e.currentTarget).val() : 0;
        var ClientData = ($('#client-data').find(':selected').val()) ? $('#client-data').find(':selected').val() : 0;
        var UploadStatus = ($('#upload-status').find(':selected').val()) ? $('#upload-status').find(':selected').val() : 0;
        var GroupClient = ($('#group-client').find(':selected').val()) ? $('#group-client').find(':selected').val() : 0;
         
        var fO = filterOption(dateRange, MappingNetworkArea, ClientData, UploadStatus, GroupClient);
        var fO2 = filterOptionV2(dateRange, MappingNetworkArea, ClientData, UploadStatus, GroupClient);

        // alert(fO2);
         $('#left-table').DataTable().ajax.url(fO).load();
         $('#middle-table').DataTable().ajax.url(fO).load();
         $('#right-table').DataTable().ajax.url(fO).load();
         $('#bottom-table').DataTable().ajax.url(fO2).load();
    
    });
   
    $('#mapping-network-area').on('select2:unselecting', function (e) {
        
        var dateRange = ($('input[name="daterange"]').val()) ? $('input[name="daterange"]').val() : 0;
        var MappingNetworkArea = ($(e.currentTarget).val()) ? $(e.currentTarget).val() : 0;
        var ClientData = ($('#client-data').find(':selected').val()) ? $('#client-data').find(':selected').val() : 0;
        var UploadStatus = ($('#upload-status').find(':selected').val()) ? $('#upload-status').find(':selected').val() : 0;
        var GroupClient = ($('#group-client').find(':selected').val()) ? $('#group-client').find(':selected').val() : 0;
         
        var fO = filterOption(dateRange, MappingNetworkArea, ClientData, UploadStatus, GroupClient);
        var fO2 = filterOptionV2(dateRange, MappingNetworkArea, ClientData, UploadStatus, GroupClient);

        // alert(fO2);
         $('#left-table').DataTable().ajax.url(fO).load();
         $('#middle-table').DataTable().ajax.url(fO).load();
         $('#right-table').DataTable().ajax.url(fO).load();
         $('#bottom-table').DataTable().ajax.url(fO2).load();

    });


    $('#client-data').on('change.select2', function (e) {
        
        var dateRange = ($('input[name="daterange"]').val()) ? $('input[name="daterange"]').val() : 0;
        var MappingNetworkArea = ($('#mapping-network-area').find(':selected').val()) ? $('#mapping-network-area').find(':selected').val() : 0;
        var ClientData = ($(e.currentTarget).val()) ? $(e.currentTarget).val() : 0;
        var UploadStatus = ($('#upload-status').find(':selected').val()) ? $('#upload-status').find(':selected').val() : 0;
        var GroupClient = ($('#group-client').find(':selected').val()) ? $('#group-client').find(':selected').val() : 0;
         
        var fO = filterOption(dateRange, MappingNetworkArea, $(e.currentTarget).val(), UploadStatus, GroupClient);
        var fO2 = filterOptionV2(dateRange, MappingNetworkArea, $(e.currentTarget).val(), UploadStatus, GroupClient);

        // alert(fO);
         $('#left-table').DataTable().ajax.url(fO).load();
         $('#middle-table').DataTable().ajax.url(fO).load();
         $('#right-table').DataTable().ajax.url(fO).load();
         $('#bottom-table').DataTable().ajax.url(fO2).load();

    });

    $("#client-data").on("select2:unselecting", function(e) {
        
        var dateRange = ($('input[name="daterange"]').val()) ? $('input[name="daterange"]').val() : 0;
        var MappingNetworkArea = ($('#mapping-network-area').find(':selected').val()) ? $('#mapping-network-area').find(':selected').val() : 0;
        var ClientData = ($(e.currentTarget).val()) ? $(e.currentTarget).val() : 0;
        var UploadStatus = ($('#upload-status').find(':selected').val()) ? $('#upload-status').find(':selected').val() : 0;
        var GroupClient = ($('#group-client').find(':selected').val()) ? $('#group-client').find(':selected').val() : 0;
         
        var fO = filterOption(dateRange, MappingNetworkArea, ClientData, UploadStatus, GroupClient);
        var fO2 = filterOptionV2(dateRange, MappingNetworkArea, ClientData, UploadStatus, GroupClient);

        // alert(fO);
         $('#left-table').DataTable().ajax.url(fO).load();
         $('#middle-table').DataTable().ajax.url(fO).load();
         $('#right-table').DataTable().ajax.url(fO).load();
         $('#bottom-table').DataTable().ajax.url(fO2).load();

     });

    $('#upload-status').on('change.select2', function (e) {
        
        var dateRange = ($('input[name="daterange"]').val()) ? $('input[name="daterange"]').val() : 0;
        var MappingNetworkArea = ($('#mapping-network-area').find(':selected').val()) ? $('#mapping-network-area').find(':selected').val() : 0;
        var ClientData = ($('#client-data').find(':selected').val()) ? $('#client-data').find(':selected').val() : 0;
        var UploadStatus = ($(e.currentTarget).val()) ? $(e.currentTarget).val() : 0;
        var GroupClient = ($('#group-client').find(':selected').val()) ? $('#group-client').find(':selected').val() : 0;
         
        var fO = filterOption(dateRange, MappingNetworkArea, ClientData, $(e.currentTarget).val(), GroupClient);
        var fO2 = filterOptionV2(dateRange, MappingNetworkArea, ClientData, $(e.currentTarget).val(), GroupClient);

        // alert(fO);
         $('#left-table').DataTable().ajax.url(fO).load();
         $('#middle-table').DataTable().ajax.url(fO).load();
         $('#right-table').DataTable().ajax.url(fO).load();
         $('#bottom-table').DataTable().ajax.url(fO2).load();
    
    });
    
    $('#upload-status').on('select2:unselecting', function (e) {
        
        var dateRange = ($('input[name="daterange"]').val()) ? $('input[name="daterange"]').val() : 0;
        var MappingNetworkArea = ($('#mapping-network-area').find(':selected').val()) ? $('#mapping-network-area').find(':selected').val() : 0;
        var ClientData = ($('#client-data').find(':selected').val()) ? $('#client-data').find(':selected').val() : 0;
        var UploadStatus = ($(e.currentTarget).val()) ? $(e.currentTarget).val() : 0;
        var GroupClient = ($('#group-client').find(':selected').val()) ? $('#group-client').find(':selected').val() : 0;
         
        var fO = filterOption(dateRange, MappingNetworkArea, ClientData, $(e.currentTarget).val(), GroupClient);
        var fO2 = filterOptionV2(dateRange, MappingNetworkArea, ClientData, $(e.currentTarget).val(), GroupClient);

        // alert(fO);
         $('#left-table').DataTable().ajax.url(fO).load();
         $('#middle-table').DataTable().ajax.url(fO).load();
         $('#right-table').DataTable().ajax.url(fO).load();
         $('#bottom-table').DataTable().ajax.url(fO2).load();
    
    });

    $('#group-client').on('change.select2', function (e) {
        
        var dateRange = ($('input[name="daterange"]').val()) ? $('input[name="daterange"]').val() : 0;
        var MappingNetworkArea = ($('#mapping-network-area').find(':selected').val()) ? $('#mapping-network-area').find(':selected').val() : 0;
        var ClientData = ($('#client-data').find(':selected').val()) ? $('#client-data').find(':selected').val() : 0;
        var UploadStatus = ($('#upload-status').find(':selected').val()) ? $('#upload-status').find(':selected').val() : 0;
        var GroupClient = ($(e.currentTarget).val()) ? $(e.currentTarget).val() : 0;
         
        var fO = filterOption(dateRange, MappingNetworkArea, ClientData, UploadStatus, $(e.currentTarget).val());
        var fO2 = filterOptionV2(dateRange, MappingNetworkArea, ClientData, UploadStatus, $(e.currentTarget).val());

        // alert(fO);
         $('#left-table').DataTable().ajax.url(fO).load();
         $('#middle-table').DataTable().ajax.url(fO).load();
         $('#right-table').DataTable().ajax.url(fO).load();
         $('#bottom-table').DataTable().ajax.url(fO2).load();
    
    });
    
    $('#group-client').on('select2:unselecting', function (e) {
        
        var dateRange = ($('input[name="daterange"]').val()) ? $('input[name="daterange"]').val() : 0;
        var MappingNetworkArea = ($('#mapping-network-area').find(':selected').val()) ? $('#mapping-network-area').find(':selected').val() : 0;
        var ClientData = ($('#client-data').find(':selected').val()) ? $('#client-data').find(':selected').val() : 0;
        var UploadStatus = ($('#upload-status').find(':selected').val()) ? $('#upload-status').find(':selected').val() : 0;
        var GroupClient = ($(e.currentTarget).val()) ? $(e.currentTarget).val() : 0;
         
        var fO = filterOption(dateRange, MappingNetworkArea, ClientData, UploadStatus, $(e.currentTarget).val());
        var fO2 = filterOptionV2(dateRange, MappingNetworkArea, ClientData, UploadStatus, $(e.currentTarget).val());

        // alert(fO);
         $('#left-table').DataTable().ajax.url(fO).load();
         $('#middle-table').DataTable().ajax.url(fO).load();
         $('#right-table').DataTable().ajax.url(fO).load();
         $('#bottom-table').DataTable().ajax.url(fO2).load();
    
    });


    $('#mapping-network-area').select2({
      placeholder: 'Area',
      width: '100%',
      minimumResultsForSearch: Infinity,
      allowClear: true,
      // tags: true,
      minimumInputLength: 2,
      ajax: {
        url: '/mapping_network_area',
        dataType: 'json',
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public'
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        },        
        processResults: function (data) {
            return {
                results: $.map(data.data, function (item) {
                    return {
                        text: item.area,
                        id: item.area
                    }
                })
            };
        }
      }
    });
    
    $('#client-data').select2({
      placeholder: 'Client Company',
      width: '100%',
      // minimumResultsForSearch: Infinity,
      // dropdownParent: $("#client-data"),
      // tags: true,
      minimumInputLength: 2,
      allowClear: true,
      ajax: {
        url: '/client_data',
        dataType: 'json',
        data: function (params) {
          var query = {
            search: params.term,
            type: 'public'
          }

          // Query parameters will be ?search=[term]&type=public
          return query;
        },        
        processResults: function (data) {
            return {
                results: $.map(data.data, function (item) {
                    return {
                        text: item.nama,
                        id: item.nama
                    }
                })
            };
        },
        cache: true
      }
    });


    // $.ajax({
    //   url: "/client_data",
    //   type: 'GET',
    //   contentType: 'application/json; charset=utf-8'
    // }).then(function (response) {
    //   $("#client-data").select2({
    //     placeholder: "Client Company",
    //     minimumInputLength: 3,
    //     data: response,
    //     width: '100%'    
    //   });  
    // });



	$('#upload-status').select2({
	  placeholder: 'Status upload',
	  width: '100%',
      allowClear: true,
      minimumResultsForSearch: Infinity,
	  ajax: {
	    url: '/filter_option?key=upload_status',
		processResults: function (data) {
            return {
                results: $.map(data.data, function (item) {
                    return {
                        text: item.toUpperCase(),
                        id: item
                    }
                })
            };
        }
	  }
	});

	$('#group-client').select2({
	  placeholder: 'Group Client',
	  width: '100%',
      minimumResultsForSearch: Infinity,
      allowClear: true,
	  ajax: {
	    url: '/filter_option?key=group_client',
		processResults: function (data) {
            return {
                results: $.map(data.data, function (item) {
                    return {
                        text: item.toUpperCase(),
                        id: item
                    }
                })
            };
        }
	  }
	});



    $("#left-table").DataTable({
        "bFilter": false,
        "bLengthChange": false,
        "scrollX": true,
        "bPaginate": false,
        "info": false,
        "order": [[3, 'desc']],
        "bProcessing":true,
        ajax: {
         "url": "/t_dashboard_v2",
         // dataSrc: e.data,
         "type": "get",
         "data" : {},         
        // dataFilter: function (res) {
         //    // debugger;
         // },
         "error":function(x, y){
            console.log(x);
            // debugger;
         }             
        },
        // processing: true,
        // serverSide: true,
        // ajax: $("input[name=route_api_datatable_ten_job_positions_with_greatest_need]").val(),
        columns: [
            { data: "area" },
            { data: null, "render": function(data,type,row) { return data["delivery_status"]} },
            { data: null, "render": function(data,type,row) { return data["onhand"]} },
            { data: null, "render": function(data,type,row) { return (data["delivery_status"] + data["onhand"])} }
        ],
    });
    
    $("#middle-table").DataTable({
        "bFilter": false,
        "bLengthChange": false,
        "scrollX": true,
        "bPaginate": false,
        "info": false,
        "order": [[3, 'desc']],
        "bProcessing":true,
        ajax: {
         "url": "/t_dashboard_v2",
         // dataSrc: e.data,
         "type": "get",
         "data" : {},         
        // dataFilter: function (res) {
         //    // debugger;
         // },
         "error":function(x, y){
            console.log(x);
            // debugger;
         }             
        },
        // processing: true,
        // serverSide: true,
        // ajax: $("input[name=route_api_datatable_ten_job_positions_with_greatest_need]").val(),
        columns: [
            { data: "area" },
            { data: null, "render": function(data,type,row) { return data["atom"]} },
            { data: null, "render": function(data,type,row) { return data["upload"]} },
            { data: null, "render": function(data,type,row) { return (data["atom"] + data["upload"])} }
        ],
    });
    
    $("#right-table").DataTable({
        "bFilter": false,
        "bLengthChange": false,
        "scrollX": true,
        "bPaginate": false,
        "info": false,
        "order": [[2, 'desc']],
        "bProcessing":true,
        ajax: {
         "url": "/t_dashboard_v2",
         // dataSrc: e.data,
         "type": "get",
         "data" : {},         
        // dataFilter: function (res) {
         //    // debugger;
         // },
         "error":function(x, y){
            console.log(x);
            // debugger;
         }             
        },
        // processing: true,
        // serverSide: true,
        // ajax: $("input[name=route_api_datatable_ten_job_positions_with_greatest_need]").val(),
        columns: [
            { data: "area" },
            { data: null, "render": function(data,type,row) { return data["tad"]} },
            // { data: null, "render": function(data,type,row) { return Math.floor(data["avg_leadtime"])} },
            { data: "avg_leadtime" },
        ],
    });

    $("#bottom-table").DataTable({
        "bFilter": false,
        "bLengthChange": false,
        "scrollX": true,
        "bPaginate": true,
        "info": false,
        // "order": [[1, 'asc']],
        "bProcessing":true,
        ajax: {
         "url": "/v_dashboard_v1",
         // dataSrc: e.data,
         "type": "get",
         "data" : {},         
        // dataFilter: function (res) {
         //    // debugger;
         // },
         "error":function(x, y){
            console.log(x);
            // debugger;
         }             
        },
        // processing: true,
        // serverSide: true,
        // ajax: $("input[name=route_api_datatable_ten_job_positions_with_greatest_need]").val(),
        columns: [
    { "data": null,"sortable": false, 
       render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;
                }  
    },            // { data: null, "render": function(data,type,row) { return data["id"]} },
            { data: null, "render": function(data,type,row) { return data["simid"]} },
            { data: null, "render": function(data,type,row) { return data["nama"]} },
            { data: null, "render": function(data,type,row) { return data["klien"]} },
            { data: null, "render": function(data,type,row) { return data["cabang_klien"]} },
            { data: null, "render": function(data,type,row) { return data["job"]} },
            { data: null, "render": function(data,type,row) { return data["area"]} },
            // { data: "id" },
            // { data: "simid" },
            // { data: "nama" },
            // { data: "klien" },
            // { data: "cabang_klien" },
            // { data: "job" },
            // { data: "area" },
            // { data: null, "render": function(data,type,row) { return data["atom"]} },
            // { data: null, "render": function(data,type,row) { return data["upload"]} },
            // { data: null, "render": function(data,type,row) { return (data["atom"] + data["upload"])} }
        ],
    });

    (function dashboardRefreshSet1() {    

        $.ajax({
            type: 'GET',
            url: '/c_dashboard',
            data: {}, //How can I preview this?
            dataType: 'json',
            beforeSend: function() {
                $("#last-update").html("<i class=\"text-alert fas fa-spinner fa-spin\"></i>");
                $("#jumlah-beban").html("<i class=\"text-alert fas fa-spinner fa-spin\"></i>");
                $("#jumlah-print").html("<i class=\"text-alert fas fa-spinner fa-spin\"></i>");
                $("#kontrak-on-hand").html("<i class=\"text-alert fas fa-spinner fa-spin\"></i>");
                $("#avg-leadtime").html("<i class=\"text-alert fas fa-spinner fa-spin\"></i>");
            },
            success: function(d){
                var jmlBeban = (d.count.length > 0) ? parseInt(d.count[0].jumlah_beban) : 0;
                var jmlPrint = (d.count.length > 0) ? parseInt(d.count[0].jumlah_print) : 0;
                var jmlOHD = (d.count.length > 0) ? parseInt(d.count[0].jumlah_ohd) : 0;
                var avgLeadtime = (d.count.length > 0) ? parseInt(d.count[0].rata_rata_leadtime) : 0;
                var createdAt = (d.count.length > 0) ? d.count[0].created_at : "0000-00-00 00:00:00";

                var printPercentage = Math.floor((jmlPrint / jmlBeban) * 100);
                var KontrakOHDPercentage = Math.floor((jmlOHD / jmlBeban) * 100);
                
                var dates = new Date();
                dates = new Date(createdAt);
                var date_format_str = dates.getFullYear().toString()+"-"+((dates.getMonth()+1).toString().length==2?(dates.getMonth()+1).toString():"0"+(dates.getMonth()+1).toString())+"-"+(dates.getDate().toString().length==2?dates.getDate().toString():"0"+dates.getDate().toString())+" "+(dates.getHours().toString().length==2?dates.getHours().toString():"0"+dates.getHours().toString())+":"+((parseInt(dates.getMinutes()/5)*5).toString().length==2?(parseInt(dates.getMinutes()/5)*5).toString():"0"+(parseInt(dates.getMinutes()/5)*5).toString())+":00";

                // alert(d.count[0].jumlah_beban);
                $("#last-update").text((d.count.length > 0) ? date_format_str : "0000-00-00 00:00:00");
                $("#jumlah-beban").text((isNaN(jmlBeban)) ? 0 : jmlBeban);
                $("#jumlah-print").text(((isNaN(printPercentage)) ? 0 : printPercentage) + "%");
                $("#kontrak-on-hand").text(((isNaN(KontrakOHDPercentage)) ? 0 : KontrakOHDPercentage) + "%");
                $("#avg-leadtime").text(((isNaN(avgLeadtime)) ? 0 : avgLeadtime) + " Hari");
                //$("#jumlah-print").text();
            }
        }).then(function() { setTimeout(dashboardRefreshSet1, 30000);}); 
    })();
    
    (function dashboardRefreshSet2() {    

      $.ajax({
          type: 'GET',
          url: '/c_dashboard_task_group',
          data: {}, //How can I preview this?
          dataType: 'json',
          beforeSend: function() {
              $("#cfif").html("<i class=\"text-alert fas fa-spinner fa-spin\"></i>");
              $("#cotc").html("<i class=\"text-alert fas fa-spinner fa-spin\"></i>");
          },
          success: function(d){
              // var gOTC = parseInt(d.task_group[0].jumlah_beban);
              // var gFIF = parseInt(d.task_group[1].jumlah_print);
              
              var ohdFIF = (d.task_group.length > 0) ? parseInt(d.task_group[0].jumlah_ohd) : 0;
              var ohdOTC = (d.task_group.length > 1) ? parseInt(d.task_group[1].jumlah_ohd) : 0;
              var ohdNull = (d.task_group.length > 2) ? parseInt(d.task_group[2].jumlah_ohd) : 0;

              var onHandFIF = Math.floor((ohdFIF / (ohdFIF + ohdOTC + ohdNull)) * 100);
              var onHandOTC = Math.floor((ohdOTC / (ohdFIF + ohdOTC + ohdNull)) * 100);

              // alert(Math.floor((ohdFIF / (ohdFIF + ohdOTC + ohdNull)) * 100))


              // // alert(d.count[0].jumlah_beban);
              // $("#jumlah-beban").text(jmlBeban);
              //jumlah ohd OTC / (jumlah ohd OTC+jumlah OHD FIF +jumlah OHD null)
              $("#cfif").text("FIF : " + ((isNaN(onHandFIF)) ? 0 : onHandFIF) + "%");
              $("#cotc").text("OTC : " + ((isNaN(onHandOTC)) ? 0 : onHandOTC) + "%");
              // $("#kontrak-on-hand").text(Math.floor((jmlOHD / jmlBeban) * 100) + "%");
              // $("#avg-leadtime").text(avgLeadtime + " Hari");
              // //$("#jumlah-print").text();
          }
      }).then(function() { setTimeout(dashboardRefreshSet2, 30000);}); 
    })();

    (function dashboardRefreshSet3() {    
      $.ajax({
          type: 'GET',
          url: '/c_dashboard_f_leadtime_distribusi',
          data: {}, //How can I preview this?
          dataType: 'json',
          beforeSend: function() {
              $("#tercepat-hari").html("<i class=\"text-alert fas fa-spinner fa-spin\"></i>");
              $("#tercepat-area").html("<i class=\"text-alert fas fa-spinner fa-spin\"></i>");
          },
          success: function(d){
              // var gOTC = parseInt(d.task_group[0].jumlah_beban);
              // var gFIF = parseInt(d.task_group[1].jumlah_print);
              
              var area = d.leadtime_distribusi.area;
              var leadtime_distribusi = parseInt(d.leadtime_distribusi.leadtime_distribusi);

              // alert(d.task_group.length)


              // // alert(d.count[0].jumlah_beban);
              // $("#jumlah-beban").text(jmlBeban);
              $("#tercepat-hari").text(leadtime_distribusi + " Hari");
              $("#tercepat-area").text(area);
              // $("#kontrak-on-hand").text(Math.floor((jmlOHD / jmlBeban) * 100) + "%");
              // $("#avg-leadtime").text(avgLeadtime + " Hari");
              // //$("#jumlah-print").text();
          }
      }).then(function() { setTimeout(dashboardRefreshSet3, 30000);});
    })();

    
    (function dashboardRefreshSet4() {    
      $.ajax({
          type: 'GET',
          url: '/c_dashboard_s_leadtime_distribusi',
          data: {}, //How can I preview this?
          dataType: 'json',
          beforeSend: function() {
              $("#terlama-hari").html("<i class=\"text-alert fas fa-spinner fa-spin\"></i>");
              $("#terlama-area").html("<i class=\"text-alert fas fa-spinner fa-spin\"></i>");
          },
          success: function(d){
              // var gOTC = parseInt(d.task_group[0].jumlah_beban);
              // var gFIF = parseInt(d.task_group[1].jumlah_print);

              // $.each(d.leadtime_distribusi, function(index, item) {
              //   alert(item);
              // });            
              
              var area = d.leadtime_distribusi.area;
              var leadtime_distribusi = parseInt(d.leadtime_distribusi.leadtime_distribusi);

              // alert(d.task_group.length)


              // // alert(d.count[0].jumlah_beban);
              // $("#jumlah-beban").text(jmlBeban);
              $("#terlama-hari").text(leadtime_distribusi + " Hari");
              $("#terlama-area").text(area);
              // $("#kontrak-on-hand").text(Math.floor((jmlOHD / jmlBeban) * 100) + "%");
              // $("#avg-leadtime").text(avgLeadtime + " Hari");
              // //$("#jumlah-print").text();
          }
      }).then(function() { setTimeout(dashboardRefreshSet4, 30000);});
    })();



});