<?php include("template/cabecera.php")?>

<div class="jumbotron">
    <h1 class="display-3">Distancia de Euclides</h1>
    <p class="lead">Formularios para poner en práctca el algoritmo de Bayes</p>
    <button id="submit" type="submit" onclick="showLoading()" class="btn btn-warning mt-3">Aprender</button>
    </p>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

<script type="text/javascript">

    var sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140">' +
            '<g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke' +
            '="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-' +
            'linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 8' +
            '4 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-line' +
            'cap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="' +
            '300"></path></g></svg></div>';

    const showLoading = function () {
        swal.fire({
            title: 'Aprendiendo...',
            allowEscapeKey: false,
            allowOutsideClick: false,
            timer: 2000,
            onOpen: () => {
                swal.showLoading();
            }
        })
    };
</script>

<?php include("template/piepagina.php")?>


       