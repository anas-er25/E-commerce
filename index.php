<?php

include_once("config.php");
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title> Produits </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        .note {
            text-align: center;
            height: 80px;
            background: -webkit-linear-gradient(left, #0072ff, #8811c5);
            color: #fff;
            font-weight: bold;
            line-height: 80px;
        }

        body {
            margin: 0;
            font-family: 'Lato', sans-serif;
            font-size: 12px;
            line-height: 1.8em;
            text-transform: none;
            letter-spacing: .075em;
            font-weight: bold;
            font-style: normal;
            text-decoration: none;
            color: #e7bd74;
            background-color: rgba(34, 28, 28);
            display: block;
        }

        .title {
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .form-content {
            padding: 5%;
            border: 1px solid #ced4da;
            margin-bottom: 2%;
        }

        .form-control {
            border-radius: 1.5rem;
        }

        .btnSubmit {
            border: none;
            border-radius: 1.5rem;
            padding: 1%;
            width: 20%;
            cursor: pointer;
            background: #0062cc;
            color: #fff;
        }

        h1 {
            font-family: sans-serif;
            display: block;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            letter-spacing: 3px;
            color: hotpink;
            text-transform: uppercase;
            padding-top: 20px;
        }

        a {
            text-decoration: none;
            color: #fff;
        }

        a:hover {
            text-decoration: none;
            color: #fff;
        }

        .table-wrapper {
            width: 700px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }

        .table-title h2 {
            margin: 6px 0 0;
            font-size: 22px;
        }

        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }

        .table-title .add-new i {
            margin-right: 4px;
        }

        table.table {
            table-layout: fixed;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table th:last-child {
            width: 100px;
        }

        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }

        table.table td a.add {
            color: #27C46B;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }

        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }

        table.table .form-control.error {
            border-color: #f50000;
        }

        table.table td .add {
            display: none;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            var actions = $("table td:last-child").html();
            // Append table with add row form on add new button click
            $(".add-new").click(function() {
                $(this).attr("disabled", "disabled");
                var index = $("table tbody tr:last-child").index();
                var row = '<tr>' +
                    '<td><input type="text" class="form-control" name="reference" id="ref"></td>' +
                    '<td><input type="text" class="form-control" name="designation" id="designation"></td>' +
                    '<td><input type="text" class="form-control" name="prix" id="prix"></td>' +
                    '<td><input type="text" class="form-control" name="quantite" id="quantite"></td>' +
                    '<td>' + actions + '</td>' +
                    '</tr>';
                $("table").append(row);
                $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
                $('[data-toggle="tooltip"]').tooltip();
            });
            // Add row on add button click
            $(document).on("click", ".add", function() {
                var empty = false;
                var input = $(this).parents("tr").find('input[type="text"]');
                input.each(function() {
                    if (!$(this).val()) {
                        $(this).addClass("error");
                        empty = true;
                    } else {
                        $(this).removeClass("error");
                    }
                });
                $(this).parents("tr").find(".error").first().focus();
                if (!empty) {
                    input.each(function() {
                        $(this).parent("td").html($(this).val());
                    });
                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").removeAttr("disabled");
                }
            });
            // Edit row on edit button click
            $(document).on("click", ".edit", function() {
                $(this).parents("tr").find("td:not(:last-child)").each(function() {
                    $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").attr("disabled", "disabled");
            });
            // Delete row on delete button click
            $(document).on("click", ".delete", function() {
                $(this).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            });
        });
    </script>
</head>

<body>
    <div class="container register-form">
        <div class="form">
            <div class="note">
                <h1> Les Produits</h1>
            </div>
            <form action="crud.php" method="post">
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Reference" value="" name="reference" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Designation" value="" name="designation" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Prix" value="" name="prix" />
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Quantite" value="" name="quantite" />
                            </div>
                        </div>
                    </div>
                    <center>
                        <div class="row justify-content-start mt-4">
                            <div class="col">
                                <button type="submit" class="btnSubmit" name="action" value="ajouter"> Ajouter </button>
                                <button type="submit" class="btnSubmit" name="action" value="supprimer"> Supprimer </button>
                                <button type="submit" class="btnSubmit" name="action" value="modifier"> Modifier </button>

                            </div>
                        </div>
                    </center>
                </div>
            </form>


            <div class="container-lg">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2>Produits</h2>
                                </div>
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Reference</th>
                                    <th>Designation</th>
                                    <th>Prix</th>
                                    <th>Quantite</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $res = mysqli_query($cnx, "select * from produit;");
                                while ($row = mysqli_fetch_array($res))
                                    echo '<tr>
                            <td>' . $row[0] . '</td>
                            <td>' . $row[1] . '</td>
                            <td>' . $row[2] . '</td>
                            <td>' . $row[3] . '</td>
                            <td>
                                <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                <a class="edit" title="Edit" data-toggle="tooltip" name="action" value="modifier"><i class="material-icons">&#xE254;</i></a>
                                <a class="delete" title="Delete" data-toggle="tooltip" ><i class="material-icons">&#xE872;</i></a>
                            </td>
                        </tr>'
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</body>

</html>