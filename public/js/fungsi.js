var i = 1;
function isi_otomatis()
{
    var nama = $("#nama").val();
        $.ajax({
            url: '/ajax/'+nama,
            type: 'GET',
            data:{
                '_token': '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(data){
                var obj = JSON.parse(JSON.stringify(data));
                $('#id_stok').val(obj.id_stok);
                console.log(obj)
            }
        });
}

// tambah inputan
function addInput(){
    appendInput = '<div class="row ms-2 mb-2 control-group box-' + i + '" style="height: 22px;">';
    appendInput += '<input type="text" name="nama[]" list="dataListNama" class="form-control form-fill-input col-auto me-2" placeholder="Nama" style="width: 30%;" required>';
    appendInput += '<input type="number" name="jumlah[]" id="jumlah-' + i + '" class="form-control form-fill-input col-auto me-2 hitung" style="width: 13%;" min="1">';
    appendInput += '<input type="number" name="harga_jual[]" id="harga_jual-' + i + '" class="form-control form-fill-input col-auto me-2 hitung" style="width: 21%;" min="1" required>';
    appendInput += '<input type="number" name="total_harga[]" id="total-' + i + '" class="form-control form-fill-input col-auto me-2 total" style="width: 18%;" readonly>';
    appendInput += '<button type="button" id="remove" class="btn btn-danger justify-content-center" style="width: 40px; height: 24px; border-radius: 5px; padding: 0 0 0 0;">X</button>';

    $('#box').append(appendInput);

    i++;

};

// proses menghapus inputan
$('body').on('click', '#remove', function() {

    i--;
    $(this).parent('div').remove();

});

// hitung otomatis
$('body').on('focus', '.hitung', function() {
    var aydi = $(this).attr('id'),
    berhitung = aydi.split('-');
    $(this).keydown(function() {
        setTimeout(function() {
            var satuan = ($('#jumlah-' + berhitung[1]).val() != '' ? $('#jumlah-' + berhitung[1]).val() : 0),
                jumlah = ($('#harga_jual-' + berhitung[1]).val() != '' ? $('#harga_jual-' + berhitung[1]).val() : 0),
                subtotal = parseInt(satuan) * parseInt(jumlah);

            if (!isNaN(subtotal)) {
                $('#total-' + berhitung[1]).val(subtotal);
                var grandTotal = 0;
                $('.total').each(function(){
                    grandTotal += parseFloat($(this).val());
                });
                $('#total').val(grandTotal);
            }
        }, 50);
    });
});
