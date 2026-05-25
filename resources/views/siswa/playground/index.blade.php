<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <span class="text-2xl">⚡</span>
            <div>
                <h2 class="text-xl font-bold text-slate-800">Coding Playground</h2>
                <p class="text-xs text-slate-500">Drag & drop blok kode — coding jadi menyenangkan!</p>
            </div>
        </div>
    </x-slot>

    {{-- Blockly + JS libs --}}
    <script src="https://unpkg.com/blockly@10.4.3/blockly.min.js"></script>
    <script src="https://unpkg.com/blockly@10.4.3/javascript_compressed.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Toolbar --}}
            <div class="flex flex-wrap items-center gap-3 mb-4">
                <input type="text" id="projectTitle" placeholder="Nama Proyek..."
                       class="px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 outline-none w-48">

                <button onclick="runCode()"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    Jalankan
                </button>

                <button onclick="saveProject()"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                    </svg>
                    Simpan
                </button>

                <button onclick="clearWorkspace()"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Hapus Semua
                </button>

                {{-- Simpan sebagai Proyek --}}
                <button onclick="kirimSebagaiProyek()"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors ml-auto">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    Kumpulkan sebagai Proyek
                </button>
            </div>

            {{-- Status bar --}}
            <div id="statusBar" class="hidden mb-3 px-4 py-2 rounded-lg text-sm"></div>

            <div class="flex gap-4">
                {{-- Editor Blockly --}}
                <div class="flex-1 min-w-0">
                    <div id="blocklyDiv"
                         class="border border-slate-200 rounded-xl overflow-hidden"
                         style="height: 480px;"></div>
                </div>

                {{-- Panel Kanan: Proyek tersimpan + output --}}
                <div class="w-64 flex flex-col gap-4 flex-shrink-0">
                    {{-- Output --}}
                    <div class="bg-slate-900 rounded-xl p-4 h-48">
                        <p class="text-xs font-mono text-slate-400 mb-2">Output</p>
                        <div id="outputArea" class="text-green-400 font-mono text-xs whitespace-pre-wrap overflow-auto h-32">
                            // Klik Jalankan untuk melihat hasil
                        </div>
                    </div>

                    {{-- Proyek Tersimpan --}}
                    <div class="bg-white border border-slate-200 rounded-xl p-4 flex-1">
                        <p class="text-xs font-semibold text-slate-600 mb-3">Proyek Tersimpan</p>
                        <div id="savedList" class="space-y-2">
                            @forelse($savedProjects as $sp)
                                <div class="flex items-center gap-2 group">
                                    <button onclick="loadProject({{ $sp->id }})"
                                            class="flex-1 text-left text-xs text-slate-700 hover:text-indigo-600 truncate transition-colors">
                                        {{ $sp->judul }}
                                    </button>
                                    <button onclick="deleteProject({{ $sp->id }}, this)"
                                            class="opacity-0 group-hover:opacity-100 text-slate-400 hover:text-red-500 transition-all">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                            @empty
                                <p class="text-xs text-slate-400">Belum ada proyek tersimpan</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kode JS yang di-generate --}}
            <div class="mt-4">
                <details class="bg-white border border-slate-200 rounded-xl">
                    <summary class="px-4 py-3 text-sm font-medium text-slate-700 cursor-pointer select-none">
                        Lihat Kode JavaScript yang Dihasilkan
                    </summary>
                    <pre id="codeArea"
                         class="px-4 pb-4 text-xs font-mono text-slate-600 overflow-auto max-h-40 whitespace-pre-wrap">// Blok kode akan muncul di sini</pre>
                </details>
            </div>

        </div>
    </div>

    {{-- Toolbox XML --}}
    <xml id="toolbox" style="display:none">
        <category name="Teks" colour="#5C81A6">
            <block type="text_print"></block>
            <block type="text"></block>
            <block type="text_join"></block>
            <block type="text_length"></block>
        </category>
        <category name="Logika" colour="#5C68A6">
            <block type="controls_if"></block>
            <block type="logic_compare"></block>
            <block type="logic_operation"></block>
            <block type="logic_negate"></block>
            <block type="logic_boolean"></block>
        </category>
        <category name="Perulangan" colour="#5BA55B">
            <block type="controls_repeat_ext">
                <value name="TIMES">
                    <block type="math_number"><field name="NUM">5</field></block>
                </value>
            </block>
            <block type="controls_whileUntil"></block>
            <block type="controls_for"></block>
            <block type="controls_forEach"></block>
        </category>
        <category name="Matematika" colour="#5B67A5">
            <block type="math_number"></block>
            <block type="math_arithmetic"></block>
            <block type="math_single"></block>
            <block type="math_round"></block>
            <block type="math_random_int"></block>
        </category>
        <category name="Variabel" colour="#A55B5B" custom="VARIABLE"></category>
        <category name="Fungsi" colour="#995BA5" custom="PROCEDURE"></category>
    </xml>

    <script>
    // ====== INISIALISASI BLOCKLY ======
    const workspace = Blockly.inject('blocklyDiv', {
        toolbox: document.getElementById('toolbox'),
        scrollbars: true,
        trashcan: true,
        zoom: { controls: true, wheel: true, startScale: 1.0, maxScale: 2, minScale: 0.5, scaleSpeed: 1.2 },
        grid: { spacing: 20, length: 3, colour: '#f1f5f9', snap: true },
        theme: Blockly.Themes.Classic,
    });

    let currentProjectId = null;

    // Update kode setiap kali workspace berubah
    workspace.addChangeListener(() => {
        const code = Blockly.JavaScript.workspaceToCode(workspace);
        document.getElementById('codeArea').textContent = code || '// Tambahkan blok untuk melihat kode';
    });

    // ====== JALANKAN KODE ======
    function runCode() {
        const code = Blockly.JavaScript.workspaceToCode(workspace);
        const outputArea = document.getElementById('outputArea');
        outputArea.textContent = '';

        if (!code.trim()) {
            outputArea.textContent = '// Tidak ada blok untuk dijalankan';
            return;
        }

        // Override console.log untuk capture output
        const logs = [];
        const origLog = console.log;
        console.log = (...args) => logs.push(args.map(a => String(a)).join(' '));

        // Redirect alert() ke output
        const origAlert = window.alert;
        window.alert = (msg) => logs.push(String(msg));

        try {
            // Blockly text_print generates window.alert by default, redirect to logs
            const wrapped = `
                (function(){
                    var _print = function(v){ logs.push(String(v)); };
                    ${code.replace(/window\.alert\(([^)]+)\)/g, '_print($1)')}
                })();
            `;
            const fn = new Function('logs', wrapped);
            fn(logs);
            outputArea.textContent = logs.length ? logs.join('\n') : '// Program selesai (tidak ada output)';
        } catch (e) {
            outputArea.textContent = 'Error: ' + e.message;
            outputArea.style.color = '#f87171';
            setTimeout(() => outputArea.style.color = '', 2000);
        } finally {
            console.log = origLog;
            window.alert = origAlert;
        }
    }

    // ====== SIMPAN PROYEK ======
    async function saveProject() {
        const judul = document.getElementById('projectTitle').value.trim() || 'Proyek Tanpa Nama';
        const xml = Blockly.Xml.domToText(Blockly.Xml.workspaceToDom(workspace));

        const body = { judul, kode_xml: xml, _token: '{{ csrf_token() }}' };
        if (currentProjectId) body.id = currentProjectId;

        const res = await fetch('{{ route("siswa.playground.save") }}', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify(body),
        });

        const data = await res.json();
        if (data.success) {
            currentProjectId = data.id;
            showStatus('Proyek "' + data.judul + '" berhasil disimpan!', 'success');
            refreshSavedList(data.id, data.judul);
        }
    }

    // ====== LOAD PROYEK ======
    async function loadProject(id) {
        const res = await fetch('{{ url("siswa/playground/load") }}/' + id, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });
        const data = await res.json();
        if (data.kode_xml) {
            workspace.clear();
            const dom = Blockly.utils.xml.textToDom(data.kode_xml);
            Blockly.Xml.domToWorkspace(dom, workspace);
            document.getElementById('projectTitle').value = data.judul;
            currentProjectId = id;
            showStatus('Proyek "' + data.judul + '" dimuat.', 'info');
        }
    }

    // ====== HAPUS PROYEK ======
    async function deleteProject(id, btn) {
        if (!confirm('Hapus proyek ini?')) return;
        const res = await fetch('{{ url("siswa/playground/delete") }}/' + id, {
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        });
        const data = await res.json();
        if (data.success) {
            btn.closest('.flex').remove();
            if (currentProjectId === id) { currentProjectId = null; }
        }
    }

    // ====== HAPUS WORKSPACE ======
    function clearWorkspace() {
        if (confirm('Hapus semua blok di workspace?')) {
            workspace.clear();
            currentProjectId = null;
            document.getElementById('projectTitle').value = '';
        }
    }

    // ====== KUMPULKAN SEBAGAI PROYEK ======
    function kirimSebagaiProyek() {
        const judul = document.getElementById('projectTitle').value.trim();
        saveProject().then(() => {
            const url = new URL('{{ route("siswa.proyek.create") }}');
            if (judul) url.searchParams.set('judul', judul);
            window.location.href = url.toString();
        });
    }

    // ====== HELPERS ======
    function showStatus(msg, type) {
        const bar = document.getElementById('statusBar');
        bar.textContent = msg;
        bar.className = 'mb-3 px-4 py-2 rounded-lg text-sm ' +
            (type === 'success' ? 'bg-green-50 border border-green-200 text-green-700' : 'bg-blue-50 border border-blue-200 text-blue-700');
        bar.classList.remove('hidden');
        setTimeout(() => bar.classList.add('hidden'), 3000);
    }

    function refreshSavedList(id, judul) {
        const list = document.getElementById('savedList');
        // Cek apakah sudah ada, kalau belum tambahkan
        if (!list.querySelector(`[data-id="${id}"]`)) {
            const div = document.createElement('div');
            div.className = 'flex items-center gap-2 group';
            div.setAttribute('data-id', id);
            div.innerHTML = `
                <button onclick="loadProject(${id})" class="flex-1 text-left text-xs text-slate-700 hover:text-indigo-600 truncate transition-colors">${judul}</button>
                <button onclick="deleteProject(${id}, this)" class="opacity-0 group-hover:opacity-100 text-slate-400 hover:text-red-500 transition-all">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>`;
            const empty = list.querySelector('p');
            if (empty) empty.remove();
            list.prepend(div);
        }
    }
    </script>
</x-app-layout>
