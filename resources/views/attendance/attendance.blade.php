<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background: #f5f5f3;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'DM Sans', sans-serif;
            padding: 1rem;
        }

        .scan-card {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            border: 1px solid #e8e8e6;
            border-radius: 20px;
            padding: 2.5rem 2rem;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
        }

        .lib-label {
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #aaa;
        }

        .back-btn {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 13px;
            color: #666;
            text-decoration: none;
            border: 1px solid #e8e8e6;
            border-radius: 8px;
            padding: 5px 12px;
            background: none;
            cursor: pointer;
            transition: background 0.15s;
        }

        .back-btn:hover { background: #f5f5f3; color: #333; }

        .icon-area {
            text-align: center;
            margin-bottom: 1.75rem;
        }

        .scan-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #f5f5f3;
            border: 1px solid #e8e8e6;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .scan-circle i { font-size: 24px; color: #888; }

        .scan-title {
            font-size: 18px;
            font-weight: 500;
            color: #1a1a1a;
            margin-bottom: 4px;
        }

        .scan-sub {
            font-size: 13px;
            color: #aaa;
        }

        .scan-input-wrap {
            margin-top: 1.75rem;
            position: relative;
        }

        .scan-input-wrap i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
            color: #bbb;
            pointer-events: none;
        }

        .scan-input {
            width: 100%;
            height: 48px;
            padding: 0 14px 0 42px;
            font-size: 15px;
            font-family: 'DM Sans', sans-serif;
            background: #f5f5f3;
            border: 1px solid #e8e8e6;
            border-radius: 10px;
            color: #1a1a1a;
            outline: none;
            transition: border-color 0.2s, background 0.2s;
        }

        .scan-input::placeholder { color: #bbb; font-size: 14px; }

        .scan-input:focus {
            border-color: #aaa;
            background: #fff;
        }

        .divider {
            border: none;
            border-top: 1px solid #e8e8e6;
            margin: 1.5rem 0 1.25rem;
        }

        .result-area { display: none; }
        .result-area.show { display: block; }

        .spinner-row {
            display: flex;
            justify-content: center;
            padding: 1rem 0;
        }

        @keyframes spin { to { transform: rotate(360deg); } }

        .spinner-ring {
            width: 20px;
            height: 20px;
            border: 2px solid #e8e8e6;
            border-top-color: #888;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
        }

        .student-row {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .avatar-circle {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #f0f0ee;
            border: 1px solid #e8e8e6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            font-weight: 500;
            color: #666;
            flex-shrink: 0;
            overflow: hidden;
        }

        .avatar-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .student-info { flex: 1; }

        .student-name-text {
            font-size: 15px;
            font-weight: 500;
            color: #1a1a1a;
            margin-bottom: 2px;
        }

        .student-id-text {
            font-size: 12px;
            color: #aaa;
        }

        .punch-badge {
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.08em;
            padding: 4px 10px;
            border-radius: 6px;
        }

        .badge-in  { background: #e8f5e9; color: #2e7d32; }
        .badge-out { background: #e3f2fd; color: #1565c0; }

        .error-row {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            background: #fdecea;
            border-radius: 10px;
        }

        .error-row i  { font-size: 16px; color: #c62828; }
        .error-row span { font-size: 14px; color: #c62828; }
    </style>
</head>
<body>

<div class="scan-card">

    <div class="top-bar">
        <span class="lib-label">Library System</span>
        <form method="POST" action="/logout">
            @csrf
            @method('DELETE')
            <button type="submit" class="back-btn">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </button>
        </form>
    </div>

    <div class="icon-area">
        <div class="scan-circle">
            <i class="bi bi-upc-scan"></i>
        </div>
        <p class="scan-title">Scan your ID</p>
        <p class="scan-sub">Hold your barcode near the scanner</p>
    </div>

    <div class="scan-input-wrap">
        <i class="bi bi-search"></i>
        <input
            type="text"
            id="barcodeInput"
            class="scan-input"
            placeholder="Waiting for scan..."
            autofocus>
    </div>

    <div class="result-area" id="resultArea">
        <hr class="divider">

        <div id="loadingRow" class="spinner-row" style="display:none;">
            <div class="spinner-ring"></div>
        </div>

        <div id="studentRow" class="student-row" style="display:none;">
            <div class="avatar-circle" id="avatarEl">JD</div>
            <div class="student-info">
                <p class="student-name-text" id="studentNameEl"></p>
                <p class="student-id-text" id="studentIdEl"></p>
            </div>
            <span class="punch-badge" id="punchBadge">IN</span>
        </div>

        <div id="errorRow" class="error-row" style="display:none;">
            <i class="bi bi-exclamation-circle"></i>
            <span id="errorMsg">Student not found</span>
        </div>
    </div>

</div>

<script>
const input = document.getElementById('barcodeInput');
const resultArea = document.getElementById('resultArea');
const loadingRow = document.getElementById('loadingRow');
const studentRow = document.getElementById('studentRow');
const errorRow = document.getElementById('errorRow');
const avatarEl = document.getElementById('avatarEl');
const studentNameEl = document.getElementById('studentNameEl');
const studentIdEl = document.getElementById('studentIdEl');
const punchBadge = document.getElementById('punchBadge');
const errorMsg = document.getElementById('errorMsg');

function showLoading() {
    resultArea.classList.add('show');
    loadingRow.style.display = 'flex';
    studentRow.style.display = 'none';
    errorRow.style.display = 'none';
}

function showStudent(data) {
    loadingRow.style.display = 'none';
    studentRow.style.display = 'flex';
    errorRow.style.display = 'none';

    const name = data.firstname + ' ' + data.lastname;
    const initials = ((data.firstname?.[0] ?? '') + (data.lastname?.[0] ?? '')).toUpperCase();

    studentNameEl.textContent = name;
    studentIdEl.textContent = data.id_number;

    if (data.avatar) {
        avatarEl.innerHTML = `<img src="/storage/avatars/${data.avatar}" alt="${name}">`;
    } else {
        avatarEl.textContent = initials;
    }

    const punchType = data.punch_type.toUpperCase();
    punchBadge.textContent = punchType;
    punchBadge.className = 'punch-badge ' + (punchType === 'IN' ? 'badge-in' : 'badge-out');
}

function showError(msg) {
    loadingRow.style.display = 'none';
    studentRow.style.display = 'none';
    errorRow.style.display = 'flex';
    errorMsg.textContent = msg || 'Student not found';
}

function reset() {
    input.value = '';
    resultArea.classList.remove('show');
    input.focus();
}

input.addEventListener('keydown', function(e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        const value = input.value.trim();
        if (!value) return;

        showLoading();

        fetch(`/scan/${value}`)
            .then(r => {
                if (!r.ok) throw new Error(`HTTP ${r.status}`);
                return r.json();
            })
            .then(data => {
                if (data.success) {
                    showStudent(data);
                } else {
                    showError('Student not found');
                }
                setTimeout(reset, 3000);
            })
            .catch((err) => {
                showError(err.message);
                setTimeout(reset, 3000);
            });
    }
});
</script>

</body>
</html>