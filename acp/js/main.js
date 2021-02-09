function ShowHome() {
	document.getElementById("dashboard").style.display = "block";
	document.getElementById("users").style.display = "none";
	document.getElementById("orders").style.display = "none";
	document.getElementById("products").style.display = "none";
	document.getElementById("settings").style.display = "none";
	$('#sidenav-home').addClass( 'active' ).siblings().removeClass( 'active' );
}
function ShowOrders() {
	document.getElementById("dashboard").style.display = "none";
	document.getElementById("users").style.display = "none";
	document.getElementById("orders").style.display = "block";
	document.getElementById("products").style.display = "none";
	document.getElementById("settings").style.display = "none";
	$('#sidenav-orders').addClass( 'active' ).siblings().removeClass( 'active' );
}
function ShowProducts() {
	document.getElementById("dashboard").style.display = "none";
	document.getElementById("users").style.display = "none";
	document.getElementById("orders").style.display = "none";
	document.getElementById("products").style.display = "block";
	document.getElementById("settings").style.display = "none";
	$('#sidenav-products').addClass( 'active' ).siblings().removeClass( 'active' );
}
function ShowUsers() {
	document.getElementById("dashboard").style.display = "none";
	document.getElementById("users").style.display = "block";
	document.getElementById("orders").style.display = "none";
	document.getElementById("products").style.display = "none";
	document.getElementById("settings").style.display = "none";
	$('#sidenav-users').addClass( 'active' ).siblings().removeClass( 'active' );
}
function ShowSettings() {
	document.getElementById("dashboard").style.display = "none";
	document.getElementById("users").style.display = "none";
	document.getElementById("orders").style.display = "none";
	document.getElementById("products").style.display = "none";
	document.getElementById("settings").style.display = "block";
	$('#sidenav-settings').addClass( 'active' ).siblings().removeClass( 'active' );
}
function ShowfsTab() {
	$('#userstab').tab('show');
}

(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });

})(jQuery);

$( document ).on( 'click', '.nav-list li', function ( e ) {
	$( this ).addClass( 'active' ).siblings().removeClass( 'active' );
} );

$( document ).on( 'click', '#sidenav-users', function ( e ) {	
	ShowUsers()
});

$( document ).on( 'click', '#sidenav-home', function ( e ) {
	ShowHome()
});

$( document ).on( 'click', '#sidenav-products', function ( e ) {
	ShowProducts()
});

$( document ).on( 'click', '#sidenav-orders', function ( e ) {
	ShowOrders()
});

$( document ).on( 'click', '#sidenav-settings', function ( e ) {
	ShowSettings()
});
$(document).ready(function(){
  $(".nav-tabs a").click(function(){
    $(this).tab('show');
	});

	$('#users-table').DataTable();
	$('#manage-users-table').DataTable();
	$('#products-table').DataTable();
	$('#manage-products-table').DataTable();
	$('#manage-users-table').Tabledit({
		url:'components/pages/posts/manage_users_action.php',
		restoreButton: false,
		editButton: true,
		deleteButton: true,
		columns: {
			identifier: [0, 'id'],
			editable: [[1, 'Username'],[2, 'Password'],[3, 'Email'], [4, 'Admin'] ]
		},
		buttons: {
			edit: {
					class: 'btn btn-sm btn-warning mb-2',
					html: '<span class="glyphicon glyphicon-pencil">Edit</span>',
					action: 'edit'
			},
			delete: {
				class: 'btn btn-sm btn-danger mb-2',
				html: '<span class="glyphicon glyphicon-pencil">Delete</span>',
				action: 'delete'
			}
		},
		onSuccess:function(data, textStatus, jqXHR)
		{
			if(data.action == 'delete')
			{
				$('.tabledit-deleted-row').remove();
			}
		}
	});
$('#manage-products-table').Tabledit({
	url:'components/pages/posts/manage_products_action.php',
	editButton: true,
	deleteButton: true,
	restoreButton: false,
	columns: {
		identifier: [0, 'id'],
		editable: [[1, 'Category'],[2, 'Name'],[3, 'Short_Desc'], [4, 'Long_Desc'], [5, 'Price'], [6, 'Shipping'], [7, 'Stock'], [8, 'Promote'], [9, 'Active'] ]
	},
	buttons: {
		edit: {
				class: 'btn btn-sm btn-warning mb-2',
				html: '<span class="glyphicon glyphicon-pencil">Edit</span>',
				action: 'edit'
		},
		delete: {
			class: 'btn btn-sm btn-danger mb-2',
			html: '<span class="glyphicon glyphicon-pencil">Delete</span>',
			action: 'delete'
		}
	},
	onSuccess:function(data, textStatus, jqXHR)
	{
		if(data.action == 'delete')
		{
			$('.tabledit-deleted-row').remove();
		}
	}
});
});
