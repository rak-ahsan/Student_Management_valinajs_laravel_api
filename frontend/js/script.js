$(document).ready(function () {

    const backend_url = 'http://127.0.0.1:8000/api';

    function loadStudents() {
        $.ajax({
            url: backend_url+'/student',
            method: 'GET',
            success: function renderStudentList(students) {
                let studentRows = '';
                $.each(students, function (index, student) {
                    studentRows += `<tr>
                        <td>${student.name}</td>
                        <td>${student.student_id}</td>
                        <td>${student.phone}</td>
                        <td>${student.father_name}</td>
                        <td>${student.mother_name}</td>
                        <td>
                            <button class="btn btn-sm btn-warning edit-student" data-id="${student.id}">Edit</button>
                            <button class="btn btn-sm btn-danger delete-student" data-id="${student.id}">Delete</button>
                        </td>
                    </tr>`;
                });
                $('#student-list').html(studentRows);
            }            
        });
    }

    loadStudents(); // Initial load

    // Add new student
    $('#student-form').submit(function (e) {
        e.preventDefault();
        const name = $('#name').val();
        const student_id = $('#student_id').val();
        const phone = $('#phone').val();
        const father_name = $('#father_name').val();
        const mother_name = $('#mother_name').val();
        $.ajax({
            url: backend_url+'/student',
            method: 'POST',
            data: { name: name, student_id: student_id, phone:phone,father_name:father_name,mother_name:mother_name},
            success: function (student) {
                $('#student-form')[0].reset();
                loadStudents();
            }
        });
    });

    // Delete student
    $(document).on('click', '.delete-student', function () {
        const id = $(this).data('id');
        $.ajax({
            url: `${backend_url}/student/${id}`,
            method: 'DELETE',
            success: function () {
                loadStudents();
            }
        });
    });

    // Edit student (optional)
    $(document).on('click', '.edit-student', function () {
        const id = $(this).data('id');
        window.location.href = `edit.html?id=${id}`;
    });
    
});
