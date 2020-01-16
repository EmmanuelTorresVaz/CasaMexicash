<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script >
    $(function() {
        $('input:radio[name="radioSexo"]').change(function() {
            if ($(this).val() == '1') {
                alert("Hombre");
            } else {
                alert("Mujer");
            }
        });
    });
    </script>

    <label><input type="radio" value="1" name="radioSexo">Hombre</label>
    <label><input type="radio" value="2" name="radioSexo">Mujer</label>
