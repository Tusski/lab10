<?php

require "config.php";
use App\Employee;

$employee = Employee::list();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <title>List of Managers</title>
</head>
<body>
    <div class="container">
        <div class="row header" style="text-align: left; color: blue;">
            <h1>LIST OF MANAGERS</h1>
        </div>

        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>DEPARTMENT NUMBER</th>
                    <th>DEPARTMENT NAME</th>
                    <th>MANAGER NAME</th>
                    <th>HIRE DATE</th>
                    <th>END DATE</th>
                    <th>TOTAL YEARS</th>
                    <th>EMPLOYEES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employee as $employee): ?>
                    <tr>
                        <td><?php echo $employee->getDeptNo(); ?></td>
                        <td><?php echo $employee->getDeptName(); ?></td>
                        <td><?php echo $employee->getFullName(); ?></td>
                        <td><?php echo $employee->getHireDate(); ?></td>
                        <td>Current</td>
                        <td><?php echo $employee->getTotalYear(); ?></td>
                        <td>
                            <a href="show-employee.php?dept_no=<?php echo $employee->getDeptNo(); ?>">VIEW</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>
