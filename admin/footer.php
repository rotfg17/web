<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Desarrollado por Robinson Chalas y Noel Roja &copy; 2023</div>
            <div>
                <a href="#">Política de privacidad</a>
                &middot;
                <a href="#">Términos &amp; Condiciones</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>

<script>
$(document).ready(function() {

    $("#sendmensagem").click(function() {
        var thedataID = $(this).attr("data-idfinancial");
        $.ajax({
            async: true,
            type: "GET",
            url: 'send-financial.php?id=' + thedataID,

            success: function(data) {

                if (data == 'false') {
                    // Sem erros

                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso',
                        text: 'Sua mensagem foi enviada!',
                        footer: '<a href="javascript:;">Responderemos assim que possível.</a>',
                        timer: 3000,
                        timerProgressBar: true
                    })

                } else {
                    // Com erros

                    Swal.fire({
                        icon: 'error',
                        title: 'Ops...',
                        text: 'Algo deu errado!',
                        footer: '<a href="javascript:;">Por favor, tente novamente mais tarde!</a>',
                        timer: 3000,
                        timerProgressBar: true
                    })
                }
            },
            error: function(data) {
                console.log(data);
            }
        })
    })
});
</script>

</body>

</html>