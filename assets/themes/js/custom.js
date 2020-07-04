function dataTableDrawCallback(apiTable,urlTable) {
	var deleteLocation = this.location.href;
	$('tfoot').hide();

	if ($('.row_data:checkbox:checked').length == 0) {
		$('.select_all:checkbox').prop('checked',false);
	};

	$('.select_all').click(function() {
		var checkedIndex = this.checked;
		$(".row_data:checkbox").each(function() {
			this.checked = checkedIndex;
			if (checkedIndex == this.checked) {
				$(this).closest('table tbody tr').removeClass('table-selected');
			}
			if (this.checked) {
				$(this).closest('table tbody tr').addClass('table-selected');
			}
		});
		var countChecked = $('.row_data:checkbox:checked').length;
		if (countChecked > 0) {
			$('tfoot').show();
		} else {
			$('tfoot').hide();
		}
	});

	$('.row_data:checkbox').on('click', function () {
		var countChecked = $('.row_data:checkbox:checked').length;
		var checkedIndex = this.checked;
		this.checked = checkedIndex;
		if (checkedIndex == this.checked) {
			$(this).closest('table tbody tr').removeClass('table-selected');
			$('.select_all:checkbox').prop('checked',false);
		}
		if (this.checked) {
			$(this).closest('table tbody tr').addClass('table-selected');
		}
		if (countChecked > 0) {
			$('tfoot').show();
		} else {
			$('tfoot').hide();
		}
	});


	$('.delete_single').on('click', function(i) {
		var pk = [];
		pk = [$(this).attr('data-pk')];
		cfSwalDelete(pk, apiTable, deleteLocation);
	});
	
	$('.delete_multi').on('click', function() {
		var pk = [];
		$('.row_data:checked').each(function(i) {
			pk[i] = $(this).val();
		});
		if (pk != '' && pk != 'on') {
			cfSwalDelete(pk, apiTable, deleteLocation);
		}
	});


	$('.dataTables_length select').select2({
		minimumResultsForSearch: Infinity,
		dropdownAutoWidth: true,
		width: 'auto'
	});

	$('[data-toggle="tooltip"]').tooltip({
		trigger: 'hover',
		animation: false,
		delay: 1
	});
}

function cfNotif(data){
	Noty.overrideDefaults({
		theme: 'default',
		layout: 'topRight',
		type: 'alert',
		timeout: 4000
		
	});   
	new Noty({
		type: data['type'],
		text: data['content'],
		// modal: true
		// animation:'ease-in',
	}).show();
}


function cfAlert(data){
	$('#alert-notif').html('<div class="alert alert-' + data['type'] + ' alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + data['content'] + '</div>').show();
	$('.alert').fadeTo(15353, 50).slideUp(300, function() {
		$('.alert').alert('close');
		$('#alert-notif').hide();
	});
}