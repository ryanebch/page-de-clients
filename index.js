let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .nav');
let header = document.querySelector('.header');


menu.onclick = () => {
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
}
window.onscroll = () => {
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
  if (window.scrollY > 0) {
    header.classList.add('active');
  } else {
    header.classList.remove('active');
  }
}
/*---------*/
$(document).ready(function () {
  // Handle edit button click event
  $('.edit-btn').click(function () {
    var userId = $(this).data('id');
    var userFirstName = $(this).data('prénom');
    var userLastName = $(this).data('nom');
    var userEmail = $(this).data('email');
    var userPhone = $(this).data('tel');
    var userSexe = $(this).data('sexe');
    var userDescription = $(this).data('description');

    // Set data into modal form fields
    $('#edit-id').val(userId);
    $('#edit-prénom').val(userFirstName);
    $('#edit-nom').val(userLastName);
    $('#edit-email').val(userEmail);
    $('#edit-tel').val(userPhone);
    $('#edit-sexe').val(userSexe);
    $('#edit-description').val(userDescription);

    // Show the edit modal
    $('#editModal').modal('show');
  });

  // Handle view button click event
  $('.view-btn').click(function () {
    var description = $(this).data('description');

    // Set description into view modal
    $('#view-description').val(description);

    // Show the view modal
    $('#viewModal').modal('show');
  });
});
