<?php
require "config.php";

use App\Employee;

if (isset($_GET['dept_no'])) {
    $dept_no = $_GET['dept_no'];
    $employees = Employee::getById($dept_no);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap.">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body style="margin:20px auto">
    <div class="container">
        <div class="row header" style="text-align:left;color:blue">
            <h1>LIST OF EMPLOYEES</h1>
        </div>
        <a href="index.php" class="btn btn-default" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-align: center; text-decoration: none; font-size: 16px; border-radius: 5px; margin-bottom: 20px;">Return</a>
        <?php if (isset($employees) && count($employees) > 0) { ?>
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>TITLE</th>
                        <th>FULL NAME</th>
                        <th>BIRTHDAY</th>
                        <th>AGE</th>
                        <th>GENDER</th>
                        <th>HIRE DATE</th>
                        <th>SALARY</th>
                        <th>SALARY HISTORY</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee) { ?>
                        <tr>
                            <td><?php echo $employee->getTitle(); ?></td>
                            <td><?php echo $employee->getFullName(); ?></td>
                            <td><?php echo $employee->getBirth(); ?></td>
                            <td><?php echo $employee->getAge(); ?></td>
                            <td><?php echo $employee->getGender(); ?></td>
                            <td><?php echo $employee->getStartDate(); ?></td>
                            <td><?php echo $employee->getSalary(); ?></td>
                            <td>
                                <a href="show-salary.php?emp_no=<?php echo $employee->getEmpNo(); ?>">VIEW</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        <?php } else { ?>
            <p>No employees found for department <?php echo $dept_no; ?></p>
        <?php } ?>

    </div>
</body>
<script>
    $(document).ready(function(){
        $('#myTable').dataTable();
    });
</script>
</html>
