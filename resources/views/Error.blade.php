<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/css/bootstrap.css">
    <script src="../resources/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../resources/js/bootstrap.js"></script>
    <title>Error</title>
</head>

<style>
    .bottom-sheet-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
    }
    .bottom-sheet {
        right: 0;
        left: 0;
        margin-right: auto;
        margin-left: auto;
        width: 40vw;
        height: 50vh;
        position: fixed;
        bottom: -50vh;
        z-index: 999;
        background: #fff;
        transition: all 0.3s;
        text-align: left;
    }
    .bottom-sheet.active {
        bottom: 0;
    }
</style> 

<body>
    <button id="sidebar-filtros" class="btn btn-danger text-white shadow-sm" id="menu-toggle">
        <span class="text-responsive">Ver Filtros</span>
        <svg width="1.2rem" height="1.2rem" viewBox="0 0 16 16" class="bi bi-funnel" fill="currentColor" style="margin-bottom: 4px;"><path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/></svg>
    </button>
</body>
</html>

<script>
jQuery(document).ready(function () {
    $(".overlay").on("click", function () {
        $(".bottom-sheet").removeClass("active"), $(".overlay").removeClass("active");
    }),
    $("#sidebar-filtros").on("click", function (a) {
        a.preventDefault(), $(".bottom-sheet").addClass("active"), $(".overlay").addClass("active");
    })
});
</script>