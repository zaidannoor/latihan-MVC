$(function() {
    console.log("WOI AJG");
    console.log('tidak bisa');
    console.log('tes');
    console.log('tis');
	console.log('hehe');
	console.log('loll');

    $('#tombolTambah').on('click' ,function(){
    	$('#judulModal').html('Tambah Data');
    	$('.modal-body form').attr('action' , 'http://localhost/Belajar-php/php-mvc/public/mahasiswa/tambah');
    	$('#nama').val('');
		$('#nim').val('');
		$('#prodi').val('');
		$('#id').val('');
    })

    $('.tombolUbah').on('click' ,function(){
    	$('#judulModal').html('Ubah Data');
    	$('.modal-body form').attr('action' , 'http://localhost/Belajar-php/php-mvc/public/mahasiswa/ubah');
    	// mengambil data dari html data-id
    	const id = $(this).data('id');
    	
    	// menggunakan ajax
    	$.ajax({
    		url: 'http://localhost/Belajar-php/php-mvc/public/mahasiswa/getubah' ,
    		// kiri untuk nama datanya , sedangkan kanan untuk nilainya
    		data: {id : id} ,
    		method: 'POST' ,
    		dataType: "json" ,
    		success: function(data){
    			$('#nama').val(data.nama);
    			$('#nim').val(data.nim);
    			$('#prodi').val(data.prodi);
    			$('#id').val(data.id);
    		}
    	})
    })

    


});