<footer class="footer py-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-4 text-center text-md-left">
                <h5 class="font-weight-bold">SMKN 1 WAY BUNGUR</h5>
                <p>Slogan Sekolah Anda di Sini</p>
            </div>
            <div class="col-md-3 mb-4 text-center text-md-left">
                <h5 class="font-weight-bold">MENU</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/informasi/agenda') }}" class="text-dark"><i class="fas fa-calendar-alt"></i>
                            Agenda</a></li>
                    <li><a href="{{ url('/informasi/alumni') }}" class="text-dark"><i class="fas fa-user-graduate"></i>
                            Alumni</a></li>
                    <li><a href="{{ url('/informasi/infografis') }}" class="text-dark"><i class="fas fa-chart-pie"></i>
                            Infografis</a></li>
                    <li><a href="{{ url('/informasi/pengumuman') }}" class="text-dark"><i class="fas fa-bullhorn"></i>
                            Pengumuman</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-4 text-center text-md-left">
                <h5 class="font-weight-bold">KONTAK KAMI</h5>
                <ul class="list-unstyled">
                    <li>Email: <a href="mailto:info@smkn1waybungur.sch.id" class="text-dark"><i
                                class="fas fa-envelope"></i>info@smkn1waybungur.sch.id</a></li>
                    <li>Telepon: <a href="tel:+1234567890" class="text-dark"><i class="fas fa-phone-alt"></i> (123)
                            456-7890</a></li>
                    <li>Alamat: <a href="https://www.google.com/maps?q=Jl.+Pendidikan+No.+1,+Way+Bungur,+Bandar+Lampung"
                            target="_blank" class="text-dark"><i class="fas fa-map-marker-alt"></i> Jl. Pendidikan No.
                            1, Way Bungur, Bandar Lampung</a></li>
                    <li>Pesan: <a href="{{ url('/Hubungi-Kami') }}" class="text-dark"><i class="fas fa-comment-dots"></i>
                            Kirim Pesan</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-4 text-center text-md-left">
                <h5 class="font-weight-bold">MEDIA SOSIAL</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-dark" target="_blank"><i class="fab fa-instagram"></i>
                            Instagram</a></li>
                    <li><a href="#" class="text-dark" target="_blank"><i class="fab fa-tiktok"></i> TikTok</a>
                    </li>
                    <li><a href="#" class="text-dark" target="_blank"><i class="fab fa-youtube"></i> YouTube</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-4">
            <p class="text-muted">&copy; <span id="year"></span> SMK N 1 Way Bungur. All rights reserved.</p>
        </div>
    </div>
</footer>

<script>
    document.getElementById('year').textContent = new Date().getFullYear();
</script>
