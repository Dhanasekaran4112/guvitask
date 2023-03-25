
      function editProfile() {
        // Make the form fields editable
        document.getElementById("name").readOnly = false;
        document.getElementById("email").readOnly = false;
        document.getElementById("age").readOnly = false;
        // Show the Save Changes and Cancel buttons
        document.getElementsByTagName("button")[0].style.display = "none";
        document.getElementsByTagName("button")[1].style.display = "inline-block";
        document.getElementsByTagName("button")[2].style.display = "inline-block";
      }

      function cancelEdit() {
        // Disable the form fields
        document.getElementById("name").readOnly = true;
        document.getElementById("email").readOnly = true;
        document.getElementById("age").readOnly = true;
        // Hide the Save Changes and Cancel buttons
        document.getElementsByTagName("button")[0].style.display = "inline-block";
        document.getElementsByTagName("button")[1].style.display = "none";
        document.getElementsByTagName("button")[2].style.display = "none";
        // Reset the form values to their original values
        document.getElementById("name").value = "John Doe";
        document.getElementById("email").value = "johndoe@example.com";
        document.getElementById("age").value = "25";
      }