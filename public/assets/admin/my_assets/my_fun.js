// untuk angka
function justAngka(e) {
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190, 77]) !== -1 ||
        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
        (e.keyCode >= 35 && e.keyCode <= 40)) {
        return;
    }
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
};

// untuk tgl indo
function tglIndo(date) {
    var namaBulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var tanggal = date.substr(8, 2);
    var bulan = parseInt(date.substr(5, 2));
    var tahun = date.substr(0, 4);

    var result = tanggal + ' ' + namaBulan[bulan] + ' ' + tahun;

    return result;
}

// untuk menghitung umur
function countAge(dateString) {
    var birthday = +new Date(dateString);
    return ~~((Date.now() - birthday) / (31557600000));
}

// untuk format harga
function autoSeparator(Num) {
    Num += '';
    Num = Num.replace('.', '');
    Num = Num.replace('.', '');
    Num = Num.replace('.', '');
    Num = Num.replace('.', '');
    Num = Num.replace('.', '');
    Num = Num.replace('.', '');
    x = Num.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1))
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    return x1 + x2;
};

// untuk tulisan kapital
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

// untuk sweet alert
function swal(title, text, type, button) {
    let btn;

    if (type == 'success') {
        btn = "success"
    } else if (type == 'error') {
        btn = "danger"
    } else if (type == 'warning') {
        btn = "warning"
    }

    return Swal.fire({
        title: title,
        text: text,
        icon: type,
        confirmButtonClass: "btn btn-" + btn + " w-xs mb-1",
        confirmButtonText: button,
        buttonsStyling: !1,
    });
}

// untuk input nomor type text
(function ($) {
    $.fn.inputFilter = function (inputFilter) {
        return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function () {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
        });
    };
}(jQuery));

$('.copyright').html(`<em>&copy; ${new Date().getFullYear()}. All rights reserved. <br> Developed with <span style="color: #e25555;">&#9829;</span> by <a href="https://alanslengkoan.netlify.app" target="_blank">alanslengkoan</a></em>`);

$(".inputNumber").inputFilter(function (value) {
    return /^-?\d*$/.test(value);
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// untuk debugin console log
const log = (arg) => console.log(arg);
