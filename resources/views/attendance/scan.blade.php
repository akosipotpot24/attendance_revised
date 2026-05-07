<x-hello>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap');

        body {
            background-color: #ffffff;
            font-family: 'Montserrat', sans-serif;
        }

        .container {
            text-align: center;
        }

        h2, h3, h4 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }

        #status {
            font-size: 30px;
            font-weight: bold;
        }

        .input-field {
            width: 250px;
            padding: 12px;
            font-size: 18px;
            border: 2px solid #007bff;
            border-radius: 25px;
            text-align: center;
            outline: none;
        }

        .attendance-box {
            margin-top: 20px;
            padding: 20px;
            border-radius: 20px;
            background-color: #f0f0f0;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            pointer-events: none;
        }

        .attendance-box.fade-visible {
            opacity: 1;
            pointer-events: auto;
        }

        .attendance-box.fade-hidden {
            opacity: 0;
            pointer-events: none;
        }

        #student_avatar {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-top: 15px;
            border: 2px solid #007bff;
            display: none;
        }
    </style>

    <div class="container">
        <h2 style="color: #0a095f;" class="mt-5">COLLEGE LEARNING RESOURCE CENTER</h2>

        <form id="scan-form" class="mt-3">
            @csrf
            <input type="text" id="student_number" name="student_number"
                class="input-field"
                placeholder="📌 Scan Your ID Here" autofocus>
        </form>

        <div id="attendance_box" class="attendance-box mb-5 fade-hidden">
            <h3 id="student_name" class="text-dark"></h3>
            <img id="student_avatar" src="" alt="Student Avatar" class="img-thumbnail mx-auto">
            <h4 id="student_id" class="text-secondary"></h4>
            <h4 class="entry-info" id="student_sort1"></h4>
            <h2 id="status"></h2>
            <h4 class="entry-info" id="olopsc_id"></h4>
            <h4 class="entry-info" id="entry_time"></h4>
        </div>
    </div>

    <script>
    document.getElementById('scan-form').addEventListener('submit', function(event) {
        event.preventDefault();

        let studentId = document.getElementById('student_number').value;
        let attendanceBox = document.getElementById('attendance_box');
        let studentNameElement = document.getElementById('student_name');
        let studentIdElement = document.getElementById('student_id');
        let studentAvatarElement = document.getElementById('student_avatar');
        let studentSort1Element = document.getElementById('student_sort1');
        let statusElement = document.getElementById('status');
        let olopscIdElement = document.getElementById('olopsc_id');
        let entryTimeElement = document.getElementById('entry_time');

        fetch("{{ route('/scan/{student_number}) }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ student_number: studentId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.name) {
                // Show attendance box with fade
                attendanceBox.classList.remove('fade-hidden');
                attendanceBox.classList.add('fade-visible');

                studentNameElement.textContent = data.name;
                studentIdElement.textContent = data.student_id;
                statusElement.textContent = data.status ? data.status : "Unknown";
                statusElement.style.color = data.status === "IN" ? "green" : "red";

                olopscIdElement.textContent = "Your OLOPSC ID is: " + data.student_id;
                entryTimeElement.textContent = "Entry time is: " + new Date().toLocaleTimeString();

                if (data.avatar) {
                    studentAvatarElement.src = data.avatar;
                    studentAvatarElement.style.display = "block";
                } else {
                    studentAvatarElement.style.display = "none";
                }

                studentSort1Element.textContent = "Grade & Section: " + (data.sort1 ?? "N/A");

            } else {
                // Hide attendance box
                attendanceBox.classList.remove('fade-visible');
                attendanceBox.classList.add('fade-hidden');

                studentNameElement.textContent = "Student Not Found";
                studentIdElement.textContent = "";
                studentAvatarElement.style.display = "none";
                studentSort1Element.textContent = "";
                statusElement.textContent = "";
                olopscIdElement.textContent = "";
                entryTimeElement.textContent = "";
            }

            document.getElementById('student_number').value = "";

            setTimeout(() => {
                attendanceBox.classList.remove('fade-visible');
                attendanceBox.classList.add('fade-hidden');

                studentNameElement.textContent = "";
                studentIdElement.textContent = "";
                studentAvatarElement.style.display = "none";
                studentSort1Element.textContent = "";
                statusElement.textContent = "";
                olopscIdElement.textContent = "";
                entryTimeElement.textContent = "";
            }, 5000);
        })
        .catch(error => {
            console.error("Fetch error:", error);
            attendanceBox.classList.remove('fade-visible');
            attendanceBox.classList.add('fade-hidden');

            studentNameElement.textContent = "Error fetching student data";
            studentIdElement.textContent = "";
            studentAvatarElement.style.display = "none";
            studentSort1Element.textContent = "";
            statusElement.textContent = "";
            olopscIdElement.textContent = "";
            entryTimeElement.textContent = "";
        });
    });
    </script>
</x-hello>
