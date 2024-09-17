$(document).ready(function () {
  const backend_url = "http://127.0.0.1:8000/api";
  const studentId = new URLSearchParams(window.location.search).get("id"); // Get the ID parameter from URL

  if (studentId) {
    $.ajax({
      url: `${backend_url}/student/${studentId}`,
      method: "GET",
      success: function (response) {
        // Populate the form with the student data
        $("#name").val(response.name);
        $("#student_id").val(response.student_id);
        $("#phone").val(response.phone);
        $("#father_name").val(response.father_name);
        $("#mother_name").val(response.mother_name);
      },
      error: function (xhr, status, error) {
        console.error("Error fetching student data:", error);
      },
    });
  }

  $("#student-form").submit(function (e) {
    e.preventDefault();
    const name = $("#name").val();
    const student_id = $("#student_id").val();
    const phone = $("#phone").val();
    const father_name = $("#father_name").val();
    const mother_name = $("#mother_name").val();
    $.ajax({
      url: `${backend_url}/student/${studentId}`,
      method: "PUT",
      data: {
        name: name,
        student_id: student_id,
        phone: phone,
        father_name: father_name,
        mother_name: mother_name,
      },
      success: function (student) {
        $("#student-form")[0].reset();
        window.location.href = "index.html";
      },
    });
  });
});
