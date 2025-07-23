<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<main>
    <div class="m-5">
        <a href="/employee/create"
            class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
            Create Employee
        </a>
    </div>
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 shadow rounded-lg overflow-hidden">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2 text-left text-sm font-semibold">ID</th>
                <th class="px-4 py-2 text-left text-sm font-semibold">Employee Name</th>
                <th class="px-4 py-2 text-left text-sm font-semibold">Salary</th>
                <th class="px-4 py-2 text-left text-sm font-semibold">Age</th>
                <th class="px-4 py-2 text-left text-sm font-semibold">Email</th>
                <th class="px-4 py-2 text-left text-sm font-semibold">Department ID</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php while ($row = mssql_fetch_assoc($result)): ?>
                <tr class="hover:bg-gray-100 transition duration-150">
                    <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['Id']) ?></td>
                    <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['EmployeeName']) ?></td>
                    <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['Salary']) ?></td>
                    <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['Age']) ?></td>
                    <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['Email']) ?></td>
                    <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['DepartmentId']) ?></td>
                    <td class="px-4 py-2 text-center">
                        <a href="/employee/edit??id=<?= $row['Id'] ?>"
                            class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded mr-2">Edit</a>
                        <a href="/employee/details??employeeId=<?= $row['Id'] ?>"
                            class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded mr-2">View Details</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>
<?php require('partials/footer.php') ?>