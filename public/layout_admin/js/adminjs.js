$(document).ready(function(){

	$('.chitiet').click(function(){
		var id=$(this).data("id");
		var _token =$('input[name="_token"]').val();
		$.ajax({
			url:"view-order/"+id,
			method:"POST",
			dataType:"JSON",
			data:{id:id,_token:_token},
			success:function(data){
				$('#kh').html(data.kh);
				$('#ship').html(data.ship);
				$('#detail').html(data.detail);
				$('#in').html(data.in);
				$('#print').html(data.print);
			}
		});
	});

	
	
})