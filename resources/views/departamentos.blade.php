<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Departamentos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    <h2>Departamentos de El Salvador</h2>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Departamento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departamentos as $departamento)
                        <tr>
                            <th scope="row">{{$departamento->iddepartamento}}</th>
                            <td>{{$departamento->departamento}} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        <div class="col-9"></div>
        </div>
    </div>
    </table>

</body>
</html>