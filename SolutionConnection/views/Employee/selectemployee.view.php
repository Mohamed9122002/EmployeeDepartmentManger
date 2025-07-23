<?php require __DIR__ . '/../partials/head.php'; ?>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<div class="mb-6">
    
  <label for="employeeDropdown" class="block mb-2 text-sm font-medium text-gray-700">
    Select Employee
  </label>
  
  <select id="employeeDropdown" name="EmployeeId"
    class="w-full p-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
    <option value="">Select Employee</option>
    
    <?php while ($row = mssql_fetch_assoc($result)): ?>
      <option value="<?= $row['Id'] ?>">
        <?= htmlspecialchars($row['EmployeeName']) ?>
      </option>
    <?php endwhile; ?>
  </select>
  <script>
  document.getElementById("employeeDropdown").addEventListener("change", function () {
    const employeeId = this.value;
    console.log("Selected Employee ID:", employeeId);
    if (employeeId) {
      window.location.href = "/select/Details?employeeId=" + employeeId;
    }
  });
</script>
</div>
<?php require __DIR__ . '/../partials/footer.php'; ?>