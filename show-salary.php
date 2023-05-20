<?php
require "config.php";

use App\Employee;

if (isset($_GET['emp_no'])) {
    $emp_no = $_GET['emp_no'];
    $employees = Employee::getByEmpNo($emp_no);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <style>
        body {
            margin: 20px auto;
        }

        .container {
            margin-top: 20px;
        }

        .header {
            text-align: left;
            color: blue;
        }
    </style>
    <title>SALARY HISTORY</title>
</head>
<body>
    <div class="container">
        <div class="row header">
            <h1>SALARY HISTORY</h1>
        </div>
        <a href="show-employee.php" class="btn btn-default" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-align: center; text-decoration: none; font-size: 16px; border-radius: 5px; margin-bottom: 20px;">Return</a>
        <?php if (isset($employees) && count($employees) > 0) { ?>
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>FROM DATE</th>
                        <th>TO DATE</th>
                        <th>SALARY</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee) { ?>
                        <tr>
                            <td><?php echo $employee->getHireDate(); ?></td>
                            <td><?php echo $employee->getEndDate(); ?></td>
                            <td><?php echo $employee->getSalary(); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No employees found for department <?php echo $emp_no; ?></p>
        <?php } ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>
