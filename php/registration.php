<script>
    function register() {
        var name = document.forms["RegForm"]["Name"];
        var email = document.forms["RegForm"]["EMail"];
        var faculty_number = document.forms["RegForm"]["FacultyNumber"];
        var password = document.forms["RegForm"]["Password"];

        
  
        if (name.value == "") {
            window.alert("Моля, въведете вашето име!");
            name.focus();
            return false;
        }
  
        if (email.value == "") {
            window.alert("Моля, въведете вашият и-мейл!");
            email.focus();
            return false;
        }

        if (password.value == "") {
            window.alert("Моля, въведете парола!");
            password.focus();
            return false;
        }

        if (faculty_number.value == "") {
            window.alert("Моля, въведете вашия фацултетен номер!");
            faculty_number.focus();
            return false;
        }
 
        return true;
    }
</script>