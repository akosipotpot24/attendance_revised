<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card-box {
            width: 100%;
            max-width: 550px;
            padding: 50px;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            text-align: center;
            backdrop-filter: blur(10px);
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .scanner-input {
            height: 70px;
            font-size: 1.6rem;
            text-align: center;
            border-radius: 15px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .scanner-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .student-name {
            margin-top: 30px;
            font-size: 1.8rem;
            font-weight: bold;
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .scan-icon {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 20px;
        }

        .success-icon, .error-icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .profile-img {
            border: 3px solid #667eea;
            transition: transform 0.3s ease;
        }

        .profile-img:hover {
            transform: scale(1.05);
        }

        .loading-spinner {
            display: none;
            margin-top: 20px;
        }

        .loading-spinner.show {
            display: block;
        }
       
        
    </style>
</head>
<body>

<div class="card-box">

    <!-- Back button (separate) -->
    <div class="d-flex justify-content-end">
        <a href="/viewStudents" class=" btn-outline-primary">
            <i class="bi bi-arrow-return-left"></i>
        </a>
    </div>

    <!-- Centered Scan Icon -->
    <div class="scan-icon text-center my-3">
        <i class="bi bi-upc-scan fs-1"></i>
    </div>

    <h4 class="mb-3 text-center">Scan Your ID</h4>
    <p class="text-muted mb-4 text-center">PAKI SCAN BAGO AKO MAGALIT</p>

    <input type="text"
           id="barcodeInput"
           class="form-control scanner-input mb-4"
           placeholder="Scan here..."
           autofocus>

    <div id="loadingSpinner" class="loading-spinner text-center">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <div id="studentName" class="student-name d-none text-center"></div>
</div>

<script>
const input = document.getElementById('barcodeInput');
const nameDisplay = document.getElementById('studentName');
const loadingSpinner = document.getElementById('loadingSpinner');

input.addEventListener('keydown', function(e) {
    if (e.key === 'Enter') {
        e.preventDefault();

        let value = input.value.trim();

        if (value !== '') {
            // Show loading spinner
            loadingSpinner.classList.add('show');
            nameDisplay.classList.add('d-none');

            fetch(`/scan/${value}`)
            .then(response => response.json())
            .then(data => {
                // Hide loading spinner
                loadingSpinner.classList.remove('show');

                nameDisplay.classList.remove('d-none');

                if (data.success) {
                    nameDisplay.classList.remove('text-danger');
                    nameDisplay.classList.add('text-success');

                    const punchType = data.punch_type.toUpperCase();
                    const punchColor = punchType === 'IN' ? 'text-success' : 'text-primary';
                    const punchIcon = punchType === 'IN' ? 'bi-check-circle-fill' : 'bi-box-arrow-right';

                    nameDisplay.innerHTML = `
                    <div class="success-icon ${punchColor}">
                        <i class="bi ${punchIcon}"></i>
                    </div>
                    <div class="text-center mb-3">
                        <img src="/storage/avatars/${data.avatar}"
                            class="rounded-circle img-thumbnail profile-img"
                            width="150"
                            height="150"
                            alt="Profile">
                    </div>
                    <div class="${punchColor} fw-bold">${data.student_number}</div>
                    <div class="text-dark fs-5">${data.firstname} ${data.lastname}</div>
                    <div class="mt-2">
                        <span class="badge ${punchType === 'IN' ? 'bg-success' : 'bg-danger'} fs-6">${punchType}</span>
                    </div>
                    `;

                } else {
                    nameDisplay.classList.remove('text-success');
                    nameDisplay.classList.add('text-danger');
                    nameDisplay.innerHTML = `
                    <div class="error-icon">
                        <i class="bi bi-x-circle-fill"></i>
                    </div>
                    <div>Student not found</div>
                    `;
                }

                // reset after scan
                setTimeout(() => {
                    input.value = '';
                    nameDisplay.classList.add('d-none');
                    input.focus();
                }, 3000);

            })
            .catch(error => {
                console.error("Scan error:", error);
                loadingSpinner.classList.remove('show');
                nameDisplay.classList.remove('d-none');
                nameDisplay.classList.add('text-danger');
                nameDisplay.innerHTML = `
                <div class="error-icon">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                </div>
                <div>Error occurred</div>
                `;
                setTimeout(() => {
                    nameDisplay.classList.add('d-none');
                    input.focus();
                }, 3000);
            });

        }

    }

});
</script>

</body>
</html>