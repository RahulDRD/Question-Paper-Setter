<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIT | Question Paper Setter</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-1.13.6/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/datatables.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-1.13.6/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/datatables.min.js"></script>
    <!-- Toast -->
    <link href="./jquery.toast.css" rel="stylesheet" type="text/css">
    <script src="./jquery.toast.js"></script>
    
    <style>
      @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,200;0,9..40,300;0,9..40,400;1,9..40,100;1,9..40,200;1,9..40,300;1,9..40,400&display=swap');
      * {
        font-family: 'DM Sans', sans-serif;
      }
      body {
        background: linear-gradient(to bottom, #BACEE6 0%, #D4BAD3 100%);
      }
      .gradient-bg {
        background: linear-gradient(135deg, #BACEE6 0%, #9F92C7 50%, #D4BAD3 75%, #789ECF 100%);
      }
      .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      .card-hover:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
      }
      textarea {
        min-height: 120px;
      }
      .transition-all {
        transition: all 0.3s ease;
      }
      .mic-active {
        background-color: #D4BAD3 !important;
        color: white !important;
        animation: pulse 1.5s infinite;
      }
      .hover\:bg-gradient-dark:hover {
        background: linear-gradient(135deg, #A8BBD8 0%, #8C7EB2 50%, #C2A8C1 75%, #6689B8 100%);
      }
      .focus\:ring-gradient {
        --tw-ring-color: #9F92C7;
      }
      .glass-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
      }
      .tooltip {
        position: relative;
      }
      .tooltip:hover::after {
        content: attr(data-tooltip);
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        background: #9F92C7;
        color: white;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        white-space: nowrap;
        z-index: 10;
      }
      .progress-bar {
        height: 4px;
        background: #9F92C7;
        width: 0%;
        transition: width 0.1s ease;
      }
      @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
      }
    </style>
  </head>
  <body>
    <div class="container mx-auto px-4 py-6">
      <div class="flex justify-left mb-8">
        <img src="./images/logo2.png" class="h-24" alt="logo">
      </div>

      <!-- Main Content -->
      <div class="flex flex-col lg:flex-row gap-6 mb-8">
        <!-- Add Question Card -->
        <div class="w-full lg:w-2/3 rounded-xl shadow-md overflow-hidden transition-all card-hover glass-card">
          <div class="gradient-bg px-6 py-4">
            <h2 class="text-xl font-semibold text-black">
              <i class="fas fa-question-circle text-[#4caf50] mr-2"></i> Add Question
            </h2>
          </div>
          <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Department</label>
                <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gradient focus:border-[#9F92C7]" id="dept">
                  <option value="Select">Select Department</option>
                  <!-- Departments will be loaded via AJAX -->
                </select>
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Semester</label>
                <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gradient focus:border-[#9F92C7]" id="sem">
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
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gradient focus:border-[#9F92C7]" id="sub">
                  <option value="Select">Select Subject</option>
                </select>
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Unit</label>
                <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gradient focus:border-[#9F92C7]" id="unit">
                  <option value="Select">Select Unit</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value stroked="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Marks</label>
                <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gradient focus:border-[#9F92C7]" id="marks">
                  <option value="Select">Marks type</option>
                  <option>4</option>
                  <option>8</option>
                </select>
              </div>
            </div>
            
            <div class="mb-6 relative">
              <label class="block text-sm font-medium text-gray-700 mb-1">Question</label>
              <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gradient focus:border-[#9F92C7]" id="question" placeholder="Write your question here..."></textarea>
              <button id="voiceBtn" class="absolute bottom-3 right-3 bg-green-700 text-white p-2 rounded-full hover:bg-[#6689B8] focus:outline-none focus:ring-2 focus:ring-gradient transition-all tooltip" data-tooltip="Start Voice Input">
                <i class="fas fa-microphone"></i>
              </button>
              <div id="voiceProgress" class="progress-bar"></div>
            </div>
            
            <button class="w-full text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400 transition-all transform hover:scale-105 tooltip" id="add" data-tooltip="Add Question"
              style="background: linear-gradient(135deg, #A8BBD8 0%, #3B7A57 50%, #C2A8C1 75%, #6689B8 100%);">
              <i class="fas fa-plus-circle mr-2"></i> Add Question
            </button>

          </div>
        </div>
        
        <!-- Add Subject Card -->
        <div class="w-full lg:w-1/3 rounded-xl shadow-md overflow-hidden transition-all card-hover glass-card">
          <div class="gradient-bg px-6 py-4">
            <h2 class="text-xl font-semibold text-black">
              <i class="fas fa-book text-[#4caf50] mr-2"></i> Add Subject
            </h2>
          </div>
          <div class="p-6">
            <div class="grid grid-cols-1 gap-4 mb-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Department</label>
                <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gradient focus:border-[#9F92C7]" id="deptsub">
                  <option value="Select">Select Department</option>
                  <!-- Departments will be loaded via AJAX -->
                </select>
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Semester</label>
                <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gradient focus:border-[#9F92C7]" id="semsub">
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
              </div>
            </div>
            
            <div class="mb-6">
              <label class="block text-sm font-medium text-gray-700 mb-1">Subject Name</label>
              <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gradient focus:border-[#9F92C7]" id="subname" placeholder="Write subject name here..."></textarea>
            </div>
            
            <button class="w-full text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-700 transition-all transform hover:scale-105 tooltip" id="addsub" data-tooltip="Add Subject"
              style="background: linear-gradient(135deg, #A8BBD8 0%, #3B7A57 50%, #C2A8C1 75%, #6689B8 100%);">
              <i class="fas fa-plus-circle mr-2"></i> Add Subject
            </button>

          </div>
        </div>
      </div>
      
      <!-- Home Button -->
      <div class="text-center mb-8">
  <a class="inline-flex items-center px-6 py-3 bg-green-700 text-white rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 transition-all transform hover:scale-105 tooltip"
     href="./index.html" data-tooltip="Go to Home">
    <i class="fas fa-home mr-2"></i> Home
  </a>
</div>


      
      <!-- All Questions Section -->
      <div class="rounded-xl shadow-lg p-6 mb-8 glass-card">
        <div class="gradient-bg px-6 py-4 rounded-t-lg">
          <h2 class="text-xl font-semibold text-black">
            <i class="fas fa-list-alt text-[#4caf50] mr-2"></i> All Questions
          </h2>
        </div>
        
        <div class="mt-6">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Department</label>
              <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gradient focus:border-[#9F92C7]" id="ddept">
                <option value="Select">Select Department</option>
                <!-- Departments will be loaded via AJAX -->
              </select>
            </div>
            
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Semester</label>
              <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gradient focus:border-[#9F92C7]" id="ssem">
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
            </div>
            
            <div class="flex items-end">
              <button class="w-full text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-700 transition-all transform hover:scale-105 tooltip" id="vsub" data-tooltip="View Questions"
  style="background: linear-gradient(135deg, #A8BBD8 0%, #3B7A57 50%, #C2A8C1 75%, #6689B8 100%);">
  <i class="fas fa-eye mr-2"></i> View Questions
</button>

            </div>
          </div>
          
          <div class="mt-4 overflow-x-auto" id="subedit"></div>
        </div>
      </div>
      
      <!-- Delete Subject Modal -->
      <div class="fixed inset-0 z-50 flex items-center justify-center hidden" id="deleteSubjectModal">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="rounded-lg shadow-xl z-50 w-full max-w-md mx-4 glass-card">
          <div class="gradient-bg px-6 py-4 rounded-t-lg">
            <h3 class="text-lg font-semibold text-white">Delete Subject</h3>
            <button class="absolute top-4 right-4 text-white hover:text-gray-200 tooltip" id="closeSubjectModal" data-tooltip="Close">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <div class="p-6">
            <p id="deleteSubjectMessage">Are you sure you want to delete this subject? This will also delete all related questions.</p>
            <input type="hidden" id="deleteSubjectSno">
          </div>
          <div class="px-6 py-4 bg-gray-50 rounded-b-lg flex justify-end space-x-3">
            <button class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all tooltip" id="cancelSubjectModal" data-tooltip="Cancel">
              Cancel
            </button>
            <button class="px-4 py-2 text-white gradient-bg rounded-md hover:bg-gradient-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gradient transition-all transform hover:scale-105 tooltip" id="confirmDeleteSubject" data-tooltip="Delete Subject">
              <i class="fas fa-trash mr-2"></i> Delete
            </button>
          </div>
        </div>
      </div>
      
      <!-- Edit Question Modal -->
      <div class="fixed inset-0 z-50 flex items-center justify-center hidden" id="modalContainer">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="rounded-lg shadow-xl z-50 w-full max-w-md mx-4 glass-card">
          <div class="gradient-bg px-6 py-4 rounded-t-lg">
            <h3 class="text-lg font-semibold text-white">Update Question</h3>
            <button class="absolute top-4 right-4 text-white hover:text-gray-200 tooltip" id="closemodal" data-tooltip="Close">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <div class="p-6">
            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gradient focus:border-[#9F92C7]" id="tear" rows="4" placeholder="Edit question..."></textarea>
          </div>
          <div class="px-6 py-4 bg-gray-50 rounded-b-lg flex justify-end space-x-3">
            <button class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all tooltip" id="cancelmodal" data-tooltip="Cancel">
              Cancel
            </button>
            <button class="px-4 py-2 text-white gradient-bg rounded-md hover:bg-gradient-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gradient transition-all transform hover:scale-105 tooltip" id="update" data-tooltip="Save Changes">
              <i class="fas fa-save mr-2"></i> Save Changes
            </button>
          </div>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function(){
        // Load departments on page load
        function loadDepartments() {
          $.ajax({
            url: 'get_department_options.php',
            type: 'GET',
            success: function(options) {
              $('#dept, #ddept, #deptsub').html(options);
            },
            error: function() {
              $.toast({
                text: "Failed to load departments",
                heading: 'Error',
                icon: 'error',
                showHideTransition: 'slide',
                allowToastClose: true,
                hideAfter: 2000,
                stack: false,
                position: 'top-right'
              });
            }
          });
        }
        // Initialize departments
        loadDepartments();

        // Voice Recognition Setup
        const voiceBtn = $('#voiceBtn');
        const questionTextarea = $('#question');
        const progressBar = $('#voiceProgress');
        let recognition;
        let isRecognizing = false;
        let inactivityTimeout;

        // Check if Web Speech API is supported
        if ('webkitSpeechRecognition' in window || 'SpeechRecognition' in window) {
          recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
          recognition.lang = 'en-US';
          recognition.interimResults = false; // Only final results
          recognition.continuous = true;

          recognition.onresult = function(event) {
            let finalTranscript = '';
            for (let i = event.resultIndex; i < event.results.length; i++) {
              if (event.results[i].isFinal) {
                finalTranscript += event.results[i][0].transcript + ' ';
              }
            }
            const currentText = questionTextarea.val();
            questionTextarea.val(currentText + finalTranscript.trim());
            resetInactivityTimeout();
          };

          recognition.onstart = function() {
            isRecognizing = true;
            voiceBtn.addClass('mic-active');
            voiceBtn.find('i').removeClass('fa-microphone').addClass('fa-microphone-slash');
            progressBar.css('width', '100%');
            $.toast({
              text: "Voice input started",
              heading: 'Listening',
              icon: 'info',
              showHideTransition: 'slide',
              allowToastClose: true,
              hideAfter: 2000,
              stack: false,
              position: 'top-right'
            });
            resetInactivityTimeout();
          };

          recognition.onend = function() {
            isRecognizing = false;
            voiceBtn.removeClass('mic-active');
            voiceBtn.find('i').removeClass('fa-microphone-slash').addClass('fa-microphone');
            progressBar.css('width', '0%');
            clearTimeout(inactivityTimeout);
            $.toast({
              text: "Voice input stopped",
              heading: 'Stopped',
              icon: 'info',
              showHideTransition: 'slide',
              allowToastClose: true,
              hideAfter: 2000,
              stack: false,
              position: 'top-right'
            });
          };

          recognition.onerror = function(event) {
            isRecognizing = false;
            voiceBtn.removeClass('mic-active');
            voiceBtn.find('i').removeClass('fa-microphone-slash').addClass('fa-microphone');
            progressBar.css('width', '0%');
            clearTimeout(inactivityTimeout);
            let errorMessage = 'Unknown error';
            switch (event.error) {
              case 'no-speech':
                errorMessage = 'No speech detected';
                break;
              case 'audio-capture':
                errorMessage = 'Microphone not available';
                break;
              case 'not-allowed':
                errorMessage = 'Microphone permission denied';
                break;
              case 'network':
                errorMessage = 'Network error';
                break;
            }
            $.toast({
              text: `Error: ${errorMessage}`,
              heading: 'Speech Error',
              icon: 'error',
              showHideTransition: 'slide',
              allowToastClose: true,
              hideAfter: 2000,
              stack: false,
              position: 'top-right'
            });
          };

          // Inactivity timeout to stop recognition after 10 seconds of silence
          function resetInactivityTimeout() {
            clearTimeout(inactivityTimeout);
            inactivityTimeout = setTimeout(() => {
              if (isRecognizing) {
                recognition.stop();
              }
            }, 10000);
          }

          // Voice button click handler
          voiceBtn.click(function() {
            if (isRecognizing) {
              recognition.stop();
            } else {
              try {
                recognition.start();
              } catch (e) {
                $.toast({
                  text: "Unable to start voice input",
                  heading: 'Error',
                  icon: 'error',
                  showHideTransition: 'slide',
                  allowToastClose: true,
                  hideAfter: 2000,
                  stack: false,
                  position: 'top-right'
                });
              }
            }
          });
        } else {
          // Disable button if Web Speech API is not supported
          voiceBtn.prop('disabled', true).addClass('opacity-50 cursor-not-allowed');
          voiceBtn.click(function() {
            $.toast({
              text: "Voice input not supported in this browser",
              heading: 'Unsupported',
              icon: 'error',
              showHideTransition: 'slide',
              allowToastClose: true,
              hideAfter: 2000,
              stack: false,
              position: 'top-right'
            });
          });
        }

        // Toggle modal
        function toggleModal() {
          $('#modalContainer').toggleClass('hidden flex');
        }
        
        // Toggle delete subject modal
        function toggleSubjectModal() {
          $('#deleteSubjectModal').toggleClass('hidden flex');
        }
        
        // Close modal on cancel or close button
        $('#closemodal, #cancelmodal').click(function() {
          toggleModal();
        });
        
        // Close subject modal on cancel or close button
        $('#closeSubjectModal, #cancelSubjectModal').click(function() {
          toggleSubjectModal();
        });
        
        // Department change handlers for Add Question and All Questions
        $('#dept, #ddept').change(function() {
          const deptId = $(this).val();
          const targetSelect = $(this).attr('id') === 'dept' ? '#sem' : '#ssem';
          loadSemesters(deptId, targetSelect);
        });

        // Department and Semester change handlers for subject dropdown
        $('#sem').change(function(){
          var d = $("#dept").val();
          var s = $("#sem").val();
          
          if (d !== "Select" && s !== "Select") {
            $.post('sub.php', {dep: d, sem: s}, function(dta){
              $('#sub').html(dta);
            }).fail(function() {
              $.toast({
                text: "Failed to load subjects",
                heading: 'Error',
                icon: 'error',
                showHideTransition: 'slide',
                allowToastClose: true,
                hideAfter: 2000,
                stack: false,
                position: 'top-right'
              });
            });
          } else {
            $('#sub').html('<option value="Select">Select Subject</option>');
          }
        });
        
        $('#dept').change(function(){
          var d = $("#dept").val();
          var s = $("#sem").val();
          
          if (d !== "Select" && s !== "Select") {
            $.post('sub.php', {dep: d, sem: s}, function(dta){
              $('#sub').html(dta);
            }).fail(function() {
              $.toast({
                text: "Failed to load subjects",
                heading: 'Error',
                icon: 'error',
                showHideTransition: 'slide',
                allowToastClose: true,
                hideAfter: 2000,
                stack: false,
                position: 'top-right'
              });
            });
          } else {
            $('#sub').html('<option value="Select">Select Subject</option>');
          }
        });

        // Department change handler for Add Subject
        $('#deptsub').change(function() {
          const deptId = $(this).val();
          loadSemesters(deptId, '#semsub');
        });
        
        // Add Question
        $('#add').click(function(){
          var semester = $("#sem").val();
          var subject = $("#sub").val();
          var dept = $("#dept").val();
          var unit = $("#unit").val();
          var ques = $("#question").val();
          let marks = $('#marks').val();
          
          if (semester === "Select" || subject === "Select" || dept === "Select" || unit === "Select" || marks === "Select" || ques === "") {
            $.toast({
              text: "Please fill all fields",
              heading: 'Error',
              icon: 'error',
              showHideTransition: 'slide',
              allowToastClose: true,
              hideAfter: 2000,
              stack: false,
              position: 'top-right'
            });
            return;
          }
          
          $.post('add.php', {sem: semester, sub: subject, dep: dept, uni: unit, que: ques, marks: marks}, function(data){
            $('#question').val("");
            $.toast({
              heading: 'Added Successfully',
              icon: 'success',
              showHideTransition: 'slide',
              allowToastClose: true,
              hideAfter: 2000,
              stack: false,
              position: 'top-right'
            });
          }).fail(function() {
            $.toast({
              text: "Failed to add question",
              heading: 'Error',
              icon: 'error',
              showHideTransition: 'slide',
              allowToastClose: true,
              hideAfter: 2000,
              stack: false,
              position: 'top-right'
            });
          });
        });
        
        // Add Subject
        $('#addsub').click(function(){
          let semester = $("#semsub").val();
          let sub = $("#subname").val();
          let dept = $("#deptsub").val();
          
          if (semester === "Select" || dept === "Select" || sub === "") {
            $.toast({
              text: "Please fill all fields",
              heading: 'Error',
              icon: 'error',
              showHideTransition: 'slide',
              allowToastClose: true,
              hideAfter: 2000,
              stack: false,
              position: 'top-right'
            });
            return;
          }
          
          $.post('addsub.php', {sem: semester, dep: dept, sub: sub}, function(data){
            $("#subname").val("");
            $.toast({
              heading: 'Added Successfully',
              icon: 'success',
              showHideTransition: 'slide',
              allowToastClose: true,
              hideAfter: 2000,
              stack: false,
              position: 'top-right'
            });
            // Reload departments and semesters to reflect new subject
            loadDepartments();
            loadSemesters(dept, '#semsub');
          }).fail(function() {
            $.toast({
              text: "Failed to add subject",
              heading: 'Error',
              icon: 'error',
              showHideTransition: 'slide',
              allowToastClose: true,
              hideAfter: 2000,
              stack: false,
              position: 'top-right'
            });
          });
        });
        
        // Delete Question
        $('body').on('click','.delq',function(){
          let dept = $('#ddept').val();
          let sno = $(this).closest('tr').find('.sno').text();
          
          if (confirm("Are you sure you want to delete this question?")) {
            $.post('deleteques.php', {sno: sno, dept: dept}, function(data){
              $('#vsub').click();
              $.toast({
                text: "Deleted",
                heading: 'Deleted',
                icon: 'error',
                showHideTransition: 'slide',
                allowToastClose: true,
                hideAfter: 2000,
                stack: false,
                position: 'top-right'
              });
            }).fail(function() {
              $.toast({
                text: "Failed to delete question",
                heading: 'Error',
                icon: 'error',
                showHideTransition: 'slide',
                allowToastClose: true,
                hideAfter: 2000,
                stack: false,
                position: 'top-right'
              });
            });
          }
        });
        
        // Delete Subject
        $('body').on('click','.delsub',function(){
          let sno = $(this).closest('tr').find('.sno').text();
          let subjectName = $(this).closest('tr').find('.sub').text();
          
          $('#deleteSubjectSno').val(sno);
          $('#deleteSubjectMessage').text(`Are you sure you want to delete the subject "${subjectName}"? This will also delete all related questions.`);
          toggleSubjectModal();
        });
        
        $('#confirmDeleteSubject').click(function(){
          const sno = $('#deleteSubjectSno').val();
          
          $.post('manage_subject.php', {sno: sno, action: 'delete'}, function(response){
            $.toast({
              text: response.message,
              heading: response.success ? 'Deleted' : 'Error',
              icon: response.success ? 'success' : 'error',
              showHideTransition: 'slide',
              allowToastClose: true,
              hideAfter: 2000,
              stack: false,
              position: 'top-right'
            });
            if (response.success) {
              toggleSubjectModal();
              location.reload(); // Refresh the page after deletion
            }
          }).fail(function() {
            $.toast({
              text: "Failed to delete subject",
              heading: 'Error',
              icon: 'error',
              showHideTransition: 'slide',
              allowToastClose: true,
              hideAfter: 2000,
              stack: false,
              position: 'top-right'
            });
          });
        });
        
        var sno = 4;
        
        // Edit Question
        $('body').on('click','.editq',function(){
          let ques = $(this).closest('tr').find('.ques').text();
          sno = $(this).closest('tr').find('.sno').text();
          $('#tear').val(ques);
          toggleModal();
        });
        
        // Update Question
        $('#update').click(function(){
          let dept = $('#ddept').val();
          let ques = $('#tear').val();
          
          if (ques === "") {
            $.toast({
              text: "Question cannot be empty",
              heading: 'Error',
              icon: 'error',
              showHideTransition: 'slide',
              allowToastClose: true,
              hideAfter: 2000,
              stack: false,
              position: 'top-right'
            });
            return;
          }
          
          $.post('updateques.php', {sno: sno, dept: dept, ques: ques}, function(data){
            $('#vsub').click();
            toggleModal();
            $.toast({
              text: "Updated Successfully",
              heading: 'Done',
              icon: 'success',
              showHideTransition: 'slide',
              allowToastClose: true,
              hideAfter: 2000,
              stack: false,
              position: 'top-right'
            });
          }).fail(function() {
            $.toast({
              text: "Failed to update question",
              heading: 'Error',
              icon: 'error',
              showHideTransition: 'slide',
              allowToastClose: true,
              hideAfter: 2000,
              stack: false,
              position: 'top-right'
            });
          });
        });
        
        // View Questions
        $('#vsub').click(function(){
          let dept = $('#ddept').val();
          let sem = $('#ssem').val();
          
          if (dept === "Select" || sem === "Select") {
            $.toast({
              text: "Please select department and semester",
              heading: 'Error',
              icon: 'error',
              showHideTransition: 'slide',
              allowToastClose: true,
              hideAfter: 2000,
              stack: false,
              position: 'top-right'
            });
            return;
          }
          
          $.post('viewques.php', {sem: sem, dept: dept}, function(data){
            $('#subedit').html(data);
            let table = new DataTable('#subeditt', {
              dom: 'Bfrtip',
              buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
              pageLength: 10,
              responsive: true
            });
          }).fail(function() {
            $.toast({
              text: "Failed to load questions",
              heading: 'Error',
              icon: 'error',
              showHideTransition: 'slide',
              allowToastClose: true,
              hideAfter: 2000,
              stack: false,
              position: 'top-right'
            });
          });
        });
      });
    </script>
  </body>
</html>