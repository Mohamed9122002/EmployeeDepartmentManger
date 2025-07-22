<?php require __DIR__ . '/../partials/head.php'; ?>
<?php require __DIR__ . '/../partials/nav.php'; ?>
<?php require __DIR__ . '/../partials/banner.php'; ?>
<form method="POST" action="" class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-md space-y-4 mt-10">
  <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">Edit  Employee</h2>

  <input type="text" name="EmployeeName" value="<?= $employee['EmployeeName'] ?>" placeholder="Employee Name"
    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" >

  <input type="number"  name="Salary" value="<?= $employee['Salary'] ?>" placeholder="Salary"
    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" >

  <input type="number" value="<?= $employee['Age'] ?>" name="Age" placeholder="Age"
    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" >

  <input type="email" value="<?= $employee['Email'] ?>" name="Email" placeholder="Email"
    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" >

  <input type="number" value="<?= $employee['DepartmentId'] ?>" name="DepartmentId" placeholder="Department ID"
    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" >

  <button type="submit"
    class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200">Updated</button>
</form>
<?php require __DIR__ . '/../partials/footer.php'; ?>