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
  $('.edit-btn').click(function () {
    // Get data from the button
    const id = $(this).data('id');
    const prénom = $(this).data('prénom');
    const nom = $(this).data('nom');
    const email = $(this).data('email');
    const tel = $(this).data('tel');
    const sexe = $(this).data('sexe');
    const description = $(this).data('description');

    // Populate the modal fields
    $('#edit-id').val(id);
    $('#edit-prénom').val(prénom);
    $('#edit-nom').val(nom);
    $('#edit-email').val(email);
    $('#edit-tel').val(tel);
    $('#edit-sexe').val(sexe);
    $('#edit-description').val(description);

    // Show the modal
    $('#editModal').modal('show');
  });
});
$(document).ready(function () {
  // Handle the View button click event
  $('.view-btn').click(function () {
    // Get the description from the data attribute
    const description = $(this).data('description');

    // Populate the modal description field
    $('#view-description').val(description);

    // Show the modal
    $('#viewModal').modal('show');
  });
});
$(document).ready(function () {
  // Handle the Edit button click event
  $('.edit-btn').click(function () {
    const id = $(this).data('id');
    const prénom = $(this).data('prénom');
    const nom = $(this).data('nom');
    const email = $(this).data('email');
    const tel = $(this).data('tel');
    const sexe = $(this).data('sexe');
    const description = $(this).data('description'); // Correctly capture the description

    // Populate the modal fields
    $('#edit-id').val(id);
    $('#edit-prénom').val(prénom);
    $('#edit-nom').val(nom);
    $('#edit-email').val(email);
    $('#edit-tel').val(tel);
    $('#edit-sexe').val(sexe);
    $('#edit-description').val(description); // Ensure the description is passed correctly

    // Show the modal
    $('#editModal').modal('show');
  });

  // Handle the View button click event
  $('.view-btn').click(function () {
    const description = $(this).data('description'); // Get the description from the button's data attribute

    console.log(description); // Debugging: Check if description is being passed correctly

    // Populate the modal description field
    $('#view-description').val(description);

    // Show the modal
    $('#viewModal').modal('show');
  });
});

