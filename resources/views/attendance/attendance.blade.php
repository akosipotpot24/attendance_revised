<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Scanner (Laravel AJAX)</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-box {
            width: 100%;
            max-width: 500px;
            padding: 40px;
            border-radius: 20px;
            background: #fff;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            text-align: center;
        }

        .scanner-input {
            height: 60px;
            font-size: 1.5rem;
            text-align: center;
            border-radius: 12px;
        }

        .student-name {
            margin-top: 20px;
            font-size: 1.8rem;
            font-weight: bold;
        }

        
    </style>
</head>
<body>

<div class="card-box">
    <h4>Scan Your ID</h4>
    <p class="text-muted">PAKI SCAN BAGO AKO MAGALIT</p>

    <!-- NO FORM, just input -->
    <input type="text"
           id="barcodeInput"
           class="form-control scanner-input"
           placeholder="Scan here..."
           autofocus>

    <div id="studentName" class="student-name d-none"></div>
</div>

<script>
const input = document.getElementById('barcodeInput');
const nameDisplay = document.getElementById('studentName');

input.addEventListener('keydown', function(e) {
    if (e.key === 'Enter') {
        e.preventDefault();

        let value = input.value.trim();

        if (value !== '') {

            fetch(`/scan/${value}`)
            .then(response => response.json())
            .then(data => {

                nameDisplay.classList.remove('d-none');

                if (data.success) {

                    nameDisplay.classList.remove('text-danger');
                    nameDisplay.classList.add('text-success');

                    nameDisplay.innerHTML = `
                    <div class="text-center mb-3">
                        <img src="/storage/avatars/${data.avatar}"
                            class="rounded-circle img-thumbnail"
                            width="150"
                            height="150"
                            alt="Profile">
                    </div>
                    <div class="text-success">${data.student_number}</div>
                    <div class="text-primary">${data.firstname} ${data.lastname}</div>
                       
                    `;

                } else {

                    nameDisplay.classList.remove('text-success');
                    nameDisplay.classList.add('text-danger');
                    nameDisplay.innerText = "Student not found";

                }

                // reset after scan
                setTimeout(() => {
                    input.value = '';
                    nameDisplay.classList.add('d-none');
                    input.focus();
                }, 2000);

            })
            .catch(error => {
                console.error("Scan error:", error);
            });

        }

    }

});
</script>

</body>
</html>