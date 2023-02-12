$(function() {

    $('.tombolTambahData').on('click', function(){

        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action', 'http://localhost/mvc/public/mahasiswa/tambah');
        $('#nama').val('');
        $('#band').val('');
        $('#role').val('');
        $('#sekolah').val('');
        $('#id').val('');

    });


    $('.tampilModalUbah').on('click', function() {

        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/mvc/public/mahasiswa/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/mvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success:  function(data){
                $('#nama').val(data.nama);
                $('#band').val(data.band);
                $('#role').val(data.rol);
                $('#sekolah').val(data.sekolah);
                $('#id').val(data.id);
            }
        });

    });

});