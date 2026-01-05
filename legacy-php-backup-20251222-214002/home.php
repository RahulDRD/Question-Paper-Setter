<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bhilai Institute of Technology, Durg</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-1.13.6/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;600&display=swap');

      :root {
        --primary-gradient: linear-gradient(135deg, #BACEE6 0%, #9F92C7 50%, #D4BAD3 75%, #789ECF 100%);
        --secondary-gradient: linear-gradient(135deg, #A8BBD8 0%, #3B7A57 50%, #C2A8C1 75%, #6689B8 100%);
        --card-bg: rgba(255, 255, 255, 0.7);
        --text-primary: #2d3748;
        --text-secondary: #4a5568;
        --border-color: rgba(255, 255, 255, 0.3);
        --shadow-light: 0 8px 32px rgba(186, 206, 230, 0.25);
        --shadow-hover: 0 12px 20px rgba(0, 0, 0, 0.1);
        --accent-color: #9F92C7;
      }

      * {
        box-sizing: border-box;
        font-family: 'DM Sans', sans-serif;
      }

      body {
        background: var(--primary-gradient);
        min-height: 100vh;
        padding: 2rem 0;
      }

      .container-main {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 1.5rem;
      }

      .header-section {
        height: 120px;
        display: flex;
        align-items: center;
        margin-bottom: 2rem;
      }

      .logo-container {
        display: flex;
        justify-content: flex-start;
      }

      .logo-img {
        max-width: 600px;
        height: auto;
        border-radius: 0.5rem;
      }

      .card-main {
        background: var(--card-bg);
        backdrop-filter: blur(10px);
        border-radius: 1.5rem;
        border: 1px solid var(--border-color);
        box-shadow: var(--shadow-light);
        padding: 2rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .card-main:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-hover);
      }

      table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 0.5rem;
      }

      .table-borderless td {
        padding: 0.5rem;
        vertical-align: middle;
      }

      .form-select, .form-control {
        border-radius: 0.75rem;
        border: 2px solid rgba(159, 146, 199, 0.3);
        padding: 0.75rem 1rem;
        background: rgba(255, 255, 255, 0.9);
        transition: all 0.3s ease;
      }

      .form-select:focus, .form-control:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 0.2rem rgba(159, 146, 199, 0.15);
      }

      .btn-primary {
        background: var(--secondary-gradient);
        border-color: black;
        border-radius: 0.75rem;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(159, 146, 199, 0.3);
      }

      .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(159, 146, 199, 0.5);
      }

      .btn-dark, .btn-warning {
        border-radius: 0.75rem;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
        color: white;
      }

      .btn-dark {
        background: #3B7A57;
        box-shadow: 0 4px 12px rgba(120, 158, 207, 0.3);
      }

      .btn-warning {
        background: #D4BAD3;
        box-shadow: 0 4px 12px rgba(212, 186, 211, 0.3);
      }
      /* Ensure dropdown arrows are visible across browsers */
      select.form-select, .form-select {
        -webkit-appearance: menulist;
        -moz-appearance: menulist;
        appearance: auto;
        background-image: none !important;
      }

      .lbl {
        background: transparent;
        border: none;
        font-weight: 600;
        color: var(--text-primary);
      }

      #displaydetails, #q {
        margin: 1.5rem 0;
        padding: 1.5rem;
        background: transparent;
        border-radius: 1rem;
        box-shadow: none;
      }

      .action-buttons {
        margin-top: 2rem;
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
      }

      .modal-popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1050;
        overflow-y: auto;
      }

      .modal-popup-content {
        background: var(--card-bg);
        backdrop-filter: blur(10px);
        margin: 10vh auto;
        padding: 2rem;
        border-radius: 1.5rem;
        border: 1px solid var(--border-color);
        box-shadow: var(--shadow-hover);
        width: 90%;
        max-width: 800px;
        animation: modalFadeIn 0.3s ease-out;
      }

      @keyframes modalFadeIn {
        from { opacity: 0; transform: translateY(-30px); }
        to { opacity: 1; transform: translateY(0); }
      }

      .modal-popup-close {
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: var(--text-secondary);
        transition: color 0.3s ease;
      }

      .modal-popup-close:hover {
        color: var(--accent-color);
      }

      #printtbl {
        max-height: 60vh;
        overflow-y: auto;
        padding: 1rem;
      }

      #printtbl h2, #printtbl h3, #printtbl p {
        margin: 0.5rem 0;
      }

      @media (max-width: 768px) {
        .container-main {
          max-width: 100%;
          padding: 0 1rem;
        }

        .header-section {
          height: 100px;
        }

        .card-main {
          padding: 1rem;
        }

        .table-borderless td {
          display: block;
          width: 100%;
          margin-bottom: 0.5rem;
        }

        .form-select, .form-control, .btn {
          width: 100%;
        }
      }
    </style>
  </head>
  <body>
    <div class="container-main">
      <div class="header-section">
        <div class="logo-container">
          <img src="./images/logo2.png" class="img-fluid logo-img" alt="BIT Logo">
        </div>
      </div>

      <div class="card-main">
        <table class="table table-borderless">
          <tr>
            <td>
              <select class="form-select" id="dept">
                <option value="Select">Select Department</option>
                <!-- Departments will be loaded via AJAX -->
              </select>
            </td>
            <td>
              <select class="form-select" id="sem">
                <option value="Select">Select Semester</option>
                <option value="1">Sem-1</option>
                  <option value="2">Sem-2</option>
                  <option value="3">Sem-3</option>
                  <option value="4">Sem-4</option>
                  <option value="5">Sem-5</option>
                  <option value="6">Sem-6</option>
                  <option value="7">Sem-7</option>
                  <option value="8">Sem-8</option>
                </select>
              </select>
            </td>
            <td>
              <select class="form-select" id="exam">
                <option value="Select">Select Exam Type</option>
                <option value="CT-1">CT-1</option>
                <option value="CT-2">CT-2</option>
                <option value="End Sem Exam">End Sem Exam</option>
              </select>
            </td>
            <td>
              <select class="form-select" id="sub">
                <option value="Select">Select Subject Code</option>
              </select>
            </td>
            <td>
              <input type="date" class="form-control" id="dateofexam" />
            </td>
            <td>
              <button class="btn btn-primary" id="ques">
                <i class="fas fa-tasks"></i> Generate Paper
              </button>
            </td>
          </tr>
        </table>
        <table class="table table-borderless">
          <tr>
            <td class="text-end">Max Time:</td>
            <td><input class="form-control w-75" type="text" readonly id="maxtime"/></td>
            <td class="text-end">Max Marks:</td>
            <td><input class="form-control w-75" type="text" readonly id="maxmarks"/></td>
          </tr>
        </table>

        <div class="text-center">
          <div id="displaydetails" class="d-none">
 Sistine Chapel">
            <div class="h5">
              <u>
                <input readonly class="lbl" type="text" id="d" name="dept">
                <input readonly class="lbl" type="text" id="s" name="sem">
                <input readonly class="lbl" type="text" id="e" name="exam_type">
              </u>
            </div>
            <div class="h5">
              <u><input readonly class="lbl" type="text" id="su" name="subject"></u>
            </div>
            <div class="d-flex justify-content-center gap-4 mt-3 flex-wrap">
              <span class="h5">
                <u>Maximum Time: <input readonly class="lbl" type="text" id="mt" name="mt"></u>
              </span>
              <span class="h5">
                <u>Maximum Marks: <input readonly class="lbl" type="text" id="mm" name="mm"></u>
              </span>
            </div>
          </div>
          <div id="q"></div>
          <div class="action-buttons">
            <button class="btn btn-primary d-none" id="download">
              <i class="bi bi-file-earmark-arrow-down me-2"></i>Preview Paper
            </button>
            <a class="btn btn-dark" href="./index.html">
              <i class="bi bi-house-door me-2"></i>Home
            </a>
            <button class="btn btn-primary" id="autocreate">
              <i class="bi bi-magic me-2"></i>Auto Create
            </button>
            <a href="#printtbl" class="btn btn-warning d-none" id="showdetail">
              <i class="bi bi-eye me-2"></i>View
            </a>
          </div>
        </div>
      </div>

      <div id="questionPopup" class="modal-popup">
        <div class="modal-popup-content">
          <button class="modal-popup-close" id="closePopup">×</button>
          <section id="printtbl"></section>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-1.13.6/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/datatables.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script src="./index.js"></script>
      <script>
        $(document).ready(function() {
        // Load departments on page load
        function loadDepartments() {
          $.ajax({
            url: 'get_department_options.php',
            type: 'GET',
            success: function(options) {
              $('#dept').html(options);
            },
            error: function(xhr, status, error) {
              console.error('AJAX Error:', status, error);
              alert('Failed to load departments: ' + error);
            }
          });
        }
        // Initialize departments
        loadDepartments();
          const modal = document.getElementById('questionPopup');
          const selectBtn = document.getElementById('ques');
          const closeBtn = document.getElementById('closePopup');
          const downloadBtn = document.getElementById('download');

          downloadBtn.addEventListener("click", function () {
            // Get form values
            const dept = document.getElementById('dept').value;
            const sem = document.getElementById('sem').value;
            const exam = document.getElementById('exam').value;
            const subject = document.getElementById('sub').value;
            const date = document.getElementById('dateofexam').value;
            const maxTime = document.getElementById('maxtime').value || '2 hours';
            const maxMarks = document.getElementById('maxmarks').value || '100';

            // Validate inputs
            if (dept === 'Select' || sem === 'Select' || exam === 'Select' || subject === 'Select' || !date) {
              alert('Please fill in all fields before generating the question paper.');
              return;
            }
            
            // Populate modal with question paper preview
            const printtbl = document.getElementById('printtbl');
            printtbl.innerHTML = `
              <h2>Bhilai Institute of Technology, Durg</h2>
              <h3>Question Paper</h3>
              <p><strong>Department:</strong> ${dept}</p>
              <p><strong>Semester:</strong> ${sem}</p>
              <p><strong>Exam Type:</strong> ${exam}</p>
              <p><strong>Subject:</strong> ${subject}</p>
              <p><strong>Date:</strong> ${date}</p>
              <p><strong>Maximum Time:</strong> ${maxTime}</p>
              <p><strong>Maximum Marks:</strong> ${maxMarks}</p>
              <hr>
              <h4>Sample Questions</h4>
              <p>1. Sample MCQ question (2 marks)</p>
              <p>2. Sample short answer question (5 marks)</p>
              <p>3. Sample long answer question (10 marks)</p>
            `;

            // Show modal
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';

            // Generate PDF
            const docDefinition = {
              content: [
                { text: 'Bhilai Institute of Technology, Durg', style: 'header' },
                { text: 'Question Paper', style: 'subheader' },
                { text: `Department: ${dept}`, style: 'info' },
                { text: `Semester: ${sem}`, style: 'info' },
                { text: `Exam Type: ${exam}`, style: 'info' },
                { text: `Subject: ${subject}`, style: 'info' },
                { text: `Date: ${date}`, style: 'info' },
                { text: `Maximum Time: ${maxTime}`, style: 'info' },
                { text: `Maximum Marks: ${maxMarks}`, style: 'info' },
                { text: '', style: 'spacer' },
                { text: 'Sample Questions', style: 'subheader' },
                { text: '1. Sample MCQ question (2 marks)' },
                { text: '2. Sample short answer question (5 marks)' },
                { text: '3. Sample long answer question (10 marks)' }
              ],
              styles: {
                header: { fontSize: 18, bold: true, alignment: 'center', margin: [0, 0, 0, 10] },
                subheader: { fontSize: 14, bold: true, margin: [0, 10, 0, 5] },
                info: { fontSize: 12, margin: [0, 2, 0, 2] },
                spacer: { margin: [0, 10, 0, 10] }
              }
            };
          });

          closeBtn.addEventListener('click', closeModal);

          window.addEventListener('click', function(event) {
            if (event.target === modal) {
              closeModal();
            }
          });

          function closeModal() {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
            document.getElementById('printtbl').innerHTML = ''; // Clear preview
          }

          const inputs = document.querySelectorAll('#mcqCount, #mcqMarks, #shortCount, #shortMarks, #longCount, #longMarks');
          inputs.forEach(input => {
            input.addEventListener('input', calculateTotals);
          });

          function calculateTotals() {
            const mcqCount = parseInt(document.getElementById('mcqCount')?.value) || 0;
            const mcqMarks = parseInt(document.getElementById('mcqMarks')?.value) || 0;
            const shortCount = parseInt(document.getElementById('shortCount')?.value) || 0;
            const shortMarks = parseInt(document.getElementById('shortMarks')?.value) || 0;
            const longCount = parseInt(document.getElementById('longCount')?.value) || 0;
            const longMarks = parseInt(document.getElementById('longMarks')?.value) || 0;

            const mcqTotal = mcqCount * mcqMarks;
            const shortTotal = shortCount * shortMarks;
            const longTotal = longCount * longMarks;
            const grandTotal = mcqTotal + shortTotal + longTotal;

            if (document.getElementById('mcqTotal')) document.getElementById('mcqTotal').value = mcqTotal;
            if (document.getElementById('shortTotal')) document.getElementById('shortTotal').value = shortTotal;
            if (document.getElementById('longTotal')) document.getElementById('longTotal').value = longTotal;
            if (document.getElementById('grandTotal')) document.getElementById('grandTotal').value = grandTotal;
          }

          calculateTotals();
        });
      </script>
    </div>
  </body>
</html>