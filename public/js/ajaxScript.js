function convertToRupiah(angka) {
    var rupiah = '';
    var angkarev = angka.toString().split('').reverse().join('');
    for (var i = 0; i < angkarev.length; i++)
        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
    return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

document.getElementById("brand-processor").addEventListener("change", function() {

    const brand = $('#brand-processor').val();

    $.ajax({
        type: 'POST',
        url: '/simulasi/processor',
        data: {
            brand,
        },
        success: function(processors) {
            processors.forEach(processor => {
                let option = new Option(processor.name + ' - ' + convertToRupiah(processor.price), processor.id)
                $("#processor").append(option);
            });
        },
        error: function(data, textStatus, errorThrown) {
            console.log(data);

        },
    })
}, false);