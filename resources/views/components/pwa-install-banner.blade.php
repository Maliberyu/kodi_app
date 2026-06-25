{{--
  Banner muncul hanya di iOS Safari dan hanya jika belum di-install
  (standalone mode = sudah diinstall → banner disembunyikan)
--}}
<div id="ios-install-banner" style="
    display: none;
    position: fixed;
    bottom: 0; left: 0; right: 0;
    z-index: 9999;
    background: linear-gradient(135deg, #7c3aed, #ec4899);
    color: #ffffff;
    padding: 14px 16px 10px;
    box-shadow: 0 -4px 24px rgba(0,0,0,0.25);
">
    <div style="display:flex; align-items:flex-start; gap:12px; max-width:520px; margin:0 auto;">
        <img src="{{ asset('icon/icon.png') }}" alt="KODI"
             style="width:44px; height:44px; border-radius:10px; flex-shrink:0; object-fit:contain;">

        <div style="flex:1; font-size:14px; line-height:1.45; color:#ffffff;">
            <p style="font-weight:800; font-size:15px; margin:0 0 4px; color:#ffffff;">
                Install KODI di HP kamu
            </p>
            <p style="margin:0; color:#f3e8ff;">
                Ketuk
                <svg style="display:inline; width:15px; height:15px; vertical-align:middle; margin:0 2px;"
                     fill="none" stroke="#ffffff" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 12v8a2 2 0 002 2h12a2 2 0 002-2v-8M16 6l-4-4m0 0L8 6m4-4v13"/>
                </svg>
                lalu pilih <strong style="color:#ffffff;">"Add to Home Screen"</strong>
            </p>
        </div>

        <button
            onclick="document.getElementById('ios-install-banner').style.display='none'; localStorage.setItem('kodi-ios-banner','1')"
            style="flex-shrink:0; background:none; border:none; color:#e9d5ff; font-size:22px; line-height:1; cursor:pointer; padding:0 4px;"
            aria-label="Tutup">
            &times;
        </button>
    </div>

    <div style="text-align:center; margin-top:4px;">
        <svg style="display:inline; width:18px; height:18px; color:#d8b4fe; animation:bounce 1s infinite;"
             fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"/>
        </svg>
    </div>
</div>

<style>
  @keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50%       { transform: translateY(4px); }
  }
</style>

<script>
  (function () {
    var isIos = /iphone|ipad|ipod/i.test(navigator.userAgent);
    var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
    var isStandalone = window.navigator.standalone === true;
    var dismissed = localStorage.getItem('kodi-ios-banner');

    if (isIos && isSafari && !isStandalone && !dismissed) {
      document.getElementById('ios-install-banner').style.display = 'block';
    }
  })();
</script>
