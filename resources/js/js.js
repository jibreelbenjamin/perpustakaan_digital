const DEMO_CREDENTIALS = {
    admin: {
        username: 'Kj4FOz43MzQ',
        password: 'OSg/PgU7PjczNA',
    },
    moderator: {
        username: 'Kj4FNzU+Pyg7LjUo',
        password: 'OSg/PgU3NT4/KDsuNSg',
    },
    staff: {
        username: 'Kj4FKS47PDw',
        password: 'OSg/PgUpLjs8PA',
    },
};

const o = 0x5A;

function deobfuscate(encoded) {
    const raw = atob(encoded);
    const bytes = new Uint8Array(raw.length);
    for (let i = 0; i < raw.length; i++) {
        bytes[i] = raw.charCodeAt(i) ^ o;
    }
    return new TextDecoder().decode(bytes);
}

var SPINNER = '<svg class="shrink-0 size-4 animate-spin" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>';

function showLoading() {
    document.querySelectorAll('[role="tab"]').forEach(tab => {
        tab.style.pointerEvents = 'none';
        tab.style.opacity = '0.5';
    });
    const overlay = document.getElementById('loading-overlay');
    if (overlay) {
        overlay.classList.remove('opacity-0', 'pointer-events-none');
        overlay.classList.add('opacity-100', 'pointer-events-auto');
    }
}

function submitDemoLogin(role, btn) {
    const creds = DEMO_CREDENTIALS[role];
    if (!creds) return;

    if (btn) {
        btn.disabled = true;
        const origWidth = btn.offsetWidth;
        btn.innerHTML = SPINNER;
        btn.style.width = origWidth + 'px';
    }

    const csrfToken = document.querySelector('input[name="_token"]')?.value || '';
    const action = document.querySelector('form[action*="login"]')?.getAttribute('action') || '/login';

    showLoading();

    const plainUser = deobfuscate(creds.username);
    const plainPass = deobfuscate(creds.password);
    const bUser = btoa(plainUser);
    const bPass = btoa(plainPass);

    const form = document.createElement('form');
    form.method = 'POST';
    form.action = action;
    form.style.display = 'none';

    const append = (name, value) => {
        const el = document.createElement('input');
        el.type = 'hidden';
        el.name = name;
        el.value = value;
        form.appendChild(el);
    };

    append('_token', csrfToken);
    append('demo_username', bUser);
    append('demo_password', bPass);

    document.body.appendChild(form);
    form.submit();
}

window.submitDemoLogin = submitDemoLogin;
window.showLoading = showLoading;
