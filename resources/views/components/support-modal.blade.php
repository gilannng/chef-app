<script>
    function acceptTerms() {
        const storageKey = 'tosAccepted_User_{{ auth()->check() ? auth()->id() : 'guest' }}';
        localStorage.setItem(storageKey, 'true');
        const tosModal = document.getElementById('tos-modal');
        tosModal.classList.add('opacity-0');
        tosModal.querySelector('.modal-content').classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            tosModal.classList.add('hidden');
        }, 500);
    }
    
    function toggleTosCheckbox() {
        const checkbox = document.getElementById('tos-checkbox');
        const btn = document.getElementById('tos-continue-btn');
        if (checkbox.checked) {
            btn.removeAttribute('disabled');
            btn.classList.remove('opacity-50', 'cursor-not-allowed');
            btn.classList.add('hover:bg-primary-container', 'hover:-translate-y-1', 'hover:shadow-lg', 'hover:shadow-primary/30');
        } else {
            btn.setAttribute('disabled', 'true');
            btn.classList.add('opacity-50', 'cursor-not-allowed');
            btn.classList.remove('hover:bg-primary-container', 'hover:-translate-y-1', 'hover:shadow-lg', 'hover:shadow-primary/30');
        }
    }

    function openSupportModal(e) {
        if (e) e.preventDefault();
        const tosModal = document.getElementById('tos-modal');
        const checkbox = document.getElementById('tos-checkbox');
        const btn = document.getElementById('tos-continue-btn');
        
        // Set state to show already accepted
        checkbox.checked = true;
        checkbox.disabled = true;
        
        // Update button text for Support context
        btn.innerHTML = 'Tutup';
        btn.removeAttribute('disabled');
        btn.classList.remove('opacity-50', 'cursor-not-allowed');
        btn.classList.add('hover:bg-primary-container', 'hover:-translate-y-1', 'hover:shadow-lg', 'hover:shadow-primary/30');
        
        // Show modal
        tosModal.classList.remove('hidden');
        void tosModal.offsetWidth;
        tosModal.classList.remove('opacity-0');
        tosModal.querySelector('.modal-content').classList.remove('scale-95', 'opacity-0');
    }
</script>

<!-- Terms of Service / Support Modal -->
<div id="tos-modal" class="fixed inset-0 z-[900] bg-black/60 backdrop-blur-md hidden opacity-0 transition-opacity duration-500 flex items-center justify-center p-4">
    <div class="modal-content bg-surface max-w-2xl w-full rounded-3xl shadow-2xl scale-95 opacity-0 transition-all duration-500 overflow-hidden flex flex-col max-h-[85vh]">
        <div class="px-8 py-6 border-b border-surface-variant shrink-0 flex items-center gap-4 bg-surface-container-lowest">
            <div class="w-12 h-12 rounded-2xl bg-primary/10 flex items-center justify-center">
                <span class="material-symbols-outlined text-primary">gavel</span>
            </div>
            <div>
                <h3 class="text-2xl font-extrabold text-on-surface tracking-tight">Terms of Service</h3>
                <p class="text-xs font-semibold text-secondary uppercase tracking-widest mt-1">Harap baca sebelum melanjutkan</p>
            </div>
        </div>
        <div class="p-8 overflow-y-auto custom-scrollbar text-sm text-secondary space-y-6 font-medium leading-relaxed bg-surface">
            <p class="text-base text-on-surface">Selamat datang di <strong>Culinary Atelier</strong>. Dengan mengakses dan menggunakan platform ini, Anda menyetujui seluruh ketentuan layanan berikut:</p>
            
            <div>
                <h4 class="text-on-surface font-bold text-lg mb-2 flex items-center gap-2"><span class="material-symbols-outlined text-primary text-sm">cookie</span> 1. Penggunaan Platform</h4>
                <p>Aplikasi ini menyediakan simulasi dapur virtual, manajemen bahan (smart pantry), dan komunitas resep. Anda diwajibkan menggunakan aplikasi ini sesuai dengan hukum yang berlaku dan tidak menggunakannya untuk tujuan ilegal.</p>
            </div>
            
            <div>
                <h4 class="text-on-surface font-bold text-lg mb-2 flex items-center gap-2"><span class="material-symbols-outlined text-primary text-sm">shield</span> 2. Privasi & Keamanan Data</h4>
                <p>Data profil, resep, dan aktivitas yang Anda unggah akan disimpan secara aman. Kami berkomitmen untuk tidak membagikan data pribadi Anda ke pihak ketiga tanpa persetujuan eksplisit Anda.</p>
            </div>
            
            <div>
                <h4 class="text-on-surface font-bold text-lg mb-2 flex items-center gap-2"><span class="material-symbols-outlined text-primary text-sm">group</span> 3. Etika Komunitas</h4>
                <p>Dalam berinteraksi di fitur komunitas, Anda harus mematuhi standar etika tinggi. Dilarang keras mengunggah konten yang tidak pantas, ujaran kebencian, atau spam. Pelanggaran dapat mengakibatkan suspensi akun secara permanen.</p>
            </div>
            
            <div>
                <h4 class="text-on-surface font-bold text-lg mb-2 flex items-center gap-2"><span class="material-symbols-outlined text-primary text-sm">copyright</span> 4. Hak Cipta & Properti Intelektual</h4>
                <p>Semua resep dan karya orisinal yang dibagikan tetap menjadi hak cipta pembuatnya masing-masing. Dengan mengunggahnya, Anda memberikan lisensi kepada Culinary Atelier untuk menampilkannya di platform kami demi kemajuan bersama.</p>
            </div>
        </div>
        <div class="p-8 border-t border-surface-variant bg-surface-container-lowest shrink-0">
            <label class="flex items-center gap-4 cursor-pointer group mb-8 p-4 rounded-2xl hover:bg-surface-variant transition-colors border border-transparent hover:border-outline-variant">
                <div class="relative flex items-center shrink-0">
                    <input type="checkbox" id="tos-checkbox" class="w-6 h-6 text-primary bg-surface border-2 border-outline rounded focus:ring-primary focus:ring-2 cursor-pointer transition-colors duration-200" onchange="toggleTosCheckbox()">
                </div>
                <span class="text-[15px] font-bold text-on-surface group-hover:text-primary transition-colors leading-tight">Saya telah membaca dan menyetujui seluruh Ketentuan Layanan (Terms of Service) dari Culinary Atelier.</span>
            </label>
            <div class="flex justify-end">
                <button id="tos-continue-btn" disabled onclick="acceptTerms()" class="bg-primary text-white font-black uppercase tracking-widest text-sm py-4 px-10 rounded-xl opacity-50 cursor-not-allowed transition-all duration-300">
                    Lanjutkan ke Dashboard
                </button>
            </div>
        </div>
    </div>
</div>
