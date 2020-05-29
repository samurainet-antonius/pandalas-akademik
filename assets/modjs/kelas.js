$(function() {
	'use strict'

	var csrfData          = {};
	csrfData['csrf_name'] = 'c7f84f3fc1b767f67376d5bce3083b81';

	var _dTable = $('#DataTable').DataTable({
		language: {
			url: 'http://www.pondoksepang.com/l-content/plugins/datatable/lang/indonesia.json'
		},
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

});