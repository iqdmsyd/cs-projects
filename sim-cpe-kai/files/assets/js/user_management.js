"use strict";
$(document).ready(function() {
    $('#verifyModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      // Extract info from data-* attributes
      var id_user = button.data('id_user') 
      var nip = button.data('nip') 
      var username = button.data('username') 
      var nama_lengkap = button.data('nama_lengkap') 
      var email = button.data('email') 
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-body #id_user').val(id_user)
      modal.find('.modal-body #nip').val(nip)
      modal.find('.modal-body #username').val(username)
      modal.find('.modal-body #nama_lengkap').val(nama_lengkap)
      modal.find('.modal-body #email').val(email)
    });

    $('#userListModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      // Extract info from data-* attributes
      var id_user = button.data('id_user') 
      var nip = button.data('nip') 
      var username = button.data('username') 
      var nama_lengkap = button.data('nama_lengkap') 
      var email = button.data('email') 
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-body #id_user').val(id_user)
      modal.find('.modal-body #nip').val(nip)
      modal.find('.modal-body #username').val(username)
      modal.find('.modal-body #nama_lengkap').val(nama_lengkap)
      modal.find('.modal-body #email').val(email)

      document.getElementById('namaDelete').innerHTML = nama_lengkap
      document.getElementById('idDelete').value = id_user
    });

    $('#userVerifyModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      // Extract info from data-* attributes
      var id_user = button.data('id_user') 
      var nip = button.data('nip') 
      var username = button.data('username') 
      var nama_lengkap = button.data('nama_lengkap') 
      var email = button.data('email') 
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-body #id_user').val(id_user)
      modal.find('.modal-body #nip').val(nip)
      modal.find('.modal-body #username').val(username)
      modal.find('.modal-body #nama_lengkap').val(nama_lengkap)
      modal.find('.modal-body #email').val(email)

      document.getElementById('namaDelete').innerHTML = nama_lengkap
      document.getElementById('idDelete').value = id_user
    });
});