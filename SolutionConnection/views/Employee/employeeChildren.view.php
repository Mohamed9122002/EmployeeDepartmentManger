<?php require __DIR__ . '/../partials/head.php'; ?>
<?php require __DIR__ . '/../partials/nav.php'; ?>
<?php require __DIR__ . '/../partials/banner.php'; ?>
<form method="POST" action="" class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-md space-y-4 mt-10">
  <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">Add New Child</h2>
   <div>
    <label for="Name" class="block mb-1 text-gray-700 font-medium">Child Name</label>
    <input type="text" name="Name" id="Name" placeholder="Child Name"
      class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
  </div>

  <div>
    <label for="NationalId" class="block mb-1 text-gray-700 font-medium">National ID</label>
    <input type="text" name="NationalId" id="NationalId" placeholder="National Id"
      class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
  </div>
  <div>
    <label for="BirthDate" class="block mb-1 text-gray-700 font-medium">Birth Date</label>
    <input type="date" name="BirthDate" id="BirthDate"
      class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
  </div>
  <div>
    <label for="employeeId" class="block mb-1 text-gray-700 font-medium">Employee ID</label>
    <input type="number" name="employeeId" id="employeeId" placeholder="Employee ID"
      class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
  </div>
  <div>
    <label for="WifeId" class="block mb-1 text-gray-700 font-medium">Wife ID</label>
    <input type="number" name="WifeId" id="WifeId" placeholder="Wife ID"
      class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
  </div>
  <button type="submit"
    class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200">Save</button>
</form>
<?php require __DIR__ . '/../partials/footer.php'; ?>