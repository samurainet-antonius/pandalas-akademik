$(function() {
	'use strict'

	var csrfData          = {};
	csrfData['csrf_name'] = 'c7f84f3fc1b767f67376d5bce3083b81';

	if (ipAddress == "::1") {
		ipAddress = "localhost"
	}

	const port = "3000";
	const socketIoAddress = `http://${ipAddress}:${port}`;
	const socket = io(socketIoAddress);

	const url = window.location.href;

	// var refreshTable = io.connect(url);

	
	var _dTable = $('#DataTable').DataTable({
		autoWidth: false,
		responsive: false,
		processing: true,
		serverSide: true,
		stateSave: true,
		order: [],
		columnDefs: [
		{targets: 'no-sort', orderable: false, searchable: false},
		{targets: 'th-action', orderable: false, searchable: false, width: '50px'},
		{targets: [0], width: '20px'},
		{targets: [1], width: '20px'}
		],
		lengthMenu: [
		[10, 30, 50, 100, -1],
		[10, 30, 50, 100, 'All']
		],
		ajax: {
			type: 'POST',
			data: csrfData
		},
		drawCallback: function(settings) {
			var apiTable = this.api();
			dataTableDrawCallback(apiTable);
		}
	});

	_dTable.ajax.reload();

	// add
	$('#form_add').on('submit',function(e){
		e.preventDefault();
		var form = $(this);

		form.find('.submit_add i').attr('class','fa fa-spin fa-spinner');

		var url = form.attr('action');

		$.ajax({
			url:url,
			type: 'POST',
			dataType: 'json',
			data: form.serialize(),
			cache: false,
			success:function(data){
				console.log(data);
				if (data['success']==true) {
					_dTable.clear();
					socket.emit('reload-table');
					$("#add_kelas").modal('hide');
					cfNotif(data['alert']);
					_dTable.ajax.reload();
					
				} else {
					cfNotif(data['alert']);
				}
				form.find('.submit_add i').attr('class','fa fa-save mr-2');
			}
		})
	});


	socket.on('reload', () => {

		cfNotif(data['alert']);
		_dTable.clear();
		_dTable.ajax.reload();
	});

});