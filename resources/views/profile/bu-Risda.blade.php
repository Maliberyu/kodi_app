{{-- resources/views/portofolio-digital.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold bg-gradient-to-r from-cyan-600 to-blue-500 text-transparent bg-clip-text animate-gradient">
            Portofolio Digital 
            
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Tombol Kembali -->
            <div class="mb-8">
                <a href="{{ url('/') }}"
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-700 to-gray-900 text-white rounded-xl shadow-lg hover:opacity-90 transition-transform transform hover:-translate-y-1">
                    Kembali ke Beranda
                </a>
            </div>

            <!-- Header Profil Guru -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden mb-12 transform transition hover:-translate-y-2 hover:shadow-2xl duration-500">
                <div class="relative h-96">
                   <img src="{{ asset('storage/poto.jpeg') }}" alt="My Photo"
                         alt="Risda Ayulia Apandi"
                         class="w-full h-full object-cover brightness-90 transition-transform transform hover:scale-105 duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 text-white animate-fadeIn">
                        <h1 class="text-5xl font-extrabold tracking-tight">Risda Ayulia Apandi, S.Pd.</h1>
                        <p class="text-2xl font-medium mt-2">Guru SD Negeri Pasirjeungjing</p>
                        <div class="flex space-x-4 mt-4">
                            <a href="#" target="_blank" class="text-3xl hover:scale-110 transition"><i class="fab fa-instagram"></i></a>
                            <a href="#" target="_blank" class="text-3xl hover:scale-110 transition"><i class="fab fa-youtube"></i></a>
                            <a href="#" target="_blank" class="text-3xl hover:scale-110 transition"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Navigasi 3 Menu Utama – Versi Cantik & Berwarna -->
<div class="sticky top-4 z-50 -mt-20 mb-16">
    <div class="bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl p-4 border border-white/30">
        <div class="flex flex-wrap justify-center gap-6 text-lg font-bold">
            
            <!-- Tombol 1 - Profil Guru -->
            <a href="#profil" 
               class="nav-btn group relative px-10 py-5 rounded-2xl overflow-hidden transition-all duration-500 transform hover:scale-105"
               data-target="profil">
                <span class="relative z-10 text-white">1. Profil Guru</span>
                <div class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-blue-600 opacity-90 group-hover:opacity-100 transition-opacity"></div>
                <div class="active-indicator absolute inset-0 bg-gradient-to-r from-cyan-400 to-blue-500 scale-x-0 group-[.active]:scale-x-100 transition-transform duration-500 origin-left"></div>
            </a>

            <!-- Tombol 2 - Portofolio Guru -->
            <a href="#portofolio" 
               class="nav-btn group relative px-10 py-5 rounded-2xl overflow-hidden transition-all duration-500 transform hover:scale-105"
               data-target="portofolio">
                <span class="relative z-10 text-white">2. Portofolio Guru</span>
                <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-600 opacity-90 group-hover:opacity-100 transition-opacity"></div>
                <div class="active-indicator absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-500 scale-x-0 group-[.active]:scale-x-100 transition-transform duration-500 origin-left"></div>
            </a>

            <!-- Tombol 3 - Bukti Implementasi -->
            <a href="#implementasi" 
               class="nav-btn group relative px-10 py-5 rounded-2xl overflow-hidden transition-all duration-500 transform hover:scale-105"
               data-target="implementasi">
                <span class="relative z-10 text-white">3. Bukti Implementasi</span>
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-500 to-teal-600 opacity-90 group-hover:opacity-100 transition-opacity"></div>
                <div class="active-indicator absolute inset-0 bg-gradient-to-r from-emerald-400 to-teal-500 scale-x-0 group-[.active]:scale-x-100 transition-transform duration-500 origin-left"></div>
            </a>

        </div>
    </div>
</div>
            <!-- 1. Profil Guru -->
            <section id="profil" class="mb-16 scroll-mt-28">
                <div class="bg-white rounded-3xl shadow-xl p-10 animate-fadeIn">
                    <h2 class="text-4xl font-bold text-cyan-700 mb-8 border-b-4 border-cyan-600 inline-block">1. Profil Guru</h2>
                    <div class="grid md:grid-cols-2 gap-10 text-lg">
                        <div class="space-y-4">
                            <p><span class="font-bold text-gray-700">Nama Lengkap</span> : Risda Ayulia Apandi, S.Pd.</p>
                            <p><span class="font-bold text-gray-700">NUPTK</span> : 5556776677230063</p>
                            <p><span class="font-bold text-gray-700">NIP</span> : 199812242024212018</p>
                            <p><span class="font-bold text-gray-700">Sekolah</span> : SDN Pasirjeungjing</p>
                            <p><span class="font-bold text-gray-700">Kabupaten</span> : Tasikmalaya</p>
                        </div>
                        <div class="space-y-4">
                            <p><span class="font-bold text-gray-700">Email</span> : apandirisda24@gmail.com</p>
                            <p><span class="font-bold text-gray-700">WA</span> : 0819-9587-7373</p>
                            <p><span class="font-bold text-gray-700">Instagram</span> : @risdaap24</p>
                            
                            <p><span class="font-bold text-gray-700">Tiktok</span> : @risdaap24</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 2. Portofolio Guru -->
            <section id="portofolio" class="mb-16 scroll-mt-28">
                <div class="bg-white rounded-3xl shadow-xl p-10 animate-fadeIn">
                    <h2 class="text-4xl font-bold text-cyan-700 mb-8 border-b-4 border-cyan-600 inline-block">2. Portofolio Guru</h2>

                    <h3 class="text-2xl font-bold text-gray-800 mt-10 mb-4">A. Kegiatan Pengembangan Diri (2023–2025)</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto border-collapse text-left">
                            <thead>
                                <tr class="bg-gradient-to-r from-cyan-600 to-blue-600 text-white">
                                    <th class="px-6 py-4">No</th>
                                    <th class="px-6 py-4">Kegiatan</th>
                                    <th class="px-6 py-4">Tahun</th>
                                    <th class="px-6 py-4">Penyelenggara</th>
                                    <th class="px-6 py-4">Bukti</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                              
                                <!-- <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">1</td>
                                    <td class="px-6 py-4">Pelatihan Koding dan Kecerdasan Artifisial Fase C</td>
                                    <td class="px-6 py-4">2025</td>
                                    <td class="px-6 py-4">Koding Next</td>
                                    <td class="px-6 py-4"><a href="https://drive.google.com/drive/folders/1BSY2fmTrSPdR-r-WR6uKOKWQuz4XFDtx?usp=sharing" class="text-cyan-600 underline hover:scale-105 transition">Sertifikat</a></td>
                                </tr>

                                
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">2</td>
                                    <td class="px-6 py-4">Coaching Clinic Penyusunan Sasaran Kinerja Pegawai (SKP)</td>
                                    <td class="px-6 py-4">2024</td>
                                    <td class="px-6 py-4">BKPSDM Kabupaten Tasikmalaya</td>
                                    <td class="px-6 py-4"><a href="https://drive.google.com/drive/folders/1BSY2fmTrSPdR-r-WR6uKOKWQuz4XFDtx?usp=sharing" class="text-cyan-600 underline hover:scale-105 transition">Sertifikat</a></td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">3</td>
                                    <td class="px-6 py-4">Webinar ASN Belajar: Pembentukan Produk Hukum Daerah</td>
                                    <td class="px-6 py-4">2024</td>
                                    <td class="px-6 py-4">BKPSDM Kabupaten Tasikmalaya</td>
                                    <td class="px-6 py-4"><a href="https://drive.google.com/drive/folders/1BSY2fmTrSPdR-r-WR6uKOKWQuz4XFDtx?usp=sharing" class="text-cyan-600 underline hover:scale-105 transition">Sertifikat</a></td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">4</td>
                                    <td class="px-6 py-4">Membangun Peran dan Kesadaran ASN dalam Sikap Perilaku Bela Negara</td>
                                    <td class="px-6 py-4">2024</td>
                                    <td class="px-6 py-4">BKPSDM Kabupaten Tasikmalaya</td>
                                    <td class="px-6 py-4"><a href="https://drive.google.com/file/d/1FF6zQe-iXbNiv8_YWvpN5obMfqWW0Epn/view" class="text-cyan-600 underline hover:scale-105 transition">Sertifikat</a></td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">5</td>
                                    <td class="px-6 py-4">Webinar Berbagi Praktik Baik Lomba Tingkat I Pangkalan SDN Pasirjeungjing</td>
                                    <td class="px-6 py-4">2024</td>
                                    <td class="px-6 py-4">Komunitas Belajar Kompas Bumi – PMM Kemendikbudristek</td>
                                    <td class="px-6 py-4"><a href="https://drive.google.com/drive/folders/1BSY2fmTrSPdR-r-WR6uKOKWQuz4XFDtx?usp=sharing" class="text-cyan-600 underline hover:scale-105 transition">Sertifikat</a></td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">6</td>
                                    <td class="px-6 py-4">Webinar Nasional Integrasi Akun Belajar.id dengan Quizizz Super</td>
                                    <td class="px-6 py-4">2024</td>
                                    <td class="px-6 py-4">Studio Bahana Ajar, Belajar Bersama & Edukarya</td>
                                    <td class="px-6 py-4"><a href="https://drive.google.com/drive/folders/1BSY2fmTrSPdR-r-WR6uKOKWQuz4XFDtx?usp=sharing" class="text-cyan-600 underline hover:scale-105 transition">Sertifikat</a></td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">7</td>
                                    <td class="px-6 py-4">Praktik Baik: Solusi Mudah Optimalisasi Ide Guru untuk Kegiatan Literasi dan Numerasi Sekolah</td>
                                    <td class="px-6 py-4">2024</td>
                                    <td class="px-6 py-4">Rekan Guru Belajar Bersama & Edukarya</td>
                                    <td class="px-6 py-4"><a href="https://drive.google.com/drive/folders/1BSY2fmTrSPdR-r-WR6uKOKWQuz4XFDtx?usp=sharing" class="text-cyan-600 underline hover:scale-105 transition">Sertifikat</a></td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">8</td>
                                    <td class="px-6 py-4">Sosialisasi Pokok-Pokok Manajemen ASN</td>
                                    <td class="px-6 py-4">2024</td>
                                    <td class="px-6 py-4">BKPSDM Kabupaten Tasikmalaya</td>
                                    <td class="px-6 py-4"><a href="https://drive.google.com/file/d/1mSkK0-UHcRxErSFITm3bLLoezZ0puXlt/view" class="text-cyan-600 underline hover:scale-105 transition">Sertifikat</a></td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">9</td>
                                    <td class="px-6 py-4">Praktik Baik: Strategi Meningkatkan Literasi dan Numerasi Siswa pada Rapor Pendidikan Melalui Hasil AKM</td>
                                    <td class="px-6 py-4">2024</td>
                                    <td class="px-6 py-4">Belajar Bersama</td>
                                    <td class="px-6 py-4"><a href="https://drive.google.com/file/d/1ZOB00PjVuE3Mb8hdQLphKfPYGJllb4uV/view" class="text-cyan-600 underline hover:scale-105 transition">Sertifikat</a></td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">10</td>
                                    <td class="px-6 py-4">Pelatihan Mandiri Kurikulum Merdeka (30 JP)</td>
                                    <td class="px-6 py-4">2024</td>
                                    <td class="px-6 py-4">Direktorat Jenderal GTK Kemendikbudristek</td>
                                    <td class="px-6 py-4"><a href="https://drive.google.com/drive/folders/1BSY2fmTrSPdR-r-WR6uKOKWQuz4XFDtx?usp=sharing" class="text-cyan-600 underline hover:scale-105 transition">Sertifikat</a></td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">11</td>
                                    <td class="px-6 py-4">Workshop RKT/RAKS Berbasis Data (PBD): Penguatan Profil Pelajar Pancasila dan Pembelajaran Terdiferensiasi</td>
                                    <td class="px-6 py-4">2024</td>
                                    <td class="px-6 py-4">MKKS SMP Wilayah Singaparna</td>
                                    <td class="px-6 py-4"><a href="https://drive.google.com/drive/folders/1BSY2fmTrSPdR-r-WR6uKOKWQuz4XFDtx?usp=sharing" class="text-cyan-600 underline hover:scale-105 transition">Sertifikat</a></td>
                                </tr>

                              
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">12</td>
                                    <td class="px-6 py-4">PEMBATIK Level 2 – Implementasi Pembelajaran Berbasis TIK (32 JP)</td>
                                    <td class="px-6 py-4">2023</td>
                                    <td class="px-6 py-4">Kemendikbudristek – Balai Layanan Platform Teknologi</td>
                                    <td class="px-6 py-4"><a href="https://drive.google.com/drive/folders/1BSY2fmTrSPdR-r-WR6uKOKWQuz4XFDtx?usp=sharing" class="text-cyan-600 underline hover:scale-105 transition">Sertifikat</a></td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">13</td>
                                    <td class="px-6 py-4">PEMBATIK Level 1 – Literasi TIK (32 JP)</td>
                                    <td class="px-6 py-4">2023</td>
                                    <td class="px-6 py-4">Kemendikbudristek – Balai Layanan Platform Teknologi</td>
                                    <td class="px-6 py-4"><a href="https://drive.google.com/drive/folders/1BSY2fmTrSPdR-r-WR6uKOKWQuz4XFDtx?usp=sharing" class="text-cyan-600 underline hover:scale-105 transition">Sertifikat</a></td>
                                </tr> -->
   
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4">1</td>
                                        <td class="px-6 py-4">Pelatihan Koding dan Kecerdasan Artifisial Fase C</td>
                                        <td class="px-6 py-4">2025</td>
                                        <td class="px-6 py-4">Koding Next</td>
                                        <td class="px-6 py-4">
                                            <a href="https://drive.google.com/file/d/12Ab1Nr5GMl6qFUmmr6MeuA5CXbIGJY6r/view?usp=sharing" 
                                            class="text-cyan-600 underline hover:scale-105 transition" 
                                            target="_blank" rel="noopener noreferrer">Sertifikat</a>
                                        </td>
                                    </tr>

                                    <!-- 2024 -->
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4">2</td>
                                        <td class="px-6 py-4">Coaching Clinic Penyusunan Sasaran Kinerja Pegawai (SKP)</td>
                                        <td class="px-6 py-4">2024</td>
                                        <td class="px-6 py-4">BKPSDM Kabupaten Tasikmalaya</td>
                                        <td class="px-6 py-4">
                                            <a href="https://drive.google.com/file/d/1qe1rDQzdIuRh4XNYmiDOPE8GZCzyvfLx/view?usp=sharing" 
                                            class="text-cyan-600 underline hover:scale-105 transition" 
                                            target="_blank" rel="noopener noreferrer">Sertifikat</a>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4">3</td>
                                        <td class="px-6 py-4">Webinar ASN Belajar: Pembentukan Produk Hukum Daerah</td>
                                        <td class="px-6 py-4">2024</td>
                                        <td class="px-6 py-4">BKPSDM Kabupaten Tasikmalaya</td>
                                        <td class="px-6 py-4">
                                            <a href="https://drive.google.com/file/d/15H2nDjV8DtPHQBDZtWr_zJHMystNf6fE/view?usp=sharing" 
                                            class="text-cyan-600 underline hover:scale-105 transition" 
                                            target="_blank" rel="noopener noreferrer">Sertifikat</a>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4">4</td>
                                        <td class="px-6 py-4">Membangun Peran dan Kesadaran ASN dalam Sikap Perilaku Bela Negara</td>
                                        <td class="px-6 py-4">2024</td>
                                        <td class="px-6 py-4">BKPSDM Kabupaten Tasikmalaya</td>
                                        <td class="px-6 py-4">
                                            <a href="https://drive.google.com/file/d/1FF6zQe-iXbNiv8_YWvpN5obMfqWW0Epn/view" 
                                            class="text-cyan-600 underline hover:scale-105 transition" 
                                            target="_blank" rel="noopener noreferrer">Sertifikat</a>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4">5</td>
                                        <td class="px-6 py-4">Webinar Berbagi Praktik Baik Lomba Tingkat I Pangkalan SDN Pasirjeungjing</td>
                                        <td class="px-6 py-4">2024</td>
                                        <td class="px-6 py-4">Komunitas Belajar Kompas Bumi – PMM Kemendikbudristek</td>
                                        <td class="px-6 py-4">
                                            <a href="https://drive.google.com/drive/folders/1BSY2fmTrSPdR-r-WR6uKOKWQuz4XFDtx?usp=sharing" 
                                            class="text-cyan-600 underline hover:scale-105 transition" 
                                            target="_blank" rel="noopener noreferrer">Sertifikat</a>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4">6</td>
                                        <td class="px-6 py-4">Webinar Nasional Integrasi Akun Belajar.id dengan Quizizz Super</td>
                                        <td class="px-6 py-4">2024</td>
                                        <td class="px-6 py-4">Studio Bahana Ajar, Belajar Bersama & Edukarya</td>
                                        <td class="px-6 py-4">
                                            <a href="https://drive.google.com/file/d/1vPPi3cEVzrAZMX-OuUugOdzylCzmSRE8/view?usp=sharing" 
                                            class="text-cyan-600 underline hover:scale-105 transition" 
                                            target="_blank" rel="noopener noreferrer">Sertifikat</a>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4">7</td>
                                        <td class="px-6 py-4">Praktik Baik: Solusi Mudah Optimalisasi Ide Guru untuk Kegiatan Literasi dan Numerasi Sekolah</td>
                                        <td class="px-6 py-4">2024</td>
                                        <td class="px-6 py-4">Rekan Guru Belajar Bersama & Edukarya</td>
                                        <td class="px-6 py-4">
                                            <a href="https://drive.google.com/file/d/1d-kSd8abW8hs3DvK9DXaqqTiFiz3mR1c/view" 
                                            class="text-cyan-600 underline hover:scale-105 transition" 
                                            target="_blank" rel="noopener noreferrer">Sertifikat</a>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4">8</td>
                                        <td class="px-6 py-4">Sosialisasi Pokok-Pokok Manajemen ASN</td>
                                        <td class="px-6 py-4">2024</td>
                                        <td class="px-6 py-4">BKPSDM Kabupaten Tasikmalaya</td>
                                        <td class="px-6 py-4">
                                            <a href="https://drive.google.com/file/d/1mSkK0-UHcRxErSFITm3bLLoezZ0puXlt/view" 
                                            class="text-cyan-600 underline hover:scale-105 transition" 
                                            target="_blank" rel="noopener noreferrer">Sertifikat</a>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4">9</td>
                                        <td class="px-6 py-4">Praktik Baik: Strategi Meningkatkan Literasi dan Numerasi Siswa pada Rapor Pendidikan Melalui Hasil AKM</td>
                                        <td class="px-6 py-4">2024</td>
                                        <td class="px-6 py-4">Belajar Bersama</td>
                                        <td class="px-6 py-4">
                                            <a href="https://drive.google.com/file/d/1_QqqR9i6nTtTG9KeIhUo9YJjndMeXRh7/view?usp=sharing" 
                                            class="text-cyan-600 underline hover:scale-105 transition" 
                                            target="_blank" rel="noopener noreferrer">Sertifikat</a>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4">10</td>
                                        <td class="px-6 py-4">Pelatihan Mandiri Kurikulum Merdeka (30 JP)</td>
                                        <td class="px-6 py-4">2024</td>
                                        <td class="px-6 py-4">Direktorat Jenderal GTK Kemendikbudristek</td>
                                        <td class="px-6 py-4">
                                            <a href="https://drive.google.com/file/d/1ozKIfksKV5uu_Wz-OqEqC3G6DsQJK4kt/view?usp=sharing" 
                                            class="text-cyan-600 underline hover:scale-105 transition" 
                                            target="_blank" rel="noopener noreferrer">Sertifikat</a>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4">11</td>
                                        <td class="px-6 py-4">Workshop RKT/RAKS Berbasis Data (PBD): Penguatan Profil Pelajar Pancasila dan Pembelajaran Terdiferensiasi</td>
                                        <td class="px-6 py-4">2024</td>
                                        <td class="px-6 py-4">MKKS SMP Wilayah Singaparna</td>
                                        <td class="px-6 py-4">
                                            <a href="https://drive.google.com/drive/folders/1BSY2fmTrSPdR-r-WR6uKOKWQuz4XFDtx?usp=sharing" 
                                            class="text-cyan-600 underline hover:scale-105 transition" 
                                            target="_blank" rel="noopener noreferrer">Sertifikat</a>
                                        </td>
                                    </tr>
                                     <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4">12</td>
                                        <td class="px-6 py-4">Webinar Seni Rupa dan Karakteristik Seni Rupa Anak</td>
                                        <td class="px-6 py-4">2024</td>
                                        <td class="px-6 py-4">Kombel Kompas Bumi</td>
                                        <td class="px-6 py-4">
                                            <a href="https://drive.google.com/file/d/1EKPe8yijhsu-5yFlkELNpYkKBPrUzEd2/view" 
                                            class="text-cyan-600 underline hover:scale-105 transition" 
                                            target="_blank" rel="noopener noreferrer">Sertifikat</a>
                                        </td>
                                    </tr>

                                    <!-- 2023 -->
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4">13</td>
                                        <td class="px-6 py-4">PEMBATIK Level 2 – Implementasi Pembelajaran Berbasis TIK (32 JP)</td>
                                        <td class="px-6 py-4">2023</td>
                                        <td class="px-6 py-4">Kemendikbudristek – Balai Layanan Platform Teknologi</td>
                                        <td class="px-6 py-4">
                                            <a href="https://drive.google.com/file/d/1EdNOizibq2rpJc3CvUHSoDlmrhHFlJ3m/view?usp=sharing" 
                                            class="text-cyan-600 underline hover:scale-105 transition" 
                                            target="_blank" rel="noopener noreferrer">Sertifikat</a>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4">14</td>
                                        <td class="px-6 py-4">PEMBATIK Level 1 – Literasi TIK (32 JP)</td>
                                        <td class="px-6 py-4">2023</td>
                                        <td class="px-6 py-4">Kemendikbudristek – Balai Layanan Platform Teknologi</td>
                                        <td class="px-6 py-4">
                                            <a href="https://drive.google.com/file/d/1Ee_sfGqqFJCHGXFT72xXiCBh2LMka24S/view?usp=sharing" 
                                            class="text-cyan-600 underline hover:scale-105 transition" 
                                            target="_blank" rel="noopener noreferrer">Sertifikat</a>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>

                    <h3 class="text-2xl font-bold text-gray-800 mt-10 mb-4">B. Pengalaman Organisasi Profesi</h3>
                    <ul class="list-disc list-inside text-lg space-y-2 text-gray-700">
                        <li>Anggota Aktif PGRI Kabupaten Tasikmalaya (2023 – sekarang)</li>
                        <li>Pembina Ekstrakulikuler Robotika SDN Pasirjeungjing</li>
                    </ul>

                    <h3 class="text-2xl font-bold text-gray-800 mt-10 mb-4">C. Karya Tulis & Inovasi</h3>
                    <ul class="list-disc list-inside text-lg space-y-3 text-gray-700">
                        <li>
                            <strong>Inovasi Utama:</strong> 
                            <a href="https://kodi.beryu.my.id/kodi_app/public" 
                            class="text-cyan-600 underline hover:scale-105 transition" 
                            target="_blank" rel="noopener noreferrer">“Kodi.app – Media Pembelajaran interaktif Koding dan Kecerdasan Artifisial”</a>
                        </li>
                        <li>
                            Artikel “Inovasi Pembelajaran Digital Kodi.app pada Pembelajaran Koding dan Kecerdasan Artifisial di SDN Pasirjeungjing” – (2025)
                        </li>
                                                <!-- <li><strong>Inovasi Utama:</strong> “Kodi.app– Media Pembelajaran interaktif Koding dan Kecerdasan Artifisial”</li>
                        <li>Artikel “Inovasi Pembelajaran Digital Kodi.app pada Pembelajaran Koding dan Kecerdasan Artifisial di SDN Pasirjeungjing” –  (2025)</li> -->
                        
                        <!-- <li>“Membuat Keyakinan Kelas" <td class="px-6 py-4"><a href="https://drive.google.com/file/d/1-JDnk9DcYI1RQNwyL7h94aE95knClMHE/view" class="text-cyan-600 underline hover:scale-105 transition">Link Karya</a></td></li>
                         <li>PERENCANAAN PEMBELAJARAN MENDALAM MEMBUAT LAMPU LALU LINTAS KODING DAN KECERDASAN ARTIFISIAL (KKA) <td class="px-6 py-4">
                            <a href="https://docs.google.com/document/d/1Q3Fs0RekJnd-IFhUvdJ9wLYOeThOKqR_/view" class="text-cyan-600 underline hover:scale-105 transition">Link Karya</a></td>
                        </li>
                        <li> MODUL AJAR IPAS<td class="px-6 py-4">
                            <a href="https://drive.google.com/file/d/1WhuNzZ2-5ANXadfr4Dl2zhbdGYL4zHT3/view" class="text-cyan-600 underline hover:scale-105 transition">Link Karya</a></td>
                        </li>
                        <li>MODUL AJAR KURIKULUM MERDEKA PEMBELAJARAN KODING KELAS 5<td class="px-6 py-4">
                            <a href="https://drive.google.com/file/d/1v2p-XF90CpEvMvq0xg7qpQdgMq0ldZrT/view" class="text-cyan-600 underline hover:scale-105 transition">Link Karya</a></td>
                        </li> -->
                        <li>
                            “Membuat Keyakinan Kelas"
                            <td class="px-6 py-4">
                                <a href="https://drive.google.com/file/d/1-JDnk9DcYI1RQNwyL7h94aE95knClMHE/view" 
                                class="text-cyan-600 underline hover:scale-105 transition" 
                                target="_blank" rel="noopener noreferrer">Link Karya</a>
                            </td>
                        </li>

                        <li>
                            PERENCANAAN PEMBELAJARAN MENDALAM MEMBUAT LAMPU LALU LINTAS KODING DAN KECERDASAN ARTIFISIAL (KKA)
                            <td class="px-6 py-4">
                                <a href="https://docs.google.com/document/d/1Q3Fs0RekJnd-IFhUvdJ9wLYOeThOKqR_/view" 
                                class="text-cyan-600 underline hover:scale-105 transition" 
                                target="_blank" rel="noopener noreferrer">Link Karya</a>
                            </td>
                        </li>

                        <li>
                            MODUL AJAR IPAS
                            <td class="px-6 py-4">
                                <a href="https://drive.google.com/file/d/1WhuNzZ2-5ANXadfr4Dl2zhbdGYL4zHT3/view" 
                                class="text-cyan-600 underline hover:scale-105 transition" 
                                target="_blank" rel="noopener noreferrer">Link Karya</a>
                            </td>
                        </li>

                        <li>
                            MODUL AJAR KURIKULUM MERDEKA PEMBELAJARAN KODING KELAS 5
                            <td class="px-6 py-4">
                                <a href="https://drive.google.com/file/d/1v2p-XF90CpEvMvq0xg7qpQdgMq0ldZrT/view" 
                                class="text-cyan-600 underline hover:scale-105 transition" 
                                target="_blank" rel="noopener noreferrer">Link Karya</a>
                            </td>
                        </li>
                    </ul>

                    <h3 class="text-2xl font-bold text-gray-800 mt-10 mb-4">D. Prestasi & Penghargaan</h3>
                    <ul class="list-disc list-inside text-lg space-y-2 text-gray-700">
                        <li>Juara 1 Video Pembelajaran Tingkat Kecamatan Cigalontang 2025 – PGRI</li>
                        <li>Juara 2 Lomba Inovasi Pembelajaran Jenjang SD. PORSENIJAR PGRI KABUPATEN TASIKMALAYA TAHUN 2025 </li>
                    </ul>
                </div>
            </section>

            <!-- 3. Bukti Implementasi -->
            <section id="implementasi" class="scroll-mt-28">
                <div class="bg-white rounded-3xl shadow-xl p-10 animate-fadeIn">
                    <h2 class="text-4xl font-bold text-cyan-700 mb-8 border-b-4 border-cyan-600 inline-block">3. Bukti Implementasi Karya Inovasi</h2>
                    
                    <div class="bg-gradient-to-r from-cyan-50 to-blue-50 p-8 rounded-2xl mb-8 animate-fadeInUp">
                        <h3 class="text-2xl font-bold text-gray-800">Kodi.app – Media Pembelajaran koding dan Kecerdasan Artifisial</h3>
                        <p class="mt-4 text-lg text-gray-700 leading-relaxed">
                            Media ini mengajak siswa kelas 5 belajar koding dengan menelaah e-modul dengan berbagai materi koding  dan KA serta melakukan evaluasi game dan kuis yang terintegrasi wayground. 
                            siswa menjadi lebih percaya diri dalam logika pemrograman.
                        </p>
                    </div>

                    <!-- Gallery Implementasi -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate-fadeInUp">
                        <!-- Foto 1 -->
                        <div class="group">
                            <a href="https://drive.google.com/file/d/1bjcJyVKuBbU6v-SncLok-5gRrYTL4Jxa/view?usp=drive_link" target="_blank">
                               <img src="{{ asset('storage/p1.png') }}" alt="My Photo" 
                                     alt="Kegiatan Pembelajaran"
                                     class="w-full aspect-video object-cover rounded-xl shadow-lg group-hover:scale-105 transition duration-500">
                            </a>
                            <p class="mt-3 text-center text-gray-700 font-medium">Foto Kegiatan Pembelajaran</p>
                        </div>

                        <!-- Video YouTube -->
                        <div class="group">
                            <div class="relative overflow-hidden rounded-xl shadow-lg aspect-video">
                                <iframe class="w-full h-full rounded-xl"
                                        src="https://www.youtube.com/embed/pbXckDIJ-zY?start=250&rel=0&modestbranding=1" 
                                        title="Video Implementasi KodingKeren"
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                </iframe>
                            </div>
                            <p class="mt-3 text-center text-cyan-600 font-semibold">Video Implementasi di Kelas</p>
                        </div>

                        <!-- Foto 2 (bisa diganti kalau ada foto lain) -->
                        <div class="group">
                            <a href="https://drive.google.com/file/d/1bjcJyVKuBbU6v-SncLok-5gRrYTL4Jxa/view?usp=drive_link" target="_blank">
                                <img src="{{ asset('storage/p2.png') }}" alt="My Photo"
                                     alt="Hasil Proyek Siswa"
                                     class="w-full aspect-video object-cover rounded-xl shadow-lg group-hover:scale-105 transition duration-500">
                            </a>
                            <p class="mt-3 text-center text-gray-700 font-medium">Hasil Proyek Siswa</p>
                        </div>
                    </div>

                    <div class="mt-12 text-center">
                        <a href="https://drive.google.com/file/d/1bjcJyVKuBbU6v-SncLok-5gRrYTL4Jxa/view?usp=drive_link" target="_blank"
                           class="inline-block px-10 py-5 bg-gradient-to-r from-cyan-600 to-blue-600 text-white text-xl font-bold rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1">
                            Dokumentasi (Google Drive)
                        </a>
                        <a href="https://whatsapp.com/channel/0029Vay0hFn2v1IrMtLECk0M" target="_blank"
                           class="inline-block px-10 py-5 bg-gradient-to-r from-cyan-600 to-blue-600 text-white text-xl font-bold rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1">
                           Saluran Whatsapp 
                        </a>
                    </div>
                </div>
            </section>

            <!-- Footer -->
            <div class="mt-20 text-center py-10 bg-gradient-to-r from-cyan-600 to-blue-600 text-white rounded-3xl animate-fadeIn">
                <p class="text-xl font-bold">
                    Portofolio Digital<br>
                    <span class="text-2xl"> </span>
                </p>
                <p class="mt-4">© 2025 Risda Ayulia Apandi, S.Pd. – Guru SDN Pasirjeungjing</p>
            </div>
        </div>
    </div>

    <!-- Custom Animasi + Active Menu Script -->
    <style>
        @keyframes fadeIn { from {opacity:0; transform:translateY(20px);} to {opacity:1; transform:translateY(0);} }
        @keyframes fadeInUp { from {opacity:0; transform:translateY(40px);} to {opacity:1; transform:translateY(0);} }
        .animate-fadeIn { animation: fadeIn 1s ease-out forwards; }
        .animate-fadeInUp { animation: fadeInUp 0.8s ease-out forwards; }
        @keyframes gradient { 0%{background-position:0% 50%;} 50%{background-position:100% 50%;} 100%{background-position:0% 50%;} }
        .animate-gradient { background-size: 200% 200%; animation: gradient 5s ease infinite; }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const navButtons = document.querySelectorAll('.nav-btn');
            const sections = ['profil', 'portofolio', 'implementasi'];

            function setActiveButton() {
                const hash = window.location.hash.replace('#', '') || 'profil';
                navButtons.forEach(btn => {
                    btn.classList.remove('bg-gradient-to-r', 'from-cyan-600', 'to-blue-600', 'text-white', 'shadow-lg');
                    btn.classList.add('bg-gray-200', 'text-gray-800');
                    if (btn.getAttribute('data-target') === hash) {
                        btn.classList.add('bg-gradient-to-r', 'from-cyan-600', 'to-blue-600', 'text-white', 'shadow-lg');
                        btn.classList.remove('bg-gray-200', 'text-gray-800');
                    }
                });
            }

            navButtons.forEach(btn => {
                btn.addEventListener('click', () => setTimeout(setActiveButton, 100));
            });

            window.addEventListener('scroll', () => {
                let current = '';
                sections.forEach(section => {
                    const el = document.getElementById(section);
                    if (el && el.getBoundingClientRect().top <= 150) {
                        current = section;
                    }
                });
                if (current) {
                    navButtons.forEach/btn => {
                        btn.classList.remove('bg-gradient-to-r', 'from-cyan-600', 'to-blue-600', 'text-white', 'shadow-lg');
                        btn.classList.add('bg-gray-200', 'text-gray-800');
                        if (btn.getAttribute('data-target') === current) {
                            btn.classList.add('bg-gradient-to-r', 'from-cyan-600', 'to-blue-600', 'text-white', 'shadow-lg');
                            btn.classList.remove('bg-gray-200', 'text-gray-800');
                        }
                    });
                }
            });

            setActiveButton();
        });
    </script>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const navButtons = document.querySelectorAll('.nav-btn');

    function setActiveButton() {
        const hash = window.location.hash.replace('#', '') || 'profil';
        
        navButtons.forEach(btn => {
            btn.classList.remove('active');
            if (btn.getAttribute('data-target') === hash) {
                btn.classList.add('active');
            }
        });
    }

    navButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            setTimeout(setActiveButton, 100);
        });
    });

    // Update saat scroll
    window.addEventListener('scroll', () => {
        let current = '';
        ['profil', 'portofolio', 'implementasi'].forEach(section => {
            const el = document.getElementById(section);
            if (el && el.getBoundingClientRect().top <= 180) {
                current = section;
            }
        });
        if (current) {
            navButtons.forEach(btn => {
                btn.classList.remove('active');
                if (btn.getAttribute('data-target') === current) {
                    btn.classList.add('active');
                }
            });
        }
    });

    // Jalankan saat pertama load
    setActiveButton();
});
</script>
</x-app-layout>