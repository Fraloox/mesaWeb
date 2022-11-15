<form action="<?php echo $action ?>" method="POST">

    <input type="hidden" id="userDni" value="<?php echo $user->dni; ?>">
    <input type="hidden" id="userRol" value="<?php echo $user->rol; ?>">

    <button type="submit" id="btnSubmit" style="display: none;"></button>

    <script>

        document.getElementById("btnSubmit").click();

    </script>

</form>


