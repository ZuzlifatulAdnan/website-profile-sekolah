/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

function updateDateTime() {
    const hariIndonesia = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    const bulanIndonesia = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    const now = new Date();
    const hari = hariIndonesia[now.getDay()];
    const tanggal = now.getDate();
    const bulan = bulanIndonesia[now.getMonth()];
    const tahun = now.getFullYear();

    const jam = now.getHours().toString().padStart(2, '0');
    const menit = now.getMinutes().toString().padStart(2, '0');
    const detik = now.getSeconds().toString().padStart(2, '0');

    const tanggalLengkap = `${hari}, ${tanggal} ${bulan} ${tahun}`;
    const waktuLengkap = `${jam}:${menit}:${detik}`;

    document.getElementById('tanggal').textContent = tanggalLengkap;
    document.getElementById('jam').textContent = waktuLengkap;
}

setInterval(updateDateTime, 1000);
updateDateTime();
$(document).ready(function () {
    // Menangani klik pada item dropdown di perangkat mobile
    $('.dropdown-toggle').click(function (e) {
        if ($(window).width() < 768) {
            $(this).next('.dropdown-menu').toggle();
        }
    });

    // Menutup dropdown ketika di luar area dropdown di klik (hanya di mobile)
    $(document).click(function (e) {
        var target = $(e.target);
        if (!target.closest('.nav-item.dropdown').length && $(window).width() < 768) {
            $('.dropdown-menu').hide();
        }
    });

    // Pastikan dropdown tertutup ketika window di resize dari mobile ke desktop
    $(window).resize(function () {
        if ($(window).width() >= 768) {
            $('.dropdown-menu').removeAttr('style');
        }
    });
});
$(document).ready(function () {
    // Mengatur tanggal dan waktu sesuai dengan device
    function updateDateTime() {
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const now = new Date();
        const date = now.toLocaleDateString('id-ID', options); // Menggunakan format Indonesia
        const time = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });

        $('#tanggal').text(date);
        $('#jam').text(time);
    }

    // Panggil fungsi untuk memperbarui tanggal dan waktu saat halaman dimuat
    updateDateTime();

    // Update tanggal dan waktu setiap detik
    setInterval(updateDateTime, 1000);
});

$(document).ready(function () {
    // Menangani klik pada item dropdown
    $('.dropdown-toggle').click(function (e) {
        e.preventDefault(); // Mencegah link default
        var $dropdown = $(this).next('.dropdown-menu');
        var isVisible = $dropdown.is(':visible');

        // Tutup semua dropdown menu lainnya
        $('.dropdown-menu').slideUp();

        // Tampilkan atau sembunyikan menu dropdown yang dipilih
        if (!isVisible) {
            $dropdown.slideDown();
        }
    });

    // Tutup dropdown jika klik di luar dropdown
    $(document).click(function (e) {
        if (!$(e.target).closest('.dropdown').length) {
            $('.dropdown-menu').slideUp();
        }
    });

    // Menangani active state pada navbar
    $('.navbar-nav .nav-link').each(function () {
        if (this.href === window.location.href) {
            $(this).addClass('active');
        }
    });
});
$(document).ready(function () {
    // Dapatkan elemen tombol
    const scrollToTopBtn = $("#scrollToTopBtn");

    // Tampilkan tombol ketika scroll lebih dari 200px
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 200) {
            scrollToTopBtn.fadeIn(); // Tampilkan tombol dengan efek fade
        } else {
            scrollToTopBtn.fadeOut(); // Sembunyikan tombol dengan efek fade
        }
    });

    // Ketika tombol diklik, scroll ke atas
    scrollToTopBtn.on("click", function () {
        $("html, body").animate({ scrollTop: 0 }, 800); // Scroll ke atas dengan efek halus
    });
});

